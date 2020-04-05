@extends('layouts.app')

@section('content')
    <div class="dt-content">


        <!-- Grid -->
        <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-12">

                <!-- Entry Header -->
                <div class="dt-entry__header">

                    <!-- Entry Heading -->
                    <div class="dt-entry__heading">
                        <h3 class="dt-entry__title">Data AHP</h3>
                    </div>
                    <!-- /entry heading -->

                </div>
                <!-- /entry header -->

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body">
                        <h4>Matriks Perbandingan Kriteria</h4>
                        @if($kriteria == null)
                            <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/matriks-kriteria')}}"
                               class="btn btn-primary btn-sm">Hitung</a>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <th>HR</th>
                                    <th>CS</th>
                                    <th>EH</th>
                                    <th>SR</th>
                                    <th>QK</th>
                                </tr>
                                </thead>
                                @php
                                    $hr = json_decode($kriteria->kriteria_hr);
                                    $sr = json_decode($kriteria->kriteria_sr);
                                    $cs = json_decode($kriteria->kriteria_cs);
                                    $eh = json_decode($kriteria->kriteria_eh);
                                    $qk = json_decode($kriteria->kriteria_qk);
                                @endphp
                                <tbody>
                                <tr>
                                    <td>HR</td>
                                    <td>{{round($hr->HR,2)}}</td>
                                    <td>{{round($hr->CS,2)}}</td>
                                    <td>{{round($hr->EH,2)}}</td>
                                    <td>{{round($hr->SR,2)}}</td>
                                    <td>{{round($hr->QK,2)}}</td>
                                </tr>
                                <tr>
                                    <td>CS</td>
                                    <td>{{round($cs->HR,2)}}</td>
                                    <td>{{round($cs->CS,2)}}</td>
                                    <td>{{round($cs->EH,2)}}</td>
                                    <td>{{round($cs->SR,2)}}</td>
                                    <td>{{round($cs->QK,2)}}</td>
                                </tr>
                                <tr>
                                    <td>EH</td>
                                    <td>{{round($eh->HR,2)}}</td>
                                    <td>{{round($eh->CS,2)}}</td>
                                    <td>{{round($eh->EH,2)}}</td>
                                    <td>{{round($eh->SR,2)}}</td>
                                    <td>{{round($eh->QK,2)}}</td>
                                </tr>
                                <tr>
                                    <td>SR</td>
                                    <td>{{round($sr->HR,2)}}</td>
                                    <td>{{round($sr->CS,2)}}</td>
                                    <td>{{round($sr->EH,2)}}</td>
                                    <td>{{round($sr->SR,2)}}</td>
                                    <td>{{round($sr->QK,2)}}</td>
                                </tr>
                                <tr>
                                    <td>QK</td>
                                    <td>{{round($qk->HR,2)}}</td>
                                    <td>{{round($qk->CS,2)}}</td>
                                    <td>{{round($qk->EH,2)}}</td>
                                    <td>{{round($qk->SR,2)}}</td>
                                    <td>{{round($qk->QK,2)}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <h4>Penjumlahan Nilai Setiap Kolom</h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <th>HR</th>
                                    <th>CS</th>
                                    <th>EH</th>
                                    <th>SR</th>
                                    <th>QK</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>HR</td>
                                    <td>{{round($hr->HR,2)}}</td>
                                    <td>{{round($hr->CS,2)}}</td>
                                    <td>{{round($hr->EH,2)}}</td>
                                    <td>{{round($hr->SR,2)}}</td>
                                    <td>{{round($hr->QK,2)}}</td>
                                </tr>
                                <tr>
                                    <td>CS</td>
                                    <td>{{round($cs->HR,2)}}</td>
                                    <td>{{round($cs->CS,2)}}</td>
                                    <td>{{round($cs->EH,2)}}</td>
                                    <td>{{round($cs->SR,2)}}</td>
                                    <td>{{round($cs->QK,2)}}</td>
                                </tr>
                                <tr>
                                    <td>EH</td>
                                    <td>{{round($eh->HR,2)}}</td>
                                    <td>{{round($eh->CS,2)}}</td>
                                    <td>{{round($eh->EH,2)}}</td>
                                    <td>{{round($eh->SR,2)}}</td>
                                    <td>{{round($eh->QK,2)}}</td>
                                </tr>
                                <tr>
                                    <td>SR</td>
                                    <td>{{round($sr->HR,2)}}</td>
                                    <td>{{round($sr->CS,2)}}</td>
                                    <td>{{round($sr->EH,2)}}</td>
                                    <td>{{round($sr->SR,2)}}</td>
                                    <td>{{round($sr->QK,2)}}</td>
                                </tr>
                                <tr>
                                    <td>QK</td>
                                    <td>{{round($qk->HR,2)}}</td>
                                    <td>{{round($qk->CS,2)}}</td>
                                    <td>{{round($qk->EH,2)}}</td>
                                    <td>{{round($qk->SR,2)}}</td>
                                    <td>{{round($qk->QK,2)}}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td><b>Jumlah</b></td>
                                    <td>{{round($hr->HR +$cs->HR +$eh->HR +$sr->HR +$qk->HR,2)  }}</td>
                                    <td>{{round($hr->CS +$cs->CS +$eh->CS +$sr->CS +$qk->CS,2)  }}</td>
                                    <td>{{round($hr->EH +$cs->EH +$eh->EH +$sr->EH +$qk->EH,2)  }}</td>
                                    <td>{{round($hr->SR +$cs->SR +$eh->SR +$sr->SR +$qk->SR,2)  }}</td>
                                    <td>{{round($hr->QK +$cs->QK +$eh->QK +$sr->QK +$qk->QK,2)  }}</td>
                                </tr>
                                </tfoot>
                            </table>
                            <hr>
                            <h4>Pembagian Nilai Kolom dengan Jumlah Kolom</h4>
                            @if($bagi == null)
                                <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/bagi-kriteria')}}"
                                   class="btn btn-primary btn-sm">Hitung</a>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>HR</th>
                                        <th>CS</th>
                                        <th>EH</th>
                                        <th>SR</th>
                                        <th>QK</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $hr = json_decode($bagi->pembagian_hr);
                                        $sr = json_decode($bagi->pembagian_sr);
                                        $cs = json_decode($bagi->pembagian_cs);
                                        $eh = json_decode($bagi->pembagian_eh);
                                        $qk = json_decode($bagi->pembagian_qk);
                                    @endphp
                                    <tbody>
                                    <tr>
                                        <td>HR</td>
                                        <td>{{round($hr->HR,4)}}</td>
                                        <td>{{round($cs->HR,4)}}</td>
                                        <td>{{round($eh->HR,4)}}</td>
                                        <td>{{round($sr->HR,4)}}</td>
                                        <td>{{round($qk->HR,4)}}</td>
                                    </tr>
                                    <tr>
                                        <td>CS</td>
                                        <td>{{round($hr->CS,4)}}</td>
                                        <td>{{round($cs->CS,4)}}</td>
                                        <td>{{round($eh->CS,4)}}</td>
                                        <td>{{round($sr->CS,4)}}</td>
                                        <td>{{round($qk->CS,4)}}</td>
                                    </tr>
                                    <tr>
                                        <td>EH</td>
                                        <td>{{round($hr->EH,4)}}</td>
                                        <td>{{round($cs->EH,4)}}</td>
                                        <td>{{round($eh->EH,4)}}</td>
                                        <td>{{round($sr->EH,4)}}</td>
                                        <td>{{round($qk->EH,4)}}</td>
                                    </tr>
                                    <tr>
                                        <td>SR</td>
                                        <td>{{round($hr->SR,4)}}</td>
                                        <td>{{round($cs->SR,4)}}</td>
                                        <td>{{round($eh->SR,4)}}</td>
                                        <td>{{round($sr->SR,4)}}</td>
                                        <td>{{round($qk->SR,4)}}</td>
                                    </tr>
                                    <tr>
                                        <td>QK</td>
                                        <td>{{round($hr->QK,4)}}</td>
                                        <td>{{round($cs->QK,4)}}</td>
                                        <td>{{round($eh->QK,4)}}</td>
                                        <td>{{round($sr->QK,4)}}</td>
                                        <td>{{round($qk->QK,4)}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <h4>Nilai Rata" Matriks Perbandingan</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Jumlah Nilai Tiap Baris</th>
                                        <th>Rata-Rata</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $hr = json_decode($bagi->pembagian_hr);
                                        $sr = json_decode($bagi->pembagian_sr);
                                        $cs = json_decode($bagi->pembagian_cs);
                                        $eh = json_decode($bagi->pembagian_eh);
                                        $qk = json_decode($bagi->pembagian_qk);

                                            $jumlah_hr = round($qk->HR +$hr->HR +$cs->HR +$eh->HR +$sr->HR ,4);
                                            $jumlah_sr = round($qk->SR +$hr->SR +$cs->SR +$eh->SR +$sr->SR ,4);
                                            $jumlah_cs = round($qk->CS +$hr->CS +$cs->CS +$eh->CS +$sr->CS ,4);
                                            $jumlah_eh = round($qk->EH +$hr->EH +$cs->EH +$eh->EH +$sr->EH ,4);
                                            $jumlah_qk = round($qk->QK +$hr->QK +$cs->QK +$eh->QK +$sr->QK ,4);

                                            $rata_hr = round($jumlah_hr/5,4);
                                            $rata_sr = round($jumlah_sr/5,4);
                                            $rata_cs = round($jumlah_cs/5,4);
                                            $rata_eh = round($jumlah_eh/5,4);
                                            $rata_qk = round($jumlah_qk/5,4);
                                    @endphp
                                    <tbody>
                                    <tr>
                                        <td>HR</td>
                                        <td>{{round($qk->HR + $sr->HR + $eh->HR + $cs->HR + $hr->HR,4)}}</td>
                                        <td>{{round(($qk->HR + $sr->HR + $eh->HR + $cs->HR + $hr->HR)/5,4)}}</td>
                                    </tr>
                                    <tr>
                                        <td>CS</td>
                                        <td>{{round($qk->CS + $sr->CS + $eh->CS + $cs->CS + $hr->CS,4)}}</td>
                                        <td>{{round(($qk->CS + $sr->CS + $eh->CS + $cs->CS + $hr->CS)/5,4)}}</td>
                                    </tr>
                                    <tr>
                                        <td>EH</td>
                                        <td>{{round($qk->EH + $sr->EH + $eh->EH + $cs->EH + $hr->EH,4)}}</td>
                                        <td>{{round(($qk->EH + $sr->EH + $eh->EH + $cs->EH + $hr->EH)/5,4)}}</td>
                                    </tr>
                                    <tr>
                                        <td>SR</td>
                                        <td>{{round($qk->SR + $sr->SR + $eh->SR + $cs->SR + $hr->SR,4)}}</td>
                                        <td>{{round(($qk->SR + $sr->SR + $eh->SR + $cs->SR + $hr->SR)/5,4)}}</td>
                                    </tr>
                                    <tr>
                                        <td>QK</td>
                                        <td>{{round($qk->QK + $sr->QK + $eh->QK + $cs->QK + $hr->QK,4)}}</td>
                                        <td>{{round(($qk->QK + $sr->QK + $eh->QK + $cs->QK + $hr->QK)/5,4)}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <h4>Perkalian Nilai Matriks Perbandingan dengan Rata-rata</h4>
                            @if($kali == null)
                                    <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/kali-kriteria')}}"
                                       class="btn btn-primary btn-sm">Hitung</a>
                            @else
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>HR</th>
                                            <th>CS</th>
                                            <th>EH</th>
                                            <th>SR</th>
                                            <th>QK</th>
                                        </tr>
                                        </thead>
                                        @php
                                            $hr = json_decode($kali->perkalian_hr);
                                            $sr = json_decode($kali->perkalian_sr);
                                            $cs = json_decode($kali->perkalian_cs);
                                            $eh = json_decode($kali->perkalian_eh);
                                            $qk = json_decode($kali->perkalian_qk);
                                        @endphp
                                        <tbody>
                                        <tr>
                                            <td>HR</td>
                                            <td>{{round($hr->HR,4)}}</td>
                                            <td>{{round($cs->HR,4)}}</td>
                                            <td>{{round($eh->HR,4)}}</td>
                                            <td>{{round($sr->HR,4)}}</td>
                                            <td>{{round($qk->HR,4)}}</td>
                                        </tr>
                                        <tr>
                                            <td>CS</td>
                                            <td>{{round($hr->CS,4)}}</td>
                                            <td>{{round($cs->CS,4)}}</td>
                                            <td>{{round($eh->CS,4)}}</td>
                                            <td>{{round($sr->CS,4)}}</td>
                                            <td>{{round($qk->CS,4)}}</td>
                                        </tr>
                                        <tr>
                                            <td>EH</td>
                                            <td>{{round($hr->EH,4)}}</td>
                                            <td>{{round($cs->EH,4)}}</td>
                                            <td>{{round($eh->EH,4)}}</td>
                                            <td>{{round($sr->EH,4)}}</td>
                                            <td>{{round($qk->EH,4)}}</td>
                                        </tr>
                                        <tr>
                                            <td>SR</td>
                                            <td>{{round($hr->SR,4)}}</td>
                                            <td>{{round($cs->SR,4)}}</td>
                                            <td>{{round($eh->SR,4)}}</td>
                                            <td>{{round($sr->SR,4)}}</td>
                                            <td>{{round($qk->SR,4)}}</td>
                                        </tr>
                                        <tr>
                                            <td>QK</td>
                                            <td>{{round($hr->QK,4)}}</td>
                                            <td>{{round($cs->QK,4)}}</td>
                                            <td>{{round($eh->QK,4)}}</td>
                                            <td>{{round($sr->QK,4)}}</td>
                                            <td>{{round($qk->QK,4)}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                <h4>Jumlah Nilai Setiap Baris</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>HR</th>
                                            <th>CS</th>
                                            <th>EH</th>
                                            <th>SR</th>
                                            <th>QK</th>
                                            <th><b>Jumlah</b></th>
                                        </tr>
                                        </thead>
                                        @php
                                            $hr = json_decode($kali->perkalian_hr);
                                            $sr = json_decode($kali->perkalian_sr);
                                            $cs = json_decode($kali->perkalian_cs);
                                            $eh = json_decode($kali->perkalian_eh);
                                            $qk = json_decode($kali->perkalian_qk);
                                        @endphp
                                        <tbody>
                                        <tr>
                                            <td>HR</td>
                                            <td>{{round($hr->HR,4)}}</td>
                                            <td>{{round($cs->HR,4)}}</td>
                                            <td>{{round($eh->HR,4)}}</td>
                                            <td>{{round($sr->HR,4)}}</td>
                                            <td>{{round($qk->HR,4)}}</td>
                                            <td><b>{{round($qk->HR +$hr->HR +$cs->HR +$eh->HR +$sr->HR ,4)}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>CS</td>
                                            <td>{{round($hr->CS,4)}}</td>
                                            <td>{{round($cs->CS,4)}}</td>
                                            <td>{{round($eh->CS,4)}}</td>
                                            <td>{{round($sr->CS,4)}}</td>
                                            <td>{{round($qk->CS,4)}}</td>
                                            <td><b>{{round($qk->CS +$hr->CS +$cs->CS +$eh->CS +$sr->CS ,4)}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>EH</td>
                                            <td>{{round($hr->EH,4)}}</td>
                                            <td>{{round($cs->EH,4)}}</td>
                                            <td>{{round($eh->EH,4)}}</td>
                                            <td>{{round($sr->EH,4)}}</td>
                                            <td>{{round($qk->EH,4)}}</td>
                                            <td><b>{{round($qk->EH +$hr->EH +$cs->EH +$eh->EH +$sr->EH ,4)}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>SR</td>
                                            <td>{{round($hr->SR,4)}}</td>
                                            <td>{{round($cs->SR,4)}}</td>
                                            <td>{{round($eh->SR,4)}}</td>
                                            <td>{{round($sr->SR,4)}}</td>
                                            <td>{{round($qk->SR,4)}}</td>
                                            <td><b>{{round($qk->SR +$hr->SR +$cs->SR +$eh->SR +$sr->SR ,4)}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>QK</td>
                                            <td>{{round($hr->QK,4)}}</td>
                                            <td>{{round($cs->QK,4)}}</td>
                                            <td>{{round($eh->QK,4)}}</td>
                                            <td>{{round($sr->QK,4)}}</td>
                                            <td>{{round($qk->QK,4)}}</td>
                                            <td><b>{{round($qk->QK +$hr->QK +$cs->QK +$eh->QK +$sr->QK ,4)}}</b></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                <h4>Hasil Jumlah Baris di Bagi dengan Rata-rata</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Jumlah / Rata-rata</th>
                                            <th>Hasil</th>
                                        </tr>
                                        </thead>
                                        @php
                                            $jumlah_hr = round($qk->HR +$hr->HR +$cs->HR +$eh->HR +$sr->HR ,4);
                                            $jumlah_sr = round($qk->SR +$hr->SR +$cs->SR +$eh->SR +$sr->SR ,4);
                                            $jumlah_cs = round($qk->CS +$hr->CS +$cs->CS +$eh->CS +$sr->CS ,4);
                                            $jumlah_eh = round($qk->EH +$hr->EH +$cs->EH +$eh->EH +$sr->EH ,4);
                                            $jumlah_qk = round($qk->QK +$hr->QK +$cs->QK +$eh->QK +$sr->QK ,4);
                                        @endphp
                                        <tbody>
                                        <tr>
                                            <td>HR</td>
                                            <td>{{$jumlah_hr}} / {{$rata_hr}}</td>
                                            <td>{{round($jumlah_hr/$rata_hr,4)}}</td>
                                        </tr>
                                        <tr>
                                            <td>CS</td>
                                            <td>{{$jumlah_cs}} / {{$rata_cs}}</td>
                                            <td>{{round($jumlah_cs/$rata_cs,4)}}</td>
                                        </tr>
                                        <tr>
                                            <td>EH</td>
                                            <td>{{$jumlah_eh}} / {{$rata_eh}}</td>
                                            <td>{{round($jumlah_eh/$rata_eh,4)}}</td>
                                        </tr>
                                        <tr>
                                            <td>SR</td>
                                            <td>{{$jumlah_sr}} / {{$rata_sr}}</td>
                                            <td>{{round($jumlah_sr/$rata_sr,4)}}</td>
                                        </tr>
                                        <tr>
                                            <td>QK</td>
                                            <td>{{$jumlah_qk}} / {{$rata_qk}}</td>
                                            <td>{{round($jumlah_qk/$rata_qk,4)}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @php
                                $jumlahSemua = ($jumlah_qk/$rata_qk) +($jumlah_sr/$rata_sr) +($jumlah_eh/$rata_eh) +($jumlah_cs/$rata_cs) +($jumlah_hr/$rata_hr);
                                $rata = $jumlahSemua/5;
                                $ci = ($rata-5)/(5-1);
                                $cr = $ci / ri(5);
                                @endphp
                                Jumlah = {{round($jumlahSemua,4)}} <br>
                                Rata-Rata = {{round($rata,4)}} <br>
                                CI = {{round($ci,4)}} <br>
                                CR = {{round($cr,4)}}
                            @endif
                        @endif
                    @endif
                    <!-- /form -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
