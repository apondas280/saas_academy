@extends('layouts.default')
@push('title', get_phrase('My Bootcamps'))
@section('content')
    <!-- My Bootcamp Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 padding-bottom-110 padding-top-50">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.default.student.left_sidebar')
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="lms1-card">
                        <h2 class="euclid-title-24px mb-20px">{{ get_phrase('My Live Courses') }}</h2>

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
