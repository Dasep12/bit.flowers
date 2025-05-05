@extends('layouts.master')

@section('content')

@include('shipping.partials.Crud')
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
                    <button type="button" onclick="Crud('Create','*')" class="btn btn-primary btn-sm">Create Data <i class="fa fa-plus"></i></button>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="DataTableShipping" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Address</th>
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
        function Crud(action, id) {
            document.getElementById("CrudFormShipping").reset();
            var act = action.toLowerCase();
            $("#CrudAction").val(act);
            $("#id").val(id);

            switch (act) {
                case 'create':
                    disabledEnableForm(false);
                    $("#status").attr("checked", true)
                    $('#CrudModalShippingLabel').text('Create Place');
                    $('#CrudModalShipping').modal('show');
                    break;
                case 'update':
                    disabledEnableForm(false);
                    getDetail(id);
                    $('#CrudModalShippingLabel').text('Edit Place');
                    setTimeout(function() {
                        $('#CrudModalShipping').modal('show');
                    }, 300);
                    break;
                case 'delete':
                    getDetail(id);
                    disabledEnableForm(true);
                    $('#CrudModalShippingLabel').text('Delete Place');
                    setTimeout(function() {
                        $('#CrudModalShipping').modal('show');
                    }, 300);
                    break;
                default:
                    console.log('Invalid action');
            }
        }

        function getDetail(id) {
            $.ajax({
                url: "{{ url('shipping/jsonDetail') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var results = data.data;
                    results.forEach(res => {
                        $('#place_name').val(res.place_name);
                        $('#latitude').val(res.latitude);
                        $('#longitude').val(res.longitude);
                        $('#address').val(res.address);
                        $("#status").attr("checked", res.status == 1 ? true : false);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function disabledEnableForm(act) {
            $("#CrudFormShipping :input").each(function() {
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
            $('#DataTableShipping').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('shipping/jsonDataTableList') }}", // pastikan rutenya valid
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
                        data: 'latitude',
                        name: 'latitude',
                    },
                    {
                        data: 'longitude',
                        name: 'longitude'
                    },
                    {
                        data: 'address',
                        name: 'address'
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

        })
    </script>