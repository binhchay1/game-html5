@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Game</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection

@section('main_content')
<div class="card-header mt-4">
    <h3>Update Game</h3>
</div>
<div class="container">
    <form action="{{ route('game.update', $dataGame['id']) }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Name</label>
            <input name="name" value="{{ old('name', $dataGame->name) }}" type="text" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Link</label>
            <input name="link" value="{{ old('link', $dataGame->link) }}" type="text" class="form-control @error('link') is-invalid @enderror">
            @error('link')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="status">Category Game</label>
            <select class="form-select form-control @error('category') is-invalid @enderror" aria-label="Default select example" name="category">
                @foreach ($dataCategory as $dataCategory)
                <option value="{{ $dataCategory->name }}" @if($dataGame->category == $dataCategory->name) selected @endif>
                    {{ ucfirst($dataCategory->name) }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div>
                    <label for="img">Thumbs</label>
                    <input value="" type="file" class="border-0 bg-light pl-0 @error('thumbs') is-invalid @enderror" name="thumbs" id="image" accept="image/png, image/gif, image/jpeg, image/jpg" hidden>
                    <div class=" choose-avatar">
                        <div id="btnimage">
                            <img id="showImage" width="150" height="150" src="{{ !empty($dataGame->thumbs) ? $dataGame->thumbs : asset('images/non-image.png') }}" alt="avatar">
                        </div>
                    </div>
                    @error('thumbs')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div>
                    <label for="img">Icon</label>
                    <input value="" type="file" class="border-0 bg-light pl-0 @error('icon') is-invalid @enderror" name="icon" id="image" accept="image/png, image/gif, image/jpeg, image/jpg" hidden>
                    <div class=" choose-avatar">
                        <div id="btnimage">
                            <img id="showImage" width="150" height="150" src="{{ !empty($dataGame->icon) ? $dataGame->icon : asset('images/non-image.png') }}" alt="avatar">
                        </div>
                    </div>
                    @error('icon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div>
                    <label for="img">Background</label>
                    <input value="" type="file" class="border-0 bg-light pl-0 @error('background') is-invalid @enderror" name="background" id="image" accept="image/png, image/gif, image/jpeg, image/jpg" hidden>
                    <div class=" choose-avatar">
                        <div id="btnimage">
                            <img id="showImage" width="150" height="150" src="{{ !empty($dataGame->background) ? $dataGame->background : asset('images/non-image.png') }}" alt="avatar">
                        </div>
                    </div>
                    @error('icon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Tag</label>
            <input type="text" name="tag" value="{{ old('tag', $dataGame->tag )}}" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">CountPlay</label>
            <input type="text" name="count_play" value="{{ old('count_play', $dataGame->count_play) }}" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="status">Status</label>
            <select class="form-select" aria-label="Default select example" name="status">
                @foreach ($status as $status =>$value)
                <option value="{{ $value }}" @if($dataGame->status == $value) selected @endif>
                    {{ $status }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputCity" class="form-label">Color</label>
            <input type="text" name="color" value="{{ old('color', $dataGame->color) }}" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="inputCity" class="form-label">TextColor</label>
            <input type="text" name="text_color" value="{{ old('text_color', $dataGame->text_color) }}" class="form-control">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection
