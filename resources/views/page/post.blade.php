@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Post') }}</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/css/page/post.css') }}" />
@endsection

@section('content')
<div style="display: flex; margin-bottom: 30px;">
    <div>
        <div class="box items-grid no-background">
            <p class="h1" id="title-post">{{ $post->title }}</p>
            <div class="h1 thumb-title-post">
                <img src="{{ asset($post->thumb) }}" style="max-width: 1031px !important" />
            </div>
            <hr>
            <div id="content-post-body">
                {!! $post->content !!}
            </div>
        </div>
        <hr>
        <div>
            <h1 style="color: black;">Related Post</h1>
            <div style="display: flex;">
                @foreach($relatedPost as $post)
                <div style="margin-left: 20px;">
                    <img src="{{ asset($post->thumb) }}" width="100" />
                    <p class="h1">{{ $post->title }}</p>
                </div>
                @endforeach
            </div>
        </div>
        <hr>
        <div style="display: flex;">
            <div>
                <h1 style="color: black;">Comments</h1>
                <div class="comment mt-4 text-justify float-left">
                    @foreach($listComments as $comment)
                    <img src="{{ $comment->users->images ? $comment->users->images : asset('/images/default-avatar.png') }}" alt="" class="rounded-circle" width="40" height="40">
                    <h4>{{ $comment->users->name }}</h4>
                    <span>- {{ date('d M, Y', strtotime($comment->created_at)) }}</span>
                    <br>
                    <p>{{ $comment->message }}</p>
                    @endforeach
                </div>
            </div>
            @if(Auth::check())
            @if(!$isComment)
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12" id="form-comment" style="margin-top: 10px;">
                <form id="algin-form" action="{{ route('store.comment.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h4>Leave a comment</h4>
                        <label for="message">Message</label>
                        <textarea name="message" cols="30" rows="5" class="form-control" style="background-color: black;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="fullname" class="form-control" value="{{ Auth::user()->name }}" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly="readonly">
                    </div>
                    <input type="hidden" name="uid" value="{{ Auth::user()->id }}" />
                    <input type="hidden" name="pslug" value="{{ $slug }}" />
                    <div class="form-group">
                        <button type="submit" id="post" class="btn">Post</button>
                    </div>
                </form>
            </div>
            @else
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12" id="form-comment" style="margin-top: 60px;">
                <form id="algin-form" action="{{ route('store.comment.post') }}">
                    <p style="color: white">{{ __('Bạn đã bình luận rồi!') }}</p>
                </form>
            </div>
            @endif
            @endif
        </div>
    </div>

    <div class="list" style="margin-left: 50px;">
        <h2 style="color: black;">Category</h2>
        <ul>
            @foreach($categoryPost as $category)
            <li><span style="color: black;">{{ $category->category }}</span></li>
            @endforeach
        </ul>
    </div>
</div>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
@endsection
