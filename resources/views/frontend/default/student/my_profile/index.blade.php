@extends('layouts.default')
@push('title', get_phrase('My profile'))
@push('meta')@endpush
@push('css')@endpush
@section('content')

<!-- Top Link Path Area Start -->
<section class="top-link-path-section2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top-link-path-area2">
                    <div class="top-link-path-inner2">
                        <h1 class="title">{{ get_phrase('My Profile') }}</h1>
                        <div class="top-link-path d-flex align-items-center justify-content-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                            {{ get_phrase('Home') }}
                        </a>
                        <a href="{{ route('my.profile') }}">{{ get_phrase('My Profile') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Link Path Area End -->

<!-- My Course Area Start -->
<section>
    <div class="container">
        <div class="row mrg-30 padding-bottom-110 padding-top-50">

            <div class="col-xl-3 col-lg-4">
                @include('frontend.default.student.left_sidebar')
            </div>

            <div class="col-xl-9 col-lg-8">
                <div class="lms1-card">
                    <h2 class="euclid-title-24px mb-20px">{{ get_phrase('Personal Information') }}</h2>
                    <form action="{{ route('update.profile', $user_details->id) }}" method="POST">
                        @csrf
                        <div class="row g-20px mb-20px">
                            <div class="col-md-12">
                                <label for="name" class="form-label lms1-form-label mb-1">{{ get_phrase('Full Name') }}</label>
                                <input type="text" class="form-control lms1-form-control" name="name" value="{{ $user_details->name }}" id="name">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label lms1-form-label mb-1">{{ get_phrase('Email Address') }}</label>
                                <input type="email" class="form-control lms1-form-control" name="email" value="{{ $user_details->email }}" id="email">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label lms1-form-label mb-1">{{ get_phrase('Phone Number') }}</label>
                                <input type="text" class="form-control lms1-form-control" name="phone" value="{{ $user_details->phone }}" id="phone">
                            </div>
                            <div class="col-md-6">
                                <label for="website" class="form-label lms1-form-label mb-1">{{ get_phrase('Website') }}</label>
                                <input type="text" class="form-control lms1-form-control" name="website" value="{{ $user_details->website }}" id="website">
                            </div>
                            <div class="col-md-6">
                                <label for="facebook" class="form-label lms1-form-label mb-1">{{ get_phrase('Facebook') }}</label>
                                <input type="text" class="form-control lms1-form-control" name="facebook" value="{{ $user_details->facebook }}" id="facebook">
                            </div>
                            <div class="col-md-6">
                                <label for="twiter" class="form-label lms1-form-label mb-1">{{ get_phrase('Twitter') }}</label>
                                <input type="text" class="form-control lms1-form-control" name="twitter" value="{{ $user_details->twitter }}" id="twiter">
                            </div>
                            <div class="col-md-6">
                                <label for="linkedin" class="form-label lms1-form-label mb-1">{{ get_phrase('Linkedin') }}</label>
                                <input type="text" class="form-control lms1-form-control" name="linkedin" value="{{ $user_details->linkedin }}" id="linkedin">
                            </div>
                            <div class="col-md-12">
                                <label for="skills" class="form-label lms1-form-label mb-1">{{ get_phrase('Skills') }}</label>
                                <input type="text" class="form-control lms1-form-control" name="skills" data-role="tagsinput" value="{{ $user_details->skills }}" id="skills">
                            </div>
                            <div class="col-md-12">
                                <label for="biography" class="form-label lms1-form-label mb-1">{{ get_phrase('Biography') }}</label>
                                <textarea class="form-control lms1-form-control" name="biography"  id="biography" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn lms1-btn-primary fw-semibold py-12px">{{ get_phrase('Save Changes') }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- My Course Area End -->

@endsection
@push('js')

@endpush