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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::resource('/admin/branches', 'BranchController');
Route::resource('/admin/categories', 'CategoryController');
Route::resource('/admin/items', 'ItemController');
Route::resource('/admin/employees', 'EmployeeController');
Route::resource('/admin/item_transactions', 'Item_transactionController');
Route::resource('/admin/item_branches', 'Item_branchController');
