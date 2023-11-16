   <div class="row register-form" style="pointer-events: none;">
    <div class="col-md-12">

      <div class="row">
        <div class="col-md-12"> 
          
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Nature of  Relief</b></u></label>
          </div>
        </div>
      </div>
       <div class="row">
        <div class="col-md-3"> 
          <div class="form-group">
           <label class="form-control-placeholder" for="demand_to_stop_infringement_select" style="margin-left: 18px;">Demand to Stop Infringement</label>
           <input type="checkbox" class="form-control" id="demand_to_stop_infringement_select"  name="demand_to_stop_infringement_select" style="width:9%"  value="yes" {{ $details->demand_to_stop_infringement_select == 'yes' ? 'checked' : ''}}
           >
         </div>
       </div>
       <div class="col-md-3"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="demand_to_stop_infringement"  class="form-control{{ $errors->has('demand_to_stop_infringement') ? ' is-invalid' : '' }}" name="demand_to_stop_infringement" value="{{ number_format((float)$details->demand_to_stop_infringement, 2, '.', '') }}">
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
          <input type="text" onkeypress="return isNumberKey(event)"  id="demand_damages_for_infringement"  class="form-control{{ $errors->has('demand_damages_for_infringement') ? ' is-invalid' : '' }}" name="demand_damages_for_infringement" value="{{$details->demand_damages_for_infringement}}">
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
         <input type="checkbox" class="form-control" id="nature_of_property"  name="nature_of_property" style="width:9%"  value="yes" {{ $details->nature_of_property == 'yes' ? 'checked' : ''}} >
       </div>
     </div>
     
   </div>
   <div class="row">
     <div class="col-md-3"> 
      <div class="form-group">
       <label class="form-control-placeholder" for="demand_for_licence_fee" style="margin-left: 18px;">Demand for Licence Fee Amount:</label>
       <input type="checkbox" class="form-control" id="demand_for_licence_fee"  name="demand_for_licence_fee" style="width:9%"  value="yes"  {{ $details->demand_for_licence_fee == 'yes' ? 'checked' : ''}}
       >
     </div>
   </div>
   <div class="col-md-3"> 
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"  id="rendition_of_accounts" class="form-control{{ $errors->has('rendition_of_accounts') ? ' is-invalid' : '' }}" name="rendition_of_accounts" value="{{ number_format((float)$details->rendition_of_accounts, 2, '.', '') }}" >
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
      <input type="text" onkeypress="return isNumberKey(event)"  id="demand_for_licence_fee_interest" class="form-control{{ $errors->has('demand_for_licence_fee_interest') ? ' is-invalid' : '' }}" name="demand_for_licence_fee_interest"  value="{{$details->demand_for_licence_fee_interest}}">
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
     <input type="checkbox" class="form-control" id="demand_for_licence_fee_withoutinterest"  name="demand_for_licence_fee_withoutinterest" style="width:9%"  value="yes"  {{ $details->demand_for_licence_fee_withoutinterest == 'yes' ? 'checked' : ''}}
     >
   </div>
 </div>

</div>
<div class="row">
  <div class="col-md-3"> 
    <div class="form-group">
     <label class="form-control-placeholder" for="cancellation_license" style="margin-left: 18px;margin-top: -8px;">Demand for Cancellation of License/ Assignment/ Agreement</label>
     <input type="checkbox" class="form-control" id="cancellation_license"  name="cancellation_license" style="width:9%"  value="yes" {{ $details->cancellation_license == 'yes' ? 'checked' : ''}}
     >
   </div>
 </div>
 <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="cancellation_license_value"  class="form-control{{ $errors->has('cancellation_license_value') ? ' is-invalid' : '' }}" name="cancellation_license_value" value="{{ number_format((float)$details->cancellation_license_value, 2, '.', '') }}">
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
   <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" value="{{$details->value_claims_interest}}">
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
   <input type="checkbox" class="form-control" id="value_claims_withoutinterest"  name="value_claims_withoutinterest" style="width:9%" value="yes" {{ $details->value_claims_withoutinterest == 'yes' ? 'checked' : ''}}
   >
 </div>

</div>
</div>
<div class="row">
 <div class="col-md-3"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="damages_for_breach_of_contract" style="margin-left: 18px;">Damages for Breach of Contract</label>
   <input type="checkbox" class="form-control" id="damages_for_breach_of_contract"  name="damages_for_breach_of_contract" style="width:9%" value="yes" {{ $details->damages_for_breach_of_contract == 'yes' ? 'checked' : ''}}
   >
 </div>

</div>

<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims"  class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims" value="{{ number_format((float)$details->value_claims, 2, '.', '') }}">
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
    <input type="text" onkeypress="return isNumberKey(event)"  id="damages_for_breach_of_contract_interest" class="form-control{{ $errors->has('damages_for_breach_of_contract_interest') ? ' is-invalid' : '' }}" name="damages_for_breach_of_contract_interest"  value="{{$details->damages_for_breach_of_contract_interest}}">
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
   <input type="checkbox" class="form-control" id="damages_for_breach_of_contract_withoutinterest"  name="damages_for_breach_of_contract_withoutinterest" style="width:9%"  value="yes" {{ $details->damages_for_breach_of_contract_withoutinterest == 'yes' ? 'checked' : ''}}
   >
 </div>
</div>
</div>
<div class="row">
 <div class="col-md-3"> 
  <div class="form-group">
   <label class="form-control-placeholder" for="demand_to_surrender_infringed_materials" style="margin-left: 18px;margin-top: -8px;">Demand to Surrender Infringing Material</label>
   <input type="checkbox" class="form-control" id="demand_to_surrender_infringed_materials"  name="demand_to_surrender_infringed_materials" style="width:9%"  value="yes" {{ $details->demand_to_surrender_infringed_materials == 'yes' ? 'checked' : ''}}
   >
 </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="value_infringing" class="form-control{{ $errors->has('value_infringing') ? ' is-invalid' : '' }}" name="value_infringing" value="{{ number_format((float)$details->value_infringing, 2, '.', '') }}">
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
    <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" value="{{$details->interest_amount}}">
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
   <input type="checkbox" class="form-control" id="value_infringing_withoutinterest"  name="value_infringing_withoutinterest" style="width:9%"  value="yes" {{ $details->value_infringing_withoutinterest == 'yes' ? 'checked' : ''}}
   >
 </div>
</div>

</div> 



<div class="row">
  
 
 <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" value="{{ number_format((float)$details->damage_with_interest, 2, '.', '') }}">
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