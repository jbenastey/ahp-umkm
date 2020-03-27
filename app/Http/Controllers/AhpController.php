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
            $matriks['HR']['CS'] = abs($skala['ks1']);
            $matriks['CS']['HR'] = abs(1 / $skala['ks1']);
        } else {
            $matriks['HR']['CS'] = abs(1 / $skala['ks1']);
            $matriks['CS']['HR'] = abs($skala['ks1']);
        }

        if ($skala['ks2'] > 0) {
            $matriks['HR']['EH'] = abs($skala['ks2']);
            $matriks['EH']['HR'] = abs(1 / $skala['ks2']);
        } else {
            $matriks['HR']['EH'] = abs(1 / $skala['ks2']);
            $matriks['EH']['HR'] = abs($skala['ks2']);
        }

        if ($skala['ks3'] > 0) {
            $matriks['HR']['SR'] = abs($skala['ks3']);
            $matriks['SR']['HR'] = abs(1 / $skala['ks3']);
        } else {
            $matriks['HR']['SR'] = abs(1 / $skala['ks3']);
            $matriks['SR']['HR'] = abs($skala['ks3']);
        }

        if ($skala['ks4'] > 0) {
            $matriks['HR']['QK'] = abs($skala['ks4']);
            $matriks['QK']['HR'] = abs(1 / $skala['ks4']);
        } else {
            $matriks['HR']['QK'] = abs(1 / $skala['ks4']);
            $matriks['QK']['HR'] = abs($skala['ks4']);
        }

        if ($skala['ks5'] > 0) {
            $matriks['CS']['EH'] = abs($skala['ks5']);
            $matriks['EH']['CS'] = abs(1 / $skala['ks5']);
        } else {
            $matriks['CS']['EH'] = abs(1 / $skala['ks5']);
            $matriks['EH']['CS'] = abs($skala['ks5']);
        }

        if ($skala['ks6'] > 0) {
            $matriks['CS']['SR'] = abs($skala['ks6']);
            $matriks['SR']['CS'] = abs(1 / $skala['ks6']);
        } else {
            $matriks['CS']['SR'] = abs(1 / $skala['ks6']);
            $matriks['SR']['CS'] = abs($skala['ks6']);
        }

        if ($skala['ks7'] > 0) {
            $matriks['CS']['QK'] = abs($skala['ks7']);
            $matriks['QK']['CS'] = abs(1 / $skala['ks7']);
        } else {
            $matriks['CS']['QK'] = abs(1 / $skala['ks7']);
            $matriks['QK']['CS'] = abs($skala['ks7']);
        }

        if ($skala['ks8'] > 0) {
            $matriks['EH']['SR'] = abs($skala['ks8']);
            $matriks['SR']['EH'] = abs(1 / $skala['ks8']);
        } else {
            $matriks['EH']['SR'] = abs(1 / $skala['ks8']);
            $matriks['SR']['EH'] = abs($skala['ks8']);
        }

        if ($skala['ks9'] > 0) {
            $matriks['EH']['QK'] = abs($skala['ks9']);
            $matriks['QK']['EH'] = abs(1 / $skala['ks9']);
        } else {
            $matriks['EH']['QK'] = abs(1 / $skala['ks9']);
            $matriks['QK']['EH'] = abs($skala['ks9']);
        }

        if ($skala['ks10'] > 0) {
            $matriks['SR']['QK'] = abs($skala['ks10']);
            $matriks['QK']['SR'] = abs(1 / $skala['ks10']);
        } else {
            $matriks['SR']['QK'] = abs(1 / $skala['ks10']);
            $matriks['QK']['SR'] = abs($skala['ks10']);
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
