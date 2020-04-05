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
                        <h3 class="dt-entry__title">Ubah Kuesioner Kriteria</h3>
                    </div>
                    <!-- /entry heading -->

                </div>
                <!-- /entry header -->

                <!-- Card -->
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body">

                        <form method="post" action="{{url('/kuesioner/'.$kuesioner->kuesioner_id.'/update-kriteria')}}">
                            @csrf
                            <table class="table table-bordered table-responsive" width="100">
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
                                    //var_dump($ks);
                                @endphp
                                @for($i = 1; $i <= 10 ; $i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><i>{{$a[$i-1]}}</i></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="-9" @if($ks['ks'.$i] == -9) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="-8" @if($ks['ks'.$i] == -8) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="-7" @if($ks['ks'.$i] == -7) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="-6" @if($ks['ks'.$i] == -6) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="-5" @if($ks['ks'.$i] == -5) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="-4" @if($ks['ks'.$i] == -4) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="-3" @if($ks['ks'.$i] == -3) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="-2" @if($ks['ks'.$i] == -2) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="1" @if($ks['ks'.$i] == 1) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="2" @if($ks['ks'.$i] == 2) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="3" @if($ks['ks'.$i] == 3) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="4" @if($ks['ks'.$i] == 4) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="5" @if($ks['ks'.$i] == 5) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="6" @if($ks['ks'.$i] == 6) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="7" @if($ks['ks'.$i] == 7) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="8" @if($ks['ks'.$i] == 8) checked @endif required></td>
                                        <td><input type="radio" name="ks_{{$i}}" value="9" @if($ks['ks'.$i] == 9) checked @endif required></td>
                                        <td><i>{{$b[$i-1]}}</i></td>
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
