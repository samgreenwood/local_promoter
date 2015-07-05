<?php namespace LocalPromoter\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use LocalPromoter\Company;
use LocalPromoter\Referral;
use Illuminate\Http\Request;
use LocalPromoter\HiddenCompany;
use LocalPromoter\Http\Requests;
use LocalPromoter\SurveyResult;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $postcode = "";
        $businessName = "";
        $user = \Auth::user();

        $hidden = $user->hiddenCompanies()->where('created_at', '>', Carbon::now()->subHours(24));

        $query = Company::whereNotIn('id', $hidden->lists('id'));

        if (\Input::has('postcode')) {
            $query->where('postcode', \Input::get('postcode'));
            $postcode = \Input::get('postcode');
        }
        $localCompanies = $query->get();
        $tourism = app('LocalPromoter\TourismRepository');

        $tourismCompanies = new Collection($tourism->all());

        $tourismCompanies = $tourismCompanies->merge($localCompanies);

        // Paginate
        $perPage = 10; // Item per page (change if needed)
        $currentPage = \Input::get('page')?\Input::get('page') - 1:0;
        $pagedData = $tourismCompanies->slice($currentPage * $perPage, $perPage)->all();
        $companies = new Paginator($pagedData, count($tourismCompanies), $perPage);
        $companies->setPath('company');


        $featured = Company::where('featured', 1)->limit(3)->get();

        return view('company.index', compact('companies', 'postcode', 'featured', 'businessName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(auth()->user()->company_id) return redirect()->route('companies.edit', [auth()->user()->company_id]);

        $company = new Company();

        return view('company.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->fill($request->all());
        $company->save();

        auth()->user()->company_id = $company->id;
        auth()->user()->save();

        return redirect(route('companies.edit'))->withMessage('Company Created!');

    }

    /**
     * @return \Illuminate\View\View
     */
    public function show($companyId)
    {
        $company = "";
        $tourismCompany = "";
        $googleCompany = "";
        $type = \Input::get('type');

        switch ($type) {
            case "tourism":
                $tourism = app('LocalPromoter\TourismRepository');
                $tourismCompany = $tourism->get();

                $company = Company::where('tourism_id', $companyId)->first();

                if (!$company) {
                    $company = Company::create(['tourism_id' => $companyId]);
                }

                break;
            case "google":
                break;

            default:
                $company = Company::find($companyId);
        }

        $featured = Company::where('featured', 1)->limit(3)->get();
        $testimonials = SurveyResult::where('rating', '>=', 9)->limit(5)->get();


        return view('company.show', compact('type', 'company', 'tourismCompany', 'googleCompany', 'featured', 'testimonials'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function edit($companyId)
    {
        $company = Company::find($companyId);

        if (auth()->user()->company && auth()->user()->company->id != $companyId && $company->tourism_id == '') {
            return redirect('/');
        }


        return view('company.edit', compact('company'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        auth()->user()->company->update($request->all());

        return redirect()->back()->withMessage('Company Profile Updated');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $company = auth()->user()->company;

        $surveyResults = [];
        $referrals = [];

        if($company)
        {
            $surveyResults = $company->surveyResults;

            $referrals = new Collection();

            foreach($surveyResults as $surveyResult)
            {
                $referrals = $referrals->merge($surveyResult->referrals);
            }
        }



        return view('company.dashboard', compact('company', 'surveyResults', 'referrals'));
    }

    /**
     * @param $userId
     */
    public function hideForUser($userId)
    {
        HiddenCompany::create(['user_id' => \Auth::user()->id, 'company_id' => \Input::get('company')]);
    }

    /**
     * @param $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeSurvey($userId)
    {
        $userId = \Auth::user()->id;
        $companyId = \Input::get('company');
        $rating = \Input::get('rating');

        $surveyResult = SurveyResult::create([
            'user_id' => $userId,
            'company_id' => $companyId,
            'rating' => $rating
        ]);

        return response()->json(['resultId' => $surveyResult->id]);
    }

    /**
     * @param $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeSurveyComplete($userId)
    {
        $userId = \Auth::user()->id;
        $companyId = \Input::get('company');
        $ratingId = \Input::get('rating_id');
        $note = \Input::get('note');

        $surveyResult = SurveyResult::find($ratingId)->update(['note' => $note]);

        //Generate facebook share link
        $facebook = config('app.url').'/company/'.$companyId.'?ref='.$ratingId;

        return response()->json(['facebook' => $facebook]);

    }

    public function share($userId)
    {
        $userId = \Auth::user()->id;

        $name = \Input::get('name');
        $phone = \Input::get('phone');
        $email = \Input::get('email');


        //$referral = Referral::where('email', $email)->get();

        //if ($referral) {
            //Link survey to this referral user
        //} else {
            Referral::create(['name' => $name, 'mobile' => $phone, 'email' => $email]);
        //}

        return response()->json([]);
    }

}
