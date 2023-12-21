@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Search</title>
@endsection

@section('main_content')
<div class="card-header">
    <h3>List Top Search</h3>
</div>
<div class="justify-content-start m-1 mb-2 mt-4">
    <button type="button" data-toggle="modal" data-target="#add-search-modal" id="btn-add" class="btn btn-success">Add</button>
</div>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers">
    <thead>
        <tr class="design-text">
            <th scope="col">ID</th>
            <th scope="col" style="width: 15%;">Keyword</th>
            <th scope="col">Count</th>
            <th scope="col">Locale</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listSearch as $search)
        <tr class="design-text">
            <td>{{ $search->id }}</td>
            <td>{{ $search->keyword }}</td>
            <td>{{ $search->count }}</td>
            <td>{{ $search->locale }}</td>
            <td>{{ $search->status }}</td>
            <td class="text_flow text-center">
                @if($search->status == 0)
                <a href="{{ route('search.edit', $search->id) }}" title="Active">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-check"></i>
                    </button>
                </a>
                @else
                <a href="{{ route('search.edit', $search->id) }}" title="De-active">
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
