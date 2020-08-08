<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" role="button" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/svgs/logo.svg') }}" height="48" alt="IEBC Logo">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Resources</div>

    <!-- Levels -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#levels-dropdown"
            aria-expanded="true" aria-controls="levels-dropdown">
            <i class="fas fa-fw fa-sort-amount-down-alt"></i>
            <span>Levels</span>
        </a>
        <div id="levels-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.levels.index') }}">Browse Levels</a>
                <a class="collapse-item" href="{{ route('admin.levels.create') }}">Add Level</a>
            </div>
        </div>
    </li>

    <!-- Positions -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#positions-dropdown"
            aria-expanded="true" aria-controls="positions-dropdown">
            <i class="fas fa-fw fa-sort-amount-up-alt"></i>
            <span>Positions</span>
        </a>
        <div id="positions-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.positions.index') }}">Browse Positions</a>
                <a class="collapse-item" href="{{ route('admin.positions.create') }}">Add Position</a>
            </div>
        </div>
    </li>

    <!-- Stations -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stations-dropdown"
            aria-expanded="true" aria-controls="stations-dropdown">
            <i class="fas fa-fw fa-store-alt"></i>
            <span>Polling Stations</span>
        </a>
        <div id="stations-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.stations.index') }}">Browse Stations</a>
                <a class="collapse-item" href="{{ route('admin.stations.create') }}">Add Station</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Locations</div>

    <!-- Counties -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#counties-dropdown"
            aria-expanded="true" aria-controls="counties-dropdown">
            <i class="fa fa-fw fa-flag"></i>
            <span>Counties</span>
        </a>
        <div id="counties-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.counties.index') }}">Browse Counties</a>
                <a class="collapse-item" href="{{ route('admin.counties.create') }}">Add County</a>
            </div>
        </div>
    </li>

    <!-- Constituencies -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#constituencies-dropdown"
            aria-expanded="true" aria-controls="constituencies-dropdown">
            <i class="fa fa-fw fa-flag"></i>
            <span>Constituencies</span>
        </a>
        <div id="constituencies-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.constituencies.index') }}">Browse Constituencies</a>
                <a class="collapse-item" href="{{ route('admin.constituencies.create') }}">Add Constituency</a>
            </div>
        </div>
    </li>

    <!-- Wards -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#wards-dropdown"
            aria-expanded="true" aria-controls="wards-dropdown">
            <i class="fa fa-fw fa-flag"></i>
            <span>Wards</span>
        </a>
        <div id="wards-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.wards.index') }}">Browse Wards</a>
                <a class="collapse-item" href="{{ route('admin.wards.create') }}">Add Ward</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Stakeholders</div>

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
                <a class="collapse-item" href="{{ route('admin.users.index') }}">Browse Voters</a>
                <a class="collapse-item" href="{{ route('admin.users.create') }}">Add Voter</a>
            </div>
        </div>
    </li>         

    <!-- Candidates -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#candidates-dropdown"
            aria-expanded="true" aria-controls="candidates-dropdown">
            <i class="fa fa-fw fa-user-friends"></i>
            <span>Candidates</span>
        </a>
        <div id="candidates-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.candidates.index') }}">Browse Candidates</a>
                <a class="collapse-item" href="{{ route('admin.candidates.create') }}">Add Candidate</a>
            </div>
        </div>
    </li>

    <!-- Officers -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#officers-dropdown"
            aria-expanded="true" aria-controls="officers-dropdown">
            <i class="fa fa-fw fa-users-cog"></i>
            <span>Officers</span>
        </a>
        <div id="officers-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.officers.index') }}">Browse Officers</a>
            </div>
        </div>
    </li>                

    <hr class="sidebar-divider">

    <div class="sidebar-heading">User Management</div>

    <!-- Roles -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#roles-dropdown"
            aria-expanded="true" aria-controls="roles-dropdown">
            <i class="fa fa-fw fa-users-cog"></i>
            <span>Roles</span>
        </a>
        <div id="roles-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.roles.index') }}">Browse Roles</a>
                <a class="collapse-item" href="{{ route('admin.roles.create') }}">Add Role</a>
            </div>
        </div>
    </li>
    
    <!-- Permissions -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#permissions-dropdown"
            aria-expanded="true" aria-controls="permissions-dropdown">
            <i class="fa fa-fw fa-users-cog"></i>
            <span>Permissions</span>
        </a>
        <div id="permissions-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.permissions.index') }}">Browse Permissions</a>
                <a class="collapse-item" href="{{ route('admin.permissions.create') }}">Add Permission</a>
            </div>
        </div>
    </li>                 



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>