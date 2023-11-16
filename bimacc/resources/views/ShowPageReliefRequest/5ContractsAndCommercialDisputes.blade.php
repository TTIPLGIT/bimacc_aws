<div class="row register-form" style="pointer-events: none;">
    <div class="col-md-12">
      <div class="row"> 
       <div class="col-md-12">
         <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
          <!-- <label><b>Please fill in the applicable details  pertaining to the dispute</b></label> -->
        </div>
        <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Total Value of Contract</b></u></label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">  
        <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"id="escalation_of_costs" class="form-control{{ $errors->has('escalation_of_costs') ? ' is-invalid' : '' }}" name="escalation_of_costs"  value="{{ number_format((float)$details->escalation_of_costs, 2, '.', '') }}">
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
       <input type="text" id="claim_for_damages" class="form-control{{ $errors->has('claim_for_damages') ? ' is-invalid' : '' }}" name="claim_for_damages" value="{{ $details->claim_for_damages }}">
       <label class="form-control-placeholder" for="claim_for_damages">Damages:</label>
       @if ($errors->has('claim_for_damages'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_damages') }}</strong>
      </span>
      @endif
    </div>
  </div>

    
  </div>
   @php
$count_in=1; 
@endphp
@foreach($contract_relief as $contract_reliefs)
@if($contract_reliefs->relief_id == $details->id)
<div class="row">
<!-- <div class="col-md-4">  
</div> -->
<div class="col-md-1"><input class="form-control" value="{{$count_in}}"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
  <div class="col-md-5">  
    <div class="form-group" >
     <input type="text" onkeypress="return isNumberKey(event)"  id="contract_price1" value="{{ number_format((float)$contract_reliefs->contract_price, 2, '.', '') }}" class="form-control{{ $errors->has('contract_price') ? ' is-invalid' : '' }}"  readonly >
     <label class="form-control-placeholder" for="contract_price">Contract Price({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('contract_price'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('contract_price') }}</strong>
    </span>
    @endif

  </div>
</div>
<div class="col-md-6" >  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"id="claim_for_refund_lines1" class="form-control{{ $errors->has('claim_for_refund_lines') ? ' is-invalid' : '' }}" value="{{ number_format((float)$contract_reliefs->claim_for_refund_lines, 2, '.', '') }}" readonly >
   <label class="form-control-placeholder" for="claim_for_refund_lines">Claim for Refund({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('claim_for_refund_lines'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_for_refund_lines') }}</strong>
  </span>
  @endif

</div>

</div>
</div>
@php
$count_in=$count_in+1;
@endphp
@endif
@endforeach
 
    










  


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
      <input type="text" id="specific_performance_of_contract" value="{{$details->specific_performance_of_contract}}" class="form-control{{ $errors->has('specific_performance_of_contract') ? ' is-invalid' : '' }}" name="specific_performance_of_contract" >
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
      <input type="text" onkeypress="return isNumberKey(event)"  id="specific_estimated_value_of_contract" class="form-control{{ $errors->has('specific_estimated_value_of_contract') ? ' is-invalid' : '' }}" name="specific_estimated_value_of_contract" value="{{ number_format((float)$details->specific_estimated_value_of_contract, 2, '.', '') }}" >
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
      <input type="text" onkeypress="return isNumberKey(event)"  id="tocancel_estimated_value_of_contract" class="form-control{{ $errors->has('tocancel_estimated_value_of_contract') ? ' is-invalid' : '' }}" name="tocancel_estimated_value_of_contract" value="{{ number_format((float)$details->tocancel_estimated_value_of_contract, 2, '.', '') }}">
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
      <input type="text" onkeypress="return isNumberKey(event)"  id="amount_guaranteed" class="form-control{{ $errors->has('amount_guaranteed') ? ' is-invalid' : '' }}" name="amount_guaranteed"  value="{{ number_format((float)$details->amount_guaranteed, 2, '.', '') }}">
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
      <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount"  class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" value="{{ number_format((float)$details->interest_amount, 2, '.', '') }}">
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
      <input type="text" onkeypress="return isNumberKey(event)"   value="{{ number_format((float)$details->damage_with_interest, 2, '.', '') }}" class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
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
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text"  onkeypress="return isNumberKey(event)"  id="claim_for_contract_price" value="{{ $details->claim_for_contract_price }}" class="form-control{{ $errors->has('claim_for_contract_price') ? ' is-invalid' : '' }}" name="claim_for_contract_price" >
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
    <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_contract_price_interest" value="{{$details->claim_for_contract_price_interest}}" class="form-control{{ $errors->has('claim_for_contract_price_interest') ? ' is-invalid' : '' }}" name="claim_for_contract_price_interest" >
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
   <label class="form-control-placeholder" for="refund_withoutinterest" style="margin-left: 18px;">Without Interest</label>
   <input type="checkbox" class="form-control" id="refund_withoutinterest"  name="refund_withoutinterest" style="width:7%" value="yes" {{ $details->refund_withoutinterest == 'yes' ? 'checked' : ''}}>
 </div>
</div>

</div>
</div>
</div>