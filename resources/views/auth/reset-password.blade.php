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
                                <div class="mb-4 text-sm text-gray-600 text-center">
                                    {{ __('Vui lòng nhập mật khẩu mới và tiếp tục hành trình với chúng tôi!') }}
                                </div>
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Hòm thư') }}</label>
                                        <input class="form-control form-register disable-input" id="email" type="email" name="email" value="{{ isset($request->email) ? $request->email : null }}" autocomplete="email" readonly>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">{{ __('Mật khẩu') }}</label>
                                        <input type="password" id="password" class="form-control @if($errors->any()) is-invalid @endif" name="password" required autocomplete="current-password" />
                                        @if($errors->any())
                                        <div class="text-danger mb-3 mt-3" style="font-weight: bolder;">{{ implode('', $errors->all(':message')) }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="form-label">{{ __('Xác nhận mật khẩu') }}</label>
                                        <input class="form-control form-register" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-dark btn-lg btn-block">{{ __('Cài lại mật khẩu') }}</button>
                                    </div>
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
