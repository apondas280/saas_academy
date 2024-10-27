@extends('layouts.default')
@push('title', get_phrase('Cart'))

@section('content')
    <!-- Grid List View Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 mcg-30 padding-top-30 padding-bottom-110">
                <div class="col-lg-8">
                    <div class="lms3-card">
                        @php $count_items_price = 0; @endphp
                        @if (count($cart_items) > 0)
                            <div class="table-responsive cart-items">
                                <table class="table lms3-table-borderless table-borderless">
                                    <thead class="lms3-table-head">
                                        <tr>
                                            <th scope="col">
                                                <p class="pop-subtitle-15px2">{{ get_phrase('Items') }}</p>
                                            </th>
                                            <th scope="col" colspan="2">
                                                <p class="pop-subtitle-15px2">{{ get_phrase('Price') }}</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="lms3-table-body">
                                        @foreach ($cart_items as $course)
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-2 align-items-start min-w-450px cart-item">
                                                        <a href="{{ route('course.details', $course->slug) }}">
                                                            <div class="cart-list-banner">
                                                                <img src="{{ get_image($course->thumbnail) }}" alt="course-thumbnail">
                                                            </div>
                                                        </a>
                                                        <div>
                                                            <a href="{{ route('course.details', $course->slug) }}" class="euclid-title-15px mb-2">{{ $course->title }}</a>
                                                            <p class="pop-subtitle-13px2 ellipsis-2">{{ $course->short_description }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($course->is_paid == 0)
                                                        <h4 class="euclid-title-15px mb-2px">{{ get_phrase('Free') }}</h4>
                                                    @else
                                                        @if ($course->discount_flag == 1)
                                                            @php
                                                                $discounted_price = $course->discounted_price;
                                                                $count_items_price += $discounted_price;
                                                                $discounted_price = number_format($course->discounted_price, 2);
                                                            @endphp
                                                            <h4 class="euclid-title-15px mb-2px">{{ currency($discounted_price) }}</h4>
                                                            <h4 class="euclid-title-15px lms-text-secondary text-decoration-line-through">{{ currency(number_format($course->price, 2)) }}</h4>
                                                        @else
                                                            @php $count_items_price += $course->price; @endphp
                                                            <h4 class="euclid-title-15px mb-2px">{{ currency(number_format($course->price, 2)) }}</h4>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('cart.delete', ['id' => $course->id]) }}" class="lms-svg-link1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M21 4H17.9C17.6679 2.87141 17.0538 1.85735 16.1613 1.12872C15.2687 0.40009 14.1522 0.00145452 13 0L11 0C9.8478 0.00145452 8.73132 0.40009 7.83875 1.12872C6.94618 1.85735 6.3321 2.87141 6.1 4H3C2.73478 4 2.48043 4.10536 2.29289 4.29289C2.10536 4.48043 2 4.73478 2 5C2 5.26522 2.10536 5.51957 2.29289 5.70711C2.48043 5.89464 2.73478 6 3 6H4V19C4.00159 20.3256 4.52888 21.5964 5.46622 22.5338C6.40356 23.4711 7.67441 23.9984 9 24H15C16.3256 23.9984 17.5964 23.4711 18.5338 22.5338C19.4711 21.5964 19.9984 20.3256 20 19V6H21C21.2652 6 21.5196 5.89464 21.7071 5.70711C21.8946 5.51957 22 5.26522 22 5C22 4.73478 21.8946 4.48043 21.7071 4.29289C21.5196 4.10536 21.2652 4 21 4ZM11 2H13C13.6203 2.00076 14.2251 2.19338 14.7316 2.55144C15.2381 2.90951 15.6214 3.41549 15.829 4H8.171C8.37858 3.41549 8.7619 2.90951 9.26839 2.55144C9.77487 2.19338 10.3797 2.00076 11 2ZM18 19C18 19.7956 17.6839 20.5587 17.1213 21.1213C16.5587 21.6839 15.7956 22 15 22H9C8.20435 22 7.44129 21.6839 6.87868 21.1213C6.31607 20.5587 6 19.7956 6 19V6H18V19Z"
                                                                fill="#6B7385" />
                                                            <path
                                                                d="M10 18C10.2652 18 10.5196 17.8946 10.7071 17.7071C10.8946 17.5196 11 17.2652 11 17V11C11 10.7348 10.8946 10.4804 10.7071 10.2929C10.5196 10.1054 10.2652 10 10 10C9.73478 10 9.48043 10.1054 9.29289 10.2929C9.10536 10.4804 9 10.7348 9 11V17C9 17.2652 9.10536 17.5196 9.29289 17.7071C9.48043 17.8946 9.73478 18 10 18Z"
                                                                fill="#6B7385" />
                                                            <path
                                                                d="M14 18C14.2652 18 14.5196 17.8946 14.7071 17.7071C14.8946 17.5196 15 17.2652 15 17V11C15 10.7348 14.8946 10.4804 14.7071 10.2929C14.5196 10.1054 14.2652 10 14 10C13.7348 10 13.4804 10.1054 13.2929 10.2929C13.1054 10.4804 13 10.7348 13 11V17C13 17.2652 13.1054 17.5196 13.2929 17.7071C13.4804 17.8946 13.7348 18 14 18Z"
                                                                fill="#6B7385" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            @include('frontend.default.empty')
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="lms3-card mb-30px">
                        <h1 class="euclid-title-20px pb-3 mb-3 lms-border-bottom">{{ get_phrase('Coupon Code') }}</h1>
                        <form action="">
                            <input type="text" class="form-control lms2-form-control mb-3" placeholder="Enter Your Coupon Code">
                            <button type="submit" class="btn lms3-btn-outline-primary w-100">{{ get_phrase('Apply Your Coupon') }}</button>
                        </form>
                    </div>
                    <form action="{{ route('payout') }}" method="post">
                        @php
                            $coupon_discount = $count_items_price * ($discount / 100);
                            $tax = (get_settings('course_selling_tax') / 100) * ($count_items_price - $coupon_discount);
                        @endphp

                        @csrf
                        <input type="hidden" name="payable" value="{{ $count_items_price }}">
                        <input type="hidden" name="coupon_code" value="{{ request()->query('coupon') }}">
                        <input type="hidden" name="coupon_discount" value="{{ $coupon_discount }}">
                        <input type="hidden" name="tax" value="{{ $tax }}">
                        <input type="hidden" name="items" value="{{ json_encode($cart_items->pluck('id')) }}">

                        <div class="lms3-card">
                            <h1 class="euclid-title-20px pb-3 mb-3 lms-border-bottom">{{ get_phrase('Order Summery') }}</h1>
                            <ul class="mb-20px d-flex flex-column gap-12px">

                                <li class="d-flex justify-content-between gap-2 flex-wrap">
                                    <p class="pop-subtitle-15px2">{{ get_phrase('Sub total') }}</p>
                                    <p class="pop-subtitle-15px2">{{ currency(number_format($count_items_price, 2)) }}</p>
                                </li>

                                @if ($discount)
                                    <li class="d-flex justify-content-between gap-2 flex-wrap">
                                        <p class="pop-subtitle-15px2">{{ get_phrase('Discount') }}
                                            ({{ $discount }}{{ get_phrase('%') }})</p>
                                        <p class="pop-subtitle-15px2">- {{ currency(number_format($coupon_discount, 2)) }}</p>
                                    </li>
                                @endif

                                <li class="d-flex justify-content-between gap-2 flex-wrap">
                                    <p class="pop-subtitle-15px2">{{ get_phrase('Tax') }}
                                        ({{ get_settings('course_selling_tax') }}{{ get_phrase('%') }})</p>
                                    <p class="pop-subtitle-15px2">+ {{ currency(number_format($tax, 2)) }}</p>
                                </li>

                                <li class="d-flex justify-content-between gap-2 flex-wrap">
                                    <p class="pop-subtitle-15px lms-text-dark">{{ get_phrase('Total') }}</p>
                                    @php $payable = $count_items_price - ($coupon_discount) + $tax; @endphp
                                    <p class="pop-title-20px">{{ currency(number_format($payable, 2)) }}</p>
                                </li>
                            </ul>
                            <button type="submit" class="btn lms2-btn-primary p-10px w-100">{{ get_phrase('Check Out') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Grid List View Area End -->

@endsection
@push('js')
@endpush
