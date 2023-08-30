@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Game</title>
@endsection

@section('main_content')
<div class="card-header">
    <h3>List Game</h3>
</div>
<div class="justify-content-start m-1 mb-2 mt-4">
    <a href="{{ route('game.create') }}">
        <button type="button" id="btn-add" class="btn btn-success">Add</button>
    </a>
</div>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers">
    <thead>
        <tr class="design-text">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Link</th>
            <th scope="col">Category</th>
            <th scope="col">Thumbs</th>
            <th style="width: 15%" scope="col">Tag</th>
            <th scope="col">CountPlay</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataGame as $game)
        <tr class="design-text">
            <td>{{ $game->id }}</td>
            <td>{{ $game->name }}</td>
            <td>{{ Str::limit($game->link,10) }}</td>
            <td>{{ $game->categories->name ?? "" }}</td>
            <td><img class="image" src="{{ $game->thumbs }}" alt="avatar" width="100" height="50"></td>
            <td>{{ Str::limit($game->tag, 30) }}</td>
            <td>{{ $game->count_play }}</td>
            <td>{{ $game->status == 1 ? 'active' : 'de-active' }}</th>
            <td class="text_flow text-center">
                <a href="{{ route('game.showGame', $game['id']) }}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i>
                </a>
                <a href="{{ route('game.edit', $game['id']) }}">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-edit"></i>
                    </button>
                </a>
                <button type="button" class="btn btn-danger btn_delete" data-bs-toggle="modal" data-id="{{ $game['id'] }}" data-bs-target="#delete-games-modal">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('includes.modal_confirm_delete')

<script>
    $(document).ready(function() {
        $('#customers').DataTable({
            pagingType: 'full_numbers',
        });
        $('.dataTables_length').addClass('bs-select');

        $('#delete-games-modal').on('show.bs.modal', function(e) {
            var idGame = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="id-game"]').val(idGame);
        });
    })
</script>
@endsection
