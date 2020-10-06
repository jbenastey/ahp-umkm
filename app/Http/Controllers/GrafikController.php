<?php

namespace App\Http\Controllers;

use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function jurusan()
    {
        $hasil = DB::table('hasil')
            ->join('kuesioner', 'kuesioner_id', '=', 'hasil_kuesioner_id')
            ->get();
        $this->jurusan = [
            'mpg' => [],
            'ivo' => [],
            'ts' => [],
            'dt' => [],
            'it' => [],
        ];
        foreach ($hasil as $key => $value) {
            foreach ($this->jurusan as $key2 => $value2) {
                if ($value->kuesioner_umkm == $key2) {
                    array_push($this->jurusan[$key2], json_decode($value->hasil_rata, true));
                }
            }
        }
        foreach ($this->jurusan as $key2 => $value2) {
            if ($value2 != null) {
                $i = 0;
                $total['SB'] = 0;
                $total['IPK'] = 0;
                $total['PPK'] = 0;
                foreach ($value2 as $key3 => $value3) {
                    $i++;
                    $this->jurusan[$key2] = [
                        'SB' => ($total['SB'] += $value3['SB']) / $i,
                        'IPK' => ($total['IPK'] += $value3['IPK']) / $i,
                        'PPK' => ($total['PPK'] += $value3['PPK']) / $i,
                    ];
                }
            } else {
                $this->jurusan[$key2] = [
                    'SB' => 0,
                    'IPK' => 0,
                    'PPK' => 0,
                ];
            }
        }
        echo json_encode($this->jurusan);
    }

    public function individu($jurusan)
    {
        $hasil = DB::table('hasil')
            ->join('kuesioner', 'kuesioner_id', '=', 'hasil_kuesioner_id')
            ->where('kuesioner_umkm', $jurusan)
            ->get();
        $individu = [];
        if (count($hasil) > 0) {
            foreach ($hasil as $item) {
                array_push($individu, [
                    'nama' => $item->kuesioner_nama,
                    'hasil' => json_decode($item->hasil_rata)
                ]);
            }
        } else {
            array_push($individu, [
                'nama' => 'Belum ada data',
                'hasil' => [
                    'SB' => 0,
                    'IPK' => 0,
                    'PPK' => 0,
                ]
            ]);
        }
        echo json_encode($individu);
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
