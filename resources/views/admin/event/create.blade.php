@extends('admin.layout.appadmin')

@section('title')
Tambah Data Event Cabor
@endsection

@section('content')

<form method="POST" action="{{ url('event/store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="form-group row">
                <label for="select1" class="col-4 col-form-label">Cabang Olahraga</label>
                <div class="col-8">
                    <select id="select1" name="cabang_olahraga_id" class="custom-select">
                        @foreach($cabor as $c)
                        <option value="{{$c}}">{{$c}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nomor Olahraga</label>
                    <input name="nomor_olahraga" type="text" class="form-control form-control-sm" placeholder="Masukkan Nomor Olahraga" aria-label="Nomor Olahraga">
                </div>

                <div class="form-group">
                    <label>Nama Event</label>
                    <input name="nama_event" type="text" class="form-control form-control-sm" placeholder="Masukkan Nama Event" aria-label="Nama Event">


                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input name="jenis_kelamin" type="text" class="form-control form-control-sm" placeholder="Jenis Kelamin" aria-label="Jenis Kelamin">
                </div>

                <button type="submit" name="submit" class="btn btn-gradient-success btn-rounded">Simpan</button>
                <a type="submit" name="submit" class="btn btn-gradient-danger btn-rounded" href="{{ url('event') }}">Kembali</a>
            </div>
        </div>
    </div>
</form>
@endsection