$(document).ready(function () {
    'use strict';
    var root = window.location.origin + '/ahp/public/';

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    };

    var mode = 'index';
    var intersect = true;

    var $salesChart = $('#dosen-chart');
    $.ajax({
        url: root + 'grafik/jurusan',
        type: 'GET',
        async: true,
        cache: false,
        dataType: 'json',
        success: function (response) {
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: ['TIF','TIN','TE','SIF','MT'],
                    datasets: [
                        {
                            label: 'HR',
                            backgroundColor: '#4f81bd',
                            borderColor: '#4f81bd',
                            data: [
                                response.tif.HR,
                                response.tin.HR,
                                response.te.HR,
                                response.sif.HR,
                                response.mt.HR,
                            ]
                        },
                        {
                            label: 'SR',
                            backgroundColor: '#c0504d',
                            borderColor: '#c0504d',
                            data: [
                                response.tif.SR,
                                response.tin.SR,
                                response.te.SR,
                                response.sif.SR,
                                response.mt.SR,
                            ]
                        },
                        {
                            label: 'CS',
                            backgroundColor: '#9bbb59',
                            borderColor: '#9bbb59',
                            data: [
                                response.tif.CS,
                                response.tin.CS,
                                response.te.CS,
                                response.sif.CS,
                                response.mt.CS,
                            ]
                        },
                        {
                            label: 'EH',
                            backgroundColor: '#8064a2',
                            borderColor: '#8064a2',
                            data: [
                                response.tif.EH,
                                response.tin.EH,
                                response.te.EH,
                                response.sif.EH,
                                response.mt.EH,
                            ]
                        },
                        {
                            label: 'QK',
                            backgroundColor: '#4bacc6',
                            borderColor: '#4bacc6',
                            data: [
                                response.tif.QK,
                                response.tin.QK,
                                response.te.QK,
                                response.sif.QK,
                                response.mt.QK,
                            ]
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
                        text: 'Hasil Performansi Berdasarkan Jurusan di Fakultas Sains dan Teknologi'
                    },
                }
            });
        }
    });

});
