@extends('layouts.app')

@section('content')
    <div class="dt-content">


        <!-- Grid -->
        <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-12">


                <!-- Card -->
                <div class="card">
                    <!-- Entry Heading -->
                    <div class="card-header">
                        <h3 class="card-title">Performance Measurement</h3>
                    </div>
                    <!-- /entry heading -->

                    <!-- Card Body -->
                    <div class="card-content">
                        <div class="card-body">

                        <!-- Tables -->
                        <div class="table-responsive">

                            @php
                                //echo '<pre>';
                                //var_dump($rataRata);
                            @endphp
                            @foreach($kriteria as $key => $value)
                            <h4>{{$namaKriteria[$value]}}</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Subkriteria</th>
                                        <th>Hasil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pm[$value] as $key2 => $value2)
                                    <tr>
                                        <td>{{$key2}}</td>
                                        <td>{{$value2}}</td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="2">Nilai Total Kriteria</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $pengaruh = null;
                                $tinggi = max($rataRata);
                                @endphp
                                @foreach($rataRata as $key2 => $value2)
                                    @if($value2 == $tinggi)
                                        @php $pengaruh = $key2; @endphp
                                    @endif
                                    <tr>
                                        <td>{{$key2}}</td>
                                        <td>{{$value2}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Jumlah</th>
                                    <th>{{$totalSeluruh}}</th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /tables -->
                        <hr>
                        <p>Skala</p>
                        <div>
                            <table style="width: 100%;" >
                                <tr class="text-center">
                                    <td width="20%" style="border-left: 1px solid #512da8">Tidak Bagus</td>
                                    <td width="40%" style="border-left: 1px solid #512da8">Cukup Bagus</td>
                                    <td width="40%" style="border-right: 1px solid #512da8;border-left: 1px solid #512da8">Bagus</td>
                                </tr>
                            </table>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar" role="progressbar" style="width: {{($totalSeluruh*10) * 2}}%"
                                 aria-valuenow="{{$totalSeluruh*10}}" aria-valuemin="0"
                                 aria-valuemax="50">{{round($totalSeluruh,3)}}
                            </div>
                        </div>


                        <p>Kategori = {{performa($totalSeluruh)}}</p>
                        <p>Nilai Tertinggi =  {{max($rataRata)}}</p>
                        <p>Kriteria yang paling berpengaruh = {{$namaKriteria[$pengaruh]}}</p>
                    </div>
                    </div>
                    <!-- /card body -->

                </div>
                <!-- /card -->

            </div>
            <!-- /grid item -->

        </div>
        <!-- /grid -->

    </div>
@endsection
