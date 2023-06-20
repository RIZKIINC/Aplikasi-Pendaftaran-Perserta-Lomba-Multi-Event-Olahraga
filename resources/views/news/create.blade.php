@extends('layout.layout_admin')
@section('title', 'Admin | Berita')

@section('custom_css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
    <div class="section-header">
        <h1>Tambah Data Berita</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ URL::to('admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('news/index') }}">Daftar</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('news/create') }}">Tambah</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12 px-0">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('news/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul</label><span style="color: red">*</span>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="summernote-simple" name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label><span style="color: red">*</span>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <a href="{{ URL::to('news/index') }}" class="btn btn-secondary">Batal</a>
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
