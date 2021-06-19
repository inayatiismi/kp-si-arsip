@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Request Surat</h5>

                    @if (session()->has('success'))
                        <span class="text-success font-weight-bold">
                            {{ session()->get('success') }}
                        </span>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <td>Nomor Berkas</td>
                            <td>:</td>
                            <td>{{ $request->nomorberkas }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Surat</td>
                            <td>:</td>
                            <td>
                                @if ($request->jenissurat == 'masuk')
                                    Surat Masuk
                                @else
                                    Surat Keluar
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Surat</td>
                            <td>:</td>
                            <td>{{ $request->alamatsurat }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat</td>
                            <td>:</td>
                            <td>{{ date('l, d M Y', strtotime($request->tanggalsurat)) }}</td>
                        </tr>
                        <tr>
                            <td>Perihal</td>
                            <td>:</td>
                            <td>{{ $request->perihal }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Petunjuk</td>
                            <td>:</td>
                            <td>{{ $request->nomorpetunjuk }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                @if ($request->status == 'proses')
                                    <span class="badge badge-info">
                                        Dalam Proses
                                    </span>
                                @elseif ($request->status == 'sukses')
                                    <span class="badge badge-success">Sukses</span>
                                @else
                                    <span class="badge badge-danger">Gagal</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>{{ $request->keterangan }}</td>
                        </tr>
                        <tr>
                            <td>File</td>
                            <td>:</td>
                            <td>
                                @if ($request->jenissurat == 'masuk')
                                    @isset($request->suratMasuk->media[0])
                                        <a href="{{ $request->suratMasuk->media[0]->getFullUrl() }}" target="_blank">
                                            {{ $request->suratMasuk->media[0]->file_name }}
                                        </a>
                                    @endisset
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                @if ($request->status == 'proses')
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#terimaModal">Terima Surat</a>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tolakModal">Tolak Surat</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_html')
<div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Terima Surat?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('requests.update', $request->id_requests) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="action" value="accept">

            <div class="modal-body">
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" required="required"></textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-success">Terima</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tolak Surat?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('requests.update', $request->id_requests) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="action" value="decline">

            <div class="modal-body">
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" required="required"></textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger">Tolak</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
