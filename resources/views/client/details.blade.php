@extends('layout.default')

@section('content')
<div class="container">
<div class="row col-lg-12">
    <div class="card card-custom col-lg-12">
        <div class="card-header">
            <h3 class="card-title">
                Podatki o stranki - {{ old('name')  ??  $client->name }}
            </h3>
        </div>
            <div class="card-body">
                {{-- Prva vrsta --}}
                <div class="form-group row">
                    <div class="col-lg-11">
                        <label for="name" class="control-label">Ime in priimek / naziv</label>
                        <div class="form-control">
                            {{ $client->name}}
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <label for="taxPayer" class="control-label">Dav. zav.</label>
                        <span class="switch">
                            <label>
                                <input  id="taxPayer" name="taxPayer" type="checkbox" class="form-control" {{ ($client->taxPayer) ? "checked" : "" }} disabled/>
                                <span></span>
                            </label>
                        </span>
                    </div> 
                </div>

                {{-- Druga vrsta --}}
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label for="type" class="control-label">Tip stranke</label>
                        <div class="form-control">
                            {{ $client->type}}
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="registrationNumber" class="control-label">Matična številka (EMŠO)</label>
                        <div class="form-control">
                            {{ $client->registrationNumber}}
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="taxNumber" class="control-label">Davčna številka</label>
                        <div class="form-control">
                            {{ $client->taxNumber}}
                        </div>
                    </div>
                </div>

                {{-- Tretja vrsta --}}
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="address" class="control-label">Naslov</label>
                        <div class="form-control">
                            {{ $client->address}}
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="country" class="control-label">Država</label>
                        <div class="form-control">
                            {{ $client->country}}
                        </div>
                    </div>
                </div>

                {{-- Tretja vrsta --}}
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="email" class="control-label">Email</label>
                        <div class="form-control">
                            {{ $client->email}}
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="phone" class="control-label">Telefonska številka</label>
                        <div class="form-control">
                            {{ $client->phone}}
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="/clients">Nazaj</a>
                <a class="btn btn-secondary" href="/client/edit/{{ $client->id }}">Uredi</a>
            </div>
        </div>
    </div>
</div>
@endsection
