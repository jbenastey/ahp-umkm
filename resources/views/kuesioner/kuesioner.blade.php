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

                        <form>
                            <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-3 col-form-label text-sm-right" for="email-2">Nama</label>

                                <div class="col-xl-7">
                                    <input type="text" class="form-control" id="email-2"
                                           aria-describedby="emailHelp2"
                                           placeholder="Nama" name="kuesioner_nama">
                                </div>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Umur</label>

                                <div class="col-xl-7">
                                    <input type="number" class="form-control" id="password-2"
                                           placeholder="Umur" name="kuesioner_umur">
                                </div>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Jurusan</label>

                                <div class="col-xl-7">
                                    <input type="text" class="form-control" id="password-2"
                                           placeholder="Jurusan" name="kuesioner_jurusan">
                                </div>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-3 col-form-label text-sm-right" for="password-2">Jabatan</label>

                                <div class="col-xl-7">
                                    <input type="text" class="form-control" id="password-2"
                                           placeholder="Jabatan" name="kuesioner_jabatan">
                                </div>
                            </div>
                            <!-- /form group -->

                            <hr>

                            <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-2 col-form-label text-sm-right" for="password-2"></label>

                                <div class="col-xl-8">
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

                                    <p><i>Hard Rewards</i> (Imbalan Keras)</p>
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
                                        <tr>
                                            <td>HR1</td>
                                            <td>Saya berharap untuk mendapatkan promosi sebagai imbalan dari pengetahuan yang saya bagi dengan dosen lainnya.</td>
                                            <td>
                                                <input type="radio" name="hr1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr1" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>HR2</td>
                                            <td>Saya berharap untuk dinaikkan gaji sebagai imbalan dari berbagi pengetahuan dengan dosen lainnya.</td>
                                            <td>
                                                <input type="radio" name="hr2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr2" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>HR3</td>
                                            <td>Saya berharap untuk mendapatkan hadiah (bonus) sebagai  imbalan dari berbagi pengetahuan dengan dosen lainnya.					</td>
                                            <td>
                                                <input type="radio" name="hr3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr3" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>HR4</td>
                                            <td>Saya berharap mendapatkan kesempatan untuk belajar dari orang lain dengan imbalan dari pengetahuan yang saya bagi dengan dosen lainnya. </td>
                                            <td>
                                                <input type="radio" name="hr4" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr4" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr4" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr4" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="hr4" required>
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
                                            <th>STS</th>
                                            <th>TS</th>
                                            <th>KS</th>
                                            <th>S</th>
                                            <th>SS</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>SR1</td>
                                            <td>Berbagi pengetahuan akan memperluas lingkup asosiasi saya dengan anggota lain.</td>
                                            <td>
                                                <input type="radio" name="sr1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr1" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SR2</td>
                                            <td>Berbagi pengetahuan akan memperkuat ikatan antara dosen lainnya dengan saya.</td>
                                            <td>
                                                <input type="radio" name="sr2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr2" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SR3</td>
                                            <td>Berbagi pengetahuan akan membuat kerja sama dengan dosen lainnya.</td>
                                            <td>
                                                <input type="radio" name="sr3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="sr3" required>
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
                                            <th>STS</th>
                                            <th>TS</th>
                                            <th>KS</th>
                                            <th>S</th>
                                            <th>SS</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>CS1</td>
                                            <td>Saya tipe orang yang ingin tahu apa yang terjadi, bersosialisasi dan berpikiran terbuka.</td>
                                            <td>
                                                <input type="radio" name="cs1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs1" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CS2</td>
                                            <td>Kemampuan komunikasi saya membantu saya dalam menyelesaikan pekerjaan.</td>
                                            <td>
                                                <input type="radio" name="cs2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs2" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CS3</td>
                                            <td>Kemampuan berkomunikasi membuat lebih mudah untuk mendapatkan informasi dari orang lain.</td>
                                            <td>
                                                <input type="radio" name="cs3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="cs3" required>
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
                                            <th>STS</th>
                                            <th>TS</th>
                                            <th>KS</th>
                                            <th>S</th>
                                            <th>SS</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>EH1</td>
                                            <td>Saya senang berbagi pengetahuan dengan dosen lainnya.</td>
                                            <td>
                                                <input type="radio" name="eh1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh1" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>EH2</td>
                                            <td>Saya senang membantu dosen lainnya dengan cara berbagi pengetahuan yang saya miliki.</td>
                                            <td>
                                                <input type="radio" name="eh2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh2" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>EH3</td>
                                            <td>Rasanya sangat bagus dalam membantu orang lain dengan berbagi pengetahuan.</td>
                                            <td>
                                                <input type="radio" name="eh3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="eh3" required>
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
                                            <th>STS</th>
                                            <th>TS</th>
                                            <th>KS</th>
                                            <th>S</th>
                                            <th>SS</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>QK1</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya sangat relavan dengan pekerjaan saya.</td>
                                            <td>
                                                <input type="radio" name="qk1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk1" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk1" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK2</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya mudah di mengerti.</td>
                                            <td>
                                                <input type="radio" name="qk2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk2" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk2" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK3</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya sangat akurat.</td>
                                            <td>
                                                <input type="radio" name="qk3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk3" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk3" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK4</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya merupakan informasi yang lengkap.</td>
                                            <td>
                                                <input type="radio" name="qk4" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk4" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk4" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk4" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk4" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK5</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya adalah informasi yang terpercaya.</td>
                                            <td>
                                                <input type="radio" name="qk5" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk5" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk5" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk5" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk5" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>QK6</td>
                                            <td>Pengetahuan yang saya bagi dengan dosen lainnya sampaikan tepat pada waktu.</td>
                                            <td>
                                                <input type="radio" name="qk6" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk6" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk6" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk6" required>
                                            </td>
                                            <td>
                                                <input type="radio" name="qk6" required>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                            <!-- /form group -->

                        </form>
                        <!-- /form -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection