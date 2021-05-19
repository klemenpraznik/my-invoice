<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use PDF;

function generateFileName(Invoice $invoice){
    return "racun-" . $invoice->id . "-" . strtolower(str_replace(" ", "-", $invoice->client->name));
}

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

    

    public function createPDF(Invoice $invoice) {
        // dd($invoice->user);
        // $data = $invoice
        // https://www.positronx.io/laravel-pdf-tutorial-generate-pdf-with-dompdf-in-laravel/

        // share data to view
        view()->share('invoice', $invoice);

        $pdf = PDF::loadView('invoice/export', $invoice);

        $fileName = generateFileName($invoice);

        // download PDF file with download method
        return $pdf->download($fileName);
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
