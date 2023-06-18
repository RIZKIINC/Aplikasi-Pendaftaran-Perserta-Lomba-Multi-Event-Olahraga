@extends('layout.layout_admin')
@section('title', 'Admin | Sport')

@section('custom_css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
    <div class="section-header">
        <h1>Tambah Data User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ URL::to('admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('user') }}">Daftar User</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('user/create') }}">Tambah</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12 px-0">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('user/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label><span style="color: red">*</span>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label><span style="color: red">*</span>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password"></input>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <div>
                                <select name="id_role" id="id_role" class="form-control">
                                    @foreach($role as $roles)
                                        <option value="{{ $roles->id }}" {{ old('id', $roles->id) === $roles->id ? 'selected' : '' }}>{{ $roles->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <a href="{{ URL::to('user') }}" class="btn btn-secondary">Batal</a>
                        <button class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>\>
@endsection
