@php
        $softwaresetting = Modules\User\Models\SoftwareSetting::first();
        $total_post = App\Models\Post::count();
        $all_post = App\Models\Post::get();
        $users = auth()->user();
    $layout_type = 'horizontal';
@endphp
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
    <link rel="shortcut icon" href="{{ asset('backend/images/favi_mots.jpg') }}" style="border-radius: 20px;">
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
    <link href="{{ asset('backend/css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />
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
        .topnav .navbar-nav .dropdown-item {
            color: var(--bs-menu-item-color);
        }
        .footer{
            right: -5px !important;
            bottom: 6px!important;
        }
        body[data-layout=horizontal] .footer {
            right: -7px !important;
        }
        html, body{
            overflow-x: hidden;
        }
    </style>
</head>

<body @if ($layout_type == 'horizontal') data-topbar="light" data-layout="horizontal" @else data-sidebar="dark" @endif>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="http://dof.leotechbd.com/member" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="http://dof.leotechbd.com/backend/images/favi_mots.jpg" alt="" height="30">
                            </span>
                            {{-- <h4>Vessel And Gear <br> Management System</h4> --}}
                            <span class="logo-lg">
                                <img style="height:94px; margin-left: -7%;margin-top: 1%;" src="{{ asset('storage/'.$softwaresetting->website_logo) }}" alt="">
                            </span>
                        </a>
                    </div>

                    @if ($layout_type == 'horizontal')
                        <button type="button"
                            class="btn btn-sm px-0 font-size-16 d-lg-none header-item waves-effect waves-light"
                            data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    @else
                        <button type="button" class="px-3 btn btn-sm font-size-16 header-item waves-effect"
                            id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    @endif
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <h3 style="color: #1a1919;
                            margin-left: -32%;
                            margin-top: 6%;
                            font-size: 17px;" id="time"></h3>
                        </button>
                    </div>
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
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bx bx-bell bx-tada"></i>
                            <span class="badge bg-danger rounded-pill">{{$total_post}}</span>
                        </button>
                        <div class="p-0 dropdown-menu dropdown-menu-lg dropdown-menu-end"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                    </div>
                                    <table class="table table-bordered">
                                    <thead>
                                        <th>Title</th>
                                        <th width="40%">Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($all_post as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">View Post</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                                src="{{ asset('storage/' . $users->profile_picture) }}" alt="User Avatar">
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
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        @if ($layout_type == 'vertical')
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
        @else
            <div class="topnav" style="background: linear-gradient(to right, #0A196C, #0870D3)">
                {{-- <div class="topnav" style="background:#33ccff"> --}}
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <x-template::side-menu-h />
                            {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#"
                                        id="topnav-dashboard" role="button">
                                        <i class="bx bx-home-circle me-2"></i><span
                                            key="t-dashboards">Dashboards</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                        <a href="index.html" class="dropdown-item" key="t-default">Default</a>
                                        <a href="dashboard-saas.html" class="dropdown-item" key="t-saas">Saas</a>
                                        <a href="dashboard-crypto.html" class="dropdown-item"
                                            key="t-crypto">Crypto</a>
                                        <a href="dashboard-blog.html" class="dropdown-item" key="t-blog">Blog</a>
                                        <a href="dashboard-job.html" class="dropdown-item" key="t-Jobs">Jobs</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout"
                                        role="button">
                                        <i class="bx bx-layout me-2"></i><span key="t-layouts">Layouts</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                id="topnav-layout-verti" role="button">
                                                <span key="t-vertical">Vertical</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-layout-verti">
                                                <a href="layouts-light-sidebar.html" class="dropdown-item"
                                                    key="t-light-sidebar">Light Sidebar</a>
                                                <a href="layouts-compact-sidebar.html" class="dropdown-item"
                                                    key="t-compact-sidebar">Compact Sidebar</a>
                                                <a href="layouts-icon-sidebar.html" class="dropdown-item"
                                                    key="t-icon-sidebar">Icon Sidebar</a>
                                                <a href="layouts-boxed.html" class="dropdown-item"
                                                    key="t-boxed-width">Boxed Width</a>
                                                <a href="layouts-preloader.html" class="dropdown-item"
                                                    key="t-preloader">Preloader</a>
                                                <a href="layouts-colored-sidebar.html" class="dropdown-item"
                                                    key="t-colored-sidebar">Colored Sidebar</a>
                                                <a href="layouts-scrollable.html" class="dropdown-item"
                                                    key="t-scrollable">Scrollable</a>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                id="topnav-layout-hori" role="button">
                                                <span key="t-horizontal">Horizontal</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-layout-hori">
                                                <a href="layouts-horizontal.html" class="dropdown-item"
                                                    key="t-horizontal">Horizontal</a>
                                                <a href="layouts-hori-topbar-light.html" class="dropdown-item"
                                                    key="t-topbar-light">Topbar light</a>
                                                <a href="layouts-hori-boxed-width.html" class="dropdown-item"
                                                    key="t-boxed-width">Boxed width</a>
                                                <a href="layouts-hori-preloader.html" class="dropdown-item"
                                                    key="t-preloader">Preloader</a>
                                                <a href="layouts-hori-colored-header.html" class="dropdown-item"
                                                    key="t-colored-topbar">Colored Header</a>
                                                <a href="layouts-hori-scrollable.html" class="dropdown-item"
                                                    key="t-scrollable">Scrollable</a>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                        </div>
                    </nav>
                </div>
            </div>
        @endif






        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                {{ $slot }}
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid py-2">
                    <div class="row ">
                        <div class="col-md-5">
                            <script>document.write(new Date().getFullYear())</script><span style="font-size: 17px">© Copyright Department of Fisheries (DOF).</span>
                            <img src="{{ asset('backend/images/logo/fo-logo.png') }}" alt="" style=" height: 50px">
                        </div>
                        <div class="col-md-3 text-center" style="font-size: 22px;margin-top: 1%;">
                            <a href="https://www.facebook.com/people/Sustainable-Coastal-and-Marine-Fisheries/100089940130064/" target="_blank" class="fab fa-facebook "></a>
                          <a href="https://bd.linkedin.com/"  target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                          <a href="https://web.telegram.org/" target="_blank"><i class="fab fa-telegram "></i></a>
                          <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                        </div>
                        <div class="col-md-4 ">
                            <div class="text-sm-end d-none d-sm-block " style="font-size: 17px">
                                Powered by <a href="https://www.leotechbd.com/" target="_blank">
                                    <img src="{{ asset('backend/images/logo.png') }}" alt="" style="height: 50px" >
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            {{-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-5" style="font-size:17px">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <span>© Copyright Department of Fisheries (DOF). <span><img src="{{ asset('backend/images/logo/fo-logo.png') }}" alt="" height="50"
                                width="50"style="margin-top: -9px;"></span></span>
                        </div>
                        <div class="col-sm-4 text-center" style="font-size: 22px;">
                            <a href="https://www.facebook.com/people/Sustainable-Coastal-and-Marine-Fisheries/100089940130064/" target="_blank" class="fab fa-facebook "></a>
                          <a href="https://bd.linkedin.com/"  target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                          <a href="https://web.telegram.org/" target="_blank"><i class="fab fa-telegram "></i></a>
                          <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                        </div>
                        <div class="col-sm-3">
                            <div class="text-sm-end d-none d-sm-block">
                                <a href="https://www.leotechbd.com/" target="_blank" style="font-size: 20px">Powered by
                                    <img src="{{ asset('backend/images/logo.png') }}" alt="" height="60"width="160" style="margin-top: -22px;">

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer> --}}
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
    <script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script>
     <!-- apexcharts init -->
     <script src="{{ asset('backend/js/pages/apexcharts.init.js')}}"></script>
     <script type="text/javascript" src="{{asset('assets/js/pages/echarts.min.js')}}"></script>	

    <!-- Required datatable js -->
    <script src="{{ asset('backend/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('backend/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('backend/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('backend/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    
    <!-- Responsive examples -->
    <script src="{{ asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('backend/js/pages/datatables.init.js')}}"></script>    

    <script src="{{ asset('backend/js/app.js')}}"></script>
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script> --}}
    @include('template::layouts.includes.scripts')

