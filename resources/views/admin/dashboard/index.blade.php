@extends('layouts.admin')
@push('title', get_phrase('Dashboard'))

@section('content')
    <div class="row">
        <div class="col-12">
            <h4 class="section-title">{{ get_phrase('Dashboard') }}</h4>
        </div>
    </div>

    <div class="row g-2 g-sm-3 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 mb-3">
        <div class="col">
            <div class="ol-card card-hover widget">
                <div class="ol-card-body px-20px py-3">
                    <p class="sub-title fs-14px">{{ get_phrase('Total Courses') }}</p>
                    <p class="title card-title-hover fs-18px my-2">{{ App\Models\Course::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="ol-card card-hover widget">
                <div class="ol-card-body px-20px py-3">
                    <p class="sub-title fs-14px">{{ get_phrase('Total Lessons') }}</p>
                    <p class="title card-title-hover fs-18px my-2">{{ App\Models\Lesson::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="ol-card card-hover widget">
                <div class="ol-card-body px-20px py-3">
                    <p class="sub-title fs-14px">{{ get_phrase('Total Enrollments') }}</p>
                    <p class="title card-title-hover fs-18px my-2">{{ App\Models\Enrollment::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="ol-card card-hover widget">
                <div class="ol-card-body px-20px py-3">
                    <p class="sub-title fs-14px">{{ get_phrase('Total Students') }}</p>
                    <p class="title card-title-hover fs-18px my-2">{{ App\Models\User::where('role', 'student')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="ol-card card-hover widget">
                <div class="ol-card-body px-20px py-3">
                    <p class="sub-title fs-14px">{{ get_phrase('Total Instructors') }}</p>
                    <p class="title card-title-hover fs-18px my-2">{{ App\Models\User::where('role', 'instructor')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="ol-card p-3">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="title fs-14px">{{ get_phrase('Admin Revenue This Year') }}</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="btn-link" href="{{ route('admin.revenue') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ get_phrase('Admin Revenue') }}"><i class="fi-rr-arrow-alt-right"></i></a>
                    </div>
                </div>
                <div class="ol-card-body">
                    <canvas id="myChart" class="mw-100 w-100" height="320px"></canvas>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>


    <div class="row my-3">
        <div class="col-md-5">
            <div class="ol-card">
                <div class="ol-card-body p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="title fs-14px">{{ get_phrase('Course Status') }}</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a class="btn-link" href="{{ route('admin.courses') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ get_phrase('Explore Courses') }}"><i class="fi-rr-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center g-30px flex-wrap flex-xl-nowrap justify-content-center">
                        <div class="pie-chart-sm">
                            <canvas id="pie2"></canvas>
                        </div>
                        <div class="pie-chart-sm-details">
                            <ul class="color-info-list">
                                <li>
                                    <span class="info-list-color bg-active"></span>
                                    <span class="title2 fs-14px">{{ get_phrase('Active') }}</span>
                                </li>
                                <li>
                                    <span class="info-list-color bg-upcoming"></span>
                                    <span class="title2 fs-14px">{{ get_phrase('Upcoming') }}</span>
                                </li>
                                <li>
                                    <span class="info-list-color bg-pending"></span>
                                    <span class="title2 fs-14px">{{ get_phrase('Pending') }}</span>
                                </li>
                                <li>
                                    <span class="info-list-color bg-private"></span>
                                    <span class="title2 fs-14px">{{ get_phrase('Private') }}</span>
                                </li>
                                <li>
                                    <span class="info-list-color bg-draft"></span>
                                    <span class="title2 fs-14px">{{ get_phrase('Draft') }}</span>
                                </li>
                                <li>
                                    <span class="info-list-color bg-inactive"></span>
                                    <span class="title2 fs-14px">{{ get_phrase('Inactive') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="ol-card" id = 'unpaid-instructor-revenue'>
                <div class="ol-card-body p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="title text-14px mb-3">{{ get_phrase('Pending Requested withdrawal') }}</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a class="btn-link" href="{{ route('admin.instructor.payout') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ get_phrase('Instructor Payout') }}"><i class="fi-rr-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-hover mb-0">
                            <tbody>
                                @php
                                    $payouts = App\Models\Payout::where('status', '!=', 1)->limit(20)->orderBy('id')->get();
                                @endphp
                                @foreach ($payouts as $payout)
                                    <tr>
                                        <td>
                                            <p class="title fs-14px">{{ get_phrase('Name') }}: {{ $payout->user->name }}</p>
                                            <small>{{ get_phrase('Email') }}: <span class="text-muted font-13">{{ $payout->user->email }}</span></small>
                                        </td>
                                        <td>
                                            <p class="title fs-14px">{{ currency($payout->amount) }}</p>
                                            <small><span class="text-muted font-13">{{ get_phrase('Requested withdrawal amount') }}</span></small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $courses = App\Models\Course::get()->groupBy('status');
        $active = isset($courses['active']) ? $courses['active']->count() : 0;
        $upcoming = isset($courses['upcoming']) ? $courses['upcoming']->count() : 0;
        $pending = isset($courses['pending']) ? $courses['pending']->count() : 0;
        $private = isset($courses['private']) ? $courses['private']->count() : 0;
        $draft = isset($courses['draft']) ? $courses['draft']->count() : 0;
        $inactive = isset($courses['inactive']) ? $courses['inactive']->count() : 0;

    @endphp
@endsection

@push('js')
    {{-- Oliv template start --}}
    <script src="{{ asset('assets/backend/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/chart-js/chart.js') }}"></script>
    {{-- Oliv template end --}}


    <script>
        "use strict";

        const xValues = [0, "January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
        ];
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: "{{ get_phrase('Admin revenue') }}",
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: <?php print_r(json_encode($monthly_amount)); ?>
                }]
            },
            options: {
                legend: {
                    display: true
                },
            }
        });


        // Pie Chart 2
        const project_progress2 = document.getElementById('pie2');
        const progressData2 = {
            labels: ['Active', 'Upcoming', 'Pending', 'Private', 'Draft', 'Inactive'],
            data: [{{ $active }}, {{ $upcoming }}, {{ $pending }}, {{ $private }}, {{ $draft }}, {{ $inactive }}],
        };
        var barColors = [
            "#0ce5ad",
            "#1b84ff",
            "#ff2583",
            "#000",
            "#878d97",
            "#dadada",
        ];
        new Chart(project_progress2, {
            type: 'doughnut',
            data: {
                labels: progressData2.labels,
                datasets: [{
                    backgroundColor: barColors,
                    label: ' {{ get_phrase('Courses') }}',
                    data: progressData2.data,
                }, ],
            },
            options: {
                responsive: true,
                borderWidth: 5,
                hoverBorderColor: '#fff',
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    </script>
@endpush
