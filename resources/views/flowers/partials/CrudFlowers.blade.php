 <!-- Modal starts -->
 <div class="modal fade" id="CrudModalFlowers" tabindex="-1" role="dialog" aria-labelledby="CrudModalFlowersLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form method="post" enctype="multipart/form-data" id="FormFlowers">
             @csrf
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="CrudModalFlowersLabel">Modal title</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p>Modal body text goes here.</p>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-primary btn-sm">Submit</button>
                     <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                 </div>
             </div>
         </form>
     </div>
 </div>