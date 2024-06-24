@php
    $review = App\Models\Review::where('course_id', $course->id)
        ->orderBy('id', 'DESC')
        ->get();

    $total = $review->count();
    $rating = array_sum(array_column($review->toArray(), 'rating'));

    $average_rating = 0;
    if ($total != 0) {
        $average_rating = $rating / $total;
    }
@endphp

<div class="col-lg-4 col-md-6 col-sm-6 mb-30">
    <a href="{{ route('course.details', $course->slug) }}" class="card Ecard eBar-card">
        <div class="courses-img">
            <img src="{{ get_image($course->thumbnail) }}" alt="course-thumbnail">
            <div class="cText d-flex">
                <h4>
                    @if ($course->is_paid == 0)
                        {{ get_phrase('Free') }}
                    @else
                        @if ($course->discount_flag == 1)
                            @php $discounted_price = number_format(($course->discounted_price), 2) @endphp
                            {{ currency($discounted_price) }}
                            <del>{{ currency(number_format($course->price, 2)) }}</del>
                        @else
                            {{ currency(number_format($course->price, 2)) }}
                        @endif
                    @endif
                </h4>
            </div>

            @auth
                @if (Route::currentRouteName() == 'courses')
                    <span class="heart toggleWishItem @if (in_array($course->id, $wishlist)) inList @endif" id="item-{{ $course->id }}"><i class="fa-regular fa-heart"></i></span>
                @endif
            @endauth

        </div>
        <div class="card-body entry-details mt-0">
            <div class="info-card mb-15">
                <div class="creator">
                    <img src="{{ get_image($course->instructor_image) }}" alt="author-image">
                    <h5>{{ $course->instructor_name }}</h5>
                </div>
            </div>
            <div class="entry-title">
                <h3 class="w-100 ellipsis-2">{{ ucfirst($course->title) }}</h3>
            </div>
            <ul>
                <li>
                    <span>{{ number_format($average_rating, 2) }}</span><i class="fa fa-star"></i>
                </li>
                <li>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.6521 9.54004L14.8477 8.27081C14.9758 8.19549 15.0399 8.08879 15.0399 7.95071C15.0399 7.81263 14.9758 7.70458 14.8477 7.62658L12.6521 6.35735C12.5395 6.29326 12.4144 6.26121 12.2768 6.26121C12.1392 6.26121 12.0133 6.29326 11.8989 6.35735L9.70344 7.62658C9.57523 7.7019 9.51113 7.8086 9.51113 7.94669C9.51113 8.08479 9.57523 8.19283 9.70344 8.27081L11.8989 9.54004C12.0115 9.60414 12.1366 9.63619 12.2743 9.63619C12.4119 9.63619 12.5378 9.60414 12.6521 9.54004ZM12.6521 11.9968L14.1265 11.1554C14.2395 11.0928 14.3305 11.0021 14.3995 10.8832C14.4686 10.7643 14.5031 10.636 14.5031 10.4984V9.32371L12.6521 10.399C12.5392 10.4685 12.4136 10.5032 12.2755 10.5032C12.1374 10.5032 12.0119 10.4685 11.8989 10.399L10.048 9.32371V10.4984C10.048 10.636 10.0825 10.7643 10.1515 10.8832C10.2206 11.0021 10.3116 11.0928 10.4246 11.1554L11.8989 11.9968C12.0115 12.0609 12.1366 12.0929 12.2743 12.0929C12.4119 12.0929 12.5378 12.0609 12.6521 11.9968ZM16.4101 16.25H12.2755C12.2755 16.0416 12.2684 15.8333 12.2543 15.625C12.2401 15.4166 12.2189 15.2083 12.1906 15H16.4101C16.4849 15 16.5464 14.9759 16.5944 14.9279C16.6425 14.8798 16.6666 14.8183 16.6666 14.7435V5.25642C16.6666 5.18163 16.6425 5.12019 16.5944 5.0721C16.5464 5.02402 16.4849 4.99998 16.4101 4.99998H3.58967C3.51488 4.99998 3.45344 5.02402 3.40536 5.0721C3.35727 5.12019 3.33323 5.18163 3.33323 5.25642V6.14263C3.1249 6.11431 2.91657 6.09307 2.70825 6.07892C2.49992 6.06476 2.29159 6.05769 2.08325 6.05769V5.25642C2.08325 4.84215 2.23076 4.48752 2.52577 4.19252C2.82077 3.89751 3.17541 3.75 3.58967 3.75H16.4101C16.8244 3.75 17.179 3.89751 17.474 4.19252C17.769 4.48752 17.9165 4.84215 17.9165 5.25642V14.7435C17.9165 15.1578 17.769 15.5124 17.474 15.8074C17.179 16.1025 16.8244 16.25 16.4101 16.25ZM6.58498 16.25C6.41715 16.25 6.27127 16.1973 6.14734 16.0921C6.02341 15.9869 5.94595 15.8498 5.91498 15.681C5.79425 14.8274 5.42592 14.1017 4.81 13.504C4.19409 12.9062 3.45664 12.5443 2.59767 12.4182C2.43692 12.3974 2.31099 12.3219 2.2199 12.1917C2.1288 12.0615 2.08325 11.913 2.08325 11.7464C2.08325 11.5693 2.14362 11.4209 2.26436 11.3013C2.38508 11.1816 2.52556 11.133 2.68581 11.1555C3.8685 11.2901 4.87623 11.7759 5.70902 12.613C6.54181 13.45 7.02712 14.4599 7.16494 15.6426C7.18737 15.8114 7.1409 15.9548 7.02552 16.0729C6.91013 16.1909 6.76329 16.25 6.58498 16.25ZM9.82361 16.25C9.64091 16.25 9.49107 16.1869 9.37409 16.0609C9.25711 15.9348 9.18741 15.7777 9.16496 15.5897C9.00257 13.86 8.31027 12.3918 7.08804 11.1851C5.86582 9.97834 4.3872 9.3034 2.65217 9.16023C2.48336 9.14313 2.34634 9.07206 2.24111 8.94702C2.13587 8.82197 2.08325 8.67607 2.08325 8.50933C2.08325 8.33217 2.14148 8.18162 2.25794 8.05769C2.37438 7.93377 2.5154 7.88035 2.681 7.89744C4.7622 8.0406 6.53275 8.84135 7.99267 10.2997C9.4526 11.758 10.2627 13.5235 10.4229 15.5961C10.44 15.7788 10.3887 15.9334 10.2689 16.06C10.1491 16.1867 10.0007 16.25 9.82361 16.25ZM2.93215 16.25C2.6942 16.25 2.49324 16.1678 2.32925 16.0035C2.16525 15.8392 2.08325 15.6381 2.08325 15.4001C2.08325 15.1622 2.1654 14.9612 2.32971 14.7972C2.494 14.6332 2.69512 14.5512 2.93306 14.5512C3.17101 14.5512 3.37197 14.6334 3.53596 14.7977C3.69996 14.962 3.78196 15.1631 3.78196 15.4011C3.78196 15.639 3.69981 15.84 3.5355 16.004C3.37121 16.168 3.17009 16.25 2.93215 16.25Z"
                            fill="#6B7385"></path>
                    </svg>
                    {{ lesson_count($course->id) }}
                    {{ get_phrase('lesson') }}
                </li>
            </ul>
        </div>
        <div class="learn-more">{{ get_phrase('Learn more') }} <i class="fa-solid fa-arrow-right-long ms-2"></i></div>
    </a>
</div>
