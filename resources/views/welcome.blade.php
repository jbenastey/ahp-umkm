@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper"><!--Under Maintenance Starts-->
                    <section id="maintenance" class="auth-height">
                        <div class="container-fluid">
                            <div class="row full-height-vh">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <img src="{{asset('apex/app-assets/img/gallery/maintenance.png')}}" alt="" class="img-fluid maintenance-img mt-2" height="300" width="300">
                                            <h1 class="mt-4">Kuesioner UMKM</h1>
                                            <a href="{{route('isi')}}" class="btn btn-warning my-2 btn-sm">Isi Kuesioner Pemilik</a><br>
                                            <a href="{{route('isi-pakar')}}" class="btn btn-warning my-2 btn-sm">Isi Kuesioner Pakar</a><br>
                                            <a href="{{route('isi-karyawan')}}" class="btn btn-warning my-2 btn-sm">Isi Kuesioner Karyawan</a><br>
                                            <a href="{{route('home')}}" class=" my-2">Login Admin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Under Maintenance Starts-->

                </div>
            </div>
            <!-- END : End Main Content-->
        </div>
    </div>
@endsection
