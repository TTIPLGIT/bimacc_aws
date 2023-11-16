 @if (count($errors) > 0)
 <script>
  $( document ).ready(function() {
    $('#createAdministrationFeesModal').modal('show');
  });
</script>
@endif 
<!-- create Arbitration modal -->
<div class="modal hide fade" id="createAdministrationFeesModal" tabindex="-1" role="dialog" aria-labelledby="createAdministrationFeeslabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
    <div class="modal-content">  

      <div class="modal-header">

        <h5 class="modal-title" id="createAdministrationFeeslabel">Create Administration Fees</h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">           

        <form id="createForm" action="{{ route('administrationfees.store') }}" method="POST" >
         @csrf 
         <div class="row register-form">     
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="administration_fees" class="form-control {{ $errors->has('administration_fees') ? ' is-invalid' : '' }}" name="administration_fees" required >
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
              <textarea class="form-control" name="fees_description" required></textarea>               
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
           <input type="text" class="form-control" name="claim_amount_to" >              
           <label id="claim_amount_to" class="form-control-placeholder" for="claim_amount_to">Claim Amount To </label>

         </div>            
       </div>

     </div>            


   </div>
   <div class="modal-footer">
    <div class="mx-auto">

      <button type="submit" id="register" class="btn btn-success btn-space" >Save</button>
      <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
      <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">Cancel</span>
      </button>           
    </div>
  </div> 
</div>             
</form>

</div>
</div>









<!-- End of create Arbitration modal -->





