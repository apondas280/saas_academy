@extends('layouts.default')
@push('title', get_phrase('Bootcamps'))


@section('content')
    <!-- Top Link Path Area Start -->
    <section class="top-link-path-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-link-path-area2">
                        <div class="top-link-path-inner2">
                            <h1 class="title">{{ get_phrase('Bootcamp') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="#">
                                    <img src="assets/images/icons/home-white.svg" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="#">{{ get_phrase('Bootcamp') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Link Path Area End -->

    <section>
        <div class="container">
            <div class="row mrg-30 mcg-30 padding-top-30 padding-bottom-110">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.default.bootcamp.filter')
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="row mrg-30">
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
