
@foreach ($dispute_categories as $disputeCategory)
<div class="modal fade" id="showCategoryModal{{$disputeCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="showCategoryModallabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                  <div class="modal-header">
                    <h5 class="modal-title" id="showCategoryModallabel">Show Dispute Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">             
                       

            <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                 <strong>Dispute Category Code:</strong>
                                {{ $disputeCategory->dispute_category_Code }}
                            </div>
                            <div class="form-group">
                                 <strong>Dispute Category Name:</strong>
                                {{ $disputeCategory->category_name }}
                            </div>
                            <div class="form-group">
                              <strong>Dispute Category Description:</strong>
                                {{ $disputeCategory->category_description }}  
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







