@extends('layouts.default')
@push('title', get_phrase('My Bootcamps'))
@section('content')
    <!-- Top Link Path Area Start -->
    <section class="top-link-path-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-link-path-area2">
                        <div class="top-link-path-inner2">
                            <h1 class="title">{{ get_phrase('My Bootcamps') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="{{ route('my.bootcamps') }}">{{ get_phrase('My Bootcamps') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Link Path Area End -->

    <!-- My Course Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 padding-bottom-110 padding-top-50">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.default.student.left_sidebar')
                </div>



                <div class="col-xl-9 col-lg-8">
                    <div class="lms1-card">
                        <div class="accordion bootcampitem-accordion" id="bootcamp-item">

                            @foreach ($my_bootcamps as $bootcamp)
                                <div class="accordion-item bootcampitem-accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bootcampitem-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $bootcamp->id }}" aria-expanded="false" aria-controls="collapse-{{ $bootcamp->id }}">
                                            <div class="d-flex gap-20px flex-column flex-sm-row">
                                                <div class="bootcampitem-img">
                                                    <img src="{{ get_image($bootcamp->thumbnail) }}" alt="bootcamp-thumbnail">
                                                </div>
                                                <div>
                                                    <h4 class="mb-12px euclid-title-18px">{{ $bootcamp->title }}</h4>
                                                    <div class="sml-icontext1">
                                                        <img src="{{ asset('assets/frontend/default/images/icons/mirroring-screen-gray-20.svg') }}" alt="">
                                                        <p class="text">{{ count_bootcamp_classes($bootcamp->id) }} {{ get_phrase('Live Class') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $bootcamp->id }}" class="accordion-collapse collapse" data-bs-parent="#bootcamp-item">
                                        <div class="accordion-body bootcampitem-accordion-body">
                                            <!-- body content  -->
                                            <div class="accordion accordion-left-arrow" id="module-item">

                                                @php
                                                    $modules = App\Models\BootcampModule::where('bootcamp_id', $bootcamp->id)->get();
                                                @endphp

                                                @if ($modules->count() > 0)
                                                    @foreach ($modules as $module)
                                                        @php
                                                            $is_available = 1;

                                                            if ($module->restriction == 1) {
                                                                $is_available = time() >= $module->publish_date ? 1 : 0;
                                                            } elseif ($module->restriction == 2) {
                                                                $is_available = time() >= $module->publish_date && time() <= $module->expiry_date ? 1 : 0;
                                                            }
                                                        @endphp
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header">
                                                                <button class="accordion-button collapsed d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#module-{{ $module->id }}" aria-expanded="false" aria-controls="module-{{ $module->id }}">
                                                                    <p class="pop-title-16px d-flex align-items-center justify-content-between w-100">
                                                                        <span class="d-block">
                                                                            {{ $module->title }}
                                                                            <small class="d-block pop-subtitle-12px">
                                                                                @if ($module->restriction == 1)
                                                                                    {{ get_phrase('Available from : ') }}
                                                                                    {{ date('d-M-Y', $module->publish_date) }}
                                                                                @elseif ($module->restriction == 2)
                                                                                    {{ get_phrase('Available within : ') }}
                                                                                    {{ date('d-M-Y', $module->publish_date) }} -
                                                                                    {{ date('d-M-Y', $module->expiry_date) }}
                                                                                @endif
                                                                            </small>
                                                                        </span>

                                                                        @if (!$is_available)
                                                                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="18" height="18">
                                                                                <path fill="#6B7385"
                                                                                    d="M19,8.424V7A7,7,0,0,0,5,7V8.424A5,5,0,0,0,2,13v6a5.006,5.006,0,0,0,5,5H17a5.006,5.006,0,0,0,5-5V13A5,5,0,0,0,19,8.424ZM7,7A5,5,0,0,1,17,7V8H7ZM20,19a3,3,0,0,1-3,3H7a3,3,0,0,1-3-3V13a3,3,0,0,1,3-3H17a3,3,0,0,1,3,3Z" />
                                                                                <path fill="#6B7385" d="M12,14a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V15A1,1,0,0,0,12,14Z" />
                                                                            </svg>
                                                                        @endif
                                                                    </p>

                                                                </button>
                                                            </h2>
                                                            <div id="module-{{ $module->id }}" class="accordion-collapse collapse" data-bs-parent="#module-item">
                                                                <div class="accordion-body">
                                                                    <!-- inner list -->
                                                                    @php
                                                                        $live_classes = App\Models\BootcampLiveClass::where('module_id', $module->id)->get();
                                                                        $resources = App\Models\BootcampResource::where('module_id', $module->id)->get();
                                                                    @endphp

                                                                    @if ($is_available)
                                                                        @if ($live_classes->count() > 0)
                                                                            <ul class="d-flex flex-column gap-3">
                                                                                @foreach ($live_classes as $class)
                                                                                    <li class="d-flex align-items-center justify-content-between gap-20px flex-wrap">
                                                                                        <p class="pop-subtitle-15px">
                                                                                            <span class="d-block lh-normal">{{ $class->title }}</span>

                                                                                            <span>
                                                                                                @if ($class->status == 'live')
                                                                                                    <span class="badge bg-danger-subtle border border-danger-subtle text-capitalize text-danger-emphasis rounded-pill fw-medium">{{ $class->status }}</span>
                                                                                                @elseif($class->status == 'upcoming')
                                                                                                    <span class="badge bg-warning-subtle border border-warning-subtle text-capitalize text-warning-emphasis rounded-pill fw-medium">{{ $class->status }}</span>
                                                                                                @elseif($class->status == 'completed')
                                                                                                    <span class="badge bg-success-subtle border border-success-subtle text-capitalize text-success-emphasis rounded-pill fw-medium">{{ $class->status }}</span>
                                                                                                @endif
                                                                                                <small class="pop-subtitle-12px">
                                                                                                    {{ date('d M, y', $class->start_time) }}
                                                                                                    ({{ date('h:i a', $class->start_time) }} -
                                                                                                    {{ date('h:i a', $class->end_time) }})
                                                                                                </small>
                                                                                            </span>
                                                                                        </p>

                                                                                        <div class="class-btns">
                                                                                            <a href="{{ class_started($class->id) ? route('bootcamp.live.class.join', Str::slug($class->title)) : 'javascript:void(0);' }}"
                                                                                                class="btn lms1-btn-outline-dark d-flex align-items-center gap-6px {{ class_started($class->id) ? '' : 'cursor-not-allowed' }}">{{ get_phrase('Join Now') }}</a>
                                                                                        </div>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif

                                                                        @if ($resources->count() > 0)
                                                                            <h4 class="mt-4 pop-subtitle-15px mb-3 text-center">
                                                                                {{ get_phrase('Resource files') }}</h4>
                                                                            <ul class="live-classes">
                                                                                @foreach ($resources as $resource)
                                                                                    <li class="d-flex justify-content-between mb-3">
                                                                                        <div class="class-details">
                                                                                            <p class="class-title ellipsis-1" data-bs-target="tooltip" title="{{ $resource->title }}">
                                                                                                {{ $resource->title }}
                                                                                            </p>

                                                                                            <div class="d-flex align-items-center gap-2">
                                                                                                <div class="class-status">
                                                                                                    @if ($resource->upload_type == 'resource')
                                                                                                        <span class="badge bg-success-subtle border border-success-subtle text-capitalize text-success-emphasis rounded-pill fw-medium">{{ get_phrase('Resource') }}</span>
                                                                                                    @elseif($resource->upload_type == 'record')
                                                                                                        <span class="badge bg-primary-subtle border border-primary-subtle text-capitalize text-primary-emphasis rounded-pill fw-medium">{{ get_phrase('Record') }}</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                                <small class="pop-subtitle-12px">
                                                                                                    {{ date('d M, Y H:i A', $resource->create_at) }}
                                                                                                </small>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="class-btns">
                                                                                            @if ($resource->upload_type == 'resource')
                                                                                                <a href="{{ route('bootcamp.resource.download', $resource->id) }}" class="lms1-btn-outline-dark">{{ get_phrase('Download') }}</a>
                                                                                            @else
                                                                                                <a href="{{ route('bootcamp.resource.play', $resource->title) }}" class="lms1-btn-outline-dark">{{ get_phrase('Play Now') }}</a>
                                                                                            @endif
                                                                                        </div>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif

                                                                        @if ($live_classes->count() < 1 && $resources->count() < 1)
                                                                            <p class="pop-subtitle-14px text-center">
                                                                                {{ get_phrase('Module has no available classes.') }}</p>
                                                                        @endif
                                                                    @else
                                                                        <p class="pop-subtitle-14px text-center">{{ get_phrase('Module is not available at this moment.') }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Course Area End -->
@endsection
