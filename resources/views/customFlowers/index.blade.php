@extends('layouts.master')

@section('content')

@include('customFlowers.partials.Crud')

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
                    <button type="button" onclick="CrudFlowers('Create','*')" class="btn btn-primary btn-sm">Create Data <i class="fa fa-plus"></i></button>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="DataTableFlowers" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                    <th>Actions</th>
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
        function CrudFlowers(action, id) {
            document.getElementById("CrudFormFlowers").reset();
            var act = action.toLowerCase();
            $("#CrudAction").val(act);
            const input = document.getElementById('images');
            const preview = document.getElementById('previewImage');
            $("#id").val(id);
            input.value = ''; // Hapus file dari input
            preview.src = '#';
            preview.style.display = 'none'; // Sembunyikan preview
            callCategory();
            switch (act) {
                case 'create':
                    disabledEnableForm(false);
                    $("#status").attr("checked", true)
                    $('#CrudModalFlowersLabel').text('Create Custom Flower');
                    $('#CrudModalFlowers').modal('show');
                    break;
                case 'update':
                    disabledEnableForm(false);


                    getDetail(id);
                    $('#CrudModalFlowersLabel').text('Edit Custom Flower');
                    setTimeout(function() {
                        $('#CrudModalFlowers').modal('show');
                    }, 400);
                    break;
                case 'delete':
                    getDetail(id);
                    disabledEnableForm(true);
                    $('#CrudModalFlowersLabel').text('Delete Custom Flower');
                    setTimeout(function() {
                        $('#CrudModalFlowers').modal('show');
                    }, 400);
                    break;
                default:
                    console.log('Invalid action');
            }
        }

        function getDetail(id) {
            $.ajax({
                url: "{{ url('flowerJsonDetail') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var results = data.data;
                    const productImageBaseUrl = "{{ asset('assets/images/product') }}";
                    results.forEach(res => {
                        console.log(res.group_product_id);
                        $('#name_flower').val(res.name_flower);
                        $('#price').val(res.price);
                        $('#category').val(res.group_product_id).trigger('change');
                        $("#status").attr("checked", res.status == 1 ? true : false);
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

        function disabledEnableForm(act) {
            $("#CrudFormFlowers :input").each(function() {
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
            $('#DataTableFlowers').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('flowerJson') }}", // pastikan rutenya valid
                    type: 'GET'
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'images',
                        name: 'images'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            document.getElementById('images').addEventListener('change', function(event) {
                const input = event.target;
                const preview = document.getElementById('previewImage');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        })
    </script>