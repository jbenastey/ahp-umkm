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
                        <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/matriks-kriteria')}}" class="btn btn-primary btn-sm">Hitung</a>
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
                            <tbody>
                            <tr>
                                <td>HR</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>SR</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>CS</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>EH</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>QK</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- /form -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
