@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Game</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/dropzone.css') }}">
@endsection

@vite('resources/js/game-icon.js')
@vite('resources/js/game-background.js')
@vite('resources/js/game-thumb.js')

@section('main_content')
<div class="card-header mt-4">
    <h3>Create Game</h3>
</div>
<div class="container">
    <form action="{{ route('game.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Name</label>
            <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="">
            @error('name')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="status">Category Game</label>
            <select class="form-select form-control @error('category') is-invalid @enderror" aria-label="Default select example" name="category" id="">
                @foreach ($dataCategory as $dataCategory)
                <option value="{{ $dataCategory->name }}">
                    {{ $dataCategory->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Tag</label>
            <input type="text" name="tag" value="{{ old('tag') }}" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="inputCity" class="form-label">CountPlay</label>
            <input type="text" name="count_play" value="{{ old('count_play') }}" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="status">Status</label>
            <select class="form-select" name="status">
                @foreach($status as $status => $value)
                <option selected id="status" value="{{ $value }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Color</label>
            <input type="text" name="color" value="{{ old('color') }}" class="form-control">
        </div>
        <div class="col-md-2">
            <label class="form-label">TextColor</label>
            <input type="text" name="text_color" value="{{ old('text_color') }}" class="form-control">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="img">Thumbs</label>
                <input value="thumbs" type="file" class="border-0 bg-light pl-0 @error('thumbs') is-invalid @enderror" name="thumbs" id="thumb" accept="image/png, image/gif, image/jpeg, image/jpg" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-thumb" style="height: 150px; width: 150px" src="{{ asset('images/non-image.png') }}" alt="avatar">
                    </div>
                </div>
                <div id="button">
                    <i id="btn_thumb" class="fa fa-camera"></i>
                </div>
                @error('thumbs')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="img">Icon</label>
                <input value="icon" type="file" class="border-0 bg-light pl-0 @error('icon') is-invalid @enderror" name="icon" id="icon" accept="image/png, image/gif, image/jpeg, image/jpg" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-icon" style="height: 150px; width: 150px" src="{{ asset('images/non-image.png') }}" alt="avatar">
                    </div>
                </div>
                <div id="button">
                    <i id="btn_icon" class="fa fa-camera"></i>
                </div>
                @error('icon')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="img">Background</label>
                <input value="background" type="file" class="border-0 bg-light pl-0 @error('background') is-invalid @enderror" name="background" id="background" accept="image/png, image/gif, image/jpeg, image/jpg" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-background" style="height: 150px; width: 150px" src="{{ asset('images/non-image.png') }}" alt="avatar">
                    </div>
                </div>
                <div id="button">
                    <i id="btn_background" class="fa fa-camera"></i>
                </div>
                @error('icon')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-2 mt-5 d-flex align-items-center">
            <label class="form-label">Upload File</label>
            <button type="button" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#upload-file-modal">Upload</button>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
</div>

@include('includes.modal_upload_file')
@endsection

@section('js')
<script src="{{ asset('js/admin/dropzone.js') }}"></script>
<script type="text/javascript">
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone", {
        maxFilesize: 256,
        acceptedFiles: ".jpeg, .jpg, .png, .unityweb, .wasm, .html, .js, .css, .jsgz, .data, .json, .datagz, .mem, .mp3, .ogg, .fnt, .tff, .woff, .tff2, .txt",
        autoProcessQueue: false,
        init: function() {
            this.on("addedfile", file => {
                var reader = new FileReader();
                reader.readAsText(file);

                const fileInput = document.querySelector('input[type="file"]');
                const myFile = new File(reader, 'myFile.txt', {
                    lastModified: new Date(),
                });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(myFile);
                fileInput.files = dataTransfer.files;
            });
        }
    });
</script>
@endsection
