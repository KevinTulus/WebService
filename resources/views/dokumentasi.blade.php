@extends('layouts.mainadmin')
@section('admin')

<div class="container mt-5">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">API Documentation</h1>
          <h3 class="">Authentication</h3>

          <h5>Login</h5>
          <p style="font-weight: 700; display: inline; margin-right: 5px;">POST</p>
          <code style="font-weight: 700; ">http://localhost:8000/api/angkot/login</code>
          <p>Login by inputing Email and Password</p>

          <h5>Logout</h5>
          <p style="font-weight: 700; display: inline; margin-right: 5px;">POST</p>
          <code style="font-weight: 700; ">http://localhost:8000/api/angkot/logout</code>
          <p>Logout to delete token</p>

          <h3 class="">Angkot</h3>

          <h5>Get All Angkot</h5>
          <p style="font-weight: 700; display: inline; margin-right: 5px;">GET</p>
          <code style="font-weight: 700; ">http://localhost:8000/api/angkot</code>
          <p>Get All Angkot in Medan</p>

          <h5>Get One Angkot</h5>
          <p style="font-weight: 700; display: inline; margin-right: 5px;">GET</p>
          <code style="font-weight: 700; ">http://localhost:8000/api/angkot/[number]</code>
          <p>Get one angkot by it's number</p>

          <h5>Get Angkot To</h5>
          <p style="font-weight: 700; display: inline; margin-right: 5px;">GET</p>
          <code style="font-weight: 700; ">http://localhost:8000/api/angkot/search/[street name]</code>
          <p>Seach Angkot by one rute</p>

          <h5>Get Angkot Between</h5>
          <p style="font-weight: 700; display: inline; margin-right: 5px;">GET</p>
          <code style="font-weight: 700; ">http://localhost:8000/api/angkot/search/[street name 1]/[street name 2]</code>
          <p>Seach Angkot by two rutes</p>

          <h5>Get All Nama Jalan</h5>
          <p style="font-weight: 700; display: inline; margin-right: 5px;">GET</p>
          <code style="font-weight: 700; ">http://localhost:8000/api/angkot/nama_jalan</code>
          <p>Get all nama jalan in Medan</p>

          <h5>Get All Lokasi</h5>
          <p style="font-weight: 700; display: inline; margin-right: 5px;">GET</p>
          <code style="font-weight: 700; ">http://localhost:8000/api/angkot/lokasi</code>
          <p>Get all lokasi in Medan</p>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">API Documentation</h5>
        </div>
      </div>
    </div> -->
  </div>
</div>
@endsection