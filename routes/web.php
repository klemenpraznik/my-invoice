<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\DescriptionPageController::class, 'index']);

// Home controller
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
Route::patch('/settings/{user}', [App\Http\Controllers\HomeController::class, 'update']);
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

// Invoice controller
Route::get('/invoices', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoices');
Route::get('/invoice/create', [App\Http\Controllers\InvoiceController::class, 'create'])->name('invoices');
Route::post('/invoice', [App\Http\Controllers\InvoiceController::class, 'store']);
Route::get('/invoice/details/{invoice}', [App\Http\Controllers\InvoiceController::class, 'show']);
Route::get('/invoice/edit/{prinvoiceoduct}', [App\Http\Controllers\InvoiceController::class, 'edit']);
Route::patch('/invoice/{invoice}', [App\Http\Controllers\InvoiceController::class, 'update']);
Route::delete('/invoice/delete/{invoice}', [App\Http\Controllers\InvoiceController::class, 'delete']);
Route::get('/invoice/export/{invoice}', [App\Http\Controllers\InvoiceController::class, 'createPDF']);