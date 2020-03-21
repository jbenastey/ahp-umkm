<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Drift - A fully responsive, HTML5 based admin template">
    <meta name="keywords"
          content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- /meta tags -->
    <title>Kuesioner</title>

    <!-- Site favicon -->
    <link rel="shortcut icon" href="{{asset('drift/default/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- /site favicon -->

    <!-- Font Icon Styles -->
    <link rel="stylesheet" href="{{asset('drift/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('drift/vendors/gaxon-icon/styles.css')}}">
    <!-- /font icon Styles -->

    <!-- Perfect Scrollbar stylesheet -->
    <link rel="stylesheet" href="{{asset('drift/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <!-- /perfect scrollbar stylesheet -->

    <!-- Load Styles -->
    <link href="{{asset('drift/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('drift/default/assets/css/light-style-1.min.css')}}">
    <!-- /load styles -->

</head>
<body class="dt-sidebar--fixed dt-header--fixed">
<!-- Loader -->
<div class="dt-loader-container">
    <div class="dt-loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>
</div>
<!-- /loader -->
<!-- Root -->
<div class="dt-root">
    <div class="dt-root__inner">
    @guest
        @yield('content')
    @else
        <!-- Header -->
        @include('layouts.header')
        <!-- /header -->
            <!-- Site Main -->
            <main class="dt-main">
                <!-- Sidebar -->
            @include('layouts.sidebar')
            <!-- /sidebar -->
                <!-- Site Content Wrapper -->
                <div class="dt-content-wrapper">
                @yield('content')
                <!-- Footer -->
                @include('layouts.footer')
                <!-- /footer -->
                </div>
                <!-- /site content wrapper -->
            </main>
        @endguest
    </div>
</div>
<!-- /root -->

<!-- Optional JavaScript -->
<script src="{{asset('drift/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('drift/node_modules/moment/moment.js')}}"></script>
<script src="{{asset('drift/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="{{asset('drift/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="{{asset('drift/node_modules/masonry-layout/dist/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('drift/node_modules/sweetalert2/dist/sweetalert.min.js')}}"></script>
<script src="{{asset('drift/default/assets/js/functions.js')}}"></script>
<script src="{{asset('drift/default/assets/js/customizer.js')}}"></script>
{{--<script src="{{asset('drift/node_modules/sweetalert2/dist/sweetalert2.js')}}"></script>--}}
<script src="{{asset('drift/node_modules/chart.js/dist/Chart.min.js')}}"></script>

<!-- Resources -->
<script src="{{asset('drift/node_modules/ammap3/ammap/ammap.js')}}"></script>
<script src="{{asset('drift/node_modules/ammap3/ammap/maps/js/continentsLow.js')}}"></script>
<script src="{{asset('drift/node_modules/ammap3/ammap/themes/light.js')}}"></script>

<script src="{{asset('drift/node_modules/amcharts3/amcharts/amcharts.js')}}"></script>
<script src="{{asset('drift/node_modules/amcharts3/amcharts/gauge.js')}}"></script>

<script src="{{asset('drift/default/assets/js/custom/charts/dashboard-default.js')}}"></script>
<!-- Custom JavaScript -->
<script src="{{('drift/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{('drift/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{('drift/default/assets/js/custom/data-table.js')}}"></script>
{{--<script src="{{asset('drift/default/assets/js/custom/sweet-alert.js')}}"></script>--}}
<script src="{{asset('drift/default/assets/js/script.js')}}"></script>

@include('sweet::alert')
</body>

</html>
