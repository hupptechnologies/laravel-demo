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

Auth::routes();
Route::Get('logout', 'UserController@logout');
Route::get('/', 'User\HomeController@index');

Route::group(['middleware' => ['auth', 'user']], function () {
	Route::get('image-count', 'User\HomeController@countUpdate');
	Route::get('/home', 'User\HomeController@index')->name('home');

    Route::get('page/{page}', 'User\PageController@index');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin', function () {
    	return view('admin.index');
    });

    Route::get('users', 'Admin\UsersController@index');
    Route::get('users/add', 'Admin\UsersController@add');
    Route::post('users/create', 'Admin\UsersController@create');
    Route::get('users/edit/{id}', 'Admin\UsersController@edit');
    Route::post('users/update/{id}', 'Admin\UsersController@update');
    Route::get('users/delete/{id}', 'Admin\UsersController@destroy');

    Route::get('images', 'Admin\ImagesController@index');
    Route::get('images/add', 'Admin\ImagesController@add');
    Route::post('images/create', 'Admin\ImagesController@create');
    Route::get('images/edit/{id}', 'Admin\ImagesController@edit');
    Route::post('images/update/{id}', 'Admin\ImagesController@update');
    Route::get('images/delete/{id}', 'Admin\ImagesController@destroy');

    Route::get('pages', 'Admin\PagesController@index');
    Route::get('pages/add', 'Admin\PagesController@add');
    Route::post('pages/create', 'Admin\PagesController@create');
    Route::get('pages/edit/{id}', 'Admin\PagesController@edit');
    Route::post('pages/update/{id}', 'Admin\PagesController@update');
    Route::get('pages/delete/{id}', 'Admin\PagesController@destroy');
});
