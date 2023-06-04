@extends('admin.layout.appadmin')

@section('title')
Tambah Data Peserta
@endsection

@section('content')

<form method="POST" action="{{ route('peserta.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Event Cabor</label>
                    <select name="nama_event_cabor" class="form-control form-control-sm">
                        <option value="">Pilih Event Cabor</option>
                        @foreach ($event_cabor as $event)
                        <option value="{{ $event }}">{{ $event }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kecamatan_id">Kecamatan</label>
                    <select name="nama_kecamatan" class="form-control form-control-sm">
                        <option value="">Pilih Kecamatan</option>
                        @foreach ($kecamatan as $kec)
                        <option value="{{ $kec }}">{{ $kec }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" type="text" class="form-control form-control-sm" placeholder="Nama" aria-label="Nama">
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" type="text" class="form-control form-control-sm" placeholder="NIK" aria-label="NIK">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input name="ttl" type="date" class="form-control form-control-sm" placeholder="TTL" aria-label="TTL">
                </div>
                <div class="form-group">
                    <label>Nomor KK</label>
                    <input name="nomor_kk" type="text" class="form-control form-control-sm" placeholder="Nomor KK" aria-label="Nomor KK">
                </div>
                <div class="form-group">
                    <label>Akta</label>
                    <input name="akta" type="file" class="form-control form-control-sm" accept="image/*" aria-label="Akta">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input name="foto" type="file" class="form-control form-control-sm" accept="image/*" aria-label="Foto">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" type="text" class="form-control form-control-sm" placeholder="Alamat" aria-label="Alamat">
                </div>
                <div class="form-group">
                    <label>No. Olahraga</label>
                    <input name="no_olahraga" type="text" class="form-control form-control-sm" placeholder="No. Olahraga" aria-label="No. Olahraga">
                </div>
                <div class="form-group">
                    <label>Domisili</label>
                    <input name="domisili" type="text" class="form-control form-control-sm" placeholder="Domisili" aria-label="Domisili">
                </div>
                <div class="form-group">
                    <label>No. Ijazah</label>
                    <input name="no_ijazah" type="text" class="form-control form-control-sm" placeholder="No. Ijazah" aria-label="No. Ijazah">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input name="jk" type="text" class="form-control form-control-sm" placeholder="Jenis Kelamin" aria-label="Jenis Kelamin">
                </div>

                <button type="submit" name="submit" class="btn btn-gradient-success btn-rounded">Simpan</button>
                <a type="submit" name="submit" class="btn btn-gradient-danger btn-rounded" href="{{ url('user') }}">Kembali</a>
            </div>
        </div>
    </div>
</form>
@endsection
