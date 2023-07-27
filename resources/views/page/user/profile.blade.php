@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Hồ sơ của tôi') }}</title>
@endsection

@section('css')
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="manifest" href="{{ asset('json/manifest.json') }}" crossorigin="use-credentials">
<meta name="viewport" content="width=device-width, initial-scale=1">
@vite('resources/js/user.js')
@vite('resources/sass/user.css')
<style type="text/css">
    .disable-link {
        cursor: not-allowed;
        opacity: 0.5;
    }

    .top-tags ul li {
        list-style-type: none;
    }

    .top-tags ul {
        display: flex;
        flex-direction: row;
    }
</style>
@endsection

@section('content')
<div class="container1">
    <div class="card-header">
        <h3>{{ __('Hồ sơ của tôi') }}</h3>
    </div>
    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
        @csrf
        @if (session('success'))
        <div class="alert alert-success" style="color: green; font-size: 20px;" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control @error('name') is-invalid  @enderror" placeholder="name">
                    @error('name')
                    <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
{{--            <div class="col-md-6">--}}
{{--                <div class="form-group">--}}
{{--                    <div>--}}
{{--                        <label for="img">Image</label>--}}
{{--                        <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>--}}
{{--                        <div class=" choose-avatar">--}}
{{--                            <div id="btnimage">--}}
{{--                                <img id="showImage" style="width: 110px" class="show-avatar" src="{{Auth::user()->image ?? asset('/images/user.jpg')}}" alt="avatar">--}}
{{--                            </div>--}}
{{--                            <div id="button" style="margin-top: 10px;">--}}
{{--                                <i id="btn_chooseImg" class="fa fa-camera"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-6">
                <label for="name">Email</label>
                <input type="text" value="{{Auth::user()->email}}" name="email" class="form-control @error('email') is-invalid  @enderror" placeholder="name" disabled>
                @error('email')
                <span class="invalid-feedback" style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Phone Number</label>
                <input name="phone" value="{{old('phone', Auth::user()->phone)}}"  type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="">
                @error('phone')
                <span class="invalid-feedback" style="font-size: 100%; color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Address</label>
                <input name="address" type="text" value="{{old('address', Auth::user()->address)}}"  class="form-control @error('address') is-invalid @enderror" id="date">
                @error('address')
                <span class="invalid-feedback" style="font-size: 100%;" style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Age</label>
                <input name="age" type="date" value="{{old('age', Auth::user()->age)}}" class="form-control @error('age') is-invalid @enderror">
                @error('age')
                <span class="invalid-feedback" style="font-size: 100%;" style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="status">Gender</label>
                <select class="form-select" aria-label="Default select example" name="sex" id="" >
                    @foreach ($gender as $gender =>$value)
                        <option value="{{ $value }}" @if(Auth::user()->sex == $value) selected @endif>
                            {{$gender  }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Lưu') }}
                </button>
            </div>
        </div>
        <div>
            <a href="{{route('change-password')}}">
                <h3> {{ __('Thay đổi mật khẩu') }}</h3>
            </a>
        </div>
    </form>
</div>
@endsection
