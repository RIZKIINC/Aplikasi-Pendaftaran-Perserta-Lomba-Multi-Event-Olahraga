@extends('layout.layout_admin')
@section('title', 'Verifikasi Pendaftaran | Index')

@section('custom_css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="section-header">
        <h1>Pendaftaran</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ URL::to('dashboard/admin') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="#">List Pendaftar</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12 px-0">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Daftar List Pendaftar</h4>
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
                                        <th class="text-center">Cabang Olahraga</th>
                                        <th class="text-center">Nama group</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tanggal Daftar</th>
                                        <th class="text-center">Tanggal Daftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendaftaran as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->nama_kecamatan }}</td>
                                            <td class="text-center">{{ $item->sport_name }}</td>
                                            <td class="text-center">{{ $item->group_name }}</td>
                                            @switch($item->status_map_district_sport)
                                                @case($item->status_map_district_sport === 'On Process')
                                                <td class="color text-warning text-center">{{ $item->status_map_district_sport }}</td>
                                                @break
                                                @case($item->status_map_district_sport === 'Verified')
                                                <td class="color text-success text-center">{{ $item->status_map_district_sport }}</td>
                                                @break
                                                @case($item->status_map_district_sport === 'Unverified')
                                                <td class="color text-danger text-center">{{ $item->status_map_district_sport }}</td>
                                                @break
                                             @endswitch
                                            <td class="text-center">{{ $item->created_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ URL::to('detail-pendaftaran/' . $item->id_map_district_sport) }}"
                                                    class="btn btn-primary">Detail</a>
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
