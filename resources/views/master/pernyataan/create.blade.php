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
                        <h3 class="dt-entry__title">Tambah Pernyataan</h3>
                    </div>
                    <!-- /entry heading -->

                </div>
                <!-- /entry header -->

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body">

                        <form method="post" action="{{url('pernyataan/store')}}">
                        @csrf
                        <!-- Form Group -->
                            <div class="form-group form-row">
                                <label class="col-xl-2 col-form-label text-sm-right" for="email-2">Item</label>

                                <div class="col-xl-8">
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <input type="text" class="form-control" id="email-2"
                                           aria-describedby="emailHelp2"
                                           placeholder="Item" name="item" required>
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <label class="col-xl-2 col-form-label text-sm-right" for="email-2">Pernyataan</label>

                                <div class="col-xl-8">
                                    <textarea name="pernyataan" class="form-control" id="email-2" cols="30" rows="10" required></textarea>
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <label class="col-xl-2 col-form-label text-sm-right" for="email-2"></label>

                                <div class="col-xl-8">
                                    <button type="button" onclick="window.history.back()" class="btn btn-sm btn-outline-primary text-uppercase">Kembali</button>
                                    <button type="submit" class="btn btn-sm btn-primary text-uppercase">Simpan</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
