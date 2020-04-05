<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KuesionerController extends Controller
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
        return view('kuesioner.index',$data);
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

    public function kuesioner()
    {
        //
        return view('kuesioner.kuesioner');
    }

    public function simpanKuesioner(Request $request)
    {
        //
        $nama = $request->kuesioner_nama;
        $umur = $request->kuesioner_umur;
        $jurusan = $request->kuesioner_jurusan;
        $jabatan = $request->kuesioner_jabatan;
        $hr = [
            'hr1' => $request->hr1,
            'hr2' => $request->hr2,
            'hr3' => $request->hr3,
            'hr4' => $request->hr4,
        ];
        $sr = [
            'sr1' => $request->sr1,
            'sr2' => $request->sr2,
            'sr3' => $request->sr3,
        ];
        $cs = [
            'cs1' => $request->cs1,
            'cs2' => $request->cs2,
            'cs3' => $request->cs3,
        ];
        $eh = [
            'eh1' => $request->eh1,
            'eh2' => $request->eh2,
            'eh3' => $request->eh3,
        ];
        $qk = [
            'qk1' => $request->qk1,
            'qk2' => $request->qk2,
            'qk3' => $request->qk3,
            'qk4' => $request->qk4,
            'qk5' => $request->qk5,
            'qk6' => $request->qk6,
        ];
        $ks = [
            'ks1' => $request->ks_1,
            'ks2' => $request->ks_2,
            'ks3' => $request->ks_3,
            'ks4' => $request->ks_4,
            'ks5' => $request->ks_5,
            'ks6' => $request->ks_6,
            'ks7' => $request->ks_7,
            'ks8' => $request->ks_8,
            'ks9' => $request->ks_9,
            'ks10' => $request->ks_10,
        ];
        $ks_hr = [
            'hr_1' => $request->hr_1,
            'hr_2' => $request->hr_2,
            'hr_3' => $request->hr_3,
            'hr_4' => $request->hr_4,
            'hr_5' => $request->hr_5,
            'hr_6' => $request->hr_6,
        ];
        $ks_sr = [
            'sr_1' => $request->sr_1,
            'sr_2' => $request->sr_2,
            'sr_3' => $request->sr_3,
        ];
        $ks_cs = [
            'cs_1' => $request->cs_1,
            'cs_2' => $request->cs_2,
            'cs_3' => $request->cs_3,
        ];
        $ks_eh = [
            'eh_1' => $request->eh_1,
            'eh_2' => $request->eh_2,
            'eh_3' => $request->eh_3,
        ];
        $ks_qk = [
            'qk_1' => $request->qk_1,
            'qk_2' => $request->qk_2,
            'qk_3' => $request->qk_3,
            'qk_4' => $request->qk_4,
            'qk_5' => $request->qk_5,
            'qk_6' => $request->qk_6,
            'qk_7' => $request->qk_7,
            'qk_8' => $request->qk_8,
            'qk_9' => $request->qk_9,
            'qk_10' => $request->qk_10,
            'qk_11' => $request->qk_11,
            'qk_12' => $request->qk_12,
            'qk_13' => $request->qk_13,
            'qk_14' => $request->qk_14,
            'qk_15' => $request->qk_15,
        ];

        $data = [
            'kuesioner_nama' => $nama,
            'kuesioner_umur' => $umur,
            'kuesioner_jurusan' => $jurusan,
            'kuesioner_jabatan' => $jabatan,
            'kuesioner_hr' => json_encode($hr),
            'kuesioner_sr' => json_encode($sr),
            'kuesioner_cs' => json_encode($cs),
            'kuesioner_eh' => json_encode($eh),
            'kuesioner_qk' => json_encode($qk),
            'kuesioner_ks' => json_encode($ks),
            'kuesioner_ks_hr' => json_encode($ks_hr),
            'kuesioner_ks_sr' => json_encode($ks_sr),
            'kuesioner_ks_cs' => json_encode($ks_cs),
            'kuesioner_ks_eh' => json_encode($ks_eh),
            'kuesioner_ks_qk' => json_encode($ks_qk),
        ];

        DB::table('kuesioner')->insert($data);
        alert()->success('Terima kasih telah mengisi kuesioner','Sukses');
        return redirect('/');
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
        return view('kuesioner.lihat',$data);
    }


    public function ubahKriteria($id){
        $data['kuesioner'] = DB::table('kuesioner')
            ->where('kuesioner_id', $id)
            ->first();
        return view('ahp.ubah-kriteria',$data);
    }

    public function updateKriteria(Request $request,$id){
        $ks = [
            'ks1' => $request->ks_1,
            'ks2' => $request->ks_2,
            'ks3' => $request->ks_3,
            'ks4' => $request->ks_4,
            'ks5' => $request->ks_5,
            'ks6' => $request->ks_6,
            'ks7' => $request->ks_7,
            'ks8' => $request->ks_8,
            'ks9' => $request->ks_9,
            'ks10' => $request->ks_10,
        ];

        $data = [
            'kuesioner_ks' => json_encode($ks),
        ];
        DB::table('kuesioner')->where('kuesioner_id',$id)->update($data);
        DB::table('matriks_kriteria')->where('kriteria_kuesioner_id',$id)->delete();
        DB::table('pembagian_kriteria')->where('pembagian_kuesioner_id',$id)->delete();
        DB::table('perkalian_kriteria')->where('perkalian_kuesioner_id',$id)->delete();

        alert()->success('Terima kasih telah mengupdate kuesioner, silahkan menghitung ulang','Sukses');
        return redirect('/ahp/'.$id.'/lihat');
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
