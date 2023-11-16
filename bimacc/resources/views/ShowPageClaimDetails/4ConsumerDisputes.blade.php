    <div class="col-md-12" style="pointer-events: none;">
      <div class="row">
       <div class="col-md-12">
         <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
          <!-- <label><b>Edit the applicable details  pertaining to the dispute</b></label> -->
        </div>            
        <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Details</b></u></label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6"> 
        <div class="form-group">
          <input type="text" name="claimdetailsid" style="display: none" value="{{$details->claimdetailsid}}">
         <input type="text" id="details_of_goods" class="form-control{{ $errors->has('details_of_goods') ? ' is-invalid' : '' }}" name="details_of_goods" value="{{$details->details_of_goods}}">
         <label class="form-control-placeholder" for="details_of_goods">Details of Goods:</label>
         @if ($errors->has('details_of_goods'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('details_of_goods') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-6"> 
      <div class="form-group">
        <input type="text" id="details_of_service" class="form-control{{ $errors->has('details_of_service') ? ' is-invalid' : '' }}" name="details_of_service" value="{{$details->details_of_service}}">
        <label class="form-control-placeholder" for="details_of_service">Details of Service:</label>
        @if ($errors->has('details_of_service'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('details_of_service') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-6"> 
     <div class="form-group">
       <input type="text"  onkeypress="return isNumberKey(event)"  id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount"  value="{{ number_format((float)$details->claimamount, 2, '.', '') }}">
        @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Claim Amount (INR):</label>
       @else
        <label class="form-control-placeholder" for="claimamount">Claim Amount(USD) :</label>
           @endif       
           @if ($errors->has('claimamount'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claimamount') }}</strong>
      </span>
      @endif
    </div>
  </div>
 <div class="col-md-6"> 
     <div class="form-group">
       <input type="text"  class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim"  value="{{$details->reason_for_claim}}">
       <label class="form-control-placeholder" for="reason_for_claim">Reason for Claim <span style="color: red">*</span>:</label>
       @if ($errors->has('reason_for_claim'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('reason_for_claim') }}</strong>
      </span>
      @endif
    </div>
  </div>

</div>

<div class="row">
  <div class="col-md-4">  
    <div class="form-group">
      <input type="date"  id="date_of_contract" name="date_of_contract"  class="datechk form-control{{ $errors->has('date_of_contract') ? ' is-invalid' : '' }}"  value="{{$details->date_of_contract}}">
      
      <label class="form-control-placeholder" for="date_of_contract">Date of Contract:  </label>
      @if ($errors->has('date_of_contract'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('date_of_contract') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="date"  id="date_of_invoice" class="datechk form-control{{ $errors->has('date_of_invoice') ? ' is-invalid' : '' }}" name="date_of_invoice"  value="{{$details->date_of_invoice}}">
     <label class="form-control-placeholder" for="date_of_invoice">Date of Invoice: </label>
     @if ($errors->has('date_of_invoice'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_invoice') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="date"  id="date_of_warranty" class="datechk form-control{{ $errors->has('date_of_warranty') ? ' is-invalid' : '' }}" name="date_of_warranty" value="{{$details->date_of_warranty}}">
   <label class="form-control-placeholder" for="date_of_warranty">Date of Warranty:  </label>
   @if ($errors->has('date_of_warranty'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_warranty') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
 <div class="col-md-4"> 
  <div class="form-group">
   <input type="date"  id="date_of_breach" class="datechk form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach"  value="{{$details->date_of_breach}}">
   <label class="form-control-placeholder" for="date_of_breach">Date of Breach:  </label>
   @if ($errors->has('date_of_breach'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_breach') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="date"  id="default_date_of_cause_of_action" class="datechk form-control{{ $errors->has('default_date_of_cause_of_action') ? ' is-invalid' : '' }}" name="default_date_of_cause_of_action" value="{{$details->default_date_of_cause_of_action}}">
   <label class="form-control-placeholder" for="default_date_of_cause_of_action">Default Date of Cause Of Action: </label>
   @if ($errors->has('default_date_of_cause_of_action'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('default_date_of_cause_of_action') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="date"  id="date_of_notice" class="datechk form-control{{ $errors->has('date_of_notice') ? ' is-invalid' : '' }}" name="date_of_notice"  value="{{$details->date_of_notice}}">
   <label class="form-control-placeholder" for="date_of_notice">Date of Notice:</label>
   @if ($errors->has('date_of_notice'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_notice') }}</strong>
  </span>
  @endif
</div>
</div>

</div>
</div>