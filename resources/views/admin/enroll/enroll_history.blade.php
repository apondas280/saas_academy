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
                        <button type="submit" class="btn ol-btn-primary mt-2">{{ get_phrase('Enroll student') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="ol-card">
        <div class="ol-card-body p-3">
            <div class="row mb-3 mt-3">
                <div class="col-md-6 pt-2 pt-md-0">
                    @if (count($enroll_history) > 0)
                        <div class="custom-dropdown ">
                            <button class="dropdown-header btn ol-btn-light">
                                {{ get_phrase('Export') }}
                                <i class="fi-rr-file-export ms-2"></i>
                            </button>
                            <ul class="dropdown-list">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="downloadPDF('.print-table', 'enroll-history')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <form class="w-100" action="{{ route('admin.enroll.history') }}" method="get" class="d-flex justify-content-between">
                        <div class="row">
                            <div class="col-9">
                                <div class="position-relative position-relative">
                                    <input type="text" class="form-control ol-form-control daterangepicker w-100" name="eDateRange" value="{{ date('m/d/Y', $start_date) . ' - ' . date('m/d/Y', $end_date) }}" />
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn ol-btn-primary w-100" id="submit-button" onclick="update_date_range();"> {{ get_phrase('Filter') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @if (count($enroll_history) > 0)
                        <div class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15">
                            <p class="admin-tInfo">
                                {{ get_phrase('Showing') . ' ' . count($enroll_history) . ' ' . get_phrase('of') . ' ' . $enroll_history->total() . ' ' . get_phrase('data') }}
                            </p>
                        </div>
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
                                                        <p><span class="badge bg-success text-white">{{ get_phrase('Lifetime access') }}</span>
                                                        </p>
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
                    @else
                        @include('admin.no_data')
                    @endif
                    <!-- Data info and Pagination -->
                    @if (count($enroll_history) > 0)
                        <div class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15">
                            <p class="admin-tInfo">
                                {{ get_phrase('Showing') . ' ' . count($enroll_history) . ' ' . get_phrase('of') . ' ' . $enroll_history->total() . ' ' . get_phrase('data') }}
                            </p>
                            {{ $enroll_history->links() }}

                        </div>
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

            // Choose the element that our invoice is rendered in.
            const element = document.getElementById("enroll_history");

            // clone the element
            var clonedElement = element.cloneNode(true);

            // change display of cloned element
            $(clonedElement).css("display", "block");

            // Choose the clonedElement and save the PDF for our user.
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

            // New Promise-based usage:
            html2pdf().set(opt).from(clonedElement).save();

            // remove cloned element
            clonedElement.remove();
        }


        function printableDiv(printableAreaDivId) {
            var printContents = document.getElementById(printableAreaDivId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        function update_date_range() {
            var x = $("#selectedValue").html();
            $("#date_range").val(x);
        }
    </script>
@endpush
