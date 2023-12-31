@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - List Achievement</title>
@endsection

@section('main_content')
<div class="card-header">
    <h3>List Achievement</h3>
</div>
<div class="justify-content-start m-1 mb-2 mt-4">
    <a href="{{ route('achievement.create') }}">
        <button type="button" id="btn-add" class="btn btn-success">Add</button>
    </a>
</div>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers">
    <thead>
        <tr class="design-text">
            <th style="width: 5%;" scope="col">ID</th>
            <th style="width: 10%;" scope="col">Name</th>
            <th style="width: 40%;" scope="col">Description</th>
            <th style="width: 10%" scope="col">Slug</th>
            <th style="width: 5%" scope="col">Point</th>
            <th style="width: 10%" scope="col">Icon</th>
            <th style="width: 20%" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataAchievement as $achievement)
        <tr class="design-text">
            <td>{{ $achievement->id }}</td>
            <td>{{ $achievement->name }}</th>
            <td>{{ $achievement->description }}</th>
            <td>{{ $achievement->slug }}</th>
            <td>{{ $achievement->point }}</th>
            <td class="d-flex justify-content-center">
                <image width="50" height="50" src="{{ $achievement->icon }}"></image>
            </td>
            <td class="text_flow text-center">
                <a href="{{ route('achievement.show', $achievement['id']) }}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i>
                </a>
                <a href="{{ route('achievement.edit', $achievement['id']) }}">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-edit"></i>
                    </button>
                </a>
                <button type="button" class="btn btn-danger btn_delete" data-toggle="modal" data-target="#delete-achievement-modal">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('includes.modal_confirm_delete_achievement')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#customers').DataTable({
            pagingType: 'full_numbers',
        });
        $('.dataTables_length').addClass('bs-select');
    })
</script>
@endsection
