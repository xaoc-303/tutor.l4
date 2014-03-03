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

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::get('articles/{id}/delete', ['uses' => 'ArticlesController@destroy', 'as' => 'articles.delete']);
Route::get('articles/method', ['uses' => 'ArticlesController@method', 'as' => 'articles.method']);
Route::resource('articles','ArticlesController', ['before' => 'csrf']);

Route::get('catalog/files-in-dir/{path?}', 'CatalogController@getFilesInDir')->where('path', '(.+)');
Route::controller('catalog','CatalogController');
Route::controller('radio','RadioController');
Route::controller('admin','Admin_Controller');

Route::controller('/','MainController');