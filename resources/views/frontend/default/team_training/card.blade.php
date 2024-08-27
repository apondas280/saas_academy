<div class="col-md-12">
    <a href="{{ route('team.package.details', $package->slug) }}" class="lms3-card lms3-card-hover h-100 max-md-400px-auto d-block">
        <div class="d-flex align-items-center gap-30px h-100 flex-column flex-md-row">
            <div class="list-card-img1">
                <img src="{{ get_image($package->thumbnail) }}" class="package-thumbnail" alt="package-thumbnail">
            </div>
            <div>
                <h3 class="euclid-title-20px lh-sm">{{ $package->title }}</h3>
                <p class="pop-subtitle-13px2 fw-normal mb-3">{{ get_phrase('Course : ') }}{{ $package->course_title }}</p>
                <div class="icontext-list-wrap d-flex flex-wrap align-items-center mb-2">
                    <div class="d-flex align-items-center gap-1">
                        <img src="{{ asset('assets/frontend/default/images/icons/clock-gray-20.svg') }}" alt="icon">
                        <p class="pop-subtitle-13px3">
                            {{ get_phrase('Expiry : ') }}
                            {{ $package->expiry == 'lifetime' ? get_phrase('Lifetime') : date('d-M-Y', $package->expiry_date) }}
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" height="18" viewBox="0 0 24 24" width="18" data-name="Layer 1">
                            <path fill="#6b7385"
                                d="m7.5 13a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm0-7a2.5 2.5 0 1 0 2.5 2.5 2.5 2.5 0 0 0 -2.5-2.5zm7.5 17v-.5a7.5 7.5 0 0 0 -15 0v.5a1 1 0 0 0 2 0v-.5a5.5 5.5 0 0 1 11 0v.5a1 1 0 0 0 2 0zm9-5a7 7 0 0 0 -11.667-5.217 1 1 0 1 0 1.334 1.49 5 5 0 0 1 8.333 3.727 1 1 0 0 0 2 0zm-6.5-9a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm0-7a2.5 2.5 0 1 0 2.5 2.5 2.5 2.5 0 0 0 -2.5-2.5z" />
                        </svg>
                        <p class="pop-subtitle-13px3">
                            {{ get_phrase('Members : ') }}
                            {{ $package->allocation }}
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="18" height="18">
                            <path fill="#6b7385"
                                d="M19.9,3.091A4,4,0,0,0,14.9.153L13.176.646A2.981,2.981,0,0,0,12,1.3,2.981,2.981,0,0,0,10.824.646L9.1.153A4,4,0,0,0,4.105,3.091,5,5,0,0,0,0,8v7a5.006,5.006,0,0,0,5,5h6v2H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2H13V20h6a5.006,5.006,0,0,0,5-5V8A5,5,0,0,0,19.9,3.091ZM13,3.531a1,1,0,0,1,.725-.961l1.725-.493A2,2,0,0,1,18,4V7.938a2.006,2.006,0,0,1-1.45,1.921L13,10.873ZM6.8,2.4A1.993,1.993,0,0,1,8.55,2.077l1.725.493A1,1,0,0,1,11,3.531v7.342L7.45,9.859A2.006,2.006,0,0,1,6,7.938V4A1.987,1.987,0,0,1,6.8,2.4ZM22,15a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V8A3,3,0,0,1,4,5.184V7.938a4.014,4.014,0,0,0,2.9,3.845l3.451.987a6.019,6.019,0,0,0,3.3,0l3.451-.987A4.014,4.014,0,0,0,20,7.938V5.184A3,3,0,0,1,22,8Z" />
                        </svg>
                        <p class="pop-subtitle-13px3">
                            {{ get_phrase('Lessons : ') }}
                            {{ lesson_count($package->course_id) }}
                        </p>
                    </div>
                </div>
                <div class="d-flex align-items-baseline gap-2">
                    @if ($package->pricing_type == 0)
                        <h3 class="pop-title-24px">{{ get_phrase('Free') }}</h3>
                    @else
                        @if ($package->price == $package->allocation * $package->course_price)
                            <h3 class="pop-title-24px">{{ currency(number_format($package->price, 2)) }}</h3>
                        @else
                            <h3 class="pop-title-24px">{{ currency(number_format($package->price, 2)) }}</h3>
                            <h4 class="pop-title-16px2 text-decoration-line-through fw-medium lms-text-secondary">
                                {{ currency(number_format($package->allocation * $package->course_price, 2)) }}
                            </h4>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </a>
</div>
