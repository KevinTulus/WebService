@extends('layouts.mainadmin')
@section('admin')
    
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Rute Lintasan Angkot</h5>
            <form>
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
                  <th scope="row">1</th>
                  <td>John Doe</td>
                  <td>john@example.com</td>
                  <td>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    <button type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
 @endsection