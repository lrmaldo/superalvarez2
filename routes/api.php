<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::GET('sucursales','ApiController@index');
Route::GET('sucursal/{id}','ApiController@show');
Route::GET('sucursal/producto/{id}','ApiController@producto');
Route::GET('sucursal/productosSucursal/{id}','ApiController@productos_sucursal');
Route::GET('sucursal/data/{id}','ApiController@data_sucursal');

Route::POST('sucursal/pedido','ApiController@store_pedido');
