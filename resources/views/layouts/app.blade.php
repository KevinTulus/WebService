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
  .fixed-sidebar {
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 999;
  }
    .bg-custom {
        background-color: #ff0000; /* Replace with your desired color */
    }
</style>
</head>
<header>
  	<!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <a class="navbar-brand d-flex align-items-center">
    <img class="logo-icon mr-2" src="{{ asset('images/angkot.png') }}" alt="Logo" style="max-height: 55px; max-width: 220px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Documentation</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
      @if(Auth::check())
        <a class="nav-link text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('images/user.png') }}" alt="Profile Picture" class="rounded-circle bg-white shadow-1-strong  mr-2" height="30" width="30">{{ Auth::user()->name }}
        </a>
        @endif
      </li>
    </ul>
  </div>
</nav>
</header>
<body>
  <!--sidebar-->
  <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto fixed-sidebar col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i>
                            <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                        <div class="card-body">
                                <span class="ms-1 d-none d-sm-inline text-dark">Welcome {{ Auth::user()->name }} !</span>
                        </div>
                        <hr>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a class="dropdown-item">                                 
                                </a>  
                                <a class="dropdown-item" href="{{ route('update.profile.page') }}">
                                    <i class="fas fa-user-circle mr-2"></i>Update Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item">                                 
                                </a>  
                                <a class="dropdown-item" href="{{ route('manage.api.page') }}">
                                    <i class="fas fa-cogs mr-2"></i>Manage API
                                </a>
                            </li>
                            <li>          
                                <a class="dropdown-item">                                 
                                </a>                         
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                </div>
            </div>
        </div>
        <!--content-->
        <div class="col py-4 padding: 0 100px;">
            @yield('content')
        </div>
    </div>
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