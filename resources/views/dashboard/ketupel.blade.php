@extends('layout.layout_ketupel')
@section('title', 'Ketupel | Dashboard')

@section('custom_css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Pendaftaran</h4>
                    </div>
                    <div class="card-body">
                        {{ $countPendaftaran }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah olahraga aktif</h4>
                    </div>
                    <div class="card-body">
                        {{ $cabor }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-12 px-0">
        <div class="card">
            <div class="card-header pb-0">
                <h4>Daftar List Pendaftaran</h4>
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
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Kecamatan</th>
                                    <th class="text-center">Nama Camat</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Telepon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->nama_kecamatan }}</td>
                                    <td class="text-center">{{ $item->nama_camat }}</td>
                                    <td class="text-center">{{ $item->alamat }}</td>
                                    <td class="text-center">{{ $item->telp_camat }}</td>
                                    <td class="text-center">
                                        <a href="{{ URL::to('ketupel/detail/' . $item->id_kecamatan) }}" class="btn btn-warning">View Detail</a>
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