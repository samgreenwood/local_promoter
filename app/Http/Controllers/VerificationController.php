<?php namespace LocalPromoter\Http\Controllers;

use Illuminate\Http\Request;
use LocalPromoter\Company;
use Services_Twilio_Twiml;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify()
    {
        $company = auth()->user()->company;

        if(!$company->verified) return redirect()->back()->withMessage('Company Already Verified');

        $company->verification_code = mt_rand(100000, 999999);
        $company->verified = false;
        $company->save();

        $this->twilio->account->calls->create(
            env('TWILIO_VOICE'),
            $company->phone,
            route('company.verify.call')
        );

        return view('company.verify', compact('company'));

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
                if ($request->get('Digits') === $company->verification_code) {
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