<!DOCTYPE html>
<!--
Template Name: Apex - Bootstrap 4 Admin Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/apex_admin
Renew Support: https://1.envato.market/apex_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Nafsha">
    <title>AHP - UMKM</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('apex/app-assets/img/ico/favicon-32.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('apex/app-assets/img/ico/favicon-32.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="{{asset('apex/app-assets/css/css0491.css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900')}}" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/vendors/css/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/vendors/css/chartist.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/themes/layout-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('apex/app-assets/css/plugins/switchery.min.css')}}">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/pages/dashboard1.min.css')}}">
    <link rel="stylesheet" href="{{asset('apex/app-assets/css/pages/page-maintenance.min.css')}}">
    <link rel="stylesheet" href="{{asset('apex/app-assets/css/pages/authentication.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('apex/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

@guest
    <body class="vertical-layout vertical-menu 1-column auth-page navbar-sticky blank-page" data-menu="vertical-menu" data-col="1-column">
    @yield('content')
@else
    <body class="vertical-layout vertical-menu 2-columns navbar-sticky" data-menu="vertical-menu" data-col="2-columns">

    @include('layouts.header')

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


        <!-- main menu-->
        @include('layouts.sidebar')

        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper"><!--Statistics cards Starts-->
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card gradient-purple-love">
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div class="media pb-1">
                                            <div class="media-body white text-left">
                                                <h3 class="font-large-1 white mb-0">$2,156</h3>
                                                <span>Total Tax</span>
                                            </div>
                                            <div class="media-right white text-right">
                                                <i class="ft-activity font-large-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card gradient-ibiza-sunset">
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div class="media pb-1">
                                            <div class="media-body white text-left">
                                                <h3 class="font-large-1 white mb-0">$15,678</h3>
                                                <span>Total Cost</span>
                                            </div>
                                            <div class="media-right white text-right">
                                                <i class="ft-percent font-large-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Widget-line-chart1" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card gradient-mint">
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div class="media pb-1">
                                            <div class="media-body white text-left">
                                                <h3 class="font-large-1 white mb-0">$45,668</h3>
                                                <span>Total Sales</span>
                                            </div>
                                            <div class="media-right white text-right">
                                                <i class="ft-trending-up font-large-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card gradient-king-yna">
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div class="media pb-1">
                                            <div class="media-body white text-left">
                                                <h3 class="font-large-1 white mb-0">$32,454</h3>
                                                <span>Total Earning</span>
                                            </div>
                                            <div class="media-right white text-right">
                                                <i class="ft-credit-card font-large-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Statistics cards Ends-->

                    <!--Line with Area Chart 1 Starts-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">PRODUCTS SALES</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="chart-info mb-3 ml-3">
                                            <span class="gradient-purple-bliss d-inline-block rounded-circle mr-1" style="width:15px; height:15px;"></span>
                                            Sales
                                            <span class="gradient-mint d-inline-block rounded-circle mr-1 ml-2" style="width:15px; height:15px;"></span>
                                            Visits
                                        </div>
                                        <div id="line-area" class="height-350 lineArea">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Line with Area Chart 1 Ends-->

                    <div class="row match-height">
                        <div class="col-xl-4 col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="font-medium-2 text-center my-2">Last 6 Months Sales</p>
                                        <div id="Stack-bar-chart" class="height-300 Stackbarchart mb-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-12 col-12">
                            <div class="card shopping-cart">
                                <div class="card-header pb-2">
                                    <h4 class="card-title mb-1">Shopping Cart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table text-center m-0">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><img class="height-50" src="../app-assets/img/elements/01.png" alt="Generic placeholder image" /></td>
                                                    <td>Espresso</td>
                                                    <td>1</td>
                                                    <td>
                                                        <span class="badge badge-pill bg-light-primary cursor-pointer">Active</span>
                                                    </td>
                                                    <td>$19.94</td>
                                                    <td>
                                                        <i class="ft-trash-2"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img class="height-50" src="../app-assets/img/elements/15.png" alt="Generic placeholder image" /></td>
                                                    <td>iPhone</td>
                                                    <td>2</td>
                                                    <td>
                                                        <span class="badge badge-pill bg-light-danger cursor-pointer">Disabled</span>
                                                    </td>
                                                    <td>$99.00</td>
                                                    <td>
                                                        <i class="ft-trash-2"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img class="height-50" src="../app-assets/img/elements/11.png" alt="Generic placeholder image" /></td>
                                                    <td>iMac</td>
                                                    <td>1</td>
                                                    <td>
                                                        <span class="badge badge-pill bg-light-info cursor-pointer">Paused</span>
                                                    </td>
                                                    <td>$299.00</td>
                                                    <td>
                                                        <i class="ft-trash-2"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img class="height-50" src="../app-assets/img/elements/14.png" alt="Generic placeholder image" /></td>
                                                    <td>iWatch</td>
                                                    <td>2</td>
                                                    <td>
                                                        <span class="badge badge-pill bg-light-success cursor-pointer">Active</span>
                                                    </td>
                                                    <td>$24.51</td>
                                                    <td>
                                                        <i class="ft-trash-2"></i>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row match-height">
                        <div class="col-xl-8 col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Visit & Sales Statistics</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="chart-info mb-2">
                                            <span class="text-uppercase mr-3"><i class="fa fa-circle success font-small-2 mr-1"></i> Sales</span>
                                            <span class="text-uppercase"><i class="fa fa-circle info font-small-2 mr-1"></i> Visits</span>
                                        </div>
                                        <div id="line-area2" class="height-400 lineAreaDashboard">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-12">
                            <div class="card gradient-purple-bliss">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title white">Statistics</h4>
                                        <div class="p-2 text-center">
                                            <a class="white font-medium-1">Month</a>
                                            <a class="btn round bg-light-info mx-3 px-3">Week</a>
                                            <a class="white font-medium-1">Day</a>
                                        </div>
                                        <div class="my-3 text-center white">
                                            <div class="font-large-2 d-block mb-1">
                                                <span>$78.89</span>
                                                <i class="ft-arrow-up font-large-2"></i>
                                            </div>
                                            <span class="font-medium-1">Week2 +15.44</span>
                                        </div>
                                    </div>
                                    <div id="lineChart" class="height-250 lineChart lineChartShadow"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row match-height">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                </div>
                                <div class="card-content">

                                    <p class="font-medium-2 text-center mb-0 mt-2">Hobbies</p>
                                    <div id="bar-chart" class="height-250 BarChartShadow BarChart">
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col text-center">
                                                <span class="gradient-starfall d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                                                <span class="font-medium-4 d-block mb-2">48</span>
                                                <span class="font-small-3">Sport</span>
                                            </div>
                                            <div class="col text-center">
                                                <span class="gradient-mint d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                                                <span class="font-medium-4 d-block mb-2">9</span>
                                                <span class="font-small-3">Music</span>
                                            </div>
                                            <div class="col text-center">
                                                <span class="gradient-purple-bliss d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                                                <span class="font-medium-4 d-block mb-2">26</span>
                                                <span class="font-small-3">Travel</span>
                                            </div>
                                            <div class="col text-center">
                                                <span class="gradient-ibiza-sunset d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                                                <span class="font-medium-4 d-block mb-2">17</span>
                                                <span class="font-small-3">News</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">User List</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media pt-0 pb-2">
                                            <img class="mr-3 avatar" src="../app-assets/img/portrait/small/avatar-s-12.png" alt="Avatar" width="35">
                                            <div class="media-body">
                                                <h4 class="font-medium-1 mb-0">Jessica Rice</h4>
                                                <p class="text-muted font-small-3 m-0">UX Designer</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="dash-checkbox1" checked="">
                                                    <label for="dash-checkbox1"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media py-2">
                                            <img class="mr-3 avatar" src="../app-assets/img/portrait/small/avatar-s-11.png" alt="Avatar" width="35">
                                            <div class="media-body">
                                                <h4 class="font-medium-1 mb-0">Jacob Rios</h4>
                                                <p class="text-muted font-small-3 m-0">HTML Developer</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="dash-checkbox2">
                                                    <label for="dash-checkbox2"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media py-2">
                                            <img class="mr-3 avatar" src="../app-assets/img/portrait/small/avatar-s-3.png" alt="Avatar" width="35">
                                            <div class="media-body">
                                                <h4 class="font-medium-1 mb-0">Russell Delgado</h4>
                                                <p class="text-muted font-small-3 m-0">Database Designer</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="dash-checkbox3">
                                                    <label for="dash-checkbox3"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media py-2">
                                            <img class="mr-3 avatar" src="../app-assets/img/portrait/small/avatar-s-22.png" alt="Avatar" width="35">
                                            <div class="media-body">
                                                <h4 class="font-medium-1 mb-0">Sara McDonald</h4>
                                                <p class="text-muted font-small-3 m-0">Team Leader</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="dash-checkbox4" checked="">
                                                    <label for="dash-checkbox4"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media py-2">
                                            <img class="mr-3 avatar" src="../app-assets/img/portrait/small/avatar-s-18.png" alt="Avatar" width="35">
                                            <div class="media-body">
                                                <h4 class="font-medium-1 mb-0">Janet Lucas</h4>
                                                <p class="text-muted font-small-3 m-0">Project Manger</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="dash-checkbox5">
                                                    <label for="dash-checkbox5"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media py-2">
                                            <img class="mr-3 avatar" src="../app-assets/img/portrait/small/avatar-s-21.png" alt="Avatar" width="35">
                                            <div class="media-body">
                                                <h4 class="font-medium-1 mb-0">Mark Carter</h4>
                                                <p class="text-muted font-small-3 m-0">HTML Developer</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="dash-checkbox6" checked>
                                                    <label for="dash-checkbox6"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-2">
                                            <button type="button" class="btn bg-light-primary">Add New</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Project Stats</h4>
                                </div>
                                <div class="card-content">

                                    <p class="font-medium-2 text-center mb-0 mt-2">Project Tasks</p>
                                    <div id="donut-dashboard-chart" class="height-250 donut">
                                    </div>

                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <span class="mb-1 text-muted d-block">23% - Started</span>
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 23%;" aria-valuenow="23"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <span class="mb-1 text-muted d-block">28% - Done</span>
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 28%;" aria-valuenow="28"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col">
                                                <span class="mb-1 text-muted d-block">35% - Remaining</span>
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 35%;"
                                                         aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <span class="mb-1 text-muted d-block">14% - In Progress</span>
                                                <div class="progress" style="height: 5px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 14%;" aria-valuenow="14"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END : End Main Content-->

            <!-- BEGIN : Footer-->
            <footer class="footer undefined undefined">
                <p class="clearfix text-muted m-0"><span>Copyright  &copy; 2020 &nbsp;</span><a href="../../../themeforest.net/user/pixinvent/portfolioc32a.html?ref=pixinvent" id="pixinventLink" target="_blank">PIXINVENT</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
            </footer>
            <!-- End : Footer--><!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@endguest

