@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper"><!--Login Page Starts-->
                    <section id="login" class="auth-height">
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="card-body auth-img">
                                            <div class="row m-0">
                                                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                                                    <img src="{{asset('apex/app-assets/img/gallery/register.png')}}" alt="" class="img-fluid" width="300" height="230">
                                                </div>
                                                <div class="col-lg-6 col-12 px-4 py-3">

                                                    <form action="{{ route('register') }}" method="POST">
                                                        <h4 class="card-title mb-2">Create Account</h4>
                                                        <p>Fill the below form to create a new account.</p>
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
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <a href="{{route('login')}}" class="btn bg-light-primary mb-2 mb-sm-0">Back To Login</a>
                                                            <button type="submit" class="btn btn-primary">Register</button>
                                                        </div>
                                                    </form>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Login Page Ends-->
                </div>
            </div>
            <!-- END : End Main Content-->
        </div>
    </div>
@endsection
