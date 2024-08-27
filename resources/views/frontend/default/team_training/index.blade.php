@extends('layouts.default')
@push('title', get_phrase('Team Packages'))

@section('content')
    <!-- Top Link Path Area Start -->
    <section class="top-link-path-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-link-path-area2">
                        <div class="top-link-path-inner2">
                            <h1 class="title">{{ get_phrase('Team Packages') }}</h1>
                            <div class="top-link-path d-flex align-items-center justify-content-center">
                                <a href="#">
                                    <img src="assets/images/icons/home-white.svg" alt="">
                                    {{ get_phrase('Home') }}
                                </a>
                                <a href="#">{{ get_phrase('Team Packages') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Link Path Area End -->



    <!-------------- List Item Start   --------------->
    <div class="eNtery-item">
        <div class="container">
            <div class="row padding-top-30 padding-bottom-50">
                <div class="col-lg-3 col-md-4">
                    @include('frontend.default.team_training.filter')
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="euclid-title-16px mb-30px pb-2">{{ get_phrase('Showing') }} {{ count($packages) }} {{ get_phrase('of') }} {{ $packages->total() }} {{ get_phrase('Results') }}</p>
                        </div>
                    </div>


                    <div class="row mrg-30">
                        @foreach ($packages as $package)
                            @include('frontend.default.team_training.card')
                        @endforeach
                    </div>

                    @if (count($packages) > 0)
                        <div class="entry-pagination">
                            <nav aria-label="Page navigation example">
                                {{ $packages->links('vendor.pagination.default') }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-------------- List Item End  --------------->
@endsection
