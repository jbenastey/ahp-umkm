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
                        <h3 class="dt-entry__title">Data Kriteria</h3>
                    </div>
                    <!-- /entry heading -->

                </div>
                <!-- /entry header -->

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body">
                        <a href="{{url('master/create')}}" class="btn btn-sm btn-primary mb-5"><i class="icon icon-plus"></i> Tambah Kriteria</a>
                        <!-- Tables -->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kriteria</th>
                                    <th class="text-center"><i class="icon icon-settings"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kriteria as $value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->kriteria_nama}}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-sm btn-primary">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /tables -->

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
