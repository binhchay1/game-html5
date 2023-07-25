@extends('layouts.admin')

@section('js_sort_users')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@vite('resources/js/user.js')
@section('main_content')
    <div class="card-header mt-4">
        <h3>{{ __('Cập nhâp thông tin người dùng') }}</h3>
    </div>
    <div class=" container ">
        <form action="{{route('user.updateUser', $dataUser['id'])}}" method="POST" class="row g-3"  enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">{{__('Tên')}}</label>
                <input name="name" value="{{old('name', $dataUser->name)}}"  type="text" class="form-control @error('name') is-invalid @enderror" placeholder="">
                @error('name')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div>
                        <label for="img">Image</label>
                        <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                        @error('image')
                        <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class=" choose-avatar">
                            <div id="btnimage">
                                <img id="showImage" style="width: 150px" class="show-avatar" src="{{ $dataUser->image ?? asset('/images/user.jpg')}}" alt="avatar">
                            </div>
                            <div id="button">
                                <i id="btn_chooseImg" class="fa fa-camera"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">{{__('Email')}}</label>
                <input name="email" value="{{old('email', $dataUser->email)}}"  type="email"   class="form-control @error('email') is-invalid @enderror" placeholder="">
                @error('email')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">{{__('Số điện thoại')}}</label>
                <input name="phone" value="{{old('phone', $dataUser->phone)}}"  type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="">
                @error('phone')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">{{__('Địa chỉ')}}</label>
                <input name="address" type="text" value="{{old('address', $dataUser->address)}}"  class="form-control @error('address') is-invalid @enderror" id="inputCity">
                @error('address')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">{{__('Tuổi')}}</label>
                <input name="age" type="text" value="{{old('age', $dataUser->age)}}"   class="form-control @error('age') is-invalid @enderror" id="inputCity">
                @error('age')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="status">{{__('Giới tính')}}</label>
                <select class="form-select" aria-label="Default select example" name="sex" id="" >
                    @foreach ($gender as $gender =>$value)
                        <option value="{{ $value }}" @if($dataUser->sex == $value) selected @endif>
                            {{$gender  }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">{{__('Cập nhập')}}</button>
            </div>
        </form>
    </div>
@endsection
