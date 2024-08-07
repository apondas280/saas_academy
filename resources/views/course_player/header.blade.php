<div class="course-playing-top d-flex justify-content-between">
    <div class="course-playing-title">
        <h1 class="title">{{ ucfirst($course_details->title) }}</h1>
        <p class="info">{{ get_phrase('Instructor') }}: <span>{{ course_by_instructor($course_details->id)->name }}</span>
    </div>
    <a href="#" class="back-btn">
        {{ get_phrase('Back') }}
        <img src="{{ asset('assets/frontend/default/images/icons/arrow-right-white.svg') }}" alt="">
    </a>
</div>