<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        @isset($title)
            {{ $title }} |
        @else
            slot title
        @endisset {{ config('app.name') }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="@isset($title) {{ $title }} | @else slot title  @endisset {{ config('app.name') }}"
        name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('backend/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/libs/owl.carousel/assets/owl.theme.default.min.css') }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}">

    <!-- DataTables -->
    <link href="{{ asset('/') }}backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('/') }}backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('/') }}backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />


    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- leaflet Css -->
    <link href="{{ asset('backend/libs/leaflet/leaflet.css" rel="stylesheet') }}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    {{-- --------------------------- --}}
    @include('template::layouts.includes.styles')
    <style>
        .webside_logo {
            height: 70px !important;
            width: 203px !important;
        }
    </style>
</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    @php
        $softwaresetting = Modules\User\Models\SoftwareSetting::first();
        $users = auth()->user();
        //   dd($softwaresetting);
    @endphp
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('backend/images/logo.svg') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('storage/' . $softwaresetting->website_logo) }}" alt=""
                                    height="70" width="203">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('backend/images/logo-light.svg') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('storage/' . $softwaresetting->website_logo) }}" alt=""
                                    height="70" width="203">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="px-3 btn btn-sm font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="p-0 dropdown-menu dropdown-menu-lg dropdown-menu-end"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="m-0 form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bx bx-bell bx-tada"></i>
                            <span class="badge bg-danger rounded-pill">0</span>
                        </button>
                        <div class="p-0 dropdown-menu dropdown-menu-lg dropdown-menu-end"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small" key="t-view-all"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">

                            </div>
                            <div class="p-2 border-top d-grid">
                                <a class="text-center btn btn-sm btn-link font-size-14" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View
                                        More..</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('storage/' . $users->profile_picture) }}" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ $users->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('user.profile') }}"><i
                                    class="align-middle bx bx-user font-size-16 me-1"></i> <span
                                    key="t-profile">Profile</span></a>
                            <a class="dropdown-item" href="{{ route('user.password') }}"><i
                                    class="align-middle bx bx-key font-size-16 me-1"></i>
                                <span key="t-my-wallet">Change Password</span></a>
                            {{-- <a class="dropdown-item d-block" href="#"><span
                                    class="badge bg-success float-end">11</span><i
                                    class="align-middle bx bx-wrench font-size-16 me-1"></i> <span
                                    key="t-settings">Settings</span></a> --}}
                            {{-- <a class="dropdown-item" href="#"><i
                                    class="align-middle bx bx-lock-open font-size-16 me-1"></i> <span
                                    key="t-lock-screen">Lock screen</span></a> --}}
                            <div class="dropdown-divider"></div>
                            <livewire:template::components.logout />
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="bx bx-cog bx-spin"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <x-template::side-menu />
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                {{ $slot }}
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Copyright DOF.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                <a href="https://www.leotechbd.com/" target="_blank">Powered by
                                    <img src="{{ asset('backend/images/logo.png') }}" alt="" height="40"
                                        width="100">

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Messenger Chat plugin Code -->
            <div id="fb-root"></div>

            <!-- Your Chat plugin code -->
            <div id="fb-customer-chat" class="fb-customerchat">
            </div>

            <script>
                var chatbox = document.getElementById('fb-customer-chat');
                chatbox.setAttribute("page_id", "107849985552423");
                chatbox.setAttribute("attribution", "biz_inbox");
            </script>

            <!-- Your SDK code -->
            <script>
                window.fbAsyncInit = function() {
                    FB.init({
                        xfbml: true,
                        version: 'v16.0'
                    });
                };

                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/libs/node-waves/waves.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('backend/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <!-- form wizard init -->
    {{-- <script src="{{ asset('backend/js/pages/form-wizard.init.js') }}"></script> --}}
    <script src="{{ asset('backend/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- validation init -->
    <script src="{{ asset('backend/js/pages/validation.init.js') }}"></script>
    <!-- auth-2-carousel init -->
    <script src="{{ asset('backend/js/pages/auth-2-carousel.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <!-- apexcharts -->
    {{-- <script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script> --}}
    <!-- dashboard init -->
    {{-- <script src="{{ asset('backend/js/pages/dashboard.init.js') }}"></script> --}}
    <!-- leaflet plugin -->
    {{-- <script src="{{ asset('backend/libs/leaflet/leaflet.js') }}"></script> --}}

    <!-- leaflet map.init -->
    {{-- <script src="{{ asset('backend/js/pages/leaflet-us-states.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/js/pages/leaflet-map.init.js') }}"></script> --}}

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    @include('template::layouts.includes.scripts')

</body>
<!-- apexcharts -->

</html>
