@extends('layouts.default')
@push('title', get_phrase('My courses'))
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
                            <h1 class="title">{{ get_phrase('My Course') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="{{ route('my.courses') }}">{{ get_phrase('My Course') }}</a>
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
                    <div class="row mrg-30">
                        @foreach ($my_courses as $course)
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="student-single-course">
                                    <div class="student-course-img">
                                        <img src="{{ get_image($course->thumbnail) }}" alt="course-thumbnail">
                                    </div>
                                    <div class="student-course-details">
                                        <h5 class="title">{{ ucfirst($course->title) }}</h5>
                                        <div class="course-progress">
                                            <div class="course-list-leasons d-flex justify-content-between align-items-center mb-10">
                                                <h4 class="leasons">{{ get_phrase('Progress') }}</h4>
                                                <div class="course-list-stars">
                                                    <h4 class="average">{{ progress_bar($course->course_id) }}%</h4>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" style="width: {{ progress_bar($course->course_id) }}%"></div>
                                            </div>
                                        </div>
                                        @php
                                            $watch_history = App\Models\Watch_history::where('course_id', $course->course_id)
                                                ->where('student_id', auth()->user()->id)
                                                ->first();

                                            $lesson = App\Models\Lesson::where('course_id', $course->course_id)
                                                ->orderBy('sort', 'asc')
                                                ->first();

                                            if (!$watch_history && !$lesson) {
                                                $url = route('course.player', ['slug' => $course->slug]);
                                            } else {
                                                if ($watch_history) {
                                                    $lesson_id = $watch_history->watching_lesson_id;
                                                } elseif ($lesson) {
                                                    $lesson_id = $lesson->id;
                                                }
                                                $url = route('course.player', ['slug' => $course->slug, 'id' => $lesson_id]);
                                            }

                                        @endphp
                                        <a href="{{ $url }}" class="continue-leason-btn">{{ get_phrase('Continue Courses') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($my_courses->count() == 0)
                            <div class="lms1-card">
                                @include('frontend.default.empty')
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('js')

@endpush
