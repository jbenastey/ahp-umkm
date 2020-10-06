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
                        <h3 class="card-title">Data AHP</h3>
                    </div>
                    <!-- /entry heading -->
                    <!-- Card Body -->
                    <div class="card-content">
                        <div class="card-body">

                        <!-- Tables -->
                        <div class="table-responsive">

                            <table id="data-table" class="table table-striped table-bordered table-hover zero-configuration">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Nama UMKM</th>
                                    <th>Jabatan</th>
                                    <th class="text-center"><i class="icon icon-settings"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kuesioner as $value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->kuesioner_nama}}</td>
                                        <td>{{$value->kuesioner_umur}}</td>
                                        <td>{{getNamaUmkm($value->kuesioner_umkm)}}</td>
                                        <td>{{$value->kuesioner_jabatan}}</td>
                                        <td class="text-center">
                                            <a href="{{url('/ahp/'.$value->kuesioner_id.'/lihat')}}" class="btn btn-sm btn-primary">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Nama UMKM</th>
                                    <th>Jabatan</th>
                                    <th class="text-center"><i class="icon icon-settings"></i></th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /tables -->

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
