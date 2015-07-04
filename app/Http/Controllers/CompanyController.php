<?php

namespace LocalPromoter\Http\Controllers;

use LocalPromoter\Company;
use Illuminate\Http\Request;

use LocalPromoter\HiddenCompany;
use LocalPromoter\Http\Requests;
use LocalPromoter\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth::user();

        $hidden = $user->hiddenCompanies()->where('created_at', '>', \Carbon\Carbon::now()->subHours(24));

        $companies = Company::whereNotIn('id', $hidden->lists('id'))->paginate(15);

        return view('company.index', compact('companies'));
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
}
