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
Route::get('/home', function () {
    return redirect('/');
});
Route::get('/', function () {
    return redirect('/applicants');
});

Route::middleware('auth')->resource('/emails', 'EmailController');
Route::middleware('auth')->resource('/applicants','ApplicantController');
Route::middleware('auth')->resource('/assistants','AssistantController');
Route::middleware('auth')->resource('/users','UserController');
Route::middleware('auth')->resource('/rsclasses','RsClassController');
Route::middleware('auth')->resource('/courses','CourseController');
Route::middleware('auth')->resource('/interviewers','InterviewerController');
Route::middleware('auth')->resource('/forms','FormController');
Route::middleware('auth')->resource('/documents', 'DocumentController');
Route::middleware('auth')->resource('/calendars/interviews','InterviewController');
Route::middleware('auth')->resource('/calendars/tests','TestController');
Route::middleware('auth')->resource('/calendars/inventories','InventoriesController');
Route::middleware('auth')->resource('/calendars/availabilities','AvailabilitiesController');
Route::middleware('auth')->resource('/calendars','CalendarController');
Route::middleware('auth')->resource('/tables','TableController');
Auth::routes();

