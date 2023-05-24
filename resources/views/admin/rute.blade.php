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
            <h5 class="card-title">Data Rute Lintasan Angkot {{$angkot->no}}</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route ('admin.rute.store', $angkot->id) }}" method="post">
                @csrf
                <label for="street_name_id " class="form-label">Nama Jalan</label>
                <select name="street_name_id" id="street_name_id" class="form-control">
                    <option value=""> -- Select One --</option>
                    @foreach ($jalans as $jalan)
                        <option value="{{ $jalan->id }}" {{ old('street_name_id') == $jalan->id ? 'selected' : '' }}>{{ $jalan->nama_jalan }}</option>
                    @endforeach
                </select>
                <label for="urutan" class="form-label">Urutan Jalan</label>
                @php($i = 1)
                <select name="urutan" id="urutan" class="form-control">
                    <option value=""> -- Select One --</option>
                    @foreach ($rutes as $rute)
                        <option value="{{ $rute->urutan }}" {{ old('urutan') == $rute->urutan ? 'selected' : '' }}>{{ $rute->urutan }}</option>
                        @php($i += 1)
                    @endforeach
                    <option value="{{$i}}">{{$i}}</option>
                </select>
                {{-- <div class="mb-3">
                    <label for="urutan" class="form-label">Urutan Jalan</label>
                    <input type="text" class="form-control" name="urutan" id="urutan" placeholder="Urutan Jalan ..." value="{{ old('urutan') }}">
                </div> --}}
                {{-- <br> --}}
              <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
            </form>
          </div>
        </div>
      </div>
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
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $rute->nama_jalan }}</td>
                            <td>{{ $rute->urutan }}</td>
                            <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('rute.destroy', $rute->id) }}" method="POST">
                                <a href="{{ route('rute.edit', $rute->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
