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

Route::get('/', function () {
    return view('materialize.home');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('introduce', 'IntroduceController');
Route::resource('skill', 'SkillController');
Route::resource('board', 'BoardController');
Route::resource('portfolio', 'BoardController');
Route::resource('contact', 'ContactController');
