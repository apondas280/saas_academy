@extends('layouts.admin')
@push('title', get_phrase('Team Package Create'))

@section('content')
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    {{ get_phrase('Add New Package') }}
                </h4>
            </div>
            <div class="ol-card p-3">
                <div class="ol-card-body">
                    <form action="{{ route('admin.team.packages.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <div class="mb-3">
                                    <label class="form-label ol-form-label" for="title">{{ get_phrase('Title') }}<span class="text-danger ms-1">*</span></label>
                                    <input type="text" name="title" class="form-control ol-form-control" placeholder="{{ get_phrase('Enter package title') }}" required>
                                </div>

                                <div class="row">
                                    <div class="col-xxl-4">
                                        <div class="mb-3">
                                            <label for="course_privacy" class="form-label ol-form-label">{{ get_phrase('Course') }}<span class="text-danger ms-1">*</span></label>
                                            <select class="ol-select2" name="course_privacy" id="course_privacy" required>
                                                <option value="">{{ get_phrase('Select course privacy') }}</option>
                                                <option value="public">{{ get_phrase('Public') }}</option>
                                                <option value="private">{{ get_phrase('Private') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xxl-8 d-flex align-items-end">
                                        <div class="w-100 mb-3 load_courses">
                                            <select class="ol-select2" id="course_id" required>
                                                <option value="">{{ get_phrase('First select course privacy') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label ol-form-label" for="allocation">{{ get_phrase('Allocation') }}<span class="text-danger ms-1">*</span></label>
                                            <input type="number" name="allocation" class="form-control ol-form-control" placeholder="{{ get_phrase('Enter package allocation') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label ol-form-label" for="price">{{ get_phrase('Estimated Price') }}</label>
                                            <input type="number" class="form-control ol-form-control" id="estimated_price" placeholder="{{ currency() }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="eForm-layouts">
                                    <div class="mb-3">
                                        <label class="form-label ol-form-label col-sm-2 w-100">{{ get_phrase('Pricing type') }}<span class="text-danger ms-1">*</span></label>

                                        <div class="eRadios">
                                            <div class="d-flex gap-3 mb-2">
                                                <div class="form-check">
                                                    <input type="radio" name="pricing_type" value="1" class="form-check-input eRadioSuccess" id="paid" onchange="$('#paid-section').slideDown(200)" checked>
                                                    <label for="paid" class="form-check-label">{{ get_phrase('Paid') }}</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="radio" name="pricing_type" value="0" class="form-check-input eRadioSuccess" id="free" onchange="$('#paid-section').slideUp(200)">
                                                    <label for="free" class="form-check-label">{{ get_phrase('Free') }}</label>
                                                </div>
                                            </div>
                                            <div class="paid-section" id="paid-section">
                                                <div class="mb-3">
                                                    <label for="price" class="form-label ol-form-label">{{ get_phrase('Price') }}
                                                        <small>({{ currency() }})</small><span class="text-danger ms-1">*</span></label>

                                                    <input type="number" name="price" class="form-control ol-form-control" id="price" min="1" step=".01" placeholder="{{ get_phrase('Enter your course price') }} ({{ currency() }})">

                                                    <small class="text-danger">{{ get_phrase('Package discount rate') }}
                                                        <span id="show-discount">0%</span>
                                                    </small>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label ol-form-label col-sm-2 w-100">{{ get_phrase('Package Expiry') }}<span class="text-danger ms-1">*</span></label>
                                                    <div class="d-flex gap-3">
                                                        <div class="form-check">
                                                            <input type="radio" name="expiry_type" value="limited" class="form-check-input eRadioSuccess" id="limited" onchange="$('#package-expiry-section').slideDown(200)" checked>
                                                            <label for="limited" class="form-check-label">{{ get_phrase('Limited') }}</label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="radio" name="expiry_type" value="lifetime" class="form-check-input eRadioSuccess" id="lifetime" onchange="$('#package-expiry-section').slideUp(200)">
                                                            <label for="lifetime" class="form-check-label">{{ get_phrase('Lifetime') }}</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="package-expiry-section">
                                                    <div class="mb-3">
                                                        <label for="expiry-date" class="form-label ol-form-label">{{ get_phrase('Expiry Date') }}</label>

                                                        <div class="mb-3 position-relative position-relative">
                                                            <input type="text" id="expiry-date" name="expiry_date" class="form-control ol-form-control daterangepicker w-100"
                                                                value="{{ date('m/d/Y', strtotime('first day of this month')) . ' - ' . date('m/d/Y', strtotime('last day of this month')) }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label ol-form-label">{{ get_phrase('Thumbnail') }}</label>
                                    <input type="file" name="thumbnail" class="form-control ol-form-control" id="thumbnail" accept="image/*" />
                                </div>

                                <div class="row">
                                    <label class="col-md-2 form-label ol-form-label" for="features">{{ get_phrase('Features') }}</label>
                                    <div id="feature_area">
                                        <div class="d-flex gap-3 mb-3">
                                            <div class="flex-grow-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control ol-form-control" name="features[]" id="features" placeholder="{{ get_phrase('Provide package features') }}">
                                                </div>
                                            </div>
                                            <div class="">
                                                <button type="button" class="btn ol-btn-light ol-icon-btn" name="button" data-bs-toggle="tooltip" title="{{ get_phrase('Add new') }}" onclick="appendFeature()"> <i class="fi-rr-plus-small"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id = "blank_feature_field">
                                            <div class="d-flex gap-3 mb-3">
                                                <div class="flex-grow-1">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control ol-form-control" name="features[]" id="features" placeholder="{{ get_phrase('Provide package features') }}">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <button type="button" class="btn ol-btn-light ol-icon-btn mt-0" name="button" data-bs-toggle="tooltip" title="{{ get_phrase('Remove') }}" onclick="removeFeature(this)">
                                                        <i class="fi-rr-minus-small"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <button type="submit" class="btn ol-btn-primary float-end">{{ get_phrase('Add Package') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script type="text/javascript">
        "Use strict";
        var blank_feature_field = jQuery('#blank_feature_field').html();
        jQuery(document).ready(function() {
            jQuery('#blank_feature_field').hide();
        });

        function appendFeature() {
            jQuery('#feature_area').append(blank_feature_field);
        }

        function removeFeature(requirementElem) {
            jQuery(requirementElem).parent().parent().remove();
        }
    </script>

    <script>
        $(document).ready(function() {

            // load courses based on privacy
            $('select[name="course_privacy"]').on('change', function() {
                let privacy = $(this).val()

                $.ajax({
                    type: "get",
                    url: "{{ route('admin.get.courses.by.privacy') }}",
                    data: {
                        privacy: privacy
                    },
                    success: function(response) {
                        if (response) {
                            $('.load_courses').empty().append(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        error(error);
                    }
                });
            });

            // calculated approx price by student
            $('input[name="allocation"]').on('keyup', function(event) {
                const students = $(this).val();
                const courseId = $('select[name="course_id"]').val();
                updateEstimatedPrice(courseId, students);
            });

            // update price based on course selection
            $(document).on('change', 'select[name="course_id"]', function() {
                updateEstimatedPrice($(this).val(), $('input[name="allocation"]').val());
            });

            // update the price
            let estimatedPrice = 0;

            function updateEstimatedPrice(id, students) {
                $.ajax({
                    type: "get",
                    url: "{{ route('admin.get.course.price') }}",
                    data: {
                        course_id: id
                    },
                    success: function(response) {
                        estimatedPrice = response * students;
                        $('input#estimated_price').val(estimatedPrice);
                    }
                });
            }

            // set price and get discount rate
            $('input[name="price"]').on('keyup', function() {
                const estimatedPrice = $('input#estimated_price').val();
                const finalPrice = $(this).val();
                const discountRate = 100 - ((100 / estimatedPrice) * finalPrice);
                $(this).parent().find('#show-discount').text(discountRate.toFixed(2) + '%');
            });
        });
    </script>
@endpush
