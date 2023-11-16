        <div class="col-md-12" style="pointer-events: none;">
          <div class="row">
           <div class="col-md-12">
             <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <!-- <label><b>Please fill in the applicable details  pertaining to the dispute</b></label> -->
            </div>            
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Details</b></u></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"> 
            <div class="form-group">
              
             <input type="number" id="csamount_inr_usd" class="form-control{{ $errors->has('amount_inr_usd') ? ' is-invalid' : '' }}" name="claimamount"  value="{{ number_format((float)$details->claimamount, 2, '.', '') }}">
            @if ($details->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Total Contract Value (INR):</label>
       @else
        <label class="form-control-placeholder" for="claimamount">Total Contract Value (USD):</label>
           @endif
             @if ($errors->has('claimamount'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claimamount') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="col-md-4">  
        <div class="form-group">
          <input type="date" id="csdate_of_contract" name="date_of_contract"  class="form-control{{ $errors->has('date_of_contract') ? ' is-invalid' : '' }}"  value="{{$details->date_of_contract}}">
          
          <label class="form-control-placeholder" for="date_of_contract">Date Of Contract:  </label>
          @if ($errors->has('date_of_contract'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_contract') }}</strong>
          </span>
          @endif
        </div>
      </div>

       <div class="col-md-4"> 
        <div class="form-group">
         <input type="date" id="csdate_of_invoice" class="form-control{{ $errors->has('date_of_invoice') ? ' is-invalid' : '' }}" name="date_of_invoice"  value="{{$details->date_of_invoice}}">
         <label class="form-control-placeholder" for="date_of_invoice">Date Of Invoice:  </label>
         @if ($errors->has('date_of_invoice'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_invoice') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>
   
<div class="row">
  <div class="col-md-4"> 
  <div class="form-group">
   <input type="text" id="csnature_of_breach" class="form-control{{ $errors->has('nature_of_breach') ? ' is-invalid' : '' }}" name="nature_of_breach"   value="{{$details->nature_of_breach}}" >
   <label class="form-control-placeholder" for="nature_of_breach">Nature of Breach: </label>
   @if ($errors->has('nature_of_breach'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('nature_of_breach') }}</strong>
  </span>
  @endif
</div>
</div>

 <div class="col-md-4"> 
  <div class="form-group">
   <input type="date" id="csdate_of_breach" class="form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach"  value="{{$details->date_of_breach}}">
   <label class="form-control-placeholder" for="date_of_breach">Date Of Breach:</label>
   @if ($errors->has('date_of_breach'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_breach') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="date" id="csdate_of_demand" class="form-control{{ $errors->has('date_of_demand') ? ' is-invalid' : '' }}" name="date_of_demand"  value="{{$details->date_of_demand}}">
   <label class="form-control-placeholder" for="date_of_demand">Date of Demand:</label>
   @if ($errors->has('date_of_demand'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_demand') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  <div class="col-md-6"> 
      <div class="form-group">
       <input type="text"  value="{{ $details->reason_for_claim }}" class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim" >
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