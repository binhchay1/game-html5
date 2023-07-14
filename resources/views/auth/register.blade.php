@extends('layouts.auth')

@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://www.team17.com/wp-content/uploads/2020/08/MovingOut-Desktop-Tile2.jpg"
                                     alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height: 100%;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Register</span>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                                            <label class="form-label" for="form2Example17">Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" required autocomplete="current-password"/>
                                            <label class="form-label" for="form2Example27">Password Confirm</label>
                                        </div>
                                        @if(isset($errors))
                                            @foreach ($errors->all() as $error)
                                                <div style="color: red; margin: 10px">{{ $error }}</div>
                                            @endforeach
                                        @endif
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
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
