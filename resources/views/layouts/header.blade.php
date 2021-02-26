<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title', 'Aplikasi Absen')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ff3945c924.js" crossorigin="anonymous" ></script>

  <!-- icons  -->
  <link href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><strong>AccessControl</strong> </div>
      <div class="list-group list-group-flush">
        <a href="/" class="list-group-item list-group-item-action bg-light">
            <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>
             Dashboard</a>
        <a href="/cardsdata" class="list-group-item list-group-item-action bg-light">
            <i class="fa fa-id-card mr-3" aria-hidden="true"></i>
             Cards</a>
        <a href="/schedules" class="list-group-item list-group-item-action bg-light">
            <i class="fa fa-calendar-check-o mr-3" aria-hidden="true"></i>
            Schedules</a>
             <a href="/dataabsen" class="list-group-item list-group-item-action bg-light">
            <i class="fa fa-list-ol mr-3" aria-hidden="true"></i>
             Attendance</a>
        {{-- <a href="#" class="list-group-item list-group-item-action bg-light">Home Control</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Rooms Control</a> --}}
        <a href="/settings" class="list-group-item list-group-item-action bg-light">
            <i class="fa fa-cogs mr-3" aria-hidden="true"></i>
            Settings</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">
            <i class="fa fa-exclamation-circle mr-3" aria-hidden="true"></i>
            About</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-light" id="menu-toggle">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid mb-5">
        <div class="container mt-5">
            @yield('content')
        </div><br>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://kit.fontawesome.com/ff3945c924.js" crossorigin="anonymous" ></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
