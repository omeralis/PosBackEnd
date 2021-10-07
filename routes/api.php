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
Route::post('/group','GroupsController@postGroups');
Route::post('/editgroup','GroupsController@EditGroups');
/*----Route group----*/
Route::get('/item','ItemsController@getItem');
Route::post('/item','ItemsController@postItem');
Route::post('/edititem','ItemsController@EditItems');
/*----Route group----*/
Route::get('/supplier','SuppliersController@getSupplier');
Route::post('/supplier','SuppliersController@postSupplier');
Route::post('/editsupplier','SuppliersController@EditSupplier');