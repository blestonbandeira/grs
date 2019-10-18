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

//Route::get('/', 'HomeController@index')->name('home');
Route::get('/', function () {
    return redirect('/calendar');
});

Route::middleware('auth')->resource('/applicants','ApplicantController');
Route::middleware('auth')->resource('/assistants','ApplicantController');
Route::middleware('auth')->resource('/calendar','CalendarController');
Auth::routes();