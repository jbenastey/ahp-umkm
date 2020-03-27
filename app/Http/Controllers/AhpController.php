<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AhpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['kuesioner'] = DB::table('kuesioner')->get();
        return view('ahp.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['kuesioner'] = DB::table('kuesioner')
            ->where('kuesioner_id',$id)
            ->first();
        return view('ahp.lihat',$data);
    }

    public function matriksKriteria($id)
    {
        //
//        var_dump($id);die;
        $kuesioner = DB::table('kuesioner')
            ->where('kuesioner_id',$id)
            ->first();
        $skala = json_decode($kuesioner->kuesioner_ks,true);
        $matriks = [
            'HR' => [
                'HR' => 1,
                'CS' => 0,
                'EH' => 0,
                'SR' => 0,
                'QK' => 0,
            ],
            'CS' => [
                'HR' => 0,
                'CS' => 1,
                'EH' => 0,
                'SR' => 0,
                'QK' => 0,
            ],
            'EH' => [
                'HR' => 0,
                'CS' => 0,
                'EH' => 1,
                'SR' => 0,
                'QK' => 0,
            ],
            'SR' => [
                'HR' => 0,
                'CS' => 0,
                'EH' => 0,
                'SR' => 1,
                'QK' => 0,
            ],
            'QK' => [
                'HR' => 0,
                'CS' => 0,
                'EH' => 0,
                'SR' => 0,
                'QK' => 1,
            ],
        ];
//        for ($i = 1; $i <= count($skala) ; $i++) {
//            var_dump($skala['ks'.$i]);
            if ($skala['ks1'] > 0){
                $matriks['HR']['CS'] = abs($skala['ks1']);
                $matriks['CS']['HR'] = (1/$skala['ks1']);
            } else {
                $matriks['HR']['CS'] = (1/$skala['ks1']);
                $matriks['CS']['HR'] = ($skala['ks1']);
            }

            if ($skala['ks2'] > 0){
                $matriks['HR']['EH'] = ($skala['ks2']);
                $matriks['EH']['HR'] = (1/$skala['ks2']);
            } else {
                $matriks['HR']['EH'] = 1/$skala['ks2'];
                $matriks['EH']['HR'] = $skala['ks2'];
            }

            if ($skala['ks3'] > 0){
                $matriks['HR']['SR'] = $skala['ks3'];
                $matriks['SR']['HR'] = 1/$skala['ks3'];
            } else {
                $matriks['HR']['SR'] = 1/$skala['ks3'];
                $matriks['SR']['HR'] = $skala['ks3'];
            }

            if ($skala['ks4'] > 0){
                $matriks['HR']['QK'] = $skala['ks4'];
                $matriks['QK']['HR'] = 1/$skala['ks4'];
            } else {
                $matriks['HR']['QK'] = 1/$skala['ks4'];
                $matriks['QK']['HR'] = $skala['ks4'];
            }

            if ($skala['ks5'] > 0){
                $matriks['CS']['EH'] = $skala['ks5'];
                $matriks['EH']['CS'] = 1/$skala['ks5'];
            } else {
                $matriks['CS']['EH'] = 1/$skala['ks5'];
                $matriks['EH']['CS'] = $skala['ks5'];
            }

            if ($skala['ks6'] > 0){
                $matriks['CS']['SR'] = $skala['ks6'];
                $matriks['SR']['CS'] = 1/$skala['ks6'];
            } else {
                $matriks['CS']['SR'] = 1/$skala['ks6'];
                $matriks['SR']['CS'] = $skala['ks6'];
            }

            if ($skala['ks7'] > 0){
                $matriks['CS']['QK'] = $skala['ks7'];
                $matriks['QK']['CS'] = 1/$skala['ks7'];
            } else {
                $matriks['CS']['QK'] = 1/$skala['ks7'];
                $matriks['QK']['CS'] = $skala['ks7'];
            }

            if ($skala['ks8'] > 0){
                $matriks['EH']['SR'] = $skala['ks8'];
                $matriks['SR']['EH'] = 1/$skala['ks8'];
            } else {
                $matriks['EH']['SR'] = 1/$skala['ks8'];
                $matriks['SR']['EH'] = $skala['ks8'];
            }

            if ($skala['ks9'] > 0){
                $matriks['EH']['QK'] = $skala['ks9'];
                $matriks['QK']['EH'] = 1/$skala['ks9'];
            } else {
                $matriks['EH']['QK'] = 1/$skala['ks9'];
                $matriks['QK']['EH'] = $skala['ks9'];
            }

            if ($skala['ks10'] > 0){
                $matriks['SR']['QK'] = abs($skala['ks10']);
                $matriks['QK']['SR'] = abs(1/$skala['ks10']);
            } else {
                $matriks['SR']['QK'] = abs(1/$skala['ks10']);
                $matriks['QK']['SR'] = abs($skala['ks10']);
            }
//        }
        var_dump($matriks);
//        return view('ahp.lihat',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
