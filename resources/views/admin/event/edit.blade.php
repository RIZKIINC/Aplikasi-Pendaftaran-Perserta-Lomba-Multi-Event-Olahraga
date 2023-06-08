@extends('admin.layout.appadmin')

@section('title')
Edit Event
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ url('event/', $e->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('get')
                    <div class="form-group">
                        <label>Nomor Olahraga</label>
                        <input name="nomor_olahraga" type="text" class="form-control form-control-sm" value="{{ $e->nomor_olahraga }}" placeholder="Masukkan Nomor Olahraga" aria-label="Nomor Olahraga">
                    </div>

                    <div class="form-group">
                        <label>Nama Event</label>
                        <input name="nama_event" type="text" class="form-control form-control-sm" value="{{ $e->nama_event }}" placeholder="Masukkan Nama Event" aria-label="Nama Event">
                    </div>
                   
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input name="jenis_kelamin" type="text" class="form-control form-control-sm" value="{{ $e->jenis_kelamin }}" placeholder="Masukkan Jenis Kelamin" aria-label="Jenis Kelamin">
                    </div>

                    <button type="submit" class="btn btn-gradient-success btn-rounded">Update</button>
                    <a type="button" class="btn btn-gradient-danger btn-rounded" href="{{ url('event') }}">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
