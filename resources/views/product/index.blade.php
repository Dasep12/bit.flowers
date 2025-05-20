@extends('layouts.master')

@section('content')

@include('product.partials.Crud')
@include('product.partials.CrudPrice')

<style>
    .modal-dialog-custom {
        max-width: 800px;
        /* Optional: ubah sesuai kebutuhan */
    }

    .modal-content-custom {
        height: 600px;
        /* Fixed height */
        overflow: hidden;
        /* Hindari scroll seluruh modal */
    }

    .modal-body-custom {
        overflow-y: auto;
        overflow-x: hidden;
        height: calc(100% - 120px);
        /* Sesuaikan agar muat dengan header dan footer */
    }
</style>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Master Data
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <div class="row">
                <!-- Modal Ends -->
                <div class="text-center mb-2">
                    <button type="button" onclick="CrudProduct('Create','*')" class="btn btn-primary btn-sm">Create Data <i class="fa fa-plus-circle"></i></button>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="DataTableProduct" class="table dataTable no-footer " style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">#</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Flower Type</th>
                                    <th class="bg-primary text-white">Product Type</th>
                                    <th class="bg-primary text-white">Status</th>
                                    <th class="bg-primary text-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- jQuery dari CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Jquery validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


    <script>
        function CrudProduct(action, id) {
            document.getElementById("CrudFormProduct").reset();
            var act = action.toLowerCase();
            $("#CrudAction").val(act);
            jsonDataTablePrice(id);
            showGallery(id);
            document.getElementById("progressCatalog").style.display = "none";
            switch (act) {
                case 'create':
                    disabledEnableForm("CrudFormProduct", false);
                    $("#status").attr("checked", true)
                    $('#CrudModalProductLabel').text('Create Product');
                    $('#CrudModalProduct').modal('show');
                    $("#price-tab").addClass("disabled");
                    $("#catalog-tab").addClass("disabled");
                    break;
                case 'update':
                    disabledEnableForm("CrudFormProduct", false);
                    getDetail(id);
                    $("#price-tab").removeClass("disabled");
                    $("#catalog-tab").removeClass("disabled");
                    $('#CrudModalProductLabel').text('Edit Product');
                    setTimeout(function() {
                        $('#CrudModalProduct').modal('show');
                    }, 400);
                    break;
                case 'delete':
                    getDetail(id);
                    $("#price-tab").removeClass("disabled");
                    $("#catalog-tab").removeClass("disabled");
                    disabledEnableForm("CrudFormProduct", true);
                    $('#CrudModalProductLabel').text('Delete Product');
                    setTimeout(function() {
                        $('#CrudModalProduct').modal('show');
                    }, 400);
                    break;
                default:
                    console.log('Invalid action');
            }
        }

        function getDetail(id) {
            $.ajax({
                url: "{{ url('/admin/product/jsonDetail/') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var results = data.data;
                    const productImageBaseUrl = "{{ asset('assets/images/product') }}";
                    results.forEach(res => {

                        $('#name_produk').val(res.name_produk);
                        $('#flowery_type_id').val(res.flowery_type_id);
                        $('#product_type_id').val(res.product_type_id);
                        $("#status").attr("checked", res.status == 1 ? true : false);
                        $('#description').val(res.description);
                        $('#id').val(res.id);
                        $('#product_id').val(res.id);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function getDetailPrice(id) {
            $.ajax({
                url: "{{ url('/admin/product/jsonDetailPrice/') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var results = data.data;
                    const productImageBaseUrl = "{{ asset('assets/images/product') }}";
                    results.forEach(res => {
                        $('#size_id').val(res.size_id);
                        $('#price').val(res.price);
                        $('#product_id').val(res.product_id);
                        $('#discount').val(res.discount);
                        $('#idPrice').val(res.id);
                        if (res.images) {
                            const images = productImageBaseUrl + '/' + encodeURIComponent(res.images);
                            $('#previewImage').attr('src', images);
                        }
                        const preview = document.getElementById('previewImage');
                        preview.style.display = 'block';
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function disabledEnableForm(formId, act) {
            $("#" + formId + " :input").each(function() {
                var typeOfObject = $(this).prop('tagName');
                var type = $(this).attr("type");
                switch (typeOfObject) {
                    case "SELECT":
                        $(this).prop("disabled", act);
                        break;
                    case "TEXTAREA":
                        $(this).prop("readonly", act);
                        break;
                    case "INPUT":
                        if (type === "file" || type === "checkbox") {
                            // Gunakan disabled agar tidak bisa dipilih
                            $(this).prop("disabled", act);
                        } else {
                            // Untuk input text, number, dll
                            $(this).prop("readonly", act);
                        }
                        break;
                }
            });
        }

        $(document).ready(function() {
            $('#DataTableProduct').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/admin/product/jsonDataTableList') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '5%' // lebar kolom ID
                    },
                    {
                        data: 'name_produk',
                        name: 'name_produk',
                        width: '20%'
                    },
                    {
                        data: 'productType',
                        name: 'productType',
                        width: '20%'
                    },
                    {
                        data: 'flowerType',
                        name: 'flowerType',
                        width: '20%'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        width: '10%'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '30%'
                    }
                ]
            });
        })


        function jsonDataTablePrice(id) {
            // Destroy existing DataTable if already initialized
            if ($.fn.DataTable.isDataTable('#DataTablePrice')) {
                $('#DataTablePrice').DataTable().clear().destroy();
            }
            $('#DataTablePrice').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/admin/product/jsonDataTableListPrice') }}?product_id=" + id,
                    type: 'GET'
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '5%' // lebar kolom ID
                    },
                    {
                        data: 'size',
                        name: 'size',
                        width: '20%'
                    },
                    {
                        data: 'price',
                        name: 'price',
                        width: '20%'
                    },
                    {
                        data: 'discount',
                        name: 'discount',
                        width: '20%'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '30%'
                    }
                ]
            });
        }


        function showGallery(id) {
            $('#lightgallery-without-thumb').empty();
            let gallery = $('#lightgallery-without-thumb').data('lightGallery');
            if (gallery) {
                gallery.destroy(true); // destroy dengan true = clean all
            }
            $.ajax({
                type: "GET",
                url: "{{ url('admin/product/jsonGallery') }}",
                data: {
                    id: id
                },
                success: function(res) {
                    console.log(res);
                    if (res.success) {
                        $.each(res.data, function(index, value) {
                            var html = `<a href="{{ asset('assets/images/product')}}/${value.images}" class="image-tile">
                            <div data-id="${value.id}" onclick="removeImage(event, this)" style="position: absolute; top: 0px; right: 10px; font-size: 20px; cursor: pointer; background: #fff;padding: 2px 6px;">
                                <i class="fa fa-window-close text-danger"></i>
                            </div>
                            <img src="{{ asset('assets/images/product')}}/${value.images}" alt="${value.images}">
                            </a>`;
                            $('#lightgallery-without-thumb').append(html);
                        });
                        $("#lightgallery-without-thumb").lightGallery({
                            selector: 'a.image-tile',
                            thumbnail: true,
                            animateThumb: false,
                            showThumbByDefault: false
                        });
                    }
                }
            })
        }

        function CrudPrice(action, id) {
            document.getElementById("CrudFormPrice").reset();
            var act = action.toLowerCase();
            $("#CrudPriceAction").val(act);
            const input = document.getElementById('images');
            const preview = document.getElementById('previewImage');
            $("#idPrice").val(id);
            $("#product_id").val($("#id").val());

            input.value = ''; // Hapus file dari input
            preview.src = '#';
            preview.style.display = 'none'; // Sembunyikan preview

            switch (act) {
                case 'create':
                    disabledEnableForm("CrudFormPrice", false);
                    $("#status").attr("checked", true)
                    $('#CrudModalPriceLabel').text('Create Price');
                    $('#CrudModalPrice').modal('show');
                    break;
                case 'update':
                    disabledEnableForm("CrudFormPrice", false);
                    getDetailPrice(id);
                    $('#CrudModalPriceLabel').text('Edit Price');
                    setTimeout(function() {
                        $('#CrudModalPrice').modal('show');
                    }, 400);
                    break;
                case 'delete':
                    getDetailPrice(id);
                    disabledEnableForm("CrudFormPrice", true);
                    $('#CrudModalPriceLabel').text('Delete Price');
                    setTimeout(function() {
                        $('#CrudModalPrice').modal('show');
                    }, 400);
                    break;
                default:
                    console.log('Invalid action');
            }
        }
    </script>