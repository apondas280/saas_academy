@extends('layouts.instructor')
@push('title', get_phrase('Payout report'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    <!-- start page title -->
    <div class="row print-d-none">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between flex-md-nowrap flex-wrap gap-3">
                <h4 class="section-title">
                    {{ get_phrase('Payout') }}
                </h4>

                @if ($payout_request)
                    <a onclick="confirmModal('{{ route('instructor.payout.delete', $payout_request->id) }}')" href="javascript:void(0)" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-minus"></span>
                        {{ get_phrase('Delete request') }}</a>
                @else
                    <a href="#" onclick="ajaxModal('{{ route('modal', ['instructor.payout_report.withdrawal']) }}', '{{ get_phrase('Request a new withdrawal') }}')" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Request withdrawal') }}</span>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="row print-d-none">
        <div class="col-12">
            <div class="row g-2 g-sm-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 mb-3">
                <div class="col">
                    <div class="ol-card card-hover h-100">
                        <div class="ol-card-body py-12px px-3">
                            <div class="d-flex align-items-center cg-12px">
                                <div class="ol-card-icon d-inline-flex">
                                    <span class="icon fi fi-rr-sack-dollar fs-2 d-inline-flex"></span>
                                </div>
                                <div>
                                    <h6 class="title fs-14px mb-1">{{ get_phrase('Available') }}</h6>
                                    <p class="sub-title fs-14px fw-semibold">{{ currency(number_format($balance, 2)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="ol-card card-hover h-100">
                        <div class="ol-card-body py-12px px-3">
                            <div class="d-flex align-items-center cg-12px">
                                <div class="ol-card-icon d-inline-flex">
                                    <span class="icon fi fi-rr-sack-dollar fs-2 d-inline-flex"></span>
                                </div>
                                <div>
                                    <h6 class="title fs-14px mb-1">{{ get_phrase('Total payout') }}</h6>
                                    <p class="sub-title fs-14px fw-semibold">{{ currency(number_format($total_payout, 2)) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="ol-card card-hover h-100">
                        <div class="ol-card-body py-12px px-3">
                            <div class="d-flex align-items-center cg-12px">
                                <div class="ol-card-icon d-inline-flex">
                                    <span class="icon fi fi-rr-sack-dollar fs-2 d-inline-flex"></span>
                                </div>
                                <div>
                                    <h6 class="title fs-14px mb-1">{{ get_phrase('Requested') }}</h6>
                                    <p class="sub-title fs-14px fw-semibold">
                                        {{ currency(number_format($payout_request->amount ?? 0, 2)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ol-card">
        <div class="ol-card-body mb-5">

            <div class="row p-3">
                <div class="col-md-4 d-md-flex align-items-center mb-3 mb-md-0">
                    <div class="admin-tInfo-pagi">
                        <p class="admin-tInfo">
                            {{ get_phrase('Showing') . ' ' . count($payout_reports) . ' ' . get_phrase('of') . ' ' . $payout_reports->total() . ' ' . get_phrase('data') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="d-sm-flex mb-3 mb-sm-0 justify-content-md-end gap-3">
                        <form action="{{ route('instructor.payout.reports') }}" method="get" class="w-100 d-flex justify-content-between">
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


                        <div class="d-flex gap-3 mt-3 mt-sm-0">
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
                                    {{ get_phrase('Export') }}
                                </button>
                                <ul class="dropdown-list">
                                    <li>
                                        <a class="dropdown-item export-btn" href="#" onclick="downloadPDF('.print-table', 'coupon-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item export-btn" href="#" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-md-12">
                    @if ($payout_reports->count() > 0)
                        <div class="table-responsive">
                            <table class="eTable eTable-2 print-table table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ get_phrase('Payout amount') }}</th>
                                        <th>{{ get_phrase('Payment type') }}</th>
                                        <th>{{ get_phrase('Date processed') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payout_reports as $key => $row)
                                        <tr class="gradeU">
                                            <td> {{ ++$key }}</td>
                                            <td>
                                                <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                    <div class="dAdmin_profile_name">
                                                        <h4 class="title fs-14px">
                                                            {{ currency(number_format($row->amount, 2)) }}
                                                        </h4>
                                                        <p>
                                                            {{ date('D, d M Y', strtotime($row->created_at)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($row->status == 0)
                                                    <p class="badge rounded-pill text-bg-danger">{{ get_phrase('Pending') }}</p>
                                                @endif
                                                {{ ucfirst($row->payment_type) }}
                                            </td>
                                            <td>
                                                @if ($row->status == 0)
                                                    <p class="badge rounded-pill text-bg-danger">{{ get_phrase('Pending') }}</p>
                                                @else
                                                    {{ date('D, d M Y', strtotime($row->updated_at)) }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center p-3">
                            <p class="admin-tInfo">
                                {{ get_phrase('Showing') . ' ' . count($payout_reports) . ' ' . get_phrase('of') . ' ' . $payout_reports->total() . ' ' . get_phrase('data') }}
                            </p>
                            {{ $payout_reports->links() }}
                        </div>
                    @else
                        @include('instructor.no_data')
                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection
@push('js')
    <script type="text/javascript">
        function update_date_range() {
            var x = $("#selectedValue").html();
            $("#date_range").val(x);
        }
    </script>
@endpush
