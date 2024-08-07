@php
    $course_progress_out_of_100 = progress_bar($course_details->id);
    if (isset($_GET['tab'])) {
        $tab = $_GET['tab'];
    } elseif (Session::has('forum_tab')) {
        $tab = Session::get('forum_tab');
    } else {
        $tab = 'summary';
    }
@endphp
<div class="playing-tab-area">
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link @if ($tab == 'summary') active @endif" id="pills-summary-tab" data-bs-toggle="pill" data-bs-target="#pills-summary" type="button" role="tab" aria-controls="pills-summary" aria-selected="true">{{ get_phrase('Summary') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if ($tab == 'live-class') active @endif" id="pills-live-class-tab" data-bs-toggle="pill" data-bs-target="#pills-live-class" type="button" role="tab" aria-controls="pills-live-class" aria-selected="false">{{ get_phrase('Live class') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if ($tab == 'certificate') active @endif" id="pills-certificate-tab" data-bs-toggle="pill" data-bs-target="#pills-certificate" type="button" role="tab" aria-controls="pills-certificate" aria-selected="false">{{ get_phrase('Certificate') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if ($tab == 'forum') active @endif" id="pills-forum-tab" data-bs-toggle="pill" data-bs-target="#pills-forum" type="button" role="tab" aria-controls="pills-forum" aria-selected="false">{{ get_phrase('Forum') }}</button>
        </li>
    </ul>
</div>

<!-- Tab Content -->
<div class="tab-content" id="pills-tabContent">
    @include('course_player.summary.index')
    @include('course_player.live_class.index')
    @include('course_player.certificate.index')
    @include('course_player.forum.index')
</div>

@push('js')
    <script>
        "use strict";
        $(document).ready(function() {
            $('button').on('click', function(e) {
                e.preventDefault();
                let tab = $(this).data('bs-target');
                $.ajax({
                    type: "get",
                    url: "{{ route('forum.tab.active') }}",
                    data: {
                        tab: tab
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
@endpush