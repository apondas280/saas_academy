<a href="{{ route('blog.details', $blog->slug) }}" class="single-blog">
    <div class="single-blog-inner">
        <div class="blog-img">
            <img src="{{ get_image($blog->thumbnail) }}" alt="blog-thumbnail">
        </div>
        <div class="blog-details">
            <div class="blog-titles">
                <h2 class="text-20">{{ ucfirst($blog->title) }}</h2>
                <p class="text-13">
                    {!! ellipsis(removeScripts($blog->description), 120) !!}
                </p>
            </div>
            <div class="blog-author-date d-flex align-items-center justify-content-between">
                <div class="blog-author d-flex align-items-center">
                    <div class="blog-author-img">
                        <img src="{{ get_image_by_id($blog->user_id) }}" alt="author">
                    </div>
                    <h3 class="text-15">{{ $blog->user->name }}</h3>
                </div>
                <h4 class="text-13">{{ date('d M, Y', strtotime($blog->created_at)) }}</h4>
            </div>
        </div>
    </div>
</a>
