<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;
use App\Models\Request_surat;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Request_surat::where('status_id', '!=', Constants::STATUS_ACCEPTED)
            ->with(['suratMasuk', 'jenisSurat', 'status'])
            ->orderBy('created_at', 'DESC')
            ->paginate();

        return view('pages.masterrequest.request', compact('requests'));
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
     * @param  \App\Models\Request_surat  $request_surat
     * @return \Illuminate\Http\Response
     */
    public function show(Request_surat $request_surat)
    {
        return view('pages.masterrequest.show', compact('request_surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request_surat  $request_surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request_surat $request_surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request_surat  $request_surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Request_surat $request_surat)
    {
        $action = $request->action;
        if ($request_surat->jenis_surat_id == Constants::JENIS_SURAT_MASUK) {
            $surat = Surat_masuk::find($request_surat->surat_masuk_id);
        }

        switch ($action) {
            case 'accept':
                $request_surat->status_id = Constants::STATUS_ACCEPTED;
                $request_surat->keterangan = $request->keterangan;
                $request_surat->save();

                $surat->status_id = Constants::STATUS_ACCEPTED;
                $surat->save();

                return redirect()
                    ->back()
                    ->withSuccess('Berhasil menerima surat');
                break;
            case 'decline':
                $request_surat->status_id = Constants::STATUS_DECLINED;
                $request_surat->keterangan = $request->keterangan;
                $request_surat->save();

                $surat->status_id = Constants::STATUS_ACCEPTED;
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
     * @param  \App\Models\Request_surat  $request_surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request_surat $request_surat)
    {
        //
    }
}
