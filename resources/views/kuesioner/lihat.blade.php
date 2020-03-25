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

                                    <p><i>Hard Rewards</i> (Imbalan Keras)</p>
                                    <table class="table table-bordered" width="100">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Pernyataan</th>
                                            <th>Jawaban</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $hr = json_decode($kuesioner->kuesioner_hr);
                                        @endphp
                                        <tr>
                                            <td>HR1</td>
                                            <td>Saya berharap untuk mendapatkan promosi sebagai imbalan dari pengetahuan
                                                yang saya bagi dengan dosen lainnya.
                                            </td>
                                            <td>
                                                {{strtoupper($hr->hr1)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>HR2</td>
                                            <td>Saya berharap untuk dinaikkan gaji sebagai imbalan dari berbagi
                                                pengetahuan dengan dosen lainnya.
                                            </td>
                                            <td>
                                                {{strtoupper($hr->hr2)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>HR3</td>
                                            <td>Saya berharap untuk mendapatkan hadiah (bonus) sebagai imbalan dari
                                                berbagi pengetahuan dengan dosen lainnya.
                                            </td>
                                            <td>
                                                {{strtoupper($hr->hr3)}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>HR4</td>
                                            <td>Saya berharap mendapatkan kesempatan untuk belajar dari orang lain
                                                dengan imbalan dari pengetahuan yang saya bagi dengan dosen lainnya.
                                            </td>
                                            <td>
                                                {{strtoupper($hr->hr4)}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>

                                    <p><i>Soft Rewards</i> (Imbalan Lembut)</p>
                                    <table class="table table-bordered" width="100">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Pernyataan</th>
                                            <th>Jawaban</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $sr = json_decode($kuesioner->kuesioner_sr);
                                        @endphp
                                        <tr>
                                            <td>SR1</td>
                                            <td>Berbagi pengetahuan akan memperluas lingkup asosiasi saya dengan anggota
                                                lain.
                                            </td>
                                            <td>
                                                {{strtoupper($sr->sr1)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SR2</td>
                                            <td>Berbagi pengetahuan akan memperkuat ikatan antara dosen lainnya dengan
                                                saya.
                                            </td>
                                            <td>
                                                {{strtoupper($sr->sr2)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SR3</td>
                                            <td>Berbagi pengetahuan akan membuat kerja sama dengan dosen lainnya.</td>
                                            <td>
                                                {{strtoupper($sr->sr3)}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>

                                    <p><i>Communication Skills</i> (Kemampuan Berkomunikasi)</p>
                                    <table class="table table-bordered" width="100">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Pernyataan</th>
                                            <th>Jawaban</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $cs = json_decode($kuesioner->kuesioner_cs);
                                        @endphp
                                        <tr>
                                            <td>CS1</td>
                                            <td>Saya tipe orang yang ingin tahu apa yang terjadi, bersosialisasi dan
                                                berpikiran terbuka.
                                            </td>
                                            <td>
                                                {{strtoupper($cs->cs1)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CS2</td>
                                            <td>Kemampuan komunikasi saya membantu saya dalam menyelesaikan pekerjaan.
                                            </td>
                                            <td>
                                                {{strtoupper($cs->cs2)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CS3</td>
                                            <td>Kemampuan berkomunikasi membuat lebih mudah untuk mendapatkan informasi
                                                dari orang lain.
                                            </td>
                                            <td>
                                                {{strtoupper($cs->cs3)}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>

                                    <p><i>Enjoyment to Help Others</i> (Senang Membantu Orang Lain)</p>
                                    <table class="table table-bordered" width="100">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Pernyataan</th>
                                            <th>Jawaban</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $eh = json_decode($kuesioner->kuesioner_eh);
                                        @endphp
                                        <tr>
                                            <td>EH1</td>
                                            <td>Saya senang berbagi pengetahuan dengan dosen lainnya.</td>
                                            <td>
                                                {{strtoupper($eh->eh1)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>EH2</td>
                                            <td>Saya senang membantu dosen lainnya dengan cara berbagi pengetahuan yang
                                                saya miliki.
                                            </td>
                                            <td>
                                                {{strtoupper($eh->eh2)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>EH3</td>
                                            <td>Rasanya sangat bagus dalam membantu orang lain dengan berbagi
                                                pengetahuan.
                                            </td>
                                            <td>
                                                {{strtoupper($eh->eh3)}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>

                                    <p><i>Quality Of Knowledge Shared</i> (Kualitas dari Berbagai Pengetahuan)</p>
                                    <table class="table table-bordered" width="100">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Pernyataan</th>
                                            <th>Jawaban</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $qk = json_decode($kuesioner->kuesioner_qk);
                                        @endphp
                                        <tr>
                                            <td>QK1</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya sangat relavan dengan
                                                pekerjaan saya.
                                            </td>
                                            <td>
                                                {{strtoupper($qk->qk1)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK2</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya mudah di mengerti.</td>
                                            <td>
                                                {{strtoupper($qk->qk2)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK3</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya sangat akurat.</td>

                                            <td>
                                                {{strtoupper($qk->qk3)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK4</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya merupakan informasi yang
                                                lengkap.
                                            </td>

                                            <td>
                                                {{strtoupper($qk->qk4)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK5</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya adalah informasi yang
                                                terpercaya.
                                            </td>
                                            <td>
                                                {{strtoupper($qk->qk5)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK6</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya sampaikan tepat pada
                                                waktu.
                                            </td>
                                            <td>
                                                {{strtoupper($qk->qk6)}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>
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
                                        @php
                                            $a = [
                                                'Hard Rewards','Hard Rewards','Hard Rewards','Hard Rewards','Communication Skills','Communication Skills','Communication Skills','Enjoyment to Help Others','Enjoyment to Help Others','Soft Rewards'
                                            ];
                                            $b = [
                                                'Communication Skills','Enjoyment to Help Others','Soft Rewards','Quality of Knowledge Shared','Enjoyment to Help Others','Soft Rewards','Quality of Knowledge Shared','Soft Rewards','Quality of Knowledge Shared','Quality of Knowledge Shared'
                                            ];
                                            $ks = json_decode($kuesioner->kuesioner_ks,true);
                                        @endphp
                                        @for($i = 1; $i <= 10 ; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><i>{{$a[$i-1]}}</i></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="9" @if($ks['ks'.$i] == -9) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="8" @if($ks['ks'.$i] == -8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="7" @if($ks['ks'.$i] == -7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="6" @if($ks['ks'.$i] == -6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="5" @if($ks['ks'.$i] == -5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="4" @if($ks['ks'.$i] == -4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="3" @if($ks['ks'.$i] == -3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="2" @if($ks['ks'.$i] == -2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="1" @if($ks['ks'.$i] == 1) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="2" @if($ks['ks'.$i] == 2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="3" @if($ks['ks'.$i] == 3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="4" @if($ks['ks'.$i] == 4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="5" @if($ks['ks'.$i] == 5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="6" @if($ks['ks'.$i] == 6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="7" @if($ks['ks'.$i] == 7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="8" @if($ks['ks'.$i] == 8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="ks_{{$i}}" value="9" @if($ks['ks'.$i] == 9) echo checked @endif disabled></td>
                                                <td><i>{{$b[$i-1]}}</i></td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>

                                    <br>
                                    <p>Kriteria <i>Hard Rewards</i> (Imbalan Keras)</p>
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
                                        @php
                                            $a = [
                                                'HR1','HR1','HR1','HR2','HR2','HR3',
                                            ];
                                            $b = [
                                                'HR2','HR3','HR4','HR3','HR4','HR4',
                                                ];
                                            $ks_hr = json_decode($kuesioner->kuesioner_ks_hr,true);
                                        @endphp
                                        @for($i = 1; $i <= 6 ; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><i>{{$a[$i-1]}}</i></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="9" @if($ks_hr['hr_'.$i] == -9) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="8" @if($ks_hr['hr_'.$i] == -8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="7" @if($ks_hr['hr_'.$i] == -7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="6" @if($ks_hr['hr_'.$i] == -6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="5" @if($ks_hr['hr_'.$i] == -5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="4" @if($ks_hr['hr_'.$i] == -4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="3" @if($ks_hr['hr_'.$i] == -3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="2" @if($ks_hr['hr_'.$i] == -2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="1"  @if($ks_hr['hr_'.$i] == 1) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="2"  @if($ks_hr['hr_'.$i] == 2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="3"  @if($ks_hr['hr_'.$i] == 3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="4"  @if($ks_hr['hr_'.$i] == 4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="5"  @if($ks_hr['hr_'.$i] == 5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="6"  @if($ks_hr['hr_'.$i] == 6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="7"  @if($ks_hr['hr_'.$i] == 7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="8"  @if($ks_hr['hr_'.$i] == 8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="hr_{{$i}}"  value="9"  @if($ks_hr['hr_'.$i] == 9) echo checked @endif disabled></td>
                                                <td><i>{{$b[$i-1]}}</i></td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>

                                    <br>
                                    <p>Kriteria <i>Soft Rewards</i> (Imbalan Lembut)</p>
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
                                        @php
                                            $a = [
                                                'SR1','SR1','SR2'
                                            ];
                                            $b = [
                                                'SR2','SR3','SR3'
                                                ];
                                            $ks_sr = json_decode($kuesioner->kuesioner_ks_sr,true);
                                        @endphp
                                        @for($i = 1; $i <= 3 ; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><i>{{$a[$i-1]}}</i></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="9" @if($ks_sr['sr_'.$i] == -9) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="8" @if($ks_sr['sr_'.$i] == -8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="7" @if($ks_sr['sr_'.$i] == -7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="6" @if($ks_sr['sr_'.$i] == -6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="5" @if($ks_sr['sr_'.$i] == -5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="4" @if($ks_sr['sr_'.$i] == -4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="3" @if($ks_sr['sr_'.$i] == -3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="2" @if($ks_sr['sr_'.$i] == -2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="1"  @if($ks_sr['sr_'.$i] == 1) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="2"  @if($ks_sr['sr_'.$i] == 2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="3"  @if($ks_sr['sr_'.$i] == 3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="4"  @if($ks_sr['sr_'.$i] == 4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="5"  @if($ks_sr['sr_'.$i] == 5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="6"  @if($ks_sr['sr_'.$i] == 6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="7"  @if($ks_sr['sr_'.$i] == 7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="8"  @if($ks_sr['sr_'.$i] == 8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="sr_{{$i}}"  value="9"  @if($ks_sr['sr_'.$i] == 9) echo checked @endif disabled></td>
                                                <td><i>{{$b[$i-1]}}</i></td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>

                                    <br>
                                    <p>Kriteria <i>Communications Skills</i> (Kemampuan Berkomunikasi)</p>
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
                                        @php
                                            $a = [
                                                'CS1','CS1','CS2'
                                            ];
                                            $b = [
                                                'CS2','CS3','CS3'
                                                ];
                                            $ks_cs = json_decode($kuesioner->kuesioner_ks_cs,true);
                                        @endphp
                                        @for($i = 1; $i <= 3 ; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><i>{{$a[$i-1]}}</i></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="9" @if($ks_cs['cs_'.$i] == -9) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="8" @if($ks_cs['cs_'.$i] == -8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="7" @if($ks_cs['cs_'.$i] == -7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="6" @if($ks_cs['cs_'.$i] == -6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="5" @if($ks_cs['cs_'.$i] == -5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="4" @if($ks_cs['cs_'.$i] == -4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="3" @if($ks_cs['cs_'.$i] == -3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="2" @if($ks_cs['cs_'.$i] == -2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="1"  @if($ks_cs['cs_'.$i] == 1) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="2"  @if($ks_cs['cs_'.$i] == 2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="3"  @if($ks_cs['cs_'.$i] == 3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="4"  @if($ks_cs['cs_'.$i] == 4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="5"  @if($ks_cs['cs_'.$i] == 5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="6"  @if($ks_cs['cs_'.$i] == 6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="7"  @if($ks_cs['cs_'.$i] == 7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="8"  @if($ks_cs['cs_'.$i] == 8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="cs_{{$i}}"  value="9"  @if($ks_cs['cs_'.$i] == 9) echo checked @endif disabled></td>
                                                <td><i>{{$b[$i-1]}}</i></td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>

                                    <br>
                                    <p>Kriteria <i>Enjoyment to Help Others</i> (Kesenangan Membantu Orang Lain)</p>
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
                                        @php
                                            $a = [
                                                'EH1','EH1','EH2'
                                            ];
                                            $b = [
                                                'EH2','EH3','EH3'
                                                ];
                                            $ks_eh = json_decode($kuesioner->kuesioner_ks_eh,true);
                                        @endphp
                                        @for($i = 1; $i <= 3 ; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><i>{{$a[$i-1]}}</i></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="9" @if($ks_eh['eh_'.$i] == -9) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="8" @if($ks_eh['eh_'.$i] == -8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="7" @if($ks_eh['eh_'.$i] == -7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="6" @if($ks_eh['eh_'.$i] == -6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="5" @if($ks_eh['eh_'.$i] == -5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="4" @if($ks_eh['eh_'.$i] == -4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="3" @if($ks_eh['eh_'.$i] == -3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="2" @if($ks_eh['eh_'.$i] == -2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="1"  @if($ks_eh['eh_'.$i] == 1) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="2"  @if($ks_eh['eh_'.$i] == 2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="3"  @if($ks_eh['eh_'.$i] == 3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="4"  @if($ks_eh['eh_'.$i] == 4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="5"  @if($ks_eh['eh_'.$i] == 5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="6"  @if($ks_eh['eh_'.$i] == 6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="7"  @if($ks_eh['eh_'.$i] == 7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="8"  @if($ks_eh['eh_'.$i] == 8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="eh_{{$i}}"  value="9"  @if($ks_eh['eh_'.$i] == 9) echo checked @endif disabled></td>
                                                <td><i>{{$b[$i-1]}}</i></td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>

                                    <br>
                                    <p>Kriteria <i>Quality of Knowledge< Shared</i> (Kualitas dari Berbagai Pengetahuan)</p>
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
                                        @php
                                            $a = [
                                                'QK1','QK1','QK1','QK1','QK1','QK2','QK2','QK2','QK2','QK3','QK3','QK3','QK4','QK4','QK5',
                                            ];
                                            $b = [
                                                'QK2','QK3','QK4','QK5','QK6','QK3','QK4','QK5','QK6','QK4','QK5','QK6','QK5','QK6','QK6',
                                                ];
                                            $ks_qk = json_decode($kuesioner->kuesioner_ks_qk,true);
                                        @endphp
                                        @for($i = 1; $i <= 15 ; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><i>{{$a[$i-1]}}</i></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="9" @if($ks_qk['qk_'.$i] == -9) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="8" @if($ks_qk['qk_'.$i] == -8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="7" @if($ks_qk['qk_'.$i] == -7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="6" @if($ks_qk['qk_'.$i] == -6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="5" @if($ks_qk['qk_'.$i] == -5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="4" @if($ks_qk['qk_'.$i] == -4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="3" @if($ks_qk['qk_'.$i] == -3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="2" @if($ks_qk['qk_'.$i] == -2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="1"  @if($ks_qk['qk_'.$i] == 1) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="2"  @if($ks_qk['qk_'.$i] == 2) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="3"  @if($ks_qk['qk_'.$i] == 3) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="4"  @if($ks_qk['qk_'.$i] == 4) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="5"  @if($ks_qk['qk_'.$i] == 5) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="6"  @if($ks_qk['qk_'.$i] == 6) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="7"  @if($ks_qk['qk_'.$i] == 7) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="8"  @if($ks_qk['qk_'.$i] == 8) echo checked @endif disabled></td>
                                                <td><input type="radio" name="qk_{{$i}}"  value="9"  @if($ks_qk['qk_'.$i] == 9) echo checked @endif disabled></td>
                                                <td><i>{{$b[$i-1]}}</i></td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
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
@endsection
