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

            switch (act) {
                case 'create':
                    disabledEnableForm(false);
                    $("#status").attr("checked", true)
                    $('#CrudModalProductLabel').text('Create Product');
                    $('#CrudModalProduct').modal('show');
                    break;
                case 'update':
                    disabledEnableForm(false);
                    getDetail(id);
                    $('#CrudModalProductLabel').text('Edit Product');
                    setTimeout(function() {
                        $('#CrudModalProduct').modal('show');
                    }, 400);
                    break;
                case 'delete':
                    getDetail(id);
                    disabledEnableForm(true);
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
                url: "{{ url('/product/jsonDetail/') }}/" + id,
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
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function disabledEnableForm(act) {
            $("#CrudFormProduct :input").each(function() {
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
                    url: "{{ url('product/jsonDataTableList') }}",
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

        function CrudPrice(action, id) {
            document.getElementById("CrudFormPrice").reset();
            var act = action.toLowerCase();
            $("#CrudActionPrice").val(act);

            switch (act) {
                case 'create':
                    // disabledEnableForm(false);
                    $("#status").attr("checked", true)
                    $('#CrudModalPriceLabel').text('Create Price');
                    $('#CrudModalPrice').modal('show');
                    break;
                case 'update':
                    disabledEnableForm(false);
                    getDetail(id);
                    $('#CrudModalPriceLabel').text('Edit Price');
                    setTimeout(function() {
                        $('#CrudModalPrice').modal('show');
                    }, 400);
                    break;
                case 'delete':
                    getDetail(id);
                    disabledEnableForm(true);
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