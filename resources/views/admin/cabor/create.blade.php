@extends('admin.layout.appadmin')

@section('title')

  </span> Tambah Cabang Olahraga

@endsection

@section('content')

  <form method="POST" action="{{url('cabor/store')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label>Cabang Olahraga</label>
            <input name="cabor" type="text" class="form-control form-control-sm" placeholder="Cabang Olahraga" aria-label="Cabang Olahraga">
          </div>
          <div class="form-group">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control form-control-sm" id="" cols="30" rows="10"></textarea>
          </div>
            <button type="submit" name="submit" class="btn btn-gradient-success btn-rounded">Simpan</button>
            <a type="submit" name="submit" class="btn btn-gradient-danger btn-rounded" href="{{url('cabor')}}">Kembali</a>
        </div>
      </div>
    </div>
  </form>
@endsection
