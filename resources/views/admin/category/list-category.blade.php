@extends('layouts.admin')
@section('main_content')
    @vite(['resources/sass/user.css'])
    <div class="row justify-content-start m-1 mb-2 mt-2">
        <a href="">
            <button type="button" id="btn-add" class="btn btn-success">Add</button>
        </a>
    </div>
    <table class="table table-bordered" id="customers">
        <thead>
        <tr class="design-text">
            <th style="width: 8%;" scope="col">ID</th>
            <th style="width: 30%;"  scope="col">Name</th>
            <th style="width: 30%;"  scope="col">Title</th>
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
                    <a href="" class="btn btn-info">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="">
                        <button type="button" class="btn btn-success">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                    <button type="button" class="btn btn-danger btn_delete" data-toggle="modal"
                            data-target="#deleteArticle" data-id=""
                            title="{{__('labels.2-L-33')}}" >
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#customers').DataTable({
                pagingType: 'full_numbers',
            });
        })
    </script>
@endsection

