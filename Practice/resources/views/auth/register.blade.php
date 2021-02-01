@extends('layouts.frontend_master')

@section('frontend_content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Account</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>Register</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- checkout-area start -->
<div class="account-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="account-form form-style">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <p>User Name or Email Address *</p>
                    <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <p>Password *</p>
                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <p>Confirm Password *</p>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                    <div class="text-center">
                        <a href="{{ url('login') }}">Or Login</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@endsection
