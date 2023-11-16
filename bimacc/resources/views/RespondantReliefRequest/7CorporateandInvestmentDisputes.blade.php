

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
        <!-- <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Market Value of Shares/ Stock</b></u></label>
        </div> -->
      </div>
    </div>
    <div class="corporate_border">
    <div class="row"> 
     <div class="col-md-4">

       <div class="form-group" style="margin-bottom: 1.4em">
        <label><u><b style="font-size: 16px;">Nature of Instruments</b></u></label>
      </div>
    </div>

  </div> 
  <div class="row"  id="corporate_checkbox">
    <div class="col-md-4" > 
      <div class="form-group">
       <label class="form-control-placeholder" for="claim_for_refund_of_fare_or_freight" style="margin-left: 28px;">Equity Shares</label>
       <input type="checkbox" class="form-control" id="claim_for_refund_of_fare_or_freight"  name="claim_for_refund_of_fare_or_freight" style="width:7%" value="yes"  >
     </div>

   </div>
   <div class="col-md-4">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)" id="claim_reinstatement" class="form-control{{ $errors->has('claim_reinstatement') ? ' is-invalid' : '' }}" name="claim_reinstatement">
     <label class="form-control-placeholder" for="claim_reinstatement">No. of Shares/ Debentures/ etc.({{$claimantinformations[0]->currency}}):
     </label>
     @if ($errors->has('claim_reinstatement'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_reinstatement') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="claimforontractprice" class="form-control{{ $errors->has('claimforontractprice') ? ' is-invalid' : '' }}" name="claimforontractprice" >
   <label class="form-control-placeholder" for="claimforontractprice">Market Value of Per Share/ Debentures/etc.({{$claimantinformations[0]->currency}}):

   </label>
   @if ($errors->has('claimforontractprice'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claimforontractprice') }}</strong>
  </span>
  @endif
</div>
</div>

</div>
<div class="row"  id="corporate_checkbox">
  <div class="col-md-4"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_refund_of_fare_or_freight_interest" style="margin-left: 28px;">Preference Shares</label>
      <input type="checkbox" class="form-control" id="claim_for_refund_of_fare_or_freight_interest"  name="claim_for_refund_of_fare_or_freight_interest" style="width:7%" value="yes"  >
    </div>

  </div>
  

</div>
<div class="row" id="corporate_checkbox">
  <div class="col-md-4"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_payment_of_damages" style="margin-left: 28px;">Convertible Preference Shares
      </label>
      <input type="checkbox" class="form-control" id="claim_for_payment_of_damages"  name="claim_for_payment_of_damages" style="width:7%" value="yes"  >
    </div>

  </div>
  

</div>
<div class="row" id="corporate_checkbox">
  <div class="col-md-4"  > 
    <div class="form-group">
      <label class="form-control-placeholder" for="subrogation_value" style="margin-left: 28px;">Subrogation Values
      </label>
      <input type="checkbox" class="form-control" id="subrogation_value"  name="subrogation_value" style="width:7%" value="yes"  >
    </div>

  </div>
  <div class="col-md-4">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="demand_to_stop_infringement_select" class="form-control{{ $errors->has('demand_to_stop_infringement_select') ? ' is-invalid' : '' }}" name="demand_to_stop_infringement_select" >
     <label class="form-control-placeholder" for="demand_to_stop_infringement_select">Face Value per Shares/ Debenture etc.({{$claimantinformations[0]->currency}}):
     </label>
     @if ($errors->has('demand_to_stop_infringement_select'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('demand_to_stop_infringement_select') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="demand_to_stop_infringement" class="form-control{{ $errors->has('demand_to_stop_infringement') ? ' is-invalid' : '' }}" name="demand_to_stop_infringement" >
   <label class="form-control-placeholder" for="demand_to_stop_infringement">Total Market Value of Investment({{$claimantinformations[0]->currency}}):

   </label>
   @if ($errors->has('demand_to_stop_infringement'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('demand_to_stop_infringement') }}</strong>
  </span>
  @endif
</div>
</div>


</div>
<div class="row" id="corporate_checkbox">
  <div class="col-md-4"  > 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_demurrages" style="margin-left: 28px;">Convertible Debentures 

      </label>
      <input type="checkbox" class="form-control" id="claim_for_demurrages"  name="claim_for_demurrages" style="width:7%" value="yes"  >
    </div>

  </div>

  


</div>
<div class="row">
  <div class="col-md-4" id="corporate_checkbox"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="damage_amount" style="margin-left: 28px;">Stock Options

      </label>
      <input type="checkbox" class="form-control" id="damage_amount"  name="damage_amount" style="width:7%" value="yes"  >
    </div>

  </div>



</div>
<div class="row" id="corporate_checkbox">
  <div class="col-md-4"  > 
    <div class="form-group">
      <label class="form-control-placeholder" for="value_claims" style="margin-left: 28px;">Investment Coupons 

      </label>
      <input type="checkbox" class="form-control" id="value_claims"  name="value_claims" style="width:7%" value="yes"  >
    </div>

  </div>
  <div class="col-md-2"></div>
  <div class="col-md-4">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="demand_for_licence_fee" class="form-control{{ $errors->has('demand_for_licence_fee') ? ' is-invalid' : '' }}" name="demand_for_licence_fee" >
     <label class="form-control-placeholder" for="demand_for_licence_fee">Net Worth of Company({{$claimantinformations[0]->currency}}):
     </label>
     @if ($errors->has('demand_for_licence_fee'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('demand_for_licence_fee') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-2"></div>



</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="benefit_withoutinterest" style="margin-left: 28px;">Others 

      </label>
      <input type="checkbox" class="form-control" id="benefit_withoutinterest"  name="benefit_withoutinterest" style="width:7%" value="yes"  >
    </div>

  </div>
  



</div>
</div>
 <div class="corporate_border">
<div class="row"> 
     <div class="col-md-4">

       <div class="form-group" style="margin-bottom: 1.4em">
        <label><u><b style="font-size: 16px;">Claim For:</b></u></label>
      </div>
    </div>

  </div>
<div class="row">
  <div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="demand_for_licence_fee_interest" style="margin-left: 28px;">Allotment
 

      </label>
      <input type="checkbox" class="form-control" id="demand_for_licence_fee_interest"  name="demand_for_licence_fee_interest" style="width:9%" value="yes"  >
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="for_allotment_of_shares_stock" class="form-control{{ $errors->has('for_allotment_of_shares_stock') ? ' is-invalid' : '' }}" name="for_allotment_of_shares_stock" >
     <label class="form-control-placeholder" for="for_allotment_of_shares_stock">Value({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('for_allotment_of_shares_stock'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('for_allotment_of_shares_stock') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="cancellation_license_value" style="margin-left: 28px;">Appointment/ Removal of Director/ Key Employee

 

      </label>
      <input type="checkbox" class="form-control" id="cancellation_license_value"  name="cancellation_license_value" style="width:9%" value="yes"  >
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="demand_to_surrender_infringed_materials" class="form-control{{ $errors->has('demand_to_surrender_infringed_materials') ? ' is-invalid' : '' }}" name="demand_to_surrender_infringed_materials" >
     <label class="form-control-placeholder" for="demand_to_surrender_infringed_materials">Value({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('demand_to_surrender_infringed_materials'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('demand_to_surrender_infringed_materials') }}</strong>
    </span>
    @endif
  </div>
</div>
 

</div>

<div class="row">
  <div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="demand_for_licence_fee_withoutinterest" style="margin-left: 28px;">Conversion
 

      </label>
      <input type="checkbox" class="form-control" id="demand_for_licence_fee_withoutinterest"  name="demand_for_licence_fee_withoutinterest" style="width:9%" value="yes"  >
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="cancellation_license" class="form-control{{ $errors->has('cancellation_license') ? ' is-invalid' : '' }}" name="cancellation_license" >
     <label class="form-control-placeholder" for="cancellation_license">Value({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('cancellation_license'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('cancellation_license') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="frightrefundamountinerest" style="margin-left: 28px;">Appointment/ Removal of Auditors

 

      </label>
      <input type="checkbox" class="form-control" id="frightrefundamountinerest"  name="frightrefundamountinerest" style="width:9%" value="yes"  >
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="value_infringing_withoutinterest" class="form-control{{ $errors->has('value_infringing_withoutinterest') ? ' is-invalid' : '' }}" name="value_infringing_withoutinterest" >
     <label class="form-control-placeholder" for="value_infringing_withoutinterest">Value({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('value_infringing_withoutinterest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('value_infringing_withoutinterest') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="damages_for_breach_of_contract" style="margin-left: 28px;">Redemption

 

      </label>
      <input type="checkbox" class="form-control" id="damages_for_breach_of_contract"  name="damages_for_breach_of_contract" style="width:9%" value="yes"  >
    </div>

  </div>
  
  <div class="col-md-3">  
  <div class="form-group">

   <input type="text" onkeypress="return isNumberKey(event)"  id="demand_redemption_of_preference_shares_or_debentures" class="form-control{{ $errors->has('demand_redemption_of_preference_shares_or_debentures') ? ' is-invalid' : '' }}" name="demand_redemption_of_preference_shares_or_debentures" >
   <label class="form-control-placeholder" for="demand_redemption_of_preference_shares_or_debentures">Value({{$claimantinformations[0]->currency}})
:</label>
   @if ($errors->has('demand_redemption_of_preference_shares_or_debentures'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('demand_redemption_of_preference_shares_or_debentures') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="damages_for_breach_of_contract_interest" style="margin-left: 28px;">Convening/ Cancelling general body meetings/ Annual General Meeting

 

      </label>
      <input type="checkbox" class="form-control" id="damages_for_breach_of_contract_interest"  name="damages_for_breach_of_contract_interest" style="width:9%" value="yes"  >
    </div>

  </div>
  
  <div class="col-md-3">  
  <div class="form-group">

   <input type="text" onkeypress="return isNumberKey(event)"  id="general_meetings" class="form-control{{ $errors->has('general_meetings') ? ' is-invalid' : '' }}" name="general_meetings" >
   <label class="form-control-placeholder" for="general_meetings">Value({{$claimantinformations[0]->currency}}):

</label>
   @if ($errors->has('general_meetings'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('general_meetings') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  
  <div class="col-md-3"> 
    <div class="form-group">
  <label class="form-control-placeholder" for="frightamountwithpoutinterest" style="margin-left: 28px;">Cancellation of Allotment


 

      </label>
      <input type="checkbox" class="form-control" id="frightamountwithpoutinterest"  name="frightamountwithpoutinterest" style="width:9%" value="yes"  >
    </div>

  </div>
  
  <div class="col-md-3">  
  <div class="form-group">

   <input type="text" onkeypress="return isNumberKey(event)"  id="for_cancellation_of_allotments" class="form-control{{ $errors->has('for_cancellation_of_allotments') ? ' is-invalid' : '' }}" name="for_cancellation_of_allotments" >
   <label class="form-control-placeholder" for="for_cancellation_of_allotments">Value({{$claimantinformations[0]->currency}})
:</label>
   @if ($errors->has('for_cancellation_of_allotments'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('for_cancellation_of_allotments') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
    <div class="form-group">
  <label class="form-control-placeholder" for="termination" style="margin-left: 28px;">Modification/ Annulment of minutes


 

      </label>
      <input type="checkbox" class="form-control" id="termination"  name="termination" style="width:9%" value="yes"  >
    </div>

  </div>
  
  <div class="col-md-3">  
  <div class="form-group">

   <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims_interest" class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" >
   <label class="form-control-placeholder" for="value_claims_interest">Value({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('value_claims_interest'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('value_claims_interest') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  <div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_consideration_amount" style="margin-left: 28px;">Bonus


 

      </label>
      <input type="checkbox" class="form-control" id="claim_for_consideration_amount"  name="claim_for_consideration_amount" style="width:9%" value="yes"  >
    </div>

  </div>
  
<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="compel_promoters_to_purchase_ofinvestors_shares" class="form-control{{ $errors->has('compel_promoters_to_purchase_ofinvestors_shares') ? ' is-invalid' : '' }}" name="compel_promoters_to_purchase_ofinvestors_shares" >
   <label class="form-control-placeholder" for="compel_promoters_to_purchase_ofinvestors_shares">Value({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('compel_promoters_to_purchase_ofinvestors_shares'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('compel_promoters_to_purchase_ofinvestors_shares') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_consideration_amount_interest" style="margin-left: 28px;">Demand for Preferential/ Pre-emption Rights



 

      </label>
      <input type="checkbox" class="form-control" id="claim_for_consideration_amount_interest"  name="claim_for_consideration_amount_interest" style="width:9%" value="yes"  >
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="compel_or_cancel_push_or_put_options" class="form-control{{ $errors->has('compel_or_cancel_push_or_put_options') ? ' is-invalid' : '' }}" name="compel_or_cancel_push_or_put_options" >
     <label class="form-control-placeholder" for="compel_or_cancel_push_or_put_options">Value({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('compel_or_cancel_push_or_put_options'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('compel_or_cancel_push_or_put_options') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="eid_claim_for_contract_price" style="margin-left: 28px;">Rights Issue
</label>
      <input type="checkbox" class="form-control" id="eid_claim_for_contract_price"  name="eid_claim_for_contract_price" style="width:9%" value="yes"  >
    </div>

  </div>
<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="for_company_to_buy_back_of_shares" class="form-control{{ $errors->has('for_company_to_buy_back_of_shares') ? ' is-invalid' : '' }}" name="for_company_to_buy_back_of_shares" >
   <label class="form-control-placeholder" for="for_company_to_buy_back_of_shares">Value({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('for_company_to_buy_back_of_shares'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('for_company_to_buy_back_of_shares') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="eid_claim_for_contract_price_interest" style="margin-left: 28px;">Mismanagement and Oppression </label>
      <input type="checkbox" class="form-control" id="eid_claim_for_contract_price_interest"  name="eid_claim_for_contract_price_interest" style="width:9%" value="yes"  >
    </div>

  </div>
<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="demand_valuation_of_shares" class="form-control{{ $errors->has('demand_valuation_of_shares') ? ' is-invalid' : '' }}" name="demand_valuation_of_shares" >
   <label class="form-control-placeholder" for="demand_valuation_of_shares">Value({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('demand_valuation_of_shares'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('demand_valuation_of_shares') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="eid_claim_for_refund_withoutinterest" style="margin-left: 28px;">Alteration of Register of Members</label>
      <input type="checkbox" class="form-control" id="eid_claim_for_refund_withoutinterest"  name="eid_claim_for_refund_withoutinterest" style="width:9%" value="yes"  >
    </div>

  </div>  



<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="chairman_and_key_employees" class="form-control{{ $errors->has('chairman_and_key_employees') ? ' is-invalid' : '' }}" name="chairman_and_key_employees" >
   <label class="form-control-placeholder" for="chairman_and_key_employees">Value({{$claimantinformations[0]->currency}}): </label>
   @if ($errors->has('chairman_and_key_employees'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('chairman_and_key_employees') }}</strong>
  </span>
  @endif
</div>
</div>
<!-- <div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="eid_claim_for_refund_withoutinterest" style="margin-left: 28px;">Alteration of Register of Members</label>
      <input type="checkbox" class="form-control" id="eid_claim_for_refund_withoutinterest"  name="eid_claim_for_refund_withoutinterest" style="width:9%" value="yes"  >
    </div>

  </div>  

<div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="cargo_nature" class="form-control{{ $errors->has('cargo_nature') ? ' is-invalid' : '' }}" name="cargo_nature" >
     <label class="form-control-placeholder" for="cargo_nature">Value:</label>
     @if ($errors->has('cargo_nature'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('cargo_nature') }}</strong>
    </span>
    @endif
  </div>
</div> -->
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_escalation_of_costs" style="margin-left: 28px;">Buy Back/ Exit Option
</label>
      <input type="checkbox" class="form-control" id="claim_for_escalation_of_costs"  name="claim_for_escalation_of_costs" style="width:9%" value="yes"  >
    </div>

  </div> 



<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="for_enforcement_of_preferential_rights" class="form-control{{ $errors->has('for_enforcement_of_preferential_rights') ? ' is-invalid' : '' }}" name="for_enforcement_of_preferential_rights" >
   <label class="form-control-placeholder" for="for_enforcement_of_preferential_rights">Value({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('for_enforcement_of_preferential_rights'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('for_enforcement_of_preferential_rights') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
 
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_escalation_of_costs_withoutinterest" style="margin-left: 28px;">Creation of Charge
</label>
      <input type="checkbox" class="form-control" id="claim_for_escalation_of_costs_withoutinterest"  name="claim_for_escalation_of_costs_withoutinterest" style="width:9%" value="yes"  >
    </div>

  </div> 
 <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="demand_to_move_resolutions" class="form-control{{ $errors->has('demand_to_move_resolutions') ? ' is-invalid' : '' }}" name="demand_to_move_resolutions" >
     <label class="form-control-placeholder" for="demand_to_move_resolutions">Value({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('demand_to_move_resolutions'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('demand_to_move_resolutions') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="aggregate_value_of_debentures" style="margin-left: 28px;">Claim for Interest 
</label>
      <input type="checkbox" class="form-control" id="aggregate_value_of_debentures"  name="aggregate_value_of_debentures" style="width:9%" value="yes"  >
    </div>

  </div> 
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="agreement_value" class="form-control{{ $errors->has('agreement_value') ? ' is-invalid' : '' }}" name="agreement_value" >
     <label class="form-control-placeholder" for="agreement_value">Value({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('agreement_value'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('agreement_value') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>

<div class="row">
  
<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="to_invoke_guarntee" style="margin-left: 28px;">Claim for Damages
 
</label>
      <input type="checkbox" class="form-control" id="to_invoke_guarntee"  name="to_invoke_guarntee" style="width:9%" value="yes"  >
    </div>

  </div> 
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_damages_interest" class="form-control{{ $errors->has('claim_for_damages_interest') ? ' is-invalid' : '' }}" name="claim_for_damages_interest" >
     <label class="form-control-placeholder" for="claim_for_damages_interest">Value({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('claim_for_damages_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_for_damages_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-3"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_specific_performance" style="margin-left: 28px;">Claim for Refund</label>
      <input type="checkbox" class="form-control" id="claim_for_specific_performance"  name="claim_for_specific_performance" style="width:9%" value="yes"  >
    </div>

  </div> 
 
  <div class="col-md-3"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="damageamountinterestwithinterest"  class="form-control{{ $errors->has('damageamountinterestwithinterest') ? ' is-invalid' : '' }}" name="damageamountinterestwithinterest" >
      <label class="form-control-placeholder" for="damageamountinterestwithinterest">Value({{$claimantinformations[0]->currency}}):
      </label>
      @if ($errors->has('damageamountinterestwithinterest'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('damageamountinterestwithinterest') }}</strong>
      </span> 
      @endif
    </div>
  </div> 
</div>
<div class="row">

  <div class="col-md-3"> 
    <div class="form-group">
     <label class="form-control-placeholder" for="freightrefundamount" style="margin-left: 18px;">Claim for Specific Performance </label>
     <input type="checkbox" class="form-control" id="freightrefundamount"  name="freightrefundamount" style="width:9%" value="yes"  >
   </div>

 </div>
 <div class="col-md-3"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="nature_and_details_of_cargo"  class="form-control{{ $errors->has('nature_and_details_of_cargo') ? ' is-invalid' : '' }}" name="nature_and_details_of_cargo" >
      <label class="form-control-placeholder" for="nature_and_details_of_cargo">Value({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('nature_and_details_of_cargo'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('nature_and_details_of_cargo') }}</strong>
      </span> 
      @endif
    </div>
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
      <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount Including Interest (USD)<span style="color: red">*</span>:</label>
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

<script>
  $('#value_claims_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("value_claims_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#value_claims_interest').val("");

            } else {
               document.getElementById("value_claims_interest").disabled = false;
                $('#value_claims_interest').val("");
            }
});
  $('#value_performance_withoutint').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("value_performance_int").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#value_performance_int').val("");

            } else {
               document.getElementById("value_performance_int").disabled = false;
                $('#value_performance_int').val("");
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