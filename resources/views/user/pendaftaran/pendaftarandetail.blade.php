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
        <h1>Detail Pendaftaran</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ URL::to('camat') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ URL::to('mapdistrictsport/index') }}">Pendaftaran</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('mapdistrictsport/show/'. $mds[0]->id_map_district_sport) }}">Detail</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-sm-12 col-lg-12 px-0">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Grup</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse-{{ $mds[0]->id_map_district_sport }}"
                            class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse-{{ $mds[0]->id_map_district_sport }}">
                    <div class="card-body">
                        <form action="{{ URL::to('mapdistrictsport/update/' . $mds[0]->id_map_district_sport) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="id_sub_district" class="col-sm-3 col-form-label">Kecamatan</label>
                                <div class="col-9">
                                    <input id="id_sub_district" name="id_sub_district" class="form-control"
                                        value="{{ $mds[0]->nama_kecamatan }}" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_sport" class="col-sm-3 col-form-label">Cabang Olahraga</label>
                                <div class="col-9">
                                    @if($mds[0]->map_district_status === 'Verified' || 'Unverified')
                                        <input id="id_sport" name="id_sport" class="form-control"
                                            value="{{ $mds[0]->sport_name }}" type="text" disabled>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group_name" class="col-sm-3 col-form-label">Nama Group</label>
                                <div class="col-9">
                                    <input id="group_name" name="group_name" placeholder="Nama Group"
                                        class="form-control here" value="{{ $mds[0]->group_name }}" required="required"
                                        type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group_name" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-9">
                                    @switch($mds[0]->status_map_district)
                                        @case($mds[0]->status_map_district === 'On Process')
                                            <span class="badge badge-warning">Sedang Diproses</span>
                                        @break
                                        @case($mds[0]->status_map_district === 'Verified')
                                            <span class="badge badge-success">Lolos</span>
                                        @break
                                        @case($mds[0]->status_map_district === 'Unverified')
                                            <span class="badge badge-danger">Tidak Lolos</span>
                                        @break
                                    @endswitch
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if (count($participants) < $mds[0]->max_participant)
            <div class="col-auto text-left mb-1">
                <span>Jumlah Peserta : {{ count($participants) }}/{{ $mds[0]->max_participant }} </span>
            </div>
        @endif
        @php
            $index = 0;
        @endphp
        @foreach ($participants as $participant)
            <div class="col-12 col-sm-12 col-lg-12 px-0">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $participant->participant_name }}</h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse-{{ $participant->no_ktp }}" class="btn btn-icon btn-info"
                                href="#"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="collapse hide" id="mycard-collapse-{{ $participant->no_ktp }}">
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-8">
                                            <div class="row">
                                                @if ($participant->pas_foto)
                                                    <div class="col-md-3">
                                                        <img src="{{ asset('storage/Pas_Foto/' . $participant->pas_foto) }}"
                                                            alt="" title="" height="200px">
                                                    </div>
                                                    <div class="col-md-2 justify-content-center">
                                                    </div>
                                                @endif
                                                <div class="col-md-3" id="preview{{$index}}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="participant_name">Nama Peserta</label>
                                        <input id="participant_name" name="participant_name" placeholder="Nama Group"
                                            class="form-control" value="{{ $participant->participant_name }}"
                                            required="required" type="text" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="participant_gender">Jenis Kelamin</label>
                                        <input id="participant_gender" name="participant_gender" placeholder="Nama Group"
                                            class="form-control" value="{{ $participant->participant_gender }}"
                                            required="required" type="text" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="participant_dob">Tanggal Lahir</label>
                                        <input id="participant_dob" name="participant_dob" placeholder="Nama Group"
                                            class="form-control" value="{{ $participant->participant_dob }}"
                                            required="required" type="date" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="participant_address">Alamat KTP</label>
                                        <input id="participant_address" name="participant_address"
                                            placeholder="Nama Group" class="form-control"
                                            value="{{ $participant->participant_address }}" required="required"
                                            type="text" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="participant_domicile">Alamat Domisili</label>
                                        <input id="participant_domicile" name="participant_domicile"
                                            placeholder="Nama Group" class="form-control"
                                            value="{{ $participant->participant_domicile }}" required="required"
                                            type="text" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="no_ktp">No KTP</label>
                                        <input id="no_ktp" name="no_ktp" placeholder="Nama Group"
                                            class="form-control" value="{{ $participant->no_ktp }}" required="required"
                                            type="text" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_kk">No Kartu Keluarga</label>
                                        <input id="no_kk" name="no_kk" placeholder="Nama Group"
                                            class="form-control" value="{{ $participant->no_kk }}" required="required"
                                            type="text" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="no_akte">No Akte</label>
                                        <input id="no_akte" name="no_akte" placeholder="Nama Group"
                                            class="form-control" value="{{ $participant->no_akte }}" required="required"
                                            type="text" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_ijazah">No Ijazah</label>
                                        <input id="no_ijazah" name="no_ijazah" placeholder="Nama Group"
                                            class="form-control" value="{{ $participant->no_ijazah }}"
                                            required="required" type="text" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $index++;
            @endphp
        @endforeach
    </div>
@endsection

@section('custom_script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection