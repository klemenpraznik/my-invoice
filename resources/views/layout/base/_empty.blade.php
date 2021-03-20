@if(config('layout.self.layout') == 'blank')
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else
    <div class="d-flex flex-column flex-root">
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url({{ asset('/media/img/bg-3.jpg') }});">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="{{ asset('/media/img/logo-2.png') }}" class="max-h-75px w-100" alt="" />
                        </a>
                    </div>
                    <div class="login-signin">
                        @include('layout.base._content')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif


