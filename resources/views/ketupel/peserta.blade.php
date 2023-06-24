@extends('layout.layout_ketupel')
@section('title', 'Ketupel | Detail')

@section('custom_css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="">
<link rel="stylesheet" href="">
<style>
    .label {
        width: 120px;
        white-space: nowrap;
    }

    .table-form td:not(.label) {
        padding-left: 10px;
    }

    .custom-table {
        border: 2px solid black;
        border-collapse: collapse;
    }

    .custom-th,
    .custom-td {
        border: 2px solid red;
        padding: 8px;
    }
</style>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-11">
            <div class="card card-warning">
                <div class="card-header">
                    <h4>Daftar Peserta</h4>
                    <div class="card-header-action" style="text-align: right;">
                        <a href="" class="btn btn-primary">Print</a>
                    </div>
                </div>
                <div class="card-header">
                    <div class="content">
                        <div class="row px-3">
                            <h4>Kecamatan : {{$profile->nama_kecamatan}}</h4>
                        </div>
                        <div class="row px-3">
                            <h4>Cabang Olanhraga : {{$profile->sport_name}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="row px-3">
                            <table class="table table-bordered custom-table">
                                @foreach ($peserta as $item)
                                <thead style="background-color: #ffa424;">
                                    <tr>
                                        <th style="width: 5%; color: white; border: 2px solid black;" class="text-center">No</th>
                                        <th style="width: 25%; color: white; border: 2px solid black;" class="text-center" colspan="2">Identitas</th>
                                        <th style="width: 10%; color: white; border: 2px solid black;" class="text-center">Nomor/Kelas/Regu</th>
                                        <th style="width: 35%; color: white; border: 2px solid black;" class="text-center">Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="9" style="width: 5%; border: 2px solid black; color: black;">{{$loop->iteration}} </td>
                                        <td style="width: 15%; border: 2px solid black; color: black;">Nama</td>
                                        <td style="width: 35%; border: 2px solid black; color: black;">{{$item->participant_name}}</td>
                                        <td rowspan="9" style="width: 10%; border: 2px solid black; color: black;" class="text-center">{{$item->id_map_district_sport}}</td>
                                        <td rowspan="9" style="width: 20%; border: 2px solid black; color: black;"></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 2px solid black; color: black;">TTL</td>
                                        <td style="border: 2px solid black; color: black;">{{$item->participant_dob}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 2px solid black; color: black;">Status</td>
                                        <td style="border: 2px solid black; color: black;">hhahahaa</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 2px solid black; color: black;">Alamat</td>
                                        <td style="border: 2px solid black; color: black;">{{$item->participant_address}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 2px solid black; color: black;">Rumah</td>
                                        <td style="border: 2px solid black; color: black;">{{$item->participant_domicile}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 2px solid black; color: black;">No KTP</td>
                                        <td style="border: 2px solid black; color: black;">{{$item->no_ktp}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 2px solid black; color: black;">No KK</td>
                                        <td style="border: 2px solid black; color: black;">{{$item->no_kk}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 2px solid black; color: black;">No Akte</td>
                                        <td style="border: 2px solid black; color: black;">{{$item->no_akte}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 2px solid black; color: black;">No Ijazah</td>
                                        <td style="border: 2px solid black; color: black;">{{$item->no_ijazah}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <hr class="solid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_script')
<!-- JS Libraries -->
<script src=""></script>
<script src=""></script>

<!-- Page Specific JS File -->
<script src=""></script>
@endsection