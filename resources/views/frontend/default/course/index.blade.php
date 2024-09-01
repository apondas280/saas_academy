@extends('layouts.default')
@push('title', get_phrase('Courses'))
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
                            <h1 class="title">{{ get_phrase('Courses') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="#">
                                    <img src="assets/images/icons/home-white.svg" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="#">{{ get_phrase('Courses') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Link Path Area End -->

    <!-- Grid List View Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 mcg-30 padding-top-50 padding-bottom-110">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.default.course.filter')
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="grid-list-show-navtab d-flex align-items-center justify-content-between">
                                <p class="info">{{ get_phrase('Showing') . ' ' . count($courses) . ' ' . get_phrase('of') . ' ' . $courses->total() . ' ' . get_phrase('data') }}</p>
                                <div class="grid-list-navtab">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link @if ($layout == 'grid') active @endif layout" data-layout="grid" id="pills-grid-tab" data-bs-toggle="pill" data-bs-target="#pills-grid" type="button" role="tab" aria-controls="pills-grid" aria-selected="true">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_369_960)">
                                                        <path
                                                            d="M5.83333 20H3.33333C2.44928 20 1.60143 19.6488 0.976311 19.0237C0.35119 18.3986 0 17.5507 0 16.6667L0 14.1667C0 13.2826 0.35119 12.4348 0.976311 11.8096C1.60143 11.1845 2.44928 10.8333 3.33333 10.8333H5.83333C6.71739 10.8333 7.56524 11.1845 8.19036 11.8096C8.81548 12.4348 9.16667 13.2826 9.16667 14.1667V16.6667C9.16667 17.5507 8.81548 18.3986 8.19036 19.0237C7.56524 19.6488 6.71739 20 5.83333 20ZM7.5 14.1667C7.5 13.7246 7.32441 13.3007 7.01184 12.9882C6.69928 12.6756 6.27536 12.5 5.83333 12.5H3.33333C2.89131 12.5 2.46738 12.6756 2.15482 12.9882C1.84226 13.3007 1.66667 13.7246 1.66667 14.1667V16.6667C1.66667 17.1087 1.84226 17.5326 2.15482 17.8452C2.46738 18.1577 2.89131 18.3333 3.33333 18.3333H5.83333C6.27536 18.3333 6.69928 18.1577 7.01184 17.8452C7.32441 17.5326 7.5 17.1087 7.5 16.6667V14.1667Z"
                                                            fill="#6B7385" />
                                                        <path
                                                            d="M16.6666 20H14.1666C13.2825 20 12.4347 19.6488 11.8096 19.0237C11.1844 18.3986 10.8333 17.5507 10.8333 16.6667V14.1667C10.8333 13.2826 11.1844 12.4348 11.8096 11.8096C12.4347 11.1845 13.2825 10.8333 14.1666 10.8333H16.6666C17.5506 10.8333 18.3985 11.1845 19.0236 11.8096C19.6487 12.4348 19.9999 13.2826 19.9999 14.1667V16.6667C19.9999 17.5507 19.6487 18.3986 19.0236 19.0237C18.3985 19.6488 17.5506 20 16.6666 20ZM18.3333 14.1667C18.3333 13.7246 18.1577 13.3007 17.8451 12.9882C17.5325 12.6756 17.1086 12.5 16.6666 12.5H14.1666C13.7246 12.5 13.3006 12.6756 12.9881 12.9882C12.6755 13.3007 12.4999 13.7246 12.4999 14.1667V16.6667C12.4999 17.1087 12.6755 17.5326 12.9881 17.8452C13.3006 18.1577 13.7246 18.3333 14.1666 18.3333H16.6666C17.1086 18.3333 17.5325 18.1577 17.8451 17.8452C18.1577 17.5326 18.3333 17.1087 18.3333 16.6667V14.1667Z"
                                                            fill="#6B7385" />
                                                        <path
                                                            d="M5.83333 9.16675H3.33333C2.44928 9.16675 1.60143 8.81556 0.976311 8.19044C0.35119 7.56532 0 6.71747 0 5.83341L0 3.33341C0 2.44936 0.35119 1.60151 0.976311 0.976393C1.60143 0.351271 2.44928 8.10623e-05 3.33333 8.10623e-05H5.83333C6.71739 8.10623e-05 7.56524 0.351271 8.19036 0.976393C8.81548 1.60151 9.16667 2.44936 9.16667 3.33341V5.83341C9.16667 6.71747 8.81548 7.56532 8.19036 8.19044C7.56524 8.81556 6.71739 9.16675 5.83333 9.16675ZM7.5 3.33341C7.5 2.89139 7.32441 2.46746 7.01184 2.1549C6.69928 1.84234 6.27536 1.66675 5.83333 1.66675H3.33333C2.89131 1.66675 2.46738 1.84234 2.15482 2.1549C1.84226 2.46746 1.66667 2.89139 1.66667 3.33341V5.83341C1.66667 6.27544 1.84226 6.69936 2.15482 7.01193C2.46738 7.32449 2.89131 7.50008 3.33333 7.50008H5.83333C6.27536 7.50008 6.69928 7.32449 7.01184 7.01193C7.32441 6.69936 7.5 6.27544 7.5 5.83341V3.33341Z"
                                                            fill="#6B7385" />
                                                        <path
                                                            d="M16.6666 9.16675H14.1666C13.2825 9.16675 12.4347 8.81556 11.8096 8.19044C11.1844 7.56532 10.8333 6.71747 10.8333 5.83341V3.33341C10.8333 2.44936 11.1844 1.60151 11.8096 0.976393C12.4347 0.351271 13.2825 8.10623e-05 14.1666 8.10623e-05H16.6666C17.5506 8.10623e-05 18.3985 0.351271 19.0236 0.976393C19.6487 1.60151 19.9999 2.44936 19.9999 3.33341V5.83341C19.9999 6.71747 19.6487 7.56532 19.0236 8.19044C18.3985 8.81556 17.5506 9.16675 16.6666 9.16675ZM18.3333 3.33341C18.3333 2.89139 18.1577 2.46746 17.8451 2.1549C17.5325 1.84234 17.1086 1.66675 16.6666 1.66675H14.1666C13.7246 1.66675 13.3006 1.84234 12.9881 2.1549C12.6755 2.46746 12.4999 2.89139 12.4999 3.33341V5.83341C12.4999 6.27544 12.6755 6.69936 12.9881 7.01193C13.3006 7.32449 13.7246 7.50008 14.1666 7.50008H16.6666C17.1086 7.50008 17.5325 7.32449 17.8451 7.01193C18.1577 6.69936 18.3333 6.27544 18.3333 5.83341V3.33341Z"
                                                            fill="#6B7385" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_369_960">
                                                            <rect width="20" height="20" fill="white" transform="matrix(1 0 0 -1 0 20)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link @if ($layout == 'list') active @endif layout" data-layout="list" id="pills-list-tab" data-bs-toggle="pill" data-bs-target="#pills-list" type="button" role="tab" aria-controls="pills-list" aria-selected="false">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_369_965)">
                                                        <path
                                                            d="M20 2.50008C20 2.95841 19.625 3.33341 19.1667 3.33341H0.833333C0.375 3.33341 0 2.95841 0 2.50008C0 2.04175 0.375 1.66675 0.833333 1.66675H19.1667C19.625 1.66675 20 2.04175 20 2.50008ZM5.83333 16.6667H0.833333C0.375 16.6667 0 17.0417 0 17.5001C0 17.9584 0.375 18.3334 0.833333 18.3334H5.83333C6.29167 18.3334 6.66667 17.9584 6.66667 17.5001C6.66667 17.0417 6.29167 16.6667 5.83333 16.6667ZM12.5 9.16675H0.833333C0.375 9.16675 0 9.54175 0 10.0001C0 10.4584 0.375 10.8334 0.833333 10.8334H12.5C12.9583 10.8334 13.3333 10.4584 13.3333 10.0001C13.3333 9.54175 12.9583 9.16675 12.5 9.16675Z"
                                                            fill="#6B7385" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_369_965">
                                                            <rect width="20" height="20" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-list-tab-content">
                        @include('frontend.default.course.course_' . $layout)
                        @if (count($courses) > 0)
                            {{ $courses->links('vendor.pagination.default') }}
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Grid List View Area End -->
@endsection
