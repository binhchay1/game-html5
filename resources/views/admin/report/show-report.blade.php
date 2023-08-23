@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Report Bug</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/page/user.css') }}" />
@endsection

@section('main_content')
<div class="card-header mt-4">
    <h3>Report Bug Information</h3>
</div>
<div class=" container ">
    <div class="col-md-6">
        <label for="" class="form-label">User Name</label>
        <input value="{{ $dataReport->user_name }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">User Email</label>
        <input value="{{ $dataReport->user_email }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Game name</label>
        <input value="{{ $dataReport->game_name }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Note</label>
        <input value="{{ $dataReport->note }}" type="text" class="form-control" disabled>
    </div>

</div>
@endsection
