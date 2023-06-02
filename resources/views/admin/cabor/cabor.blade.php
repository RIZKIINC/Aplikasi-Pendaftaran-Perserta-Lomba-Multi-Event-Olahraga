@extends('admin.layout.appadmin')

@section('title')

  </span> Cabor

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
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($cabor as $d)
                          <td>{{$no}} </td>
                          <td>{{$d->cabor}} </td>
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