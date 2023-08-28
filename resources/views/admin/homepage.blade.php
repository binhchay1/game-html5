@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Dashboard</title>
@endsection

@section('main_content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <div>
                    Please select your preferred Chart:<br/>
                    <input type="radio" name="chart" id="chart1" value="Chart1" checked>Month<br>
                    <input type="radio" name="chart" id="chart2" value="Chart2">Quarter<br>
                    <input type="radio" name="chart" id="chart3" value="Chart3">Year<br>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <canvas id="chart-count-play"></canvas>
            </div>
            <div class="col-6">
                <canvas id="chart-count"></canvas>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="{{ asset('js/admin/dashboard.js') }}"></script>
@endsection
