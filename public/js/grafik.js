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
            var sb = (response.mpg.SB + response.ivo.SB + response.ts.SB + response.dt.SB + response.it.SB) / 5;
            var ipk = (response.mpg.IPK + response.ivo.IPK + response.ts.IPK + response.dt.IPK + response.it.IPK) / 5;
            var ppk = (response.mpg.PPK + response.ivo.PPK + response.ts.PPK + response.dt.PPK + response.it.PPK) / 5;


            var fChart = new Chart(fakultas, {
                type: 'bar',
                data: {
                    labels: ['UMKM'],
                    datasets: [
                        {
                            label: 'SB',
                            backgroundColor: '#4f81bd',
                            borderColor: '#4f81bd',
                            data: [
                                sb,
                            ]
                        },
                        {
                            label: 'IPK',
                            backgroundColor: '#c0504d',
                            borderColor: '#c0504d',
                            data: [
                                ipk,
                            ]
                        },
                        {
                            label: 'PPK',
                            backgroundColor: '#9bbb59',
                            borderColor: '#9bbb59',
                            data: [
                                ppk,
                            ]
                        },
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
                        text: 'Hasil Performansi UMKM'
                    },
                }
            });

            var jChart = new Chart(jurusan, {
                type: 'bar',
                data: {
                    labels: ['Merah Putih Grosir','IVO','Tokyo Style','Dunia Tekstil','Istana Tekstil'],
                    datasets: [
                        {
                            label: 'SB',
                            backgroundColor: '#4f81bd',
                            borderColor: '#4f81bd',
                            data: [
                                response.mpg.SB,
                                response.ivo.SB,
                                response.ts.SB,
                                response.dt.SB,
                                response.it.SB,
                            ]
                        },
                        {
                            label: 'IPK',
                            backgroundColor: '#c0504d',
                            borderColor: '#c0504d',
                            data: [
                                response.mpg.IPK,
                                response.ivo.IPK,
                                response.ts.IPK,
                                response.dt.IPK,
                                response.it.IPK,
                            ]
                        },
                        {
                            label: 'PPK',
                            backgroundColor: '#9bbb59',
                            borderColor: '#9bbb59',
                            data: [
                                response.mpg.PPK,
                                response.ivo.PPK,
                                response.ts.PPK,
                                response.dt.PPK,
                                response.it.PPK,
                            ]
                        },
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
                        text: 'Hasil Performansi Berdasarkan Nama UMKM'
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
        var sb = [];
        var ipk = [];
        var ppk = [];
        $.ajax({
            url: root + 'grafik/individu/'+jur,
            type: 'GET',
            async: true,
            cache: false,
            dataType: 'json',
            success: function (response) {

                for (var i = 0; i < response.length ; i++) {
                    nama.push(response[i].nama);
                    sb.push(response[i].hasil.SB);
                    ipk.push(response[i].hasil.IPK);
                    ppk.push(response[i].hasil.PPK);
                }

                var individu = $('#individu-chart');
                var iChart = new Chart(individu, {
                    type: 'bar',
                    data: {
                        labels: nama,
                        datasets: [
                            {
                                label: 'SB',
                                backgroundColor: '#4f81bd',
                                borderColor: '#4f81bd',
                                data:
                                    sb
                            },
                            {
                                label: 'IPK',
                                backgroundColor: '#c0504d',
                                borderColor: '#c0504d',
                                data: ipk
                            },
                            {
                                label: 'PPK',
                                backgroundColor: '#9bbb59',
                                borderColor: '#9bbb59',
                                data: ppk
                            },
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
                            text: 'Hasil Performansi Individu '+jurusannya(jur)
                        },
                    }
                });
            }
        });
    })
});

function jurusannya(jur) {
    var jurusan = '';
    if (jur === 'mpg'){
        jurusan = 'Merah Putih Grosir'
    } else if (jur === 'ivo'){
        jurusan = 'IVO'
    } else if (jur === 'ts'){
        jurusan = 'Tokyo Style'
    } else if (jur === 'dt'){
        jurusan = 'Dunia Tekstil'
    } else if (jur === 'it'){
        jurusan = 'Istana Tekstil'
    }
    return jurusan
}
