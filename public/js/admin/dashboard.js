const ctx = document.getElementById('chart-count-play');

$(document).ready(function () {
    setChartCountPlay('month');
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

        ctx.style.width = '600px';
        ctx.style.height = '600px';
    });
}




