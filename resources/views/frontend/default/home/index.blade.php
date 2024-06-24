@extends('layouts.default')
@push('title', get_phrase('Home'))
@push('meta')@endpush
@push('css')@endpush
@section('content')

<!-- Banner Area Start -->
<section>
      <div class="container">
         <div class="row">
            <div class="col-md-6 order-md-1 order-2">
               <!-- Banner Left Section -->
               <div class="banner-content wow fadeInUp" data-wow-duration="2s">
                  <h4 class="text-15 blue-batch">#1 Worldwide online learning & skill development platform</h4>
                  <h1 class="text-64">Master new skills with <span>Educate</span></h1>
                  <p class="text-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                  <div class="banner-search">
                     <form action="">
                        <div class="search-input-group">
                           <input type="search" class="text-15" name="" id="" placeholder="Search a course for your future job!">
                           <button type="submit">
                              <img src="{{ asset('assets/frontend/default/images/search-white.svg') }}" alt="search">
                           </button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-md-6  order-md-2 order-1">
               <!-- Banner Right Section -->
               <div class="banner-area-img wow bounceInRight" data-wow-duration="2s">
                  <img src="{{ asset('assets/frontend/default/images/banner.webp') }}" alt="banner">
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Banner Area End -->

   <!-- Why Choose Area Start  -->
   <section>
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <!-- Section Title -->
               <div class="section-title padding-bottom-50">
                  <h4 class="text-15 blue-batch">Why Choose us</h4>
                  <h2 class="text-40">Why are we different from others?</h2>
                  <p class="text-15 section-title-pera">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
               </div>
            </div>
         </div>
         <div class="row mrg-30 padding-bottom-110 wow fadeInUp" data-wow-duration="2s">
            <!-- Single Advantege Card -->
            <div class="col-lg-3 col-md-6">
               <div class="single-advantage">
                  <div class="advantage-logo advantage-logo-1">
                     <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_369_474)">
                        <path d="M36.7558 13.0856L34.2918 16.7944C35.4801 19.1662 36.0618 21.7959 35.9849 24.448C35.908 27.1001 35.1748 29.6916 33.851 31.9905H6.08581C4.36534 29.0036 3.65243 25.5414 4.05278 22.1172C4.45312 18.6929 5.9454 15.489 8.30839 12.9802C10.6714 10.4715 13.7793 8.79152 17.1713 8.1894C20.5634 7.58728 24.0591 8.09505 27.1401 9.63744L30.8462 7.17159C27.073 4.75028 22.5974 3.66529 18.1352 4.09016C13.6731 4.51503 9.48223 6.42522 6.23303 9.51518C2.98384 12.6051 0.864023 16.6963 0.212673 21.1343C-0.438677 25.5724 0.41607 30.1008 2.64019 33.9952C2.98978 34.6012 3.49176 35.1051 4.09623 35.4568C4.7007 35.8085 5.38661 35.9957 6.08581 36H33.831C34.537 36.0028 35.2312 35.8188 35.8433 35.4668C36.4554 35.1147 36.9637 34.6071 37.3167 33.9952C39.1625 30.7955 40.0887 27.1475 39.9933 23.4541C39.8979 19.7607 38.7844 16.1656 36.7758 13.0656L36.7558 13.0856Z" fill="#217CE9"/>
                        <path d="M17.65 25.6832C17.9596 25.9931 18.3272 26.239 18.7319 26.4067C19.1365 26.5745 19.5703 26.6608 20.0083 26.6608C20.4464 26.6608 20.8801 26.5745 21.2848 26.4067C21.6894 26.239 22.0571 25.9931 22.3667 25.6832L31.8 11.5332L17.65 20.9665C17.3401 21.2761 17.0942 21.6437 16.9265 22.0484C16.7587 22.4531 16.6724 22.8868 16.6724 23.3249C16.6724 23.7629 16.7587 24.1967 16.9265 24.6013C17.0942 25.006 17.3401 25.3736 17.65 25.6832Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_369_474">
                        <rect width="40" height="40" fill="white"/>
                        </clipPath>
                        </defs>
                     </svg>                       
                  </div>
                  <div class="advantage-details">
                     <h3 class="text-18">Fast Performance</h3>
                     <p class="text-15">It is a long established fact that a reader will be distracted.</p>
                  </div>
               </div>
            </div>
            <!-- Single Advantege Card -->
            <div class="col-lg-3 col-md-6">
               <div class="single-advantage">
                  <div class="advantage-logo advantage-logo-2">
                     <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_369_478)">
                        <path d="M3.33333 25C3.33333 25.9167 4.08333 26.6667 5 26.6667H18.3333C19.25 26.6667 20 27.4167 20 28.3333C20 29.25 19.25 30 18.3333 30H5C2.25 30 0 27.75 0 25C0 22.8333 1.4 21 3.33333 20.3V8.33333C3.33333 3.73333 7.06667 0 11.6667 0H28.3333C32.9333 0 36.6667 3.73333 36.6667 8.33333V10C36.6667 10.9167 35.9167 11.6667 35 11.6667C34.0833 11.6667 33.3333 10.9167 33.3333 10V8.33333C33.3333 5.58333 31.0833 3.33333 28.3333 3.33333H11.6667C8.91667 3.33333 6.66667 5.58333 6.66667 8.33333V20H14.1667C14.6167 20 15.0333 20.1833 15.35 20.4833L16.5333 21.6667H18.35C19.2667 21.6667 20.0167 22.4167 20.0167 23.3333C20.0167 24.25 19.2667 25 18.35 25H15.85C15.4 25 14.9833 24.8167 14.6667 24.5167L13.4833 23.3333H5C4.08333 23.3333 3.33333 24.0833 3.33333 25ZM40 21.6667V33.3333C40 37.0167 37.0167 40 33.3333 40H30C26.3167 40 23.3333 37.0167 23.3333 33.3333V21.6667C23.3333 17.9833 26.3167 15 30 15H33.3333C37.0167 15 40 17.9833 40 21.6667ZM36.6667 21.6667C36.6667 19.8333 35.1667 18.3333 33.3333 18.3333H30C28.1667 18.3333 26.6667 19.8333 26.6667 21.6667V33.3333C26.6667 35.1667 28.1667 36.6667 30 36.6667H33.3333C35.1667 36.6667 36.6667 35.1667 36.6667 33.3333V21.6667Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_369_478">
                        <rect width="40" height="40" fill="white"/>
                        </clipPath>
                        </defs>
                     </svg>                                              
                  </div>
                  <div class="advantage-details">
                     <h3 class="text-18">Perfect Responsive</h3>
                     <p class="text-15">It is a long established fact that a reader will be distracted.</p>
                  </div>
               </div>
            </div>
            <!-- Single Advantege Card -->
            <div class="col-lg-3 col-md-6">
               <div class="single-advantage">
                  <div class="advantage-logo advantage-logo-3">
                     <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_369_503)">
                        <path d="M38 20.44C38 9.46 29.48 2 20 2C10.62 2 2 9.3 2 20.56C0.8 21.24 0 22.52 0 24V28C0 30.2 1.8 32 4 32C5.1 32 6 31.1 6 30V20.38C6 12.72 11.9 6.02 19.56 5.8C27.48 5.56 34 11.92 34 19.8V34H20C18.9 34 18 34.9 18 36C18 37.1 18.9 38 20 38H34C36.2 38 38 36.2 38 34V31.56C39.18 30.94 40 29.72 40 28.28V23.68C40 22.28 39.18 21.06 38 20.44Z" fill="white"/>
                        <path d="M14 24C15.1046 24 16 23.1046 16 22C16 20.8954 15.1046 20 14 20C12.8954 20 12 20.8954 12 22C12 23.1046 12.8954 24 14 24Z" fill="white"/>
                        <path d="M26 24C27.1046 24 28 23.1046 28 22C28 20.8954 27.1046 20 26 20C24.8954 20 24 20.8954 24 22C24 23.1046 24.8954 24 26 24Z" fill="white"/>
                        <path d="M31.9999 18.06C31.0399 12.36 26.0799 8 20.0999 8C14.0399 8 7.51994 13.02 8.03994 20.9C12.9799 18.88 16.6999 14.48 17.7599 9.12C20.3799 14.38 25.7599 18 31.9999 18.06Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_369_503">
                        <rect width="40" height="40" fill="white"/>
                        </clipPath>
                        </defs>
                     </svg>                                              
                  </div>
                  <div class="advantage-details">
                     <h3 class="text-18">Fast & Friendly Support</h3>
                     <p class="text-15">It is a long established fact that a reader will be distracted.</p>
                  </div>
               </div>
            </div>
            <!-- Single Advantege Card -->
            <div class="col-lg-3 col-md-6">
               <div class="single-advantage">
                  <div class="advantage-logo advantage-logo-4">
                     <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="easy-to-use 1" clip-path="url(#clip0_369_480)">
                        <g id="g483">
                        <g id="g485">
                        <g id="Clip path group">
                        <mask id="mask0_369_480" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                        <g id="clipPath491">
                        <path id="path489" d="M0 3.8147e-06H40V40H0V3.8147e-06Z" fill="white"/>
                        </g>
                        </mask>
                        <g mask="url(#mask0_369_480)">
                        <g id="g487">
                        <g id="g493">
                        <path id="path495" d="M29.6294 19.3013C30.6098 18.321 30.6098 16.7313 29.6294 15.7509C28.6491 14.7706 27.0594 14.7706 26.0791 15.7509C24.9953 16.8354 23.6132 18.2168 22.5287 19.3013C21.5484 20.2816 21.5484 21.8713 22.5287 22.8516C23.5097 23.832 25.0988 23.832 26.0791 22.8516C27.1636 21.7672 28.5456 20.3858 29.6294 19.3013Z" stroke="white" stroke-width="2.34375" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <g id="g497">
                        <path id="path499" d="M32.2923 23.7391C33.2726 22.7588 33.2726 21.1691 32.2923 20.1887C31.312 19.2084 29.7223 19.2084 28.742 20.1887C27.9072 21.0235 26.9137 22.017 26.079 22.8517C25.0987 23.832 25.0987 25.421 26.079 26.402C27.0593 27.3823 28.649 27.3823 29.6293 26.402C30.4641 25.5667 31.4575 24.5738 32.2923 23.7391Z" stroke="white" stroke-width="2.34375" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <g id="g501">
                        <path id="path503" d="M34.9546 28.1771C35.4259 27.7064 35.6902 27.0675 35.6902 26.4023C35.6902 25.7363 35.4259 25.0974 34.9546 24.6267C34.484 24.156 33.8457 23.8918 33.1798 23.8918C32.5139 23.8918 31.8756 24.156 31.4048 24.6267C30.8331 25.1979 30.2005 25.8305 29.6294 26.4023C29.1587 26.873 28.8945 27.5113 28.8945 28.1771C28.8945 28.843 29.1587 29.4813 29.6294 29.952C30.1001 30.4233 30.739 30.6875 31.4048 30.6875C32.0702 30.6875 32.7091 30.4233 33.1798 29.952C33.7509 29.3809 34.3835 28.7482 34.9546 28.1771Z" stroke="white" stroke-width="2.34375" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <g id="g505">
                        <path id="path507" d="M26.0791 15.7511C26.0791 15.7511 29.9389 11.892 32.2924 9.53844C32.7632 9.06711 33.0274 8.42883 33.0274 7.76297C33.0274 7.09711 32.7632 6.45883 32.2924 5.98813C31.8217 5.51735 31.1828 5.25258 30.5169 5.25258C29.8511 5.25258 29.2127 5.51735 28.7421 5.98813L15.4287 19.3015C15.4287 19.3015 14.8683 16.8745 14.2619 14.2461C13.9608 12.9401 12.9741 11.9002 11.6851 11.5305C10.3966 11.1608 9.00897 11.5198 8.06123 12.4681C8.06061 12.4681 8.06061 12.4688 8.06061 12.4688L8.07568 27.5313L4.31006 31.2969L11.8413 38.8281H22.7447C23.7433 38.8281 24.7009 38.4309 25.4069 37.7248C28.1308 35.0016 34.9547 28.177 34.9547 28.177" stroke="white" stroke-width="2.34375" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <g id="g509">
                        <path id="path511" d="M15.4287 19.3015C15.4287 19.3015 15.7864 19.6592 16.3161 20.1889C18.7669 22.6397 18.7669 26.6137 16.3161 29.0645" stroke="white" stroke-width="2.34375" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <g id="g513">
                        <path id="path515" d="M15.6069 6.19287V1.17201" stroke="white" stroke-width="2.34375" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <g id="g517">
                        <path id="path519" d="M10.5862 6.19287L9.33105 4.93771" stroke="white" stroke-width="2.34375" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <g id="g521">
                        <path id="path523" d="M20.6279 6.19287L21.8831 4.93771" stroke="white" stroke-width="2.34375" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        </g>
                        </g>
                        </g>
                        </g>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_369_480">
                        <rect width="40" height="40" fill="white"/>
                        </clipPath>
                        </defs>
                     </svg>                                            
                  </div>  
                  <div class="advantage-details">
                     <h3 class="text-18">Easy to Use</h3>
                     <p class="text-15">It is a long established fact that a reader will be distracted.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Why Choose Area End  -->

   <!-- Categories Area Start  -->
   <section>
      <div class="container">
         <div class="row">
            <!-- Section Title -->
            <div class="col-lg-12">
               <div class="section-title padding-bottom-50">
                  <h4 class="text-15 blue-batch">{{ get_phrase('Categories') }}</h4>
                  <h2 class="text-40">{{ get_phrase('Explore Top Courses Categories') }}</h2>
                  <p class="text-15 section-title-pera">{{ get_phrase('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.') }}</p>
               </div>
            </div>
         </div>
         <div class="row mrg-30 padding-bottom-110 wow fadeInUp" data-wow-duration="2s">
            @foreach(App\Models\Category::where('parent_id', 0)->take(12)->get() as $category)
            <div class="col-xl-3 col-lg-4 col-md-6">
               <a href="{{ route('courses', $category->slug) }}" class="single-category d-flex align-items-center">
                  <div class="category-icon">
                     <span>
                        <i class="{{ $category->icon }}"></i>
                     </span>
                  </div>
                  <div class="category-details">
                     <h3 class="text-16">{{ $category->title }}</h3>
                     <h4 class="text-13">{{ count_category_courses($category->id) }}</h4>
                  </div>
               </a>
            </div>
            @endforeach

         </div>
      </div>
   </section>
   <!-- Categories Area End  -->

   <!-- Courses Area Start  -->
   <section>
      <div class="container">
         <div class="row">
            <!-- Section Title -->
            <div class="col-lg-12">
               <div class="section-title padding-bottom-50">
                  <h4 class="text-15 blue-batch">{{ get_phrase('Courses') }}</h4>
                  <h2 class="text-40">{{ get_phrase('Featured Courses') }}</h2>
               </div>
            </div>
         </div>
         <div class="row mrg-30 wow fadeInUp" data-wow-duration="2s">
            @php
               $featured_courses = App\Models\Course::where('status', 'active')->latest('id')->get();
            @endphp

            @foreach ($featured_courses->take(4) as $key => $row)
            <div class="col-lg-3 col-md-6">
               <div class="single-courses">
                  <a href="{{ route('course.details', $row->slug) }}" class="single-course-link"></a>
                  <div class="single-course-inner">
                     <div class="course-img">
                        <img src="{{ get_image($row->thumbnail) }}" alt="Course">
                        <a href="javascript:void(0);" class="wish-react">
                           <div class="wish-icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g id="favorite_FILL0_wght300_GRAD0_opsz24 (1) 1">
                                 <path id="Vector" d="M9.99212 17.4246C9.8137 17.4246 9.63449 17.3926 9.45448 17.3285C9.27445 17.2644 9.11606 17.1639 8.97931 17.0272L7.78223 15.9391C6.30466 14.5918 4.98548 13.2684 3.82468 11.9687C2.66389 10.669 2.0835 9.27667 2.0835 7.79165C2.0835 6.60897 2.48227 5.61885 3.27981 4.82131C4.07735 4.02377 5.06746 3.625 6.25014 3.625C6.92214 3.625 7.58587 3.77992 8.24133 4.08975C8.89677 4.39958 9.48305 4.90279 10.0001 5.59938C10.5172 4.90279 11.1035 4.39958 11.759 4.08975C12.4144 3.77992 13.0781 3.625 13.7501 3.625C14.9328 3.625 15.9229 4.02377 16.7205 4.82131C17.518 5.61885 17.9168 6.60897 17.9168 7.79165C17.9168 9.2927 17.3265 10.7005 16.146 12.0152C14.9654 13.3298 13.6492 14.6421 12.1972 15.9519L11.013 17.0272C10.8762 17.1639 10.7165 17.2644 10.5338 17.3285C10.3511 17.3926 10.1705 17.4246 9.99212 17.4246ZM9.40079 6.86538C8.94994 6.1784 8.47532 5.67493 7.97691 5.35496C7.47851 5.03497 6.90292 4.87498 6.25014 4.87498C5.41681 4.87498 4.72236 5.15276 4.16681 5.70831C3.61125 6.26387 3.33348 6.95831 3.33348 7.79165C3.33348 8.46045 3.54902 9.1597 3.9801 9.8894C4.41118 10.6191 4.95231 11.3445 5.60348 12.0656C6.25466 12.7868 6.96005 13.4914 7.71966 14.1794C8.47927 14.8675 9.18334 15.5069 9.83185 16.0977C9.87993 16.1405 9.93603 16.1618 10.0001 16.1618C10.0643 16.1618 10.1204 16.1405 10.1684 16.0977C10.8169 15.5069 11.521 14.8675 12.2806 14.1794C13.0402 13.4914 13.7456 12.7868 14.3968 12.0656C15.048 11.3445 15.5891 10.6191 16.0202 9.8894C16.4513 9.1597 16.6668 8.46045 16.6668 7.79165C16.6668 6.95831 16.389 6.26387 15.8335 5.70831C15.2779 5.15276 14.5835 4.87498 13.7501 4.87498C13.0974 4.87498 12.5218 5.03497 12.0234 5.35496C11.525 5.67493 11.0503 6.1784 10.5995 6.86538C10.529 6.97221 10.4403 7.05234 10.3335 7.10577C10.2266 7.15919 10.1155 7.1859 10.0001 7.1859C9.88477 7.1859 9.77366 7.15919 9.66681 7.10577C9.55998 7.05234 9.4713 6.97221 9.40079 6.86538Z" fill="#6B7385"/>
                                 </g>
                              </svg>
                           </div>
                        </a>
                     </div>
                     <div class="course-details">
                        <div class="course-titles">
                           <h3 class="text-16">{{ ucfirst($row->title) }}</h3>
                           <p class="text-13 card_preview_text">{{ $row->short_description }}</p>
                        </div>
                        <div class="leason-and-stars d-flex align-items-center justify-content-between  flex-wrap">
                           <div class="course-leasons d-flex align-items-center">
                              <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="leason">
                              <h4 class="text-13">{{ lesson_count($row->id) }} {{ get_phrase('lesson') }}</h4>
                           </div>
                           <div class="course-stars d-flex align-items-center">
                              <h4 class="text-13">4.8</h4>
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="star">
                              <h4 class="text-13">({{ course_enrollments($row->id) }})</h4>
                           </div>
                        </div>
                        <div class="course-prices d-flex align-items-end">
                           @if (isset($row->discount_flag) && $row->discount_flag == 1)
                              <h2 class="text-20 text-blue">{{ currency(number_format($row->discounted_price, 2)) }}
                              </h2>
                              <h3 class="text-16">{{ currency(number_format($row->price, 2)) }}</h3>
                           @elseif (isset($row->is_paid) && $row->is_paid == 0)
                              <h2 class="text-20 text-blue">{{ get_phrase('Free') }}</h2>
                           @else
                              <h2 class="text-20 text-blue">{{ currency(number_format($row->price, 2)) }}</h2>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            
            <!-- See All -->
            <div class="col-lg-12">
               <div class="course-see-all d-flex justify-content-center">
                  <a href="{{ route('courses') }}" class="d-flex align-items-center">
                     <h3 class="text-15">{{ get_phrase('View All Courses') }}</h3>
                     <img src="{{ asset('assets/frontend/default/images/see-arrow.svg') }}" alt="see">
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Courses Area End  -->

   <!-- About Us Area Start -->
   <section class="about-section">
      <div class="container">
         <div class="row padding-bottom-80">
            <!-- About Left Section -->
            <div class="col-md-6">
               <div class="about-details-wrap wow fadeInUp" data-wow-duration="2s">
                  <div class="about-details-top padding-bottom-50">
                     <h4 class="text-15 blue-batch">About Us</h4>
                     <h2 class="text-40">We provide best <span>education</span> service for you</h2>
                     <p class="text-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                  </div>
                  <div class="about-list-wrap">
                     <ul>
                        <li class="about-list-single d-flex align-items-start">
                           <div class="about-list-img">
                              <img src="{{ asset('assets/frontend/default/images/about-list-1.svg') }}" alt="about">
                           </div>
                           <div class="about-list-details">
                              <h3 class="text-18">Industry Expert Instructor</h3>
                              <p class="text-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                           </div>
                        </li>
                        <li class="about-list-single d-flex align-items-start">
                           <div class="about-list-img">
                              <img src="{{ asset('assets/frontend/default/images/about-list-2.svg') }}" alt="about">
                           </div>
                           <div class="about-list-details">
                              <h3 class="text-18">Lifetime Access For Learning</h3>
                              <p class="text-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                           </div>
                        </li>
                        <li class="about-list-single d-flex align-items-start">
                           <div class="about-list-img">
                              <img src="{{ asset('assets/frontend/default/images/about-list-3.svg') }}" alt="about">
                           </div>
                           <div class="about-list-details">
                              <h3 class="text-18">Available online courses</h3>
                              <p class="text-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- About Right Section -->
            <div class="col-md-6">
               <div class="about-img-wrap">
                  <div class="d-flex justify-content-end">
                     <div class="about-top-img wow bounceInRight" data-wow-duration="2s">
                        <img src="{{ asset('assets/frontend/default/images/about-img-2.svg') }}" alt="about">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="about-bottom-img wow bounceInRight" data-wow-duration="2s">
                        <img src="{{ asset('assets/frontend/default/images/about-img-1.svg') }}" alt="about">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- About Us Area End -->

   <!-- Testimonial Area Start -->
   <section>
      <div class="container">
         <div class="row padding-bottom-80">
            <!-- Section Title -->
            <div class="col-md-12">
               <div class="section-title testimonial-title padding-bottom-50">
                  <h4 class="text-15 blue-batch">Testimonial</h4>
                  <h2 class="text-40">We care about our customers Experience Too</h2>
               </div>
            </div>
            <!-- Testimonial Slider -->
            <div class="col-md-12">
               <div class="testimonials-wrap owl-carousel">
                  <!-- Single Testimonial -->
                  <div class="testimonial-overfollow">
                     <div class="single-testimonial">
                        <div class="testimonial-img">
                           <img src="{{ asset('assets/frontend/default/images/testimonial-1.svg') }}" alt="testimonial">
                        </div>
                        <div class="testimonial-pera">
                           <p class="text-13">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                        <div class="testimonial-rating-area d-flex align-items-center justify-content-between">
                           <div class="testimonial-person">
                              <h3 class="text-16">Linchon Philips</h3>
                              <p class="text-13">CEO @ Yahoo</p>
                           </div>
                           <div class="testimonial-rating d-flex align-items-center">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Single Testimonial -->
                  <div class="testimonial-overfollow">
                     <div class="single-testimonial">
                        <div class="testimonial-img">
                           <img src="{{ asset('assets/frontend/default/images/testimonial-2.svg') }}" alt="testimonial">
                        </div>
                        <div class="testimonial-pera">
                           <p class="text-13">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                        <div class="testimonial-rating-area d-flex align-items-center justify-content-between">
                           <div class="testimonial-person">
                              <h3 class="text-16">Liyanda Ross</h3>
                              <p class="text-13">Creative Director</p>
                           </div>
                           <div class="testimonial-rating d-flex align-items-center">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Single Testimonial -->
                  <div class="testimonial-overfollow">
                     <div class="single-testimonial">
                        <div class="testimonial-img">
                           <img src="{{ asset('assets/frontend/default/images/testimonial-3.svg') }}" alt="testimonial">
                        </div>
                        <div class="testimonial-pera">
                           <p class="text-13">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                        <div class="testimonial-rating-area d-flex align-items-center justify-content-between">
                           <div class="testimonial-person">
                              <h3 class="text-16">David John</h3>
                              <p class="text-13">CEO @ google</p>
                           </div>
                           <div class="testimonial-rating d-flex align-items-center">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="rating">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Testimonial Area End -->

   <!-- Blog Area Start  -->
   <section>
      <div class="container">
         <div class="row">
            <!-- Section Title -->
            <div class="col-lg-12">
               <div class="section-title padding-bottom-50">
                  <h4 class="text-15 blue-batch">{{ get_phrase('Our Blog') }}</h4>
                  <h2 class="text-40">{{ get_phrase('Have a look on our blogs') }}</h2>
                  <p class="text-15 section-title-pera">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
               </div>
            </div>
         </div>
         <div class="row mrg-30 padding-bottom-80 wow fadeInUp" data-wow-duration="2s">
            <!-- Single Blog Card -->
            @foreach ($blogs as $key => $blog)
            <div class="col-lg-4 col-md-6">
               <a href="#" class="single-blog">
                  <div class="single-blog-inner">
                     <div class="blog-img">
                        <img src="{{ get_image($blog->thumbnail) }}" alt="blog-thumbnail">
                     </div>
                     <div class="blog-details">
                        <div class="blog-titles">
                           <h2 class="text-20">{{ ucfirst($blog->title) }}</h2>
                           <p class="text-13 card_preview_text_blog">{!! ellipsis(removeScripts($blog->description), 120) !!}</p>
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
            </div>
            @endforeach
            
            <!-- See All -->
            <div class="col-lg-12">
               <div class="course-see-all d-flex justify-content-center">
                  <a href="javascript:void(0);" class="d-flex align-items-center">
                     <h3 class="text-15">{{ get_phrase('View All Blogs') }}</h3>
                     <img src="{{ asset('assets/frontend/default/images/see-arrow.svg') }}" alt="see">
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Blog Area End  -->

@endsection