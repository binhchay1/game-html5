@extends('layouts.page')

@section('title')
    <title>{{ env('APP_NAME', 'Gamekafe') }}</title>
@endsection

@section('css')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="manifest" href="{{ asset('json/manifest.json') }}" crossorigin="use-credentials">
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Thay đổi mật khẩu') }}</h3>
                    </div>
                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert text-alert-success" style="color: green; font-size: 20px;" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                       placeholder="Old Password">
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @if(session('error'))
                                    <div class="alert text-alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                       placeholder="New Password">
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                       placeholder="Confirm New Password">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">{{ __('Lưu') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
