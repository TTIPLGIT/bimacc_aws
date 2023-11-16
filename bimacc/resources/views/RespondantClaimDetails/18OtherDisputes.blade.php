
    <form  id="sample_form" name="sample_form" method="POST" style="    width: 100%;" >
      @csrf  
       @foreach ($claimnotices as $notice)
       <input type="hidden" id="claimnoticeid"  name="claimnoticeid"  value="{{$notice->id}}" >
      @endforeach
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
             <input type="date"  id="date_of_contract" class="datechk form-control{{ $errors->has('date_of_contract') ? ' is-invalid' : '' }}" name="date_of_contract" >
             <label class="form-control-placeholder" for="date_of_contract">Contract Date:</label>
             @if ($errors->has('date_of_contract'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_contract') }}</strong>
            </span>
            @endif
          </div> 
        </div>
        <div class="col-md-4"> 
            <div class="form-group">
             <input type="text"  onkeypress="return isNumberKey(event)"  id="contractdate" class="form-control{{ $errors->has('contractdate') ? ' is-invalid' : '' }}" name="contractdate">
             <label class="form-control-placeholder" for="contractdate">Contract Value({{$claimantinformations[0]->currency}}):</label>
             @if ($errors->has('contractdate'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('contractdate') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
            <div class="form-group">
             <input type="text" id="nature_of_breach" class="form-control{{ $errors->has('nature_of_breach') ? ' is-invalid' : '' }}" name="nature_of_breach" >
             <label class="form-control-placeholder" for="nature_of_breach">Nature of Breach:</label>
             @if ($errors->has('nature_of_breach'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('nature_of_breach') }}</strong>
            </span>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"> 
            <div class="form-group">
             <input type="date"  id="date_of_breach" class="datechk form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach" >
             <label class="form-control-placeholder" for="date_of_breach">Date of Breach/ Cause of Action:</label>
             @if ($errors->has('date_of_breach'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_breach') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
            <div class="form-group">
             <input type="date"  id="date_of_notice" class="datechk form-control{{ $errors->has('date_of_notice') ? ' is-invalid' : '' }}" name="date_of_notice" >
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
             <input type="text"  onkeypress="return isNumberKey(event)"  id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount" >
             @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="claimamount">Claim Value (INR):</label>
       @else
        <label class="form-control-placeholder" for="claimamount">Claim Value(USD):</label>
           @endif
       
             @if ($errors->has('claimamount'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claimamount') }}</strong>
            </span>
            @endif
          </div>
        </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <div class="mx-auto">
    <button type="submit" class="btn btn-success btn-space"  >Save and Next</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>
    </form>
    
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
    