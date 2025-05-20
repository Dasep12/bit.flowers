 <style>
     .delete-gallery {
         cursor: pointer !important;
         font-size: 30px;
         position: absolute;
         color: white;
         border: none;
         background: none;
         right: -15px;
         top: -15px;
         line-height: 1;
         z-index: 99;
         padding: 0;
     }

     .delete-gallery span {
         height: 30px;
         width: 30px;
         background-color: black;
         border-radius: 50%;
         display: block;
     }

     .box-gallery {
         width: calc((100% - 30px) * 0.333);
         margin: 5px;
         height: 250px;
         background: #CCCCCC;
         float: left;
         box-sizing: border-box;
         position: relative;
         box-shadow: 0 0 5px 2px rgba(0, 0, 0, .15);
     }

     .box-gallery:hover {
         box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.5);
     }

     .box-gallery .image-gallery {
         width: 100%;
         height: 100%;
         position: relative;
         overflow: hidden;
     }

     .box-gallery .image-gallery img {
         width: 100%;
         min-height: 100%;
         position: absolute;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%);
         -ms-transform: translate(-50%, -50%);
         -webkit-transform: translate(-50%, -50%);
     }

     @media (max-width: 600px) {
         .box-gallery {
             width: calc((100% - 20px) * 0.5);
             height: 200px;
         }
     }
 </style>

 <!-- Modal starts -->
 <div class="modal fade" id="CrudModalProduct" tabindex="-1" role="dialog" aria-labelledby="CrudModalProductLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-custom" role="document">
         <form method="post" enctype="multipart/form-data" id="CrudFormProduct">
             @csrf
             <div class="modal-content modal-content-custom">
                 <div class="modal-header">
                     <h5 class="modal-title" id="CrudModalProductLabel">Modal title</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <div class="modal-body modal-body-custom">
                     <ul class="nav nav-tabs" role="tablist">
                         <li class="nav-item">
                             <a class="nav-link active show" id="product-tab" data-toggle="tab" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true"><i class="icon-basket-loaded"></i> Product</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" id="price-tab" data-toggle="tab" href="#price-1" role="tab" aria-controls="price-1" aria-selected="false"><i class="fa fa-dollar-sign"></i> Price</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" id="catalog-tab" data-toggle="tab" href="#catalog-1" role="tab" aria-controls="catalog-1" aria-selected="false"><i class="fa fa-images"></i> Catalog</a>
                         </li>
                     </ul>
                     <div class="tab-content" id="nav-tabContent">
                         <div class="tab-pane fade active show" id="product-1" role="tabpanel" aria-labelledby="product-tab">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label for="name_produk">Name</label>
                                         <input type="text" class="form-control form-control-sm" id="name_produk" name="name_produk" placeholder="Product Name" required>
                                     </div>
                                     <div class="form-row row">
                                         <div class="form-group col-md-6">
                                             <label for="flowerType">Flower Type</label>
                                             <select name="flowery_type_id" id="flowery_type_id" class="form-control form-control-sm">
                                                 <!-- opsi -->
                                                 <option value="">*Choose Flower Type</option>
                                                 @foreach ($FlowerType as $flowerType)
                                                 <option value="{{ $flowerType->id }}">{{ $flowerType->name_type }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="product_type_id">Product Type</label>
                                             <select id="product_type_id" name="product_type_id" class="form-control form-control-sm">
                                                 <option value="">*Choose Product Type</option>
                                                 <!-- opsi -->
                                                 @foreach ($ProductType as $productType)
                                                 <option value="{{ $productType->id }}">{{ $productType->name_type }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>

                                     <div class="form-group">
                                         <label for="description">Description</label>
                                         <textarea class="form-control form-control-sm" id="description" name="description" rows="3" placeholder="Product Description"></textarea>
                                     </div>

                                     <div class="form-group">
                                         <div class="form-check form-check-primary">
                                             <label class="form-check-label">
                                                 <input type="checkbox" id="status" name="status" class="form-check-input">
                                                 Actived
                                                 <i class="input-helper"></i></label>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane fade" id="price-1" role="tabpanel" aria-labelledby="price-tab">
                             <div class="row">
                                 <button onclick="CrudPrice('Create','*')" type="button" class="btn btn-sm btn-primary mb-1">Add Price <i class=" fa fa-plus-circle"></i></button>
                                 <div class="col-md-12">
                                     <table id="DataTablePrice" class="table dataTable no-footer " style="width: 100%;">
                                         <thead>
                                             <tr>
                                                 <th class="bg-primary text-white">#</th>
                                                 <th class="bg-primary text-white">Size</th>
                                                 <th class="bg-primary text-white">Price</th>
                                                 <th class="bg-primary text-white">Discount</th>
                                                 <th class="bg-primary text-white">Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane fade" id="catalog-1" role="tabpanel" aria-labelledby="catalog-tab">
                             <div class="row grid-margin">
                                 <div class="col-lg-12">
                                     <div class="card px-3">
                                         <div class="card-body">
                                             <div id="progressCatalog" class="progress mt-3" style="height: 25px;">
                                                 <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated"
                                                     role="progressbar" style="width: 0%;">0%</div>
                                             </div>
                                             <input type="file" id="images" class="form-control mb-3 form-control-sm" multiple>
                                             <button type="button" id="uploadBtn" class="btn btn-primary btn-sm mb-2">Upload</button>

                                             <div id="lightgallery-without-thumb" class="row lightGallery gallery-product">
                                                 <!-- images list catalog -->
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
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
     function removeImage(event, el) {
         event.preventDefault(); // Mencegah default click action
         event.stopPropagation(); // Mencegah bubble ke parent <a>
         const imageId = el.getAttribute('data-id');
         let formData = new FormData();
         formData.append('id', imageId);
         formData.append('CrudCatalogAction', "delete");
         if (confirm('Yakin ingin menghapus gambar ini?')) {
             $.ajax({
                 type: "POST",
                 headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                 },
                 url: "{{ url('/admin/product/jsonCrudCatalog') }}",
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
                     var action = "delete";
                     if (res.success) {
                         showToast("images", action, "has been removed succesfully")
                         showGallery($('#id').val());
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
     }

     $("#CrudFormProduct").validate({
         ignore: ":hidden",
         submitHandler: function(form) {
             var formData = new FormData(form);
             $.ajax({
                 type: "POST",
                 url: "{{ url('admin/product/jsonCrud') }}",
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
                     var action = $("#CrudAction").val();
                     if (res.success) {

                         if (action.toLowerCase() == "create") {
                             $("#id").val(res.id);
                             $("#price-tab").removeClass("disabled");
                             $("#catalog-tab").removeClass("disabled");
                             reloadTableList();
                             showToast(res.data, action, "has been saved succesfully")
                         } else {
                             doSuccess(res.data, action);
                             $("#CrudModalProduct").modal('hide');
                         }

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
         $('#DataTableProduct').DataTable().ajax.reload();
         $('#DataTablePrice').DataTable().ajax.reload();
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


     // Upload Images
     $('#uploadBtn').on('click', function() {
         let files = $('#images')[0].files;
         if (files.length === 0) return alert("Please select image(s).");

         let formData = new FormData();
         $.each(files, function(i, file) {
             formData.append('images[]', file);
         });
         formData.append('product_id', $('#id').val());
         formData.append('CrudCatalogAction', "create");
         document.getElementById("progressCatalog").style.display = "block";
         document.getElementById("progressCatalog").style.height = "25px";
         $.ajax({
             xhr: function() {
                 let xhr = new window.XMLHttpRequest();
                 xhr.upload.addEventListener("progress", function(evt) {
                     if (evt.lengthComputable) {
                         let percentComplete = Math.round((evt.loaded / evt.total) * 100);
                         $('#progressBar').css('width', percentComplete + '%').text(percentComplete + '%');
                     }
                 }, false);
                 return xhr;
             },
             url: '{{ url("admin/product/jsonCrudCatalog") }}',
             type: 'POST',
             data: formData,
             contentType: false,
             processData: false,
             headers: {
                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
             },
             success: function(response) {
                 $('#progressBar').removeClass('progress-bar-animated').text('Upload Complete');
                 showGallery($('#id').val());
             },
             error: function(xhr) {
                 alert("Upload failed: " + xhr.responseText);
             }
         });
     });
 </script>

 Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla consequatur corrupti iusto libero fugit repellendus ea saepe odio. Ipsum similique debitis fugit sint, expedita nemo dolorem hic sequi ullam placeat!