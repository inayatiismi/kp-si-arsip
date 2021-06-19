@extends('layouts.backend')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Surat Keluar</h6>    
        </div>        
        <div class="card-body">
            <form action="{{route('suratkeluar-update-keluar',$keluar->id_suratkeluar)}}" method="POST" class="p-5">
                @csrf
                <div class="card-body pl-4">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nomorberkas">Nomor Berkas</label>
                            <input type="text" class="form-control" id="nomorberkas" name="nomorberkas"value="{{$keluar->nomorberkas}}">
                        </div>
                        <div class="form-group">
                            <label for="alamatpenerima">Alamat Penerima</label>
                            <input type="text" class="form-control" id="alamatpenerima" name="alamatpenerima"value="{{$keluar->alamatpenerima}}">
                        </div>
                        <div class="form-group">
                            <label for="tanggalkeluar">Tanggal Keluar Surat</label>
                            <input type="date" class="form-control" id="tanggalkeluar" name="tanggalkeluar"value="{{$keluar->tanggalkeluar}}">
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal"value="{{$keluar->perihal}}">
                        </div>
                        <div class="form-group">
                            <label for="nomorpetunjuk">Nomor Petunjuk</label>
                            <input type="text" class="form-control" id="nomorpetunjuk" name="nomorpetunjuk"value="{{$keluar->nomorpetunjuk}}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status"value="{{$keluar->status}}">
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