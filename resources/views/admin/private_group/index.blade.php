@extends('layouts.admin')
@push('title', get_phrase('Manage Groups'))

@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    {{ get_phrase('Manage Groups') }}
                </h4>

                <a href="{{ route('admin.groups.create') }}"class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-plus"></span>
                    <span>{{ get_phrase('Add New Group') }}</span>
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="ol-card">
                <div class="ol-card-body p-3 mb-5">
                    <div class="row mt-3 mb-4">
                        <div class="col-md-6 d-flex align-items-center gap-3">
                            <div class="custom-dropdown">
                                <button class="dropdown-header btn ol-btn-light">
                                    {{ get_phrase('Export') }}
                                    <i class="fi-rr-file-export"></i>
                                </button>
                                <ul class="dropdown-list">
                                    <li>
                                        <a class="dropdown-item export-btn" href="#" onclick="downloadPDF('.print-table', 'group-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item export-btn" href="#" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                                    </li>
                                </ul>
                            </div>

                            @if (isset($_GET) && count($_GET) > 0)
                                <a href="{{ route('admin.groups', ['type' => request()->route()->parameter('type')]) }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                            @endif
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <form action="{{ route('admin.groups', ['type' => request()->route()->parameter('type')]) }}" method="get">

                                @php
                                    $queries = request()->query();
                                    unset($queries['search']);
                                @endphp
                                <div class="row">
                                    <div class="col-9">
                                        <div class="search-input flex-grow-1">
                                            <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search Title') }}" class="ol-form-control form-control" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn ol-btn-primary w-100" id="submit-button">{{ get_phrase('Search') }}</button>
                                    </div>
                                </div>
                                @foreach ($queries as $key => $query)
                                    <input type="hidden" name="{{ $key }}" value="{{ $query }}">
                                @endforeach
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @if ($groups->count() > 0)
                                <div class="row g-2 g-sm-3 mb-3 row-cols-1 row-colssm-2 row-cols-md-3 row-cols-lg-4">
                                    @foreach ($groups as $group)
                                        <div class="col">
                                            <div class="ol-card card-hover border">
                                                <div class="ol-card-body px-20px py-3 d-flex justify-content-between">
                                                    <div>
                                                        <p class="title card-title-hover">{{ $group->title }}</p>
                                                        <p class="sub-title text-12px mt-2">{{ get_phrase('Total members : ') }} {{ $group->members->count() }}</p>
                                                    </div>

                                                    <div class="dropdown ol-icon-dropdown">
                                                        <button class="btn ol-btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span class="fi-rr-menu-dots-vertical"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="{{ route('admin.groups.edit', $group->id) }}">{{ get_phrase('Edit') }}</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="confirmModal('{{ route('admin.groups.delete', $group->id) }}')">{{ get_phrase('Delete') }}</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="ol-card">
                                    <div class="ol-card-body">
                                        @include('admin.no_data')
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
