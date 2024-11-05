<li class="messenger-message-wrap">
    <div class="d-flex flex-column ">
        @if (!empty($conversation->message))
            <p class="messenger-message mb-1">{{ $conversation->message }}</p>
        @endif

        @php $media_files = get_files($conversation->id); @endphp
        @if ($media_files->count() > 0)
            <div class="message-upload-images d-flex flex-column">
                @foreach ($media_files as $file)
                    <div class="message-upload-image">
                        <img src="{{ get_image($file->file_name) }}">
                    </div>
                @endforeach
            </div>
        @endif
        <p class="pop-subtitle-12px">{{ timeAgo($conversation->created_at) }}</p>
    </div>
</li>
