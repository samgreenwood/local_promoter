<?php namespace LocalPromoter;

use Illuminate\Routing\Controller;

class ReferalController extends Controller
{
    /**
     * @var \Services_Twilio
     */
    private $twilio;

    /**
     * @var Referal
     */
    private $referal;

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
     * @param Referal $referal
     */
    public function __construct(\Services_Twilio $twilio, Referal $referal, Company $company, SurveyResult $surveyResult)
    {
        $this->twilio = $twilio;
        $this->referal = $referal;
        $this->company = $company;
        $this->surveyResult = $surveyResult;
    }

    /**
     * @param Company $company
     * @return \Illuminate\View\View
     */
    public function index(Company $company)
    {
        return view('referals.index', compact('company'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $companies = $this->company->whereIn('id', $request->get('companies'));

        $referalData = array_filter($request->only('email', 'mobile', 'facebook_id')); // remove null fields
        $referal = $this->referal->firstOrNew($referalData);

        $referal->fill($request->only('first_name' ,'surname', 'email', 'mobile', 'facebook_id'));
        $referal->save();

        foreach($companies as $company)
        {
            $this->surveyResult->where('user_id', $user->id)->where('company_id', $company)->first()
                ->referals()->attach($referal);
        }

        $message = sprintf("%s is recommending you to try local business that they have had a great experience with.
        Click here to view localpromoter.com.au/%s", $user->name, $referal->slug);

        if(in_array('phone', $referalData))
        {
            $this->twilio->account->messages->sendMessage(
                "LocalPromo",
                $referalData['phone'],
                $message
            );
        }

        if(in_array('email', $referalData))
        {
              \Mail::send('email', compact('message'), function($message) use ($referalData)
              {
                  $message->to = $referalData['email'];
                  $message->subject = "You have been sent a referal";
              });
        }

        return redirect()->back()->withMessage('Referal has been sent!');

    }
}