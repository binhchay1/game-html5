@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - List Report</title>
@endsection

@section('main_content')
<div class="card-header">
    <h3>List Report Bug</h3>
</div>

<table class="table table-striped table-bordered mt-5" cellspacing="0" width="100%" id="customers">
    <thead>
        <tr class="design-text">
            <th style="width: 5%;" scope="col">ID</th>
            <th style="width: 15%;" scope="col">User Name</th>
            <th style="width: 15%;" scope="col">User Email</th>
            <th style="width: 20%" scope="col">Game</th>
            <th style="width: 30%" scope="col">Note</th>
            <th style="width: 15%" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataReport as $report)
        <tr class="design-text">
            <td>{{ $report->id }}</td>
            <td>{{ $report->user_name }}</th>
            <td>{{ $report->user_email }}</th>
            <td>{{ $report->game_name }}</th>
            <td>{{ $report->note }}</th>
            <td class="text_flow text-center">
                <a href="{{ route('report.show', $report['id']) }}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#customers').DataTable({
            pagingType: 'full_numbers',
        });
        $('.dataTables_length').addClass('bs-select');
    })
</script>
@endsection
