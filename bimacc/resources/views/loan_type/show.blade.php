
@foreach ($loan_type as $loan)
<div class="modal fade" id="showLoanTypeModal{{$loan->id}}" tabindex="-1" role="dialog" aria-labelledby="showLoanTypelabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                  <div class="modal-header">
                    <h5 class="modal-title" id="showLoanTypelabel">Show Loan Type</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">             
                       

                <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                 <strong>Loan Type Code:</strong>
                                {{ $loan->loan_type_code }}
                            </div>
                            <div class="form-group">
                              <strong>Loan Name:</strong>
                                {{ $loan->loan_type_name }}  
                            </div>                           
                            
                    </div>

                     <div class="col-md-6">
                        <div class="form-group">
                                 <strong>Loan Description:</strong>
                                {{ $loan->loan_description }}
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






