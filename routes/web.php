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

Route::get('/', 'PostsController@index') -> middleware('auth') -> name('feed');
Route::post('/', 'PostsController@store');

Route::get('/profile/{username}', 'UserController@show') -> name('user');
Route::put('/profile/{username}', 'UserController@update');
Route::get('/profile/edit/{username}', 'UserController@edit') -> name('user.edit');

Auth::routes();

Route::get('/portfolios/{username}', 'portfolioController@index') -> name('user.portfolios');
Route::post('/profile', 'portfolioController@store');

Route::post('/like', 'PostsController@likePost')->name('like');
Route::post('/likes', 'PostsController@getLikes')->name('get_like');

Route::get('/portfolio/{id_portifolio}', 'portfolioController@show')->name('portfolio');

Route::get('/test', function(){
    return view('test');
});
