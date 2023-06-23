@extends('layout.layout_ketupel')
@section('title', 'Ketupel | Detail')

@section('custom_css')
<!-- CSS Libraries -->
<style>
    .label {
        width: 120px;
        white-space: nowrap;
    }

    .table-form td:not(.label) {
        padding-left: 10px;
    }
</style>
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-5 col-md-4 col-lg-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h4>Detail Kecamatan : <span style="color:darkblue"></span></h4>
                </div>
                <div class="card-body h-100">
                    <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Kecamatan&nbsp</td>
                            <td>&nbsp:&nbsp</td>
                            <td>{{$profile->nama_kecamatan}}</td>
                        </tr>
                        <tr>
                            <td>Kode Kecamatan&nbsp</td>
                            <td>&nbsp:&nbsp</td>
                            <td>{{$profile->kode_kecamatan}}</td>
                        </tr>
                        <tr>
                            <td>Nama Camat&nbsp</td>
                            <td>&nbsp:&nbsp</td>
                            <td>{{$profile->nama_camat}}</td>
                        </tr>
                        <tr>
                            <td>No HP&nbsp</td>
                            <td>&nbsp:&nbsp</td>
                            <td>{{$profile->telp_camat}}</td>
                        </tr>
                        <tr>
                            <td>Alamat Kecamatan&nbsp</td>
                            <td>&nbsp:&nbsp</td>
                            <td>{{$profile->alamat}}</td>
                        </tr>
                        <tr>
                            <td>Kode Pos&nbsp</td>
                            <td>&nbsp:&nbsp</td>
                            <td>{{$profile->kodepos}}</td>
                        </tr>
                        <tr>
                            <td>Telepon/Email&nbsp</td>
                            <td>&nbsp:&nbsp</td>
                            <td>{{$profile->email}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-10 col-md-6 col-lg-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h4>Contack Person</h4>
                    <div class="card-header-action">
                    </div>
                </div>
                <div class="card-body h-100">
                    <div class="content">
                        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="30%">Nama</td>
                                <td width="1%">:&nbsp</td>
                                <td>{{$cp->nama_kontak}}</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td width="1%">:&nbsp</td>
                                <td>{{$cp->jabatan_kontak}}</td>
                            </tr>
                            <tr>
                                <td>Telepon/Email</td>
                                <td width="1%">:&nbsp</td>
                                <td>{{$cp->telp_kontak}}</td>
                            </tr>
                        </table>
                        <hr class="solid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-10">
            <div class="card card-warning">
                <div class="card-header">
                    <h4>Cabang Olahraga yang Terdaftar</h4>
                    <div class="card-header-action">
                    </div>
                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="row">
                            @foreach ($sports as $sport)
                            <div class="col-md-6">
                                <table class="table-form" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="label">Nama Grup :</td>
                                        <td>{{$sport->group_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Status :</td>
                                        <td>{{$sport->status}}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Nama Cabang :</td>
                                        <td>{{$sport->sport_name}}</td>
                                    </tr>
                                </table>
                                <hr class="solid">
                                <a href="" class="btn btn-primary">See Details</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
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