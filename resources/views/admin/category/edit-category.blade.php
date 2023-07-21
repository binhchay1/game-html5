@extends('layouts.admin')

@section('js_sort_users')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('main_content')
    <div class="card-header mt-4">
        <h3>{{ __('Tạo Thể Loại') }}</h3>
    </div>
    <div class=" container">
        <form action="{{route('category.update', $dataCategory['id'])}}" method="POST"   enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">{{__('Tên')}}</label>
                <input name="name" value="{{old('name', $dataCategory->name)}}"  type="text" class="form-control @error('name') is-invalid @enderror" placeholder="">
                @error('name')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-6 mt-4">
                <label for="inputAddress" class="form-label">{{__('Tiêu đề')}}</label>
                <input name="title" type="text" value="{{old('title', $dataCategory->title)}}"   class="form-control @error('title') is-invalid @enderror" placeholder="">
                @error('title')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-success">{{__('Tạo')}}</button>
            </div>
        </form>
    </div>
@endsection
