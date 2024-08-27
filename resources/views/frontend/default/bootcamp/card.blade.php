<div class="col-xl-4 col-lg-6 col-md-6">
    <div class="lms2-card h-100 lms2-card-hover max-md-350px-auto">
        <a href="{{ route('bootcamp.details', $bootcamp->slug) }}">
            <div class="lms2-card-img">
                <img src="{{ get_image($bootcamp->thumbnail) }}" alt="banner">
            </div>
        </a>
        <div class="lms2-card-body">
            <a href="{{ route('bootcamp.details', $bootcamp->slug) }}" class="euclid-title-16px mb-1">{{ $bootcamp->title }}</a>
            <div class="d-flex align-items-center justify-content-between  flex-wrap gap-2 mb-2">
                <div class="d-flex align-items-center gap-1">
                    <img src="{{ asset('assets/frontend/default/images/icons/clock-gray-20.svg') }}" alt="icon">
                    <p class="pop-subtitle-12px">{{ date('d-M-Y', $bootcamp->publish_date) }}</p>
                </div>
                <div class="d-flex align-items-center gap-1">
                    <img src="{{ asset('assets/frontend/default/images/icons/mirroring-screen-gray-20.svg') }}" alt="icon">
                    <p class="pop-subtitle-12px">{{ count_bootcamp_classes($bootcamp->id) }} {{ get_phrase('Live Class') }}</p>
                </div>
            </div>
            <div class="d-flex align-items-end gap-2 mb-14px">
                @if ($bootcamp->is_paid == 0)
                    <h2 class="pop-title-20px">{{ get_phrase('Free') }}</h2>
                @else
                    @if ($bootcamp->discount_flag == 1)
                        @php $discounted_price = number_format(($bootcamp->price - $bootcamp->discounted_price), 2) @endphp
                        <h2 class="pop-title-20px">{{ currency($discounted_price) }}</h2>
                        <h3 class="pop-title-16px2 fw-medium lms-text-secondary text-decoration-line-through">{{ currency(number_format($bootcamp->price, 2)) }}</h3>
                    @else
                        <h2 class="pop-title-20px">{{ currency(number_format($bootcamp->price, 2)) }}</h2>
                    @endif
                @endif
            </div>
            <div class="d-flex align-items-center gap-10px flex-wrap justify-content-between">
                <a href="{{ route('bootcamp.details', $bootcamp->slug) }}" class="btn lms3-btn-primary">{{ get_phrase('View Details') }}</a>
                @php
                    $btn['url'] = route('purchase.bootcamp', $bootcamp->id);
                    $btn['title'] = get_phrase('Buy Now');
                    if (isset(auth()->user()->id)) {
                        $my_bootcamp = App\Models\BootcampPurchase::where('user_id', auth()->user()->id)
                            ->where('bootcamp_id', $bootcamp->id)
                            ->where('status', 1)
                            ->first();

                        if ($my_bootcamp) {
                            $btn['title'] = get_phrase('In Collection');
                            $btn['url'] = route('my.bootcamp.details', $bootcamp->slug);
                        }

                        $pending_payment = DB::table('offline_payments')
                            ->where('user_id', auth()->user()->id)
                            ->where('item_type', 'bootcamp')
                            ->where('items', $bootcamp->id)
                            ->where('status', 0)
                            ->first();

                        if ($pending_payment) {
                            $btn['title'] = get_phrase('Processing');
                            $btn['url'] = 'javascript:void(0);';
                        }
                    }
                @endphp
                <a href="{{ $btn['url'] }}" class="btn lms2-btn-outline-dark @isset($my_bootcamp) bootcamp-purchased @elseif(isset($pending_payment)) bootcamp-purchased @endisset">{{ $btn['title'] }}</a>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').change(function(e) {
                $('#filter-bootcamps').submit();
            });
        });
    </script>
@endpush
