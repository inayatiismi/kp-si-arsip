<?php

namespace App\Http\Controllers;

use App\Constants;
use Illuminate\Http\Request;
use App\Models\Request_surat;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Request_surat::where('status_id', '!=', Constants::STATUS_ON_PROCESS)
            ->with(['suratMasuk', 'jenisSurat', 'status'])
            ->orderBy('created_at', 'DESC')
            ->paginate();

        return view('pages.masterresponse.response', compact('requests'));
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
        //
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
        //
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
