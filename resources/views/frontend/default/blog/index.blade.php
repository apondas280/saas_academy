@extends('layouts.default')
@push('title', get_phrase('Blog'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    <!-- Top Link Path Area Start -->
    <section class="top-link-path-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-link-path-area2">
                        <div class="top-link-path-inner2">
                            <h1 class="title">{{ get_phrase('Blog') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="{{ route('blogs') }}">{{ get_phrase('Blogs') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Link Path Area End -->

    <!-- Blog Area Start -->
    <section>
        <div class="container">
            <div class="row mrg-30 mcg-30 padding-top-50 padding-bottom-110">
                @foreach ($blogs as $key => $blog)
                    <div class="col-lg-4 col-md-6">
                        @include('frontend.default.blog.card')
                    </div>

                    {{ $blogs->links('vendor.pagination.default') }}
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
@endsection
@push('js')@endpush
