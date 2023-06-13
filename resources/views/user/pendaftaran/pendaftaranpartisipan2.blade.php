@extends('layout.layout_camat')
@section('title', 'Camat | Pendaftaran')

@section('content')
    <div class="section-header">
        <h1>Tambah Pendaftaran</h1>
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
                    <h4>Grup : pandawara</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse-grup"
                            class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse-grup">
                    <div class="card-body">
                        <form action="{{ URL::to('mapdistrictsport/update/') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="id_sub_district" class="col-sm-3 col-form-label">Kecamatan</label>
                                <div class="col-9">
                                    <input id="id_sub_district" name="id_sub_district"
                                        class="form-control" value="Nama Kecamatan" required="required"
                                        type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_sport" class="col-sm-3 col-form-label">Cabang Olahraga</label>
                                <div class="col-9">
                                    <select name="id_sport" id="id_sport" class="form-control">
                                        {{-- @foreach ($sports as $sport)
                                            <option value="{{ $sport->id }}"
                                                class="@if ($mds[0]->id_sport === $sport->id) selected @endif form-control">
                                                {{ $sport->sport_name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group_name" class="col-sm-3 col-form-label">Nama Grup</label>
                                <div class="col-9">
                                    <input id="group_name" name="group_name"
                                        class="form-control here" value="Nama Grup" required="required"
                                        type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group_name" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-9">
                                    <input id="group_name" name="group_name"
                                        class="form-control here" value="status" required="required"
                                        type="text" disabled>
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
    </div>
    <button class="form-control" id="tombol-tambah">Tambah</button>
@endsection

@section('custom_script')
<script>
    var tombolTambah = document.getElementById('tombol-tambah');
    var counter = 0;
    
    tombolTambah.addEventListener('click', function(event) {
        event.preventDefault();
        
        var divTambahan = document.createElement('div');
        divTambahan.innerHTML = `
            <div class="col-12 col-sm-12 col-lg-12 px-0">
                <div class="card">
                    <div class="card-header">
                        <h4>Peserta Baru</h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse-child-${counter + 1}" class="btn btn-icon btn-info" href="#" onclick="toggleCollapse(event, ${counter + 1})"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="collapse hide" id="mycard-collapse-child-${counter + 1}">
                        <div class="card-body">
                            <form action="{{ URL::to('participant/update/') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="participant_name">Nama Peserta</label>
                                    <input id="participant_name" name="participant_name" placeholder="Nama Peserta"
                                        class="form-control" required="required"
                                        type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="participant_gender">Jenis Kelamin</label>
                                    <input id="participant_gender" name="participant_gender" placeholder="Jenis Kelamin"
                                        class="form-control" required="required"
                                        type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="participant_dob">Tanggal Lahir</label>
                                    <input id="participant_dob" name="participant_dob"
                                    class="form-control" required="required"
                                    type="date">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="participant_address">Alamat KTP</label>
                                    <input id="participant_address" name="participant_address" placeholder="Alamat KTP"
                                        class="form-control" required="required"
                                        type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="participant_domicile">Alamat Domisili</label>
                                    <input id="participant_domicile" name="participant_domicile" placeholder="Alamat Domisili"
                                        class="form-control" required="required"
                                        type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_ktp">No KTP</label>
                                    <input id="no_ktp" name="no_ktp" placeholder="No KTP"
                                        class="form-control" required="required"
                                        type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_kk">No Kartu Keluarga</label>
                                    <input id="no_kk" name="no_kk" placeholder="No Kartu Keluarga"
                                        class="form-control" required="required"
                                        type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_akte">No Akte</label>
                                    <input id="no_akte" name="no_akte" placeholder="No Akte"
                                        class="form-control" required="required"
                                        type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_ijazah">No Ijazah</label>
                                    <input id="no_ijazah" name="no_ijazah" placeholder="No Ijazah"
                                        class="form-control" required="required"
                                        type="text">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        `;

        tombolTambah.insertAdjacentElement('afterend', divTambahan);
        counter++;
    });
    
    function toggleCollapse(event, index) {
        event.preventDefault();
        
        var collapseId = `#mycard-collapse-child-${index}`;
        var collapseElement = document.querySelector(collapseId);
        var iconElement = document.querySelector(`a[data-collapse="${collapseId}"] i`);
        
        if (collapseElement.classList.contains('show')) {
            collapseElement.classList.remove('show');
            iconElement.classList.remove('fa-minus');
            iconElement.classList.add('fa-plus');
        } else {
            collapseElement.classList.add('show');
            iconElement.classList.remove('fa-plus');
            iconElement.classList.add('fa-minus');
        }
    }
</script>
@endsection