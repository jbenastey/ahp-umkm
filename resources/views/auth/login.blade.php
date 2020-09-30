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
                                                    <img src="{{asset('apex/app-assets/img/gallery/login.png')}}" alt="" class="img-fluid" width="300" height="230">
                                                </div>
                                                <div class="col-lg-6 col-12 px-4 py-3">

                                                    <form action="{{ route('login') }}" method="POST">
                                                        @csrf
                                                        <h4 class="mb-2 card-title">Login</h4>
                                                        <p>Welcome back, please login to your account.</p>

                                                        <input type="text" class="form-control mb-3 @error('email') is-invalid @enderror" placeholder="Username" name="email" value="{{ old('email') }}" required>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                        <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" placeholder="Password"name="password" required >
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                        <div class="d-sm-flex justify-content-between mb-3 font-small-2">
                                                            <div class="remember-me mb-2 mb-sm-0">
                                                                <div class="checkbox auth-checkbox">
                                                                    <input type="checkbox" name="remember" id="checkbox-1" {{ old('remember') ? 'checked' : '' }}>
                                                                    <label class="dt-checkbox-content" for="checkbox-1">
                                                                        Remember Me
                                                                    </label>                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <a class="btn bg-light-primary mb-2 mb-sm-0" href="{{route('register')}}">Register</a>

                                                            <button type="submit" class="btn btn-primary text-uppercase">
                                                                {{ __('Login') }}
                                                            </button>
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
