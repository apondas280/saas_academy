<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" />
    <link rel="apple-touch-icon" href="{{ asset(get_frontend_settings('favicon')) }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/frontend/default/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('assets/global/select2/select2.min.css') }}">

    <!-- Custom Css -->
    <link href="{{ asset('assets/backend/css/onboarding.css') }}" rel="stylesheet" />


    <title>{{ get_phrase('Onboarding') }} | GrowUp LMS</title>
</head>

<body class="onboarding-body">


    <!-- Onboarding Area Start -->
    <section class="mt-60px mb-60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-10">
                    <div class="cin1-onboarding-area">
                        <div class="mb-4">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset(get_frontend_settings('dark_logo')) }}" alt="logo" width="150px">
                            </a>
                        </div>


                        <div class="onboarding-process" id="initial">
                            @yield('content')
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Onboarding Area End -->


    <!-- js -->
    <script src="{{ asset('assets/backend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/global/select2/select2.min.js') }}"></script>

    @include('admin.toaster')

    <script>
        $(document).ready(function() {
            if ($('.select2-with-search').length > 0) {
                $(".select2-with-search").select2({
                    dropdownCssClass: "select2-mydrop"
                });
            };
        });
    </script>

    @stack('js')
</body>

</html>
