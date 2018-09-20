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

Route::get('/', 'UrlController@root');

Route::get('/feed', 'PostsController@index') -> name('feed');
Route::post('/feed', 'PostsController@store');

Route::get('/user/{username}', 'UserController@show') -> name('user');

Auth::routes();

Route::get('/user/{username}/portfolios', 'portfolioController@index') -> name('user.portfolios');
Route::post('/user/', 'portfolioController@store');
