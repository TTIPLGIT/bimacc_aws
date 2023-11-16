<div class="row register-form" style="pointer-events: none;">
    <div class="col-md-12">

      <div class="row">
        <div class="col-md-12"> 
          <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
            <!-- <label><b>Edit the applicable details  pertaining to the dispute</b></label> -->
          </div>
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Nature of Relief:</b></u></label>
          </div>
        </div>
      </div>
     <div class="row">
            <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_consideration_amount" class="form-control{{ $errors->has('claim_for_consideration_amount') ? ' is-invalid' : '' }}" name="claim_for_consideration_amount"  value="{{ number_format((float)$details->claim_for_consideration_amount, 2, '.', '') }}">
            <label class="form-control-placeholder" for="claim_for_consideration_amount">Consideration Amount({{$claimantinformations[0]->currency}}):</label>
            @if ($errors->has('claim_for_consideration_amount'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_consideration_amount') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_consideration_amount_interest" class="form-control{{ $errors->has('claim_for_consideration_amount_interest') ? ' is-invalid' : '' }}" name="claim_for_consideration_amount_interest"  value="{{ $details->claim_for_consideration_amount_interest }}">
            <label class="form-control-placeholder" for="claim_for_consideration_amount_interest">With Interest(%):</label>
            @if ($errors->has('claim_for_consideration_amount_interest'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_consideration_amount_interest') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_for_consideration_amount_withoutinterest" style="margin-left: 18px;" >Without Interest(%)</label>
    <input type="checkbox" id="claim_for_consideration_amount_withoutinterest" class="form-control" style="width:7%" name="claim_for_consideration_amount_withoutinterest" value="yes" {{ $details->claim_for_consideration_amount_withoutinterest == 'yes' ? 'checked' : ''}}>
    
  </div>
</div>
      </div>
      <div class="row">
            <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_refund" class="form-control{{ $errors->has('claim_for_refund') ? ' is-invalid' : '' }}" name="claim_for_refund"  value="{{ number_format((float)$details->claim_for_refund, 2, '.', '') }}">
            <label class="form-control-placeholder" for="claim_for_refund">Refund Amount({{$claimantinformations[0]->currency}}):</label>
            @if ($errors->has('claim_for_refund'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_refund') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" onkeypress="return isNumberKey(event)"  id="refund_withinterest" class="form-control{{ $errors->has('refund_withinterest') ? ' is-invalid' : '' }}" name="refund_withinterest"  value="{{ $details->refund_withinterest }}">
            <label class="form-control-placeholder" for="refund_withinterest">With Interest(%):</label>
            @if ($errors->has('refund_withinterest'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('refund_withinterest') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="refund_withoutinterest" style="margin-left: 18px;" >Without Interest(%)</label>
    <input type="checkbox" id="refund_withoutinterest" class="form-control" style="width:7%" name="refund_withoutinterest" value="yes" {{ $details->refund_withoutinterest == 'yes' ? 'checked' : ''}}>
    
  </div>
</div>
      </div>
      <div class="row">
            <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_damages" class="form-control{{ $errors->has('claim_for_damages') ? ' is-invalid' : '' }}" name="claim_for_damages"  value="{{ number_format((float)$details->claim_for_damages, 2, '.', '') }}">
            <label class="form-control-placeholder" for="claim_for_damages">Damages({{$claimantinformations[0]->currency}}):</label>
            @if ($errors->has('claim_for_damages'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_damages') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_damages_interest" class="form-control{{ $errors->has('claim_for_damages_interest') ? ' is-invalid' : '' }}" name="claim_for_damages_interest"  value="{{ $details->claim_for_damages_interest }}">
            <label class="form-control-placeholder" for="claim_for_damages_interest">With Interest(%):</label>
            @if ($errors->has('claim_for_damages_interest'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_damages_interest') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_for_payment_of_damages_interest" style="margin-left: 18px;" >Without Interest(%)</label>
    <input type="checkbox" id="claim_for_payment_of_damages_interest" class="form-control" style="width:7%" name="claim_for_payment_of_damages_interest" value="yes" {{ $details->claim_for_payment_of_damages_interest == 'yes' ? 'checked' : ''}}>
    
  </div>
</div>
      </div>
      <div class="row">
            <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_specific_performance" class="form-control{{ $errors->has('claim_for_specific_performance') ? ' is-invalid' : '' }}" name="claim_for_specific_performance"  value="{{ number_format((float)$details->claim_for_specific_performance, 2, '.', '') }}">
            <label class="form-control-placeholder" for="claim_for_specific_performance">Specific Performance Value({{$claimantinformations[0]->currency}}):</label>
            @if ($errors->has('claim_for_specific_performance'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_specific_performance') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" onkeypress="return isNumberKey(event)"  id="value_performance_int" class="form-control{{ $errors->has('value_performance_int') ? ' is-invalid' : '' }}" name="value_performance_int"  value="{{ $details->value_performance_int }}">
            <label class="form-control-placeholder" for="value_performance_int">With Interest(%):</label>
            @if ($errors->has('value_performance_int'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('value_performance_int') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="value_performance_withoutint" style="margin-left: 18px;" >Without Interest(%)</label>
    <input type="checkbox" id="value_performance_withoutint" class="form-control" style="width:7%" name="value_performance_withoutint" value="yes" {{ $details->claim_for_payment_of_damages_interest == 'yes' ? 'checked' : ''}}>
    
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
       <input type="text" onkeypress="return isNumberKey(event)"  id="value_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" value="{{ $details->value_claims_interest }}">
       <label class="form-control-placeholder" for="value_claims_interest">With Interest(%):</label>
       @if ($errors->has('value_claims_interest'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('value_claims_interest') }}</strong>
      </span> 
      @endif

    </div>
  </div>
    <div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="value_claims_withoutinterest" style="margin-left: 18px;" >Without Interest(%)</label>
    <input type="checkbox" class="form-control" id="value_claims_withoutinterest"  name="value_claims_withoutinterest" style="width:7%" value="yes"  {{ $details->claim_for_consideration_amount_withoutinterest == 'yes' ? 'checked' : ''}}>
  </div>

</div>
   </div>
   <div class="row">
    <div class="col-md-6"> 
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
<div class="col-md-6"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest"  value="{{ number_format((float)$details->damage_with_interest, 2, '.', '') }}">
   @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount Including Interest(INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount Including Interest(USD) <span style="color: red">*</span>:</label>
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