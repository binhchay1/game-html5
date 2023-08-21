@extends('layouts.admin')

@section('title')
    <title>{{ env('APP_NAME', 'Gamekafe') }} - Category</title>
@endsection
@section('js_sort_users')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection
@section('main_content')
    <h1>User Register By Month</h1>
    <canvas id="myChart" height="100px"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.3/dist/chart.umd.min.js"></script>
    <script type="text/javascript">

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: {!! json_encode($dataset) !!},
            },
            scales: {
                yAxes: {
                    ticks: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                xAxes: {
                    // Change here
                    barPercentage: 0.2
                }
            }

        });
    </script>
@endsection

