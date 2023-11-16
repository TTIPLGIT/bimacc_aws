
        <div class="col-md-12" style="pointer-events: none;">
          <div class="row">
           <div class="col-md-12"> 
             <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <!-- <label><b>Please fill in the applicable details  pertaining to the dispute</b></label> -->
            </div> 
             
          </div>
           <div class="col-md-12">          
             <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Date of Contract</b></u></label>
            </div>
          </div>
        </div>
          
      
       <div class="row">
  <div class="col-md-3"> 
    <div class="form-group">
      
      <input type="date" id="cspartnership_deed_date" class="form-control{{ $errors->has('partnership_deed_date') ? ' is-invalid' : '' }}" name="partnership_deed_date"  value="{{$details->partnership_deed_date}}">
      <label class="form-control-placeholder" for="partnership_deed_date">Partnership Deed Date:</label>
      @if ($errors->has('partnership_deed_date'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('partnership_deed_date') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
   <div class="form-group">
     <input type="date" id="csdate_of_reconstitution" class="form-control{{ $errors->has('date_of_reconstitution') ? ' is-invalid' : '' }}" name="date_of_reconstitution"  value="{{$details->date_of_reconstitution}}" >
     <label class="form-control-placeholder" for="date_of_reconstitution">Date of Reconstitution:</label>
     @if ($errors->has('date_of_reconstitution'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_reconstitution') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
 <div class="form-group">
   <input type="date" id="csdate_of_dissolution" class="form-control{{ $errors->has('date_of_dissolution') ? ' is-invalid' : '' }}" name="date_of_dissolution"  value="{{$details->date_of_dissolution}}">
   <label class="form-control-placeholder" for="date_of_dissolution">Date of Dissolution:</label>
   @if ($errors->has('date_of_dissolution'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_dissolution') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
 <div class="form-group">
   <input type="date" id="csdate_of_agreement" class="form-control{{ $errors->has('date_of_agreement') ? ' is-invalid' : '' }}" name="date_of_agreement"  value="{{$details->date_of_agreement}}">
   <label class="form-control-placeholder" for="date_of_agreement">Date of Agreement:</label>
   @if ($errors->has('date_of_agreement'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_agreement') }}</strong>
  </span>
  @endif
</div>
</div>
</div>

<div class="row">

 <div class="col-md-4"> 
  <div class="form-group">
   <input type="text"  onkeypress="return isNumberKey(event)"  id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount" value="{{ number_format((float)$details->claimamount, 2, '.', '') }}">
   @if ($claimantinformations[0]->currency =='INR') 
   <label class="form-control-placeholder" for="claimamount">Estimated Value of the Firm(INR):</label>
   @else
   <label class="form-control-placeholder" for="claimamount">Estimated Value of the Firm(USD):</label>
   @endif   @if ($errors->has('claimamount'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claimamount') }}</strong>
  </span>
  @endif
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
   <input type="date" id="csdate_of_breach" class="form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach"  value="{{$details->date_of_breach}}">
   <label class="form-control-placeholder" for="date_of_breach">Date of Breach:</label>
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
   <input type="date" id="csdate_of_notice" class="form-control{{ $errors->has('date_of_notice') ? ' is-invalid' : '' }}" name="date_of_notice"  value="{{$details->date_of_notice}}">
   <label class="form-control-placeholder" for="date_of_notice">Date of Notice:</label>
   @if ($errors->has('date_of_notice'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_notice') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-6"> 
      <div class="form-group">
       <input type="text"  class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim"   value="{{ $details->reason_for_claim }}">
  
       <label class="form-control-placeholder" for="reason_for_claim">Reason For Claim<span style="color: red">*</span>:</label>
       @if ($errors->has('reason_for_claim'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('reason_for_claim') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>

 </div>   