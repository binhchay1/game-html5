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
                                    {{ __('Mật khẩu của bạn đã được thay đổi. Vui lòng đăng nhập với mật khẩu mới để tiếp tục trải nghiệm những trò chơi mà bạn yêu thích. Trang sẽ tự động chuyển hướng sau ') }}
                                    <span id="textCountTime"></span>
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
    this.countTime();

    function countTime() {
        var seconds = 5,
            $seconds = document.querySelector('#textCountTime');
        (function countdown() {
            $seconds.textContent = ' ( ' + seconds + ' ) ';
            if (seconds-- > 0) {
                setTimeout(countdown, 1000);
                return;
            };
            window.location.href = "/login";
        })();
    }
</script>
@endsection
