@extends('layout.default')

<style>
    label {
        display: flex !important;
        align-items: center !important;
    }
    #dates .col-lg-4 {
        max-width: 32.333%;
    }
    .col-lg-4 {
        vertical-align: top;
    }
    label.bold {
        font-weight: 600;
    }
    .dropdown a {
        margin-left: 20px;
        font-size: 15px;
        color: #181c32;
    }
        .dropdown a:hover {
            color: #3597fc;
        }
</style>

@section('content')
<div class="container">
<div class="row col-lg-12">
    <div class="card card-custom col-lg-12">
        <div class="card-header">
            <h3 class="card-title">
                Račun št. {{ $invoice->id }}
            </h3>
        </div>
            <div class="card-body">
                <h3 class=" text-dark font-weight-bold mb-10">Informacije o stranki:</h3>
                {{-- Prva vrsta --}}
                <div class="form-group row">
                    <label class="col-3">Ime in priimek</label>
                    <div class="col-9">
                        <div class="form-control form-control-solid">
                            {{ $invoice->client->name }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Naslov</label>
                    <div class="col-9">
                        <div class="form-control form-control-solid">
                            {{ $invoice->client->address }}, {{ $invoice->client->country }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Email</label>
                    <div class="col-9">
                        <div class="form-control form-control-solid">
                            <a href="mailTo:{{ $invoice->client->email }}">{{ $invoice->client->email }}</a>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Telefon</label>
                    <div class="col-9">
                        <div class="form-control form-control-solid">
                            <a href="tel:{{ $invoice->client->phone }}">{{ $invoice->client->phone }}</a>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-10"></div>
                <h3 class=" text-dark font-weight-bold mb-10">Datumi:</h3>
                <div class="form-group row">
                    <label class="col-3">Datum računa</label>
                    <div class="col-9">
                        <div class="form-control form-control-solid">
                            {{ date('d. m. Y', strtotime($invoice->invoiceDate)) }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Datum naročila</label>
                    <div class="col-9">
                        <div class="form-control form-control-solid">
                            {{ date('d. m. Y', strtotime($invoice->invoiceDateOfOrder)) }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Datum zapadlosti</label>
                    <div class="col-9">
                        <div class="form-control form-control-solid">
                            {{ date('d. m. Y', strtotime($invoice->invoiceDateOfMaturity)) }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Datum opr. storitve od</label>
                    <div class="col-9">
                        <div class="form-control form-control-solid">
                            {{ date('d. m. Y', strtotime($invoice->invoiceServiceFrom)) }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Datum opr. storitve do</label>
                    <div class="col-9">
                        <div class="form-control form-control-solid">
                            {{ date('d. m. Y', strtotime($invoice->invoiceServiceUntil)) }}
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-10"></div>
                <h3 class=" text-dark font-weight-bold mb-10">Postavke:</h3>
                <div class="my-5 table-responsive-xl">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Produkt</th>
                                <th scope="col">Količina</th>
                                <th scope="col">Cena brez DDV</th>
                                <th scope="col">Popust</th>
                                <th scope="col">DDV</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if (count($invoice->articles) == 0)
                                Račun nima postavk! 
                            @endif
                            @foreach ($invoice->articles as $article)
                                <tr>
                                    <td>{{ $article->product->name }}</td>
                                    <td>{{ $article->quantity }} {{ $article->product->unitOfMeasure}}</td>
                                    <td>{{ $article->price }} €</td>
                                    <td>{{ $article->discount }} %</td>
                                    <td>{{ $article->taxRate }} %</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="separator separator-dashed my-10"></div>
                        <div class="my-5">
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label class="col-6">Skupaj brez DDV:</label>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                            <input class="form-control" value="{{ $invoice->totalExcludingVAT }}" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label class="col-6">Popust:</label>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                            <input class="form-control" value="{{ $invoice->discountAmount }}" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label class="col-6">Znesek brez DDV:</label>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                            <input class="form-control" value="{{ $invoice->amountExludingVAT }}" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label class="col-6 bold">Znesek z DDV:</label>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                            <input class="form-control" value="{{ $invoice->amountIncludingVAT }}" disabled />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="/invoices">Nazaj</a>
                {{-- <a class="btn btn-secondary" href="/invoice/edit/{{ $invoice->id }}">Uredi</a> --}}
            </div>
        </div>
    </div>
</div>
@endsection
