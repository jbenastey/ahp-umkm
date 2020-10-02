$(document).ready(function () {

    $('#btn-pertama').click(function () {
        $('#kedua').css('display','block');
        $('#btn-pertama').css('display','none');
    })
    $('#btn-kedua').click(function () {
        $('#kriteria').css('display','block');
        $('#btn-kedua').css('display','none');
    })
    $('#btn-kriteria').click(function () {
        $('#simpan').css('display','flex');
        $('#btn-kriteria').css('display','none');
    })

    'use strict';
    var root = window.location.origin + '/ahp-umkm/public/';

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    };

    var mode = 'index';
    var intersect = true;

    var fakultas = $('#fakultas-chart');
    var jurusan = $('#jurusan-chart');
    $.ajax({
        url: root + 'grafik/jurusan',
        type: 'GET',
        async: true,
        cache: false,
        dataType: 'json',
        success: function (response) {
            var hr = (response.tif.HR + response.tin.HR + response.te.HR + response.sif.HR + response.mt.HR) / 5;
            var cs = (response.tif.CS + response.tin.CS + response.te.CS + response.sif.CS + response.mt.CS) / 5;
            var eh = (response.tif.EH + response.tin.EH + response.te.EH + response.sif.EH + response.mt.EH) / 5;
            var sr = (response.tif.SR + response.tin.SR + response.te.SR + response.sif.SR + response.mt.SR) / 5;
            var qk = (response.tif.QK + response.tin.QK + response.te.QK + response.sif.QK + response.mt.QK) / 5;


            var fChart = new Chart(fakultas, {
                type: 'bar',
                data: {
                    labels: ['Fakultas Sains dan Teknologi'],
                    datasets: [
                        {
                            label: 'HR',
                            backgroundColor: '#4f81bd',
                            borderColor: '#4f81bd',
                            data: [
                                hr,
                            ]
                        },
                        {
                            label: 'SR',
                            backgroundColor: '#c0504d',
                            borderColor: '#c0504d',
                            data: [
                                sr,
                            ]
                        },
                        {
                            label: 'CS',
                            backgroundColor: '#9bbb59',
                            borderColor: '#9bbb59',
                            data: [
                                cs,
                            ]
                        },
                        {
                            label: 'EH',
                            backgroundColor: '#8064a2',
                            borderColor: '#8064a2',
                            data: [
                                eh,
                            ]
                        },
                        {
                            label: 'QK',
                            backgroundColor: '#4bacc6',
                            borderColor: '#4bacc6',
                            data: [
                                qk,
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
                        text: 'Hasil Performansi Fakultas Sains dan Teknologi'
                    },
                }
            });

            var jChart = new Chart(jurusan, {
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

    $('#jurusan').change(function () {
        $('#individu').html(
            '<div class="chart">' +
                '<canvas id="individu-chart" width="1000" height="280"></canvas>' +
            '</div>' +
            '<hr>'
        );
        var jur = $(this).val();
        var nama = [];
        var hr = [];
        var sr = [];
        var cs = [];
        var eh = [];
        var qk = [];
        $.ajax({
            url: root + 'grafik/individu/'+jur,
            type: 'GET',
            async: true,
            cache: false,
            dataType: 'json',
            success: function (response) {

                for (var i = 0; i < response.length ; i++) {
                    nama.push(response[i].nama);
                    hr.push(response[i].hasil.HR);
                    sr.push(response[i].hasil.SR);
                    cs.push(response[i].hasil.CS);
                    eh.push(response[i].hasil.EH);
                    qk.push(response[i].hasil.QK);
                }

                var individu = $('#individu-chart');
                var iChart = new Chart(individu, {
                    type: 'bar',
                    data: {
                        labels: nama,
                        datasets: [
                            {
                                label: 'HR',
                                backgroundColor: '#4f81bd',
                                borderColor: '#4f81bd',
                                data:
                                    hr
                            },
                            {
                                label: 'SR',
                                backgroundColor: '#c0504d',
                                borderColor: '#c0504d',
                                data: sr
                            },
                            {
                                label: 'CS',
                                backgroundColor: '#9bbb59',
                                borderColor: '#9bbb59',
                                data: cs
                            },
                            {
                                label: 'EH',
                                backgroundColor: '#8064a2',
                                borderColor: '#8064a2',
                                data: eh
                            },
                            {
                                label: 'QK',
                                backgroundColor: '#4bacc6',
                                borderColor: '#4bacc6',
                                data: qk
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: true,
                            position: 'bottom',
                        },
                        hover: {
                            mode: mode,
                            intersect: intersect
                        },
                        tooltips: {
                            mode: mode,
                            intersect: intersect
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
                            text: 'Hasil Performansi Individu Jurusan '+jurusannya(jur)
                        },
                    }
                });
            }
        });
    })
});

function jurusannya(jur) {
    var jurusan = '';
    if (jur === 'tif'){
        jurusan = 'Teknik Informatika'
    } else if (jur === 'tin'){
        jurusan = 'Teknik Industri'
    } else if (jur === 'te'){
        jurusan = 'Teknik Elektro'
    } else if (jur === 'sif'){
        jurusan = 'Sistem Informasi'
    } else if (jur === 'mt'){
        jurusan = 'Matematika Terapan'
    }
    return jurusan
}
