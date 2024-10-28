@extends('layouts.admin')
@push('title', get_phrase('Instructor payout'))
@push('meta')@endpush
@push('css')@endpush
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    {{ get_phrase('Instructor Payout') }}
                </h4>
            </div>
        </div>
    </div>

    <div class="ol-card p-3">
        <div class="ol-card-body">

            <div class="row mt-4">
                <div class="col-md-12">
                    <ul class="nav nav-tabs eNav-Tabs-custom eTab" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active show" id="cHome-tab" data-bs-toggle="tab" data-bs-target="#cHome" type="button" role="tab" aria-controls="cHome" aria-selected="true">
                                {{ get_phrase('Pending payouts') }}
                                <span></span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="cProfile-tab" data-bs-toggle="tab" data-bs-target="#cProfile" type="button" role="tab" aria-controls="cProfile" aria-selected="false">
                                {{ get_phrase('Completed payouts') }}
                                <span></span>
                            </button>
                        </li>
                    </ul>


                    <div class="tab-content eNav-Tabs-content" id="myTabContent">


                        <div class="tab-pane fade show active" id="cHome" role="tabpanel" aria-labelledby="cHome-tab">
                            <div class="row mt-3">
                                <div class="col-md-4 d-md-flex align-items-center mb-3 mb-md-0">
                                    <div class="admin-tInfo-pagi">
                                        <p class="admin-tInfo">
                                            {{ get_phrase('Showing') . ' ' . count($instructor_payout_incomplete) . ' ' . get_phrase('of') . ' ' . $instructor_payout_incomplete->total() . ' ' . get_phrase('data') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="d-flex justify-content-end gap-3">
                                        <form action="{{ route('admin.instructor.payout.filter') }}" method="get" class="w-100 d-flex justify-content-between">
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
                                                    <a class="dropdown-item export-btn" href="#" onclick="downloadPDF('.print-table', 'instructor-payment-pending')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item export-btn" href="#" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (count($instructor_payout_incomplete) > 0)
                                <div class="table-responsive purchase_list mt-3" id="purchase_list">
                                    <table class="table eTable eTable-2 print-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ get_phrase('Name') }}</th>
                                                <th scope="col">{{ get_phrase('Payout amount') }}</th>
                                                <th scope="col">{{ get_phrase('	Payout date') }}</th>
                                                <th scope="col" class="print-d-none text-center">{{ get_phrase('Option') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($instructor_payout_incomplete as $key => $instructor_payout_incompleted)
                                                <tr>
                                                    <th scope="row">
                                                        <p class="row-number">{{ ++$key }}</p>
                                                    </th>
                                                    <td>
                                                        <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                            <div class="dAdmin_profile_img">
                                                                <img class="img-fluid rounded-circle image-45" width="45" height="45" src="{{ get_image_by_id($instructor_payout_incompleted->user_id) }}" />
                                                            </div>
                                                            <div class="ms-1">
                                                                <h4 class="title fs-14px">{{ get_user_info($instructor_payout_incompleted->user_id)->name }}</h4>
                                                                <p class="sub-title2 text-12px">{{ get_user_info($instructor_payout_incompleted->user_id)->email }}</p>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="dAdmin_info_name min-w-250px mr-50">
                                                            <p>{{ currency($instructor_payout_incompleted->amount) }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dAdmin_info_name min-w-250px">
                                                            <p>{{ date('D, d M Y', strtotime($instructor_payout_incompleted->created_at)) }}
                                                            </p>
                                                        </div>
                                                    </td>

                                                    <td class="print-d-none">
                                                        <form action="{{ route('admin.instructor.payment') }}" method="post" class="d-flex justify-content-center">
                                                            @csrf
                                                            <input type="hidden" name="user_id" value="{{ $instructor_payout_incompleted->user_id }}">
                                                            <input type="hidden" name="amount" value="{{ $instructor_payout_incompleted->amount }}">
                                                            <input type="hidden" name="payout_id" value="{{ $instructor_payout_incompleted->id }}">
                                                            <button type="submit" class="btn ol-btn-outline-secondary">
                                                                <i class="fi-rr-credit-card"></i>
                                                                {{ get_phrase('Pay') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>

                                                <th></th>
                                                <th></th>
                                                <th>{{ get_phrase('Total') }} :
                                                    {{ currency(App\Models\Payout::where('status', 0)->sum('amount')) }}
                                                </th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <p class="admin-tInfo">
                                        {{ get_phrase('Showing') . ' ' . count($instructor_payout_incomplete) . ' ' . get_phrase('of') . ' ' . $instructor_payout_incomplete->total() . ' ' . get_phrase('data') }}
                                    </p>
                                    {{ $instructor_payout_incomplete->links() }}
                                </div>
                            @else
                                @include('admin.no_data')
                            @endif
                        </div>


                        <div class="tab-pane fade " id="cProfile" role="tabpanel" aria-labelledby="cProfile-tab">
                            <div class="row mt-3">
                                <div class="col-md-4 d-md-flex align-items-center mb-3 mb-md-0">
                                    <div class="admin-tInfo-pagi">
                                        <p class="admin-tInfo">
                                            {{ get_phrase('Showing') . ' ' . count($instructor_payout_complete) . ' ' . get_phrase('of') . ' ' . $instructor_payout_complete->total() . ' ' . get_phrase('data') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="d-flex justify-content-end gap-3">
                                        <form action="{{ route('admin.instructor.payout.filter') }}" method="get" class="w-100 d-flex justify-content-between">
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
                                                    <a class="dropdown-item export-btn" href="#" onclick="downloadPDF('.print-table', 'instructor-payment-pending')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item export-btn" href="#" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (count($instructor_payout_incomplete) > 0)
                                <div class="table-responsive purchase_list mt-3" id="purchase_list">
                                    <table class="table eTable eTable-2 print-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ get_phrase('Name') }}</th>
                                                <th scope="col">{{ get_phrase('Payout amount') }}</th>
                                                <th scope="col">{{ get_phrase('Payment type') }}</th>
                                                <th scope="col">{{ get_phrase('	Payout date') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($instructor_payout_incomplete as $key => $instructor_payouts)
                                                <tr>
                                                    <th scope="row">
                                                        <p class="row-number">{{ ++$key }}</p>
                                                    </th>
                                                    <td>
                                                        <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                            <div class="dAdmin_profile_img">
                                                                <img class="img-fluid rounded-circle image-45" width="45" height="45" src="{{ get_image_by_id($instructor_payouts->user_id) }}" />
                                                            </div>
                                                            <div class="ms-1">
                                                                <h4 class="title fs-14px">{{ get_user_info($instructor_payouts->user_id)->name }}</h4>
                                                                <p class="sub-title2 text-12px">{{ get_user_info($instructor_payouts->user_id)->email }}</p>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="dAdmin_info_name min-w-250px">
                                                            <p>{{ currency($instructor_payouts->amount) }}</p>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dAdmin_info_name min-w-250px">
                                                            @if ($instructor_payouts->status != 0)
                                                                <p> {{ get_phrase('Paid') }} </p>
                                                            @else
                                                                <p> {{ get_phrase('Pending') }} </p>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dAdmin_info_name min-w-250px">
                                                            <p>{{ date('D, d M Y', strtotime($instructor_payouts->updated_at)) }}
                                                            </p>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>

                                                <th></th>
                                                <th></th>
                                                <th>{{ get_phrase('Total') }} :
                                                    {{ currency(App\Models\Payout::where('status', 0)->sum('amount')) }}
                                                </th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <p class="admin-tInfo">
                                        {{ get_phrase('Showing') . ' ' . count($instructor_payout_complete) . ' ' . get_phrase('of') . ' ' . $instructor_payout_complete->total() . ' ' . get_phrase('data') }}
                                    </p>
                                    {{ $instructor_payout_complete->links() }}
                                </div>
                            @else
                                @include('admin.no_data')
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        "use strict";

        function update_date_range() {
            var x = $("#selectedValue").html();
            $("#date_range").val(x);
        }
    </script>
@endpush
