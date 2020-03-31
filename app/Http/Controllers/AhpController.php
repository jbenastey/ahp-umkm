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
        return view('ahp.index', $data);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['kuesioner'] = DB::table('kuesioner')
            ->where('kuesioner_id', $id)
            ->first();

        $data['kriteria'] = DB::table('matriks_kriteria')
            ->where('kriteria_kuesioner_id', $id)
            ->first();

        return view('ahp.lihat', $data);
    }

    public function matriksKriteria($id)
    {
        //
//        var_dump($id);die;
        $kuesioner = DB::table('kuesioner')
            ->where('kuesioner_id', $id)
            ->first();
        $skala = json_decode($kuesioner->kuesioner_ks, true);
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
        if ($skala['ks1'] > 0) {
            $matriks['HR']['CS'] = round(abs($skala['ks1']),2);
            $matriks['CS']['HR'] = round(abs(1 / $skala['ks1']),2);
        } else {
            $matriks['HR']['CS'] = round(abs(1 / $skala['ks1']),2);
            $matriks['CS']['HR'] = round(abs($skala['ks1']),2);
        }

        if ($skala['ks2'] > 0) {
            $matriks['HR']['EH'] = round(abs($skala['ks2']),2);
            $matriks['EH']['HR'] = round(abs(1 / $skala['ks2']),2);
        } else {
            $matriks['HR']['EH'] = round(abs(1 / $skala['ks2']),2);
            $matriks['EH']['HR'] = round(abs($skala['ks2']),2);
        }

        if ($skala['ks3'] > 0) {
            $matriks['HR']['SR'] = round(abs($skala['ks3']),2);
            $matriks['SR']['HR'] = round(abs(1 / $skala['ks3']),2);
        } else {
            $matriks['HR']['SR'] = round(abs(1 / $skala['ks3']),2);
            $matriks['SR']['HR'] = round(abs($skala['ks3']),2);
        }

        if ($skala['ks4'] > 0) {
            $matriks['HR']['QK'] = round(abs($skala['ks4']),2);
            $matriks['QK']['HR'] = round(abs(1 / $skala['ks4']),2);
        } else {
            $matriks['HR']['QK'] = round(abs(1 / $skala['ks4']),2);
            $matriks['QK']['HR'] = round(abs($skala['ks4']),2);
        }

        if ($skala['ks5'] > 0) {
            $matriks['CS']['EH'] = round(abs($skala['ks5']),2);
            $matriks['EH']['CS'] = round(abs(1 / $skala['ks5']),2);
        } else {
            $matriks['CS']['EH'] = round(abs(1 / $skala['ks5']),2);
            $matriks['EH']['CS'] = round(abs($skala['ks5']),2);
        }

        if ($skala['ks6'] > 0) {
            $matriks['CS']['SR'] = round(abs($skala['ks6']),2);
            $matriks['SR']['CS'] = round(abs(1 / $skala['ks6']),2);
        } else {
            $matriks['CS']['SR'] = round(abs(1 / $skala['ks6']),2);
            $matriks['SR']['CS'] = round(abs($skala['ks6']),2);
        }

        if ($skala['ks7'] > 0) {
            $matriks['CS']['QK'] = round(abs($skala['ks7']),2);
            $matriks['QK']['CS'] = round(abs(1 / $skala['ks7']),2);
        } else {
            $matriks['CS']['QK'] = round(abs(1 / $skala['ks7']),2);
            $matriks['QK']['CS'] = round(abs($skala['ks7']),2);
        }

        if ($skala['ks8'] > 0) {
            $matriks['EH']['SR'] = round(abs($skala['ks8']),2);
            $matriks['SR']['EH'] = round(abs(1 / $skala['ks8']),2);
        } else {
            $matriks['EH']['SR'] = round(abs(1 / $skala['ks8']),2);
            $matriks['SR']['EH'] = round(abs($skala['ks8']),2);
        }

        if ($skala['ks9'] > 0) {
            $matriks['EH']['QK'] = round(abs($skala['ks9']),2);
            $matriks['QK']['EH'] = round(abs(1 / $skala['ks9']),2);
        } else {
            $matriks['EH']['QK'] = round(abs(1 / $skala['ks9']),2);
            $matriks['QK']['EH'] = round(abs($skala['ks9']),2);
        }

        if ($skala['ks10'] > 0) {
            $matriks['SR']['QK'] = round(abs($skala['ks10'],2));
            $matriks['QK']['SR'] = round(abs(1 / $skala['ks10']),2);
        } else {
            $matriks['SR']['QK'] = round(abs(1 / $skala['ks10']),2);
            $matriks['QK']['SR'] = round(abs($skala['ks10']),2);
        }

        $data = [
            'kriteria_kuesioner_id' => $id,
            'kriteria_hr' => json_encode($matriks['HR']),
            'kriteria_sr' => json_encode($matriks['SR']),
            'kriteria_cs' => json_encode($matriks['CS']),
            'kriteria_eh' => json_encode($matriks['EH']),
            'kriteria_qk' => json_encode($matriks['QK']),
        ];

        var_dump($data);

        DB::table('matriks_kriteria')->insert($data);
        alert()->success('Matriks kriteria sudah dibuat', 'Sukses');
        return redirect('/ahp/'.$id.'/lihat');
    }

    public function bagiKriteria($id){
        $kriteria = DB::table('matriks_kriteria')
            ->where('kriteria_kuesioner_id', $id)
            ->first();
        $hr = json_decode($kriteria->kriteria_hr);
        $sr = json_decode($kriteria->kriteria_sr);
        $cs = json_decode($kriteria->kriteria_cs);
        $eh = json_decode($kriteria->kriteria_eh);
        $qk = json_decode($kriteria->kriteria_qk);

        $jumlahHR = $hr->HR +$cs->HR +$eh->HR +$sr->HR +$qk->HR;
        $jumlahCS = $hr->CS +$cs->CS +$eh->CS +$sr->CS +$qk->CS;
        $jumlahEH = $hr->EH +$cs->EH +$eh->EH +$sr->EH +$qk->EH;
        $jumlahSR = $hr->SR +$cs->SR +$eh->SR +$sr->SR +$qk->SR;
        $jumlahQK = $hr->QK +$cs->QK +$eh->QK +$sr->QK +$qk->QK;

        //kolom HR
        $k_hr['HR'] = round($hr->HR / round($jumlahHR,2),4);
        $k_hr['CS'] = round($cs->HR / round($jumlahHR,2),4);
        $k_hr['EH'] = round($eh->HR / round($jumlahHR,2),4);
        $k_hr['SR'] = round($sr->HR / round($jumlahHR,2),4);
        $k_hr['QK'] = round($qk->HR / round($jumlahHR,2),4);
        //kolom CS
        $k_cs['HR'] = round($hr->CS / round($jumlahCS,2),4);
        $k_cs['CS'] = round($cs->CS / round($jumlahCS,2),4);
        $k_cs['EH'] = round($eh->CS / round($jumlahCS,2),4);
        $k_cs['SR'] = round($sr->CS / round($jumlahCS,2),4);
        $k_cs['QK'] = round($qk->CS / round($jumlahCS,2),4);
        //kolom HR
        $k_eh['HR'] = round($hr->EH / round($jumlahEH,2),4);
        $k_eh['CS'] = round($cs->EH / round($jumlahEH,2),4);
        $k_eh['EH'] = round($eh->EH / round($jumlahEH,2),4);
        $k_eh['SR'] = round($sr->EH / round($jumlahEH,2),4);
        $k_eh['QK'] = round($qk->EH / round($jumlahEH,2),4);
        //kolom HR
        $k_sr['HR'] = round($hr->SR / round($jumlahSR,2),4);
        $k_sr['CS'] = round($cs->SR / round($jumlahSR,2),4);
        $k_sr['EH'] = round($eh->SR / round($jumlahSR,2),4);
        $k_sr['SR'] = round($sr->SR / round($jumlahSR,2),4);
        $k_sr['QK'] = round($qk->SR / round($jumlahSR,2),4);
        //kolom HR
        $k_qk['HR'] = round($hr->QK / round($jumlahQK,2),4);
        $k_qk['CS'] = round($cs->QK / round($jumlahQK,2),4);
        $k_qk['EH'] = round($eh->QK / round($jumlahQK,2),4);
        $k_qk['SR'] = round($sr->QK / round($jumlahQK,2),4);
        $k_qk['QK'] = round($qk->QK / round($jumlahQK,2),4);

        var_dump($k_hr);
        var_dump($k_cs);
        var_dump($k_eh);
        var_dump($k_sr);
        var_dump($k_qk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
