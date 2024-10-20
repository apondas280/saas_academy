<div class="grid-list-filter-sidebar">
    <div class="row mb-4">
        <div class="col-6">
            {{ get_phrase('Filter') }}
        </div>
        <div class="col-6 text-end">
            @if (count(request()->all()) > 0 || !empty($category_details))
                <a href="{{ route('courses') }}">{{ get_phrase('Clear') }}</a>
            @endif
        </div>
    </div>
    <form action="{{ route('courses', request()->route()->parameter('category')) }}" method="get" id="filter-courses">
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
                            <a href="{{ route('courses', $route_queries) }}">
                                <label class="form-check-label mcheck-lable" for="{{ $parent_category->slug }}">
                                    <span>{{ $parent_category->title }}</span>
                                    @php
                                        $count_parent_courses = explode(' ', count_category_courses($parent_category->id));
                                    @endphp
                                    <span>({{ array_shift($count_parent_courses) }})</span>
                                </label>
                            </a>
                        </div>
                        @foreach (DB::table('categories')->where('parent_id', $parent_category->id)->get() as $child_category)
                            @php $route_queries['category'] = $child_category->slug; @endphp
                            <div class="form-check-sub">
                                <div class="form-check mform-check">
                                    <a href="{{ route('courses', $route_queries) }}">
                                        <label class="form-check-label mcheck-lable" for="{{ $child_category->slug }}">
                                            <span>{{ $child_category->title }}</span>
                                            @php
                                                $count_child_courses = explode(' ', count_category_courses($child_category->id));
                                            @endphp
                                            <span>({{ array_shift($count_child_courses) }})</span>
                                        </label>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <!-- <a href="#" class="filter-see-more">Show More</a> -->
            </div>
            <div class="filter-see-more cursor-pointer" id="see-more">{{ get_phrase('Show More') }}</div>
        </div>
        <div class="filter-sidebar-single">
            <h3 class="subtitle">{{ get_phrase('Price') }}</h3>
            <div class="form-check-wrap2">
                @foreach (['paid', 'discount', 'free'] as $price)
                    <div class="form-check mform-check">
                        <input class="form-check-input mcheck-input" type="checkbox" name="price" value="{{ $price }}" id="price-{{ $price }}" @if (request()->has('price') && request()->input('price') == $price) checked @endif />
                        <label class="form-check-label mcheck-lable" for="price-{{ $price }}">
                            {{ get_phrase(ucfirst($price)) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="filter-sidebar-single">
            <h3 class="subtitle">{{ get_phrase('Level') }}</h3>
            <div class="form-check-wrap2">
                @foreach (['beginner', 'intermediate', 'advanced'] as $level)
                    <div class="form-check mform-check">
                        <input class="form-check-input mcheck-input" type="checkbox" name="level" value="{{ $level }}" id="level-{{ $level }}" @if (request()->has('level') && request()->input('level') == $level) checked @endif />
                        <label class="form-check-label mcheck-lable" for="level-{{ $level }}">
                            {{ get_phrase(ucfirst($level)) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="filter-sidebar-single">
            <h3 class="subtitle">{{ get_phrase('language') }}</h3>
            <div class="form-check-wrap2">
                @foreach (['english', 'spanish', 'italic', 'german'] as $language)
                    <div class="form-check mform-check">
                        <input class="form-check-input mcheck-input" type="checkbox" name="language" value="{{ $language }}" id="language-{{ $language }}" @if (request()->has('language') && request()->input('language') == $language) checked @endif />
                        <label class="form-check-label mcheck-lable" for="language-{{ $language }}">
                            {{ get_phrase(ucfirst($language)) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="filter-sidebar-single">
            <h3 class="subtitle">{{ get_phrase('Ratings') }}</h3>
            <div class="form-check-wrap2">
                @for ($i = 5; $i >= 1; $i--)
                    <div class="form-check mform-check">
                        <input class="form-check-input mcheck-input" type="checkbox" name="rating" value="{{ $i }}" id="raging-{{ $i }}" @if (request()->has('rating') && request()->input('rating') == $i) checked @endif />
                        <label class="form-check-label mcheck-lable check-label-star" for="raging-{{ $i }}">
                            @for ($j = 1; $j <= 5; $j++)
                                @if ($j <= $i)
                                    <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                                @else
                                    <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                                @endif
                            @endfor
                        </label>
                    </div>
                @endfor
            </div>
        </div>
    </form>
</div>

@push('js')
    <script>
        "use strict";
        $(document).ready(function() {
            $('#see-more').on('click', function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                let show_more = $(this).html();

                if ($(this).hasClass('active')) {
                    $('#parent-category').css('height', 'auto');
                    $(this).css('margin-top', '20px');
                    $(this).text('{{ get_phrase('Show Less') }}');
                } else {
                    $('#parent-category').css({
                        'height': '690px',
                        'overflow': 'hidden',
                    });
                    $(this).css('margin-top', '0px');
                    $(this).html('{{ get_phrase('Show More') }}');
                }
            });

            var scrollTop = $(".scrollTop");
            $(scrollTop).on('click', function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 100);
                return false;
            });

            $('input[type="checkbox"]').change(function(e) {
                $('#filter-courses').trigger('submit');
            });
        });
    </script>
@endpush
