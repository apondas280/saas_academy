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
                            <img src="{{ asset(get_frontend_settings('dark_logo')) }}" alt="logo" width="150px">
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- Off Canvas Start -->
                        <div class="offcanvas-lg offcanvas-end edu-offcanvas" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                            <div class="offcanvas-header">
                                <div class="offcanvas-logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset(get_frontend_settings('dark_logo')) }}" alt="logo">
                                    </a>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body scrollbar-hidden">
                                <div class="nav-wrap-main">
                                    <div class="nav-area m-0 mobile-nav-menu ">
                                        <nav>
                                            <ul class="d-flex align-items-center accordion-menu">
                                                <li class="menu-nav-item">
                                                    <a href="{{ route('home') }}" class="w-100 @if ($current_route == 'home') active @endif">
                                                        <i class="fi fi-rr-home"></i>
                                                        <span>{{ get_phrase('Home') }}</span>
                                                    </a>
                                                </li>

                                                <li class="menu-item-has-children menu-nav-item">
                                                    <a href="javascript:void(0);" class="w-100 courses-toggle">
                                                        <i class="fi fi-rr-e-learning"></i>
                                                        <span>{{ get_phrase('Courses') }}</span>
                                                    </a>
                                                    <ul class="menu-dropdown">
                                                        @foreach ($parent_categories->take(10) as $parent_category)
                                                            @php
                                                                $child_categories = App\Models\Category::where('parent_id', $parent_category->id);
                                                            @endphp
                                                            @if ($child_categories->count() > 0)
                                                                <li class="item-have-submenu">
                                                                    <a href="javascript:void(0);" class="submenu-toggle">
                                                                        {{ ucfirst($parent_category->title) }}
                                                                    </a>
                                                                    <ul class="dropdown-submenu">
                                                                        @foreach ($child_categories->get() as $child_category)
                                                                            <li>
                                                                                <a href="{{ route('courses', $child_category->slug) }}">
                                                                                    {{ ucfirst($child_category->title) }}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
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

                                                <li class="menu-nav-item">
                                                    <a href="{{ route('bootcamps') }}" class="w-100">
                                                        <i class="fi fi-rr-users-alt"></i>
                                                        <span>{{ get_phrase('Live Courses') }}</span>
                                                    </a>
                                                </li>

                                                <li class="menu-nav-item">
                                                    <a href="{{ route('team.packages') }}" class="w-100">
                                                        <i class="fi fi-rr-member-list"></i>
                                                        <span>{{ get_phrase('Team Packages') }}</span>
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
                                <form role="search" method="get" class="search-form" action="{{ route('courses') }}" autocomplete="off">
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
                                @if (isset(auth()->user()->id) && auth()->user()->role != 'admin')
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
                                                    @endforeach
                                                    <a href="{{ route('cart') }}" class="btn lms1-btn-primary w-100">{{ get_phrase('Check Out') }}</a>
                                                @else
                                                    <li class="pop-subtitle-15px2 text-center">{{ get_phrase('Cart is empty') }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <div class="language-dropdown d-none d-sm-block">
                                    <form action="{{ route('select.lng') }}" id="toggleLang" method="get">@csrf
                                        <select name="language" id="lng-selector" onchange="$('#toggleLang').submit()">
                                            @php
                                                $activated_language = strtolower(session('language') ?? get_settings('language'));
                                            @endphp
                                            @foreach (App\Models\Language::all() as $lng)
                                                <option value="{{ $lng->name }}" @selected(strtolower($lng->name) == $activated_language)>{{ $lng->name }}</option>
                                            @endforeach
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
                                                        <span>{{ get_phrase('My Live Courses') }}</span>
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

    @push('js')
        <script>
            $(document).ready(function() {
                $('.courses-toggle').on('click', function() {
                    $(this).next('.menu-dropdown').slideToggle();
                });

                $('.submenu-toggle').on('click', function(e) {
                    e.preventDefault();
                    $(this).next('.dropdown-submenu').slideToggle();
                });
            });
        </script>
    @endpush
