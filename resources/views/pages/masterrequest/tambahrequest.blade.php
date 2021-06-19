@extends('layouts.backend')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Request</h6>    
        </div>        
        <div class="card-body">
            <form action="{{route('simpanrequest')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body pl-4">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nomorberkas">Nomor Berkas</label>
                            <input type="text" class="form-control" id="nomorberkas" name="nomorberkas">
                        </div>
                        <div class="form-group">
                            <label for="jenissurat">Jenis Surat</label>
                            <input type="text" class="form-control" id="jenissurat" name="jenissurat">
                        </div>
                        <div class="form-group">
                            <label for="alamatsurat">Alamat Surat</label>
                            <input type="text" class="form-control" id="alamatsurat" name="alamatsurat">
                        </div>
                        <div class="form-group">
                            <label for="tanggalsurat">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tanggalsurat" name="tanggalsurat">
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
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>                      
                    </div>
                    <hr>
                <button type="submit" class="btn btn-primary pr-4 pl-4">Simpan</button>
            </form>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection