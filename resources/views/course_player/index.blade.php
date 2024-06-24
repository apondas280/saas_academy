<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ get_phrase('Course Playing Page') }}| {{ config('app.name') }}</title>
    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- all the css files -->
    <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/course_player/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/course_player/vendors/fontawesome/fontawesome.css') }}" />
    <!-- Player CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/course_player/vendors/plyr/plyr.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/course_player/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/course_player/css/custom.css') }}" />
    <!-- FlatIcons Css -->
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-bold-rounded/css/uicons-bold-rounded.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-bold-straight/css/uicons-bold-straight.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-regular-rounded/css/uicons-regular-rounded.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-solid-rounded/css/uicons-solid-rounded.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-solid-rounded/css/uicons-solid-rounded.css') }}" />

    <!-- Summernote Css -->
    <link rel="stylesheet" href="{{ asset('assets/global/summernote/summernote.min.css') }}">

</head>

<body>

    <!-- Start Course Playing Header -->
    <header class="playing-header-section">
        @include('course_player.header')
    </header>
    <!-- End Course Playing Header -->

    <!-- Start Course Playing Video and Playlist Area -->
    <section class="video-playlist-section">
        <div class="my-container">
            <div class="row">
                <div class="col-lg-8" id="player_content">
                    <div class="course-video-area border border-primary">
                        <!-- Video -->
                        <div class="course-video-wrap">
                            <div class="plyr__video-embed">
                                @include('course_player.player_page')
                            </div>
                        </div>
                    </div>
                    <!-- Tab -->
                    <div class="course-video-navtab">
                        @include('course_player.tab_bar')
                    </div>
                </div>
                <div class="col-lg-4" id="player_side_bar">
                    @include('course_player.side_bar')
                </div>
            </div>
        </div>
    </section>
    <!-- End Course Playing Video and Playlist Area -->

    <!-- Main Jquery -->
    <script src="{{ asset('assets/global/course_player/vendors/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap bundle with popper -->
    <script src="{{ asset('assets/global/course_player/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/global/course_player/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Summernote Css -->
    <script src="{{ asset('assets/global/summernote/summernote.min.js') }}"></script>

    <!-- Fontawesome JS -->
    <script src="{{ asset('assets/global/course_player/vendors/fontawesome/fontawesome.all.min.js') }}"></script>

    <!-- Player JS -->
    <script src="{{ asset('assets/global/course_player/vendors/plyr/plyr.js') }}"></script>

    <!-- toster file -->
    @include('frontend.default.toaster')

    <!-- Custom Script -->
    <script src="{{ asset('assets/global/course_player/js/script.js') }}"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('.flexCheckChecked').on('click', function(e) {
                const id = $(this).attr('id');
                $('#watch_history_form .lesson_id').val(id);
                $('#watch_history_form').trigger('submit');
            });

            $('#fullscreen').on('click', function(e) {
                e.preventDefault();
                $('#player_content').toggleClass('col-lg-8 col-12');
                $('#player_side_bar').toggleClass('col-lg-4 col-12');
            });

            function initializeSummernote() {
                $('textarea#summernote').summernote({
                    height: 180, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: true, // set focus to editable area after initializing summernote
                    toolbar: [
                        ['color', ['color']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['para', ['ul', 'ol']],
                        ['table', ['table']],
                        ['insert', ['link']]
                    ]
                });
            }

            initializeSummernote();
        });
    </script>
    @stack('js')
</body>

</html>
