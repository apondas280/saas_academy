@extends('layouts.default')
@push('title', get_phrase('Blog Details'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    @php
        $total_comments = count_comments_by_blog_id($blog_details->id);
        $total_likes = count_likes_by_blog_id($blog_details->id);
    @endphp

<!-- Top Link Path Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="lms3-link-path d-flex align-items-center flex-wrap mb-30px mt-4">
                    <div class="lms3-link-path-item d-flex align-items-center gap-2">
                        <img src="{{ asset('assets/frontend/default/images/icons/home-black-20.svg') }}" alt="home">
                        <p class="pop-title-20px fw-normal">Home</p>
                    </div>
                    <div class="lms3-link-path-item">
                        <p class="pop-title-20px fw-normal">Blog Details</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Link Path Area End -->

<!-- Blog Details Area Start -->
<section>
    <div class="container">
        <div class="row mrg-30 pb-50px">
            <div class="col-lg-7 col-xl-8">
                <h1 class="text-36 mb-3">{{ $blog_details->title }}</h1>
                <ul class="d-flex flex-wrap lms1-vr-list-group mb-30px">
                    <li class="lms1-vr-listitem pop-subtitle-15px2">{{ get_phrase('by') }} <span class="lms-text-black">{{ $blog_details->author_name }}</span></li>
                    <li class="lms1-vr-listitem pop-subtitle-15px2">{{ $total_comments }}</li>
                    <li class="lms1-vr-listitem pop-subtitle-15px2">{{ date('d M, Y', strtotime($blog_details->created_at)) }}</li>
                </ul>
                <div class="lrg-banner-wrap mb-30px">
                    <img src="{{ get_image($blog_details->banner) }}" alt="blog-thumbnail">
                </div>
                <p class="pop-subtitle-15px3">{!! removeScripts($blog_details->description) !!}</p>
                <div class="lms1-social-share-wrap d-flex gap-12px">
                    <p class="pop-title-16px">Share :</p>
                    <ul class="d-flex align-items-center gap-2 flex-wrap">
                        <li>
                            <a href="{{ $blog_details->author_twitter }}" class="lms-svg-link1">
                                <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 2.13513C20.2277 2.49594 19.3981 2.73973 18.526 2.84992C19.4259 2.28218 20.0991 1.38861 20.4201 0.33596C19.5746 0.865461 18.6493 1.23817 17.6844 1.43789C17.0355 0.707364 16.176 0.22316 15.2393 0.0604525C14.3027 -0.102255 13.3413 0.0656378 12.5044 0.538065C11.6675 1.01049 11.002 1.76102 10.6111 2.67313C10.2203 3.58523 10.1259 4.60789 10.3428 5.58232C8.62963 5.49162 6.95372 5.02214 5.4238 4.20432C3.89389 3.38651 2.54416 2.23865 1.46221 0.835242C1.09227 1.5081 0.879547 2.28823 0.879547 3.11906C0.879135 3.86701 1.05382 4.60349 1.38811 5.26318C1.7224 5.92286 2.20595 6.48535 2.79587 6.90073C2.11172 6.87778 1.44267 6.68287 0.844402 6.33221V6.39072C0.844333 7.43974 1.18848 8.45648 1.81846 9.26841C2.44843 10.0803 3.32542 10.6375 4.30063 10.8453C3.66597 11.0264 3.00058 11.053 2.35471 10.9233C2.62985 11.8259 3.16581 12.6152 3.88755 13.1807C4.60929 13.7462 5.48068 14.0595 6.37972 14.0769C4.85354 15.3402 2.96871 16.0254 1.02845 16.0224C0.684753 16.0225 0.341346 16.0013 0 15.959C1.96948 17.2941 4.2621 18.0027 6.60354 18C14.5296 18 18.8626 11.0783 18.8626 5.07523C18.8626 4.8802 18.858 4.68322 18.8497 4.48819C19.6925 3.84553 20.42 3.04973 20.9982 2.13805L21 2.13513Z" fill="#6B7385"/>
                                </svg>                           
                            </a>
                        </li>
                        <li>
                            <a href="{{ $blog_details->author_facebook }}" class="lms-svg-link1">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1544_1063)">
                                    <path d="M11.6673 11.2498H13.7507L14.584 7.9165H11.6673V6.24984C11.6673 5.3915 11.6673 4.58317 13.334 4.58317H14.584V1.78317C14.3123 1.74734 13.2865 1.6665 12.2032 1.6665C9.94065 1.6665 8.33398 3.04734 8.33398 5.58317V7.9165H5.83398V11.2498H8.33398V18.3332H11.6673V11.2498Z" fill="#6B7385"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_1544_1063">
                                    <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>                           
                            </a>
                        </li>
                        <li>
                            <a href="{{ $blog_details->author_linkedin }}" class="lms-svg-link1">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.2708 1.71399H18.0835L11.9403 8.73336L19.1667 18.2866H13.5101L9.07646 12.494L4.00882 18.2866H1.1916L7.76104 10.7768L0.833333 1.71399H6.63354L10.6371 7.0085L15.2708 1.71399ZM14.2831 16.6052H15.8407L5.78486 3.30746H4.11194L14.2831 16.6052Z" fill="#6B7385"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="lms3-card p-4">
                    <!-- Search -->
                    <form action="{{ route('blogs') }}" method="get" class="mb-30px">
                        <div>
                            <input type="search" class="form-control lms2-search-form-control" name="search" placeholder="{{ get_phrase('Search...') }}"
                            @if (request()->has('search')) value="{{ request()->input('search') }}" @endif>
                            <input type="submit" value="" hidden>
                        </div>
                    </form>
                    <!-- Category -->
                    <h3 class="euclid-title-18px lh-1 mb-20px">{{ get_phrase('Categories') }}</h3>
                    <ul class="pb-28px lms-border-bottom mb-30px">
                        @php
                            $active_category = request()->route()->parameter('category');
                            $route_queries = request()->query();
                        @endphp
                        @foreach (App\Models\BlogCategory::latest()->get() as $category)
                            @php $route_queries['category'] = $category->slug; @endphp
                            <li class="lms2-form-check-wrap">
                                <div class="form-check lms2-form-check">
                                    <input class="form-check-input lms2-form-check-input" type="checkbox" value="{{ $category->slug }}" id="{{ $category->slug }}" @if ($category->slug == $active_category) active @endif>
                                    <label class="form-check-label lms2-form-check-lable d-flex justify-content-between gap-2 w-100" for="checkid2">
                                        <span>{{ $category->title }}</span>
                                        <span>{{ count_blogs_by_category($category->id) }}</span>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Popular Post -->
                    <h3 class="euclid-title-18px lh-1 mb-20px">{{ get_phrase('Popular Post') }}</h3>
                    <ul class="d-flex flex-column gap-20px pb-30px lms-border-bottom mb-30px">
                        @foreach (App\Models\Blog::where('status', 1)->latest()->take(4)->get() as $blog)
                            <li>
                                <a href="{{ route('blog.details', $blog->slug) }}">
                                    <div class="d-flex gap-12px">
                                        <div class="sml-img-wrap4">
                                            <img src="{{ get_image($blog->thumbnail) }}" alt="blog-thumbnail">
                                        </div>
                                        <div>
                                            <p class="pop-subtitle-14px mb-2">{{ date('d M, Y', strtotime($blog->created_at)) }}</p>
                                            <h5 class="euclid-title-15px2">{{ ucfirst($blog->title) }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Tags -->
                    <h3 class="euclid-title-18px lh-1 mb-20px">{{ get_phrase('Tags') }}</h3>
                    <ul class="d-flex gap-12px flex-wrap">
                        @foreach (get_blog_tags() as $tag)
                            <li>
                                <a href="#" class="btn lms1-btn-outline-secondary">{{ ucfirst($tag) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Area End -->

<!-- Related Blog Area Start -->
<section>
    <div class="container">
        <div class="row mrg-30 padding-bottom-110">
            <div class="col-12">
                <h1 class="text-40">Related Blog</h1>
            </div>
            <!-- Single Blog Card -->
            <div class="col-lg-4 col-md-6">
                <a href="#" class="single-blog">
                    <div class="single-blog-inner">
                        <div class="blog-img">
                            <img src="{{ asset('assets/frontend/default/images/blog/blog-banner-1.webp') }}" alt="blog">
                        </div>
                        <div class="blog-details">
                            <div class="blog-titles">
                                <h2 class="text-20">Skills That You Can Learn From Education</h2>
                                <p class="text-13">It is a long established fact that a reader will be distracted by the readable...</p>
                            </div>
                            <div class="blog-author-date d-flex align-items-center justify-content-between">
                                <div class="blog-author d-flex align-items-center">
                                    <div class="blog-author-img">
                                        <img src="{{ asset('assets/frontend/default/images/blog-author-1.svg') }}" alt="author">
                                    </div>
                                    <h3 class="text-15">Rubias Hagrid</h3>
                                </div>
                                <h4 class="text-13">15 July, 2023</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Single Blog Card -->
            <div class="col-lg-4 col-md-6">
                <a href="#" class="single-blog">
                    <div class="single-blog-inner">
                        <div class="blog-img">
                            <img src="{{ asset('assets/frontend/default/images/blog/blog-banner-2.webp') }}" alt="blog">
                        </div>
                        <div class="blog-details">
                            <div class="blog-titles">
                                <h2  class="text-20">Difficult Things About color theory</h2>
                                <p class="text-13">It is a long established fact that a reader will be distracted by the readable...</p>
                            </div>
                            <div class="blog-author-date d-flex align-items-center justify-content-between">
                                <div class="blog-author d-flex align-items-center">
                                    <div class="blog-author-img">
                                        <img src="{{ asset('assets/frontend/default/images/blog-author-2.svg') }}" alt="author">
                                    </div>
                                    <h3 class="text-15">John Mories</h3>
                                </div>
                                <h4 class="text-13">12 July, 2023</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Single Blog Card -->
            <div class="col-lg-4 col-md-6">
                <a href="#" class="single-blog">
                    <div class="single-blog-inner">
                        <div class="blog-img">
                            <img src="{{ asset('assets/frontend/default/images/blog/blog-banner-3.svg') }}" alt="blog">
                        </div>
                        <div class="blog-details">
                            <div class="blog-titles">
                                <h2 class="text-20">Education Is So Famous, But Why?</h2>
                                <p class="text-13">It is a long established fact that a reader will be distracted by the readable...</p>
                            </div>
                            <div class="blog-author-date d-flex align-items-center justify-content-between">
                                <div class="blog-author d-flex align-items-center">
                                    <div class="blog-author-img">
                                        <img src="{{ asset('assets/frontend/default/images/blog-author-3.svg') }}" alt="author">
                                    </div>
                                    <h3 class="text-15">Lathan Lion</h3>
                                </div>
                                <h4 class="text-13">13 July, 2023</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Related Blog Area End -->

@endsection
@push('js')@endpush