@extends('layouts.app')

@section('content')
<div class="bg-gradient-primary" style="min-height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
    
            <div class="col-xl-10 col-lg-12 col-md-9">
    
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" style="min-height: 75vh">
                            <div class="col-lg-6 d-none d-md-flex flex-column justify-content-center align-items-center bg-gradient-light">
                                <div>
                                    <a href="/">
                                        <img src="{{ asset('img/svgs/logo.svg') }}" style="height: 5rem;" alt="Logo"/>
                                    </a>
                                </div>
                                <div class="px-5 mt-3">
                                    <img class="w-100" src="{{ asset('img/svgs/voting.svg') }}" alt="Voting Illustration">
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-center flex-column">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-700 mb-4 font-weight-bold">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mt-3">
                                            <input type="email" name="email" 
                                                class="form-control form-control-user py-2 px-3 @error('email') is-invalid @enderror"
                                                id="emailInput" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="mt-3">
                                            <input type="password" name="password" 
                                                class="form-control form-control-user py-2 px-3 @error('password') is-invalid @enderror"
                                                id="passwordInput" placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                        <div class="mt-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" 
                                                    class="custom-control-input" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block mt-3" type="submit">Login</button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
    
        </div>
    
    </div>
</div>
@endsection