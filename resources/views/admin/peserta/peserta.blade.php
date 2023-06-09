@extends('admin.layout.appadmin')

@section('title')
</span> Peserta Lomba
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
        <div style="float: left;">
          <a href="{{ route('peserta.create') }}" class="mdi mdi-account-plus btn btn-gradient-success btn-rounded">Tambah</a>
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
              <th>No</th>
              <th>Nama</th>
              <th>NIK</th>
              <th>Foto</th>
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($peserta as $d)
            <tr>
              <td>{{$no}} </td>
              <td>{{$d->nama}} </td>
              <td>{{$d->nik}} </td>
              <td>{{$d->foto}} </td>
              <td>
                <a href="#" class="mdi mdi-bookmark btn btn-gradient-primary btn-rounded" onclick="showDetail('{{ $d->id }}')">Detail</a>
                <a href="{{ route('peserta.edit', $d->id) }}" class="mdi mdi-tooltip-edit btn btn-gradient-info btn-rounded">Edit</a>
                <form action="{{ route('peserta.destroy', $d->id) }}" method="POST" class="d-inline">
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

@foreach($peserta as $d)
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
        <p>Nama Event Cabor: {{ $d->nama_event_cabor }}</p>
        <p>Kecamatan ID: {{ $d->kecamatan_id }}</p>
        <p>Nama: {{ $d->nama }}</p>
        <p>NIK: {{ $d->nik }}</p>
        <p>TTL: {{ $d->ttl }}</p>
        <p>Nomor KK: {{ $d->nomor_kk }}</p>
        <p>Akta: <br>
          <img src="{{ asset('uploads/'.$d->akta) }}" alt="Akta" style="max-width: 100%; height: auto;">
        </p>
        <p>Foto: <br>
          <img src="{{ asset('uploads/'.$d->foto) }}" alt="Foto" style="max-width: 100%; height: auto;">
        </p>
        <p>Alamat: {{ $d->alamat }}</p>
        <p>No. Olahraga: {{ $d->no_olahraga }}</p>
        <p>Domisili: {{ $d->domisili }}</p>
        <p>No. Ijazah: {{ $d->no_ijazah }}</p>
        <p>Jenis Kelamin: {{ $d->jk }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModal('{{ $d->id }}')">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection