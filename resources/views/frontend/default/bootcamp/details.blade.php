@extends('layouts.default')
@push('title', $bootcamp->title)


@section('content')
    <main>
        <div class="container">
            <div class="row mcg-24">
                <div class="col-lg-12">
                    <!-- Link Path  -->
                    <div class="link-path-area link-path-area-pb">
                        <h3 class="text-15">{{ get_phrase('Home') }} / {{ get_phrase('Bootcamps') }} <span>/</span> <span>{{ $bootcamp->title }}</span></h3>
                    </div>
                </div>


                <div class="col-lg-8">
                    <!-- Course Author Area -->
                    <div class="course-author-area">
                        <div class="courser-author-cover">
                            <img src="{{ get_image($bootcamp->thumbnail) }}" alt="course-thumbnail">
                        </div>
                        <div class="course-author-profile">
                            <img src="{{ get_image(get_user_info($bootcamp->user_id)->photo) }}" alt="profile">
                        </div>
                        <h3 class="text-15">{{ get_phrase('Bootcamp by') }} <span>{{ get_user_info($bootcamp->user_id)->name }}</span></h3>
                    </div>
                    <div class="course-description-main">
                        <!-- Course Heading Description -->
                        <div class="course-desvription">
                            <h1 class="text-36">{{ $bootcamp->title }}</h1>
                            @isset($bootcamp->description)
                                <p class="text-15">{!! removeScripts($bootcamp->description) !!}</p>
                            @endisset
                        </div>


                        <!-- About Instructor -->
                        <div class="about-instractor-area">
                            <div class="course-sub-title">
                                <h2 class="title">{{ get_phrase('About Instructor') }}</h2>
                            </div>

                            <div class="instractor-img-details d-flex">
                                <div class="instractor-img">
                                    <img src="{{ get_image($bootcamp->author->photo) }}" alt="...">
                                </div>
                                <div class="abour-instractor-details">

                                    <div class="instractor-name-title">
                                        <h4 class="name">{{ ucfirst($bootcamp->author->name) }}</h4>
                                        <h4 class="title">
                                            @php
                                                $skills = json_decode($bootcamp->author->skills, true);
                                                if (is_array($skills) && count($skills) > 0) {
                                                    $skills = array_column($skills, 'value');
                                                }
                                            @endphp
                                            {{ $skills ? implode(', ', $skills) : '' }}
                                        </h4>
                                    </div>

                                    <p class="info">{{ $bootcamp->author->about }}</p>
                                    <p class="info">{{ $bootcamp->author->biography }}</p>

                                    <ul class="instractor-social-link">
                                        @isset($bootcamp->author->facebook)
                                            <li>
                                                <a href="{{ $bootcamp->author->facebook }}">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_369_3503)">
                                                            <path
                                                                d="M13.9983 13.499H16.4983L17.4983 9.49902H13.9983V7.49902C13.9983 6.46902 13.9983 5.49902 15.9983 5.49902H17.4983V2.13902C17.1723 2.09602 15.9413 1.99902 14.6413 1.99902C11.9263 1.99902 9.99831 3.65602 9.99831 6.69902V9.49902H6.99831V13.499H9.99831V21.999H13.9983V13.499Z"
                                                                fill="#6B7385" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_369_3503">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </a>
                                            </li>
                                        @endisset

                                        @isset($bootcamp->author->twitter)
                                            <li>
                                                <a href="{{ $bootcamp->author->twitter }}">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_369_3506)">
                                                            <path
                                                                d="M12.0017 1.99902C14.7187 1.99902 15.0577 2.00902 16.1237 2.05902C17.1887 2.10902 17.9137 2.27602 18.5517 2.52402C19.2117 2.77802 19.7677 3.12202 20.3237 3.67702C20.8322 4.17692 21.2256 4.78161 21.4767 5.44902C21.7237 6.08602 21.8917 6.81202 21.9417 7.87702C21.9887 8.94302 22.0017 9.28202 22.0017 11.999C22.0017 14.716 21.9917 15.055 21.9417 16.121C21.8917 17.186 21.7237 17.911 21.4767 18.549C21.2264 19.2168 20.8328 19.8216 20.3237 20.321C19.8237 20.8293 19.219 21.2228 18.5517 21.474C17.9147 21.721 17.1887 21.889 16.1237 21.939C15.0577 21.986 14.7187 21.999 12.0017 21.999C9.28469 21.999 8.94569 21.989 7.87969 21.939C6.81469 21.889 6.08969 21.721 5.45169 21.474C4.78402 21.2235 4.17922 20.83 3.67969 20.321C3.1711 19.8212 2.77763 19.2165 2.52669 18.549C2.27869 17.912 2.11169 17.186 2.06169 16.121C2.01469 15.055 2.00169 14.716 2.00169 11.999C2.00169 9.28202 2.01169 8.94302 2.06169 7.87702C2.11169 6.81102 2.27869 6.08702 2.52669 5.44902C2.77693 4.7812 3.1705 4.17634 3.67969 3.67702C4.17936 3.16825 4.78412 2.77475 5.45169 2.52402C6.08969 2.27602 6.81369 2.10902 7.87969 2.05902C8.94569 2.01202 9.28469 1.99902 12.0017 1.99902ZM12.0017 6.99902C10.6756 6.99902 9.40384 7.52581 8.46616 8.46349C7.52848 9.40117 7.00169 10.6729 7.00169 11.999C7.00169 13.3251 7.52848 14.5969 8.46616 15.5346C9.40384 16.4722 10.6756 16.999 12.0017 16.999C13.3278 16.999 14.5995 16.4722 15.5372 15.5346C16.4749 14.5969 17.0017 13.3251 17.0017 11.999C17.0017 10.6729 16.4749 9.40117 15.5372 8.46349C14.5995 7.52581 13.3278 6.99902 12.0017 6.99902ZM18.5017 6.74902C18.5017 6.4175 18.37 6.09956 18.1356 5.86514C17.9012 5.63072 17.5832 5.49902 17.2517 5.49902C16.9202 5.49902 16.6022 5.63072 16.3678 5.86514C16.1334 6.09956 16.0017 6.4175 16.0017 6.74902C16.0017 7.08054 16.1334 7.39849 16.3678 7.63291C16.6022 7.86733 16.9202 7.99902 17.2517 7.99902C17.5832 7.99902 17.9012 7.86733 18.1356 7.63291C18.37 7.39849 18.5017 7.08054 18.5017 6.74902ZM12.0017 8.99902C12.7973 8.99902 13.5604 9.31509 14.123 9.8777C14.6856 10.4403 15.0017 11.2034 15.0017 11.999C15.0017 12.7947 14.6856 13.5577 14.123 14.1203C13.5604 14.683 12.7973 14.999 12.0017 14.999C11.206 14.999 10.443 14.683 9.88037 14.1203C9.31776 13.5577 9.00169 12.7947 9.00169 11.999C9.00169 11.2034 9.31776 10.4403 9.88037 9.8777C10.443 9.31509 11.206 8.99902 12.0017 8.99902Z"
                                                                fill="#6B7385" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_369_3506">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </a>
                                            </li>
                                        @endisset

                                        @isset($bootcamp->author->linkedin)
                                            <li>
                                                <a href="{{ $bootcamp->author->linkedin }}">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_369_3509)">
                                                            <path
                                                                d="M6.93871 5.00002C6.93844 5.53046 6.72747 6.03906 6.35221 6.41394C5.97695 6.78883 5.46814 6.99929 4.93771 6.99902C4.40727 6.99876 3.89867 6.78779 3.52378 6.41253C3.1489 6.03727 2.93844 5.52846 2.93871 4.99802C2.93897 4.46759 3.14994 3.95899 3.5252 3.5841C3.90046 3.20922 4.40927 2.99876 4.93971 2.99902C5.47014 2.99929 5.97874 3.21026 6.35363 3.58552C6.72851 3.96078 6.93897 4.46959 6.93871 5.00002ZM6.99871 8.48002H2.99871V21H6.99871V8.48002ZM13.3187 8.48002H9.33871V21H13.2787V14.43C13.2787 10.77 18.0487 10.43 18.0487 14.43V21H21.9987V13.07C21.9987 6.90002 14.9387 7.13002 13.2787 10.16L13.3187 8.48002Z"
                                                                fill="#6B7385" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_369_3509">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </a>
                                            </li>
                                        @endisset
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @include('frontend.default.bootcamp.pricing')
            </div>
        </div>
    </main>
@endsection
