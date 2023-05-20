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
            <h5 class="card-title">Edit Data Rute Lintasan Angkot</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route ('rute.update', $theRute->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="street_name_id " class="form-label">Nama Jalan</label>
                <select name="street_name_id" id="street_name_id" class="form-control">
                    <option value=""> -- Select One --</option>
                    @foreach ($jalans as $jalan)
                        <option value="{{ $jalan->id }}" {{ old('street_name_id', $theRute->street_name_id) == $jalan->id ? 'selected' : '' }}>{{ $jalan->nama_jalan }}</option>
                    @endforeach
                </select>
                <label for="urutan" class="form-label">Urutan Jalan</label>
                @php($i = 1)
                <select name="urutan" id="urutan" class="form-control">
                    <option value=""> -- Select One --</option>
                    @foreach ($rutes as $rute)
                        <option value="{{ $rute->urutan }}" {{ old('urutan', $theRute->urutan) == $rute->urutan ? 'selected' : '' }}>{{ $rute->urutan }}</option>
                        @php($i += 1)
                    @endforeach
                    <option value="{{$i}}">{{$i}}</option>
                </select>
              <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

 @endsection
