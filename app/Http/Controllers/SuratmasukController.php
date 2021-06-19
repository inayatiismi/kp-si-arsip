<?php

namespace App\Http\Controllers;

use App\Models\Suratmasuk;
use App\Models\Requests;
use Illuminate\Http\Request;


class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_suratmasuk = Suratmasuk::orderBy('created_at', 'DESC')->get();

        return view('pages.mastermasuk.suratmasuk', ['data_suratmasuk' => $data_suratmasuk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.mastermasuk.tambahsuratmasuk');
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
        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx,jpg|max:5096'
        ]);

        $masuk = new Suratmasuk;
        $masuk->nomorberkas = $request['nomorberkas'];
        $masuk->alamatpengirim = $request['alamatpengirim'];
        $masuk->tanggalmasuk = $request['tanggalmasuk'];
        $masuk->perihal = $request['perihal'];
        $masuk->nomorpetunjuk = $request['nomorpetunjuk'];
        $masuk->status = 'proses';
        $masuk->save();

        $dataRequest = new Requests();
        $dataRequest->id_suratmasuk = $masuk->id_suratmasuk;
        $dataRequest->nomorberkas = $masuk->nomorberkas;
        $dataRequest->jenissurat = 'masuk';
        $dataRequest->alamatsurat = $masuk->alamatpengirim;
        $dataRequest->tanggalsurat = $masuk->tanggalmasuk;
        $dataRequest->perihal = $masuk->perihal;
        $dataRequest->nomorpetunjuk = $masuk->nomorpetunjuk;
        $dataRequest->status = $masuk->status;
        $dataRequest->save();

        if ($request->has('file') && $request->file('file')->isValid()) {
            $masuk->addMediaFromRequest('file')
                ->toMediaCollection('surat_masuk');
        }

        return redirect()
            ->to(route('suratmasuk'))
            ->withSuccess('Berhasil menambah surat masuk');
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
        $masuk = Suratmasuk::find($id);
        return view('pages.mastermasuk.editsuratmasuk')->with('masuk', $masuk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_suratmasuk)
    {
        $ubah = Suratmasuk::findorfail($id_suratmasuk);

        $data = [
            'nomorberkas' => $request['nomorberkas'],
            'alamatpengirim' => $request['alamatpengirim'],
            'tanggalmasuk' => $request['tanggalmasuk'],
            'perihal' => $request['perihal'],
            'nomorpetunjuk' => $request['nomorpetunjuk']
        ];
        $ubah->update($data);
        return redirect('suratmasuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Suratmasuk $masuk)
    {
        $masuk->delete();
        return redirect('suratmasuk');
    }
}
