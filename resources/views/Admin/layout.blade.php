<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>
        @hasSection('title')
            @yield('title')
        @else
            Admin Paneli
        @endif
    </title>
    <meta content="ROTEK YÖNETİM PANELİ" name="description"/>
    <meta content="ROTEK" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- jvectormap -->

    <link href="/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

    <link href="/assets/plugins/fullcalendar/vanillaCalendar.css" rel="stylesheet" type="text/css"/>

    <link href="/assets/plugins/morris/morris.css" rel="stylesheet">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    @yield('css')
</head>


<body class="fixed-left">

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
            <i class="ion-close"></i>
        </button>

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <!--<a href="index.html" class="logo"><i class="mdi mdi-assistant"></i>ROTEK</a>-->
                <a href="{{route('admin.index')}}" class="logo">
                    <img src="/assets/images/logo-lg.png" alt="" class="logo-large">
                </a>
            </div>
        </div>

        <div class="sidebar-inner niceScrollleft">

            <div id="sidebar-menu">
                <ul>
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="{{route('admin.index')}}" class="waves-effect">
                            <i class="material-icons">home</i>
                            <span> Anasayfa <span class="badge badge-pill badge-primary float-right"></span></span>
                        </a>
                    </li>


                    <li class="menu-title"></li>
                    <li class="menu-title">Demirbaş Yönetimi</li>
                    <li>
                        <a href="{{route('admin.products')}}" class="waves-effect"><i class="material-icons">inventory_2</i><span> Demirbaşlar </span></a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>


    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
                        <!-- language-->


                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown"
                               href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5>{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                                </div>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle m-r-5 text-muted"></i> Bilgilerim</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Çıkış yap</a>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                    </ul>

                    <div class="clearfix"></div>

                </nav>

            </div>
            <!-- Top Bar End -->

            <div class="page-content-wrapper ">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">

                                <h4 class="page-title">@yield('title')</h4>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>


                  @yield('content')
                </div><!-- container -->

            </div> <!-- Page content Wrapper -->

        </div> <!-- content -->

        <footer class="footer">
            © 2021 ROTEK ADMİN
        </footer>

    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/modernizr.min.js"></script>
<script src="/assets/js/detect.js"></script>
<script src="/assets/js/fastclick.js"></script>
<script src="/assets/js/jquery.blockUI.js"></script>
<script src="/assets/js/waves.js"></script>
<!-- Alertify js -->
<script src="/assets/plugins/alertify/js/alertify.js"></script>
<script src="/assets/pages/alertify-init.js"></script>
@yield('js')
<script src="/assets/js/jquery.nicescroll.js"></script>

<script src="/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>

<script src="/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="/assets/plugins/skycons/skycons.min.js"></script>

<script src="/assets/plugins/fullcalendar/vanillaCalendar.js"></script>

<script src="/assets/plugins/raphael/raphael-min.js"></script>

<script src="/assets/plugins/morris/morris.min.js"></script>

<script src="/assets/pages/dashborad.js"></script>


<!-- App js -->
<script src="/assets/js/app.js"></script>

@if(session()->has('success'))
    <script>
        alertify.success('{{session('success')}}')
    </script>
@endif
@if(session()->has('error'))
    <script>
        alertify.success('{{session('error')}}')
    </script>
@endif
</body>
</html>
