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
            <h5 class="card-title">Data Harga Per Kilometer</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route ('deskripsi.store') }}" method="post">
                @csrf
              <div class="mb-3">
                <label for="harga_per_kilometer" class="form-label">Harga Per Kilometer</label>
                <input type="text" class="form-control" name="harga_per_kilometer" id="harga_per_kilometer" placeholder="Harga Per Kilometer" value="{{ old('harga_per_kilometer', $harga_per_kilometer) }}">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
