<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Finnet</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    @can('user')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('iis') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>  
    @elseCan('admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('iis') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endCan

    <!-- Divider -->
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link" href="{{ route('iis.alpro') }}">
            <span>Alpro Critical</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('iis.network')}}">
            <span>Network</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('iis.database')}}">
            <span>Database</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('iis.fraud')}}">
            <span>Fraud</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('iis.security')}}">
            <span>Security</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('iis.summary')}}">
            <span>Summary</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>