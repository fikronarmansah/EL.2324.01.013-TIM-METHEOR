<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vibrate | Dashboard</title>
    <link rel="icon" href={{ asset('images/logo.jpg') }} type="image/icon type">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset("template/plugins/fontawesome-free/css/all.min.css") }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("template/dist/css/adminlte.min.css") }}>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{ asset("template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}>
    @stack('styles')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('layouts.preloader')

        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-white">
            <!-- Content Header (Page header) -->
            {{-- <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div> --}}
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div>@yield('contents')</div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src={{ asset("template/plugins/jquery/jquery.min.js") }}></script>
    <!-- jQuery UI 1.11.4 -->
    <script src={{ asset("template/plugins/jquery-ui/jquery-ui.min.js") }}></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src={{ asset("template/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <!-- overlayScrollbars -->
    <script src={{ asset("template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset("template/dist/js/adminlte.js") }}></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src={{ asset("js/mqtt.js") }}></script>
    <script src={{ asset("js/sweetalert.js") }}></script>
    <script src={{ asset('js/chartjs.js') }}></script>
    <script src={{ asset('js/momentjs.js') }}></script>
    <script src={{ asset('js/chartjs-adapter-moment.js') }}></script>
    <script src={{ asset('js/hammerjs.js') }}></script>
    <script src={{ asset('js/chartjs-plugin-zoom.js') }}></script>

    @stack('scripts')
</body>

</html>