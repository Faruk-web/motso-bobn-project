<!doctype html>
<html lang="en">

<head>
    <title>
        @isset($title)
            {{ $title }} |
        @endisset {{ config('app.name') }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="@isset($title) {{ $title }} | @else slot title  @endisset {{ config('app.name') }}"
        name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="http://dof.leotechbd.com/backend/images/favi_mots.jpg">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @include('template::layouts.includes.styles')
</head>

<body class="auth-body-bg">
    <div>
        <div class="container-fluid p-0">
            {{ $slot }}
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/libs/node-waves/waves.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- App js -->
    <script src="{{ asset('backend/js/app.js') }}"></script>
    @include('template::layouts.includes.scripts')
</body>

</html>
