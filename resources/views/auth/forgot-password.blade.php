@extends('layouts' . '.' . get_frontend_settings('theme'))
@push('title', get_phrase('Forgot Password'))
@push('meta')@endpush
@push('css')
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
                            <h1 class="title">{{ get_phrase('Forgot Password') }}</h1>
                            <p class="info">{{ get_phrase('Submit your account email address.') }} </p>
                        </div>
                        <div class="login-form-area">
                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="login-input-group">
                                    <div class="input-wrap">
                                        <label for="email" class="form-label">{{ get_phrase('Email') }}</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="{{ get_phrase('Enter Your Email') }}">
                                    </div>
                                </div>
                                <button type="submit" class="form-submit-btn">{{ get_phrase('Send Request') }}</button>
                                <a href="{{ route('login') }}" class="form-submit-btn mt-3">{{ get_phrase('Back to login page') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
@endsection
@push('js')

@endpush
