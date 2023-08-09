@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Game</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
<title>Webappfix - Laravel 9 Multiple Upload Images using Dropzone drag and drop</title>
<meta name="_token" content="{{csrf_token()}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.2/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.js"></script>
@vite('resources/js/game-icon.js')
@vite('resources/js/game-background.js')
@vite('resources/js/game-thumb.js')
@section('main_content')
<div class="card-header mt-4">
    <h3>Create Game</h3>
</div>
<div class="container">
    <form action="{{route('game.store')}}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Name</label>
            <input name="name" value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="">
            @error('name')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Link</label>
            <input name="link" value="{{old('link')}}" type="text" class="form-control @error('link') is-invalid @enderror" placeholder="">
            @error('link')
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
                    {{$dataCategory->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="img">Thumbs</label>
                <input value="thumbs" type="file" class="border-0 bg-light pl-0 @error('thumbs') is-invalid @enderror" name="thumbs" id="thumb" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-thumb" style="height: 150px; width: 150px" src="" alt="avatar">
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
                <input value="icon" type="file" class="border-0 bg-light pl-0 @error('icon') is-invalid @enderror" name="icon" id="icon" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-icon" style="height: 150px; width: 150px" src=" " alt="avatar">
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
                <input value="background" type="file" class="border-0 bg-light pl-0 @error('background') is-invalid @enderror" name="background" id="background" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-background" style="height: 150px; width: 150px" src="" alt="avatar">
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
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Tag</label>
            <input type="text" name="tag" value="{{old('tag')}}" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">CountPlay</label>
            <input type="text" name="count_play" value="{{old('count_play')}}" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="status">Status</label>
            <select class="form-select" aria-label="Default select example" name="status" id="">
                @foreach($status as $status => $value)
                <option selected id="status" value="{{$value}}">{{$status}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputCity" class="form-label">Color</label>
            <input type="text" name="color" value="{{old('color')}}" class="form-control" id="inputCity">
        </div>
        <div class="col-md-2">
            <label for="inputCity" class="form-label">TextColor</label>
            <input type="text" name="text_color" value="{{old('text_color')}}" class="form-control" id="inputCity">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
</div>
<div id="myModal" class="modal fade" style="{{Session::has("code") ? Session::get('code')==1 ? "display:block":"" : "display:none"}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <p>
            <h1>Laravel 9 Multiple Upload Images using Dropzone drag and drop</h1>
            </p>
            <form method="post" action="{{route('game.image')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                @csrf
            </form>
            <div class="modal-body">
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" id="close" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#myModal').modal('show');
        $(document).on('click', '#close', function() {
            $('#myModal').modal('hide');
        });

    });
    Dropzone.options.dropzone = {
        init: function() {
            this.on("sending", function(file, xhr, data) {

                console.log(file);
            });
        },
        maxFilesize: 12,
        addRemoveLinks: true,
        timeout: 5000,
        success: function(file, response) {
            console.log(response);
        },
        error: function(file, response) {
            return false;
        }
    };
</script>
@endsection
