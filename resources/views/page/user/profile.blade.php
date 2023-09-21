@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Hồ sơ của tôi') }}</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/profile.css') }}">
@endsection

@section('content')
<div class="main">
    <div class="categories-tags-block box" id="information-name-area">
        <div class="top-categories">
            <div class="row single-line">
                <div class="col-md-1">
                    <div class="form-group">
                        <img id="showImage" width="70" height="70" src="{{ asset($dataUser->image) ?? asset('images/default-avatar.png') }}" alt="avatar">
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>{{ $dataUser->name }}</h4>
                    <p>{{ $dataUser->nick_name }}</p>
                    <p>{{ $dataUser->gender }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-9 p-r-0" id="information-area">
            <div class="categories-tags-block box achievement">
                <div class="top-categories">
                    <div class="row single-line">
                        <div class="row-title-line">
                            <h2>{{ __('Thành tích') }}</h2>
                            <span class="number-with-dot friends-counter counter">{{ count($achieved) }}</span>
                        </div>
                        @if(count($achieved) == 0)
                        <div class="empty-list empty-list--profile empty-list-async">
                            <img width="22" src="{{ asset('svg/empty-achievements.svg') }}" alt="{{ __('Chưa có thành tích') }}">
                            <p>{{ __('Chưa có thành tích được thêm') }}</p>
                        </div>
                        @else
                        <ul id="list-achievement">
                            @foreach($achieved as $record)
                            <li>
                                <img width="80" src="{{ asset($record->achievements->icon) }}" />
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="categories-tags-block box friends">
                <div class="top-categories">
                    <div class="row single-line">
                        <div class="row-title-line">
                            <h2>{{ __('Bạn bè') }}</h2>
                            <span class="number-with-dot friends-counter counter">{{ count($friends) }}</span>
                        </div>
                        @if(count($friends) == 0)
                        <div class=" empty-list empty-list--profile empty-list-async">
                            <img src="{{ asset('svg/empty-friends.svg') }}" alt="{{ __('Chưa có bạn bè') }}">
                            <p>{{ __('Chưa có bạn bè nào được thêm') }}</p>
                        </div>
                        @else
                        <ul id="list-friend">
                            @foreach($friends as $friend)
                            <li>
                                <div class="friend element">
                                    <div class="friend-avatar thumb">
                                        <img width="50" src="{{ asset($friend->image) }}" alt="{{ $friend->nick_name }}">
                                    </div>
                                    <div class="friend-name name">
                                        {{ $friend->nick_name }}
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="categories-tags-block box comments">
                <div class="top-categories">
                    <div class="row single-line">
                        <div class="row-title-line">
                            <h2>{{ __('Bình luận') }}</h2>
                            <span class="number-with-dot friends-counter counter">{{ count($comments) }}</span>
                        </div>
                        @if(count($comments) == 0)
                        <div class="empty-list empty-list--profile empty-list-async">
                            <img src="{{ asset('svg/empty-comments.svg') }}" alt="{{ __('Chưa có bình luận') }}">
                            <p>{{ __('Chưa có bình luận nào được thêm') }}</p>
                        </div>
                        @else
                        <ul id="list-comment">
                            @foreach($comments as $comment)
                            <li>
                                <div class="comment element">
                                    <div class="details">
                                        {{ __('Trên') }} <a href="{{ route('play.games', ['game' => $comment->game_name]) }}" class="game-link">{{ ucwords(str_replace("-"," ", $comment->game_name)) }} </a>
                                        <span class="timeago" title="{{ $comment->created_at }}"></span>
                                    </div>
                                    <div class="content">
                                        {{ $comment->content }}
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3" id="point-area">
            <div class="categories-tags-block box points">
                <div class="top-categories-point">
                    <div class="row single-line">
                        <div class="row-title-line">
                            <h2>{{ __('Điểm') }}</h2>
                            <span class="number-with-dot friends-counter counter">{{ $points['points'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
<script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/plugins/moment/moment.min.js') }}"></script>
<script>
    let l = document.getElementById("list-comment");
    if (null != l.getElementsByClassName("timeago")) {
        let r = l.getElementsByClassName("timeago");
        for (let i = 0; i < r.length; i++) {
            moment.locale(locale);
            let s = moment(r[i].getAttribute("title"), "YYYY-MM-DD H-i-s").fromNow();
            r[i].innerHTML = s
        }
    }
</script>
@endsection
