@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Category</title>
@endsection

@section('main_content')
    <div class="card-header mt-4">
        <h3>Update Category</h3>
    </div>
    <div class=" container">
        <form action="{{ route('category.update', $dataCategory['id']) }}" method="POST"   enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Name</label>
                <input name="name" value="{{ old('name', $dataCategory->name) }}"  type="text" class="form-control @error('name') is-invalid @enderror" placeholder="">
                @error('name')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-6 mt-4">
                <label for="inputAddress" class="form-label">Title</label>
                <input name="title" type="text" value="{{ old('title', $dataCategory->title) }}"   class="form-control @error('title') is-invalid @enderror" placeholder="">
                @error('title')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
