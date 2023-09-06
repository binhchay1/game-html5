@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - List Comment</title>
@endsection

@section('main_content')
<div class="card-header">
    <h3>List Comment Game</h3>
</div>

<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers">
    <thead>
        <tr class="design-text">
            <th style="width: 5%;" scope="col">ID</th>
            <th style="width: 5%;" scope="col">User ID</th>
            <th style="width: 15%;" scope="col">Game Name</th>
            <th style="width: 10%" scope="col">Locale</th>
            <th style="width: 40%" scope="col">Content</th>
            <th style="width: 10%" scope="col">Status</th>
            <th style="width: 15%" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataComment as $comment)
        <tr class="design-text">
            <td>{{ $comment->id }}</td>
            <td>{{ $comment->user_id }}</th>
            <td>{{ $comment->game_name }}</th>
            <td>{{ $comment->locale }}</th>
            <td>{{ $comment->content }}</th>
            <td>{{ $comment->status }}</th>
            <td class="text_flow text-center">
                <a href="{{ route('comment.show', $comment['id']) }}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i>
                </a>
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
