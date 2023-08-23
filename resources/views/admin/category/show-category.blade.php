@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Show Category</title>
@endsection

@section('main_content')
    <div class="card-header mt-4">
        <h3>Category Information</h3>
    </div>
    <div class=" container ">
        <div class="col-md-6">
            <label for="" class="form-label">Name</label>
            <input value="{{$dataCategory->name}}" type="text" class="form-control">
        </div>
        <div class="col-md-6 mt-4">
            <label for="" class="form-label">Title</label>
            <input value="{{$dataCategory->title}}" type="text" class="form-control">
        </div>

    </div>
@endsection
