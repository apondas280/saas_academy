@extends('layouts.admin')
@push('title', get_phrase('Player settings'))

<style>
    .preview-watermark {
        width: 100%;
        aspect-ratio: 1/1;
        overflow: hidden;
    }

    .preview-watermark img {
        width: 100%;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    {{ get_phrase('Player settings') }}
                </h4>
            </div>
        </div>
    </div>

    <div class="ol-card p-4">
        <div class="ol-card-body">

            <form action="{{ route('admin.player.settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="type" value="watermark">

                <div class="row">
                    <div class="col-md-5 col-xl-4 col-xxl-3 offset-xxl-1 d-flex align-items-center">
                        <div class="preview-watermark mb-3 mb-md-0">
                            <img src="{{ get_image(get_player_settings('watermark_logo') ?? 'no-image') }}" alt="">
                        </div>
                    </div>

                    <div class="col-md-7 col-xl-8 col-xxl-7">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="fpb-7 mb-3">
                                        <label class="form-label ol-form-label" for="width">{{ get_phrase('Watermark') }}</label>
                                        <input type="file" class="form-control ol-form-control" id="watermark" name="watermark_logo" onchange="loadImage(this, '.preview-watermark img')">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="fpb-7 mb-3">
                                    <label class="form-label ol-form-label">{{ get_phrase('Watermark Type') }}</label>
                                    <select class="form-control ol-select2" data-toggle="select2" name="watermark_type" required>
                                        <option value="">{{ get_phrase('Select an option') }}</option>
                                        <option value="js" @if (get_player_settings('watermark_type') == 'js') selected @endif>
                                            {{ get_phrase('Js Watermark') }}</option>
                                        <option value="ffmpeg" @if (get_player_settings('watermark_type') == 'ffmpeg') selected @endif>
                                            {{ get_phrase('FFMpeg') }}</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="fpb-7 mb-3">
                                    <label class="form-label ol-form-label" for="width">{{ get_phrase('Width') }}</label>
                                    <input type="number" for="width" class="form-control ol-form-control" name="watermark_width" value="{{ get_player_settings('watermark_width') }}" placeholder="{{ get_phrase('Width (px)') }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="fpb-7 mb-3">
                                    <label class="form-label ol-form-label" for="height">{{ get_phrase('height') }}</label>
                                    <input type="number" for="height" class="form-control ol-form-control" name="watermark_height" value="{{ get_player_settings('watermark_height') }}" placeholder="{{ get_phrase('Height (px)') }}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="fpb-7 mb-3">
                                            <label class="form-label ol-form-label" for="opacity">{{ get_phrase('opacity') }}</label>
                                            <input type="number" for="opacity" class="form-control ol-form-control" name="watermark_opacity" value="{{ get_player_settings('watermark_opacity') }}" placeholder="{{ get_phrase('Opacity (0 - 100)') }}" min="0" max="100">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fpb-7 mb-3">
                                            <label class="form-label ol-form-label" for="top">{{ get_phrase('Top') }}</label>
                                            <input type="number" for="top" class="form-control ol-form-control" name="watermark_top" value="{{ get_player_settings('watermark_top') }}" placeholder="{{ get_phrase('Top (px)') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fpb-7 mb-3">
                                            <label class="form-label ol-form-label" for="left">{{ get_phrase('left') }}</label>
                                            <input type="number" for="left" class="form-control ol-form-control" name="watermark_left" value="{{ get_player_settings('watermark_left') }}" placeholder="{{ get_phrase('Left (px)') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn ol-btn-primary float-end">{{ get_phrase('Save changes') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
