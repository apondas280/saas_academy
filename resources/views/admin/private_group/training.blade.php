@extends('layouts.admin')
@push('title', get_phrase('Training Session'))

@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-4 px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    {{ get_phrase('Training Session') }}
                </h4>
            </div>
        </div>
    </div>

    <div class="row g-2 g-sm-3 my-3">
        <div class="col-md-4">
            <div class="ol-card card-hover">
                <div class="ol-card-body px-20px py-3">
                    <p class="title card-title-hover fs-18px my-2">{{ $groups->count() }}</p>
                    <p class="sub-title fs-14px">{{ get_phrase('Number of Groups') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="ol-card card-hover">
                <div class="ol-card-body px-20px py-3">
                    <p class="title card-title-hover fs-18px my-2">{{ $courses->count() }}</p>
                    <p class="sub-title fs-14px">{{ get_phrase('Number of Courses') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="ol-card card-hover">
                <div class="ol-card-body px-20px py-3">
                    <p class="title card-title-hover fs-18px my-2">{{ $users }}</p>
                    <p class="sub-title fs-14px">{{ get_phrase('Number of Users') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="ol-card p-4">
        <div class="ol-card-body">
            <form class="" action="{{ route('admin.groups.training.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5 col-lg-4">
                        <select class="ol-select2 select2-hidden-accessible" name="group_id" id="group" required>
                            <option value="">{{ get_phrase('Select a group') }}</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-5 col-lg-4">
                        <select class="ol-select2 select2-hidden-accessible" name="courses[]" id="course" multiple required>
                            <option value="">{{ get_phrase('Select a course') }}</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn ol-btn-primary">{{ get_phrase('Set Training') }}</button>
                    </div>
                </div>
            </form>


            <div class="row mt-4">
                <div class="col-md-12">
                    @if ($training_sessions->count() > 0)
                        <div class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15">
                            <p class="admin-tInfo">
                                {{ get_phrase('Showing') . ' ' . count($training_sessions) . ' ' . get_phrase('of') . ' ' . $training_sessions->total() . ' ' . get_phrase('data') }}
                            </p>
                        </div>
                        <div class="table-responsive overflow-auto course_list" id="course_list">
                            <table class="table eTable eTable-2 print-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ get_phrase('Group') }}</th>
                                        <th scope="col">{{ get_phrase('Course') }}</th>
                                        <th scope="col">{{ get_phrase('Start Date') }}</th>
                                        <th scope="col">{{ get_phrase('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($training_sessions as $key => $training)
                                        <tr>
                                            <th scope="row">
                                                <p class="row-number">{{ ++$key }}</p>
                                            </th>
                                            <td>
                                                <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                    <div class="dAdmin_profile_name">
                                                        <h4 class="title fs-14px text-capitalize">{{ $training->group->title }}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                    <div class="dAdmin_profile_name">
                                                        <h4 class="title fs-14px text-capitalize">{{ $training->course->title }}</h4>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="sub-title2 text-12px">
                                                    <p>{{ date('d M, y', strtotime($training->created_at)) }}</p>
                                                </div>
                                            </td>

                                            <td class="print-d-none">
                                                <div class="dropdown ol-icon-dropdown ol-icon-dropdown-transparent">
                                                    <button class="btn ol-btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span class="fi-rr-menu-dots-vertical"></span>
                                                    </button>

                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" onclick="ajaxModal('{{ route('modal', ['admin.private_group.progress', 'id' => $training->id]) }}', '{{ get_phrase('Progress') }}')" href="javascript:void(0)">{{ get_phrase('View Progress') }}</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" onclick="confirmModal('{{ route('admin.groups.training.delete', $training->id) }}')" href="javascript:void(0)">{{ get_phrase('Delete') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15">
                            <p class="admin-tInfo">
                                {{ get_phrase('Showing') . ' ' . count($training_sessions) . ' ' . get_phrase('of') . ' ' . $training_sessions->total() . ' ' . get_phrase('data') }}
                            </p>
                            {{ $training_sessions->links() }}
                        </div>
                    @else
                        @include('admin.no_data')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
