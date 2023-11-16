@foreach ($registrationfees as $registrationfee) 
<div class="modal fade" id="showRegistrationFeesModal{{$registrationfee->id}}" tabindex="-1" role="dialog" aria-labelledby="showRegistrationFeeslabel" aria-hidden="true">
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
                    <h5 class="modal-title" id="showRegistrationFeeslabel">Show Registration Fees</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">                   

                <div class="row register-form">
                        <div class="col-md-6">
                           <div class="form-group">
                              <strong>Currency Type : </strong>
                                {{ $registrationfee->currency }}
                           </div>
                            <div class="form-group">
                              <strong>Registration Fees : </strong>
                                {{ $registrationfee->registration_fees }}
                           </div>
                           <div class="form-group">
                              <strong>Claim Amount From : </strong>
                                {{ $registrationfee->claim_amount_from }}
                            </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                              <strong>Registration Description : </strong>
                                {{ $registrationfee->fees_description }}
                           </div>                          

                             <div class="form-group">
                                 <strong>Claim Amount To : </strong>
                                {{ $registrationfee->claim_amount_to }}
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






