@extends('layout.default')

@section('content')
<div class="container">
<div class="row col-lg-12">
    <div class="card card-custom col-lg-12">
        <div class="card-header">
            <h3 class="card-title">
                Podatki o izdelki - {{ old('name')  ??  $product->name }} ({{ old('shortName')  ??  $product->shortName }})
            </h3>
        </div>
            <div class="card-body">
                {{-- Prva vrsta --}}
                <div class="form-group row">
                    <div class="col-lg-8">
                        <label for="name" class="control-label">Ime izdelka</label>
                        <div class="form-control">
                            <b>{{ $product->name}}</b>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="shortName" class="control-label">Šifra</label>
                        <div class="form-control">
                            {{ $product->shortName}}
                        </div>
                    </div>

                </div>  
                
                {{-- Druga vrsta --}}
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="brand" class="control-label">Znamka</label>
                        <div class="form-control">
                            {{ $product->brand}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="category" class="control-label">Kategorija</label>
                        <div class="form-control">
                            {{ $product->category->name}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="type" class="control-label">Tip</label>
                        <div class="form-control">
                            {{ $product->type}}
                        </div>
                    </div>
                </div>

                {{-- Tretja vrsta --}}
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="unitOfMeasure" class="control-label">Enota mere</label>
                        <div class="form-control">
                            {{ $product->unitOfMeasure}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nabavna cena</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">€</span>
                                </div>
                                <div class="form-control">
                                    {{ $product->purchasePrice}}
                                </div>
                            </div>
                            <span class="form-text text-muted">Cena brez DDV</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Prodajna cena</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">€</span>
                                </div>
                                <div class="form-control">
                                    {{ $product->sellingPrice}}
                                </div>
                            </div>
                            <span class="form-text text-muted">Cena brez DDV</span>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="card-footer">
                <a class="btn btn-primary" href="/products">Nazaj</a>
                <a class="btn btn-secondary" href="/product/edit/{{ $product->id }}">Uredi</a>
            </div>
        </div>
    </div>
</div>
@endsection
