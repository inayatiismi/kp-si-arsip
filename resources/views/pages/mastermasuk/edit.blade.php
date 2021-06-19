@extends('layouts.backend')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Surat Masuk</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.surat-masuk.update', $surat_masuk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nomor_berkas">Nomor Berkas</label>
                                <input type="text" class="form-control" value="{{ $surat_masuk->nomor_berkas }}" id="nomor_berkas" name="nomor_berkas" required>
                            </div>
                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <input type="text" class="form-control" value="{{ $surat_masuk->perihal }}" id="perihal" name="perihal" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_masuk">Tanggal Masuk Surat</label>
                                <input type="date" class="form-control" value="{{ $surat_masuk->tanggal_masuk }}" id="tanggal_masuk" name="tanggal_masuk" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat_pengirim">Alamat Pengirim</label>
                                <textarea class="form-control" id="alamat_pengirim" name="alamat_pengirim" required>{{ $surat_masuk->alamat_pengirim }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="nomor_petunjuk">Nomor Petunjuk</label>
                                <input type="text" class="form-control" id="nomor_petunjuk" value="{{ $surat_masuk->nomor_petunjuk }}" name="nomor_petunjuk" required>
                            </div>

                            <div class="form-group">
                                <label for="file">File baru</label>
                                <input type="file" name="file" id="file" name="file" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary pr-4 pl-4">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
