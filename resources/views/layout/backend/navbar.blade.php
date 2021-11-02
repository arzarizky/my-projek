<nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li>
            <div class="mt-4 ">
                <a href="/beranda">
                    <span class="text-white">Beranda</span>
                </a>
            </div>
        </li>
        <li>
            <div class="mt-4 mx-3">
                <a href="{{route('jadwal')}}">
                    <span class="text-white">Jadwal</span>
                </a>
            </div>
        </li>
        <li>
            <div class="mt-4">
                    <a href="{{ route('iis') }}">
                        <span class="text-white">IIS</span>
                    </a> 
            </div>
        </li>
        <li>
            <div class="mt-4 mx-3">
                <a href="{{ route('incident') }}">
                    <span class="text-white">Incident</span>
                </a>
            </div>
        </li>
        <li>
            <div class="mt-4">
                <a href="{{ route('kontak') }}">
                    <span class="text-white">Kontak</span>
                </a>
            </div>
        </li>
        
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle"
                    src="{{ asset('images/backend/user.jpg') }}">
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
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>