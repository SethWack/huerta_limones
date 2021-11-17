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