@extends('layouts.mainadmin')
@section('admin')

<div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Lokasi</h5>
            <form>
              <div class="mb-3">
                <label for="namaLokasi" class="form-label">Nama Jalan</label>
                <input type="text" class="form-control" id="namaLokasi" placeholder="Nama Lokasi">
              </div>
              <div class="mb-3">
                <label for="namaJalan" class="form-label">Nama Lokasi</label>
                <input type="text" class="form-control" id="namaJalan" placeholder="Nama Jalan (Jalan ...)">
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
                  <th scope="col">No.</th>
                  <th scope="col">Nama Jalan</th>
                  <th scope="col">Urutan Lokasi</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>John Doe</td>
                  <td>John Doe</td>
                  <td>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    <button type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                  </td>
                </tr>
                <!-- Add more table rows as needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection