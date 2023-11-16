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
       <input type="text"  onkeypress="return isNumberKey(event)"  id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount"  value="{{ number_format((float)$details->claimamount, 2, '.', '') }}">
       @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Contract Value (INR):</label>
       @else
       <label class="form-control-placeholder" for="claimamount">Contract Value (USD) :</label>
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
     <input type="text" id="contract_details" class="form-control{{ $errors->has('contract_details') ? ' is-invalid' : '' }}" name="contract_details"  value="{{$details->contract_details}}">
     <label class="form-control-placeholder" for="contract_details">Contract Details:</label>
     @if ($errors->has('contract_details'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('contract_details') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <input type="date" id="date_of_breach" class="datechk form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach"   value="{{$details->date_of_breach}}">
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
  <div class="col-md-4">  
    <div class="form-group">
      <input type="date" id="date_of_notice" name="date_of_notice"  class="datechk form-control{{ $errors->has('date_of_notice') ? ' is-invalid' : '' }}"  value="{{$details->date_of_notice}}">
      <label class="form-control-placeholder" for="date_of_notice">Date of Notice:</label>
      @if ($errors->has('date_of_notice'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('date_of_notice') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <textarea  class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim" >{{$details->reason_for_claim}}</textarea>
     <label class="form-control-placeholder" for="reason_for_claim">Reason for Claim<span style="color: red">*</span>:</label>
     @if ($errors->has('reason_for_claim'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('reason_for_claim') }}</strong>
    </span>
    @endif
  </div>
</div>
<<!-- div class="col-md-3">
  <div class="form-group">
    <h7></h7>
    <input type="file" id="fileupload_media" 
    class="form-control{{ $errors->has('fileupload_media') ? ' is-invalid' : '' }}"
    name="fileupload_media">
    <label class="form-control-placeholder" for="fileupload_media">Document Details:</label>
    @if ($errors->has('fileupload_media'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('fileupload_media') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="buttons" id="media_btn" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div> -->
</div>
</div>