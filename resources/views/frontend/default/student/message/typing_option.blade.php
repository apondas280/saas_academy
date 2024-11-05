<form action="{{ route('message.store') }}" method="post" class="w-100" enctype="multipart/form-data">@csrf
    <div class="d-flex align-items-center gap-12px">
        <div class="message-inputs-wrap">
            <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $contact_details->id }}">
            <input type="hidden" name="thread" id="thread" value="{{ $thread_info->id }}">
            <textarea name="message" id="type-msg" cols="30" rows="1" class="form-control message-form-control" placeholder="{{ get_phrase('Type something ...') }}"></textarea>

            <div class="message-other-inputs d-flex align-items-center gap-12px">
                <label for="input-file" class="lms-svg-link2 cursor-pointer">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.49935 18.3337H12.4993C16.666 18.3337 18.3327 16.667 18.3327 12.5003V7.50033C18.3327 3.33366 16.666 1.66699 12.4993 1.66699H7.49935C3.33268 1.66699 1.66602 3.33366 1.66602 7.50033V12.5003C1.66602 16.667 3.33268 18.3337 7.49935 18.3337Z" stroke="#6B7385"
                            stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M7.50065 8.33333C8.42113 8.33333 9.16732 7.58714 9.16732 6.66667C9.16732 5.74619 8.42113 5 7.50065 5C6.58018 5 5.83398 5.74619 5.83398 6.66667C5.83398 7.58714 6.58018 8.33333 7.50065 8.33333Z" stroke="#6B7385" stroke-width="1.25" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M2.22461 15.7918L6.33294 13.0335C6.99128 12.5918 7.94128 12.6418 8.53294 13.1501L8.80794 13.3918C9.45794 13.9501 10.5079 13.9501 11.1579 13.3918L14.6246 10.4168C15.2746 9.85846 16.3246 9.85846 16.9746 10.4168L18.3329 11.5835" stroke="#6B7385" stroke-width="1.25"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </label>
                <input type="file" name="media_files[]" id="gallery" class="d-none" multiple="multiple">
            </div>
        </div>
        <button type="submit" class="btn lms1-btn-primary icon-btn1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.39969 6.32015L15.8897 3.49015C19.6997 2.22015 21.7697 4.30015 20.5097 8.11015L17.6797 16.6002C15.7797 22.3102 12.6597 22.3102 10.7597 16.6002L9.91969 14.0802L7.39969 13.2402C1.68969 11.3402 1.68969 8.23015 7.39969 6.32015Z" stroke="white" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M10.1094 13.6501L13.6894 10.0601" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>
</form>
