<div class="tab-pane fade @if ($tab == 'forum') show active @endif" id="pills-forum" role="tabpanel" aria-labelledby="pills-forum-tab" tabindex="0">
    <div class="playing-tab-content">

        <div class="accordion-body">
            <div class="discussion-wrap">
                <div class="single-discussion">
                    <div class="discussion-user-area d-flex align-items-center">
                        <div class="img">
                            <img src="{{ asset('assets/frontend/default/images/blog-author-3.svg') }}" alt="">
                        </div>
                        <h4 class="name">Mandy Sherbasky</h4>
                    </div>
                    <p class="comment">It is a long established fact that a read will be distracted by the read content of a page.</p>
                </div>
                <div class="discussion-reply-show d-flex align-items-center">
                    <a href="javascript:void(0);" class="reply">
                        <img src="{{ asset('assets/frontend/default/images/icons/reply-gray.svg') }}" alt="">
                        Reply
                    </a>
                    <a href="javascript:void(0);" class="show-reply">Show 4 Replies</a>
                </div>
            </div>
            <div class="discussion-wrap">
                <div class="single-discussion">
                    <div class="discussion-user-area d-flex align-items-center">
                        <div class="img">
                            <img src="{{ asset('assets/frontend/default/images/blog-author-1.svg') }}" alt="">
                        </div>
                        <h4 class="name">David Watson</h4>
                    </div>
                    <p class="comment">It is a long established fact that a read will be distracted by the read content of a page.</p>
                </div>
                <div class="discussion-reply-show d-flex align-items-center">
                    <a href="javascript:void(0);" class="reply">
                        <img src="{{ asset('assets/frontend/default/images/icons/reply-gray.svg') }}" alt="">
                        Reply
                    </a>
                    <a href="javascript:void(0);" class="hide-reply">Hide Replies</a>
                </div>
                <!-- Reply -->
                <div class="single-discussion discussion-reply">
                    <div class="discussion-user-area d-flex align-items-center">
                        <div class="img">
                            <img src="{{ asset('assets/frontend/default/images/course/feedback-review-1.webp') }}" alt="">
                        </div>
                        <h4 class="name">Lara Ross</h4>
                    </div>
                    <p class="comment">It is a long established fact that a read will be distracted.</p>
                </div>
            </div>
            <div class="discussion-wrap">
                <div class="single-discussion">
                    <div class="discussion-user-area d-flex align-items-center">
                        <div class="img">
                            <img src="{{ asset('assets/frontend/default/images/blog-author-1.svg') }}" alt="">
                        </div>
                        <h4 class="name">David Watson</h4>
                    </div>
                    <p class="comment">It is a long established fact that a read will be distracted by the read content of a page.</p>
                </div>
                <div class="discussion-reply-show d-flex align-items-center">
                    <a href="javascript:void(0);" class="reply">
                        <img src="{{ asset('assets/frontend/default/images/icons/reply-gray.svg') }}" alt="">
                        Reply
                    </a>
                    <a href="javascript:void(0);" class="hide-reply">Hide Replies</a>
                </div>
                <!-- Reply form -->
                <form action="" class="discussion-reply-form">
                    <textarea name="" id="" class="form-control" placeholder="Write your Message..."></textarea>
                    <button type="submit" class="submit"></button>
                </form>
            </div>
        </div>

    </div>
</div>