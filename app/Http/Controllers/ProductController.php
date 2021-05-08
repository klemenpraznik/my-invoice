<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_title = 'Izdelki';

        return view('product/index', compact('page_title'));
    }

    public function create()
    {
        $page_title = 'Dodajanje izdelka';

        return view('product/create', compact('page_title'));
    }


    public function store(Request $request)
    {
        $data = request()->validate([
            'category_id' => '',
            'name' => 'required|min:3|max:100',
            'shortName' => 'nullable|min:3|max:20',
            'brand' => 'nullable|min:3|max:20',
            'type' => 'required',
            'unitOfMeasure' => 'required',
            'purchasePrice' => 'nullable|numeric',
            'sellingPrice' => 'nullable|numeric',
        ]);

        auth()->user()->products()->create($data);
        return redirect("/products");
    }

    public function show(Product $product)
    {
        $this->authorize('view', $product);

        $page_title = 'Izdelek';
        return view('product/details', compact('page_title', 'product'));
    }

    public function edit(Product $product)
    {
        $this->authorize('view', $product);

        $page_title = 'Urejanje izdelka';
        return view('product/edit', compact('page_title', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        //dd($product);
        $data = request()->validate([
            'category_id' => '',
            'name' => 'required|min:3|max:100',
            'shortName' => 'nullable|min:3|max:20',
            'brand' => 'nullable|min:3|max:20',
            'type' => 'required',
            'unitOfMeasure' => 'required',
            'purchasePrice' => 'nullable|numeric',
            'sellingPrice' => 'nullable|numeric',
        ]);

        $product->update($data);
        return redirect("/products");
    }

    public function destroy(Product $product)
    {
        //works via API
    }
}
