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
                        <h3 class="card-title">Data Kriteria {{$kriteria->kriteria_nama}}</h3>
                    </div>
                    <!-- /entry heading -->

                    <!-- Card Body -->
                    <div class="card-content">
                        <div class="card-body">
                        <!-- Tables -->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered table-hover zero-configuration">
                                <a href="{{url('master')}}" class="btn btn-sm btn-outline-primary float-left mr-1"><i class="icon icon-arrow-left"></i> Kembali</a>
                                <a href="{{url('pernyataan/'.$kriteria->kriteria_id.'/create')}}" class="btn btn-sm btn-primary float-right ml-1"><i class="icon icon-plus"></i> Tambah Pernyataan</a>
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
                                            <a href="{{url('/pernyataan/'.$value->pernyataan_id.'/edit')}}" class="success"><i class="ft-edit font-medium-3"></i> </a>
                                            <a href="{{url('/pernyataan/'.$value->pernyataan_id.'/delete/'.$value->pernyataan_kriteria_id)}}" class="danger" onclick="return confirm('Hapus Data ?')"><i class="ft-trash font-medium-3"></i> </a>
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
