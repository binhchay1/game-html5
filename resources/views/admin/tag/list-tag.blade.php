@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Tag</title>
@endsection

@section('main_content')
<div class="tag-header">
    <h3>List tag</h3>
</div>

<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers">
    <thead>
        <tr class="design-text">
            <th scope="col">ID</th>
            <th scope="col" style="width: 15%;">Name</th>
            <th scope="col">Icon</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listTag as $tag)
        <tr class="design-text">
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->icon }}</td>
            <td>{{ $tag->status }}</td>
            <td class="text_flow text-center">
                @if($tag->status == 0)
                <a href="{{ route('tag.edit', $tag->id) }}" title="Active">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-check"></i>
                    </button>
                </a>
                @else
                <a href="{{ route('tag.edit', $tag->id) }}" title="De-active">
                    <button type="button" class="btn btn-danger">
                        <i class="fas fa-times"></i>
                    </button>
                </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('includes.modal_add_search')
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
</script>
@endsection
