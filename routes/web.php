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
Route::get('/report/last-name/download', 'ReportsController@lastNameDownload');
Route::get('/report/dob', 'ReportsController@dob');
Route::get('/report/admit-date', 'ReportsController@admitDate');
Route::get('/report/discharge-date', 'ReportsController@releaseDate');
Route::get('/report/transactions', 'ReportsController@transactionIndex');

Route::post('/notes', 'NoteController@store')->name('note.store');
