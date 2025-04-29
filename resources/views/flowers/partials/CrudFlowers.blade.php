 <!-- Modal starts -->
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
                 <input type="text" hidden name="CrudAction" id="CrudAction">
                 <div class="modal-body">
                     <div class="form-group">
                         <label>Name</label>
                         <input type="text" class="form-control form-control-sm" placeholder="Flower name" aria-label="name_flower" name="name_flower" id="name_flower" required>
                     </div>
                     <div class="form-group">
                         <label>Price</label>
                         <input type="number" class="form-control form-control-sm" placeholder="Enter Price" aria-label="price" name="price" id="price" required>
                     </div>
                     <div class="form-group">
                         <label>Images</label>
                         <input type="file" class="form-control form-control-sm" aria-label="images" name="images" id="images" required>
                         <img id="previewImage" src="#" alt="Preview" style="display:none; width: 150px; margin-top: 10px;">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-primary btn-sm">Submit</button>
                     <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                 </div>
             </div>
         </form>
     </div>
 </div>