<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/svgs/logo.svg') }}" height="40" alt="IEBC Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mx-auto">

                    <!-- Some are here just for testing -->
                    <li class="nav-item ml-0 ml-md-3"><a href="{{ route('candidates.index') }}" class="nav-link">Aspirants</a></li>
                    <li class="nav-item ml-0 ml-md-3"><a href="{{ route('faqs') }}" class="nav-link">FAQs</a></li>
                    
                    @can('can-vote')
                    <li class="nav-item ml-0 ml-md-3"><a href="{{ route('vote') }}" class="nav-link">Cast Vote</a></li>
                    @endcan
                    
                    @auth
                        <li class="nav-item ml-0 ml-md-3"><a href="{{ route('results') }}" class="nav-link">Results</a></li>
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary px-5" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                                 <img height="40" width="40" class="rounded-circle" src="{{ Storage::disk('s3')->url(Auth::user()->image()) }}" alt="User Profile Pic">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show', Auth::user()) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                @can('view-admin-dashboard')
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <span>Dashboard</span>
                                </a>
                                @endcan
                                @can('view-officer-dashboard', Model::class)
                                <a class="dropdown-item" href="{{ route('officer.dashboard') }}">
                                    <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <span>Dashboard</span>
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