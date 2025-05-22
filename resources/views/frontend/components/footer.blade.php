<!--Footer Area Start-->
<footer class="footer-area mt-no-text">
    <div class="footer-widget-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                    <div class="single-footer-widget m-0">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ asset('frontend/assets/images/logo/logo-footer.png')}}" alt="Logo Image">
                            </a>
                        </div>
                        <p class="desc-content">Lorem Khaled Ipsum is a major key to success. To be successful you’ve got to work hard you’ve got to make it.</p>
                        <div class="social-links">
                            <ul class="d-flex">
                                <li>
                                    <a class="rounded-circle" href="#" title="Facebook">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Youtube">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Vimeo">
                                        <i class="fa fa-vimeo"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Information</h2>
                        <ul class="widget-list">
                            <li><a href="about-us.html">Our Company</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="about-us.html">Our Services</a></li>
                            <li><a href="about-us.html">Why We?</a></li>
                            <li><a href="about-us.html">Careers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Quicklink</h2>
                        <ul class="widget-list">
                            <li><a href="about-us.html">About</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Support</h2>
                        <ul class="widget-list">
                            <li><a href="contact-us.html">Online Support</a></li>
                            <li><a href="contact-us.html">Shipping Policy</a></li>
                            <li><a href="contact-us.html">Return Policy</a></li>
                            <li><a href="contact-us.html">Privacy Policy</a></li>
                            <li><a href="contact-us.html">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">See Information</h2>
                        <div class="widget-body">
                            <address>Jakarta.<br>Phone: 0814 567 890<br>Email: https://tokobunga@gmail.com</address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright-area">
        <div class="container custom-area">
            <div class="row">
                <div class="col-12 text-center col-custom">
                    <div class="copyright-content">
                        <p>Copyright © 2023 Toko Bunga </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer Area End-->



<!-- Scroll to Top Start -->
<a class="scroll-to-top" href="#">
    <i class="lnr lnr-arrow-up"></i>
</a>
<!-- Scroll to Top End -->

<!-- Modal detail Product -->
<div class="modal flosun-modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close close-button" data-bs-dismiss="modal" aria-label="Close">
                <span class="close-icon" aria-hidden="true">x</span>
            </button>
            <div class="modal-body">
                <div class="container-fluid custom-area">
                    <div class="row">
                        <div class="col-md-6 col-custom">
                            <div class="modal-product-img">
                                <a class="w-100" href="#">
                                    <img class="w-100" id="image-prod-modal" src="assets/images/product/1747467251_1.jpg" alt="Product">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-custom">
                            <div class="modal-product">
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-product">nama produk</h4>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price" id="first_price">Rp250.000</span>
                                        <span class="old-price" id="final_price"><del>Rp350.000</del></span>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>1 Review</span>
                                    </div>
                                    <p class="desc-content">Kami sangat senang jika anda dapat berbelanja di koto kami.</p>
                                    <!-- <form class="d-flex flex-column w-100" action="#">
                                        <div class="form-group">
                                            <select class="form-control nice-select w-100">
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                                <option>XL</option>
                                                <option>XXL</option>
                                            </select>
                                        </div>
                                    </form> -->
                                    <div class="row">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input id="qty-product" class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                            </div>
                                        </div>
                                        <div class="add-to_cart mt-3">
                                            <a class="btn product-cart button-icon flosun-button dark-btn" href="javascript:void(0)">Add to cart</a>
                                            <a class="btn flosun-button secondary-btn secondary-border rounded-0" href="javascript:void(0)">Add to wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal detail Product End -->

<script>
    $(document).on('click', '.btnQuickView', function() {
        const data = $(this).data();

        // Contoh: tampilkan di console
        // Isi modal (contoh)
        $('#modalProduct .title-product').text(data.name);
        if (data.discount > 0) {
            $('#first_price').text('Rp ' + Number(data.price_final).toLocaleString());
            $('#final_price del').text('Rp ' + Number(data.price_first).toLocaleString());
        } else {
            $('#first_price').text('Rp ' + Number(data.price_first).toLocaleString());
            $('#final_price del').text('');
        }
        $('.product-cart').attr('onclick', `addToCart('${data.id}', ${false})`);
        $('#modalProduct #image-prod-modal').attr('src', '{{ asset("assets/images/product") }}/' + data.image1);
    });

    function addToCart(id, onlyOne = false) {
        const qty = $('#qty-product').val();
        $.ajax({
            url: "{{ url('cart/add') }}",
            type: "POST",
            data: {
                product_id: id,
                quantity: onlyOne == true ? 1 : qty,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                getCart()
                // Update cart count or show success message
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }


    function getCart() {
        $.ajax({
            url: "{{ url('cart/get') }}",
            type: "GET",
            success: function(response) {
                var html = ``;
                let totalPrice = 0;

                if (response.data == null) {
                    $("#list-carts").html('<h4 class="text-center">Keranjang Kosong</h4>');
                    $("#count-cart").html(0);
                    $("#total-carts").html('Rp. 0');
                    return;
                }
                const countCart = Object.keys(response.data).length;
                Object.values(response.data).forEach(item => {
                    const qty = parseFloat(item.qty); // Pastikan qty berupa angka
                    const harga = parseFloat(item.price_final); // Pastikan harga berupa angka
                    totalPrice += qty * harga;
                });
                $.each(response.data, function(index, item) {
                    html += `
                        <div class="single-cart-item">
                            <div class="cart-img">
                                <a href=""><img src="{{ asset('assets/images/product') }}/${item.images}" alt=""></a>
                            </div>
                            <div class="cart-text">
                                <h5 class="title"><a href="">${ item.name_product }</a></h5>
                                <div class="cart-text-btn">
                                    <div class="cart-qty">
                                        <span>${ item.qty }×</span>
                                        <span class="cart-price">Rp. ${ item.price_final.toLocaleString('id-ID').replace(/\./g, ',') }</span>
                                    </div>
                                    <button type="button"><i class="ion-trash-b"></i></button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $("#list-carts").html(html);
                $("#count-cart").html(countCart);
                $("#total-carts").html('Rp. ' + totalPrice.toLocaleString('id-ID').replace(/\./g, ','));
                // Update cart count or show success message
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    getCart()
</script>
<!-- jQuery Migrate JS -->
<script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<!-- Modernizer JS -->
<script src="{{ asset('frontend/assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>

<!-- Swiper Slider JS -->
<script src="{{ asset('frontend/assets/js/plugins/swiper-bundle.min.js')}}"></script>
<!-- nice select JS -->
<script src="{{ asset('frontend/assets/js/plugins/nice-select.min.js')}}"></script>
<!-- Ajaxchimpt js -->
<script src="{{ asset('frontend/assets/js/plugins/jquery.ajaxchimp.min.js')}}"></script>
<!-- Jquery Ui js -->
<script src="{{ asset('frontend/assets/js/plugins/jquery-ui.min.js')}}"></script>
<!-- Jquery Countdown js -->
<script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
<!-- jquery magnific popup js -->
<script src="{{ asset('frontend/assets/js/plugins/jquery.magnific-popup.min.js')}}"></script>

<!-- Main JS -->
<script src="{{ asset('frontend/assets/js/main.js')}}"></script>


</body>