
  <div class="row register-form" style="pointer-events: none;">
    <div class="col-md-12">
      <div class="row"> 
       <div class="col-md-12"> 
         <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Nature of Relief:</b></u></label>
        </div>
      </div>
    </div>

   <div class="row">
      <div class="col-md-4"> 
        <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"   id="freightrefundamount" class="form-control{{ $errors->has('freightrefundamount') ? ' is-invalid' : '' }}" name="freightrefundamount"  value="{{ number_format((float)$details->freightrefundamount, 2, '.', '') }}">
         <label class="form-control-placeholder" for="freightrefundamount">Value of Claim for Refund of Fare or Freight Amount({{$claimantinformations[0]->currency}}):</label>
         @if ($errors->has('freightrefundamount'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('freightrefundamount') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="frightrefundamountinerest" class="form-control{{ $errors->has('frightrefundamountinerest') ? ' is-invalid' : '' }}" name="frightrefundamountinerest" value="{{$details->frightrefundamountinerest}}">
        <label class="form-control-placeholder" for="frightrefundamountinerest">Interest (%):</label>
        @if ($errors->has('frightrefundamountinerest'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('frightrefundamountinerest') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="col-md-4"> 
      <div class="form-group">
       <label class="form-control-placeholder" for="fightrefundamountamountinterestwithinterest" style="margin-left: 18px;">Without Interest</label>
       <input type="checkbox" class="form-control" id="fightrefundamountamountinterestwithinterest"  name="fightrefundamountamountinterestwithinterest" style="width:7%" value="yes"  {{$details->fightrefundamountamountinterestwithinterest == 'yes' ? 'checked' : ''}}>
     </div>
   </div>

 </div>

 <div class="row">
   <div class="col-md-4"> 
      <div class="form-group">
       <label class="form-control-placeholder" for="claim_for_delivery_of_cargo" style="margin-left: 18px;">Claim for delivery of cargo/baggage</label>
       <input type="checkbox" class="form-control" id="claim_for_delivery_of_cargo"  name="claim_for_delivery_of_cargo" style="width:7%" value="yes" {{ $details->claim_for_delivery_of_cargo == 'yes' ? 'checked' : ''}}>
     </div>
   </div>

<div class="col-md-4"> 
  <div class="form-group">

    <input type="text" onkeypress="return isNumberKey(event)"  id="cargo_nature" class="form-control{{ $errors->has('cargo_nature') ? ' is-invalid' : '' }}" name="cargo_nature" value="{{ number_format((float)$details->cargo_nature, 2, '.', '') }}">
    <label class="form-control-placeholder" for="cargo_nature">Value of Cargo({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('cargo_nature'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('cargo_nature') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
 <div class="form-group">
   <input type='text'  id="nature_and_details_of_cargo" class="form-control{{ $errors->has('nature_and_details_of_cargo') ? ' is-invalid' : '' }}" name="nature_and_details_of_cargo" value="{{$details->nature_and_details_of_cargo}}">
   <label class="form-control-placeholder" for="nature_and_details_of_cargo">Nature and Details of Cargo:</label>
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
     <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_payment_of_freight_amount" class="form-control{{ $errors->has('claim_for_payment_of_freight_amount') ? ' is-invalid' : '' }}" name="claim_for_payment_of_freight_amount" value="{{ number_format((float)$details->claim_for_payment_of_freight_amount, 2, '.', '') }}">
     <label class="form-control-placeholder" for="claim_for_payment_of_freight_amount">Value of Claim for Payment of Freight Amount({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('claim_for_payment_of_freight_amount'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_for_payment_of_freight_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="freight_amount_interest" class="form-control{{ $errors->has('freight_amount_interest') ? ' is-invalid' : '' }}" name="freight_amount_interest" value="{{$details->freight_amount_interest}}">
   <label class="form-control-placeholder" for="freight_amount_interest">Interest (%):</label>
   @if ($errors->has('freight_amount_interest'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('freight_amount_interest') }}</strong>
  </span>
  @endif
</div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="frightamountwithpoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" id="frightamountwithpoutinterest" class="form-control" style="width:7%" name="frightamountwithpoutinterest" value="yes" {{ $details->frightamountwithpoutinterest == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
</div>


<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="damage_amount" class="form-control{{ $errors->has('damage_amount') ? ' is-invalid' : '' }}" name="damage_amount" value="{{ number_format((float)$details->damage_amount, 2, '.', '') }}">
     <label class="form-control-placeholder" for="damage_amount">Value of Claim for Payment of Damages({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('damage_amount'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('damage_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="damage_amount_interest" class="form-control{{ $errors->has('damage_amount_interest') ? ' is-invalid' : '' }}" name="damage_amount_interest" value="{{$details->damage_amount_interest}}">
    <label class="form-control-placeholder" for="damage_amount_interest">Interest (%):</label>
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
   <input type="checkbox" class="form-control" id="damageamountinterestwithinterest"  name="damageamountinterestwithinterest" style="width:7%" value="yes" {{ $details->damageamountinterestwithinterest == 'yes' ? 'checked' : ''}}>
 </div>
</div>

</div>
<div class="row">
        <div class="col-md-4"> 
          <div class="form-group">
           <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_demurrages"   class="form-control{{ $errors->has('claim_for_demurrages') ? ' is-invalid' : '' }}" name="claim_for_demurrages" value="{{ number_format((float)$details->claim_for_demurrages, 2, '.', '') }}">
           <label class="form-control-placeholder" for="claim_for_demurrages">Value of Claim for Demurrages({{$claimantinformations[0]->currency}}): </label>
           @if ($errors->has('claim_for_demurrages'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claim_for_demurrages') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_demurrages_interest" class="form-control{{ $errors->has('claim_for_demurrages_interest') ? ' is-invalid' : '' }}" name="claim_for_demurrages_interest"  value="{{$details->claim_for_demurrages_interest}}">
          <label class="form-control-placeholder" for="claim_for_demurrages_interest">Interest (%): </label>
          @if ($errors->has('claim_for_demurrages_interest'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claim_for_demurrages_interest') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="col-md-4"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="claim_for_demurrages_withoutinterest" style="margin-left: 18px;">Without Interest</label>
         <input type="checkbox" class="form-control" id="claim_for_demurrages_withoutinterest"  name="claim_for_demurrages_withoutinterest" style="width:7%" value="yes" {{ $details->claim_for_demurrages_withoutinterest == 'yes' ? 'checked' : ''}} >
       </div>
     </div>
   </div>
   <div class="row">
    <div class="col-md-6"> 
      <div class="form-group">
        <input type="text" id="claim_for_specific_performance"  class="form-control{{ $errors->has('claim_for_specific_performance') ? ' is-invalid' : '' }}" name="claim_for_specific_performance" value="{{ number_format((float)$details->claim_for_specific_performance, 2, '.', '') }}">
        <label class="form-control-placeholder" for="claim_for_specific_performance">Claim Details for Specific Performance({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('claim_for_specific_performance'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_specific_performance') }}</strong>
        </span> 
        @endif
      </div>
    </div> 
    <div class="col-md-6"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="value_performance "  class="form-control{{ $errors->has('value_performance') ? ' is-invalid' : '' }}" name="value_performance" value="{{ number_format((float)$details->value_performance, 2, '.', '') }}">
        <label class="form-control-placeholder" for="value_performance">Value of Specific Performance({{$claimantinformations[0]->currency}}):
         </label>
        @if ($errors->has('value_performance'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('value_performance') }}</strong>
        </span> 
        @endif
      </div>
    </div> 
   </div> 



<div class="row">
<div class="col-md-3"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="termination_of_contract" style="margin-left: 26px;">Termination of Contract</label>
         <input type="checkbox" class="form-control" id="termination_of_contract"  name="termination_of_contract" style="width:10%"  value="yes" {{ $details->termination_of_contract == 'yes' ? 'checked' : ''}}>
       </div>
     </div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="estimated_value_of_contract" class="form-control{{ $errors->has('estimated_value_of_contract') ? ' is-invalid' : '' }}" name="estimated_value_of_contract" value="{{ number_format((float)$details->estimated_value_of_contract, 2, '.', '') }}">
    <label class="form-control-placeholder" for="estimated_value_of_contract">Value of contract({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('estimated_value_of_contract'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('estimated_value_of_contract') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="return_of_property" style="margin-left: 26px;">Return of Property</label>
         <input type="checkbox" class="form-control" id="return_of_property"  name="return_of_property" style="width:10%"  value="yes" {{ $details->return_of_property == 'yes' ? 'checked' : ''}} >
       </div>
     </div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="estimated_value_of_property" class="form-control{{ $errors->has('estimated_value_of_property') ? ' is-invalid' : '' }}" name="estimated_value_of_property" value="{{ number_format((float)$details->estimated_value_of_property, 2, '.', '') }}">
    <label class="form-control-placeholder" for="estimated_value_of_property">Value of Property({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('estimated_value_of_property'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('estimated_value_of_property') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row">
    <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="payment_consideration" class="form-control{{ $errors->has('payment_consideration') ? ' is-invalid' : '' }}" name="payment_consideration" value="{{ number_format((float)$details->payment_consideration, 2, '.', '') }}">
       <label class="form-control-placeholder" for="payment_consideration">Value of Claim for Expenses and Other Charges({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('payment_consideration'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('payment_consideration') }}</strong>
      </span> 
      @endif

    </div>
  </div>
 <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="payment_consideration_interest"  class="form-control{{ $errors->has('payment_consideration_interest') ? ' is-invalid' : '' }}" name="payment_consideration_interest" value="{{ $details->payment_consideration_interest}}">
       <label class="form-control-placeholder" for="payment_consideration_interest">With Interest (%):</label>
       @if ($errors->has('payment_consideration_interest'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('payment_consideration_interest') }}</strong>
      </span> 
      @endif

    </div>
  </div>
    <div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="payment_consideration_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="payment_consideration_withoutinterest"  name="payment_consideration_withoutinterest" style="width:7%" value="yes" {{ $details->payment_consideration_withoutinterest == 'yes' ? 'checked' : ''}} >
  </div>

</div>
   </div>
<div class="row">
    <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims"  class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims" value="{{ number_format((float)$details->value_claims, 2, '.', '') }}">
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
       <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" value="{{ $details->value_claims_interest}}">
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
    <input type="checkbox" class="form-control" id="value_claims_withoutinterest"  name="value_claims_withoutinterest" style="width:7%" value="yes" {{ $details->value_claims_withoutinterest == 'yes' ? 'checked' : ''}} >
  </div>

</div>
   </div>
   <div class="row">
    <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" value="{{ number_format((float)$details->interest_amount, 2, '.', '') }}">
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
       <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount including Interest(INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount including Interest(USD)<span style="color: red">*</span>:</label>
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
  