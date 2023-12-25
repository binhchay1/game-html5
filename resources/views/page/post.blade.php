@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Post') }}</title>
@endsection

@section('css')
<style>
    .navbar-nav {
        width: 100%;
    }

    @media(min-width:568px) {
        .end {
            margin-left: auto;
        }
    }

    @media(max-width:768px) {
        #post {
            width: 100%;
        }
    }

    #clicked {
        padding-top: 1px;
        padding-bottom: 1px;
        text-align: center;
        width: 100%;
        background-color: #ecb21f;
        border-color: #a88734 #9c7e31 #846a29;
        color: black;
        border-width: 1px;
        border-style: solid;
        border-radius: 13px;
    }

    #profile {
        background-color: unset;

    }

    #post {
        margin: 10px;
        padding: 6px;
        padding-top: 2px;
        padding-bottom: 2px;
        text-align: center;
        background-color: #ecb21f;
        border-color: #a88734 #9c7e31 #846a29;
        color: black;
        border-width: 1px;
        border-style: solid;
        border-radius: 13px;
        width: 50%;
    }

    body {
        background-color: black;
    }

    #nav-items li a,
    #profile {
        text-decoration: none;
        color: rgb(224, 219, 219);
        background-color: black;
    }


    .comments {
        margin-top: 5%;
        margin-left: 20px;
    }

    .darker {
        border: 1px solid #ecb21f;
        background-color: black;
        float: right;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px;
    }

    .comment {
        border: 1px solid rgba(16, 46, 46, 1);
        background-color: rgba(16, 46, 46, 0.973);
        float: left;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px;

    }

    .comment h4,
    .comment span,
    .darker h4,
    .darker span {
        display: inline;
    }

    .comment p,
    .comment span,
    .darker p,
    .darker span {
        color: rgb(184, 183, 183);
    }

    h1,
    h4 {
        color: white;
        font-weight: bold;
    }

    label {
        color: rgb(212, 208, 208);
    }

    #align-form {
        margin-top: 20px;
    }

    .form-group p a {
        color: white;
    }

    #checkbx {
        background-color: black;
    }

    #darker img {
        margin-right: 15px;
        position: static;
    }

    .form-group input,
    .form-group textarea {
        background-color: black;
        border: 1px solid rgba(16, 46, 46, 1);
        border-radius: 12px;
    }

    #form-comment form {
        border: 1px solid rgba(16, 46, 46, 1);
        background-color: rgba(16, 46, 46, 0.973);
        border-radius: 5px;
        padding: 20px;
    }

    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .list {
        position: relative;
    }

    .list h2 {
        color: #fff;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .list ul {
        position: relative;
    }

    .list ul li {
        position: relative;
        left: 0;
        color: #fce4ec;
        list-style: none;
        margin: 4px 0;
        border-left: 2px solid #f50057;
        transition: 0.5s;
        cursor: pointer;
    }

    .list ul li:hover {
        left: 10px;
    }

    .list ul li span {
        position: relative;
        padding: 8px;
        padding-left: 12px;
        display: inline-block;
        z-index: 1;
        transition: 0.5s;
    }

    .list ul li:hover span {
        color: #111;
    }

    .list ul li:before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: #f50057;
        transform: scaleX(0);
        transform-origin: left;
        transition: 0.5s;
    }

    .list ul li:hover:before {
        transform: scaleX(1);
    }
</style>
@endsection

@section('content')
<div style="display: flex; margin-bottom: 30px;">
    <div>
        <div class="box items-grid no-background">
            <div class="h1" style="display: flex;">
                <img src="{{ asset($post->thumb) }}" />
                <p class="h1" style="font-size: 45px; margin-left: 15px;">{{ $post->title }}</p>
            </div>
            <hr>
            <div>
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

@endsection
