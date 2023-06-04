@extends('admin.layout.appadmin')

@section('title')

  </span> Users

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
                          <th> No </th>
                          <th> Cabang Olahraga </th>
                          <th> No. Olahraga </th>
                          <th> Nama Event </th>
                          <th> Jenis Kelamin </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($event as $d)
                          <td>{{$no}} </td>
                          <td>{{$d->cabang_olahraga_id}} </td>
                          <td> {{$d->nomor_olahraga}} </td>
                          <td> {{$d->nama_event}} </td>
                          <td> {{$d->jenis_kelamin}} </td>
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