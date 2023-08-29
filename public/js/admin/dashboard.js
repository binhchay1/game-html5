const ctx = document.getElementById('chart-count-play');
const getchart = document.getElementById('chart-count');

$(document).ready(function () {
    setChartCountPlay('month');

});

$(document).on('click', '#chart1', function() {
    if ($(this).val() === 'Chart1') {
        setChartCountMonth('month');
    }
});

$(document).on('click', '#chart2', function() {
    if ($(this).val() === 'Chart2') {
        setChartCountMonth('quarter');
    }
});

$(document).on('click', '#chart3', function() {
    if ($(this).val() === 'Chart3') {
        setChartCountMonth('year');
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

// function setChartCountYear(type) {
//     $.ajax({
//         url: '/get-chart-user',
//         type: 'GET',
//         data: {
//             'type': type
//         }
//
//     }).done(function (result) {
//         new Chart(getchart, {
//             type: 'bar',
//             data: result,
//             options: {
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         });
//         getchart.style.height = '500px';
//
//     });
// }
//
// function setChartCountQuarter(type) {
//     $.ajax({
//         url: '/get-chart-user',
//         type: 'GET',
//         data: {
//             'type': type
//         }
//
//     }).done(function (result) {
//         new Chart(getchart, {
//             type: 'bar',
//             data: result,
//             options: {
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         });
//         getchart.style.height = '500px';
//     });
// }


