@extends('layout.layout_ketupel')
@section('title', 'Ketupel | Detail')

@section('custom_css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-5 col-md-4 col-lg-4">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4>Group Name : <span style="color:darkblue">{{ $mds[0]->group_name }}</span></h4>
                    </div>
                    <div class="card-body">
                        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>Kecamatan&nbsp</td>
                                <td>&nbsp:&nbsp</td>
                                <td>&nbsp{{ $mds[0]->nama_kecamatan }}</td>
                            </tr>
                            <tr>
                                <td>Cabang Olahraga&nbsp</td>
                                <td>&nbsp:&nbsp</td>
                                <td>&nbsp{{ $mds[0]->sport_name }}</td>
                            </tr>
                            <tr>
                                <td>Status&nbsp</td>
                                <td>&nbsp:&nbsp</td>
                                <td>&nbsp{{ $mds[0]->status_map_district }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-6 col-lg-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4>Detail Peserta</h4>
                        <div class="card-header-action">
                            <a href="{{ URL::to('detail/cetak_pdf/' . $mds[0]->id_map_district_sport) }}" class="btn btn-primary">Print</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="content">
                            @foreach ($participants as $item)
                                <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td width="30%">Nama Peserta</td>
                                        <td width="1%">:&nbsp</td>
                                        <td>&nbsp{{ $item->participant_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat/Tgl. Lahir</td>
                                        <td width="1%">:&nbsp</td>
                                        <td>&nbsp{{ $item->participant_dob }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td width="1%">:&nbsp</td>
                                        <td>&nbsp{{ $item->participant_gender }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td width="1%">:&nbsp</td>
                                        <td>&nbsp{{ $item->participant_address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Domisili</td>
                                        <td width="1%">:&nbsp</td>
                                        <td>&nbsp{{ $item->participant_domicile }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. KTP</td>
                                        <td width="1%">:&nbsp</td>
                                        <td>&nbsp{{ $item->no_ktp }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. KK</td>
                                        <td width="1%">:&nbsp</td>
                                        <td>&nbsp{{ $item->no_kk }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Akte</td>
                                        <td width="1%">:&nbsp</td>
                                        <td>&nbsp{{ $item->no_akte }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Ijazah</td>
                                        <td width="1%">:&nbsp</td>
                                        <td>&nbsp{{ $item->no_ijazah }}</td>
                                    </tr>
                                </table>
                                <hr class="solid">
                            @endforeach
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
