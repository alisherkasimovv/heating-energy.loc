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

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>'auth', 'namespace'=>'Admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/credentials', 'CredentialController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/posts', 'PostController');
});
