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
                    <h5 class="card-title">Edit Data Angkot</h5>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route ('angkot.update', $angkot->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="no" class="form-label">Nomor</label>
                            <input type="text" class="form-control" name="no" id="no" placeholder="Nomor Angkot" value="{{ old('no', $angkot->no) }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama_angkot" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_angkot" id="nama_angkot" placeholder="Nama Angkot" value="{{ old('nama_angkot', $angkot->nama_angkot) }}">
                        </div>
                        <div class="mb-3">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna Angkot" value="{{ old('warna', $angkot->warna) }}">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Edit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
