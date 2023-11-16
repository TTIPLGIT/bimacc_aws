  <!-- create Arbitration modal -->
  <div class="modal hide fade" id="createRegistrationFeesModal" tabindex="-1" role="dialog" aria-labelledby="createRegistrationFeeslabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
      <div class="modal-content">  

        <div class="modal-header">

          <h5 class="modal-title" id="createRegistrationFeeslabel">Create Registration Fees</h5>

          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">           

          <form id="createForm" action="{{ route('registrationfees.store') }}" method="POST" >
           @csrf 
           <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group">
               <select class="form-control" name="currency" id="currency" required>
                <option value="">Select Currency</option>                
                <option value="INR">INR</option>
                <option value="USD">USD</option>                
              </select>
              <label class="form-control-placeholder" for="currency">Select Currency<span style="color: red">*</span></label> 
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <input type="number" id="registration_fees" class="form-control {{ $errors->has('registration_fees') ? ' is-invalid' : '' }}" name="registration_fees" required >
                <label id="registration_fees" class="form-control-placeholder" for="registration_fees">Registration Fees<span style="color: red">*</span></label>
                @if ($errors->has('registration_fees'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('registration_fees') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div>
            <!-- <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" name="fees_description" required></textarea>               
                <label id="fees_description" class="form-control-placeholder" for="fees_description">Claim value <span style="color: red">*</span></label>

              </div>            
            </div>  -->
            <div class="col-md-6">
              <div class="form-group">
               <input type="number" class="form-control" name="claim_amount_from" required>              
               <label id="claim_amount_from" class="form-control-placeholder" for="claim_amount_from">Claim Amount From <span style="color: red">*</span></label>
             </div>            
           </div>
           <div class="col-md-6">
            <div class="form-group">
             <input type="number" class="form-control" name="claim_amount_to" required>              
             <label id="claim_amount_to" class="form-control-placeholder" for="claim_amount_to">Claim Amount To<span style="color: red">*</span> </label>

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

<script>
  $('#category').change(function(){
    var categoryID = $(this).val(); 
    //alert(categoryID);
    if(categoryID){
      $.ajax({
       type:"GET",
       url:"{{url('/get-dispute-list')}}?dispute_categories_id="+categoryID,
       success:function(res){                      
        if(res){
          $("#subcategory").empty();
          $("#subcategory").append('<option></option>');
          $.each(res,function(key,value){
            $("#subcategory").append('<option value="'+key+'">'+value+'</option>');
          });

        }else{
         $("#subcategory").empty();
       }
     }
   });
    }     
  });

</script>







<!-- End of create Arbitration modal -->





