@extends('layouts.backend')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Surat Masuk</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('simpansuratmasuk') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nomorberkas">Nomor Berkas</label>
                                <input type="text" class="form-control" id="nomorberkas" name="nomorberkas">
                            </div>
                            <div class="form-group">
                                <label for="alamatpengirim">Alamat Pengirim</label>
                                <input type="text" class="form-control" id="alamatpengirim" name="alamatpengirim">
                            </div>
                            <div class="form-group">
                                <label for="tanggalmasuk">Tanggal Masuk Surat</label>
                                <input type="date" class="form-control" id="tanggalmasuk" name="tanggalmasuk">
                            </div>
                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <input type="text" class="form-control" id="perihal" name="perihal">
                            </div>
                            <div class="form-group">
                                <label for="nomorpetunjuk">Nomor Petunjuk</label>
                                <input type="text" class="form-control" id="nomorpetunjuk" name="nomorpetunjuk">
                            </div>
                          
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" name="file" id="file" name="file" class=" form-control">
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary pr-4 pl-4">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
