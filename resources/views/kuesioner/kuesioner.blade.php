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
                        <h3 class="dt-entry__title">Isi Kuesioner</h3>
                    </div>
                    <!-- /entry heading -->

                </div>
                <!-- /entry header -->

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body">

                        <form method="post" action="{{route('simpan')}}">
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
                                <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Jurusan</label>

                                <div class="col-xl-7">
                                    <input type="text" class="form-control" id="password-2"
                                           placeholder="Jurusan" name="kuesioner_jurusan" required>
                                </div>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Jabatan</label>

                                <div class="col-xl-7">
                                    <input type="text" class="form-control" id="password-2"
                                           placeholder="Jabatan" name="kuesioner_jabatan" required>
                                </div>
                            </div>
                            <!-- /form group -->

                            <hr>

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                {{--                                <label class="col-xl-2 col-form-label text-sm-right" for="password-2"></label>--}}

                                <div class="col-xl-12">
                                    <h2>1. Kuesioner Pertama</h2>
                                    <h4>A. Petunjuk Pengisian</h4>
                                    <ol type="1">
                                        <li>Bacalah terlebih dahulu pernyataan-pernyataan berikut dengan cermat sebelum
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
                                                            <input type="radio" name="{{$value2->pernyataan_item}}" value="sts" required>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="{{$value2->pernyataan_item}}" value="ts" required>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="{{$value2->pernyataan_item}}" value="ks" required>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="{{$value2->pernyataan_item}}" value="s" required>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="{{$value2->pernyataan_item}}" value="ss" required>
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
                                    <h4>A. Petunjuk Pengisian</h4>
                                    <ol type="1">
                                        <li>Jawablah pertanyaan dibawah ini dengan memberi nilai pada kotak dengan
                                            menggunakan angka 1-9.
                                        </li>
                                        <li>Cukup menilai pilihan mana yang lebih penting.</li>
                                        <li>Kemudian memberi nilai dengan angka 1-9 yang menandakan tingkat
                                            kepentingannya.
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
                                        <li>Jika indikator pada kolom 1 lebih penting dari pada indikator 2 maka
                                            nilai perbandingan ini di isikan pada kolom 1 dan jika sebaliknya maka
                                            diisikan pada kolom 2
                                        </li>
                                        <br>
                                        <p>Contoh Pengisian: </p>
                                        <p>Isikan pilihan penilaian Ibu/Bapak terhadap pertanyaan dibawah ini sesuai
                                            dengan petunjuk pengisian kuisioner ini. Bandingkan indikator pada kolom
                                            Kriteria A dengan indikator pada kolom Kriteria B. Berikut adalah contoh
                                            kuisioner perbandingannya:</p>


                                        <table class="table table-bordered" width="100">
                                            <thead class="text-center">
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Kriteria A</th>
                                                <th colspan="17">Skala</th>
                                                <th rowspan="2">Kriteria B</th>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>8</td>
                                                <td>7</td>
                                                <td>6</td>
                                                <td>5</td>
                                                <td>4</td>
                                                <td>3</td>
                                                <td>2</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><i>Hard Rewards</i></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" checked></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><input type="radio" name="contoh" ></td>
                                                <td><i>Communications Skills</i></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p>Artinya : untuk pertanyaan pertama pada baris pertama yang diisi pada kolom Kriteria B pada skala nilai 7 yang berarti bahwa “indikator Communication Skilss jelas lebih mutlak penting dari pada indikator Hard Rewards dengan nilai kepentingan 7”.</p>
                                    </ol>

                                    <h4>B. LEMBAR PERNYATAAN PENENTUAN BOBOT KNOWLEDGE SHARING</h4>
                                    <ol type="1">
                                        <li><p>Berkaitan dengan pengukuran kinerja knowledge sharing Akademisi di Fakultas Sains dan Teknologi, maka kriteria manakah yang dianggap paling penting untuk di prioritaskan?</p></li>
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
                                            <td>9</td>
                                            <td>8</td>
                                            <td>7</td>
                                            <td>6</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>3</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>9</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i = 1; $i <= count($kombinasi) ; $i++)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$kombinasi[$i-1][0]}}</td>
                                            <td><input type="radio" name="ks_{{$i}}" value="-9" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="-8" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="-7" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="-6" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="-5" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="-4" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="-3" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="-2" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="1" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="2" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="3" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="4" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="5" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="6" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="7" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="8" required></td>
                                            <td><input type="radio" name="ks_{{$i}}" value="9" required></td>
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
                                            <td>9</td>
                                            <td>8</td>
                                            <td>7</td>
                                            <td>6</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>3</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>9</td>
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
                                                @endphp
                                                @for($i = 1; $i <= count($kombinasi_p) ; $i++)
                                                <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$kombinasi_p[$i-1][0]}}</td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="-9" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="-8" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="-7" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="-6" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="-5" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="-4" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="-3" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="-2" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="1" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="2" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="3" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="4" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="5" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="6" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="7" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="8" required></td>
                                                <td><input type="radio" name="{{$nama}}_{{$i}}"  value="9" required></td>
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

                                    <!-- Form Group -->
                                    <div class="form-group  col-xl-6">
                                        <button type="submit" class="btn btn-primary btn-block text-uppercase">Simpan</button>
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
@endsection
