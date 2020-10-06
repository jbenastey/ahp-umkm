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
                        <h3 class="card-title">Data Kuesioner</h3>
                    </div>
                    <!-- /entry heading -->

                    <!-- Card Body -->
                    <div class="card-content">
                        <div class="card-body">

                        <form method="post" action="{{route('simpan')}}">
                        @csrf
                        <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-3 col-form-label text-sm-right" for="email-2">Nama</label>

                                <div class="col-xl-7">
                                    <input type="text" class="form-control" id="email-2"
                                           aria-describedby="emailHelp2"
                                           placeholder="Nama" value="{{$kuesioner->kuesioner_nama}}" readonly >
                                </div>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Umur</label>

                                <div class="col-xl-7">
                                    <input type="number" class="form-control" id="password-2"
                                           placeholder="Umur" value="{{$kuesioner->kuesioner_umur}}" readonly>
                                </div>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Nama UMKM</label>

                                <div class="col-xl-7">
                                    <input type="text" class="form-control" id="password-2"
                                           placeholder="Jurusan" value="{{$kuesioner->kuesioner_umkm}}" readonly >
                                </div>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Jabatan</label>

                                <div class="col-xl-7">
                                    <input type="text" class="form-control" id="password-2"
                                           placeholder="Jabatan" value="{{$kuesioner->kuesioner_jabatan}}" readonly>
                                </div>
                            </div>
                            <!-- /form group -->

                            <hr>

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                {{--                                <label class="col-xl-2 col-form-label text-sm-right" for="password-2"></label>--}}

                                <div class="col-xl-12">
                                    <h2>1. Kuesioner Pertama</h2>

                                    <ul>
                                        <li>Keterangan</li>
                                        <ul>
                                            <li>STS : Sangat Tidak Setuju (1)</li>
                                            <li>TS : Tidak Setuju (2)</li>
                                            <li>KS : Kurang Setuju (3)</li>
                                            <li>S : Setuju (4)</li>
                                            <li>SS : Sangat Setuju (5)</li>
                                        </ul>
                                    </ul>


                                    @foreach($kriteria as $key => $value)
                                        <p>{{$value->kriteria_nama}}</p>
                                        <table class="table table-bordered" width="100">
                                            <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Pernyataan</th>
                                                <th>Jawaban</th>
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
                                                            @foreach(json_decode($kuesioner->kuesioner_pertama) as $key3 => $value3)
                                                                @if($value2->pernyataan_item == $key3)
                                                                    {{strtoupper($value3)}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                    @endforeach
                                    <hr>

                                    <h2>2. Kuesioner Kedua</h2>
                                    <ul >
                                        <li>Keterangan
                                        </li>
                                        <br>
                                        <table class="table table-bordered">
                                            <thead class="text-center">
                                            <tr>
                                                <th width="10%">Intenitas Dari Kepentingan Pada Skala Absolut
                                                    Definisi
                                                </th>
                                                <th>Definisi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Kedua elemen sama pentingnya</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Elemen yang satu sedikit lebih penting daripada elemen yang
                                                    lainnya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Elemen yang satu lebih penting dari pada yang lainnya</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Satu elemen jelas lebih mutlak penting dari pada elemen
                                                    lainnya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Satu elemen mutlak penting dari pada elemen lainnya</td>
                                            </tr>
                                            <tr>
                                                <td>2,4,6,8</td>
                                                <td>Nilai tengah diantara dua nilai keputusan yang berdekatan</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </ul>

                                    <h4>LEMBAR PERNYATAAN PENENTUAN BOBOT KNOWLEDGE SHARING</h4>
                                    <ol type="1">
                                        <li><p>Berkaitan dengan pengukuran kinerja knowledge sharing Behavior pada Usaha Mikro Kecil dan Menengah Pekanbaru, maka kriteria manakah yang dianggap paling penting untuk di prioritaskan?</p></li>
                                    </ol>

                                    <table class="table table-bordered" width="100">
                                        <thead class="text-center">
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Kriteria A</th>
                                            <th colspan="17">Skala</th>
                                            <th rowspan="2">Kriteria B</th>
                                        </tr>
                                        <tr>
                                            <td class="p-0">9</td>
                                            <td class="p-0">8</td>
                                            <td class="p-0">7</td>
                                            <td class="p-0">6</td>
                                            <td class="p-0">5</td>
                                            <td class="p-0">4</td>
                                            <td class="p-0">3</td>
                                            <td class="p-0">2</td>
                                            <td class="p-0">1</td>
                                            <td class="p-0">2</td>
                                            <td class="p-0">3</td>
                                            <td class="p-0">4</td>
                                            <td class="p-0">5</td>
                                            <td class="p-0">6</td>
                                            <td class="p-0">7</td>
                                            <td class="p-0">8</td>
                                            <td class="p-0">9</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $kedua = json_decode($kuesioner->kuesioner_kedua,true);
                                        $ks = $kedua['ks'];
                                        $sub = [];
                                        @endphp
                                        @for($i = 1; $i <= count($kombinasi) ; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$kombinasi[$i-1][0]}}</td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-9" @if($ks['ks_'.$i] == -9) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-8" @if($ks['ks_'.$i] == -8) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-7" @if($ks['ks_'.$i] == -7) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-6" @if($ks['ks_'.$i] == -6) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-5" @if($ks['ks_'.$i] == -5) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-4" @if($ks['ks_'.$i] == -4) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-3" @if($ks['ks_'.$i] == -3) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-2" @if($ks['ks_'.$i] == -2) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="1" @if($ks['ks_'.$i] == 1) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="2" @if($ks['ks_'.$i] == 2) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="3" @if($ks['ks_'.$i] == 3) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="4" @if($ks['ks_'.$i] == 4) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="5" @if($ks['ks_'.$i] == 5) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="6" @if($ks['ks_'.$i] == 6) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="7" @if($ks['ks_'.$i] == 7) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="8" @if($ks['ks_'.$i] == 8) checked @endif disabled></td>
                                                <td class="p-1"><input type="radio" name="ks_{{$i}}" value="9" @if($ks['ks_'.$i] == 9) checked @endif disabled></td>
                                                <td>{{$kombinasi[$i-1][1]}}</td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>

                                    <br>

                                    @foreach($kriteria as $key => $value)
                                        <p>Kriteria {{$value->kriteria_nama}}</p>
                                        <table class="table table-bordered" width="100">
                                            <thead class="text-center">
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Pernyataan A</th>
                                                <th colspan="17">Skala</th>
                                                <th rowspan="2">Pernyataan B</th>
                                            </tr>
                                            <tr>
                                                <td class="p-0">9</td>
                                                <td class="p-0">8</td>
                                                <td class="p-0">7</td>
                                                <td class="p-0">6</td>
                                                <td class="p-0">5</td>
                                                <td class="p-0">4</td>
                                                <td class="p-0">3</td>
                                                <td class="p-0">2</td>
                                                <td class="p-0">1</td>
                                                <td class="p-0">2</td>
                                                <td class="p-0">3</td>
                                                <td class="p-0">4</td>
                                                <td class="p-0">5</td>
                                                <td class="p-0">6</td>
                                                <td class="p-0">7</td>
                                                <td class="p-0">8</td>
                                                <td class="p-0">9</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($k_pernyataan[$value->kriteria_id] != null)
                                                @php
                                                    $kombinasi_p = combinations(2,$k_pernyataan[$value->kriteria_id]);
                                                @endphp
                                                @if(count($kombinasi_p) > 0)
                                                    @php
                                                        $nama = strtolower(rtrim($kombinasi_p[0][0],1));
                                                        $sub = $kedua[$nama];
                                                    @endphp
                                                    @for($i = 1; $i <= count($kombinasi_p) ; $i++)
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$kombinasi_p[$i-1][0]}}</td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="-9" @if($sub[$nama.'_'.$i] == -9) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="-8" @if($sub[$nama.'_'.$i] == -8) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="-7" @if($sub[$nama.'_'.$i] == -7) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="-6" @if($sub[$nama.'_'.$i] == -6) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="-5" @if($sub[$nama.'_'.$i] == -5) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="-4" @if($sub[$nama.'_'.$i] == -4) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="-3" @if($sub[$nama.'_'.$i] == -3) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="-2" @if($sub[$nama.'_'.$i] == -2) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="1" @if($sub[$nama.'_'.$i] == 1) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="2" @if($sub[$nama.'_'.$i] == 2) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="3" @if($sub[$nama.'_'.$i] == 3) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="4" @if($sub[$nama.'_'.$i] == 4) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="5" @if($sub[$nama.'_'.$i] == 5) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="6" @if($sub[$nama.'_'.$i] == 6) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="7" @if($sub[$nama.'_'.$i] == 7) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="8" @if($sub[$nama.'_'.$i] == 8) checked @endif disabled></td>
                                                            <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"  value="9" @if($sub[$nama.'_'.$i] == 9) checked @endif disabled></td>
                                                            <td>{{$kombinasi_p[$i-1][1]}}</td>
                                                        </tr>
                                                    @endfor
                                                @else
                                                    <tr>
                                                        <td colspan="20" class="text-center">Dibutuhkan lebih dari satu pernyataan</td>
                                                    </tr>
                                                @endif

                                            @else
                                                <tr>
                                                    <td colspan="20" class="text-center">Belum ada pernyataan</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>

                                        <br>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /form group -->

                            <div class="row">

                                <!-- Form Group -->
                                <div class="form-group  col-xl-6">
                                    <button type="button" onclick="window.history.back()" class="btn btn-outline-primary btn-block text-uppercase">Kembali</button>
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
