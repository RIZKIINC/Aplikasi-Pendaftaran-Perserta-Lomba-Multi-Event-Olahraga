@extends('admin.layout.appadmin')

@section('title')
</span> Kecamatan
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
        <a href="{{ route('kecamatan.create') }}" class="mdi mdi-account-plus btn btn-gradient-success btn-rounded">Tambah</a>
        </p>

        <table class="table table-striped">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama Camat</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Pos</th>
                <!-- <th>Alamat</th> -->
                <!-- <th>Kecamatan</th> -->
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($kecamatan as $d)
            <tr>
                <td>{{$no}} </td>
                <td>{{$d->namacamat}} </td>
                <td>{{$d->notelp}} </td>
                <td>{{$d->email}} </td>
                <td>{{$d->kodepos}} </td>
                <!-- <td>{{$d->alamat}} </td> -->
                <!-- <td>{{$d->namakecamatan}} </td> -->
              <td>
                <a href="#" class="mdi mdi-bookmark btn btn-gradient-primary btn-rounded" onclick="showDetail('{{ $d->id }}')">Detail</a>
                <a href="{{ route('kecamatan.edit', $d->id) }}" class="mdi mdi-tooltip-edit btn btn-gradient-info btn-rounded">Edit</a>
                <form action="{{ route('kecamatan.destroy', $d->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="mdi mdi-account-remove btn btn-gradient-danger btn-rounded">Hapus</button>
                </form>
              </td>
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

<script>
  function showDetail(id) {
    var modal = document.getElementById("detailModal" + id);
    modal.style.display = "block";
  }

  function closeModal(id) {
    var modal = document.getElementById("detailModal" + id);
    modal.style.display = "none";
  }
</script>

@foreach($kecamatan as $d)
<div class="modal" id="detailModal{{ $d->id }}">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Data</h5>
        <button type="button" class="close" onclick="closeModal('{{ $d->id }}')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>ID: {{ $d->id }}</p>
        <p>Nama Camat: {{ $d->namacamat }}</p>
        <p>No Telp: {{ $d->notelp }}</p>
        <p>Email: {{ $d->email }}</p>
        <p>Kode Pos: {{ $d->kodepos }}</p>
        <p>Alamat: {{ $d->alamat }}</p>
        <p>Nama Kecamatan: {{ $d->namakecamatan }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModal('{{ $d->id }}')">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection