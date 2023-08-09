@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Game</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('main_content')
<div class="card-header mt-4">
    <h3>Game Information</h3>
</div>
<div class=" container row g-3">
    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Name</label>
        <input value="{{$dataGame->name}}" type="text" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Link</label>
        <input value="{{$dataGame->link}}" type="text" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Category Game</label>
        <input type="text" value="{{$dataGame->categories->name}}" class="form-control">
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="img">Thumbs</label>
            <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
            <div class=" choose-avatar">
                <div id="btnimage">
                    <img id="showImage" style="height: 150px; width: 150px" src="{{$dataGame->thumbs}}" alt="avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="img">Icon</label>
            <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
            <div class=" choose-avatar">
                <div id="btnimage">
                    <img id="showImage" style="height: 150px; width: 150px" src="{{$dataGame->icon }} " alt="avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="img">Background</label>
            <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
            <div class=" choose-avatar">
                <div id="btnimage">
                    <img id="showImage" style="height: 150px; width: 150px" src="{{$dataGame->background}}" alt="avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <label for="inputCity" class="form-label">Tag</label>
        <input type="text" value="{{$dataGame->tag}}" class="form-control" id="inputCity">
    </div>
    <div class="col-md-4">
        <label for="inputCity" class="form-label">CountPlay</label>
        <input type="text" value="{{$dataGame->count_play}}" class="form-control" id="inputCity">
    </div>
    <div class="col-md-4">
        <label for="inputCity" class="form-label">Status</label>
        <input type="text" value="{{$dataGame->status}}" class="form-control" id="inputCity">
    </div>
    <div class="col-md-2">
        <label for="inputCity" class="form-label">Color</label>
        <input type="text" value="{{$dataGame->color}}" class="form-control" id="inputCity">
    </div>
    <div class="col-md-2">
        <label for="inputCity" class="form-label">TextColor</label>
        <input type="text" value="{{$dataGame->text_color}}" class="form-control" id="inputCity">
    </div>
</div>
@endsection
