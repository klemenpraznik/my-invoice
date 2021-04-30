<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->authorizeResource(Category::class);
    }

    public function index()
    {
        $page_title = 'Kategorije';

        return view('category/index', compact('page_title'));
    }

    public function create()
    {
        $page_title = 'Dodajanje kategorije';

        return view('category/create', compact('page_title'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:50',
            'description' => ''
        ]);

        auth()->user()->categories()->create($data);
        return redirect("/categories");
    }

    public function show(Category $category)
    {
        $this->authorize('view', $category);

        $page_title = 'Kategorija';
        return view('category/details', compact('page_title', 'category'));
    }

    public function edit(Category $category)
    {
        $this->authorize('view', $category);

        $page_title = 'Urejanje kategorije';
        return view('category/edit', compact('page_title', 'category'));
    }

    public function update(Category $category)
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:50',
            'description' => ''
        ]);
        $category->update($data);
        return redirect("/categories");
    }

    public function delete(Category $category){
        $this->authorize('delete', $category);
        $category->delete();

        return redirect("/categories");
    }
}
