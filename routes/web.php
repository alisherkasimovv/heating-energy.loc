<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'HomeController@about']);
Route::get('/catalogue', ['as' => 'catalogue', 'uses' => 'HomeController@underConstruction']);
Route::get('/contacts', ['as' => 'contacts', 'uses' => 'HomeController@underConstruction']);
Route::get('/services', ['as' => 'services', 'uses' => 'HomeController@underConstruction']);
Route::get('/products', ['as' => 'products', 'uses' => 'HomeController@underConstruction']);
Route::get('/products/{slug}', ['as' => 'prod', 'uses' => 'HomeController@getProduct']);
Route::get('/blog', ['as' => 'blog', 'uses' => 'HomeController@blog']);
Route::get('/blog/{slug}', ['as' => 'post', 'uses' => 'HomeController@getPost']);

Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Auth::routes();

Route::group([
        'prefix'=>'admin',
        'middleware'=>'auth',
        'namespace'=>'Admin'], function()
    {
        Route::resource('/dashboard', 'DashboardController');
        Route::resource('/credentials', 'CredentialController');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/posts', 'PostController');
        Route::resource('/products', 'ProductController');
    }
);
