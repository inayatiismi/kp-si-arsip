<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_requests = Requests::where('status', 'proses')->orderBy('created_at', 'DESC')->get();

        return view('pages.masterrequest.request', compact('data_requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.masterrequest.tambahrequest');
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
        $request = new Requests;
        $request->nomorberkas = $request['nomorberkas'];
        $request->jenissurat = $request['jenissurat'];
        $request->alamatsurat = $request['alamatsurat'];
        $request->tanggalsurat = $request['tanggalsurat'];
        $request->perihal = $request['perihal'];
        $request->nomorpetunjuk = $request['nomorpetunjuk'];
        $request->status = $request['status'];
        $request->keterangan = $request['keterangan'];
        $request->save();

        return redirect('requests');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Requests $request)
    {
        return view('pages.masterrequest.show', compact('request'));
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
    public function update(Request $request, Requests $data)
    {
        $action = $request->action;
        if ($data->jenissurat == 'masuk') {
            $surat = Suratmasuk::find($data->id_suratmasuk);
        }

        switch ($action) {
            case 'accept':
                $data->status = 'sukses';
                $data->keterangan = $request->keterangan;
                $data->save();

                $surat->status = 'sukses';
                $surat->save();

                return redirect()
                    ->back()
                    ->withSuccess('Berhasil menerima surat');
                break;
            case 'decline':
                $data->status = 'gagal';
                $data->keterangan = $request->keterangan;
                $data->save();

                $surat->status = 'gagal';
                $surat->save();

                return redirect()
                    ->back()
                    ->withSuccess('Surat ditolak');
                break;
        }
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
