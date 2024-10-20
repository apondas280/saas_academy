@extends('layouts.default')
@push('title', get_phrase('Bootcamps'))


@section('content')
    <section>
        <div class="container">
            <div class="row mrg-30 mcg-30 padding-top-30 padding-bottom-110">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.default.bootcamp.filter')
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="row mrg-30">
                        <p class="info">{{ get_phrase('Showing') . ' ' . count($bootcamps) . ' ' . get_phrase('of') . ' ' . $bootcamps->total() . ' ' . get_phrase('data') }}</p>
                        @foreach ($bootcamps as $bootcamp)
                            @include('frontend.default.bootcamp.card')
                        @endforeach

                        {{ $bootcamps->links('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
