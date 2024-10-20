@extends('layouts.default')
@push('title', get_phrase('Purchase History'))

@section('content')
    <!-- Payment History Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 padding-bottom-110 padding-top-50">

                <div class="col-xl-3 col-lg-4">
                    @include('frontend.default.student.left_sidebar')
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="lms1-card">
                        <h2 class="euclid-title-24px mb-3">{{ get_phrase('Payment History') }}</h2>

                        @if ($payments->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-borderless lms-table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ get_phrase('Course Name') }}</th>
                                            <th scope="col">{{ get_phrase('Date') }}</th>
                                            <th scope="col">{{ get_phrase('Payment Method') }}</th>
                                            <th scope="col">{{ get_phrase('Price') }}</th>
                                            <th scope="col">{{ get_phrase('Invoice') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)
                                            <tr>
                                                <td class="lms-text-black">{{ $payment->course_title }}</td>
                                                <td>{{ date('Y-m-d', strtotime($payment->created_at)) }}</td>
                                                <td>{{ ucfirst($payment->payment_type) }}</td>
                                                <td>{{ currency($payment->amount) }}</td>
                                                <td>
                                                    <a href="{{ route('invoice', $payment->id) }}" class="btn lms1-icon-btn">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.04102 5.83317H13.9577V4.1665C13.9577 2.49984 13.3327 1.6665 11.4577 1.6665H8.54102C6.66602 1.6665 6.04102 2.49984 6.04102 4.1665V5.83317Z" stroke="#6B7385" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M13.3327 12.5V15.8333C13.3327 17.5 12.4993 18.3333 10.8327 18.3333H9.16602C7.49935 18.3333 6.66602 17.5 6.66602 15.8333V12.5H13.3327Z" stroke="#6B7385" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M17.5 8.3335V12.5002C17.5 14.1668 16.6667 15.0002 15 15.0002H13.3333V12.5002H6.66667V15.0002H5C3.33333 15.0002 2.5 14.1668 2.5 12.5002V8.3335C2.5 6.66683 3.33333 5.8335 5 5.8335H15C16.6667 5.8335 17.5 6.66683 17.5 8.3335Z"
                                                                stroke="#6B7385" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14.1673 12.5H13.159H5.83398" stroke="#6B7385" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.83398 9.1665H8.33398" stroke="#6B7385" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="row bg-white radius-10 mx-2">
                                <div class="com-md-12">
                                    @include('frontend.default.empty')
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Payment History Area End -->

@endsection
@push('js')@endpush
