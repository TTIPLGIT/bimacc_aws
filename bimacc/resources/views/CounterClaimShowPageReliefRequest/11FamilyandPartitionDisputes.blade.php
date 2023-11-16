  <div class="row register-form" style="pointer-events: none;">
    <div class="col-md-12">

       <div class="row">
        <div class="col-md-12"> 
          <!-- <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
            <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
          </div> -->
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Claim for Share in Property</b></u></label>
          </div>
        </div>
      </div>
      <div class="row">
        

       <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"   id="extent"  class="form-control{{ $errors->has('extent') ? ' is-invalid' : '' }}" name="extent" value="{{ number_format((float)$details->extent, 2, '.', '') }}">
          <label class="form-control-placeholder" for="extent">Total Value of Immovable Properties({{$claimantinformations[0]->currency}}):</label>
          @if ($errors->has('extent'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('extent') }}</strong>
          </span> 
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"   id="nature_of_property" class="form-control{{ $errors->has('nature_of_property') ? ' is-invalid' : '' }}" name="nature_of_property"  value="{{ number_format((float)$details->nature_of_property, 2, '.', '') }}">
         <label class="form-control-placeholder" for="nature_of_property">Total Value of Movable Properties({{$claimantinformations[0]->currency}}):</label>
         @if ($errors->has('nature_of_property'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('nature_of_property') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
          <div class="form-group">
           <label class="form-control-placeholder" for="rendition_of_accounts" style="margin-left: 18px;">Rendition of Accounts</label>
           <input type="checkbox" class="form-control" id="rendition_of_accounts"  name="rendition_of_accounts" style="width:7%" value="yes" {{ $details->rendition_of_accounts == 'yes' ? 'checked' : ''}}>
         </div>

       </div>

    

  </div>
  <div class="row">
    <div class="col-md-12"> 

      <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
        <label><u><b>Rendition and Distribution of Mense Profits</b></u></label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"   id="rendition_and_distribution_of_mense_profits"  class="form-control{{ $errors->has('rendition_and_distribution_of_mense_profits') ? ' is-invalid' : '' }}" name="rendition_and_distribution_of_mense_profits" value="{{ number_format((float)$details->rendition_and_distribution_of_mense_profits, 2, '.', '') }}">
        <label class="form-control-placeholder" for="rendition_and_distribution_of_mense_profits">Total Value({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('rendition_and_distribution_of_mense_profits'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('rendition_and_distribution_of_mense_profits') }}</strong>
        </span>  
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"   id="rendition_and_distribution_of_mense_profits_int"  class="form-control{{ $errors->has('rendition_and_distribution_of_mense_profits_int') ? ' is-invalid' : '' }}" name="rendition_and_distribution_of_mense_profits_int" value="{{ $details->rendition_and_distribution_of_mense_profits_int }}">
        <label class="form-control-placeholder" for="rendition_and_distribution_of_mense_profits_int">With Interest (%):</label>
        @if ($errors->has('rendition_and_distribution_of_mense_profits_int'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('rendition_and_distribution_of_mense_profits_int') }}</strong>
        </span> 
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
       <label class="form-control-placeholder" for="rendition_and_distribution_of_mense_profits_withoutint" style="margin-left: 18px;">Without Interest</label>
       <input type="checkbox" class="form-control" id="rendition_and_distribution_of_mense_profits_withoutint"  name="rendition_and_distribution_of_mense_profits_withoutint" style="width:7%" value="yes" {{ $details->rendition_and_distribution_of_mense_profits_withoutint == 'yes' ? 'checked' : ''}}>
     </div>

   </div>
 </div>
 <div class="row">

    <!-- <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"   id="rendition_of_accounts"  class="form-control{{ $errors->has('rendition_of_accounts') ? ' is-invalid' : '' }}" name="rendition_of_accounts" >
        <label class="form-control-placeholder" for="rendition_of_accounts">Rendition of Accounts </label>
        @if ($errors->has('rendition_of_accounts'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('rendition_of_accounts') }}</strong>
        </span> 
        @endif
      </div>
    </div> -->
    <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims"  class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims" value="{{ number_format((float)$details->value_claims, 2, '.', '') }}">
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
     <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" value="{{$details->value_claims_interest}}">
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
    <input type="text" onkeypress="return isNumberKey(event)"   id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" value="{{ number_format((float)$details->interest_amount, 2, '.', '') }}">
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
    <input type="text" onkeypress="return isNumberKey(event)"     class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" value="{{ number_format((float)$details->damage_with_interest, 2, '.', '') }}">
    @if ($claimantinformations[0]->currency =='INR') 
    <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount including Interest (INR)<span style="color: red">*</span>:</label>
    @else
    <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount including Interest (USD)<span style="color: red">*</span>:</label>
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