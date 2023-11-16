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
        <div class="col-md-12">
                       
             <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Details Of Contract</b></u></label>
            </div>
          </div>
       <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" name="claimdetailsid" style="display: none" value="{{$details->claimdetailsid}}">
        <input type="date"  id="date_of_employment" class="datechk form-control{{ $errors->has('date_of_employment') ? ' is-invalid' : '' }}" name="date_of_employment"  value="{{$details->date_of_employment}}" >
        <label class="form-control-placeholder" for="date_of_employment">Date of Employment:</label>
        @if ($errors->has('date_of_employment'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_employment') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-6"> 
      <div class="form-group">
        <input type="date"  id="date_of_consultancy_contract" class="datechk form-control{{ $errors->has('date_of_consultancy_contract') ? ' is-invalid' : '' }}" name="date_of_consultancy_contract"  value="{{$details->date_of_consultancy_contract}}">
        <label class="form-control-placeholder" for="date_of_consultancy_contract">Date of Consultancy Contract:</label>
        @if ($errors->has('date_of_consultancy_contract'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_consultancy_contract') }}</strong>
        </span>
        @endif
      </div>
    </div>   
  </div>
  <div class="row">
    <div class="col-md-6"> 
  <div class="form-group">
   <input type="date"  id="date_of_notice" class="datechk form-control{{ $errors->has('date_of_notice') ? ' is-invalid' : '' }}" name="date_of_notice"  value="{{$details->date_of_notice}}">
   <label class="form-control-placeholder" for="date_of_notice">Date of Notice:</label>
   @if ($errors->has('emd_date_of_notice'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('emd_date_of_notice') }}</strong>
  </span>
  @endif
</div>
</div>
  <div class="col-md-6"> 
    <div class="form-group">
     <input type="date"  id="date_of_breach" class="datechk form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach"  value="{{$details->date_of_breach}}">
     <label class="form-control-placeholder" for="date_of_breach">Date of Breach/ Date of Termination/ Resignation:</label>
     @if ($errors->has('date_of_breach'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_breach') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-6"> 
      <div class="form-group">
       <input type="text"  onkeypress="return isNumberKey(event)"  id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount"  value="{{ number_format((float)$details->claimamount, 2, '.', '') }}" >
       @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Claim Amount (INR):</label>
       @else
       <label class="form-control-placeholder" for="claimamount">Claim Amount (USD):</label>
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
   <input type="text"  class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim"   value="{{ $details->reason_for_claim }}">

   <label class="form-control-placeholder" for="reason_for_claim">Reason for Claim<span style="color: red">*</span>:</label>
   @if ($errors->has('reason_for_claim'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('reason_for_claim') }}</strong>
  </span>
  @endif
</div>
</div>


</div>
</div>