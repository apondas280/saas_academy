@php
    $training = \App\Models\GroupTraining::where('id', $id)->first();
    $members = \App\Models\GroupMember::where('group_id', $training->group_id)->get();
@endphp

<div id="members">
    @foreach ($members as $member)
        <div class="member">
            <div class="user-data">
                <div class="user-photo">
                    <img src="{{ get_image($member->member->photo) }}" alt="member-photo">
                </div>

                <div class="user-details w-100">
                    <h4>{{ $member->member->name }}</h4>
                    <p>{{ $member->member->email }}</p>

                    <div class="course-progress d-flex align-items-center gap-2 mb-0">
                        <div class="progress w-100">
                            <div class="progress-bar progress-bar-success" style="width: {{ progress_bar($training->course_id, $member->member->id) }}%"></div>
                        </div>
                        <h4 class="average">{{ progress_bar($training->course_id, $member->member->id) }}%</h4>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
