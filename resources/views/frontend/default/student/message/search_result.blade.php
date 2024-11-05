<style>
    .search-item {
        display: inline-block;
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        background: #fff !important;
        transition: .3s;
    }

    .search-item:hover {
        background: #f4f7fd !important
    }
</style>

@if ($user_details)
    <li class="user-message-listitem">
    <a class="d-block" href="{{ route('message.inbox', $user_details->id) }}">
        <div class="d-flex gap-2">
            <div class="sml-img-wrap2 message-list-img">
                <img src="{{ get_image($user_details->photo) }}" alt="user-photo">
            </div>
            <div class="w-100">
                <h5 class="pop-title-14px text-truncate max-w-120px">{{ $user_details->name }}</h5>
            </div>
        </div>
    </a>
</li>
@else
    <li class="ins-figure p">{{ get_phrase('Search not found...') }}</li>
@endif
