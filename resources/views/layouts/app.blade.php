<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/angkot.png" type="image/x-icon">
<link rel="shortcut icon" href="images/angkot.png" type="image/x-icon">
	<title>Angkot API</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
  .navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 9999;
  }
</style>
</head>
<header>
  	<!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  {{-- <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard.page') }}"> --}}
    <img class="logo-icon mr-2" src="{{ asset('images/angkot.png') }}" alt="Logo" style="max-height: 55px; max-width: 220px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        {{-- <a class="nav-link text-white" href="{{ route('dashboard.page') }}">Overview</a> --}}
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Documentation</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
      @if(Auth::check())
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('images/user.png') }}" alt="Profile Picture" class="rounded-circle bg-white shadow-1-strong  mr-2" height="30" width="30">{{ Auth::user()->name }}
        </a>
        @endif
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fas fa-user-circle mr-2"></i>Update Profile</a>
          <a class="dropdown-item" href="{{ route('user.token') }}"><i class="fas fa-cogs mr-2"></i>Manage API</a>
          <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</header>
<body>
	<!-- content -->
	<div class="container mt-5">
    @yield('content')
	</div>
<div class="container my-5">


</div>
<!-- footer -->
<footer class="bg-light text-dark">
    <div class="container p-4">
        <div class="row justify-content-between">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 100px; height: 100px;">
                    <img src="{{ asset('images/angkot.png') }}" height="50" alt="" loading="lazy" />
                </div>
                <p class="text-center mb-4">angkotAPI.com Lorem ipsum dolor sit amet.</p>
                <ul class="list-unstyled d-flex flex-row justify-content-center">
                    <li>
                        <a class="text-white px-2" href="#!">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a class="text-white px-2" href="#!">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a class="text-white ps-2" href="#!">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase mb-4">Contact</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <p><i class="fas fa-map-marker-alt pe-2"></i>Warsaw, 57 Street, Poland</p>
                    </li>
                    <li>
                        <p><i class="fas fa-phone pe-2"></i>+ 01 234 567 89</p>
                    </li>
                    <li>
                        <p><i class="fas fa-envelope pe-2 mb-0"></i>contact@example.com</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center py-2" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2023 angkotAPI.com
    </div>
</footer>
	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
