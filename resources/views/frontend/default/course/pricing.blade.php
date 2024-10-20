<div class="col-lg-4">
    <div class="course-overview-area padding-bottom-50">
        @if (isset($course_details->discount_flag) && $course_details->discount_flag == 1)
            <h2 class="course-overview-price">
                {{ currency(number_format($course_details->discounted_price, 2)) }} <span><del>{{ currency(number_format($course_details->price, 2)) }}</del></span>
            </h2>
        @elseif (isset($course_details->is_paid) && $course_details->is_paid == 0)
            <h2 class="course-overview-price">
                {{ get_phrase('Free') }}
            </h2>
        @else
            <h2 class="course-overview-price">
                {{ currency(number_format($course_details->price, 2)) }}
            </h2>
        @endif
        <div class="course-leasons-level d-flex align-items-center">
            <div class="single-leason-level d-flex align-items-center">
                <div class="icon">
                    <img src="{{ asset('assets/frontend/default/images/course/leasons.svg') }}" alt="">
                </div>
                <div class="details">
                    <h5 class="title">{{ get_phrase('Lessons') }}</h5>
                    <h5 class="info">{{ lesson_count($course_details->id) }}</h5>
                </div>
            </div>
            <div class="single-leason-level d-flex align-items-center">
                <div class="icon">
                    <img src="{{ asset('assets/frontend/default/images/course/level.svg') }}" alt="">
                </div>
                <div class="details">
                    <h5 class="title">{{ get_phrase('Level') }}</h5>
                    <h5 class="info">{{ $course_details->level }}</h5>
                </div>
            </div>
        </div>
        <ul class="course-overview-list">
            <li>
                <span class="title">
                    <img src="{{ asset('assets/frontend/default/images/icons/user.svg') }}" alt="...">
                    {{ get_phrase('Students') }}
                    <span>:</span>
                </span>
                <span class="info">{{ total_enroll($course_details->id) }}</span>
            </li>
            <li>
                <span class="title">
                    <img src="{{ asset('assets/frontend/default/images/icons/language.svg') }}" alt="">
                    {{ get_phrase('Language') }}
                    <span>:</span>
                </span>
                <span class="info">{{ ucfirst($course_details->language) }}</span>
            </li>
            <li>
                <span class="title">
                    <img src="{{ asset('assets/frontend/default/images/icons/clock.svg') }}" alt="">
                    {{ get_phrase('Duration') }}
                    <span>:</span>
                </span>
                <span class="info">{{ total_durations($course_details->id) }}</span>
            </li>
            <li>
                <span class="title">
                    <img src="{{ asset('assets/frontend/default/images/icons/certificate.svg') }}" alt="">
                    {{ get_phrase('Certificate') }}
                    <span>:</span>
                </span>
                <span class="info">{{ get_phrase('Yes') }}</span>
            </li>
        </ul>
        @php
            if (isset(auth()->user()->id)) {
                $is_enrolled = DB::table('enrollments')
                    ->where('user_id', auth()->user()->id)
                    ->where('course_id', $course_details->id)
                    ->exists();

                $in_cart = DB::table('cart_items')
                    ->where('user_id', auth()->user()->id)
                    ->where('course_id', $course_details->id)
                    ->exists();

                $in_wishlist = DB::table('wishlists')
                    ->where('user_id', auth()->user()->id)
                    ->where('course_id', $course_details->id)
                    ->exists();

                $pending_course_for_payment = DB::table('offline_payments')
                    ->where('user_id', auth()->user()->id)
                    ->where('status', 0)
                    ->first();

                $pending_course = $pending_course_for_payment ? json_decode($pending_course_for_payment->items, true) : [];
            }
        @endphp

        @if (isset(auth()->user()->id))
            @if (in_array($course_details->id, $pending_course))
                <div class="course-overview-buttons">
                    <a href="javascript::void(0);" class="course-enroll-btn">
                        <img src="{{ asset('assets/frontend/default/images/icons/video-player.svg') }}" alt="">
                        {{ get_phrase('In progress') }}
                    </a>
                </div>
            @else
                @if ($is_enrolled)
                    <div class="course-overview-buttons">
                        <a href="{{ route('my.courses') }}" class="course-enroll-btn">
                            <img src="{{ asset('assets/frontend/default/images/icons/video-player.svg') }}" alt="">
                            {{ get_phrase('Start Now') }}
                        </a>
                    </div>
                @else
                    <div class="course-overview-buttons">
                        @if ($in_cart)
                            <a href="{{ route('cart.delete', ['id' => $course_details->id]) }}" class="course-enroll-btn">
                                <img src="{{ asset('assets/frontend/default/assets/images/icons/video-player.svg') }}" alt="">
                                {{ get_phrase('Remove from cart') }}
                            </a>
                        @else
                            <a href="{{ route('cart.store', $course_details->id) }}" class="course-enroll-btn">
                                <img src="{{ asset('assets/frontend/default/assets/images/icons/video-player.svg') }}" alt="">
                                {{ get_phrase('Add to cart') }}
                            </a>
                        @endif
                        <a href="{{ route('purchase.course', $course_details->id) }}" class="buy-now-btn">
                            {{ get_phrase($course_details->is_paid ? get_phrase('Buy Now') : get_phrase('Enroll Now')) }}
                        </a>
                    </div>
                @endif
            @endif
        @else
            <div class="course-overview-buttons">
                <a href="{{ route('purchase.course', $course_details->id) }}" class="buy-now-btn">
                    {{ get_phrase($course_details->is_paid ? get_phrase('Buy Now') : get_phrase('Enroll Now')) }}
                </a>
            </div>
        @endif


        @php
            if (isset($user_data['unique_identifier'])):
                $ref = $user_data['unique_identifier'];
            else:
                $ref = '';
            endif;
            $share_url = route('course.details', $course_details->slug);
        @endphp
        <div class="course-overview-social">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $share_url }}&ref={{ $ref }}" target="_blank">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_369_3435)">
                        <path
                            d="M13.9983 13.499H16.4983L17.4983 9.49902H13.9983V7.49902C13.9983 6.46902 13.9983 5.49902 15.9983 5.49902H17.4983V2.13902C17.1723 2.09602 15.9413 1.99902 14.6413 1.99902C11.9263 1.99902 9.99832 3.65602 9.99832 6.69902V9.49902H6.99832V13.499H9.99832V21.999H13.9983V13.499Z"
                            fill="#6B7385" />
                    </g>
                    <defs>
                        <clipPath id="clip0_369_3435">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ $share_url }}&text={{ $course_details['title'] }}&ref={{ $ref }}" target="_blank">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_369_3438)">
                        <path
                            d="M12.0017 1.99902C14.7187 1.99902 15.0577 2.00902 16.1237 2.05902C17.1887 2.10902 17.9137 2.27602 18.5517 2.52402C19.2117 2.77802 19.7677 3.12202 20.3237 3.67702C20.8322 4.17692 21.2257 4.78161 21.4767 5.44902C21.7237 6.08602 21.8917 6.81202 21.9417 7.87702C21.9887 8.94302 22.0017 9.28202 22.0017 11.999C22.0017 14.716 21.9917 15.055 21.9417 16.121C21.8917 17.186 21.7237 17.911 21.4767 18.549C21.2264 19.2168 20.8328 19.8216 20.3237 20.321C19.8237 20.8293 19.219 21.2228 18.5517 21.474C17.9147 21.721 17.1887 21.889 16.1237 21.939C15.0577 21.986 14.7187 21.999 12.0017 21.999C9.28471 21.999 8.94571 21.989 7.87971 21.939C6.81471 21.889 6.08971 21.721 5.45171 21.474C4.78403 21.2235 4.17924 20.83 3.67971 20.321C3.17112 19.8212 2.77764 19.2165 2.52671 18.549C2.27871 17.912 2.11171 17.186 2.06171 16.121C2.01471 15.055 2.00171 14.716 2.00171 11.999C2.00171 9.28202 2.01171 8.94302 2.06171 7.87702C2.11171 6.81102 2.27871 6.08702 2.52671 5.44902C2.77695 4.7812 3.17051 4.17634 3.67971 3.67702C4.17938 3.16825 4.78414 2.77475 5.45171 2.52402C6.08971 2.27602 6.81371 2.10902 7.87971 2.05902C8.94571 2.01202 9.28471 1.99902 12.0017 1.99902ZM12.0017 6.99902C10.6756 6.99902 9.40386 7.52581 8.46618 8.46349C7.52849 9.40117 7.00171 10.6729 7.00171 11.999C7.00171 13.3251 7.52849 14.5969 8.46618 15.5346C9.40386 16.4722 10.6756 16.999 12.0017 16.999C13.3278 16.999 14.5996 16.4722 15.5372 15.5346C16.4749 14.5969 17.0017 13.3251 17.0017 11.999C17.0017 10.6729 16.4749 9.40117 15.5372 8.46349C14.5996 7.52581 13.3278 6.99902 12.0017 6.99902ZM18.5017 6.74902C18.5017 6.4175 18.37 6.09956 18.1356 5.86514C17.9012 5.63072 17.5832 5.49902 17.2517 5.49902C16.9202 5.49902 16.6022 5.63072 16.3678 5.86514C16.1334 6.09956 16.0017 6.4175 16.0017 6.74902C16.0017 7.08054 16.1334 7.39849 16.3678 7.63291C16.6022 7.86733 16.9202 7.99902 17.2517 7.99902C17.5832 7.99902 17.9012 7.86733 18.1356 7.63291C18.37 7.39849 18.5017 7.08054 18.5017 6.74902ZM12.0017 8.99902C12.7974 8.99902 13.5604 9.31509 14.123 9.8777C14.6856 10.4403 15.0017 11.2034 15.0017 11.999C15.0017 12.7947 14.6856 13.5577 14.123 14.1203C13.5604 14.683 12.7974 14.999 12.0017 14.999C11.2061 14.999 10.443 14.683 9.88039 14.1203C9.31778 13.5577 9.00171 12.7947 9.00171 11.999C9.00171 11.2034 9.31778 10.4403 9.88039 9.8777C10.443 9.31509 11.2061 8.99902 12.0017 8.99902Z"
                            fill="#6B7385" />
                    </g>
                    <defs>
                        <clipPath id="clip0_369_3438">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <a href="https://www.linkedin.com/shareArticle?url={{ $share_url }}&title={{ $course_details['title'] }}&summary={{ $course_details['short_description'] }}&ref={{ $ref }}" target="_blank">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_369_3441)">
                        <path
                            d="M6.93872 5.00002C6.93846 5.53046 6.72749 6.03906 6.35223 6.41394C5.97697 6.78883 5.46815 6.99929 4.93772 6.99902C4.40729 6.99876 3.89869 6.78779 3.5238 6.41253C3.14891 6.03727 2.93846 5.52846 2.93872 4.99802C2.93899 4.46759 3.14995 3.95899 3.52521 3.5841C3.90047 3.20922 4.40929 2.99876 4.93972 2.99902C5.47015 2.99929 5.97876 3.21026 6.35364 3.58552C6.72853 3.96078 6.93899 4.46959 6.93872 5.00002ZM6.99872 8.48002H2.99872V21H6.99872V8.48002ZM13.3187 8.48002H9.33872V21H13.2787V14.43C13.2787 10.77 18.0487 10.43 18.0487 14.43V21H21.9987V13.07C21.9987 6.90002 14.9387 7.13002 13.2787 10.16L13.3187 8.48002Z"
                            fill="#6B7385" />
                    </g>
                    <defs>
                        <clipPath id="clip0_369_3441">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <a href="#">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_369_3444)">
                        <path
                            d="M13.37 2.09383C10.9772 1.76469 8.54622 2.31238 6.5258 3.63579C4.50538 4.9592 3.03202 6.96893 2.37777 9.2939C1.72353 11.6189 1.93258 14.102 2.96634 16.2849C4.00009 18.4677 5.78873 20.2029 8.00197 21.1698C7.94212 20.4016 7.99706 19.6288 8.16497 18.8768C8.34997 18.0378 9.46097 13.4138 9.46097 13.4138C9.23974 12.9179 9.12918 12.3798 9.13697 11.8368C9.13697 10.3518 9.99397 9.24383 11.06 9.24383C11.2515 9.24105 11.4413 9.27953 11.6166 9.35666C11.792 9.4338 11.9486 9.54778 12.0759 9.69086C12.2032 9.83393 12.2983 10.0027 12.3545 10.1858C12.4108 10.3689 12.427 10.5619 12.402 10.7518C12.402 11.6518 11.824 13.0138 11.522 14.2918C11.4623 14.5262 11.4585 14.7713 11.5109 15.0075C11.5633 15.2436 11.6705 15.4641 11.8237 15.6512C11.977 15.8383 12.172 15.9868 12.3932 16.0847C12.6144 16.1826 12.8554 16.2272 13.097 16.2148C14.995 16.2148 16.267 13.7838 16.267 10.9138C16.267 8.71383 14.81 7.06583 12.124 7.06583C11.4813 7.04086 10.8404 7.14676 10.2399 7.37709C9.63946 7.60742 9.09209 7.95738 8.63102 8.40572C8.16996 8.85406 7.80483 9.39144 7.5578 9.98521C7.31076 10.579 7.18698 11.2168 7.19397 11.8598C7.16534 12.5732 7.39548 13.2728 7.84197 13.8298C7.92541 13.8921 7.98633 13.9798 8.01555 14.0798C8.04477 14.1797 8.04071 14.2864 8.00397 14.3838C7.95797 14.5678 7.84197 15.0068 7.79597 15.1678C7.7864 15.2224 7.76415 15.274 7.731 15.3184C7.69784 15.3629 7.65472 15.3989 7.6051 15.4236C7.55549 15.4483 7.50076 15.461 7.44533 15.4607C7.3899 15.4604 7.33531 15.4471 7.28597 15.4218C5.90197 14.8678 5.24997 13.3448 5.24997 11.6058C5.24997 8.75883 7.63397 5.35083 12.404 5.35083C16.2 5.35083 18.724 8.12783 18.724 11.0978C18.724 15.0068 16.547 17.9458 13.33 17.9458C12.8492 17.9612 12.3722 17.8551 11.9433 17.6373C11.5144 17.4195 11.1473 17.0971 10.876 16.6998C10.876 16.6998 10.298 19.0158 10.184 19.4538C9.95127 20.2105 9.60788 20.9286 9.16497 21.5848C10.088 21.8648 11.047 22.0048 12.011 22.0008C13.3246 22.0019 14.6254 21.7438 15.8391 21.2414C17.0528 20.739 18.1555 20.0021 19.084 19.0729C20.0126 18.1438 20.7487 17.0406 21.2502 15.8265C21.7518 14.6125 22.0089 13.3114 22.007 11.9978C22.0057 9.58283 21.1308 7.24983 19.5436 5.42961C17.9564 3.6094 15.7643 2.4249 13.372 2.09483L13.37 2.09383Z"
                            fill="#6B7385" />
                    </g>
                    <defs>
                        <clipPath id="clip0_369_3444">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </a>
        </div>
    </div>
</div>
