<div class="grid-list-filter-sidebar">
    <div class="row mb-4">
        <div class="col-6">
            {{ get_phrase('Filter') }}
        </div>
        <div class="col-6 text-end">
            @if (request()->route()->parameter('category'))
                <a href="{{ route('team.packages') }}">{{ get_phrase('Clear') }}</a>
            @endif
        </div>
    </div>


    <div class="filter-sidebar-single">
        <h3 class="subtitle">{{ get_phrase('Categories') }}</h3>
        <div class="form-check-wrap" id="parent-category">
            @php
                $parent_categories = App\Models\Category::where('parent_id', 0)->get();
                $active_category = request()->route()->parameter('category');
                $route_queries = request()->query();
                $route_queries = collect($route_queries)->except('page')->all();
            @endphp
            @foreach ($parent_categories as $parent_category)
                @php $route_queries['category'] = $parent_category->slug; @endphp

                <div class="check-sub-wrap">
                    <div class="form-check mform-check check-have-sub">
                        <a href="{{ route('team.packages', $route_queries) }}">
                            <label class="form-check-label mcheck-lable" for="{{ $parent_category->slug }}">
                                <span>{{ $parent_category->title }}</span>
                                <span>({{ team_packages_by_course_category($parent_category->id) }})</span>
                            </label>
                        </a>
                    </div>
                    @foreach (DB::table('categories')->where('parent_id', $parent_category->id)->get() as $child_category)
                        @php $route_queries['category'] = $child_category->slug; @endphp
                        <div class="form-check-sub">
                            <div class="form-check mform-check">
                                <a href="{{ route('team.packages', $route_queries) }}">
                                    <label class="form-check-label mcheck-lable" for="{{ $child_category->slug }}">
                                        <span>{{ $child_category->title }}</span>
                                        <span>({{ team_packages_by_course_category($child_category->id) }})</span>
                                    </label>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <a href="javascript:void(0)" class="filter-see-more" id="see-more">{{ get_phrase('Show More') }}</a>
    </div>
</div>

@push('js')
    <script>
        "use strict";
        $(document).ready(function() {
            const $parentCategory = $('#parent-category');
            const $seeMore = $('#see-more');
            const scrollTop = $(".scrollTop");

            $parentCategory.css({
                height: '630px',
                overflow: 'hidden'
            });

            $seeMore.on('click', function(e) {
                e.preventDefault();
                const isActive = $(this).toggleClass('active').hasClass('active');

                $parentCategory.css('height', isActive ? 'auto' : '630px');
                $(this).css('margin-top', isActive ? '20px' : '0px')
                    .text(isActive ? 'Show Less' : 'Show More');
            });

            scrollTop.on('click', function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 100);
                return false;
            });
        });
    </script>
@endpush
