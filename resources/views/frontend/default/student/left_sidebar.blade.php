<div class="student-panel-area">
    <div class="student-panel-cover">
        <img src="{{ asset('assets/frontend/default/images/student-panel-cover.webp') }}" alt="">
    </div>
    <div class="student-panel-profile">
        <div class="student-profile-img">
            <img src="{{ get_image(auth()->user()->photo) }}" alt="">
        </div>
        <h4 class="name">{{ auth()->user()->name }}</h4>
        <p class="mail">{{ auth()->user()->email }}</p>
    </div>
    <div class="student-panel-nav">
        <ul>
            <li>
                <a href="{{ route('my.courses') }}" class="@if (Route::currentRouteName() == 'my.courses') active @endif">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.50577 17.8751C4.0619 17.8751 3.68598 17.7211 3.37799 17.4131C3.07001 17.1052 2.91602 16.7292 2.91602 16.2854V3.67325C2.91602 3.22939 3.07001 2.85346 3.37799 2.54548C3.68598 2.23749 4.0619 2.0835 4.50577 2.0835H13.8262C14.2701 2.0835 14.646 2.23749 14.954 2.54548C15.262 2.85346 15.416 3.22939 15.416 3.67325V8.66043C15.416 8.83778 15.3492 8.99323 15.2156 9.12677C15.0821 9.26031 14.9267 9.32708 14.7493 9.32708C14.572 9.32708 14.4165 9.26031 14.283 9.12677C14.1494 8.99323 14.0827 8.83778 14.0827 8.66043V3.67325C14.0827 3.60914 14.056 3.55036 14.0025 3.49693C13.9491 3.44352 13.8903 3.41681 13.8262 3.41681H9.99931V8.178C9.99931 8.34314 9.92479 8.46589 9.77577 8.54625C9.62672 8.62661 9.48115 8.62085 9.33906 8.52898L8.10349 7.77096L6.86793 8.52898C6.72583 8.62085 6.58027 8.62661 6.43122 8.54625C6.2822 8.46589 6.20768 8.34314 6.20768 8.178V3.41681H4.50577C4.44165 3.41681 4.38288 3.44352 4.32945 3.49693C4.27604 3.55036 4.24933 3.60914 4.24933 3.67325V16.2854C4.24933 16.3495 4.27604 16.4083 4.32945 16.4617C4.38288 16.5151 4.44165 16.5418 4.50577 16.5418H9.17083C9.34818 16.5418 9.50362 16.6086 9.63716 16.7421C9.7707 16.8757 9.83747 17.0311 9.83747 17.2085C9.83747 17.3858 9.7707 17.5412 9.63716 17.6748C9.50362 17.8083 9.34818 17.8751 9.17083 17.8751H4.50577ZM14.7468 18.6219C13.694 18.6219 12.7993 18.2527 12.0626 17.5144C11.326 16.7761 10.9577 15.8806 10.9577 14.8278C10.9577 13.7749 11.3268 12.8802 12.0651 12.1436C12.8034 11.4069 13.699 11.0386 14.7518 11.0386C15.8046 11.0386 16.6994 11.4078 17.436 12.1461C18.1726 12.8844 18.541 13.78 18.541 14.8328C18.541 15.8856 18.1718 16.7803 17.4335 17.5169C16.6952 18.2536 15.7996 18.6219 14.7468 18.6219ZM14.6195 16.0947L15.9817 15.178C16.1131 15.1 16.1788 14.9788 16.1788 14.8142C16.1788 14.6497 16.1131 14.5284 15.9817 14.4505L14.6195 13.5338C14.4774 13.428 14.3305 13.418 14.1788 13.5037C14.0271 13.5895 13.9512 13.7208 13.9512 13.8976V15.7309C13.9512 15.9077 14.0271 16.039 14.1788 16.1247C14.3305 16.2104 14.4774 16.2004 14.6195 16.0947ZM9.17083 3.41681H4.24933H14.0827H9.17083Z" fill="#6B7385"/>
                    </svg>                              
                    <span>{{ get_phrase('My Courses') }}</span>                              
                </a>
            </li>
            <li>
                <a href="{{ route('my.profile') }}" class="@if (Route::currentRouteName() == 'my.profile') active @endif">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.99998 9.72292C9.17013 9.72292 8.47656 9.44428 7.91927 8.887C7.36198 8.32971 7.08333 7.63614 7.08333 6.80629C7.08333 5.97643 7.36198 5.28286 7.91927 4.72559C8.47656 4.16829 9.17013 3.88965 9.99998 3.88965C10.8298 3.88965 11.5234 4.16829 12.0807 4.72559C12.638 5.28286 12.9166 5.97643 12.9166 6.80629C12.9166 7.63614 12.638 8.32971 12.0807 8.887C11.5234 9.44428 10.8298 9.72292 9.99998 9.72292ZM14.9631 16.0899H5.03683C4.66243 16.0899 4.34394 15.9586 4.08137 15.696C3.81879 15.4335 3.6875 15.115 3.6875 14.7406V14.1749C3.6875 13.7529 3.80182 13.3715 4.03046 13.0306C4.25908 12.6898 4.55655 12.4327 4.92285 12.2594C5.7371 11.8836 6.57371 11.5948 7.43269 11.3928C8.29166 11.1909 9.14742 11.09 9.99998 11.09C10.8525 11.09 11.7118 11.1909 12.5777 11.3928C13.4436 11.5948 14.2745 11.8837 15.0705 12.2598C15.4412 12.4329 15.7409 12.6898 15.9695 13.0306C16.1981 13.3715 16.3125 13.7529 16.3125 14.1749V14.7406C16.3125 15.115 16.1812 15.4335 15.9186 15.696C15.656 15.9586 15.3375 16.0899 14.9631 16.0899ZM5.02081 14.7566H14.9791V14.1695C14.9791 14.0043 14.9337 13.8567 14.8429 13.7269C14.7521 13.5971 14.6298 13.5077 14.4759 13.4585C13.7858 13.1327 13.0537 12.8786 12.2797 12.6965C11.5058 12.5143 10.7458 12.4233 9.99998 12.4233C9.25412 12.4233 8.4942 12.5178 7.72023 12.7069C6.94626 12.896 6.21419 13.1465 5.52402 13.4585C5.36878 13.5342 5.24611 13.6304 5.156 13.7469C5.06587 13.8634 5.02081 14.0043 5.02081 14.1695V14.7566ZM9.99998 8.38963C10.4583 8.38963 10.8368 8.24032 11.1354 7.94171C11.434 7.6431 11.5833 7.26463 11.5833 6.80629C11.5833 6.34796 11.434 5.96949 11.1354 5.67088C10.8368 5.37227 10.4583 5.22296 9.99998 5.22296C9.54165 5.22296 9.16317 5.37227 8.86456 5.67088C8.56595 5.96949 8.41665 6.34796 8.41665 6.80629C8.41665 7.26463 8.56595 7.6431 8.86456 7.94171C9.16317 8.24032 9.54165 8.38963 9.99998 8.38963Z" fill="black"/>
                    </svg>
                    <span>{{ get_phrase('My Profile') }}</span>                              
                </a>
            </li>
            <li>
                <a href="{{ route('wishlist') }}" class="@if (Route::currentRouteName() == 'wishlist') active @endif">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.99261 17.4246C9.81419 17.4246 9.63498 17.3926 9.45496 17.3285C9.27494 17.2644 9.11655 17.1639 8.9798 17.0272L7.78271 15.9391C6.30514 14.5918 4.98596 13.2684 3.82517 11.9687C2.66438 10.669 2.08398 9.27667 2.08398 7.79165C2.08398 6.60897 2.48276 5.61885 3.2803 4.82131C4.07784 4.02377 5.06795 3.625 6.25063 3.625C6.92263 3.625 7.58636 3.77992 8.24182 4.08975C8.89726 4.39958 9.48353 4.90279 10.0006 5.59938C10.5177 4.90279 11.104 4.39958 11.7594 4.08975C12.4149 3.77992 13.0786 3.625 13.7506 3.625C14.9333 3.625 15.9234 4.02377 16.721 4.82131C17.5185 5.61885 17.9173 6.60897 17.9173 7.79165C17.9173 9.2927 17.327 10.7005 16.1464 12.0152C14.9659 13.3298 13.6496 14.6421 12.1977 15.9519L11.0134 17.0272C10.8767 17.1639 10.717 17.2644 10.5343 17.3285C10.3516 17.3926 10.171 17.4246 9.99261 17.4246ZM9.40128 6.86538C8.95043 6.1784 8.4758 5.67493 7.9774 5.35496C7.479 5.03497 6.90341 4.87498 6.25063 4.87498C5.4173 4.87498 4.72285 5.15276 4.1673 5.70831C3.61174 6.26387 3.33396 6.95831 3.33396 7.79165C3.33396 8.46045 3.54951 9.1597 3.98059 9.8894C4.41167 10.6191 4.9528 11.3445 5.60396 12.0656C6.25514 12.7868 6.96054 13.4914 7.72015 14.1794C8.47976 14.8675 9.18383 15.5069 9.83234 16.0977C9.88042 16.1405 9.93652 16.1618 10.0006 16.1618C10.0647 16.1618 10.1208 16.1405 10.1689 16.0977C10.8174 15.5069 11.5215 14.8675 12.2811 14.1794C13.0407 13.4914 13.7461 12.7868 14.3973 12.0656C15.0485 11.3445 15.5896 10.6191 16.0207 9.8894C16.4518 9.1597 16.6673 8.46045 16.6673 7.79165C16.6673 6.95831 16.3895 6.26387 15.834 5.70831C15.2784 5.15276 14.584 4.87498 13.7506 4.87498C13.0979 4.87498 12.5223 5.03497 12.0239 5.35496C11.5255 5.67493 11.0508 6.1784 10.6 6.86538C10.5295 6.97221 10.4408 7.05234 10.334 7.10577C10.2271 7.15919 10.116 7.1859 10.0006 7.1859C9.88526 7.1859 9.77414 7.15919 9.6673 7.10577C9.56046 7.05234 9.47179 6.97221 9.40128 6.86538Z" fill="#6B7385"/>
                    </svg>                                                           
                    <span>{{ get_phrase('Wishlist') }}</span>                              
                </a>
            </li>
            <li>
                <a href="{{ route('message') }}" class="@if (Route::currentRouteName() == 'message') active @endif">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.74933 11.7915H11.2493C11.4031 11.7915 11.5318 11.74 11.6355 11.6372C11.7391 11.5344 11.791 11.4067 11.791 11.2542C11.791 11.1017 11.7391 10.9726 11.6355 10.8668C11.5318 10.7611 11.4031 10.7082 11.2493 10.7082H5.74933C5.59559 10.7082 5.46688 10.7596 5.3632 10.8624C5.25952 10.9653 5.20768 11.0929 5.20768 11.2454C5.20768 11.3979 5.25952 11.5271 5.3632 11.6328C5.46688 11.7386 5.59559 11.7915 5.74933 11.7915ZM5.74933 9.04146H14.2493C14.4031 9.04146 14.5318 8.99005 14.6355 8.88721C14.7391 8.78437 14.791 8.6567 14.791 8.50421C14.791 8.35171 14.7391 8.22258 14.6355 8.11682C14.5318 8.01105 14.4031 7.95817 14.2493 7.95817H5.74933C5.59559 7.95817 5.46688 8.00959 5.3632 8.11242C5.25952 8.21527 5.20768 8.34294 5.20768 8.49542C5.20768 8.64792 5.25952 8.77705 5.3632 8.88282C5.46688 8.98858 5.59559 9.04146 5.74933 9.04146ZM5.74933 6.29146H14.2493C14.4031 6.29146 14.5318 6.24005 14.6355 6.13721C14.7391 6.03436 14.791 5.9067 14.791 5.75421C14.791 5.60171 14.7391 5.47258 14.6355 5.36682C14.5318 5.26105 14.4031 5.20817 14.2493 5.20817H5.74933C5.59559 5.20817 5.46688 5.25959 5.3632 5.36242C5.25952 5.46527 5.20768 5.59294 5.20768 5.74542C5.20768 5.89792 5.25952 6.02705 5.3632 6.13282C5.46688 6.23858 5.59559 6.29146 5.74933 6.29146ZM5.03139 14.5831L3.55308 16.0614C3.34205 16.2724 3.09979 16.3207 2.82629 16.206C2.55277 16.0914 2.41602 15.8849 2.41602 15.5863V3.75625C2.41602 3.38114 2.54553 3.06407 2.80456 2.80505C3.06359 2.54602 3.38065 2.4165 3.75577 2.4165H16.2429C16.618 2.4165 16.9351 2.54602 17.1941 2.80505C17.4531 3.06407 17.5826 3.38114 17.5826 3.75625V13.2434C17.5826 13.6185 17.4531 13.9356 17.1941 14.1946C16.9351 14.4536 16.618 14.5831 16.2429 14.5831H5.03139ZM4.07629 13.4998H16.2429C16.307 13.4998 16.3658 13.4731 16.4192 13.4197C16.4726 13.3663 16.4993 13.3075 16.4993 13.2434V3.75625C16.4993 3.69214 16.4726 3.63337 16.4192 3.57994C16.3658 3.52653 16.307 3.49982 16.2429 3.49982H3.75577C3.69165 3.49982 3.63288 3.52653 3.57945 3.57994C3.52604 3.63337 3.49933 3.69214 3.49933 3.75625V14.0768L4.07629 13.4998Z" fill="#6B7385"/>
                    </svg>                                                                                         
                    <span>{{ get_phrase('Message') }}</span>                              
                </a>
            </li>
            <li>
                <a href="{{ route('purchase.history') }}" class="@if (Route::currentRouteName() == 'purchase.history' || Route::currentRouteName() == 'invoice') active @endif">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.98351 16.5835C8.22496 16.5835 6.72417 15.9959 5.48111 14.8207C4.23805 13.6455 3.54762 12.1984 3.40982 10.4794C3.39272 10.3276 3.43706 10.2032 3.54282 10.106C3.64858 10.0088 3.77769 9.96281 3.93015 9.96815C4.07362 9.97349 4.19905 10.021 4.30642 10.1108C4.41378 10.2005 4.47334 10.3186 4.48509 10.4649C4.62185 11.8773 5.2116 13.0697 6.25434 14.0419C7.29706 15.0141 8.54012 15.5002 9.98351 15.5002C11.4974 15.5002 12.7925 14.962 13.8689 13.8856C14.9453 12.8092 15.4835 11.5141 15.4835 10.0002C15.4835 8.48632 14.9453 7.19118 13.8689 6.11479C12.7925 5.0384 11.4974 4.50021 9.98351 4.50021C9.17048 4.50021 8.41775 4.65795 7.72532 4.97344C7.0329 5.28893 6.43467 5.72306 5.93063 6.27583H7.50596C7.65942 6.27583 7.78806 6.32735 7.89188 6.43038C7.9957 6.5334 8.04761 6.66107 8.04761 6.81338C8.04761 6.96568 7.9957 7.09472 7.89188 7.20048C7.78806 7.30626 7.65942 7.35915 7.50596 7.35915H4.48676C4.29696 7.35915 4.13787 7.29495 4.00949 7.16654C3.8811 7.03815 3.8169 6.87906 3.8169 6.68927V3.67008C3.8169 3.51661 3.86842 3.38797 3.97144 3.28415C4.07447 3.18033 4.20214 3.12842 4.35444 3.12842C4.50675 3.12842 4.63578 3.18033 4.74155 3.28415C4.84731 3.38797 4.90019 3.51661 4.90019 3.67008V5.85279C5.50703 5.11028 6.24741 4.51867 7.12134 4.07796C7.99527 3.63725 8.94933 3.4169 9.98351 3.4169C10.8974 3.4169 11.7534 3.58961 12.5515 3.93502C13.3496 4.28042 14.0456 4.75011 14.6396 5.34408C15.2336 5.93807 15.7033 6.63407 16.0487 7.43208C16.3941 8.2301 16.5668 9.08599 16.5668 9.99975C16.5668 10.9135 16.3941 11.7696 16.0487 12.5679C15.7033 13.3662 15.2336 14.0623 14.6396 14.6563C14.0456 15.2503 13.3496 15.72 12.5515 16.0654C11.7534 16.4108 10.8974 16.5835 9.98351 16.5835ZM10.5492 9.45534L12.6325 11.5387C12.7479 11.6541 12.8035 11.7783 12.7992 11.9113C12.7949 12.0443 12.7324 12.1712 12.6117 12.2919C12.491 12.4126 12.362 12.473 12.2247 12.473C12.0874 12.473 11.9584 12.4126 11.8377 12.2919L9.67703 10.1312C9.60892 10.0631 9.5567 9.98869 9.52038 9.90798C9.48405 9.82727 9.46588 9.74387 9.46588 9.65777V6.53511C9.46588 6.38355 9.51886 6.25652 9.62482 6.154C9.73078 6.05147 9.85844 6.00021 10.0078 6.00021C10.1572 6.00021 10.2848 6.05212 10.3905 6.15594C10.4963 6.25976 10.5492 6.3884 10.5492 6.54186V9.45534Z" fill="#6B7385"/>
                    </svg>                                                                                                                      
                    <span>{{ get_phrase('Purchase History') }}</span>                              
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.90039 7.55999C9.21039 3.95999 11.0604 2.48999 15.1104 2.48999H15.2404C19.7104 2.48999 21.5004 4.27999 21.5004 8.74999V15.27C21.5004 19.74 19.7104 21.53 15.2404 21.53H15.1104C11.0904 21.53 9.24039 20.08 8.91039 16.54" stroke="#6B7385" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M2 12H14.88" stroke="#6B7385" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.6504 8.6499L16.0004 11.9999L12.6504 15.3499" stroke="#6B7385" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    {{ get_phrase('Logout') }}
                </a>
            </li>
        </ul>
        @if (auth()->user()->role == 'student')
            <div class="my-course-btn mt-4 justify-content-center">
                <a href="{{ route('become.instructor') }}" class="continue-leason-btn">{{ get_phrase('Become An Instructors') }}</a>
            </div>
        @endif
    </div>
</div>