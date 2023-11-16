@if($systemfeescount = 0)
 $systemFees = SystemFees::findOrFail($id);
 @endif
@foreach ($systemFees as $fees)
<div class="modal fade" id="showSystemFeesModal{{$fees->id}}" tabindex="-1" role="dialog" aria-labelledby="showSystemFeeslabel" aria-hidden="true">
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
                    <h5 class="modal-title" id="showSystemFeeslabel">Show Claimant Type</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">             
                       

                <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                 <strong>Claimant Type:</strong>
                                {{ $fees->claimant_type_id }}
                            </div>
                            <div class="form-group">
                              <strong>System Fees:</strong>
                                {{ $fees->system_fees }}  
                            </div>
                            
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                 <strong>Description:</strong>
                                {{ $fees->system_fees_description }}
                            </div>                         
                            
                    </div>
                   

           
            
             
        </div>              

                    
    </div>
    <div class="modal-footer">
                <div class="mx-auto">
                     
                        
                        <a class="btn btn-danger btn-space" href="{{ route('systemfees.index') }}">Cancel</a>            
                </div>
    </div> 
            </div>             
     
    </div>
    </div>
    </div>
    </div>
    @endforeach






