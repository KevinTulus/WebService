@extends('layouts.mainadmin')
@section('admin')
@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Lokasi</h5>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form action="{{route ('lokasi.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="street_name_id " class="form-label">Nama Jalan</label>
              <select name="street_name_id" id="street_name_id" class="form-control">
                <option value=""> -- Select One --</option>
                @foreach ($jalans as $jalan)
                <option value="{{ $jalan->id }}" {{ old('street_name_id') == $jalan->id ? 'selected' : '' }}>{{ $jalan->nama_jalan }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
              <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" placeholder="Nama Lokasi" value="{{ old('nama_lokasi') }}">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Lokasi</h5>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Jalan</th>
                <th scope="col">Nama Lokasi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($lokasis as $lokasi)
              <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $lokasi->nama_jalan }}</td>
                <td>{{ $lokasi->nama_lokasi }}</td>
                <td>
                  <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('lokasi.destroy', $lokasi->id) }}" method="POST">
                    <a href="{{ route('lokasi.edit', $lokasi->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
              </tr>
              <!-- Add more table rows as needed -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection