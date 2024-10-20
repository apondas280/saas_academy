<div class="student-feedback-area">
    <div class="course-sub-title">
        <h2 class="title">{{ get_phrase('Students Feedback') }}</h2>
    </div>
    <div class="student-feedback-wrap d-flex align-items-center">
        <div class="feedback-rating-review d-flex">
            <h1 class="rating">{{ $course_details->average_rating }}</h1>
            <div class="stars">

                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $course_details->average_rating)
                        <i class="fa-solid fa-star"></i>
                    @else
                    @endif
                @endfor
            </div>
            <p class="reviews">( {{ count($reviews) }} {{ get_phrase('Review') }} )</p>
        </div>

        <div class="feedback-rating-progress">
            @for ($i = 1; $i <= 5; $i++)
                @php
                    $count_rating = App\Models\Review::where('course_id', $course_details->id)
                        ->where('rating', $i)
                        ->count();

                    $skill = 0;
                    if (count($reviews)) {
                        $skill = (100 / count($reviews)) * $count_rating;
                    }
                @endphp

                <div class="single-rating-progress d-flex align-items-center">
                    <h5 class="rating">{{ get_phrase($i) }}<i class="fa-solid fa-star"></i></h5>
                    <div class="progress-1 w-100" data-skill="{{ $skill }}"></div>
                    <h5 class="count">{{ $count_rating }}</h5>
                </div>
            @endfor
        </div>
    </div>


    @auth
        @if (has_enrolled($course_details->id))
            <div class="write-review mb-5">
                <form action="{{ route('review.store') }}" method="POST">@csrf

                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                        <p class="description">{{ get_phrase('Rate this course : ') }}</p>
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-4">
                            <ul class="d-flex gap-1 rating-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li>
                                        <i class="fa-regular fa-star rating-star cursor-pointer" id="id-{{ $i }}"></i>
                                    </li>
                                @endfor
                            </ul>
                            <span class="cursor-pointer" id="remove-stars">{{ get_phrase('Remove all') }}</span>
                        </div>
                    </div>

                    <input type="hidden" name="rating" value="0">
                    <input type="hidden" name="course_id" value="{{ $course_details->id }}">
                    <textarea type="text" name="review" class="form-control mb-3" rows="5" placeholder="{{ get_phrase('Share your opinion') }}" required></textarea>
                    <input type="submit" class="course-enroll-btn border-0 w-100" value="{{ get_phrase('Comment') }}">
                </form>
            </div>
        @endif
    @endauth


    <div class="student-feedback-reviews">
        @foreach ($reviews as $review)
            <div class="single-feedback-review d-flex">
                <div class="feedback-review-profile">
                    <img src="{{ asset($review->user->photo) }}" alt="user-photo">
                </div>
                <div class="feedback-review-details w-100">
                    <div class="feedback-review-name-date d-flex justify-content-between mb-2">
                        <div class="feedback-review-name">
                            <h5 class="name">{{ $review->user->name }}</h5>
                            <p>{{ date('d M, Y H:i', strtotime($review->created_at)) }}</p>
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <i class="fa-solid fa-star"></i>
                                    @else
                                    @endif
                                @endfor
                            </div>
                        </div>

                        @if ($review->user_id == auth()->user()->id)
                            <div class="review-actions">
                                <button type="button" class="btn fw-medium" onclick="ajaxModal('{{ route('modal', ['frontend.default.course.review_edit', 'id' => $review->id]) }}', '{{ get_phrase('Edit Review') }}')">{{ get_phrase('Edit') }}</button>
                                <button type="button" class="btn fw-medium" onclick="confirmModal('{{ route('review.delete', $review->id) }}')">{{ get_phrase('Delete') }}</button>
                            </div>
                        @endif
                    </div>

                    <div class="comment">
                        <p class="info">{{ $review->review }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('js')
    <script>
        "use strict";
        $(document).ready(function() {
            let rating_stars = $('.rating-stars i');

            rating_stars.on('click', function(e) {
                e.preventDefault();
                let star = $(this).attr('id').substring(3);
                $('.write-review input[name="rating"]').val(star);

                rating_stars.removeClass('fa').addClass('fa-regular');
                for (let i = 1; i <= star; i++) {
                    $('#id-' + i).removeClass('fa-regular').addClass('fa');
                }
            });

            $('#remove-stars').on('click', function(e) {
                e.preventDefault();
                rating_stars.removeClass('fa fa-regular').addClass('fa-regular');
                $('.write-review input[name="rating"]').val(0);
            });
        });
    </script>
@endpush
