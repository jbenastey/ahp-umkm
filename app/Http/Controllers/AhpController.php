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

        $kriteria = DB::table('master_kriteria')->get();
        $data['kriteria'] = $kriteria;
        $data['pernyataan'] = DB::table('master_pernyataan')->get();

        $data['namaKri'] = [];
        $pernyataan = [];
        foreach ($kriteria as $value){
            $pernyataan[$value->kriteria_id] = array();
        }
        foreach ($kriteria as $value){
            foreach ($data['pernyataan'] as $value2){
                if ($value2->pernyataan_kriteria_id == $value->kriteria_id){
                    array_push($pernyataan[$value->kriteria_id], $value2->pernyataan_item);
                }
            }
        }
        foreach ($kriteria as $value){
            if ($pernyataan[$value->kriteria_id] != null){
                $kombinasi_p = combinations(2,$pernyataan[$value->kriteria_id]);
                if(count($kombinasi_p) > 0){
                    array_push($data['namaKri'], (strtolower(rtrim($kombinasi_p[0][0],1))));
                }
            }
        }

        $data['cek'] = DB::table('hitung')
            ->where('hitung_kuesioner_id', $id)
            ->get();

        return view('ahp.lihat', $data);
    }

    public function hitung($id,$jenis){
        $kuesioner = DB::table('kuesioner')
            ->where('kuesioner_id', $id)
            ->first();
        $kriteria = DB::table('master_kriteria')->get();
        $data['pernyataan'] = DB::table('master_pernyataan')->get();

        $kedua = json_decode($kuesioner->kuesioner_kedua,true);
        $skala = $kedua[$jenis];

        $namaKri = [];
        $pernyataan = [];
        foreach ($kriteria as $value){
            $pernyataan[$value->kriteria_id] = array();
        }
        foreach ($kriteria as $value){
            foreach ($data['pernyataan'] as $value2){
                if ($value2->pernyataan_kriteria_id == $value->kriteria_id){
                    array_push($pernyataan[$value->kriteria_id], $value2->pernyataan_item);
                }
            }
        }
        foreach ($kriteria as $value){
            if ($pernyataan[$value->kriteria_id] != null){
                $kombinasi_p = combinations(2,$pernyataan[$value->kriteria_id]);
                if(count($kombinasi_p) > 0){
                    array_push($namaKri, (rtrim($kombinasi_p[0][0],1)));
                }
            }
        }


        $matriks = [];
        foreach ($namaKri as $value) {
            $matriks[$value] = [];
        }
        foreach ($namaKri as $value) {
            foreach ($namaKri as $value2){
                if ($value2 == $value){
                    $matriks[$value][$value2] = 1;
                } else {
                    $matriks[$value][$value2] = 0;
                }
            }
        }
//        var_dump($skala);
        $kom = combinations(2,$namaKri);
        for ($i = 0; $i < count($skala); $i++) {
            if ($skala[$jenis.'_'.($i+1)] > 0){
                $matriks[$kom[$i][0]][$kom[$i][1]] = round(abs($skala[$jenis.'_'.($i+1)]),2);
                $matriks[$kom[$i][1]][$kom[$i][0]] = round(abs(1 / $skala[$jenis.'_'.($i+1)]),2);
            } else {
                $matriks[$kom[$i][0]][$kom[$i][1]] = round(abs(1 / $skala[$jenis.'_'.($i+1)]),2);
                $matriks[$kom[$i][1]][$kom[$i][0]] = round(abs($skala[$jenis.'_'.($i+1)]),2);
            }
        }
//        var_dump($matriks); //matriks udah dapat

        $jumlahKolom = [];
        $jumlahBaris = [];
        $rata = [];
        $kali = [];
        $hasil = [];
        $jumlahBarisKali = [];
        $jumlahSemua = 0;
        foreach ($matriks as $key => $value) {
            $jumlahKolom[$key] = 0;
            $jumlahBaris[$key] = 0;
            $rata[$key] = 0;
            $hasil[$key] = 0;
            $jumlahBarisKali[$key] = 0;
            foreach ($matriks as $key2 =>$value2) {
                $kali[$key][$key2] = 0;
            }
        }


        //mencari pembagian
        foreach ($jumlahKolom as $key => $value) {
            foreach ($matriks as $key2 => $value2) {
                $jumlahKolom[$key] += $matriks[$key2][$key];
            }
        }
//        var_dump($jumlahKolom);

        $bagi = [];
        foreach ($matriks as $key => $value) {
            foreach ($matriks as $key2 => $value2) {
                $bagi[$key][$key2] =  round($matriks[$key2][$key] / round($jumlahKolom[$key],2),4);
            }
        }
//        var_dump($bagi);


        //mencari perkalian
        foreach ($bagi as $key => $value) {
            foreach ($bagi as $key2 => $value2) {
                $jumlahBaris[$key] += $bagi[$key2][$key];
                $rata[$key] = round($jumlahBaris[$key] / count($bagi),4);
            }
        }
//        var_dump($jumlahBaris);
//        var_dump($rata);

        foreach ($matriks as $key => $value) {
            foreach ($matriks as $key2 => $value2) {
                $kali[$key][$key2] =  round($matriks[$key2][$key] * $rata[$key],4);
            }
        }
//        var_dump($kali);
        foreach ($kali as $key => $value) {
            foreach ($kali as $key2 => $value2) {
                $jumlahBarisKali[$key] += $kali[$key2][$key];
            }
        }
//        var_dump($jumlahBarisKali);

        foreach ($jumlahBarisKali as $key => $value) {
            $hasil[$key] = round($value / $rata[$key],4);
        }

//        var_dump($hasil);

        //mencari CI
        foreach ($hasil as $key=>$value) {
            $jumlahSemua += $value;
        }
        $n = count($hasil);
        $rataSemua = round($jumlahSemua / $n,4);
        $ci = ($rataSemua - $n) / ($n - 1);

        //mencari cr
        $cr = $ci / ri($n);
//        var_dump($cr);

        $save = [
            'hitung_kuesioner_id' => $id,
            'hitung_jenis' => $jenis,
            'hitung_matriks' => json_encode($matriks),
            'hitung_bagi' => json_encode($bagi),
            'hitung_baris_bagi' => json_encode($jumlahBaris),
            'hitung_rata_bagi' => json_encode($rata),
            'hitung_kali' => json_encode($kali),
            'hitung_baris_kali' => json_encode($jumlahBarisKali),
            'hitung_hasil' => json_encode($hasil),
            'hitung_ci' => json_encode($ci),
            'hitung_cr' => json_encode($cr)
        ];
//        var_dump($save);

        DB::table('hitung')->insert($save);
        alert()->success('Perhitungan Selesai', 'Sukses');
        return redirect('/ahp/'.$id.'/lihat');
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
            $matriks['SR']['QK'] = round(abs($skala['ks10']),2);
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

//        var_dump($k_hr);
//        var_dump($k_cs);
//        var_dump($k_eh);
//        var_dump($k_sr);
//        var_dump($k_qk);
        $data = [
            'pembagian_kuesioner_id' => $id,
            'pembagian_hr' => json_encode($k_hr),
            'pembagian_sr' => json_encode($k_sr),
            'pembagian_cs' => json_encode($k_cs),
            'pembagian_eh' => json_encode($k_eh),
            'pembagian_qk' => json_encode($k_qk),
        ];

        var_dump($data);

        DB::table('pembagian_kriteria')->insert($data);
        alert()->success(' ', 'Sukses');
        return redirect('/ahp/'.$id.'/lihat');
    }

    public function kaliKriteria($id){
        $bagi = DB::table('pembagian_kriteria')
            ->where('pembagian_kuesioner_id', $id)
            ->first();
        $hr = json_decode($bagi->pembagian_hr);
        $sr = json_decode($bagi->pembagian_sr);
        $cs = json_decode($bagi->pembagian_cs);
        $eh = json_decode($bagi->pembagian_eh);
        $qk = json_decode($bagi->pembagian_qk);

        $kriteria = DB::table('matriks_kriteria')
            ->where('kriteria_kuesioner_id', $id)
            ->first();
        $hr_k = json_decode($kriteria->kriteria_hr);
        $sr_k = json_decode($kriteria->kriteria_sr);
        $cs_k = json_decode($kriteria->kriteria_cs);
        $eh_k = json_decode($kriteria->kriteria_eh);
        $qk_k = json_decode($kriteria->kriteria_qk);


        $jumlahHR = $hr->HR +$cs->HR +$eh->HR +$sr->HR +$qk->HR;
        $jumlahCS = $hr->CS +$cs->CS +$eh->CS +$sr->CS +$qk->CS;
        $jumlahEH = $hr->EH +$cs->EH +$eh->EH +$sr->EH +$qk->EH;
        $jumlahSR = $hr->SR +$cs->SR +$eh->SR +$sr->SR +$qk->SR;
        $jumlahQK = $hr->QK +$cs->QK +$eh->QK +$sr->QK +$qk->QK;

        $rataHR = round($jumlahHR/5,4);
        $rataCS = round($jumlahCS/5,4);
        $rataEH = round($jumlahEH/5,4);
        $rataSR = round($jumlahSR/5,4);
        $rataQK = round($jumlahQK/5,4);

        //kolom HR
        $k_hr['HR'] = round($hr_k->HR * $rataHR,4);
        $k_hr['CS'] = round($cs_k->HR * $rataHR,4);
        $k_hr['EH'] = round($eh_k->HR * $rataHR,4);
        $k_hr['SR'] = round($sr_k->HR * $rataHR,4);
        $k_hr['QK'] = round($qk_k->HR * $rataHR,4);
        //kolom CS
        $k_cs['HR'] = round($hr_k->CS * $rataCS,4);
        $k_cs['CS'] = round($cs_k->CS * $rataCS,4);
        $k_cs['EH'] = round($eh_k->CS * $rataCS,4);
        $k_cs['SR'] = round($sr_k->CS * $rataCS,4);
        $k_cs['QK'] = round($qk_k->CS * $rataCS,4);
        //kolom HR
        $k_eh['HR'] = round($hr_k->EH * $rataEH,4);
        $k_eh['CS'] = round($cs_k->EH * $rataEH,4);
        $k_eh['EH'] = round($eh_k->EH * $rataEH,4);
        $k_eh['SR'] = round($sr_k->EH * $rataEH,4);
        $k_eh['QK'] = round($qk_k->EH * $rataEH,4);
        //kolom HR
        $k_sr['HR'] = round($hr_k->SR * $rataSR,4);
        $k_sr['CS'] = round($cs_k->SR * $rataSR,4);
        $k_sr['EH'] = round($eh_k->SR * $rataSR,4);
        $k_sr['SR'] = round($sr_k->SR * $rataSR,4);
        $k_sr['QK'] = round($qk_k->SR * $rataSR,4);
        //kolom HR
        $k_qk['HR'] = round($hr_k->QK * $rataQK,4);
        $k_qk['CS'] = round($cs_k->QK * $rataQK,4);
        $k_qk['EH'] = round($eh_k->QK * $rataQK,4);
        $k_qk['SR'] = round($sr_k->QK * $rataQK,4);
        $k_qk['QK'] = round($qk_k->QK * $rataQK,4);

//        var_dump($k_hr);
//        var_dump($k_cs);
//        var_dump($k_eh);
//        var_dump($k_sr);
//        var_dump($k_qk);

        $data = [
            'perkalian_kuesioner_id' => $id,
            'perkalian_hr' => json_encode($k_hr),
            'perkalian_sr' => json_encode($k_sr),
            'perkalian_cs' => json_encode($k_cs),
            'perkalian_eh' => json_encode($k_eh),
            'perkalian_qk' => json_encode($k_qk),
        ];

        var_dump($data);

        DB::table('perkalian_kriteria')->insert($data);
        alert()->success(' ', 'Sukses');
        return redirect('/ahp/'.$id.'/lihat');
    }

    public function matriksKriteriaHr($id){
        //
//        var_dump($id);die;
        $kuesioner = DB::table('kuesioner')
            ->where('kuesioner_id', $id)
            ->first();
        $skala = json_decode($kuesioner->kuesioner_ks_hr, true);
        $matriks = [
            'HR1' => [
                'HR1' => 1,
                'HR2' => 0,
                'HR3' => 0,
                'HR4' => 0,
            ],
            'HR2' => [
                'HR1' => 0,
                'HR2' => 1,
                'HR3' => 0,
                'HR4' => 0,
            ],
            'HR3' => [
                'HR1' => 0,
                'HR2' => 0,
                'HR3' => 1,
                'HR4' => 0,
            ],
            'HR4' => [
                'HR1' => 0,
                'HR2' => 0,
                'HR3' => 0,
                'HR4' => 1,
            ]
        ];
        var_dump($skala);
        if ($skala['hr_1'] > 0) {
            $matriks['HR1']['HR2'] = round(abs($skala['hr_1']),3);
            $matriks['HR2']['HR1'] = round(abs(1 / $skala['hr_1']),3);
        } else {
            $matriks['HR1']['HR2'] = round(abs(1 / $skala['hr_1']),3);
            $matriks['HR2']['HR1'] = round(abs($skala['hr_1']),3);
        }

        if ($skala['hr_2'] > 0) {
            $matriks['HR1']['HR3'] = round(abs($skala['hr_2']),3);
            $matriks['HR3']['HR1'] = round(abs(1 / $skala['hr_2']),3);
        } else {
            $matriks['HR1']['HR3'] = round(abs(1 / $skala['hr_2']),3);
            $matriks['HR3']['HR1'] = round(abs($skala['hr_2']),3);
        }

        if ($skala['hr_3'] > 0) {
            $matriks['HR1']['HR4'] = round(abs($skala['hr_3']),3);
            $matriks['HR4']['HR1'] = round(abs(1 / $skala['hr_3']),3);
        } else {
            $matriks['HR1']['HR4'] = round(abs(1 / $skala['hr_3']),3);
            $matriks['HR4']['HR1'] = round(abs($skala['hr_3']),3);
        }

        if ($skala['hr_4'] > 0) {
            $matriks['HR2']['HR3'] = round(abs($skala['hr_4']),3);
            $matriks['HR3']['HR2'] = round(abs(1 / $skala['hr_4']),3);
        } else {
            $matriks['HR2']['HR3'] = round(abs(1 / $skala['hr_4']),3);
            $matriks['HR3']['HR2'] = round(abs($skala['hr_4']),3);
        }

        if ($skala['hr_5'] > 0) {
            $matriks['HR2']['HR4'] = round(abs($skala['hr_5']),3);
            $matriks['HR4']['HR2'] = round(abs(1 / $skala['hr_5']),3);
        } else {
            $matriks['HR2']['HR4'] = round(abs(1 / $skala['hr_5']),3);
            $matriks['HR4']['HR2'] = round(abs($skala['hr_5']),3);
        }

        if ($skala['hr_6'] > 0) {
            $matriks['HR3']['HR4'] = round(abs($skala['hr_6']),3);
            $matriks['HR4']['HR3'] = round(abs(1 / $skala['hr_6']),3);
        } else {
            $matriks['HR3']['HR4'] = round(abs(1 / $skala['hr_6']),3);
            $matriks['HR4']['HR3'] = round(abs($skala['hr_6']),3);
        }

        $data = [
            'kriteria_kuesioner_id' => $id,
            'kriteria_hr1' => json_encode($matriks['HR1']),
            'kriteria_hr2' => json_encode($matriks['HR2']),
            'kriteria_hr3' => json_encode($matriks['HR3']),
            'kriteria_hr4' => json_encode($matriks['HR4']),
        ];

        var_dump($data);

        DB::table('matriks_kriteria_hr')->insert($data);
        alert()->success('Matriks subkriteria sudah dibuat', 'Sukses');
        return redirect('/ahp/'.$id.'/lihat');
    }

    public function bagiKriteriaHr($id){
        $kriteria = DB::table('matriks_kriteria_hr')
            ->where('kriteria_kuesioner_id', $id)
            ->first();
        $hr1 = json_decode($kriteria->kriteria_hr1);
        $hr2 = json_decode($kriteria->kriteria_hr2);
        $hr3 = json_decode($kriteria->kriteria_hr3);
        $hr4 = json_decode($kriteria->kriteria_hr4);

        $jumlahHR1 = $hr1->HR1 +$hr2->HR1 +$hr3->HR1 +$hr4->HR1;
        $jumlahHR2 = $hr1->HR2 +$hr2->HR2 +$hr3->HR2 +$hr4->HR2;
        $jumlahHR3 = $hr1->HR3 +$hr2->HR3 +$hr3->HR3 +$hr4->HR3;
        $jumlahHR4 = $hr1->HR4 +$hr2->HR4 +$hr3->HR4 +$hr4->HR4;

        //kolom HR
        $k_hr1['HR1'] = round($hr1->HR1 / round($jumlahHR1,3),4);
        $k_hr1['HR2'] = round($hr2->HR1 / round($jumlahHR1,3),4);
        $k_hr1['HR3'] = round($hr3->HR1 / round($jumlahHR1,3),4);
        $k_hr1['HR4'] = round($hr4->HR1 / round($jumlahHR1,3),4);
        //kolom HR
        $k_hr2['HR1'] = round($hr1->HR2 / round($jumlahHR2,3),4);
        $k_hr2['HR2'] = round($hr2->HR2 / round($jumlahHR2,3),4);
        $k_hr2['HR3'] = round($hr3->HR2 / round($jumlahHR2,3),4);
        $k_hr2['HR4'] = round($hr4->HR2 / round($jumlahHR2,3),4);
        //kolom HR
        $k_hr3['HR1'] = round($hr1->HR3 / round($jumlahHR3,3),4);
        $k_hr3['HR2'] = round($hr2->HR3 / round($jumlahHR3,3),4);
        $k_hr3['HR3'] = round($hr3->HR3 / round($jumlahHR3,3),4);
        $k_hr3['HR4'] = round($hr4->HR3 / round($jumlahHR3,3),4);
        //kolom HR
        $k_hr4['HR1'] = round($hr1->HR4 / round($jumlahHR4,3),4);
        $k_hr4['HR2'] = round($hr2->HR4 / round($jumlahHR4,3),4);
        $k_hr4['HR3'] = round($hr3->HR4 / round($jumlahHR4,3),4);
        $k_hr4['HR4'] = round($hr4->HR4 / round($jumlahHR4,3),4);

//        var_dump($k_hr);
//        var_dump($k_cs);
//        var_dump($k_eh);
//        var_dump($k_sr);
//        var_dump($k_qk);
        $data = [
            'pembagian_kuesioner_id' => $id,
            'pembagian_hr1' => json_encode($k_hr1),
            'pembagian_hr2' => json_encode($k_hr2),
            'pembagian_hr3' => json_encode($k_hr3),
            'pembagian_hr4' => json_encode($k_hr4),
        ];

        var_dump($data);

        DB::table('pembagian_kriteria_hr')->insert($data);
        alert()->success(' ', 'Sukses');
        return redirect('/ahp/'.$id.'/lihat');
    }

    public function kaliKriteriaHr($id){
        $bagi = DB::table('pembagian_kriteria_hr')
            ->where('pembagian_kuesioner_id', $id)
            ->first();
        $hr1 = json_decode($bagi->pembagian_hr1);
        $hr2 = json_decode($bagi->pembagian_hr2);
        $hr3 = json_decode($bagi->pembagian_hr3);
        $hr4 = json_decode($bagi->pembagian_hr4);

        $kriteria = DB::table('matriks_kriteria_hr')
            ->where('kriteria_kuesioner_id', $id)
            ->first();
        $hr1_k = json_decode($kriteria->kriteria_hr1);
        $hr2_k = json_decode($kriteria->kriteria_hr2);
        $hr3_k = json_decode($kriteria->kriteria_hr3);
        $hr4_k = json_decode($kriteria->kriteria_hr4);


        $jumlahHR1 = $hr1->HR1 +$hr2->HR1 +$hr3->HR1 +$hr4->HR1 ;
        $jumlahHR2 = $hr1->HR2 +$hr2->HR2 +$hr3->HR2 +$hr4->HR2 ;
        $jumlahHR3 = $hr1->HR3 +$hr2->HR3 +$hr3->HR3 +$hr4->HR3 ;
        $jumlahHR4 = $hr1->HR4 +$hr2->HR4 +$hr3->HR4 +$hr4->HR4 ;

        $rataHR1 = round($jumlahHR1/4,4);
        $rataHR2 = round($jumlahHR2/4,4);
        $rataHR3 = round($jumlahHR3/4,4);
        $rataHR4 = round($jumlahHR4/4,4);

        //kolom HR
        $k_hr1['HR1'] = round($hr1_k->HR1 * $rataHR1,4);
        $k_hr1['HR2'] = round($hr2_k->HR1 * $rataHR1,4);
        $k_hr1['HR3'] = round($hr3_k->HR1 * $rataHR1,4);
        $k_hr1['HR4'] = round($hr4_k->HR1 * $rataHR1,4);
        //kolom HR
        $k_hr2['HR1'] = round($hr1_k->HR2 * $rataHR2,4);
        $k_hr2['HR2'] = round($hr2_k->HR2 * $rataHR2,4);
        $k_hr2['HR3'] = round($hr3_k->HR2 * $rataHR2,4);
        $k_hr2['HR4'] = round($hr4_k->HR2 * $rataHR2,4);
        //kolom HR
        $k_hr3['HR1'] = round($hr1_k->HR3 * $rataHR3,4);
        $k_hr3['HR2'] = round($hr2_k->HR3 * $rataHR3,4);
        $k_hr3['HR3'] = round($hr3_k->HR3 * $rataHR3,4);
        $k_hr3['HR4'] = round($hr4_k->HR3 * $rataHR3,4);
        //kolom HR
        $k_hr4['HR1'] = round($hr1_k->HR4 * $rataHR4,4);
        $k_hr4['HR2'] = round($hr2_k->HR4 * $rataHR4,4);
        $k_hr4['HR3'] = round($hr3_k->HR4 * $rataHR4,4);
        $k_hr4['HR4'] = round($hr4_k->HR4 * $rataHR4,4);


//        var_dump($k_hr);
//        var_dump($k_cs);
//        var_dump($k_eh);
//        var_dump($k_sr);
//        var_dump($k_qk);

        $data = [
            'perkalian_kuesioner_id' => $id,
            'perkalian_hr1' => json_encode($k_hr1),
            'perkalian_hr2' => json_encode($k_hr2),
            'perkalian_hr3' => json_encode($k_hr3),
            'perkalian_hr4' => json_encode($k_hr4),
        ];

        var_dump($data);

        DB::table('perkalian_kriteria_hr')->insert($data);
        alert()->success(' ', 'Sukses');
        return redirect('/ahp/'.$id.'/lihat');
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
