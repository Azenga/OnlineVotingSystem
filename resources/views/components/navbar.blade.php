<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/svgs/logo.svg') }}" height="40" alt="IEBC Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    <!-- Some are here just for testing -->
                    <li class="nav-item ml-0 ml-md-5"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item ml-0 ml-md-3"><a href="{{ route('home') }}" class="nav-link">About</a></li>
                    <li class="nav-item ml-0 ml-md-3"><a href="{{ route('home') }}" class="nav-link">Contact</a></li>
                    <li class="nav-item ml-0 ml-md-3"><a href="{{ route('home') }}" class="nav-link">FAQs</a></li>
                    <li class="nav-item ml-0 ml-md-3"><a href="{{ route('home') }}" class="nav-link">Results</a></li>
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
                                <a class="dropdown-item" href="{{ route('profile.show', Auth::user()) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                @can('view-admin-dashboard')
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <span>Admin Dashboard</span>
                                </a>
                                @endcan
                                @can('view-officer-dashboard', Model::class)
                                <a class="dropdown-item" href="{{ route('officer.dashboard') }}">
                                    <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <span>Officer Dashboard</span>
                                </a>
                                @endcan
                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>