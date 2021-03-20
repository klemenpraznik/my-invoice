@extends('layout.empty')

@section('content')
<div class="mb-20">
    <h3>Registracija</h3>
    <div class="text-muted font-weight-bold">Vnesi svoje podatke</div>
</div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group mb-5">
            <input id="name" type="text" class="form-control h-auto form-control-solid py-4 px-8 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Ime" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-5">
            <input id="email" type="email" class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-5">
            <input id="password" type="password" class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Geslo">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-5">
            <input id="password-confirm" type="password" class="form-control h-auto form-control-solid py-4 px-8" name="password_confirmation" required autocomplete="new-password"  placeholder="Ponovi geslo">
        </div>

        <div class="form-group d-flex flex-wrap flex-center mt-10">
            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">{{ __('Registracija') }}</button>
            <a class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2" href="{{ route('login') }}">{{ __('Nazaj na prijavo') }}</a>
        </div>
    </form>
@endsection
