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
                    <h3 class="dt-entry__title">Ubah Kuesioner Subkriteria</h3>
                </div>
                <!-- /entry heading -->

            </div>
            <!-- /entry header -->

            <!-- Card -->
            <div class="dt-card">

                <!-- Card Body -->
                <div class="dt-card__body">

                    <form method="post" action="{{url('/kuesioner/'.$kuesioner->kuesioner_id.'/update-subkriteria/'.$jenis)}}">
                        @csrf
                        <table class="table table-bordered table-responsive" width="100">
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
                            echo '<pre>';
                                    $ks = json_decode($kuesioner->kuesioner_kedua,true)[$jenis];
                                    //var_dump($ks);die;
                                @endphp
                                @for($i = 1; $i <= count($kombinasi) ; $i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$kombinasi[$i-1][0]}}</td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="-9" @if($ks[$jenis.'_'.$i] == -9) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="-8" @if($ks[$jenis.'_'.$i] == -8) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="-7" @if($ks[$jenis.'_'.$i] == -7) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="-6" @if($ks[$jenis.'_'.$i] == -6) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="-5" @if($ks[$jenis.'_'.$i] == -5) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="-4" @if($ks[$jenis.'_'.$i] == -4) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="-3" @if($ks[$jenis.'_'.$i] == -3) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="-2" @if($ks[$jenis.'_'.$i] == -2) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="1" @if($ks[$jenis.'_'.$i] == 1) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="2" @if($ks[$jenis.'_'.$i] == 2) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="3" @if($ks[$jenis.'_'.$i] == 3) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="4" @if($ks[$jenis.'_'.$i] == 4) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="5" @if($ks[$jenis.'_'.$i] == 5) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="6" @if($ks[$jenis.'_'.$i] == 6) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="7" @if($ks[$jenis.'_'.$i] == 7) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="8" @if($ks[$jenis.'_'.$i] == 8) checked @endif required></td>
                                        <td><input type="radio" name="{{$jenis}}_{{$i}}" value="9" @if($ks[$jenis.'_'.$i] == 9) checked @endif required></td>
                                        <td>{{$kombinasi[$i-1][1]}}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="row">

                            <!-- Form Group -->
                            <div class="form-group  col-xl-6">
                                <button type="button" onclick="window.history.back()" class="btn btn-outline-primary btn-block text-uppercase">Kembali</button>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group  col-xl-6">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">Update</button>
                            </div>
                            <!-- /form group -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
