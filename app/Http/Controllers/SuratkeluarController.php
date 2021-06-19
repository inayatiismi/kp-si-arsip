<?php

namespace App\Http\Controllers;

use App\Models\Suratkeluar;
use Illuminate\Http\Request;

class SuratkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_suratkeluar = Suratkeluar::all();
        return view('pages.masterkeluar.suratkeluar', ['data_suratkeluar'=> $data_suratkeluar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.masterkeluar.tambahsuratkeluar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $keluar = new Suratkeluar;
        $keluar->nomorberkas = $request['nomorberkas'];
        $keluar->alamatpenerima = $request['alamatpenerima'];
        $keluar->tanggalkeluar = $request['tanggalkeluar'];
        $keluar->perihal = $request['perihal'];
        $keluar->nomorpetunjuk = $request['nomorpetunjuk'];
        $masuk->status = $request['status'];
        $keluar->save();

        return redirect('suratkeluar');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keluar = Suratkeluar::find($id);
        return view('pages.masterkeluar.editsuratkeluar')->with('keluar',$keluar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_suratkeluar)
    {
        $ubah = Suratkeluar::findorfail($id_suratkeluar);

        $data = [
            'nomorberkas' => $request['nomorberkas'],
            'alamatpenerima' => $request['alamatpenerima'],
            'tanggalkeluar' => $request['tanggalkeluar'],
            'perihal' => $request['perihal'],
            'nomorpetunjuk' => $request['nomorpetunjuk']
        ];
        $ubah->update($data);
        return redirect ('suratkeluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Suratkeluar $keluar)
    {
        $keluar->delete();
        return redirect('suratkeluar');
    }
}