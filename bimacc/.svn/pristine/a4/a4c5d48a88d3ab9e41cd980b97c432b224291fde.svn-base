

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
            <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
          </div>
          
        </div>
      </div>
      <div class="row">
            <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="claim_for_consideration_amount" class="form-control{{ $errors->has('claim_for_consideration_amount') ? ' is-invalid' : '' }}" name="claim_for_consideration_amount">
            <label class="form-control-placeholder" for="claim_for_consideration_amount">Consideration Amount:</label>
            @if ($errors->has('claim_for_consideration_amount'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_consideration_amount') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="rclaim_for_consideration_amount_interest" class="form-control{{ $errors->has('claim_for_consideration_amount_interest') ? ' is-invalid' : '' }}" name="claim_for_consideration_amount_interest" >
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
    <label class="form-control-placeholder" for="claim_for_consideration_amount_withoutinterest" style="margin-left: 18px;">Without Interest(%)</label>
    <input type="checkbox" id="rclaim_for_consideration_amount_withoutinterest" class="form-control" style="width:7%" name="claim_for_consideration_amount_withoutinterest" value="yes" >
    
  </div>
</div>
      </div>
      <div class="row">
            <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="claim_for_refund" class="form-control{{ $errors->has('claim_for_refund') ? ' is-invalid' : '' }}" name="claim_for_refund" >
            <label class="form-control-placeholder" for="claim_for_refund">Refund Amount:</label>
            @if ($errors->has('claim_for_refund'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_refund') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="rrefund_withinterest" class="form-control{{ $errors->has('refund_withinterest') ? ' is-invalid' : '' }}" name="refund_withinterest" >
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
    <label class="form-control-placeholder" for="refund_withoutinterest" style="margin-left: 18px;">Without Interest(%)</label>
    <input type="checkbox" id="rrefund_withoutinterest" class="form-control" style="width:7%" name="refund_withoutinterest" value="yes" >
    
  </div>
</div>
      </div>
      <div class="row">
            <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="claim_for_damages" class="form-control{{ $errors->has('claim_for_damages') ? ' is-invalid' : '' }}" name="claim_for_damages" >
            <label class="form-control-placeholder" for="claim_for_damages">Damages:</label>
            @if ($errors->has('claim_for_damages'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_damages') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="rclaim_for_damages_interest" class="form-control{{ $errors->has('claim_for_damages_interest') ? ' is-invalid' : '' }}" name="claim_for_damages_interest" >
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
    <label class="form-control-placeholder" for="claim_for_payment_of_damages_interest" style="margin-left: 18px;">Without Interest(%)</label>
    <input type="checkbox" id="rclaim_for_payment_of_damages_interest" class="form-control" style="width:7%" name="claim_for_payment_of_damages_interest" value="yes" >
    
  </div>
</div>
      </div>
      <div class="row">
            <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="claim_for_specific_performance" class="form-control{{ $errors->has('claim_for_specific_performance') ? ' is-invalid' : '' }}" name="claim_for_specific_performance" >
            <label class="form-control-placeholder" for="claim_for_specific_performance">Specific Performance Value:</label>
            @if ($errors->has('claim_for_specific_performance'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claim_for_specific_performance') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="rvalue_performance_int" class="form-control{{ $errors->has('value_performance_int') ? ' is-invalid' : '' }}" name="value_performance_int" >
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
    <label class="form-control-placeholder" for="value_performance_withoutint" style="margin-left: 18px;">Without Interest(%)</label>
    <input type="checkbox" id="rvalue_performance_withoutint" class="form-control" style="width:7%" name="value_performance_withoutint" value="yes" >
    
  </div>
</div>
      </div>
      <div class="row">
    <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" id="value_claims"  class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims" >
       <label class="form-control-placeholder" for="value_claims">Total Value Claimed:</label>
       @if ($errors->has('value_claims'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('value_claims') }}</strong>
      </span> 
      @endif

    </div>
  </div>
 <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" id="rvalue_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" >
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
     <label class="form-control-placeholder" for="value_claims_withoutinterest" style="margin-left: 18px;">Without Interest(%)</label>
    <input type="checkbox" class="form-control" id="rvalue_claims_withoutinterest"  name="value_claims_withoutinterest" style="width:7%" value="yes"  >
  </div>

</div>
   </div>
   <div class="row">
    <div class="col-md-6"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)" id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount">
    <label class="form-control-placeholder" for="interest_amount">Interest Amount:</label>
    @if ($errors->has('interest_amount'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('interest_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)" id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
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

<script>
  $('#rclaim_for_consideration_amount_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rclaim_for_consideration_amount_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rclaim_for_consideration_amount_interest').val("");

            } else {
               document.getElementById("rclaim_for_consideration_amount_interest").disabled = false;
                $('#rclaim_for_consideration_amount_interest').val("");
            }
});
   $('#rrefund_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rrefund_withoutinterest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rrefund_withoutinterest').val("");

            } else {
               document.getElementById("rrefund_withoutinterest").disabled = false;
                $('#rrefund_withoutinterest').val("");
            }
});
    $('#rclaim_for_payment_of_damages_interest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rclaim_for_damages_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rclaim_for_damages_interest').val("");

            } else {
               document.getElementById("rclaim_for_damages_interest").disabled = false;
                $('#rclaim_for_damages_interest').val("");
            }
});
     $('#rvalue_performance_withoutint').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rvalue_performance_int").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rvalue_performance_int').val("");

            } else {
               document.getElementById("rvalue_performance_int").disabled = false;
                $('#rvalue_performance_int').val("");
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