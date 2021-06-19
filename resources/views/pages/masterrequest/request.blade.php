@extends('layouts.backend')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="{{route('tambahrequest')}}" class="btn btn-warning mb-3"><i class="fa fa-plus-square mr-2"></i>Tambah Data</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Request</h6>
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
                   @foreach ($data_requests as $req)
                   
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$req->nomorberkas}}</td>
                        <td>{{$req->jenissurat}}</td>
                        <td>{{$req->alamatsurat}}</td>
                        <td>{{$req->tanggalsurat}}</td>
                        <td>{{$req->perihal}}</td>
                        <td>{{$req->nomorpetunjuk}}</td>
                        <td>{{$req->status}}</td>
                        <td>{{$req->keterangan}}</td>
                        <td>
                            <a href="{{ route('requests.show', $req->id_requests) }}"><i class="fa fa-eye"></i></a>
                        </td>                          
                    </tr>                       
                
                       
                   @endforeach
                </tbody>
                    
                </table>
            </div>
        </div>
    </div>

</div>
@endsection