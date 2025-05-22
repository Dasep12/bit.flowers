@extends('frontend.master')

@section('content')

<style>
    ul.tags a.tags-flowers.active {
        color: #E72463 !important;
        border-color: #E72463 !important;
    }
</style>

<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Shop Sidebar</h3>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Shop Main Area Start Here -->
<div class="shop-main-area">
    <div class="container container-default custom-area">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-12 col-custom widget-mt">
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper mb-30">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid"><i class="fa fa-th"></i></button>
                        <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="fa fa-th-list"></i></button>
                    </div>
                    <div class="shop-select">
                        <form class="d-flex flex-column w-100" action="#">
                            <div class="form-group">
                                <select class="form-control nice-select w-100">
                                    <option selected value="1">Alphabetically, A-Z</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <!--shop toolbar end-->
                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_3">
                    <div class="row shop_wrapper grid_3" id="product-list"></div>
                </div>
                <!-- Shop Wrapper End -->
                <!-- Bottom Toolbar Start -->
                <div class="row">
                    <div class="col-sm-12 col-custom">
                        <div class="toolbar-bottom">
                            <div class="pagination" id="pagination-links">
                                <ul>
                                    <!-- <li class="current">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="next"><a href="#">next</a></li>
                                    <li><a href="#">&gt;&gt;</a></li> -->
                                </ul>
                            </div>
                            <p class="desc-content text-center text-sm-right mb-0">Showing 0 - 0 of 0 result</p>
                        </div>
                    </div>
                </div>
                <!-- Bottom Toolbar End -->
            </div>
            <div class="col-lg-3 col-12 col-custom">
                <!-- Sidebar Widget Start -->
                <aside class="sidebar_widget widget-mt">
                    <div class="widget_inner">
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Search</h3>
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Our Store" aria-label="Search Our Store">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Menu Categories</h3>
                            <nav>
                                <ul class="mobile-menu p-0 m-0">
                                    <li class="menu-item-has-children"><a href="#">Birthday Boqutets</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Aster</a></li>
                                            <li><a href="#">Aubrieta</a></li>
                                            <li><a href="#">Basket of Gold</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Funeral Flowers</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Cleome</a></li>
                                            <li><a href="#">Columbine</a></li>
                                            <li><a href="#">Coneflower</a></li>
                                            <li><a href="#">Corepsis</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Interior Decor</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Calendula</a></li>
                                            <li><a href="#">Castor Bean</a></li>
                                            <li><a href="#">Catmint</a></li>
                                            <li><a href="#">Chives</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Custom Orders</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Lily</a></li>
                                            <li><a href="#">Rose</a></li>
                                            <li><a href="#">Sunflower</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Price Filter</h3>
                            <!-- Widget Menu Start -->
                            <form action="#">
                                <div id="slider-range"></div>
                                <div class="row d-flex justify-content-between">
                                </div>
                                <button onclick="loadProducts('1')" type="button">Filter</button>
                                <input type="text" name="text" id="amount" />
                            </form>
                            <!-- Widget Menu End -->
                        </div>
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Product</h3>
                            <div class="sidebar-body">
                                <input type="text" hidden name="product_id" id="product_id">
                                <ul class="sidebar-list">
                                    <li><a href="{{ url('/shop') }}">All Product</a></li>
                                    @foreach($productType as $type)
                                    <li><a href="javascript:void(0)" onclick="setProductId('{{ $type->id }}')">{{ $type->name_type}}({{$type->total_product}}) </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget-list widget-mb-2">
                            <h3 class="widget-title">Color</h3>
                            <div class="sidebar-body">
                                <ul class="checkbox-container categories-list">
                                    <input type="text" hidden name="colour_array" id="colour_array">
                                    @foreach($colours as $colour)
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="colour[]" class="custom-control-input input-colour" id="{{ $colour->id }}">
                                            <label class="custom-control-label" for="{{ $colour->id }}">
                                                {{ $colour->name_colour }} ({{ $colour->total_product }})
                                            </label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget-list widget-mb-3">
                            <h3 class="widget-title">Tags</h3>
                            <div class="sidebar-body">
                                <input type="text" hidden name="tags" value="[]" id="tags-filter">
                                <ul class="tags">
                                    @foreach($flower as $tag)
                                    <li><a class="tags-flowers" onclick="setTagsId('{{ $tag->id }}')" href="javascript:void(0)">{{ $tag->name_type }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget-list mb-0">
                            <h3 class="widget-title">Recent Products</h3>
                            <div class="sidebar-body" id="recent-products">
                                <!-- <div class="sidebar-product align-items-center">
                                    <a href="product-details.html" class="image">
                                        <img src="{{ asset('frontend/assets/images/cart/1.jpg')}}" alt="product">
                                    </a>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Glory of the Snow</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar Widget End -->
            </div>
        </div>
    </div>
</div>
<!-- Shop Main Area End Here -->


<script>
    function setProductId(id) {
        $('#product_id').val(id);
        loadProducts(page = 1);
    }

    function setTagsId(id) {
        let tags = JSON.parse($('#tags-filter').val() || []);
        const index = tags.indexOf(id);

        if (index === -1) {
            tags.push(id); // Tambahkan jika belum ada
        } else {
            tags.splice(index, 1); // Hapus jika sudah ada
        }

        $('#tags-filter').val(JSON.stringify(tags));
        loadProducts(1);
    }


    $(document).on('click', '.tags-flowers', function() {
        $(this).toggleClass('active');
    });

    $(document).on('click', '.input-colour', function() {
        const selectedColours = [];
        $('.input-colour:checked').each(function() {
            selectedColours.push($(this).attr('id'));
        });
        $('#colour_array').val(JSON.stringify(selectedColours));
        loadProducts(page = 1)
    });

    function loadProducts(page = 1) {
        const values = $("#slider-range").slider("values");
        const minPrice = values[0] == 0 ? 0 : values[0];
        const maxPrice = values[1] == 0 ? 0 : values[1];
        $.ajax({
            url: `/get-products?page=${page}`,
            type: 'GET',
            method: 'GET',
            dataType: 'json',
            data: {
                starPrice: parseFloat(minPrice),
                endPrice: parseFloat(maxPrice),
                product_type_id: $('#product_id').val(),
                colour_id: $('#colour_array').val(),
                flower: $('#tags-filter').val(),
            },
            success: function(response) {
                let html = '';
                if (response.data.length === 0) {
                    // Jika data kosong
                    // html = '<p class="no-results">No products found in this price range.</p>';
                    $('#product-list').html('');
                    $('#pagination-links').hide(); // sembunyikan pagination
                    $('.desc-content').text('No results found.');
                    return; // keluar dari fungsi
                }
                response.data.forEach(product => {
                    html += `<div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                        <div class="product-item">
                            <div class="single-product position-relative mr-0 ml-0">
                                <div class="product-image">
                                    <a class="d-block" href="{{ url('detail-products') }}?id=${ product.id }">
                                        <img src="{{ asset('assets/images/product/')}}/${ product.images[0] }" alt="" class="product-image-1 w-100">
                                        <img src="{{ asset('assets/images/product/')}}/${ product.images[1] }" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <span class="onsale">Sale!</span>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        
                                        <a href="#" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#modalProduct"
                                            data-image1="${ product.images[0] }"
                                            data-image2="${ product.images[1] }" data-discount="${ product.discount }" data-price_first="${ product.price_first }" data-price_final="${ product.price_final }" data-name="${ product.name_produk }" data-id="${ product.id }" title="Quick View" class="btnQuickView" data-bs-toggle="modal" data-bs-target="#modalProduct">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="{{ url('detail-products') }}?id=${product.id}">${ product.name_produk }</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        ${ product.discount > 0 
                                        ? `
                                            <span class="regular-price">Rp. ${ product.price_final.toLocaleString('id-ID').replace(/\./g, ',') }</span>
                                            <span class="old-price"><del>Rp. ${ product.price_first.toLocaleString('id-ID').replace(/\./g, ',') }</del></span>
                                        `
                                        : `
                                            <span class="regular-price">Rp. ${ product.price_first.toLocaleString('id-ID').replace(/\./g, ',') }</span>
                                        `
                                        }
                                    </div>
                                    <a onclick="addToCart('${product.id}',${ true })" href="javascript:void(0)" class="btn product-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </div>
                                <div class="product-content-listview">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Flowers daisy pink stick</a></h4>
                                    </div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">$60.00</span>
                                        <span class="old-price"><del>$70.00</del></span>
                                    </div>
                                    <p class="desc-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce posuere metus vitae arcu imperdiet, id aliquet ante scelerisque. Sed sit amet sem vitae urna fringilla tempus.</p>
                                    <div class="button-listview">
                                        <a href="cart.html" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top" title="Add to Cart"> <span>Add to Cart</span> </a>
                                        <a class="list-icon" href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="top" title="Compare"></i>
                                        </a>
                                        <a class="list-icon" href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="top" title="Wishlist"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div> `;
                });
                $('#pagination-links').show();
                $('#product-list').html(html);
                // Build pagination UI
                const pagination = $('#pagination-links ul');
                pagination.empty();

                const currentPage = response.current_page;
                const lastPage = response.last_page;

                // First page
                if (currentPage > 1) {
                    pagination.append(`<li><a onclick="loadProducts(1)">&laquo;</a></li>`);
                }

                // Previous pages
                for (let i = Math.max(1, currentPage - 2); i < currentPage; i++) {
                    pagination.append(`<li><a onclick="loadProducts(${i})">${i}</a></li>`);
                }

                // Current page
                pagination.append(`<li class="current">${currentPage}</li>`);

                // Next pages
                for (let i = currentPage + 1; i <= Math.min(lastPage, currentPage + 2); i++) {
                    pagination.append(`<li><a onclick="loadProducts(${i})">${i}</a></li>`);
                }

                // Next button
                if (currentPage < lastPage) {
                    pagination.append(`<li class="next"><a onclick="loadProducts(${currentPage + 1})">next</a></li>`);
                    pagination.append(`<li><a onclick="loadProducts(${lastPage})">&raquo;</a></li>`);
                }

                // Result text
                const from = response.from || 0;
                const to = response.to || 0;
                const total = response.total || 0;

                $('.desc-content').text(`Showing ${from} - ${to} of ${total} result`);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    function loadRecentProducst() {
        $.ajax({
            url: `{{ url('recent-products')}}`,
            type: 'GET',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                let html = '';
                response.data.forEach(product => {
                    html += `<div class="sidebar-product align-items-center">
                        <a href="product-details.html" class="image">
                           <img src="{{ asset('assets/images/product/')}}/${ product.images[0] }" alt="" class="product-image-1 w-100">
                        </a>
                        <div class="product-content">
                            <div class="product-title">
                                <h4 class="title-2"> <a href="product-details.html">${ product.name_produk }</a></h4>
                            </div>
                            <div class="price-box">
                                ${ product.discount > 0 
                                        ? `
                                            <span class="regular-price">Rp. ${ product.price_final.toLocaleString('id-ID').replace(/\./g, ',') }</span>
                                            <span class="old-price"><del>Rp. ${ product.price_first.toLocaleString('id-ID').replace(/\./g, ',') }</del></span>
                                        `
                                        : `
                                            <span class="regular-price">Rp. ${ product.price_first.toLocaleString('id-ID').replace(/\./g, ',') }</span>
                                        `
                                        }
                            </div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>`;
                });
                $('#recent-products').html(html);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }



    $(document).ready(function() {
        loadProducts(1, '');
        loadRecentProducst();
    });
</script>
@endsection