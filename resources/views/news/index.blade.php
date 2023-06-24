@extends('layout.layout_admin')
@section('title', 'Admin | Berita')

@section('custom_css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="section-header">
    <h1>Data Berita</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ URL::to('admin') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ URL::to('news/index') }}">Index</a></div>
    </div>
</div>
<div class="section-body">
    <div class="col-12 col-md-12 col-lg-12 px-0">
        <div class="card">
            <div class="card-header pb-0">
                <h4>Daftar Berita</h4>
            </div>
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible show fade mx-4">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible show fade mx-4">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ Session::get('error') }}
                </div>
            </div>
            @endif
            <div class="card-body pt-0">
                <div class="row p-3">
                    {{-- ini fontawesomenya masih ngebug --}}
                    <a href="{{ URL::to('news/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="row p-3">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    @php
                                    $description = strip_tags($item->description); // Remove HTML tags from the description
                                    $words = explode(' ', $description); // Split the description into an array of words
                                    $limitedDescription = implode(' ', array_slice($words, 0, 200)); // Take the first 200 words
                                    if (count($words) > 200) {
                                    $limitedDescription .= '...'; // Add ellipsis if the description exceeds 200 words
                                    }
                                    @endphp
                                    <td>{!! $limitedDescription !!}</td>
                                    <td class="text-center"><a target="_blank" href="{{ Storage::disk('local')->url('images/news/'. $item->image) }}">Lihat</a></td>
                                    <td class="text-center"><a href="{{ URL::to('news/edit/' . $item->id) }}" class="btn btn-warning">Edit</a><a href="{{ URL::to('news/delete/' . $item->id) }}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_script')
<!-- JS Libraies -->
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection