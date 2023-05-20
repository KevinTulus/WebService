@extends('layouts.mainadmin')
@section('admin')
<div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Profile</h5>
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Nama ...">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="email...">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password ...">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password" placeholder="Konfirmasi password ...">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection