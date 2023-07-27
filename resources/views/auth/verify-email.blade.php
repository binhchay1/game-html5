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
                                    {{ __('Cám ơn vì đã tham gia cộng đồng của chúng tôi. Trước khi tiếp tục trải nghiệm, hãy kiểm tra hòm thử của bạn để xác thực thông tin mà bạn đã cung cấp. Nếu không nhận được thư hãy ấn vào nút phía bên dưới để chúng tôi có thể gửi lại mẫu thư cho bạn') }}
                                </div>

                                @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                                    {{ __('Thư mới đã gửi đến hòm thư của bạn. Vui lòng kiểm tra lại!') }}
                                </div>
                                @endif

                                <div class="mt-4 flex items-center justify-center">
                                    <form method="POST" action="{{ route('verification.send') }}" class="d-flex justify-content-center">
                                        @csrf
                                        <button id="buttonSendVerify" type="submit" class="btn btn-dark btn-lg btn-block"><span id="textButtonResend">{{ __('Gửi lại thư xác thực') }}</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
