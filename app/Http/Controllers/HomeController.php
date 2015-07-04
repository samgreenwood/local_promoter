<?php namespace LocalPromoter\Http\Controllers;

use LocalPromoter\UserReward;
use LocalPromoter\Company;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userRewards = UserReward::all();
        $companies = Company::limit(8)->get();

        return view('home', compact('userRewards', 'companies'));
    }
}