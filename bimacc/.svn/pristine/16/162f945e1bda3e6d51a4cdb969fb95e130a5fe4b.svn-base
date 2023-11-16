 

<form  name="reliefrequest_form" id="reliefrequest_form" method="POST" >
  @csrf  
   @foreach ($claimnotices as $notice)
       <input type="hidden" id="claimnoticeid"  name="claimnoticeid"  value="{{$notice->id}}" >
      @endforeach
  <div class="row register-form">
    <div class="col-md-12">
      <div class="row"> 
       <div class="col-md-12">
         <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
          <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
        </div>
        <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Total Value of Contract</b></u></label>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-md-6">  
        <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"id="escalation_of_costs" class="form-control{{ $errors->has('escalation_of_costs') ? ' is-invalid' : '' }}" name="escalation_of_costs" >
         <label class="form-control-placeholder" for="escalation_of_costs">Escalation of Costs({{$claimantinformations[0]->currency}}):</label>
         @if ($errors->has('escalation_of_costs'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('escalation_of_costs') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-6">  
    <div class="form-group">
     <input type="text"    id="claim_for_damages" class="form-control{{ $errors->has('claim_for_damages') ? ' is-invalid' : '' }}" name="claim_for_damages" >
     <label class="form-control-placeholder" for="claim_for_damages">Damages:</label>
     @if ($errors->has('claim_for_damages'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_for_damages') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-1"><input class="form-control" value="1"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
    <div class="col-md-5">  
      <div class="form-group" >
       <input type="text" onkeypress="return isNumberKey(event)"  id="contract_price" class="form-control{{ $errors->has('contract_price') ? ' is-invalid' : '' }}" name="contract_price[]" >
       <label class="form-control-placeholder" for="contract_price">Contract Price({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('contract_price'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('contract_price') }}</strong>
      </span>
      @endif
      
    </div>
  </div>
  <div class="col-md-4" >  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"id="claim_for_refund_lines" class="form-control{{ $errors->has('claim_for_refund_lines') ? ' is-invalid' : '' }}" name="claim_for_refund_lines[]" >
     <label class="form-control-placeholder" for="claim_for_refund_lines">Claim for Refund({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('claim_for_refund_lines'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_for_refund_lines') }}</strong>
    </span>
    @endif

  </div>

</div>

  <div class="col-md-1">
<div class="buttons" id="commercial_btn" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div>
</div>
   <div class="col-md-1">
<div  id="commercial_del" style="display:none;"  class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>


</div>
<div id="commercial1"></div>



  


<div class="row">
  <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
     <label><u><b>Specific Performance</b></u></label>
   </div>
 </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <input type="text" id="specific_performance_of_contract" class="form-control{{ $errors->has('specific_performance_of_contract') ? ' is-invalid' : '' }}" name="specific_performance_of_contract" >
      <label class="form-control-placeholder" for="specific_performance_of_contract">Specific Performance of Contract:</label>
      @if ($errors->has('specific_performance_of_contract'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('specific_performance_of_contract') }}</strong>
      </span>
      @endif
    </div>  
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="specific_estimated_value_of_contract" class="form-control{{ $errors->has('specific_estimated_value_of_contract') ? ' is-invalid' : '' }}" name="specific_estimated_value_of_contract" >
      <label class="form-control-placeholder" for="specific_estimated_value_of_contract">Estimated Value of Material({{$claimantinformations[0]->currency}}): </label>
      @if ($errors->has('specific_estimated_value_of_contract'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('specific_estimated_value_of_contract') }}</strong>
      </span>
      @endif
    </div>
    
  </div>

</div>

<div class="row">
  <div class="col-md-6"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
     <label><u><b>To Return Materials</b></u></label>
   </div>

 </div>
 <div class="col-md-6"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
     <label><u><b>To Cancel/ Invoke Performance Guarantees</b></u></label>
   </div>
 </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="tocancel_estimated_value_of_contract" class="form-control{{ $errors->has('tocancel_estimated_value_of_contract') ? ' is-invalid' : '' }}" name="tocancel_estimated_value_of_contract" >
      <label class="form-control-placeholder" for="tocancel_estimated_value_of_contract">Estimated Value of Material({{$claimantinformations[0]->currency}}): </label>
      @if ($errors->has('tocancel_estimated_value_of_contract'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('tocancel_estimated_value_of_contract') }}</strong>
      </span>
      @endif
    </div>
    
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="amount_guaranteed" class="form-control{{ $errors->has('amount_guaranteed') ? ' is-invalid' : '' }}" name="amount_guaranteed" >
      <label class="form-control-placeholder" for="amount_guaranteed">Amount Guaranteed({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('amount_guaranteed'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('amount_guaranteed') }}</strong>
      </span>
      @endif
    </div>
    
  </div>

</div>
<div class="row">
  <div class="col-md-6"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount"  class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" >
      <label class="form-control-placeholder" for="interest_amount">Interest Amount({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('interest_amount'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('interest_amount') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-6"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
      @if ($claimantinformations[0]->currency =='INR') 
      <label class="form-control-placeholder" for="damage_with_interest">Total Claim (INR)<span style="color: red">*</span>:</label>
      @else
      <label class="form-control-placeholder" for="damage_with_interest">Total Claim (USD) <span style="color: red">*</span>:</label>
      @endif
      @if ($errors->has('damage_with_interest'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('damage_with_interest') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" id="claim_for_contract_price" class="form-control{{ $errors->has('claim_for_contract_price') ? ' is-invalid' : '' }}" name="claim_for_contract_price" >
     <label class="form-control-placeholder" for="claim_for_contract_price">Damages:</label>
     @if ($errors->has('claim_for_contract_price'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_for_contract_price') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="rclaim_for_contract_price_interest" class="form-control{{ $errors->has('claim_for_contract_price_interest') ? ' is-invalid' : '' }}" name="claim_for_contract_price_interest" >
    <label class="form-control-placeholder" for="claim_for_contract_price_interest">Interest (%): </label>
    @if ($errors->has('claim_for_contract_price_interest'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_for_contract_price_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="refund_withoutinterest" style="margin-left: 18px;">Without Interest </label>
   <input type="checkbox" class="form-control" id="rrefund_withoutinterest"  name="refund_withoutinterest" style="width:7%" value="yes">
 </div>
</div>

</div>


</div>
</div>
<div class="modal-footer">
  <div class="mx-auto">
    <button type="submit" id="reliefrequestsave" class="btn btn-success btn-space"  >Save</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>   
</form>

<script type="text/javascript">
  $('#refund_withoutinterest').on('click', function () {
    if ($(this).prop('checked')) {
      document.getElementById("rclaim_for_contract_price_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rclaim_for_contract_price_interest').val("");

              } else {
               document.getElementById("rclaim_for_contract_price_interest").disabled = false;
               $('#rclaim_for_contract_price_interest').val("");
             }
           });
// $('#refund_withoutinterest').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("refund_withinterest").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#refund_withinterest').val("");

//             } else {
//                document.getElementById("refund_withinterest").disabled = false;
//                 $('#refund_withinterest').val("");
//             }
// });

</script>
<!-- <script>
  $(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper       = $("#contract_field"); //Fields wrapper
  var add_button      = $("#btn1"); //Add button ID
  
  alert(max_fields);
  var x = 0; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
     //text box increment
      $(wrapper).append('<div><input class="form-control" placeholder="contract Price" type="text" name="contract_price"/><a href="#" class="remove_field">Remove</a> </div><div><input class="form-control" type="text" placeholder="Claim for Refund Lines "name="claim_for_refund_lines"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
     // $(wrapper).append('');
      return false;
    }

  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});
  </script> -->
  <SCRIPT language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </SCRIPT>