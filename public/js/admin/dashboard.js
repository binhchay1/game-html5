const chartCountPlay = document.getElementById('chart-count-play');
const chartCountRegister = document.getElementById('chart-count-register');

$(document).ready(function () {
    setChartCountPlay('month');
    setChartCountRegister('month');
});

$(document).on('click', '#chart1', function () {
    if ($(this).val() === 'Chart1') {
        setChartCountRegister('month', true);
    }
});

$(document).on('click', '#chart2', function () {
    if ($(this).val() === 'Chart2') {
        setChartCountRegister('quarter', true);
    }
});

$(document).on('click', '#chart3', function () {
    if ($(this).val() === 'Chart3') {
        setChartCountRegister('year', true);
    }
});

function setChartCountPlay(type) {
    $.ajax({
        url: '/get-chart-count-play',
        type: 'GET',
        data: {
            'type': type
        }
    }).done(function (result) {
        new Chart(chartCountPlay, {
            type: 'doughnut',
            data: result,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        chartCountPlay.style.width = '500px';
        chartCountPlay.style.height = '500px';
    });
}

function setChartCountRegister(type, status = false) {
    $.ajax({
        url: '/get-chart-user',
        type: 'GET',
        data: {
            'type': type
        }

    }).done(function (result) {
        if ($('#area-chart-count-register').has(".chartjs-hidden-iframe")) {
            $('#area-chart-count-register .chartjs-hidden-iframe').remove();
            if (status) {

                $('#chart-count-register').remove();
                $('#area-chart-count-register').append('<canvas id="chart-count-register"></canvas>');
            }
        }

        let options = {
            type: 'bar',
            data: result,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }
        new Chart(chartCountRegister, options);

        chartCountRegister.style.height = '500px';
    });
}


