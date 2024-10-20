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
<h3 class="sidebar-title fs-12px px-30px pb-20px mt-4 text-uppercase">{{ get_phrase('Main Menu') }}</h3>
<div class="sidebar-nav-area">
    <nav class="sidebar-nav">
        <ul class="px-14px pb-24px">

            <!-- dashboard -->
            <li class="sidebar-first-li @if ($current_route == 'instructor.dashboard') active @endif">
                <a href="{{ route('instructor.dashboard') }}">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.2634 8.45738L11.5739 3.11572C10.6995 2.29476 9.30026 2.29476 8.42586 3.11572L2.7366 8.45742C2.43465 8.74097 2.41972 9.2156 2.70327 9.51756C2.74915 9.56642 2.80004 9.60776 2.85438 9.64154C3.04976 9.76298 3.2498 9.94059 3.2498 10.1706V14.6375C3.2498 16.2623 4.63822 17.5 6.24984 17.5C6.47996 17.5 6.66667 17.3135 6.66667 17.0833V13.3333C6.66667 11.9526 7.78595 10.8333 9.16667 10.8333H10.8333C12.214 10.8333 13.3333 11.9526 13.3333 13.3333V17.0834C13.3333 17.3135 13.5199 17.5 13.7499 17.5C15.3616 17.5 16.75 16.2623 16.75 14.6375V10.1707C16.75 9.94066 16.9501 9.76303 17.1455 9.64159C17.1999 9.60779 17.2509 9.56642 17.2968 9.51752C17.5803 9.21554 17.5653 8.7409 17.2634 8.45738Z" />
                        <path opacity="0.5" d="M11.25 17.5C11.4801 17.5 11.6667 17.3135 11.6667 17.0833V13.3333C11.6667 12.8731 11.2936 12.5 10.8333 12.5H9.16668C8.70644 12.5 8.33334 12.8731 8.33334 13.3333V17.0833C8.33334 17.3135 8.51989 17.5 8.75001 17.5H11.25Z" />
                    </svg>

                    <div class="text">
                        <span>{{ get_phrase('Dashboard') }}</span>
                    </div>
                </a>
            </li>


            <!-- manage courses -->
            <li class="sidebar-first-li first-li-have-sub @if (
                $current_route == 'instructor.courses' ||
                    $current_route == 'instructor.course.create' ||
                    $current_route == 'instructor.course.edit' ||
                    $current_route == 'instructor.bootcamps' ||
                    $current_route == 'instructor.bootcamp.create' ||
                    $current_route == 'instructor.bootcamp.edit' ||
                    $current_route == 'instructor.bootcamp.purchase.history' ||
                    $current_route == 'instructor.bootcamp.purchase.invoice') active showMenu @endif">
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
                    <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'instructor.courses' || $current_route == 'instructor.course.create' || $current_route == 'instructor.course.edit' || $current_route == 'instructor.coupons') active @endif">
                        <a href="javascript:void(0);">{{ get_phrase('Recorded Courses') }}</a>
                        <ul class="second-sub-menu">
                            <li class="sidebar-third-li @if ($current_route == 'instructor.courses' || $current_route == 'instructor.course.edit') active @endif">
                                <a href="{{ route('instructor.courses') }}">{{ get_phrase('All Courses') }}</a>
                            </li>

                            <li class="sidebar-third-li @if ($current_route == 'instructor.course.create') active @endif">
                                <a href="{{ route('instructor.course.create') }}">{{ get_phrase('Add Course') }}</a>
                            </li>
                        </ul>
                    </li>


                    <!-- live class menus -->
                    <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'instructor.bootcamps' || $current_route == 'instructor.bootcamp.create' || $current_route == 'instructor.bootcamp.edit' || $current_route == 'instructor.bootcamp.purchase.history' || $current_route == 'instructor.bootcamp.purchase.invoice') active @endif">
                        <a href="javascript:void(0);">{{ get_phrase('Live Courses') }}</a>
                        <ul class="second-sub-menu">
                            <li class="sidebar-third-li @if ($current_route == 'instructor.bootcamps' || $current_route == 'instructor.bootcamp.edit') active @endif">
                                <a href="{{ route('instructor.bootcamps') }}">{{ get_phrase('All Live Courses') }}</a>
                            </li>

                            <li class="sidebar-third-li @if ($current_route == 'instructor.bootcamp.create') active @endif">
                                <a href="{{ route('instructor.bootcamp.create') }}">{{ get_phrase('Add Live Course') }}</a>
                            </li>

                            <li class="sidebar-third-li @if ($current_route == 'instructor.bootcamp.purchase.history' || $current_route == 'instructor.bootcamp.purchase.invoice') active @endif">
                                <a href="{{ route('instructor.bootcamp.purchase.history') }}">{{ get_phrase('Purchase History') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>


            <!-- manage private group -->
            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'instructor.team.packages' || $current_route == 'instructor.team.packages.create' || $current_route == 'instructor.team.packages.edit' || $current_route == 'instructor.team.packages.purchase.history' || $current_route == 'instructor.team.packages.purchase.invoice') active showMenu @endif">
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
                    <li class="sidebar-second-li @if ($current_route == 'instructor.team.packages' || $current_route == 'instructor.team.packages.edit') active @endif">
                        <a href="{{ route('instructor.team.packages') }}">{{ get_phrase('All Packages') }}</a>
                    </li>

                    <li class="sidebar-second-li @if ($current_route == 'instructor.team.packages.create') active @endif">
                        <a href="{{ route('instructor.team.packages.create') }}">{{ get_phrase('Add New') }}</a>
                    </li>

                    <li class="sidebar-second-li {{ $current_route == 'instructor.team.packages.purchase.history' || $current_route == 'instructor.team.packages.purchase.invoice' ? 'active' : '' }}">
                        <a href="{{ route('instructor.team.packages.purchase.history') }}">{{ get_phrase('Purchase History') }}</a>
                    </li>
                </ul>
            </li>


            <!-- sales report -->
            <li class="sidebar-first-li @if ($current_route == 'instructor.sales.report') active @endif">
                <a href="{{ route('instructor.sales.report') }}">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.33329 18.3333C2.41282 18.3333 1.66663 17.5871 1.66663 16.6667V9.99999C1.66663 9.07952 2.41282 8.33333 3.33329 8.33333H16.6666C17.5871 8.33333 18.3333 9.07952 18.3333 9.99999V16.6667C18.3333 17.5871 17.5871 18.3333 16.6666 18.3333H3.33329ZM5.83329 12.0833C5.83329 11.6231 5.4602 11.25 4.99996 11.25C4.53972 11.25 4.16663 11.6231 4.16663 12.0833V14.5833C4.16663 15.0436 4.53972 15.4167 4.99996 15.4167C5.4602 15.4167 5.83329 15.0436 5.83329 14.5833V12.0833ZM15.8333 12.0833C15.8333 11.6231 15.4602 11.25 15 11.25C14.5397 11.25 14.1666 11.6231 14.1666 12.0833V14.5833C14.1666 15.0436 14.5397 15.4167 15 15.4167C15.4602 15.4167 15.8333 15.0436 15.8333 14.5833V12.0833ZM9.99996 15C10.9204 15 11.6666 14.2538 11.6666 13.3333C11.6666 12.4129 10.9204 11.6667 9.99996 11.6667C9.07948 11.6667 8.33329 12.4129 8.33329 13.3333C8.33329 14.2538 9.07948 15 9.99996 15Z" />
                        <path opacity="0.5"
                            d="M12.0834 1.66667C11.6231 1.66667 11.25 2.03977 11.25 2.50001C11.25 2.96024 11.6231 3.33334 12.0834 3.33334H12.5715L10.4167 5.48816L9.09522 4.16667C8.44435 3.5158 7.38907 3.5158 6.7382 4.16667L4.82745 6.07742C4.50201 6.40285 4.50201 6.93049 4.82745 7.25593C5.15289 7.58136 5.68053 7.58136 6.00596 7.25593L7.91671 5.34518L9.2382 6.66667C9.88907 7.31754 10.9443 7.31755 11.5952 6.66667L13.75 4.51185V5.00001C13.75 5.46024 14.1231 5.83334 14.5834 5.83334C15.0436 5.83334 15.4167 5.46024 15.4167 5.00001V2.50001C15.4167 2.03977 15.0436 1.66667 14.5834 1.66667H12.0834Z" />
                    </svg>

                    <div class="text">
                        <span>{{ get_phrase('Sales Report') }}</span>
                    </div>
                </a>
            </li>


            <!-- instructor payout -->
            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'instructor.payout.reports' || $current_route == 'instructor.payout.setting') active showMenu @endif">
                <a href="javascript:void(0);">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.33334 13.7037C3.33334 9.99999 7.14287 5.37036 10 5.37036C12.8572 5.37036 16.6667 9.99999 16.6667 13.7037C16.6667 16.4815 14.7619 18.3333 10 18.3333C5.23811 18.3333 3.33334 16.4815 3.33334 13.7037ZM10 7.70841C10.3452 7.70841 10.625 7.98824 10.625 8.33341V8.80353C11.0061 8.8944 11.3398 9.06553 11.6069 9.28666C11.9984 9.61074 12.2917 10.0858 12.2917 10.6061C12.2917 10.9513 12.0119 11.2311 11.6667 11.2311C11.3215 11.2311 11.0417 10.9513 11.0417 10.6061C11.0417 10.5583 11.0017 10.4084 10.8098 10.2495C10.6313 10.1017 10.3559 9.98114 10 9.98114C9.26534 9.98114 8.95834 10.4579 8.95834 10.7198C8.95834 11.0824 9.0668 11.2121 9.16036 11.2804C9.29342 11.3776 9.54988 11.4584 10 11.4584C10.5499 11.4584 11.1268 11.5481 11.577 11.877C12.0668 12.2348 12.2917 12.787 12.2917 13.4471C12.2917 14.3602 11.5867 15.1257 10.625 15.3611V15.8334C10.625 16.1786 10.3452 16.4584 10 16.4584C9.65483 16.4584 9.37501 16.1786 9.37501 15.8334V15.3601C8.4302 15.1226 7.81945 14.3602 7.81945 13.5607C7.81945 13.2155 8.09928 12.9357 8.44445 12.9357C8.78963 12.9357 9.06945 13.2155 9.06945 13.5607C9.06945 13.7326 9.29182 14.1857 10 14.1857C10.7347 14.1857 11.0417 13.7089 11.0417 13.4471C11.0417 13.0844 10.9332 12.9547 10.8397 12.8864C10.7066 12.7892 10.4501 12.7084 10 12.7084C9.45014 12.7084 8.87327 12.6187 8.423 12.2898C7.93322 11.932 7.70834 11.3799 7.70834 10.7198C7.70834 9.80666 8.4133 9.04115 9.37501 8.80577V8.33341C9.37501 7.98824 9.65483 7.70841 10 7.70841Z" />
                        <path
                            d="M6.433 2.55296C6.70287 3.06045 7.17892 3.55431 7.76384 4.0109C7.88066 4.10208 8.03778 4.11852 8.176 4.06508C8.7535 3.84178 9.36784 3.70369 9.99999 3.70369C10.6321 3.70369 11.2465 3.84178 11.824 4.06508C11.9622 4.11853 12.1193 4.10208 12.2361 4.0109C12.8211 3.55431 13.2971 3.06045 13.567 2.55296C13.8085 2.09871 13.3831 1.66675 12.8571 1.66675H7.14284C6.61686 1.66675 6.19143 2.09871 6.433 2.55296Z" />
                    </svg>

                    <div class="text">
                        <span>{{ get_phrase('Payout') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Payout') }}</li>
                    <li class="sidebar-second-li @if ($current_route == 'instructor.payout.reports' || $current_route == 'instructor.course.edit') active @endif">
                        <a href="{{ route('instructor.payout.reports') }}">{{ get_phrase('Withdraw') }}</a>
                    </li>
                    <li class="sidebar-second-li @if ($current_route == 'instructor.payout.setting') active @endif">
                        <a href="{{ route('instructor.payout.setting') }}">{{ get_phrase('Settings') }}</a>
                    </li>
                </ul>
            </li>


            @if (get_frontend_settings('instructors_blog_permission'))
                <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'instructor.blogs' || $current_route == 'instructor.blog.create' || $current_route == 'instructor.blog.edit' || $current_route == 'instructor.blog.pending') active @endif">
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

                        <!-- manage blogs -->
                        <li class="sidebar-second-li second-li-have-sub @if ($current_route == 'instructor.blogs' || $current_route == 'instructor.blog.create' || $current_route == 'instructor.blog.edit' || $current_route == 'instructor.blog.pending' || $current_route == 'instructor.blog.category' || $current_route == 'instructor.blog.settings') active @endif">
                            <a href="javascript:void(0);">{{ get_phrase('Manage Blogs') }}</a>
                            <ul class="second-sub-menu">
                                <li class="sidebar-third-li {{ $current_route == 'instructor.blogs' ? 'active' : '' }}">
                                    <a href="{{ route('instructor.blogs') }}">{{ get_phrase('All Blogs') }}</a>
                                </li>
                                <li class="sidebar-third-li {{ $current_route == 'instructor.blog.create' ? 'active' : '' }}">
                                    <a href="{{ route('instructor.blog.create') }}">{{ get_phrase('Add New') }}</a>
                                </li>
                                <li class="sidebar-third-li {{ $current_route == 'instructor.blog.pending' ? 'active' : '' }}">
                                    <a href="{{ route('instructor.blog.pending') }}">{{ get_phrase('Pending') }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="sidebar-first-li {{ $current_route == 'instructor.manage.profile' ? 'active' : '' }}">
                <a href="{{ route('instructor.manage.profile') }}">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4"
                            d="M17.5 7.29167C17.155 7.29167 16.875 7.01167 16.875 6.66667V3.75C16.875 3.25917 16.7408 3.125 16.25 3.125H13.3333C12.9883 3.125 12.7083 2.845 12.7083 2.5C12.7083 2.155 12.9883 1.875 13.3333 1.875H16.25C17.4242 1.875 18.125 2.57583 18.125 3.75V6.66667C18.125 7.01167 17.845 7.29167 17.5 7.29167ZM3.125 6.66667V3.75C3.125 3.25917 3.25917 3.125 3.75 3.125H6.66667C7.01167 3.125 7.29167 2.845 7.29167 2.5C7.29167 2.155 7.01167 1.875 6.66667 1.875H3.75C2.57583 1.875 1.875 2.57583 1.875 3.75V6.66667C1.875 7.01167 2.155 7.29167 2.5 7.29167C2.845 7.29167 3.125 7.01167 3.125 6.66667ZM7.29167 17.5C7.29167 17.155 7.01167 16.875 6.66667 16.875H3.75C3.25917 16.875 3.125 16.7408 3.125 16.25V13.3333C3.125 12.9883 2.845 12.7083 2.5 12.7083C2.155 12.7083 1.875 12.9883 1.875 13.3333V16.25C1.875 17.4242 2.57583 18.125 3.75 18.125H6.66667C7.01167 18.125 7.29167 17.845 7.29167 17.5ZM18.125 16.25V13.3333C18.125 12.9883 17.845 12.7083 17.5 12.7083C17.155 12.7083 16.875 12.9883 16.875 13.3333V16.25C16.875 16.7408 16.7408 16.875 16.25 16.875H13.3333C12.9883 16.875 12.7083 17.155 12.7083 17.5C12.7083 17.845 12.9883 18.125 13.3333 18.125H16.25C17.4242 18.125 18.125 17.4242 18.125 16.25Z" />
                        <path d="M10.005 9.30582C11.3067 9.30582 12.3667 8.24664 12.3667 6.94498C12.3667 5.64331 11.3075 4.58414 10.005 4.58414C8.7025 4.58414 7.64417 5.64331 7.64417 6.94498C7.64417 8.24664 8.7025 9.30582 10.005 9.30582Z" />
                        <path d="M11.1108 10.5558C10.4867 10.5558 10.0217 10.5558 8.88835 10.5558C6.66585 10.5558 6.11084 12.2225 6.11084 13.3433C6.11084 14.4441 6.66663 15 7.77913 15H12.2209C13.3334 15 13.8892 14.4441 13.8892 13.3433C13.8892 12.2383 13.3333 10.5558 11.1108 10.5558Z" />
                    </svg>

                    <div class="text">
                        <span>{{ get_phrase('Manage Profile') }}</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>
