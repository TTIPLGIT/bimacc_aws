   
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
          <div class="col-md-1"><input class="form-control" value="1"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
          <div class="col-md-3"> 
            <div class="form-group">
             <input type="text" id="nature_of_contract_real" class="form-control{{ $errors->has('nature_of_contract_real') ? ' is-invalid' : '' }}" name="nature_of_contract_real[]"  onkeypress="return alpha(event)"/>
             <label class="form-control-placeholder" for="nature_of_contract_real">Nature of Contract:</label>
             @if ($errors->has('nature_of_contract_real'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('nature_of_contract_real') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-3">  
          <div class="form-group">
           <input type="date" id="date_of_cintract_real" class="datechk form-control{{ $errors->has('date_of_cintract_real') ? ' is-invalid' : '' }}" name="date_of_cintract_real[]"  >
           <label class="form-control-placeholder" for="date_of_cintract_real">Date of Contract:</label>
           @if ($errors->has('date_of_cintract_real'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_cintract_real') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-5"> 
        <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"   id="annual_value_real" class="form-control{{ $errors->has('annual_value_real') ? ' is-invalid' : '' }}" name="annual_value_real[]"  >
         <label class="form-control-placeholder" for="annual_value_real">Annual Value of Contract/ Annual Average Rental Value({{$claimantinformations[0]->currency}}):</label>
         @if ($errors->has('annual_value_real'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('annual_value_real') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>
   
    <div class="row">
      <div class="col-md-4">  
        <div class="form-group">
          <input type="text" id="natue_of_immovable_real" name="natue_of_immovable_real[]"  class="form-control{{ $errors->has('natue_of_immovable_real') ? ' is-invalid' : '' }}" onkeypress="return alpha(event)"/>
          
          <label class="form-control-placeholder" for="natue_of_immovable_real">Nature of Immovable Property: </label>
          @if ($errors->has('natue_of_immovable_real'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('natue_of_immovable_real') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">
         <input type="text" id="name_of_possessor_real" class="form-control{{ $errors->has('name_of_possessor_real') ? ' is-invalid' : '' }}" name="name_of_possessor_real[]" onkeypress="return alpha(event)"/>
         <label class="form-control-placeholder" for="name_of_possessor_real">Name of the Possessor:</label>
         @if ($errors->has('name_of_possessor_real'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('name_of_possessor_real') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" id="name_of_owner_real" class="form-control{{ $errors->has('name_of_owner_real') ? ' is-invalid' : '' }}" name="name_of_owner_real[]" onkeypress="return alpha(event)"/>
       <label class="form-control-placeholder" for="name_of_owner_real">Name of the Property Owner:</label>
       @if ($errors->has('name_of_owner_real'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name_of_owner_real') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" id="description_real" class="form-control{{ $errors->has('description_real') ? ' is-invalid' : '' }}" name="description_real[]" onkeypress="return alpha(event)"/>
     <label class="form-control-placeholder" for="description_real">Description of Property:</label>
     @if ($errors->has('description_real'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('description_real') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="schedule_real" class="form-control{{ $errors->has('schedule_real') ? ' is-invalid' : '' }}" name="schedule_real">
   <label class="form-control-placeholder" for="schedule_real[]">Schedule and Boundaries:</label>
   @if ($errors->has('schedule_real'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('schedule_real') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="market_value_real" class="form-control{{ $errors->has('market_value_real') ? ' is-invalid' : '' }}" name="market_value_real[]" >
   <label class="form-control-placeholder" for="market_value_real">Market Value of Property({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('market_value_real'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('market_value_real') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="mortgage_value" class="form-control{{ $errors->has('mortgage_value') ? ' is-invalid' : '' }}" name="mortgage_value[]">
   <label class="form-control-placeholder" for="mortgage_value">Mortgage Value({{$claimantinformations[0]->currency}}):  </label>
   @if ($errors->has('mortgage_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('mortgage_value') }}</strong>
  </span>
  @endif
</div>
</div>
<!-- <div class="buttons" id="real_btn2" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div> -->
</div>
<!-- <div id="real2"></div> -->
<div class="row">
  <div class="col-md-6"> 
    <div class="form-group">
     <input type="date" id="date_of_breach_real" class="datechk form-control{{ $errors->has('date_of_breach_real') ? ' is-invalid' : '' }}" name="date_of_breach_real[]" >
     <label class="form-control-placeholder" for="date_of_breach_real">Date of Breach/ Cause of Action:
     </label>
     @if ($errors->has('date_of_breach_real'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_breach_real') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="date" id="date_of_notice_real" class="datechk form-control{{ $errors->has('date_of_notice_real') ? ' is-invalid' : '' }}" name="date_of_notice_real[]" >
   <label class="form-control-placeholder" for="date_of_notice_real">Date of Notice:
   </label>
   @if ($errors->has('date_of_notice_real'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_notice_real') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-1">
 <div class="buttons" id="real_btn1" >
      <span class="btn btn-icon btn-sm btn-success">
        <i class="far fa-plus-square"></i> </span>
      </div>
    </div>
      <div class="col-md-1">
<div  id="real_del" style="display:none;"  class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>
   
    
</div>
<div id="real1"></div>

</div>
</div>                  
<div class="modal-footer">
  <div class="mx-auto">
    <button type="submit" class="btn btn-success btn-space">Save and Next</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>
</form>
<script type="text/javascript">
  function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123));
}
</script>
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
