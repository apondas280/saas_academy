{{-- @extends('layouts.' . get_frontend_settings('theme'))
@push('title', get_phrase('Sign Up'))
@push('meta')@endpush
@push('css')
    <style>
        .form-icons .right {
            right: 20px;
            cursor: pointer !important;
        }
    </style>
@endpush
@section('content')
    <main class="login-section">
        <div class="container">
            <div class="row mrg-30">
                <div class="col-lg-7 col-md-6 d-none d-md-block">
                    <div class="login-banner-area">
                        <div class="login-banner">
                            <img src="{{ asset('assets/frontend/default/images/login-banner.webp') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="login-logo-area">
                        <a href="#">
                            <img src="{{ asset('assets/frontend/default/images/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                    <div class="login-form-wrap">
                        <div class="login-logout-title">
                            <h1 class="title">{{ get_phrase('Sign Up') }}</h1>
                            <p class="info">{{ get_phrase('See your growth and get consulting support! ') }} </p>
                        </div>
                        <div class="login-form-area">
                            <form action="">
                                <div class="login-input-group">
                                    <div class="input-wrap">
                                        <label for="" class="form-label">{{ get_phrase('Name') }}</label>
                                        <input type="text" name="name" class="form-control" placeholder="Your Name">

                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="input-wrap">
                                        <label for="" class="form-label">{{ get_phrase('Email') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Your Email">

                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="input-wrap">
                                        <label for="password" class="form-label">{{ get_phrase('Password') }}</label>
                                        <div class="input-password-wrap">
                                            <input type="password" class="form-control password-field" id="password" name="password" placeholder="*********">
                                            <span toggle=".password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                        </div>

                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="form-submit-btn">{{ get_phrase('Sign Up') }}</button>
                                <p class="create-or-login">{{ get_phrase('Already have account.') }} <a href="{{ route('login') }}">{{ get_phrase('Sign in') }}</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('js')
    <script>
        "use strict";

        $(document).ready(function() {
            $('#showpassword').on('click', function(e) {
                e.preventDefault();
                const type = $('#password').attr('type');

                if (type == 'password') {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            });
        });

        $(document).ready(function() {
            $('#showcpassword').on('click', function(e) {
                e.preventDefault();
                const type = $('#cpassword').attr('type');

                if (type == 'password') {
                    $('#cpassword').attr('type', 'text');
                } else {
                    $('#cpassword').attr('type', 'password');
                }
            });
        });
    </script>
@endpush --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-capitalize">{{ request()->route('company') }} | {{ get_phrase('Registration') }}</title>
    <link rel="shortcut icon" href="{{ get_frontend_settings('favicon') }}" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/bootstrap/bootstrap.min.css') }}">
    <!-- UI Flat icon -->
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-regular-rounded/css/uicons-regular-rounded.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/login.css') }}">
</head>

<body>

    <!-- Form Start  -->
    <section class="main-form-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-content-wrap">
                        <a href="{{ route('home') }}" class="form-logo">
                            <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo" width="150px">
                        </a>
                        <div class="form-content-middle max-w-360px mx-auto">
                            <div class="mb-4">
                                <h1 class="man-title-24px mb-2 text-center text-capitalize">{{ get_phrase('Register to ') }}{{ request()->route('company') }}</h1>
                                <p class="man-subtitle-14px text-center">{{ get_phrase('We’re a team that Guides Each Other') }}</p>
                            </div>
                            <form action="{{ route('register') }}" method="post">@csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label mform-lable mb-2">{{ get_phrase('User Name') }}<span class="mtext-skin">*</span></label>
                                    <input type="text" class="form-control mform-control" name="name" id="email" placeholder="Enter user name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label mform-lable mb-2">{{ get_phrase('Email') }}<span class="mtext-skin">*</span></label>
                                    <input type="text" class="form-control mform-control" name="email" id="email" placeholder="Username@gmail.com">
                                </div>
                                <div class="mb-3">
                                    <label for="password1" class="form-label mform-lable mb-2">{{ get_phrase('Password') }}<span class="mtext-skin">*</span></label>
                                    <div class="input-password-wrap">
                                        <div class="password-icons lock toggle-password" toggle=".password-field1">
                                            <img class="eye-unlock" src="{{ asset('assets/frontend/default/images/icons/eye-gray-18.svg') }}" alt="">
                                            <img class="eye-lock" src="{{ asset('assets/frontend/default/images/icons/eye-slash-gray-18.svg') }}" alt="">
                                        </div>
                                        <input type="password" id="password1" class="form-control mform-control password-field1" name="password" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check checkbox-form-check">
                                        <input class="form-check-input checkbox-form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label checkbox-form-check-label" for="flexCheckDefault">{{ get_phrase('Remember me') }}</label>
                                    </div>
                                </div>
                                <button type="submit" class="w-100 btn mbtn-primary fw-bold py-12px mb-12px">{{ get_phrase('Sign Up') }}</button>

                                <p class="man-subtitle-12px text-center">{{ get_phrase('Already have an account ?') }} <a href="{{ route('login') }}" class="fw-semibold mtext-skin text-link">{{ get_phrase('Log in') }}</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div class="login-right-banner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form End  -->

    <script src="{{ asset('assets/frontend/default/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/script.js') }}"></script>

    @include('frontend.default.toaster')
</body>

</html>
