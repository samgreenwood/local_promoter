<?php namespace LocalPromoter;

use Illuminate\Routing\Controller;

class ReferralController extends Controller
{
    /**
     * @var \Services_Twilio
     */
    private $twilio;

    /**
     * @var Referal
     */
    private $referral;

    /**
     * @var Company
     */
    private $company;

    /**
     * @var SurveyResult
     */
    private $surveyResult;

    /**
     * @param \Services_Twilio $twilio
     * @param Referral $referral
     * @param Company $company
     * @param SurveyResult $surveyResult
     */
    public function __construct(\Services_Twilio $twilio, Referral $referral, Company $company, SurveyResult $surveyResult)
    {
        $this->twilio = $twilio;
        $this->referral = $referral;
        $this->company = $company;
        $this->surveyResult = $surveyResult;
    }

    /**
     * @param Company $company
     * @return \Illuminate\View\View
     */
    public function index(Company $company)
    {
        return view('referrals.index', compact('company'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $companies = $this->company->whereIn('id', $request->get('companies'));

        $referralData = array_filter($request->only('email', 'mobile', 'facebook_id')); // remove null fields
        $referral = $this->referral->firstOrNew($referralData);

        $referral->fill($referralData);
        $referral->save();

        foreach($companies as $company)
        {
            $this->surveyResult->where('user_id', $user->id)->where('company_id', $company)->first()
                ->referals()->attach($referral);
        }

        $message = sprintf("%s is recommending you to try local business that they have had a great experience with.
        Click here to view localpromoter.com.au/%s", $user->name, $referral->slug);

        if(in_array('phone', $referralData))
        {
            $this->twilio->account->messages->sendMessage(
                "LocalPromo",
                $referralData['phone'],
                $message
            );
        }

        if(in_array('email', $referralData))
        {
              \Mail::send('email', compact('message'), function($message) use ($referralData)
              {
                  $message->to = $referralData['email'];
                  $message->subject = "You have been sent a referral";
              });
        }

        return redirect()->back()->withMessage('Referral has been sent!');

    }
}