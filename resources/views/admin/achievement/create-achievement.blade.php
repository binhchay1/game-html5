@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Create Achievement</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/page/user.css') }}" />
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('main_content')
<div class="card-header">
    <h3>Create Achievement</h3>
</div>
<div class=" container">
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Name</label>
            <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="inputAddress" class="form-label">Description</label>
            <input name="description" type="text" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror">
            @error('description')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="inputAddress" class="form-label">Slug</label>
            <input name="slug" type="text" value="{{ old('slug') }}" class="form-control @error('slug') is-invalid @enderror" disabled>
            @error('slug')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="inputAddress" class="form-label">Points</label>
            <input name="points" type="text" value="{{ old('points') }}" class="form-control @error('points') is-invalid @enderror">
            @error('points')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="inputAddress" class="form-label">Icon</label>
            <input name="icon" type="text" value="{{ old('icon') }}" class="form-control @error('icon') is-invalid @enderror">
            @error('icon')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
</div>
@endsection
