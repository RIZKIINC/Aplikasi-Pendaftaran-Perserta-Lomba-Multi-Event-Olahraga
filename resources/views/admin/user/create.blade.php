@extends('admin.layout.appadmin')

@section('title')

  </span> Tambah Data Users

@endsection

@section('content')

  <form method="POST" action="{{url('user/store')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label>Username</label>
            <input name="username" type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" type="text" class="form-control form-control-sm" placeholder="Password" aria-label="Username">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Username">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect3">Role</label>
            <select name="role" class="form-control form-control-sm" id="exampleFormControlSelect3">
              <option>admin</option>
              <option>pegawai_kec</option>
              <option>ketuapelaksana</option>
            </select>
          </div>
          
            <button type="submit" name="submit" class="btn btn-gradient-success btn-rounded">Simpan</button>
            <a type="submit" name="submit" class="btn btn-gradient-danger btn-rounded" href="{{url('user')}}">Kembali</a>
        </div>
      </div>
    </div>
  </form>
@endsection