</body>
<!-- apexcharts -->

</html>
<script>
    // function to convert a Gregorian date to Bangla date
    function getBanglaDate(gregorianDate) {
      // array of Bengali month names
      var banglaMonths = [
        'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ', 'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র'
      ];
      var banglaMonthsShort = [
        'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ', 'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র'
      ];
      // subtract 593 from the Gregorian year to get the Bengali year
      var bengaliYear = gregorianDate.getFullYear() - 593;
      // get the Bengali month index (0-based) by subtracting 4 from the Gregorian month
      var bengaliMonthIndex = gregorianDate.getMonth() - 4;
      if (bengaliMonthIndex < 0) {
        bengaliMonthIndex += 12;
        bengaliYear--;
      }
      var bengaliMonth = banglaMonths[bengaliMonthIndex];
      var bengaliMonthShort = banglaMonthsShort[bengaliMonthIndex];
      // get the Bengali day of the month by adding 13 to the Gregorian day
      var bengaliDayOfMonth = gregorianDate.getDate() + 13;
      if (bengaliDayOfMonth > 31) {
        bengaliDayOfMonth -= 31;
        bengaliMonthIndex++;
	  }
         // check if the Bengali month index is out of range (0-11)
  if (bengaliMonthIndex > 11) {
    bengaliMonthIndex -= 12;
    bengaliYear++;
  }
  bengaliMonth = banglaMonths[bengaliMonthIndex];
  bengaliMonthShort = banglaMonthsShort[bengaliMonthIndex];
  // return the Bangla date in the format "DD MonthName YYYY"
  return bengaliDayOfMonth + ' ' + bengaliMonthShort + ' ' + bengaliYear;
}

