@if (count($errors) > 0)
<script>
  $( document ).ready(function() {
    $('#createArbitratorAllocationFeesModal').modal('show');
  });
</script>
@endif
<!-- create Arbitration modal -->
<div class="modal hide fade" id="createArbitratorAllocationFeesModal" tabindex="-1" role="dialog" aria-labelledby="createArbitratorAllocationFeeslabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
    <div class="modal-content">  

      <div class="modal-header">

        <h5 class="modal-title" id="createArbitratorAllocationFeeslabel">Create Administration and Arbitration Fee</h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
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

      <form id="createForm" action="{{ route('arbitratorallocationfees.store') }}" method="POST" >
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
            <input type="number" id="claim_amount_form" class="form-control {{ $errors->has('claim_amount_form') ? ' is-invalid' : '' }}" name="claim_amount_form" required  >
            <label id="claim_amount_form" class="form-control-placeholder" for="claim_amount_form">Claim Amount From<span style="color: red">*</span></label>
            @if ($errors->has('claim_amount_form'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_amount_form') }}</strong>
            </span>
            @endif                                 
          </div>            
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <input type="number" id="claim_amount_to" class="form-control {{ $errors->has('claim_amount_to') ? ' is-invalid' : '' }}" name="claim_amount_to" required>
            <label id="claim_amount_to" class="form-control-placeholder" for="claim_amount_to">Claim Amount To<span style="color: red">*</span></label>
            @if ($errors->has('claim_amount_to'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_amount_to') }}</strong>
            </span>
            @endif                                 
          </div>            
        </div>

        
        <div class="col-md-6">
          <div class="form-group">
            <input type="number" id="adminstration_fees" class="form-control {{ $errors->has('') ? ' is-invalid' : '' }}" name="adminstration_fees" required >
            <label id="adminstration_fees" class="form-control-placeholder" for="adminstration_fees">Adminstrative Fees<span style="color: red">*</span></label>
            @if ($errors->has('adminstration_fees'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('adminstration_fees') }}</strong>
            </span>
            @endif                                 
          </div>            
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="number" id="arbitrator_fees" class="form-control {{ $errors->has('arbitrator_fees') ? ' is-invalid' : '' }}" name="arbitrator_fees" required >
            <label id="arbitrator_fees" class="form-control-placeholder" for="arbitrator_fees">Arbitrator Fees<span style="color: red">*</span></label>
            @if ($errors->has('arbitrator_fees'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('arbitrator_fees') }}</strong>
            </span>
            @endif                                 
          </div>            
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <input type="number" id="arbitartion_percentage" class="form-control {{ $errors->has('') ? ' is-invalid' : '' }}" name="arbitartion_percentage" required >
            <label id="arbitartion_percentage" class="form-control-placeholder" for="arbitartion_percentage">Arbitrator Fees Percentage<span style="color: red">*</span></label>
            @if ($errors->has('arbitartion_percentage'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('arbitartion_percentage') }}</strong>
            </span>
            @endif                                 
          </div>            
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <textarea class="form-control" name="fees_description" required></textarea>               
            <label id="fees_description" class="form-control-placeholder" for="fees_description">Fees Description<span style="color: red">*</span></label>                                               
          </div>            
        </div> 



      </div>            


    </div>
    <div class="modal-footer">
      <div class="mx-auto">

       <!--  <button type="submit" id="register" class="btn btn-success btn-space"   onclick="this.disabled=true;this.value='Submitting...'; return validate(); this.form.submit();">Save</button> -->
       <button type="submit" id="register" class="btn btn-success btn-space">Save</button>
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
  $('#disputecategory').change(function(){
    var categoryID = $(this).val(); 
    //alert(categoryID);
    if(categoryID){
      $.ajax({
       type:"GET",
       url:"{{url('/get-dispute-list')}}?dispute_categories_id="+categoryID,
       success:function(res){                      
        if(res){
          $("#disputesubcategory").empty();
          $("#disputesubcategory").append('<option></option>');
          $.each(res,function(key,value){
            $("#disputesubcategory").append('<option value="'+key+'">'+value+'</option>');
          });

        }else{
         $("#disputesubcategory").empty();
       }
     }
   });
    }     
  });


  function validate(){
   var max = parseInt(document.getElementById('claim_amount_form').value);
   var min = parseInt(document.getElementById('claim_amount_to').value);
   if(min < max){
     alert('Maxvalue is greter than Minvalue');
     return false;
   }else{
    return true;   
  }

}

</script>








<!-- End of create Arbitration modal -->





