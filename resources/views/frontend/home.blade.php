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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                    <a href="shop.html" class="btn flosun-button secondary-btn rounded-0">Shop Collection</a>
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
                        <div class="single-item swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/1.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/2.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <span class="onsale">Sale!</span>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Bunga tangkai</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/3.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Bunga melati</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                        </div>
                        <div class="single-item swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/5.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/6.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Bunga karangan bunga mekar</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/2.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/1.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Stik merah bunga anggrek</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                        </div>
                        <div class="single-item swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/7.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/8.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Buket mawar putih</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/9.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/2.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Tongkat putih eceng gondok</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                        </div>
                        <div class="single-item swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/3.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Kemuliaan Salju</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/6.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/5.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Bunga bucket</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                        </div>
                        <div class="single-item swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/8.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/7.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Mutiara Abadi</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/9.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/8.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Bunga tongkat merah muda aster</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                        </div>
                        <div class="single-item swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/2.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/1.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Buang putih</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="{{ asset('frontend/assets/images/product/9.jpg')}}" alt="" class="product-image-1 w-100">
                                        <img src="assets/images/product/3.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Tongkat bunga merah</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">Rp250.000</span>
                                        <span class="old-price"><del>Rp350.000</del></span>
                                    </div>
                                    <a href="cart.html" class="btn product-cart">Masukkan ke keranjang</a>
                                </div>
                            </div>
                            <!--Single Product End-->
                        </div>
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