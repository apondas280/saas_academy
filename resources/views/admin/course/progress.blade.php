@php
    $param = request()->route()->parameter('id');
    $enrollments = App\Models\Enrollment::where('course_id', $param)->get();
@endphp

@if ($enrollments->count() > 0)
    <div id="members">
        <div class="row">
            @foreach ($enrollments as $student)
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="member">
                        <div class="user-data">
                            <div class="user-photo">
                                <img src="{{ get_image($student->users->photo) }}" alt="member-photo">
                            </div>

                            <div class="user-details w-100">
                                <h4>{{ $student->users->name }}</h4>
                                <p>{{ $student->users->email }}</p>

                                <div class="course-progress d-flex align-items-center gap-2 mb-0">
                                    <div class="progress w-100">
                                        <div class="progress-bar progress-bar-success" style="width: {{ progress_bar($student->course_id, $student->users->id) }}%"></div>
                                    </div>
                                    <h4 class="average">{{ progress_bar($student->course_id, $student->users->id) }}%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    @include('admin.no_data')
@endif
