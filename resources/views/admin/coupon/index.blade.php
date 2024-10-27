@extends('layouts.admin')
@push('title', get_phrase('Coupon'))
@push('meta')@endpush
@push('css')@endpush


@section('content')
    <!-- Mani section header and breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    <span>{{ get_phrase('Coupon') }}</span>
                </h4>
                <a href="javascript:void(0)" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px" onclick="ajaxModal('{{ route('modal', ['admin.coupon.create']) }}', '{{ get_phrase('Add Coupon') }}')">
                    <span class="fi-rr-plus"></span>
                    <span>{{ get_phrase('Add Coupon') }}</span>
                </a>
            </div>
        </div>
    </div>


    <div class="ol-card">
        <div class="ol-card-body mb-5">

            <div class="row p-3">
                <div class="col-md-4 d-md-flex align-items-center mb-3 mb-md-0">
                    <div class="admin-tInfo-pagi">
                        <p class="admin-tInfo">
                            {{ get_phrase('Showing') . ' ' . count($coupons) . ' ' . get_phrase('of') . ' ' . $coupons->total() . ' ' . get_phrase('data') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="d-flex justify-content-md-end gap-3">
                        <form action="{{ route('admin.coupons') }}" method="get" class="">
                            <div class="search-input flex-grow-1 h-100">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search Title') }}" class="ol-form-control form-control h-100" />

                                <span class="search-icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.7468 4.0865C13.8622 6.20184 13.8622 9.63149 11.7468 11.7468C9.63149 13.8622 6.20184 13.8622 4.0865 11.7468C1.97117 9.63149 1.97117 6.20184 4.0865 4.0865C6.20184 1.97117 9.63149 1.97117 11.7468 4.0865ZM6.3172 6.3172C7.20053 5.43387 8.63269 5.43387 9.51602 6.3172C9.84145 6.64264 10.3691 6.64264 10.6945 6.3172C11.02 5.99176 11.02 5.46413 10.6945 5.13869C9.16033 3.60449 6.67289 3.60449 5.13869 5.13869C4.81325 5.46413 4.81325 5.99176 5.13869 6.3172C5.46413 6.64264 5.99176 6.64264 6.3172 6.3172Z" />
                                        <path opacity="0.5"
                                            d="M13.3322 12.4829C13.4127 12.3877 13.5578 12.3791 13.646 12.4672L14.3621 13.1833C14.4131 13.2344 14.4868 13.2541 14.5583 13.244C14.9351 13.1911 15.3313 13.3095 15.6211 13.5993L17.1326 15.1108C17.6226 15.6008 17.6226 16.3954 17.1326 16.8854L16.8856 17.1323C16.3956 17.6224 15.6011 17.6224 15.111 17.1323L13.5996 15.6209C13.3098 15.3311 13.1914 14.9349 13.2443 14.5581C13.2543 14.4866 13.2346 14.4129 13.1836 14.3618L12.4675 13.6457C12.3793 13.5576 12.388 13.4124 12.4832 13.3319C12.6349 13.2037 12.7824 13.0682 12.9254 12.9252C13.0684 12.7822 13.204 12.6346 13.3322 12.4829Z" />
                                    </svg>
                                </span>

                                @if (isset($_GET) && count($_GET) > 0)
                                    <a href="{{ route('admin.coupons') }}" class="clear-search" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                                @endif
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


            <div class="row">
                <div class="col-md-12">
                    @if ($coupons->count() > 0)
                        <div class="table-responsive coupon_list" id="coupon_list">
                            <table class="table eTable eTable-2 print-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ get_phrase('Coupon code') }}</th>
                                        <th scope="col">{{ get_phrase('Discount') }}</th>
                                        <th scope="col">{{ get_phrase('Expiry') }}</th>
                                        <th scope="col" class="text-center">{{ get_phrase('Status') }}</th>
                                        <th scope="col" class="print-d-none">{{ get_phrase('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $key => $coupon)
                                        <tr>
                                            <th scope="row">
                                                <p class="row-number">{{ ++$key }}</p>
                                            </th>

                                            <td>
                                                <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                    <div class="dAdmin_profile_name">
                                                        <h4 class="title fs-14px">{{ $coupon->code }}</h4>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="dAdmin_info_name min-w-150px">
                                                    <p>
                                                        {{ $coupon->discount }}
                                                        {{ get_phrase('%') }}
                                                    </p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="dAdmin_info_name min-w-150px">
                                                    <p>{{ date('d-M-Y', $coupon->expiry) }}</p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="dAdmin_info_name min-w-150px text-center">
                                                    <span class="badge rounded-pill text-bg-{{ $coupon->status ? 'success' : 'danger' }}">{{ get_phrase($coupon->status ? 'Active' : 'Inactive') }}</span>
                                                </div>
                                            </td>

                                            <td class="print-d-none">
                                                <div class="dropdown ol-icon-dropdown ol-icon-dropdown-transparent">
                                                    <button class="btn ol-btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span class="fi-rr-menu-dots-vertical"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#" onclick="confirmModal('{{ route('admin.coupon.status', $coupon->id) }}')">{{ get_phrase($coupon->status ? 'Deactivate' : 'Activate') }}</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);" onclick="ajaxModal('{{ route('modal', ['admin.coupon.edit', 'id' => $coupon->id]) }}', '{{ get_phrase('Edit Coupon') }}')">{{ get_phrase('Edit') }}</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);" onclick="confirmModal('{{ route('admin.coupon.delete', $coupon->id) }}')">{{ get_phrase('Delete') }}</a></li>
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
                                {{ get_phrase('Showing') . ' ' . count($coupons) . ' ' . get_phrase('of') . ' ' . $coupons->total() . ' ' . get_phrase('data') }}
                            </p>
                            {{ $coupons->links() }}
                        </div>
                    @else
                        @include('admin.no_data')
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End Admin area -->
@endsection
@push('js')@endpush
