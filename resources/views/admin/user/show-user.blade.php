@extends('layouts.admin')

@section('js_sort_users')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('main_content')
    <div class="card-header mt-4">
        <h3>{{ __('Thông tin người dùng') }}</h3>
    </div>
    <div class=" container row g-3">
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">{{__('Tên')}}</label>
            <input value="{{$dataUser->name}}" type="email" class="form-control" placeholder="1234 Main St">
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">{{__('Email')}}</label>
            <input value="{{$dataUser->email}}" type="text" class="form-control" placeholder="1234 Main St">
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">{{__('Số điện thoại')}}</label>
            <input type="text" value="{{$dataUser->phone}}" class="form-control" placeholder="1234 Main St">
        </div>
        <div class="col-md-3">
            <div class="form-group" >
                <div style="">
                    <label for="img">{{__('Hình ảnh')}}</label>
                    <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                    <div class=" choose-avatar" >
                        <div id="btnimage">
                            <img id="showImage" style="height: 150px; width: 150px" src="{{$dataUser->image ? $dataUser->image : url('/images/user.jpg')}}" alt="avatar">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">{{__('Địa chỉ')}}</label>
            <input type="text" value= "{{$dataUser->address}}" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">{{__('Tuổi')}}</label>
            <input type="text" value="{{$dataUser->age}}" class="form-control" id="inputCity">
        </div>
        <div class="col-md-2">
            <label for="inputCity" class="form-label">{{__('Giới tính')}}</label>
            <input type="text" value="{{$dataUser->sex == 0 ? "Nam" : "Nữ"}}" class="form-control" id="inputCity">
        </div>
    </div>
@endsection
