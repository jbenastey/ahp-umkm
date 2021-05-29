@extends('layouts.app')

@section('content')
    <div class="sizing">


        <!-- Grid -->
        <div class="row">

            <div class="col-xl-1">
            </div>
            <!-- Grid Item -->
            <div class="col-xl-10">

                <!-- Card -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Isi Kuesioner</h4>
                    </div>

                    <div class="card-content">
                        <!-- Card Body -->
                        <div class="card-body">

                            <form method="post" action="{{route('simpan-karyawan')}}">
                            @csrf
                            <!-- Form Group -->
                                <div class="form-group form-row">
                                    <label class="col-xl-3 col-form-label text-sm-right" for="email-2">Nama</label>

                                    <div class="col-xl-7">
                                        <input type="text" class="form-control" id="email-2"
                                               aria-describedby="emailHelp2"
                                               placeholder="Nama" name="kuesioner_nama" required>
                                    </div>
                                </div>
                                <!-- /form group -->

                                <!-- Form Group -->
                                <div class="form-group form-row">
                                    <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Umur</label>

                                    <div class="col-xl-7">
                                        <input type="number" class="form-control" id="password-2"
                                               placeholder="Umur" name="kuesioner_umur" required>
                                    </div>
                                </div>
                                <!-- /form group -->

                                <!-- Form Group -->
                                <div class="form-group form-row">
                                    <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Nama UMKM</label>

                                    <div class="col-xl-7">
                                        <select name="kuesioner_umkm" id="password-2" class="form-control" required>
                                            @foreach($umkm as $value)
                                                <option value="{{$value->umkm_kode}}">{{$value->umkm_nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /form group -->

                                <!-- Form Group -->
                                <div class="form-group form-row">
                                    <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Jabatan</label>

                                    <div class="col-xl-7">
                                        <input type="text" class="form-control" id="password-2"
                                               placeholder="Jabatan" name="kuesioner_jabatan" readonly value="Karyawan" required>
                                    </div>
                                </div>
                                <!-- /form group -->

                                <hr>

                                <!-- Form Group -->
                                <div class="form-group form-row">
                                    {{--                                <label class="col-xl-2 col-form-label text-sm-right" for="password-2"></label>--}}

                                    <div class="col-xl-12">

                                        <div id="pertama">
                                            <h2>1. Kuesioner Pertama</h2>
                                            <h4>A. Petunjuk Pengisian</h4>
                                            <ol type="1">
                                                <li>Bacalah terlebih dahulu pernyataan-pernyataan berikut dengan cermat
                                                    sebelum
                                                    anda memulai untuk menjawabnya.
                                                </li>
                                                <li>Jawablah pernyataan ini dengan jujur dan benar.</li>
                                                <li>Pilihlah salah satu jawaban yang anda anggap paling benar.</li>
                                                <ul>
                                                    <li>STS : Sangat Tidak Setuju (1)</li>
                                                    <li>TS : Tidak Setuju (2)</li>
                                                    <li>KS : Kurang Setuju (3)</li>
                                                    <li>S : Setuju (4)</li>
                                                    <li>SS : Sangat Setuju (5)</li>
                                                </ul>
                                            </ol>
                                            <h4>B. Pernyataan</h4>

                                            @foreach($kriteria as $key => $value)
                                                <p>{{$value->kriteria_nama}}</p>
                                                <table class="table table-bordered" width="100">
                                                    <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Pernyataan</th>
                                                        <th>STS</th>
                                                        <th>TS</th>
                                                        <th>KS</th>
                                                        <th>S</th>
                                                        <th>SS</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($pernyataan as $key2 => $value2)
                                                        @if($value2->pernyataan_kriteria_id == $value->kriteria_id)
                                                            <tr>
                                                                <td>{{$value2->pernyataan_item}}</td>
                                                                <td>
                                                                    {{$value2->pernyataan_isi}}
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="{{$value2->pernyataan_item}}"
                                                                           value="sts" required>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="{{$value2->pernyataan_item}}"
                                                                           value="ts" required>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="{{$value2->pernyataan_item}}"
                                                                           value="ks" required>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="{{$value2->pernyataan_item}}"
                                                                           value="s" required>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="{{$value2->pernyataan_item}}"
                                                                           value="ss" required>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <br>
                                            @endforeach
                                            <hr>
                                        </div>

                                    </div>
                                </div>
                                <!-- /form group -->

                                <div class="row" id="simpan">

                                    <!-- Form Group -->
                                    <div class="form-group  col-xl-6">
                                        <button type="button" onclick="window.history.back()"
                                                class="btn btn-outline-primary btn-block text-uppercase">Kembali
                                        </button>
                                    </div>
                                    <!-- /form group -->

                                    <!-- Form Group -->
                                    <div class="form-group  col-xl-6">
                                        <button type="submit" class="btn btn-primary btn-block text-uppercase">Simpan
                                        </button>
                                    </div>
                                    <!-- /form group -->
                                </div>

                            </form>
                            <!-- /form -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
