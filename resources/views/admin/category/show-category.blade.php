@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Show Category</title>
@endsection

@section('main_content')
    <div class="card-header">
        <h3>Category Information</h3>
    </div>
    <div class=" container ">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input name="name" value="{{$dataCategory->name}}" type="text" class="form-control">
        </div>
        <div class="col-md-6 mt-4">
            <label for="title" class="form-label">Title</label>
            <input name="title" value="{{$dataCategory->title}}" type="text" class="form-control">
        </div>

    </div>
@endsection
