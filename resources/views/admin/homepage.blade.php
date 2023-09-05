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
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6" id="area-chart-count-play">
                <canvas id="chart-count-play"></canvas>
            </div>
            <div class="col-6" id="area-chart-count-register">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <input type="radio" name="chart" id="chart1" value="Chart1" checked>&nbsp;Month
                        <input type="radio" name="chart" id="chart2" value="Chart2" class="ml-3">&nbsp;Quarter
                        <input type="radio" name="chart" id="chart3" value="Chart3" class="ml-3">&nbsp;Year
                    </div>
                </div>
                <canvas id="chart-count-register"></canvas>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('js/plugins/chart/chart.js') }}"></script>
<script src="{{ asset('js/admin/dashboard.js') }}"></script>
@endsection
