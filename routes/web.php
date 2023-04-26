<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// This is my Registration Routes... (viewsss)
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register_submit');

// This is combination of both Login and register routes 
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Dashboard route (This is like home page path)
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');


//Profile route (This is editing code)
Route::get('/profile', 'App\Http\Controllers\DashboardController@profile')->name('profile');
Route::post('/profile/update', 'App\Http\Controllers\DashboardController@updateProfile')->name('profile.update');