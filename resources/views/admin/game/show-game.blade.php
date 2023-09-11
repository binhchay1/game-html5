@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Show Game</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/bootstrap-multiselect-dropdown/bootstrap-multiselect.css') }}">
<style>
    #list-store-game {
        height: 100px;
        width: 100%;
        overflow: auto;
        list-style: none;
    }

    .multiselect-container {
        height: 400px;
        overflow: auto;
        transform: inherit !important;
        top: 37px !important;
    }

    .multiselect-container>li>a>label.checkbox,
    .multiselect-container>li>a>label.radio {
        padding: 0;
        margin-left: 10px;
    }

    .input-group-btn {
        display: none !important;
    }

    .multiselect-search {
        position: static !important;
    }

    .multiselect-native-select {
        display: block;
    }

    .input-group {
        width: 85% !important;
    }
</style>
@endsection

@section('main_content')
<div class="card-header">
    <h3>Show Game</h3>
</div>
<div class="container">
    <form action="{{ route('game.update', $dataGame['id']) }}" method="POST" class="row g-3" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input name="name" value="{{ old('name', $dataGame['name']) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name-store-game" disabled>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="category">Category Game</label>
            <select class="form-select form-control @error('category') is-invalid @enderror" aria-label="Default select example" name="category" disabled>
                @foreach ($dataCategory as $dataCategory)
                <option value="{{ $dataCategory->name }}" {{ $dataCategory->name == $dataGame['category'] ? 'selected' : '' }}>
                    {{ ucfirst($dataCategory->name) }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="tag" class="form-label">Tag</label>
            <select id="tag-selection" multiple="multiple" name="tag[]">
                @foreach($listTag as $tag)
                <option value="{{ $tag }}" {{ in_array($tag, json_decode($dataGame['tag'])) ? 'selected' : '' }}>{{ $tag }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1">
            <label for="count_play" class="form-label">CountPlay</label>
            <input type="text" name="count_play" value="{{ $dataGame['count_play'] }}" class="form-control" disabled>
        </div>
        <div class="col-md-2">
            <label for="status">Status</label>
            <select class="form-control" name="status" disabled>
                @foreach($status as $status => $value)
                <option id="status" value="{{ $value }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Color</label>
            <input type="text" name="color" value="{{ old('color', $dataGame['color']) }}" class="form-control" disabled>
        </div>
        <div class="col-md-1">
            <label class="form-label">TextColor</label>
            <input type="text" name="text_color" value="{{ old('text_color', $dataGame['text_color']) }}" class="form-control" disabled>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <label class="form-label" style="width: 25%;">Upload File</label>
            <ul id="list-store-game" style="padding-left: 0px;">

            </ul>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="img">Thumbs</label>
                <input value="{{ $dataGame['thumbs'] }}" type="file" class="border-0 bg-light pl-0 @error('thumbs') is-invalid @enderror" name="thumbs" id="thumb" accept="image/png, image/gif, image/jpeg, image/jpg, image/gif" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-thumb" width="150" height="150" src="{{ empty($dataGame['thumbs']) ? asset('images/non-image.png') : asset($dataGame['thumbs']) }}" alt="avatar">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="img">Icon</label>
                <input value="{{ $dataGame['icon'] }}" type="file" class="border-0 bg-light pl-0 @error('icon') is-invalid @enderror" name="icon" id="icon" accept="image/png, image/gif, image/jpeg, image/jpg, image/gif" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-icon" width="150" height="150" src="{{ empty($dataGame['icon']) ? asset('images/non-image.png') : asset($dataGame['icon']) }}" alt="avatar">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="img">Background</label>
                <input value="{{ $dataGame['background'] }}" type="file" class="border-0 bg-light pl-0 @error('background') is-invalid @enderror" name="background" id="background" accept="image/png, image/gif, image/jpeg, image/jpg, image/gif" hidden>
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage-background" width="150" height="150" src="{{ empty($dataGame['background']) ? asset('images/non-image.png') : asset($dataGame['background']) }}" alt="avatar">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/plugins/bootstrap-multiselect-dropdown/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('js/admin/game.js') }}"></script>
<script>
    const sourceGame = <?php echo json_encode($sourceGame) ?>;
    $(document).ready(function() {
        for (var i = 0; i < sourceGame.length; i++) {
            let file = sourceGame[i];
            let contentLi = "<li>" + file + "</li>";
            $('#list-store-game').append(contentLi);
        }
    });
</script>
@endsection
