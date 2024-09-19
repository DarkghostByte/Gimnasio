<?php

use App\Http\Controllers\AuthController;
//use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
//use App\Http\Controllers\PedidosController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users',[UsersController::class,'index']);
Route::post('/users',[UsersController::class,'store']);

Route::post('/users/actions/verify',[UsersController::class,'verifyEmail']);

/*
Route::resource('products',ProductsController::class);
Route::post('/products/add/upload',[ProductsController::class,'upload']);

Route::resource('pedidos',PedidosController::class);
Route::get('/factura/{id}',[PedidosController::class,'generarPDF']);
*/

Route::post('/login',[AuthController::class, 'login']);
