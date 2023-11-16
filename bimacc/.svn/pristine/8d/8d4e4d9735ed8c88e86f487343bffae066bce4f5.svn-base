
<form  name="reliefrequest_form" id="reliefrequest_form" method="POST" >
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
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Reliefs Details</b></u></label>
          </div>
        </div>
      </div>

      <div class="row">
       <div class="col-md-12"> 
         <div class="form-group text-center" style="margin-bottom: 1.4em !important;margin-right: 361px;">
          <label><u><b>Return of Goods</b></u></label>
        </div>
      </div>
    </div> 
    <div class="row">
      <div class="col-md-3"> 
        <div class="form-group">
         <input type="text" id="nature_of_goods" class="form-control{{ $errors->has('nature_of_goods') ? ' is-invalid' : '' }}" name="nature_of_goods"  >
         <label class="form-control-placeholder" for="nature_of_goods">Nature of Goods: </label>
         @if ($errors->has('nature_of_goods'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('nature_of_goods') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"id="quantity_of_goods"  class="form-control{{ $errors->has('quantity_of_goods') ? ' is-invalid' : '' }}" name="quantity_of_goods" >
        <label class="form-control-placeholder" for="quantity_of_goods">Quantity of Goods: </label>
        @if ($errors->has('quantity_of_goods'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('quantity_of_goods') }}</strong>
        </span> 
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="replacement_of_goods" style="margin-left: 18px;">Replacement of Goods</label>
    <input type="checkbox" class="form-control" id="replacement_of_goods"  name="replacement_of_goods" style="width:9%" value="yes">
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="redo_service" style="margin-left: 18px;">Redo the Service</label>
    <input type="checkbox" class="form-control" id="redo_service"  name="redo_service" style="width:9%" value="yes">
  </div>
</div>

    


</div>

<div class="row">
  <div class="col-md-3"> 
    <div class="form-group">      
     <input type="text" onkeypress="return isNumberKey(event)" id="refund_of_price"  class="form-control{{ $errors->has('refund_of_price') ? ' is-invalid' : '' }}" name="refund_of_price" > 
     @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="refund_of_price">Refund of Price (INR):</label>
       @else
        <label class="form-control-placeholder" for="refund_of_price">Refund of Price (USD):</label>
           @endif    
     @if ($errors->has('refund_of_price'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('refund_of_price') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-3"> 
  <div class="form-group">    

    <input type="text" onkeypress="return isNumberKey(event)" id="price_of_goods"  class="form-control{{ $errors->has('price_of_goods') ? ' is-invalid' : '' }}" name="price_of_goods" >  
     @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="price_of_goods">Price of Goods (INR):</label>
       @else
        <label class="form-control-placeholder" for="price_of_goods">Price of Goods (USD):</label>
           @endif    
     
    @if ($errors->has('price_of_goods'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('price_of_goods') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-3"> 
  <div class="form-group">    

    <input type="text" onkeypress="return isNumberKey(event)" id="rprice_of_goods_interest"  class="form-control{{ $errors->has('price_of_goods_interest') ? ' is-invalid' : '' }}" name="price_of_goods_interest" >  
    <label  class="form-control-placeholder" for="price_of_goods_interest">With Interest (%):</label>     
    @if ($errors->has('price_of_goods_interest'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('price_of_goods_interest') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="damageamountinterestwithinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="rdamageamountinterestwithinterest"  name="damageamountinterestwithinterest" style="width:9%" value="yes">
  </div>
</div>
</div>
<div class="row">

<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" id="damages" class="form-control{{ $errors->has('damages') ? ' is-invalid' : '' }}" name="damages" >
    <label class="form-control-placeholder" for="damages" >Damages:</label>
    @if ($errors->has('damages'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('damages') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)" id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" >
    <label class="form-control-placeholder" for="interest_amount">Interest Amount({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('interest_amount'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('interest_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)" id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
@if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Total Amount Including Interest (INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Amount Including Interest (USD)<span style="color: red">*</span>:</label>
           @endif
    @if ($errors->has('damage_with_interest'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('damage_with_interest') }}</strong>
    </span>
    @endif
  </div>
</div>


</div>





</div>
</div>
<div class="modal-footer">
  <div class="mx-auto">
   <button type="submit" id="reliefrequestsave" class="btn btn-success btn-space"  >Save</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>   
</form>

<script type="text/javascript">
$('#rdamageamountinterestwithinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("rprice_of_goods_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#rprice_of_goods_interest').val("");

            } else {
               document.getElementById("rprice_of_goods_interest").disabled = false;
                $('#rprice_of_goods_interest').val("");
            }
});

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