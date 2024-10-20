@extends('layouts.admin')
@push('title', get_phrase('Add New Group'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    {{ get_phrase('Add New Group') }}
                </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-12 offset-xl-2 offset-lg-0">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <form class="" action="{{ route('admin.groups.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="title">{{ get_phrase('Title') }}
                                <span class="required text-danger">*</span>
                            </label>
                            <input type="text" name="title" class="form-control ol-form-control" placeholder="{{ get_phrase('Enter Group Title') }}" required>
                        </div>


                        <div class="fpb-7 mb-3">
                            <label class="form-label ol-form-label" for="members">{{ get_phrase('Members') }}
                                <span class="required text-danger">*</span>
                            </label>
                            <select class="ol-select2 select2-hidden-accessible" name="members[]" id="members" multiple required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn ol-btn-primary mt-2 float-end">{{ get_phrase('Add Group') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
