@extends('layouts.page')

@section('title')
<title>env('APP_NAME', 'Gamekafe') - {{ __('Thông tin') }}</title>
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
    <form method="POST" action="{{route('user.update')}}" enctype="multipart/form-data">
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
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" value="{{Auth::user()->email}}" name="email" class="form-control @error('email') is-invalid  @enderror" placeholder="name">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div>
                        <label for="img">Image</label>
                        <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                        <div class=" choose-avatar">
                            <div id="btnimage">
                                <img id="showImage" style="width: 45px" class="show-avatar" src="{{asset('/images/user.jpg')}}" alt="avatar">
                            </div>
                            <div id="button">
                                <i id="btn_chooseImg" class="fa fa-camera"></i>
                            </div>
                        </div>
                    </div>
                </div>
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
                <h3>{{ __('Thay đổi mật khẩu') }}</h3>
            </a>
        </div>

    </form>
</div>
@endsection
