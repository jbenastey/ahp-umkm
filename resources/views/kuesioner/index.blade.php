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
                    <h3 class="dt-entry__title">Data Kuesioner</h3>
                </div>
                <!-- /entry heading -->

            </div>
            <!-- /entry header -->

            <!-- Card -->
            <div class="dt-card">

                <!-- Card Body -->
                <div class="dt-card__body">

                    <!-- Tables -->
                    <div class="table-responsive">

                        <table id="data-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Jurusan</th>
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
                                    <td>{{$value->kuesioner_jurusan}}</td>
                                    <td>{{$value->kuesioner_jabatan}}</td>
                                    <td class="text-center">
                                        <a href="{{url('/kuesioner/'.$value->kuesioner_id.'/lihat')}}" class="btn btn-sm btn-primary">Lihat</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Jurusan</th>
                                <th>Jabatan</th>
                                <th class="text-center"><i class="icon icon-settings"></i></th>
                            </tr>
                            </tfoot>
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
