<div class="result">
    <div class="user-data">
        <div class="user-photo">
            <img src="{{ get_image($user->photo) }}" alt="member-photo">
        </div>

        <div class="user-details">
            <h4>{{ $user->name }}</h4>
            <p>{{ $user->email }}</p>
        </div>
    </div>

    <div class="member-action-btn">
        @if ($user->email == auth()->user()->email)
            <p>{{ get_phrase('Team Leader') }}</p>
        @else
            @if ($status)
                <a href="{{ route('my.team.packages.members.action', ['remove', 'package_id' => $package_id, 'user_id' => $user->id]) }}" class="lms2-btn-primary px-3 d-block" data-bs-toggle="tooltip" title="{{ get_phrase('Remove member') }}">
                    <span>-</span>
                </a>
            @else
                <a href="{{ route('my.team.packages.members.action', ['register', 'package_id' => $package_id, 'user_id' => $user->id]) }}" class="lms2-btn-primary px-3 d-block" data-bs-toggle="tooltip" title="{{ get_phrase('Add member') }}">
                    <span>+</span>
                </a>
            @endif
        @endif
    </div>
</div>
