 <!-- Modal starts -->
 <div class="modal fade" id="CrudModalPrice" tabindex="-1" role="dialog" aria-labelledby="CrudModalPriceLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form method="post" enctype="multipart/form-data" id="CrudFormPrice">
             @csrf
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="CrudModalPriceLabel">Modal title</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <div class="modal-body">

                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="size_id">Size</label>
                                 <select name="size_id" id="size_id" class="form-control form-control-sm">
                                     <!-- opsi -->
                                     <option value="">*Choose Size Variant</option>
                                     @foreach ($Price as $price)
                                     <option value="{{ $price->id }}">{{ $price->name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="price">Price</label>
                                 <input type="text" class="form-control form-control-sm" name="price" id="price" placeholder="Price" required>
                             </div>

                             <div class="form-group">
                                 <label for="price">Discount (%)</label>
                                 <input type="number" class="form-control form-control-sm" name="discount" id="discount" placeholder="Discount" required>
                             </div>

                             <div class="form-group">
                                 <label>Images</label>
                                 <input type="file" class="form-control form-control-sm" aria-label="images" name="images" id="images">
                                 <img id="previewImage" src="#" alt="" style="display:none; width: 150px; margin-top: 10px;">
                             </div>

                         </div>
                     </div>

                     <div class="row" id="ErrorInfoPrice"></div>
                     <div class="row" id="DeleteInfoPrice"></div>
                     <input type="text" hidden name="CrudPriceAction" id="CrudPriceAction">
                     <input type="text" hidden name="idPrice" id="idPrice">
                     <input type="text" hidden name="product_id" id="product_id">
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

     document.getElementById('price').addEventListener('input', function(e) {
         let value = e.target.value;

         // Hapus semua karakter selain digit
         value = value.replace(/,/g, '').replace(/[^\d]/g, '');

         // Tambahkan separator koma
         e.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     });
     $("#CrudFormPrice").validate({
         ignore: ":hidden",
         submitHandler: function(form) {
             var formData = new FormData(form);
             $.ajax({
                 type: "POST",
                 url: "{{ url('product/jsonCrudPrice') }}",
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
                         $("#CrudModalPrice").modal('hide');
                         doSuccess(res.data, $("#CrudPriceAction").val())
                     } else {
                         var errMsg = '<div class="col-md-12"><div class="alert alert-custom-warning alert-warning alert-dismissible fade show" role="alert"><small><b> Error !</b><br/>' + res.msg + '</small><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div></div>'
                         $('#ErrorInfoPrice').html(errMsg);
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
                     $('#ErrorInfoPrice').html(errMsg);
                 },
             })
         }
     });
 </script>