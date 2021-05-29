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
        $data['kuesioner'] = DB::table('kuesioner')
            ->join('master_umkm','umkm_kode','=','kuesioner_umkm')
            ->get();
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
        $data['umkm'] = DB::table('master_umkm')->get();

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

    public function kuesionerKaryawan()
    {
        //
        $data['kriteria'] = DB::table('master_kriteria')->get();
        $data['pernyataan'] = DB::table('master_pernyataan')->get();
        $data['umkm'] = DB::table('master_umkm')->get();

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

        return view('kuesioner.kuesioner-karyawan',$data);
    }

    public function kuesionerPakar()
    {
        //
        $data['kriteria'] = DB::table('master_kriteria')->get();
        $data['pernyataan'] = DB::table('master_pernyataan')->get();
        $data['umkm'] = DB::table('master_umkm')->get();

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

        return view('kuesioner.kuesioner-pakar',$data);
    }

    public function simpanKuesioner(Request $request)
    {
        //
        $namaK = $request->kuesioner_nama;
        $umur = $request->kuesioner_umur;
        $umkm = $request->kuesioner_umkm;
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

        $pemilik = DB::table('kuesioner')
            ->where('kuesioner_umkm','=',$umkm)
            ->where('kuesioner_jabatan','=','Pemilik')
            ->first();

        if ($pemilik == null){
            $simpan = [
                'kuesioner_nama' => $namaK,
                'kuesioner_umur' => $umur,
                'kuesioner_umkm' => $umkm,
                'kuesioner_jabatan' => $jabatan,
                'kuesioner_pertama' => json_encode($pertama),
                'kuesioner_kedua' => json_encode($kedua),
            ];
//        var_dump($simpan);

            DB::table('kuesioner')->insert($simpan);
            alert()->success('Terima kasih telah mengisi kuesioner','Sukses');
        } else {
            alert()->warning('Kuesioner pemilik UMKM ini sudah diisi','Perhatian');
        }

        return redirect('/');
    }

    public function simpanKuesionerPakar(Request $request)
    {
        //
        $namaK = $request->kuesioner_nama;
        $umur = $request->kuesioner_umur;
        $umkm = $request->kuesioner_umkm;
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
            'kuesioner_nama' => $namaK,
            'kuesioner_umur' => $umur,
            'kuesioner_umkm' => $umkm,
            'kuesioner_jabatan' => $jabatan,
            'kuesioner_pertama' => json_encode($pertama),
            'kuesioner_kedua' => json_encode($kedua),
        ];
