<?php
namespace LocalPromoter\Http\Composers;

use LocalPromoter\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;

class FooterComposer
    {


    /**
    * Create a new profile composer.
    *
    * @param  UserRepository  $users
    * @return void
    */
    public function __construct()
    {

    }

    /**
    * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $featured = Company::where('featured', 1)->limit(2)->get();

        $view->with('featured', $featured);
    }
    }
