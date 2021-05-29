@extends('layouts.app')

@section('content')
    <div class="dt-content">


        <!-- Grid -->
        <div class="row">

            <!-- Grid Item -->
            <div class="col-xl-12">


                <!-- Card -->
                <div class="card">

                    <!-- Entry Header -->
                    <div class="card-header">
                        <h3 class="card-title">Data UMKM</h3>
                    </div>

                    <!-- Card Body -->
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Tables -->
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered table-hover zero-configuration">
                                    <a href="{{url('umkm/create')}}" class="btn btn-sm btn-primary ml-1 float-right"><i class="icon icon-plus"></i> Tambah UMKM</a>
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode UMKM</th>
                                        <th>Nama UMKM</th>
                                        <th class="text-center"><i class="icon icon-settings"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($umkm as $value)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$value->umkm_kode}}</td>
                                            <td>{{$value->umkm_nama}}</td>
                                            <td class="text-center">

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
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
