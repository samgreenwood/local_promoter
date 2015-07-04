<?php

namespace LocalPromoter\Http\Controllers;

use LocalPromoter\Company;
use Illuminate\Http\Request;

use LocalPromoter\HiddenCompany;
use LocalPromoter\Http\Requests;
use LocalPromoter\Http\Controllers\Controller;
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

        $hidden = $user->hiddenCompanies()->where('created_at', '>', \Carbon\Carbon::now()->subHours(24));

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function hideForUser($userId)
    {
        HiddenCompany::create(['user_id' => \Auth::user()->id, 'company_id' => \Input::get('company')]);
    }

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

    public function storeSurveyComplete($userId)
    {
        $userId = \Auth::user()->id;
        $companyId = \Input::get('company');
        $rating = \Input::get('rating_id');
        $note = \Input::get('note');

        $surveyResult = SurveyResult::find($rating)->update(['note' => $note]);


    }
}
