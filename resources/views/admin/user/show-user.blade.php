@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - User</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection

@section('main_content')
<div class="card-header mt-4">
    <h3>User Information</h3>
</div>
<div class="container row g-3">
    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Name</label>
        <input value="{{ $dataUser->name }}" type="email" class="form-control" placeholder="1234 Main St" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Email</label>
        <input value="{{ $dataUser->email }}" type="text" class="form-control" placeholder="1234 Main St" disabled>
    </div>
    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Phone Number</label>
        <input type="text" value="{{ $dataUser->phone }}" class="form-control" placeholder="1234 Main St" disabled>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="img">Image</label>
            <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
            <div class=" choose-avatar">
                <div id="btnimage">
                    <img id="showImage" width="150" height="150" src="{{ $dataUser->image ? $dataUser->image : asset('images/user.jpg') }}" alt="avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label for="address" class="form-label">Address</label>
        <input type="text" value="{{ $dataUser->address }}" class="form-control" id="address" disabled>
    </div>
    <div class="col-md-4">
        <label for="age" class="form-label">Age</label>
        <input type="text" value="{{ $dataUser->age }}" class="form-control" id="age" disabled>
    </div>
    <div class="col-md-2">
        <label for="gender" class="form-label">Gender</label>
        <input type="text" value="{{ $dataUser->sex == 0 ? "Nam" : "Nữ" }}" class="form-control" id="gender" disabled>
    </div>
</div>
@endsection
