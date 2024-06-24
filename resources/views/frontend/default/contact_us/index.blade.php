@extends('layouts.default')
@push('title', get_phrase('Contact us'))
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
                     <h1 class="title">Contact us</h1>
                     <div class="top-link-path d-flex align-items-center justify-content-center">
                        <a href="#">
                           <img src="{{ asset('assets/frontend/default/images/icons/home-white.svg') }}" alt="">
                           Home
                        </a>
                        <a href="#">Contact us</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Top Link Path Area End -->

   <!-- Contact Area Start -->
   <section>
      <div class="container">
         <div class="row mrg-30 padding-top-80 padding-bottom-80">
            <div class="col-md-6">
               <div class="contact-details-area">
                  <h1 class="title">Get in Touch to learn about our Online Academy</h1>
                  <p class="info">It is a long established fact that a reader will be distracted by the content of a page when looking at its layout.</p>
                  <div class="contact-details-list padding-bottom-50">
                     <h3 class="title">Regional Office</h3>
                     <ul>
                        <li>
                           <span class="img"><img src="{{ asset('assets/frontend/default/images/icons/location-white.svg') }}" alt=""></span>
                           <span class="info">46 Howard Street, Phoenix, United States</span>
                        </li>
                        <li>
                           <span class="img"><img src="{{ asset('assets/frontend/default/images/icons/call-white.svg') }}" alt=""></span>
                           <span class="info">+98 983 475 387</span>
                        </li>
                        <li>
                           <span class="img"><img src="{{ asset('assets/frontend/default/images/icons/world-white.svg') }}" alt=""></span>
                           <span class="info">www.comapnyname.com</span>
                        </li>
                        <li>
                           <span class="img"><img src="{{ asset('assets/frontend/default/images/icons/mail-white.svg') }}" alt=""></span>
                           <span class="info">companymail@gmail.com</span>
                        </li>
                     </ul>
                  </div>
                  <div class="contact-details-banner">
                     <img src="{{ asset('assets/frontend/default/images/contact-banner.webp') }}" alt="">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="contact-form-area">
                  <div class="contact-form-title">
                     <h3 class="title">Enquire Now</h3>
                     <p class="info">It is a long established fact that a reader will be distracted by the content of a page when looking at its layout. </p>
                  </div>
                  <form action="">
                     <div class="contact-form-wrap">
                        <div class="input-wrap">
                           <label for="name" class="form-label">Name</label>
                           <input type="text" class="form-control" id="name" placeholder="Your Name">
                        </div>
                        <div class="input-wrap">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" class="form-control" id="email" placeholder="Your email address">
                        </div>
                        <div class="input-wrap">
                           <label for="subject" class="form-label">Subject</label>
                           <input type="text" class="form-control" id="subject" placeholder="Your Subject">
                        </div>
                        <div class="input-wrap">
                           <label for="message" class="form-label">Message</label>
                           <textarea class="form-control" id="message" placeholder="Write your message"></textarea>
                        </div>
                        <button type="submit" class="contact-btn">Send Message</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Contact Area End -->

   <!-- Contact Map Area Start -->
   <section>
      <div class="container">
         <div class="row padding-bottom-110">
            <div class="col-md-12">
               <div class="contact-map-wrap">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d693596.8512453369!2d-120.56388064671465!3d47.22905088219022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5485e5ffe7c3b0f9%3A0x944278686c5ff3ba!2sWashington%2C%20USA!5e0!3m2!1sen!2sbd!4v1701757244698!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Contact Map Area End -->


@endsection