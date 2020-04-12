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
                        <h4>Knowledge Sharing</h4>
                        <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/hitung/ks')}}"
                                                                 class="btn btn-primary btn-sm">Hitung</a>
                    <!-- /form -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