<!-- START Notification Sidebar-->
<aside class="notification-sidebar d-none d-sm-none d-md-block" id="notification-sidebar"><a class="notification-sidebar-close"><i class="ft-x font-medium-3 grey darken-1"></i></a>
    <div class="side-nav notification-sidebar-content">
        <div class="row">
            <div class="col-12 notification-nav-tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="activity-tab" href="#activity-tab" aria-expanded="true">Activity</a></li>
                    <li class="nav-item"><a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="settings-tab" href="#settings-tab" aria-expanded="false">Settings</a></li>
                </ul>
            </div>
            <div class="col-12 notification-tab-content">
                <div class="tab-content">
                    <div class="row tab-pane active" id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1">
                        <div class="col-12" id="activity">
                            <h5 class="my-2 text-bold-500">System Logs</h5>
                            <div class="timeline-left timeline-wrapper mb-3" id="timeline-1">
                                <ul class="timeline">
                                    <li class="timeline-line mt-4"></li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-download primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>New Update Available</span><span class="float-right grey font-italic font-small-2">1 min ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Android Pie 9.0.0_r52v availabe (658MB).</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Download Now!</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="../app-assets/img/portrait/small/avatar-s-15.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Reminder!</span><span class="float-right grey font-italic font-small-2">52 min ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Your meeting is scheduled with Mr. Derrick Walters at 16:00.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Snooze</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="../app-assets/img/portrait/small/avatar-s-16.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Recieved a File</span><span class="float-right grey font-italic font-small-2">4 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Christina Rogers sent you a file for the next conference.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><img src="../app-assets/img/icons/sketch-mac-icon.png" alt="icon" width="20"><span class="text-bold-500 ml-2">Diamond.sketch</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-mic primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Voice Message</span><span class="float-right grey font-italic font-small-2">10 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Natalya Parker sent you a voice message.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Listen</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-cloud-drizzle primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Weather Update</span><span class="float-right grey font-italic font-small-2">Yesterday</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Hi John! It is a rainy day with 16&deg;C.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="my-2 text-bold-500">Applications Logs</h5>
                            <div class="timeline-left timeline-wrapper" id="timeline-2">
                                <ul class="timeline">
                                    <li class="timeline-line mt-4"></li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="../app-assets/img/portrait/small/avatar-s-26.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Gmail</span><span class="float-right grey font-italic font-small-2">Just now</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Victoria Hampton sent you a mail and has a file attachment with it.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><img src="../app-assets/img/icons/pdf.png" alt="pdf icon" width="20"><span class="text-bold-500 ml-2">Register.pdf</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-droplet primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>MakeMyTrip</span><span class="float-right grey font-italic font-small-2">7 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Your next flight for San Francisco will be on 24th March.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Important</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="../app-assets/img/portrait/small/avatar-s-23.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>CNN</span><span class="float-right grey font-italic font-small-2">16 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">U.S. investigating report says email account linked to CIA Director was hacked.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Read full article</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-map primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Maps</span><span class="float-right grey font-italic font-small-2">Yesterday</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">You visited Walmart Supercenter in Chicago.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Write a Review!</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-package primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Updates Available</span><span class="float-right grey font-italic font-small-2">2 days ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">19 app updates found.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row tab-pane" id="settings-tab" aria-labelledby="base-tab2">
                        <div class="col-12" id="settings">
                            <h5 class="mt-2 mb-3">General Settings</h5>
                            <ul class="list-unstyled mb-0 mx-2">
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Notifications</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-1" type="checkbox">
                                                <label class="custom-control-label" for="noti-s-switch-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Use switches when looking for yes or no answers.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Show recent activity</span>
                                        <div class="float-right">
                                            <div class="checkbox">
                                                <input id="noti-s-checkbox-1" type="checkbox" checked>
                                                <label for="noti-s-checkbox-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">The "for" attribute is necessary to bind checkbox with the input.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Product Update</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-4" type="checkbox" checked>
                                                <label class="custom-control-label" for="noti-s-switch-4"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Message and mail me on weekly product updates.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Email on Follow</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-3" type="checkbox">
                                                <label class="custom-control-label" for="noti-s-switch-3"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Mail me when someone follows me.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Announcements</span>
                                        <div class="float-right">
                                            <div class="checkbox">
                                                <input id="noti-s-checkbox-2" type="checkbox" checked>
                                                <label for="noti-s-checkbox-2"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Receive all the news and announcements from my clients.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Date and Time</span>
                                        <div class="float-right">
                                            <div class="checkbox">
                                                <input id="noti-s-checkbox-3" type="checkbox">
                                                <label for="noti-s-checkbox-3"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Show date and time on top of every page.</p>
                                </li>
                                <li>
                                    <div class="mb-1"><span class="text-bold-500">Email on Comments</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-2" type="checkbox" checked>
                                                <label class="custom-control-label" for="noti-s-switch-2"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Mail me when someone comments on my article.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- END Notification Sidebar-->
