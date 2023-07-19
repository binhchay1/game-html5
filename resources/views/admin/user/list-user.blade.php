@extends('layouts.admin')

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection

@section('main_content')
<div class="row justify-content-start m-1 mb-2 mt-2">
    <a  href="{{route('user.create')}}" >
        <button type="button" id="btn-add" class="btn btn-success">Add</button>
    </a>
</div>
<table class="table table-bordered" id="customers">
    <thead>
        <tr class="design-text">
            <th scope="col">ID</th>
            <th scope="col">{{ __('Name') }}</th>
            <th scope="col">{{ __('Mail') }}</th>
            <th scope="col">{{ __('Hình ảnh') }}</th>
            <th scope="col">{{ __('Số điện thoại') }}</th>
            <th scope="col">{{ __('Địa chỉ') }}</th>
            <th scope="col">{{ __('Tuổi') }}</th>
            <th scope="col">{{ __('Giới tính') }}</th>

            <th style="width: 10%" scope="col">{{ __('Hành động') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataUser as $dataUser)
        <tr class="design-text">
            <td>{{ $dataUser->id }}</td>
            <td>{{ $dataUser->name }}</th>
            <td>{{ $dataUser->email }}</td>
            <td>{{ $dataUser->iamge }}</td>
            <td>{{ $dataUser->phone }}</td>
            <td>{{ $dataUser->address }}</td>
            <td>{{ $dataUser->age }}</td>
            <td>{{ $dataUser->sex }}</td>
            <td class="text_flow text-center">
                <a href="{{route('user.showUser', $dataUser['id'])}}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i>
                </a>
                <a href="">
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
    })
</script>
@endsection
