@extends('layout.layout_admin')
@section('title', 'Camat | Index')

@section('custom_css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="section-header">
        <h1>Data Camat</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ URL::to('admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('adminlist/index') }}">List Camat</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12 px-0">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Daftar List Camat</h4>
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
                                        <th class="text-center">Nama Camat</th>
                                        <th class="text-center">Kecamatan</th>
                                        <th class="text-center">No. Telp</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($camat as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->nama_camat }}</td>
                                            <td class="text-center">{{ $item->nama_kecamatan }}</td>
                                            <td class="text-center">{{ $item->telp_camat }}</td>
                                            <td class="text-center">{{ $item->alamat }}</td>
                                            <td class="text-center">{{ $item->email }}</td>
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
