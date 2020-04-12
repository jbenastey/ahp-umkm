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
        $data['kriteria'] = DB::table('master_kriteria')->get();
        $data['pernyataan'] = DB::table('master_pernyataan')->get();

        $kriteria = [];
        $pernyataan = [];
        foreach ($data['kriteria'] as $value){
            array_push($kriteria, $value->kriteria_nama);
//            foreach ($data['pernyataan'] as $value2){
//                if ($value2->pernyataan_kriteria_id == $value->kriteria_id){
                    $pernyataan[$value->kriteria_id] = array();
//                }
//            }
        }
        foreach ($data['kriteria'] as $value){
            foreach ($data['pernyataan'] as $value2){
                if ($value2->pernyataan_kriteria_id == $value->kriteria_id){
                    array_push($pernyataan[$value->kriteria_id], $value2->pernyataan_item);
                }
            }
        }
        $kombinasi = combinations(2,$kriteria);
        $data['kombinasi'] = $kombinasi;
        $data['k_pernyataan'] = $pernyataan;

        return view('kuesioner.kuesioner',$data);
    }

    public function simpanKuesioner(Request $request)
    {
        //
        $nama = $request->kuesioner_nama;
        $umur = $request->kuesioner_umur;
        $jurusan = $request->kuesioner_jurusan;
        $jabatan = $request->kuesioner_jabatan;

        $data['kriteria'] = DB::table('master_kriteria')->get();
        $data['pernyataan'] = DB::table('master_pernyataan')->get();

        $kriteria = [];
        $pernyataan = [];

        foreach ($data['kriteria'] as $value){
            array_push($kriteria, $value->kriteria_nama);
//            foreach ($data['pernyataan'] as $value2){
//                if ($value2->pernyataan_kriteria_id == $value->kriteria_id){
            $pernyataan[$value->kriteria_id] = array();
//                }
//            }
        }
        foreach ($data['kriteria'] as $value){
            foreach ($data['pernyataan'] as $value2){
                if ($value2->pernyataan_kriteria_id == $value->kriteria_id){
                    array_push($pernyataan[$value->kriteria_id], $value2->pernyataan_item);
                }
            }
        }
        $kombinasi = combinations(2,$kriteria);


        echo '<pre>';
        $pertama = [];
        foreach ($pernyataan as $value2) {
            foreach ($value2 as $value3) {
            $pertama[$value3] = $request->$value3;
            }
        }

        $kedua = [];
        foreach ($kombinasi as $key => $value) {
            $name = 'ks_'.($key+1);
            $kedua['ks']['ks_'.($key+1)] = $request->$name;
        }

        foreach ($data['kriteria'] as $value){
            if ($pernyataan[$value->kriteria_id] != null){
                $kombinasi_p = combinations(2,$pernyataan[$value->kriteria_id]);
                if(count($kombinasi_p) > 0){
                    $nama = strtolower(rtrim($kombinasi_p[0][0],1));
                    for($i = 1; $i <= count($kombinasi_p) ; $i++) {
                        $name = $nama.'_'.$i;
                       $kedua[$nama][$nama.'_'.$i] = $request->$name;
                    }
                }
            }
        }

//        var_dump(json_encode($pertama));
//        var_dump(($kedua));
        $simpan = [
            'kuesioner_nama' => $nama,
            'kuesioner_umur' => $umur,
            'kuesioner_jurusan' => $jurusan,
            'kuesioner_jabatan' => $jabatan,
            'kuesioner_pertama' => json_encode($pertama),
            'kuesioner_kedua' => json_encode($kedua),
        ];
//        var_dump($simpan);

        DB::table('kuesioner')->insert($simpan);
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

        $data['kriteria'] = DB::table('master_kriteria')->get();
        $data['pernyataan'] = DB::table('master_pernyataan')->get();

        $kriteria = [];
        $pernyataan = [];
        foreach ($data['kriteria'] as $value){
            array_push($kriteria, $value->kriteria_nama);
//            foreach ($data['pernyataan'] as $value2){
//                if ($value2->pernyataan_kriteria_id == $value->kriteria_id){
            $pernyataan[$value->kriteria_id] = array();
//                }
//            }
        }
        foreach ($data['kriteria'] as $value){
            foreach ($data['pernyataan'] as $value2){
                if ($value2->pernyataan_kriteria_id == $value->kriteria_id){
                    array_push($pernyataan[$value->kriteria_id], $value2->pernyataan_item);
                }
            }
        }
        $kombinasi = combinations(2,$kriteria);
        $data['kombinasi'] = $kombinasi;
        $data['k_pernyataan'] = $pernyataan;

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
