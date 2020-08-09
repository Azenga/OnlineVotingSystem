<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" role="button" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/svgs/logo.svg') }}" height="48" alt="IEBC Logo">
        </div>
        <div class="sidebar-brand-text mx-3">Officer</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('officer.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Voters -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#voters-dropdown"
            aria-expanded="true" aria-controls="voters-dropdown">
            <i class="fa fa-fw fa-users"></i>
            <span>Voters</span>
        </a>
        <div id="voters-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('officer.users.index') }}">Browse Voters</a>
                <a class="collapse-item" href="{{ route('officer.users.create') }}">Add Voter</a>
            </div>
        </div>
    </li>         

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>