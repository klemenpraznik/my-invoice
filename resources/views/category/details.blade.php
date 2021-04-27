@extends('layout.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        O kategoriji - {{ $category->name }}
                    </h3>
                </div>

                <div class="card-body">
                    <div>
                        <dl class="row">
                            <dt class="col-sm-2">Naziv kategorije:</dt>
                            <dd class="col-sm-10">{{ $category->name}}</dd>

                            <dt class="col-sm-2">Opis kategorije:</dt>
                            <dd class="col-sm-10">{{ $category->description}}</dd>
                        </dl>
                    </div>
                </div>

                <div class="card-footer">
                    <a class="btn btn-primary" href="/categories">Nazaj</a>
                    <a class="btn btn-secondary" href="/category/edit/{{ $category->id }}">Uredi</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
