<!DOCTYPE html>
<html>
    <head>
        <title>{{config('app.name') }} - @yield('title')</title>
        @include('landing.partials.recurringHead')
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/auth.css" />
        @yield('head')
    </head>
    <body>
        <div class="content">
            <div class="wrapper">
                <div class="container overlay">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="vendor/jquery-3.4.1.min.js"></script>
        <script src="vendor/popper.min.js"></script>
        <script src="vendor/bootstrap.min.js"></script>
        @yield('scripts')
    </body>
</html>