




   <div class="col-md-12" style="pointer-events: none;">

      <div class="row">
        <div class="col-md-12"> 
          <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
            
          </div>
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Nature of Relief</b></u></label>
          </div>
        </div>
      </div>
        <div class="row">
        <div class="col-md-4">  
          <div class="form-group">
           <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_consideration_amount" class="form-control{{ $errors->has('claim_for_consideration_amount') ? ' is-invalid' : '' }}" name="claim_for_consideration_amount"  value="{{ number_format((float)$details->claim_for_consideration_amount, 2, '.', '') }}" >
           <label class="form-control-placeholder" for="claim_for_consideration_amount">Claim for Consideration Amount({{$claimantinformations[0]->currency}}):</label>
           @if ($errors->has('claim_for_consideration_amount'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claim_for_consideration_amount') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4">  
        <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_consideration_amount_interest" class="form-control{{ $errors->has('claim_for_consideration_amount_interest') ? ' is-invalid' : '' }}" name="claim_for_consideration_amount_interest" value="{{$details->claim_for_consideration_amount_interest}}">
         <label class="form-control-placeholder" for="claim_for_consideration_amount_interest">With Interest (%):</label>
         @if ($errors->has('claim_for_consideration_amount_interest'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_consideration_amount_interest') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
       <label class="form-control-placeholder" for="claim_for_consideration_amount_withoutinterest" style="margin-left: 18px;">Without Interest</label>
       <input type="checkbox" class="form-control" id="claim_for_consideration_amount_withoutinterest"  name="claim_for_consideration_amount_withoutinterest" style="width:7%"  value="yes" {{ $details->claim_for_consideration_amount_withoutinterest == 'yes' ? 'checked' : ''}}>
     </div>
   </div>
 </div>
 <div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_arrears_of_rent_maintenance_amount" class="form-control{{ $errors->has('claim_for_arrears_of_rent_maintenance_amount') ? ' is-invalid' : '' }}" name="claim_for_arrears_of_rent_maintenance_amount" value="{{ number_format((float)$details->claim_for_arrears_of_rent_maintenance_amount, 2, '.', '') }}"  >
     <label class="form-control-placeholder" for="claim_for_arrears_of_rent_maintenance_amount">Claim for Arrears of Rent/ Defects/ Maintenance Amount({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('claim_for_arrears_of_rent_maintenance_amount'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_for_arrears_of_rent_maintenance_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_arrears_of_rent_maintenance_amount_interest" class="form-control{{ $errors->has('claim_for_arrears_of_rent_maintenance_amount_interest') ? ' is-invalid' : '' }}" name="claim_for_arrears_of_rent_maintenance_amount_interest" value="{{$details->claim_for_arrears_of_rent_maintenance_amount_interest}}">
   <label class="form-control-placeholder" for="claim_for_arrears_of_rent_maintenance_amount_interest">With Interest (%):</label>
   @if ($errors->has('claim_for_arrears_of_rent_maintenance_amount_interest'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_for_arrears_of_rent_maintenance_amount_interest') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="claim_for_arrears_of_rent_maintenance_withoutinterest" style="margin-left: 18px;">Without Interest</label>
   <input type="checkbox" class="form-control" id="claim_for_arrears_of_rent_maintenance_withoutinterest"  name="claim_for_arrears_of_rent_maintenance_withoutinterest" style="width:7%"  value="yes" {{ $details->claim_for_arrears_of_rent_maintenance_withoutinterest == 'yes' ? 'checked' : ''}}>
 </div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="enforcement_of_mortgage_debt_amount" class="form-control{{ $errors->has('enforcement_of_mortgage_debt_amount') ? ' is-invalid' : '' }}" name="enforcement_of_mortgage_debt_amount"   value="{{ number_format((float)$details->enforcement_of_mortgage_debt_amount, 2, '.', '') }}" >
     <label class="form-control-placeholder" for="enforcement_of_mortgage_debt_amount"> Enforcement of Mortgage Debt Amount({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('enforcement_of_mortgage_debt_amount'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('enforcement_of_mortgage_debt_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="enforcement_of_mortgage_debt_amount_int" class="form-control{{ $errors->has('enforcement_of_mortgage_debt_amount_int') ? ' is-invalid' : '' }}" name="enforcement_of_mortgage_debt_amount_int"  value="{{$details->enforcement_of_mortgage_debt_amount_int}}">
   <label class="form-control-placeholder" for="enforcement_of_mortgage_debt_amount_int">With Interest (%):</label>
   @if ($errors->has('enforcement_of_mortgage_debt_amount_int'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('enforcement_of_mortgage_debt_amount_int') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="enforcement_of_mortgage_debt_amount_withoutint" style="margin-left: 18px;">Without Interest</label>
   <input type="checkbox" class="form-control" id="enforcement_of_mortgage_debt_amount_withoutint"  name="enforcement_of_mortgage_debt_amount_withoutint" style="width:7%"  value="yes" {{ $details->enforcement_of_mortgage_debt_amount_withoutint == 'yes' ? 'checked' : ''}}>
 </div>
</div>
</div>




<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <label class="form-control-placeholder" for="claim_for_contractual_built_up_or_land_share_area_select" style="margin-left: 18px;">Claim for Contractual Built Up or Land Share: </label>
     <input type="checkbox" class="form-control" id="claim_for_contractual_built_up_or_land_share_area_select"  name="claim_for_contractual_built_up_or_land_share_area_select" style="width:7%"  value="yes" {{ $details->claim_for_contractual_built_up_or_land_share_area_select == 'yes' ? 'checked' : ''}}>
   </div>
 </div>
 <div class="col-md-4">  
  <div class="form-group">
   <input  type="text" id="claim_for_contractual_built_up_or_land_share_area" class="form-control{{ $errors->has('claim_for_contractual_built_up_or_land_share_area') ? ' is-invalid' : '' }}" name="claim_for_contractual_built_up_or_land_share_area"   value="{{$details->claim_for_contractual_built_up_or_land_share_area}}">
   <label class="form-control-placeholder" for="claim_for_contractual_built_up_or_land_share_area">Area:</label>
   @if ($errors->has('claim_for_contractual_built_up_or_land_share_area'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_for_contractual_built_up_or_land_share_area') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_contractual_built_up_or_land_share_value" class="form-control{{ $errors->has('claim_for_contractual_built_up_or_land_share_value') ? ' is-invalid' : '' }}" name="claim_for_contractual_built_up_or_land_share_value"  value="{{ number_format((float)$details->claim_for_contractual_built_up_or_land_share_value, 2, '.', '') }}">
   <label class="form-control-placeholder" for="claim_for_contractual_built_up_or_land_share_value">Value({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('claim_for_contractual_built_up_or_land_share_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_for_contractual_built_up_or_land_share_value') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  <div class="col-md-6"> 
    <div class="form-group">
     <label class="form-control-placeholder" for="redemption_of_mortgage" style="margin-left: 18px;">Redemption of Mortgage</label>
     <input type="checkbox" class="form-control" id="redemption_of_mortgage"  name="redemption_of_mortgage" style="width:5%"  value="yes" {{ $details->redemption_of_mortgage == 'yes' ? 'checked' : ''}}>

   </div>
 </div>
 <div class="col-md-6">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="redemption_of_mortgage_market_value_of_property" class="form-control{{ $errors->has('redemption_of_mortgage_market_value_of_property') ? ' is-invalid' : '' }}" name="redemption_of_mortgage_market_value_of_property"  value="{{ number_format((float)$details->redemption_of_mortgage_market_value_of_property, 2, '.', '') }}">
   <label class="form-control-placeholder" for="redemption_of_mortgage_market_value_of_property">Market Value of Property({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('redemption_of_mortgage_market_value_of_property'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('redemption_of_mortgage_market_value_of_property') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
 <div class="col-md-6"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="possession_property" style="margin-left: 18px;">Possession Property</label>
   <input type="checkbox" class="form-control" id="possession_property"  name="possession_property" style="width:5%"  value="yes" {{ $details->possession_property == 'yes' ? 'checked' : ''}}>
 </div>
</div>
<div class="col-md-6">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="possession_property_market_value" class="form-control{{ $errors->has('possession_property_market_value') ? ' is-invalid' : '' }}" name="possession_property_market_value"  value="{{ number_format((float)$details->possession_property_market_value, 2, '.', '') }}">
   <label class="form-control-placeholder" for="possession_property_market_value">Market Value({{$claimantinformations[0]->currency}}): </label>
   @if ($errors->has('possession_property_market_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('possession_property_market_value') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  <div class="col-md-6"> 
    <div class="form-group">
     <label class="form-control-placeholder" for="termination_of_lease_mortgage_select" style="margin-left: 18px;">Termination of Lease/ Mortgage/ Joint Development Agreement</label>
     <input type="checkbox" class="form-control" id="termination_of_lease_mortgage_select"  name="termination_of_lease_mortgage_select" style="width:5%"   value="yes" {{ $details->termination_of_lease_mortgage_select == 'yes' ? 'checked' : ''}}>
   </div>
 </div>
 <div class="col-md-6">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="termination_of_lease_mortgage_joint_development_agreement" class="form-control{{ $errors->has('termination_of_lease_mortgage_joint_development_agreement') ? ' is-invalid' : '' }}" name="termination_of_lease_mortgage_joint_development_agreement"  value="{{ number_format((float)$details->termination_of_lease_mortgage_joint_development_agreement, 2, '.', '') }}">
   <label class="form-control-placeholder" for="termination_of_lease_mortgage_joint_development_agreement"> Market Value({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('termination_of_lease_mortgage_joint_development_agreement'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('termination_of_lease_mortgage_joint_development_agreement') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  <div class="col-md-4">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="damage_amount" class="form-control{{ $errors->has('damage_amount') ? ' is-invalid' : '' }}" name="damage_amount"   value="{{ number_format((float)$details->damage_amount, 2, '.', '') }}">
     <label class="form-control-placeholder" for="damage_amount">Damages Amount({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('damage_amount'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('damage_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="damage_amount_interest" class="form-control{{ $errors->has('damage_amount_interest') ? ' is-invalid' : '' }}" name="damage_amount_interest"   value="{{$details->damage_amount_interest}}">
   <label class="form-control-placeholder" for="damage_amount_interest">With Interest (%):</label>
   @if ($errors->has('damage_amount_interest'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('damage_amount_interest') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="damage_amount_interest_without" style="margin-left: 18px;">Without Interest</label>
   <input type="checkbox" class="form-control" id="damage_amount_interest_without"  name="damage_amount_interest_without" style="width:7%"  value="yes" {{ $details->damage_amount_interest_without == 'yes' ? 'checked' : ''}}>
 </div>
</div>
</div>
<div class="row">
 <div class="col-md-6">  
  <div class="form-group">
   
   <input typ="text" id="specific_perf" class="form-control{{ $errors->has('specific_perf') ? ' is-invalid' : '' }}" name="specific_perf" value="{{$details->specific_perf}}">
   <label class="form-control-placeholder" for="specific_perf">Specific Performance (10 Words):</label>
   @if ($errors->has('specific_perf'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('specific_perf') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-6">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="sp_project_value" class="form-control{{ $errors->has('sp_project_value') ? ' is-invalid' : '' }}" name="sp_project_value"  value="{{ number_format((float)$details->sp_project_value, 2, '.', '') }}">
   <label class="form-control-placeholder" for="sp_project_value">Contractual Value({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('sp_project_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('sp_project_value') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  <div class="col-md-12"> 
    <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
      <label><u><b>Division of Property</b></u></label>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">  
    <div class="form-group">
     <input type="text" id="division_of_property_area" class="form-control{{ $errors->has('division_of_property_area') ? ' is-invalid' : '' }}" name="division_of_property_area"  value="{{$details->division_of_property_area}}">
     <label class="form-control-placeholder" for="division_of_property_area">Area:</label>
     @if ($errors->has('division_of_property_area'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('division_of_property_area') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="division_of_property_value" class="form-control{{ $errors->has('division_of_property_value') ? ' is-invalid' : '' }}" name="division_of_property_value"  value="{{ number_format((float)$details->division_of_property_value, 2, '.', '') }}">
   <label class="form-control-placeholder" for="division_of_property_value">Value({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('division_of_property_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('division_of_property_value') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4">  
  <div class="form-group">
   <input type="text" id="division_of_property_unit" class="form-control{{ $errors->has('division_of_property_unit') ? ' is-invalid' : '' }}" name="division_of_property_unit"  value="{{$details->division_of_property_unit}}">
   <label class="form-control-placeholder" for="division_of_property_unit">Units:</label>
   @if ($errors->has('division_of_property_unit'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('division_of_property_unit') }}</strong>
  </span>
  @endif
</div>
</div>


</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims"  class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims"  value="{{ number_format((float)$details->value_claims, 2, '.', '') }}">
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
   <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" value="{{$details->value_claims_interest}}">
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
   <input type="checkbox" class="form-control" id="value_claims_withoutinterest"  name="value_claims_withoutinterest" style="width:7%" value="yes" {{ $details->value_claims_withoutinterest == 'yes' ? 'checked' : ''}}>
 </div>

</div>
</div>

<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" value="{{ number_format((float)$details->interest_amount, 2, '.', '') }}" >
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
</div></div>
