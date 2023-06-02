@extends('admin.layout.appadmin')

@section('title')

  </span> Users

@endsection

@section('content')

<div class="row">
              
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
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
                              <button type="button" class="mdi mdi-tooltip-edit btn btn-gradient-info btn-rounded"> Edit</button>
                              <a name="proses" class="mdi mdi-account-remove btn btn-gradient-danger btn-rounded" href="{{url('user/delete/'.$d->id)}}" > Hapus</a>
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