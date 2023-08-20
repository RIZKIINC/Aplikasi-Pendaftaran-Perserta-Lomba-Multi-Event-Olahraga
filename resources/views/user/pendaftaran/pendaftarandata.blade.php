@extends('layout.layout_camat')
@section('title', 'Camat | Pendaftaran')

@section('custom_css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
{{-- <link rel="stylesheet" --}}
{{-- href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"> --}}
@endsection

@section('content')
<div class="section-header">
    <h1>Pendaftaran</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ URL::to('camat') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ URL::to('mapdistrictsport/index') }}">Pendaftaran</a></div>
    </div>
</div>
<div class="section-body">
    <div class="col-12 col-md-12 col-lg-12 px-0">
        <div class="card">
            <div class="card-header pb-0">
                <h4>Data Pendaftaran</h4>
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
                    <a href="{{ URL::to('mapdistrictsport/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pendaftaran</a>
                </div>
                <div class="row p-3">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Cabang Olahraga</th>
                                    <th class="text-center">Nama Grup</th>
                                    <th class="text-center">Nama Official Coach</th>
                                    <th class="text-center">Tanggal Dibuat</th>
                                    <th class="text-center">Terakhir Diperbarui</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mds as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->sport_name }}</td>
                                    <td class="text-center">{!! $item->group_name !!}</td>
                                    <td class="text-center">{!! $item->coach_name !!}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">{{ $item->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ URL::to('mapdistrictsport/show/' . $item->id_map_district_sports) }}" class="btn btn-primary m-1"><i class="fas fa-eye"></i></a>
                                        <a href="{{ URL::to('mapdistrictsport/edit/' . $item->id_map_district_sports) }}" class="btn btn-warning m-1"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger m-1" data-toggle="modal" data-target="#ModalConfirmation-{{$item->id_map_district_sports}}"><i class="fas fa-trash"></i></button>
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


@foreach ($mds as $item)
<!-- Modal -->
<div class="modal fade" id="ModalConfirmation-{{$item->id_map_district_sports}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data pendaftaran?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="{{ URL::to('mapdistrictsport/delete/' . $item->id_map_district_sports) }}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach


@section('custom_script')
<!-- JS Libraies -->
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection