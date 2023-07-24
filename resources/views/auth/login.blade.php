@extends('layouts.auth')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="https://www.team17.com/wp-content/uploads/2020/08/MovingOut-Desktop-Tile2.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height: 100%;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Login</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                        <label class="form-label" for="form2Example17">Email address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                        <label class="form-label" for="form2Example27">Password</label>
                                    </div>
                                    @if(isset($errors))
                                    @foreach ($errors->all() as $error)
                                    <div style="color: red; margin: 10px">{{ $error }}</div>
                                    @endforeach
                                    @endif
                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                    </div>
                                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                        <p class="lead fw-normal mb-0 me-3">Login in with</p>
                                        <a href="{{ route('auth.facebook') }}" class="btn btn-primary btn-floating mx-1" style="width: 40px;">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>

                                        <a href="{{ route('auth.google') }}" class="btn btn-light btn-floating mx-1 text-danger border">
                                            <i class="fab fa-google"></i>
                                        </a>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class="small text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                    @endif
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account?
                                        <a href="{{route('register')}}" style="color: #393f81;">Register here</a>
                                    </p>
                                    <a href="#!" class="small text-muted">Terms of use.</a>
                                    <a href="#!" class="small text-muted">Privacy policy</a>
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
