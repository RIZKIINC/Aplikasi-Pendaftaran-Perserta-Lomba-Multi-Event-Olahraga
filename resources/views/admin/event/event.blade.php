@extends('admin.layout.appadmin')

@section('title')
Event Cabang Olahraga
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="float: left;">
                    <a type="button" class="mdi mdi-account-plus btn btn-gradient-success btn-rounded" href="{{url('event/create')}}"> Tambah</a>
                </div>
                <div style="float: right;">
                    <a type="button" class="mdi mdi-file-pdf btn btn btn-outline-info btn-rounded" target="_blank" href="#"> PDF</a>
                    <a type="button" class="mdi mdi-file-excel btn btn-outline-info btn-rounded" target="_blank" href="#"> Excel</a>
                    <a type="button" class="mdi mdi-printer btn btn-outline-info btn-rounded" target="_blank" href="#"> Print</a>
                </div>
                </p>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Cabang Olahraga </th>
                            <th> No. Olahraga </th>
                            <th> Nama Event </th>
                            <th> Jenis Kelamin </th>
                            <!-- <th> Action </th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($event_cabor as $e)

                        <tr>
                            <td> {{ $no }} </td>
                            <td>{{ $cabor->where('id', $e->cabang_olahraga_id)->pluck('cabor')->first() }}</td>
                            <td> {{ $e->nomor_olahraga }} </td>
                            <td> {{ $e->nama_event }} </td>
                            <td> {{ $e->jenis_kelamin }} </td>
                            <td>
                                <form action="" method="post">
                                    <a href="{{url('event/edit/'.$e->id)}}" type="button" class="mdi mdi-tooltip-edit btn btn-gradient-info btn-rounded"> Edit</a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="mdi mdi-account-remove btn btn-gradient-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal{{$e->id}}">
                                        hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$e->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <a class="mdi mdi-account-remove btn btn-gradient-danger btn-rounded" href="{{url('event/delete/'.$e->id)}}">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                            </form>
                        </tr>
                        @php
                        $no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection