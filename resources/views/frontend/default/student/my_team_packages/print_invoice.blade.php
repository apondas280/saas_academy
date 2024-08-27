@extends('layouts.default')
@push('title', get_phrase('Invoice ') . $package->invoice)
@section('content')
    <!-- Top Link Path Area Start -->
    <section class="top-link-path-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-link-path-area2">
                        <div class="top-link-path-inner2">
                            <h1 class="title">{{ get_phrase('Team Invoice') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="{{ route('my.team.packages') }}">{{ get_phrase('Team Invoice') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Link Path Area End -->

    <!-- My Bootcamp Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 padding-bottom-110 padding-top-50">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.default.student.left_sidebar')
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="lms1-card">
                        <div class="my-panel purchase-history-panel">
                            <div class="invoice mt-5" id="invoice">
                                <div class="top d-flex justify-content-between align-items-center border-1 border-bottom mb-5 pb-5">
                                    <div>
                                        <h6><span>{{ get_phrase('Invoice') }} {{ $package->invoice }}</span></h6>
                                        <p class="description">{{ get_phrase('Date ') }} {{ date('d-M-Y', strtotime($package->created_at)) }}</p>
                                    </div>
                                    <div>
                                        <img src="{{ get_settings('light_logo') }}" alt="system logo" class="object-fit-cover rounded" width="200px">
                                    </div>
                                </div>

                                <div class="billing-area">
                                    <div class="table-responsive">
                                        <table class="eTable table">
                                            <thead>
                                                <tr>
                                                    <th>{{ get_phrase('Item') }}</th>
                                                    <th>{{ get_phrase('Date') }}</th>
                                                    <th>{{ get_phrase('Method') }}</th>
                                                    <th>{{ get_phrase('Price') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $package->title }}</td>
                                                    <td> {{ date('d-M-Y', strtotime($package->created_at)) }} </td>
                                                    <td class="text-capitalize">{{ $package->payment_method }}</td>
                                                    <td>{{ currency(number_format($package->price, 2)) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>{{ get_phrase('Billed to :') }}</td>
                                                    <td>{{ $package->user_name }}</td>
                                                    <td>{{ get_phrase('Total : ') }}</td>
                                                    <td>{{ currency(number_format($package->price, 2)) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-end mt-3 gap-3">
                            <a class="lms2-btn-primary" href="{{ route('my.team.packages.details', $package->slug) }}">{{ get_phrase('Back') }}</a>
                            <a class="lms2-btn-primary" id="print" href="javascript:void(0);" onclick="printableDiv('invoice')">{{ get_phrase('Print') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
