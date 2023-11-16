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
       <div class="col-md-12">        
         <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
          <label><u><b>Claim for Arrears of Subscriptions/ Contributions/ Damages</b></u></label>
        </div>      
    </div>
  </div>
    <div class="row"> 
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_subs_contrib_amount" class="form-control{{ $errors->has('claim_subs_contrib_amount') ? ' is-invalid' : '' }}" name="claim_subs_contrib_amount" >
        @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Amount (INR):</label>
       @else
        <label class="form-control-placeholder" for="claimamount">Amount(USD):</label>
           @endif
              @if ($errors->has('claim_subs_contrib_amount'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_subs_contrib_amount') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="claim_subs_contrib_amount_interest" class="form-control{{ $errors->has('claim_subs_contrib_amount_interest') ? ' is-invalid' : '' }}" name="claim_subs_contrib_amount_interest"  >
     <label class="form-control-placeholder" for="claim_subs_contrib_amount_interest">Interest (%):</label>
     @if ($errors->has('claim_subs_contrib_amount_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_subs_contrib_amount_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_subs_contrib_amount_withoutinterest" style="margin-left: 15px;">Without Interest</label>
    <input type="checkbox" id="claim_subs_contrib_amount_withoutinterest" class="form-control" style="width:7%" name="claim_subs_contrib_amount_withoutinterest" value="yes" >
    
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-6"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" >
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
    <input type="text" onkeypress="return isNumberKey(event)"  id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
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
  </div>

<div class="row">
       <div class="col-md-12"> 
       
         <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
          <label><u><b>Claim for Refund of Deposits</b></u></label>
        </div>
      
    </div>
  </div>
    <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_refund_deposit_amount" class="form-control{{ $errors->has('claim_refund_deposit_amount') ? ' is-invalid' : '' }}" name="claim_refund_deposit_amount"  >
       @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Amount (INR):</label>
       @else
        <label class="form-control-placeholder" for="claimamount">Amount(USD): </label>
           @endif
       
       @if ($errors->has('claim_refund_deposit_amount'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_refund_deposit_amount') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="claim_refund_deposit_amount_interest" class="form-control{{ $errors->has('claim_refund_deposit_amount_interest') ? ' is-invalid' : '' }}" name="claim_refund_deposit_amount_interest"  >
     <label class="form-control-placeholder" for="claim_refund_deposit_amount_interest">Interest (%):</label>
     @if ($errors->has('claim_refund_deposit_amount_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_refund_deposit_amount_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_refund_deposit_amount_withoutinterest" style="margin-left: 15px;">Without Interest</label>
    <input type="checkbox" id="claim_refund_deposit_amount_withoutinterest" class="form-control" style="width:7%" name="claim_refund_deposit_amount_withoutinterest" value="yes" >
    
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_for_admission_and_removal_of_members_check" style="margin-left: 15px;margin-top: -8px;">Claim for Admission and Removal of Members</label>
    <input type="checkbox" id="claim_for_admission_and_removal_of_members_check" class="form-control" style="width:9%" name="claim_for_admission_and_removal_of_members_check" value="yes" >
    
  </div>
</div>
    <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_admission_and_removal_of_members" class="form-control{{ $errors->has('claim_for_admission_and_removal_of_members') ? ' is-invalid' : '' }}" name="claim_for_admission_and_removal_of_members" >
       <label class="form-control-placeholder" for="claim_for_admission_and_removal_of_members">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_admission_and_removal_of_members'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_admission_and_removal_of_members') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_remove_or_reinstate_office_bearers_check" style="margin-left: 15px;margin-top: -8px;">Claim to Remove or Reinstate Office Bearers</label>
    <input type="checkbox" id="claim_to_remove_or_reinstate_office_bearers_check" class="form-control" style="width:9%" name="claim_to_remove_or_reinstate_office_bearers_check" value="yes" >
    
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_remove_or_reinstate_office_bearers" class="form-control{{ $errors->has('claim_to_remove_or_reinstate_office_bearers') ? ' is-invalid' : '' }}" name="claim_to_remove_or_reinstate_office_bearers" >
       <label class="form-control-placeholder" for="claim_to_remove_or_reinstate_office_bearers">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_remove_or_reinstate_office_bearers'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_remove_or_reinstate_office_bearers') }}</strong>
      </span>
      @endif
    </div>
  </div>
  </div>

<div class="row">
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_for_holding_or_postponement_of_elections_check" style="margin-left: 15px;margin-top: -8px;">Claim for Holding or Postponement of Elections</label>
    <input type="checkbox" id="claim_for_holding_or_postponement_of_elections_check" class="form-control" style="width:9%" name="claim_for_holding_or_postponement_of_elections_check" value="yes" >
    
  </div>
</div>
    <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_holding_or_postponement_of_elections" class="form-control{{ $errors->has('claim_for_holding_or_postponement_of_elections') ? ' is-invalid' : '' }}" name="claim_for_holding_or_postponement_of_elections" >
       <label class="form-control-placeholder" for="claim_for_holding_or_postponement_of_elections">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_holding_or_postponement_of_elections'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_holding_or_postponement_of_elections') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_appoint_auditors_or_investigators_check" style="margin-left: 15px;margin-top: -8px;">Claim to Appoint Auditors or Investigators</label>
    <input type="checkbox" id="claim_to_appoint_auditors_or_investigators_check" class="form-control" style="width:9%" name="claim_to_appoint_auditors_or_investigators_check" value="yes" >
    
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_appoint_auditors_or_investigators" class="form-control{{ $errors->has('claim_to_appoint_auditors_or_investigators') ? ' is-invalid' : '' }}" name="claim_to_appoint_auditors_or_investigators" >
       <label class="form-control-placeholder" for="claim_to_appoint_auditors_or_investigators">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_appoint_auditors_or_investigators'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_appoint_auditors_or_investigators') }}</strong>
      </span>
      @endif
    </div>
  </div>
  </div>


  <div class="row">
     <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_appoint_auditors_check" style="margin-left: 15px;">Claim to Appoint Auditors</label>
    <input type="checkbox" id="claim_to_appoint_auditors_check" class="form-control" style="width:9%" name="claim_to_appoint_auditors_check" value="yes" >
    
  </div>
</div>
    <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_appoint_auditors" class="form-control{{ $errors->has('claim_to_appoint_auditors') ? ' is-invalid' : '' }}" name="claim_to_appoint_auditors" >
       <label class="form-control-placeholder" for="claim_to_appoint_auditors">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_appoint_auditors'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_appoint_auditors') }}</strong>
      </span>
      @endif
    </div>
  </div>
   <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_render_accounts_check" style="margin-left: 15px;">Claim to Render Accounts</label>
    <input type="checkbox" id="claim_to_render_accounts_check" class="form-control" style="width:9%" name="claim_to_render_accounts_check" value="yes" >
    
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_render_accounts" class="form-control{{ $errors->has('claim_to_render_accounts') ? ' is-invalid' : '' }}" name="claim_to_render_accounts"  >
       <label class="form-control-placeholder" for="claim_to_render_accounts">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_render_accounts'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_render_accounts') }}</strong>
      </span>
      @endif
    </div>
  </div>

  </div>

  <div class="row">
    <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_against_members_for_damages_and_nuisance_check" style="margin-left: 15px;margin-top: -8px;">Claim Against Members for Damages and Nuisance</label>
    <input type="checkbox" id="claim_against_members_for_damages_and_nuisance_check" class="form-control" style="width:9%" name="claim_against_members_for_damages_and_nuisance_check" value="yes" >
    
  </div>
