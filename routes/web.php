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
   // return view('auth/login');
   return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home','HomeController@index')->name('home');

Route::get('/create_cv',  'HomeController@create_cv')->name('create_cv');
Route::post('/create_cv',  'HomeController@insert_cv')->name('insert_cv');

Route::get('/upload_cv','HomeController@upload_cv')->name('upload_cv');
Route::post('/upload_cv1',  'HomeController@upload_cv1')->name('upload_cv1');
