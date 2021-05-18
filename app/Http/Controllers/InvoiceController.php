<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_title = 'Računi';

        return view('invoice/index', compact('page_title'));
    }

    public function create()
    {
        $page_title = 'Dodajanje računa';

        return view('invoice/create', compact('page_title'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Invoice $invoice)
    {
        $this->authorize('view', $invoice);

        //dd($invoice->articles->find(1)->product);
        $page_title = 'Račun';
        return view('invoice/details', compact('page_title', 'invoice'));
    }

    public function edit(Invoice $invoice)
    {
        //
    }

    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    public function destroy(Invoice $invoice)
    {
        //
    }
}
