@extends('layout.layout_camat')
@section('title', 'Camat | Pendaftaran')

@section('content')
    <div class="section-header">
        <h1>Pendaftaran Grup</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ URL::to('camat') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ URL::to('mapdistrictsport/index') }}">Pendaftaran</a></div>
            <div class="breadcrumb-item active"><a href="{{ URL::to('mapdistrictsport/create') }}">Grup</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12 px-0">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Grup</h4>
                </div>
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible show fade mx-4">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ Session::get('error') }}
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ URL::to('mapdistrictsport/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_sport" class="col-4 col-form-label">Cabang Olahraga</label>
                            <div class="col-8">
                                <select name="id_sport" id="id_sport" class="form-control">
                                    @foreach($sports as $sport)
                                        <option value="{{ $sport->id }}" {{ old('id_sport', $sport->id) === $sport->id ? 'selected' : '' }}>{{ $sport->sport_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="group_name" class="col-4 col-form-label">Nama Group</label>
                            <div class="col-8">
                                <input id="group_name" name="group_name" placeholder="Nama Group" class="form-control here" value="" required="required" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-10 col-8">
                                <button class="btn btn-success" type="submit"><i class="fa fa-plus-square"> Tambah Partisipan </i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection