@php
    $categories = App\Models\BootcampCategory::get();
    $active_category = request()->route()->parameter('category');
@endphp

<div class="lms1-card">
    <div class="d-flex justify-content-between">
        <h1 class="pop-title-18px mb-20px pb-12px lms-border-bottom w-100">{{ get_phrase('Category') }}</h1>
        @isset($active_category)
            <a href="{{ route('bootcamps') }}">{{ get_phrase('Clear') }}</a>
        @endisset
    </div>
    <ul class="d-flex flex-column gap-3">
        @foreach ($categories as $category)
            @php $route_queries['category'] = $category->slug; @endphp

            <li>
                <div class="form-check lms-form-check">
                    <input class="form-check-input lms-form-check-input" type="radio" name="category" value="{{ $category->slug }}" id="{{ $category->id }}" @checked($active_category == $category->slug)>
                    <label class="form-check-label lms-form-check-lable d-flex justify-content-between gap-2 w-100" for="{{ $category->id }}">
                        <span>{{ $category->title }}</span>
                        <span>{{ count_bootcamps_by_category($category->id) }}</span>
                    </label>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            $('input[name="category"]').change(function(e) {
                e.preventDefault();
                const category = $(this).val();
                window.location.href = "{{ route('bootcamps') }}/" + category;
            });
        });
    </script>
@endpush
