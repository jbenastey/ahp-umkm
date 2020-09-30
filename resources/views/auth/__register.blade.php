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
                    <h1 class="dt-login__title">Sign Up</h1>
                    <!-- /login title -->

                    <p class="f-16">Sign Up and explore </p>
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
                    <form action="{{route('register')}}" method="POST">
                        @csrf

                        <!-- Form Group -->
                        <div class="form-group">
                            <label class="sr-only" for="user-name">Name</label>
                            <input id="user-name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Name" autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <label class="sr-only" for="email-1">Email address</label>
                            <input id="email-1" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email" autocomplete="email">

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
                            <input id="password-1" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <label class="sr-only" for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary text-uppercase">
                                {{ __('Register') }}
                            </button>
                            <span class="d-inline-block ml-4">Or
              <a class="d-inline-block font-weight-medium ml-3" href="{{route('login')}}">Login</a>
            </span>
                        </div>
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
