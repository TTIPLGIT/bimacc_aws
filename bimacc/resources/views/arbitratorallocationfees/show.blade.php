@foreach ($arbitratorallocationfees as $arbitratorallocationfee) 
<div class="modal fade" id="showArbitratorAllocationFeesModal{{$arbitratorallocationfee->id}}" tabindex="-1" role="dialog" aria-labelledby="showArbitratorAllocationFeeslabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <div class="modal-header">
                    <h5 class="modal-title" id="showArbitratorAllocationFeeslabel">Show Administration and Arbitration Fee</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">                   

                <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                              <strong>Currency Type : </strong>
                                {{ $arbitratorallocationfee->currency }}
                           </div>
                            <div class="form-group">
                              <strong>Claim Amount From : </strong>
                                {{ $arbitratorallocationfee->claim_amount_form }}
                           </div>
                           <div class="form-group">
                              <strong>Claim Amount To : </strong>
                                {{ $arbitratorallocationfee->claim_amount_to }}
                           </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                              <strong>Arbitrator Fees : </strong>
                                {{ $arbitratorallocationfee->arbitrator_fees }}
                           </div>
                           <div class="form-group">
                              <strong>Administration Fees : </strong>
                                {{ $arbitratorallocationfee->adminstration_fees }}
                           </div>
                           
                    </div>
                
                                          

                 
            
             
        </div>              

                    
    </div>
    <div class="modal-footer">
                <div class="mx-auto">                    
                        
                <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">
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






