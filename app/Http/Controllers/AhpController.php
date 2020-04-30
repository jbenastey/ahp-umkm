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
        if ($jenis == 'ks'){
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

        } else {
            $jns = strtoupper($jenis);
//            var_dump($jns);
            foreach ($data['pernyataan'] as $value2){
                if (strpos($value2->pernyataan_item,$jns) !== false){
                    array_push($pernyataan, $value2->pernyataan_item);
                }
            }

            $namaKri = $pernyataan;


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
                $matriks[$kom[$i][1]][$kom[$i][0]] = round(abs($skala[$jenis.'_'.($i+1)]),4);
                $matriks[$kom[$i][0]][$kom[$i][1]] = round(abs(1 / $skala[$jenis.'_'.($i+1)]),4);
            } else {
                $matriks[$kom[$i][1]][$kom[$i][0]] = round(abs(1 / $skala[$jenis.'_'.($i+1)]),4);
                $matriks[$kom[$i][0]][$kom[$i][1]] = round(abs($skala[$jenis.'_'.($i+1)]),4);
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
//        var_dump($matriks);
//        var_dump($bagi);
//        var_dump($jumlahBaris);
//        var_dump($rata);
//        var_dump($kali);
//        var_dump($jumlahBarisKali);
//        var_dump($hasil);
//        var_dump(($save));

        DB::table('hitung')->insert($save);
        alert()->success('Perhitungan Selesai', 'Sukses');
        return redirect('/ahp/'.$id.'/lihat');
    }

    public function kinerja($id){
//        var_dump($id);
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
        $data['namaKriteria'] = [];
        foreach ($kriteria as $value){
            if ($pernyataan[$value->kriteria_id] != null){
                $kombinasi_p = combinations(2,$pernyataan[$value->kriteria_id]);
                if(count($kombinasi_p) > 0){
//                    var_dump($value->kriteria_nama);
//                    var_dump((rtrim($kombinasi_p[0][0],1)));
                    array_push($data['namaKri'], ((rtrim($kombinasi_p[0][0],1))));
                    $data['namaKriteria'][rtrim($kombinasi_p[0][0],1)] = $value->kriteria_nama;
                }
            }
        }

        $kuesioner = DB::table('kuesioner')
            ->where('kuesioner_id', $id)
            ->first();
        $pertama = json_decode($kuesioner->kuesioner_pertama,true);
//        var_dump($kombinasi_p);
//        var_dump($data['namaKri']);

        $hitung = DB::table('hitung')
            ->where('hitung_kuesioner_id', $id)
            ->get();

        $rata = [];

        foreach ($hitung as $key => $value){
             $rata[strtoupper($value->hitung_jenis)] = json_decode($value->hitung_rata_bagi,true);
        }
//        var_dump($rata);

        $pm = [];
        $total = [];
        $rataRata = [];
        foreach ($data['namaKri'] as $value){
            foreach ($pertama as $key2 => $value2){
                if (strpos($key2, $value) !== false){
                    $pm[$value][$key2] = pertama($value2) * $rata[$value][$key2];
                    $total[$value] = 0;
                    $rataRata[$value] = 0;
                }
            }
        }
        foreach ($data['namaKri'] as $value){
            foreach ($pertama as $key2 => $value2){
                if (strpos($key2, $value) !== false){
//                    var_dump($pm[$value]);
                    $total[$value] += $pm[$value][$key2];
                    $rataRata[$value] = $total[$value] * $rata['KS'][$value];
                }
            }
        }

        $totalSeluruh = 0;
        $max = max($rataRata);
        foreach ($rataRata as $value){
            $totalSeluruh += $value;
        }

//        foreach ($pm as $key=>$value){
//
//        }

        $opor = [
            'kriteria' => $data['namaKri'],
            'pm' => $pm,
            'total' => $total,
            'rataRata' => $rataRata,
            'totalSeluruh' => $totalSeluruh,
            'max' => $max,
            'namaKriteria' => $data['namaKriteria'],
        ];

        $cek = DB::table('hasil')
            ->join('kuesioner','kuesioner_id','=','hasil_kuesioner_id')
            ->where('hasil_kuesioner_id', '=',$id)
            ->first();

        if ($cek == null){
            DB::table('hasil')->insert([
                'hasil_kuesioner_id' => $id,
                'hasil_rata' => json_encode($rataRata)
            ]);
        }

        return view('ahp.kinerja',$opor);

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
