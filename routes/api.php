<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Category;
use \App\Models\User;

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

Route::delete('user/{id}/client/{client_id}', function(Int $id, Int $client_id, Request $request) {
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
    $client = $user->clients->find($client_id);
    if ($client == null) {
        return response()->json(['error' => 'Client not found.'], 404);
    }
    $client->delete();
    return response()->json("Success", 200);
});

// Products
Route::get('user/{id}/products', function(Int $id, Request $request) {
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
    return $user->products->load(['category']);
});

Route::delete('user/{id}/product/{product_id}', function(Int $id, Int $product_id, Request $request) {
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
    $product = $user->products->find($product_id);
    if ($product == null) {
        return response()->json(['error' => 'Product not found.'], 404);
    }
    $product->delete();
    return response()->json("Success", 200);
});

// Invoices
Route::get('user/{id}/invoices', function(Int $id, Request $request) {
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
    
    return $user->invoices->load(['client']);
});

Route::post('user/{id}/invoice', function(Int $id, Request $request) {
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

    $data = request()->validate([
        'clientId' => '',
        'invoiceDate' => 'nullable|date',
        'invoiceServiceFrom' => 'nullable|date',
        'invoiceServiceUntil' => 'nullable|date',
        'invoiceDateOfMaturity' => 'nullable|date',
        'invoiceDateOfOrder' => 'nullable|date',
        'totalExcludingVAT' => 'nullable|numeric',
        'discountAmount' => 'nullable|numeric',
        'amountExludingVAT' => 'nullable|numeric',
        'amountIncludingVAT' => 'nullable|numeric',
        'paidAmount' => 'nullable|numeric'        
    ]);
    
    $data['client_id'] = $data['clientId'];
    unset($data['clientId']);
    $data['user_id'] = $user->id;
    $data['discountPercent'] = 0;
    $data['created_at'] = date("Y-m-d H:i:s");;
    $data['updated_at'] = date("Y-m-d H:i:s");;
    //dd($data);
    $new_id = $user->invoices()->create($data)->id;
    //dd($new_id);
    return response()->json(array('success' => true, 'new_id' => $new_id), 200);
});

Route::delete('user/{id}/invoice/{invoice_id}', function(Int $id, Int $invoice_id, Request $request) {
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
    $invoice = $user->invoices->find($invoice_id);
    if ($invoice == null) {
        return response()->json(['error' => 'Invoice not found.'], 404);
    }
    $invoice->delete();
    return response()->json("Success", 200);
});

//Articles
Route::post('user/{id}/articles', function(Int $id, Request $request) {
    
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

    $invoice = $user->invoices()->find($request['documentId']);
    //dd($invoice);

    $list_od_articles = $request['articles'];


    foreach($list_od_articles as $single_article){
        $single_article['invoice_id'] = $single_article['documentId'];
        unset($single_article['documentId']);

        $single_article['product_id'] = $single_article['productId'];
        unset($single_article['productId']);

        $invoice->articles()->create($single_article);
    }
    return response()->json("Success", 200);
});
