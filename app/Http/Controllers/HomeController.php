<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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

    public function settings()
    {
        //dd(Auth::user());
        $user = Auth::user();
        $page_title = "Nastavitve računa";
        
        return view('settings', compact('page_title', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $user->display_name = $request['display_name'];
        $user->display_address = $request['display_address'];
        $user->display_country = $request['display_country'];
        $user->display_color = $request['display_color'];
        $user->save();
        // dd($user);
        return redirect("/");
    }
}
