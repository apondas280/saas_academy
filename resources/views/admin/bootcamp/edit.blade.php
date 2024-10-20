@extends('layouts.admin')
@push('title', get_phrase('Edit bootcamp'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title d-flex align-items-center">
                    <span class="edit-badge py-2 px-3">
                        {{ get_phrase('Editing') }}
                    </span>
                    <span class="d-inline-block ms-3">
                        {{ $bootcamp_details->title }}
                    </span>
                </h4>
                <a href="{{ route('admin.bootcamps') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px ms-auto">
                    <span class="fi-rr-arrow-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
                <a href="https://creativeitem.com/docs" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px" target="_blank">
                    <span class="fi-rr-arrow-up-right-from-square"></span>
                    <span>{{ get_phrase('Help') }}</span>
                </a>
            </div>
        </div>
    </div>



    <div class="col-md-12">
        <form action="{{ route('admin.bootcamp.update', $bootcamp_details->id) }}" method="post" enctype="multipart/form-data">@csrf
            <div class="ol-card">
                <div class="ol-card-body p-20px mb-3">

                    <div class="row mb-3">
                        <div class="col-sm-8">
                            <a href="{{ route('bootcamp.details', $bootcamp_details->slug) }}" class="btn ol-btn-outline-secondary me-3">
                                {{ get_phrase('Frontent View') }}
                            </a>
                        </div>
                        <div class="col-sm-4 mt-3 mt-sm-0 d-flex justify-content-start justify-content-sm-end">
                            <button type="submit" class="btn ol-btn-outline-secondary @if (request('tab') == 'curriculum') opacity-0 @endif">
                                {{ get_phrase('Save Changes') }}
                            </button>
                        </div>
                    </div>

                    <div class="d-flex gap-3 flex-wrap flex-md-nowrap">
                        <div class="ol-sidebar-tab">
                            <div class="d-flex flex-column">
                                @php
                                    $param = request()->route()->parameter('id');
                                    $tab = request('tab');
                                @endphp

                                <input type="hidden" name="tab" value="{{ $tab }}">

                                <a class="nav-link @if ($tab == 'curriculum') active @endif" href="{{ route('admin.bootcamp.edit', [$param, 'tab' => 'curriculum']) }}">
                                    <span class="fi-rr-edit"></span>
                                    <span>{{ get_phrase('Curriculum') }}</span>
                                </a>

                                <a class="nav-link @if ($tab == 'basic') active @endif" href="{{ route('admin.bootcamp.edit', [$param, 'tab' => 'basic']) }}">
                                    <span class="icon fi-rr-duplicate"></span>
                                    <span>{{ get_phrase('Basic') }}</span>
                                </a>

                                <a class="nav-link @if ($tab == 'pricing') active @endif" href="{{ route('admin.bootcamp.edit', [$param, 'tab' => 'pricing']) }}">
                                    <span class="fi-rr-comment-dollar"></span>
                                    <span>{{ get_phrase('Pricing') }}</span>
                                </a>

                                <a class="nav-link @if ($tab == 'info') active @endif" href="{{ route('admin.bootcamp.edit', [$param, 'tab' => 'info']) }}">
                                    <span class="fi-rr-tags"></span>
                                    <span>{{ get_phrase('Info') }}</span>
                                </a>

                                <a class="nav-link @if ($tab == 'media') active @endif" href="{{ route('admin.bootcamp.edit', [$param, 'tab' => 'media']) }}">
                                    <span class="fi fi-rr-gallery"></span>
                                    <span>{{ get_phrase('Media') }}</span>
                                </a>

                                <a class="nav-link @if ($tab == 'seo') active @endif" href="{{ route('admin.bootcamp.edit', [$param, 'tab' => 'seo']) }}">
                                    <span class="fi-rr-note-medical"></span>
                                    <span>{{ get_phrase('SEO') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="tab-content w-100">
                            @includeWhen($tab == 'curriculum', 'admin.bootcamp.curriculum')
                            @includeWhen($tab == 'basic', 'admin.bootcamp.edit_basic')
                            @includeWhen($tab == 'pricing', 'admin.bootcamp.edit_pricing')
                            @includeWhen($tab == 'info', 'admin.bootcamp.edit_info')
                            @includeWhen($tab == 'media', 'admin.bootcamp.edit_media')
                            @includeWhen($tab == 'seo', 'admin.bootcamp.edit_seo')
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
