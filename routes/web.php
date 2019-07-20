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
  Route::resource('/product', 'ProductController', ['as'=>'admin']);
  Route::resource('/unit', 'UnitController', ['as'=>'admin']);
  Route::resource('/subdivision', 'SubdivisionController', ['as'=>'admin']);
  Route::resource('/transference', 'TransferenceController', ['as'=>'admin']);
  Route::resource('/ttn', 'TtnController', ['as'=>'admin']);
  Route::resource('/menu', 'MenuController', ['as'=>'admin']);
  Route::resource('/ingredient', 'IngredientController', ['as'=>'admin']);
  Route::resource('/phone', 'PhoneController', ['as'=>'admin']);
  Route::resource('/account', 'AccountController', ['as'=>'admin']);
  Route::resource('/contract', 'ContractController', ['as'=>'admin']);
  Route::get('/json', 'JsonController@json')->name('admin.json');
  Route::post('/json/ttn', 'JsonController@ttn')->name('admin.ttn');

  Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment', 'middleware'=> "can:admin, App\User"], function() {
    Route::resource('/user', 'UserController', ['as' => 'admin.user_managment']);
  });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
