    @php
        $parent_categories = DB::table('categories')->where('parent_id', 0)->latest('id')->get();
        $current_route = Route::currentRouteName();
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-wrap gap-12px d-flex align-items-center justify-content-between">
                    <div class="logo-area">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/frontend/default/images/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- Off Canvas Start -->
                        <div class="offcanvas-lg offcanvas-end edu-offcanvas" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                            <div class="offcanvas-header">
                                <div class="offcanvas-logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('assets/frontend/default/images/logo.svg') }}" alt="logo">
                                    </a>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="nav-wrap-main">
                                    <!-- Menu -->
                                    <div class="nav-area">
                                        <nav>
                                            <ul class="d-flex align-items-center accordion-menu">

                                                <!-- Home menu -->
                                                <li>
                                                    <a href="{{ route('home') }}" class="@if ($current_route == 'home') active @endif">
                                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="home_FILL0_wght300_GRAD0_opsz24 1">
                                                                <path id="Vector"
                                                                    d="M5.99997 19.5631H9.34615V14.5246C9.34615 14.2686 9.43277 14.0539 9.606 13.8807C9.77923 13.7074 9.9939 13.6208 10.25 13.6208H13.75C14.0061 13.6208 14.2207 13.7074 14.3939 13.8807C14.5672 14.0539 14.6538 14.2686 14.6538 14.5246V19.5631H18V10.717C18 10.6657 17.9888 10.6192 17.9663 10.5775C17.9439 10.5359 17.9134 10.499 17.875 10.467L12.1827 6.18812C12.1314 6.14326 12.0705 6.12082 12 6.12082C11.9295 6.12082 11.8686 6.14326 11.8173 6.18812L6.12497 10.467C6.08652 10.499 6.05607 10.5359 6.03362 10.5775C6.01119 10.6192 5.99997 10.6657 5.99997 10.717V19.5631ZM4.5 19.5631V10.717C4.5 10.4308 4.56402 10.1596 4.69207 9.90352C4.82012 9.64744 4.99712 9.43655 5.22307 9.27085L10.9154 4.9824C11.2313 4.74137 11.5923 4.62085 11.9984 4.62085C12.4046 4.62085 12.7666 4.74137 13.0846 4.9824L18.7769 9.27085C19.0028 9.43655 19.1798 9.64744 19.3079 9.90352C19.4359 10.1596 19.5 10.4308 19.5 10.717V19.5631C19.5 19.9721 19.3522 20.3243 19.0567 20.6198C18.7612 20.9153 18.4089 21.0631 18 21.0631H14.0577C13.8016 21.0631 13.5869 20.9765 13.4137 20.8032C13.2404 20.63 13.1538 20.4153 13.1538 20.1593V15.1208H10.8461V20.1593C10.8461 20.4153 10.7595 20.63 10.5863 20.8032C10.413 20.9765 10.1984 21.0631 9.94227 21.0631H5.99997C5.59101 21.0631 5.23877 20.9153 4.94327 20.6198C4.64776 20.3243 4.5 19.9721 4.5 19.5631Z"
                                                                    fill="#7E8494" />
                                                            </g>
                                                        </svg>
                                                        <span>{{ get_phrase('Home') }}</span>
                                                    </a>
                                                </li>


                                                <!-- Courses menu -->
                                                <li class="menu-item-has-children">
                                                    <a href="javascript:void(0);">
                                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="menu_book_FILL0_wght300_GRAD0_opsz24 (2) 1">
                                                                <path id="Vector"
                                                                    d="M6.49995 16.5821C7.32817 16.5821 8.13394 16.676 8.91727 16.8639C9.70061 17.0517 10.4782 17.3462 11.25 17.7475V7.91675C10.5474 7.45907 9.78715 7.1158 8.9692 6.88695C8.15125 6.6581 7.32817 6.54368 6.49995 6.54368C5.89995 6.54368 5.33938 6.59078 4.81823 6.685C4.29708 6.77923 3.7615 6.9334 3.2115 7.1475C3.13457 7.17315 3.08007 7.21002 3.04803 7.2581C3.01597 7.30618 2.99995 7.35907 2.99995 7.41675V16.8744C2.99995 16.9642 3.032 17.0299 3.0961 17.0716C3.16022 17.1132 3.23074 17.118 3.30768 17.086C3.78203 16.9244 4.28266 16.8001 4.80957 16.7129C5.33649 16.6257 5.89995 16.5821 6.49995 16.5821ZM12.7499 17.7475C13.5217 17.3462 14.2993 17.0517 15.0826 16.8639C15.866 16.676 16.6717 16.5821 17.4999 16.5821C18.1 16.5821 18.6634 16.6257 19.1903 16.7129C19.7172 16.8001 20.2179 16.9244 20.6922 17.086C20.7692 17.118 20.8397 17.1132 20.9038 17.0716C20.9679 17.0299 21 16.9642 21 16.8744V7.41675C21 7.35907 20.9839 7.30778 20.9519 7.2629C20.9198 7.21802 20.8653 7.17955 20.7884 7.1475C20.2384 6.9334 19.7028 6.77923 19.1817 6.685C18.6605 6.59078 18.1 6.54368 17.4999 6.54368C16.6717 6.54368 15.8486 6.6581 15.0307 6.88695C14.2127 7.1158 13.4525 7.45907 12.7499 7.91675V17.7475ZM11.9999 19.5283C11.8051 19.5283 11.6227 19.5039 11.4529 19.4552C11.283 19.4065 11.1224 19.3417 10.9711 19.261C10.2827 18.8712 9.56246 18.5773 8.81053 18.3792C8.05861 18.1811 7.28842 18.0821 6.49995 18.0821C5.8897 18.0821 5.29035 18.1497 4.7019 18.285C4.11343 18.4202 3.54613 18.6193 2.99998 18.8821C2.64358 19.0462 2.30448 19.0202 1.98267 18.8042C1.66089 18.5882 1.5 18.2821 1.5 17.8859V7.0283C1.5 6.81292 1.55544 6.61068 1.66633 6.42158C1.77722 6.23248 1.93717 6.09626 2.14615 6.01293C2.82307 5.68344 3.52851 5.43953 4.26248 5.2812C4.99644 5.12287 5.74227 5.0437 6.49995 5.0437C7.47303 5.0437 8.42368 5.17672 9.35188 5.44275C10.2801 5.70877 11.1628 6.10139 11.9999 6.62063C12.8371 6.10139 13.7198 5.70877 14.648 5.44275C15.5762 5.17672 16.5269 5.0437 17.4999 5.0437C18.2576 5.0437 19.0035 5.12287 19.7374 5.2812C20.4714 5.43953 21.1768 5.68344 21.8538 6.01293C22.0627 6.09626 22.2227 6.23248 22.3336 6.42158C22.4445 6.61068 22.4999 6.81292 22.4999 7.0283V17.8859C22.4999 18.2821 22.3326 18.585 21.998 18.7946C21.6634 19.0042 21.3115 19.027 20.9422 18.8629C20.4025 18.6065 19.8432 18.4122 19.2643 18.2802C18.6855 18.1481 18.0974 18.0821 17.4999 18.0821C16.7115 18.0821 15.9413 18.1811 15.1894 18.3792C14.4374 18.5773 13.7172 18.8712 13.0288 19.261C12.8775 19.3417 12.7169 19.4065 12.5471 19.4552C12.3772 19.5039 12.1948 19.5283 11.9999 19.5283ZM13.9423 9.42445C13.9423 9.31292 13.982 9.19882 14.0615 9.08215C14.141 8.96549 14.2313 8.88536 14.3326 8.84178C14.8288 8.64304 15.3394 8.4924 15.8644 8.38985C16.3894 8.28728 16.9346 8.236 17.4999 8.236C17.8269 8.236 18.1432 8.25523 18.449 8.29368C18.7547 8.33214 19.0628 8.38471 19.373 8.45138C19.491 8.47829 19.5929 8.54239 19.6788 8.64368C19.7647 8.74496 19.8076 8.86291 19.8076 8.99753C19.8076 9.22316 19.7368 9.38822 19.5951 9.4927C19.4535 9.59719 19.2698 9.6225 19.0442 9.56865C18.8044 9.51865 18.5554 9.48276 18.2971 9.46098C18.0387 9.43918 17.773 9.42828 17.4999 9.42828C17.0153 9.42828 16.5407 9.47475 16.0759 9.5677C15.6112 9.66065 15.1679 9.78661 14.7461 9.94558C14.5102 10.0366 14.3173 10.0315 14.1673 9.9302C14.0173 9.82892 13.9423 9.66033 13.9423 9.42445ZM13.9423 14.886C13.9423 14.7744 13.982 14.6587 14.0615 14.5389C14.141 14.419 14.2313 14.3373 14.3326 14.2937C14.816 14.095 15.3265 13.9459 15.8644 13.8466C16.4022 13.7472 16.9474 13.6975 17.4999 13.6975C17.8269 13.6975 18.1432 13.7168 18.449 13.7552C18.7547 13.7937 19.0628 13.8462 19.373 13.9129C19.491 13.9398 19.5929 14.0039 19.6788 14.1052C19.7647 14.2065 19.8076 14.3244 19.8076 14.4591C19.8076 14.6847 19.7368 14.8497 19.5951 14.9542C19.4535 15.0587 19.2698 15.084 19.0442 15.0302C18.8044 14.9802 18.5554 14.9443 18.2971 14.9225C18.0387 14.9007 17.773 14.8898 17.4999 14.8898C17.0217 14.8898 16.5519 14.9353 16.0903 15.0264C15.6288 15.1174 15.1871 15.2456 14.7653 15.411C14.5294 15.5084 14.3333 15.5058 14.1769 15.4033C14.0205 15.3007 13.9423 15.1283 13.9423 14.886ZM13.9423 12.1648C13.9423 12.0533 13.982 11.9392 14.0615 11.8225C14.141 11.7059 14.2313 11.6257 14.3326 11.5822C14.8288 11.3834 15.3394 11.2328 15.8644 11.1302C16.3894 11.0277 16.9346 10.9764 17.4999 10.9764C17.8269 10.9764 18.1432 10.9956 18.449 11.0341C18.7547 11.0725 19.0628 11.1251 19.373 11.1918C19.491 11.2187 19.5929 11.2828 19.6788 11.3841C19.7647 11.4853 19.8076 11.6033 19.8076 11.7379C19.8076 11.9635 19.7368 12.1286 19.5951 12.2331C19.4535 12.3376 19.2698 12.3629 19.0442 12.3091C18.8044 12.2591 18.5554 12.2232 18.2971 12.2014C18.0387 12.1796 17.773 12.1687 17.4999 12.1687C17.0153 12.1687 16.5407 12.2151 16.0759 12.3081C15.6112 12.401 15.1679 12.527 14.7461 12.686C14.5102 12.777 14.3173 12.7719 14.1673 12.6706C14.0173 12.5693 13.9423 12.4007 13.9423 12.1648Z"
                                                                    fill="#7E8494" />
                                                            </g>
                                                        </svg>
                                                        <span>{{ get_phrase('Courses') }}</span>
                                                    </a>
                                                    <ul class="menu-dropdown">
                                                        @foreach ($parent_categories->take(10) as $parent_category)
                                                            @php
                                                                $child_categories = App\Models\Category::where('parent_id', $parent_category->id);
                                                            @endphp
                                                            @if ($child_categories->count() > 0)
                                                                <li class="item-have-submenu">
                                                                    <a href="{{ route('courses', $parent_category->slug) }}">
                                                                        {{ ucfirst($parent_category->title) }}
                                                                    </a>
                                                                    @if ($child_categories->count() > 0)
                                                                        <ul class="dropdown-submenu">
                                                                            @foreach ($child_categories->get() as $child_category)
                                                                                <li>
                                                                                    <a href="{{ route('courses', $child_category->slug) }}">
                                                                                        {{ ucfirst($child_category->title) }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                        <li>
                                                            <a href="{{ route('courses') }}">
                                                                <span class="me-3"><i class="fas fa-list-ul"></i></span>
                                                                <span class="me-auto">{{ get_phrase('All Courses') }}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>


                                                <!-- Bootcamps menu -->
                                                <li>
                                                    <a href="{{ route('bootcamps') }}">
                                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="favorite_FILL0_wght300_GRAD0_opsz24 (1) 2">
                                                                <path id="Vector"
                                                                    d="M11.9913 21.4724C11.7772 21.4724 11.5622 21.4339 11.3462 21.357C11.1301 21.2801 10.9401 21.1596 10.776 20.9955L9.33945 19.6897C7.56637 18.0731 5.98335 16.4849 4.5904 14.9253C3.19745 13.3657 2.50098 11.6949 2.50098 9.91282C2.50098 8.4936 2.9795 7.30547 3.93655 6.34842C4.8936 5.39137 6.08174 4.91284 7.50095 4.91284C8.30735 4.91284 9.10383 5.09874 9.89038 5.47054C10.6769 5.84234 11.3804 6.44619 12.001 7.28209C12.6215 6.44619 13.325 5.84234 14.1115 5.47054C14.8981 5.09874 15.6946 4.91284 16.501 4.91284C17.9202 4.91284 19.1083 5.39137 20.0654 6.34842C21.0224 7.30547 21.5009 8.4936 21.5009 9.91282C21.5009 11.7141 20.7926 13.4035 19.3759 14.9811C17.9593 16.5586 16.3798 18.1333 14.6375 19.7051L13.2163 20.9955C13.0522 21.1596 12.8606 21.2801 12.6413 21.357C12.4221 21.4339 12.2054 21.4724 11.9913 21.4724ZM11.2817 8.80129C10.7407 7.97693 10.1712 7.37276 9.57308 6.98879C8.97499 6.60481 8.28429 6.41282 7.50095 6.41282C6.50095 6.41282 5.66762 6.74615 5.00095 7.41282C4.33429 8.07948 4.00095 8.91282 4.00095 9.91282C4.00095 10.7154 4.2596 11.5545 4.7769 12.4301C5.2942 13.3058 5.94355 14.1763 6.72495 15.0416C7.50637 15.907 8.35284 16.7525 9.26438 17.5782C10.1759 18.4038 11.0208 19.1711 11.799 19.8801C11.8567 19.9314 11.924 19.957 12.001 19.957C12.0779 19.957 12.1452 19.9314 12.2029 19.8801C12.9811 19.1711 13.826 18.4038 14.7375 17.5782C15.6491 16.7525 16.4955 15.907 17.277 15.0416C18.0584 14.1763 18.7077 13.3058 19.225 12.4301C19.7423 11.5545 20.001 10.7154 20.001 9.91282C20.001 8.91282 19.6676 8.07948 19.001 7.41282C18.3343 6.74615 17.501 6.41282 16.501 6.41282C15.7176 6.41282 15.0269 6.60481 14.4288 6.98879C13.8307 7.37276 13.2612 7.97693 12.7202 8.80129C12.6356 8.92949 12.5292 9.02565 12.401 9.08977C12.2727 9.15387 12.1394 9.18592 12.001 9.18592C11.8625 9.18592 11.7292 9.15387 11.601 9.08977C11.4728 9.02565 11.3663 8.92949 11.2817 8.80129Z"
                                                                    fill="#6B7385" />
                                                            </g>
                                                        </svg>
                                                        <span>{{ get_phrase('Bootcamps') }}</span>
                                                    </a>
                                                </li>


                                                <!-- Team Training menu -->
                                                <li>
                                                    <a href="{{ route('team.packages') }}">
                                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="person_FILL0_wght300_GRAD0_opsz20 1">
                                                                <path id="Vector"
                                                                    d="M12 12.2304C11.0042 12.2304 10.1719 11.896 9.50317 11.2273C8.83442 10.5585 8.50005 9.72626 8.50005 8.73044C8.50005 7.73461 8.83442 6.90233 9.50317 6.23359C10.1719 5.56484 11.0042 5.23047 12 5.23047C12.9958 5.23047 13.8281 5.56484 14.4969 6.23359C15.1656 6.90233 15.5 7.73461 15.5 8.73044C15.5 9.72626 15.1656 10.5585 14.4969 11.2273C13.8281 11.896 12.9958 12.2304 12 12.2304ZM17.9558 19.8708H6.04425C5.59497 19.8708 5.21278 19.7132 4.8977 19.3981C4.5826 19.083 4.42505 18.7009 4.42505 18.2516V17.5727C4.42505 17.0663 4.56223 16.6086 4.8366 16.1997C5.11095 15.7907 5.46791 15.4822 5.90747 15.2741C6.88457 14.8232 7.88851 14.4766 8.91927 14.2343C9.95004 13.992 10.977 13.8708 12 13.8708C13.0231 13.8708 14.0542 13.992 15.0933 14.2343C16.1324 14.4766 17.1295 14.8234 18.0846 15.2747C18.5295 15.4824 18.8891 15.7907 19.1634 16.1997C19.4378 16.6086 19.575 17.0663 19.575 17.5727V18.2516C19.575 18.7009 19.4174 19.083 19.1024 19.3981C18.7873 19.7132 18.4051 19.8708 17.9558 19.8708ZM6.02502 18.2708H17.975V17.5663C17.975 17.368 17.9205 17.191 17.8115 17.0352C17.7026 16.8795 17.5558 16.7721 17.3712 16.7131C16.543 16.3221 15.6645 16.0173 14.7357 15.7987C13.807 15.5801 12.8951 15.4708 12 15.4708C11.105 15.4708 10.1931 15.5843 9.26432 15.8112C8.33556 16.0381 7.45707 16.3387 6.62887 16.7131C6.44259 16.804 6.29538 16.9193 6.18725 17.0591C6.0791 17.199 6.02502 17.368 6.02502 17.5663V18.2708ZM12 10.6304C12.55 10.6304 13.0042 10.4513 13.3625 10.0929C13.7209 9.73461 13.9 9.28044 13.9 8.73044C13.9 8.18044 13.7209 7.72628 13.3625 7.36794C13.0042 7.00961 12.55 6.83044 12 6.83044C11.45 6.83044 10.9959 7.00961 10.6375 7.36794C10.2792 7.72628 10.1 8.18044 10.1 8.73044C10.1 9.28044 10.2792 9.73461 10.6375 10.0929C10.9959 10.4513 11.45 10.6304 12 10.6304Z"
                                                                    fill="#6B7385" />
                                                            </g>
                                                        </svg>
                                                        <span>{{ get_phrase('Team Packages') }}</span>
                                                    </a>
                                                </li>


                                                <!-- Instructor menu -->
                                                <li>
                                                    <a href="{{ route('instructors') }}">
                                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="person_FILL0_wght300_GRAD0_opsz20 1">
                                                                <path id="Vector"
                                                                    d="M12 12.2304C11.0042 12.2304 10.1719 11.896 9.50317 11.2273C8.83442 10.5585 8.50005 9.72626 8.50005 8.73044C8.50005 7.73461 8.83442 6.90233 9.50317 6.23359C10.1719 5.56484 11.0042 5.23047 12 5.23047C12.9958 5.23047 13.8281 5.56484 14.4969 6.23359C15.1656 6.90233 15.5 7.73461 15.5 8.73044C15.5 9.72626 15.1656 10.5585 14.4969 11.2273C13.8281 11.896 12.9958 12.2304 12 12.2304ZM17.9558 19.8708H6.04425C5.59497 19.8708 5.21278 19.7132 4.8977 19.3981C4.5826 19.083 4.42505 18.7009 4.42505 18.2516V17.5727C4.42505 17.0663 4.56223 16.6086 4.8366 16.1997C5.11095 15.7907 5.46791 15.4822 5.90747 15.2741C6.88457 14.8232 7.88851 14.4766 8.91927 14.2343C9.95004 13.992 10.977 13.8708 12 13.8708C13.0231 13.8708 14.0542 13.992 15.0933 14.2343C16.1324 14.4766 17.1295 14.8234 18.0846 15.2747C18.5295 15.4824 18.8891 15.7907 19.1634 16.1997C19.4378 16.6086 19.575 17.0663 19.575 17.5727V18.2516C19.575 18.7009 19.4174 19.083 19.1024 19.3981C18.7873 19.7132 18.4051 19.8708 17.9558 19.8708ZM6.02502 18.2708H17.975V17.5663C17.975 17.368 17.9205 17.191 17.8115 17.0352C17.7026 16.8795 17.5558 16.7721 17.3712 16.7131C16.543 16.3221 15.6645 16.0173 14.7357 15.7987C13.807 15.5801 12.8951 15.4708 12 15.4708C11.105 15.4708 10.1931 15.5843 9.26432 15.8112C8.33556 16.0381 7.45707 16.3387 6.62887 16.7131C6.44259 16.804 6.29538 16.9193 6.18725 17.0591C6.0791 17.199 6.02502 17.368 6.02502 17.5663V18.2708ZM12 10.6304C12.55 10.6304 13.0042 10.4513 13.3625 10.0929C13.7209 9.73461 13.9 9.28044 13.9 8.73044C13.9 8.18044 13.7209 7.72628 13.3625 7.36794C13.0042 7.00961 12.55 6.83044 12 6.83044C11.45 6.83044 10.9959 7.00961 10.6375 7.36794C10.2792 7.72628 10.1 8.18044 10.1 8.73044C10.1 9.28044 10.2792 9.73461 10.6375 10.0929C10.9959 10.4513 11.45 10.6304 12 10.6304Z"
                                                                    fill="#6B7385" />
                                                            </g>
                                                        </svg>
                                                        <span>{{ get_phrase('Instructors') }}</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Off Canvas End -->
                        <div class="nav-btn-area login-nav-btn-area d-flex align-items-center">
                            <div class="nav-search">
                                <form role="search" method="get" class="search-form" action="{{ route('courses') }}">
                                    <div class="d-none d-lg-block">
                                        <label>
                                            <input type="text" class="search-field" placeholder="{{ get_phrase('Search...') }}" name="search" title="Search for:" @if (request()->has('search')) value="{{ request()->input('search') }}" @endif />
                                        </label>
                                        <input type="submit" class="search-submit" value="Search" />
                                    </div>
                                    <div class="header-mobile-search d-block d-lg-none">
                                        <label for="header-mobiel-search" class="mobile-search-label">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="#4B5675"
                                                    d="M8.625 16.3125C4.3875 16.3125 0.9375 12.8625 0.9375 8.625C0.9375 4.3875 4.3875 0.9375 8.625 0.9375C12.8625 0.9375 16.3125 4.3875 16.3125 8.625C16.3125 12.8625 12.8625 16.3125 8.625 16.3125ZM8.625 2.0625C5.0025 2.0625 2.0625 5.01 2.0625 8.625C2.0625 12.24 5.0025 15.1875 8.625 15.1875C12.2475 15.1875 15.1875 12.24 15.1875 8.625C15.1875 5.01 12.2475 2.0625 8.625 2.0625Z" />
                                                <path fill="#4B5675"
                                                    d="M16.5 17.0625C16.3575 17.0625 16.215 17.01 16.1025 16.8975L13.5001 14.295C13.2826 14.0775 13.2826 13.7175 13.5001 13.5C13.7176 13.2825 14.0776 13.2825 14.2951 13.5L16.8975 16.1025C17.115 16.32 17.115 16.68 16.8975 16.8975C16.785 17.01 16.6425 17.0625 16.5 17.0625Z" />
                                            </svg>
                                        </label>
                                        <div class="mobile-search">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mobile-search-inner">
                                                            <form action="{{ route('courses') }}" method="get">
                                                                <input type="search" class="form-control" id="header-mobiel-search" placeholder="Search Here" name="search" @if (request()->has('search')) value="{{ request()->input('search') }}" @endif
                                                                    placeholder="{{ get_phrase('Search courses') }}">
                                                                <button type="submit" class="btn-search">{{ get_phrase('Search') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="cart-bookmark-lang">
                                @isset(auth()->user()->id)
                                    <div class="dropdown header-cart-dropdown {{ cart_items()->count() > 0 ? 'active' : '' }}">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001" stroke="#192335" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z" stroke="#192335" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z" stroke="#192335" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M9 8H21" stroke="#192335" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="mb-1">
                                                @if (cart_items()->count() > 0)
                                                    @foreach (cart_items() as $course)
                                                        <li class="mb-12px">
                                                            <a href="#">
                                                                <div class="d-flex align-items-center gap-6px">
                                                                    <div class="cart-list-img">
                                                                        <img src="{{ $course->thumbnail }}" alt="course-thumbnail">
                                                                    </div>
                                                                    <div>
                                                                        <h5 class="euclid-title-13px mb-6px">{{ $course->title }}</h5>
                                                                        <p class="pop-subtitle-11px">{{ get_user_info($course->user_id)->name }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <a href="{{ route('cart') }}" class="btn lms1-btn-primary w-100">{{ get_phrase('Check Out') }}</a>
                                                    @endforeach
                                                @else
                                                    <li class="pop-subtitle-15px2 text-center">{{ get_phrase('Cart is empty') }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>


                                    <a href="{{ route('wishlist') }}" class="lms-svg-link1 {{ wishlist()->count() > 0 ? 'active' : '' }} mt-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8966 20.1611C11.6825 20.1611 11.4674 20.1226 11.2514 20.0457C11.0354 19.9688 10.8453 19.8483 10.6812 19.6842L9.24472 18.3784C7.47164 16.7618 5.88862 15.1736 4.49567 13.614C3.10273 12.0544 2.40625 10.3836 2.40625 8.60154C2.40625 7.18232 2.88477 5.99419 3.84182 5.03714C4.79887 4.08009 5.98701 3.60156 7.40622 3.60156C8.21262 3.60156 9.0091 3.78746 9.79565 4.15926C10.5822 4.53106 11.2857 5.13491 11.9062 5.97081C12.5267 5.13491 13.2303 4.53106 14.0168 4.15926C14.8033 3.78746 15.5998 3.60156 16.4062 3.60156C17.8254 3.60156 19.0136 4.08009 19.9706 5.03714C20.9277 5.99419 21.4062 7.18232 21.4062 8.60154C21.4062 10.4028 20.6979 12.0922 19.2812 13.6698C17.8645 15.2474 16.285 16.822 14.5427 18.3938L13.1216 19.6842C12.9575 19.8483 12.7658 19.9688 12.5466 20.0457C12.3274 20.1226 12.1107 20.1611 11.8966 20.1611ZM11.187 7.49001C10.646 6.66565 10.0764 6.06148 9.47835 5.67751C8.88027 5.29353 8.18956 5.10154 7.40622 5.10154C6.40622 5.10154 5.57289 5.43487 4.90622 6.10154C4.23956 6.7682 3.90622 7.60154 3.90622 8.60154C3.90622 9.4041 4.16487 10.2432 4.68217 11.1188C5.19947 11.9945 5.84882 12.865 6.63022 13.7303C7.41164 14.5957 8.25812 15.4412 9.16965 16.2669C10.0812 17.0925 10.9261 17.8598 11.7043 18.5688C11.762 18.6201 11.8293 18.6458 11.9062 18.6458C11.9832 18.6458 12.0505 18.6201 12.1082 18.5688C12.8864 17.8598 13.7313 17.0925 14.6428 16.2669C15.5543 15.4412 16.4008 14.5957 17.1822 13.7303C17.9636 12.865 18.613 11.9945 19.1303 11.1188C19.6476 10.2432 19.9062 9.4041 19.9062 8.60154C19.9062 7.60154 19.5729 6.7682 18.9062 6.10154C18.2396 5.43487 17.4062 5.10154 16.4062 5.10154C15.6229 5.10154 14.9322 5.29353 14.3341 5.67751C13.736 6.06148 13.1665 6.66565 12.6254 7.49001C12.5408 7.61821 12.4344 7.71437 12.3062 7.77849C12.178 7.84259 12.0447 7.87464 11.9062 7.87464C11.7678 7.87464 11.6344 7.84259 11.5062 7.77849C11.378 7.71437 11.2716 7.61821 11.187 7.49001Z"
                                                fill="#192335" />
                                        </svg>
                                    </a>
                                @endisset
                                <div class="language-dropdown d-none d-sm-block">
                                    <form action="">
                                        <select>
                                            <option value="1" data-display="EN">English</option>
                                            <option value="2" data-display="FR">French</option>
                                            <option value="3" data-display="GR">Germain</option>
                                            <option value="4" data-display="SP">Spanish</option>
                                            <option value="5" data-display="AR">Arabic</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            @if (isset(auth()->user()->id))
                                <div class="dropdown header-user-dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ get_image(Auth()->user()->photo) }}" alt="user-img">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="d-flex align-items-center gap-6px mb-1">
                                            <div class="sml-img-wrap1">
                                                <img src="{{ get_image(Auth()->user()->photo) }}" alt="user-img">
                                            </div>
                                            <div>
                                                <h5 class="euclid-title-13px mb-1">{{ ucfirst(Auth()->user()->name) }}</h5>
                                                <p class="pop-subtitle-11px">{{ ucfirst(Auth()->user()->role) }}</p>
                                            </div>
                                        </div>
                                        <ul class="px-2 pt-2">
                                            @if (in_array(auth()->user()->role, ['admin', 'instructor']))
                                                <li class="user-dropdown-list">
                                                    <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="d-flex align-items-center gap-2 user-dropdown-item">
                                                        <i class="fi fi-br-apps"></i>
                                                        {{ get_phrase('Dashboard') }}
                                                    </a>
                                                </li>
                                            @endif

                                            @if (Auth()->user()->role != 'admin')
                                                <li class="user-dropdown-list">
                                                    <a href="{{ route('my.courses') }}" class="d-flex align-items-center gap-2 user-dropdown-item">
                                                        <i class="fi fi-rr-e-learning"></i>
                                                        <span>{{ get_phrase('My Courses') }}</span>
                                                    </a>
                                                </li>
                                                <li class="user-dropdown-list">
                                                    <a href="{{ route('my.bootcamps') }}" class="d-flex align-items-center gap-2 user-dropdown-item">
                                                        <i class="fi fi-rr-users-alt"></i>
                                                        <span>{{ get_phrase('My Bootcamps') }}</span>
                                                    </a>
                                                </li>
                                                <li class="user-dropdown-list">
                                                    <a href="{{ route('my.team.packages') }}" class="d-flex align-items-center gap-2 user-dropdown-item">
                                                        <i class="fi fi-rr-member-list"></i>
                                                        <span>{{ get_phrase('My Teams') }}</span>
                                                    </a>
                                                </li>
                                                <li class="user-dropdown-list">
                                                    <a href="{{ route('my.profile') }}" class="d-flex align-items-center gap-2 user-dropdown-item">
                                                        <i class="fi fi-rr-circle-user"></i>
                                                        <span>{{ get_phrase('My Profile') }}</span>
                                                    </a>
                                                </li>
                                                <li class="user-dropdown-list">
                                                    <a href="{{ route('wishlist') }}" class="d-flex align-items-center gap-2 user-dropdown-item">
                                                        <i class="fi fi-rr-heart"></i>
                                                        <span>{{ get_phrase('My Wishlist') }}</span>
                                                    </a>
                                                </li>
                                                <li class="user-dropdown-list">
                                                    <a href="{{ route('message') }}" class="d-flex align-items-center gap-2 user-dropdown-item">
                                                        <i class="fi fi-rr-messages"></i>
                                                        <span>{{ get_phrase('Message') }}</span>
                                                    </a>
                                                </li>
                                                <li class="user-dropdown-list">
                                                    <a href="{{ route('purchase.history') }}" class="d-flex align-items-center gap-2 user-dropdown-item">
                                                        <i class="fi fi-rr-time-past"></i>
                                                        <span>{{ get_phrase('Purchase History') }}</span>
                                                    </a>
                                                </li>
                                            @endif

                                            <li class="user-dropdown-list">
                                                <a href="{{ route('logout') }}" class="d-flex align-items-center gap-2 user-dropdown-item">
                                                    <i class="fi fi-rr-arrow-left-from-arc"></i>
                                                    <span>{{ get_phrase('Log Out') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn-1 header-btn">{{ get_phrase('Login') }}</a>
                            @endif
                        </div>
                        <button class="mobile-menu d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
                            <img src="{{ asset('assets/frontend/default/images/menu.svg') }}" alt="menu">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
