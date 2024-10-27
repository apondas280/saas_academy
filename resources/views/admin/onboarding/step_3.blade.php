@extends('admin.onboarding.index')

@section('content')
    <form class="w-100" action="{{ route('onboarding.step', 3) }}" method="post" enctype="multipart/form-data">@csrf
        <h3 class="man-title-28px text-center lh-normal fw-extrabold max-w-443px mx-auto mb-4">{{ get_phrase('How did you hear about us?') }}</h3>


        <div class="cin1-onboarding-body">
            <div class=" mx-auto mb-3">
                <div class="btn-group check-btn-group mb-20px pt-2" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="social_media" value="billboard" @if (isset($payload['purpose']) && $payload['purpose'] == 'billboard') checked @endif id="btnradio1" autocomplete="off" required>
                    <label class="btn btn-outline-secondary btn-outline-secondary-check2" for="btnradio1">{{ get_phrase('Billboard') }}</label>

                    <input type="radio" class="btn-check" name="social_media" value="podcast" @if (isset($payload['purpose']) && $payload['purpose'] == 'podcast') checked @endif id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-outline-secondary-check2" for="btnradio2">{{ get_phrase('Podcast') }} / Radio</label>

                    <input type="radio" class="btn-check" name="social_media" value="friend" @if (isset($payload['purpose']) && $payload['purpose'] == 'friend') checked @endif id="btnradio3" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-outline-secondary-check2" for="btnradio3">{{ get_phrase('Friend') }} / Colleague</label>

                    <input type="radio" class="btn-check" name="social_media" value="facebook" @if (isset($payload['purpose']) && $payload['purpose'] == 'facebook') checked @endif id="btnradio4" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-outline-secondary-check2" for="btnradio4">{{ get_phrase('Facebook') }} / Instagram</label>

                    <input type="radio" class="btn-check" name="social_media" value="youtube" @if (isset($payload['purpose']) && $payload['purpose'] == 'youtube') checked @endif id="btnradio5" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-outline-secondary-check2" for="btnradio5">{{ get_phrase('Youtube') }}</label>

                    <input type="radio" class="btn-check" name="social_media" value="search" @if (isset($payload['purpose']) && $payload['purpose'] == 'search') checked @endif id="btnradio6" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-outline-secondary-check2" for="btnradio6">{{ get_phrase('Search') }} Engine (Google, Bing, etc.)</label>

                    <input type="radio" class="btn-check" name="social_media" value="linkedin" @if (isset($payload['purpose']) && $payload['purpose'] == 'linkedin') checked @endif id="btnradio7" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-outline-secondary-check2" for="btnradio7">{{ get_phrase('Linkedin') }}</label>

                    <input type="radio" class="btn-check" name="social_media" value="tikTok" @if (isset($payload['purpose']) && $payload['purpose'] == 'tikTok') checked @endif id="btnradio8" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-outline-secondary-check2" for="btnradio8">{{ get_phrase('TikTok') }}</label>

                    <input type="radio" class="btn-check" name="social_media" value="other" @if (isset($payload['purpose']) && $payload['purpose'] == 'other') checked @endif id="btnradio9" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-outline-secondary-check2" for="btnradio9">{{ get_phrase('Other') }}</label>
                </div>
            </div>
        </div>


        <div class="cin1-onboarding-footer">
            <div class="progress on-gradient-progress mb-20px" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 25%"></div>
            </div>
            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                <a href="{{ route('onboarding.step', 2) }}" class="btn cin4-btn-outline-secondary svg-stroke">
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
