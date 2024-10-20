<!-- Header -->
<div class="ol-header print-d-none d-flex align-items-center justify-content-between">
    <div class="header-title-menubar d-flex align-items-center">
        <button class="menu-toggler sidebar-plus header-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.3598 11.2318C11.1318 11.4218 11 11.7032 11 12C11 12.2968 11.1318 12.5783 11.3598 12.7682L17.3598 17.7682C17.7841 18.1218 18.4146 18.0645 18.7682 17.6402C19.1218 17.2159 19.0644 16.5854 18.6402 16.2318L13.562 12L18.6402 7.76825C19.0644 7.41468 19.1218 6.78412 18.7682 6.35984C18.4146 5.93556 17.7841 5.87824 17.3598 6.2318L11.3598 11.2318Z" />
                <path opacity="0.5"
                    d="M5.3598 11.2318C5.13181 11.4218 4.99998 11.7032 4.99998 12C4.99998 12.2968 5.13181 12.5783 5.3598 12.7682L11.3598 17.7682C11.7841 18.1218 12.4146 18.0645 12.7682 17.6402C13.1218 17.2159 13.0644 16.5854 12.6402 16.2318L7.56203 12L12.6402 7.76825C13.0644 7.41468 13.1218 6.78412 12.7682 6.35984C12.4146 5.93556 11.7841 5.87824 11.3598 6.2318L5.3598 11.2318Z" />
            </svg>
        </button>

        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm pt-0 d-none d-md-inline-block text-14px text-muted header-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="{{ get_phrase('Visit Website') }}" data-bs-original-title="{{ get_phrase('Visit Website') }}">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2.15798 8.41681C1.9578 8.41681 1.78478 8.56088 1.75567 8.76153C1.69704 9.16569 1.66667 9.57916 1.66667 9.99982C1.66667 10.4205 1.69704 10.834 1.75567 11.2381C1.78478 11.4388 1.9578 11.5828 2.15798 11.5828H5.29992C5.42262 11.5828 5.51864 11.4759 5.50891 11.352C5.43839 10.4535 5.43839 9.54618 5.50891 8.64763C5.51864 8.5237 5.42262 8.41681 5.29992 8.41681H2.15798Z" />
                <path
                    d="M17.842 11.5828C18.0422 11.5828 18.2152 11.4388 18.2443 11.2381C18.303 10.834 18.3333 10.4205 18.3333 9.99982C18.3333 9.57916 18.303 9.16569 18.2443 8.76153C18.2152 8.56088 18.0422 8.41681 17.842 8.41681H14.7001C14.5774 8.41681 14.4814 8.5237 14.4911 8.64763C14.5616 9.54618 14.5616 10.4535 14.4911 11.352C14.4814 11.4759 14.5774 11.5828 14.7001 11.5828H17.842Z" />
                <path d="M7.73373 13.2714C7.60038 13.2714 7.5013 13.3966 7.53303 13.5278C7.96563 15.3169 8.76945 16.9553 9.84556 18.2599C9.92627 18.3578 10.0737 18.3578 10.1545 18.2599C11.2306 16.9553 12.0344 15.3169 12.467 13.5278C12.4987 13.3966 12.3996 13.2714 12.2663 13.2714H7.73373Z" />
                <path d="M9.84556 1.74004C9.92626 1.64219 10.0737 1.64219 10.1545 1.74004C11.2306 3.0447 12.0344 4.68274 12.467 6.4718C12.4987 6.60302 12.3996 6.72826 12.2663 6.72826H7.73373C7.60038 6.72826 7.5013 6.60302 7.53303 6.4718C7.96563 4.68274 8.76944 3.0447 9.84556 1.74004Z" />
                <g opacity="0.5">
                    <path d="M7.33528 2.38793C7.43039 2.21857 7.27474 2.01648 7.0945 2.08442C5.03698 2.85997 3.36359 4.43541 2.4426 6.43765C2.37967 6.57445 2.48018 6.72823 2.62915 6.72823H5.42874C5.62755 6.72823 5.79807 6.58579 5.84102 6.38913C6.14938 4.9775 6.64532 3.61659 7.33528 2.38793Z" />
                    <path d="M2.62915 13.2713C2.48018 13.2713 2.37967 13.4251 2.44259 13.5619C3.3636 15.5642 5.03698 17.1396 7.0945 17.9152C7.27474 17.9831 7.43038 17.781 7.33528 17.6116C6.64532 16.383 6.14938 15.0221 5.84102 13.6104C5.79807 13.4138 5.62755 13.2713 5.42874 13.2713H2.62915Z" />
                    <path d="M12.6649 17.6116C12.5698 17.781 12.7254 17.9831 12.9057 17.9152C14.9632 17.1396 16.6366 15.5642 17.5576 13.5619C17.6205 13.4251 17.52 13.2713 17.371 13.2713H14.5714C14.3726 13.2713 14.2021 13.4138 14.1591 13.6104C13.8508 15.0221 13.3548 16.383 12.6649 17.6116Z" />
                    <path d="M17.371 6.72823C17.52 6.72823 17.6205 6.57445 17.5576 6.43765C16.6366 4.43541 14.9632 2.85997 12.9057 2.08442C12.7254 2.01648 12.5698 2.21858 12.6649 2.38793C13.3548 3.61659 13.8508 4.9775 14.1591 6.38913C14.2021 6.58579 14.3726 6.72823 14.5714 6.72823H17.371Z" />
                    <path
                        d="M7.57904 11.5828C7.36558 11.5828 7.18601 11.4194 7.16929 11.2038C7.10725 10.4038 7.10725 9.59577 7.16929 8.79578C7.18601 8.58018 7.36558 8.41677 7.57904 8.41677H12.4211C12.6346 8.41677 12.8141 8.58018 12.8309 8.79578C12.8929 9.59578 12.8929 10.4038 12.8309 11.2038C12.8141 11.4194 12.6346 11.5828 12.4211 11.5828H7.57904Z" />
                </g>
            </svg>
        </a>
    </div>
    <div class="header-content-right d-flex align-items-center justify-content-end">

        <!-- language Select -->
        <div class="d-none d-sm-block">
            <div class="img-text-select ">
                @php
                    $activated_language = strtolower(session('language') ?? get_settings('language'));
                @endphp
                <div class="selected-show" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ get_phrase('Language') }}">
                    <i class="fi-rr-language text-20px py-2"></i>
                </div>
                <div class="drop-content">
                    <ul>
                        @foreach (App\Models\Language::get() as $lng)
                            <li>
                                <a href="{{ route('admin.select.language', ['language' => $lng->name]) }}" class="select-text text-capitalize">

                                    <i class="fi fi-br-check text-10px me-1 @if ($activated_language != strtolower($lng->name)) visibility-hidden @endif"></i>
                                    {{ $lng->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <a href="#" class="list text-18px d-inline-flex header-icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <span class="d-block h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ get_phrase('AI Assistant') }}">
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M11.3195 4.40128C11.1992 4.08845 10.7566 4.08845 10.6363 4.40128L9.00288 8.64809C8.9657 8.74475 8.88931 8.82114 8.79265 8.85832L4.54584 10.4917C4.23301 10.612 4.23301 11.0546 4.54584 11.1749L8.79265 12.8083C8.88931 12.8455 8.9657 12.9219 9.00288 13.0186L10.6363 17.2654C10.7566 17.5782 11.1992 17.5782 11.3195 17.2654L12.9529 13.0186C12.9901 12.9219 13.0665 12.8455 13.1631 12.8083L17.4099 11.1749C17.7228 11.0546 17.7228 10.612 17.4099 10.4917L13.1631 8.85832C13.0665 8.82114 12.9901 8.74475 12.9529 8.64809L11.3195 4.40128Z"
                        fill="#99A1B7" />
                    <path
                        d="M6.39453 3.33333C6.39453 2.8731 6.02144 2.5 5.5612 2.5C5.10096 2.5 4.72786 2.8731 4.72786 3.33333V4.58333H3.47786C3.01763 4.58333 2.64453 4.95643 2.64453 5.41667C2.64453 5.8769 3.01763 6.25 3.47786 6.25H4.72786V7.5C4.72786 7.96024 5.10096 8.33333 5.5612 8.33333C6.02144 8.33333 6.39453 7.96024 6.39453 7.5V6.25H7.64453C8.10477 6.25 8.47786 5.8769 8.47786 5.41667C8.47786 4.95643 8.10477 4.58333 7.64453 4.58333H6.39453V3.33333Z"
                        fill="#99A1B7" />
                </svg>
            </span>
        </a>

        <!-- Profile -->
        <div class="header-dropdown-md">
            <button class="header-dropdown-toggle-md" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-profile-sm">
                    <img src="{{ get_image(auth()->user()->photo) }}" alt="">
                </div>
            </button>
            <div class="header-dropdown-menu-md p-3">
                <div class="d-flex column-gap-2 mb-12px pb-12px ol-border-bottom-2">
                    <div class="user-profile-sm">
                        <img src="{{ get_image(auth()->user()->photo) }}" alt="">
                    </div>
                    <div>
                        <h6 class="title fs-12px mb-2px">{{ auth()->user()->name }}</h6>
                        <p class="sub-title fs-12px">{{ ucfirst(auth()->user()->role) }}</p>
                    </div>
                </div>

                <ul class="mb-12px pb-3 ol-border-bottom-2">
                    <li class="dropdown-list-1 mb-1"><a class="dropdown-item-1" href="#">{{ get_phrase('Free') }} {{ get_remaining_storage() . ' ' . get_phrase('of') . ' ' . get_company_allowed_storage() }}</a></li>

                    <div class="user-details w-100">
                        <div class="course-progress mb-0">
                            <div class="progress w-100">
                                <div class="progress-bar progress-bar-success" style="width: {{ (100 * get_company_storage_usage(false)) / get_company_allowed_storage(false) }}%"></div>
                            </div>
                        </div>
                    </div>
                </ul>

                <ul class="mb-12px pb-12px ol-border-bottom-2">
                    <li class="dropdown-list-1"><a class="dropdown-item-1" href="{{ route('my.profile') }}">{{ get_phrase('My Profile') }}</a></li>
                </ul>
                <ul>
                    <li class="dropdown-list-1"><a class="dropdown-item-1" href="{{ route('logout') }}">{{ get_phrase('Sign Out') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
