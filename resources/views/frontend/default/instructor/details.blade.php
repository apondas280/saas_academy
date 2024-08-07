@extends('layouts.default')
@push('title', get_phrase('Instructor details'))
@push('meta')@endpush
@push('css')@endpush
@section('content')

<!-- Instructor Details Area Start -->
<section class="overflow-x">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Link Path  -->
                <div class="link-path-area">
                    <h3 class="text-15">{{ get_phrase('Home') }} / {{ get_phrase('Instructor Details') }} <span>/</span> <span>{{ $instructor_details->name }}</span></h3>
                </div>
            </div>
        </div>
        <div class="row mrg-30 padding-top-80 padding-bottom-110">
            <div class="col-lg-4 col-md-5">
                <div class="instructor-details-profile">
                    <img src="{{ get_image($instructor_details->photo) }}" alt="instructor-photo">
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="instructor-details-area">
                    <div class="instructor-details-top d-flex align-items-center justify-content-between">
                        <div class="instructor-name-role">
                            <h3 class="name">{{ $instructor_details->name }}</h3>
                            <p class="role">{{ $instructor_details->skill }}</p>
                        </div>
                        <div class="instructor-social-area">
                            <h4 class="title">Follow us</h4>
                            <ul>
                                <li><a href="{{ $instructor_details->facebook ?? 'javascript: void(0);' }}">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_369_3754)">
                                        <path d="M11.6654 11.2493H13.7487L14.582 7.91602H11.6654V6.24935C11.6654 5.39102 11.6654 4.58268 13.332 4.58268H14.582V1.78268C14.3104 1.74685 13.2845 1.66602 12.2012 1.66602C9.9387 1.66602 8.33203 3.04685 8.33203 5.58268V7.91602H5.83203V11.2493H8.33203V18.3327H11.6654V11.2493Z" fill="#6B7385"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_369_3754">
                                        <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                 
                                </a></li>
                                <li><a href="{{ $instructor_details->twitter ?? 'javascript: void(0);' }}">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_369_3757)">
                                        <path d="M10.0013 1.66602C12.2655 1.66602 12.548 1.67435 13.4363 1.71602C14.3238 1.75768 14.928 1.89685 15.4596 2.10352C16.0096 2.31518 16.473 2.60185 16.9363 3.06435C17.36 3.48093 17.6879 3.98484 17.8971 4.54102C18.103 5.07185 18.243 5.67685 18.2846 6.56435C18.3238 7.45268 18.3346 7.73518 18.3346 9.99935C18.3346 12.2635 18.3263 12.546 18.2846 13.4343C18.243 14.3218 18.103 14.926 17.8971 15.4577C17.6885 16.0142 17.3606 16.5182 16.9363 16.9343C16.5196 17.3579 16.0157 17.6858 15.4596 17.8952C14.9288 18.101 14.3238 18.241 13.4363 18.2827C12.548 18.3218 12.2655 18.3327 10.0013 18.3327C7.73714 18.3327 7.45464 18.3243 6.5663 18.2827C5.6788 18.241 5.07464 18.101 4.54297 17.8952C3.98657 17.6864 3.48257 17.3585 3.0663 16.9343C2.64247 16.5178 2.31458 16.0139 2.10547 15.4577C1.8988 14.9268 1.75964 14.3218 1.71797 13.4343C1.6788 12.546 1.66797 12.2635 1.66797 9.99935C1.66797 7.73518 1.6763 7.45268 1.71797 6.56435C1.75964 5.67602 1.8988 5.07268 2.10547 4.54102C2.314 3.9845 2.64197 3.48045 3.0663 3.06435C3.48269 2.64037 3.98666 2.31246 4.54297 2.10352C5.07464 1.89685 5.67797 1.75768 6.5663 1.71602C7.45464 1.67685 7.73714 1.66602 10.0013 1.66602ZM10.0013 5.83268C8.89623 5.83268 7.83643 6.27167 7.05502 7.05307C6.27362 7.83447 5.83464 8.89428 5.83464 9.99935C5.83464 11.1044 6.27362 12.1642 7.05502 12.9456C7.83643 13.727 8.89623 14.166 10.0013 14.166C11.1064 14.166 12.1662 13.727 12.9476 12.9456C13.729 12.1642 14.168 11.1044 14.168 9.99935C14.168 8.89428 13.729 7.83447 12.9476 7.05307C12.1662 6.27167 11.1064 5.83268 10.0013 5.83268ZM15.418 5.62435C15.418 5.34808 15.3082 5.08313 15.1129 4.88778C14.9175 4.69243 14.6526 4.58268 14.3763 4.58268C14.1 4.58268 13.8351 4.69243 13.6397 4.88778C13.4444 5.08313 13.3346 5.34808 13.3346 5.62435C13.3346 5.90062 13.4444 6.16557 13.6397 6.36092C13.8351 6.55627 14.1 6.66602 14.3763 6.66602C14.6526 6.66602 14.9175 6.55627 15.1129 6.36092C15.3082 6.16557 15.418 5.90062 15.418 5.62435ZM10.0013 7.49935C10.6643 7.49935 11.3002 7.76274 11.7691 8.23158C12.2379 8.70042 12.5013 9.33631 12.5013 9.99935C12.5013 10.6624 12.2379 11.2983 11.7691 11.7671C11.3002 12.236 10.6643 12.4993 10.0013 12.4993C9.33826 12.4993 8.70238 12.236 8.23353 11.7671C7.76469 11.2983 7.5013 10.6624 7.5013 9.99935C7.5013 9.33631 7.76469 8.70042 8.23353 8.23158C8.70238 7.76274 9.33826 7.49935 10.0013 7.49935Z" fill="#6B7385"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_369_3757">
                                        <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                 
                                </a></li>
                                <li><a href="{{ $instructor_details->linkedin ?? 'javascript: void(0);' }}">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_369_3760)">
                                        <path d="M5.78255 4.16652C5.78233 4.60855 5.60652 5.03239 5.29381 5.34479C4.98109 5.6572 4.55708 5.83258 4.11505 5.83236C3.67302 5.83214 3.24919 5.65633 2.93678 5.34361C2.62438 5.0309 2.449 4.60688 2.44922 4.16486C2.44944 3.72283 2.62525 3.29899 2.93796 2.98659C3.25068 2.67419 3.67469 2.4988 4.11672 2.49902C4.55875 2.49924 4.98258 2.67505 5.29499 2.98777C5.60739 3.30049 5.78277 3.7245 5.78255 4.16652ZM5.83255 7.06652H2.49922V17.4999H5.83255V7.06652ZM11.0992 7.06652H7.78255V17.4999H11.0659V12.0249C11.0659 8.97486 15.0409 8.69152 15.0409 12.0249V17.4999H18.3326V10.8915C18.3326 5.74986 12.4492 5.94152 11.0659 8.46652L11.0992 7.06652Z" fill="#6B7385"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_369_3760">
                                        <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                 
                                </a></li>
                                <li><a href="#">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_369_3763)">
                                        <path d="M11.1417 1.74502C9.1478 1.47074 7.12195 1.92715 5.43827 3.02999C3.75459 4.13283 2.52679 5.80761 1.98158 7.74508C1.43637 9.68255 1.61059 11.7519 2.47205 13.5709C3.33351 15.3899 4.82404 16.8359 6.66841 17.6417C6.61854 17.0015 6.66432 16.3575 6.80425 15.7309C6.95841 15.0317 7.88425 11.1784 7.88425 11.1784C7.69989 10.7651 7.60775 10.3167 7.61425 9.86419C7.61425 8.62669 8.32841 7.70336 9.21675 7.70336C9.37634 7.70103 9.53455 7.7331 9.68064 7.79738C9.82673 7.86166 9.95727 7.95665 10.0634 8.07588C10.1695 8.19511 10.2487 8.33578 10.2955 8.48835C10.3424 8.64091 10.3559 8.80178 10.3351 8.96002C10.3351 9.71002 9.85341 10.845 9.60175 11.91C9.55201 12.1053 9.54885 12.3096 9.59253 12.5064C9.63621 12.7031 9.7255 12.8869 9.85321 13.0428C9.98092 13.1987 10.1435 13.3225 10.3278 13.4041C10.5121 13.4857 10.713 13.5228 10.9142 13.5125C12.4959 13.5125 13.5559 11.4867 13.5559 9.09502C13.5559 7.26169 12.3417 5.88836 10.1034 5.88836C9.56789 5.86755 9.03373 5.95579 8.53336 6.14773C8.03298 6.33968 7.57684 6.63131 7.19262 7.00493C6.8084 7.37855 6.50413 7.82636 6.29827 8.32117C6.0924 8.81598 5.98925 9.34746 5.99508 9.88336C5.97122 10.4778 6.163 11.0608 6.53508 11.525C6.60461 11.5769 6.65537 11.65 6.67973 11.7333C6.70408 11.8166 6.70069 11.9055 6.67008 11.9867C6.63175 12.14 6.53508 12.5059 6.49675 12.64C6.48877 12.6855 6.47023 12.7285 6.4426 12.7655C6.41497 12.8026 6.37904 12.8326 6.33769 12.8532C6.29634 12.8738 6.25073 12.8844 6.20454 12.8841C6.15835 12.8838 6.11286 12.8727 6.07175 12.8517C4.91841 12.39 4.37508 11.1209 4.37508 9.67169C4.37508 7.29919 6.36175 4.45919 10.3367 4.45919C13.5001 4.45919 15.6034 6.77336 15.6034 9.24836C15.6034 12.5059 13.7892 14.955 11.1084 14.955C10.7077 14.9678 10.3103 14.8794 9.95286 14.6979C9.59541 14.5164 9.2895 14.2477 9.06341 13.9167C9.06341 13.9167 8.58175 15.8467 8.48675 16.2117C8.29282 16.8423 8.00667 17.4407 7.63758 17.9875C8.40675 18.2209 9.20591 18.3375 10.0092 18.3342C11.1039 18.3351 12.188 18.12 13.1994 17.7013C14.2108 17.2827 15.1297 16.6686 15.9035 15.8943C16.6772 15.12 17.2907 14.2007 17.7086 13.1889C18.1266 12.1772 18.3409 11.093 18.3392 9.99836C18.3382 7.98586 17.6091 6.04169 16.2864 4.52484C14.9638 3.00799 13.137 2.02091 11.1434 1.74586L11.1417 1.74502Z" fill="#6B7385"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_369_3763">
                                        <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                 
                                </a></li>
                            </ul>
                        </div>
                        <a href="#" class="follow-btn">Follow</a>
                    </div>
                    <div class="instructor-details-about">
                        <h4 class="title">About me</h4>
                        <p class="info">{{ $instructor_details->boigraphy }}</p>
                    </div>
                    <div class="instructor-contact-wrap d-flex align-items-center flex-wrap">
                        @if ($instructor_details->phone)
                        <div class="instructor-contact-single d-flex align-items-center">
                            <div class="icon">
                                <img src="{{ asset('assets/frontend/default/images/icons/call-blue.svg') }}" alt="">
                            </div>
                            <div class="details">
                                <h5 class="title">{{ get_phrase('Phone') }}</h5>
                                <p class="info">{{ $instructor_details->phone }}</p>
                            </div>
                        </div>
                        @endif
                        @if ($instructor_details->email)
                        <div class="instructor-contact-single d-flex align-items-center">
                            <div class="icon">
                                <img src="{{ asset('assets/frontend/default/images/icons/mail-blue.svg') }}" alt="">
                            </div>
                            <div class="details">
                                <h5 class="title">{{ get_phrase('Email') }}</h5>
                                <p class="info">{{ $instructor_details->email }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instructor Details Area End -->

<!-- Courses Area Start  -->
<section>
    <div class="container">
        <div class="row">
            <!-- Section Title -->
            <div class="col-lg-12">
                <div class="section-title padding-bottom-50">
                    <h2 class="text-40">{{ get_phrase('My Courses') }}</h2>
                </div>
            </div>
        </div>
        <div class="row mrg-30 padding-bottom-110">
            @foreach ($instructor_courses as $course)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="single-courses">
                        <a href="{{ route('course.details', $course->slug) }}" class="single-course-link"></a>
                        <div class="single-course-inner">
                            <div class="course-img">
                                <img src="{{ get_image($course->thumbnail) }}" alt="course-thumbnail">
                                <a href="javascript:void(0);" class="wish-react">
                                    <div class="wish-icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="favorite_FILL0_wght300_GRAD0_opsz24 (1) 1">
                                            <path id="Vector" d="M9.99212 17.4246C9.8137 17.4246 9.63449 17.3926 9.45448 17.3285C9.27445 17.2644 9.11606 17.1639 8.97931 17.0272L7.78223 15.9391C6.30466 14.5918 4.98548 13.2684 3.82468 11.9687C2.66389 10.669 2.0835 9.27667 2.0835 7.79165C2.0835 6.60897 2.48227 5.61885 3.27981 4.82131C4.07735 4.02377 5.06746 3.625 6.25014 3.625C6.92214 3.625 7.58587 3.77992 8.24133 4.08975C8.89677 4.39958 9.48305 4.90279 10.0001 5.59938C10.5172 4.90279 11.1035 4.39958 11.759 4.08975C12.4144 3.77992 13.0781 3.625 13.7501 3.625C14.9328 3.625 15.9229 4.02377 16.7205 4.82131C17.518 5.61885 17.9168 6.60897 17.9168 7.79165C17.9168 9.2927 17.3265 10.7005 16.146 12.0152C14.9654 13.3298 13.6492 14.6421 12.1972 15.9519L11.013 17.0272C10.8762 17.1639 10.7165 17.2644 10.5338 17.3285C10.3511 17.3926 10.1705 17.4246 9.99212 17.4246ZM9.40079 6.86538C8.94994 6.1784 8.47532 5.67493 7.97691 5.35496C7.47851 5.03497 6.90292 4.87498 6.25014 4.87498C5.41681 4.87498 4.72236 5.15276 4.16681 5.70831C3.61125 6.26387 3.33348 6.95831 3.33348 7.79165C3.33348 8.46045 3.54902 9.1597 3.9801 9.8894C4.41118 10.6191 4.95231 11.3445 5.60348 12.0656C6.25466 12.7868 6.96005 13.4914 7.71966 14.1794C8.47927 14.8675 9.18334 15.5069 9.83185 16.0977C9.87993 16.1405 9.93603 16.1618 10.0001 16.1618C10.0643 16.1618 10.1204 16.1405 10.1684 16.0977C10.8169 15.5069 11.521 14.8675 12.2806 14.1794C13.0402 13.4914 13.7456 12.7868 14.3968 12.0656C15.048 11.3445 15.5891 10.6191 16.0202 9.8894C16.4513 9.1597 16.6668 8.46045 16.6668 7.79165C16.6668 6.95831 16.389 6.26387 15.8335 5.70831C15.2779 5.15276 14.5835 4.87498 13.7501 4.87498C13.0974 4.87498 12.5218 5.03497 12.0234 5.35496C11.525 5.67493 11.0503 6.1784 10.5995 6.86538C10.529 6.97221 10.4403 7.05234 10.3335 7.10577C10.2266 7.15919 10.1155 7.1859 10.0001 7.1859C9.88477 7.1859 9.77366 7.15919 9.66681 7.10577C9.55998 7.05234 9.4713 6.97221 9.40079 6.86538Z" fill="#6B7385"/>
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="course-details">
                                <div class="course-titles">
                                    <h3 class="text-16">{{ ucfirst($course->title) }}</h3>
                                    <p class="text-13 card_preview_text">{{ $course->short_description }}</p>
                                </div>
                            <div class="leason-and-stars d-flex align-items-center justify-content-between  flex-wrap">
                                <div class="course-leasons d-flex align-items-center">
                                    <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="leason">
                                    <h4 class="text-13">{{ lesson_count($course->id) }} {{ get_phrase('Lessons') }}</h4>
                                </div>
                                <div class="course-stars d-flex align-items-center">
                                    <h4 class="text-13">4.8</h4>
                                    <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="star">
                                    <h4 class="text-13">({{ course_enrollments($course->id) }})</h4>
                                </div>
                            </div>
                            <div class="course-prices d-flex align-items-end">
                                @if (isset($course->discount_flag) && $course->discount_flag == 1)
                                    <h2 class="text-20 text-blue">{{ currency(number_format($course->discounted_price, 2)) }}
                                    </h2>
                                    <h3 class="text-16">{{ currency(number_format($course->price, 2)) }}</h3>
                                @elseif (isset($course->is_paid) && $course->is_paid == 0)
                                    <h2 class="text-20 text-blue">{{ get_phrase('Free') }}</h2>
                                @else
                                    <h2 class="text-20 text-blue">{{ currency(number_format($course->price, 2)) }}</h2>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Courses Area End  -->

@endsection