@extends('page.admin.layout.master-page')
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
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th style="width: 10%" scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataUser as $dataUser)
            <tr class="design-text">
                <td>{{ $dataUser->id }}</td>
                <td>{{ $dataUser->name }}</th>
                <td>{{ $dataUser->email }}</td>
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

