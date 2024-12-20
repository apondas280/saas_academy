@php
    $param = request()->route()->parameter('id');
    $tab = request('tab');
@endphp

@if ($tab == 'message')
    <div class="row mb-3">
        <label for="thumbnail" class="form-label ol-form-label col-sm-2 col-form-label">{{ get_phrase('Thumbnail') }}</label>
        <div class="col-sm-10">
            <input type="file" name="thumbnail" class="form-control ol-form-control" id="thumbnail" accept="image/*" />
        </div>
    </div>

    <div class="row mb-3">
        <label for="banner" class="form-label ol-form-label col-sm-2 col-form-label">{{ get_phrase('Banner') }}</label>
        <div class="col-sm-10">
            <input type="file" name="banner" class="form-control ol-form-control" id="banner" accept="image/*" />
        </div>
    </div>
@endif
