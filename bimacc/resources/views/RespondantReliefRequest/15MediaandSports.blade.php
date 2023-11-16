

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
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Nature of Relief</b></u></label>
          </div>
        </div>
      </div>
       <div class="row">
        <div class="col-md-4"> 
          <div class="form-group">
           <input type="text" onkeypress="return isNumberKey(event)"  id="money_claim_amount"  class="form-control{{ $errors->has('money_claim_amount') ? ' is-invalid' : '' }}" name="money_claim_amount" >
           <label class="form-control-placeholder" for="money_claim_amount">Money Claim Amount({{$claimantinformations[0]->currency}}):</label>
           @if ($errors->has('money_claim_amount'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('money_claim_amount') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="rmoney_claim_amount_interest" class="form-control{{ $errors->has('money_claim_amount_interest') ? ' is-invalid' : '' }}" name="money_claim_amount_interest"  >
          <label class="form-control-placeholder" for="money_claim_amount_interest">With Interest(%):</label>
          @if ($errors->has('money_claim_amount_interest'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('money_claim_amount_interest') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="col-md-4"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="money_claim_amount_withoutinterest" style="margin-left: 18px;">Without Interest</label>
         <input type="checkbox" class="form-control" id="rmoney_claim_amount_withoutinterest"  name="money_claim_amount_withoutinterest" style="width:7%" value="yes" >
       </div>
     </div>

   </div>

   <div class="row">
       <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="rendition_of_accounts_contract_value"  class="form-control{{ $errors->has('rendition_of_accounts_contract_value') ? ' is-invalid' : '' }}" name="rendition_of_accounts_contract_value" >
        <label class="form-control-placeholder" for="rendition_of_accounts_contract_value">Rendition of Accounts Contract Value({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('rendition_of_accounts_contract_value'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('rendition_of_accounts_contract_value') }}</strong>
        </span> 
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="claim_restrain" style="margin-left: 18px;">Claim to Restrain from Promotion of Competing Product</label>
         <input type="checkbox" class="form-control" id="claim_restrain"  name="claim_restrain" style="width:7%" value="yes" >
       </div>
     </div>

    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="contract_value"  class="form-control{{ $errors->has('contract_value') ? ' is-invalid' : '' }}" name="contract_value" >
        <label class="form-control-placeholder" for="contract_value">Contract Value({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('contract_value'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('contract_value') }}</strong>
        </span> 
        @endif
      </div>
    </div>
   </div>
    <div class="row">
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_damages"  class="form-control{{ $errors->has('claim_for_damages') ? ' is-invalid' : '' }}" name="claim_for_damages" >
        <label class="form-control-placeholder" for="claim_for_damages">Claim Amount for Damages({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('claim_for_damages'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_damages') }}</strong>
        </span> 
        @endif
      </div>
    </div>  
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="rclaim_for_damages_interest"  class="form-control{{ $errors->has('claim_for_damages_interest') ? ' is-invalid' : '' }}" name="claim_for_damages_interest" >
        <label class="form-control-placeholder" for="claim_for_damages_interest">With Interest (%):</label>
        @if ($errors->has('claim_for_damages_interest'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_damages_interest') }}</strong>
        </span> 
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="claim_for_withoutinterest" style="margin-left: 18px;">Without Interest</label>
         <input type="checkbox" class="form-control" id="rclaim_for_withoutinterest"  name="claim_for_withoutinterest" style="width:7%" value="yes" >
       </div>
     </div>  
     </div> 
      <div class="row">
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_royalty"  class="form-control{{ $errors->has('claim_for_royalty') ? ' is-invalid' : '' }}" name="claim_for_royalty" >
        <label class="form-control-placeholder" for="claim_for_royalty">Claim Amount for Royalty({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('claim_for_royalty'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_royalty') }}</strong>
        </span> 
        @endif
      </div>
    </div>  
    <div class="col-md-4"> 
      
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="rclaim_for_royalty_interest"  class="form-control{{ $errors->has('claim_for_royalty_interest') ? ' is-invalid' : '' }}" name="claim_for_royalty_interest" >
        <label class="form-control-placeholder" for="claim_for_royalty_interest">With Interest (%):</label>
        @if ($errors->has('claim_for_royalty_interest'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_royalty_interest') }}</strong>
        </span> 
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="claim_for_royalty_withoutinterest" style="margin-left: 18px;">Without Interest</label>
         <input type="checkbox" class="form-control" id="rclaim_for_royalty_withoutinterest"  name="claim_for_royalty_withoutinterest" style="width:7%" value="yes" >
       </div>
     </div>  
     </div> 
     <div class="row">
      
      <div class="col-md-6"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="cancellation_of_agreement" style="margin-left: 20px;">Cancellation of Agreement</label>
         <input type="checkbox" class="form-control" id="cancellation_of_agreement"  name="cancellation_of_agreement" style="width:5%" value="yes" >
       </div>
     </div> 
      <div class="col-md-6"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="cancellation_of_agreement_value"  class="form-control{{ $errors->has('cancellation_of_agreement_value') ? ' is-invalid' : '' }}" name="cancellation_of_agreement_value" >
        <label class="form-control-placeholder" for="cancellation_of_agreement_value">Contract Value({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('cancellation_of_agreement_value'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('cancellation_of_agreement_value') }}</strong>
        </span> 
        @endif
      </div>
    </div>
  </div>
   <div class="row">
        <div class="col-md-6"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_specific_performance"  class="form-control{{ $errors->has('claim_for_specific_performance') ? ' is-invalid' : '' }}" name="claim_for_specific_performance" >
        <label class="form-control-placeholder" for="claim_for_specific_performance">Claim for Specific Performance({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('claim_for_specific_performance'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_specific_performance') }}</strong>
        </span> 
        @endif
      </div>
    </div> 
  
  <div class="col-md-6"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="contract_value"  class="form-control{{ $errors->has('contract_value') ? ' is-invalid' : '' }}" name="contract_value" >
        <label class="form-control-placeholder" for="contract_value">Contract Value({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('contract_value'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('contract_value') }}</strong>
        </span> 
        @endif
      </div>
    </div> 
  </div> 
  <div class="row">
    <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims"  class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims" >
       <label class="form-control-placeholder" for="value_claims">Total Value Claimed({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('value_claims'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('value_claims') }}</strong>
      </span> 
      @endif

    </div>
  </div>
 <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="rvalue_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" >
       <label class="form-control-placeholder" for="value_claims_interest">With Interest (%):</label>
       @if ($errors->has('value_claims_interest'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('value_claims_interest') }}</strong>
      </span> 
      @endif

    </div>
  </div>
    <div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="value_claims_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="rvalue_claims_withoutinterest"  name="value_claims_withoutinterest" style="width:7%" value="yes"  >
  </div>

</div>
   </div>
   <div class="row">
    <div class="col-md-6"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount">
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
       <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount including Interest (INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount including Interest (USD)<span style="color: red">*</span>:</label>
           @endif
    @if ($errors->has('damage_with_interest'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('damage_with_interest') }}</strong>
    </span>
    @endif
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
$('#rmoney_claim_amount_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rmoney_claim_amount_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rmoney_claim_amount_interest').val("");

            } else {
               document.getElementById("rmoney_claim_amount_interest").disabled = false;
                $('#rmoney_claim_amount_interest').val("");
            }
});
// $('#claim_restrain').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("contract_value").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#contract_value').val("");

//             } else {
//                document.getElementById("contract_value").disabled = false;
//                 $('#contract_value').val("");
//             }
// });
$('#rclaim_for_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rclaim_for_damages_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rclaim_for_damages_interest').val("");

            } else {
               document.getElementById("rclaim_for_damages_interest").disabled = false;
                $('#rclaim_for_damages_interest').val("");
            }
});
$('#rclaim_for_royalty_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rclaim_for_royalty_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rclaim_for_royalty_interest').val("");

            } else {
               document.getElementById("rclaim_for_royalty_interest").disabled = false;
                $('#rclaim_for_royalty_interest').val("");
            }
});
// $('#cancellation_of_agreement').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("cancellation_of_agreement_value").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#cancellation_of_agreement_value').val("");

//             } else {
//                document.getElementById("cancellation_of_agreement_value").disabled = false;
//                 $('#cancellation_of_agreement_value').val("");
//             }
// });
$('#rvalue_claims_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rvalue_claims_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rvalue_claims_interest').val("");

            } else {
               document.getElementById("rvalue_claims_interest").disabled = false;
                $('#rvalue_claims_interest').val("");
            }
});


</script>
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