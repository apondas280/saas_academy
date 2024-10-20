@php
    $current_route = Route::currentRouteName();
@endphp

<div class="student-panel-area">
    <div class="student-panel-cover">
        <img src="{{ asset('assets/frontend/default/images/student-panel-cover.webp') }}" alt="">
    </div>
    <div class="student-panel-profile">
        <div class="student-profile-img">
            <img src="{{ get_image(auth()->user()->photo) }}" alt="">
        </div>
        <h4 class="name">{{ auth()->user()->name }}</h4>
        <p class="mail">{{ auth()->user()->email }}</p>
    </div>
    <div class="student-panel-nav">
        <ul>
            <li>
                <a href="{{ route('my.courses') }}" class="@if ($current_route == 'my.courses') active @endif">
                    <i class="fi fi-rr-e-learning"></i>
                    <span>{{ get_phrase('My Courses') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('my.bootcamps') }}" class="svg-stroke-color @if ($current_route == 'my.bootcamps' || $current_route == 'my.bootcamp.details') active @endif">
                    <i class="fi fi-rr-users-alt"></i>
                    <span>{{ get_phrase('My Live Courses') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('my.team.packages') }}" class="svg-stroke-color @if ($current_route == 'my.team.packages' || $current_route == 'my.team.packages.details' || $current_route == 'team.package.invoice') active @endif">
                    <i class="fi fi-rr-member-list"></i>
                    <span>{{ get_phrase('My Teams') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('my.profile') }}" class="@if ($current_route == 'my.profile') active @endif">
                    <i class="fi fi-rr-circle-user"></i>
                    <span>{{ get_phrase('My Profile') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('wishlist') }}" class="@if ($current_route == 'wishlist') active @endif">
                    <i class="fi fi-rr-heart"></i>
                    <span>{{ get_phrase('Wishlist') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('message') }}" class="@if ($current_route == 'message') active @endif">
                    <i class="fi fi-rr-messages"></i>
                    <span>{{ get_phrase('Message') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('purchase.history') }}" class="@if ($current_route == 'purchase.history' || $current_route == 'invoice') active @endif">
                    <i class="fi fi-rr-time-past"></i>
                    <span>{{ get_phrase('Purchase History') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    <i class="fi fi-rr-arrow-left-from-arc"></i>
                    {{ get_phrase('Logout') }}
                </a>
            </li>
        </ul>
    </div>
    @if (auth()->user()->role == 'student')
        {{-- <a href="{{ route('become.instructor') }}" class="lms2-btn-primary d-flex align-items-center gap-2 w-100 justify-content-center">
            <span>{{ get_phrase('Become An Instructors') }}</span>
            <i class="fa-solid fa-arrow-right"></i>
        </a> --}}
    @endif
</div>