// function to get the current time in 12-hour format with সকাল দুপুর বিকাল রাত
// function to get the current time in 12-hour format with সকাল দুপুর বিকাল রাত
function getCurrentTime() {
  var currentTime = new Date();
  var hours = currentTime.getHours();
  var minutes = currentTime.getMinutes();
  var seconds = currentTime.getSeconds();
  var meridian = ''; // initialize meridian variable
  // if (hours >= 0 && hours < 4) {
  //   meridian = 'রাত';
  //   hours = hours + 12;
  // } else if (hours >= 4 && hours < 12) {
  //   meridian = 'সকাল';
  // } else if (hours >= 12 && hours < 16) {
  //   meridian = 'দুপুর';
  // } else {
  //   meridian = 'বিকাল';
  //   hours = hours - 12;
  // }
  hours = hours ? hours : 12; // set hour to 12 if it's 0
  var timeString = hours + ':' + (minutes < 10 ? '0' + minutes : minutes) + ':' + (seconds < 10 ? '0' + seconds : seconds) + ' ' + meridian;
  return timeString;
}


// function to get the current day of the week in Bengali
function getCurrentDay() {
  var banglaDays = ['শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'];
  var banglaDayIndex = new Date().getDay();
  var banglaDay = banglaDays[banglaDayIndex];
  return banglaDay;
}

// set the current time, date, and day of the week every second
setInterval(function() {
  var currentTime = getCurrentTime();
  var currentDate = new Date();
  var banglaDate = getBanglaDate(currentDate);
  var currentDay = getCurrentDay();
  document.getElementById('time').innerHTML = currentTime;
  document.getElementById('date').innerHTML = banglaDate + ' | ' + currentDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
  document.getElementById('day').innerHTML = currentDay;
}, 1000);
</script>