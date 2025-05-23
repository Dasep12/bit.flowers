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
                        <button type="button" onclick="CrudRoles('Create','*')" class="btn btn-primary btn-sm">Create Data <i class="fa fa-plus"></i></button>
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


    @include('roles.partials.CrudRoles')
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

        function ReloadModalMenu(idRole) {
            $("#jqGridMainModal").jqGrid('setGridParam', {
                datatype: 'json',
                mtype: 'GET',
                postData: {
                    id_role: idRole,
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
            url: "{{ url('jsonRole') }}",
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
                label: 'Role Id',
                name: 'code_role',
                // width: 75
            }, {
                label: 'Role Name',
                name: 'roleName',
                // width: 90
            }, {
                label: 'Access',
                name: 'Accessed',
                // width: 80,
            }, {
                label: 'status',
                name: 'status_role',
                hidden: true
                // width: 80,
            }, {
                label: 'status',
                name: 'act',
                align: 'center',
                formatter: function(cellvalue, options, rowObject) {
                    var status = rowObject.status_role == 1 ? 'Active' : 'Inactive';
                    var badge = rowObject.status_role == true ? 'badge-success small' : 'badge-danger small';
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
            btn += "<a id='" + btnid + "' tabindex='0' class='btn btn-xs btn-default-custom btn-outline-primary ' role='button' ";
            btn += "data-container='body' data-toggle='popover' data-placement='right' data-trigger='focus' data-timeout='2000' data-html='true' data-content='-'>";
            btn += "<span class='fa fa-cog'></span></span>";
            btn += "</a>";
            btn += "</div>";
            return btn;
        }

        function showButton(rolesId, id) {
            var dataContent = "<div class='d-flex row justify-content-center'>";
            <?php if (CrudMenuPermission($MenuUrl, $user_id, 'edit')) { ?>
                dataContent += "<a id='btn-update-" + rolesId + "' class='btn btn-sm btn-link text-success ml-2 btn-option' ><small><span class='fas fa-edit'></span> Edit</small></a>";
            <?php } else { ?>
                dataContent += "-";
            <?php } ?>
            <?php if (CrudMenuPermission($MenuUrl, $user_id, 'delete')) { ?>
                dataContent += "<a  id='btn-delete-" + rolesId + "' class='btn btn-sm btn-link text-danger ml-2 btn-option ' ><small><span class='fas fa-trash'></span> Delete</small></a>";
            <?php } else { ?>
                dataContent += "-";
            <?php } ?>
            dataContent += "</div>";
            $('#' + id).attr('data-content', dataContent).popover();
        }

        $(document).on('click', '.btn-option', function() {
            var crud_data = (this.id).split('-');
            CrudRoles(crud_data[1], "" + crud_data[2] + "");
        });

        function CrudRoles(act, id) {
            document.getElementById("CrudRolesForm").reset();
            $('#ErrorInfo').html('');
            $("#CrudRolesAction").val(act);

            $("#CrudRolesForm").find("label.error").remove(); // Remove any error labels
            $("#CrudRolesForm").find(".error").removeClass("error"); // Remove error class from inputs

            switch (act) {
                case 'create':
                    disabledEnableForm(false)
                    ReloadModalMenu(id)
                    $("#status_role").attr("checked", true)
                    $(".modal-title").html(`<i class="fas fa-plus-square"></i> Add Role`)
                    $("#modalCrudRoles").modal('show');
                    $(".btn-submit-menu").attr("disabled", true)
                    break;
                case 'delete':
                    disabledEnableForm(true);
                    getDataValues(id);
                    ReloadModalMenu(id)
                    $(".modal-title").html(`<i class="fas fa-window-close"></i> Delete Role`)
                    $("#modalCrudRoles").modal('show');
                    $(".btn-submit-menu").attr("disabled", false)
                    break;
                case 'update':
                    disabledEnableForm(false);
                    getDataValues(id);
                    ReloadModalMenu(id)
                    $(".modal-title").html(`<i class="fas fa-plus-square"></i> Edit Role`)
                    $("#modalCrudRoles").modal('show');
                    $(".btn-submit-menu").attr("disabled", true)
                    break;
            }
        }

        function disabledEnableForm(act) {
            $("#CrudRolesForm :input").each(function() {
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
                code_role = Grid.jqGrid('getCell', id, 'code_role'),
                roleName = Grid.jqGrid('getCell', id, 'roleName'),
                status_role = Grid.jqGrid('getCell', id, 'status_role');

            $("#id").val(id)
            $("#code_role").val(code_role)
            $("#roleName").val(roleName)

            var stat = true;
            status_role == 1 ? stat = true : stat = false;
            $("#status_role").attr("checked", stat)
        }



        $("#CrudRolesForm").validate({
            ignore: ":hidden",
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('jsonCrudRoles') }}",
                    beforeSend: function() {
                        $(".btn-submit").attr("disabled", true);
                    },
                    complete: function() {
                        $(".btn-submit").attr("disabled", false);
                    },
                    data: $(form).serialize(),
                    success: function(res) {
                        if (res.success) {
                            $("#modalCrudRoles").modal('hide');
                            doSuccess(res.data, $("#CrudRolesAction").val())
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