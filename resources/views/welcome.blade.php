@extends('layouts.app')

@section('content')
<!-- Login Container -->
<div class="dt-login--container dt-lock-screen">

    <!-- Login Content -->
    <div class="dt-login__content-wrapper">

        <!-- Avatar -->
        <img class="dt-avatar size-120" src="{{asset('drift/default/assets/images/logo/logo baru uin suska riau.jpg')}}" alt="Zakie chain">
        <!-- /avatar -->

        <h2 class="text-white display-1 font-weight-light mb-6">Kuesioner</h2>

        <!-- Form -->


            <div class="mb-5">
                <a class="btn btn-light" href="{{route('isi')}}">Isi Kuesioner</a>
            </div>

            <div>
                <a class="d-inline-block text-white f-16" href="{{route('home')}}">Login Admin</a>
            </div>

        <!-- /form -->

    </div>
    <!-- /login content -->

</div>
<!-- /login container -->
@endsection
