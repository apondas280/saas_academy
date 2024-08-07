@php
    $modules = App\Models\BootcampModule::where('bootcamp_id', $bootcamp->id)->get();
@endphp
<div class="player-right-sidebar">
    @if ($modules->count() > 0)
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
                @foreach ($modules as $module)
                    @php
                        $is_available = 1;

                        if ($module->restriction == 1) {
                            $is_available = time() >= $module->publish_date ? 1 : 0;
                        } elseif ($module->restriction == 2) {
                            $is_available =
                                time() >= $module->publish_date && time() <= $module->expiry_date
                                    ? 1
                                    : 0;
                        }
                    @endphp
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button title collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse_{{ $module->id }}"
                                aria-expanded="false"
                                aria-controls="collapse_{{ $module->id }}">
                                {{ ucfirst($module->title) }}
                            </button>
                        </h2>
                        <div id="collapse_{{ $module->id }}"
                            class="accordion-collapse collapse"
                            data-bs-parent="#coursePlay">
                            <div class="accordion-body">
                                @php
                                    $live_classes = App\Models\BootcampLiveClass::where(
                                        'module_id',
                                        $module->id,
                                    )->get();
                                    $resources = App\Models\BootcampResource::where(
                                        'module_id',
                                        $module->id,
                                    )->get();
                                @endphp
                                @if ($is_available)
                                    @if ($live_classes->count() > 0)
                                    <!-- Playlist List -->
                                    <ul class="player-playlist-list padding-bottom-50">
                                        @foreach ($live_classes as $key => $class)
                                        <li>
                                            <a href="#" class="single-list">
                                                <span class="number-name">
                                                    <span class="progress"><span class="number">{{ ++$key }}</span></span>
                                                    <span class="name">{{ $class->title }}</span>
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
                                    </ul>
                                    @endif
                                @endif
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>