@foreach ($administrationfees as $administrationfee) 
<div class="modal fade fade-scale" id="editAdministrationFeesModal{{$administrationfee->id}}" tabindex="-1" role="dialog" aria-labelledby="editAdministrationFeeslabel" aria-hidden="true">
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
        <h5 class="modal-title" id="editAdministrationFeeslabel">Edit Administration Fees</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form  action="{{ route('administrationfees.update', $administrationfee->id ) }}" method="POST"> 
          @csrf
          @method('PUT')                        
          <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="administration_fees" class="form-control {{ $errors->has('administration_fees') ? ' is-invalid' : '' }}" name="administration_fees" value = "{{$administrationfee->administration_fees}}" required >
                <label id="administration_fees" class="form-control-placeholder" for="administration_fees">Administration Fees*</label>
                @if ($errors->has('administration_fees'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('administration_fees') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" name="fees_description" value = "{{$administrationfee->fees_description}}" required>{{$administrationfee->fees_description}}</textarea>               
                <label id="fees_description" class="form-control-placeholder" for="fees_description">Fees Description</label>
              </div>            
            </div>
            <div class="col-md-6">
              <div class="form-group">
               <input type="text" class="form-control" name="claim_amount_from" required>              
               <label id="claim_amount_from" class="form-control-placeholder" for="claim_amount_from">Claim Amount From *</label>
             </div>            
           </div>
           <div class="col-md-6">
            <div class="form-group">
             <input type="text" class="form-control" name="claim_amount_to" required>              
             <label id="claim_amount_to" class="form-control-placeholder" for="claim_amount_to">Valid To *</label>
           </div>            
         </div>  
       </div>              
     </div>
     <div class="modal-footer">
      <div class="mx-auto">
        <button type="submit" class="btn btn-success btn-space">Save</button>                       

        <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Cancel</span>
        </button>          
      </div>
    </div> 
  </div>             
</form>

</div>
</div>
</div>
</div>
@endforeach


