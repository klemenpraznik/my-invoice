@extends('layout.empty')

@section('content')
<div class="mb-20">
    <h3>Prijavi se</h3>
    <div class="text-muted font-weight-bold">Vnesi email in geslo za prijavo v sistem:</div>
</div>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group mb-5">
        <input id="email" type="email" class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-5">
        <input id="password" type="password" class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Geslo">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
        <div class="checkbox-inline">
            <label class="checkbox m-0 text-muted">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <span></span>
                    {{ __('Zapomni si me') }}
            </label>
        </div>
    </div>

    <button id="kt_login_signin_submit" type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">
        {{ __('Prijava') }}
    </button>
        </div>
    </div>
</form>
<div class="mt-10">
    <span class="opacity-70 mr-4">Še nimaš računa?</span>
    <a id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold" href="{{ route('register') }}">Registriraj se!</a>
</div>
<div class="mt-10">
    <span class="opacity-70 mr-4">Si pozabil geslo?</span>
    <a id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold" href="{{ route('password.request') }}">Pozabljeno geslo.</a>
</div>
@endsection

