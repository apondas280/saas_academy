@extends('layouts.default')
@push('title', get_phrase('My Bootcamps'))
@section('content')

    <!-- Top Link Path Area Start -->
    <section class="top-link-path-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-link-path-area2">
                        <div class="top-link-path-inner2">
                            <h1 class="title">{{ get_phrase('My Bootcamps') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="{{ route('my.bootcamps') }}">{{ get_phrase('My Bootcamps') }}</a>
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
                        @if (count($my_bootcamps) > 0)
                        <div class="accordion bootcampitem-accordion" id="accordionExample1">
                            @foreach ($my_bootcamps as $bootcamp)
                                <div class="accordion-item bootcampitem-accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bootcampitem-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $bootcamp->id }}" aria-expanded="false" aria-controls="collapse_{{ $bootcamp->id }}">
                                        <div class="d-flex gap-20px flex-column flex-sm-row">
                                            <div class="bootcampitem-img">
                                                <img src="{{ get_image($bootcamp->thumbnail) }}" alt="bootcamp-banner">
                                            </div>
                                            @php
                                                $user = get_user_info($bootcamp->user_id);
                                            @endphp
                                            <div>
                                                <h4 class="mb-12px euclid-title-18px">{{ $bootcamp->title }}</h4>
                                                <div class="sml-icontext1 pb-2">
                                                    <p class="text">{{ get_phrase('By').' '.$user->name }}</p>
                                                </div>
                                                <div class="sml-icontext1">
                                                    <img src="{{ asset('assets/frontend/default/images/icons/mirroring-screen-gray-20.svg') }}" alt="">
                                                    <p class="text">{{ count_bootcamp_classes($bootcamp->id) }} {{ get_phrase('Live class') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        </button>
                                    </h2>
                                    <div id="collapse_{{ $bootcamp->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                        <div class="row pt-4">
                                            <div class="col-md-6">
                                                <div class="course-overview-area padding-bottom-50">
                                                    <div class="course-leasons-level d-flex align-items-center">
                                                        <div class="single-leason-level d-flex align-items-center">
                                                            <div class="icon">
                                                                <img src="{{ asset('assets/frontend/default/images/course/leasons.svg') }}" alt="">
                                                            </div>
                                                            <div class="details">
                                                                <h5 class="title">Lessons</h5>
                                                                <h5 class="info">12</h5>
                                                            </div>
                                                        </div>
                                                        <div class="single-leason-level d-flex align-items-center">
                                                            <div class="icon">
                                                                <img src="{{ asset('assets/frontend/default/images/course/level.svg') }}" alt="">
                                                            </div>
                                                            <div class="details">
                                                                <h5 class="title">Level</h5>
                                                                <h5 class="info">Advanced</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="course-overview-list">
                                                        <li>
                                                            <span class="title">
                                                                <img src="{{ asset('assets/frontend/default/images/icons/user.svg') }}" alt="">
                                                                Students
                                                                <span>:</span>
                                                            </span>
                                                            <span class="info">3456</span>
                                                        </li>
                                                        <li>
                                                            <span class="title">
                                                            <img src="{{ asset('assets/frontend/default/images/icons/language.svg') }}" alt="">
                                                            Course attendance
                                                            <span>:</span>
                                                            </span>
                                                            <span class="info">English</span>
                                                        </li>
                                                        <li>
                                                            <span class="title">
                                                            <img src="{{ asset('assets/frontend/default/images/icons/subtitle-cc.svg') }}" alt="">
                                                            Total quiz
                                                            <span>:</span>
                                                            </span>
                                                            <span class="info">12</span>
                                                        </li>
                                                    </ul>
                                                    <div class="course-overview-social">
                                                        <a href="#">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_369_3435)">
                                                            <path d="M13.9983 13.499H16.4983L17.4983 9.49902H13.9983V7.49902C13.9983 6.46902 13.9983 5.49902 15.9983 5.49902H17.4983V2.13902C17.1723 2.09602 15.9413 1.99902 14.6413 1.99902C11.9263 1.99902 9.99832 3.65602 9.99832 6.69902V9.49902H6.99832V13.499H9.99832V21.999H13.9983V13.499Z" fill="#6B7385"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip0_369_3435">
                                                            <rect width="24" height="24" fill="white"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>                           
                                                        </a>
                                                        <a href="#">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_369_3438)">
                                                            <path d="M12.0017 1.99902C14.7187 1.99902 15.0577 2.00902 16.1237 2.05902C17.1887 2.10902 17.9137 2.27602 18.5517 2.52402C19.2117 2.77802 19.7677 3.12202 20.3237 3.67702C20.8322 4.17692 21.2257 4.78161 21.4767 5.44902C21.7237 6.08602 21.8917 6.81202 21.9417 7.87702C21.9887 8.94302 22.0017 9.28202 22.0017 11.999C22.0017 14.716 21.9917 15.055 21.9417 16.121C21.8917 17.186 21.7237 17.911 21.4767 18.549C21.2264 19.2168 20.8328 19.8216 20.3237 20.321C19.8237 20.8293 19.219 21.2228 18.5517 21.474C17.9147 21.721 17.1887 21.889 16.1237 21.939C15.0577 21.986 14.7187 21.999 12.0017 21.999C9.28471 21.999 8.94571 21.989 7.87971 21.939C6.81471 21.889 6.08971 21.721 5.45171 21.474C4.78403 21.2235 4.17924 20.83 3.67971 20.321C3.17112 19.8212 2.77764 19.2165 2.52671 18.549C2.27871 17.912 2.11171 17.186 2.06171 16.121C2.01471 15.055 2.00171 14.716 2.00171 11.999C2.00171 9.28202 2.01171 8.94302 2.06171 7.87702C2.11171 6.81102 2.27871 6.08702 2.52671 5.44902C2.77695 4.7812 3.17051 4.17634 3.67971 3.67702C4.17938 3.16825 4.78414 2.77475 5.45171 2.52402C6.08971 2.27602 6.81371 2.10902 7.87971 2.05902C8.94571 2.01202 9.28471 1.99902 12.0017 1.99902ZM12.0017 6.99902C10.6756 6.99902 9.40386 7.52581 8.46618 8.46349C7.52849 9.40117 7.00171 10.6729 7.00171 11.999C7.00171 13.3251 7.52849 14.5969 8.46618 15.5346C9.40386 16.4722 10.6756 16.999 12.0017 16.999C13.3278 16.999 14.5996 16.4722 15.5372 15.5346C16.4749 14.5969 17.0017 13.3251 17.0017 11.999C17.0017 10.6729 16.4749 9.40117 15.5372 8.46349C14.5996 7.52581 13.3278 6.99902 12.0017 6.99902ZM18.5017 6.74902C18.5017 6.4175 18.37 6.09956 18.1356 5.86514C17.9012 5.63072 17.5832 5.49902 17.2517 5.49902C16.9202 5.49902 16.6022 5.63072 16.3678 5.86514C16.1334 6.09956 16.0017 6.4175 16.0017 6.74902C16.0017 7.08054 16.1334 7.39849 16.3678 7.63291C16.6022 7.86733 16.9202 7.99902 17.2517 7.99902C17.5832 7.99902 17.9012 7.86733 18.1356 7.63291C18.37 7.39849 18.5017 7.08054 18.5017 6.74902ZM12.0017 8.99902C12.7974 8.99902 13.5604 9.31509 14.123 9.8777C14.6856 10.4403 15.0017 11.2034 15.0017 11.999C15.0017 12.7947 14.6856 13.5577 14.123 14.1203C13.5604 14.683 12.7974 14.999 12.0017 14.999C11.2061 14.999 10.443 14.683 9.88039 14.1203C9.31778 13.5577 9.00171 12.7947 9.00171 11.999C9.00171 11.2034 9.31778 10.4403 9.88039 9.8777C10.443 9.31509 11.2061 8.99902 12.0017 8.99902Z" fill="#6B7385"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip0_369_3438">
                                                            <rect width="24" height="24" fill="white"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>                           
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="course-overview-area padding-bottom-50">
                                                    <div class="course-leasons-level d-flex align-items-center">
                                                        <div class="single-leason-level d-flex align-items-center">
                                                            <div class="icon">
                                                                <img src="{{ asset('assets/frontend/default/images/course/leasons.svg') }}" alt="">
                                                            </div>
                                                            <div class="details">
                                                                <h5 class="title">Total module</h5>
                                                                <h5 class="info">12</h5>
                                                            </div>
                                                        </div>
                                                        <div class="single-leason-level d-flex align-items-center">
                                                            <div class="icon">
                                                                <img src="{{ asset('assets/frontend/default/images/course/level.svg') }}" alt="">
                                                            </div>
                                                            <div class="details">
                                                                <h5 class="title">Current module</h5>
                                                                <h5 class="info">5</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="course-overview-list">
                                                        <li>
                                                            <span class="title">
                                                                <img src="{{ asset('assets/frontend/default/images/icons/file.svg') }}" alt="">
                                                                Resources
                                                                <span>:</span>
                                                            </span>
                                                            <span class="info">12 files</span>
                                                        </li>
                                                        <li>
                                                            <span class="title">
                                                                <img src="{{ asset('assets/frontend/default/images/icons/clock.svg') }}" alt="">
                                                                Duration
                                                                <span>:</span>
                                                            </span>
                                                            <span class="info">8h 24min</span>
                                                        </li>
                                                        <li>
                                                            <span class="title">
                                                                <img src="{{ asset('assets/frontend/default/images/icons/certificate.svg') }}" alt="">
                                                                Certificate
                                                                <span>:</span>
                                                            </span>
                                                            <span class="info">Yes</span>
                                                        </li>
                                                    </ul>
                                                    <div class="course-overview-buttons">
                                                        <a href="{{ route('bootcamp.player', $bootcamp->slug) }}" class="course-enroll-btn">
                                                            <img src="{{ asset('assets/frontend/default/images/icons/video-player.svg') }}" alt="">
                                                            Join Now (Upcomig live class)
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @else
                            @include('frontend.default.empty')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Course Area End -->


@endsection