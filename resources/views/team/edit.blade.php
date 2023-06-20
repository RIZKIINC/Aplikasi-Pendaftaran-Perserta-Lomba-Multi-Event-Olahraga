@extends('layout.layout_admin')
@section('title', 'Admin | Team')

@section('custom_css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
    <div class="section-header">
        <h1>Edit Data Team</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ URL::to('admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('team/index') }}">Daftar</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('team/create') }}">Tambah</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12 px-0">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('team/update/' . $team->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label><span style="color: red">*</span>
                            <input type="text" class="form-control" name="name" value="{{ $team->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label><span style="color: red">*</span>
                            <input type="text" class="form-control" name="position" value="{{ $team->position }}" required>
                        </div>
                        <div class="form-group">
                            <label>Urutan</label><span style="color: red">*</span>
                            <input type="text" class="form-control" name="order" value="{{ $team->order }}" required>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label><span style="color: red">*</span>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <a href="{{ URL::to('team/index') }}" class="btn btn-secondary">Batal</a>
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
