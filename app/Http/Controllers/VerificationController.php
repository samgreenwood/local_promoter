<?php namespace LocalPromoter\Http\Controllers;

use Illuminate\Http\Request;
use LocalPromoter\Company;

class VerificationController extends Controller
{
    /**
     * @var Company
     */
    private $company;

    /**
     * @var \Services_Twilio
     */
    private $twilio;

    /**
     * @param Company $company
     * @param \Services_Twilio $twilio
     */
    public function __construct(Company $company, \Services_Twilio $twilio)
    {
        $this->company = $company;
        $this->twilio = $twilio;
    }

    /**
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Company $company)
    {
        $call = $this->twilio->account->calls->create(
            '+61404891194',
            $company->phone,
            url('/verify-user/call')
        );

        return response()->json($call);
    }

    /**
     * @param Request $request
     * @return Services_Twilio_Twiml
     */
    public function call(Request $request)
    {
        $response = new Services_Twilio_Twiml();

        if ( ! $request->has('Digits')) {
            $gather = $response->gather(array('numDigits' => 6));
            $gather->say("Please enter your verification code.");
        } else {
            $calledNumber = $request->get('Called');

            $company = $this->company->where('phone', $calledNumber)->first();

            if ($company) {
                if ($request->get('digits') === $company->verification_code) {
                    $company->verified = true;
                    $company->save();

                    $response->say('Thank you, your account has been verified');

                } else {
                    $gather = $response->gather(array('numDigits' => 6));
                    $gather->say("Verification code incorrect, please try again.");
                }

            }
        }

        return $response;
    }
}