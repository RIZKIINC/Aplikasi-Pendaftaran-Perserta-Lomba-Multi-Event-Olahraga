@extends('admin.layout.appadmin')

@section('title')
Tambah Data Event Cabor
@endsection

@section('content')

<form method="#" action="#" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Nomor Olahraga</label>
                    <input name="nomor_olahraga" type="text" class="form-control form-control-sm" placeholder="Masukkan Nomor Olahraga" aria-label="Nomor Olahraga">
                </div>

                <div class="form-group">
                    <label>Nama Event</label>
                    <input name="nama_event" type="text" class="form-control form-control-sm" placeholder="Masukkan Nama Event" aria-label="Nama Event">

                    <!-- <select name="nama_event" class="form-control form-control-sm">
                        <option value="">Pilih Event Cabor</option>
                        @foreach ($event as $e)
                        <option value="{{ $e }}">{{ $e }}</option>
                        @endforeach
                    </select> -->
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