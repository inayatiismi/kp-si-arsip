@extends('layouts.backend')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Surat Masuk</h6>    
        </div>        
        <div class="card-body">
            <form action="{{route('suratmasuk-update-masuk',$masuk->id_suratmasuk)}}" method="POST" class="p-5">
                @csrf
                <div class="card-body pl-4">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nomorberkas">Nomor Berkas</label>
                            <input type="text" class="form-control" id="nomorberkas" name="nomorberkas"value="{{$masuk->nomorberkas}}">
                        </div>
                        <div class="form-group">
                            <label for="alamatpengirim">Alamat Pengirim</label>
                            <input type="text" class="form-control" id="alamatpengirim" name="alamatpengirim"value="{{$masuk->alamatpengirim}}">
                        </div>
                        <div class="form-group">
                            <label for="tanggalmasuk">Tanggal Masuk Surat</label>
                            <input type="date" class="form-control" id="tanggalmasuk" name="tanggalmasuk"value="{{$masuk->tanggalmasuk}}">
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal"value="{{$masuk->perihal}}">
                        </div>
                        <div class="form-group">
                            <label for="nomorpetunjuk">Nomor Petunjuk</label>
                            <input type="text" class="form-control" id="nomorpetunjuk" name="nomorpetunjuk"value="{{$masuk->nomorpetunjuk}}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status"value="{{$masuk->status}}">
                        </div> --}}
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