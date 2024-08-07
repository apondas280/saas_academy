<div class="curriculum-accordion">
    @if ($sections->count() > 0)
        <div class="accordion" id="accordionExample">
            @foreach ($sections as $section)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $section->id }}" aria-expanded="false" aria-controls="collapse_{{ $section->id }}">
                        {{ ucfirst($section->title) }}
                    </button>
                </h2>
                <div id="collapse_{{ $section->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="course-introduction-ul">
                            @php
                                $lessons = DB::table('lessons')
                                    ->where('section_id', $section->id)
                                    ->get();
                            @endphp
                            @foreach ($lessons as $lesson)
                            <li>
                                <a href="{{ $course_details->is_paid ? 'javascript:: void(0);' : route('course.player', $course_details->slug) }}">
                                <span class="title">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.87499 13.1248L12.9375 10.5207C13.1319 10.3957 13.2292 10.2221 13.2292 9.99984C13.2292 9.77761 13.1319 9.604 12.9375 9.479L8.87499 6.87484C8.66666 6.73595 8.45485 6.72553 8.23957 6.84359C8.02429 6.96164 7.91666 7.14567 7.91666 7.39567V12.604C7.91666 12.854 8.02429 13.038 8.23957 13.1561C8.45485 13.2741 8.66666 13.2637 8.87499 13.1248ZM9.99999 18.3332C8.84721 18.3332 7.76388 18.1144 6.74999 17.6769C5.7361 17.2394 4.85416 16.6457 4.10416 15.8957C3.35416 15.1457 2.76041 14.2637 2.32291 13.2498C1.88541 12.2359 1.66666 11.1526 1.66666 9.99984C1.66666 8.84706 1.88541 7.76373 2.32291 6.74984C2.76041 5.73595 3.35416 4.854 4.10416 4.104C4.85416 3.354 5.7361 2.76025 6.74999 2.32275C7.76388 1.88525 8.84721 1.6665 9.99999 1.6665C11.1528 1.6665 12.2361 1.88525 13.25 2.32275C14.2639 2.76025 15.1458 3.354 15.8958 4.104C16.6458 4.854 17.2396 5.73595 17.6771 6.74984C18.1146 7.76373 18.3333 8.84706 18.3333 9.99984C18.3333 11.1526 18.1146 12.2359 17.6771 13.2498C17.2396 14.2637 16.6458 15.1457 15.8958 15.8957C15.1458 16.6457 14.2639 17.2394 13.25 17.6769C12.2361 18.1144 11.1528 18.3332 9.99999 18.3332ZM9.99999 16.6665C11.8611 16.6665 13.4375 16.0207 14.7292 14.729C16.0208 13.4373 16.6667 11.8609 16.6667 9.99984C16.6667 8.13873 16.0208 6.56234 14.7292 5.27067C13.4375 3.979 11.8611 3.33317 9.99999 3.33317C8.13888 3.33317 6.56249 3.979 5.27082 5.27067C3.97916 6.56234 3.33332 8.13873 3.33332 9.99984C3.33332 11.8609 3.97916 13.4373 5.27082 14.729C6.56249 16.0207 8.13888 16.6665 9.99999 16.6665Z" fill="#6B7385"/>
                                    </svg>
                                    {{ ucfirst($lesson->title) }}  
                                </span>
                                <span class="time">05:34 min</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p class="text-15">{{ get_phrase('Course Content Empty') }}</p>
    @endif
</div>