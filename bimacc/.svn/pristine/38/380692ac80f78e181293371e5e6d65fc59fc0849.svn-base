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
            <label><u><b>Claim for Share in Property</b></u></label>
          </div>
        </div>
      </div>
      <div class="row">
        

       <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"   id="extent"  class="form-control{{ $errors->has('extent') ? ' is-invalid' : '' }}" name="extent" >
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
         <input type="text" onkeypress="return isNumberKey(event)"   id="nature_of_property" class="form-control{{ $errors->has('nature_of_property') ? ' is-invalid' : '' }}" name="nature_of_property"  >
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
           <input type="checkbox" class="form-control" id="rendition_of_accounts"  name="rendition_of_accounts" style="width:7%" value="yes">
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
        <input type="text" onkeypress="return isNumberKey(event)"   id="rendition_and_distribution_of_mense_profits"  class="form-control{{ $errors->has('rendition_and_distribution_of_mense_profits') ? ' is-invalid' : '' }}" name="rendition_and_distribution_of_mense_profits" >
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
        <input type="text" onkeypress="return isNumberKey(event)"   id="rendition_and_distribution_of_mense_profits_int"  class="form-control{{ $errors->has('rendition_and_distribution_of_mense_profits_int') ? ' is-invalid' : '' }}" name="rendition_and_distribution_of_mense_profits_int" >
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
       <input type="checkbox" class="form-control" id="rendition_and_distribution_of_mense_profits_withoutint"  name="rendition_and_distribution_of_mense_profits_withoutint" style="width:7%" value="yes">
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
       <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims" class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims" >
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
     <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" >
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
  <input type="text" onkeypress="return isNumberKey(event)"   name="reliefrequestid" value="{{$ReliefRequest->id}}" style="display: none">
  <div class="row register-form">
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
          <input type="text" onkeypress="return isNumberKey(event)"   id="extent"  class="form-control{{ $errors->has('extent') ? ' is-invalid' : '' }}" name="extent" value="{{ number_format((float)$ReliefRequest->extent, 2, '.', '') }}">
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
         <input type="text" onkeypress="return isNumberKey(event)"   id="nature_of_property" class="form-control{{ $errors->has('nature_of_property') ? ' is-invalid' : '' }}" name="nature_of_property"  value="{{ number_format((float)$ReliefRequest->nature_of_property, 2, '.', '') }}">
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
           <input type="checkbox" class="form-control" id="rendition_of_accounts"  name="rendition_of_accounts" style="width:7%" value="yes" {{ $ReliefRequest->rendition_of_accounts == 'yes' ? 'checked' : ''}}>
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
        <input type="text" onkeypress="return isNumberKey(event)"   id="rendition_and_distribution_of_mense_profits"  class="form-control{{ $errors->has('rendition_and_distribution_of_mense_profits') ? ' is-invalid' : '' }}" name="rendition_and_distribution_of_mense_profits" value="{{ number_format((float)$ReliefRequest->rendition_and_distribution_of_mense_profits, 2, '.', '') }}">
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
        <input type="text" onkeypress="return isNumberKey(event)"   id="rendition_and_distribution_of_mense_profits_int"  class="form-control{{ $errors->has('rendition_and_distribution_of_mense_profits_int') ? ' is-invalid' : '' }}" name="rendition_and_distribution_of_mense_profits_int" value="{{ $ReliefRequest->rendition_and_distribution_of_mense_profits_int }}">
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
       <input type="checkbox" class="form-control" id="rendition_and_distribution_of_mense_profits_withoutint"  name="rendition_and_distribution_of_mense_profits_withoutint" style="width:7%" value="yes" {{ $ReliefRequest->rendition_and_distribution_of_mense_profits_withoutint == 'yes' ? 'checked' : ''}}>
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
       <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims"  class="form-control{{ $errors->has('value_claims') ? ' is-invalid' : '' }}" name="value_claims" value="{{ number_format((float)$ReliefRequest->value_claims, 2, '.', '') }}">
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
     <input type="text" onkeypress="return isNumberKey(event)"   id="value_claims_interest"  class="form-control{{ $errors->has('value_claims_interest') ? ' is-invalid' : '' }}" name="value_claims_interest" value="{{$ReliefRequest->value_claims_interest}}">
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
<script>
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
   $('#rendition_and_distribution_of_mense_profits_withoutint').on('click', function () {
    if ($(this).prop('checked')) {
      document.getElementById("rendition_and_distribution_of_mense_profits_int").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rendition_and_distribution_of_mense_profits_int').val("");

              } else {
               document.getElementById("rendition_and_distribution_of_mense_profits_int").disabled = false;
               $('#rendition_and_distribution_of_mense_profits_int').val("");
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