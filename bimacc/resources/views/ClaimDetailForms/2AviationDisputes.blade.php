    @if($claimandrelief == null)
    <form  id="sample_form" name="sample_form"  method="POST" style="    width: 100%;" >
      @csrf  
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
           <div class="col-md-12"> 
             <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Details of Flight/ Cargo/ Airports</b></u></label>
            </div>
          </div>
        </div>
        <div class="row">



          <div class="col-md-4"> 
            <div class="form-group">
             <input type="text" id="carriername" class="form-control{{ $errors->has('carriername') ? ' is-invalid' : '' }}" name="carriername" >
             <label class="form-control-placeholder" for="carriername">Carrier Name: </label>
             @if ($errors->has('carriername'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('carriername') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="CharterParty" class="form-control{{ $errors->has('CharterParty') ? ' is-invalid' : '' }}" name="charterparty" >
            <label class="form-control-placeholder" for="CharterParty">Charter Party:</label>
            @if ($errors->has('CharterParty'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('CharterParty') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
         <div class="form-group">
           <input type="text" onkeypress="return isNumberKey(event)"    id="pnrno" class="form-control{{ $errors->has('pnrno') ? ' is-invalid' : '' }}" name="pnrno" >
           <label class="form-control-placeholder" for="pnrno">PNR No:</label>
           @if ($errors->has('pnrno'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('pnrno') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" id="cargonature" class="form-control{{ $errors->has('cargonature') ? ' is-invalid' : '' }}" name="cargonature" >
          <label class="form-control-placeholder" for="cargonature">Cargo/ Baggage Nature:</label>
          @if ($errors->has('cargonature'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cargonature') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
       <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"  id="quantity" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" >
         <label class="form-control-placeholder" for="quantity">Quantity:</label>
         @if ($errors->has('quantity'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('quantity') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" id="natureofincident" class="form-control{{ $errors->has('natureofincident') ? ' is-invalid' : '' }}" name="natureofincident" >
       <label class="form-control-placeholder" for="natureofincident">Nature of Claim: </label>
       @if ($errors->has('natureofincident'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('natureofincident') }}</strong>
      </span>
      @endif
    </div>
  </div>

  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"   id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount">
    @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Value of Claim (INR):</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Value of Claim (USD) :</label>
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
     <textarea id="reason_for_claim" class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim"></textarea>
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
 <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
    <label><u><b>Date of Contract / Invoice</b></u></label>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="date"  id="contractdate" class="datechk form-control{{ $errors->has('contractdate') ? ' is-invalid' : '' }}" name="contractdate" >
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
    <input type="text" id="bill_of_lading_details_date_no" class="form-control{{ $errors->has('bill_of_lading_details_date_no') ? ' is-invalid' : '' }}" name="bill_of_lading_details_date_no" >
    <label class="form-control-placeholder" for="bill_of_lading_details_date_no">Bill of Lading/ Ticket No:</label>
    @if ($errors->has('bill_of_lading_details_date_no'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('bill_of_lading_details_date_no') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
 <div class="form-group">
   <input type="date"  id="passenger_ticket_booking_date" class="datechk form-control{{ $errors->has('passenger_ticket_booking_date') ? ' is-invalid' : '' }}" name="passenger_ticket_booking_date" >
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
     <input type="date"  id="due_date" class="datechk form-control{{ $errors->has('due_date') ? ' is-invalid' : '' }}" name="due_date" >
     <label class="form-control-placeholder" for="due_date">Date of Breach/ Due Date/ Date of Cause of Action:</label>
     @if ($errors->has('due_date'))
     <span class="invalid-feessdback" role="alert">
      <strong>{{ $errors->first('due_date') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6"> 
  <div class="form-group">
    <input type="date"  id="noticedate" class="datechk form-control{{ $errors->has('noticedate') ? ' is-invalid' : '' }}" name="noticedate" >
    <label class="form-control-placeholder" for="noticedate">Date of Notice:</label>
    @if ($errors->has('noticedate'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('noticedate') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>

</div>
</div>                  
<div class="modal-footer">
  <div class="mx-auto">
    <button type="submit" id="claimsave" class="btn btn-success btn-space"  >Save and Next</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>
</form>

@else

@foreach ($claimandrelief as $claimDetail)
<form  id="claimdetails_update_form" name="claimdetails_update_form"  method="POST" style="    width: 100%;" >
  @csrf  
  <div class="row register-form">
    <div class="col-md-12">
      <div class="row">
       <div class="col-md-12"> 
         <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>DETAILS OF  FLIGHT/CARO/AIRPORTS</b></u></label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"> 
        <div class="form-group">
         <input type="text" id="carriername" value="{{ $claimDetail->carriername }}" class="form-control{{ $errors->has('carriername') ? ' is-invalid' : '' }}" name="carriername" >
         <label class="form-control-placeholder" for="carriername">Carrier Name: </label>
         @if ($errors->has('carriername'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('carriername') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" name="claimdetailsid" style="display: none" value="{{$claimDetail->claimdetailsid}}">
        <input type="text" id="CharterParty" value="{{ $claimDetail->charterparty }}" class="form-control{{ $errors->has('CharterParty') ? ' is-invalid' : '' }}" name="charterparty" >
        <label class="form-control-placeholder" for="CharterParty">Charter Party:</label>
        @if ($errors->has('CharterParty'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('CharterParty') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
     <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"   id="pnrno" value="{{ $claimDetail->pnrno }}" class="form-control{{ $errors->has('pnrno') ? ' is-invalid' : '' }}" name="pnrno" >
       <label class="form-control-placeholder" for="pnrno">PNR No:</label>
       @if ($errors->has('pnrno'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('pnrno') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
      <input type="text" id="cargonature" value="{{ $claimDetail->cargonature }}" class="form-control{{ $errors->has('cargonature') ? ' is-invalid' : '' }}" name="cargonature" >
      <label class="form-control-placeholder" for="cargonature">Cargo/Baggage Nature:</label>
      @if ($errors->has('cargonature'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('cargonature') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
   <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="quantity" value="{{ $claimDetail->quantity }}" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" >
     <label class="form-control-placeholder" for="quantity">Quantity:</label>
     @if ($errors->has('quantity'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('quantity') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
   <input type="text" id="natureofincident"  value="{{ $claimDetail->natureofincident }}" class="form-control{{ $errors->has('natureofincident') ? ' is-invalid' : '' }}" name="natureofincident" >
   <label class="form-control-placeholder" for="natureofincident">Nature Of Claim: </label>
   @if ($errors->has('natureofincident'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('natureofincident') }}</strong>
  </span>
  @endif
</div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount"  value="{{ number_format((float)$claimDetail->claimamount, 2, '.', '') }}">
   @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Value of Claim (INR):</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Value of Claim (USD) :</label>
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
       <input type="text" id="reason_for_claim" class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim"   value="{{ $claimDetail->reason_for_claim }}">
  
       <label class="form-control-placeholder" for="reason_for_claim">Reason For Claim<span style="color: red">*</span>:</label>
       @if ($errors->has('reason_for_claim'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('reason_for_claim') }}</strong>
      </span>
      @endif
    </div>
  </div>


</div>



<div class="row">
 <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
    <label><u><b>Date of contract/Invoice</b></u></label>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="date"  id="contractdate" value="{{ $claimDetail->contractdate }}" class="datechk form-control{{ $errors->has('contractdate') ? ' is-invalid' : '' }}" name="contractdate" >
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
    <input type="text" id="bill_of_lading_details_date_no" value="{{ $claimDetail->bill_of_lading_details_date_no }}" class="form-control{{ $errors->has('bill_of_lading_details_date_no') ? ' is-invalid' : '' }}" name="bill_of_lading_details_date_no" >
    <label class="form-control-placeholder" for="bill_of_lading_details_date_no">Bill of Lading/ Ticket No: </label>
    @if ($errors->has('bill_of_lading_details_date_no'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('bill_of_lading_details_date_no') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
 <div class="form-group">
   <input type="date"  id="passenger_ticket_booking_date" value="{{ $claimDetail->passenger_ticket_booking_date }}" class="datechk form-control{{ $errors->has('passenger_ticket_booking_date') ? ' is-invalid' : '' }}" name="passenger_ticket_booking_date" >
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
     <input type="date"  id="due_date" value="{{ $claimDetail->due_date }}" class="datechk form-control{{ $errors->has('due_date') ? ' is-invalid' : '' }}" name="due_date" >
     <label class="form-control-placeholder" for="due_date">Date of Breach/ Due Date/ Date of Cause of Action:</label>
     @if ($errors->has('due_date'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('due_date') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6"> 
  <div class="form-group">
    <input type="date"  id="noticedate" value="{{ $claimDetail->noticedate }}" class="datechk form-control{{ $errors->has('noticedate') ? ' is-invalid' : '' }}" name="noticedate" >
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