@extends('layouts.mainadmin')
@section('admin')
<div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Nama Jalan</h5>
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Nomor</label>
                <input type="text" class="form-control" id="name" placeholder="Nomor Angkot (121)">
              </div>
              <div class="mb-3">
                <label for="namaJalan" class="form-label">Nama Jalan</label>
                <input type="text" class="form-control" id="email" placeholder="Nama Angkot (KPUM)">
              </div>
              <div class="mb-3">
                <label for="panjangLintasan" class="form-label">Panjang Lintasan (km)</label>
                <input type="text" class="form-control" id="password" placeholder="Panjang dalam kilometer">
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
                  <th scope="col">Nomor</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Warna</th>
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