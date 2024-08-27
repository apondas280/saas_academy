<div class="mb-30px">
    <h1 class="euclid-title-24px fw-medium mb-20px lms-mdm-text-border">{{ get_phrase('Features') }}</h1>
    <div class="row">
        <div class="col-12">
            <ul>
                @php
                    $features = $package->features ? json_decode($package->features, true) : [];
                @endphp
                @foreach ($features as $feature)
                    <li class="d-flex align-items-center gap-1">
                        <i class="fa-solid fa-check"></i>
                        <p class="">{{ $feature }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
