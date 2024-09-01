<div class="row mrg-30">
    @foreach ($courses as $course)
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
        <div class="col-md-12">
            <div class="single-list-course d-flex align-items-center">
                <a href="{{ route('course.details', $course->slug) }}" class="list-course-link"></a>
                <div class="list-course-img">
                    <img src="{{ get_image($course->thumbnail) }}" alt="course-thumbnail">
                </div>
                <div class="list-course-details">
                    <div class="course-price-bookmark d-flex align-items-center justify-content-between">
                        <div class="list-course-price d-flex">
                            @if (isset($course->discount_flag) && $course->discount_flag == 1)
                                <h3 class="price text-blue">{{ currency(number_format($course->discounted_price, 2)) }}
                                </h3>
                                <h4 class="old-price">{{ currency(number_format($course->price, 2)) }}</h4>
                            @elseif (isset($course->is_paid) && $course->is_paid == 0)
                                <h3 class="price text-blue">{{ get_phrase('Free') }}</h3>
                            @else
                                <h3 class="price text-blue">{{ currency(number_format($course->price, 2)) }}</h3>
                            @endif
                        </div>
                        @auth
                            <a href="javascript:void(0);" class="list-wish-react">
                                <div class="wish-icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="favorite_FILL0_wght300_GRAD0_opsz24 (1) 1">
                                            <path id="Vector"
                                                d="M9.99212 17.4246C9.8137 17.4246 9.63449 17.3926 9.45448 17.3285C9.27445 17.2644 9.11606 17.1639 8.97931 17.0272L7.78223 15.9391C6.30466 14.5918 4.98548 13.2684 3.82468 11.9687C2.66389 10.669 2.0835 9.27667 2.0835 7.79165C2.0835 6.60897 2.48227 5.61885 3.27981 4.82131C4.07735 4.02377 5.06746 3.625 6.25014 3.625C6.92214 3.625 7.58587 3.77992 8.24133 4.08975C8.89677 4.39958 9.48305 4.90279 10.0001 5.59938C10.5172 4.90279 11.1035 4.39958 11.759 4.08975C12.4144 3.77992 13.0781 3.625 13.7501 3.625C14.9328 3.625 15.9229 4.02377 16.7205 4.82131C17.518 5.61885 17.9168 6.60897 17.9168 7.79165C17.9168 9.2927 17.3265 10.7005 16.146 12.0152C14.9654 13.3298 13.6492 14.6421 12.1972 15.9519L11.013 17.0272C10.8762 17.1639 10.7165 17.2644 10.5338 17.3285C10.3511 17.3926 10.1705 17.4246 9.99212 17.4246ZM9.40079 6.86538C8.94994 6.1784 8.47532 5.67493 7.97691 5.35496C7.47851 5.03497 6.90292 4.87498 6.25014 4.87498C5.41681 4.87498 4.72236 5.15276 4.16681 5.70831C3.61125 6.26387 3.33348 6.95831 3.33348 7.79165C3.33348 8.46045 3.54902 9.1597 3.9801 9.8894C4.41118 10.6191 4.95231 11.3445 5.60348 12.0656C6.25466 12.7868 6.96005 13.4914 7.71966 14.1794C8.47927 14.8675 9.18334 15.5069 9.83185 16.0977C9.87993 16.1405 9.93603 16.1618 10.0001 16.1618C10.0643 16.1618 10.1204 16.1405 10.1684 16.0977C10.8169 15.5069 11.521 14.8675 12.2806 14.1794C13.0402 13.4914 13.7456 12.7868 14.3968 12.0656C15.048 11.3445 15.5891 10.6191 16.0202 9.8894C16.4513 9.1597 16.6668 8.46045 16.6668 7.79165C16.6668 6.95831 16.389 6.26387 15.8335 5.70831C15.2779 5.15276 14.5835 4.87498 13.7501 4.87498C13.0974 4.87498 12.5218 5.03497 12.0234 5.35496C11.525 5.67493 11.0503 6.1784 10.5995 6.86538C10.529 6.97221 10.4403 7.05234 10.3335 7.10577C10.2266 7.15919 10.1155 7.1859 10.0001 7.1859C9.88477 7.1859 9.77366 7.15919 9.66681 7.10577C9.55998 7.05234 9.4713 6.97221 9.40079 6.86538Z"
                                                fill="#6B7385"></path>
                                        </g>
                                    </svg>
                                </div>
                            </a>
                        @endauth
                    </div>
                    <div class="course-list-title">
                        <h3 class="title">{{ ucfirst($course->title) }}</h3>
                        <p class="info card_preview_text">{{ $course->short_description }} </p>
                    </div>
                    <div class="course-list-leason-stars d-flex align-items-center justify-content-between">
                        <div class="course-list-leasons d-flex align-items-center">
                            <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="leason">
                            <h4 class="leasons">{{ lesson_count($course->id) }} {{ get_phrase('lesson') }}</h4>
                        </div>
                        <div class="course-list-stars d-flex align-items-center">
                            <h4 class="average">4.8</h4>
                            <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="star">
                            <h4 class="stars">({{ course_enrollments($course->id) }})</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
