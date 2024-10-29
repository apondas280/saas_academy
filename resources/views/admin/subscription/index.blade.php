@extends('layouts.admin')
@push('title', get_phrase('Subscription Details'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    {{ get_phrase('Subscription Details') }}
                </h4>
            </div>
        </div>
    </div>


    @php
        $package = DB::table('grow_up_lms_subscriptions')->first();
        $package = $package ? json_decode($package->payload, true) : [];
    @endphp

    <div class="ol-card p-3">
        <div class="ol-card-body">
            <div class="package-card">
                <div class="head">
                    <div class="row">
                        <div class="col-sm-8 col-md-9 col-xxl-10 order-2 order-sm-1">
                            <h1 class="title">
                                {{ $package['package']['subtitle'] }} ({{ $package['package']['title'] }})
                                <span class="type ms-3">{{ $package['package']['interval'] }}</span>
                            </h1>

                            <span class="badge rounded-pill text-bg-success mb-3">{{ get_phrase('Active') }}</span>

                            <p class="info">{{ get_phrase('Issue Date : ') }} {{ date('d F Y', strtotime($package['created_at'])) }}</p>
                            <p class="info">{{ get_phrase('Expiry Date : ') }} {{ date('d F Y', strtotime($package['expiry'])) }}</p>
                        </div>

                        <div class="col-sm-4 col-md-3 col-xxl-2 order-1 mb-3 mb-sm-0">
                            <a href="#" class="upgrade-btn w-100 text-center">{{ get_phrase('Manage Plan') }}</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="storage">
                                <p>
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.70008 8.37422C2.98199 7.85359 3.53303 7.5 4.16667 7.5H15.8333C16.6833 7.5 17.3846 8.13618 17.4871 8.95833C17.4956 9.02658 17.5 9.09611 17.5 9.16667V10C17.5 10.9205 16.7538 11.6667 15.8333 11.6667H4.16667C3.24619 11.6667 2.5 10.9205 2.5 10V9.16667C2.5 9.09611 2.50438 9.02658 2.51289 8.95833C2.53111 8.81223 2.56824 8.672 2.62175 8.54018C2.64487 8.48322 2.67105 8.42783 2.70008 8.37422ZM4.58333 10.625C5.15863 10.625 5.625 10.1586 5.625 9.58333C5.625 9.00804 5.15863 8.54167 4.58333 8.54167C4.00804 8.54167 3.54167 9.00804 3.54167 9.58333C3.54167 10.1586 4.00804 10.625 4.58333 10.625ZM9.16667 8.75C8.70643 8.75 8.33333 9.1231 8.33333 9.58333C8.33333 10.0436 8.70643 10.4167 9.16667 10.4167H15C15.4602 10.4167 15.8333 10.0436 15.8333 9.58333C15.8333 9.1231 15.4602 8.75 15 8.75H9.16667Z" />
                                            <g opacity="0.5">
                                                <path
                                                    d="M3.61629 5.55806C3.56562 5.71001 3.69888 5.86202 3.85839 5.84739C3.95988 5.83809 4.06271 5.83333 4.16667 5.83333H15.8333C15.9374 5.83333 16.0403 5.8381 16.1418 5.84741C16.3013 5.86205 16.4346 5.71003 16.3839 5.55808L15.7809 3.75C15.5959 3.03116 14.9434 2.5 14.1668 2.5H5.83344C5.05684 2.5 4.4043 3.03116 4.21928 3.75L3.61629 5.55806Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.8333 13.3333H4.16667C3.31675 13.3333 2.61541 13.9695 2.51289 14.7917C2.50438 14.8599 2.5 14.9294 2.5 15V15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5H15.8333C16.7538 17.5 17.5 16.7538 17.5 15.8333V15C17.5 14.9294 17.4956 14.8599 17.4871 14.7917C17.3846 13.9695 16.6833 13.3333 15.8333 13.3333ZM5.625 15.4167C5.625 15.992 5.15863 16.4583 4.58333 16.4583C4.00804 16.4583 3.54167 15.992 3.54167 15.4167C3.54167 14.8414 4.00804 14.375 4.58333 14.375C5.15863 14.375 5.625 14.8414 5.625 15.4167ZM8.33333 15.4167C8.33333 14.9564 8.70643 14.5833 9.16667 14.5833H15C15.4602 14.5833 15.8333 14.9564 15.8333 15.4167C15.8333 15.8769 15.4602 16.25 15 16.25H9.16667C8.70643 16.25 8.33333 15.8769 8.33333 15.4167Z" />
                                            </g>
                                        </svg>
                                    </span>

                                    <span class="used-size">{{ get_remaining_storage() }}</span>
                                    {{ get_phrase('free of') }}
                                    {{ get_company_allowed_storage() }}
                                </p>

                                <div class="user-details w-100">
                                    <div class="course-progress mb-0">
                                        <div class="progress w-100">
                                            <div class="progress-bar progress-bar-success" style="width: {{ (100 * get_company_storage_usage(false)) / get_company_allowed_storage(false) }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
