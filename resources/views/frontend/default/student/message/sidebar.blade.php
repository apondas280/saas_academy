    <div class="message-list-area">
        <h1 class="euclid-title-24px mb-3">{{ get_phrase('Message') }}</h1>

        @php
            $my_id = auth()->user()->id;
            $my_threads = App\Models\MessageThread::where('contact_one', $my_id)->orWhere('contact_two', $my_id)->orderBy('updated_at', 'desc')->get();
        @endphp

        <form action="" class="mb-3">
            <div class="lms1-search-wrap">
                <input type="search" id="message-search" class="form-control lms1-search-form-control" placeholder="{{ get_phrase('Search...') }}">
            </div>
        </form>
        <ul class="d-flex flex-column gap-10px messages-list-group">
            @foreach ($my_threads as $thread)
                @php
                    $last_message = $thread->messages()->orderBy('id', 'desc')->firstOrNew();
                    $number_of_unread_message = $thread->messages()->where('read', '!=', 1)->count();
                @endphp


                <li class="user-message-listitem @if($thread->user->id == request()->query('user')) active @endif">
                    <a class="d-block" href="{{ route('message', ['inbox' => $thread->code, 'user' => $thread->user->id]) }}">
                        <div class="d-flex gap-2">
                            <div class="sml-img-wrap2 message-list-img">
                                <img src="{{ get_image($thread->user->photo) }}" alt="user-photo">
                            </div>
                            <div class="w-100">
                                <h5 class="pop-title-14px text-truncate max-w-120px">{{ $thread->user->name }}</h5>
                                <div class="message-or-typing typing">
                                    @if ($last_message->message)
                                        <p class="message-list-typing text-secondary ellipsis-1">{{ $last_message->message }}</p>
                                    @else
                                        <p class="message-list-typing text-secondary">@{{ get_phrase('sent an attachment') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>


@push('js')
<script>
    $(document).ready(function() {

        // save old messages
        let oldMsg = $('.messages-list-group').html();

        $('#message-search').on('input', function() {
            const query = $(this).val();
            if (query.length > 0) {
                searchMessages(query);
            } else {
                $('.messages-list-group').html(oldMsg);
            }
        });
    });

    function searchMessages(query) {
        $.ajax({
            url: "{{ route('search.student') }}",
            method: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                search_mail: query
            },
            success: function(response) {
                $('.messages-list-group').html(response);
            }
        });
    }
</script>
@endpush