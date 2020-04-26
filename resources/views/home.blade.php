@extends('layouts.app')

@section('content')
        <!-- Site Content -->
        <div class="dt-content">

            <!-- Entry Header -->
            <div class="dt-entry__header">

                <!-- Entry Heading -->
                <div class="dt-entry__heading">
                    <h3 class="dt-entry__title">Dashboard</h3>
                </div>
                <!-- /entry heading -->

            </div>
            <!-- /entry header -->

            <!-- Grid -->
            <div class="row mb-sm-8">

                <!-- Grid Item -->
                <div class="col-12">

                    <!-- Card -->
                    <div class="dt-card">

                        <!-- Card Body -->
                        <div class="dt-card__body">


                            <!-- Grid -->
                            <div class="row">
                                <div class="col-12">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                        <div class="chart">
                                            <canvas id="fakultas-chart" width="1000" height="280"></canvas>
                                        </div>
                                        <hr>
                                        <div class="chart">
                                            <canvas id="jurusan-chart" width="1000" height="280"></canvas>
                                        </div>
                                        <hr>
                                        <select name="jurusan" id="jurusan">
                                            <option selected disabled>Pilih Jurusan</option>
                                            <option value="tif">Teknik Informatika</option>
                                            <option value="tin">Teknik Industri</option>
                                            <option value="te">Teknik Elektro</option>
                                            <option value="sif">Sistem Informasi</option>
                                            <option value="mt">Matematika Terapan</option>
                                        </select>
                                        <div id="individu">

                                        </div>
                                </div>
                            </div>
                            <!-- /grid -->


                        </div>
                        <!-- /card body -->

                    </div>
                    <!-- /card -->

                </div>
                <!-- /grid item -->

            </div>
            <!-- /grid -->

        </div>
        <!-- /site content -->
@endsection
