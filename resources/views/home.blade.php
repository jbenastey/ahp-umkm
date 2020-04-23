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
                                            <canvas id="dosen-chart" width="1000" height="280"></canvas>
                                        </div>
                                        <hr>
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
