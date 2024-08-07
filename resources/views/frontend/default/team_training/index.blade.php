@extends('layouts.default')
@push('title', get_phrase('Team Training'))
@push('meta')@endpush
@push('css')@endpush
@section('content')

<!-- Top Link Path Area Start -->
<section class="top-link-path-section2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top-link-path-area2">
                    <div class="top-link-path-inner2">
                        <h1 class="title">{{ get_phrase('Team') }}</h1>
                        <div class="top-link-path d-flex align-items-center justify-content-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                            {{ get_phrase('Home') }}
                        </a>
                        <a href="#">{{ get_phrase('Team') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Link Path Area End -->

<!-- Grid List View Area Start -->
<section>
      <div class="container">
         <div class="row mrg-30 mcg-30 padding-top-30 padding-bottom-110">
            <div class="col-xl-3 col-lg-4">
               <div class="grid-list-filter-sidebar">
                  <div class="filter-sidebar-single">
                     <h3 class="subtitle">Categories</h3>
                     <div class="form-check-wrap">
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="allCategory" checked>
                           <label class="form-check-label mcheck-lable" for="allCategory">
                              All Category
                           </label>
                        </div>
                        <div class="check-sub-wrap">
                           <div class="form-check mform-check check-have-sub">
                              <input class="form-check-input mcheck-input" type="checkbox" value="" id="webDesign">
                              <label class="form-check-label mcheck-lable" for="webDesign">
                                 <span>Web Design</span>
                                 <span>(20)</span>
                              </label>
                           </div>
                           <div class="form-check-sub">
                              <div class="form-check mform-check">
                                 <input class="form-check-input mcheck-input" type="checkbox" value="" id="resDesign">
                                 <label class="form-check-label mcheck-lable" for="resDesign">
                                    Responsive design
                                 </label>
                              </div>
                              <div class="form-check mform-check">
                                 <input class="form-check-input mcheck-input" type="checkbox" value="" id="wpTheme">
                                 <label class="form-check-label mcheck-lable" for="wpTheme">
                                    WordPress Theme
                                 </label>
                              </div>
                              <div class="form-check mform-check">
                                 <input class="form-check-input mcheck-input" type="checkbox" value="" id="botstrap">
                                 <label class="form-check-label mcheck-lable" for="botstrap">
                                    Botstrap
                                 </label>
                              </div>
                              <div class="form-check mform-check">
                                 <input class="form-check-input mcheck-input" type="checkbox" value="" id="htmlCss">
                                 <label class="form-check-label mcheck-lable" for="htmlCss">
                                    HTML & CSS
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="check-sub-wrap">
                           <div class="form-check mform-check check-have-sub">
                              <input class="form-check-input mcheck-input" type="checkbox" value="" id="graphicDesign">
                              <label class="form-check-label mcheck-lable" for="graphicDesign">
                                 <span>Graphic Design</span>
                                 <span>(20)</span>
                              </label>
                           </div>
                           <div class="form-check-sub">
                              <div class="form-check mform-check">
                                 <input class="form-check-input mcheck-input" type="checkbox" value="" id="resDesign2">
                                 <label class="form-check-label mcheck-lable" for="resDesign2">
                                    Responsive design
                                 </label>
                              </div>
                              <div class="form-check mform-check">
                                 <input class="form-check-input mcheck-input" type="checkbox" value="" id="wpTheme2">
                                 <label class="form-check-label mcheck-lable" for="wpTheme2">
                                    WordPress Theme
                                 </label>
                              </div>
                              <div class="form-check mform-check">
                                 <input class="form-check-input mcheck-input" type="checkbox" value="" id="botstrap2">
                                 <label class="form-check-label mcheck-lable" for="botstrap2">
                                    Botstrap
                                 </label>
                              </div>
                              <div class="form-check mform-check">
                                 <input class="form-check-input mcheck-input" type="checkbox" value="" id="htmlCss2">
                                 <label class="form-check-label mcheck-lable" for="htmlCss2">
                                    HTML & CSS
                                 </label>
                              </div>
                           </div>
                        </div>
                        <a href="#" class="filter-see-more">Show More</a>
                     </div>
                  </div>
                  <div class="filter-sidebar-single">
                     <h3 class="subtitle">Price</h3>
                     <div class="form-check-wrap2">
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="priceAll">
                           <label class="form-check-label mcheck-lable" for="priceAll">
                              All
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="priceFree">
                           <label class="form-check-label mcheck-lable" for="priceFree">
                              Free
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="pricePaid">
                           <label class="form-check-label mcheck-lable" for="pricePaid">
                              Paid
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="filter-sidebar-single">
                     <h3 class="subtitle">Level</h3>
                     <div class="form-check-wrap2">
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="levelAll">
                           <label class="form-check-label mcheck-lable" for="levelAll">
                              All
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="levelBeginner">
                           <label class="form-check-label mcheck-lable" for="levelBeginner">
                              Beginner
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="levelAdvanced">
                           <label class="form-check-label mcheck-lable" for="levelAdvanced">
                              Advanced
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="levelExpert">
                           <label class="form-check-label mcheck-lable" for="levelExpert">
                              Expert
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="filter-sidebar-single">
                     <h3 class="subtitle">Language</h3>
                     <div class="form-check-wrap2">
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="langAll">
                           <label class="form-check-label mcheck-lable" for="langAll">
                              All
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="langAra">
                           <label class="form-check-label mcheck-lable" for="langAra">
                              Arabic
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="langChine">
                           <label class="form-check-label mcheck-lable" for="langChine">
                              Chinese
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="langEng">
                           <label class="form-check-label mcheck-lable" for="langEng">
                              English
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="langFN">
                           <label class="form-check-label mcheck-lable" for="langFN">
                              French
                           </label>
                        </div>
                        <a href="#" class="filter-see-more">Show More</a>
                     </div>
                  </div>
                  <div class="filter-sidebar-single">
                     <h3 class="subtitle">Ratings</h3>
                     <div class="form-check-wrap2">
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="rating1">
                           <label class="form-check-label mcheck-lable check-label-star" for="rating1">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="rating2">
                           <label class="form-check-label mcheck-lable check-label-star" for="rating2">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="rating3">
                           <label class="form-check-label mcheck-lable check-label-star" for="rating3">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="rating4">
                           <label class="form-check-label mcheck-lable check-label-star" for="rating4">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/star-gray.svg') }}" alt="">
                           </label>
                        </div>
                        <div class="form-check mform-check">
                           <input class="form-check-input mcheck-input" type="checkbox" value="" id="rating5">
                           <label class="form-check-label mcheck-lable check-label-star" for="rating5">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                              <img src="{{ asset('assets/frontend/default/images/yellow-star.svg') }}" alt="">
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-9 col-lg-8">
               <div class="row">
                  <div class="col-lg-12">
                     <p class="euclid-title-16px mb-30px pb-2">Showing 6 of 12 Results</p>
                  </div>
               </div>
               <div class="row mrg-30">
                  <div class="col-md-12">
                     <a href="#" class="lms3-card lms3-card-hover h-100 max-md-400px-auto d-block">
                        <div class="d-flex align-items-center gap-30px h-100 flex-column flex-md-row">
                           <div class="list-card-img1">
                              <img src="{{ asset('assets/frontend/default/images/course/course-5.webp') }}" alt="">
                           </div>
                           <div>
                              <h3 class="euclid-title-20px lh-sm mb-12px">Complete Programming Masterclass for Developers</h3>
                              <p class="pop-subtitle-13px2 fw-normal mb-3">It is a long established fact that a reader will be distracted by the read content of a page when looking at its layout.</p>
                              <div class="icontext-list-wrap d-flex flex-wrap align-items-center mb-2">
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">18 Day Left</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/translate-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">English</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/clock-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">12:00:45</p>
                                 </div>
                              </div>
                              <div class="d-flex align-items-baseline gap-2">
                                 <h3 class="pop-title-24px">$39.00</h3>
                                 <h4 class="pop-title-16px2 text-decoration-line-through fw-medium lms-text-secondary">$59.00</h4>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-12">
                     <a href="#" class="lms3-card lms3-card-hover h-100 max-md-400px-auto d-block">
                        <div class="d-flex align-items-center gap-30px h-100 flex-column flex-md-row">
                           <div class="list-card-img1">
                              <img src="{{ asset('assets/frontend/default/images/course/course-3.webp') }}" alt="">
                           </div>
                           <div>
                              <h3 class="euclid-title-20px lh-sm mb-12px">Complete Graphic Design Masterclass</h3>
                              <p class="pop-subtitle-13px2 fw-normal mb-3">It is a long established fact that a reader will be distracted by the read content of a page when looking at its layout.</p>
                              <div class="icontext-list-wrap d-flex flex-wrap align-items-center mb-2">
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">18 Day Left</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/translate-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">English</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/clock-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">12:00:45</p>
                                 </div>
                              </div>
                              <div class="d-flex align-items-baseline gap-2">
                                 <h3 class="pop-title-24px">$39.00</h3>
                                 <h4 class="pop-title-16px2 text-decoration-line-through fw-medium lms-text-secondary">$59.00</h4>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-12">
                     <a href="#" class="lms3-card lms3-card-hover h-100 max-md-400px-auto d-block">
                        <div class="d-flex align-items-center gap-30px h-100 flex-column flex-md-row">
                           <div class="list-card-img1">
                              <img src="{{ asset('assets/frontend/default/images/course/course-2.webp') }}" alt="">
                           </div>
                           <div>
                              <h3 class="euclid-title-20px lh-sm mb-12px">After effect full course from A to Z</h3>
                              <p class="pop-subtitle-13px2 fw-normal mb-3">It is a long established fact that a reader will be distracted by the read content of a page when looking at its layout.</p>
                              <div class="icontext-list-wrap d-flex flex-wrap align-items-center mb-2">
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">18 Day Left</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/translate-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">English</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/clock-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">12:00:45</p>
                                 </div>
                              </div>
                              <div class="d-flex align-items-baseline gap-2">
                                 <h3 class="pop-title-24px">$39.00</h3>
                                 <h4 class="pop-title-16px2 text-decoration-line-through fw-medium lms-text-secondary">$59.00</h4>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-12">
                     <a href="#" class="lms3-card lms3-card-hover h-100 max-md-400px-auto d-block">
                        <div class="d-flex align-items-center gap-30px h-100 flex-column flex-md-row">
                           <div class="list-card-img1">
                              <img src="{{ asset('assets/frontend/default/images/course/course-4.webp') }}" alt="">
                           </div>
                           <div>
                              <h3 class="euclid-title-20px lh-sm mb-12px">Focuses on online marketing strategies and techniques</h3>
                              <p class="pop-subtitle-13px2 fw-normal mb-3">It is a long established fact that a reader will be distracted by the read content of a page when looking at its layout.</p>
                              <div class="icontext-list-wrap d-flex flex-wrap align-items-center mb-2">
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">18 Day Left</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/translate-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">English</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/clock-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">12:00:45</p>
                                 </div>
                              </div>
                              <div class="d-flex align-items-baseline gap-2">
                                 <h3 class="pop-title-24px">$39.00</h3>
                                 <h4 class="pop-title-16px2 text-decoration-line-through fw-medium lms-text-secondary">$59.00</h4>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-12">
                     <a href="#" class="lms3-card lms3-card-hover h-100 max-md-400px-auto d-block">
                        <div class="d-flex align-items-center gap-30px h-100 flex-column flex-md-row">
                           <div class="list-card-img1">
                              <img src="{{ asset('assets/frontend/default/images/course/course-1.webp') }}" alt="">
                           </div>
                           <div>
                              <h3 class="euclid-title-20px lh-sm mb-12px">Complete Blender Learn : 3D Modelling</h3>
                              <p class="pop-subtitle-13px2 fw-normal mb-3">It is a long established fact that a reader will be distracted by the read content of a page when looking at its layout.</p>
                              <div class="icontext-list-wrap d-flex flex-wrap align-items-center mb-2">
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">18 Day Left</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/translate-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">English</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/clock-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">12:00:45</p>
                                 </div>
                              </div>
                              <div class="d-flex align-items-baseline gap-2">
                                 <h3 class="pop-title-24px">$39.00</h3>
                                 <h4 class="pop-title-16px2 text-decoration-line-through fw-medium lms-text-secondary">$59.00</h4>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-12">
                     <a href="#" class="lms3-card lms3-card-hover h-100 max-md-400px-auto d-block">
                        <div class="d-flex align-items-center gap-30px h-100 flex-column flex-md-row">
                           <div class="list-card-img1">
                              <img src="{{ asset('assets/frontend/default/images/course/course-6.webp') }}" alt="">
                           </div>
                           <div>
                              <h3 class="euclid-title-20px lh-sm mb-12px">Web design course for beginners</h3>
                              <p class="pop-subtitle-13px2 fw-normal mb-3">It is a long established fact that a reader will be distracted by the read content of a page when looking at its layout.</p>
                              <div class="icontext-list-wrap d-flex flex-wrap align-items-center mb-2">
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/menu_book.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">18 Day Left</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/translate-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">English</p>
                                 </div>
                                 <div class="d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/frontend/default/images/icons/clock-gray-20.svg') }}" alt="icon">
                                    <p class="pop-subtitle-13px3">12:00:45</p>
                                 </div>
                              </div>
                              <div class="d-flex align-items-baseline gap-2">
                                 <h3 class="pop-title-24px">$39.00</h3>
                                 <h4 class="pop-title-16px2 text-decoration-line-through fw-medium lms-text-secondary">$59.00</h4>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <!-- Pagination -->
                  <div class="col-md-12">
                     <div class="grid-list-pagination">
                        <ul class="pagination-list">
                           <li><a href="#" class="next-previous"><i class="fa-solid fa-angles-left"></i></a></li>
                           <li><a href="#">1</a></li>
                           <li><a href="#">2</a></li>
                           <li><a href="#" class="active">3</a></li>
                           <li><a href="#">4</a></li>
                           <li><a href="#">5</a></li>
                           <li><a href="#" class="next-previous"><i class="fa-solid fa-angles-right"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Grid List View Area End -->

@endsection
@push('js')
@endpush