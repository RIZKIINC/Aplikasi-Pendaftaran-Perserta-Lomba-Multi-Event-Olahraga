@extends('layout.layout_camat')
@section('title', 'Camat | Pendaftaran')

@section('content')
<div class="section-header">
    <h1>Edit Pendaftaran</h1>
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
                    <a data-collapse="#mycard-collapse-{{ $mds[0]->id_map_district_sport }}" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                </div>
            </div>
            <div class="collapse show" id="mycard-collapse-{{ $mds[0]->id_map_district_sport }}">
                <div class="card-body">
                    <form>
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
                                <input id="group_name" name="group_name" class="form-control here" value="{{ $mds[0]->group_name }}" required="required" type="text" disabled>
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
        @if($mds[0]->status_map_district === 'On Process')
        <div class="col-auto text-center mb-5">
            <a href="{{ URL::to('participant/create/' . $mds[0]->id_map_district_sport) }}" class="btn btn-primary" type="submit"><i class="fa fa-plus-square"> Tambah Peserta </i></a>
        </div>
        @endif
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
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <div class="card-header">
                    <h4>{{ $participant->participant_name }}</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse-{{ $participant->no_ktp }}" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="collapse hide" id="mycard-collapse-{{ $participant->no_ktp }}">
                    <div class="card-body">
                        <form action="{{ URL::to('participant/update/' . $participant->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="form-group col-md-8">
                                        <div class="row">
                                            @if ($participant->pas_foto)
                                            <div class="col-md-3">
                                                <img src="{{ asset('storage/Pas_Foto/' . $participant->pas_foto) }}" alt="" title="" height="200px">
                                            </div>
                                            <div class="col-md-2 justify-content-center">
                                            </div>
                                            @endif
                                            <div class="col-md-3" id="preview{{$index}}"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="participant_name">Pas Foto</label><span class="text-danger">*</span>
                                    <input id="pas_foto" name="pas_foto" onchange="getImagePreview(event, <?php echo $index ?>)" class="form-control" value="{{ $participant->pas_foto }}" type="file">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="participant_name">Nama Peserta</label><span class="text-danger">*</span>
                                    <input id="participant_name" name="participant_name" placeholder="Nama Group" class="form-control" value="{{ $participant->participant_name }}" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="participant_gender">Jenis Kelamin</label><span class="text-danger">*</span>
                                    <select name="participant_gender" class="form-control">
                                        <option value="@php null @endphp">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" @if ($participant->participant_gender === "Laki-laki") selected @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if ($participant->participant_gender === "Perempuan") selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="participant_dob">Tanggal Lahir</label><span class="text-danger">*</span>
                                    <input id="participant_dob" name="participant_dob" placeholder="Nama Group" class="form-control" value="{{ $participant->participant_dob }}" required="required" type="date">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="participant_address">Alamat KTP</label><span class="text-danger">*</span>
                                    <input id="participant_address" name="participant_address" placeholder="Nama Group" class="form-control" value="{{ $participant->participant_address }}" required="required" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="participant_domicile">Alamat Domisili</label><span class="text-danger">*</span>
                                    <input id="participant_domicile" name="participant_domicile" placeholder="Nama Group" class="form-control" value="{{ $participant->participant_domicile }}" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_ktp">No KTP</label><span class="text-danger">*</span>
                                    <input id="no_ktp" name="no_ktp" placeholder="Nama Group" class="form-control" value="{{ $participant->no_ktp }}" required="required" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_kk">No Kartu Keluarga</label><span class="text-danger">*</span>
                                    <input id="no_kk" name="no_kk" placeholder="Nama Group" class="form-control" value="{{ $participant->no_kk }}" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_ktp_image">Foto KTP</label><span class="text-danger">*</span>
                                    <input id="no_ktp_image" name="no_ktp_image" placeholder="no_ktp_image" value="{{ $participant->fotoktp }}" class="form-control" type="file">
                                    @if ($participant->fotoktp)
                                    <small>Current file: {{ $participant->fotoktp }}</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_kk_image">Foto KK</label><span class="text-danger">*</span>
                                    <input id="no_kk_image" name="no_kk_image" placeholder="no_kk_image" value="{{ $participant->fotokk }}" class="form-control" type="file">
                                    @if ($participant->fotokk)
                                    <small>Current file: {{ $participant->fotokk }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_akte">No Akte</label><span class="text-danger">*</span>
                                    <input id="no_akte" name="no_akte" placeholder="Nama Group" class="form-control" value="{{ $participant->no_akte }}" required="required" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_ijazah">No Ijazah</label><span class="text-danger">*</span>
                                    <input id="no_ijazah" name="no_ijazah" placeholder="Nama Group" class="form-control" value="{{ $participant->no_ijazah }}" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_akte_image">Foto Akte</label><span class="text-danger">*</span>
                                    <input id="no_akte_image" name="no_akte_image" placeholder="no_akte_image" value="{{ $participant->fotoakte }}" class="form-control" type="file">
                                    @if ($participant->fotoakte)
                                    <small>Current file: {{ $participant->fotoakte }}</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_ijazah_image">Foto Ijazah</label><span class="text-danger">*</span>
                                    <input id="no_ijazah_image" name="no_ijazah_image" placeholder="no_ijazah_image" value="{{ $participant->fotoijazah }}" class="form-control" type="file">
                                    @if ($participant->fotoijazah)
                                    <small>Current file: {{ $participant->fotoijazah }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row col-auto float-right">
                                <button class="btn btn-success" type="submit"><i class="fa fa-plus-square"> Simpan
                                        Perubahan </i></button>
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
<script type="text/javascript">
    function getImagePreview(event, index) {
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById(`preview${index}`);
        var newimg = document.createElement("img");
        imagediv.innerHTML = '';
        newimg.src = image;
        newimg.height = "200";
        imagediv.appendChild(newimg);
    }
</script>
@endsection