<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#f5ea28">

        <title>MyRHDB | Bavanco</title>
        <meta name="description" content="My Radiohead database. A visual representation of all the Radiohead concerts I have been to.">
        <meta name="author" content="Adrian Bavister">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
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
                    <div id="app">

                        @yield('content')

                    </div>
                </div>

                @include('layouts.partials.footer')

            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('/js/vendor.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>

</html>
