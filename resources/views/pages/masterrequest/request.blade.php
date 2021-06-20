@extends('layouts.backend')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Request Surat</h6>
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
                            @foreach ($requests as $request)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($request->jenis_surat_id == getConstants()::JENIS_SURAT_MASUK)
                                        <td>{{ $request->suratMasuk->nomor_berkas }}</td>
                                        <td>{{ $request->jenisSurat->jenis }}</td>
                                        <td>{{ $request->suratMasuk->alamat_pengirim }}</td>
                                        <td>{{ $request->suratMasuk->tanggal_masuk }}</td>
                                        <td>{{ $request->suratMasuk->perihal }}</td>
                                        <td>{{ $request->suratMasuk->nomor_petunjuk }}</td>
                                    @else
                                        <td>{{ $request->suratKeluar->nomor_berkas }}</td>
                                        <td>{{ $request->jenisSurat->jenis }}</td>
                                        <td>{{ $request->suratKeluar->alamat_penerima }}</td>
                                        <td>{{ $request->suratKeluar->tanggal_keluar }}</td>
                                        <td>{{ $request->suratKeluar->perihal }}</td>
                                        <td>{{ $request->suratKeluar->nomor_petunjuk }}</td>
                                    @endif
                                    <td>
                                        @if ($request->status_id == getConstants()::STATUS_ON_PROCESS)
                                            <span class="badge badge-info">{{ $request->status->status }}</span>
                                        @elseif ($request->status_id == getConstants()::STATUS_ACCEPTED)
                                            <span class="badge badge-success">{{ $request->status->status }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $request->status->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $request->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('admin.request-surat.show', $request->id) }}"><i
                                                class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $requests->links() }}
            </div>
        </div>
    </div>
@endsection
