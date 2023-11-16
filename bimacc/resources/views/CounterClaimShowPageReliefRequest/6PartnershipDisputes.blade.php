    <div class="row register-form" style="pointer-events: none;">
      <div class="col-md-12">
        <div class="row"> 
         <div class="col-md-12">
         <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <!-- <label><b>Please fill in the applicable details  pertaining to the dispute</b></label> -->
          </div>
           <!-- <div class="form-group text-center" style="margin-bottom: 1.4em">
            <label><u><b>Firm’s Estimated Value:</b></u></label>
          </div> -->
        </div>
      </div>

 <div class="row">
    
   <div class="col-md-6">  
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" placeholder=" " value="{{ number_format((float)$details->damage_with_interest, 2, '.', '') }}">
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