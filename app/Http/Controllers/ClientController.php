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
        $this->authorize('view', $client);

        $page_title = 'Stranka';
        return view('client/details', compact('page_title', 'client'));
    }

    public function edit(Client $client)
    {
        $this->authorize('view', $client);

        $page_title = 'Urejanje stranke';
        return view('client/edit', compact('page_title', 'client'));
    }

    public function update(Request $request, Client $client)
    {
        if($request->get('taxPayer') == null){
            $request['taxPayer'] = "0";
            $request['taxNumber'] = "";
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

        $client->update($data);
        return redirect("/clients");
    }

    public function destroy(Client $client)
    {
        //works via API
    }
}