</div>
    <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_against_members_for_damages_and_nuisance" class="form-control{{ $errors->has('claim_against_members_for_damages_and_nuisance') ? ' is-invalid' : '' }}" name="claim_against_members_for_damages_and_nuisance" >
       <label class="form-control-placeholder" for="claim_against_members_for_damages_and_nuisance">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_against_members_for_damages_and_nuisance'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_against_members_for_damages_and_nuisance') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_carryout_repairs_or_renovation_check" style="margin-left: 15px;">Claim to Carryout Repairs or Renovation</label>
    <input type="checkbox" id="claim_to_carryout_repairs_or_renovation_check" class="form-control" style="width:9%" name="claim_to_carryout_repairs_or_renovation_check" value="yes" >
    
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_carryout_repairs_or_renovation" class="form-control{{ $errors->has('claim_to_carryout_repairs_or_renovation') ? ' is-invalid' : '' }}" name="claim_to_carryout_repairs_or_renovation"  >
       <label class="form-control-placeholder" for="claim_to_carryout_repairs_or_renovation">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_carryout_repairs_or_renovation'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_carryout_repairs_or_renovation') }}</strong>
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
       <div class="col-md-12"> 
       
         <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
          <label><u><b>Claim for Arrears of Subscriptions/ Contributions/ Damages</b></u></label>
        </div>
      
    </div>
  </div>
    <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  name="reliefrequestid" value="{{$ReliefRequest->id}}" style="display: none">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_subs_contrib_amount" class="form-control{{ $errors->has('claim_subs_contrib_amount') ? ' is-invalid' : '' }}" name="claim_subs_contrib_amount"   value="{{ number_format((float)$ReliefRequest->claimamount, 2, '.', '') }}">
       @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Amount (INR):</label>
       @else
        <label class="form-control-placeholder" for="claimamount">Amount(USD):</label>
           @endif
       
       @if ($errors->has('claim_subs_contrib_amount'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_subs_contrib_amount') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="claim_subs_contrib_amount_interest" class="form-control{{ $errors->has('claim_subs_contrib_amount_interest') ? ' is-invalid' : '' }}" name="claim_subs_contrib_amount_interest"   value="{{$ReliefRequest->claim_subs_contrib_amount_interest}}">
     <label class="form-control-placeholder" for="claim_subs_contrib_amount_interest">Interest (%):</label>
     @if ($errors->has('claim_subs_contrib_amount_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_subs_contrib_amount_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_subs_contrib_amount_withoutinterest" style="margin-left: 15px;">Without Interest</label>
    <input type="checkbox" id="claim_subs_contrib_amount_withoutinterest" class="form-control" style="width:7%" name="claim_subs_contrib_amount_withoutinterest" value="yes" {{ $ReliefRequest->claim_subs_contrib_amount_withoutinterest == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount"  class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" value="{{ number_format((float)$ReliefRequest->claimamount, 2, '.', '') }}">
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
    <input type="text" onkeypress="return isNumberKey(event)"  id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" value="{{ number_format((float)$ReliefRequest->damage_with_interest, 2, '.', '') }}">
   @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Total Relief Amount Including Interest (INR)<span style="color: red">*</span>:</label>
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
<div class="row">
       <div class="col-md-12"> 
       
         <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
          <label><u><b>Claim for Refund of Deposits</b></u></label>
        </div>
      
    </div>
  </div>
    <div class="row">
    <div class="col-md-4">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_refund_deposit_amount" class="form-control{{ $errors->has('claim_refund_deposit_amount') ? ' is-invalid' : '' }}" name="claim_refund_deposit_amount"  value="{{ number_format((float)$ReliefRequest->claim_refund_deposit_amount, 2, '.', '') }}">
        @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Amount (INR):<span style="color: red">*</span></label>
       @else
        <label class="form-control-placeholder" for="claimamount">Amount(USD): <span style="color: red">*</span></label>
           @endif
       
       @if ($errors->has('claim_refund_deposit_amount'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_refund_deposit_amount') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="claim_refund_deposit_amount_interest" class="form-control{{ $errors->has('claim_refund_deposit_amount_interest') ? ' is-invalid' : '' }}" name="claim_refund_deposit_amount_interest"  value="{{$ReliefRequest->claim_refund_deposit_amount_interest}}">
     <label class="form-control-placeholder" for="claim_refund_deposit_amount_interest">Interest (%):</label>
     @if ($errors->has('claim_refund_deposit_amount_interest'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_refund_deposit_amount_interest') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_refund_deposit_amount_withoutinterest" style="margin-left: 15px;">Without Interest</label>
    <input type="checkbox" id="claim_refund_deposit_amount_withoutinterest" class="form-control" style="width:7%" name="claim_refund_deposit_amount_withoutinterest" value="yes" {{ $ReliefRequest->claim_refund_deposit_amount_withoutinterest == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_for_admission_and_removal_of_members_check" style="margin-left: 15px;margin-top: -8px;">Claim for Admission and Removal of Members</label>
    <input type="checkbox" id="claim_for_admission_and_removal_of_members_check" class="form-control" style="width:9%" name="claim_for_admission_and_removal_of_members_check" value="yes" {{ $ReliefRequest->claim_for_admission_and_removal_of_members_check == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
    <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_admission_and_removal_of_members" class="form-control{{ $errors->has('claim_for_admission_and_removal_of_members') ? ' is-invalid' : '' }}" name="claim_for_admission_and_removal_of_members" value="{{ number_format((float)$ReliefRequest->claim_for_admission_and_removal_of_members, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_for_admission_and_removal_of_members">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_admission_and_removal_of_members'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_admission_and_removal_of_members') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_remove_or_reinstate_office_bearers_check" style="margin-left: 15px;margin-top: -8px;">Claim to Remove or Reinstate Office Bearers</label>
    <input type="checkbox" id="claim_to_remove_or_reinstate_office_bearers_check" class="form-control" style="width:9%" name="claim_to_remove_or_reinstate_office_bearers_check" value="yes" {{ $ReliefRequest->claim_to_remove_or_reinstate_office_bearers_check == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_remove_or_reinstate_office_bearers" class="form-control{{ $errors->has('claim_to_remove_or_reinstate_office_bearers') ? ' is-invalid' : '' }}" name="claim_to_remove_or_reinstate_office_bearers" value="{{ number_format((float)$ReliefRequest->claim_to_remove_or_reinstate_office_bearers, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_to_remove_or_reinstate_office_bearers">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_remove_or_reinstate_office_bearers'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_remove_or_reinstate_office_bearers') }}</strong>
      </span>
      @endif
    </div>
  </div>
  </div>

<div class="row">
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_for_holding_or_postponement_of_elections_check" style="margin-left: 15px;margin-top: -8px;">Claim for Holding or Postponement of Elections</label>
    <input type="checkbox" id="claim_for_holding_or_postponement_of_elections_check" class="form-control" style="width:9%" name="claim_for_holding_or_postponement_of_elections_check" value="yes" {{ $ReliefRequest->claim_for_holding_or_postponement_of_elections_check == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
    <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_holding_or_postponement_of_elections" class="form-control{{ $errors->has('claim_for_holding_or_postponement_of_elections') ? ' is-invalid' : '' }}" name="claim_for_holding_or_postponement_of_elections" value="{{ number_format((float)$ReliefRequest->claim_for_holding_or_postponement_of_elections, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_for_holding_or_postponement_of_elections">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_holding_or_postponement_of_elections'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_holding_or_postponement_of_elections') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_appoint_auditors_or_investigators_check" style="margin-left: 15px;margin-top: -8px;">Claim to Appoint Auditors or Investigators</label>
    <input type="checkbox" id="claim_to_appoint_auditors_or_investigators_check" class="form-control" style="width:9%" name="claim_to_appoint_auditors_or_investigators_check" value="yes" {{ $ReliefRequest->claim_to_appoint_auditors_or_investigators_check == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_appoint_auditors_or_investigators" class="form-control{{ $errors->has('claim_to_appoint_auditors_or_investigators') ? ' is-invalid' : '' }}" name="claim_to_appoint_auditors_or_investigators" value="{{ number_format((float)$ReliefRequest->claim_to_appoint_auditors_or_investigators, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_to_appoint_auditors_or_investigators">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_appoint_auditors_or_investigators'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_appoint_auditors_or_investigators') }}</strong>
      </span>
      @endif
    </div>
  </div>
  </div>


  <div class="row">
     <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_appoint_auditors_check" style="margin-left: 15px;">Claim to Appoint Auditors</label>
    <input type="checkbox" id="claim_to_appoint_auditors_check" class="form-control" style="width:9%" name="claim_to_appoint_auditors_check" value="yes" {{ $ReliefRequest->claim_to_appoint_auditors_check == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
    <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_appoint_auditors" class="form-control{{ $errors->has('claim_to_appoint_auditors') ? ' is-invalid' : '' }}" name="claim_to_appoint_auditors" value="{{ number_format((float)$ReliefRequest->claim_to_appoint_auditors, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_to_appoint_auditors">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_appoint_auditors'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_appoint_auditors') }}</strong>
      </span>
      @endif
    </div>
  </div>
   <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_render_accounts_check" style="margin-left: 15px;">Claim to Render Accounts</label>
    <input type="checkbox" id="claim_to_render_accounts_check" class="form-control" style="width:9%" name="claim_to_render_accounts_check" value="yes" {{ $ReliefRequest->claim_to_render_accounts_check == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_render_accounts" class="form-control{{ $errors->has('claim_to_render_accounts') ? ' is-invalid' : '' }}" name="claim_to_render_accounts"  value="{{ number_format((float)$ReliefRequest->claim_to_render_accounts, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_to_render_accounts">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_render_accounts'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_render_accounts') }}</strong>
      </span>
      @endif
    </div>
  </div>

  </div>

  <div class="row">
    <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_against_members_for_damages_and_nuisance_check" style="margin-left: 15px;margin-top: -8px;">Claim Against Members for Damages and Nuisance</label>
    <input type="checkbox" id="claim_against_members_for_damages_and_nuisance_check" class="form-control" style="width:9%" name="claim_against_members_for_damages_and_nuisance_check" value="yes" {{ $ReliefRequest->claim_against_members_for_damages_and_nuisance_check == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
    <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_against_members_for_damages_and_nuisance" class="form-control{{ $errors->has('claim_against_members_for_damages_and_nuisance') ? ' is-invalid' : '' }}" name="claim_against_members_for_damages_and_nuisance" value="{{ number_format((float)$ReliefRequest->claim_against_members_for_damages_and_nuisance, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_against_members_for_damages_and_nuisance">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_against_members_for_damages_and_nuisance'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_against_members_for_damages_and_nuisance') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_to_carryout_repairs_or_renovation_check" style="margin-left: 15px;">Claim to Carryout Repairs or Renovation</label>
    <input type="checkbox" id="claim_to_carryout_repairs_or_renovation_check" class="form-control" style="width:9%" name="claim_to_carryout_repairs_or_renovation_check" value="yes" {{ $ReliefRequest->claim_to_carryout_repairs_or_renovation_check == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
  <div class="col-md-3">  
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="claim_to_carryout_repairs_or_renovation" class="form-control{{ $errors->has('claim_to_carryout_repairs_or_renovation') ? ' is-invalid' : '' }}" name="claim_to_carryout_repairs_or_renovation"  value="{{ number_format((float)$ReliefRequest->claim_to_carryout_repairs_or_renovation, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_to_carryout_repairs_or_renovation">Value({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_to_carryout_repairs_or_renovation'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_to_carryout_repairs_or_renovation') }}</strong>
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
$('#claim_subs_contrib_amount_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("claim_subs_contrib_amount_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#claim_subs_contrib_amount_interest').val("");

            } else {
               document.getElementById("claim_subs_contrib_amount_interest").disabled = false;
                $('#claim_subs_contrib_amount_interest').val("");
            }
});
$('#claim_refund_deposit_amount_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("claim_refund_deposit_amount_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#claim_refund_deposit_amount_interest').val("");

            } else {
               document.getElementById("claim_refund_deposit_amount_interest").disabled = false;
                $('#claim_refund_deposit_amount_interest').val("");
            }
});
// $('#claim_for_admission_and_removal_of_members_check').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("claim_for_admission_and_removal_of_members").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#claim_for_admission_and_removal_of_members').val("");

//             } else {
//                document.getElementById("claim_for_admission_and_removal_of_members").disabled = false;
//                 $('#claim_for_admission_and_removal_of_members').val("");
//             }
// });
// $('#claim_to_remove_or_reinstate_office_bearers_check').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("claim_to_remove_or_reinstate_office_bearers").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#claim_to_remove_or_reinstate_office_bearers').val("");

//             } else {
//                document.getElementById("claim_to_remove_or_reinstate_office_bearers").disabled = false;
//                 $('#claim_to_remove_or_reinstate_office_bearers').val("");
//             }
// });
// $('#claim_for_holding_or_postponement_of_elections_check').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("claim_for_holding_or_postponement_of_elections").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#claim_for_holding_or_postponement_of_elections').val("");

//             } else {
//                document.getElementById("claim_for_holding_or_postponement_of_elections").disabled = false;
//                 $('#claim_for_holding_or_postponement_of_elections').val("");
//             }
// });
// $('#claim_to_appoint_auditors_or_investigators_check').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("claim_to_appoint_auditors_or_investigators").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#claim_to_appoint_auditors_or_investigators').val("");

//             } else {
//                document.getElementById("claim_to_appoint_auditors_or_investigators").disabled = false;
//                 $('#claim_to_appoint_auditors_or_investigators').val("");
//             }
// });
// $('#claim_to_appoint_auditors_check').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("claim_to_appoint_auditors").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#claim_to_appoint_auditors').val("");

//             } else {
//                document.getElementById("claim_to_appoint_auditors").disabled = false;
//                 $('#claim_to_appoint_auditors').val("");
//             }
// });
// $('#claim_to_render_accounts_check').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("claim_to_render_accounts").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#claim_to_render_accounts').val("");

//             } else {
//                document.getElementById("claim_to_render_accounts").disabled = false;
//                 $('#claim_to_render_accounts').val("");
//             }
// });
// $('#claim_against_members_for_damages_and_nuisance_check').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("claim_against_members_for_damages_and_nuisance").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#claim_against_members_for_damages_and_nuisance').val("");

//             } else {
//                document.getElementById("claim_against_members_for_damages_and_nuisance").disabled = false;
//                 $('#claim_to_render_accounts').val("");
//             }
// });
// $('#claim_to_carryout_repairs_or_renovation_check').on('click', function () {
//   if ($(this).prop('checked')) {
//                 document.getElementById("claim_to_carryout_repairs_or_renovation").disabled = true;
//                 //$('#demand_for_licence_fee_interest').disabled();
//                 $('#claim_to_carryout_repairs_or_renovation').val("");

//             } else {
//                document.getElementById("claim_to_carryout_repairs_or_renovation").disabled = false;
//                 $('#claim_to_carryout_repairs_or_renovation').val("");
//             }
// });


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