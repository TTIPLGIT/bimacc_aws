    
    @if($claimandrelief == null)
    <form  id="sample_form" name="sample_form" method="POST" style="    width: 100%;" >
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
              <label><u><b>Details of Vessels/ Cargo/ Ports & Claim Amount </b></u></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"> 
            <div class="form-group">
             <input type="text" id="vesselname" class="form-control{{ $errors->has('vesselname') ? ' is-invalid' : '' }}" name="vesselname" >
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
            <input type="text" id="cargonature" class="form-control{{ $errors->has('cargonature') ? ' is-invalid' : '' }}" name="cargoname" >
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
           <input type="text"  id="quantity" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" >
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
         <textarea id="lossdetails" class="form-control{{ $errors->has('injurydetails') ? ' is-invalid' : '' }}" name="lossdetails">   
         </textarea>
<label class="form-control-placeholder" for="lossdetails">Seaman/ Passenger Injury/ Loss Details:
</label>
         @if ($errors->has('lossdetails'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('lossdetails') }}</strong>
        </span>
        @endif
      </div>
    </div>
<div class="col-md-6"> 
      <div class="form-group">
       <textarea id="reason_for_claim" class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim" ></textarea>
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
       <input type="text" onkeypress="return isNumberKey(event)"   class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount" >

        @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" >Claim Amount (INR):</label>
       @else
        <label class="form-control-placeholder" >Claim Amount(USD):</label>
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
    <input type="text" onkeypress="return isNumberKey(event)"  class="form-control" name="claim_interest" >
    <label class="form-control-placeholder" >Claim Amount Interest (%): </label>
    
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="claimamountwithinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="claimamountwithinterest"  name="claimamountwithinterest" style="width:7%" value="yes" >
  </div>
</div>
</div>

<div class="row">
 <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
    <label><u><b>Date of Contract/ Invoice</b></u></label>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="date" id="contractdate" class="datechk form-control{{ $errors->has('contractdate') ? ' is-invalid' : '' }}" name="contractdate" >
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
    <input type="text" id="Bill_of_Lading_details_Date_No" class="form-control{{ $errors->has('Bill_of_Lading_details_Date_No') ? ' is-invalid' : '' }}" name="bill_of_lading_details_date_no" >
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
   <input type="date" id="passenger_ticket_booking_date" class="datechk form-control{{ $errors->has('passenger_ticket_booking_date') ? ' is-invalid' : '' }}" name="passenger_ticket_booking_date" >
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
     <label><u><b>Date of Breach/ Due Date/ Date of Cause of Action
</b></u></label>
   </div>
 </div>
</div>
<div class="row">
  <div class="col-md-6"> 
    <div class="form-group">
     <input type="date"  id="due_date" class="datechk form-control{{ $errors->has('due_date') ? ' is-invalid' : '' }}" name="due_date" >
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
    <button type="submit" id="claimsave" class="btn btn-success btn-space">Save and Next</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div>  
</div>
</form>
@else

 @foreach ($claimandrelief as $claimDetail)
 <form  id="claimdetails_update_form" name="claimdetails_update_form" method="POST" style="width: 100%;" >
      @csrf  
      <div class="row register-form">
        <div class="col-md-12">
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
              <input type="text" name="claimdetailsid" style="display: none" value="{{$claimDetail->claimdetailsid}}">
             <input type="text" id="vesselname"  value="{{ $claimDetail->vesselname }}" class="form-control{{ $errors->has('vesselname') ? ' is-invalid' : '' }}" name="vesselname" >
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
            <input type="text" id="cargonature" value="{{ $claimDetail->cargoname }}" class="form-control{{ $errors->has('cargonature') ? ' is-invalid' : '' }}" name="cargoname" >
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
           <input type="text"  id="quantity" value="{{ $claimDetail->quantity }}" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" >
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
         <textarea id="injurydetails" value="{{ $claimDetail->lossdetails }}" class="form-control{{ $errors->has('injurydetails') ? ' is-invalid' : '' }}" name="lossdetails"></textarea>
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
       <input type="text" id="reason_for_claim" value="{{ $claimDetail->reason_for_claim }}" class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim" >
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
       <input type="text" onkeypress="return isNumberKey(event)"  id="claimamount" value="{{ number_format((float)$claimDetail->claimamount, 2, '.', '') }}" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount" >

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
    <input type="text" onkeypress="return isNumberKey(event)"  id="claim_interest" value="{{ $claimDetail->claim_interest }}" class="form-control{{ $errors->has('claim_interest') ? ' is-invalid' : '' }}" name="claim_interest" >
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
    <input type="checkbox" class="form-control" id="claimamountwithinterest"  name="claimamountwithinterest" style="width:7%" value="yes"  {{ $claimDetail->claimamountwithinterest == 'yes' ? 'checked' : ''}}>
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
    <input type="text" id="Bill_of_Lading_details_Date_No" value="{{ $claimDetail->bill_of_lading_details_date_no }}" class="form-control{{ $errors->has('Bill_of_Lading_details_Date_No') ? ' is-invalid' : '' }}" name="bill_of_lading_details_date_no" >
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
<script type="text/javascript">
$('#claimamountwithinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("claim_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#claim_interest').val("");

            } else {
               document.getElementById("claim_interest").disabled = false;
                $('#claim_interest').val("");
            }
});

</script>



  <!-- <script>
  $(document).ready(function(){
    $("#sample_form").validate({

  rules: {
    claim_interest: {
      required: true,
      maxlength: 3
    }
  },
  messages:{
    claim_interest:{
      required:"Please enter the claim_interest",
      maxlength:"maxlegth 2"
    }
  }
});
  });
  </script> -->
  <script type="text/javascript">
    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
  </script>