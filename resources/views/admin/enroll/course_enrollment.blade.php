@extends('layouts.admin')
@push('title', get_phrase('Course enrollment'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    @php
        $course = App\Models\Course::where('status', 'active')->orWhere('status', 'private')->orderBy('title', 'asc')->get();
        $students = App\Models\User::where('role', 'student')->orderBy('name', 'asc')->get();
    @endphp

    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    {{ get_phrase('Enroll Students') }}
                </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <form class="" action="{{ route('admin.student.post') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="multiple_user_id">{{ get_phrase('Users') }}<span class="required text-danger">*</span>
                            </label>
                            <select class="ol-select2 select2-hidden-accessible" name="user_id[]" multiple="multiple" required>
                                @foreach ($students as $student)
                                    <option value="{{ $student->is }}">{{ $student->name }} ({{ $student->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="multiple_course_id">{{ get_phrase('Course to enrol') }}<span class="text-danger ms-1">*</span></label>

                            <select for='multiple_course_id' class="ol-select2 form-control ol-select2-multiple" data-toggle="select2" multiple="multiple" name="course_id[]" id="multiple_course_id" data-placeholder="Choose ..." required>
                                <option value="">{{ get_phrase('Select a course') }}</option>
                                @foreach ($course as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                @endforeach

                            </select>


                        </div>

                        <button type="submit" class="btn ol-btn-primary mt-2">{{ get_phrase('Enroll student') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
