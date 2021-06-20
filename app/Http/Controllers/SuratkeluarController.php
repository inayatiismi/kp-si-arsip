<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Surat_keluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratKeluar =  Surat_keluar::orderBy('created_at', 'DESC')->paginate();

        return view('pages.masterkeluar.suratkeluar', compact('suratKeluar'));
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
        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx,jpg|max:5096'
        ]);

        $surat_keluar = new Surat_keluar;
        $surat_keluar->nomor_berkas = $request->nomor_berkas;
        $surat_keluar->alamat_penerima = $request->alamat_penerima;
        $surat_keluar->tanggal_keluar = $request->tanggal_keluar;
        $surat_keluar->perihal = $request->perihal;
        $surat_keluar->nomor_petunjuk = $request->nomor_petunjuk;
        $surat_keluar->status_id = Constants::STATUS_ON_PROCESS;
        $surat_keluar->save();

        $dataRequest = [
            'surat_keluar_id' => $surat_keluar->id,
            'jenis_surat_id' => Constants::JENIS_SURAT_KELUAR,
            'status_id' => Constants::STATUS_ON_PROCESS
        ];

        $surat_keluar->request()->create($dataRequest);

        if ($request->has('file') && $request->file('file')->isValid()) {
            $surat_keluar->addMediaFromRequest('file')
                ->toMediaCollection('surat_keluar');
        }

        return redirect()
            ->to(route('admin.surat-keluar.index'))
            ->withSuccess('Berhasil menambah surat keluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat_keluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Surat_keluar $surat_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat_keluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat_keluar $surat_keluar)
    {
        return view('pages.masterkeluar.edit', compact('surat_keluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat_keluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat_keluar $surat_keluar)
    {
        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx,jpg|max:5096'
        ]);

        $surat_keluar->nomor_berkas = $request->nomor_berkas;
        $surat_keluar->alamat_penerima = $request->alamat_penerima;
        $surat_keluar->tanggal_keluar = $request->tanggal_keluar;
        $surat_keluar->perihal = $request->perihal;
        $surat_keluar->nomor_petunjuk = $request->nomor_petunjuk;
        $surat_keluar->status_id = Constants::STATUS_ON_PROCESS;
        $surat_keluar->save();

        if ($request->has('file') && $request->file('file')->isValid()) {
            if (isset($surat_keluar->media[0])) {
                $surat_keluar->media[0]->delete();
            }

            $surat_keluar->addMediaFromRequest('file')
                ->toMediaCollection('surat_keluar');
        }

        return redirect()
            ->to(route('admin.surat-keluar.index'))
            ->withSuccess('Berhasil memperbarui surat keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat_keluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat_keluar $surat_keluar)
    {
        if (isset($surat_keluar->media[0])) {
            $surat_keluar->media[0]->delete();
        }

        $surat_keluar->delete();

        return redirect()
            ->to(route('admin.surat-keluar.index'))
            ->withSuccess('Berhasil menghapus surat keluar');
    }
}
