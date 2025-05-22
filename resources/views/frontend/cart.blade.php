@extends('frontend.master')

@section('content')


<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Shopping Cart</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- cart main wrapper start -->
<div class="cart-main-wrapper mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <form action="#" method="post" id="form-cart">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div id="cart-input-field">

                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="list-carts-checkout">
                                <!-- Cart items will be dynamically inserted here -->

                            </tbody>
                        </table>
                </div>
                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-md-flex justify-content-between">
                    <div class="apply-coupon-wrapper">
                        <!-- <form action="#" method="post" class=" d-block d-md-flex">
                            <input type="text" placeholder="Enter Your Coupon Code" required />
                            <button class="btn flosun-button primary-btn rounded-0 black-btn">Apply Coupon</button>
                        </form> -->
                    </div>
                    <div class="cart-update mt-sm-16">
                        <button type="button" href="javascript:void(0)" onclick="updateCart()" class="btn flosun-button primary-btn rounded-0 black-btn">Update Cart</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 ml-auto col-custom">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td id="sub-total">Rp 0</td>
                                </tr>
                                <!-- <tr>
                                    <td>Shipping</td>
                                    <td>Rp100.000</td>
                                </tr> -->
                                <tr class="total">
                                    <td>Total</td>
                                    <td id="total-amount" class="total-amount">Rp 0</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="checkout.html" class="checkout-btn btn flosun-button primary-btn rounded-0 black-btn w-100">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->

<script>
    $(document).ready(function() {
        getCartCheckout();

    });

    function getCartCheckout() {
        $.ajax({
            url: "{{ url('cart/get') }}",
            type: "GET",
            success: function(response) {
                var html = ``;
                var inputField = ``;
                let totalPrice = 0;
                if (response.data.length == 0) {
                    $("#list-carts").html('<h4 class="text-center">Keranjang Kosong</h4>');
                    $("#count-cart").html(0);
                    $("#total-carts").html('Rp. 0');
                    $(".cart-update").attr("style", "display:none");
                    $(".checkout-btn").attr("style", "display:none");
                    return;
                }
                $(".cart-update").attr("style", "display:block");
                $(".checkout-btn").attr("style", "display:block");
                const countCart = Object.keys(response.data).length;
                Object.values(response.data).forEach(item => {
                    const qty = parseFloat(item.qty); // Pastikan qty berupa angka
                    const harga = parseFloat(item.price_final); // Pastikan harga berupa angka
                    totalPrice += qty * harga;
                });

                $.each(response.data, function(index, item) {
                    var subtotal = item.price_final * item.qty;
                    inputField += `
                        <input type="text" hidden name="product_id[]" value="${item.product_id}" >
                        <input type="text" hidden name="qty[]" value="${item.qty}" ><br>
                    `;
                    html += `
                       <tr>
                        <td class="pro-thumbnail"><a href="javascript:void(0)"><img class="img-fluid" src="{{ asset('assets/images/product') }}/${item.images}" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">${ item.name_product }</a></td>
                                <td class="pro-price"><span>Rp. ${ item.price_final.toLocaleString('id-ID').replace(/\./g, ',') }</span></td>
                                <td class="pro-quantity">
                                   <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input id="qty-product" class="cart-plus-minus-box" name="qty-product[]" value="${item.qty}" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                            <div class="dec qtybutton"><i class="fa fa-minus"></i></div><div class="inc qtybutton"><i class="fa fa-plus"></i></div></div>
                                        </div>
                                </td>
                                <td class="pro-subtotal"><span>Rp. ${ subtotal.toLocaleString('id-ID').replace(/\./g, ',') }</span></td>
                                <td class="pro-remove"><a onclick="removeCart('${item.product_id}')" href="javascript:void(0)"><i class="lnr lnr-trash"></i></a></td>
                            </tr>
                    `;
                });
                $("#list-carts-checkout").html(html);
                $("#cart-input-field").html(inputField);
                $("#sub-total").html('Rp. ' + totalPrice.toLocaleString('id-ID').replace(/\./g, ','));
                $("#total-amount").html('Rp. ' + totalPrice.toLocaleString('id-ID').replace(/\./g, ','));
                // Update cart count or show success message
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function removeCart(id) {
        $.ajax({
            url: "{{ url('/cart/remove') }}",
            type: "POST",
            data: {
                product_id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                getCartCheckout();
                getCart();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function updateCart() {

        var productIds = $("input[name='product_id[]']").map(function() {
            return $(this).val();
        }).get();

        var quantities = $("input[name='qty-product[]']").map(function() {
            return $(this).val();
        }).get();


        $.ajax({
            url: "{{ url('/cart/update') }}",
            method: "POST",
            data: {
                product_id: productIds,
                qty: quantities,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                getCartCheckout();
                getCart();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    $(document).on('click', '.qtybutton', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);
    });
</script>
@endsection