<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UsersController;
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
    return view('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/blog', BlogController::class);
Route::resource('/store', StoreController::class);
Route::resource('/admin', AdminController::class);
Route::resource('/users', UsersController::class);
Route::resource('/productos', ProductController::class);
Route::resource('/entradas', EntradaController::class);
Route::resource('/salidas', SalidaController::class);
Route::resource('/compras', ComprasController::class);
Route::resource('/carrito', CarritoController::class);
Route::resource('/reportes', ReportController::class);
Route::get('/reportes/pdf', [ReportController::class, 'createPDF'])->name('reportesPDF');