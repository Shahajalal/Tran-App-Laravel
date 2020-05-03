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
Route::get('/','UserController@loginPage')->name('login');
Route::post('/validate','UserController@Login')->name('validate');
Route::get('/index', 'UserController@index')->name('index');
Route::get('/applicants', 'UserController@applicants')->name('applicants');
Route::get('/volunteer', 'UserController@volunteer')->name('volunteer');
Route::get('/admin', 'UserController@admin')->name('admin');
Route::get('/signout','UserController@signOut')->name('signout');

Route::post('/import_data','RecipientListControllerWork@importData')->name('import_data');
Route::post('/checkall','RecipientListControllerWork@checkAllApprovedOrDelete')->name('checkall');
Route::get('/approve/{id}/{page}','RecipientListControllerWork@approved')->name('approve');
Route::get('/delete/{id}/{page}','RecipientListControllerWork@delete')->name('delete');

Route::get('/create_support','SupportsListController@index')->name('create_support');
Route::post('/create_support','SupportsListController@create')->name('create_support');

Route::get('/create_user','UserController@createAdmin')->name('create_user');
Route::post('/create_user','UserController@create')->name('create_user');

Route::get('/reset-password','UserController@PasswordResetGet')->name('reset-password');
Route::post('/reset-password','UserController@PasswordResetPost')->name('reset-password');
Route::get('/sort_help_date','RecipientListControllerWork@sortUsingHelpDate')->name('sort_help_date');
Route::post('/search','RecipientListControllerWork@search')->name('search');

Route::get('/order-by-asc/{page}','UserController@applicantsSortBystatusAsc')->name('order-by-asc');
Route::get('/order-by-desc/{page}','UserController@applicantsSortBystatusDesc')->name('order-by-desc');

Route::get('/delete-support/{id}/{page}','RecipientListControllerWork@deleteSupport')->name('delete-support');

Route::get('/delete-admin/{id}','RecipientListControllerWork@deleteAdmin')->name('delete-admin');



