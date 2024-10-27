@extends('admin.onboarding.index')

@section('content')
    <form class="w-100" action="{{ route('onboarding.step', 2) }}" method="post" enctype="multipart/form-data">@csrf
        <h3 class="man-title-28px text-center lh-normal fw-extrabold max-w-443px mx-auto mb-4">{{ get_phrase('Initial company setup') }}</h3>


        <div class="cin1-onboarding-body">
            <div class="max-w-428px mx-auto mb-3">
                <div class="mb-3">
                    <label for="" class="form-label on-file-label-title text-decoration-none">{{ get_phrase('Company Name') }}</label>
                    <input type="text" class="form-control on-form-control text-capitalize" id="" value="{{ $company }}" placeholder="Company name" disabled>
                </div>
                <div class="mb-3">
                    <label for="logo-file" class="form-label on-file-label-title text-decoration-none">{{ get_phrase('Company Logo') }}</label>
                    <span class="on-file-label d-inline-block w-100">
                        <div class="mb-2 text-center">
                            <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="16.5" cy="16" r="16" fill="#F1F5F9" />
                                <path d="M15.6665 23.4998L15.6665 20.1664" stroke="#0A1017" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.3332 21.8331L15.6665 20.1664" stroke="#0A1017" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.9998 21.8331L15.6665 20.1664" stroke="#0A1017" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M20.3414 22.667C21.4581 22.6753 22.5331 22.2587 23.3581 21.5087C26.0831 19.1253 24.6248 14.342 21.0331 13.892C19.7498 6.10866 8.52478 9.05866 11.1831 16.467" stroke="#0A1017" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12.5663 16.8081C12.1246 16.5831 11.633 16.4664 11.1413 16.4748C7.25798 16.7498 7.26631 22.3998 11.1413 22.6748" stroke="#0A1017" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M19.6836 14.2421C20.1169 14.0254 20.5836 13.9087 21.0669 13.9004" stroke="#0A1017" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h4 class="mb-1 on-file-label-title">{{ get_phrase('upload Company Logo') }}</h4>
                        <p class="on-file-label-subtitle">{{ get_phrase('JPG,SVG orPNG (max 800x400px)') }}</p>
                    </span>
                    <input type="file" class="form-control" name="logo" id="logo-file" hidden>
                </div>
                <div>
                    <label for="logo-file" class="form-label on-file-label-title text-decoration-none">{{ get_phrase('Timezone') }}</label>
                    <select class="select2-with-search on-select-input" name="timezone" required>
                        @foreach (DateTimeZone::listIdentifiers(DateTimeZone::ALL) as $tz)
                            <option value="{{ $tz }}" @selected(date_default_timezone_get() == $tz)>{{ $tz }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="cin1-onboarding-footer">
            <div class="progress on-gradient-progress mb-20px" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 25%"></div>
            </div>
            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                <a href="{{ route('onboarding.step', 1) }}" class="btn cin4-btn-outline-secondary svg-stroke">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5859 16.6L7.1526 11.1666C6.51094 10.525 6.51094 9.47496 7.1526 8.8333L12.5859 3.39996" stroke="#212534" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
                <button type="submit" class="btn cin2-btn-primary next-step">
                    <span>{{ get_phrase('Next') }}</span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.41406 16.6L12.8474 11.1666C13.4891 10.525 13.4891 9.47496 12.8474 8.8333L7.41406 3.39996" stroke="white" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('button[type="submit"]').on('click', function(event) {
                let valid = true;

                // validate timezone selection
                const timezoneSelect = $('select[name="timezone"]');

                if (timezoneSelect.val() === "") {
                    error('Please select your preferred timezone');
                    event.preventDefault();
                }
            });
        });
    </script>
@endpush
