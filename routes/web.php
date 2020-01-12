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

//Route::get('/', function () {
//    return view('auth.login');
//});

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/expenses', 'ExpenseController@Index')->name('show Expense');
//Route::get('/expenses', 'ExpenseController@getIndex')->name('show Expense');
//Route::post('/expenses', 'ExpenseController@addExpense')->name('Add Expense');
