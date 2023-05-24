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
            <h5 class="card-title">Profile</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
              <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" name="username" id="username" value="{{ $user->name }}">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password ...">
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi password ...">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
