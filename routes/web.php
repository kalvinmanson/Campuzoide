<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->namespace('Admin')->as('admin.')->middleware('auth')->group(function () {
    Route::resource('countries', 'CountryController');
    Route::resource('categories', 'CategoryController');
    Route::resource('blocks', 'BlockController');
    Route::resource('pages', 'PageController');
    Route::resource('fields', 'FieldController');
    Route::resource('users', 'UserController');
    Route::resource('careers', 'CareerController');
    Route::resource('grades', 'GradeController');
    Route::resource('areas', 'AreaController');
    #Route::resource('admin/contacts', 'ContactController');

    //personales
	Route::post('pages/duplicate', ['as' => 'pages.duplicate', 'uses' => 'PageController@duplicate']);
});

Route::middleware('auth')->group(function () {
    Route::get('/users/{slug}', 'UserController@profile')->where('slug', '[a-z,0-9-]+');
    Route::get('/questions', 'QuestionController@index');
    Route::get('/questions/challenge', 'QuestionController@challenge');
    Route::get('/questions/cooperate', 'QuestionController@cooperate');
    Route::get('/questions/create', 'QuestionController@create');
});

Auth::routes();
Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');

Route::get('/home', 'WebController@index')->name('home');
Route::get('/admin', function() {
	return redirect()->route('admin.pages.index');
});

Route::get('/', 'WebController@index');

//mis rutas
Route::get('{category}/{slug}', 'WebController@page')->where('category', '[a-z,0-9-]+')->where('slug', '[a-z,0-9-]+');
Route::get('{slug}', 'WebController@category')->where('slug', '[a-z,0-9-]+');