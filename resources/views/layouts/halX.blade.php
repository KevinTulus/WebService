<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <!-- Bootstrap -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  {{-- <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
  <!-- Font Awesome -->
  <link href="{{ asset('/') }}assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
</head>
<body>
  <div class="sidebar" role="cdb-sidebar">
    <div class="sidebar-container">
      <div class="sidebar-header">
        <a class="sidebar-brand">Contrast</a>
        <a class="sidebar-toggler"><i class="fa fa-bars"></i></a>
      </div>
      <div class="sidebar-nav">
        <div class="sidenav">
          <a class="sidebar-item">
            <div class="sidebar-item-content">
              <i class="fa fa-th-large sidebar-icon sidebar-icon-lg"></i>
              <span>Dashboard</span>
              <div class="suffix">
                <div class="badge rounded-pill bg-danger">new</div>
              </div>
            </div>
          </a>
          <a class="sidebar-item">
            <div class="sidebar-item-content">
              <i class="fa fa-sticky-note sidebar-icon"></i>
              <span>Components</span>
            </div>
          </a>
          <a class="sidebar-item">
            <div class="sidebar-item-content">
              <i class="fa fa-sticky-note sidebar-icon"></i>
              <span>Bootstrap</span>
            </div>
          </a>
        </div>
        <div class="sidebar-footer">Sidebar Footer</div>
      </div>
    </div>
  </div>
  {{-- <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
</body>
</html>
