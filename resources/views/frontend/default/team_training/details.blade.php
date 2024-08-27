@extends('layouts.default')
@push('title', $package->title)
@section('content')
    <!------------------- Breadcum Area Start  ------>
    <main>
        <div class="container">
            <div class="row mcg-24">
                <div class="col-lg-12">
                    <div class="link-path-area link-path-area-pb">
                        <h3 class="text-15">{{ get_phrase('Home') }} / {{ get_phrase('Team Packages') }} <span>/</span> <span>{{ $package->title }}</span></h3>
                    </div>
                </div>


                <div class="col-lg-8">
                    <div class="course-author-area">
                        <div class="courser-author-cover mw-100">
                            <img src="{{ get_image($package->thumbnail) }}" alt="package-thumbnail">
                        </div>
                        <div class="course-author-profile">
                            <img src="{{ get_image($package->author->photo) }}" alt="profile">
                        </div>
                        <h3 class="text-15">{{ get_phrase('Package by') }} <span>{{ $package->author->name }}</span></h3>
                    </div>

                    <div class="course-description-main">
                        <div class="course-desvription">
                            <h1 class="text-36">{{ $package->title }}</h1>
                            @isset($package->description)
                                <p class="text-15">{!! removeScripts($package->description) !!}</p>
                            @endisset
                        </div>
                    </div>

                    @include('frontend.default.team_training.course')

                    <div class="course-description-main">
                        @include('frontend.default.team_training.author')
                        @include('frontend.default.team_training.features')
                    </div>
                </div>

                @include('frontend.default.team_training.pricing')
            </div>
        </div>
    </main>
    <!------------------- Breadcum Area End  --------->
@endsection
