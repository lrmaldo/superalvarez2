<?php

use App\bannerSucursal;
use App\Http\Controllers\bannerprincipalController;
use App\Http\Controllers\bannerSucursalController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TelegramController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
   
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('sucursal',SucursalController::class);

/* rutas de perfil */
Route::get('/perfil', [SucursalController::class, 'perfil'])->name('perfil');
Route::put('/perfil/update/{id}',[SucursalController::class,'perfilUpdate'])->name('perfil.update');

/* rutas del banner principal */

Route::resource('bannerp',bannerprincipalController::class);

/* rutas de productos */
Route::resource('productos',ProductosController::class);

/* rutas de categorias */
Route::resource('categorias',CategoriasController::class);


/* rutas de banners de sucursal */

Route::resource('banners',bannerSucursalController::class);

/*  rutas de pedidos de sucursal */
Route::resource('pedidos',PedidosController::class);

/* rutas de telegram */
Route::resource('telegram',TelegramController::class);

/* clientes app */
Route::resource('clientes',ClientesController::class);

Route::get('documentacion',function (){
return view('documentacion');
})->name('documentacion');

Route::get('pedidospdf/{id}',[PedidosController::class,'pedidospdf'])->name('pedidospdf');
