@extends('layouts.app')

@section('styles')
<style>
    
    .h-screen{
        height: 100vh;
    }
    .w-screen{
        width: 100vw;
    }

</style>
@endsection

@section('content')

<div>
    <div class="h-screen w-screen row justify-content-center">

        <div class="col-md-3">
            <div class="d-flex flex-column justify-content-center h-screen">

                <img src="{{ asset('img/svgs/logo.svg') }}" height="64" alt="IEBC Logo">

                <h4 class="font-weight-bold mt-3 text-center">What do you own?</h4>
                <div class="card">
                    <div class="card-body">
                        <form class="d-block" action="{{ route('verification.code') }}" method="post" novalidate>
                            @csrf
                            <div>
                                <label for="code">Verification Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" required autofocus>
                                @error('code')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary btn-block">Verify</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="mt-3 text-center">We just sent you a verification code via your email. The code will expire after 5 minutes</div>
                <div class="font-weight-bold text-center text-primary mt-2">Please Resend the Code for verification</div>
            </div>
        </div>
        
    </div>
</div>
@endsection
