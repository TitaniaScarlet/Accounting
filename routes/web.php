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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=> "can:employee, App\User"], function() {
  Route::get('/', 'DashboardController@dashboard')->name('admin.index');
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
  Route::resource('/supplier', 'SupplierController', ['as'=>'admin']);
  Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment', 'middleware'=> "can:admin, App\User"], function() {
    Route::resource('/user', 'UserController', ['as' => 'admin.user_managment']);
  });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');