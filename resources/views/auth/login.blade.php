<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-capitalize">{{ request()->route('company') }} | {{ get_phrase('Login') }}</title>
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
                                <h1 class="man-title-24px mb-2 text-center text-capitalize">{{ get_phrase('Welcome to ') }}{{ request()->route('company') }}</h1>
                                <p class="man-subtitle-14px text-center">{{ get_phrase('We’re a team that Guides Each Other') }}</p>
                            </div>
                            <form action="{{ route('login') }}" method="post">@csrf
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
                                <button type="submit" class="w-100 btn mbtn-primary fw-bold py-12px mb-12px">{{ get_phrase('Log In') }}</button>
                                <div class="text-center mb-20px">
                                    <a href="#" class="man-subtitle-12px mtext-skin text-link text-center">{{ get_phrase('Forget your password ?') }}</a>
                                </div>
                                <p class="man-subtitle-12px text-center">{{ get_phrase('Don’t have an account yet ?') }} <a href="{{ route('register') }}" class="fw-semibold mtext-skin text-link">{{ get_phrase('Sign up') }}</a></p>
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
