const chartCountPlay = document.getElementById('chart-count-play');
const chartCountRegister = document.getElementById('chart-count-register');
chartCountRegister.style.height = '500px';
const ctx = new Chart(chartCountRegister, {
    type: 'bar',
    data: [],
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

$(document).ready(function () {
    setChartCountPlay('month');
    setChartCountRegister('month');
});

$(document).on('click', '#chart1', function () {
    if ($(this).val() === 'Chart1') {
        setChartCountRegister('month');
    }
});

$(document).on('click', '#chart2', function () {
    if ($(this).val() === 'Chart2') {
        setChartCountRegister('quarter');
    }
});

$(document).on('click', '#chart3', function () {
    if ($(this).val() === 'Chart3') {
        setChartCountRegister('year');
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

function setChartCountRegister(type) {
    $.ajax({
        url: '/get-chart-user',
        type: 'GET',
        data: {
            'type': type
        }

    }).done(function (result) {
        ctx.data.datasets = result.datasets;
        ctx.data.labels = result.labels;
        ctx.update();
    });
}
