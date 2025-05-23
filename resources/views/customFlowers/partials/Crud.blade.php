 <!-- Modal starts -->
 <style>
     .btn-sm-icon {
         height: 100%;
         padding: 0.375rem 0.5rem;
         font-size: 0.875rem;
     }

     .select2-container--default .select2-selection--single {
         height: 35px !important;
         /* Sesuaikan dengan tinggi input lainnya */
         padding: 9px !important;
         /* Sesuaikan padding jika diperlukan */
     }
 </style>
 <div class="modal fade" id="CrudModalFlowers" tabindex="-1" role="dialog" aria-labelledby="CrudModalFlowersLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form method="post" enctype="multipart/form-data" id="CrudFormFlowers">
             @csrf
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="CrudModalFlowersLabel">Modal title</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <div class="modal-body">
                     <div class="form-group">
                         <label>Name</label>
                         <input type="text" required class="form-control form-control-sm" placeholder="Name Item" aria-label="name_flower" name="name_flower" id="name_flower" required>
                     </div>
                     <div class="form-group">
                         <label>Price</label>
                         <input type="number" required class="form-control form-control-sm" placeholder="Enter Price" aria-label="price" name="price" id="price" required>
                     </div>
                     <div class="form-group">
                         <label for="category">Category</label>
                         <div class="d-flex gap-1 align-items-center">
                             <select id="category" name="group_product_id" class="form-control form-control-sm select2" required style="flex: 1;"></select>

                             <!-- Tombol tambah kategori -->
                             <button type="button" id="addCategoryBtn" class="btn-sm-icon btn btn-sm btn-success" title="Tambah Kategori">
                                 <i class="fas fa-plus"></i>
                             </button>

                             <!-- Tombol hapus kategori -->
                             <button type="button" id="deleteCategoryBtn" class="btn-sm-icon btn btn-sm btn-danger" title="Hapus Kategori">
                                 <i class="fas fa-trash-alt"></i>
                             </button>
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="form-check form-check-primary">
                             <label class="form-check-label">
                                 <input type="checkbox" id="status" name="status" class="form-check-input">
                                 Actived
                                 <i class="input-helper"></i></label>
                         </div>
                     </div>
                     <div class="form-group">
                         <label>Images</label>
                         <input type="file" class="form-control form-control-sm" aria-label="images" name="images" id="images">
                         <img id="previewImage" src="#" alt="" style="display:none; width: 150px; margin-top: 10px;">
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
     $("#CrudFormFlowers").validate({
         ignore: ":hidden",
         submitHandler: function(form) {
             var formData = new FormData(form);
             $.ajax({
                 type: "POST",
                 url: "{{ url('jsonCrudFlower') }}",
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
                         $("#CrudModalFlowers").modal('hide');
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
         $('#DataTableFlowers').DataTable().ajax.reload();
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


     function callCategory() {
         $('#category').select2({
             placeholder: 'Pilih atau tambah kategori',
             tags: true,
             dropdownParent: $('#CrudModalFlowers'), // Ganti sesuai modal ID kamu
             ajax: {
                 url: '/categories/search',
                 dataType: 'json',
                 delay: 250,
                 data: function(params) {
                     return {
                         q: params.term
                     };
                 },
                 processResults: function(data) {
                     return {
                         results: data
                     };
                 },
                 cache: true
             },
             width: '100%'
         });
     }
     $(document).ready(function() {
         let selectedCategoryId = null;


         $('#category').on('select2:select', function(e) {
             selectedCategoryId = e.params.data.id;
         });

         $('#addCategoryBtn').on('click', function() {
             let newCat = $('#category').val();
             if (!newCat) return alert('Masukkan nama kategori terlebih dahulu');

             $.post('/categories/store', {
                 name: newCat,
                 _token: '{{ csrf_token() }}'
             }, function(data) {
                 let newOption = new Option(data.text, data.id, true, true);
                 $('#category').append(newOption).trigger('change');
                 alert('Kategori baru berhasil ditambahkan!');
             });
         });

         $('#deleteCategoryBtn').on('click', function() {
             if (!selectedCategoryId) return alert('Pilih kategori yang ingin dihapus.');

             if (confirm('Yakin ingin menghapus kategori ini?')) {
                 $.ajax({
                     url: `/categories/${selectedCategoryId}`,
                     type: 'DELETE',
                     data: {
                         _token: '{{ csrf_token() }}'
                     },
                     success: function() {
                         $('#category').val(null).trigger('change');
                         selectedCategoryId = null;
                         alert('Kategori berhasil dihapus!');
                     }
                 });
             }
         });
     });
 </script>