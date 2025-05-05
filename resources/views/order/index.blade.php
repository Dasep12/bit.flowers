@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Transaction
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <div class="row">
                <!-- Modal Ends -->

                <div class="col-12">
                    <div class="table-responsive">
                        <table id="DataTableShipping" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Transaction</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <!-- <th>Actions</th> -->
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
        $(document).ready(function() {
            $('#DataTableShipping').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('order/jsonDataTableList') }}", // pastikan rutenya valid
                    type: 'GET'
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'no_transaction',
                        name: 'no_transaction'
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    }
                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     orderable: false,
                    //     searchable: false
                    // }
                ]
            });

        })
    </script>