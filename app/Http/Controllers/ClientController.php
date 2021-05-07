<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_title = 'Stranke';

        return view('client/index', compact('page_title'));
    }

    public function create()
    {
        $page_title = 'Dodajanje stranke';

        return view('client/create', compact('page_title'));
    }

    public function store(Request $request)
    {
        if($request->get('taxPayer') == null){
            $request['taxPayer'] = "0";
        } else {
            $request['taxPayer'] = "1";
        }

        $data = request()->validate([
            'name' => 'required|min:3|max:50',
            'type' => 'required',
            'registrationNumber' => 'nullable|min:13|max:13',
            'taxPayer' => '',
            'taxNumber' => 'nullable|min:5|max:15',
            'email' => 'nullable|email',
            'phone' => 'nullable|min:6|numeric',
            'address' => 'nullable|min:5|max:100',
            'country' => 'nullable',
        ]);

        auth()->user()->clients()->create($data);
        return redirect("/clients");
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
        //
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }
}
