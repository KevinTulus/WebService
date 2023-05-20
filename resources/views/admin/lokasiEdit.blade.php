@extends('layouts.mainadmin')
@section('admin')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Lokasi</h5>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route ('lokasi.update', $lokasi->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="street_name_id " class="form-label">Nama Jalan</label>
                            <select name="street_name_id" id="street_name_id" class="form-control">
                                <option value=""> -- Select One --</option>
                                @foreach ($jalans as $jalan)
                                    <option value="{{ $jalan->id }}" {{ old('street_name_id', $lokasi->street_name_id) == $jalan->id ? 'selected' : '' }}>{{ $jalan->nama_jalan }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                            <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" placeholder="Nama Lokasi" value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}">
                          </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Edit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
