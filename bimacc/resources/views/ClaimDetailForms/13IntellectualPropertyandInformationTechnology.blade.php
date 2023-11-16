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
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Relevant Dates</b></u></label>
            </div>
          </div>
        </div>
        <div class="row">
       <div class="col-md-4">  
        <div class="form-group">
          <input type="date" id="date_of_registration" name="date_of_registration"  class="datechk form-control{{ $errors->has('date_of_registration') ? ' is-invalid' : '' }}" >
          
          <label class="form-control-placeholder" for="date_of_registration">Date of Registration of IPR: </label>
          @if ($errors->has('date_of_registration'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_registration') }}</strong>
          </span>
          @endif
        </div>
      </div>
       <div class="col-md-4">  
        <div class="form-group">
          <input type="date" id="date_of_agreement" name="date_of_agreement"  class="datechk form-control{{ $errors->has('date_of_agreement') ? ' is-invalid' : '' }}" >
          
<label class="form-control-placeholder" for="date_of_agreement">Date of Agreement/ Assignment:</label>
          @if ($errors->has('date_of_agreement'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_agreement') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">
         <input type="date" id="date_of_licence" class="datechk form-control{{ $errors->has('date_of_licence') ? ' is-invalid' : '' }}" name="date_of_licence" >
         <label class="form-control-placeholder" for="date_of_licence">Date of Licence:</label>
         @if ($errors->has('date_of_licence'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_licence') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>
  <div class="row">
<div class="col-md-4">  
        <div class="form-group">
          <input type="date" id="date_of_breach_or_infringement" name="date_of_breach_or_infringement"  class="datechk form-control{{ $errors->has('date_of_breach_or_infringement') ? ' is-invalid' : '' }}" >
          
          <label class="form-control-placeholder" for="date_of_breach_or_infringement">Date of Breach/ Knowledge of Infringement:</label>
          @if ($errors->has('date_of_breach_or_infringement'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_breach_or_infringement') }}</strong>
          </span>
          @endif
        </div>
      </div>
     <div class="col-md-4"> 
        <div class="form-group">
         <input type="date" id="earliest_date_of_prior_use" class="datechk form-control{{ $errors->has('earliest_date_of_prior_use') ? ' is-invalid' : '' }}" name="earliest_date_of_prior_use" >
         <label class="form-control-placeholder" for="earliest_date_of_prior_use">Earliest Date of Prior Use:
 </label>
         @if ($errors->has('earliest_date_of_prior_use'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('earliest_date_of_prior_use') }}</strong>
        </span>
        @endif
      </div>
    </div>
   

   
           

      
      <div class="col-md-4">  
        <div class="form-group">
          <input type="date" id="date_of_notice" name="date_of_notice"  class="datechk form-control{{ $errors->has('date_of_notice') ? ' is-invalid' : '' }}"  >
          
          <label class="form-control-placeholder" for="date_of_notice">Date of Notice:</label>
          @if ($errors->has('date_of_notice'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_notice') }}</strong>
          </span>
          @endif
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-md-4">  
        <div class="form-group">
          <input type="text"  onkeypress="return isNumberKey(event)"  id="claimamount" name="claimamount"  class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" >
           @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Amount Claim (INR):</label>
       @else
        <label class="form-control-placeholder" for="claimamount">Amount Claim (USD):</label>
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
     <div class="row register-form">
        <div class="col-md-12">
          <div class="row">
           <div class="col-md-12">
             <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
            </div>            
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Relevant Dates</b></u></label>
            </div>
          </div>
        </div>
        <div class="row">
       <div class="col-md-4">  
        <div class="form-group">
          <input type="text" name="claimdetailsid" style="display: none" value="{{$claimDetail->claimdetailsid}}">
          <input type="date" id="date_of_registration" name="date_of_registration"  class="datechk form-control{{ $errors->has('date_of_registration') ? ' is-invalid' : '' }}"  value="{{$claimDetail->date_of_registration}}">
          <label class="form-control-placeholder" for="date_of_registration">Date of Registration of IPR:</label>
          @if ($errors->has('date_of_registration'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_registration') }}</strong>
          </span>
          @endif
        </div>
      </div>
       <div class="col-md-4">  
        <div class="form-group">
          <input type="date" id="date_of_agreement" name="date_of_agreement"  class="datechk form-control{{ $errors->has('date_of_agreement') ? ' is-invalid' : '' }}"  value="{{$claimDetail->date_of_agreement}}">
          
<label class="form-control-placeholder" for="date_of_agreement">Date of Agreement/ Assignment:</label>
          @if ($errors->has('date_of_agreement'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_agreement') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">
         <input type="date" id="date_of_licence" class="datechk form-control{{ $errors->has('date_of_licence') ? ' is-invalid' : '' }}" name="date_of_licence"  value="{{$claimDetail->date_of_licence}}">
         <label class="form-control-placeholder" for="date_of_licence">Date of Licence:</label>
         @if ($errors->has('date_of_licence'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_licence') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">  
        <div class="form-group">
          <input type="date" id="date_of_breach_or_infringement" name="date_of_breach_or_infringement"  class="datechk form-control{{ $errors->has('date_of_breach_or_infringement') ? ' is-invalid' : '' }}"  value="{{$claimDetail->date_of_breach_or_infringement}}">
          
          <label class="form-control-placeholder" for="date_of_breach_or_infringement">Date of Breach/ Knowledge of Infringement:</label>
          @if ($errors->has('date_of_breach_or_infringement'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_breach_or_infringement') }}</strong>
          </span>
          @endif
        </div>
      </div>
     <div class="col-md-4"> 
        <div class="form-group">
         <input type="date" id="earliest_date_of_prior_use" class="datechk form-control{{ $errors->has('earliest_date_of_prior_use') ? ' is-invalid' : '' }}" name="earliest_date_of_prior_use"  value="{{$claimDetail->earliest_date_of_prior_use}}">
         <label class="form-control-placeholder" for="earliest_date_of_prior_use">Earliest Date of Prior Use:</label>
         @if ($errors->has('earliest_date_of_prior_use'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('earliest_date_of_prior_use') }}</strong>
        </span>
        @endif
      </div>
    </div>

  
           

      
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
    </div>
    <div class="row">

      <div class="col-md-6">  
        <div class="form-group">
          <input type="text"  onkeypress="return isNumberKey(event)"  id="claimamount" name="claimamount"  class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}"  value="{{ number_format((float)$claimDetail->claimamount, 2, '.', '') }}">
          
          @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Amount Claim (INR):</label>
       @else
        <label class="form-control-placeholder" for="claimamount">Amount Claim (USD):</label>
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