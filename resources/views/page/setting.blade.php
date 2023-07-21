@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', '{{ env('APP_NAME', 'Gamekafe') }}') }} - {{ __('Chính sách cookie') }}</title>
@endsection

@section('css')
<style type="text/css">
    td {
        border-bottom: 1px solid;
    }
</style>
@endsection

@section('content')
<div class="white-box-bg box body static" style="padding: 25px 25px; text-align: justify;">

</div>
@endsection
