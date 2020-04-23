<?php

namespace App\Http\Controllers;

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
            'tif' => [],
            'te' => null,
            'tin' => null,
            'sif' => null,
            'mt' => null,
        ];
        foreach ($hasil as $key => $value) {
            foreach ($this->jurusan as $key2 => $value2) {
                if ($value->kuesioner_jurusan == $key2) {
                    array_push($this->jurusan[$key2], json_decode($value->hasil_rata, true));
                }
            }
        }
        foreach ($this->jurusan as $key2 => $value2) {
            if ($value2 != null){
                $i = 0;
                $total['HR'] = 0;
                $total['CS'] = 0;
                $total['EH'] = 0;
                $total['SR'] = 0;
                $total['QK'] = 0;
                foreach ($value2 as $key3 => $value3) {
                    $i++;
                    $this->jurusan[$key2] = [
                        'HR' => ($total['HR']+=$value3['HR']) / $i,
                        'CS' => ($total['CS']+=$value3['CS']) / $i,
                        'EH' => ($total['EH']+=$value3['EH']) / $i,
                        'SR' => ($total['SR']+=$value3['SR']) / $i,
                        'QK' => ($total['QK']+=$value3['QK']) / $i,
                    ];
                }
            } else {
                $this->jurusan[$key2] = [
                    'HR' => 0,
                    'CS' => 0,
                    'EH' => 0,
                    'SR' => 0,
                    'QK' => 0,
                ];
            }
        }
        echo json_encode($this->jurusan);
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
