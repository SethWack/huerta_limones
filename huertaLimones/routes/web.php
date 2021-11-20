<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/store', function(){
    return view('store');
})->name('store');

Route::middleware(['auth:sanctum', 'verified'])->get('/blogs', function(){
    return view('blogs');
})->name('blogs');

Route::middleware(['auth:sanctum', 'verified'])->get('/blogs/make', function(){
    return view('blogs-make');
})->name('make');
Route::middleware(['auth:sanctum', 'verified'])->get('/blogs/edit', function(){
    return view('blogs-edit');
})->name('blogs-edit');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin');
})->name('admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/users', function(){
    return view ('users');
})->name('users');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/compras', function(){
    return view ('compras');
})->name('compras');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/productos', function(){
    return view ('productos');
})->name('productos');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/entradas', function(){
    return view ('entradas');
})->name('entradas');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/salida', function(){
    return view ('salidas');
})->name('salidas');