<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\GroupsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("group" , [GroupsController::class , 'getGroups']);
/*----Route group----*/
Route::get('/group','GroupsController@getGroups');
Route::get('/itemofgroup','GroupsController@getItemOfGroups');
Route::post('/group','GroupsController@postGroups');
Route::post('/editgroup','GroupsController@EditGroups');
/*----Route group----*/
Route::get('/item','ItemsController@getItem');
Route::post('/item','ItemsController@postItem');
Route::post('/edititem','ItemsController@EditItems');
/*----Route supplier----*/
Route::get('/supplier','SuppliersController@getSupplier');
Route::post('/supplier','SuppliersController@postSupplier');
Route::post('/editsupplier','SuppliersController@EditSupplier');
/*----Route customer----*/
Route::get('/customer','CustomersController@getCustomer');
Route::post('/customer','CustomersController@postCustomer');
Route::post('/editcustomer','CustomersController@EditCustomer');
/*----Route store----*/
Route::get('/store','StoreController@getStore');
Route::post('/store','StoreController@postStore');
Route::post('/editstore','StoreController@EditStore');
/*----Route sale----*/
Route::get('/sale','SalesController@getSales');
Route::post('/sale','SalesController@postSales');
/*----Route order----*/
Route::get('/order','OrdersController@getOrder');
Route::post('/order','OrdersController@postOrder');
/*----Route customer----*/
Route::get('/orderline','orderlineController@getOrderline');
Route::get('/order','orderlineController@getOrder');
Route::post('/orderline','orderlineController@postOrderline');
Route::post('/ordersave','orderlineController@postOrdersave');
