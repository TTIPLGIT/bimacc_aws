
@foreach ($dispute_subcategories as $dispute_subcategorie)
<div class="modal fade centered-modal" id="showSubCategoryModal{{$dispute_subcategorie->id}}" tabindex="-1" role="dialog" aria-labelledby="showSubCategoryModallabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                  <div class="modal-header">
                    <h5 class="modal-title" id="showSubCategoryModallabel">Show Dispute Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">             
                       

            <div class="row register-form">
                        <div class="col-md-6">
                          <div class="form-group">
                                 <strong>Dispute Sub Category Code:</strong>
                                {{ $dispute_subcategorie->dispute_subcategory_Code }}
                            </div>
                            <div class="form-group">
                                 <strong>Dispute Category Name:</strong>
                                {{ $dispute_subcategorie->subcategory_name }}
                            </div>
                            

                            <div class="form-group">
                              <strong>Created Date:</strong>
                                {{ $dispute_subcategorie->created_at }}  
                            </div>
                           
                    </div>                

                    
             </div>
    <div class="modal-footer">
                <div class="mx-auto">                     
                        
                       <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cancel</span>
                        </button>             
                </div>
    </div> 
            </div>             
     
    </div>
    </div>
    </div>
    </div>
    @endforeach












