<div class="mb-30px">
    <h1 class="euclid-title-24px fw-medium mb-20px lms-mdm-text-border">{{ get_phrase('Course Overview') }}</h1>
    <div class="row">
        <div class="col-12">
            <div class="lms1-card max-md-400px-auto h-100">
                <div class="d-flex align-items-center gap-30px flex-column flex-md-row h-100">
                    <a href="{{ route('course.details', $package->course->slug) }}" class="list-card-img1">
                        <img src="{{ get_image($package->course->thumbnail) }}" alt="course-thumbnail">
                    </a>
                    <div>
                        <a href="{{ route('course.details', $package->course->slug) }}" class="euclid-title-20px lh-sm mb-12px">{{ $package->course->title }}</a>
                        <p class="pop-subtitle-13px2 fw-normal mb-3">{{ $package->course->short_description }}</p>
                        <div class="icontext-list-wrap d-flex flex-wrap align-items-center mb-2">
                            <div class="d-flex align-items-center gap-1">
                                <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="icon">
                                <p class="pop-subtitle-13px3">{{ lesson_count($package->course_id) }} {{ get_phrase('Lesson') }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="18" height="18">
                                    <path fill="#6b7385"
                                        d="M19.9,3.091A4,4,0,0,0,14.9.153L13.176.646A2.981,2.981,0,0,0,12,1.3,2.981,2.981,0,0,0,10.824.646L9.1.153A4,4,0,0,0,4.105,3.091,5,5,0,0,0,0,8v7a5.006,5.006,0,0,0,5,5h6v2H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2H13V20h6a5.006,5.006,0,0,0,5-5V8A5,5,0,0,0,19.9,3.091ZM13,3.531a1,1,0,0,1,.725-.961l1.725-.493A2,2,0,0,1,18,4V7.938a2.006,2.006,0,0,1-1.45,1.921L13,10.873ZM6.8,2.4A1.993,1.993,0,0,1,8.55,2.077l1.725.493A1,1,0,0,1,11,3.531v7.342L7.45,9.859A2.006,2.006,0,0,1,6,7.938V4A1.987,1.987,0,0,1,6.8,2.4ZM22,15a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V8A3,3,0,0,1,4,5.184V7.938a4.014,4.014,0,0,0,2.9,3.845l3.451.987a6.019,6.019,0,0,0,3.3,0l3.451-.987A4.014,4.014,0,0,0,20,7.938V5.184A3,3,0,0,1,22,8Z" />
                                </svg>
                                <p class="pop-subtitle-13px3">{{ section_count($package->course_id) }} {{ get_phrase('Section') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-end gap-2 flex-wrap justify-content-between">
                            <div class="d-flex align-items-baseline gap-2">
                                @if (isset($package->course->discount_flag) && $package->course->discount_flag == 1)
                                    <h3 class="pop-title-24px">{{ currency(number_format($package->course->discounted_price, 2)) }}</h3>
                                    <h4 class="pop-title-16px2 text-decoration-line-through fw-medium lms-text-secondary">{{ currency(number_format($package->course->price, 2)) }}</h4>
                                @elseif (isset($package->course->is_paid) && $package->course->is_paid == 0)
                                    <h3 class="pop-title-24px">{{ get_phrase('Free') }}</h3>
                                @else
                                    <h3 class="pop-title-24px">{{ currency(number_format($package->course->price, 2)) }}</h3>
                                @endif
                            </div>
                            <a href="{{ route('course.details', $package->course->slug) }}" class="btn lms4-btn-primary d-flex align-items-end gap-2">
                                <img src="{{ asset('assets/frontend/default/images/icons/refresh-white-20.svg') }}" alt="icon">
                                <span>{{ get_phrase('Compare') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
