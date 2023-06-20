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

    <style>
        /* Gaya untuk modal */
        .modal {
        display: none; /* Menyembunyikan modal secara default */
        position: fixed; /* Memastikan modal tampil di atas konten lain */
        z-index: 1; /* Memberikan indeks tumpukan tinggi pada modal */
        padding-left: 250px;
        left: 0;
        top: 0;
        width: 100%; /* Menetapkan lebar modal */
        height: 100%; /* Menetapkan tinggi modal */
        overflow: auto; /* Memberikan scrolling jika konten terlalu panjang */
        background-color: rgba(0, 0, 0, 0.4); /* Warna latar belakang dengan transparansi */
        }

        /* Gaya untuk konten modal */
        .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* Memberikan jarak dari tepi layar */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Menetapkan lebar konten modal */
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
                    <div class="card-header-action" style="display: flex">
                        @switch($mds[0]->status_map_district_sport)
                        @case($mds[0]->status_map_district_sport === 'Verified')
                        <h4><input class="btn btn-success" name="status" type="text" style="color:#fffff" placeholder="Terverifikasi" disabled></h4>
                        @break
                        @case($mds[0]->status_map_district_sport === 'On Process')
                        <h4><input class="btn btn-warning" name="status" type="text" style="color:#fffff" placeholder="On Process" disabled></h4>
                        @break
                        @case($mds[0]->status_map_district_sport === 'Unverified')
                        <h4><input class="btn btn-danger" name="status" type="text" style="color:#fffff" placeholder="Tidak Lolos" disabled></h4>
                        @break
                        @endswitch
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
                            @switch($mds[0]->status_map_district_sport)
                            @case($mds[0]->status_map_district_sport === 'Unverified')
                            <div class="form-group row">
                                <label for="group_name" class="col-sm-3 col-form-label">Alasan Penolakan</label>
                                <div class="col-9">
                                <textarea class="form-control" type="text" name="nama" id="nama" placeholder="{{ $mds[0]->keterangan }}" style="height: 200px; resize: none;" disabled></textarea>
                                </div>
                            </div>
                            @break
                            @endswitch

                            @switch($mds[0]->status_map_district_sport)
                                @case($mds[0]->status_map_district_sport === 'On Process')
                                <form action="{{ URL::to('verif/' . $mds[0]->id_map_district_sport) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group row float-right" style="margin-left : 30px;">
                                    <button class="btn btn-success" type="submit"><input class="btn btn-success" value="Verified" id="statusverif" name="status" hidden>Verifikasi Pendaftaran</button>
                                </div>
                                </form>
                                <form action="{{ URL::to('verif/' . $mds[0]->id_map_district_sport) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group row float-right">
                                    <!-- <button class="btn btn-danger" type="submit"><input class="btn btn-danger" value="Unverified" id="statusunverif" name="status" hidden>Tolak Pendaftaran</button> -->

                                    <button class="btn btn-danger" type="button" onclick="openModal()">Tolak Pendaftaran</button>
                                    <div id="myModal" class="modal" >
                                        <!-- Konten modal -->
                                        <div class="modal-content">
                                        <h1>Konfirmasi Penolakan</h1>
                                        <p>Alasan Penolakan:</p>
                                            <textarea class="form-control" id="keterangan" name="keterangan" style="height: 200px; resize: none;" ></textarea>
                                            <br>
                                            <input class="btn btn-danger" value="Unverified"  name="status" hidden>
                                            <button class="btn btn-danger" type="submit" onclick="rejectRegistration()">Ya, Tolak</button>
                                            <button class="btn btn-success" type="button" onclick="closeModal()">Batal</button>
                                        </div>
                                    </div>
                                </div>
                                </form>


                                @break
                                @case($mds[0]->status_map_district_sport === 'Verified')
                                <form action="{{ URL::to('verif/' . $mds[0]->id_map_district_sport) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row col-auto float-right">
                                    <!-- <input class="btn btn-success" name="status" type="text" style="color:#fffff" placeholder="Pendaftaran Terverifikasi" disabled> -->
                                    <button class="btn btn-success" name="status" type="text" value="On Process" style="color:#fffff">Kembali ke On Process</button>
                                </div>
                                </form>
                                @break
                                @case($mds[0]->status_map_district_sport === 'Unverified')

                                <form action="{{ URL::to('verif/' . $mds[0]->id_map_district_sport) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row col-auto float-right">
                                    <button class="btn btn-success" type="button" onclick="openModal()">Edit Alasan Penolakan</button>
                                    <div id="myModal" class="modal" >
                                        <!-- Konten modal -->
                                        <div class="modal-content">
                                        <h1>Edit Penolakan</h1>
                                        <p>Status:</p>
                                        <select class="form-control" name="status">
                                        <option value="On Process">On Process</option>
                                        <option value="Verified">Verified</option>
                                        <option value="Unverified">Unverified</option>
                                        </select>
                                        <br>
                                        <p>Alasan Penolakan:</p>
                                            <textarea class="form-control" id="keterangan" name="keterangan" style="height: 100px; resize: none;" >{{ $mds[0]->keterangan }}</textarea>
                                            <br>
                                            <button class="btn btn-success" type="submit" onclick="rejectRegistration()">Edit</button>
                                            <button class="btn btn-danger" type="button" onclick="closeModal()">Batal</button>
                                        </div>
                                    </div>
                                    <!-- <input class="btn btn-danger" name="status" type="text" style="color:#fffff" placeholder="Pendaftaran Tertolak" disabled> -->
                                </div>
                                @break
                            @endswitch
                                </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-12 px-0">
                <div class="card">
                    <div class="card-header">
                        <h4>PESERTA GROUP</h4>
                    </div>
                </div>
        </div>
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
                            <form action=# method="POST"
                                enctype="multipart/form-data">
                                @csrf
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
                                {{-- <div class="form-group row col-auto float-right">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-plus-square"> Simpan
                                            Perubahan </i></button>
                                </div> --}}
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

    <script>
                                        // Fungsi untuk membuka modal
                                        function openModal() {
                                        document.getElementById("myModal").style.display = "block";
                                        }

                                        // Fungsi untuk menutup modal
                                        function closeModal() {
                                        document.getElementById("myModal").style.display = "none";
                                        }

                                        // Fungsi untuk menolak pendaftaran
                                        function rejectRegistration() {
                                        // var rejectReason = document.getElementById("rejectReason").value;
                                        closeModal();
                                        // Tambahkan logika atau panggil fungsi yang sesuai untuk menolak pendaftaran
                                        }
                                    </script>
@endsection
