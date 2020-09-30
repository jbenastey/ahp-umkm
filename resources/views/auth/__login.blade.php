@extends('layouts.app')

@section('content')

    <!-- Login Container -->
    <div class="dt-login--container">

        <!-- Login Content -->
        <div class="dt-login__content-wrapper">

            <!-- Login Background Section -->
            <div class="dt-login__bg-section">

                <div class="dt-login__bg-content">
                    <!-- Login Title -->
                    <h1 class="dt-login__title">Login</h1>
                    <!-- /login title -->

                    <p class="f-16">Sign in and explore</p>
                </div>


                <!-- Brand logo -->
                <div class="dt-login__logo">
                    <a class="dt-brand__logo-link" href="">
                        <img class="dt-brand__logo-img" src="{{asset('drift/default/assets/images/logo-white.png')}}" alt="Drift">
                    </a>
                </div>
                <!-- /brand logo -->

            </div>
            <!-- /login background section -->

            <!-- Login Content Section -->
            <div class="dt-login__content">

                <!-- Login Content Inner -->
                <div class="dt-login__content-inner">

                    <!-- Form -->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <!-- Form Group -->
                        <div class="form-group">
                            <label class="sr-only" for="email-1">Email address</label>
                            <input id="email-1" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email" autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <label class="sr-only" for="password-1">Password</label>
                            <input id="password-1" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="dt-checkbox d-block mb-6">
                            <input type="checkbox" name="remember" id="checkbox-1" {{ old('remember') ? 'checked' : '' }}>
                            <label class="dt-checkbox-content" for="checkbox-1">
                                Keep me login on this device
                            </label>
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary text-uppercase">
                                {{ __('Login') }}
                            </button>
                            <span class="d-inline-block ml-4">Or
              <a class="d-inline-block font-weight-medium ml-3" href="{{route('register')}}">Create New Account</a>
            </span>
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <!-- /form group -->


                    </form>
                    <!-- /form -->

                </div>
                <!-- /login content inner -->

                <!-- Login Content Footer -->
                <div class="dt-login__content-footer">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Can’t access your account?</a>
                @endif
                </div>
                <!-- /login content footer -->

            </div>
            <!-- /login content section -->

        </div>
        <!-- /login content -->

    </div>
    <!-- /login container -->

@endsection
