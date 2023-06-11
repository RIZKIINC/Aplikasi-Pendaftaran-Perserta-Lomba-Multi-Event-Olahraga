@extends('admin.layout.appadmin')

@section('title')

  </span> Edit Data Users

@endsection

@section('content')

  <form method="POST" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
    {{csrf_field()}}
    @csrf
    @method('PUT')
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label>Username</label>
            <input name="username" value="{{$user->username}}" type="text" class="form-control form-control-sm" placeholder="Username">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" value="{{$user->password}}" type="text" class="form-control form-control-sm" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="email" value="{{$user->email}}" type="text" class="form-control form-control-sm" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="">Role</label>
            <select name="role" value="{{$user->role}}" class="form-control form-control-sm" id="">
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