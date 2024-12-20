{{-- <div class="accordion-body">
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
</div> --}}

<form action="">
    <div class="search-box">
        <input type="text" value="{{ $_GET['search'] ?? '' }}" name="search" class="form-control" placeholder="{{ get_phrase('Search answers here') }}">
        <div class="icon">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.7561 18.5778L14.782 13.6036C16.1375 11.9458 16.804 9.83038 16.6435 7.69494C16.4831 5.5595 15.508 3.56742 13.92 2.13074C12.3319 0.694065 10.2525 -0.0772832 8.11168 -0.0237567C5.97088 0.0297698 3.93256 0.904076 2.41832 2.41832C0.904076 3.93256 0.0297698 5.97088 -0.0237567 8.11168C-0.0772832 10.2525 0.694065 12.3319 2.13074 13.92C3.56742 15.508 5.5595 16.4831 7.69494 16.6435C9.83038 16.804 11.9458 16.1375 13.6036 14.782L18.5778 19.7561C18.735 19.9079 18.9455 19.9919 19.164 19.99C19.3825 19.9881 19.5915 19.9005 19.746 19.746C19.9005 19.5915 19.9881 19.3825 19.99 19.164C19.9919 18.9455 19.9079 18.735 19.7561 18.5778ZM8.33364 15.0003C7.0151 15.0003 5.72617 14.6093 4.62984 13.8768C3.53351 13.1442 2.67903 12.103 2.17444 10.8849C1.66986 9.66669 1.53784 8.32625 1.79507 7.03304C2.05231 5.73983 2.68724 4.55195 3.61959 3.61959C4.55195 2.68724 5.73983 2.05231 7.03304 1.79507C8.32625 1.53784 9.66669 1.66986 10.8849 2.17444C12.103 2.67903 13.1442 3.53351 13.8768 4.62984C14.6093 5.72617 15.0003 7.0151 15.0003 8.33364C14.9983 10.1011 14.2953 11.7957 13.0455 13.0455C11.7957 14.2953 10.1011 14.9983 8.33364 15.0003Z"
                    fill="#6B7385" />
            </svg>
        </div>
    </div>
</form>
<div class="add-question">
    <h1>{{ $questions->count() }} {{ get_phrase('Questions in this course') }}</h1>

    <button class="eBtn gradient border-0 show-form" id="create-question">
        <span>
            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M6 8.5H1C0.716667 8.5 0.479167 8.40417 0.2875 8.2125C0.0958333 8.02083 0 7.78333 0 7.5C0 7.21667 0.0958333 6.97917 0.2875 6.7875C0.479167 6.59583 0.716667 6.5 1 6.5H6V1.5C6 1.21667 6.09583 0.979167 6.2875 0.7875C6.47917 0.595833 6.71667 0.5 7 0.5C7.28333 0.5 7.52083 0.595833 7.7125 0.7875C7.90417 0.979167 8 1.21667 8 1.5V6.5H13C13.2833 6.5 13.5208 6.59583 13.7125 6.7875C13.9042 6.97917 14 7.21667 14 7.5C14 7.78333 13.9042 8.02083 13.7125 8.2125C13.5208 8.40417 13.2833 8.5 13 8.5H8V13.5C8 13.7833 7.90417 14.0208 7.7125 14.2125C7.52083 14.4042 7.28333 14.5 7 14.5C6.71667 14.5 6.47917 14.4042 6.2875 14.2125C6.09583 14.0208 6 13.7833 6 13.5V8.5Z"
                    fill="white" />
            </svg>
        </span>
        <span>{{ get_phrase('Ask question') }}</span>
    </button>
</div>
@include('course_player.forum.review')
