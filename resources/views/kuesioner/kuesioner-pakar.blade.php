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

                        <form method="post" action="{{route('simpan-pakar')}}">
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
                                           placeholder="Jabatan" name="kuesioner_jabatan" value="Pakar" readonly required>
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
                                        <a href="#kedua" id="btn-pertama" class="btn btn-primary" onclick="return confirm('Apakah yakin dan sudah diisi semua sesuai dengan pilihan Bapak/Ibu?')">Selanjutnya</a>
                                        <hr>
                                    </div>

                                    <div id="kedua" style="display: none">
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
                                                <tr>
                                                    <td>1</td>
                                                    <td><i>Suasana Bekerja (Imbalan Keras)</i></td>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh" checked></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td class="p-1"><input type="radio" name="contoh"></tdcl>
                                                    <td><i>Intensi Positif Karyawan</i></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p>Artinya : untuk pertanyaan pertama pada baris pertama yang diisi pada
                                                kolom Kriteria B pada skala nilai 7 yang berarti bahwa “indikator
                                                Communication Skilss jelas lebih mutlak penting dari pada indikator Hard
                                                Rewards dengan nilai kepentingan 7”.</p>
                                        </ol>

                                        <h4>B. LEMBAR PERNYATAAN PENENTUAN BOBOT KNOWLEDGE SHARING</h4>
                                        <ol type="1">
                                            <li><p>Berkaitan dengan pengukuran kinerja knowledge sharing Akademisi di
                                                    Fakultas Sains dan Teknologi, maka kriteria manakah yang dianggap
                                                    paling penting untuk di prioritaskan?</p></li>
                                        </ol>

                                        <table class="table table-bordered" width="100%">
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
                                            @for($i = 1; $i <= count($kombinasi) ; $i++)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$kombinasi[$i-1][0]}}</td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-9" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-8" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-7" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-6" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-5" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-4" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-3" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="-2" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="1" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="2" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="3" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="4" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="5" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="6" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="7" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="8" required></td>
                                                    <td class="p-1"><input type="radio" name="ks_{{$i}}" value="9" required></td>
                                                    <td>{{$kombinasi[$i-1][1]}}</td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>

                                        <br>
                                        <a href="#kriteria" id="btn-kedua" class="btn btn-primary" onclick="return confirm('Apakah yakin dan sudah diisi semua sesuai dengan pilihan Bapak/Ibu?')">Selanjutnya</a>
                                        <hr>
                                    </div>

                                    <div id="kriteria" style="display: none">
                                        @foreach($kriteria as $key => $value)
                                            <p><b>Kriteria {{$value->kriteria_nama}}</b></p>
                                        @foreach($pernyataan as $key2 => $value2)
                                                @if($value2->pernyataan_kriteria_id == $value-> kriteria_id)
                                                <p>{{$value2->pernyataan_item}} : {{$value2->pernyataan_isi}}</p>
                                                @endif
                                            @endforeach
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
                                                        @endphp
                                                        @for($i = 1; $i <= count($kombinasi_p) ; $i++)
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                <td>{{$kombinasi_p[$i-1][0]}}</td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="-9" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="-8" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="-7" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="-6" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="-5" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="-4" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="-3" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="-2" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="1" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="2" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="3" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="4" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="5" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="6" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="7" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="8" required></td>
                                                                <td class="p-1"><input type="radio" name="{{$nama}}_{{$i}}"
                                                                           value="9" required></td>
                                                                <td>{{$kombinasi_p[$i-1][1]}}</td>
                                                            </tr>
                                                        @endfor
                                                    @else
                                                        <tr>
                                                            <td colspan="20" class="text-center">Dibutuhkan lebih dari
                                                                satu pernyataan
                                                            </td>
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
                                        <a href="#simpan" id="btn-kriteria" class="btn btn-primary" onclick="return confirm('Apakah yakin dan sudah diisi semua sesuai dengan pilihan Bapak/Ibu?')">Selanjutnya</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /form group -->

                            <div class="row" id="simpan" style="display: none">

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
