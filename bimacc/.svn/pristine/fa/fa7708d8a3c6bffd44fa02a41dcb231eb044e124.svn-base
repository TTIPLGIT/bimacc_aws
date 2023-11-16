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
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Nature of Relief</b></u></label>
          </div>
        </div>
      </div>      
    <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="eid_claim_for_contract_price" class="form-control{{ $errors->has('eid_claim_for_contract_price') ? ' is-invalid' : '' }}" name="eid_claim_for_contract_price" >
       <label class="form-control-placeholder" for="eid_claim_for_contract_price">Claim Amount for Contract Price({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('eid_claim_for_contract_price'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('eid_claim_for_contract_price') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"   id="eid_claim_for_contract_price_interest" class="form-control{{ $errors->has('eid_claim_for_contract_price_interest') ? ' is-invalid' : '' }}" name="eid_claim_for_contract_price_interest"  >
     <label class="form-control-placeholder" for="eid_claim_for_contract_price_interest">With Interest (%):</label>
     @if ($errors->has('eid_claim_for_contract_price_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('eid_claim_for_contract_price_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" id="eid_claim_for_contract_price_withoutinterest" for="eid_claim_for_contract_price_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" id="eid_claim_for_contract_price_withoutinterest" class="form-control" style="width:7%" name="eid_claim_for_contract_price_withoutinterest"  value="yes" onclick="document.getElementById('eid_claim_for_contract_price_interest').disabled=this.checked;" >
    
  </div>
</div>
</div>


    <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="eid_claim_for_refund" class="form-control{{ $errors->has('eid_claim_for_refund') ? ' is-invalid' : '' }}" name="eid_claim_for_refund"  >
       <label class="form-control-placeholder" for="eid_claim_for_refund">Claim Amount for Refund({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('eid_claim_for_refund'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('eid_claim_for_refund') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"   id="eid_claim_for_refund_interest" class="form-control{{ $errors->has('eid_claim_for_refund_interest') ? ' is-invalid' : '' }}" name="eid_claim_for_refund_interest" >
     <label class="form-control-placeholder" for="eid_claim_for_refund_interest">With Interest (%):</label>
     @if ($errors->has('eid_claim_for_refund_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('eid_claim_for_refund_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="eid_claim_for_refund_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" id="eid_claim_for_refund_withoutinterest" class="form-control" style="width:7%" name="eid_claim_for_refund_withoutinterest" value="yes" onclick="document.getElementById('eid_claim_for_refund_interest').disabled=this.checked;" >
    
  </div>
</div>
</div>

<div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="claim_for_escalation_of_costs" class="form-control{{ $errors->has('claim_for_escalation_of_costs') ? ' is-invalid' : '' }}" name="claim_for_escalation_of_costs" >
       <label class="form-control-placeholder" for="claim_for_escalation_of_costs">Claim Amount for Escalation of Costs({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_escalation_of_costs'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_escalation_of_costs') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="claim_for_escalation_of_costs_interest" class="form-control{{ $errors->has('claim_for_escalation_of_costs_interest') ? ' is-invalid' : '' }}" name="claim_for_escalation_of_costs_interest" >
       <label class="form-control-placeholder" for="claim_for_escalation_of_costs_interest">With Interest (%):</label>
       @if ($errors->has('claim_for_escalation_of_costs_interest'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_escalation_of_costs_interest') }}</strong>
      </span>
      @endif
    </div>
  </div>
   <div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="claim_for_escalation_of_costs_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="claim_for_escalation_of_costs_withoutinterest"  name="claim_for_escalation_of_costs_withoutinterest" style="width:7%" value="yes">
  </div>

</div>
</div>
  <div class="row">
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="claim_for_damages" class="form-control{{ $errors->has('claim_for_damages') ? ' is-invalid' : '' }}" name="claim_for_damages" >
       <label class="form-control-placeholder" for="claim_for_damages">Claim Amount for Damages({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_damages'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_damages') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="claim_for_damages_interest" class="form-control{{ $errors->has('claim_for_damages_interest') ? ' is-invalid' : '' }}" name="claim_for_damages_interest" >
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
     <label class="form-control-placeholder" for="claim_for_damages_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="claim_for_damages_withoutinterest"  name="claim_for_damages_withoutinterest" style="width:7%" value="yes">
  </div>

</div>
  </div>

  <div class="row">
        <div class="col-md-12"> 
          
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Estimated Value of Contract</b></u></label>
          </div>
        </div>
      </div>



<div class="row">
    
  <div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="to_terminate_contract" style="margin-left: 18px;">To Terminate Contract</label>
    <input type="checkbox" class="form-control" id="to_terminate_contract"  name="to_terminate_contract" style="width:9%" value="yes">
  </div>

</div>
<div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="to_terminate_contract_value" class="form-control{{ $errors->has('to_terminate_contract_value') ? ' is-invalid' : '' }}" name="to_terminate_contract_value" >
       <label class="form-control-placeholder" for="to_terminate_contract_value">Estimated Value of Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('to_terminate_contract_value'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('to_terminate_contract_value') }}</strong>
      </span>
      @endif
    </div>
  </div>
<div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="to_vacate_contractual_site" style="margin-left: 18px;">To Vacate Contractual site</label>
    <input type="checkbox" class="form-control" id="to_vacate_contractual_site"  name="to_vacate_contractual_site" style="width:9%" value="yes">
  </div>

</div>
<div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="to_vacate_contractual_site_value" class="form-control{{ $errors->has('to_vacate_contractual_site_value') ? ' is-invalid' : '' }}" name="to_vacate_contractual_site_value" >
       <label class="form-control-placeholder" for="to_vacate_contractual_site_value">Estimated Value of Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('to_vacate_contractual_site_value'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('to_vacate_contractual_site_value') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>
<div class="row">
   <div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="to_invoke_guarntee" style="margin-left: 18px;margin-top: -7px;">To Invoke/ Cancel Performance Guarantee</label>
    <input type="checkbox" class="form-control" id="to_invoke_guarntee"  name="to_invoke_guarntee" style="width:9%" value="yes">
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="amount_guaranteed" class="form-control{{ $errors->has('amount_guaranteed') ? ' is-invalid' : '' }}" name="amount_guaranteed"  >
       <label class="form-control-placeholder" for="amount_guaranteed">Estimated Value of Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('amount_guaranteed'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('amount_guaranteed') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="return_material_value" style="margin-left: 18px;">Return Material</label>
    <input type="checkbox" class="form-control" id="return_material_value"  name="return_material_value" style="width:9%" value="yes">
  </div>

</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="to_return_materials" class="form-control{{ $errors->has('to_return_materials') ? ' is-invalid' : '' }}" name="to_return_materials" >
       <label class="form-control-placeholder" for="to_return_materials">Estimated Value of Material({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('to_return_materials'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('to_return_materials') }}</strong>
      </span>
      @endif
    </div>
  </div>

</div>
<div class="row">
    <div class="col-md-5">  
      <div class="form-group">
       <input type="text" id="specific_performance_of_contract" class="form-control{{ $errors->has('specific_performance_of_contract') ? ' is-invalid' : '' }}" name="specific_performance_of_contract" >
       <label class="form-control-placeholder" for="specific_performance_of_contract">Specific performance of contract (give details in 10 words.):</label>
       @if ($errors->has('specific_performance_of_contract'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('specific_performance_of_contract') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="substitute_contractor" style="margin-left: 18px;">Substitution of Contractor</label>
    <input type="checkbox" class="form-control" id="substitute_contractor"  name="substitute_contractor" style="width:7%" value="yes">
  </div>

</div>
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="amount_guaranteed" class="form-control{{ $errors->has('amount_guaranteed') ? ' is-invalid' : '' }}" name="amount_guaranteed"  >
       <label class="form-control-placeholder" for="amount_guaranteed">Estimated Vlaue of Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('amount_guaranteed'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('amount_guaranteed') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>

  

  
      

  
  <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims" class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims"  >
    <label class="form-control-placeholder" for="value_claims">Value of Claims/ Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('value_claims'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('value_claims') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims_interest" class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest"  >
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
    <input type="checkbox" class="form-control" id="value_claims_withoutinterest"  name="value_claims_withoutinterest" style="width:7%" value="yes">
  </div>

</div>
</div>
<div class="row">
  <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" >
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
    <input type="text" onkeypress="return isNumberKey(event)"   id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
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
@else

@foreach($ReliefRequests as $ReliefRequest)
<form  name="reliefrequest_update_form" id="reliefrequest_update_form" method="POST" >
  @csrf  
  <div class="row register-form">
    <div class="col-md-12">

      <div class="row">
        <div class="col-md-12"> 
          <!-- <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
            <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
          </div> -->
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Nature of Relief</b></u></label>
          </div>
        </div>
      </div>

      
    <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"   name="reliefrequestid" value="{{$ReliefRequest->id}}" style="display: none">
       <input type="text" onkeypress="return isNumberKey(event)"   id="eid_claim_for_contract_price" class="form-control{{ $errors->has('eid_claim_for_contract_price') ? ' is-invalid' : '' }}" name="eid_claim_for_contract_price"  value="{{ number_format((float)$ReliefRequest->eid_claim_for_contract_price, 2, '.', '') }}">
       <label class="form-control-placeholder" for="eid_claim_for_contract_price">Claim Amount for Contract Price({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('eid_claim_for_contract_price'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('eid_claim_for_contract_price') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"   id="eid_claim_for_contract_price_interest" class="form-control{{ $errors->has('eid_claim_for_contract_price_interest') ? ' is-invalid' : '' }}" name="eid_claim_for_contract_price_interest"  value="{{$ReliefRequest->eid_claim_for_contract_price_interest}}">
     <label class="form-control-placeholder" for="eid_claim_for_contract_price_interest">With Interest (%):</label>
     @if ($errors->has('eid_claim_for_contract_price_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('eid_claim_for_contract_price_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="eid_claim_for_contract_price_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" id="eid_claim_for_contract_price_withoutinterest" class="form-control" style="width:7%" name="eid_claim_for_contract_price_withoutinterest" value="yes" {{ $ReliefRequest->eid_claim_for_contract_price_withoutinterest == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
</div>


    <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="eid_claim_for_refund" class="form-control{{ $errors->has('eid_claim_for_refund') ? ' is-invalid' : '' }}" name="eid_claim_for_refund"  value="{{ number_format((float)$ReliefRequest->eid_claim_for_refund, 2, '.', '') }}">
       <label class="form-control-placeholder" for="eid_claim_for_refund">Claim Amount for Refund({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('eid_claim_for_refund'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('eid_claim_for_refund') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"   id="eid_claim_for_refund_interest" class="form-control{{ $errors->has('eid_claim_for_refund_interest') ? ' is-invalid' : '' }}" name="eid_claim_for_refund_interest"  value="{{$ReliefRequest->eid_claim_for_refund_interest}}">
     <label class="form-control-placeholder" for="eid_claim_for_refund_interest">With Interest (%):</label>
     @if ($errors->has('eid_claim_for_refund_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('eid_claim_for_refund_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="eid_claim_for_refund_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" id="eid_claim_for_refund_withoutinterest" class="form-control" style="width:7%" name="eid_claim_for_refund_withoutinterest" value="yes" {{ $ReliefRequest->eid_claim_for_refund_withoutinterest == 'yes' ? 'checked' : ''}}>
    
  </div>
</div>
</div>

<div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="claim_for_escalation_of_costs" class="form-control{{ $errors->has('claim_for_escalation_of_costs') ? ' is-invalid' : '' }}" name="claim_for_escalation_of_costs"  value="{{ number_format((float)$ReliefRequest->claim_for_escalation_of_costs, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_for_escalation_of_costs">Claim Amount for Escalation of Costs({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_escalation_of_costs'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_escalation_of_costs') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="claim_for_escalation_of_costs_interest" class="form-control{{ $errors->has('claim_for_escalation_of_costs_interest') ? ' is-invalid' : '' }}" name="claim_for_escalation_of_costs_interest"  value="{{$ReliefRequest->claim_for_escalation_of_costs_interest}}">
       <label class="form-control-placeholder" for="claim_for_escalation_of_costs_interest">With Interest (%):</label>
       @if ($errors->has('claim_for_escalation_of_costs_interest'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_escalation_of_costs_interest') }}</strong>
      </span>
      @endif
    </div>
  </div>
   <div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="claim_for_escalation_of_costs_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="claim_for_escalation_of_costs_withoutinterest"  name="claim_for_escalation_of_costs_withoutinterest" style="width:7%" value="yes" {{ $ReliefRequest->claim_for_escalation_of_costs_withoutinterest == 'yes' ? 'checked' : ''}}>
  </div>

</div>

</div>
<div class="row">
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="claim_for_damages" class="form-control{{ $errors->has('claim_for_damages') ? ' is-invalid' : '' }}" name="claim_for_damages"  value="{{ number_format((float)$ReliefRequest->claim_for_damages, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_for_damages">Claim Amount for Damages({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_damages'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_damages') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="claim_for_damages_interest" class="form-control{{ $errors->has('claim_for_damages_interest') ? ' is-invalid' : '' }}" name="claim_for_damages_interest"  value="{{$ReliefRequest->claim_for_damages_interest}}">
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
     <label class="form-control-placeholder" for="claim_for_damages_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="claim_for_damages_withoutinterest"  name="claim_for_damages_withoutinterest" style="width:7%" value="yes" {{ $ReliefRequest->claim_for_damages_withoutinterest == 'yes' ? 'checked' : ''}}>
  </div>

</div>
  </div>

 <div class="row">
        <div class="col-md-12"> 
          
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Estimated Value of Contract</b></u></label>
          </div>
        </div>
      </div>



<div class="row">
    
  <div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="to_terminate_contract" style="margin-left: 18px;">To Terminate Contract</label>
    <input type="checkbox" class="form-control" id="to_terminate_contract"  name="to_terminate_contract" style="width:9%" value="yes" {{ $ReliefRequest->to_terminate_contract == 'yes' ? 'checked' : ''}}>
  </div>

</div>
<div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="to_terminate_contract_value" class="form-control{{ $errors->has('to_terminate_contract_value') ? ' is-invalid' : '' }}" name="to_terminate_contract_value"  value="{{ number_format((float)$ReliefRequest->to_terminate_contract_value, 2, '.', '') }}">
       <label class="form-control-placeholder" for="to_terminate_contract_value">Estimated Value of Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('to_terminate_contract_value'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('to_terminate_contract_value') }}</strong>
      </span>
      @endif
    </div>
  </div>
<div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="to_vacate_contractual_site" style="margin-left: 18px;">To Vacate Contractual Site</label>
    <input type="checkbox" class="form-control" id="to_vacate_contractual_site"  name="to_vacate_contractual_site" style="width:9%" value="yes" {{ $ReliefRequest->to_vacate_contractual_site == 'yes' ? 'checked' : ''}}>
  </div>

</div>
<div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="to_vacate_contractual_site_value" class="form-control{{ $errors->has('to_vacate_contractual_site_value') ? ' is-invalid' : '' }}" name="to_vacate_contractual_site_value"  value="{{ number_format((float)$ReliefRequest->to_vacate_contractual_site_value, 2, '.', '') }}">
       <label class="form-control-placeholder" for="to_vacate_contractual_site_value">Estimated Value of Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('to_vacate_contractual_site_value'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('to_vacate_contractual_site_value') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>
<div class="row">
   <div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="to_invoke_guarntee" style="margin-left: 18px;">To Invoke/ Cancel Performance Guarantee:</label>
    <input type="checkbox" class="form-control" id="to_invoke_guarntee"  name="to_invoke_guarntee" style="width:9%" value="yes" {{ $ReliefRequest->to_invoke_guarntee == 'yes' ? 'checked' : ''}}>
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="amount_guaranteed" class="form-control{{ $errors->has('amount_guaranteed') ? ' is-invalid' : '' }}" name="amount_guaranteed"   value="{{ number_format((float)$ReliefRequest->amount_guaranteed, 2, '.', '') }}">
       <label class="form-control-placeholder" for="amount_guaranteed">Estimated Value of Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('amount_guaranteed'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('amount_guaranteed') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="return_material_value" style="margin-left: 18px;">Return Material</label>
    <input type="checkbox" class="form-control" id="return_material_value"  name="return_material_value" style="width:9%" value="yes" {{ $ReliefRequest->return_material_value == 'yes' ? 'checked' : ''}}>
  </div>

</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="to_return_materials" class="form-control{{ $errors->has('to_return_materials') ? ' is-invalid' : '' }}" name="to_return_materials"  value="{{ number_format((float)$ReliefRequest->to_return_materials, 2, '.', '') }}">
       <label class="form-control-placeholder" for="to_return_materials">Estimated Value of Material({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('to_return_materials'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('to_return_materials') }}</strong>
      </span>
      @endif
    </div>
  </div>

</div>
<div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text"  id="specific_performance_of_contract" class="form-control{{ $errors->has('specific_performance_of_contract') ? ' is-invalid' : '' }}" name="specific_performance_of_contract"  value="{{$ReliefRequest->specific_performance_of_contract}}">
       <label class="form-control-placeholder" for="specific_performance_of_contract">Specific performance of contract (give details in 10 words):</label>
       @if ($errors->has('specific_performance_of_contract'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('specific_performance_of_contract') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="substitute_contractor" style="margin-left: 18px;">Substitution of Contractor</label>
    <input type="checkbox" class="form-control" id="substitute_contractor"  name="substitute_contractor" style="width:7%" value="yes" {{ $ReliefRequest->substitute_contractor == 'yes' ? 'checked' : ''}}>
  </div>

</div>
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="amount_guaranteed" class="form-control{{ $errors->has('amount_guaranteed') ? ' is-invalid' : '' }}" name="amount_guaranteed"   value="{{ number_format((float)$ReliefRequest->amount_guaranteed, 2, '.', '') }}">
       <label class="form-control-placeholder" for="amount_guaranteed">Estimated Value of Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('amount_guaranteed'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('amount_guaranteed') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>

   <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims" class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims"   value="{{ number_format((float)$ReliefRequest->value_claims, 2, '.', '') }}">
       <label class="form-control-placeholder" for="value_claims">Value of Claims/ Contract({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('value_claims'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('value_claims') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims_interest" class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest"  value="{{$ReliefRequest->value_claims_interest}}">
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
    <input type="checkbox" class="form-control" id="value_claims_withoutinterest"  name="value_claims_withoutinterest" style="width:7%" value="yes" {{ $ReliefRequest->value_claims_withoutinterest == 'yes' ? 'checked' : ''}}>
  </div>

</div>
</div>
<div class="row">
  <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" value="{{ number_format((float)$ReliefRequest->interest_amount, 2, '.', '') }}">
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
    <input type="text" onkeypress="return isNumberKey(event)"   id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" value="{{ number_format((float)$ReliefRequest->damage_with_interest, 2, '.', '') }}">
   @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Total Claim (INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Claim (USD)<span style="color: red">*</span>:</label>
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
$('#eid_claim_for_contract_price_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("eid_claim_for_contract_price_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#eid_claim_for_contract_price_interest').val("");

            } else {
               document.getElementById("eid_claim_for_contract_price_interest").disabled = false;
                $('#eid_claim_for_contract_price_interest').val("");
            }
});
$('#eid_claim_for_refund_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("eid_claim_for_refund_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#eid_claim_for_refund_interest').val("");

            } else {
               document.getElementById("eid_claim_for_refund_interest").disabled = false;
                $('#eid_claim_for_refund_interest').val("");
            }
});
$('#claim_for_escalation_of_costs_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("claim_for_escalation_of_costs_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#claim_for_escalation_of_costs_interest').val("");

            } else {
               document.getElementById("claim_for_escalation_of_costs_interest").disabled = false;
                $('#claim_for_escalation_of_costs_interest').val("");
            }
});
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
// $('#to_terminate_contract').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("to_terminate_contract_value").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#to_terminate_contract_value').val("");

//             } else {
//                document.getElementById("to_terminate_contract_value").disabled = false;
//                 $('#to_terminate_contract_value').val("");
//             }
// });
// $('#to_vacate_contractual_site').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("to_vacate_contractual_site_value").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#to_vacate_contractual_site_value').val("");

//             } else {
//                document.getElementById("to_vacate_contractual_site_value").disabled = false;
//                 $('#to_vacate_contractual_site_value').val("");
//             }
// });
// $('#to_invoke_guarntee').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("amount_guaranteed").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#amount_guaranteed').val("");

//             } else {
//                document.getElementById("amount_guaranteed").disabled = false;
//                 $('#amount_guaranteed').val("");
//             }
// });
// $('#return_material_value').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("to_return_materials").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#to_return_materials').val("");

//             } else {
//                document.getElementById("to_return_materials").disabled = false;
//                 $('#to_return_materials').val("");
//             }
// });
$('#claim_for_damages_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("claim_for_damages_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#claim_for_damages_interest').val("");

            } else {
               document.getElementById("claim_for_damages_interest").disabled = false;
                $('#claim_for_damages_interest').val("");
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
