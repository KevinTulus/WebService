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
                    <h5 class="card-title">Edit Data Jalan</h5>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route ('jalan.update', $jalan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_jalan" class="form-label">Nama Jalan</label>
                            <input type="text" class="form-control" name="nama_jalan" id="nama_jalan" placeholder="Nama Jalan" value="{{ old('nama_jalan', $jalan->nama_jalan) }}">
                          </div>
                          <div class="mb-3">
                            <label for="km" class="form-label">Panjang Lintasan</label>
                            <input type="text" class="form-control" name="km" id="km" placeholder="Panjang dalam kilometer" value="{{ old('km', $jalan->km) }}">
                          </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Edit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
