@extends('layouts.master')

@section('content')

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
    @include('flowers.partials.CrudFlowers')

    <script>
        function CrudFlowers(action, id) {
            document.getElementById("CrudFormFlowers").reset();
            var act = action.toLowerCase();
            $("#CrudAction").val(act);
            const input = document.getElementById('images');
            const preview = document.getElementById('previewImage');

            input.value = ''; // Hapus file dari input
            preview.src = '#';
            preview.style.display = 'none'; // Sembunyikan preview

            switch (act) {
                case 'create':
                    $('#CrudModalFlowersLabel').text('Create Flower');
                    $('#CrudModalFlowers').modal('show');
                    break;
                case 'edit':
                    getDetail(id);
                    $('#CrudModalFlowersLabel').text('Edit Flower');
                    $('#CrudModalFlowers').modal('show');
                    break;
                case 'delete':
                    getDetail(id);
                    $("#CrudFormFlowers :input").each(function() {
                        var typeOfObject = $(this).prop('tagName');
                        switch (typeOfObject) {
                            case "SELECT":
                                $(this).attr("disabled", true);
                                break;
                            case "INPUT":
                                $(this).attr("readonly", true);
                                break;
                            case "TEXTAREA":
                                $(this).attr("readonly", true);
                                break;
                        }
                    });
                    $('#CrudModalFlowersLabel').text('Delete Flower');
                    $('#CrudModalFlowers').modal('show');
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
                    results.forEach(res => {
                        $('#name_flower').val(res.name_flower);
                        $('#price').val(res.price);
                        $('#previewImage').attr('src', "{{ asset('assets/images/product') }}/" + res.images);
                        console.log("{{ asset('assets/images/product') }}/" + res.images)
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
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