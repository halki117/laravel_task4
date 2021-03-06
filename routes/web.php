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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');

Route::prefix('posts')->group(function(){
    Route::post('{post}/likes', 'LikesController@store')->name('likes');
    Route::delete('{post}/unlikes', 'LikesController@destroy')->name('unlikes');
});
