<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('home', compact('page_title', 'page_description'));
    }

    public function about()
    {
        return view('about', ['page_title' => "O projektu"]);
    }
}
