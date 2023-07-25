@extends('layouts.admin')

@section('js_sort_users')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
@section('main_content')
    <div class="row justify-content-start m-1 mb-2 mt-2">
        <a href="{{route('game.create')}}">
            <button type="button" id="btn-add" class="btn btn-success">{{ __('Thêm') }}</button>
        </a>
    </div>
    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers">
        <thead>
        <tr class="design-text">
            <th scope="col">ID</th>
            <th scope="col">{{ __('Name') }}</th>
            <th scope="col">{{ __('Liên kết') }}</th>
            <th scope="col">{{ __('Thể loại') }}</th>
            <th scope="col">Thumbs</th>
            <th scope="col">icon</th>
            <th scope="col">background</th>
            <th style="width: 15%" scope="col">tag</th>
            <th scope="col">count_play</th>
            <th scope="col">color</th>
            <th scope="col">text-color</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataGame as $listGame)
            <tr class="design-text">
                <td>{{ $listGame->id }}</td>
                <td>{{ $listGame->name }}</td>
                <td>{{ Str::limit($listGame->link,10) }}</td>
                <td>{{ $listGame->categories->name ?? "" }}</td>
                <td><img class="image" src="{{$listGame->thumbs}}" alt="avatar" width="100" height="50"></td>
                <td><img class="image" src="{{$listGame->icon}}" alt="avatar" width="100" height="50"></td>
                <td><img class="image" src="{{$listGame->background}}" alt="avatar" width="100" height="50"></td>
                <td>{{ Str::limit($listGame->tag,20) }}</td>
                <td>{{ $listGame->count_play }}</td>
                <td>{{ $listGame->color }}</td>
                <td>{{ $listGame->text_color }}</td>
                <td>{{ $listGame->status == 0 ? 'active' : 'de-active' }}</th>
                <td class="text_flow text-center">
                    <a href="{{route('game.showGame', $listGame['id'])}}" class="btn btn-info">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="{{route('game.edit', $listGame['id'])}}">
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
        $(document).ready(function() {
            $('#customers').DataTable({
                pagingType: 'full_numbers',
            });
            $('.dataTables_length').addClass('bs-select');
        })
    </script>
@endsection

