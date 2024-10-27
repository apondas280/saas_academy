@extends('layouts.admin')
@push('title', get_phrase('Student '))
@push('meta')@endpush
@push('css')@endpush
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    {{ get_phrase('Enroll History') }}
                </h4>
            </div>
        </div>
    </div>

    @php
        $course = App\Models\Course::where('status', 'active')->orWhere('status', 'private')->orderBy('title', 'asc')->get();
        $students = App\Models\User::where('role', 'student')->orderBy('name', 'asc')->get();
    @endphp

    <div class="ol-card p-4 mb-3">
        <div class="ol-card-body">
            <form class="" action="{{ route('admin.student.post') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row align-items-end">
                    <div class="col-md-5 mb-3 mb-md-0">
                        <div class="form-group">
                            <label class="form-label ol-form-label" for="multiple_user_id">{{ get_phrase('Users') }}<span class="required text-danger">*</span></label>
                            <select class="ol-select2 select2-hidden-accessible" name="user_id[]" multiple="multiple" required>
                                @foreach ($students as $student)
                                    <option value="{{ $student->is }}">{{ $student->name }} ({{ $student->email }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-5 mb-3 mb-md-0">
                        <div class="form-group">
                            <label class="form-label ol-form-label" for="multiple_course_id">{{ get_phrase('Course to enrol') }}<span class="text-danger ms-1">*</span></label>

                            <select for='multiple_course_id' class="ol-select2 form-control ol-select2-multiple" data-toggle="select2" multiple="multiple" name="course_id[]" id="multiple_course_id" data-placeholder="Choose ..." required>
                                <option value="">{{ get_phrase('Select a course') }}</option>
                                @foreach ($course as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn ol-btn-primary mt-2 w-100">{{ get_phrase('Enroll student') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="ol-card">
        <div class="ol-card-body mb-5">

            <div class="row p-3">
                <div class="col-md-4 d-md-flex align-items-center mb-3 mb-md-0">
                    <div class="admin-tInfo-pagi">
                        <p class="admin-tInfo">
                            {{ get_phrase('Showing') . ' ' . count($enroll_history) . ' ' . get_phrase('of') . ' ' . $enroll_history->total() . ' ' . get_phrase('data') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="d-flex justify-content-end gap-3">
                        <form action="{{ route('admin.enroll.history') }}" method="get" class="w-100 d-flex justify-content-between">
                            <div class="flex-grow-1 h-100">
                                <div class="row">
                                    <div class="offset-0 offset-md-3 col-sm-12 col-md-9">
                                        <div class="position-relative position-relative">
                                            <input type="text" class="form-control ol-form-control daterangepicker w-100" name="eDateRange" value="{{ date('m/d/Y', $start_date) . ' - ' . date('m/d/Y', $end_date) }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="custom-dropdown">
                            <button class="dropdown-header btn ol-btn-light">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.26255 1.74692C7.41248 1.79522 7.50008 1.9436 7.50008 2.10111V5.83336C7.50008 7.67431 8.99247 9.1667 10.8334 9.1667H13.7624C13.9313 9.1667 14.0884 9.26784 14.1257 9.43261C14.1528 9.55245 14.1668 9.67574 14.1668 9.80035V10.222C14.1668 10.334 14.1193 10.4393 14.0498 10.5271C13.8621 10.7639 13.7501 11.0633 13.7501 11.3889C13.7501 11.7724 13.4392 12.0834 13.0556 12.0834H8.33342C7.41294 12.0834 6.66675 12.8295 6.66675 13.75C6.66675 14.6705 7.41294 15.4167 8.33342 15.4167H13.0556C13.4392 15.4167 13.7501 15.7276 13.7501 16.1111C13.7501 16.3002 13.7879 16.4805 13.8563 16.6448C13.909 16.7713 13.9252 16.9155 13.8592 17.0356C13.4342 17.8091 12.6117 18.3334 11.6668 18.3334H4.16675C2.78604 18.3334 1.66675 17.2141 1.66675 15.8334V4.16669C1.66675 2.78597 2.78604 1.66669 4.16675 1.66669H6.75164C6.92693 1.66669 7.09913 1.69429 7.26255 1.74692Z" />
                                    <g opacity="0.5">
                                        <path d="M12.2213 7.50006C12.401 7.50006 12.4964 7.28767 12.377 7.15332L9.53071 3.95126C9.40344 3.80809 9.16667 3.89811 9.16667 4.08967V5.83339C9.16667 6.75387 9.91286 7.50006 10.8333 7.50006H12.2213Z" />
                                        <path
                                            d="M16.0059 11.0775C15.6805 10.752 15.1528 10.752 14.8274 11.0775C14.502 11.4029 14.502 11.9305 14.8274 12.256L15.4882 12.9167H8.33333C7.8731 12.9167 7.5 13.2898 7.5 13.75C7.5 14.2103 7.8731 14.5834 8.33333 14.5834H15.4882L14.8274 15.2441C14.502 15.5696 14.502 16.0972 14.8274 16.4226C15.1528 16.7481 15.6805 16.7481 16.0059 16.4226L18.0893 14.3393C18.4147 14.0139 18.4147 13.4862 18.0893 13.1608L16.0059 11.0775Z" />
                                    </g>
                                </svg>
                                <span class="d-none d-sm-inline-block">{{ get_phrase('Export') }}</span>
                            </button>
                            <ul class="dropdown-list">
                                <li>
                                    <a class="dropdown-item export-btn" href="#" onclick="downloadPDF('.print-table', 'enroll-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item export-btn" href="#" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    @if ($enroll_history->count() > 0)
                        <div class="table-responsive enroll_history overflow-auto" id="enroll_history">
                            <table class="table eTable eTable-2 print-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ get_phrase('Name') }}</th>
                                        <th scope="col">{{ get_phrase('Enrolled Course') }}</th>
                                        <th scope="col">{{ get_phrase('Enrolled Date') }}</th>
                                        <th scope="col">{{ get_phrase('Expiry Date') }}</th>
                                        <th class="print-d-none" scope="col">{{ get_phrase('Option') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enroll_history as $key => $row)
                                        <tr>
                                            <th scope="row">
                                                <p class="row-number">{{ ++$key }}</p>
                                            </th>
                                            <td>
                                                <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                    <div class="dAdmin_profile_img">
                                                        <img class="img-fluid rounded-circle image-45" width="45" height="45" src="{{ get_image($row->photo) }}" />
                                                    </div>
                                                    <div class="ms-1">
                                                        <h4 class="title fs-14px">{{ get_user_info($row->user_id)->name }}</h4>
                                                        <p class="sub-title2 text-12px">{{ get_user_info($row->user_id)->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dAdmin_info_name min-w-250px">
                                                    <p><a href="{{ route('admin.course.edit', $row->course_id) }}" target="_blank">{{ get_course_info($row->course_id)->title }}</a>
                                                    </p>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="dAdmin_info_name min-w-250px">
                                                    <p>{{ date('F d Y', $row->entry_date) }}</p>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="dAdmin_info_name min-w-250px">
                                                    @if ($row->expiry_date)
                                                        <p>{{ date('F d Y', $row->expiry_date) }}</p>
                                                    @else
                                                        <span class="badge rounded-pill text-bg-success">{{ get_phrase('Lifetime access') }}</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="print-d-none">
                                                <div class="adminTable-action">
                                                    <button type="button" class="btn ol-btn-light ol-icon-btn" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" onclick="confirmModal('{{ route('admin.enroll.history.delete', $row->id) }}')">
                                                        <i class="fi-rr-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center p-3">
                            <p class="admin-tInfo">
                                {{ get_phrase('Showing') . ' ' . count($enroll_history) . ' ' . get_phrase('of') . ' ' . $enroll_history->total() . ' ' . get_phrase('data') }}
                            </p>
                            {{ $enroll_history->links() }}
                        </div>
                    @else
                        @include('admin.no_data')
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')

    <script type="text/javascript">
        "use strict";

        $(function() {
            $('.daterangepicker:not(.inited)').daterangepicker();
        });

        function Export() {
            const element = document.getElementById("enroll_history");
            var clonedElement = element.cloneNode(true);
            $(clonedElement).css("display", "block");
            var opt = {
                margin: 1,
                filename: 'enroll_history_{{ date('y-m-d') }}.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                }
            };

            html2pdf().set(opt).from(clonedElement).save();
            clonedElement.remove();
        }


        function printableDiv(printableAreaDivId) {
            var printContents = document.getElementById(printableAreaDivId).innerHTML;
            var originalContents = document.body.innerHTML;

            window.print();
            document.body.innerHTML = originalContents;
        }

        function update_date_range() {
            var x = $("#selectedValue").html();
            $("#date_range").val(x);
        }
    </script>
@endpush
