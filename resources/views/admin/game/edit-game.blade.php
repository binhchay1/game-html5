@extends('layouts.admin')

@section('js_sort_users')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@vite('resources/js/user.js')
@section('main_content')
    <div class="card-header mt-4">
        <h3>{{ __('Sửa thông tin game') }}</h3>
    </div>
    <div class="container">
        <form action="{{route('game.update', $dataGame['id'])}}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">{{__('Tên')}}</label>
                <input name="name"value="{{old('name', $dataGame->name)}}"  type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="">
                @error('name')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">{{__('Liên kết')}}</label>
                <input name="link" value="{{old('link', $dataGame->link)}}" type="text"  class="form-control @error('link') is-invalid @enderror" placeholder="" >
                @error('link')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="status">{{__('Thể loại game')}}</label>
                <select class="form-select form-control @error('category') is-invalid @enderror" aria-label="Default select example" name="category" id="" >
                    @foreach ($dataCategory as $dataCategory)
                        <option value="{{ $dataCategory->name }}" @if($dataGame->category == $dataCategory->name) selected @endif>
                            {{$dataCategory->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <div class="form-group" >
                    <div style="">
                        <label for="img">{{__('Thumbs')}}</label>
                        <input value="" type="file" class="border-0 bg-light pl-0 @error('thumbs') is-invalid @enderror" name="thumbs" id="image" hidden>
                        <div class=" choose-avatar" >
                            <div id="btnimage">
                                <img id="showImage" style="height: 150px; width: 150px" src="{{ $dataGame->thumbs}}" alt="avatar">
                            </div>
                        </div>
                        @error('thumbs')
                        <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group" >
                    <div style="">
                        <label for="img">{{__('Icon')}}</label>
                        <input value="" type="file" class="border-0 bg-light pl-0 @error('icon') is-invalid @enderror" name="icon" id="image" hidden>
                        <div class=" choose-avatar" >
                            <div id="btnimage">
                                <img id="showImage" style="height: 150px; width: 150px" src="{{ $dataGame->icon}} " alt="avatar">
                            </div>
                        </div>
                        @error('icon')
                        <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group" >
                    <div style="">
                        <label for="img">{{__('Background')}}</label>
                        <input value="" type="file" class="border-0 bg-light pl-0 @error('background') is-invalid @enderror" name="background" id="image" hidden>
                        <div class=" choose-avatar" >
                            <div id="btnimage">
                                <img id="showImage" style="height: 150px; width: 150px" src="{{ $dataGame->background}}" alt="avatar">
                            </div>
                        </div>
                        @error('icon')
                        <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputCity" class="form-label">{{__('Tag')}}</label>
                <input type="text" name="tag" value="{{old('tag', $dataGame->tag)}}" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputCity" class="form-label">{{__('Count_play')}}</label>
                <input type="text"  name="count_play" value="{{old('count_play', $dataGame->count_play)}}" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="status">{{__('Status')}}</label>
                <select class="form-select" aria-label="Default select example" name="status" id="" >
                    @foreach ($status as $status =>$value)
                        <option value="{{ $value }}" @if($dataGame->status == $value) selected @endif>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputCity" class="form-label">{{__('Color')}}</label>
                <input type="text" name="color" value="{{old('color', $dataGame->color)}}" class="form-control" id="inputCity">
            </div>
            <div class="col-md-2">
                <label for="inputCity" class="form-label">{{__('Text-color')}}</label>
                <input type="text" name="text_color" value="{{old('text_color', $dataGame->text_color)}}" class="form-control" id="inputCity">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">{{__('Tạo')}}</button>
            </div>
        </form>
    </div>
@endsection
