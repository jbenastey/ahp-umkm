$(document).ready(function () {
    'use strict';
    var root = window.location.origin + '/aydin-tasci/';

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    };

    var mode = 'index';
    var intersect = true;

    var $salesChart = $('#dosen-chart');

    var salesChart = new Chart($salesChart, {
        type: 'bar',
        data: {
            labels: ['jihad'],
            datasets: [
                {
                    label: 'FST',
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: [2]
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: true,
                position: 'bottom',
            },
            scales: {
                yAxes:[{
                    ticks: {
                        beginAtZero : true
                    }
                }]
            },
            title: {
                display: true,
                text: 'Responden Dosen'
            },
        }
    });
});
