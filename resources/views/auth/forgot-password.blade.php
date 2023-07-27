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
                                    {{ __('Bạn quên mật khẩu ? Đừng quá lo lắng. Hãy cho chúng tôi biết hòm thư của bạn. Chúng tôi sẽ gửi thư hướng dẫn cho bạn') }}
                                </div>

                                <div class="mt-4">
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="block">
                                            <input id="email" class="form-control @if($errors->any()) is-invalid @endif" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                                        </div>

                                        @if($errors->any())
                                        <div class="text-danger mb-3 mt-3" style="font-weight: bolder;">{{ implode('', $errors->all(':message')) }}</div>
                                        @endif

                                        <div class="d-flex justify-content-center mt-4">
                                            <button class="btn btn-dark btn-lg btn-block">
                                                {{ __('Cài lại mật khẩu') }}
                                            </button>
                                        </div>
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

@section('js')
<script>
    const btn = document.getElementById("buttonSendVerify");
    this.disableButton();

    function disableButton() {
        btn.disabled = true;
        var seconds = 60,
            $seconds = document.querySelector('#textButtonResend');
        const text = "{{ __('Gửi lại thư xác thực') }}";
        btn.classList.add("disable-button-with-timer");
        (function countdown() {
            $seconds.textContent = text + ' ( ' + seconds + ' ) ';
            if (seconds-- > 0) {
                setTimeout(countdown, 1000);
                return;
            };
            btn.disabled = false;
            $seconds.textContent = text;
            btn.classList.remove("disable-button-with-timer");
        })();
    }
</script>
@endsection
