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
            <div class="dropdown" style="display: grid; align-items: center;">
                <a href="/invoice/export/{{ $invoice->id }}" class="btn btn-default" type="button">
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-10-081610/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
                            </g>
                        </svg><!--end::Svg Icon-->
                    </span>
                    Izvozi PDF
                    <span class="caret"></span>
                </a>
            </div>
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
