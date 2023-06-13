@extends('layout.layout_admin')
@section('title', 'Admin | Sport')

@section('custom_css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
    <div class="section-header">
        <h1>Edit Data Cabang Olahraga</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ URL::to('admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('sport/index') }}">Daftar</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('sport/create') }}">Tambah</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12 px-0">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('sport/update/' . $sport->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Cabang Olahraga</label><span style="color: red">*</span>
                            <input type="text" class="form-control" name="sport_name" value="{{ $sport->sport_name }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="summernote-simple" name="notes">{{ $sport->notes }}</textarea>
                        </div>
                        <a href="{{ URL::to('sport/index') }}" class="btn btn-secondary">Batal</a>
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
