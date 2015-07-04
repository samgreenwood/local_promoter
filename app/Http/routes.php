<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home', ['as' => 'home_path', 'uses' => 'HomeController@index']);

Route::get('/login', ['as' => 'login_path', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::get('/register', ['as' => 'register_path', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('/register', ['as' => 'login', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/auth/{provider}/redirect', ['as' => 'oauth.redirect', 'uses' => 'Auth\AuthController@redirect']);
Route::get('/auth/{provider}', ['as' => 'oauth.handle', 'uses' => 'Auth\AuthController@handle']);

Route::get('/terms', ['as' => 'terms', 'uses' => 'PagesController@terms']);

Route::get('/api/companies', ['as' => 'api.companies.index', 'uses' => 'API\CompanyController@index']);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/test', function() {

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
        $token = Session::get('facebook_access_token');
        $fb->setDefaultAccessToken($token);

    });

    Route::resource('company', 'CompanyController');

    Route::post('/users/{userId}/hide', 'CompanyController@hideForUser');
    Route::post('/users/{userId}/survey', 'CompanyController@storeSurvey');
    Route::post('/users/{userId}/survey/complete', 'CompanyController@storeSurveyComplete');

    Route::get('/create-company', ['as' => 'companies.create', 'uses' => 'CompanyController@create']);
    Route::post('/create-company', ['as' => 'companies.store', 'uses' => 'CompanyController@store']);
    Route::get('/edit-company', ['as' => 'companies.edit', 'uses' => 'CompanyController@edit']);
    Route::put('/edit-company', ['as' => 'companies.update', 'uses' => 'CompanyController@update']);
});

Route::get('/sms-test', function()
{
    $client = app(Services_Twilio::class);

    $client->account->messages->sendMessage(
        "LocalPromo",
        "+610423350768",
        "Testing twilio!"
    );
});
