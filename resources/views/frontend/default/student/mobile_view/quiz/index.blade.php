<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ get_phrase('Course Playing Page') }}| {{ config('app.name') }}</title>
    <!-- all the meta tags -->
    <meta charset="utf-8">
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

</head>

<body>

    <!-- Course Playing Area Start -->
    <section>
        <div class="container">

            <div class="row padding-bottom-110">
                <div class="col-md-12">
                    {{-- @include('course_player.header') --}}
                </div>
                <div class="col-12">
                    <!-- Video -->
                    <div class="playing-video-area mb-5 position-relative">
                        @if (get_player_settings('watermark_type') != 'ffmpeg')
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

                        <style>
                            .quiz-title {
                                font-size: 18px;
                                font-weight: 500;
                                margin-bottom: 12px;
                                border-bottom: 1px solid #C3C9DA;
                                padding-bottom: 20px;
                                font-weight: 600;
                            }

                            .quiz-starter .starter-label {
                                display: inline-block;
                                width: 110px;
                            }

                            .quiz-starter p {
                                font-size: 15px;
                                font-weight: 500;
                                color: #6e798a;
                            }

                            .question {
                                min-height: 155px;
                            }

                            input[type="text"] {
                                padding: 12px 50px 12px 20px;
                                border-radius: 10px;
                                border: 1px solid #6b738530;
                                box-shadow: none !important;
                            }

                            .gradient-border {
                                background: #fff;
                                border: 2px solid #2f57ef;
                                color: #212529;
                                transition: .3s;
                            }

                            .gradient-border:hover {
                                color: #fff;
                                background: #2f57ef;
                            }

                            .serial {
                                width: 30px;
                                height: 30px;
                                background: #F2F3F5;
                                border-radius: 30px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }

                            #quizTimer {
                                width: 80px;
                            }
                        </style>

                        @php
                            $questions = DB::table('questions')
                                ->where('quiz_id', $quiz->id)
                                ->get();

                            $submits = DB::table('quiz_submissions')
                                ->where('quiz_id', $quiz->id)
                                ->where('user_id', $user_id)
                                ->get();
                        @endphp

                        <div class="row px-4">
                            <div class="col-12">
                                <h4 class="quiz-title text-center mt-4"><span>{{ $quiz->title }}</span></h4>

                                <div class="timer-container d-none">
                                    <div class="d-flex align-content-center gap-2 justify-content-end">
                                        <span>
                                            <i class="fi fi-rr-clock-five"></i>
                                        </span>
                                        <span class="fw-600 fs-6">{{ get_phrase('Time left : ') }}</span>
                                        <p class="text-center fw-600 fs-6" id="quizTimer"></p>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="description">{!! $quiz->description !!}</div>
                                </div>
                            </div>
                        </div>


                        <div class="row px-4 quiz-starter">
                            <div class="col-md-6">
                                <p>
                                    @php $duration = explode(':', $quiz->duration); @endphp
                                    <span class="starter-label">{{ get_phrase('Duration') }}</span>
                                    <span>: {{ $duration[0] }} {{ get_phrase('Hour') }}</span>
                                    <span>{{ $duration[1] }} {{ get_phrase('Minute') }}</span>
                                    <span>{{ $duration[2] }} {{ get_phrase('Second') }}</span>
                                </p>
                                <p>
                                    <span class="starter-label">{{ get_phrase('Total Marks') }}</span>
                                    <span>: {{ $quiz->total_mark < 10 ? '0' : '' }}{{ $quiz->total_mark }}</span>
                                </p>
                                <p>
                                    <span class="starter-label">{{ get_phrase('Pass Marks') }}</span>
                                    <span>: {{ $quiz->pass_mark < 10 ? '0' : '' }}{{ $quiz->pass_mark }}</span>
                                </p>
                                <p>
                                    <span class="starter-label">{{ get_phrase('Retake') }}</span>
                                    <span>: {{ $quiz->retake < 10 ? '0' : '' }}{{ $quiz->retake }}</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <span class="starter-label">{{ get_phrase('Question Type') }}</span>
                                    <span class="text-capitalize">:
                                        {{ str_replace('_', ' ', implode(', ', $questions->pluck('type')->unique()->toArray())) }}</span>
                                </p>
                                <p>
                                    <span class="starter-label">{{ get_phrase('Attempts') }}</span>
                                    <span>: {{ $submits->count() < 10 ? '0' : '' }}{{ $submits->count() }}</span>
                                </p>
                                <p>
                                    <span class="starter-label">{{ get_phrase('Total Question') }}</span>
                                    <span>: {{ $questions->count() < 10 ? '0' : '' }}{{ $questions->count() }}</span>
                                </p>
                            </div>

                            <div class="col-12 d-flex justify-content-center gap-3 mt-4">
                                @foreach ($submits as $key => $submit)
                                    <button type="button" class="continue-leason-btn w-auto result-btn"
                                        onclick="getResult(this)"
                                        id="{{ $submit->id }}">{{ get_phrase('View Result') }}
                                        {{ ++$key }}</button>
                                @endforeach

                                @if ($submits->count() < $quiz->retake)
                                    <button type="button" class="continue-leason-btn w-auto active"
                                        id="starterBtn">{{ get_phrase('Start Quiz') }}</button>
                                @endif
                            </div>
                        </div>

                        <div class="load-content px-4"></div>

                        <script src="{{ asset('assets/global/course_player/js/jquery.min.js') }}"></script>
                        <script>
                            let starterContainer = document.querySelector('.quiz-starter');
                            let starterBtn = document.querySelector('#starterBtn');
                            let questionSection = document.querySelector('.question-section');
                            let quizTimer = document.querySelector('#quizTimer');
                            let description = document.querySelector('.description');
                            let resultSection = document.querySelector('.result-section');
                            let backBtn = document.querySelector('#backBtn');

                            // start quiz
                            starterBtn.addEventListener('click', function() {
                                starterContainer.classList.add('d-none');
                                description.classList.add('d-none');
                                $.ajax({
                                    type: "get",
                                    url: "{{ route('load.quiz.questions.mobile', ['user_id' => isset($_GET['user_id']) ? $_GET['user_id'] : '']) }}",
                                    data: {
                                        quiz_id: "{{ $quiz->id }}"
                                        // user_id: "{{ $quiz->id }}"
                                    },
                                    success: function(response) {
                                        $('.load-content').html(response);
                                        startTimer();
                                    }
                                });
                            });

                            function startTimer() {
                                let timerContainer = document.querySelector('.timer-container');
                                timerContainer.classList.remove('d-none');

                                let duration = "{{ $quiz->duration }}";
                                let durationArr = duration.split(":");

                                let hour = parseInt(durationArr[0]);
                                let minute = parseInt(durationArr[1]);
                                let second = parseInt(durationArr[2]);

                                // update the initial timer
                                quizTimer.innerHTML = (hour < 10 ? '0' + hour : hour) + ':' +
                                    (minute < 10 ? '0' + minute : minute) + ':' +
                                    (second < 10 ? '0' + second : second)

                                // decrease the timer every second
                                let timerInterval = setInterval(() => {
                                    if (hour === 0 && minute === 0 && second === 0) {
                                        clearInterval(timerInterval);
                                        endQuiz();
                                        return;
                                    }

                                    if (second === 0) {
                                        if (minute === 0) {
                                            hour--;
                                            minute = 59;
                                        } else {
                                            minute--;
                                        }
                                        second = 59;
                                    } else {
                                        second--;
                                    }

                                    // update the timer
                                    quizTimer.innerHTML = (hour < 10 ? '0' + hour : hour) + ':' +
                                        (minute < 10 ? '0' + minute : minute) + ':' +
                                        (second < 10 ? '0' + second : second);
                                }, 1000);
                            }

                            // load results
                            // function getResult(elem) {
                            //     let id = $(elem).attr('id');
                            //     description.classList.add('d-none');
                            //     starterContainer.classList.add('d-none');

                            //     $.ajax({
                            //         type: "get",
                            //         url: "{{ route('load.quiz.results.mobile', ['user_id' => isset($_GET['user_id']) ? $_GET['user_id'] : '']) }}",
                            //         data: {
                            //             submit_id: id,
                            //             user_id: $_GET['user_id'],
                            //             quiz_id: "{{ $quiz->id }}",

                            //         },
                            //         success: function(response) {
                            //             $('.load-content').html(response);
                            //         }
                            //     });
                            // }
                            function getResult(elem) {
                                let id = $(elem).attr('id');
                                description.classList.add('d-none');
                                starterContainer.classList.add('d-none');

                                // Extract user_id from the URL
                                let userId = new URLSearchParams(window.location.search).get('user_id');

                                $.ajax({
                                    type: "get",
                                    url: "{{ route('load.quiz.results.mobile') }}",
                                    data: {
                                        submit_id: id,
                                        user_id: userId,
                                        quiz_id: "{{ $quiz->id }}",
                                    },
                                    success: function(response) {
                                        $('.load-content').html(response);
                                    }
                                });
                            }


                            // end quiz
                            function endQuiz() {
                                submitQuiz();
                            }
                        </script>


                    </div>
                    <!-- Tabs -->
                    {{-- @include('course_player.tab_bar') --}}
                </div>
                {{-- <div class="col-xl-4 col-lg-5">
                    <div class="player-right-sidebar">
                        @include('course_player.side_bar')
                    </div>
                </div> --}}
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
