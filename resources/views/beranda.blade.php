<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title ?? 'Beranda' }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/backend/sb-admin-2') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/backend/sb-admin-2') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('template/backend/sb-admin-2') }}/css/beranda.css" rel="stylesheet">

</head>

<body class="">
    <div class="container">
        <nav class="navbar navbar-expand topbar mb-4 static-top shadow custum">
            <a class="navbar-brand" href="#"><img src="assets/Finnet.png" alt="" width="100px"></a>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="nav-link">
                        <a href="/beranda">
                            <span>Beranda</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link">
                        <a href="{{ route('jadwal') }}">
                            <span>Jadwal</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link">
                        @can('user')
                            <a href="{{ route('iis') }}">
                                <span>IIS</span>
                            </a> 
                        @elseCan('admin')
                            <a href="{{ route('iis') }}">
                                <span>IIS</span>
                            </a>
                        @endCan
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link">
                        <a href="{{ route('incident') }}">
                            <span>Incident</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link">
                        <a href="{{ route('kontak') }}">
                            <span>Kontak</span>
                        </a>
                    </div>
                </li>        
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
                        <img class="img-profile rounded-circle"
                            src="{{ asset('template/backend/sb-admin-2') }}/img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        @can('admin')
                            <a class="dropdown-item" href="{{ route('user.index') }}" >
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Manage User
                            </a>
                        @endcan
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="container content">
          <div class="row">
              <div class="col-md-8">
                  <h1>SELAMAT DATANG</h1>
                  <h4>{{ Auth::user()->name }}, anda login sebagai {{ Auth::user()->role }}</h4>
                  <h5></h5>
              </div>
          </div>
      </div>
      <footer class="d-inline">
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-3">
                  <span>BANTUAN</span>
              </div>
              <div class="col-md-3">
                  <span>&copy; PT.FINNET INDONESIA</span>
              </div>
              <div class="col-md-3"></div>
          </div>
      </footer>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/backend/sb-admin-2') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('template/backend/sb-admin-2') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/backend/sb-admin-2') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/backend/sb-admin-2') }}/js/sb-admin-2.min.js"></script>

</body>