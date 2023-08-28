const ctx = document.getElementById('chart-count-play');
const getchart = document.getElementById('chart-count');

$(document).ready(function () {
    setChartCountPlay('month');
    setChartCountMonth('month');
    setChartCountQuarter('quarter');
    setChartCountYear('year');

});

document.querySelector('input[name="chart"]:checked').value;
$('#chart1').on("click", function() {
    if ($(this).val() === 'Chart1') {
        setChartCountMonth('month');
    }
});

$('#chart2').on("click", function() {
    if ($(this).val() === 'Chart2') {
        setChartCountQuarter('quarter');
    }
});

$('#chart3').on("click", function() {
    if ($(this).val() === 'Chart3') {
        setChartCountYear('year');
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
        new Chart(ctx, {
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

        ctx.style.width = '500px';
        ctx.style.height = '500px';
    });
}

function setChartCountMonth(type) {

    $.ajax({
        url: '/get-chart-user',
        type: 'GET',
        data: {
            'type': type
        }

    }).done(function (result) {
        new Chart(getchart, {
            type: 'bar',
            data: result,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        getchart.style.height = '500px';
    });
}

function setChartCountYear(type) {
    $.ajax({
        url: '/get-chart-user',
        type: 'GET',
        data: {
            'type': type
        }

    }).done(function (result) {
        new Chart(getchart, {
            type: 'bar',
            data: result,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        getchart.style.height = '500px';

    });
}

function setChartCountQuarter(type) {
    $.ajax({
        url: '/get-chart-user',
        type: 'GET',
        data: {
            'type': type
        }

    }).done(function (result) {
        new Chart(getchart, {
            type: 'bar',
            data: result,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        getchart.style.height = '500px';
    });
}



