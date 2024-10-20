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

    <!-- Main Area Start -->
    <main>
        <div class="container">
            <div class="row mcg-24">
                <div class="col-lg-12">
                    <!-- Link Path  -->
                    <div class="link-path-area link-path-area-pb">
                        <h3 class="text-15">{{ get_phrase('Home') }} / {{ get_phrase('Courses') }} <span>/</span> <span>{{ $course_details->title }}</span></h3>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- Course Author Area -->
                    <div class="course-author-area">
                        <div class="courser-author-cover">
                            <img src="{{ get_image($course_details->thumbnail) }}" alt="course-thumbnail">
                        </div>
                        <div class="course-author-profile">
                            <img src="{{ get_image(course_by_instructor($course_details->id)->photo) }}" alt="profile">
                        </div>
                        <h3 class="text-15">{{ get_phrase('A Course by') }} <span>{{ course_by_instructor($course_details->id)->name }}</span></h3>
                    </div>
                    <div class="course-description-main">
                        <!-- Course Heading Description -->
                        <div class="course-desvription">
                            <h1 class="text-36">{{ $course_details->title }}</h1>
                            @if (isset($course_details->description))
                                <p class="text-15">{!! removeScripts($course_details->description) !!}</p>
                            @else
                                <p class="text-15">{{ get_phrase('No Course Description') }}</p>
                            @endif
                        </div>
                        <!-- Course Curriculum -->
                        <div class="course-curriculum-area">
                            <div class="course-sub-title">
                                <h2 class="title">{{ get_phrase('Course Curriculum') }}</h2>
                            </div>
                            <div class="curriculum-leason-time d-flex align-items-center">
                                <p class="leason">{{ lesson_count($course_details->id) }} {{ get_phrase('Lessons') }}</p>
                                <p class="time">{{ total_durations($course_details->id) }} hours</p>
                            </div>
                            @include('frontend.default.course.curriculum_area')
                        </div>
                        <!-- About Instructor -->
                        <div class="about-instractor-area">
                            <div class="course-sub-title">
                                <h2 class="title">{{ get_phrase('About Instructor') }}</h2>
                            </div>
                            @php
                                $instructor = course_by_instructor($course_details->id);
                            @endphp
                            <div class="instractor-img-details d-flex">
                                <div class="instractor-img">
                                    <img src="{{ get_image($instructor->photo) }}" alt="...">
                                </div>
                                <div class="abour-instractor-details">
                                    <div class="instractor-name-title">
                                        <h4 class="name">{{ ucfirst($instructor->name) }}</h4>
                                        <h4 class="title">@php
                                            $skills = json_decode($instructor->skills, true);
                                            if (is_array($skills) && count($skills) > 0) {
                                                $skills = array_column($skills, 'value');
                                            }
                                        @endphp
                                            {{ $skills ? implode(', ', $skills) : '' }}</h4>
                                    </div>
                                    <p class="info">
                                        {{ $instructor->about }}
                                    </p>
                                    <p class="info">
                                        {{ $instructor->biography }}
                                    </p>
                                    <ul class="instractor-social-link">
                                        <li>
                                            <a href="{{ $instructor->facebook }}">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_369_3503)">
                                                        <path
                                                            d="M13.9983 13.499H16.4983L17.4983 9.49902H13.9983V7.49902C13.9983 6.46902 13.9983 5.49902 15.9983 5.49902H17.4983V2.13902C17.1723 2.09602 15.9413 1.99902 14.6413 1.99902C11.9263 1.99902 9.99831 3.65602 9.99831 6.69902V9.49902H6.99831V13.499H9.99831V21.999H13.9983V13.499Z"
                                                            fill="#6B7385" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_369_3503">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $instructor->twitter }}">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_369_3506)">
                                                        <path
                                                            d="M12.0017 1.99902C14.7187 1.99902 15.0577 2.00902 16.1237 2.05902C17.1887 2.10902 17.9137 2.27602 18.5517 2.52402C19.2117 2.77802 19.7677 3.12202 20.3237 3.67702C20.8322 4.17692 21.2256 4.78161 21.4767 5.44902C21.7237 6.08602 21.8917 6.81202 21.9417 7.87702C21.9887 8.94302 22.0017 9.28202 22.0017 11.999C22.0017 14.716 21.9917 15.055 21.9417 16.121C21.8917 17.186 21.7237 17.911 21.4767 18.549C21.2264 19.2168 20.8328 19.8216 20.3237 20.321C19.8237 20.8293 19.219 21.2228 18.5517 21.474C17.9147 21.721 17.1887 21.889 16.1237 21.939C15.0577 21.986 14.7187 21.999 12.0017 21.999C9.28469 21.999 8.94569 21.989 7.87969 21.939C6.81469 21.889 6.08969 21.721 5.45169 21.474C4.78402 21.2235 4.17922 20.83 3.67969 20.321C3.1711 19.8212 2.77763 19.2165 2.52669 18.549C2.27869 17.912 2.11169 17.186 2.06169 16.121C2.01469 15.055 2.00169 14.716 2.00169 11.999C2.00169 9.28202 2.01169 8.94302 2.06169 7.87702C2.11169 6.81102 2.27869 6.08702 2.52669 5.44902C2.77693 4.7812 3.1705 4.17634 3.67969 3.67702C4.17936 3.16825 4.78412 2.77475 5.45169 2.52402C6.08969 2.27602 6.81369 2.10902 7.87969 2.05902C8.94569 2.01202 9.28469 1.99902 12.0017 1.99902ZM12.0017 6.99902C10.6756 6.99902 9.40384 7.52581 8.46616 8.46349C7.52848 9.40117 7.00169 10.6729 7.00169 11.999C7.00169 13.3251 7.52848 14.5969 8.46616 15.5346C9.40384 16.4722 10.6756 16.999 12.0017 16.999C13.3278 16.999 14.5995 16.4722 15.5372 15.5346C16.4749 14.5969 17.0017 13.3251 17.0017 11.999C17.0017 10.6729 16.4749 9.40117 15.5372 8.46349C14.5995 7.52581 13.3278 6.99902 12.0017 6.99902ZM18.5017 6.74902C18.5017 6.4175 18.37 6.09956 18.1356 5.86514C17.9012 5.63072 17.5832 5.49902 17.2517 5.49902C16.9202 5.49902 16.6022 5.63072 16.3678 5.86514C16.1334 6.09956 16.0017 6.4175 16.0017 6.74902C16.0017 7.08054 16.1334 7.39849 16.3678 7.63291C16.6022 7.86733 16.9202 7.99902 17.2517 7.99902C17.5832 7.99902 17.9012 7.86733 18.1356 7.63291C18.37 7.39849 18.5017 7.08054 18.5017 6.74902ZM12.0017 8.99902C12.7973 8.99902 13.5604 9.31509 14.123 9.8777C14.6856 10.4403 15.0017 11.2034 15.0017 11.999C15.0017 12.7947 14.6856 13.5577 14.123 14.1203C13.5604 14.683 12.7973 14.999 12.0017 14.999C11.206 14.999 10.443 14.683 9.88037 14.1203C9.31776 13.5577 9.00169 12.7947 9.00169 11.999C9.00169 11.2034 9.31776 10.4403 9.88037 9.8777C10.443 9.31509 11.206 8.99902 12.0017 8.99902Z"
                                                            fill="#6B7385" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_369_3506">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $instructor->linkedin }}">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_369_3509)">
                                                        <path
                                                            d="M6.93871 5.00002C6.93844 5.53046 6.72747 6.03906 6.35221 6.41394C5.97695 6.78883 5.46814 6.99929 4.93771 6.99902C4.40727 6.99876 3.89867 6.78779 3.52378 6.41253C3.1489 6.03727 2.93844 5.52846 2.93871 4.99802C2.93897 4.46759 3.14994 3.95899 3.5252 3.5841C3.90046 3.20922 4.40927 2.99876 4.93971 2.99902C5.47014 2.99929 5.97874 3.21026 6.35363 3.58552C6.72851 3.96078 6.93897 4.46959 6.93871 5.00002ZM6.99871 8.48002H2.99871V21H6.99871V8.48002ZM13.3187 8.48002H9.33871V21H13.2787V14.43C13.2787 10.77 18.0487 10.43 18.0487 14.43V21H21.9987V13.07C21.9987 6.90002 14.9387 7.13002 13.2787 10.16L13.3187 8.48002Z"
                                                            fill="#6B7385" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_369_3509">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_369_3512)">
                                                        <path
                                                            d="M13.37 2.09383C10.9773 1.76469 8.54625 2.31238 6.52583 3.63579C4.50541 4.9592 3.03205 6.96893 2.3778 9.2939C1.72355 11.6189 1.93261 14.102 2.96636 16.2849C4.00012 18.4677 5.78876 20.2029 8.002 21.1698C7.94215 20.4016 7.99708 19.6288 8.165 18.8768C8.35 18.0378 9.461 13.4138 9.461 13.4138C9.23977 12.9179 9.12921 12.3798 9.137 11.8368C9.137 10.3518 9.994 9.24383 11.06 9.24383C11.2515 9.24105 11.4414 9.27953 11.6167 9.35666C11.792 9.4338 11.9486 9.54778 12.0759 9.69086C12.2033 9.83393 12.2983 10.0027 12.3546 10.1858C12.4108 10.3689 12.427 10.5619 12.402 10.7518C12.402 11.6518 11.824 13.0138 11.522 14.2918C11.4623 14.5262 11.4585 14.7713 11.5109 15.0075C11.5634 15.2436 11.6705 15.4641 11.8238 15.6512C11.977 15.8383 12.1721 15.9868 12.3932 16.0847C12.6144 16.1826 12.8555 16.2272 13.097 16.2148C14.995 16.2148 16.267 13.7838 16.267 10.9138C16.267 8.71383 14.81 7.06583 12.124 7.06583C11.4814 7.04086 10.8404 7.14676 10.2399 7.37709C9.63948 7.60742 9.09211 7.95738 8.63105 8.40572C8.16999 8.85406 7.80486 9.39144 7.55782 9.98521C7.31079 10.579 7.18701 11.2168 7.194 11.8598C7.16537 12.5732 7.3955 13.2728 7.842 13.8298C7.92543 13.8921 7.98635 13.9798 8.01557 14.0798C8.0448 14.1797 8.04073 14.2864 8.004 14.3838C7.958 14.5678 7.842 15.0068 7.796 15.1678C7.78643 15.2224 7.76417 15.274 7.73102 15.3184C7.69787 15.3629 7.65475 15.3989 7.60513 15.4236C7.55551 15.4483 7.50079 15.461 7.44535 15.4607C7.38992 15.4604 7.33534 15.4471 7.286 15.4218C5.902 14.8678 5.25 13.3448 5.25 11.6058C5.25 8.75883 7.634 5.35083 12.404 5.35083C16.2 5.35083 18.724 8.12783 18.724 11.0978C18.724 15.0068 16.547 17.9458 13.33 17.9458C12.8492 17.9612 12.3723 17.8551 11.9433 17.6373C11.5144 17.4195 11.1473 17.0971 10.876 16.6998C10.876 16.6998 10.298 19.0158 10.184 19.4538C9.95129 20.2105 9.60791 20.9286 9.165 21.5848C10.088 21.8648 11.047 22.0048 12.011 22.0008C13.3246 22.0019 14.6255 21.7438 15.8392 21.2414C17.0529 20.739 18.1555 20.0021 19.0841 19.0729C20.0126 18.1438 20.7487 17.0406 21.2503 15.8265C21.7518 14.6125 22.009 13.3114 22.007 11.9978C22.0058 9.58283 21.1308 7.24983 19.5436 5.42961C17.9565 3.6094 15.7643 2.4249 13.372 2.09483L13.37 2.09383Z"
                                                            fill="#6B7385" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_369_3512">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <!-- Students Feedback -->
                        @include('frontend.default.course.reviews')
                    </div>
                </div>
                @include('frontend.default.course.pricing')
            </div>

            <div class="padding-bottom-110">
                {{ $reviews->links('vendor.pagination.default') }}
            </div>
        </div>
    </main>
    <!-- Main Area End -->
@endsection
@push('js')
@endpush
