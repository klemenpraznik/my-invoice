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



// Demo routes
// Route::get('/datatables', 'PagesController@datatables');
// Route::get('/ktdatatables', 'PagesController@ktDatatables');
// Route::get('/select2', 'PagesController@select2');
// Route::get('/jquerymask', 'PagesController@jQueryMask');
// Route::get('/icons/custom-icons', 'PagesController@customIcons');
// Route::get('/icons/flaticon', 'PagesController@flaticon');
// Route::get('/icons/fontawesome', 'PagesController@fontawesome');
// Route::get('/icons/lineawesome', 'PagesController@lineawesome');
// Route::get('/icons/socicons', 'PagesController@socicons');
// Route::get('/icons/svg', 'PagesController@svg');
// // Quick search dummy route to display html elements in search dropdown (header search)

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