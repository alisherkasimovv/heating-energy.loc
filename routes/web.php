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

// Enabling authentication routes
Auth::routes();

// Core pages
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'HomeController@about']);
Route::get('/contacts', ['as' => 'contacts', 'uses' => 'HomeController@underConstruction']);
Route::get('/services', ['as' => 'services', 'uses' => 'HomeController@underConstruction']);

// Product pages
Route::get('/catalogue', ['as' => 'catalogue', 'uses' => 'HomeController@getAllProducts']);
Route::get('/catalogue/{slug}', ['as' => 'filter', 'uses' => 'HomeController@filterProducts']);
Route::get('/products/{slug}', ['as' => 'single-product', 'uses' => 'HomeController@getProduct']);

// Blog pages
Route::get('/blog', ['as' => 'blog', 'uses' => 'HomeController@blog']);
Route::get('/blog/{slug}', ['as' => 'post', 'uses' => 'HomeController@getPost']);

// Ordering consultation
Route::get('/consult-me', ['as' => 'consultation', 'uses' => 'HomeController@registerConsultation']);

// Language switch route
Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

// Admin pages
Route::get('/admin', 'Admin\DashboardController@index');
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
