@php
    $sections = App\Models\Section::where('course_id', $course_details->id)
        ->orderBy('sort')
        ->get();

    $completed_lesson = json_decode(
        App\Models\Watch_history::where('course_id', $course_details->id)
            ->where('student_id', Auth()->user()->id)
            ->value('completed_lesson'),
    );
    $active_section = App\Models\Lesson::where('id', $history->watching_lesson_id ?? '')->value('section_id');
@endphp

<div class="player-playlist-area">
    <!-- Accordion -->
    <div class="playing-sidebar-accordion">
        <h2 class="title">{{ get_phrase('Course Content') }}</h2>
        <div class="pb-30">
            <div class="playlist-step-title d-flex align-items-center justify-content-between">
                <p class="info">2/5 Completed</p>
                <img src="assets/images/icons/trophy-blue.svg" alt="">
            </div>
            <ul class="player-playlist-steps">
                <li class="step active"></li>
                <li class="step active"></li>
                <li class="step"></li>
                <li class="step"></li>
                <li class="step"></li>
            </ul>
        </div>
        <div class="accordion" id="coursePlay">
            @foreach ($sections as $section)
                @php
                    $lessons = App\Models\Lesson::where('section_id', $section->id)
                        ->orderBy('sort')
                        ->get();
                @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button title @if ($active_section != $section->id) collapsed @endif" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse_{{ $section->id }}"
                            aria-expanded="@if ($section->id != $active_section) true @else false @endif"
                            aria-controls="collapse_{{ $section->id }}">
                            {{ ucfirst($section->title) }}
                        </button>
                    </h2>
                    <div id="collapse_{{ $section->id }}"
                        class="accordion-collapse @if ($section->id == $active_section) show @else collapse @endif"
                        data-bs-parent="#coursePlay">
                        <div class="accordion-body">
                            <!-- Playlist List -->
                            <ul class="player-playlist-list padding-bottom-50">
                                @foreach ($lessons as $key => $lesson)
                                <li>
                                    <a href="{{ route('course.player', ['slug' => $course_details->slug, 'id' => $lesson->id]) }}" class="single-list @if (is_array($lesson) && in_array($lesson->id, $completed_lesson)) completed @elseif ($lesson->id == $history->watching_lesson_id) active 
                                    @endif">
                                        <span class="number-name">
                                            <span class="progress"><span class="number">{{ ++$key }}</span></span>
                                            <span class="name">{{ $lesson->title }}</span>
                                        </span>
                                        <span class="lock">
                                            <img src="{{ asset('assets/frontend/default/images/icons/lock-black.svg') }}" alt="">
                                        </span>
                                        <span class="unlock">
                                            <img src="{{ asset('assets/frontend/default/images/icons/unlock-gray.svg') }}" alt="">
                                        </span>
                                    </a>
                                </li>
                                @endforeach
                                <li>
                                    <a href="#" class="single-list active">
                                        <span class="number-name">
                                            <span class="progress"><span class="number">2</span></span>
                                            <span class="name">Fundamentals of web design</span>
                                        </span>
                                        <span class="lock">
                                            <img src="{{ asset('assets/frontend/default/images/icons/lock-black.svg') }}" alt="">
                                        </span>
                                        <span class="unlock">
                                            <img src="{{ asset('assets/frontend/default/images/icons/unlock-gray.svg') }}" alt="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="single-list completed">
                                        <span class="number-name">
                                            <span class="progress"><span class="number">3</span></span>
                                            <span class="name">Improving Visual Skills</span>
                                        </span>
                                        <span class="lock">
                                            <img src="{{ asset('assets/frontend/default/images/icons/lock-black.svg') }}" alt="">
                                        </span>
                                        <span class="unlock">
                                            <img src="{{ asset('assets/frontend/default/images/icons/unlock-gray.svg') }}" alt="">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <h4 class="title">Web design masterclass : 1</h4>
    <div class="pb-30">
        <div class="playlist-step-title d-flex align-items-center justify-content-between">
            <p class="info">2/5 Completed</p>
            <img src="assets/images/icons/trophy-blue.svg" alt="">
        </div>
        <ul class="player-playlist-steps">
            <li class="step active"></li>
            <li class="step active"></li>
            <li class="step"></li>
            <li class="step"></li>
            <li class="step"></li>
        </ul>
    </div>
    <!-- Playlist List -->
    <ul class="player-playlist-list padding-bottom-50">
        <li>
            <a href="#" class="single-list completed">
                <span class="number-name">
                    <span class="progress"><span class="number">1</span></span>
                    <span class="name">What is Interaction Design</span>
                </span>
                <span class="lock">
                    <img src="assets/images/icons/lock-black.svg" alt="">
                </span>
                <span class="unlock">
                    <img src="assets/images/icons/unlock-gray.svg" alt="">
                </span>
            </a>
        </li>
        <li>
            <a href="#" class="single-list active">
                <span class="number-name">
                    <span class="progress"><span class="number">2</span></span>
                    <span class="name">Fundamentals of web design</span>
                </span>
                <span class="lock">
                    <img src="assets/images/icons/lock-black.svg" alt="">
                </span>
                <span class="unlock">
                    <img src="assets/images/icons/unlock-gray.svg" alt="">
                </span>
            </a>
        </li>
        <li>
            <a href="#" class="single-list">
                <span class="number-name">
                    <span class="progress"><span class="number">3</span></span>
                    <span class="name">Improving Visual Skills</span>
                </span>
                <span class="lock">
                    <img src="assets/images/icons/lock-black.svg" alt="">
                </span>
                <span class="unlock">
                    <img src="assets/images/icons/unlock-gray.svg" alt="">
                </span>
            </a>
        </li>
        <li>
            <a href="#" class="single-list">
                <span class="number-name">
                    <span class="progress"><span class="number">4</span></span>
                    <span class="name">Finding Inspiration</span>
                </span>
                <span class="lock">
                    <img src="assets/images/icons/lock-black.svg" alt="">
                </span>
                <span class="unlock">
                    <img src="assets/images/icons/unlock-gray.svg" alt="">
                </span>
            </a>
        </li>
        <li>
            <a href="#" class="single-list">
                <span class="number-name">
                    <span class="progress"><span class="number">5</span></span>
                    <span class="name">Web Design System Learning</span>
                </span>
                <span class="lock">
                    <img src="assets/images/icons/lock-black.svg" alt="">
                </span>
                <span class="unlock">
                    <img src="assets/images/icons/unlock-gray.svg" alt="">
                </span>
            </a>
        </li>
    </ul>
</div>

<form action="{{ route('set.watch.history') }}" method="post" id="watch_history_form">
    @csrf
    <input type="hidden" class="course_id" name="course_id" value="{{ $course_details->id }}">
    <input type="hidden" class="lesson_id" name="lesson_id">
</form>