<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('surveillance-ui/images/favicon.ico') }}" type="image/x-icon">
    <title>{{ __('surveillance-ui::app.common.title_prefix') }} - @yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('surveillance-ui/css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('surveillance-ui/css/daterangepicker.css') }}" />
    <!-- sbadmin styles for this template-->
    <link href="{{ asset('surveillance-ui/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- view specific third party stylesheets -->
    @stack('view-styles')

    <!-- custom styles for this template-->
    <link href="{{ asset('surveillance-ui/css/app.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('surveillance-ui::shared.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('surveillance-ui::shared.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- End Page Content -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('surveillance-ui::shared.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('surveillance-ui/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('surveillance-ui/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('surveillance-ui/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('surveillance-ui/js/daterangepicker.min.js') }}"></script>

    <!-- sbadmin scripts for all pages-->
    <script src="{{ asset('surveillance-ui/js/sb-admin-2.min.js') }}"></script>

    <!-- view specific third party scripts -->
    @stack('view-scripts')

    <!-- custom scripts for all pages-->
    <script src="{{ asset('surveillance-ui/js/app.min.js') }}"></script>
</body>

</html>