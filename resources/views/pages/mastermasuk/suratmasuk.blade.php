@extends('layouts.backend')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        @if (auth()->user()->role == 'admin')
            <a href="{{ route('admin.surat-masuk.create') }}" class="btn btn-warning mb-3"><i
                    class="fa fa-plus-square mr-2"></i>Tambah Data</a>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length"
                                aria-controls="example1"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                    </div>
                </div>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Surat Masuk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Berkas</th>
                                <th>Alamat Pengirim</th>
                                <th>Tanggal Masuk</th>
                                <th>Perihal</th>
                                <th>Nomor Petunjuk</th>
                                <th>Status</th>
                                <th>File</th>
                                @if (auth()->user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        @foreach ($suratMasuk as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nomor_berkas }}</td>
                                    <td>{{ $item->alamat_pengirim }}</td>
                                    <td>{{ $item->tanggal_masuk }}</td>
                                    <td>{{ $item->perihal }}</td>
                                    <td>{{ $item->nomor_petunjuk }}</td>
                                    <td>
                                        @if ($item->status_id == getConstants()::STATUS_ON_PROCESS)
                                            <span class="badge badge-info">Dalam Proses</span>
                                        @elseif ($item->status_id == getConstants()::STATUS_ACCEPTED)
                                            <span class="badge badge-success">Sukses</span>
                                        @else
                                            <span class="badge badge-danger">Gagal</span>
                                        @endif
                                    </td>
                                    <td>
                                        @isset($item->media[0])
                                            <a href="{{ $item->media[0]->getFullUrl() }}" target="_blank">
                                                {{ $item->media[0]->file_name }}
                                            </a>
                                        @else
                                            Tidak ada file
                                        @endisset
                                    </td>
                                    @if (auth()->user()->role == 'admin')
                                        <td>
                                            <a href="{{ route('admin.surat-masuk.edit', $item->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.surat-masuk.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
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
