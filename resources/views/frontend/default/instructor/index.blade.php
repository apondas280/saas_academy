@extends('layouts.default')
@push('title', get_phrase('Instructors'))
@push('meta')@endpush
@push('css')@endpush
@section('content')

<!-- Top Link Path Area Start -->
<section class="top-link-path-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top-link-path-area">
                    <div class="left-shape-1">
                        <img src="{{ asset('assets/frontend/default/images/path-shape-1.png') }}" alt="">
                    </div>
                    <div class="right-shape-1">
                        <img src="{{ asset('assets/frontend/default/images/path-shape-2.png') }}" alt="">
                    </div>
                    <div class="top-link-path-inner">
                        <h1 class="title">{{ get_phrase('Instructors') }}</h1>
                        <div class="top-link-path d-flex align-items-center justify-content-center">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                                {{ get_phrase('Home') }}
                            </a>
                            <a href="{{ route('instructors') }}">{{ get_phrase('Instructors') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Link Path Area End -->

<!-- Banner Area Start -->
<section>
    <div class="container">
        <div class="row mrg-30 padding-top-80 padding-bottom-110 align-items-center">
            <div class="col-lg-5 order-2 order-lg-1">
                <div class="instructor-banner-content wow fadeInUp" data-wow-duration="2s">
                    <h4 class="hightlight">{{ get_phrase('OUR TEACHER ARE PASSIONATE') }}</h4>
                    <h1 class="title">{{ get_phrase('Start your Education Career with us') }}</h1>
                    <p class="info">{{ get_phrase('It is a long established fact that a reader will be distracted by the content of a page when looking at its layout.') }} </p>
                    <ul class="instructor-banner-list">
                        <li>
                            <img src="{{ asset('assets/frontend/default/images/icons/star-blue.svg') }}" alt="">
                            <span>{{ get_phrase('Hard-picked authors') }}</span>
                        </li>
                        <li>
                            <img src="{{ asset('assets/frontend/default/images/icons/star-blue.svg') }}" alt="">
                            <span>{{ get_phrase('Easy to follow curriculum') }}</span>
                        </li>
                        <li>
                            <img src="{{ asset('assets/frontend/default/images/icons/star-blue.svg') }}" alt="">
                            <span>{{ get_phrase('Free courses') }}</span>
                        </li>
                        <li>
                            <img src="{{ asset('assets/frontend/default/images/icons/star-blue.svg') }}" alt="">
                            <span>{{ get_phrase('Money-back gurantee') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 order-1 order-lg-2">
                <div class="instructor-banner-wrap wow bounceInRight" data-wow-duration="2s">
                    <img class="banner" src="{{ asset('assets/frontend/default/images/instructors/instructors-banner.webp') }}" alt="">
                    <div class="ui-ux">
                        <img src="{{ asset('assets/frontend/default/images/instructors/uiux.svg') }}" alt="">
                        <h5 class="title">UI/UX</h5>
                    </div>
                    <div class="uiux-user-details">
                        <h5 class="title">UI/ UX Design System</h5>
                        <div class="profile-name d-flex align-items-center">
                            <div class="img">
                                <img src="{{ asset('assets/frontend/default/images/instructors/uiux-user-1.webp') }}" alt="">
                            </div>
                            <div class="name-title">
                                <h5 class="name">Kim William</h5>
                                <p class="courses">145 Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="web-user-details d-flex align-items-center">
                        <div class="img">
                            <img src="{{ asset('assets/frontend/default/images/instructors/web-user-1.webp') }}" alt="">
                        </div>
                        <div class="details d-flex align-items-center justify-content-between">
                            <div class="name-title">
                                <h5 class="name">David Foden</h5>
                                <p class="title">Web Developer</p>
                            </div>
                            <h4 class="price">$49</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

<!-- Tutor Area Start -->
<section>
    <div class="container">
        <div class="row">
            <!-- Section Title -->
            <div class="col-lg-12">
                <div class="section-title padding-bottom-50">
                    <h4 class="text-15 blue-batch">{{ get_phrase('IDEAL TUTOR FOR EVERYONE') }}</h4>
                    <h2 class="text-40">{{ get_phrase('Qualified Online Tutors') }}</h2>
                </div>
            </div>
        </div>
        <div class="row mrg-30 mcg-30 padding-bottom-110 wow fadeInUp" data-wow-duration="2s">
            @foreach ($instructors as $instructor)
            <div class="col-lg-4 col-md-6">
                <div class="single-tutor-area">
                    <div class="tutor-img">
                        <img src="{{ get_image($instructor->photo) }}" alt="instructor-photo">
                        <div class="single-tutor-overlay">
                            <ul>
                                <li><a href="{{ $instructor->facebook }}" target="_blank">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_369_2173)">
                                        <path d="M9.19902 8.89951H10.699L11.299 6.49951H9.19902V5.29951C9.19902 4.68151 9.19902 4.09951 10.399 4.09951H11.299V2.08351C11.1034 2.05771 10.3648 1.99951 9.58482 1.99951C7.95582 1.99951 6.79902 2.99371 6.79902 4.81951V6.49951H4.99902V8.89951H6.79902V13.9995H9.19902V8.89951Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_369_2173">
                                        <rect width="14.4" height="14.4" fill="white" transform="translate(0.799805 0.799805)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                 
                                </a></li>
                                <li><a href="{{ $instructor->twitter }}" target="_blank">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_369_2178)">
                                        <path d="M8.00098 1.99951C9.63118 1.99951 9.83458 2.00551 10.4742 2.03551C11.1132 2.06551 11.5482 2.16571 11.931 2.31451C12.327 2.46691 12.6606 2.67331 12.9942 3.00631C13.2993 3.30625 13.5353 3.66906 13.686 4.06951C13.8342 4.45171 13.935 4.88731 13.965 5.52631C13.9932 6.16591 14.001 6.36931 14.001 7.99951C14.001 9.62971 13.995 9.83311 13.965 10.4727C13.935 11.1117 13.8342 11.5467 13.686 11.9295C13.5358 12.3302 13.2997 12.6931 12.9942 12.9927C12.6942 13.2977 12.3314 13.5338 11.931 13.6845C11.5488 13.8327 11.1132 13.9335 10.4742 13.9635C9.83458 13.9917 9.63118 13.9995 8.00098 13.9995C6.37078 13.9995 6.16738 13.9935 5.52778 13.9635C4.88878 13.9335 4.45378 13.8327 4.07098 13.6845C3.67037 13.5342 3.30749 13.2981 3.00778 12.9927C2.70262 12.6928 2.46654 12.33 2.31598 11.9295C2.16718 11.5473 2.06698 11.1117 2.03698 10.4727C2.00878 9.83311 2.00098 9.62971 2.00098 7.99951C2.00098 6.36931 2.00698 6.16591 2.03698 5.52631C2.06698 4.88671 2.16718 4.45231 2.31598 4.06951C2.46612 3.66882 2.70226 3.3059 3.00778 3.00631C3.30758 2.70105 3.67043 2.46495 4.07098 2.31451C4.45378 2.16571 4.88818 2.06551 5.52778 2.03551C6.16738 2.00731 6.37078 1.99951 8.00098 1.99951ZM8.00098 4.99951C7.20533 4.99951 6.44227 5.31558 5.87966 5.87819C5.31705 6.4408 5.00098 7.20386 5.00098 7.99951C5.00098 8.79516 5.31705 9.55822 5.87966 10.1208C6.44227 10.6834 7.20533 10.9995 8.00098 10.9995C8.79663 10.9995 9.55969 10.6834 10.1223 10.1208C10.6849 9.55822 11.001 8.79516 11.001 7.99951C11.001 7.20386 10.6849 6.4408 10.1223 5.87819C9.55969 5.31558 8.79663 4.99951 8.00098 4.99951ZM11.901 4.84951C11.901 4.6506 11.822 4.45983 11.6813 4.31918C11.5407 4.17853 11.3499 4.09951 11.151 4.09951C10.9521 4.09951 10.7613 4.17853 10.6206 4.31918C10.48 4.45983 10.401 4.6506 10.401 4.84951C10.401 5.04842 10.48 5.23919 10.6206 5.37984C10.7613 5.52049 10.9521 5.59951 11.151 5.59951C11.3499 5.59951 11.5407 5.52049 11.6813 5.37984C11.822 5.23919 11.901 5.04842 11.901 4.84951ZM8.00098 6.19951C8.47837 6.19951 8.9362 6.38915 9.27377 6.72672C9.61133 7.06428 9.80098 7.52212 9.80098 7.99951C9.80098 8.4769 9.61133 8.93474 9.27377 9.2723C8.9362 9.60987 8.47837 9.79951 8.00098 9.79951C7.52359 9.79951 7.06575 9.60987 6.72818 9.2723C6.39062 8.93474 6.20098 8.4769 6.20098 7.99951C6.20098 7.52212 6.39062 7.06428 6.72818 6.72672C7.06575 6.38915 7.52359 6.19951 8.00098 6.19951Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_369_2178">
                                        <rect width="14.4" height="14.4" fill="white" transform="translate(0.799805 0.799805)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                 
                                </a></li>
                                <li><a href="{{ $instructor->linkedin }}" target="_blank">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_369_2183)">
                                        <path d="M4.96299 3.79972C4.96283 4.11798 4.83625 4.42314 4.61109 4.64807C4.38594 4.873 4.08065 4.99928 3.76239 4.99912C3.44413 4.99896 3.13897 4.87238 2.91404 4.64723C2.6891 4.42207 2.56283 4.11678 2.56299 3.79852C2.56315 3.48026 2.68973 3.1751 2.91488 2.95017C3.14004 2.72524 3.44533 2.59896 3.76359 2.59912C4.08185 2.59928 4.38701 2.72586 4.61194 2.95102C4.83687 3.17617 4.96315 3.48146 4.96299 3.79972ZM4.99899 5.88772H2.59899V13.3997H4.99899V5.88772ZM8.79099 5.88772H6.40299V13.3997H8.76699V9.45772C8.76699 7.26172 11.629 7.05772 11.629 9.45772V13.3997H13.999V8.64172C13.999 4.93972 9.76299 5.07772 8.76699 6.89572L8.79099 5.88772Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_369_2183">
                                        <rect width="14.4" height="14.4" fill="white" transform="translate(0.799805 0.799805)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                 
                                </a></li>
                                <li><a href="#">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_369_2188)">
                                        <path d="M8.82215 2.05601C7.38652 1.85852 5.9279 2.18714 4.71565 2.98118C3.5034 3.77523 2.61938 4.98107 2.22683 6.37605C1.83429 7.77103 1.95972 9.26093 2.57997 10.5706C3.20023 11.8804 4.27341 12.9214 5.60135 13.5016C5.56544 13.0407 5.59841 12.577 5.69916 12.1258C5.81015 11.6224 6.47676 8.84801 6.47676 8.84801C6.34402 8.55047 6.27768 8.22758 6.28236 7.90181C6.28236 7.01081 6.79656 6.34601 7.43616 6.34601C7.55106 6.34433 7.66498 6.36742 7.77016 6.41371C7.87534 6.45999 7.96933 6.52838 8.04572 6.61422C8.12212 6.70007 8.17913 6.80136 8.21289 6.9112C8.24665 7.02105 8.25636 7.13687 8.24136 7.25081C8.24136 7.79081 7.89456 8.60801 7.71336 9.37481C7.67755 9.51544 7.67527 9.66251 7.70672 9.80418C7.73817 9.94584 7.80246 10.0781 7.89441 10.1904C7.98636 10.3027 8.1034 10.3918 8.23609 10.4505C8.36879 10.5093 8.51343 10.536 8.65836 10.5286C9.79716 10.5286 10.5604 9.07001 10.5604 7.34801C10.5604 6.02801 9.68615 5.03921 8.07455 5.03921C7.68898 5.02422 7.30438 5.08776 6.94411 5.22596C6.58385 5.36416 6.25542 5.57413 5.97879 5.84314C5.70215 6.11215 5.48307 6.43457 5.33485 6.79083C5.18663 7.14709 5.11236 7.52976 5.11655 7.91561C5.09938 8.3436 5.23746 8.76338 5.50536 9.09761C5.55541 9.13498 5.59197 9.18761 5.6095 9.24756C5.62703 9.30752 5.62459 9.37156 5.60255 9.43001C5.57495 9.54041 5.50536 9.80381 5.47776 9.90041C5.47201 9.93317 5.45866 9.96412 5.43877 9.99077C5.41888 10.0174 5.393 10.039 5.36323 10.0539C5.33346 10.0687 5.30063 10.0763 5.26737 10.0761C5.23411 10.076 5.20136 10.068 5.17175 10.0528C4.34135 9.72041 3.95015 8.80661 3.95015 7.76321C3.95015 6.05501 5.38056 4.01021 8.24256 4.01021C10.5202 4.01021 12.0346 5.67641 12.0346 7.45841C12.0346 9.80381 10.7284 11.5672 8.79816 11.5672C8.50967 11.5764 8.22351 11.5128 7.96615 11.3821C7.70879 11.2514 7.48854 11.058 7.32576 10.8196C7.32576 10.8196 6.97896 12.2092 6.91055 12.472C6.77093 12.926 6.5649 13.3569 6.29916 13.7506C6.85295 13.9186 7.42835 14.0026 8.00675 14.0002C8.7949 14.0008 9.57543 13.846 10.3037 13.5446C11.0319 13.2431 11.6935 12.801 12.2506 12.2435C12.8077 11.686 13.2494 11.0241 13.5503 10.2956C13.8512 9.56719 14.0055 8.78655 14.0044 7.99841C14.0036 6.54941 13.4786 5.1496 12.5263 4.05747C11.574 2.96534 10.2588 2.25465 8.82336 2.05661L8.82215 2.05601Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_369_2188">
                                        <rect width="14.4" height="14.4" fill="white" transform="translate(0.799805 0.799805)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>                                 
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tutor-details">
                        <h4 class="name">{{ ucfirst($instructor->name) }}</h4>
                        <p class="role">
                            {{ $instructor->skills ? implode(', ', array_column(json_decode($instructor->skills, true), 'value')) : '' }}
                        </p>
                        <a href="#" class="tutor-course-btn">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.9999 7.13333L12.4833 5.21667C12.2333 5.08333 11.9333 5.08333 11.6833 5.21667L8.16659 7.13333C7.87492 7.29167 7.87492 7.70833 8.16659 7.86667L11.6833 9.78333C11.9333 9.91667 12.2333 9.91667 12.4833 9.78333L15.9999 7.86667C16.2833 7.70833 16.2833 7.29167 15.9999 7.13333ZM17.4999 2.5H2.49992C1.58325 2.5 0.833252 3.25 0.833252 4.16667V5.83333C0.833252 6.29167 1.20825 6.66667 1.66659 6.66667C2.12492 6.66667 2.49992 6.29167 2.49992 5.83333V5C2.49992 4.54167 2.87492 4.16667 3.33325 4.16667H16.6666C17.1249 4.16667 17.4999 4.54167 17.4999 5V15C17.4999 15.4583 17.1249 15.8333 16.6666 15.8333H12.4999C12.0416 15.8333 11.6666 16.2083 11.6666 16.6667C11.6666 17.125 12.0416 17.5 12.4999 17.5H17.4999C18.4166 17.5 19.1666 16.75 19.1666 15.8333V4.16667C19.1666 3.25 18.4166 2.5 17.4999 2.5ZM11.6833 10.6167L9.16659 9.24167V10.4167C9.16659 10.725 9.33325 11 9.59992 11.15L11.6833 12.2833C11.9333 12.4167 12.2333 12.4167 12.4833 12.2833L14.5666 11.15C14.8333 11 14.9999 10.7167 14.9999 10.4167V9.24167L12.4833 10.6167C12.2333 10.75 11.9333 10.75 11.6833 10.6167ZM0.833252 15V17.5H3.33325C3.33325 16.1167 2.21659 15 0.833252 15ZM1.78325 11.7417C1.28325 11.6583 0.833252 12.0667 0.833252 12.575C0.833252 12.9833 1.13325 13.325 1.54159 13.3917C3.27492 13.6917 4.64159 15.0583 4.94159 16.7917C5.00825 17.2 5.34992 17.5 5.75825 17.5C6.26659 17.5 6.66659 17.05 6.59159 16.55C6.19159 14.0833 4.24159 12.1417 1.78325 11.7417ZM1.74992 8.375C1.25825 8.33333 0.833252 8.71667 0.833252 9.20833C0.833252 9.63333 1.14992 9.99167 1.56659 10.0333C5.12492 10.375 7.95825 13.2083 8.29992 16.7667C8.34159 17.1833 8.69992 17.4917 9.12492 17.4917C9.62492 17.4917 10.0083 17.0583 9.95825 16.5667C9.51659 12.2417 6.07492 8.80833 1.74992 8.375Z" fill="#217CE9"/>
                            </svg>
                            <span>{{ count_course_by_instructor($instructor->id) }}</span>                           
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Tutor Area End -->
@endsection