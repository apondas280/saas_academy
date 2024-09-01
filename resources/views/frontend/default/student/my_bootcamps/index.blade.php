@extends('layouts.default')
@push('title', get_phrase('My Bootcamps'))
@section('content')
    <!-- Top Link Path Area Start -->
    <section class="top-link-path-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-link-path-area2">
                        <div class="top-link-path-inner2">
                            <h1 class="title">{{ get_phrase('My Bootcamps') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="{{ route('my.bootcamps') }}">{{ get_phrase('My Bootcamps') }}</a>
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
                        <div class="accordion bootcampitem-accordion" id="bootcamp-item">

                            @if (count($my_bootcamps) > 0)
                                @foreach ($my_bootcamps as $bootcamp)
                                    <div class="accordion-item bootcampitem-accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed bootcampitem-accordion-button" type="button">
                                                <div class="d-flex gap-20px flex-column flex-sm-row">
                                                    <div class="bootcampitem-img">
                                                        <img src="{{ get_image($bootcamp->thumbnail) }}" alt="bootcamp-thumbnail">
                                                    </div>
                                                    <div>
                                                        <h4 class="mb-12px euclid-title-18px">
                                                            <a href="{{ route('my.bootcamp.details', $bootcamp->slug) }}">{{ $bootcamp->title }}</a>
                                                        </h4>
                                                        <div class="sml-icontext1">
                                                            <img src="{{ asset('assets/frontend/default/images/icons/mirroring-screen-gray-20.svg') }}" alt="">
                                                            <p class="text">{{ count_bootcamp_classes($bootcamp->id) }} {{ get_phrase('Live Class') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </h2>
                                    </div>
                                @endforeach

                                {{ $my_bootcamps->links('vendor.pagination.default') }}
                            @else
                                @include('frontend.default.empty')
                            @endif
                        </div </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- My Bootcamp Area End -->
@endsection