//        var_dump($simpan);

        DB::table('kuesioner')->insert($simpan);
        alert()->success('Terima kasih telah mengisi kuesioner','Sukses');

        return redirect('/');
    }

    public function simpanKuesionerKaryawan(Request $request)
    {
        //
        $namaK = $request->kuesioner_nama;
        $umur = $request->kuesioner_umur;
        $umkm = $request->kuesioner_umkm;
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


        $pertama = [];
        foreach ($pernyataan as $value2) {
            foreach ($value2 as $value3) {
            $pertama[$value3] = $request->$value3;
            }
        }
        $pemilik = DB::table('kuesioner')
            ->where('kuesioner_umkm','=',$umkm)
            ->where('kuesioner_jabatan','=','Pemilik')
            ->first();

//        $kedua = [];
//        foreach ($kombinasi as $key => $value) {
//            $name = 'ks_'.($key+1);
//            $kedua['ks']['ks_'.($key+1)] = $request->$name;
//        }
//
//        foreach ($data['kriteria'] as $value){
//            if ($pernyataan[$value->kriteria_id] != null){
//                $kombinasi_p = combinations(2,$pernyataan[$value->kriteria_id]);
//                if(count($kombinasi_p) > 0){
//                    $nama = strtolower(rtrim($kombinasi_p[0][0],1));
//                    for($i = 1; $i <= count($kombinasi_p) ; $i++) {
//                        $name = $nama.'_'.$i;
//                       $kedua[$nama][$nama.'_'.$i] = $request->$name;
//                    }
//                }
//            }
//        }

//        var_dump(json_encode($pertama));
//        var_dump(($kedua));

        if ($pemilik != null){
            $simpan = [
                'kuesioner_nama' => $namaK,
                'kuesioner_umur' => $umur,
                'kuesioner_umkm' => $umkm,
                'kuesioner_jabatan' => $jabatan,
                'kuesioner_pertama' => json_encode($pertama),
                'kuesioner_kedua' => $pemilik->kuesioner_kedua,
            ];
//        var_dump($simpan);

            DB::table('kuesioner')->insert($simpan);
            alert()->success('Terima kasih telah mengisi kuesioner','Sukses');
        } else {
            alert()->warning('Pemilik UMKM belum ada','Perhatian');
        }

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
            ->join('master_umkm','umkm_kode','=','kuesioner_umkm')
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

        return view('ahp.ubah-kriteria',$data);
    }

    public function updateKriteria(Request $request,$id){

        $data['kriteria'] = DB::table('master_kriteria')->get();
        $data['pernyataan'] = DB::table('master_pernyataan')->get();

        $kriteria = [];
        $pernyataan = [];

        foreach ($data['kriteria'] as $value){
            array_push($kriteria, $value->kriteria_nama);
            $pernyataan[$value->kriteria_id] = array();
        }
        foreach ($data['kriteria'] as $value){
            foreach ($data['pernyataan'] as $value2){
                if ($value2->pernyataan_kriteria_id == $value->kriteria_id){
                    array_push($pernyataan[$value->kriteria_id], $value2->pernyataan_item);
                }
            }
        }
        $kombinasi = combinations(2,$kriteria);

        $ks = [];
        foreach ($kombinasi as $key=>$value){
            $nama = 'ks_'.($key+1);
            $ks['ks_'.($key+1)] = $request->$nama;
        }

        $kedua = DB::table('kuesioner')
            ->where('kuesioner_id',$id)
            ->first();
        $kedua = json_decode($kedua->kuesioner_kedua,true);

        $kedua['ks'] = $ks;

        $data = [
            'kuesioner_kedua' => json_encode($kedua),
        ];

        DB::table('kuesioner')->where('kuesioner_id',$id)->update($data);
//
        DB::table('hitung')
            ->where('hitung_kuesioner_id',$id)
            ->where('hitung_jenis','ks')
            ->delete();
//
        alert()->success('Terima kasih telah mengupdate kuesioner, silahkan menghitung ulang','Sukses');
        return redirect('/ahp/'.$id.'/lihat');
    }

    public function ubahSubkriteria($id,$jenis){

        $data['kuesioner'] = DB::table('kuesioner')
            ->where('kuesioner_id',$id)
            ->first();

        $data['jenis'] = $jenis;

        $jenis = strtoupper($jenis);
//        var_dump($jenis);
        $data['kriteria'] = DB::table('master_kriteria')->get();
        $data['pernyataan'] = DB::table('master_pernyataan')
            ->where('pernyataan_item','like','%'.$jenis.'%')
            ->get();

        $pernyataan = [];

        foreach ($data['pernyataan'] as $value2){
            array_push($pernyataan, $value2->pernyataan_item);
        }

        $kombinasi = combinations(2,$pernyataan);
        $data['kombinasi'] = $kombinasi;

        return view('ahp.ubah-subkriteria',$data);
    }

    public function updateSubkriteria(Request $request,$id,$jenis){

        $data['kriteria'] = DB::table('master_kriteria')->get();
        $data['pernyataan'] = DB::table('master_pernyataan')
            ->where('pernyataan_item','like','%'.$jenis.'%')
            ->get();

        $pernyataan = [];

        foreach ($data['pernyataan'] as $value2){
            array_push($pernyataan, $value2->pernyataan_item);
        }
        $kombinasi = combinations(2,$pernyataan);

        $ks = [];
        foreach ($kombinasi as $key=>$value){
            $nama = $jenis.'_'.($key+1);
            $ks[$jenis.'_'.($key+1)] = $request->$nama;
        }

        $kedua = DB::table('kuesioner')
            ->where('kuesioner_id',$id)
            ->first();
        $kedua = json_decode($kedua->kuesioner_kedua,true);

        $kedua[$jenis] = $ks;

        $data = [
            'kuesioner_kedua' => json_encode($kedua),
        ];


        DB::table('kuesioner')->where('kuesioner_id',$id)->update($data);
//
        DB::table('hitung')
            ->where('hitung_kuesioner_id',$id)
            ->where('hitung_jenis',$jenis)
            ->delete();
//
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
