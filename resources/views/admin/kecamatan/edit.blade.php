@extends('admin.layout.appadmin')

@section('title')
Edit Kecamatan
@endsection

@section('content')

<form method="POST" action="{{ route('kecamatan.update', $kecamatan->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                </div>
                <div class="form-group">
                    <label>Nama Camat</label>
                    <input name="namacamat" type="text" class="form-control form-control-sm" value="{{ $kecamatan->namacamat }}" placeholder="Nama Camat" aria-label="Nama Camat">
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input name="notelp" type="text" class="form-control form-control-sm" value="{{ $kecamatan->notelp }}" placeholder="No Telp" aria-label="No Telp">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control form-control-sm" value="{{ $kecamatan->email }}" placeholder="email" aria-label="email">
                </div>
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input name="kodepos" type="text" class="form-control form-control-sm" value="{{ $kecamatan->kodepos }}" placeholder="kodepos" aria-label="kodepos">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" type="text" class="form-control form-control-sm" value="{{ $kecamatan->alamat }}" placeholder="Alamat" aria-label="Alamat">
                </div>
                <div class="form-group">
                    <label>Nama Kecamatan</label>
                    <input name="namakecamatan" type="text" class="form-control form-control-sm" value="{{ $kecamatan->namakecamatan }}" placeholder="Nama Kecamatan" aria-label="Nama Kecamatan">
                </div>

                <button type="submit" name="submit" class="btn btn-gradient-success btn-rounded">Update</button>
                <a type="submit" name="submit" class="btn btn-gradient-danger btn-rounded" href="{{ route('kecamatan.index') }}">Cancel</a>
            </div>
        </div>
    </div>
</form>
@endsection