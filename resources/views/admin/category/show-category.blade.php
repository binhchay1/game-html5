@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Category</title>
@endsection

@section('js_sort_users')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('main_content')
    <div class="card-header mt-4">
        <h3>Category Information</h3>
    </div>
    <div class=" container ">
        <div class="col-md-6">
            <label for="" class="form-label">{{__('Tên')}}</label>
            <input value="{{$dataCategory->name}}" type="text" class="form-control" placeholder="1234 Main St">
        </div>
        <div class="col-md-6 mt-4">
            <label for="" class="form-label">{{__('Tiêu đề')}}</label>
            <input value="{{$dataCategory->title}}" type="text" class="form-control" placeholder="1234 Main St">
        </div>

    </div>
@endsection
