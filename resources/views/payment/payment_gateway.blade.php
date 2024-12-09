<div class="col-md-12">
    <p class="payment_tab_title pb-3 mt-4">{{ get_phrase('Select payment gateway') }}</p>


    <div class="nav nav-pills d-flex" role="tablist" aria-orientation="vertical">
        @foreach ($payment_gateways as $key => $payment_gateway)
            <div class="col-6 col-sm-4 col-md-3 px-2 mb-3">
                <div class="tabItem" onclick="showPaymentGatewayByAjax('{{ $payment_gateway->identifier }}')" id="{{ $payment_gateway->identifier }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $payment_gateway->identifier }}" role="tab" aria-controls="{{ $payment_gateway->identifier }}"
                    aria-selected="true">
                    <div class="payment_gateway_option">
                        <div class="logo">
                            <img width="100px" src="{{ get_image('assets/payment/' . $payment_gateway->identifier . '.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <p class="payment_tab_title pb-3 mt-3 text-center">{{ get_phrase('Item List') }}</p>
            <div class="payment_table">
                <div class="table-responsive">
                    <table class="table eTable eTable-2">
                        <tbody>
                            @foreach ($payment_details['items'] as $key => $item)
                                <tr>
                                    <td>
                                        <div class="dAdmin_info_name">
                                            <p><span>#{{ $key + 1 }}</span></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dAdmin_info_name min-w-100px">
                                            <p>{{ $item['title'] }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dAdmin_info_name min-w-150px text-end">
                                            @if ($item['discount_price'] > 0)
                                                <p class="text-dark">
                                                    <small class="text-muted">
                                                        <del>{{ currency(number_format($item['price'], 2)) }}</del>
                                                    </small>
                                                    {{ currency(number_format($item['discount_price'], 2)) }}
                                                </p>
                                            @else
                                                <p>{{ currency(number_format($item['price'], 2)) }}</p>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td>
                                    <div class="dAdmin_info_name min-w-100px">
                                        <p>{{ get_phrase('Total') }}</p>
                                    </div>
                                </td>

                                @php
                                    $payable = $payment_details['payable_amount'];
                                    if (isset($payment_details['custom_field']['coupon_discount'])) {
                                        $payable = $payment_details['payable_amount'] + $payment_details['custom_field']['coupon_discount'];
                                    }
                                    $payable = $payable - $payment_details['tax'];
                                @endphp
                                <td>
                                    <div class="dAdmin_info_name min-w-100px text-end">
                                        <p>{{ currency(number_format($payable, 2)) }}</p>
                                    </div>
                                </td>
                            </tr>

                            @isset($payment_details['coupon'])
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="dAdmin_info_name min-w-100px">
                                            <p>
                                                {{ get_phrase('Coupon') }}
                                                ({{ $payment_details['coupon'] }})
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dAdmin_info_name min-w-150px text-end">
                                            <p>
                                                {{ get_phrase('-') }}
                                                {{ currency(number_format($payment_details['custom_field']['coupon_discount'], 2)) }}
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endisset

                            @if ($payment_details['tax'] > 0)
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="dAdmin_info_name min-w-100px">
                                            <p>{{ get_phrase('Tax') }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dAdmin_info_name min-w-150px text-end">
                                            <p>
                                                {{ get_phrase('+') }}
                                                {{ currency(number_format($payment_details['tax'], 2)) }}
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="dAdmin_info_name min-w-150px text-end">
                                        <p><span>{{ get_phrase('Grand Total') }}:
                                                {{ currency(number_format($payment_details['payable_amount'], 2)) }}</span>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="tab-content">
                <div class="tab-pane fade show active d-flex justify-content-center" id="showPaymentGatewayByAjax"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://checkout.flutterwave.com/v3.js"></script>
<script type="text/javascript">
    "use strict";

    function showPaymentGatewayByAjax(identifier) {
        $('#showPaymentGatewayByAjax').html(
            '<div class="w-100 text-center my-5"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>'
        );

        document.querySelectorAll('.tabItem').forEach(item => item.classList.remove('active'));
        event.currentTarget.classList.add('active');

        $.ajax({
            url: "{{ route('payment.show_payment_gateway_by_ajax', '') }}/" + identifier,
            success(response) {
                $('#showPaymentGatewayByAjax').html(response);
            }
        });
    }
</script>
