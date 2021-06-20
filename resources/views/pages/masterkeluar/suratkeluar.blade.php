@extends('layouts.backend')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Surat Keluar</h6>

                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('admin.surat-keluar.create') }}" class="btn btn-info btn-sm float-right"
                        style="margin-top: -25px"><i class="fa fa-plus-square mr-2"></i>Tambah Data</a>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Berkas</th>
                            <th>Alamat Pengirim</th>
                            <th>Tanggal Keluar</th>
                            <th>Perihal</th>
                            <th>Nomor Petunjuk</th>
                            <th>Status</th>
                            <th>File</th>
                            @if (auth()->user()->role == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suratKeluar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nomor_berkas }}</td>
                                <td>{{ $item->alamat_pengirim }}</td>
                                <td>{{ $item->tanggal_keluar }}</td>
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
                                        <a href="{{ route('admin.surat-keluar.edit', $item->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.surat-keluar.destroy', $item->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center ">Tidak ada data untuk ditampilkan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center">
                {{ $suratKeluar->links() }}
            </div>
        </div>

    </div>
@endsection
