<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ get_phrase('Bootcamp Playing Page') }}| {{ config('app.name') }}</title>
    <!-- all the meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="" />
    <!-- all the css files -->
    <!-- <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" /> -->
     
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

</head>

<body>

    <!-- Course Playing Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 padding-bottom-110">
                <div class="col-md-12">
                    @include('bootcamp_player.header')
                </div>
                <div class="col-xl-8 col-lg-7">
                    <!-- Video -->
                    <div class="playing-video-area padding-bottom-50">
                        @include('bootcamp_player.player_page')
                    </div>
                    <!-- Tabs -->
                    @include('bootcamp_player.tab_bar')
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="player-right-sidebar">
                        @include('bootcamp_player.side_bar')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Course Playing Area End -->

    <!-- Js Files -->
    <script src="{{ asset('assets/frontend/default/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/default/js/plyr.js') }}"></script>
    <!-- Custom Js File -->
    <script src="{{ asset('assets/frontend/default/js/script.js') }}"></script>

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
