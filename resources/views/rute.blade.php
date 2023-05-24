@extends('layouts.mainadmin')
@section('admin')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
  <div class="container mt-5">
    <div class="row">
      {{-- <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Rute Lintasan Angkot</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route ('rute.store') }}" method="post">
                @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Angkot</label>
                <input type="text" class="form-control" id="name" placeholder="Angkot">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Nama Jalan</label>
                <input type="text" class="form-control" id="email" placeholder="Nama Jalan (Jalan ...)">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Urutan Jalan</label>
                <input type="text" class="form-control" id="password" placeholder="Urutan Jalan ...">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
            </form>
          </div>
        </div>
      </div> --}}
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Rute Lintasan Angkot</h5>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Angkot</th>
                  <th scope="col">Nama Jalan</th>
                  <th scope="col">Urutan Jalan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    @foreach ($rutes as $rute)
                        <tr>
                            <td scope="row">{{ $rute->no }}</td>
                            <td>{{ $rute->nama_jalan }}</td>
                            <td>{{ $rute->urutan }}</td>
                            <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('rute.destroy', $rute->id) }}" method="POST">
                                {{-- <a href="{{ route('rute.edit', $rute->id) }}" class="btn btn-sm btn-primary">EDIT</a> --}}
                                {{-- <button type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button> --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

 @endsection
