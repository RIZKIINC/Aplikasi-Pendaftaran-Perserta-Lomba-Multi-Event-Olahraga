@extends('layout.layout_admin')
@section('title', 'Dashboard Admin')

@section('custom_css')
<style type="text/css">
    .left    { text-align: left;}
    .right   { text-align: right;}
    .center  { text-align: center;}
    .justify { text-align: justify;}
</style>
@endsection

@section('content')
<div class="section-header">
    <h1> Selamat Datang <span style="color:red">{{ Auth::user()->name }}</span></h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                        {{ $admin }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Camat</h4>
                    </div>
                    <div class="card-body">
                        {{ $camat }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Partisipan</h4>
                    </div>
                    <div class="card-body">
                        {{ $peserta }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Olahraga</h4>
                    </div>
                    <div class="card-body">
                        {{ $sport }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
