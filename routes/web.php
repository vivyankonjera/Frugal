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
Route::get('/pay/{id}', 'HomeController@payExpense')->name('Pay Expense');

Route::get('/expenses', 'ExpenseController@getIndex')->name('show Expense')->middleware('auth');
Route::post('/expenses', 'ExpenseController@addExpense')->name('Add Expense');

Route::get('/delete/{id}', 'ExpenseController@deleteExpense')->name('deleteExpense');
Route::get('/edit/{id}', 'ExpenseController@editExpense')->name('editComment');
Route::post('/edit/{id}', 'ExpenseController@saveExpense')->name('saveComment');

