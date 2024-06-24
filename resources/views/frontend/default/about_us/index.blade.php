@extends('layouts.default')
@push('title', get_phrase('About Us'))
@push('meta')@endpush
@push('css')@endpush
@section('content')

<!-- Top Link Path Area Start -->
<section class="top-link-path-section">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="top-link-path-area">
                  <div class="left-shape-1">
                     <img src="{{ asset('assets/frontend/default/images/path-shape-1.png') }}" alt="">
                  </div>
                  <div class="right-shape-1">
                     <img src="{{ asset('assets/frontend/default/images/path-shape-2.png') }}" alt="">
                  </div>
                  <div class="top-link-path-inner">
                     <h1 class="title">About us</h1>
                     <div class="top-link-path d-flex align-items-center justify-content-center">
                        <a href="#">
                           <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                           Home
                        </a>
                        <a href="#">About us</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Top Link Path Area End -->

   <!-- About Us Area Start -->
   <section class="overflow-x">
      <div class="container">
         <div class="row mrg-30 padding-bottom-110 padding-top-80 align-items-center">
            <!-- About Left Section -->
            <div class="col-lg-6">
               <div class="about-details-wrap wow fadeInUp" data-wow-duration="2s">
                  <div class="about-details-top padding-bottom-50">
                     <h2 class="text-40">Know about <span>Educate</span> Learning Platform</h2>
                     <p class="text-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                  </div>
                  <div class="about-list-wrap">
                     <ul>
                        <li class="about-list-single d-flex align-items-start">
                           <div class="about-list-img">
                              <img src="{{ asset('assets/frontend/default/images/about-list-1.svg') }}" alt="about">
                           </div>
                           <div class="about-list-details">
                              <h3 class="text-18">Flexible Classes</h3>
                              <p class="text-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                           </div>
                        </li>
                        <li class="about-list-single d-flex align-items-start">
                           <div class="about-list-img">
                              <img src="{{ asset('assets/frontend/default/images/about-list-2.svg') }}" alt="about">
                           </div>
                           <div class="about-list-details">
                              <h3 class="text-18">Learn from Anywhere</h3>
                              <p class="text-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                           </div>
                        </li>
                        <li class="about-list-single d-flex align-items-start">
                           <div class="about-list-img">
                              <img src="{{ asset('assets/frontend/default/images/about-list-3.svg') }}" alt="about">
                           </div>
                           <div class="about-list-details">
                              <h3 class="text-18">Available Experienced Teacher’s courses</h3>
                              <p class="text-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- About Right Section -->
            <div class="col-lg-6">
               <div class="about-img-wrap-2 d-flex justify-content-end wow bounceInRight" data-wow-duration="2s">
                  <div class="about-banner-img">
                     <img src="{{ asset('assets/frontend/default/images/about-banner.webp') }}" alt="about">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- About Us Area End -->

   <!-- About Insights Area Start -->
   <section class="about-insights-section">
      <div class="container">
         <div class="row mrg-30 padding-bottom-50 padding-top-50">
            <div class="col-xl-3 col-lg-4 col-md-6">
               <div class="about-insights-single d-flex align-items-center">
                  <div class="about-insights-icon" style="--insights-bg:#FFF0EE">
                     <img src="{{ asset('assets/frontend/default/images/icons/graduated.svg') }}" alt="">
                  </div>
                  <div class="about-insights-details">
                     <h4 class="number"><span class="counter circle">25</span>k+</h4>
                     <p class="info">Online Students</p>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
               <div class="about-insights-single d-flex align-items-center">
                  <div class="about-insights-icon" style="--insights-bg:#ECEDFE">
                     <img src="{{ asset('assets/frontend/default/images/icons/teacher-female.svg') }}" alt="">
                  </div>
                  <div class="about-insights-details">
                     <h4 class="number"><span class="counter circle">369</span>+</h4>
                     <p class="info">Expert Instructors</p>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
               <div class="about-insights-single d-flex align-items-center">
                  <div class="about-insights-icon" style="--insights-bg:#FFF2F8">
                     <img src="{{ asset('assets/frontend/default/images/icons/quality-batch.svg') }}" alt="">
                  </div>
                  <div class="about-insights-details">
                     <h4 class="number"><span class="counter circle">10</span>k+</h4>
                     <p class="info">Certified Courses  </p>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
               <div class="about-insights-single d-flex align-items-center">
                  <div class="about-insights-icon" style="--insights-bg:#E1FCFF">
                     <img src="{{ asset('assets/frontend/default/images/icons/online-learning.svg') }}" alt="">
                  </div>
                  <div class="about-insights-details">
                     <h4 class="number"><span class="counter circle">15</span>k+</h4>
                     <p class="info">Online Courses</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- About Insights Area End -->

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

@endsection
@push('js')@endpush