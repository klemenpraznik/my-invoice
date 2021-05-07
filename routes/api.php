<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Category;
use \App\Models\User;


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


// Categories
Route::get('user/{id}/categories', function(Int $id, Request $request) {
    $api_token = $request->header('api_token');
    if ($api_token == null) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
    $user = User::find($id);
    if ($user == null) {
        return response()->json(['error' => 'User not found.'], 404);
    }
    if ($user->api_token != $request->header('api_token')) {
        return response()->json(['error' => 'Forbidden'], 403); 
    }
    return $user->categories;
    // return Category::all();
});

Route::delete('user/{id}/category/{category_id}', function(Int $id, Int $category_id, Request $request) {
    $api_token = $request->header('api_token');
    if ($api_token == null) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
    $user = User::find($id);
    if ($user == null) {
        return response()->json(['error' => 'User not found.'], 404);
    }
    if ($user->api_token != $request->header('api_token')) {
        return response()->json(['error' => 'Forbidden'], 403); 
    }
    $category = $user->categories->find($category_id);
    if ($category == null) {
        return response()->json(['error' => 'Category not found.'], 404);
    }
    $category->delete();
    return response()->json("Success", 200);
});

// Clients
Route::get('user/{id}/clients', function(Int $id, Request $request) {
    $api_token = $request->header('api_token');
    if ($api_token == null) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
    $user = User::find($id);
    if ($user == null) {
        return response()->json(['error' => 'User not found.'], 404);
    }
    if ($user->api_token != $request->header('api_token')) {
        return response()->json(['error' => 'Forbidden'], 403); 
    }
    return $user->clients;
    // return Category::all();
});

