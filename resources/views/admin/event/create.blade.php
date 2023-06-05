@extends('admin.layout.appadmin')

@section('title')
Tambah Data Event Cabor
@endsection

@section('content')

<form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
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
                    <select name="nama_event" class="form-control form-control-sm">
                        <option value="">Pilih Event Cabor</option>
                        @foreach ($event_cabor as $event)
                        <option value="{{ $event }}">{{ $event }}</option>
                        @endforeach
                    </select>
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