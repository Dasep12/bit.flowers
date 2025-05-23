@extends('frontend.master')

@section('content')
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">About Us</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- About Area Start Here -->
<div class="about-area mt-no-text">
    <div class="container custom-area">
        <div class="row mb-30 align-items-center">
            <div class="col-md-6 col-custom">
                <div class="collection-content">
                    <div class="section-title text-left">
                        <span class="section-title-1">Flowers for the</span>
                        <h3 class="section-title-3 pb-0">Birthday & Gifts</h3>
                    </div>
                    <div class="desc-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                    <a href="shop.html" class="btn flosun-button secondary-btn rounded-0">Shop Collection</a>
                </div>
            </div>
            <div class="col-md-6 col-custom">
                <!--Single Banner Area Start-->
                <div class="single-banner hover-style">
                    <div class="banner-img">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/images/about/1.jpg')}}" alt="About Image">
                            <div class="overlay-1"></div>
                        </a>
                    </div>
                </div>
                <!--Single Banner Area End-->
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 col-custom order-2 order-md-1">
                <!--Single Banner Area Start-->
                <div class="single-banner hover-style">
                    <div class="banner-img">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/images/about/2.jpg')}}" alt="About Image">
                            <div class="overlay-1"></div>
                        </a>
                    </div>
                </div>
                <!--Single Banner Area End-->
            </div>
            <div class="col-md-6 col-custom order-1 order-md-2">
                <div class="collection-content">
                    <div class="section-title text-left">
                        <span class="section-title-1">Flowers for the</span>
                        <h3 class="section-title-3 pb-0">Wedding day</h3>
                    </div>
                    <div class="desc-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                    <a href="shop.html" class="btn flosun-button secondary-btn rounded-0">Shop Collection</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us Area End Here -->
<!-- History Area Start Here -->
<div class="our-history-area gray-bg pt-5 mt-text-3">
    <div class="our-history-area">
        <div class="container custom-area">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">A little story about us</span>
                        <h2 class="section-title-large">Our History</h2>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="col-lg-8 ms-auto me-auto">
                    <div class="history-area-content text-center border-0">
                        <p><strong>Captain America: Civil War Christopher Markus and Stephen McFeely see the Hulk as the game over moment.</strong></p>
                        <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus. Phasellus eu rhoncus dolor, vitae scelerisque sapien</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature History Area End Here -->
<!-- Team Member Area Start Here -->
<div class="team-member-wrapper mt-text-3">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <div class="section-title text-center">
                    <span class="section-title-1">The guys behind the curtains</span>
                    <h2 class="section-title-2">a team of highly-skilled experts</h2>
                </div>
            </div>
        </div>
        <div class="row ht-team-member-style-two pt-40">
            <div class="col-lg-4 col-md-4 col-custom">
                <div class="grid-item">
                    <div class="ht-team-member">
                        <div class="team-image">
                            <img class="img-fluid" src="{{ asset('frontend/assets/images/team/1.jpg')}}" alt="">
                            <div class="social-networks">
                                <div class="inner">
                                    <a href="#"><i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#"><i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#"><i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info text-center">
                            <h5 class="name">Dollie Horton </h5>
                            <div class="position">Marketing</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-custom">
                <div class="grid-item">
                    <div class="ht-team-member">
                        <div class="team-image">
                            <img class="img-fluid" src="{{ asset('frontend/assets/images/team/2.jpg')}}" alt="">
                            <div class="social-networks">
                                <div class="inner">
                                    <a href="#"><i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#"><i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#"><i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info text-center">
                            <h5 class="name">Stephen Mearsley </h5>
                            <div class="position">President & CEO</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-custom">
                <div class="grid-item">
                    <div class="ht-team-member">
                        <div class="team-image">
                            <img class="img-fluid" src="{{ asset('frontend/assets/images/team/3.jpg')}}" alt="">
                            <div class="social-networks">
                                <div class="inner">
                                    <a href="#"><i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#"><i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#"><i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info text-center">
                            <h5 class="name">Maggie Strickland </h5>
                            <div class="position">Financial Services</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team Member Area End Here -->
<!-- Brand Logo Area Start Here -->
<div class="brand-logo-area gray-bg pt-text-3 pb-text-4 mt-text-2">
    <div class="container custom-area">
        <div class="row">
            <div class="col-12 col-custom">
                <div class="brand-logo-carousel swiper-container intro11-carousel-wrap arrow-style-3">
                    <div class="swiper-wrapper">
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/images/brand/1.png')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/images/brand/2.png')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/images/brand/3.png')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/images/brand/4.png')}}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/images/brand/5.png')}}" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- Slider Navigation -->
                    <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
                    <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Logo Area End Here -->
<!-- Newsletter Area Start Here -->
<div class="news-letter-area mt-text-6 pb-text-4">
    <div class="container custom-area">
        <div class="row align-items-center">
            <!--Section Title Start-->
            <div class="col-md-6 col-custom">
                <div class="section-title text-left mb-35">
                    <h3 class="section-title-3">Send Newsletter</h3>
                    <p class="desc-content mb-0">Enter Your Email Address For Our Mailing List To Keep Your Self Update</p>
                </div>
            </div>
            <!--Section Title End-->
            <div class="col-md-6 col-custom">
                <div class="news-latter-box">
                    <div class="newsletter-form-wrap text-center">
                        <form id="mc-form" class="mc-form">
                            <input type="email" id="mc-email" class="form-control email-box" placeholder="email@example.com" name="EMAIL">
                            <button id="mc-submit" class="btn rounded-0" type="submit">Subscribe</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                        </div>
                        <!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Area End Here -->
@endsection