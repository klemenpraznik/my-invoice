@extends('layout.empty')

@section('content')
<div class="mb-20">
    <h3>Pozabljeno geslo</h3>
    <div class="text-muted font-weight-bold">Vnesi email svojega računa</div>
</div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group mb-5">
            <input id="email" type="email" class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group d-flex flex-wrap flex-center mt-10">
            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">{{ __('Pošlji novo geslo') }}</button>
            <a class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2" href="{{ route('login') }}">{{ __('Nazaj na prijavo') }}</a>
        </div>
    </form>
@endsection
