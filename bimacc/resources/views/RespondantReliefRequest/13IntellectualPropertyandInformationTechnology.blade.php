

<form  name="reliefrequest_form" id="reliefrequest_form" method="POST" >
  @csrf 
   @foreach ($claimnotices as $notice)
       <input type="hidden" id="claimnoticeid"  name="claimnoticeid"  value="{{$notice->id}}" >
      @endforeach 
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
  <div class="row register-form">
    <div class="col-md-12">

       <div class="row">
        <div class="col-md-3"> 
          <div class="form-group">
           <label class="form-control-placeholder"  for="demand_to_stop_infringement_select" style="margin-left: 18px;">Demand to Stop Infringement</label>
           <input type="checkbox" class="form-control" id="demand_to_stop_infringement_select"  name="demand_to_stop_infringement_select" style="width:9%"  value="yes">
         </div>
       </div>
       <div class="col-md-3"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="demand_to_stop_infringement"  class="form-control{{ $errors->has('demand_to_stop_infringement') ? ' is-invalid' : '' }}" name="demand_to_stop_infringement" >
          <label class="form-control-placeholder" for="demand_to_stop_infringement">Value of Infringed Goods({{$claimantinformations[0]->currency}}):</label>
          @if ($errors->has('demand_to_stop_infringement'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('demand_to_stop_infringement') }}</strong>
          </span> 
          @endif
        </div>
      </div>
      <div class="col-md-3"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="rdemand_damages_for_infringement"  class="form-control{{ $errors->has('demand_damages_for_infringement') ? ' is-invalid' : '' }}" name="demand_damages_for_infringement" >
          <label class="form-control-placeholder" for="demand_damages_for_infringement">Interest %:</label>
          @if ($errors->has('demand_damages_for_infringement'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('demand_damages_for_infringement') }}</strong>
          </span> 
          @endif
        </div>
      </div>
      <div class="col-md-3"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="nature_of_property" style="margin-left: 18px;">Without Interest</label>
         <input type="checkbox" class="form-control" id="rnature_of_property"  name="nature_of_property" style="width:9%"  value="yes"  >
       </div>
     </div>
     
   </div>
   <div class="row">
     <div class="col-md-3"> 
      <div class="form-group">
       <label class="form-control-placeholder" for="demand_for_licence_fee" style="margin-left: 18px;">Demand for Licence Fee Amount:</label>
       <input type="checkbox" class="form-control" id="demand_for_licence_fee"  name="demand_for_licence_fee" style="width:9%"  value="yes"  >
     </div>
   </div>
   <div class="col-md-3"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="rendition_of_accounts" class="form-control{{ $errors->has('rendition_of_accounts') ? ' is-invalid' : '' }}" name="rendition_of_accounts"  >
      <label class="form-control-placeholder" for="rendition_of_accounts">Value of License Fee({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('rendition_of_accounts'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('rendition_of_accounts') }}</strong>
      </span>
      @endif
    </div>
  </div>
  
  
  <div class="col-md-3"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="rdemand_for_licence_fee_interest" class="form-control{{ $errors->has('demand_for_licence_fee_interest') ? ' is-invalid' : '' }}" name="demand_for_licence_fee_interest"  >
      <label class="form-control-placeholder" for="demand_for_licence_fee_interest">Interest %:</label>
      @if ($errors->has('demand_for_licence_fee_interest'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('demand_for_licence_fee_interest') }}</strong>
      </span>
      @endif
    </div>
  </div>

  <div class="col-md-3"> 
    <div class="form-group">
     <label class="form-control-placeholder" for="demand_for_licence_fee_withoutinterest" style="margin-left: 18px;">Without Interest</label>
     <input type="checkbox" class="form-control" id="rdemand_for_licence_fee_withoutinterest"  name="demand_for_licence_fee_withoutinterest" style="width:9%"  value="yes"  >
   </div>
 </div>

</div>
<div class="row">
  <div class="col-md-3"> 
    <div class="form-group">
     <label class="form-control-placeholder" for="cancellation_license" style="margin-left: 18px;margin-top: -8px;">Demand for Cancellation of License/ Assignment/ Agreement</label>
     <input type="checkbox" class="form-control" id="cancellation_license"  name="cancellation_license" style="width:9%"  value="yes">
   </div>
 </div>
 <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="cancellation_license_value"  class="form-control{{ $errors->has('cancellation_license_value') ? ' is-invalid' : '' }}" name="cancellation_license_value" >
    <label class="form-control-placeholder" for="cancellation_license_value">Value of License/ Assignment Agreement({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('cancellation_license_value'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('cancellation_license_value') }}</strong>
    </span> 
    @endif
  </div>
</div>
<div class="col-md-2"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="rvalue_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest">
   <label class="form-control-placeholder" for="value_claims_interest">Interest %:</label>
   @if ($errors->has('value_claims_interest'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('value_claims_interest') }}</strong>
  </span> 
  @endif

</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="value_claims_withoutinterest" style="margin-left: 18px;">Without Interest</label>
   <input type="checkbox" class="form-control" id="rvalue_claims_withoutinterest"  name="value_claims_withoutinterest" style="width:9%" value="yes">
 </div>

</div>
</div>
<div class="row">
 <div class="col-md-3"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="damages_for_breach_of_contract" style="margin-left: 18px;">Damages for Breach of Contract</label>
   <input type="checkbox" class="form-control" id="damages_for_breach_of_contract"  name="damages_for_breach_of_contract" style="width:9%" value="yes">
 </div>

</div>

<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims"  class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims" >
   <label class="form-control-placeholder" for="value_claims">Amount of Damages Claimed({{$claimantinformations[0]->currency}}) :</label>
   @if ($errors->has('value_claims'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('value_claims') }}</strong>
  </span> 
  @endif

</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="rdamages_for_breach_of_contract_interest" class="form-control{{ $errors->has('damages_for_breach_of_contract_interest') ? ' is-invalid' : '' }}" name="damages_for_breach_of_contract_interest"  >
    <label class="form-control-placeholder" for="damages_for_breach_of_contract_interest">Interest %:</label>
    @if ($errors->has('damages_for_breach_of_contract_interest'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('damages_for_breach_of_contract_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-3"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="damages_for_breach_of_contract_withoutinterest" style="margin-left: 18px;">Without Interest</label>
   <input type="checkbox" class="form-control" id="rdamages_for_breach_of_contract_withoutinterest"  name="damages_for_breach_of_contract_withoutinterest" style="width:9%"  value="yes">
 </div>
</div>
</div>
<div class="row">
 <div class="col-md-3"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="demand_to_surrender_infringed_materials" style="margin-left: 18px;margin-top: -8px;">Demand to Surrender Infringing Material</label>
   <input type="checkbox" class="form-control" id="demand_to_surrender_infringed_materials"  name="demand_to_surrender_infringed_materials" style="width:9%"  value="yes">
 </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="value_infringing" class="form-control{{ $errors->has('value_infringing') ? ' is-invalid' : '' }}" name="value_infringing" >
    <label class="form-control-placeholder" for="value_infringing">Value of Infringing Materials({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('value_infringing'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('value_infringing') }}</strong>
    </span>
    @endif
  </div>
</div>


<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="rinterest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" >
    <label class="form-control-placeholder" for="interest_amount">Interest %:</label>
    @if ($errors->has('interest_amount'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('interest_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="value_infringing_withoutinterest" style="margin-left: 18px;">Without Interest</label>
   <input type="checkbox" class="form-control" id="rvalue_infringing_withoutinterest"  name="value_infringing_withoutinterest" style="width:9%"  value="yes">
 </div>
</div>

</div> 



<div class="row">
  
 
 <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
    @if ($claimantinformations[0]->currency =='INR') 
  <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount Including Interest (INR)<span style="color: red">*</span>:</label>
    @else
  <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount Including Interest (USD) <span style="color: red">*</span>:</label>
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

$('#rnature_of_property').on('click', function () {

  if ($(this).prop('checked')) {

    document.getElementById("rdemand_damages_for_infringement").disabled = true;
     //alert("jkchj");
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rdemand_damages_for_infringement').val("");

              } else {
               document.getElementById("rdemand_damages_for_infringement").disabled = false;
               $('#rdemand_damages_for_infringement').val("");
             }
           });
$('#rdemand_for_licence_fee_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
    document.getElementById("rdemand_for_licence_fee_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rdemand_for_licence_fee_interest').val("");

              } else {
               document.getElementById("rdemand_for_licence_fee_interest").disabled = false;
               $('#rdemand_for_licence_fee_interest').val("");
             }
           });
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
$('#rdamages_for_breach_of_contract_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
    document.getElementById("rdamages_for_breach_of_contract_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rdamages_for_breach_of_contract_interest').val("");

              } else {
               document.getElementById("rdamages_for_breach_of_contract_interest").disabled = false;
               $('#rdamages_for_breach_of_contract_interest').val("");
             }
           });
$('#rvalue_infringing_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
    document.getElementById("rinterest_amount").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rinterest_amount').val("");

              } else {
               document.getElementById("rinterest_amount").disabled = false;
               $('#rinterest_amount').val("");
             }
           });
// $('#value_infringing_withoutinterest').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("interest_amount").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#interest_amount').val("");

//             } else {
//                document.getElementById("interest_amount").disabled = false;
//                 $('#interest_amount').val("");
//             }
// });

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