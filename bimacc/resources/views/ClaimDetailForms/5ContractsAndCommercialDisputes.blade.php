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
              <label><u><b>Details</b></u></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4" id="addd"> 
            <div class="form-group">
             <input type="text" onkeypress="return isNumberKey(event)"   id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount"  >
             @if ($claimantinformations[0]->currency =='INR') 
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
            <input type="date"  id="date_of_contract" name="date_of_contract"  class="datechk form-control{{ $errors->has('date_of_contract') ? ' is-invalid' : '' }}" >
            <label class="form-control-placeholder" for="date_of_contract">Date of Contract:  </label>
            @if ($errors->has('date_of_contract'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_contract') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="col-md-4"> 
          <div class="form-group">
           <input type="date"  id="date_of_invoice" class="datechk form-control{{ $errors->has('date_of_invoice') ? ' is-invalid' : '' }}" name="date_of_invoice" >
           <label class="form-control-placeholder" for="date_of_invoice">Date of Invoice:  </label>
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
         <input type="text" id="nature_of_breach" class="form-control{{ $errors->has('nature_of_breach') ? ' is-invalid' : '' }}" name="nature_of_breach" >
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
       <input type="date"  id="date_of_breach" class="datechk form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach" >
       <label class="form-control-placeholder" for="date_of_breach">Date of Breach:  </label>
       @if ($errors->has('date_of_breach'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('date_of_breach') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="date"  id="date_of_demand" class="datechk form-control{{ $errors->has('date_of_demand') ? ' is-invalid' : '' }}" name="date_of_demand" >
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
  <div class="col-md-4"> 
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
         <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
          
        </div>            
        <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Details</b></u></label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"   name="claimdetailsid" style="display: none" value="{{$claimDetail->claimdetailsid}}" >
          <input type="text" onkeypress="return isNumberKey(event)"   id="amount_inr_usd" class="form-control{{ $errors->has('amount_inr_usd') ? ' is-invalid' : '' }}" name="claimamount" value="{{ number_format((float)$claimDetail->claimamount, 2, '.', '') }}">
          @if ($claimantinformations[0]->currency =='INR') 
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
          <input type="date"  id="date_of_contract" name="date_of_contract"  class="datechk form-control{{ $errors->has('date_of_contract') ? ' is-invalid' : '' }}"  value="{{$claimDetail->date_of_contract}}">
          
          <label class="form-control-placeholder" for="date_of_contract">Date of Contract:  </label>
          @if ($errors->has('date_of_contract'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_contract') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="col-md-4"> 
        <div class="form-group">
         <input type="date"  id="date_of_invoice" class="datechk form-control{{ $errors->has('date_of_invoice') ? ' is-invalid' : '' }}" name="date_of_invoice" value="{{$claimDetail->date_of_invoice}}">
         <label class="form-control-placeholder" for="date_of_invoice">Date of Invoice:  </label>
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
       <input type="text" id="nature_of_breach" class="form-control{{ $errors->has('nature_of_breach') ? ' is-invalid' : '' }}" name="nature_of_breach" value="{{$claimDetail->nature_of_breach}}" >
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
     <input type="date"  id="date_of_breach" class="datechk form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach" value="{{$claimDetail->date_of_breach}}">
     <label class="form-control-placeholder" for="date_of_breach">Date of Breach:</label>
     @if ($errors->has('date_of_breach'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_breach') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="date"  id="date_of_demand" class="datechk form-control{{ $errors->has('date_of_demand') ? ' is-invalid' : '' }}" name="date_of_demand"  value="{{$claimDetail->date_of_demand}}">
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
     <input type="text" id="reason_for_claim" value="{{ $claimDetail->reason_for_claim }}" class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim" >
     <label class="form-control-placeholder" for="reason_for_claim">Reason for Claim:<span style="color: red">*</span></label>
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
    <button type="submit" class="btn btn-success btn-space">Update</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>
</form>
@endforeach

@endif
<!-- <script type="text/javascript">
$(function () {
  $("#btnAdd6").bind("click", function () {
    
     var inp = $('#addd');
    
       var i = $('input').size() + 1;
        
        $('<div id="claimamount' + i +'"><input type="text" id="claimamount" class="claimamount" name="claimamount[] placeholder="Input '+i+'"/> </div>').appendTo($('#claimamount'));;
        
        i++;
  });
  });


</script> -->
<!-- <script>
  $(document).ready(function(){
    
    $('#btnAdd6').click(function(){
      alert("xcx");
        
        var inp = $('#addd');
        
        var i = $('input').size() + 1;
        
        $('<div id="addd' + i +'"><input type="text" id="claimamount" class="name" name="claimamount' + i +'" placeholder="Input '+i+'"/> </div>').appendTo(inp);
        
        i++;
        
    });
    
  </script> -->
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