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


/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::post(LaravelLocalization::transRoute('routes.admin/questions/add'), 'Admin\QuestionController@store');

//Route::get('test', 'Pages\BlogArticleController@index');

/*Route::get('/', function () {
    return View('welcome');
});*/
//Route::resource('BlogArticle', 'BlogArticleController');
Route::get('/', 'Pages\BlogArticleController@index');
