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
                                 <label for="name_produk">Size</label>
                                 <select name="flowery_type_id" id="flowery_type_id" class="form-control form-control-sm">
                                     <!-- opsi -->
                                     <option value="">*Choose Size Variant</option>
                                     @foreach ($Price as $price)
                                     <option value="{{ $price->id }}">{{ $price->name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div>
                                 <label for="name_produk">Price</label>
                                 <input type="text" class="form-control form-control-sm" name="price" id="price" placeholder="Price" required>
                             </div>

                         </div>
                     </div>

                     <div class="row" id="ErrorInfoPrice"></div>
                     <div class="row" id="DeleteInfoPrice"></div>
                     <input type="text" hidden name="CrudPriceAction" id="CrudPriceAction">
                     <input type="text" hidden name="idPrice" id="idPrice">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary btn-sm btn-submit">Submit</button>
                     <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                 </div>
             </div>
         </form>
     </div>
 </div>