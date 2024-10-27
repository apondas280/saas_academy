@extends('layouts.admin')
@push('title', get_phrase('Offline payments'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    <!-- Mani section header and breadcrumb -->
    <div class="row print-d-none">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    <span>{{ get_phrase('Offline payments') }}</span>
                </h4>
            </div>
        </div>
    </div>


    <div class="ol-card">
        <div class="ol-card-body mb-5">

            <div class="row p-3">
                <div class="col-md-4 d-md-flex align-items-center mb-3 mb-md-0">
                    <div class="admin-tInfo-pagi">
                        <p class="admin-tInfo">
                            {{ get_phrase('Showing') . ' ' . count($payments) . ' ' . get_phrase('of') . ' ' . $payments->total() . ' ' . get_phrase('data') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="d-sm-flex mb-3 mb-sm-0 justify-content-md-end gap-3">
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
                                        <a class="dropdown-item export-btn" href="#" onclick="downloadPDF('.print-table', 'offline-payment-history')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
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
                    @if ($payments->count() > 0)
                        <div class="table-responsive course_list" id="course_list">
                            <table class="table eTable eTable-2 print-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ get_phrase('User') }}</th>
                                        <th scope="col">{{ get_phrase('Items') }}</th>
                                        <th scope="col">{{ get_phrase('Total') }}</th>
                                        <th scope="col">{{ get_phrase('Issue date') }}</th>
                                        <th scope="col">{{ get_phrase('Payment info') }}</th>
                                        <th scope="col">{{ get_phrase('Status') }}</th>
                                        <th scope="col" class="print-d-none">{{ get_phrase('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $key => $payment)
                                        <tr>
                                            <th scope="row">
                                                <p class="row-number">{{ $key + 1 }}</p>
                                            </th>

                                            <td>
                                                <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                    <div class="dAdmin_profile_name">
                                                        <h4 class="title fs-14px">
                                                            {{ get_user_info($payment->user_id)->name }}
                                                        </h4>
                                                        <p class="sub-title text-12px">
                                                            {{ get_user_info($payment->user_id)->email }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                    <div class="dAdmin_profile_name">
                                                        @php
                                                            if ($payment->item_type == 'course') {
                                                                $items = App\Models\Course::whereIn('id', json_decode($payment->items, true))->get();
                                                            } elseif ($payment->item_type == 'bootcamp') {
                                                                $items = App\Models\Bootcamp::where('id', $payment->items)->get();
                                                            }
                                                        @endphp
                                                        @foreach ($items as $item)
                                                            <p class="sub-title text-12px">
                                                                <a href="{{ route('course.details', Str::slug($item->title)) }}" class="me-3 text-muted">{{ $item->title }} </a>
                                                                @if ($item->discount_flag)
                                                                    <del class="text-muted me-3">{{ currency($item->price) }}</del>
                                                                    <span class="text-danger">{{ currency($item->price - $item->discounted_price) }}</span>
                                                                @else
                                                                    <span>{{ currency($item->price) }}</span>
                                                                @endif
                                                            </p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="sub-title2 text-12px">
                                                    {{ currency($payment->total_amount) }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="sub-title2 text-12px">
                                                    <p>{{ date('d-M-y', strtotime($payment->created_at)) }}</p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="sub-title text-12px">
                                                    <p>
                                                        {{ get_phrase('Phone : ') }}
                                                        {{ $payment->phone_no ? $payment->phone_no : get_phrase('N/A') }}
                                                    </p>
                                                    <p>
                                                        {{ get_phrase('Bank : ') }}
                                                        {{ $payment->bank_no ? $payment->bank_no : get_phrase('N/A') }}
                                                    </p>
                                                </div>
                                            </td>

                                            <td>
                                                @if ($payment->status == 1)
                                                    <span class="badge rounded-pill text-bg-success">{{ get_phrase('Accepted') }}</span>
                                                @elseif($payment->status == 2)
                                                    <span class="badge rounded-pill text-bg-danger">{{ get_phrase('Suspended') }}</span>
                                                @else
                                                    <span class="badge rounded-pill text-bg-warning">{{ get_phrase('Pending') }}</span>
                                                @endif
                                            </td>

                                            <td class="print-d-none">
                                                <div class="dropdown ol-icon-dropdown ol-icon-dropdown-transparent">
                                                    <button class="btn ol-btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span class="fi-rr-menu-dots-vertical"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" style="">
                                                        <li><a class="dropdown-item" href="{{ route('admin.offline.payment.doc', $payment->id) }}">{{ get_phrase('Download') }}</a>
                                                        </li>

                                                        @if ($payment->status == 0 || $payment->status == 2)
                                                            <li><a class="dropdown-item" href="#" onclick="confirmModal('{{ route('admin.offline.payment.accept', $payment->id) }}')">{{ get_phrase('Accept') }}</a>
                                                            </li>
                                                        @endif

                                                        @if ($payment->status == 1)
                                                            <li><a class="dropdown-item" href="#" onclick="confirmModal('{{ route('admin.offline.payment.decline', $payment->id) }}')">{{ get_phrase('Suspend') }}</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <div class="d-flex justify-content-between align-items-center p-3">
                            <p class="admin-tInfo">
                                {{ get_phrase('Showing') . ' ' . count($payments) . ' ' . get_phrase('of') . ' ' . $payments->total() . ' ' . get_phrase('data') }}
                            </p>
                            {{ $payments->links() }}
                        </div>
                    @else
                        @include('admin.no_data')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection()
