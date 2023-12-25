@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Post</title>
@endsection

@section('main_content')
<div class="card-header">
    <h3>List Post</h3>
</div>
<div class="justify-content-start m-1 mb-2 mt-4">
    <a href="{{ route('post.create') }}">
        <button type="button" id="btn-add" class="btn btn-success">Add</button>
    </a>
</div>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers">
    <thead>
        <tr class="design-text">
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Author</th>
            <th scope="col">Thumbs</th>
            <th scope="col">Slug</th>
            <th scope="col">Category</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listPost as $post)
        <tr class="design-text">
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td style="display: inline-block; height: 115px; overflow: hidden;">{!! $post->content !!}</td>
            <td>{{ $post->users->name }}</td>
            <td><img class="image" src="{{ $post->thumb }}" alt="avatar" width="100" height="50"></td>
            <td>{{ $post->slug }}</td>
            <td>{{ $post->category }}</td>
            <td>{{ $post->created_at }}</th>
            <td>{{ $post->updated_at }}</th>
            <td class="text_flow text-center">
                <a href="{{ route('post.edit', $post['id']) }}">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-edit"></i>
                    </button>
                </a>
                <a href="{{ route('post.delete') }}?id={{ $post->id }}">
                    <button type="button" class="btn btn-danger btn_delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('includes.modal_confirm_delete_post')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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

    $('#delete-post-modal').on('show.bs.modal', function(event) {
        var reference_tag = $(event.relatedTarget);
        var id = reference_tag.data('id')
        $('#id-post').val(id);
    })
</script>
@endsection
