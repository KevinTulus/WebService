<!doctype html>
<html lang="en">

<head>
  <title>Angkot | {{ $title }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}assets/dist/sidebarcss/style.css">
  <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/fontawesome/css/all.min.css">
  {{-- <meta name="robots" content="noindex, follow"> --}}
</head>
<body>
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
        </button>
      </div>
      @include('partials.psidebar')
      @include('partials.sidebar')
    </nav>
    <div id="content" class="p-4 p-md-5 pt-5">
      @yield('admin')
    </div>
  </div>

  <script src="{{ asset('/') }}assets/dist/sidebarjs/jquery.min.js"></script>
  <script src="{{ asset('/') }}assets/dist/sidebarjs/popper.js"></script>
  <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="{{ asset('/') }}assets/dist/sidebarjs/bootstrap.min.js"></script>
  <script src="{{ asset('/') }}assets/dist/sidebarjs/main.js"></script>
  <script defer
    src="{{ asset('/') }}assets/dist/cloudfareinsights/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
    integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
    data-cf-beacon='{"rayId":"7c89b6566b2389a1","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}'
    crossorigin="anonymous"></script>
</body>

</html>