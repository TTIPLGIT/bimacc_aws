
@if($ReliefRequests ==null)
<form  name="reliefrequest_form" id="reliefrequest_form" method="POST" >
  @csrf  
  <div class="row register-form">
    <div class="col-md-12">
      <div class="row"> 
       <div class="col-md-12">
         <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
          <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
        </div>
        <!-- <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Firm’s Estimated Value </b></u></label>
        </div> -->
      </div>
    </div>

 
      
   <div class="row">
  <div class="col-md-6">
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)" id="damage_with_interest" class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest"  >
   @if ($claimantinformations[0]->currency =='INR') 
   <label class="form-control-placeholder" for="claimamount">Estimated Value of the Dispute/ Value of the Firm(INR)<span style="color: red">*</span>:</label>
   @else($claimantinformations[0]->currency =='USD') 
   <label class="form-control-placeholder" for="claimamount">Estimated Value of the Dispute/ Value of the Firm (USD): <span style="color: red">*</span></label>

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
</div>

</form>
@else

@foreach($ReliefRequests as $ReliefRequest)
<form  name="reliefrequest_update_form" id="reliefrequest_update_form" method="POST" >
  <input type="text" name="reliefrequestid" value="{{$ReliefRequest->id}}" style="display: none">
  @csrf  
  <div class="row register-form">
    <div class="col-md-12">
      <div class="row"> 
       <div class="col-md-12">
        <!--  <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
          <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
        </div> -->
        <!-- <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Firm’s Estimated Value:</b></u></label>
        </div> -->
      </div>
    </div>

    <div class="row">
     
<div class="col-md-6">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)" id="damage_with_interest" class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" placeholder=" " value="{{ number_format((float)$ReliefRequest->damage_with_interest, 2, '.', '') }}">
   @if ($claimantinformations[0]->currency =='INR') 
   <label class="form-control-placeholder" for="damage_with_interest">Estimated Value of the Dispute/ Value of the Firm(INR)<span style="color: red">*</span>:</label>
   @else
   <label class="form-control-placeholder" for="valuation_of_firm_and_or_goodwill">Estimated Value of the Dispute/ Value of the Firm (USD)<span style="color: red">*</span>:</label>
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
    <button type="submit" class="btn btn-success btn-space"  >Update</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>  
</form>
@endforeach
@endif
<script type="text/javascript">
  $('#return_of_assets_value_withoutinterest').on('click', function () {
    if ($(this).prop('checked')) {
      document.getElementById("return_of_assets_value_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#return_of_assets_value_interest').val("");

              } else {
               document.getElementById("return_of_assets_value_interest").disabled = false;
               $('#return_of_assets_value_interest').val("");
             }
           });
  $('#claim_for_capital_share_withoutinterest').on('click', function () {
    if ($(this).prop('checked')) {
      document.getElementById("claim_for_capital_share_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#claim_for_capital_share_interest').val("");

              } else {
               document.getElementById("claim_for_capital_share_interest").disabled = false;
               $('#claim_for_capital_share_interest').val("");
             }
           });
  $('#claim_for_share_of_profits_withoutinterest').on('click', function () {
    if ($(this).prop('checked')) {
      document.getElementById("claim_for_share_of_profits_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#claim_for_share_of_profits_interest').val("");

              } else {
               document.getElementById("claim_for_share_of_profits_interest").disabled = false;
               $('#claim_for_share_of_profits_interest').val("");
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