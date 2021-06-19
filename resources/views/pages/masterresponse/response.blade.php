@extends('layouts.backend')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <a href="{{route('tambahresponse')}}" class="btn btn-warning mb-3"><i class="fa fa-plus-square mr-2"></i>Tambah Data</a> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Response</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Berkas</th>
                            <th>Jenis Surat</th>
                            <th>Alamat Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Perihal</th>
                            <th>Nomor Petunjuk</th>
                            <th>Status Surat</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($requests as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nomorberkas }}</td>
                                <td>{{  }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                <