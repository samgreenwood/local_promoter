<?php namespace LocalPromoter\Http\Controllers;

use LocalPromoter\SurveyResult;
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
        $testimonials = SurveyResult::where('rating', '>=', 9)->limit(5)->get();

        return view('home', compact('userRewards', 'companies', 'testimonials'));
    }
}