<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{ config(['app.name' => get_settings('system_title')]) }}
    <title>@stack('title') | {{ config('app.name') }}</title>

    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" />
    <meta content="{{ csrf_token() }}" name="csrf_token" />
    @stack('meta')
    <!-- End meta -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/bootstrap/bootstrap.min.css') }}" />

    {{-- FlatIcons --}}
    <link rel="stylesheet" href="{{ asset('assets/global/flaticon/css/all/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/flaticon/css/bold/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/flaticon/css/brands/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/flaticon/css/regular/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/flaticon/css/solid/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/flaticon/css/thin/rounded.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/flaticon/css/thin/straight.css') }}">

    {{-- Font awesome icons --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/icon-picker/fontawesome-iconpicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/icon-picker/icons/fontawesome-all.min.css') }}" />

    {{-- Summernote --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/summernote/summernote-lite.min.css') }}" rel="stylesheet">

    {{-- Yaireo Tagify --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/tagify-master/dist/tagify.css') }}" rel="stylesheet" type="text/css" />

    {{-- Select2 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- Date range picker --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />


    {{-- Custom css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/custom.css') }}">

    @stack('css')

    <script type="text/javascript" src="{{ asset('assets/backend/js/jquery-3.7.1.min.js') }}"></script>
</head>

<body>
    <main>
        <!-- Sidebar Navigation -->
        <div class="ol-sidebar">
            @include('admin.navigation')
        </div>

        <div class="ol-sidebar-content">
            @include('admin.header')
            <div class="ol-body-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>


    @include('admin.modal')

    <script src="{{ asset('assets/backend/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    {{-- Summernote --}}
    <script src="{{ asset('assets/global/summernote/summernote-lite.min.js') }}"></script>

    {{-- Icon --}}
    <script src="{{ asset('assets/global/icon-picker/fontawesome-iconpicker.min.js') }}"></script>

    {{-- Jquery form --}}
    <script type="text/javascript" src="{{ asset('assets/global/jquery-form/jquery.form.min.js') }}"></script>

    {{-- Jquery UI --}}
    <script type="text/javascript" src="{{ asset('assets/global/jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>

    {{-- Yaireo Tagify --}}
    <script src="{{ asset('assets/global/tagify-master/dist/tagify.min.js') }}"></script>

    {{-- Select2 --}}
    <script src="{{ asset('assets/global/select2/select2.min.js') }}"></script>

    {{-- Date range picker --}}
    <script src="{{ asset('assets/backend/vendors/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/daterangepicker/daterangepicker.js') }}"></script>

    {{-- Html to PDF --}}
    <script src="{{ asset('assets/backend/js/html2pdf.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/script.js') }}"></script>

    @include('admin.toaster')
    @include('admin.common_scripts')
    @include('admin.init')
    @stack('js')
</body>

</html>
