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
            <h5 class="card-title">Data Nama Jalan</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route ('jalan.store') }}" method="post">
                @csrf
              <div class="mb-3">
                <label for="nama_jalan" class="form-label">Nama Jalan</label>
                <input type="text" class="form-control" name="nama_jalan" id="nama_jalan" placeholder="Nama Jalan" value="{{ old('nama_jalan') }}">
              </div>
              <div class="mb-3">
                <label for="km" class="form-label">Panjang Lintasan</label>
                <input type="text" class="form-control" name="km" id="km" placeholder="Panjang dalam kilometer" value="{{ old('km') }}">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Nama Jalan</h5>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Jalan</th>
                  <th scope="col">Panjang Lintasan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    @foreach ($jalans as $jalan)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $jalan->nama_jalan }}</td>
                            <td>{{ $jalan->km }} km</td>
                            <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jalan.destroy', $jalan->id) }}" method="POST">
                                <a href="{{ route('jalan.edit', $jalan->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
