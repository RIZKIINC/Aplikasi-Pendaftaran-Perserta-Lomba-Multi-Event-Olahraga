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
                          <th>Nama Camat</th>
                          <th>No HP</th>
                          <th>Email</th>
                          <th>Pos</th>
                          <th>Alamat</th>
                          <th>Kecamatan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($kecamatan as $d)
                          <td>{{$no}} </td>
                          <td>{{$d->namacamat}} </td>
                          <td>{{$d->notelp}} </td>
                          <td>{{$d->email}} </td>
                          <td>{{$d->kodepos}} </td>
                          <td>{{$d->alamat}} </td>
                          <td>{{$d->namakecamatan}} </td>
                          <td>
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