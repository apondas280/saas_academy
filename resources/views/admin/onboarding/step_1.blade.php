@extends('admin.onboarding.index')

@section('content')
    <form class="w-100" action="{{ route('onboarding.step', 1) }}" method="post" id="step-one">@csrf
        <h3 class="man-title-28px text-center lh-normal fw-extrabold max-w-443px mx-auto mb-4">{{ get_phrase('What would you like to use Creative LMS for?') }}</h3>
        <div class="cin1-onboarding-body d-flex flex-column justify-content-between">
            <div class="btn-group check-btn-group mb-20px onboarding-first-btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="purpose" value="work" @if (isset($payload['purpose']) && $payload['purpose'] == 'work') checked @endif id="btnradio1" autocomplete="off">
                <label class="btn btn-outline-secondary btn-outline-secondary-check min-w-149px" for="btnradio1">{{ get_phrase('Work') }}</label>

                <input type="radio" class="btn-check" name="purpose" value="personal" @if (isset($payload['purpose']) && $payload['purpose'] == 'personal') checked @endif id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-secondary btn-outline-secondary-check min-w-149px" for="btnradio2">{{ get_phrase('Personal') }}</label>

                <input type="radio" class="btn-check" name="purpose" value="school" @if (isset($payload['purpose']) && $payload['purpose'] == 'school') checked @endif id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-secondary btn-outline-secondary-check min-w-149px" for="btnradio3">{{ get_phrase('School') }}</label>
            </div>
            <p class="text-center in-subtitle-12px mb-3">{{ get_phrase('This will help us to customize your onboarding experience.') }}</p>
        </div>
        <div class="cin1-onboarding-footer">
            <div class="progress on-gradient-progress mb-20px" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 25%"></div>
            </div>
            <div class="d-flex align-items-center justify-content-end gap-2 flex-wrap">
                <button type="submit" class="btn cin2-btn-primary">
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

                // Check if any of the radio buttons is checked
                if (!$('input[name="purpose"]:checked').length) {
                    error('Please select the purpose of of using GrowUp LMS');
                    event.preventDefault();
                }
            });
        });
    </script>
@endpush
