<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    @endphp
    <title>{{ $system_name }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/payment/style/vendors/bootstrap-5.1.3/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/payment/style/css/style.css') }}" />
    <!--Main Jquery-->
    <script src="{{ asset('assets/payment/style/vendors/jquery/jquery-3.7.1.min.js') }}"></script>
    <style>
        .main_content {
            min-height: calc(100% - 50px);
        }
    </style>
</head>

<body>
    @if (session('app_url'))
        @include('payment.go_back_to_mobile_app')
    @endif

    <div class="container-md mt-5">
        <div class="main-content bg-white p-3">
            <div class="row">
                <div class="col-12">
                    <div class="paymentHeader d-flex justify-content-between p-0 border-0">
                        <h5 class="title">{{ get_phrase('Order summary') }}</h5>
                        <a href="{{ $payment_details['cancel_url'] }}" class="btn btn-danger rounded-pill" data-bs-toggle="tooltip" title="{{ get_phrase('Cancel Payment') }}" data-bs-placement="bottom">
                            <i class="fi-rr-cross-small"></i>
                            <span class="d-none d-sm-inline-block">{{ get_phrase('Cancel Payment') }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                @include('payment.payment_gateway')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/payment/style/vendors/bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    @include('frontend.default.toaster')
</body>

</html>
