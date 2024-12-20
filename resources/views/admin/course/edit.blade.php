@extends('layouts.admin')
@push('title', get_phrase('Edit course'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    <span class="edit-badge py-2 px-3">
                        {{ get_phrase('Editing') }}
                    </span>
                    <span class="d-inline-block ms-3">
                        {{ $course_details->title }}
                    </span>
                </h4>
                <a href="{{ route('admin.courses') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px ms-auto">
                    <span class="fi-rr-arrow-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
                <a href="https://creativeitem.com/docs" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px" target="_blank">
                    <span class="fi-rr-arrow-up-right-from-square"></span>
                    <span>{{ get_phrase('Help') }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <form class="ajaxForm" action="{{ route('admin.course.update', $course_details->id) }}" method="post" enctype="multipart/form-data">@csrf
            <div class="ol-card">
                <div class="ol-card-body p-20px mb-3">

                    <div class="row mb-3">
                        <div class="col-sm-8">
                            <a href="{{ route('course.details', $course_details->slug) }}" target="_blank" class="btn ol-btn-outline-secondary me-3">
                                {{ get_phrase('Frontend View') }}
                                <i class="fi-rr-arrow-up-right-from-square"></i>
                            </a>

                            @php
                                $watch_history = App\Models\Watch_history::where('course_id', $course_details->course_id)
                                    ->where('student_id', auth()->user()->id)
                                    ->first();

                                $lesson = App\Models\Lesson::where('course_id', $course_details->course_id)
                                    ->orderBy('sort', 'asc')
                                    ->first();

                                if (!$watch_history || !$lesson) {
                                    $url['slug'] = $course_details->slug;
                                } else {
                                    if ($watch_history) {
                                        $lesson_id = $watch_history->watching_lesson_id;
                                    } elseif ($lesson) {
                                        $lesson_id = $lesson->id;
                                    }
                                    $url['id'] = $lesson_id;
                                }
                            @endphp

                            <a href="{{ route('course.player', $url) }}" target="_blank" class="btn ol-btn-outline-secondary">
                                {{ get_phrase('Course Player') }}
                                <i class="fi-rr-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                        <div class="col-sm-4 mt-3 mt-sm-0 d-flex justify-content-start justify-content-sm-end">
                            <button type="submit" class="btn ol-btn-outline-secondary @if (request('tab') == 'live-class' || request('tab') == 'progress' || request('tab') == 'curriculum') d-none @endif">
                                {{ get_phrase('Save Changes') }}
                            </button>
                        </div>
                    </div>

                    <div class="d-flex gap-3 flex-wrap flex-md-nowrap">
                        <div class="ol-sidebar-tab">
                            <div class="d-flex flex-column">
                                @php
                                    $param = request()->route()->parameter('id');
                                    $tab = request('tab');
                                @endphp

                                <input type="hidden" name="tab" value="{{ $tab }}">

                                <a id="curriculum" class="nav-link @if ($tab == 'curriculum' || $tab == '') active @endif" href="{{ route('admin.course.edit', [$param, 'tab' => 'curriculum']) }}">
                                    <span class="fi-rr-edit"></span>
                                    <span>{{ get_phrase('Curriculum') }}</span>
                                </a>

                                <a id="progress" class="nav-link @if ($tab == 'progress' || $tab == '') active @endif" href="{{ route('admin.course.edit', [$param, 'tab' => 'progress']) }}">
                                    <span class="fi-rr-edit"></span>
                                    <span>{{ get_phrase('Progress') }}</span>
                                </a>

                                <a id="basic" class="nav-link @if ($tab == 'basic') active @endif" href="{{ route('admin.course.edit', [$param, 'tab' => 'basic']) }}">
                                    <span class="icon fi-rr-duplicate"></span>
                                    <span>{{ get_phrase('Basic') }}</span>
                                </a>

                                <a id="live" class="nav-link @if ($tab == 'live-class') active @endif" href="{{ route('admin.course.edit', [$param, 'tab' => 'live-class']) }}">
                                    <span class="fi-rr-file-video"></span>
                                    <span>{{ get_phrase('Live Class') }}</span>
                                </a>

                                <a id="pricing" class="nav-link @if ($tab == 'pricing') active @endif" href="{{ route('admin.course.edit', [$param, 'tab' => 'pricing']) }}">
                                    <span class="fi-rr-comment-dollar"></span>
                                    <span>{{ get_phrase('Pricing') }}</span>
                                </a>

                                <a id="info" class="nav-link @if ($tab == 'info') active @endif" href="{{ route('admin.course.edit', [$param, 'tab' => 'info']) }}">
                                    <span class="fi-rr-tags"></span>
                                    <span>{{ get_phrase('Info') }}</span>
                                </a>

                                <a id="media" class="nav-link @if ($tab == 'media') active @endif" href="{{ route('admin.course.edit', [$param, 'tab' => 'media']) }}">
                                    <span class="fi fi-rr-gallery"></span>
                                    <span>{{ get_phrase('Media') }}</span>
                                </a>

                                <a id="seo" class="nav-link @if ($tab == 'seo') active @endif" href="{{ route('admin.course.edit', [$param, 'tab' => 'seo']) }}">
                                    <span class="fi-rr-note-medical"></span>
                                    <span>{{ get_phrase('SEO') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="tab-content w-100" id="course-edit-tabs">
                            @includeWhen($tab == 'curriculum' || $tab == '', 'admin.course.curriculum')
                            @includeWhen($tab == 'progress', 'admin.course.progress')
                            @includeWhen($tab == 'basic', 'admin.course.edit_basic')
                            @includeWhen($tab == 'live-class', 'admin.course.live_class')
                            @includeWhen($tab == 'pricing', 'admin.course.edit_pricing')
                            @includeWhen($tab == 'info', 'admin.course.edit_info')
                            @includeWhen($tab == 'media', 'admin.course.edit_media')
                            @includeWhen($tab == 'seo', 'admin.course.edit_seo')
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
