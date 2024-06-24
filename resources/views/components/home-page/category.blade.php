<div class="row">
    @foreach (App\Models\Category::where('parent_id', 0)->take(32)->get() as $category)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
            <a href="{{ route('courses', $category->slug) }}" class="single-category">
                <span>
                    @if ($category->category_logo != '')
                        <img src="{{ get_image($category->category_logo) }}" alt="">
                    @endif
                </span>
                <h4>{{ $category->title }}</h4>
                <p>{{ count_category_courses($category->id) }}</p>
            </a>
        </div>
    @endforeach
</div>