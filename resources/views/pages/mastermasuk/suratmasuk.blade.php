@extends('layouts.backend')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        @if (auth()->user()->role == 'admin')
            <a href="{{ route('tambahsuratmasuk') }}" class="btn btn-warning mb-3"><i
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
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data_suratmasuk as $sm)
                            <tbody>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $sm->nomorberkas }}</td>
                                    <td>{{ $sm->alamatpengirim }}</td>
                                    <td>{{ $sm->tanggalmasuk }}</td>
                                    <td>{{ $sm->perihal }}</td>
                                    <td>{{ $sm->nomorpetunjuk }}</td>
                                    <td>
                                        @if ($sm->status == 'proses')
                                            <span class="badge badge-info">Dalam Proses</span>
                                        @elseif ($sm->status == 'sukses')
                                            <span class="badge badge-success">Sukses</span>
                                        @else
                                            <span class="badge badge-danger">Gagal</span>
                                        @endif
                                    </td>
                                    <td>
                                    @isset($sm->media[0])
                                        <a href="{{ $sm->media[0]->getFullUrl() }}" target="_blank">
                                            {{ $sm->media[0]->file_name }}
                                        </a>
                                    @else
                                        Tidak ada file
                                    @endisset
                                    </td>
                                    @if (auth()->user()->role == 'admin')
                                        <td>
                                            <a href="{{ route('suratmasuk-edit-masuk', $sm->id_suratmasuk) }}"
                                                class="fas fa-edit"></a>
                                            <a href="{{ route('suratmasuk-delete-masuk', $sm->id_suratmasuk) }}"
                                                onclick="return confirm('Apakah Anda yakin akan menghapus data?')"
                                                class=""><i class="fas fa-trash-alt"></i></a>
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
