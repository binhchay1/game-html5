@extends('layouts.admin')

@section('js_sort_users')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('main_content')
    <div class="card-header mt-4">
        <h3>{{ __('Thông tin game') }}</h3>
    </div>
    <div class=" container row g-3">
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">{{__('Tên')}}</label>
            <input value="{{$dataGame->name}}" type="text" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">{{__('Liên kết')}}</label>
            <input value="{{$dataGame->link}}" type="text" class="form-control" >
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">{{__('Thể Loại')}}</label>
            <input type="text" value="{{$dataGame->categories->name}}" class="form-control" >
        </div>
        <div class="col-md-2">
            <div class="form-group" >
                <div style="">
                    <label for="img">{{__('Thumbs')}}</label>
                    <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                    <div class=" choose-avatar" >
                        <div id="btnimage">
                            <img id="showImage" style="height: 150px; width: 150px" src="{{$dataGame->thumbs}}" alt="avatar">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group" >
                <div style="">
                    <label for="img">{{__('Thumbs')}}</label>
                    <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                    <div class=" choose-avatar" >
                        <div id="btnimage">
                            <img id="showImage" style="height: 150px; width: 150px" src="{{$dataGame->icon }} " alt="avatar">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group" >
                <div style="">
                    <label for="img">{{__('Thumbs')}}</label>
                    <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                    <div class=" choose-avatar" >
                        <div id="btnimage">
                            <img id="showImage" style="height: 150px; width: 150px" src="{{$dataGame->background}}" alt="avatar">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">{{__('Tag')}}</label>
            <input type="text" value="{{$dataGame->tag}}" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">{{__('Count_play')}}</label>
            <input type="text" value="{{$dataGame->count_play}}" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">{{__('Status')}}</label>
            <input type="text" value="{{$dataGame->status}}" class="form-control" id="inputCity">
        </div>
        <div class="col-md-2">
            <label for="inputCity" class="form-label">{{__('Color')}}</label>
            <input type="text" value="{{$dataGame->color}}" class="form-control" id="inputCity">
        </div>
        <div class="col-md-2">
            <label for="inputCity" class="form-label">{{__('Text-color')}}</label>
            <input type="text" value="{{$dataGame->text_color}}" class="form-control" id="inputCity">
        </div>
    </div>
@endsection