<!-- Theme customizer Starts-->
<div class="customizer d-none d-lg-none d-xl-block"><a class="customizer-close"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-primary" id="customizer-toggle-icon"><i class="ft-settings font-medium-1 spinner white align-middle"></i></a>
    <div class="customizer-content p-3 ps-container ps-theme-dark" data-ps-id="df6a5ce4-a175-9172-4402-dabd98fc9c0a">
        <h4 class="text-uppercase">Theme Customizer</h4>
        <p>Customize & Preview in Real Time</p>
        <!-- Layout Options Starts-->
        <div class="ct-layout">
            <hr>
            <h6 class="mb-3 d-flex align-items-center"><i class="ft-layout font-medium-2 mr-2"></i><span>Layout Options</span></h6>
            <div class="layout-switch">
                <div class="radio radio-sm d-inline-block light-layout mr-3">
                    <input id="ll-switch" type="radio" name="layout-switch" checked>
                    <label for="ll-switch">Light</label>
                </div>
                <div class="radio radio-sm d-inline-block dark-layout mr-3">
                    <input id="dl-switch" type="radio" name="layout-switch">
                    <label for="dl-switch">Dark</label>
                </div>
                <div class="radio radio-sm d-inline-block transparent-layout">
                    <input id="tl-switch" type="radio" name="layout-switch">
                    <label for="tl-switch">Transparent</label>
                </div>
            </div>
            <!-- Layout Options Ends-->
        </div>
        <!-- Navbar Types-->
        <div class="ct-navbar-type">
            <hr>
            <h6 class="mb-3 d-flex align-items-center"><i class="ft-more-horizontal- font-medium-2 mr-2"></i><span>Navbar Type</span></h6>
            <div class="navbar-switch">
                <div class="radio radio-sm d-inline-block nav-static mr-3">
                    <input id="nav-static" type="radio" name="navbar-switch" checked="checked">
                    <label for="nav-static">Static</label>
                </div>
                <div class="radio radio-sm d-inline-block nav-fixed">
                    <input id="nav-fixed" type="radio" name="navbar-switch">
                    <label for="nav-fixed">Fixed</label>
                </div>
            </div>
        </div>
        <!-- Sidebar Options Starts-->
        <div class="ct-bg-color">
            <hr>
            <h6 class="sb-options d-flex align-items-center mb-3"><i class="ft-droplet font-medium-2 mr-2"></i><span>Sidebar Color Options</span></h6>
            <div class="cz-bg-color sb-color-options">
                <div class="row mb-3">
                    <div class="col px-2"><span class="gradient-mint d-block rounded" style="width:30px; height:30px;" data-bg-color="mint"></span></div>
                    <div class="col px-2"><span class="gradient-king-yna d-block rounded" style="width:30px; height:30px;" data-bg-color="king-yna"></span></div>
                    <div class="col px-2"><span class="gradient-ibiza-sunset d-block rounded" style="width:30px; height:30px;" data-bg-color="ibiza-sunset"></span></div>
                    <div class="col px-2"><span class="gradient-flickr d-block rounded" style="width:30px; height:30px;" data-bg-color="flickr"></span></div>
                    <div class="col px-2"><span class="gradient-purple-bliss d-block rounded" style="width:30px; height:30px;" data-bg-color="purple-bliss"></span></div>
                    <div class="col px-2"><span class="gradient-man-of-steel d-block rounded" style="width:30px; height:30px;" data-bg-color="man-of-steel"></span></div>
                    <div class="col px-2"><span class="gradient-purple-love d-block rounded" style="width:30px; height:30px;" data-bg-color="purple-love"></span></div>
                </div>
                <div class="row">
                    <div class="col px-2"><span class="bg-black d-block rounded" style="width:30px; height:30px;" data-bg-color="black"></span></div>
                    <div class="col px-2"><span class="bg-grey bg-lighten-3 d-block rounded" style="width:30px; height:30px;" data-bg-color="white"></span></div>
                    <div class="col px-2"><span class="bg-primary bg-darken-1 d-block rounded" style="width:30px; height:30px;" data-bg-color="primary"></span></div>
                    <div class="col px-2"><span class="bg-success bg-darken-1 d-block rounded" style="width:30px; height:30px;" data-bg-color="success"></span></div>
                    <div class="col px-2"><span class="bg-warning bg-darken-1 d-block rounded" style="width:30px; height:30px;" data-bg-color="warning"></span></div>
                    <div class="col px-2"><span class="bg-info bg-darken-1 d-block rounded" style="width:30px; height:30px;" data-bg-color="info"></span></div>
                    <div class="col px-2"><span class="bg-danger bg-darken-1 d-block rounded" style="width:30px; height:30px;" data-bg-color="danger"></span></div>
                </div>
            </div>
            <!-- Sidebar Options Ends-->
            <!-- Transparent BG Image Ends-->
            <div class="tl-bg-img">
                <h6 class="d-flex align-items-center mb-3"><i class="ft-star font-medium-2 mr-2"></i><span>Background Colors with Shades</span></h6>
                <div class="cz-tl-bg-image row">
                    <div class="col-sm-3">
                        <div class="rounded bg-glass-1 ct-glass-bg" data-bg-image="bg-glass-1"></div>
                    </div>
                    <div class="col-sm-3">
                        <div class="rounded bg-glass-2 ct-glass-bg" data-bg-image="bg-glass-2"></div>
                    </div>
                    <div class="col-sm-3">
                        <div class="rounded bg-glass-3 ct-glass-bg" data-bg-image="bg-glass-3"></div>
                    </div>
                    <div class="col-sm-3">
                        <div class="rounded bg-glass-4 ct-glass-bg" data-bg-image="bg-glass-4"></div>
                    </div>
                </div>
            </div>
            <!-- Transparent BG Image Ends-->
        </div>
        <!-- Sidebar BG Image Starts-->
        <div class="ct-bg-image">
            <hr>
            <h6 class="sb-bg-img d-flex align-items-center mb-3"><i class="ft-sidebar font-medium-2 mr-2"></i><span>Sidebar Bg Image</span></h6>
            <div class="cz-bg-image row sb-bg-img">
                <div class="col-2 px-2"><img class="rounded sb-bg-01" src="../app-assets/img/sidebar-bg/01.jpg" alt="sidebar bg image" width="90"></div>
                <div class="col-2 px-2"><img class="rounded sb-bg-02" src="../app-assets/img/sidebar-bg/02.jpg" alt="sidebar bg image" width="90"></div>
                <div class="col-2 px-2"><img class="rounded sb-bg-03" src="../app-assets/img/sidebar-bg/03.jpg" alt="sidebar bg image" width="90"></div>
                <div class="col-2 px-2"><img class="rounded sb-bg-04" src="../app-assets/img/sidebar-bg/04.jpg" alt="sidebar bg image" width="90"></div>
                <div class="col-2 px-2"><img class="rounded sb-bg-05" src="../app-assets/img/sidebar-bg/05.jpg" alt="sidebar bg image" width="90"></div>
                <div class="col-2 px-2"><img class="rounded sb-bg-06" src="../app-assets/img/sidebar-bg/06.jpg" alt="sidebar bg image" width="90"></div>
            </div>
            <!-- Transparent Layout Bg color Options-->
            <div class="tl-color-option">
                <h6 class="tl-color-options d-flex align-items-center mb-3"><i class="ft-droplet font-medium-2 mr-2"></i><span>Background Colors</span></h6>
                <div class="cz-tl-bg-color">
                    <div class="row">
                        <div class="col"><span class="bg-glass-hibiscus d-block rounded ct-color-bg" style="width:30px; height:30px;" data-bg-color="bg-glass-hibiscus"></span></div>
                        <div class="col"><span class="bg-glass-purple-pizzazz d-block rounded ct-color-bg" style="width:30px; height:30px;" data-bg-color="bg-glass-purple-pizzazz"></span></div>
                        <div class="col"><span class="bg-glass-blue-lagoon d-block rounded ct-color-bg" style="width:30px; height:30px;" data-bg-color="bg-glass-blue-lagoon"></span></div>
                        <div class="col"><span class="bg-glass-electric-violet d-block rounded ct-color-bg" style="width:30px; height:30px;" data-bg-color="bg-glass-electric-violet"></span></div>
                        <div class="col"><span class="bg-glass-portage d-block rounded ct-color-bg" style="width:30px; height:30px;" data-bg-color="bg-glass-portage"></span></div>
                        <div class="col"><span class="bg-glass-tundora d-block rounded ct-color-bg" style="width:30px; height:30px;" data-bg-color="bg-glass-tundora"></span></div>
                    </div>
                </div>
            </div>
            <!-- Transparent Layout Bg color Ends-->
        </div>
        <!-- Sidebar BG Image Toggle Starts-->
        <div class="ct-bg-image-toggler">
            <div class="togglebutton toggle-sb-bg-img">
                <hr>
                <div class="switch"><span>Sidebar Bg Image</span>
                    <div class="float-right">
                        <div class="checkbox">
                            <input class="cz-bg-image-display" id="sidebar-bg-img" type="checkbox" checked>
                            <label for="sidebar-bg-img"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar BG Image Toggle Ends-->
        <!-- Compact Menu Starts-->
        <div class="ct-compact-toggler">
            <hr>
            <div class="togglebutton">
                <div class="switch"><span>Compact Menu</span>
                    <div class="float-right">
                        <div class="checkbox">
                            <input class="cz-compact-menu" id="cz-compact-menu" type="checkbox">
                            <label for="cz-compact-menu"></label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Compact Menu Ends-->
        </div>
        <!-- Sidebar Width Starts-->
        <div class="ct-sidebar-size">
            <hr>
            <p>Sidebar Width</p>
            <div class="cz-sidebar-width btn-group btn-group-toggle" id="cz-sidebar-width" data-toggle="buttons">
                <label class="btn btn-outline-primary">
                    <input id="cz-btn-radio-1" type="radio" name="cz-btn-radio" value="small"><span>Small</span>
                </label>
                <label class="btn btn-outline-primary active">
                    <input id="cz-btn-radio-2" type="radio" name="cz-btn-radio" value="medium" checked><span>Medium</span>
                </label>
                <label class="btn btn-outline-primary">
                    <input id="cz-btn-radio-3" type="radio" name="cz-btn-radio" value="large"><span>Large</span>
                </label>
            </div>
        </div>
        <!-- Sidebar Width Ends-->
    </div>
</div>
<!-- Theme customizer Ends-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('apex/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('apex/app-assets/vendors/js/switchery.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('apex/app-assets/vendors/js/chartist.min.js')}}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="{{asset('apex/app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('apex/app-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('apex/app-assets/js/notification-sidebar.min.js')}}"></script>
<script src="{{asset('apex/app-assets/js/customizer.min.js')}}"></script>
<script src="{{asset('apex/app-assets/js/scroll-top.min.js')}}"></script>
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('apex/app-assets/js/dashboard1.min.js')}}"></script>
<!-- END PAGE LEVEL JS-->
<!-- BEGIN: Custom CSS-->
<script src="{{asset('apex/assets/js/scripts.js')}}"></script>
<!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>
