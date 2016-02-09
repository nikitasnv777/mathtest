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

Route::get('/', [ 'as' => 'index', 'uses' => 'IndexController@Index']);
Route::post('/index/citylist', [ 'as' => 'index-citylist', 'uses' => 'IndexController@AjaxGetCitiesList']);
Route::post('/index/langlist', [ 'as' => 'index-langlist', 'uses' => 'IndexController@AjaxGetLanguagesList']);

Route::get('/countries', [ 'as' => 'countries', 'uses' => 'CountriesController@Index']);
Route::post('/country/add', [ 'as' => 'country-add', 'uses' => 'CountriesController@Store']);
Route::post('/country/update', [ 'as' => 'country-update', 'uses' => 'CountriesController@Update']);
Route::post('/country/delete', [ 'as' => 'country-delete', 'uses' => 'CountriesController@Destroy']);

Route::get('/cities', [ 'as' => 'cities', 'uses' => 'CitiesController@Index']);
Route::post('/cities/list', [ 'as' => 'cities-list', 'uses' => 'CitiesController@AjaxGetCitiesList']);
Route::post('/cities/langlist', [ 'as' => 'cities-langlist', 'uses' => 'CitiesController@AjaxGetLanguagesList']);
Route::post('/cities/langmod', [ 'as' => 'cities-langmod', 'uses' => 'CitiesController@AjaxGetLanguagesModif']);
Route::post('/city/add', [ 'as' => 'city-add', 'uses' => 'CitiesController@Store']);
Route::post('/city/update', [ 'as' => 'city-update', 'uses' => 'CitiesController@Update']);
Route::post('/city/delete', [ 'as' => 'city-delete', 'uses' => 'CitiesController@Destroy']);

Route::get('/languages', [ 'as' => 'languages', 'uses' => 'LanguagesController@Index']);
Route::post('/language/add', [ 'as' => 'language-add', 'uses' => 'LanguagesController@Store']);
Route::post('/language/update', [ 'as' => 'language-update', 'uses' => 'LanguagesController@Update']);
Route::post('/language/delete', [ 'as' => 'language-delete', 'uses' => 'LanguagesController@Destroy']);
