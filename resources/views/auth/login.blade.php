@extends('layouts.auth')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{ asset('images/auth-image.png') }}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height: 100%;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">{{ __('Đăng nhập') }}</span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">{{ __('Hòm thư') }}</label>
                                        <input type="email" id="email" class="form-control @if($errors->any()) is-invalid @endif" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">{{ __('Mật khẩu') }}</label>
                                        <input type="password" id="password" class="form-control @if($errors->any()) is-invalid @endif" name="password" value="{{ old('password') }}" required autocomplete="current-password" autofocus/>
                                    </div>

                                    @if($errors->any())
                                    <div class="text-danger mb-3" style="font-weight: bolder;">{{ implode('', $errors->all(':message')) }}</div>
                                    @endif

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">{{ __('Đăng nhập') }}</button>
                                    </div>
                                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                        <p class="lead fw-normal mb-0 me-3">
                                            {{ __('Đăng nhập với') }}</p>
                                        <a href="{{ route('auth.facebook') }}" class="btn btn-primary btn-floating mx-1" style="width: 40px;">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>

                                        <a href="{{ route('auth.google') }}" class="btn btn-light btn-floating mx-1 text-danger border">
                                            <i class="fab fa-google"></i>
                                        </a>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class="small text-muted" href="{{ route('password.request') }}">{{ __('Quên mật khẩu') }}</a>
                                    @endif
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">{{ __('Bạn chưa có tài khoản ?') }}
                                        <a href="{{route('register')}}" style="color: #393f81;">{{ __('Đăng ký') }}</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
