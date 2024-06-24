@extends('layouts.default')
@push('title', get_phrase('Course Details'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    @php
        $instructor_review = App\Models\Instructor_review::where('instructor_id', get_course_creator_id($course_details->id)->id)
            ->orderBy('id', 'DESC')
            ->get();

        $review = App\Models\Review::where('course_id', $course_details->id)
            ->orderBy('id', 'DESC')
            ->get();

        $total = $review->count();
        $rating = array_sum(array_column($review->toArray(), 'rating'));

        $average_rating = 0;
        if ($total != 0) {
            $average_rating = $rating / $total;
        }
    @endphp
    <!------------------- Breadcum Area Start  ------>
    <section class="breadcum-area playing-breadcum">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 px-4">
                    <div class="eNtry-breadcum mt-5">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $course_details->title }}
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="course-details pe-auto pe-lg-5">

                        <h2 class="g-title ellipsis-line-2">{{ $course_details->title }}</h2>
                        <p class="g-text text-dark ellipsis-line-2">
                            {{ $course_details->short_description }}
                        </p>

                        <ul class="course-motion-top">
                            <li>
                                <a class="d-flex align-items-center text-dark" href="{{ route('instructor.details', ['name' => Str::slug($course_details->creator->name), 'id' => $course_details->creator->id]) }}">
                                    <img class="pro-32" src="{{ get_image(course_by_instructor($course_details->id)->photo) }}" alt="instructor-image">
                                    {{ course_by_instructor($course_details->id)->name }}
                                </a>
                            </li>
                            <li>
                                @if ($total > 0)
                                    {{ number_format(round($average_rating), 1) }}
                                    @for ($i = 0; $i < $average_rating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                @else
                                    <span class="ms-1 me-3 text-15px text-dark pt-2"><i class="fi-rr-circle-star m-0 text-16px text-dark me-1"></i></span>
                                    0 <i class="fa fa-star text-secondary mb-1"></i>
                                @endif
                            </li>
                            <li>
                                <img class="pro-20" src="{{ asset('assets/frontend/default/image/language.png') }}" alt="...">
                                {{ ucfirst($course_details->language) }}
                            </li>
                        </ul>
                        <ul class="course-motion-top bottom-motion mt-15 ms-0">
                            <li>
                                <img class="pro-20" src="{{ asset('assets/frontend/default/image/g3.png') }}" alt="...">
                                {{ get_phrase('Certificate Course') }}
                            </li>
                            <li>
                                <img class="pro-20" src="{{ asset('assets/frontend/default/image/g2.png') }}" alt="...">
                                {{ total_enroll($course_details->id) }} {{ get_phrase('Students') }}
                            </li>
                            <li>
                                <img class="pro-20" src="{{ asset('assets/frontend/default/image/g1.png') }}" alt="...">
                                {{ total_durations($course_details->id) }}
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 px-4">


                    <div class="hero-details pe-auto pe-lg-5">
                        <img src="{{ get_image($course_details->banner) }}" alt="...">
                        <div class="overly-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <a href="javascript:;" class="hero-popup"><i class="fa-solid fa-play"></i></a>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-lg-12 pe-auto pe-lg-5">
                            <div class="fDetails-tab static-menu mt-5 w-100">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" aria-selected="true">{{ get_phrase('Overview') }}</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-course-content-tab" data-bs-toggle="pill" data-bs-target="#pills-course-content" type="button" role="tab" aria-controls="pills-course-content" aria-selected="false">{{ get_phrase('Course Content') }}</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="false">{{ get_phrase('Details') }}</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-instructor-tab" data-bs-toggle="pill" data-bs-target="#pills-instructor" type="button" role="tab" aria-controls="pills-instructor" aria-selected="false">{{ get_phrase('Instructor') }}</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">{{ get_phrase('Reviews') }}</button>
                                    </li>
                                </ul>

                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab" tabindex="0">
                                    @include('frontend.default.course.overview_area')
                                </div>
                                <div class="tab-pane fade" id="pills-course-content" role="tabpanel" aria-labelledby="pills-course-content-tab" tabindex="0">
                                    @include('frontend.default.course.content_area')
                                </div>
                                <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
                                    @include('frontend.default.course.requirement_outcome_area')
                                </div>
                                <div class="tab-pane fade" id="pills-instructor" role="tabpanel" aria-labelledby="pills-instructor-tab" tabindex="0">
                                    @include('frontend.default.course.instructor_area')
                                </div>
                                <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">
                                    @include('frontend.default.course.review_area')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 px-4">
                    @include('frontend.default.course.pricing_card')
                </div>
            </div>
            <!------------------- Player Feature Area End  --------->
        </div>
    </section>

    <!------------------- Breadcum Area End  --------->


    <!-- Vertically centered modal -->
    <div class="modal fade-in-effect" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body bg-dark">
                    <link rel="stylesheet" href="{{ asset('assets/global/plyr/plyr.css') }}">
                    @php
                        $preview_video_type = str_contains($course_details->preview, 'youtu') ? 'youtube' : '';
                        $preview_video_type = str_contains($course_details->preview, 'vimeo') && $preview_video_type == '' ? 'vimeo' : $preview_video_type;
                        $preview_video_type = str_contains($course_details->preview, 'http') && $preview_video_type == '' ? 'html5' : $preview_video_type;
                    @endphp

                    @if ($preview_video_type == 'youtube')
                        <div class="plyr__video-embed" id="promoPlayer">
                            <iframe height="500" src="{{ $course_details->preview }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                        </div>
                    @elseif ($preview_video_type == 'vimeo')
                        <div class="plyr__video-embed" id="promoPlayer">
                            <iframe height="500" id="promoPlayer" src="https://player.vimeo.com/video/{{ $course_details->preview }}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay"></iframe>
                        </div>
                    @elseif($preview_video_type == 'html5')
                        <video id="promoPlayer" playsinline controls>
                            <source src="{{ $course_details->preview }}" type="video/mp4">
                        </video>
                    @else
                        <video id="promoPlayer" playsinline controls>
                            <source src="{{ asset($course_details->preview) }}" type="video/mp4">
                        </video>
                    @endif

                    <script src="{{ asset('assets/global/plyr/plyr.js') }}"></script>
                    <script>
                        "use strict";
                        var promoPlayer = new Plyr('#promoPlayer');
                    </script>

                </div>
            </div>
        </div>
    </div>

    <script>
        "use strict";
        const myModalElement = document.getElementById('exampleModal')
        myModalElement.addEventListener('hidden.bs.modal', event => {
            promoPlayer.pause();
            $('#exampleModal').toggleClass('in');
        });
        myModalElement.addEventListener('shown.bs.modal', event => {
            promoPlayer.play();
            $('#exampleModal').toggleClass('in');
        });
    </script>

@endsection
@push('js')
    <script>
        "use strict";
        $(document).ready(function() {
            $('#more_description').on('click', function(e) {
                e.preventDefault();

                let ellipsis = $('.description').attr('id');
                $('.description').toggleClass(ellipsis);

                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    $(this).text('See less');
                } else {
                    $(this).html('See more <i class="fa-solid fa-angle-right me-2"></i>');
                }
            });
        });
    </script>
@endpush
