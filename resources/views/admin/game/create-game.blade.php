@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Create Game</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/dropzone.css') }}">
<style>
    #list-store-game {
        height: 350px;
        width: 100%;
        overflow: auto;
        list-style: none;
    }
</style>
@endsection

@section('main_content')
<div class="card-header">
    <h3>Create Game</h3>
</div>
<div class="container">
    <form action="{{ route('game.store') }}" method="POST" class="row g-3" enctype="multipart/form-data" id="form-store-game">
        @csrf
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Name</label>
            <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name-store-game">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="category">Category Game</label>
            <select class="form-select form-control @error('category') is-invalid @enderror" aria-label="Default select example" name="category">
                @foreach ($dataCategory as $dataCategory)
                <option value="{{ $dataCategory->name }}">
                    {{ ucfirst($dataCategory->name) }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="tag" class="form-label">Tag</label>
            <input type="text" name="tag" value="[]" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="count_play" class="form-label">CountPlay</label>
            <input type="text" name="count_play" value="0" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                @foreach($status as $status => $value)
                <option id="status" value="{{ $value }}">{{ $status }}</option>
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
                <input value="thumbs" type="file" class="border-0 bg-light pl-0 @error('thumbs') is-invalid @enderror" name="thumbs" id="thumb" accept="image/png, image/gif, image/jpeg, image/jpg, image/gif" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-thumb" width="150" height="150" src="{{ asset('images/non-image.png') }}" alt="avatar">
                    </div>
                </div>
                <div id="button">
                    <i id="btn_thumb" class="fa fa-camera"></i>
                </div>
                @error('thumbs')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="img">Icon</label>
                <input value="icon" type="file" class="border-0 bg-light pl-0 @error('icon') is-invalid @enderror" name="icon" id="icon" accept="image/png, image/gif, image/jpeg, image/jpg, image/gif" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-icon" width="150" height="150" src="{{ asset('images/non-image.png') }}" alt="avatar">
                    </div>
                </div>
                <div id="button">
                    <i id="btn_icon" class="fa fa-camera"></i>
                </div>
                @error('icon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="img">Background</label>
                <input value="background" type="file" class="border-0 bg-light pl-0 @error('background') is-invalid @enderror" name="background" id="background" accept="image/png, image/gif, image/jpeg, image/jpg, image/gif" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-background" width="150" height="150" src="{{ asset('images/non-image.png') }}" alt="avatar">
                    </div>
                </div>
                <div id="button">
                    <i id="btn_background" class="fa fa-camera"></i>
                </div>
                @error('icon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4 d-flex align-items-center">
            <label class="form-label">Upload File</label>
            <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#upload-file-modal" id="button-upload-store-game">Upload</button>
            <ul id="list-store-game" class="d-none">

            </ul>
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
<script src="{{ asset('js/admin/game.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;
    let myDropzone = new Dropzone(".dropzone", {
        maxFilesize: 256,
        acceptedFiles: ".jpeg, .jpg, .png, .unityweb, .wasm, .html, .js, .css, .jsgz, .data, .json, .datagz, .mem, .mp3, .ogg, .fnt, .tff, .woff, .tff2, .txt, .gif",
        autoProcessQueue: false,
        init: function() {
            this.on("addedfile", file => {
                let reader = new FileReader();
                let form = $("#form-store-game");
                let elementName = $("#name-store-game");
                let elementButton = $("#button-upload-store-game");
                let elementList = $("#list-store-game");
                let elementSource = "<input type='file' class='d-none' name='source[" + file.fullPath + "]' id='" + file.name + "'>";
                let elementItemList = "<li>" + file.name + "</li>";
                let findString = file.fullPath.indexOf('/');
                let gameName = file.fullPath.slice(0, findString);

                if (elementButton.length > 0) {
                    elementButton.remove();
                    elementList.removeClass("d-none");
                }

                form.append(elementSource);
                elementList.append(elementItemList)
                elementName.val(gameName);
                reader.readAsText(file);
                reader.addEventListener("loadend", function(event) {
                    var dataRender = event.target.result;
                    let fileUpload = new File([dataRender], file.name, {
                        lastModified: new Date(),
                    });

                    let fileInput = document.querySelector("input[id='" + file.name + "']");
                    let dataTransfer = new DataTransfer();

                    dataTransfer.items.add(fileUpload);
                    fileInput.files = dataTransfer.files;
                });
            });
        }
    });
</script>
@endsection
