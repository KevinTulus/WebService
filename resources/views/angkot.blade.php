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
            <h5 class="card-title">Tambah Data Angkot</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route ('angkot.store') }}" method="post">
                @csrf
              <div class="mb-3">
                <label for="no" class="form-label">Nomor</label>
                <input type="text" class="form-control" name="no" id="no" placeholder="Nomor Angkot" value="{{ old('no') }}">
              </div>
              <div class="mb-3">
                <label for="nama_angkot" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_angkot" id="nama_angkot" placeholder="Nama Angkot" value="{{ old('nama_angkot') }}">
              </div>
              <div class="mb-3">
                <label for="warna" class="form-label">Warna</label>
                <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna Angkot" value="{{ old('warna') }}">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Angkot</h5>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Nomor</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Warna</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($angkots as $angkot)
                      <tr>
                          <td scope="row">{{ $angkot->no }}</td>
                          <td>{{ $angkot->nama_angkot }}</td>
                          <td>{{ $angkot->warna }}</td>
                          <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('angkot.destroy', $angkot->id) }}" method="POST">
                                <a href="{{ route('rute.show', $angkot->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('angkot.edit', $angkot->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
