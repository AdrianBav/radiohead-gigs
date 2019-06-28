<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyRHDB</title>

        <!-- Bootstrap -->
        <link href="rh/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="rh/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="rh/vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- JQVMap -->
        <link href="rh/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

        <!-- Custom Theme Style -->
        <link href="rh/custom.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                {{-- sidebar --}}
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        @include('layouts.partials.logo')
                        @include('layouts.partials.profile')
                        <br />

                        @include('layouts.partials.menu')
                    </div>
                </div>

                {{-- Top Navigation --}}
                @include('layouts.partials.topnav')

                {{-- Main --}}
                <div class="right_col" role="main">
                    <div class="">

                        @yield('content')

                    </div>
                </div>

                @include('layouts.partials.footer')

            </div>
        </div>

        <!-- jQuery -->
        <script src="rh/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="rh/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="rh/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="rh/vendors/nprogress/nprogress.js"></script>

        <!-- Chart.js -->
        <script src="rh/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="rh/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- JQVMap -->
        <script src="rh/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="rh/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="rh/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="rh/custom.min.js"></script>
    </body>

</html>
