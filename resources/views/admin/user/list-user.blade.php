@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - User</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection

@section('main_content')
<div class="card-header mt-4">
    <h3>List User</h3>
</div>
<div class="row justify-content-start m-1 mb-2 mt-4">
    <a  href="{{route('user.create')}}" >
        <button type="button" id="btn-add" class="btn btn-success">Add</button>
    </a>
</div>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers">
    <thead>
        <tr class="design-text">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Image</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>

            <th style="width: 10%" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataUser as $dataUser)
        <tr class="design-text">
            <td>{{ $dataUser->id }}</td>
            <td>{{ $dataUser->name }}</th>
            <td>{{ $dataUser->email }}</td>
            <td><img class="image" src="{{$dataUser->image}}" alt="avatar" width="100" height="50"></td>
            <td>{{ $dataUser->phone }}</td>
            <td>{{ $dataUser->address }}</td>
            <td>{{ $dataUser->age }}</td>
            <td>{{ $dataUser->sex == 1 ? "Nữ" : "Nam" }}</td>
            <td class="text_flow text-center">
                <a href="{{route('user.showUser', $dataUser['id'])}}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i>
                </a>
                <a href=" {{route('user.editUser', $dataUser['id'])}}">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-edit"></i>
                    </button>
                </a>
                <button type="button" class="btn btn-danger btn_delete" data-toggle="modal" data-target="#deleteArticle" data-id="" title="{{__('labels.2-L-33')}}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#customers').DataTable({
            pagingType: 'full_numbers',
        });
        $('.dataTables_length').addClass('bs-select');
    })
</script>
@endsection
