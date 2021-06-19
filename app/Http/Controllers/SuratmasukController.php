<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratMasuk =  Surat_masuk::orderBy('created_at', 'DESC')->paginate();

        return view('pages.mastermasuk.suratmasuk', compact('suratMasuk'));
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
        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx,jpg|max:5096'
        ]);

        $surat_masuk = new Surat_masuk;
        $surat_masuk->nomor_berkas = $request->nomor_berkas;
        $surat_masuk->alamat_pengirim = $request->alamat_pengirim;
        $surat_masuk->tanggal_masuk = $request->tanggal_masuk;
        $surat_masuk->perihal = $request->perihal;
        $surat_masuk->nomor_petunjuk = $request->nomor_petunjuk;
        $surat_masuk->status_id = Constants::STATUS_ON_PROCESS;
        $surat_masuk->save();

        $dataRequest = [
            'surat_masuk_id' => $surat_masuk->id,
            'jenis_surat_id' => Constants::JENIS_SURAT_MASUK,
            'status_id' => Constants::STATUS_ON_PROCESS
        ];

        $surat_masuk->request()->create($dataRequest);

        if ($request->has('file') && $request->file('file')->isValid()) {
            $surat_masuk->addMediaFromRequest('file')
                ->toMediaCollection('surat_masuk');
        }

        return redirect()
            ->to(route('admin.surat-masuk.index'))
            ->withSuccess('Berhasil menambah surat masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(Surat_masuk $surat_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat_masuk $surat_masuk)
    {
        return view('pages.mastermasuk.edit', compact('surat_masuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat_masuk $surat_masuk)
    {
        $request->validate([
            'file' => 'nullable|mimes:pdf,doc,docx,jpg|max:5096'
        ]);

        $surat_masuk->nomor_berkas = $request->nomor_berkas;
        $surat_masuk->alamat_pengirim = $request->alamat_pengirim;
        $surat_masuk->tanggal_masuk = $request->tanggal_masuk;
        $surat_masuk->perihal = $request->perihal;
        $surat_masuk->nomor_petunjuk = $request->nomor_petunjuk;
        $surat_masuk->status_id = Constants::STATUS_ON_PROCESS;
        $surat_masuk->save();

        if ($request->has('file') && $request->file('file')->isValid()) {
            if (isset($surat_masuk->media[0])) {
                $surat_masuk->media[0]->delete();
            }

            $surat_masuk->addMediaFromRequest('file')
                ->toMediaCollection('surat_masuk');
        }

        return redirect()
            ->to(route('admin.surat-masuk.index'))
            ->withSuccess('Berhasil memperbarui surat masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat_masuk $surat_masuk)
    {
        if (isset($surat_masuk->media[0])) {
            $surat_masuk->media[0]->delete();
        }

        $surat_masuk->delete();

        return redirect()
            ->to(route('admin.surat-masuk.index'))
            ->withSuccess('Berhasil menghapus surat masuk');
    }
}
