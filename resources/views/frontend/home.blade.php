@extends('frontend.master')

@section('content')
@include('frontend.components.slider')
<!-- Shop Collection Start Here -->
<div class="shop-collection-area gray-bg pt-no-text pb-no-text">
    <div class="container custom-area">
        <div class="row mb-30">
            <div class="col-md-6 col-custom">
                <div class="collection-content">
                    <div class="section-title text-left">
                        <span class="section-title-1">Flowers for the</span>
                        <h3 class="section-title-3 pb-0">Birthday & Gifts</h3>
                    </div>
                    <div class="desc-content">
                        <p>Rayakan setiap momen spesial dengan rangkaian bunga yang penuh makna. Kami menyediakan berbagai pilihan bunga segar yang dirangkai dengan penuh cinta, cocok untuk hadiah ulang tahun, ucapan selamat, hingga tanda kasih sayang untuk orang teristimewa dalam hidup Anda.
                            Dengan desain yang elegan dan pelayanan yang hangat, kami siap membantu Anda menyampaikan perasaan dengan cara yang paling indah. Jadikan setiap perayaan lebih berkesan dengan bunga dari toko kami — karena setiap bunga punya cerita dan makna tersendiri.</p>
                    </div>
                    <a href="{{ url('shop') }}" class="btn flosun-button secondary-btn rounded-0">Shop Collection</a>
                </div>
            </div>
            <div class="col-md-6 col-custom">
                <!--Single Banner Area Start-->
                <div class="single-banner hover-style">
                    <div class="banner-img">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/images/collection/1-1.jpg')}}" alt="">
                            <div class="overlay-1"></div>
                        </a>
                    </div>
                </div>
                <!--Single Banner Area End-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-custom order-2 order-md-1">
                <!--Single Banner Area Start-->
                <div class="single-banner hover-style">
                    <div class="banner-img">
                        <a href="#">
                            <img src="{{ asset('frontend/assets/images/collection/1-2.jpg')}}" alt="">
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
                        <p>Hari pernikahan adalah momen sakral yang hanya terjadi sekali seumur hidup. Biarkan keindahan bunga-bunga segar menghiasi setiap langkah menuju janji suci Anda. Kami menghadirkan rangkaian bunga pernikahan yang elegan dan penuh makna, mulai dari dekorasi pelaminan, buket pengantin, hingga hiasan meja tamu.
                            Dengan sentuhan profesional dan desain yang disesuaikan dengan tema impian Anda, kami siap menjadi bagian dari hari bahagia Anda. Percayakan keindahan dan keharuman bunga pada kami untuk menciptakan suasana romantis yang tak terlupakan.</p>
                    </div>
                    <a href="{{ url('shop') }}" class="btn flosun-button secondary-btn rounded-0">Shop Collection</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Collection End Here -->

<!--Product Area Start-->
<div class="product-area mt-text-2">
    <div class="container custom-area-2 overflow-hidden">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">Hadiah yang luar biasa</span>
                    <h3 class="section-title-3">Produk Pilihan </h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row product-row">
            <div class="col-12 col-custom">
                <div class="product-slider swiper-container anime-element-multi">
                    <div class="swiper-wrapper">
                        @foreach($products as $product)
                        <div class="single-item swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="{{ asset('assets/images/product/' . ($product->images[0] ?? 'default1.jpg')) }}" alt="" class="product-image-1 w-100">

                                    @if(isset($product->images[1]))
                                    <img src="{{ asset('assets/images/product/' . $product->images[1]) }}" alt="" class="product-image-2 position-absolute w-100">
                                    @endif
                                    <span class="onsale">Sale!</span>
                                    <div class="add-action d-flex flex-column position-absolute">

                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#modalProduct"
                                            data-image1="{{ $product->images[0] ?? 'default1.jpg' }}"
                                            data-image2="{{ $product->images[1] ?? 'default2.jpg' }}" data-discount="{{ $product->discount }}" data-price_first="{{ $product->price_first }}" data-price_final="{{ $product->price_final }}" data-name="{{ $product->name_produk }}" data-id="{{ $product->id }}" title="Quick View" class="btnQuickView" data-bs-toggle="modal" data-bs-target="#modalProduct">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="">{{ $product->name_produk }}</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        @if($product->discount > 0)
                                        <span class="regular-price ">Rp {{ number_format($product->price_final) }}</span>

                                        <span class="old-price"><del>Rp {{ number_format($product->price_first) }}</del></span>
                                        @else
                                        <span class="regular-price ">Rp {{ number_format($product->price_first) }}</span>
                                        @endif

                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                        </div>
                        @endforeach
                    </div>
                    <!-- Slider pagination -->
                    <div class="swiper-pagination default-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Product Area End-->

<!-- History Area Start Here -->
<div class="our-history-area pt-text-3">
    <div class="container">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">Sedikit Cerita Tentang Kami</span>
                    <h2 class="section-title-large">Sejarah kita</h2>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <div class="col-lg-8 ms-auto me-auto">
                <div class="history-area-content pb-0 mb-0 border-0 text-center">
                    <p><strong>Kami berpengalaman dalam membuat buang yang indah</strong></p>
                    <p>Sangat bagus dan berharga</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- History Area End Here -->

<!-- Testimonial Area Start Here -->
<div class="testimonial-area mt-text-2">
    <div class="container custom-area">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center">
                    <span class="section-title-1">Kami Mencintai Klien Kami</span>
                    <h3 class="section-title-3">Apa yang Mereka Katakan</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <div class="testimonial-carousel swiper-container intro11-carousel-wrap col-12 col-custom">
                <div class="swiper-wrapper">
                    <div class="single-item swiper-slide">
                        <!--Single Testimonial Start-->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img src="{{ asset('frontend/assets/images/testimonial/testimonial1.jpg')}}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>Orang-orang ini benar-benar luar biasa. Tema Sempurna dan yang terbaik dari semuanya sehingga Anda memiliki banyak pilihan untuk dipilih! Tim Dukungan Terbaik yang pernah ada! Sangat cepat merespon! Terima kasih banyak! Saya sangat merekomendasikan tema ini dan orang-orang ini!</p>
                                <div class="testimonial-author">
                                    <h6>Rudi <span>Customer</span></h6>
                                </div>
                            </div>
                        </div>
                        <!--Single Testimonial End-->
                    </div>
                    <div class="single-item swiper-slide">
                        <!--Single Testimonial Start-->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img src="{{ asset('frontend/assets/images/testimonial/testimonial2.jpg')}}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>Orang-orang ini benar-benar luar biasa. Tema Sempurna dan yang terbaik dari semuanya sehingga Anda memiliki banyak pilihan untuk dipilih! Tim Dukungan Terbaik yang pernah ada! Sangat cepat merespon! Terima kasih banyak! Saya sangat merekomendasikan tema ini dan orang-orang inie!</p>
                                <div class="testimonial-author">
                                    <h6>melly <span>Customer</span></h6>
                                </div>
                            </div>
                        </div>
                        <!--Single Testimonial End-->
                    </div>
                </div>
                <!-- Slider Navigation -->
                <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
                <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
                <!-- Slider pagination -->
                <div class="swiper-pagination default-pagination"></div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End Here -->


<!-- Brand Logo Area Start Here -->
<div class="brand-logo-area gray-bg pt-no-text pb-no-text mt-text-5">
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



@endsection