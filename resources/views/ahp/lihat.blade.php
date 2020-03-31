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
                        @endif
                    @endif
                    <!-- /form -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
