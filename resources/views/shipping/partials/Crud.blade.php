 <!-- Modal starts -->
 <div class="modal fade" id="CrudModalShipping" tabindex="-1" role="dialog" aria-labelledby="CrudModalShippingLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form method="post" enctype="multipart/form-data" id="CrudFormShipping">
             @csrf
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="CrudModalShippingLabel">Modal title</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <div class="modal-body">
                     <div class="form-group">
                         <label>Name</label>
                         <input type="text" required class="form-control form-control-sm" placeholder="Places name" aria-label="place_name" name="place_name" id="place_name" required>
                     </div>
                     <div class="form-group">
                         <label>Latitude</label>
                         <input type="text" required class="form-control form-control-sm" placeholder="Latitude" aria-label="latitude" name="latitude" id="latitude" required>
                     </div>
                     <div class="form-group">
                         <label>Longitude</label>
                         <input type="text" required class="form-control form-control-sm" placeholder="Longitude" aria-label="longitude" name="longitude" id="longitude" required>
                     </div>

                     <div class="form-group">
                         <label>Address</label>
                         <textarea class="form-control form-control-sm" placeholder="Enter Address" aria-label="address" name="address" id="address"></textarea>
                     </div>
                     <div class="form-group">
                         <div class="form-check form-check-primary">
                             <label class="form-check-label">
                                 <input type="checkbox" id="status" name="status" class="form-check-input">
                                 Actived
                                 <i class="input-helper"></i></label>
                         </div>
                     </div>

                     <div class="row" id="ErrorInfo"></div>
                     <div class="row" id="DeleteInfo"></div>
                     <input type="text" hidden name="CrudAction" id="CrudAction">
                     <input type="text" hidden name="id" id="id">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary btn-sm btn-submit">Submit</button>
                     <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                 </div>
             </div>
         </form>
     </div>
 </div>

 <script>
     $("#CrudFormShipping").validate({
         ignore: ":hidden",
         submitHandler: function(form) {
             var formData = new FormData(form);
             $.ajax({
                 type: "POST",
                 url: "{{ url('shipping/jsonCrud') }}",
                 beforeSend: function() {
                     $(".btn-submit").attr("disabled", true);
                 },
                 complete: function() {
                     $(".btn-submit").attr("disabled", false);
                 },
                 data: formData,
                 processData: false, // ⬅️ Wajib untuk FormData
                 contentType: false, // ⬅️ Wajib untuk FormData
                 success: function(res) {
                     if (res.success) {
                         $("#CrudModalShipping").modal('hide');
                         doSuccess(res.data, $("#CrudAction").val())
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
             })
         }
     });



     function reloadTableList() {
         $('#DataTableShipping').DataTable().ajax.reload();
     }

     function doSuccess(data, action) {
         switch (action) {
             case "create":
                 showToast(data, action, "has been saved succesfully")
                 reloadTableList();
                 break;
             case "update":
                 showToast(data, action, "has been saved succesfully")
                 reloadTableList();
                 break;
             case "delete":
                 showToast(data, action, " has been removed succesfully")
                 reloadTableList();
                 break;
             case "upload":
                 showToast(data, action, " has been succesfully")
                 reloadTableList();
                 break;
         }
     }
 </script>