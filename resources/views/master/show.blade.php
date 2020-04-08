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
                        <h3 class="dt-entry__title">Data Kriteria {{$kriteria->kriteria_nama}}</h3>
                    </div>
                    <!-- /entry heading -->

                </div>
                <!-- /entry header -->

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body">
                        <a href="{{url('pernyataan/'.$kriteria->kriteria_id.'/create')}}" class="btn btn-sm btn-primary mb-5"><i class="icon icon-plus"></i> Tambah Pernyataan</a>
                        <!-- Tables -->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Pernyataan</th>
                                    <th class="text-center"><i class="icon icon-settings"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pernyataan as $value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->pernyataan_item}}</td>
                                        <td>{{$value->pernyataan_isi}}</td>
                                        <td>
                                            <a href="{{url('/pernyataan/'.$value->pernyataan_id.'/edit')}}" class="btn btn-sm btn-success"><i class="icon icon-editors"></i> </a>
                                            <a href="{{url('/pernyataan/'.$value->pernyataan_id.'/delete/'.$value->pernyataan_kriteria_id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ?')"><i class="icon icon-trash-filled"></i> </a>
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
