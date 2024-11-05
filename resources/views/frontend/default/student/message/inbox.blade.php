@php
    $thread_info = App\Models\MessageThread::where('code', request()->query('inbox'))->first();
    $contact_id = $thread_info->contact_one == auth()->user()->id ? $thread_info->contact_two : $thread_info->contact_one;
    $contact_details = App\Models\User::where('id', $contact_id)->first();
@endphp

<div class="messenger-wraper-area position-relative">
    <div class="count-files d-flex align-items-center gap-2 cursor-pointer d-none">
        <p></p>
        <i class="fa-regular fa-circle-xmark" id="remove_files"></i>
    </div>
    <div class="d-flex align-items-center justify-content-between gap-12px mb-3">
        <a href="#">
            <div class="d-flex gap-12px">
                <div class="sml-img-wrap3">
                    <img src="{{ get_image($contact_details->photo) }}" alt="user">
                </div>
                <div>
                    <h5 class="pop-title-16px2">{{ $contact_details->name }}</h5>
                    <p class="pop-subtitle-12px">{{ $contact_details->email }}</p>
                </div>
            </div>
        </a>
        <div class="dropdown lms-icon-dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.6641 4.16667C11.6641 3.25 10.9141 2.5 9.9974 2.5C9.08073 2.5 8.33073 3.25 8.33073 4.16667C8.33073 5.08333 9.08073 5.83333 9.9974 5.83333C10.9141 5.83333 11.6641 5.08333 11.6641 4.16667Z" stroke="#6B7385" stroke-width="1.25"></path>
                    <path d="M11.6641 15.8337C11.6641 14.917 10.9141 14.167 9.9974 14.167C9.08073 14.167 8.33073 14.917 8.33073 15.8337C8.33073 16.7503 9.08073 17.5003 9.9974 17.5003C10.9141 17.5003 11.6641 16.7503 11.6641 15.8337Z" stroke="#6B7385" stroke-width="1.25">
                    </path>
                    <path d="M11.6641 9.99967C11.6641 9.08301 10.9141 8.33301 9.9974 8.33301C9.08073 8.33301 8.33073 9.08301 8.33073 9.99967C8.33073 10.9163 9.08073 11.6663 9.9974 11.6663C10.9141 11.6663 11.6641 10.9163 11.6641 9.99967Z" stroke="#6B7385" stroke-width="1.25">
                    </path>
                </svg>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>

    <div class="messenger-message-area" id="msg-box">
        <div class="messenger-messages-wrap-scroll mb-22px pb-1">
            @include('frontend.default.student.message.body')
        </div>

        @include('frontend.default.student.message.typing_option')
    </div>
</div>


@push('js')
    <script>
        "use strict";
        $(document).ready(function() {
            $('.send_message_btn').on('click', function(e) {
                let msg = $('#type-msg').val();
                $('.message-input form').trigger('submit');
            });

            $('#gallery').change(function(e) {
                e.preventDefault();
                var fileCount = $(this)[0].files.length;
                if (fileCount > 0) {
                    $('.count-files').removeClass('d-none');
                    $('.count-files p').text(fileCount + ' files selected');
                    $(this).attr('name', 'media_files[]');
                }
            });

            $('#remove_files').on('click', function(e) {
                $('.count-files').addClass('d-none');
                $('.message-input #gallery').removeAttr('name');
            });


            $('label[for="input-file"]').on('click', function() {
                $('form input[type="file"]').click();
            });
        });
    </script>
    <script>
        "use strict";
        var myDiv = document.querySelector('.messenger-messages-wrap-scroll');
        myDiv.scrollTop = myDiv.scrollHeight;
    </script>
@endpush
