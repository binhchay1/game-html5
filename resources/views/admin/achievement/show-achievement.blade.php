@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Achievement</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/page/user.css') }}" />
@endsection

@section('main_content')
<div class="card-header">
    <h3>Achievement Information</h3>
</div>
<div class=" container ">
    <div class="col-md-6">
        <label for="" class="form-label">Name</label>
        <input value="{{ $dataAchievement->name }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Description</label>
        <input value="{{ $dataAchievement->description }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Slug</label>
        <input value="{{ $dataAchievement->slug }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Points</label>
        <input value="{{ $dataAchievement->points }}" type="text" class="form-control" disabled>
    </div>

    <div class="col-md-6 mt-4">
        <label for="" class="form-label">Icon</label>
        <img src="{{ $dataAchievement->icon }}">
    </div>
</div>
@endsection
