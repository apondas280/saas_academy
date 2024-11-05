@php
    $review = App\Models\Review::where('id', $id)
        ->where('user_id', auth()->user()->id)
        ->first();
@endphp

@if ($review)
    <div class="write-review">
        <form action="{{ route('review.update', $id) }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="description">{{ get_phrase('Rate this course : ') }}</p>
                <div class="d-flex align-items-center justify-content-end gap-4">
                    <ul class="d-flex gap-1 rating-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <li>
                                <i class="{{ $i <= $review->rating ? 'fa' : 'fa-regular' }} fa-star rating-star" data-star="{{ $i }}"></i>
                            </li>
                        @endfor
                    </ul>
                    <button type="button" class="bg-transparent border-0" id="remove-all-stars">{{ get_phrase('Remove all') }}</button>
                </div>
            </div>

            <input type="hidden" name="rating" value="{{ $review->rating }}">
            <input type="hidden" name="course_id" value="{{ $review->course_id }}">
            <textarea name="review" class="form-control mb-3" rows="5" placeholder="{{ get_phrase('Share your opinion') }}" required>{{ $review->review }}</textarea>
            <input type="submit" class="course-enroll-btn border-0 w-100" value="{{ get_phrase('Update') }}">
        </form>

        <button type="button" id="demo" class="bg-transparent border-0">{{ 'Demo' }}</button>
    </div>
@else
    <p class="text-center">{{ get_phrase('Data not found.') }}</p>
@endif

<script>
    $(document).ready(function() {
        let ratingStars = $('.rating-stars i');
        let ratingInput = $('.write-review input[name="rating"]');

        // Click on stars to set rating
        ratingStars.on('click', function() {
            let star = $(this).data('star');
            ratingInput.val(star);

            // Update star classes based on the selected rating
            ratingStars.each(function() {
                $(this).toggleClass('fa', $(this).data('star') <= star).toggleClass('fa-regular', $(this).data('star') > star);
            });
        });

        // Remove all stars
        $('#remove-all-stars').on('click', function(e) {
            e.preventDefault();
            ratingStars.removeClass('fa').addClass('fa-regular');
            ratingInput.val(0);
        });
    });
</script>
