@extends('layouts.page')

@section('title')
    <title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Hồ sơ của tôi') }}</title>
@endsection

@section('css')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="manifest" href="{{ asset('json/manifest.json') }}" crossorigin="use-credentials">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        .disable-link {
            cursor: not-allowed;
            opacity: 0.5;
        }

        .top-tags ul li {
            list-style-type: none;
        }

        .top-tags ul {
            display: flex;
            flex-direction: row;
        }

        .categories-tags-block{
            margin-top: 10px;
        }

        .top-categories-point{
            height: 240px;
        }

    </style>
@endsection

@section('content')
    <div class="main">
        <div class="categories-tags-block box">
            <div class="top-categories">
                <div class="row single-line">
                    <div class="col-md-1">
                        <div class="form-group">
                            <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    <img id="showImage" width="150" height="150" src="{{ $dataUser->image ?? asset('images/default-avatar.png') }}" alt="avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                      <h4>{{$dataUser->name}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-9 ">
                <div class="categories-tags-block box">
                    <div class="top-categories">
                        <div class="row single-line">
                            <h2>THÀNH TÍCH</h2>
                        </div>
                    </div>
                </div>
                <div class="categories-tags-block box">
                    <div class="top-categories">
                        <div class="row single-line">
                            <h2>BẠN BÈ</h2>
                        </div>
                    </div>
                </div>
                <div class="categories-tags-block box">
                    <div class="top-categories">
                        <div class="row single-line">
                            <h2>BÌNH LUẬN</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="categories-tags-block box">
                    <div class="top-categories-point">
                        <div class="row single-line">
                            <h2>ĐIỂM</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
@endsection

