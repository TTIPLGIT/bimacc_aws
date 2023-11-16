  <div class="row register-form" style="pointer-events: none;">
    <div class="col-md-12">
      <div class="row"> 
       <div class="col-md-12">
         <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
         <!--  <label><b>Please fill in the applicable details  pertaining to the dispute</b></label> -->
        </div>
        <div class="form-group text-center" style="margin-bottom: 1.4em">
         <!--  <label><u><b>Market Value of Shares/Stock</b></u></label> -->
        </div>
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
    <div class="row"  id="rcorporate_checkbox">
    <div class="col-md-4" > 
      <div class="form-group">
           <input type="text" onkeypress="return isNumberKey(event)"  name="reliefrequestid" value="{{$details->id}}" style="display: none">
       <label class="form-control-placeholder" for="claim_for_refund_of_fare_or_freight" style="margin-left: 28px;">Equity Shares</label>
       <input type="checkbox" class="form-control" id="rclaim_for_refund_of_fare_or_freight"  name="claim_for_refund_of_fare_or_freight" style="width:7%" value="yes"  {{ $details->claim_for_refund_of_fare_or_freight == 'yes' ? 'checked' : ''}}>
     </div>

   </div>
   <div class="col-md-4">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)" id="rclaim_reinstatement" class="form-control{{ $errors->has('claim_reinstatement') ? ' is-invalid' : '' }}" name="claim_reinstatement" value="{{ number_format((float)$details->claim_reinstatement, 2, '.', '') }}">
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
   <input type="text" onkeypress="return isNumberKey(event)"  id="rclaimforontractprice" class="form-control{{ $errors->has('claimforontractprice') ? ' is-invalid' : '' }}" name="claimforontractprice"value="{{ number_format((float)$details->claimforontractprice, 2, '.', '') }}">
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
<div class="row"  id="rcorporate_checkbox">
  <div class="col-md-4"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_refund_of_fare_or_freight_interest" style="margin-left: 28px;">Preference Shares</label>
      <input type="checkbox" class="form-control" id="rclaim_for_refund_of_fare_or_freight_interest"  name="claim_for_refund_of_fare_or_freight_interest" style="width:7%" value="yes"  {{ $details->claim_for_refund_of_fare_or_freight_interest == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  

</div>
<div class="row" id="rcorporate_checkbox">
  <div class="col-md-4"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_payment_of_damages" style="margin-left: 28px;">Convertible Preference Shares
      </label>
      <input type="checkbox" class="form-control" id="rclaim_for_payment_of_damages"  name="claim_for_payment_of_damages" style="width:7%" value="yes"  {{ $details->claim_for_payment_of_damages == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  

</div>
<div class="row" id="rcorporate_checkbox">
  <div class="col-md-4"  > 
    <div class="form-group">
      <label class="form-control-placeholder" for="subrogation_value" style="margin-left: 28px;">Subrogation Values
      </label>
      <input type="checkbox" class="form-control" id="rsubrogation_value"  name="subrogation_value" style="width:7%" value="yes"  {{ $details->subrogation_value == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  <div class="col-md-4">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rdemand_to_stop_infringement_select" class="form-control{{ $errors->has('demand_to_stop_infringement_select') ? ' is-invalid' : '' }}" name="demand_to_stop_infringement_select" value="{{ number_format((float)$details->demand_to_stop_infringement_select, 2, '.', '') }}">
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
   <input type="text" onkeypress="return isNumberKey(event)"  id="rdemand_to_stop_infringement" class="form-control{{ $errors->has('demand_to_stop_infringement') ? ' is-invalid' : '' }}" name="demand_to_stop_infringement" value="{{ number_format((float)$details->demand_to_stop_infringement, 2, '.', '') }}">
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
<div class="row" id="rcorporate_checkbox">
  <div class="col-md-4"  > 
    <div class="form-group">
      <label class="form-control-placeholder" for="claim_for_demurrages" style="margin-left: 28px;">Convertible Debentures 

      </label>
      <input type="checkbox" class="form-control" id="rclaim_for_demurrages"  name="claim_for_demurrages" style="width:7%" value="yes"  {{ $details->claim_for_demurrages == 'yes' ? 'checked' : ''}}>
    </div>

  </div>

  


</div>
<div class="row">
  <div class="col-md-4" id="rcorporate_checkbox"> 
    <div class="form-group">
      <label class="form-control-placeholder" for="damage_amount" style="margin-left: 28px;">Stock Options

      </label>
      <input type="checkbox" class="form-control" id="rdamage_amount"  name="damage_amount" style="width:7%" value="yes"  {{ $details->damage_amount == 'yes' ? 'checked' : ''}}>
    </div>

  </div>



</div>
<div class="row" id="rcorporate_checkbox">
  <div class="col-md-4"  > 
    <div class="form-group">
      <label class="form-control-placeholder" for="value_claims" style="margin-left: 28px;">Investment Coupons 

      </label>
      <input type="checkbox" class="form-control" id="rvalue_claims"  name="value_claims" style="width:7%" value="yes"  {{ $details->value_claims == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  <div class="col-md-2"></div>
  <div class="col-md-4">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rdemand_for_licence_fee" class="form-control{{ $errors->has('demand_for_licence_fee') ? ' is-invalid' : '' }}" name="demand_for_licence_fee" value="{{ number_format((float)$details->demand_for_licence_fee, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rbenefit_withoutinterest"  name="benefit_withoutinterest" style="width:7%" value="yes"  {{ $details->benefit_withoutinterest == 'yes' ? 'checked' : ''}}>
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
      <input type="checkbox" class="form-control" id="rdemand_for_licence_fee_interest"  name="demand_for_licence_fee_interest" style="width:9%" value="yes"  {{ $details->demand_for_licence_fee_interest == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rfor_allotment_of_shares_stock" class="form-control{{ $errors->has('for_allotment_of_shares_stock') ? ' is-invalid' : '' }}" name="for_allotment_of_shares_stock" value="{{ number_format((float)$details->for_allotment_of_shares_stock, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rcancellation_license_value"  name="cancellation_license_value" style="width:9%" value="yes"  {{ $details->cancellation_license_value == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rdemand_to_surrender_infringed_materials" class="form-control{{ $errors->has('demand_to_surrender_infringed_materials') ? ' is-invalid' : '' }}" name="demand_to_surrender_infringed_materials" value="{{ number_format((float)$details->demand_to_surrender_infringed_materials, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rdemand_for_licence_fee_withoutinterest"  name="demand_for_licence_fee_withoutinterest" style="width:9%" value="yes"  {{ $details->demand_for_licence_fee_withoutinterest == 'yes' ? 'checked' : ''}}
>
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rcancellation_license" class="form-control{{ $errors->has('cancellation_license') ? ' is-invalid' : '' }}" name="cancellation_license" value="{{ number_format((float)$details->cancellation_license, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rfrightrefundamountinerest"  name="frightrefundamountinerest" style="width:9%" value="yes"  {{ $details->frightrefundamountinerest == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rvalue_infringing_withoutinterest" class="form-control{{ $errors->has('value_infringing_withoutinterest') ? ' is-invalid' : '' }}" name="value_infringing_withoutinterest" value="{{ number_format((float)$details->value_infringing_withoutinterest, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rdamages_for_breach_of_contract"  name="damages_for_breach_of_contract" style="width:9%" value="yes"  {{ $details->damages_for_breach_of_contract == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  
  <div class="col-md-3">  
  <div class="form-group">

   <input type="text" onkeypress="return isNumberKey(event)"  id="rdemand_redemption_of_preference_shares_or_debentures" class="form-control{{ $errors->has('demand_redemption_of_preference_shares_or_debentures') ? ' is-invalid' : '' }}" name="demand_redemption_of_preference_shares_or_debentures" value="{{ number_format((float)$details->demand_redemption_of_preference_shares_or_debentures, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rdamages_for_breach_of_contract_interest"  name="damages_for_breach_of_contract_interest" style="width:9%" value="yes"  {{ $details->damages_for_breach_of_contract_interest == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  
  <div class="col-md-3">  
  <div class="form-group">

   <input type="text" onkeypress="return isNumberKey(event)"  id="rgeneral_meetings" class="form-control{{ $errors->has('general_meetings') ? ' is-invalid' : '' }}" name="general_meetings" value="{{ number_format((float)$details->general_meetings, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rfrightamountwithpoutinterest"  name="frightamountwithpoutinterest" style="width:9%" value="yes"  {{ $details->frightamountwithpoutinterest == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  
  <div class="col-md-3">  
  <div class="form-group">

   <input type="text" onkeypress="return isNumberKey(event)"  id="rfor_cancellation_of_allotments" class="form-control{{ $errors->has('for_cancellation_of_allotments') ? ' is-invalid' : '' }}" name="for_cancellation_of_allotments" value="{{ number_format((float)$details->for_cancellation_of_allotments, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rtermination"  name="termination" style="width:9%" value="yes"  {{ $details->termination == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  
  <div class="col-md-3">  
  <div class="form-group">

   <input type="text" onkeypress="return isNumberKey(event)"  id="rvalue_claims_interest" class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" value="{{ number_format((float)$details->value_claims_interest, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rclaim_for_consideration_amount"  name="claim_for_consideration_amount" style="width:9%" value="yes"  {{ $details->claim_for_consideration_amount == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  
<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="rcompel_promoters_to_purchase_ofinvestors_shares" class="form-control{{ $errors->has('compel_promoters_to_purchase_ofinvestors_shares') ? ' is-invalid' : '' }}" name="compel_promoters_to_purchase_ofinvestors_shares" value="{{ number_format((float)$details->compel_promoters_to_purchase_ofinvestors_shares, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rclaim_for_consideration_amount_interest"  name="claim_for_consideration_amount_interest" style="width:9%" value="yes"  {{ $details->claim_for_consideration_amount_interest == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rcompel_or_cancel_push_or_put_options" class="form-control{{ $errors->has('compel_or_cancel_push_or_put_options') ? ' is-invalid' : '' }}" name="compel_or_cancel_push_or_put_options" value="{{ number_format((float)$details->compel_or_cancel_push_or_put_options, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="reid_claim_for_contract_price"  name="eid_claim_for_contract_price" style="width:9%" value="yes"  {{ $details->eid_claim_for_contract_price == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="rfor_company_to_buy_back_of_shares" class="form-control{{ $errors->has('for_company_to_buy_back_of_shares') ? ' is-invalid' : '' }}" name="for_company_to_buy_back_of_shares" value="{{ number_format((float)$details->for_company_to_buy_back_of_shares, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="reid_claim_for_contract_price_interest"  name="eid_claim_for_contract_price_interest" style="width:9%" value="yes"  {{ $details->eid_claim_for_contract_price_interest == 'yes' ? 'checked' : ''}}>
    </div>

  </div>
<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="rdemand_valuation_of_shares" class="form-control{{ $errors->has('demand_valuation_of_shares') ? ' is-invalid' : '' }}" name="demand_valuation_of_shares" value="{{ number_format((float)$details->demand_valuation_of_shares, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="reid_claim_for_refund_withoutinterest"  name="eid_claim_for_refund_withoutinterest" style="width:9%" value="yes"  {{ $details->eid_claim_for_refund_withoutinterest == 'yes' ? 'checked' : ''}}>
    </div>

  </div>  



<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="rchairman_and_key_employees" class="form-control{{ $errors->has('chairman_and_key_employees') ? ' is-invalid' : '' }}" name="chairman_and_key_employees" value="{{ number_format((float)$details->chairman_and_key_employees, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="reid_claim_for_refund_withoutinterest"  name="eid_claim_for_refund_withoutinterest" style="width:9%" value="yes"  {{ $details->eid_claim_for_refund_withoutinterest == 'yes' ? 'checked' : ''}}>
    </div>

  </div>  

<div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rcargo_nature" class="form-control{{ $errors->has('cargo_nature') ? ' is-invalid' : '' }}" name="cargo_nature" value="{{$details->cargo_nature}}">
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
      <input type="checkbox" class="form-control" id="rclaim_for_escalation_of_costs"  name="claim_for_escalation_of_costs" style="width:9%" value="yes"  {{ $details->claim_for_escalation_of_costs == 'yes' ? 'checked' : ''}}>
    </div>

  </div> 



<div class="col-md-3">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="rfor_enforcement_of_preferential_rights" class="form-control{{ $errors->has('for_enforcement_of_preferential_rights') ? ' is-invalid' : '' }}" name="for_enforcement_of_preferential_rights" value="{{ number_format((float)$details->for_enforcement_of_preferential_rights, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rclaim_for_escalation_of_costs_withoutinterest"  name="claim_for_escalation_of_costs_withoutinterest" style="width:9%" value="yes"  {{ $details->claim_for_escalation_of_costs_withoutinterest == 'yes' ? 'checked' : ''}}>
    </div>

  </div> 
 <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rdemand_to_move_resolutions" class="form-control{{ $errors->has('demand_to_move_resolutions') ? ' is-invalid' : '' }}" name="demand_to_move_resolutions" value="{{ number_format((float)$details->demand_to_move_resolutions, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="raggregate_value_of_debentures"  name="aggregate_value_of_debentures" style="width:9%" value="yes"  {{ $details->aggregate_value_of_debentures == 'yes' ? 'checked' : ''}}
>
    </div>

  </div> 
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="ragreement_value" class="form-control{{ $errors->has('agreement_value') ? ' is-invalid' : '' }}" name="agreement_value" value="{{ number_format((float)$details->agreement_value, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rto_invoke_guarntee"  name="to_invoke_guarntee" style="width:9%" value="yes"  {{ $details->to_invoke_guarntee == 'yes' ? 'checked' : ''}}>
    </div>

  </div> 
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="rclaim_for_damages_interest" class="form-control{{ $errors->has('claim_for_damages_interest') ? ' is-invalid' : '' }}" name="claim_for_damages_interest" value="{{ number_format((float)$details->claim_for_damages_interest, 2, '.', '') }}">
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
      <input type="checkbox" class="form-control" id="rclaim_for_specific_performance"  name="claim_for_specific_performance" style="width:9%" value="yes"  {{ $details->claim_for_specific_performance == 'yes' ? 'checked' : ''}}
>
    </div>

  </div> 
 
  <div class="col-md-3"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="rdamageamountinterestwithinterest"  class="form-control{{ $errors->has('damageamountinterestwithinterest') ? ' is-invalid' : '' }}" name="damageamountinterestwithinterest" value="{{ number_format((float)$details->damageamountinterestwithinterest, 2, '.', '') }}">
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
     <input type="checkbox" class="form-control" id="rfreightrefundamount"  name="freightrefundamount" style="width:9%" value="yes"  {{ $details->freightrefundamount == 'yes' ? 'checked' : ''}}
>
   </div>

 </div>
 <div class="col-md-3"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="rnature_and_details_of_cargo"  class="form-control{{ $errors->has('nature_and_details_of_cargo') ? ' is-invalid' : '' }}" name="nature_and_details_of_cargo" value="{{ number_format((float)$details->nature_and_details_of_cargo, 2, '.', '') }}">
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
      <input type="text" onkeypress="return isNumberKey(event)"    class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" value="{{ number_format((float)$details->damage_with_interest, 2, '.', '') }}">
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