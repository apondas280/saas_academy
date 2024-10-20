@php $current_route = Route::currentRouteName(); @endphp

<div class="sidebar-logo-area">
    <a href="#" class="sidebar-logos">
        <img class="sidebar-logo-lg" height="50px" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="">
        <img class="sidebar-logo-sm" height="40px" src="{{ get_image(get_frontend_settings('favicon')) }}" alt="">
    </a>
    <button class="sidebar-cross menu-toggler d-block d-lg-none">
        <span class="fi-rr-cross"></span>
    </button>
</div>

<h3 class="sidebar-title fs-12px px-30px pb-20px mt-3 text-uppercase">{{ get_phrase('Main Menu') }}</h3>
<div class="sidebar-nav-area">
    <nav class="sidebar-nav">
        <ul class="px-14px pb-24px">

            <!-- dashboard -->
            @if (has_permission('admin.dashboard'))
                <li class="sidebar-first-li @if ($current_route == 'admin.dashboard') active @endif">
                    <a href="{{ route('admin.dashboard') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.2634 8.45738L11.5739 3.11572C10.6995 2.29476 9.30026 2.29476 8.42586 3.11572L2.7366 8.45742C2.43465 8.74097 2.41972 9.2156 2.70327 9.51756C2.74915 9.56642 2.80004 9.60776 2.85438 9.64154C3.04976 9.76298 3.2498 9.94059 3.2498 10.1706V14.6375C3.2498 16.2623 4.63822 17.5 6.24984 17.5C6.47996 17.5 6.66667 17.3135 6.66667 17.0833V13.3333C6.66667 11.9526 7.78595 10.8333 9.16667 10.8333H10.8333C12.214 10.8333 13.3333 11.9526 13.3333 13.3333V17.0834C13.3333 17.3135 13.5199 17.5 13.7499 17.5C15.3616 17.5 16.75 16.2623 16.75 14.6375V10.1707C16.75 9.94066 16.9501 9.76303 17.1455 9.64159C17.1999 9.60779 17.2509 9.56642 17.2968 9.51752C17.5803 9.21554 17.5653 8.7409 17.2634 8.45738Z" />
                            <path opacity="0.5" d="M11.25 17.5C11.4801 17.5 11.6667 17.3135 11.6667 17.0833V13.3333C11.6667 12.8731 11.2936 12.5 10.8333 12.5H9.16668C8.70644 12.5 8.33334 12.8731 8.33334 13.3333V17.0833C8.33334 17.3135 8.51989 17.5 8.75001 17.5H11.25Z" />
                        </svg>

                        <div class="text"><span>{{ get_phrase('Dashboard') }}</span></div>
                    </a>
                </li>
            @endif


            <!-- manage courses -->
            @if (has_permission('admin.courses') ||
                    has_permission('admin.course.create') ||
                    has_permission('admin.course.edit') ||
                    has_permission('admin.coupons') ||
                    has_permission('admin.categories') ||
                    has_permission('admin.bootcamps') ||
                    has_permission('admin.bootcamp.create') ||
                    has_permission('admin.bootcamp.edit') ||
                    has_permission('admin.bootcamp.purchase.history') ||
                    has_permission('admin.bootcamp.purchase.invoice') ||
                    has_permission('admin.bootcamp.categories') ||
                    has_permission('admin.enroll.history') ||
                    has_permission('admin.student.enroll'))
                <li class="sidebar-first-li first-li-have-sub @if (
                    $current_route == 'admin.courses' ||
                        $current_route == 'admin.course.create' ||
                        $current_route == 'admin.course.edit' ||
                        $current_route == 'admin.coupons' ||
                        $current_route == 'admin.categories' ||
                        $current_route == 'admin.bootcamps' ||
                        $current_route == 'admin.bootcamp.create' ||
                        $current_route == 'admin.bootcamp.edit' ||
                        $current_route == 'admin.bootcamp.purchase.history' ||
                        $current_route == 'admin.bootcamp.purchase.invoice' ||
                        $current_route == 'admin.bootcamp.categories' ||
                        $current_route == 'admin.enroll.history' ||
                        $current_route == 'admin.student.enroll') active showMenu @endif">
                    <a href="javascript:void(0);">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.23482 16.8658C9.37851 16.9658 9.58333 16.8661 9.58333 16.691V5.79962C9.58333 5.04353 9.25042 4.30914 8.589 3.9428C7.06798 3.10037 5.07769 2.62004 3.33224 2.5018C2.87305 2.4707 2.5 2.84662 2.5 3.30769V14.1606C2.5 14.6217 2.87305 14.9933 3.33224 15.0244C5.33756 15.1603 7.66607 15.7741 9.23482 16.8658ZM5.15325 5.23557C4.70086 5.15093 4.26551 5.44905 4.18088 5.90144C4.09624 6.35383 4.39437 6.78917 4.84675 6.87381C5.65289 7.02463 6.45694 7.24869 7.19002 7.54246C7.61724 7.71365 8.10234 7.50611 8.27354 7.0789C8.44473 6.65169 8.23719 6.16658 7.80998 5.99539C6.96231 5.6557 6.0515 5.40362 5.15325 5.23557Z" />
                            <path opacity="0.5"
                                d="M17.5 14.1606V3.30769C17.5 2.84662 17.1269 2.4707 16.6677 2.5018C14.9223 2.62004 12.932 3.10037 11.411 3.9428C10.7496 4.30914 10.4167 5.04353 10.4167 5.79962V16.691C10.4167 16.8661 10.6215 16.9658 10.7652 16.8658C12.3339 15.7741 14.6624 15.1603 16.6677 15.0244C17.1269 14.9933 17.5 14.6217 17.5 14.1606Z" />
                        </svg>
                        <div class="text"><span>{{ get_phrase('Course Management') }}</span></div>
                    </a>

                    <ul class="first-sub-menu">
                        <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Course Management') }}</li>

                        <!-- course menus -->
                        <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'admin.courses' || $current_route == 'admin.course.create' || $current_route == 'admin.course.edit' || $current_route == 'admin.coupons' || $current_route == 'admin.categories' || $current_route == 'admin.enroll.history') active @endif">
                            <a href="javascript:void(0);">{{ get_phrase('Recorded Courses') }}</a>
                            <ul class="second-sub-menu">
                                <li class="sidebar-third-li @if ($current_route == 'admin.courses' || $current_route == 'admin.course.edit') active @endif">
                                    <a href="{{ route('admin.courses') }}">{{ get_phrase('All Courses') }}</a>
                                </li>

                                <li class="sidebar-third-li @if ($current_route == 'admin.categories') active @endif">
                                    <a href="{{ route('admin.categories') }}">{{ get_phrase('Categories') }}</a>
                                </li>

                                <li class="sidebar-third-li @if ($current_route == 'admin.coupons' || $current_route == 'admin.coupons.edit') active @endif">
                                    <a href="{{ route('admin.coupons') }}">{{ get_phrase('Coupons') }}</a>
                                </li>

                                <li class="sidebar-third-li @if ($current_route == 'admin.course.create') active @endif">
                                    <a href="{{ route('admin.course.create') }}">{{ get_phrase('Add Course') }}</a>
                                </li>

                                <li class="sidebar-third-li @if ($current_route == 'admin.enroll.history' || $current_route == 'admin.student.enroll') active @endif">
                                    <a href="{{ route('admin.enroll.history') }}">{{ get_phrase('Enrollments') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- live class menus -->
                        <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'admin.bootcamps' || $current_route == 'admin.bootcamp.create' || $current_route == 'admin.bootcamp.edit' || $current_route == 'admin.bootcamp.purchase.history' || $current_route == 'admin.bootcamp.purchase.invoice' || $current_route == 'admin.bootcamp.categories') active @endif">
                            <a href="javascript:void(0);">{{ get_phrase('Live Courses') }}</a>
                            <ul class="second-sub-menu">
                                <li class="sidebar-third-li @if ($current_route == 'admin.bootcamps' || $current_route == 'admin.bootcamp.edit') active @endif">
                                    <a href="{{ route('admin.bootcamps') }}">{{ get_phrase('All Live Courses') }}</a>
                                </li>

                                <li class="sidebar-third-li @if ($current_route == 'admin.bootcamp.categories') active @endif">
                                    <a href="{{ route('admin.bootcamp.categories') }}">{{ get_phrase('Categories') }}</a>
                                </li>

                                <li class="sidebar-third-li @if ($current_route == 'admin.bootcamp.create') active @endif">
                                    <a href="{{ route('admin.bootcamp.create') }}">{{ get_phrase('Add Live Course') }}</a>
                                </li>

                                <li class="sidebar-third-li @if ($current_route == 'admin.bootcamp.purchase.history' || $current_route == 'admin.bootcamp.purchase.invoice') active @endif">
                                    <a href="{{ route('admin.bootcamp.purchase.history') }}">{{ get_phrase('Purchase History') }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif


            <!-- private training -->
            @if (has_permission('admin.team.packages') ||
                    has_permission('admin.team.packages.create') ||
                    has_permission('admin.team.packages.edit') ||
                    has_permission('admin.team.packages.purchase.history') ||
                    has_permission('admin.team.packages.purchase.invoice') ||
                    has_permission('admin.groups') ||
                    has_permission('admin.groups.create') ||
                    has_permission('admin.groups.edit') ||
                    has_permission('admin.groups.training'))
                <li class="sidebar-first-li first-li-have-sub @if (
                    $current_route == 'admin.team.packages' ||
                        $current_route == 'admin.team.packages.create' ||
                        $current_route == 'admin.team.packages.edit' ||
                        $current_route == 'admin.team.packages.purchase.history' ||
                        $current_route == 'admin.team.packages.purchase.invoice' ||
                        $current_route == 'admin.groups' ||
                        $current_route == 'admin.groups.create' ||
                        $current_route == 'admin.groups.edit' ||
                        $current_route == 'admin.groups.training') active showMenu @endif">
                    <a href="javascript:void(0);">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.125 16.6666H5.875C5.62186 16.6666 5.41665 16.48 5.41666 16.2499C5.41671 14.6391 6.85315 13.3333 8.62506 13.3333H11.3751C13.147 13.3333 14.5834 14.6391 14.5833 16.2499C14.5833 16.48 14.3781 16.6666 14.125 16.6666Z" />
                            <path d="M13.3333 9.16659C13.3333 11.0075 11.8409 12.4999 9.99999 12.4999C8.15904 12.4999 6.66666 11.0075 6.66666 9.16659C6.66666 7.32564 8.15904 5.83325 9.99999 5.83325C11.8409 5.83325 13.3333 7.32564 13.3333 9.16659Z" />
                            <g opacity="0.5">
                                <path d="M5.08932 8.22071C5.40241 6.58553 6.51197 5.23325 7.99872 4.58318C7.56645 3.83597 6.75854 3.33325 5.83322 3.33325C4.45251 3.33325 3.33322 4.45254 3.33322 5.83325C3.33322 6.9549 4.0719 7.90403 5.08932 8.22071Z" />
                                <path d="M5.07044 10.0078C3.16975 10.1324 1.66666 11.7135 1.66666 13.6458C1.66666 13.9334 1.89984 14.1666 2.18749 14.1666H4.18487C4.67138 13.4067 5.34243 12.7763 6.13479 12.3386C5.5945 11.681 5.21874 10.8831 5.07044 10.0078Z" />
                                <path d="M15.8152 14.1666H17.8125C18.1001 14.1666 18.3333 13.9334 18.3333 13.6458C18.3333 11.7135 16.8302 10.1324 14.9295 10.0078C14.7812 10.8831 14.4055 11.681 13.8652 12.3386C14.6576 12.7762 15.3287 13.4067 15.8152 14.1666Z" />
                                <path d="M14.9106 8.22066C15.928 7.90393 16.6666 6.95484 16.6666 5.83325C16.6666 4.45254 15.5473 3.33325 14.1666 3.33325C13.2413 3.33325 12.4334 3.83594 12.0011 4.58312C13.4879 5.23316 14.5975 6.58545 14.9106 8.22066Z" />
                            </g>
                        </svg>
                        <div class="text"><span>{{ get_phrase('Private Training') }}</span></div>
                    </a>

                    <ul class="first-sub-menu">
                        <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Manage Teams') }}</li>

                        <!-- course menus -->
                        <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'admin.team.packages' || $current_route == 'admin.team.packages.create' || $current_route == 'admin.team.packages.edit' || $current_route == 'admin.team.packages.purchase.history' || $current_route == 'admin.team.packages.purchase.invoice') active @endif">
                            <a href="javascript:void(0);">{{ get_phrase('Manage Teams') }}</a>
                            <ul class="second-sub-menu">
                                <li class="sidebar-third-li @if ($current_route == 'admin.team.packages' || $current_route == 'admin.team.packages.edit') active @endif">
                                    <a href="{{ route('admin.team.packages') }}">{{ get_phrase('All Packages') }}</a>
                                </li>

                                <li class="sidebar-third-li @if ($current_route == 'admin.team.packages.create') active @endif">
                                    <a href="{{ route('admin.team.packages.create') }}">{{ get_phrase('Add New') }}</a>
                                </li>

                                <li class="sidebar-third-li {{ $current_route == 'admin.team.packages.purchase.history' || $current_route == 'admin.team.packages.purchase.invoice' ? 'active' : '' }}">
                                    <a href="{{ route('admin.team.packages.purchase.history') }}">{{ get_phrase('Purchase History') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- private group menus -->
                        <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'admin.groups' || $current_route == 'admin.groups.create' || $current_route == 'admin.groups.edit' || $current_route == 'admin.groups.training') active @endif">
                            <a href="javascript:void(0);">{{ get_phrase('Manage Groups') }}</a>
                            <ul class="second-sub-menu">
                                @if (has_permission('admin.groups'))
                                    <li class="sidebar-third-li {{ $current_route == 'admin.groups' || $current_route == 'admin.groups.edit' ? 'active' : '' }}">
                                        <a href="{{ route('admin.groups') }}">{{ get_phrase('All Groups') }}</a>
                                    </li>
                                @endif

                                @if (has_permission('admin.groups.create'))
                                    <li class="sidebar-third-li {{ $current_route == 'admin.groups.create' ? 'active' : '' }}">
                                        <a href="{{ route('admin.groups.create') }}">{{ get_phrase('Add New') }}</a>
                                    </li>
                                @endif

                                @if (has_permission('admin.groups.training'))
                                    <li class="sidebar-third-li {{ $current_route == 'admin.groups.training' ? 'active' : '' }}">
                                        <a href="{{ route('admin.groups.training') }}">{{ get_phrase('Training Session') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif


            <!-- payment reports -->
            @if (has_permission('admin.revenue') || has_permission('admin.instructor.revenue') || has_permission('admin.purchase.history') || has_permission('admin.purchase.history.invoice') || has_permission('admin.offline.payments'))
                <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'admin.revenue' || $current_route == 'admin.instructor.revenue' || $current_route == 'admin.purchase.history' || $current_route == 'admin.purchase.history.invoice' || $current_route == 'admin.offline.payments') active @endif">
                    <a href="javascript:void(0);">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.33334 13.7037C3.33334 9.99999 7.14287 5.37036 10 5.37036C12.8572 5.37036 16.6667 9.99999 16.6667 13.7037C16.6667 16.4815 14.7619 18.3333 10 18.3333C5.23811 18.3333 3.33334 16.4815 3.33334 13.7037ZM10 7.70841C10.3452 7.70841 10.625 7.98824 10.625 8.33341V8.80353C11.0061 8.8944 11.3398 9.06553 11.6069 9.28666C11.9984 9.61074 12.2917 10.0858 12.2917 10.6061C12.2917 10.9513 12.0119 11.2311 11.6667 11.2311C11.3215 11.2311 11.0417 10.9513 11.0417 10.6061C11.0417 10.5583 11.0017 10.4084 10.8098 10.2495C10.6313 10.1017 10.3559 9.98114 10 9.98114C9.26534 9.98114 8.95834 10.4579 8.95834 10.7198C8.95834 11.0824 9.0668 11.2121 9.16036 11.2804C9.29342 11.3776 9.54988 11.4584 10 11.4584C10.5499 11.4584 11.1268 11.5481 11.577 11.877C12.0668 12.2348 12.2917 12.787 12.2917 13.4471C12.2917 14.3602 11.5867 15.1257 10.625 15.3611V15.8334C10.625 16.1786 10.3452 16.4584 10 16.4584C9.65483 16.4584 9.37501 16.1786 9.37501 15.8334V15.3601C8.4302 15.1226 7.81945 14.3602 7.81945 13.5607C7.81945 13.2155 8.09928 12.9357 8.44445 12.9357C8.78963 12.9357 9.06945 13.2155 9.06945 13.5607C9.06945 13.7326 9.29182 14.1857 10 14.1857C10.7347 14.1857 11.0417 13.7089 11.0417 13.4471C11.0417 13.0844 10.9332 12.9547 10.8397 12.8864C10.7066 12.7892 10.4501 12.7084 10 12.7084C9.45014 12.7084 8.87327 12.6187 8.423 12.2898C7.93322 11.932 7.70834 11.3799 7.70834 10.7198C7.70834 9.80666 8.4133 9.04115 9.37501 8.80577V8.33341C9.37501 7.98824 9.65483 7.70841 10 7.70841Z" />
                            <path
                                d="M6.433 2.55296C6.70287 3.06045 7.17892 3.55431 7.76384 4.0109C7.88066 4.10208 8.03778 4.11852 8.176 4.06508C8.7535 3.84178 9.36784 3.70369 9.99999 3.70369C10.6321 3.70369 11.2465 3.84178 11.824 4.06508C11.9622 4.11853 12.1193 4.10208 12.2361 4.0109C12.8211 3.55431 13.2971 3.06045 13.567 2.55296C13.8085 2.09871 13.3831 1.66675 12.8571 1.66675H7.14284C6.61686 1.66675 6.19143 2.09871 6.433 2.55296Z" />
                        </svg>

                        <div class="text">
                            <span>{{ get_phrase('Payment Report') }}</span>
                        </div>
                    </a>
                    <ul class="first-sub-menu">
                        <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Payment Report') }}</li>

                        @if (has_permission('admin.revenue'))
                            <li class="sidebar-second-li {{ $current_route == 'admin.revenue' ? 'active' : '' }}"><a href="{{ route('admin.revenue') }}">{{ get_phrase('Admin Revenue') }}</a></li>
                        @endif
                        @if (has_permission('admin.instructor.revenue'))
                            <li class="sidebar-second-li {{ $current_route == 'admin.instructor.revenue' ? 'active' : '' }}">
                                <a href="{{ route('admin.instructor.revenue') }}">{{ get_phrase('Instructor Revenue') }}</a>
                            </li>
                        @endif
                        @if (has_permission('admin.purchase.history'))
                            <li class="sidebar-second-li {{ $current_route == 'admin.purchase.history' || $current_route == 'admin.purchase.history.invoice' ? 'active' : '' }}">
                                <a href="{{ route('admin.purchase.history') }}">{{ get_phrase('Payment History') }}</a>
                            </li>
                        @endif
                        @if (has_permission('admin.offline.payments'))
                            <li class="sidebar-second-li {{ $current_route == 'admin.offline.payments' ? 'active' : '' }}">
                                <a href="{{ route('admin.offline.payments') }}">{{ get_phrase('Offline Payment') }}</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            <!-- manege users -->
            @if (has_permission('admin.instructor.index') ||
                    has_permission('admin.instructor.create') ||
                    has_permission('admin.instructor.edit') ||
                    has_permission('admin.instructor.payout') ||
                    has_permission('admin.instructor.payout.filter') ||
                    has_permission('admin.instructor.setting') ||
                    has_permission('admin.instructor.application') ||
                    has_permission('admin.admins.index') ||
                    has_permission('admin.admins.create') ||
                    has_permission('admin.admins.edit') ||
                    has_permission('admin.admins.permission') ||
                    has_permission('admin.student.index') ||
                    has_permission('admin.student.edit') ||
                    has_permission('admin.student.create'))
                <li class="sidebar-first-li first-li-have-sub @if (
                    $current_route == 'admin.instructor.index' ||
                        $current_route == 'admin.instructor.create' ||
                        $current_route == 'admin.instructor.edit' ||
                        $current_route == 'admin.instructor.payout' ||
                        $current_route == 'admin.instructor.payout.filter' ||
                        $current_route == 'admin.instructor.setting' ||
                        $current_route == 'admin.instructor.application' ||
                        $current_route == 'admin.admins.index' ||
                        $current_route == 'admin.admins.create' ||
                        $current_route == 'admin.admins.edit' ||
                        $current_route == 'admin.admins.permission' ||
                        $current_route == 'admin.student.index' ||
                        $current_route == 'admin.student.edit' ||
                        $current_route == 'admin.student.create') active @endif">
                    <a href="javascript:void(0);">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.33333 11.6667H6.66667C4.36548 11.6667 2.5 13.5321 2.5 15.8333V16.6667C2.5 17.1269 2.8731 17.5 3.33333 17.5H11.6667C12.1269 17.5 12.5 17.1269 12.5 16.6667V15.8333C12.5 13.5321 10.6345 11.6667 8.33333 11.6667Z" />
                            <path d="M7.5 9.16667C9.34095 9.16667 10.8333 7.67428 10.8333 5.83333C10.8333 3.99238 9.34095 2.5 7.5 2.5C5.65905 2.5 4.16667 3.99238 4.16667 5.83333C4.16667 7.67428 5.65905 9.16667 7.5 9.16667Z" />
                            <g opacity="0.5">
                                <path
                                    d="M11.5479 9.02869C12.1499 8.11087 12.5001 7.01299 12.5001 5.83333C12.5001 4.65367 12.1499 3.5558 11.5479 2.63798C11.8496 2.54821 12.1692 2.5 12.5 2.5C14.341 2.5 15.8334 3.99238 15.8334 5.83333C15.8334 7.67428 14.341 9.16667 12.5 9.16667C12.1692 9.16667 11.8496 9.11846 11.5479 9.02869Z" />
                                <path d="M14.0617 17.5C14.1303 17.2336 14.1667 16.9544 14.1667 16.6667V15.8333C14.1667 14.2568 13.6195 12.808 12.7046 11.6667H13.3334C15.6346 11.6667 17.5 13.5321 17.5 15.8333V16.6667C17.5 17.1269 17.1269 17.5 16.6667 17.5H14.0617Z" />
                            </g>
                        </svg>

                        <div class="text"><span>{{ get_phrase('Users') }}</span></div>
                    </a>

                    <ul class="first-sub-menu">
                        <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Users') }}</li>
                        @if (has_permission('admin.admins.index'))
                            <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'admin.admins.index' || $current_route == 'admin.admins.create' || $current_route == 'admin.admins.edit' || $current_route == 'admin.admins.permission') active @endif">
                                <a href="javascript:void(0);">{{ get_phrase('Admin') }}</a>
                                <ul class="second-sub-menu">
                                    <li class="sidebar-third-li @if ($current_route == 'admin.admins.index' || $current_route == 'admin.admins.permission' || $current_route == 'admin.admins.edit') active @endif">
                                        <a href="{{ route('admin.admins.index') }}">{{ get_phrase('Manage Admin') }}</a>
                                    </li>
                                    <li class="sidebar-third-li @if ($current_route == 'admin.admins.create') active @endif">
                                        <a href="{{ route('admin.admins.create') }}">{{ get_phrase('Add New Admin') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (has_permission('admin.instructor.index'))
                            <li class="sidebar-second-li second-li-have-sub @if (
                                $current_route == 'admin.instructor.index' ||
                                    $current_route == 'admin.instructor.create' ||
                                    $current_route == 'admin.instructor.edit' ||
                                    $current_route == 'admin.instructor.payout' ||
                                    $current_route == 'admin.instructor.payout.filter' ||
                                    $current_route == 'admin.instructor.setting' ||
                                    $current_route == 'admin.instructor.application') active @endif">
                                <a href="javascript:void(0);">{{ get_phrase('Instructor') }}</a>
                                <ul class="second-sub-menu">
                                    <li class="sidebar-third-li @if ($current_route == 'admin.instructor.index' || $current_route == 'admin.instructor.edit') active @endif">
                                        <a href="{{ route('admin.instructor.index') }}">{{ get_phrase('Manage Instructors') }}</a>
                                    </li>
                                    <li class="sidebar-third-li @if ($current_route == 'admin.instructor.create') active @endif">
                                        <a href="{{ route('admin.instructor.create') }}">{{ get_phrase('Add new Instructor') }}</a>
                                    </li>
                                    <li class="sidebar-third-li @if ($current_route == 'admin.instructor.payout' || $current_route == 'admin.instructor.payout.filter') active @endif">
                                        <a href="{{ route('admin.instructor.payout') }}">{{ get_phrase('Instructor Payout') }}</a>
                                    </li>
                                    <li class="sidebar-third-li @if ($current_route == 'admin.instructor.setting') active @endif">
                                        <a href="{{ route('admin.instructor.setting') }}">{{ get_phrase('Instructor Setting') }}</a>
                                    </li>
                                    <li class="sidebar-third-li @if ($current_route == 'admin.instructor.application') active @endif">
                                        <a href="{{ route('admin.instructor.application') }}">{{ get_phrase('Application') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (has_permission('admin.student.index'))
                            <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'admin.student.index' || $current_route == 'admin.student.edit' || $current_route == 'admin.student.create') active @endif">
                                <a href="javascript:void(0);">{{ get_phrase('Student') }}</a>
                                <ul class="second-sub-menu">
                                    <li class="sidebar-third-li @if ($current_route == 'admin.student.index' || $current_route == 'admin.student.edit') active @endif">
                                        <a href="{{ route('admin.student.index') }}">{{ get_phrase('Manage Students') }}</a>
                                    </li>
                                    <li class="sidebar-third-li @if ($current_route == 'admin.student.create') active @endif">
                                        <a href="{{ route('admin.student.create') }}">{{ get_phrase('Add new Student') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            <!-- messaging -->
            @if (has_permission('admin.message'))
                <li class="sidebar-first-li @if ($current_route == 'admin.message') active @endif">
                    <a href="{{ route('admin.message') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.4386 17.4562C10.5259 17.4562 10.5622 17.3444 10.495 17.2886C9.42887 16.4037 8.74997 15.0684 8.74997 13.5746C8.74997 10.9101 10.91 8.75008 13.5745 8.75008C15.3718 8.75008 16.9396 9.73285 17.7697 11.1903C17.8674 11.3618 18.1348 11.3396 18.1742 11.1462C18.2785 10.6342 18.3333 10.1043 18.3333 9.56149C18.3333 5.20134 14.7987 1.66675 10.4386 1.66675C6.07843 1.66675 2.54383 5.20134 2.54383 9.56149C2.54383 10.6143 2.74991 11.619 3.12393 12.5374C3.295 12.9574 3.33838 13.4245 3.19217 13.8539L2.21275 16.7298C1.98977 17.3846 2.61547 18.0103 3.27024 17.7873L6.1462 16.8079C6.57555 16.6617 7.04264 16.7051 7.4627 16.8761C8.3811 17.2501 9.38577 17.4562 10.4386 17.4562Z" />
                            <path opacity="0.5"
                                d="M10.4167 13.5746C10.4167 15.3187 11.8305 16.7325 13.5746 16.7325C14.0334 16.7325 14.4694 16.6347 14.8628 16.4587C14.9663 16.4124 15.0834 16.4023 15.1907 16.4389L16.6824 16.9469C16.8461 17.0026 17.0025 16.8462 16.9468 16.6825L16.4388 15.1908C16.4022 15.0835 16.4123 14.9664 16.4586 14.8629C16.6346 14.4695 16.7324 14.0335 16.7324 13.5746C16.7324 11.8306 15.3186 10.4167 13.5746 10.4167C11.8305 10.4167 10.4167 11.8306 10.4167 13.5746Z" />
                        </svg>

                        <div class="text"><span>{{ get_phrase('Message') }}</span></div>
                        @if (
                            $unread_msg =
                                App\Models\Message::where('receiver_id', auth()->user()->id)->where('read', '')->count() > 0)
                            <span class="d-inline-block mt-2px ms-auto badge bg-danger">{{ $unread_msg }}</span>
                        @endif
                    </a>
                </li>
            @endif


            <!-- marketing -->
            @if (has_permission('admin.blogs') ||
                    has_permission('admin.blog.create') ||
                    has_permission('admin.blog.edit') ||
                    has_permission('admin.blog.pending') ||
                    has_permission('admin.blog.category') ||
                    has_permission('admin.blog.settings') ||
                    has_permission('admin.newsletter') ||
                    has_permission('admin.subscribed_user') ||
                    has_permission('admin.contacts') ||
                    has_permission('admin.seo.settings'))
                <li class="sidebar-first-li first-li-have-sub @if (
                    $current_route == 'admin.blogs' ||
                        $current_route == 'admin.blog.create' ||
                        $current_route == 'admin.blog.edit' ||
                        $current_route == 'admin.blog.pending' ||
                        $current_route == 'admin.blog.category' ||
                        $current_route == 'admin.blog.settings' ||
                        $current_route == 'admin.newsletter' ||
                        $current_route == 'admin.subscribed_user' ||
                        $current_route == 'admin.contacts' ||
                        $current_route == 'admin.seo.settings') active @endif">
                    <a href="javascript:void(0);">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.33329 18.3333C2.41282 18.3333 1.66663 17.5871 1.66663 16.6667V9.99999C1.66663 9.07952 2.41282 8.33333 3.33329 8.33333H16.6666C17.5871 8.33333 18.3333 9.07952 18.3333 9.99999V16.6667C18.3333 17.5871 17.5871 18.3333 16.6666 18.3333H3.33329ZM5.83329 12.0833C5.83329 11.6231 5.4602 11.25 4.99996 11.25C4.53972 11.25 4.16663 11.6231 4.16663 12.0833V14.5833C4.16663 15.0436 4.53972 15.4167 4.99996 15.4167C5.4602 15.4167 5.83329 15.0436 5.83329 14.5833V12.0833ZM15.8333 12.0833C15.8333 11.6231 15.4602 11.25 15 11.25C14.5397 11.25 14.1666 11.6231 14.1666 12.0833V14.5833C14.1666 15.0436 14.5397 15.4167 15 15.4167C15.4602 15.4167 15.8333 15.0436 15.8333 14.5833V12.0833ZM9.99996 15C10.9204 15 11.6666 14.2538 11.6666 13.3333C11.6666 12.4129 10.9204 11.6667 9.99996 11.6667C9.07948 11.6667 8.33329 12.4129 8.33329 13.3333C8.33329 14.2538 9.07948 15 9.99996 15Z" />
                            <path opacity="0.5"
                                d="M12.0834 1.66667C11.6231 1.66667 11.25 2.03977 11.25 2.50001C11.25 2.96024 11.6231 3.33334 12.0834 3.33334H12.5715L10.4167 5.48816L9.09522 4.16667C8.44435 3.5158 7.38907 3.5158 6.7382 4.16667L4.82745 6.07742C4.50201 6.40285 4.50201 6.93049 4.82745 7.25593C5.15289 7.58136 5.68053 7.58136 6.00596 7.25593L7.91671 5.34518L9.2382 6.66667C9.88907 7.31754 10.9443 7.31755 11.5952 6.66667L13.75 4.51185V5.00001C13.75 5.46024 14.1231 5.83334 14.5834 5.83334C15.0436 5.83334 15.4167 5.46024 15.4167 5.00001V2.50001C15.4167 2.03977 15.0436 1.66667 14.5834 1.66667H12.0834Z" />
                        </svg>

                        <div class="text"><span>{{ get_phrase('Marketing') }}</span></div>
                    </a>

                    <ul class="first-sub-menu">
                        <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Marketing') }}</li>

                        <!-- contacts -->
                        <li class="sidebar-second-li {{ $current_route == 'admin.contacts' ? 'active' : '' }}">
                            <a href="{{ route('admin.contacts') }}">{{ get_phrase('Contacts') }}</a>
                        </li>

                        <!-- manage seo -->
                        <li class="sidebar-second-li {{ $current_route == 'admin.seo.settings' ? 'active' : '' }}">
                            <a href="{{ route('admin.seo.settings') }}">{{ get_phrase('Manage SEO') }}</a>
                        </li>

                        <!-- manage blogs -->
                        <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'admin.blogs' || $current_route == 'admin.blog.create' || $current_route == 'admin.blog.edit' || $current_route == 'admin.blog.pending' || $current_route == 'admin.blog.category' || $current_route == 'admin.blog.settings') active @endif">
                            <a href="javascript:void(0);">{{ get_phrase('Manage Blogs') }}</a>
                            <ul class="second-sub-menu">
                                <li class="sidebar-third-li {{ $current_route == 'admin.blog.category' ? 'active' : '' }}">
                                    <a href="{{ route('admin.blog.category') }}">{{ get_phrase('Category') }}</a>
                                </li>
                                <li class="sidebar-third-li {{ $current_route == 'admin.blogs' ? 'active' : '' }}">
                                    <a href="{{ route('admin.blogs') }}">{{ get_phrase('All Blogs') }}</a>
                                </li>
                                <li class="sidebar-third-li {{ $current_route == 'admin.blog.create' ? 'active' : '' }}">
                                    <a href="{{ route('admin.blog.create') }}">{{ get_phrase('Add New') }}</a>
                                </li>
                                <li class="sidebar-third-li {{ $current_route == 'admin.blog.pending' ? 'active' : '' }}">
                                    <a href="{{ route('admin.blog.pending') }}">{{ get_phrase('Pending') }}</a>
                                </li>
                                <li class="sidebar-third-li {{ $current_route == 'admin.blog.settings' ? 'active' : '' }}">
                                    <a href="{{ route('admin.blog.settings') }}">{{ get_phrase('Settings') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- manage newsletter -->
                        <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'admin.newsletter' || $current_route == 'admin.subscribed_user') active @endif">
                            <a href="javascript:void(0);">{{ get_phrase('Manage Newsletters') }}</a>
                            <ul class="second-sub-menu">
                                <li class="sidebar-third-li {{ $current_route == 'admin.newsletter' ? 'active' : '' }}">
                                    <a href="{{ route('admin.newsletter') }}">{{ get_phrase('All Newsletters') }}</a>
                                </li>
                                <li class="sidebar-third-li {{ $current_route == 'admin.subscribed_user' ? 'active' : '' }}">
                                    <a href="{{ route('admin.subscribed_user') }}">{{ get_phrase('Subscribed User') }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>



    @if (has_permission('admin.system.settings') ||
            has_permission('admin.website.settings') ||
            has_permission('admin.payment.settings') ||
            has_permission('admin.manage.language') ||
            has_permission('admin.notification.settings') ||
            has_permission('admin.live.class.settings') ||
            has_permission('admin.certificate.settings') ||
            has_permission('admin.open.ai.settings') ||
            has_permission('admin.pages') ||
            has_permission('admin.player.settings') ||
            has_permission('admin.about'))
        <nav class="sidebar-nav">
            <h3 class="sidebar-title fs-12px px-30px pb-3 text-uppercase">{{ get_phrase('Settings') }}</h3>
            <ul class="px-14px pb-24px pb-5 mb-5">
                <li class="sidebar-first-li first-li-have-sub @if (
                    $current_route == 'admin.system.settings' ||
                        $current_route == 'admin.website.settings' ||
                        $current_route == 'admin.language.phrase.edit' ||
                        $current_route == 'admin.payment.settings' ||
                        $current_route == 'admin.manage.language' ||
                        $current_route == 'admin.notification.settings' ||
                        $current_route == 'admin.live.class.settings' ||
                        $current_route == 'admin.live.class.settings' ||
                        $current_route == 'admin.certificate.settings' ||
                        $current_route == 'admin.open.ai.settings' ||
                        $current_route == 'admin.pages' ||
                        $current_route == 'admin.player.settings' ||
                        $current_route == 'admin.about') active @endif">
                    <a href="javascript:void(0);">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.9273 1.66669H9.07277C8.6644 1.66669 8.33335 1.99774 8.33335 2.4061C8.33335 3.72361 6.74044 4.38341 5.80882 3.4518C5.52006 3.16304 5.05189 3.16304 4.76313 3.4518L3.4518 4.76313C3.16304 5.05189 3.16304 5.52006 3.4518 5.80882C4.38341 6.74044 3.72361 8.33335 2.4061 8.33335C1.99774 8.33335 1.66669 8.6644 1.66669 9.07277V10.9273C1.66669 11.3356 1.99774 11.6667 2.40611 11.6667C3.72361 11.6667 4.38342 13.2596 3.4518 14.1912C3.16304 14.48 3.16304 14.9482 3.4518 15.2369L4.10746 15.8926L8.23225 11.7678C7.77984 11.3154 7.50002 10.6904 7.50002 10C7.50002 8.61931 8.61931 7.50002 10 7.50002C10.6904 7.50002 11.3154 7.77984 11.7678 8.23226L15.8926 4.10747L15.2369 3.45181C14.9482 3.16304 14.48 3.16304 14.1912 3.45181C13.2596 4.38342 11.6667 3.72361 11.6667 2.40611C11.6667 1.99774 11.3356 1.66669 10.9273 1.66669Z" />
                            <path opacity="0.5"
                                d="M16.548 5.80884C16.8368 5.52008 16.8368 5.05191 16.548 4.76315L15.8924 4.10748L11.7676 8.23228C12.22 8.68469 12.4998 9.30968 12.4998 10C12.4998 11.3807 11.3805 12.5 9.9998 12.5C9.30944 12.5 8.68444 12.2202 8.23203 11.7678L4.10724 15.8926L4.76291 16.5483C5.05167 16.837 5.51984 16.837 5.8086 16.5483C6.74021 15.6166 8.33313 16.2765 8.33313 17.594C8.33313 18.0023 8.66418 18.3334 9.07255 18.3334H10.927C11.3354 18.3334 11.6665 18.0023 11.6665 17.594C11.6665 16.2765 13.2594 15.6166 14.191 16.5483C14.4798 16.837 14.9479 16.837 15.2367 16.5483L16.548 15.2369C16.8368 14.9482 16.8368 14.48 16.548 14.1912C15.6164 13.2596 16.2762 11.6667 17.5937 11.6667C18.0021 11.6667 18.3331 11.3357 18.3331 10.9273V9.07279C18.3331 8.66442 18.0021 8.33337 17.5937 8.33337C16.2762 8.33337 15.6164 6.74046 16.548 5.80884Z" />
                        </svg>

                        <div class="text">
                            <span>{{ get_phrase('System Settings') }}</span>
                        </div>
                    </a>
                    <ul class="first-sub-menu">
                        <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('System Settings') }}</li>
                        <li class="sidebar-second-li {{ $current_route == 'admin.system.settings' ? 'active' : '' }}">
                            <a href="{{ route('admin.system.settings') }}">{{ get_phrase('System Settings') }}</a>
                        </li>
                        <li class="sidebar-second-li {{ $current_route == 'admin.website.settings' ? 'active' : '' }}">
                            <a href="{{ route('admin.website.settings') }}">{{ get_phrase('Website Settings') }}</a>
                        </li>
                        <li class="sidebar-second-li {{ $current_route == 'admin.payment.settings' ? 'active' : '' }}">
                            <a href="{{ route('admin.payment.settings') }}">{{ get_phrase('Payment Settings') }}</a>
                        </li>

                        <li class="sidebar-second-li {{ $current_route == 'admin.manage.language' || $current_route == 'admin.language.phrase.edit' ? 'active' : '' }}">
                            <a href="{{ route('admin.manage.language') }}">{{ get_phrase('Manage Language') }}</a>
                        </li>

                        <li class="sidebar-second-li {{ $current_route == 'admin.live.class.settings' ? 'active' : '' }}">
                            <a href="{{ route('admin.live.class.settings') }}">{{ get_phrase('Live Class Settings') }}</a>
                        </li>
                        <li class="sidebar-second-li {{ $current_route == 'admin.notification.settings' ? 'active' : '' }}">
                            <a href="{{ route('admin.notification.settings') }}">{{ get_phrase('SMTP Settings') }}</a>
                        </li>

                        <li class="sidebar-second-li {{ $current_route == 'admin.certificate.settings' ? 'active' : '' }}">
                            <a href="{{ route('admin.certificate.settings') }}">{{ get_phrase('Certificate Settings') }}</a>
                        </li>

                        <li class="sidebar-second-li {{ $current_route == 'admin.player.settings' ? 'active' : '' }}">
                            <a href="{{ route('admin.player.settings') }}">{{ get_phrase('Player Settings') }}</a>
                        </li>

                        <li class="sidebar-second-li {{ $current_route == 'admin.open.ai.settings' ? 'active' : '' }}">
                            <a href="{{ route('admin.open.ai.settings') }}">{{ get_phrase('Open AI Settings') }}</a>
                        </li>

                        {{-- <li class="sidebar-second-li {{ $current_route == 'admin.pages' ? 'active' : '' }}"><a href="{{ route('admin.pages') }}">{{ get_phrase('Home Page Builder') }}</a></li> --}}
                        {{-- <li class="sidebar-second-li {{ $current_route == 'admin.about' ? 'active' : '' }}"><a href="{{ route('admin.about') }}">{{ get_phrase('About') }}</a></li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
    @endif
</div>
