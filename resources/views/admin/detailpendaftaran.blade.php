@extends('layout.layout_admin')
@section('title', 'Camat | Pendaftaran')

@section('custom_css')
    <!-- CSS Libraries -->
    <style>
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white;
            opacity: 1; /* Firefox */
        }
    </style>

@endsection
@section('content')
    <div class="section-header">
        <h1>Verifikasi Pendaftaran</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ URL::to('camat') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ URL::to('mapdistrictsport/index') }}">Pendaftaran</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('mapdistrictsport/create') }}">Grup</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-sm-12 col-lg-12 px-0">
            <div class="card">
                <div class="card-header">
                    <h4>Grup : {{ $mds[0]->group_name }}</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse-{{ $mds[0]->id_map_district_sport }}"
                            class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse-{{ $mds[0]->id_map_district_sport }}">
                    <div class="card-body">
                        
                            @csrf
                            <div class="form-group row">
                                <label for="id_sub_district" class="col-sm-3 col-form-label">Kecamatan</label>
                                <div class="col-9">
                                    <input id="id_sub_district" name="id_sub_district" placeholder="Nama Group"
                                        class="form-control" value="{{ $mds[0]->nama_kecamatan }}" required="required"
                                        type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_sport" class="col-sm-3 col-form-label">Cabang Olahraga</label>
                                <div class="col-9">
                                    <input id="id_sub_district" name="id_sub_district" placeholder="Nama Group"
                                        class="form-control" value="{{ $mds[0]->id_sport }}" required="required"
                                        type="text" disabled>
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
                                    <input id="status" name="status" placeholder="Nama Group"
                                        class="form-control here" value="{{ $mds[0]->status_map_district_sport }}" required="required"
                                        type="text" disabled>
                                </div>
                            </div>
                            <form action="{{ URL::to('verif/' . $mds[0]->id_map_district_sport) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                            @switch($mds[0]->status_map_district_sport)
                                @case($mds[0]->status_map_district_sport === 'On Process')
                                <div class="form-group row col-auto float-right">
                                    <button class="btn btn-success" type="submit"><input class="btn btn-success" value="Verified" name="status" hidden>Verifikasi Pendaftaran</button>
                                </div>
                                <div class="form-group row col-auto float-right">
                                    <button class="btn btn-success" type="submit"><input class="btn btn-danger" value="Unverified" name="status" hidden>Tolak Pendaftaran</button>
                                </div>
                                @break
                                @case($mds[0]->status_map_district_sport === 'Verified')
                                <div class="form-group row col-auto float-right">
                                    <input class="btn btn-success" name="status" type="text" style="color:#fffff" placeholder="Pendaftaran Terverifikasi" disabled>
                                </div>
                                @break
                                @case($mds[0]->status_map_district_sport === 'Unverified')
                                <div class="form-group row col-auto float-right">
                                    <input class="btn btn-danger" name="status" type="text" style="color:#fffff" placeholder="Pendaftaran Tertolak" disabled>
                                </div>
                                @break
                            @endswitch
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- @foreach ($participants as $participant) --}}
            <div class="col-12 col-sm-12 col-lg-12 px-0">
                <div class="card">
                    <div class="card-header">
                        <h4>PESERTA GROUP</h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse-lala" class="btn btn-icon btn-info"
                                href="#"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="collapse hide" id="mycard-collapse-lala">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Participant</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Tanggal Daftar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($participants as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $item->participant_name }}</td>
                                                <td class="text-center">{{ $item->participant_dob }}</td>
                                                <td class="text-center">{{ $item->participant_gender }}</td>
                                                <td class="text-center">{{ $item->participant_address }}</td>
                                                <td class="text-center">{{ $item->created_at }}</td>
                                                {{-- <td class="text-center">
                                                    <a href="{{ URL::to('detail-pendaftaran/' . $item->id_map_district_sport) }}"
                                                        class="btn btn-warning">Detail</a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- @endforeach --}}
    </div>
@endsection
