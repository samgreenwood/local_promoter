<?php namespace LocalPromoter\Http\Controllers;

use Carbon\Carbon;
use LocalPromoter\Company;
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
        $user = \Auth::user();

        $hidden = $user->hiddenCompanies()->where('created_at', '>', Carbon::now()->subHours(24));

        $query = Company::whereNotIn('id', $hidden->lists('id'));

        if (\Input::has('postcode')) {
            $query->where('postcode', \Input::get('postcode'));
            $postcode = \Input::get('postcode');
        }

        $companies = $query->paginate(15);

        $featured = Company::where('featured', 1)->limit(3)->get();

        return view('company.index', compact('companies', 'postcode', 'featured'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(auth()->user()->company_id) return redirect()->route('companies.edit');

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
    public function show()
    {
        $company = auth()->user()->company;

        return view('company.show', compact('company'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $company = auth()->user()->company;

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
     */
    public function storeSurveyComplete($userId)
    {
        $userId = \Auth::user()->id;
        $companyId = \Input::get('company');
        $rating = \Input::get('rating_id');
        $note = \Input::get('note');

        $surveyResult = SurveyResult::find($rating)->update(['note' => $note]);

        //Generate facebook share link



    }
}
