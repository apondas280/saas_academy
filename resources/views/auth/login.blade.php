@extends('layouts' . '.' . get_frontend_settings('theme'))
@push('title', get_phrase('Log In'))
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
    @if (get_frontend_settings('theme') == 'default')

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
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/frontend/default/images/logo.svg') }}" alt="logo">
                            </a>
                        </div>
                        <div class="login-form-wrap">
                            <div class="login-logout-title">
                                <h1 class="title">{{ get_phrase('Log in') }}</h1>
                                <p class="info">{{ get_phrase('See your growth and get consulting support!') }} </p>
                            </div>
                            <div class="login-form-area">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="login-input-group">
                                        <div class="input-wrap">
                                            <label for="email" class="form-label">{{ get_phrase('Email') }}</label>
                                            <input type="email" id="email" name="email" class="form-control password-field" placeholder="{{ get_phrase('Your Email') }}">
                                        </div>
                                        <div class="input-wrap">
                                            <label for="password" class="form-label">{{ get_phrase('Password') }}</label>
                                            <div class="input-password-wrap">
                                                <input type="password" class="form-control password-field" id="password" name="password" placeholder="*********">
                                                <span toggle=".password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="forget-password-area d-flex align-items-center justify-content-between">
                                        <div class="form-check mform-check">
                                            <input class="form-check-input mcheck-input" type="checkbox" value="" id="remember" checked>
                                            <label class="form-check-label mcheck-lable" for="remember">
                                            {{ get_phrase('Remember Me') }}
                                            </label>
                                        </div>
                                        <a href="{{route('password.request')}}" class="forget">{{ get_phrase('Forget Password?') }}</a>
                                    </div>
                                    <button type="submit" class="form-submit-btn">{{ get_phrase('Login') }}</button>
                                    <p class="create-or-login">
                                        {{ get_phrase('Not have an account yet?') }} 
                                        <a href="{{ route('register') }}">{{ get_phrase('Create Account') }}</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
    @endif
@endsection
@push('js')

    <script>
        "use strict";

        $(document).ready(function() {
            $('.custom-btn').on('click', function(e) {
                e.preventDefault();

                var role = $(this).attr('id');
                if (role == 'admin') {
                    $('#email').val('admin@example.com');
                    $('#password').val('12345678');
                } else if (role == 'student') {
                    $('#email').val('student@example.com');
                    $('#password').val('12345678');
                } else {
                    $('#email').val('instructor@example.com');
                    $('#password').val('12345678');
                }
                $('#login').trigger('click');
            });
        });

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
    </script>
@endpush
