@extends('layouts.default')
@push('title', get_phrase('Invoice'))

@section('content')

    <!-- Top Link Path Area Start -->
    <section class="top-link-path-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-link-path-area2">
                        <div class="top-link-path-inner2">
                            <h1 class="title">{{ get_phrase('Invoice') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                            <a href="{{ route('home') }}">
                                <img src="assets/images/icons/home-white.svg" alt="">
                                {{ get_phrase('Home') }}
                            </a>
                            <a href="{{ route('purchase.history') }}">{{ get_phrase('Invoice') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Link Path Area End -->

    <!-- Payment History Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 padding-bottom-110 padding-top-50">

                <div class="col-xl-3 col-lg-4">
                    @include('frontend.default.student.left_sidebar')
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="lms1-card">
                        <div id="invoice">
                            <div class="d-flex justify-content-between gap-12px flex-wrap mb-50px">
                                <div>
                                    <p class="text-break pop-subtitle-18px mb-2">{{ get_phrase('Invoice') }}#{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</p>
                                    <p class="pop-subtitle-16px">{{ get_phrase('Date') }}: {{ date('d-m-Y', strtotime($invoice->created_at)) }}</p>
                                </div>
                                <!-- <a href="{{ route('home') }}">
                                    <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="logo">
                                </a> -->
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/frontend/default/images/logo.svg') }}" alt="logo">
                                </a>
                            </div>
                            <div class="table-responsive mb-10px">
                                <table class="table table-borderless lms-table-borderless lms2-table-borderless">
                                    <thead>
                                        <tr>
                                        <th scope="col">{{ get_phrase('Item') }}</th>
                                        <th scope="col">{{ get_phrase('Date of issue') }}</th>
                                        <th scope="col">{{ get_phrase('Payment Method') }}</th>
                                        <th scope="col">{{ get_phrase('Price') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="lms-text-black">{{ $invoice->course_title }}</td>
                                            <td>{{ date('d-m-Y', strtotime($invoice->created_at)) }}</td>
                                            <td>{{ ucfirst($invoice->payment_type) }}</td>
                                            <td>{{ currency(number_format($invoice->amount, 2)) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lms-text-black">{{ get_phrase('Bill to :') }}</td>
                                            <td>{{ auth()->user()->name }}</td>
                                            <td class="lms-text-black">{{ get_phrase('Total') }}</td>
                                            <td class="lms-text-black">{{ currency(number_format($invoice->amount, 2)) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-20px align-items-center flex-wrap">
                            <a href="{{ route('purchase.history') }}" class="btn lms2-btn-outline-primary min-w-120px">{{ get_phrase('Back') }}</a>
                            <a href="javascript:void(0);" class="btn lms2-btn-primary d-flex align-items-center justify-content-center gap-2 min-w-120px" onclick="printableDiv('invoice')" id="print">
                            <span>{{ get_phrase('Print') }}</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.04297 6.33317H13.9596V4.6665C13.9596 2.99984 13.3346 2.1665 11.4596 2.1665H8.54297C6.66797 2.1665 6.04297 2.99984 6.04297 4.6665V6.33317Z" stroke="white" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.3346 13V16.3333C13.3346 18 12.5013 18.8333 10.8346 18.8333H9.16797C7.5013 18.8333 6.66797 18 6.66797 16.3333V13H13.3346Z" stroke="white" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.5 8.8335V13.0002C17.5 14.6668 16.6667 15.5002 15 15.5002H13.3333V13.0002H6.66667V15.5002H5C3.33333 15.5002 2.5 14.6668 2.5 13.0002V8.8335C2.5 7.16683 3.33333 6.3335 5 6.3335H15C16.6667 6.3335 17.5 7.16683 17.5 8.8335Z" stroke="white" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.1654 13H13.157H5.83203" stroke="white" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.83203 9.6665H8.33203" stroke="white" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>                           
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Payment History Area End -->

@endsection

@push('js')
    <script>
        "use strict";

        function printableDiv(printableAreaDivId) {
            var printContents = document.getElementById(printableAreaDivId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush