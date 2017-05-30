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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('resident', 'ResidentController');
Route::resource('transaction', 'TransactionController', ['except' => 'create']);
Route::get('/transaction/{resident}/create', 'TransactionController@create')->name('transaction.create');
Route::get('/report/last-name', 'ReportsController@lastName');
Route::get('/report/download/{sortBy}', 'ReportsController@download');
Route::get('/report/dob', 'ReportsController@dob');
Route::get('/report/admit-date', 'ReportsController@admitDate');
Route::get('/report/discharge-date', 'ReportsController@releaseDate');
Route::get('/transaction_reports', 'TransactionReportsController@select');
Route::get('/resident_reports', 'ResidentReportsController@select');
Route::get('/report/transactions', 'ReportsController@transactionIndex');
Route::post('/transaction_report/run', 'TransactionReportsController@runReport');
Route::get('/facility_report/select', 'FacilityReportsController@select');
Route::get('/facility_report/router', 'FacilityReportsController@router')->name('determine_facility_report');

Route::post('/notes', 'NoteController@store')->name('note.store');
