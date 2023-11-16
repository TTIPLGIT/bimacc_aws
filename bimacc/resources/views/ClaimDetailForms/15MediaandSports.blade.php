    @if($claimandrelief == null)
    <form  id="sample_form" name="sample_form" method="POST" style="    width: 100%;" enctype="multipart/form-data" >
      @csrf  
      <div class="row register-form">
        <div class="col-md-12">
          <div class="row">
           <div class="col-md-12">
             <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
            </div>            
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Details</b></u></label>
            </div>
          </div>
        </div>
        <div class="row">
         <div class="col-md-4"> 
          <div class="form-group">
           <input type="text"  onkeypress="return isNumberKey(event)"  id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount"  >
           @if ($claimantinformations[0]->currency =='INR') 
           <label class="form-control-placeholder" for="claimamount">Contract Value (INR):</label>
           @else
           <label class="form-control-placeholder" for="claimamount">Contract Value (USD):</label>
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
         <input type="text" id="contract_details" class="form-control{{ $errors->has('contract_details') ? ' is-invalid' : '' }}" name="contract_details"  >
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
       <input type="date" id="date_of_breach" class="datechk form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach" >
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
      <input type="date" id="date_of_notice" name="date_of_notice"  class="datechk form-control{{ $errors->has('date_of_notice') ? ' is-invalid' : '' }}" >
      <label class="form-control-placeholder" for="date_of_notice">Date of Notice:</label>
      @if ($errors->has('date_of_notice'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('date_of_notice') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
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
<!-- <div class="col-md-1" style="display: none;"><input class="form-control" placeholder='1'  type="text" disabled ></div>
<div class="col-md-3" style="display: none;">
  <div class="form-group">
    <h7></h7>
    <input type="file" id="fileupload_media" 
    class="form-control{{ $errors->has('fileupload_media') ? ' is-invalid' : '' }}"
    name="fileupload_media[]">
    <label class="form-control-placeholder" for="fileupload_media">Document Details:</label>
    @if ($errors->has('fileupload_media'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('fileupload_media') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="buttons" id="media_btn" style="display: none;" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div> -->
</div>
<div id="media"></div>

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
<form  id="claimdetails_update_form" name="claimdetails_update_form" method="POST" style="width: 100%;" >
  @csrf  
  <input type="text" name="claimdetailsid" style="display: none" value="{{$claimDetail->claimdetailsid}}">
  <div class="row register-form">
    <div class="col-md-12">
      <div class="row">
       <div class="col-md-12">
         <!-- <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
          <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
        </div>  -->           
        <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Details</b></u></label>
        </div>
      </div>
    </div>
    <div class="row">
     <div class="col-md-4"> 
      <div class="form-group">
       <input type="text"  onkeypress="return isNumberKey(event)"  id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount"  value="{{ number_format((float)$claimDetail->claimamount, 2, '.', '') }}">
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
     <input type="text" id="contract_details" class="form-control{{ $errors->has('contract_details') ? ' is-invalid' : '' }}" name="contract_details"  value="{{$claimDetail->contract_details}}">
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
    <input type="date" id="date_of_breach" class="datechk form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach"   value="{{$claimDetail->date_of_breach}}">
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
      <input type="date" id="date_of_notice" name="date_of_notice"  class="datechk form-control{{ $errors->has('date_of_notice') ? ' is-invalid' : '' }}"  value="{{$claimDetail->date_of_notice}}">
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
     <textarea id="reason_for_claim" class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim" >{{$claimDetail->reason_for_claim}}</textarea>
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
<!-- <div id="media"></div> -->

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