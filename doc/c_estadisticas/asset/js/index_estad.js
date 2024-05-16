document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('chartjs-line').getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 225);
    gradient.addColorStop(0, 'rgba(215, 227, 244, 1)');
    gradient.addColorStop(1, 'rgba(215, 227, 244, 0)');
    // Line chart
    new Chart(document.getElementById('chartjs-line'), {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            datasets: [
                {
                    label: 'Actual ($)',
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: [1450, 1500, 4000, 1892, 1487, 2223, 2966, 2448, 2905, 3838, 2917, 3327]
                },
                {
                    label: 'Ant. ($)',
                    fill: true,
                    backgroundColor: 'transparent',
                    borderColor: '#adb5bd',
                    borderDash: [4, 4],
                    data: [1200, 3000, 629, 883, 915, 1214, 1476, 1212, 1554, 2128, 1466, 1827]
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                intersect: false
            },
            hover: {
                intersect: true
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            scales: {
                xAxes: [
                    {
                        reverse: true,
                        gridLines: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    }
                ],
                yAxes: [
                    {
                        ticks: {
                            stepSize: 500
                        },
                        display: true,
                        borderDash: [5, 5],
                        gridLines: {
                            color: 'rgba(0,0,0,0)',
                            fontColor: '#fff'
                        }
                    }
                ]
            }
        }
    });
});
