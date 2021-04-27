@extends('layout.default')

@section('content')
<div class="container">
<div class="row col-lg-12">
    <div class="card card-custom col-lg-12">
            <div class="card-header">
                <h3 class="card-title">
                    Dodajanje nove kategorije
                </h3>
            </div>
            <form method="POST" action="/category" encrypte="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-5">
                        <label for="name" class="control-label">Naziv kategorije</label>
                        <input  id="name" 
                                type="text"
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                placeholder="Vnesite naziv kategorije" autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group mb-5">
                        <label for="description" class="control-label">Opis kategorije</label>
                        <textarea   id="description" 
                                    class="form-control @error('description') is-invalid @enderror" 
                                    name="description" 
                                    placeholder="Vnesite opis kategorije" 
                                    rows="4" autofocus></textarea>

                        @error('text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button id="kt_login_signin_submit" type="submit" class="btn btn-primary">
                        {{ __('Shrani') }}
                    </button>
                    <a class="btn btn-secondary" href="/categories">Prekliči</a>
                </div>

                
                    </div>
                </div>
            </form>
    </div>
</div>
</div>
@endsection
