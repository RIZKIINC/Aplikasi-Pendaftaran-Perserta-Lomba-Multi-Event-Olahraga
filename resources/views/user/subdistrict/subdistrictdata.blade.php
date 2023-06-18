@extends('layout.layout_camat')
@section('page_title' , '')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Camat</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

@section('content')
<body>
    <section class="sample-page">
        <div class="container" data-aos="fade-up">

        <!------ Include the above in your HEAD tag ---------->

            <div class="container">
                <div class="row">
                    <div class="col-md-3 ">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img alt="image" src="{{ asset ('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1" style="height:100px; width:100px">
                                </div>
                                <h3 class="profile-username text-center">{{ $subdisctrictprofile[0]->nama_camat }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                            <a class="nav-link" data-toggle="tab" id="first_tab" href="#first">Profile</a>
                                            </li>
                                            <li class="active">
                                            <a class="nav-link" data-toggle="tab" id="second_tab" href="#second">Contact Person</a>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        {{-- Update Profil --}}
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="first">
                                                <form action="/subprofil/updateSubProfile" method="POST" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label" hidden>Id Profil</label>
                                                        <div class="col-8">
                                                            <input id="id" name="id" placeholder="Nama Camat" class="form-control here" value="{{ $subdisctrictprofile[0]->id }}" hidden readonly required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label" hidden>Id User</label>
                                                        <div class="col-8">
                                                            <input id="id_user" name="id_user" placeholder="Nama Camat" class="form-control here" value="{{ $subdisctrictprofile[0]->id_user }}" hidden readonly required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label">Kecamatan</label>
                                                        <div class="col-8">
                                                            <input id="id_kecamatan" name="id_kecamatan" placeholder="Nama Camat" class="form-control here" value="{{ $subdisctrictprofile[0]->id_kecamatan }}" readonly required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label">Kode Kecamatan</label>
                                                        <div class="col-8">
                                                            <input id="kode_kecamatan" name="kode_kecamatan" placeholder="Kode Kecamatan" class="form-control here" value="{{ $subdisctrictprofile[0]->kode_kecamatan }}" readonly required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label">Nama Camat</label>
                                                        <div class="col-8">
                                                            <input id="nama_camat" name="nama_camat" placeholder="Nama Camat" class="form-control here" value="{{ $subdisctrictprofile[0]->nama_camat }}" required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="name" class="col-4 col-form-label">Nomor Telpon Camat</label>
                                                        <div class="col-8">
                                                            <input id="telp_camat" name="telp_camat" placeholder="Nomor Telephone" class="form-control here" value="{{ $subdisctrictprofile[0]->telp_camat }}" required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lastname" class="col-4 col-form-label">alamat</label>
                                                        <div class="col-8">
                                                            <input id="alamat" name="alamat" placeholder="Alamat" class="form-control here" type="text" value="{{ $subdisctrictprofile[0]->alamat }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="text" class="col-4 col-form-label">Email</label>
                                                        <div class="col-8">
                                                            <input id="email" name="email" placeholder="example@gmail.com" class="form-control here" value="{{ $subdisctrictprofile[0]->email }}" required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="text" class="col-4 col-form-label">Kode Pos</label>
                                                        <div class="col-8">
                                                            <input id="kodepos" name="kodepos" placeholder="Kode Pos" class="form-control here" value="{{ $subdisctrictprofile[0]->kodepos }}" required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="offset-4 col-8">
                                                            <button type="reset" class="btn btn-dark">Reset</button>
                                                            <button class="btn btn-success" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade in" id="second">
                                                <form action="/subprofil/updatecontactpeople" method="POST" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label" hidden>Id</label>
                                                        <div class="col-8">
                                                            <input id="nama_camat" name="id" placeholder="Nama Camat" class="form-control here" value="{{ $contactpeople[0]->id }}" readonly hidden required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label" hidden>Id Profil</label>
                                                        <div class="col-8">
                                                            <input id="nama_camat" name="id_profile" placeholder="Nama Camat" class="form-control here" value="{{ $subdisctrictprofile[0]->id }}" hidden readonly required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label">Nama Kontak</label>
                                                        <div class="col-8">
                                                            <input id="nama_camat" name="nama_kontak" placeholder="Nama Kontak" class="form-control here" value="{{ $contactpeople[0]->nama_kontak }}"  required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label">Jabatan Kontak</label>
                                                        <div class="col-8">
                                                            <input id="nama_camat" name="jabatan_kontak" placeholder="Jabatan Kontak" class="form-control here" value="{{ $contactpeople[0]->jabatan_kontak }}"  required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label">Nomor Telepon</label>
                                                        <div class="col-8">
                                                            <input id="nama_camat" name="telp_kontak" placeholder="Nomor Telepon" class="form-control here" value="{{ $contactpeople[0]->telp_kontak }}"  required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_camat" class="col-4 col-form-label">Email</label>
                                                        <div class="col-8">
                                                            <input id="nama_camat" name="email_kontak" placeholder="example@gmail.com" class="form-control here" value="{{ $contactpeople[0]->email_kontak }}" required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="offset-4 col-8">
                                                            <button type="reset" class="btn btn-dark">Reset</button>
                                                            <button class="btn btn-success" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection
</html>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
