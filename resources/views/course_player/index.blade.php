<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ get_phrase('Course Playing Page') }}| {{ config('app.name') }}</title>
    <!-- all the meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" />

    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/default/images/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/frontend/default/images/favicon.svg') }}" type="image/x-icon">

    <!-- Css Files -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/plyr.css') }}">

    <!-- Custom Css File -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/responsive.css') }}">

    <!-- Summernote Css -->
    <link rel="stylesheet" href="{{ asset('assets/global/summernote/summernote.min.css') }}">

    <!-- Yaireo Tagify -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/tagify-master/dist/tagify.css') }}" />

    <style>
        iframe,
        .text_show {
            height: 450px;
        }
    </style>

</head>

<body>

    <!-- Course Playing Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 padding-bottom-110">
                <div class="col-md-12">
                    @include('course_player.header')
                </div>
                <div class="col-xl-8 col-lg-7">
                    <!-- Video -->
                    <div class="playing-video-area mb-5 position-relative">
                        @php
                            $watermark_type = get_player_settings('watermark_type');
                        @endphp
                        @if ($watermark_type != 'ffmpeg')
                            @php
                                $width = get_player_settings('watermark_width');
                                $height = get_player_settings('watermark_height');
                                $top = get_player_settings('watermark_top');
                                $left = get_player_settings('watermark_left');
                                $logo = get_player_settings('watermark_logo');
                                $opacity = get_player_settings('watermark_opacity');
                            @endphp
                            @if ($lesson_details->lesson_type == 'system-video')
                                @include('course_player.watermark')
                            @endif
                        @endif
                        @include('course_player.player_page')
                    </div>
                    <!-- Tabs -->
                    @include('course_player.tab_bar')
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="player-right-sidebar">
                        @include('course_player.side_bar')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Course Playing Area End -->

    <!-- Js Files -->
    <script src="{{ asset('assets/frontend/default/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/global/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/plyr.js') }}"></script>
    <script src="{{ asset('assets/global/tagify-master/dist/tagify.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/script.js') }}"></script>
    <script src="{{ asset('assets/global/course_player/js/script.js') }}"></script>

    <!-- toster file -->
    @include('frontend.default.toaster')

    <!-- Custom Script -->
    @include('course_player.init')
    @stack('js')
</body>

</html>
