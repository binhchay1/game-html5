@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - List Category</title>
@endsection

@section('main_content')
<div class="card-header mt-4">
    <h3>List Category</h3>
</div>
<div class="justify-content-start m-1 mb-2 mt-4">
    <a href="{{ route('category.create') }}">
        <button type="button" id="btn-add" class="btn btn-success">Add</button>
    </a>
</div>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers">
    <thead>
        <tr class="design-text">
            <th style="width: 8%;" scope="col">ID</th>
            <th style="width: 30%;" scope="col">Name</th>
            <th style="width: 30%;" scope="col">Title</th>
            <th style="width: 10%" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataCategory as $dataCategory)
        <tr class="design-text">
            <td>{{ $dataCategory->id }}</td>
            <td>{{ $dataCategory->name }}</th>
            <td>{{ $dataCategory->title }}</th>
            <td class="text_flow text-center">
                <a href="{{ route('category.showCategory', $dataCategory['id']) }}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i>
                </a>
                <a href="{{ route('category.edit', $dataCategory['id']) }}">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-edit"></i>
                    </button>
                </a>
                <button type="button" class="btn btn-danger btn_delete" data-toggle="modal" data-target="#deleteArticle">
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
