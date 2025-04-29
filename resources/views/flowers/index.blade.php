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
                    <button type="button" onclick="CrudFlowers('Create','*')" class="btn btn-primary btn-sm">Tambah Data <i class="fa fa-plus"></i></button>
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
                                <tr>
                                    <td>1</td>
                                    <td>2012/08/03</td>
                                    <td>Edinburgh</td>
                                    <td>New York</td>
                                    <td>
                                        <label class="badge badge-small badge-info">On hold</label>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-success">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </td>
                                </tr>
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
            var act = action.toLowerCase();
            switch (act) {
                case 'create':
                    $('#CrudModalFlowersLabel').text('Create Flower');
                    $('#CrudModalFlowers').modal('show');
                    break;
                case 'edit':
                    $('#CrudModalFlowersLabel').text('Edit Flower');
                    $('#CrudModalFlowers').modal('show');
                    break;
                case 'delete':
                    $('#CrudModalFlowersLabel').text('Delete Flower');
                    $('#CrudModalFlowers').modal('show');
                    break;
                default:
                    console.log('Invalid action');
            }
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
        })
    </script>