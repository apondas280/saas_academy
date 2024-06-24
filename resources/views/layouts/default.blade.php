<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.seo')
    @stack('meta')

    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

    <!-- Css Files -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/animate.css') }}">
    <!-- Custom Css File -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/custom_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/responsive.css') }}">

    <!-- Js Files -->
    <script src="{{ asset('assets/frontend/default/js/jquery-3.7.0.min.js') }}"></script>

    @stack('css')
</head>
<body>
    
    <header>
        @include('frontend.default.header')
    </header>

    @yield('content')

    <footer class="footer-section">
        @include('frontend.default.footer')
    </footer>
    
    @stack('js')
    <!-- Js Files -->
    <script src="{{ asset('assets/frontend/default/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/wow.min.js') }}"></script>
    <!-- Custom Js File -->
    <script src="{{ asset('assets/frontend/default/js/script.js') }}"></script>
</body>
</html>