

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
              <label><b>Please fill in the applicable details pertaining to the dispute</b></label>
            </div>            
              
          </div>
        </div>
        <div class="row"> 
         <div class="col-md-12"> 
           <div class="form-group text-center" style="margin-bottom: 1.4em">
            <label><u><b>Nature of Relief</b></u></label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"> 
          <div class="form-group">
           <input type="text" id="claim_for_delivery_of_cargo" class="form-control{{ $errors->has('claim_for_delivery_of_cargo') ? ' is-invalid' : '' }}" name="claim_for_delivery_of_cargo" >
           <label class="form-control-placeholder" for="claim_for_delivery_of_cargo">Reason for Cargo Delivery Dispute: </label>
           @if ($errors->has('claim_for_delivery_of_cargo'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claim_for_delivery_of_cargo') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">

          <input type="text" id="cargo_nature" class="form-control{{ $errors->has('cargo_nature') ? ' is-invalid' : '' }}" name="cargo_nature" >
          <label class="form-control-placeholder" for="cargo_nature">Cargo Nature:</label>
          @if ($errors->has('cargo_nature'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cargo_nature') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
       <div class="form-group">
         <input type="text" id="nature_and_details_of_cargo" class="form-control{{ $errors->has('nature_and_details_of_cargo') ? ' is-invalid' : '' }}" name="nature_and_details_of_cargo" >
         <label class="form-control-placeholder" for="nature_and_details_of_cargo">Quantity and Specification:</label>
         @if ($errors->has('nature_and_details_of_cargo'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('nature_and_details_of_cargo') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)" id="claim_for_payment_of_freight_amount" class="form-control{{ $errors->has('claim_for_payment_of_freight_amount') ? ' is-invalid' : '' }}" name="claim_for_payment_of_freight_amount" >
       <label class="form-control-placeholder" for="claim_for_payment_of_freight_amount">Value of Claim for Payment of Freight Amount({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_payment_of_freight_amount'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_payment_of_freight_amount') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <!-- <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" id="freight_amount_interest" class="form-control{{ $errors->has('freight_amount_interest') ? ' is-invalid' : '' }}" name="freight_amount_interest" >
     <label class="form-control-placeholder" for="freight_amount_interest">Interest:</label>
     @if ($errors->has('freight_amount_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('freight_amount_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="frightamountwithpoutinterest" style="margin-left: 10px;">Without Interest: </label>
    <input type="checkbox" id="frightamountwithpoutinterest" class="form-control" style="width:7%" name="frightamountwithpoutinterest" onclick="document.getElementById('freight_amount_interest').disabled=this.checked;" >
    
  </div>
</div> -->
</div>

<div class="row">
 <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
    <label><u><b>Claim for Payment of Damages</b></u></label>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" id="damage_amount" class="form-control{{ $errors->has('damage_amount') ? ' is-invalid' : '' }}" name="damage_amount" >
     <label class="form-control-placeholder" for="damage_amount">Damages:</label>
     @if ($errors->has('damage_amount'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('damage_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)" id="rdamage_amount_interest" class="form-control{{ $errors->has('damage_amount_interest') ? ' is-invalid' : '' }}" name="damage_amount_interest" >
    <label class="form-control-placeholder" for="damage_amount_interest">Interest (%): </label>
    @if ($errors->has('damage_amount_interest'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('damage_amount_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="damageamountinterestwithinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="rdamageamountinterestwithinterest"  name="damageamountinterestwithinterest" style="width:7%" value="yes" onclick="document.getElementById('damage_amount_interest').disabled=this.checked;" >
  </div>
</div>

</div>
<div class="row">
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)" id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" >
    <label class="form-control-placeholder" for="interest_amount">Interest Amount({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('interest_amount'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('interest_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)" id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
   @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Total Damages Including Interest (INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Damages Including Interest (USD) <span style="color: red">*</span>:</label>
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
 <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
     <label><u><b>Claim for specific performance</b></u></label>
   </div>
 </div>
</div>
<div class="row">
  <div class="col-md-6"> 
    <div class="form-group">
     <textarea id="remarks" class="form-control{{ $errors->has('remarks') ? ' is-invalid' : '' }}" name="remarks"></textarea>
     <label class="form-control-placeholder" for="remarks">Remarks: </label>
     @if ($errors->has('remarks'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('remarks') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)" id="estimated_value_of_contract" class="form-control{{ $errors->has('estimated_value_of_contract') ? ' is-invalid' : '' }}" name="estimated_value_of_contract" >
    <label class="form-control-placeholder" for="estimated_value_of_contract">Estimated Value of Contract({{$claimantinformations[0]->currency}}): </label>
    @if ($errors->has('estimated_value_of_contract'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('estimated_value_of_contract') }}</strong>
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
$('#rdamageamountinterestwithinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rdamage_amount_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rdamage_amount_interest').val("");

            } else {
               document.getElementById("rdamage_amount_interest").disabled = false;
                $('#rdamage_amount_interest').val("");
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