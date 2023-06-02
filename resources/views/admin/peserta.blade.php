@extends('admin.layout.appadmin')

@section('title')

  </span> Kecamatan

@endsection

@section('content')

<div class="row">
              
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <button type="button" class="mdi mdi-account-plus btn btn-gradient-success btn-rounded"> Tambah</button>
                    </p>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>NIK</th>
                          <th>Foto</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($peserta as $d)
                          <td>{{$no}} </td>
                          <td>{{$d->nama}} </td>
                          <td>{{$d->nik}} </td>
                          <td>{{$d->foto}} </td>
                          <td>
                          <button type="button" class="mdi mdi-tooltip-edit btn btn-gradient-primary btn-rounded"> Detail</button>
                          <button type="button" class="mdi mdi-tooltip-edit btn btn-gradient-info btn-rounded"> Edit</button>
                          <button type="button" class="mdi mdi-account-remove btn btn-gradient-danger btn-rounded"> Hapus</button>
                          </td>
                        </tr>
                        </tr>

                        @php
                        $no++

                        @endphp
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection