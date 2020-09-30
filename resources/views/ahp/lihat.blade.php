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
                            <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Jurusan</label>

                            <div class="col-xl-7">
                                <input type="text" class="form-control" id="password-2"
                                       placeholder="Jurusan" value="{{$kuesioner->kuesioner_jurusan}}" readonly >
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
                        <div class="accordion" id="accordion-example">
                            <div class="card">
                                <div class="card-header" id="headingZero">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapse-zero"
                                                aria-expanded="true" aria-controls="collapse-zero">
                                            Knowledge Sharing
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse-zero" class="collapse show" aria-labelledby="headingZero"
                                     data-parent="#accordion-example">
                                    <div class="card-body">
                                        @php
                                            $p1 = 0;
                                            $p2 = count($kriteria) + 1;
                                            $cekKs = 0;
                                        @endphp
                                        @if(count($cek) == 0)
                                            <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/hitung/ks')}}"
                                               class="btn btn-primary btn-sm">Hitung</a>
                                        @else
                                            @foreach($cek as $value)
                                                @if($value->hitung_jenis == 'ks')
                                                    @php $cekKs++; @endphp
                                                    <h5>Matriks Kriteria</h5>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Kriteria</th>
                                                            @foreach($namaKri as $value2)
                                                                <th>{{strtoupper($value2)}}</th>
                                                            @endforeach
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $ks = json_decode($value->hitung_matriks,true);
                                                            $jumlah = [];
                                                        @endphp
                                                        @foreach($ks as $key2 => $value2)
                                                            <tr>
                                                                <td>{{$key2}}</td>
                                                                @foreach($ks as $key3 => $value3)
                                                                    @php
                                                                        $jumlah[$key2] = 0;
                                                                    @endphp
                                                                    <td>{{$ks[$key2][$key3]}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <br>

                                                    <h5>Penjumlahan Nilai Setiap Kolom</h5>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Kriteria</th>
                                                            @foreach($namaKri as $value2)
                                                                <th>{{strtoupper($value2)}}</th>
                                                            @endforeach
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $ks = json_decode($value->hitung_matriks,true);
                                                        @endphp
                                                        @foreach($ks as $key2 => $value2)
                                                            <tr>
                                                                <td>{{$key2}}</td>
                                                                @foreach($ks as $key3 => $value3)
                                                                    @php
                                                                        $jumlah[$key3] += $ks[$key2][$key3];
                                                                    @endphp
                                                                    <td>{{$ks[$key2][$key3]}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Jumlah</th>
                                                            @foreach($ks as $key3 => $value3)
                                                                <th>{{$jumlah[$key3]}}</th>
                                                            @endforeach
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    <br>

                                                    <h5>Pembagian Nilai Kolom dengan Jumlah Kolom</h5>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Kriteria</th>
                                                            @foreach($namaKri as $value2)
                                                                <th>{{strtoupper($value2)}}</th>
                                                            @endforeach
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $ks = json_decode($value->hitung_bagi,true);
                                                        @endphp
                                                        @foreach($ks as $key2 => $value2)
                                                            <tr>
                                                                <td>{{$key2}}</td>
                                                                @foreach($ks as $key3 => $value3)
                                                                    <td>{{$ks[$key3][$key2]}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <br>

                                                    <h5>Nilai Rata-Rata Matriks Perbandingan</h5>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Kriteria</th>
                                                            <th>Jumlah Nilai Tiap Baris</th>
                                                            <th>Rata-Rata</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $baris = json_decode($value->hitung_baris_bagi,true);
                                                            $rata = json_decode($value->hitung_rata_bagi,true);
                                                        @endphp
                                                        @foreach($baris as $key2 => $value2)
                                                            <tr>
                                                                <td>{{$key2}}</td>
                                                                <td>{{$value2}}</td>
                                                                <td>{{$rata[$key2]}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <br>

                                                    <h5>Perkalian Nilai Matriks Perbandingan dengan Rata-Rata</h5>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Kriteria</th>
                                                            @foreach($namaKri as $value2)
                                                                <th>{{strtoupper($value2)}}</th>
                                                            @endforeach
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $ks = json_decode($value->hitung_kali,true);
                                                        @endphp
                                                        @foreach($ks as $key2 => $value2)
                                                            <tr>
                                                                <td>{{$key2}}</td>
                                                                @foreach($ks as $key3 => $value3)
                                                                    <td>{{$ks[$key3][$key2]}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <br>

                                                    <h5>Jumlah Nilai Setiap Baris</h5>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Kriteria</th>
                                                            @foreach($namaKri as $value2)
                                                                <th>{{strtoupper($value2)}}</th>
                                                            @endforeach
                                                            <th>Jumlah</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $ks = json_decode($value->hitung_kali,true);
                                                            $baris = json_decode($value->hitung_baris_kali,true);
                                                        @endphp
                                                        @foreach($ks as $key2 => $value2)
                                                            <tr>
                                                                <td>{{$key2}}</td>
                                                                @foreach($ks as $key3 => $value3)
                                                                    <td>{{$ks[$key3][$key2]}}</td>
                                                                @endforeach
                                                                <th>{{$baris[$key2]}}</th>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <br>

                                                    <h5>Hasil Jumlah Baris di Bagi dengan Rata-Rata</h5>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Kriteria</th>
                                                            <th>Jumlah / Rata-Rata</th>
                                                            <th>Hasil</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $baris = json_decode($value->hitung_baris_kali,true);
                                                            $rata = json_decode($value->hitung_rata_bagi,true);
                                                            $hasil = json_decode($value->hitung_hasil,true);
                                                            $jumlah = 0;
                                                            $no = 0;
                                                        @endphp
                                                        @foreach($baris as $key2 => $value2)
                                                            @php
                                                                $jumlah += $hasil[$key2];
                                                                $no++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{$key2}}</td>
                                                                <td>{{$value2}} / {{$rata[$key2]}}</td>
                                                                <td>{{$hasil[$key2]}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th colspan="2">Jumlah</th>
                                                            <th>{{$jumlah}}</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    <br>

                                                    <p>Hitung Nilai CI (<i>Consistency Index</i>)</p>
                                                    <p>CI = (λ-n) / (n-1)</p>
                                                    <p>CI = ({{$jumlah/$no}}-{{$no}}) / ({{($no)}}-1)</p>
                                                    <p>CI = {{($jumlah/$no)-$no}} / {{$no-1}}</p>
                                                    <p>Nilai CI = {{$value->hitung_ci}}</p><br>
                                                    <p>Hitung Nilai CR (<i>Consistency Ratio</i>)</p>
                                                    @if($value->hitung_cr <= 0.1)
                                                        @php $p1++ @endphp
                                                        <p>n = {{$no}}, IR = {{ri($no)}}</p>
                                                        <p>CR = CI / IR</p>
                                                        <p>CR = {{$value->hitung_ci}} / {{ri($no)}}</p>
                                                        <p>Nilai CR = {{$value->hitung_cr}} (Nilai CR <= 0.1)</p>
                                                    @else
                                                        <p>n = {{$no}}, IR = {{ri($no)}}</p>
                                                        <p>CR = CI / IR</p>
                                                        <p>CR = {{$value->hitung_ci}} / {{ri($no)}}</p>
                                                        <p>Nilai CR = {{$value->hitung_cr}} (Nilai CR > 0.1)</p>
                                                        <a href="{{url('kuesioner/'.$kuesioner->kuesioner_id.'/ubah-kriteria')}}"
                                                           class="btn btn-sm btn-success">Update Kuesioner</a>
                                                    @endif
                                                @endif
                                            @endforeach
                                            @if($cekKs == 0)
                                                <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/hitung/ks')}}"
                                                   class="btn btn-primary btn-sm">Hitung</a>
                                            @endif
                                        @endif
                                        <!-- /form -->
                                    </div>
                                </div>
                            </div>

                            @if(count($cek)>0)
                                @foreach($kriteria as $key => $value)
                                @php $cekHitung = 0; @endphp
                                <div class="card">
                                    <div class="card-header" id="heading{{$key}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapse-{{$key}}"
                                                    aria-expanded="true" aria-controls="collapse-{{$key}}">
                                                {{$value->kriteria_nama}}
                                            </button>
                                        </h5>
                                    </div>
                                    @foreach($cek as $key2 => $value2)
                                        @if($value2->hitung_jenis != 'ks')
                                            @if($namaKri[$key] == $value2->hitung_jenis)
                                                @php
                                                    $cekHitung++;
                                                    $matriks = json_decode($value2->hitung_matriks,true);
                                                @endphp

                                                <div id="collapse-{{$key}}" class="collapse"
                                                     aria-labelledby="heading{{$key}}"
                                                     data-parent="#accordion-example">
                                                    <div class="card-body">
                                                        <h5>Matriks Kriteria</h5>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Kriteria</th>
                                                                @foreach($matriks as $key3=>$value3)
                                                                    <th>{{strtoupper($key3)}}</th>
                                                                @endforeach
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $ks = json_decode($value2->hitung_matriks,true);
                                                                $jumlah = [];
                                                            @endphp
                                                            @foreach($ks as $key3 => $value3)
                                                                <tr>
                                                                    <td>{{$key3}}</td>
                                                                    @foreach($ks as $key4 => $value4)
                                                                        @php
                                                                            $jumlah[$key3] = 0;
                                                                        @endphp
                                                                        <td>{{$ks[$key3][$key4]}}</td>
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        <br>

                                                        <h5>Penjumlahan Nilai Setiap Kolom</h5>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Kriteria</th>
                                                                @foreach($matriks as $key3=>$value3)
                                                                    <th>{{strtoupper($key3)}}</th>
                                                                @endforeach
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($ks as $key3 => $value3)
                                                                <tr>
                                                                    <td>{{$key3}}</td>
                                                                    @foreach($ks as $key4 => $value4)
                                                                        @php
                                                                            $jumlah[$key4] += $ks[$key3][$key4];
                                                                        @endphp
                                                                        <td>{{$ks[$key3][$key4]}}</td>
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Jumlah</th>
                                                                @foreach($ks as $key3 => $value3)
                                                                    <th>{{$jumlah[$key3]}}</th>
                                                                @endforeach
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                        <br>

                                                        <h5>Pembagian Nilai Kolom dengan Jumlah Kolom</h5>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Kriteria</th>
                                                                @foreach($matriks as $key3=>$value3)
                                                                    <th>{{strtoupper($key3)}}</th>
                                                                @endforeach
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $ks = json_decode($value2->hitung_bagi,true);
                                                            @endphp
                                                            @foreach($ks as $key3 => $value3)
                                                                <tr>
                                                                    <td>{{$key3}}</td>
                                                                    @foreach($ks as $key4 => $value4)
                                                                        <td>{{$ks[$key4][$key3]}}</td>
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        <br>

                                                        <h5>Nilai Rata-Rata Matriks Perbandingan</h5>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Kriteria</th>
                                                                <th>Jumlah Nilai Tiap Baris</th>
                                                                <th>Rata-Rata</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $baris = json_decode($value2->hitung_baris_bagi,true);
                                                                $rata = json_decode($value2->hitung_rata_bagi,true);
                                                            @endphp
                                                            @foreach($baris as $key3 => $value3)
                                                                <tr>
                                                                    <td>{{$key3}}</td>
                                                                    <td>{{$value3}}</td>
                                                                    <td>{{$rata[$key3]}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        <br>

                                                        <h5>Perkalian Nilai Matriks Perbandingan dengan Rata-Rata</h5>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Kriteria</th>
                                                                @foreach($matriks as $key3=>$value3)
                                                                    <th>{{strtoupper($key3)}}</th>
                                                                @endforeach
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $ks = json_decode($value2->hitung_kali,true);
                                                            @endphp
                                                            @foreach($ks as $key3 => $value3)
                                                                <tr>
                                                                    <td>{{$key3}}</td>
                                                                    @foreach($ks as $key4 => $value4)
                                                                        <td>{{$ks[$key4][$key3]}}</td>
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        <br>

                                                        <h5>Jumlah Nilai Setiap Baris</h5>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Kriteria</th>
                                                                @foreach($matriks as $key3=>$value3)
                                                                    <th>{{strtoupper($key3)}}</th>
                                                                @endforeach
                                                                <th>Jumlah</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $ks = json_decode($value2->hitung_kali,true);
                                                                $baris = json_decode($value2->hitung_baris_kali,true);
                                                            @endphp
                                                            @foreach($ks as $key3 => $value3)
                                                                <tr>
                                                                    <td>{{$key3}}</td>
                                                                    @foreach($ks as $key4 => $value4)
                                                                        <td>{{$ks[$key4][$key3]}}</td>
                                                                    @endforeach
                                                                    <th>{{$baris[$key3]}}</th>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        <br>

                                                        <h5>Hasil Jumlah Baris di Bagi dengan Rata-Rata</h5>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Kriteria</th>
                                                                <th>Jumlah / Rata-Rata</th>
                                                                <th>Hasil</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $baris = json_decode($value2->hitung_baris_kali,true);
                                                                $rata = json_decode($value2->hitung_rata_bagi,true);
                                                                $hasil = json_decode($value2->hitung_hasil,true);
                                                                $jumlah = 0;
                                                                $no = 0;
                                                            @endphp
                                                            @foreach($baris as $key3 => $value3)
                                                                @php
                                                                    $jumlah += $hasil[$key3];
                                                                    $no++;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{$key3}}</td>
                                                                    <td>{{$value3}} / {{$rata[$key3]}}</td>
                                                                    <td>{{$hasil[$key3]}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th colspan="2">Jumlah</th>
                                                                <th>{{$jumlah}}</th>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                        <br>

                                                        <p>Hitung Nilai CI (<i>Consistency Index</i>)</p>
                                                        <p>CI = (λ-n) / (n-1)</p>
                                                        <p>CI = ({{$jumlah/$no}}-{{$no}}) / ({{($no)}}-1)</p>
                                                        <p>CI = {{($jumlah/$no)-$no}} / {{$no-1}}</p>
                                                        <p>CI = {{$value2->hitung_ci}}</p><br>
                                                        <p>Hitung Nilai CR (<i>Consistency Ratio</i>)</p>
                                                        @if($value2->hitung_cr <= 0.1)
                                                            @php $p1++ @endphp
                                                            <p>n = {{$no}}, IR = {{ri($no)}}</p>
                                                            <p>CR = CI / IR</p>
                                                            <p>CR = {{$value2->hitung_ci}} / {{ri($no)}}</p>
                                                            <p>Nilai CR = {{$value2->hitung_cr}} (Nilai CR <= 0.1)</p>
                                                        @else
                                                            <p>n = {{$no}}, IR = {{ri($no)}}</p>
                                                            <p>CR = CI / IR</p>
                                                            <p>CR = {{$value2->hitung_ci}} / {{ri($no)}}</p>
                                                            <p>Nilai CR = {{$value2->hitung_cr}} (Nilai CR > 0.1)</p>
                                                            <a href="{{url('kuesioner/'.$kuesioner->kuesioner_id.'/ubah-subkriteria/'.$value2->hitung_jenis)}}"
                                                               class="btn btn-sm btn-success">Update Kuesioner</a>
                                                        @endif

                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach

                                    @if($cekHitung == 0)
                                        <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/hitung/'.$namaKri[$key])}}"
                                           class="btn btn-primary btn-sm">Hitung</a>
                                    @endif

                                </div>
                            @endforeach
                            @endif

                            @if($p1 == $p2)
                                <a href="{{url('/ahp/'.$kuesioner->kuesioner_id.'/kinerja')}}"
                                   class="btn btn-primary btn-sm">Hitung Performance Measurement</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
