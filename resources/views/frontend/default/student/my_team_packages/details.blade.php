@extends('layouts.default')
@push('title', $package->title)

@section('content')
    <!-- Top Link Path Area Start -->
    <section class="top-link-path-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-link-path-area2">
                        <div class="top-link-path-inner2">
                            <h1 class="title">{{ get_phrase('My Team Packages') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="{{ route('my.team.packages') }}">{{ get_phrase('My Team Packages') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Link Path Area End -->


    <section>
        <div class="container">
            <div class="row mrg-30 padding-bottom-110 padding-top-50">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.default.student.left_sidebar')
                </div>


                <div class="col-xl-9 col-lg-8">
                    <div class="lms1-card">
                        <div class="package my-package-details">
                            <div class="row">
                                <div class="col-sm-4 col-md-3">
                                    <div class="package-thumbnail mb-4">
                                        <img src="{{ get_image($package->thumbnail) }}">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-7 py-4 py-sm-0">
                                    <div class="bootcamp-details">
                                        <div class="inner d-flex justify-content-between align-items-start">
                                            <div class="d-flex flex-column">
                                                <h4 class="bootcamp-title ellipsis-3" data-bs-toggle="tooltip" title="{{ $package->title }}">
                                                    <a href="{{ route('team.package.details', $package->slug) }}" class="pop-title-16px lh-normal">{{ $package->title }}</a>
                                                    <p class="mb-12px pop-subtitle-13px3">
                                                        {{ get_phrase('Course : ') }}
                                                        {{ $package->course_title }}
                                                    </p>
                                                </h4>



                                                <div class="d-flex flex-wrap gap-3 align-items-center mb-2">
                                                    <div class="d-flex align-items-center gap-1">
                                                        <img src="{{ asset('assets/frontend/default/images/icons/clock-gray-20.svg') }}" alt="icon">
                                                        <p class="pop-subtitle-13px3">
                                                            {{ get_phrase('Expiry : ') }}
                                                            {{ $package->expiry == 'lifetime' ? get_phrase('Lifetime') : date('d-M-Y', $package->expiry_date) }}
                                                        </p>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" height="18" viewBox="0 0 24 24" width="18" data-name="Layer 1">
                                                            <path fill="#6b7385"
                                                                d="m7.5 13a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm0-7a2.5 2.5 0 1 0 2.5 2.5 2.5 2.5 0 0 0 -2.5-2.5zm7.5 17v-.5a7.5 7.5 0 0 0 -15 0v.5a1 1 0 0 0 2 0v-.5a5.5 5.5 0 0 1 11 0v.5a1 1 0 0 0 2 0zm9-5a7 7 0 0 0 -11.667-5.217 1 1 0 1 0 1.334 1.49 5 5 0 0 1 8.333 3.727 1 1 0 0 0 2 0zm-6.5-9a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm0-7a2.5 2.5 0 1 0 2.5 2.5 2.5 2.5 0 0 0 -2.5-2.5z" />
                                                        </svg>
                                                        <p class="pop-subtitle-13px3">
                                                            {{ get_phrase('Members : ') }}
                                                            {{ reserved_team_members($package->id) }} /
                                                            {{ $package->allocation }}
                                                        </p>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="18" height="18">
                                                            <path fill="#6b7385"
                                                                d="M19.9,3.091A4,4,0,0,0,14.9.153L13.176.646A2.981,2.981,0,0,0,12,1.3,2.981,2.981,0,0,0,10.824.646L9.1.153A4,4,0,0,0,4.105,3.091,5,5,0,0,0,0,8v7a5.006,5.006,0,0,0,5,5h6v2H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2H13V20h6a5.006,5.006,0,0,0,5-5V8A5,5,0,0,0,19.9,3.091ZM13,3.531a1,1,0,0,1,.725-.961l1.725-.493A2,2,0,0,1,18,4V7.938a2.006,2.006,0,0,1-1.45,1.921L13,10.873ZM6.8,2.4A1.993,1.993,0,0,1,8.55,2.077l1.725.493A1,1,0,0,1,11,3.531v7.342L7.45,9.859A2.006,2.006,0,0,1,6,7.938V4A1.987,1.987,0,0,1,6.8,2.4ZM22,15a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V8A3,3,0,0,1,4,5.184V7.938a4.014,4.014,0,0,0,2.9,3.845l3.451.987a6.019,6.019,0,0,0,3.3,0l3.451-.987A4.014,4.014,0,0,0,20,7.938V5.184A3,3,0,0,1,22,8Z" />
                                                        </svg>
                                                        <p class="pop-subtitle-13px3">
                                                            {{ get_phrase('Lessons : ') }}
                                                            {{ lesson_count($package->course_id) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2 col-md-2">
                                    <a href="{{ route('my.team.packages') }}" class="btn lms1-btn-outline-dark float-md-end">{{ get_phrase('Back') }}</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <ul class="nav nav-pills border-bottom mb-3 mt-5 pb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="members-tab" data-bs-toggle="pill" data-bs-target="#members" type="button" role="tab" aria-controls="members" aria-selected="true">{{ get_phrase('Members') }}</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="invoice-tab" data-bs-toggle="pill" data-bs-target="#invoice" type="button" role="tab" aria-controls="invoice" aria-selected="false">{{ get_phrase('Invoice') }}</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @include('frontend.default.student.my_team_packages.members')
                                        @include('frontend.default.student.my_team_packages.invoice')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
