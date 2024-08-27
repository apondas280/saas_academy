<div class="col-lg-4">
    <div class="course-overview-area padding-bottom-50">
        <h2 class="course-overview-price">
            @if (isset($bootcamp->discount_flag) && $bootcamp->discount_flag == 1)
                {{ currency(number_format($bootcamp->price - $bootcamp->discounted_price, 2)) }}
                <span class="text-decoration-line-through">{{ currency(number_format($bootcamp->price, 2)) }}</span>
            @elseif (isset($bootcamp->is_paid) && $bootcamp->is_paid == 0)
                {{ get_phrase('Free') }}
            @else
                {{ currency(number_format($bootcamp->price, 2)) }}
            @endif
        </h2>
        <div class="course-leasons-level d-flex align-items-center">
            <div class="single-leason-level d-flex align-items-center">
                <div class="icon">
                    <img src="assets/images/course/leasons.svg" alt="">
                </div>
                <div class="details">
                    <h5 class="title">{{ get_phrase('Modules') }}</h5>
                    <h5 class="info">{{ count_bootcamp_modules($bootcamp->id) }}</h5>
                </div>
            </div>
            <div class="single-leason-level d-flex align-items-center">
                <div class="icon">
                    <img src="assets/images/course/level.svg" alt="">
                </div>
                <div class="details">
                    <h5 class="title">{{ get_phrase('Live Classes') }}</h5>
                    <h5 class="info">{{ count_bootcamp_classes($bootcamp->id) }}</h5>
                </div>
            </div>
        </div>
        <ul class="course-overview-list">
            <li>
                <span class="title">
                    <img src="{{ asset('assets/frontend/default/images/icons/user.svg') }}" alt="">
                    {{ get_phrase('Students') }}
                    <span>:</span>
                </span>
                <span class="info">{{ bootcamp_enrolls($bootcamp->id) }}</span>
            </li>
            <li>
                <span class="title">
                    <img src="{{ asset('assets/frontend/default/images/icons/file.svg') }}" alt="">
                    {{ get_phrase('Resources') }}
                    <span>:</span>
                </span>
                <span class="info">{{ count_bootcamp_resources($bootcamp->id) }}</span>
            </li>
            <li>
                <span class="title">
                    <img src="{{ asset('assets/frontend/default/images/icons/file.svg') }}" alt="">
                    {{ get_phrase('Class Record') }}
                    <span>:</span>
                </span>
                <span class="info">{{ count_bootcamp_class_records($bootcamp->id) }}</span>
            </li>
        </ul>
        <div class="course-overview-buttons">
            @php
                if (isset(auth()->user()->id)) {
                    $is_purchased = DB::table('bootcamp_purchases')
                        ->where('user_id', auth()->user()->id)
                        ->where('bootcamp_id', $bootcamp->id)
                        ->where('status', 1)
                        ->exists();

                    $pending_bootcamp_payment = DB::table('offline_payments')
                        ->where('user_id', auth()->user()->id)
                        ->where('item_type', 'bootcamp')
                        ->where('items', $bootcamp->id)
                        ->where('status', 0)
                        ->first();
                }
            @endphp

            @if (isset(auth()->user()->id))
                @if ($pending_bootcamp_payment)
                    <a href="{{ route('purchase.bootcamp', $bootcamp->id) }}" class="course-enroll-btn">
                        <img src="{{ asset('assets/frontend/default/images/icons/video-player.svg') }}" alt="...">
                        {{ get_phrase('Processing') }}</a>
                @else
                    @if ($is_purchased)
                        <a href="{{ route('my.bootcamp.details', $bootcamp->slug) }}" class="course-enroll-btn">
                            <img src="{{ asset('assets/frontend/default/images/icons/video-player.svg') }}" alt="...">
                            {{ get_phrase('Show In Collection') }}</a>
                    @else
                        <a href="{{ route('purchase.bootcamp', $bootcamp->id) }}" class="course-enroll-btn">
                            <img src="{{ asset('assets/frontend/default/images/icons/video-player.svg') }}" alt="...">
                            {{ get_phrase($bootcamp->is_paid ? 'Purchase Bootcamp' : 'Enroll Bootcamp') }}
                        </a>
                    @endif
                @endif
            @else
                <a href="{{ route('purchase.bootcamp', $bootcamp->id) }}" class="course-enroll-btn">
                    <img src="{{ asset('assets/frontend/default/images/icons/video-player.svg') }}" alt="...">
                    {{ get_phrase($bootcamp->is_paid ? 'Purchase Bootcamp' : 'Enroll Bootcamp') }}</a>
            @endif
        </div>

        <p class="text-center">{{ get_phrase('Share on social media') }}</p>
        <div class="course-overview-social">
            @php
                $ref = isset($user_data['unique_identifier']) ? $user_data['unique_identifier'] : '';
                $share_url = route('course.details', $bootcamp->slug);
            @endphp
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $share_url }}&ref={{ $ref }}" target="_blank" class="p-2" style="color: #316FF6;" data-bs-toggle="tooltip" title="{{ get_phrase('Share on Facebook') }}" data-bs-placement="top">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_369_3435)">
                        <path
                            d="M13.9983 13.499H16.4983L17.4983 9.49902H13.9983V7.49902C13.9983 6.46902 13.9983 5.49902 15.9983 5.49902H17.4983V2.13902C17.1723 2.09602 15.9413 1.99902 14.6413 1.99902C11.9263 1.99902 9.99832 3.65602 9.99832 6.69902V9.49902H6.99832V13.499H9.99832V21.999H13.9983V13.499Z"
                            fill="#6B7385"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_369_3435">
                            <rect width="24" height="24" fill="white"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ $share_url }}&ref={{ $ref }}" target="_blank" class="p-2" style="color: #128c7e;" data-bs-toggle="tooltip" title="{{ get_phrase('Share on Whatsapp') }}" data-bs-placement="top">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.3166 9.50834C18.0332 4.67501 13.6416 0.950014 8.58323 1.78335C5.0999 2.35835 2.30824 5.18333 1.76657 8.66667C1.44991 10.6833 1.86659 12.5917 2.77492 14.1667L2.03325 16.925C1.86658 17.55 2.44156 18.1167 3.05823 17.9417L5.7749 17.1917C7.00824 17.9167 8.4499 18.3333 9.99157 18.3333C14.6916 18.3333 18.5916 14.1917 18.3166 9.50834ZM14.0666 13.1C13.9916 13.25 13.8999 13.3917 13.7832 13.525C13.5749 13.75 13.3499 13.9167 13.0999 14.0167C12.8499 14.125 12.5749 14.175 12.2832 14.175C11.8582 14.175 11.3999 14.075 10.9249 13.8667C10.4416 13.6583 9.96659 13.3833 9.49159 13.0417C9.00826 12.6917 8.55824 12.3 8.12491 11.875C7.69158 11.4417 7.30822 10.9833 6.95822 10.5083C6.61656 10.0333 6.34157 9.55833 6.14157 9.08333C5.94157 8.60833 5.84159 8.15001 5.84159 7.71668C5.84159 7.43334 5.89158 7.15834 5.99158 6.90834C6.09158 6.65001 6.24993 6.41668 6.47493 6.20835C6.74159 5.94168 7.03324 5.81668 7.34158 5.81668C7.45824 5.81668 7.57489 5.84168 7.68322 5.89168C7.79155 5.94168 7.89157 6.01667 7.96658 6.12501L8.93322 7.49166C9.00822 7.59999 9.06656 7.69167 9.0999 7.78333C9.14156 7.875 9.15824 7.95833 9.15824 8.04166C9.15824 8.14166 9.12491 8.24168 9.06658 8.34168C9.00825 8.44168 8.93322 8.54167 8.83322 8.64167L8.51655 8.97499C8.46655 9.02499 8.44992 9.075 8.44992 9.14167C8.44992 9.175 8.45822 9.20833 8.46655 9.24167C8.48322 9.275 8.49159 9.30001 8.49992 9.32501C8.57492 9.46667 8.70823 9.64166 8.89156 9.85833C9.08323 10.075 9.28326 10.3 9.49993 10.5167C9.72493 10.7417 9.94159 10.9417 10.1666 11.1333C10.3833 11.3167 10.5666 11.4417 10.7082 11.5167C10.7332 11.525 10.7582 11.5417 10.7832 11.55C10.8166 11.5667 10.8499 11.5667 10.8916 11.5667C10.9666 11.5667 11.0166 11.5417 11.0666 11.4917L11.3832 11.175C11.4916 11.0667 11.5916 10.9917 11.6833 10.9417C11.7833 10.8833 11.8749 10.85 11.9832 10.85C12.0666 10.85 12.1499 10.8667 12.2416 10.9083C12.3332 10.95 12.4332 11 12.5332 11.075L13.9166 12.0583C14.0249 12.1333 14.0999 12.225 14.1499 12.325C14.1916 12.4333 14.2166 12.5333 14.2166 12.65C14.1666 12.7917 14.1332 12.95 14.0666 13.1Z"
                        fill="#6B7385"></path>
                </svg>
            </a>
            <a href="https://www.linkedin.com/shareArticle?url={{ $share_url }}&title={{ $bootcamp->title }}&summary={{ $bootcamp->short_description }}&ref={{ $ref }}" target="_blank" class="p-2" style="color: #0077b5;" data-bs-toggle="tooltip"
                title="{{ get_phrase('Share on Linkedin') }}" data-bs-placement="top">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_369_3441)">
                        <path
                            d="M6.93872 5.00002C6.93846 5.53046 6.72749 6.03906 6.35223 6.41394C5.97697 6.78883 5.46815 6.99929 4.93772 6.99902C4.40729 6.99876 3.89869 6.78779 3.5238 6.41253C3.14891 6.03727 2.93846 5.52846 2.93872 4.99802C2.93899 4.46759 3.14995 3.95899 3.52521 3.5841C3.90047 3.20922 4.40929 2.99876 4.93972 2.99902C5.47015 2.99929 5.97876 3.21026 6.35364 3.58552C6.72853 3.96078 6.93899 4.46959 6.93872 5.00002ZM6.99872 8.48002H2.99872V21H6.99872V8.48002ZM13.3187 8.48002H9.33872V21H13.2787V14.43C13.2787 10.77 18.0487 10.43 18.0487 14.43V21H21.9987V13.07C21.9987 6.90002 14.9387 7.13002 13.2787 10.16L13.3187 8.48002Z"
                            fill="#6B7385"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_369_3441">
                            <rect width="24" height="24" fill="white"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <a href="https://www.linkedin.com/shareArticle?url={{ $share_url }}&title={{ $bootcamp->title }}&summary={{ $bootcamp->short_description }}&ref={{ $ref }}" target="_blank" class="p-2" style="color: #0077b5;" data-bs-toggle="tooltip"
                title="{{ get_phrase('Share on Linkedin') }}" data-bs-placement="top">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.2708 1.71399H18.0835L11.9403 8.73336L19.1667 18.2866H13.5101L9.07646 12.494L4.00882 18.2866H1.1916L7.76104 10.7768L0.833333 1.71399H6.63354L10.6371 7.0085L15.2708 1.71399ZM14.2831 16.6052H15.8407L5.78486 3.30746H4.11194L14.2831 16.6052Z" fill="#6B7385"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
