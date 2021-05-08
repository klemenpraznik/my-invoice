<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Home controller
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-project', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

// Categories controller
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store']);
Route::get('/category/details/{category}', [App\Http\Controllers\CategoryController::class, 'show']);
Route::get('/category/edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::patch('/category/{category}', [App\Http\Controllers\CategoryController::class, 'update']);
Route::delete('/category/delete/{category}', [App\Http\Controllers\CategoryController::class, 'delete']);

// Clients controller
Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
Route::get('/client/create', [App\Http\Controllers\ClientController::class, 'create'])->name('clients');
Route::post('/client', [App\Http\Controllers\ClientController::class, 'store']);
Route::get('/client/details/{client}', [App\Http\Controllers\ClientController::class, 'show']);
Route::get('/client/edit/{client}', [App\Http\Controllers\ClientController::class, 'edit']);
Route::patch('/client/{client}', [App\Http\Controllers\ClientController::class, 'update']);
Route::delete('/client/delete/{client}', [App\Http\Controllers\ClientController::class, 'delete']);

// Products controller
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('productss');
Route::post('/product', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/product/details/{product}', [App\Http\Controllers\ProductController::class, 'show']);
Route::get('/product/edit/{product}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::patch('/product/{product}', [App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/product/delete/{product}', [App\Http\Controllers\ProductController::class, 'delete']);