@extends('layouts.' . get_frontend_settings('theme'))
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
@endpush
