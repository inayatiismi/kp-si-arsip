@extends('layouts.backend')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    @if (auth()->user()->role == 'admin')
    <a href="{{route('tambahsuratkeluar')}}" class="btn btn-warning mb-3"><i class="fa fa-plus-square mr-2"></i>Tambah Data</a>
    <div class="col-sm-12 col-md-12">
        <div id="example1_filter" class="dataTables_filter d-flex justify-content-end"><label>Search:<input type="search" class="form-control form-control-sm" placeholder=""aria-controls="example1"></label>
        </div>
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Surat Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Berkas</th>
                            <th>Alamat Penerima</th>
                            <th>Tanggal Keluar</th>
                            <th>Perihal</th>
                            <th>Nomor Petunjuk</th>
                            <th>Status</th>
                            @if (auth()->user()->role == 'admin')
                            <th>Aksi</th>
                            @endif
                           
                        </tr>
                    </thead>
                    @php
                    $no = 1;   
                   @endphp
                    @foreach ($data_suratkeluar as $sk)
                    <tbody>
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$sk->nomorberkas}}</td>
                            <td>{{$sk->alamatpenerima}}</td>
                            <td>{{$sk->tanggalkeluar}}</td>
                            <td>{{$sk->perihal}}</td>
                            <td>{{$sk->nomorpetunjuk}}</td>
                            <td>{{$sk->status}}</td>
                            @if (auth()->user()->role == 'admin')
                            <td>
                                <a href="{{route('suratkeluar-edit-keluar', $sk->id_suratkeluar)}}" class="fas fa-edit"></a>
                                <a href="{{route('suratkeluar-delete-keluar',$sk->id_suratkeluar)}}"onclick="return confirm('Apakah Anda yakin akan menghapus data?')" class=""><i class="fas fa-trash-alt"></i></a>
                            </td>    
                            @endif                      
                        </tr>                      
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
@endsection