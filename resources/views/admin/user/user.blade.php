@extends('admin.layout.appadmin')

@section('title')

  </span> Users

@endsection

@section('content')

<div class="row">
              
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif

      @if(session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif

                  <div class="card-body">
                    <a type="button" class="mdi mdi-account-plus btn btn-gradient-success btn-rounded" href="{{url('user/create')}}"> Tambah</a>
                    </p>

                    <table class="table table-striped">
                      <thead>
                        <tr align="center">
                          <th> No </th>
                          <th> Username </th>
                          <th> Password </th>
                          <th> Email </th>
                          <th> Role </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($user as $d)
                          <td>{{$no}} </td>
                          <td>{{$d->username}} </td>
                          <td> {{$d->password}} </td>
                          <td> {{$d->email}} </td>
                          <td> {{$d->role}} </td>
                          <td>
                            <form action="" method="post">
                              <a href="{{url('user/edit/'.$d->id)}}" type="button" class="mdi mdi-tooltip-edit btn btn-gradient-info btn-rounded"> Edit</a>

                              <!-- Button trigger modal -->
                            <button type="button" class="mdi mdi-account-remove btn btn-gradient-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal{{$d->id}}">
                                hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Apakah anda yakin akan menghapus data?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-gradient-success btn-rounded" data-bs-dismiss="modal">Batal</button>
                                    <a class="mdi mdi-account-remove btn btn-gradient-danger btn-rounded" href="{{url('user/delete/'.$d->id)}}">Hapus</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                              </td>
                            </form>
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