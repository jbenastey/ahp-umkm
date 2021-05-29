<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['kriteria'] = DB::table('master_kriteria')->get();
        return view('master.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'kriteria_nama' => $request->kriteria_nama
        ];

        DB::table('master_kriteria')->insert($data);
        alert()->success('Berhasil Menyimpan Data','Sukses');
        return redirect('master');
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
        $data['kriteria'] = DB::table('master_kriteria')
            ->where('kriteria_id',$id)
            ->first();
        $data['pernyataan'] = DB::table('master_pernyataan')
            ->where('pernyataan_kriteria_id',$id)
            ->get();
        return view('master.show',$data);
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

    public function createPernyataan($id){
        $data['id'] = $id;
        return view('master.pernyataan.create',$data);
    }

    public function storePernyataan(Request $request){
        $data = [
            'pernyataan_kriteria_id' => $request->id,
            'pernyataan_item' => $request->item,
            'pernyataan_isi' => $request->pernyataan,
        ];

        DB::table('master_pernyataan')->insert($data);
        alert()->success('Berhasil Menyimpan Data','Sukses');
        return redirect('master/'.$request->id);
    }

    public function editPernyataan($id){
        $data['pernyataan'] = DB::table('master_pernyataan')
            ->where('pernyataan_id',$id)
            ->first();
        return view('master.pernyataan.update',$data);
    }

    public function updatePernyataan(Request $request){

        $data = [
            'pernyataan_item' => $request->item,
            'pernyataan_isi' => $request->pernyataan,
        ];

        DB::table('master_pernyataan')
            ->where('pernyataan_id',$request->id)
            ->update($data);
        alert()->success('Berhasil Memperbaharui Data','Sukses');
        return redirect('master/'.$request->id_kriteria);
    }

    public function destroyPernyataan($id,$idKriteria){
        DB::table('master_pernyataan')
            ->where('pernyataan_id',$id)
            ->delete();
        alert()->success('Berhasil Menghapus Data','Sukses');
        return redirect('master/'.$idKriteria);
    }

    public function indexUmkm(){
        $data['umkm'] = DB::table('master_umkm')->get();
        return view('master.umkm.index',$data);
    }

    public function createUmkm(){
        return view('master.umkm.create');
    }

    public function storeUmkm(Request $request){
        $data = [
            'umkm_kode' => $request->input('umkm_kode'),
            'umkm_nama' => $request->input('umkm_nama'),
        ];

        DB::table('master_umkm')->insert($data);
        alert()->success('Berhasil Menyimpan Data','Sukses');
        return redirect('umkm');
    }
}
