 
  <div class="col-md-12" style="pointer-events: none;">
    <div class="row">
     <div class="col-md-12"> 
       <div class="form-group text-center" style="margin-bottom: 1.4em">
        <label><u><b>Details of vessels/ cargo/ ports & Claim Amount</b></u></label>
      </div>
    </div>
  </div>
 <div class="row">
          <div class="col-md-4"> 
            <div class="form-group">
              <input type="text" name="claimdetailsid" style="display: none" value="{{$details->claimdetailsid}}">
             <input type="text" id="vesselname"  value="{{ $details->vesselname }}" class="form-control{{ $errors->has('vesselname') ? ' is-invalid' : '' }}" name="vesselname" >
             <label class="form-control-placeholder" for="vesselname">Vessel Name: </label>
             @if ($errors->has('vesselname'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('vesselname') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="cargonature" value="{{ $details->cargoname }}" class="form-control{{ $errors->has('cargonature') ? ' is-invalid' : '' }}" name="cargoname" >
            <label class="form-control-placeholder" for="cargonature">Cargo Nature:</label>
            @if ($errors->has('cargonature'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('cargonature') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
         <div class="form-group">
           <input type="text"  id="quantity" value="{{ $details->quantity }}" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" >
           <label class="form-control-placeholder" for="quantity">Quantity and Specification:</label>
           @if ($errors->has('quantity'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('quantity') }}</strong>
          </span>
          @endif
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">  
        <div class="form-group">
         <input type="text" id="injurydetails" value="{{ $details->lossdetails }}" class="form-control{{ $errors->has('injurydetails') ? ' is-invalid' : '' }}" name="lossdetails">
<label class="form-control-placeholder" for="injurydetails">Seaman/ Passenger Injury/ Loss Details:</label>
         @if ($errors->has('injurydetails'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('injurydetails') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-6"> 
      <div class="form-group">
       <input type="text" value="{{ $details->reason_for_claim }}" class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim" >
       <label class="form-control-placeholder" for="reason_for_claim">Reason for Claim<span style="color: red">*</span>:</label>
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
       <input type="text" onkeypress="return isNumberKey(event)"  id="claimamount" value="{{ number_format((float)$details->claimamount, 2, '.', '') }}" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount" >

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
  <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="claim_interest" value="{{ $details->claim_interest }}" class="form-control{{ $errors->has('claim_interest') ? ' is-invalid' : '' }}" name="claim_interest" >
    <label class="form-control-placeholder" for="claim_interest">Claim Amount Interest(%): </label>
    @if ($errors->has('claim_interest'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_interest') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="claimamountwithinterest" style="margin-left: 18px;">Without Interest: </label>
    <input type="checkbox" class="form-control" id="claimamountwithinterest"  name="claimamountwithinterest" style="width:7%" value="yes"  {{ $details->claimamountwithinterest == 'yes' ? 'checked' : ''}}>
  </div>
</div>
</div>

<div class="row">
 <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
    <label><u><b>Date of contract/ Invoice</b></u></label>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="date"  id="contractdate" value="{{ $details->contractdate }}" class="datechk form-control{{ $errors->has('contractdate') ? ' is-invalid' : '' }}" name="contractdate" >
     <label class="form-control-placeholder" for="contractdate">Date of Contract: </label>
     @if ($errors->has('contractdate'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('contractdate') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" id="Bill_of_Lading_details_Date_No" value="{{ $details->bill_of_lading_details_date_no }}" class="form-control{{ $errors->has('Bill_of_Lading_details_Date_No') ? ' is-invalid' : '' }}" name="bill_of_lading_details_date_no" >
    <label class="form-control-placeholder" for="Bill_of_Lading_details_Date_No">Bill of Lading/ Ticket No: </label>
    @if ($errors->has('Bill_of_Lading_details_Date_No'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('Bill_of_Lading_details_Date_No') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
 <div class="form-group">
   <input type="date"  id="passenger_ticket_booking_date" value="{{ $details->passenger_ticket_booking_date }}" class="datechk form-control{{ $errors->has('passenger_ticket_booking_date') ? ' is-invalid' : '' }}" name="passenger_ticket_booking_date" >
   <label class="form-control-placeholder" for="passenger_ticket_booking_date">Passenger Ticket/ Booking Date:</label>
   @if ($errors->has('passenger_ticket_booking_date'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('passenger_ticket_booking_date') }}</strong>
  </span>
  @endif
</div>
</div>
</div>


<div class="row">
 <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
     <label><u><b>Date of Breach/ Due Date/ Date of Cause of Action</b></u></label>
   </div>
 </div>
</div>
<div class="row">
  <div class="col-md-6"> 
    <div class="form-group">
     <input type="date"  id="due_date" value="{{ $details->due_date }}" class="datechk form-control{{ $errors->has('due_date') ? ' is-invalid' : '' }}" name="due_date" >
     <label class="form-control-placeholder" for="due_date">Date of Breach/ Due Date/ Date of Cause of Action: </label>
     @if ($errors->has('due_date'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('due_date') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6"> 
  <div class="form-group">
    <input type="date"  id="noticedate" value="{{ $details->noticedate }}" class="datechk form-control{{ $errors->has('noticedate') ? ' is-invalid' : '' }}" name="noticedate" >
    <label class="form-control-placeholder" for="noticedate">Date of Notice: </label>
    @if ($errors->has('noticedate'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('noticedate') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
</div>






