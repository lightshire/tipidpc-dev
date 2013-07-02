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

Route::get('/register'	,	'HomeController@getRegister');
Route::post('/register'	,	'HomeController@postRegister');
Route::post('/login'	, 	'HomeController@postLogin');

Route::controller('forum','ForumController');


/*	Route Auth Fix
----------------------------------*/
Route::group(array('before'=>'mongo-auth'),function(){
	Route::controller('usercp','UserPanelController');
});

/*	auth Routes
----------------------------------*/
Route::group(array('prefix'=>'auth'),function(){
	Route::controller('facebook','FacebookAuthController');
});


/*	REST API Controller Groups
---------------------------------*/
Route::group(array('prefix'=>'api'),function(){

});