@extends('frontend.master')

@section('content')
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Checkout</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Checkout Area Start Here -->
<div class="checkout-area mt-no-text">
    <div class="container custom-container">
        <div class="row">
            <div class="col-12 col-custom">
                <div class="coupon-accordion">
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                sit amet ipsum luctus.</p>
                            <form action="#">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row-last">
                                    <label>Password <span class="required">*</span></label>
                                    <input type="password">
                                </p>
                                <p class="form-row">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </p>
                                <p class="lost-password"><a href="#">Lost your password?</a></p>
                            </form>
                        </div>
                    </div>
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input placeholder="Coupon code" type="text">
                                    <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12 col-custom">
                <form action="#">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-12 col-custom">
                                <div class="country-select clearfix">
                                    <label>Country <span class="required">*</span></label>
                                    <select class="myniceselect nice-select wide rounded-0">
                                        <option data-display="indoesia">indonesia</option>
                                        <option value="uk">Malaysia</option>
                                        <option value="rou">Singapura</option>
                                        <option value="fr">Brunai</option>
                                        <option value="de">taiwan</option>
                                        <option value="aus">Australia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="checkout-form-list">
                                    <label>Nama Depan <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="checkout-form-list">
                                    <label>Nama Belakang <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-custom">
                                <div class="checkout-form-list">
                                    <label>Nama Perusahan</label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-custom">
                                <div class="checkout-form-list">
                                    <label>Alamat <span class="required">*</span></label>
                                    <input placeholder="Street address" type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-custom">
                                <div class="checkout-form-list">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-custom">
                                <div class="checkout-form-list">
                                    <label>Kota <span class="required">*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="checkout-form-list">
                                    <label>Negara <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="checkout-form-list">
                                    <label>Alamat Email <span class="required">*</span></label>
                                    <input placeholder="" type="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="checkout-form-list">
                                    <label>No Handphone <span class="required">*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-custom">
                                <div class="checkout-form-list create-acc">
                                    <input id="cbox" type="checkbox">
                                    <label for="cbox">Membuat AKun?</label>
                                </div>
                                <div id="cbox-info" class="checkout-form-list create-account">
                                    <p class="mb-2">Buat akun dengan memasukkan informasi di bawah ini. Jika Anda adalah pelanggan yang kembali, silakan login di bagian atas halaman.</p>
                                    <label>Kata sandi akun <span class="required">*</span></label>
                                    <input placeholder="password" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="different-address">
                            <div class="ship-different-title">
                                <div>
                                    <input id="ship-box" type="checkbox">
                                    <label for="ship-box">Kirim ke alamat lain?</label>
                                </div>
                            </div>
                            <div id="ship-box-info" class="row mt-2">
                                <div class="col-md-12 col-custom">
                                    <div class="myniceselect country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="myniceselect nice-select wide rounded-0">
                                            <option data-display="indoesia">indonesia</option>
                                            <option value="uk">Malaysia</option>
                                            <option value="rou">Singapura</option>
                                            <option value="fr">Brunai</option>
                                            <option value="de">taiwan</option>
                                            <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>nama depan <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>nama belakang <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>nama perusahaan</label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Alamat <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>KOta <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Negara <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Alamat Email <span class="required">*</span></label>
                                        <input placeholder="" type="email">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>No Handphone</label> <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="order-notes mt-3">
                                <div class="checkout-form-list checkout-form-list-2">
                                    <label>Order Notes</label>
                                    <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-12 col-custom">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="cart-product-name"> Vestibulum suscipit<strong class="product-quantity">
                                            × 1</strong></td>
                                    <td class="cart-product-total text-center"><span class="amount">Rp 650.000</span></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name"> Vestibulum suscipit<strong class="product-quantity">
                                            × 1</strong></td>
                                    <td class="cart-product-total text-center"><span class="amount">Rp 650.000</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td class="text-center"><span class="amount">Rp 1.300.000</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td class="text-center"><strong><span class="amount">Rp 1.300.000</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="#payment-1">
                                        <h5 class="panel-title mb-3">
                                            <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Transfer Bank Langsung.
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body mb-2 mt-2">
                                            <p>Lakukan pembayaran langsung ke rekening bank kami. Harap gunakan ID Pesanan Anda sebagai referensi pembayaran. Pesanan Anda tidak akan dikirim sampai dana telah dicairkan di rekening kami.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-2">
                                        <h5 class="panel-title mb-3">
                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                cek pembayaran
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body mb-2 mt-2">
                                            <p>Lakukan pembayaran langsung ke rekening bank kami. Harap gunakan ID Pesanan Anda sebagai referensi pembayaran. Pesanan Anda tidak akan dikirim sampai dana telah dicairkan di rekening kami.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-3">
                                        <h5 class="panel-title mb-3">
                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                PayPal
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body mb-2 mt-2">
                                            <p>Lakukan pembayaran langsung ke rekening bank kami. Harap gunakan ID Pesanan Anda sebagai referensi pembayaran. Pesanan Anda tidak akan dikirim sampai dana telah dicairkan di rekening kami.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-button-payment">
                                <button class="btn flosun-button secondary-btn black-color rounded-0 w-100">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout Area End Here -->

@endsection