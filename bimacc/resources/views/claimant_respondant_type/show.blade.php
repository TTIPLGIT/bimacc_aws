@if($claimant_respondantcount = 0)
 $claimant_respondant_type = ClaimantRespondantType::findOrFail($id);
 @endif
@foreach ($claimant_respondant_type as $claimant_respondant)
<div class="modal fade" id="showClaimantRespondantModal{{$claimant_respondant->id}}" tabindex="-1" role="dialog" aria-labelledby="showClaimentRespondantTypelabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                  <div class="modal-header">
                    <h5 class="modal-title" id="showClaimentRespondantTypelabel">Show Claimant Respondant Type</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">             
                       

                <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                 <strong>Type:</strong>
                                {{ $claimant_respondant->type }}
                            </div>
                            <div class="form-group">
                              <strong>Name:</strong>
                                {{ $claimant_respondant->claimant_respondant_type_name }}  
                            </div>
                            <div class="form-group">
                              <strong>Description:</strong>
                                {{ $claimant_respondant->claimant_respondant_type_description }}  
                            </div>
                            
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






