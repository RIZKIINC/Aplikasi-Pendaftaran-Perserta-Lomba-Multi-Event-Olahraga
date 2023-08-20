@extends('layout.layout_camat')
@section('title', 'Camat | Pendaftaran')

@section('content')
<div class="section-header">
    <h1>Pendaftaran Peserta</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ URL::to('camat') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ URL::to('mapdistrictsport/index') }}">Pendaftaran</a></div>
        <div class="breadcrumb-item active"><a href="{{ URL::to('participants/create/' . $mds[0]->id_map_district_sport) }}">Peserta</a></div>
    </div>
</div>
<div class="section-body">
    <div class="col-12 col-sm-12 col-lg-12 px-0">
        <div class="card">
            <div class="card-header">
                <h4>Detail Grup</h4>
                <div class="card-header-action">
                    <a data-collapse="#mycard-collapse-{{ $mds[0]->id_map_district_sport }}-999" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                </div>
            </div>
            <div class="collapse show" id="mycard-collapse-{{ $mds[0]->id_map_district_sport }}-999">
                <div class="card-body">
                    <form action="{{ URL::to('mapdistrictsport/update/' . $mds[0]->id_map_district_sport) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_sub_district" class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-9">
                                <input id="id_sub_district" name="id_sub_district" class="form-control" value="{{ $mds[0]->nama_kecamatan }}" type="text" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_sport" class="col-sm-3 col-form-label">Cabang Olahraga</label>
                            <div class="col-9">
                                <input id="id_sport" name="id_sport" class="form-control" value="{{ $mds[0]->sport_name }}" type="text" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="group_name" class="col-sm-3 col-form-label">Nama Group</label>
                            <div class="col-9">
                                <input id="group_name" name="group_name" class="form-control here" value="{{ $mds[0]->group_name }}" type="text" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coach_name" class="col-sm-3 col-form-label">Nama Official Coach</label>
                            <div class="col-9">
                                <input id="coach_name" name="coach_name" placeholder="Nama Coach" class="form-control here" value="{{ $mds[0]->coach_name }}" required="required" type="text" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="group_name" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-9">
                                @switch($mds[0]->map_district_sport_status)
                                @case($mds[0]->map_district_sport_status === 'On Process')
                                <span class="badge badge-warning">Sedang Diproses</span>
                                @break

                                @case($mds[0]->map_district_sport_status === 'Verified')
                                <span class="badge badge-success"></span>
                                @break

                                @case($mds[0]->map_district_sport_status === 'Unverified')
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
    <form action="{{ URL::to('participant/store/' . $mds[0]->id_map_district_sport) }}" method="POST" enctype="multipart/form-data">
        @for ($i = 0; $i < $mds[0]->max_participant - $count_participant; $i++)
            <div class="col-12 col-sm-12 col-lg-12 px-0">
                <div class="card">
                    <div class="card-header">
                        <h4>Peserta {{ $index }}</h4>
                        <div class="card-header-action">
                            <button data-collapse="#mycard-collapse-{{ $i }}" class="btn btn-icon btn-info" onclick="requiredField(<?php echo $i; ?>)"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="collapse hide" id="mycard-collapse-{{ $i }}">
                        <div class="card-body">
                            @csrf
                            {{-- <input id="participant_count" name="participant_count[]" value="{{ $index }}" type="text" hidden> --}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="col-md-3" id="preview{{ $i }}"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="participant_name">Pas Foto</label><span class="text-danger">*</span>
                                    <input id="pas_foto" name="pas_foto[]" placeholder="Pas Foto" class="form-control" type="file" onchange="getImagePreview(event, <?php echo $i; ?>)">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="participant_name">Nama Peserta</label><span class="text-danger">*</span>
                                    <input id="participant_name-{{ $i }}" name="participant_name[]" placeholder="Nama peserta" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="participant_gender">Jenis Kelamin</label><span class="text-danger">*</span>
                                    <select id="participant_gender-{{ $i }}" name="participant_gender[]" class="form-control">
                                        <option value="@php null @endphp">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="participant_dob">Tanggal Lahir</label><span class="text-danger">*</span>
                                    <input id="participant_dob-{{ $i }}" name="participant_dob[]" placeholder="Tanggal lahir" class="form-control" type="date">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="participant_address">Alamat KTP</label><span class="text-danger">*</span>
                                    <input id="participant_address-{{ $i }}" name="participant_address[]" placeholder="Alamat sesuai ktp" class="form-control" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="participant_domicile">Alamat Domisili</label><span class="text-danger">*</span>
                                    <input id="participant_domicile-{{ $i }}" name="participant_domicile[]" placeholder="Alamat domisili" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_ktp">No KTP</label><span class="text-danger">*</span>
                                    <input id="no_ktp-{{ $i }}" name="no_ktp[]" placeholder="Nomor ktp" class="form-control" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_kk">No Kartu Keluarga</label><span class="text-danger">*</span>
                                    <input id="no_kk" name="no_kk[]" placeholder="Nomor kartu keluarga" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_ktp_image">Foto KTP</label><span class="text-danger">*</span>
                                    <input id="no_ktp_image" name="no_ktp_image[]" placeholder="no_ktp_image" class="form-control" type="file">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_kk_image">Foto KK</label><span class="text-danger">*</span>
                                    <input id="no_kk_image" name="no_kk_image[]" placeholder="no_kk_image" class="form-control" type="file">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_akte">No Akte</label><span class="text-danger">*</span>
                                    <input id="no_akte-{{ $i }}" name="no_akte[]" placeholder="Nomor akte kelahiran" class="form-control" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_ijazah">No Ijazah</label><span class="text-danger">*</span>
                                    <input id="no_ijazah-{{ $i }}" name="no_ijazah[]" placeholder="Nomor ijazah" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_akte_image">Foto Akte</label><span class="text-danger">*</span>
                                    <input id="no_akte_image" name="no_akte_image[]" placeholder="no_akte_image" class="form-control" type="file">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_ijazah_image">Foto Ijazah</label><span class="text-danger">*</span>
                                    <input id="no_ijazah_image" name="no_ijazah_image[]" placeholder="no_ijazah_image" class="form-control" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php $index++ @endphp
            @endfor
            <div class="form-group row col-auto float-center">
                <button class="btn btn-success" type="submit"><i class="fa fa-plus-square"> Simpan </i></button>
            </div>
    </form>
</div>
@endsection

@section('custom_script')
<script type="text/javascript">
    function getImagePreview(event, index) {
        image = URL.createObjectURL(event.target.files[0]);
        imagediv = document.getElementById(`preview${index}`);
        newimg = document.createElement("img");
        // imgs.push(newimg);
        imagediv.innerHTML = '';
        newimg.src = image;
        newimg.height = "200";
        imagediv.appendChild(newimg);

    }

    function requiredField(index) {
        var collapseId = "#mycard-collapse-" + index;
        var fields = document.querySelectorAll(collapseId + " input, " + collapseId + " select");

        fields.forEach(function(field) {
            field.required = true;
        });
    }
</script>
@endsection