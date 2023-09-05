@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Game</title>
@endsection

@section('main_content')
<div class="card-header">
    <h3>Game Information</h3>
</div>
<div class=" container row g-3">
    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Name</label>
        <input value="{{ $dataGame->name }}" type="text" class="form-control" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Link</label>
        <input value="{{ $dataGame->link }}" type="text" class="form-control" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Category Game</label>
        <input type="text" value="{{ $dataGame->categories->name }}" class="form-control" disabled>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="img">Thumbs</label>
            <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden disabled>
            <div class=" choose-avatar">
                <div id="btnimage">
                    <img id="showImage" style="height: 150px; width: 150px" src="{{ !empty($dataGame->thumbs) ? $dataGame->thumbs : asset('images/non-image.png') }}" alt="avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="img">Icon</label>
            <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden disabled>
            <div class=" choose-avatar">
                <div id="btnimage">
                    <img id="showImage" style="height: 150px; width: 150px" src="{{ !empty($dataGame->icon) ? $dataGame->icon : asset('images/non-image.png') }}" alt="avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="img">Background</label>
            <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden disabled>
            <div class=" choose-avatar">
                <div id="btnimage">
                    <img id="showImage" style="height: 150px; width: 150px" src="{{ !empty($dataGame->background) ? $dataGame->background : asset('images/non-image.png') }}" alt="avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <label for="inputCity" class="form-label">Tag</label>
        <input type="text" value="{{ $dataGame->tag }}" class="form-control" id="inputCity" disabled>
    </div>
    <div class="col-md-4">
        <label for="inputCity" class="form-label">CountPlay</label>
        <input type="text" value="{{ $dataGame->count_play }}" class="form-control" id="inputCity" disabled>
    </div>
    <div class="col-md-4">
        <label for="inputCity" class="form-label">Status</label>
        <input type="text" value="{{ $dataGame->status }}" class="form-control" id="inputCity" disabled>
    </div>
    <div class="col-md-2">
        <label for="inputCity" class="form-label">Color</label>
        <input type="text" value="{{ $dataGame->color }}" class="form-control" id="inputCity" disabled>
    </div>
    <div class="col-md-2">
        <label for="inputCity" class="form-label">TextColor</label>
        <input type="text" value="{{ $dataGame->text_color }}" class="form-control" id="inputCity" disabled>
    </div>
</div>
@endsection
