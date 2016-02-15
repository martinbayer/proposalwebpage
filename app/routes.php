<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHomepage');
Route::get('/sendConfirmationEmail', 'HomeController@sendConfirmation');
Route::post('/sendConfirmationEmail', 'HomeController@sendConfirmation');
Route::get('/sendRejectionEmail', 'HomeController@sendRejection');
Route::post('/sendRejectionEmail', 'HomeController@sendRejection');