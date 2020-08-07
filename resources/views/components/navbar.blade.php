<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/svgs/logo.svg') }}" height="48" alt="IEBC Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    <!-- Some are here just for testing -->
                    <li class="nav-item"><a href="{{ route('admin.levels.index') }}" class="nav-link">Levels</a></li>
                    <li class="nav-item"><a href="{{ route('admin.positions.index') }}" class="nav-link">Positions</a></li>
                    <li class="nav-item"><a href="{{ route('admin.counties.index') }}" class="nav-link">Counties</a></li>
                    <li class="nav-item"><a href="{{ route('admin.constituencies.index') }}" class="nav-link">Constituencies</a></li>
                    <li class="nav-item"><a href="{{ route('admin.wards.index') }}" class="nav-link">Wards</a></li>
                    <li class="nav-item"><a href="{{ route('admin.roles.index') }}" class="nav-link">Roles</a></li>
                    <li class="nav-item"><a href="{{ route('admin.permissions.index') }}" class="nav-link">Permissions</a></li>
                    <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link">Users</a></li>
                    <li class="nav-item"><a href="{{ route('admin.candidates.index') }}" class="nav-link">Candidates</a></li>
                    <li class="nav-item"><a href="{{ route('admin.officers.index') }}" class="nav-link">Officers</a></li>
                    <li class="nav-item"><a href="{{ route('admin.stations.index') }}" class="nav-link">Polling Stations</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown no-arrow">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" 
                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false" v-pre>
                                
                                 <span class="mr-2 text-gray-600">{{ Auth::user()->name }}</span>
                                 <i class="fas fa-user fa-fw mr-2 text-gray-400"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>