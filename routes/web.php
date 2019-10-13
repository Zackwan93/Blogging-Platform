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

Route::get('/', 'PagesController@login');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::get('/index', 'PagesController@index');

Route::resource('posts','PostsController');

Route::resource('workers','WorkersController');

Route::resource('stocks','DailystocksController');



/*Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/about/{id}/{name}', function ($id, $name) {
    return view('pages.id_name');
});
*/


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
