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

Route::get('/api/companies', ['as' => 'api.companies.index', 'uses' => 'API\CompanyController@index']);

Route::group(['middleware' => 'auth'], function() {
    Route::resource('company', 'CompanyController');

    Route::post('/users/{userId}/hide', 'CompanyController@hideForUser');
    Route::post('/users/{userId}/survey', 'CompanyController@storeSurvey');
    Route::post('/users/{userId}/survey/complete', 'CompanyController@storeSurveyComplete');
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
