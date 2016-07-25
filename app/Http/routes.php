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
    return redirect(url('/portfolio'));
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('introduce', 'IntroduceController');
Route::resource('skill', 'SkillController');
Route::resource('board', 'BoardController');
Route::resource('portfolio', 'BoardController');
Route::resource('contact', 'ContactController');

//Route::get('upload/uploadImage', 'FileUploadController@image_upload');
Route::resource('upload', 'FileUploadController');
Route::post('upload/imageUpload', 'FileUploadController@imageUpload')->name('imageUpload');

Route::auth();
Route::get('auth/logout', 'Auth\AuthController@logout');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/home', 'HomeController@index');
