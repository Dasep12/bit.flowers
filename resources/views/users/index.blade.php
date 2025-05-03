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
                <div class="col-12">
                    <div class="mb-2">
                        <button type="button" onclick="CrudUsers('Create','*')" class="btn btn-primary btn-sm">Create Data <i class="fa fa-plus"></i></button>
                        <button onclick="reloadGridList()" class="btn btn-primary btn-custom-primary btn-sm"><i class="fa fa-sync-alt"></i> Reload</button>
                    </div>
                    <div class="table-responsive">
                        <table id="jqGrid"></table>
                        <div id="jqGridPager"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    @include('users.partials.CrudUsers')
    <script>
        var dataTemp = [];

        function reloadGridList() {
            $("#jqGrid").jqGrid('setGridParam', {
                datatype: 'json',
                mtype: 'GET',
                postData: {
                    search: $("#searchInput").val()
                }
            }).trigger('reloadGrid');
        }

        function ReloadModalMenu(idRole, idUser) {
            $("#jqGridMainModal").jqGrid('setGridParam', {
                datatype: 'json',
                mtype: 'GET',
                postData: {
                    role_id: idRole,
                    user_id: idUser
                }
            }).trigger('reloadGrid');
        }
        $(document).ready(function() {
            // Attach click event handler to the search icon
            $("#searchButton").click(function() {
                // Get the value from the search input
                var searchTerm = $("#searchInput").val();
                reloadGridList()
                $("#searchInput").val('');
            });

            // Optional: Bind Enter key press to trigger search
            $("#searchInput").keypress(function(e) {
                if (e.which == 13) { // Enter key
                    $("#searchButton").click();
                }
            });
        });

        $("#jqGrid").jqGrid({
            url: "{{ url('jsonUsers') }}",
            datatype: "json",
            mtype: "GET",
            postData: {
                "_token": "{{ csrf_token() }}",
            },
            colModel: [{
                label: '<span class="fas fa-cog"></span>',
                name: 'Action',
                align: 'center',
                fixed: true,
                width: 40,
                formatter: actionFormatter
            }, {
                label: 'Username',
                name: 'username',
                // width: 75
            }, {
                label: 'Email',
                name: 'email',
                // width: 90
            }, {
                label: 'Phone',
                name: 'phone',
                // width: 80,
            }, {
                label: 'Role',
                name: 'role_id',
                hidden: true,
                // width: 75
            }, {
                label: 'supplier_id',
                name: 'supplier_id',
                hidden: true,
                // width: 75
            }, {
                label: 'Role',
                name: 'roleName',
                // width: 75
            }, {
                label: 'Status',
                name: 'lock_user',
                hidden: true
                // width: 80,
            }, {
                label: 'password',
                name: 'password',
                hidden: true,
                // width: 75
            }, {
                label: 'Status',
                name: 'act',
                align: 'center',
                formatter: function(cellvalue, options, rowObject) {
                    var status = rowObject.lock_user == 0 ? 'Active' : 'Inactive';
                    var badge = rowObject.lock_user == 0 ? 'badge-success' : 'badge-danger';
                    return `<span class="badge ${badge}">${status}</span>`;
                },
                width: 80,
            }],
            viewrecords: true, // show the current page, data rang and total records on the toolbar
            rowNum: 15,
            loadonce: false,
            rownumbers: true,
            rownumWidth: 30,
            width: '100%',
            height: 350,
            autoresizeOnLoad: true,
            autowidth: true,
            pager: "#jqGridPager",
            rowList: [15, 30, 50],
            loadComplete: function(data) {
                $('[data-toggle="popover"]').popover(); // Initialize the popover
                // Adjust grid width on window resize to make it responsive
                $(window).on('resize', function() {
                    var gridWidth = $('.table-responsive').width(); // Get the width of the container
                    $('#jqGrid').setGridWidth(gridWidth - 5); // Adjust the grid width
                }).trigger('resize'); // Trigger resize on page load

                var $this = $(this),
                    ids = $this.jqGrid('getDataIDs'),
                    i, l = ids.length;
                for (i = 0; i < l; i++) {
                    $this.jqGrid('editRow', ids[i], true);
                    var newid = ids[i];
                    var btnid = 'btn-' + newid;
                    showButton(ids[i], btnid);
                }
            },
        });

        function actionFormatter(cellvalue, options, rowObject) {

            var btnid = 'btn-' + options.rowId;
            var btn = "<div class='table-link'>";
            btn += "<a id='" + btnid + "' tabindex='0' class='btn btn-sm btn-default-custom btn-outline-primary ' role='button' ";
            btn += "data-container='body' data-toggle='popover' data-placement='right' data-trigger='focus' data-timeout='2000' data-html='true' data-content='-'>";
            btn += "<span class='fa fa-cog'></span></span>";
            btn += "</a>";
            btn += "</div>";
            return btn;
        }

        function showButton(userId, id) {
            var dataContent = "<div class='row d-flex justify-content-center'>";
            <?php if (CrudMenuPermission($MenuUrl, $user_id, 'edit')) { ?>
                dataContent += "<a id='btn-update-" + userId + "' class='btn btn-sm btn-link text-success ml-2 btn-option' ><small><span class='fas fa-edit'></span> Edit</small></a>";
            <?php } else { ?>
                dataContent += "-";
            <?php } ?>

            <?php if (CrudMenuPermission($MenuUrl, $user_id, 'delete')) { ?>
                dataContent += "<a  id='btn-delete-" + userId + "' class='btn btn-sm btn-link text-danger ml-2 btn-option ' ><small><span class='fas fa-trash'></span> Delete</small></a>";
            <?php } else { ?>
                dataContent += "-";
            <?php } ?>
            dataContent += "</div>";
            $('#' + id).attr('data-content', dataContent).popover();
        }

        function getRoles() {
            $.ajax({
                url: "{{ url('jsonListRoles') }}",
                method: "GET",
                cache: false,
                success: function(data) {
                    // Clear the current options
                    $('#role_id').empty();
                    $('#role_id').append('<option value="">Choose</option>');
                    // Loop through the data and append options
                    $.each(data, function(index, item) {
                        $('#role_id').append($('<option>', {
                            value: item.id, // assuming 'id' is the value to be sent
                            text: item.roleName // assuming 'name' is the display text
                        }));
                    });
                }
            })
        }

        function jsonListSupplier() {
            $.ajax({
                url: "{{ url('jsonListSupplier') }}",
                method: "GET",
                cache: false,
                success: function(data) {
                    // Clear the current options
                    $('#supplier_id').empty();
                    $('#supplier_id').append('<option value="*">All Supplier</option>');
                    // Loop through the data and append options
                    $.each(data, function(index, item) {
                        $('#supplier_id').append($('<option>', {
                            value: item.id, // assuming 'id' is the value to be sent
                            text: item.supplier_name // assuming 'name' is the display text
                        }));
                    });
                }
            })
        }

        $(document).on('click', '.btn-option', function() {
            var crud_data = (this.id).split('-');
            CrudUsers(crud_data[1], "" + crud_data[2] + "");
        });

        function CrudUsers(act, id) {
            document.getElementById("CrudUserForm").reset();
            $('#ErrorInfo').html('');
            $("#CrudUserAction").val(act);
            getRoles()
            jsonListSupplier()
            $("#CrudUserForm").find("label.error").remove(); // Remove any error labels
            $("#CrudUserForm").find(".error").removeClass("error"); // Remove error class from inputs

            switch (act) {
                case 'create':
                    disabledEnableForm(false)
                    $("#status_role").attr("checked", true)
                    ReloadModalMenu($("#role_id").val(), id);
                    $(".modal-title").html(`<i class="fas fa-plus-square"></i> Add Users`)
                    $("#modalCrudUser").modal('show');
                    // $(".btn-submit-menu").attr("disabled", true)
                    break;
                case 'delete':
                    disabledEnableForm(true);
                    getDataValues(id);
                    setTimeout(() => {
                        ReloadModalMenu($("#role_id").val(), id);
                    }, 500);
                    $(".modal-title").html(`<i class="fas fa-window-close"></i> Delete Users`)
                    $("#modalCrudUser").modal('show');
                    // $(".btn-submit-menu").attr("disabled", false)
                    break;
                case 'update':
                    disabledEnableForm(false);
                    getDataValues(id);
                    setTimeout(() => {
                        ReloadModalMenu($("#role_id").val(), id);
                    }, 500);
                    $(".modal-title").html(`<i class="fas fa-plus-square"></i> Edit Users`)
                    $("#modalCrudUser").modal('show');
                    // $(".btn-submit-menu").attr("disabled", true)
                    break;
            }
        }

        function disabledEnableForm(act) {
            $("#CrudUserForm :input").each(function() {
                var typeOfObject = $(this).prop('tagName');
                switch (typeOfObject) {
                    case "SELECT":
                        $(this).attr("disabled", act);
                        break;
                    case "INPUT":
                        $(this).attr("readonly", act);
                        break;
                    case "TEXTAREA":
                        $(this).attr("readonly", act);
                        break;
                }
            });
        }

        function doSuccess(data, action) {
            switch (action) {
                case "create":
                    showToast(data, action, "has been saved succesfully")
                    reloadGridList();
                    break;
                case "update":
                    showToast(data, action, "has been saved succesfully")
                    reloadGridList();
                    break;
                case "delete":
                    showToast(data, action, " has been removed succesfully")
                    reloadGridList();
                    break;
            }
        }

        function getDataValues(id) {
            var Grid = $('#jqGrid'),
                selRowId = Grid.jqGrid('getGridParam', 'selrow'),
                username = Grid.jqGrid('getCell', id, 'username'),
                email = Grid.jqGrid('getCell', id, 'email'),
                phone = Grid.jqGrid('getCell', id, 'phone'),
                supplier_id = Grid.jqGrid('getCell', id, 'supplier_id'),
                role_id = Grid.jqGrid('getCell', id, 'role_id'),
                password = Grid.jqGrid('getCell', id, 'password'),
                lock_user = Grid.jqGrid('getCell', id, 'lock_user');

            $("#id").val(id)
            $("#username").val(username)
            $("#email").val(email)
            $("#phone").val(phone)
            $.get(`{{ url("decryptPassword") }}?password=${password}`,
                function(data, txtStatus, jqXHR) {
                    console.log(data);
                    $("#password").val(data.decrypt);
                }
            );
            setTimeout(() => {
                $("#role_id").val(role_id).trigger('change');
            }, 500);
            $("#supplier_id").val(supplier_id).trigger('change');
            var stat = true;
            lock_user == 0 ? stat = true : stat = false;
            $("#lock_user").attr("checked", stat)
        }




        $("#role_id").change(function() {
            ReloadModalMenu($("#role_id").val(), $("#id").val());
        })

        $("#CrudUserForm").validate({
            ignore: ":hidden",
            submitHandler: function(form) {
                $.ajax({
                    url: "{{ url('jsonCrudUser') }}",
                    type: "POST",
                    method: "POST",
                    cache: false,
                    beforeSend: function() {
                        $(".btn-submit").attr("disabled", true);
                    },
                    complete: function() {
                        $(".btn-submit").attr("disabled", false);
                    },
                    data: $(form).serialize(),
                    success: function(res) {
                        if (res.success) {
                            $("#modalCrudUser").modal('hide');
                            doSuccess(res.data, $("#CrudUserAction").val())
                        } else {
                            var errMsg = '<div class="col-md-12"><div class="alert alert-custom-warning alert-warning alert-dismissible fade show" role="alert"><small><b> Error !</b><br/>' + res.msg + '</small><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div></div>'
                            $('#ErrorInfo').html(errMsg);
                        }
                    },
                    error: function(xhr, desc, err) {
                        var respText = "";
                        try {
                            respText = eval(xhr.responseText);
                        } catch {
                            respText = xhr.responseText;
                        }

                        respText = unescape(respText).replaceAll("_n_", "<br/>")
                        var errMsg = '<div class="col-md-12"><div class="alert alert-custom-warning alert-warning alert-dismissible fade show" role="alert"><small><b> Error ' + xhr.status + '!</b><br/>' + respText + '</small><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div></div>'
                        $('#ErrorInfo').html(errMsg);
                    },
                });
                return false; /* required to block normal submit since you used ajax */
            }
        });

        function exportToExcel(type) {
            $.ajax({
                url: "{{ url('exportSupplier') }}",
                method: "GET",
                data: {
                    act: type
                },
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(data, status, xhr) {

                    if (type == "xls") {
                        // Create a URL for the Blob object and initiate download
                        var blob = new Blob([data], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "Supplier.xlsx";
                        link.click();
                    } else if (type == "pdf") {
                        var blob = new Blob([data], {
                            type: 'application/pdf'
                        });
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "Supplier.pdf";
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }

                },
                error: function(xhr, status, error) {
                    console.error('Error exporting file:', error);
                }
            })
        }
    </script>

    @endsection