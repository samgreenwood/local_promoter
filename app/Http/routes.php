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

Route::get('/login', ['as' => 'login_path', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('/register', ['as' => 'register_path', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('/register', ['as' => 'login', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/auth/facebook/redirect', ['as' => 'facebook.redirect', 'uses' => 'Auth\AuthController@facebookRedirect']);
Route::get('/auth/google/redirect', ['as' => 'google.redirect', 'uses' => 'Auth\AuthController@googleRedirect']);

Route::get('/auth/facebook', ['as' => 'facebook.handle', 'uses' => 'Auth\AuthController@facebookHandle']);
Route::get('/auth/google', ['as' => 'google.handle', 'uses' => 'Auth\AuthController@googleHandle']);

