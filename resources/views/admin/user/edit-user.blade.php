@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - User</title>
@endsection

@section('main_content')
<div class="card-header">
    <h3>Update User</h3>
</div>
<div class=" container ">
    <form action="{{ route('user.updateUser', $dataUser['id']) }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input name="name" value="{{ old('name', $dataUser->name) }}" type="text" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="img">Image</label>
                <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                @error('image')
                <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class=" choose-avatar">
                    <div id="btnimage">
                        <img id="showImage" style="width: 150px" class="show-avatar" src="/{{ $dataUser->image ?? asset('/images/default-avatar.png')}}" alt="avatar">
                    </div>
                    <div id="button">
                        <i id="btn_chooseImg" class="fa fa-camera"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Nick Name</label>
            <input name="nick_name" value="{{ old('nick_name', $dataUser->nick_name) }}" type="text" class="form-control @error('nick_name') is-invalid @enderror">
            @error('nick_name')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input name="email" value="{{ old('email', $dataUser->email) }}" type="email" class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Phone Number</label>
            <input name="phone" value="{{ old('phone', $dataUser->phone) }}" type="text" class="form-control @error('phone') is-invalid @enderror">
            @error('phone')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Address</label>
            <input name="address" type="text" value="{{ old('address', $dataUser->address) }}" class="form-control @error('address') is-invalid @enderror">
            @error('address')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Age</label>
            <input name="age" type="date" value="{{ old('age', $dataUser->age) }}" class="form-control @error('age') is-invalid @enderror">
            @error('age')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Gender</label>
            <select class="form-select" aria-label="Default select example" name="sex">
                @foreach ($gender as $gender =>$value)
                <option value="{{ $value }}" @if($dataUser->sex == $value) selected @endif>
                    {{$gender }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/user.js') }}"></script>
@endsection
