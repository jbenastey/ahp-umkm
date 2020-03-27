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
                            <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/matriks-kriteria')}}" class="btn btn-primary btn-sm">Hitung</a>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <th>HR</th>
                                    <th>SR</th>
                                    <th>CS</th>
                                    <th>EH</th>
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
                                    <td>{{$hr->HR}}</td>
                                    <td>{{$hr->SR}}</td>
                                    <td>{{$hr->CS}}</td>
                                    <td>{{$hr->EH}}</td>
                                    <td>{{$hr->QK}}</td>
                                </tr>
                                <tr>
                                    <td>SR</td>
                                    <td>{{$sr->HR}}</td>
                                    <td>{{$sr->SR}}</td>
                                    <td>{{$sr->CS}}</td>
                                    <td>{{$sr->EH}}</td>
                                    <td>{{$sr->QK}}</td>
                                </tr>
                                <tr>
                                    <td>CS</td>
                                    <td>{{$cs->HR}}</td>
                                    <td>{{$cs->SR}}</td>
                                    <td>{{$cs->CS}}</td>
                                    <td>{{$cs->EH}}</td>
                                    <td>{{$cs->QK}}</td>
                                </tr>
                                <tr>
                                    <td>EH</td>
                                    <td>{{$eh->HR}}</td>
                                    <td>{{$eh->SR}}</td>
                                    <td>{{$eh->CS}}</td>
                                    <td>{{$eh->EH}}</td>
                                    <td>{{$eh->QK}}</td>
                                </tr>
                                <tr>
                                    <td>QK</td>
                                    <td>{{$qk->HR}}</td>
                                    <td>{{$qk->SR}}</td>
                                    <td>{{$qk->CS}}</td>
                                    <td>{{$qk->EH}}</td>
                                    <td>{{$qk->QK}}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                        <!-- /form -->
                        <hr>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
