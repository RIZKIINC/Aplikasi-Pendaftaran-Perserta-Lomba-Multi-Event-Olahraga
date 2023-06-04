@extends('admin.layout.appadmin')

@section('title')

  </span> Edit Data CabangOlahraga

@endsection

@section('content')
@foreach ($cabor as $cb )
  <form method="POST" action="{{url('cabor/'.$cb->id)}}">
    @method('POST')
    {{csrf_field()}}
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label>Cabang Olahraga</label>
            <input name="cabor" value="{{$cb->cabor}}" type="text" class="form-control form-control-sm" placeholder="Cabang Olahraga">
          </div>
          <div class="form-group">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control form-control-sm" id="" cols="30" rows="10">{{$cb->catatan}}</textarea>
          </div>

            <button type="submit" name="submit" class="btn btn-gradient-success btn-rounded">Simpan</button>
            <a type="submit" name="submit" class="btn btn-gradient-danger btn-rounded" href="{{url('cabor')}}">Kembali</a>
        </div>
      </div>
    </div>
  </form>
  @endforeach
@endsection
