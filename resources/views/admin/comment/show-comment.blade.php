@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Comment</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/page/user.css') }}" />
@endsection

@section('main_content')
<div class="card-header">
    <h3>Comment Information</h3>
</div>
<div class=" container ">
    <div class="col-md-6">
        <label for="" class="form-label">User ID</label>
        <input value="{{ $dataComment->user_id }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Game Name</label>
        <input value="{{ $dataComment->game_name }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Locale</label>
        <input value="{{ $dataComment->locale }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Content</label>
        <input value="{{ $dataComment->content }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Status</label>
        <input value="{{ $dataComment->status }}" type="text" class="form-control" disabled>
    </div>

    @if($dataComment->status == \App\Enums\StatusComment::PENDING)
    <div class="col-md-6 mt-4">
        <a class="btn btn-primary" href="{{ route('change.status.comment') }}?status=1&id={{ $dataComment->id }}">Accept</a>
        <a class="btn btn-danger ml-2" href="{{ route('change.status.comment') }}?status=2&id={{ $dataComment->id }}">Deny</a>
    </div>
    @endif

</div>
@endsection
