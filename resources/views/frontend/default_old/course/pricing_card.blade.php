<div class="gradient-border radius-22 page-static-sidebar">
    <div class="ps-box ps-sidebar">
        @if ($course_details->is_best)
            <span class="d-inline-flex justify-content-center trophy-text w-100 px-2 py-1">
                <img src="{{ asset('assets/frontend/default/image/best-seller.svg') }}" alt="best-seller-icon">{{ get_phrase('Top course') }}</span>
        @endif

        <div class="ps-price d-flex">
            @if (isset($course_details->discount_flag) && $course_details->discount_flag == 1)
                <h4 class="g-title">
                    {{ currency(number_format($course_details->discounted_price ,2)) }}</h4>
                <del>{{ currency(number_format($course_details->price, 2)) }}</del>
            @elseif (isset($course_details->is_paid) && $course_details->is_paid == 0)
                <h4 class="g-title">{{ get_phrase('Free') }}</h4>
            @else
                <h4 class="g-title">{{ currency(number_format($course_details->price, 2)) }}</h4>
            @endif
        </div>

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
                <a href="javascript::void(0);" class="eBtn gradient w-100 mb-3">
                    <img src="{{ asset('assets/frontend/default/image/enroll.png') }}" alt="...">
                    {{ get_phrase('In progress') }}</a>
            @else
                @if ($is_enrolled)
                    <a href="{{ route('my.courses') }}" class="eBtn gradient w-100 mb-3">
                        <img src="{{ asset('assets/frontend/default/image/enroll.png') }}" alt="...">
                        {{ get_phrase('Start Now') }}</a>
                @else
                    <a href="{{ route('purchase.course', $course_details->id) }}" class="eBtn gradient w-100">
                        <img src="{{ asset('assets/frontend/default/image/enroll.png') }}" alt="...">
                        {{ get_phrase($course_details->is_paid ? get_phrase('Buy Now') : get_phrase('Enroll Now')) }}
                    </a>
                    @if ($in_cart)
                        <a href="{{ route('cart.delete', ['id' => $course_details->id]) }}" class="eBtn mt-3 gradient w-100">
                            {{ get_phrase('Remove from cart') }}</a>
                    @else
                        <a href="{{ route('cart.store', $course_details->id) }}" class="eBtn learn-btn w-100">
                            {{ get_phrase('Add to cart') }}</a>
                    @endif

                    @if ($in_wishlist)
                        <span class="eBtn gradient w-100 cursor-pointer mt-3 toggleWishItem" id="item-{{ $course_details->id }}">
                            {{ get_phrase('Remove from wishlist') }}
                        </span>
                    @else
                        <span class="eBtn learn-btn w-100 cursor-pointer mt-3 toggleWishItem" id="item-{{ $course_details->id }}">
                            {{ get_phrase('Add to wishlist') }}</span>
                    @endif
                @endif
            @endif
        @else
            <a href="{{ route('purchase.course', $course_details->id) }}" class="eBtn gradient mt-3 w-100">
                <img src="{{ asset('assets/frontend/default/image/enroll.png') }}" alt="...">
                {{ get_phrase($course_details->is_paid ? get_phrase('Buy Now') : get_phrase('Enroll Now')) }}</a>
        @endif


        <ul class="ps-side-feature">
            <li class="d-flex justify-content-between align-items-center">
                <span>
                    <img src="{{ asset('assets/frontend/default/image/m1.png') }}" alt="...">
                    <p>{{ get_phrase('Students') }}</p>
                </span>
                {{ total_enroll($course_details->id) }}
            </li>
            <li class="d-flex justify-content-between align-items-center">
                <span>
                    <img src="{{ asset('assets/frontend/default/image/language2.png') }}" alt="...">
                    <p>{{ get_phrase('Language') }}</p>
                </span>
                {{ ucfirst($course_details->language) }}
            </li>
            <li class="d-flex justify-content-between align-items-center">
                <span>
                    <img src="{{ asset('assets/frontend/default/image/time.png') }}" alt="...">
                    <p>{{ get_phrase('Duration') }}</p>
                </span>
                {{ total_durations($course_details->id) }}
            </li>
            <li class="d-flex justify-content-between align-items-center">
                <span>
                    <i class="fi fi-rr-dashboard"></i>
                    <p>{{ get_phrase('Level') }}</p>
                </span>
                {{ $course_details->level }}
            </li>
        </ul>
        <ul class="f-socials d-flex flex-column gap-3">
            <p class="description text-center text-14">{{ get_phrase('Contact Instructor') }}</p>
            @php $instructor = course_by_instructor($course_details->id); @endphp
            <div class="d-flex justify-content-center gap-3">
                @if (isset($instructor->twitter))
                    <li><a href="{{ $instructor->twitter }}"><i class="fa-brands fa-twitter"></i></a></li>
                @endif

                @if (isset($instructor->facebook))
                    <li><a href="{{ $instructor->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                @endif
                @if (isset($instructor->linkedin))
                    <li><a href="{{ $instructor->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                @endif
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            </div>
        </ul>

        @if ($instructor->phone)
            <div class="dt_group">
                <p class="description text-center mb-15">
                    {{ get_phrase('For details about the course') }}</p>
                <a href="tel:{{ $instructor->phone }}" class="d-flex justify-content-center">
                    <img src="{{ asset('assets/frontend/default/image/call.svg') }}" alt="...">
                    {{ get_phrase('Call Us') }}
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
        <div class="w-100 px-4 pb-2 text-center mt-5">
            <span>{{get_phrase('Share')}} :</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $share_url }}&ref={{ $ref }}" target="_blank" class="p-2 mx-2 color-facebook"
                data-bs-toggle="tooltip" title="{{ get_phrase('Share on Facebook') }}" data-bs-placement="top">
                <i class="fab fa-facebook text-20"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ $share_url }}&text={{ $course_details['title'] }}&ref={{ $ref }}" target="_blank" class="p-2 mx-2 color-twitter"
                 data-bs-toggle="tooltip" title="{{ get_phrase('Share on Twitter') }}" data-bs-placement="top">
                <i class="fab fa-twitter text-20"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ $share_url }}&ref={{ $ref }}" target="_blank" class="p-2 mx-2 color-whatsapp" 
                data-bs-toggle="tooltip" title="{{ get_phrase('Share on Whatsapp') }}" data-bs-placement="top">
                <i class="fab fa-whatsapp text-20"></i>
            </a>
            <a href="https://www.linkedin.com/shareArticle?url={{ $share_url }}&title={{ $course_details['title'] }}&summary={{ $course_details['short_description'] }}&ref={{ $ref }}"
                target="_blank" class="p-2 mx-2 color-linkedin" data-bs-toggle="tooltip" title="{{ get_phrase('Share on Linkedin') }}" data-bs-placement="top">
                <i class="fab fa-linkedin text-20"></i>
            </a>
        </div>
    </div>
</div>

@include('frontend.default.scripts')
