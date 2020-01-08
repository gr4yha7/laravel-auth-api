<!DOCTYPE html>
<html>
    <head>
        <title>{{config('app.name') }} - @yield('title')</title>
        @include('landing.partials.recurringHead')
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Work+Sans:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
        @yield('head')
        <link rel="stylesheet" href="css/homepage.css" />
        <link href="css/responsive.css" rel="stylesheet" />
    </head>
    <body>
        @include('landing.partials.nav')
        @include('landing.partials.sidebar')
        @yield('content')
        @include('landing.partials.footer1')
        @include('landing.partials.footer')
        <script src="vendor/jquery-3.4.1.min.js"></script>
        <script src="vendor/popper.min.js"></script>
        <script src="vendor/bootstrap.min.js"></script>
        <script src="js/homepage.js"></script>
        <script src="js/responsive.js"></script>
        @yield('scripts')
    </body>
</html>

