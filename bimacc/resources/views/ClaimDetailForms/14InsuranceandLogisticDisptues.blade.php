
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
              <label><u><b>Document Details</b></u></label>
            </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-md-1"><input class="form-control" value="1"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
         <div class="col-md-2"> 
          <div class="form-group">
           <input type="text" onkeypress="return isNumberKey(event)"   id="policy_no" class="form-control{{ $errors->has('policy_no') ? ' is-invalid' : '' }}" name="policy_no[]"  >
           <label class="form-control-placeholder" for="policy_no">Policy Number:</label>
           @if ($errors->has('policy_no'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('policy_no') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-3"> 
        <div class="form-group">
         <input type="text" id="nature_of_cover" class="form-control{{ $errors->has('nature_of_cover') ? ' is-invalid' : '' }}" name="nature_of_cover[]"  >
         <label class="form-control-placeholder" for="nature_of_cover">Nature of Cover:</label>
         @if ($errors->has('nature_of_cover'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('nature_of_cover') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
       <input type="date"  id="date_insurance" class="datechk form-control{{ $errors->has('date_insurance') ? ' is-invalid' : '' }}" name="date_insurance[]" >
       <label class="form-control-placeholder" for="date_insurance">Document Date:</label>
       @if ($errors->has('date_insurance'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('date_insurance') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3">  
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"   id="policy_value" name="policy_value[]"  class="form-control{{ $errors->has('policy_value') ? ' is-invalid' : '' }}" >
      <label class="form-control-placeholder" for="policy_value">Policy Value({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('policy_value'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('policy_value') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>



<div class="row">
 <div class="col-md-3">  
  <div class="form-group">
    <input type="date"  id="policy_maturity_date" name="policy_maturity_date[]"  class="datechk form-control{{ $errors->has('policy_maturity_date') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="policy_maturity_date">Policy Maturity Date: </label>
    @if ($errors->has('policy_maturity_date'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('policy_maturity_date') }}</strong>
    </span>
    @endif
  </div>
</div>


<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="surrender_value" class="form-control{{ $errors->has('surrender_value') ? ' is-invalid' : '' }}" name="surrender_value[]" >
   <label class="form-control-placeholder" for="surrender_value">Surrender Value({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('surrender_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('surrender_value') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="claim_nature" class="form-control{{ $errors->has('claim_nature') ? ' is-invalid' : '' }}" name="claim_nature[]" >
   <label class="form-control-placeholder" for="claim_nature"> Nature of Claim:
   </label>
   @if ($errors->has('claim_nature'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_nature') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="claim_value_insurance" class="form-control{{ $errors->has('claim_value_insurance') ? ' is-invalid' : '' }}" name="claim_value_insurance[]" >
   <label class="form-control-placeholder" for="claim_value_insurance"> Value of Claim({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('claim_value_insurance'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_value_insurance') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="date"  id="date_of_claim" class="datechk form-control{{ $errors->has('date_of_claim') ? ' is-invalid' : '' }}" name="date_of_claim[]" >
     <label class="form-control-placeholder" for="date_of_claim"> Date of Claim:
     </label>
     @if ($errors->has('date_of_claim'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_claim') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4">  
  <div class="form-group">
    <input type="date"  id="date_of_notice_insurance" name="date_of_notice_insurance[]"  class="datechk form-control{{ $errors->has('date_of_notice_insurance') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="date_of_notice_insurance">Date of Notice: </label>
    @if ($errors->has('date_of_notice_insurance'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_notice_insurance') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
    <input type="date"  id="date_of_breach_insurance" name="date_of_breach_insurance[]"  class="datechk form-control{{ $errors->has('date_of_breach_insurance') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="date_of_breach_insurance">Date of Breach: </label>
    @if ($errors->has('date_of_breach_insurance'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_breach_insurance') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row">
 <div class="col-md-4">  
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="claim_amount_insurance" name="claim_amount_insurance[]"  class="form-control{{ $errors->has('claim_amount_insurance') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="claim_amount_insurance">Claim Amount({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('claim_amount_insurance'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_amount_insurance') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="claim_amount_int" name="claim_amount_int[]"  class="form-control{{ $errors->has('claim_amount_int') ? ' is-invalid' : '' }}">
    <label class="form-control-placeholder" for="claim_amount_int">Interest:</label>
    @if ($errors->has('claim_amount_int'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_amount_int') }}</strong>
    </span>
    @endif
  </div>
</div>
<!-- <div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_amount_withoutint" style="margin-left: 28px;">Without Interest </label>
    <input type="checkbox" id="claim_amount_withoutint" class="form-control" style="width:7%" name="claim_amount_withoutint[]" value="yes">
    
  </div>
</div> -->
</div>

<div class="row">
 <div class="col-md-4">  
  <div class="form-group">
    <input type="text" id="document_no" name="document_no[]"  class="form-control{{ $errors->has('document_no') ? ' is-invalid' : '' }}">
    <label class="form-control-placeholder" for="document_no">Transport/ Warehousing/ Courier Document No: </label>
    @if ($errors->has('document_no'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('document_no') }}</strong>
    </span>
    @endif
  </div>
</div>


<div class="col-md-2"> 
  <div class="form-group">
   <input type="date"  id="date_document" class="datechk form-control{{ $errors->has('date_document') ? ' is-invalid' : '' }}" name="date_document[]" >
   <label class="form-control-placeholder" for="date_document">Date:
   </label>
   @if ($errors->has('date_document'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_document') }}</strong>
  </span>
  @endif
</div>
</div>

<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="demurrage_charges" class="form-control{{ $errors->has('demurrage_charges') ? ' is-invalid' : '' }}" name="demurrage_charges[]" >
   <label class="form-control-placeholder" for="demurrage_charges">Demurrage Charges({{$claimantinformations[0]->currency}}): 
   </label>
   @if ($errors->has('demurrage_charges'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('demurrage_charges') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="freight_charges" class="form-control{{ $errors->has('freight_charges') ? ' is-invalid' : '' }}" name="freight_charges[]" >
   <label class="form-control-placeholder" for="freight_charges">Freight Charges({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('freight_charges'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('freight_charges') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
 <div class="col-md-4">  
  <div class="form-group">
    <input type="text" id="goods_nature" name="goods_nature[]"  class="form-control{{ $errors->has('goods_nature') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="goods_nature">Nature of Goods:</label>
    @if ($errors->has('goods_nature'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('goods_nature') }}</strong>
    </span>
    @endif
  </div>
</div>


<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="value_of_good" class="form-control{{ $errors->has('value_of_good') ? ' is-invalid' : '' }}" name="value_of_good[]" >
   <label class="form-control-placeholder" for="value_of_good"> Value of Goods({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('value_of_good'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('value_of_good') }}</strong>
  </span>
  @endif
</div>
</div>


<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="loss_nature" class="form-control{{ $errors->has('loss_nature') ? ' is-invalid' : '' }}" name="loss_nature[]" >
   <label class="form-control-placeholder" for="loss_nature"> Nature of Loss:
   </label>
   @if ($errors->has('loss_nature'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('loss_nature') }}</strong>
  </span>
  @endif
</div>
</div>

   <div class="col-md-1">

<div class="buttons" id="insurnace_btn1" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div>
</div>  
   <div class="col-md-1">
<div  id="insurance_del" style="display:none;"  class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>
</div>
<div id="insurance1"></div>
 
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
<form  id="claimdetails_update_form" name="claimdetails_update_form" class='div_id' method="POST" style="width: 100%;" >
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
          <label><u><b>Document Details</b></u></label>
        </div>
      </div>
    </div>
    @php
$count_in=1; 
@endphp 
    @foreach ($insurance_claim as $insurance_claims)
    @if($insurance_claims->claim_id == $claimDetail->claimdetailsid)
     <div class="row">
<div class="col-md-1"><input class="form-control" value="{{$count_in}}"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
         <div class="col-md-2"> 
          <div class="form-group">
           <input type="text" onkeypress="return isNumberKey(event)"   id="policy_no" class="form-control{{ $errors->has('policy_no') ? ' is-invalid' : '' }}"  value="{{$insurance_claims->policy_no}}" >
           <label class="form-control-placeholder" for="policy_no">Policy Number:</label>
           @if ($errors->has('policy_no'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('policy_no') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-3"> 
        <div class="form-group">
         <input type="text" id="nature_of_cover" class="form-control{{ $errors->has('nature_of_cover') ? ' is-invalid' : '' }}"   value="{{$insurance_claims->nature_of_cover}}" readonly>
         <label class="form-control-placeholder" for="nature_of_cover">Nature of Cover:</label>
         @if ($errors->has('nature_of_cover'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('nature_of_cover') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
       <input type="date"  id="date_insurance" class="datechk form-control{{ $errors->has('date_insurance') ? ' is-invalid' : '' }}"  value="{{$insurance_claims->date_insurance}}" readonly>
       <label class="form-control-placeholder" for="date_insurance">Document Date:</label>
       @if ($errors->has('date_insurance'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('date_insurance') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3">  
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"   id="policy_value"   class="form-control{{ $errors->has('policy_value') ? ' is-invalid' : '' }}" value="{{ number_format((float)$insurance_claims->policy_value, 2, '.', '') }}" readonly>
      <label class="form-control-placeholder" for="policy_value">Policy Value({{$claimantinformations[0]->currency}}): </label>
      @if ($errors->has('policy_value'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('policy_value') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>



<div class="row">
 <div class="col-md-3">  
  <div class="form-group">
    <input type="date"  id="policy_maturity_date"   class="datechk form-control{{ $errors->has('policy_maturity_date') ? ' is-invalid' : '' }}" value="{{$insurance_claims->policy_maturity_date}}" readonly>
    <label class="form-control-placeholder" for="policy_maturity_date">Policy Maturity Date: </label>
    @if ($errors->has('policy_maturity_date'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('policy_maturity_date') }}</strong>
    </span>
    @endif
  </div>
</div>


<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="surrender_value" class="form-control{{ $errors->has('surrender_value') ? ' is-invalid' : '' }}"  value="{{ number_format((float)$insurance_claims->surrender_value, 2, '.', '') }}" readonly>
   <label class="form-control-placeholder" for="surrender_value">Surrender Value({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('surrender_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('surrender_value') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="claim_nature" class="form-control{{ $errors->has('claim_nature') ? ' is-invalid' : '' }}"  value="{{$insurance_claims->claim_nature}}" readonly>
   <label class="form-control-placeholder" for="claim_nature"> Nature of Claim:
   </label>
   @if ($errors->has('claim_nature'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_nature') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="claim_value_insurance" class="form-control{{ $errors->has('claim_value_insurance') ? ' is-invalid' : '' }}"  value="{{ number_format((float)$insurance_claims->claim_value_insurance, 2, '.', '') }}" readonly>
   <label class="form-control-placeholder" for="claim_value_insurance"> Value of Claim({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('claim_value_insurance'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_value_insurance') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="date"  id="date_of_claim" class="datechk form-control{{ $errors->has('date_of_claim') ? ' is-invalid' : '' }}"  value="{{$insurance_claims->date_of_claim}}" readonly>
     <label class="form-control-placeholder" for="date_of_claim"> Date of Claim:
     </label>
     @if ($errors->has('date_of_claim'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_claim') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4">  
  <div class="form-group">
    <input type="date"  id="date_of_notice_insurance"   class="datechk form-control{{ $errors->has('date_of_notice_insurance') ? ' is-invalid' : '' }}" value="{{$insurance_claims->date_of_notice_insurance}}" readonly>
    <label class="form-control-placeholder" for="date_of_notice_insurance">Date of Notice: </label>
    @if ($errors->has('date_of_notice_insurance'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_notice_insurance') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
    <input type="date"  id="date_of_breach_insurance"   class="datechk form-control{{ $errors->has('date_of_breach_insurance') ? ' is-invalid' : '' }}" value="{{$insurance_claims->date_of_breach_insurance}}" readonly>
    <label class="form-control-placeholder" for="date_of_breach_insurance">Date of Breach: </label>
    @if ($errors->has('date_of_breach_insurance'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_breach_insurance') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row">
 <div class="col-md-4">  
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="claim_amount_insurance"   class="form-control{{ $errors->has('claim_amount_insurance') ? ' is-invalid' : '' }}" value="{{ number_format((float)$insurance_claims->claim_amount_insurance, 2, '.', '') }}" readonly>
    <label class="form-control-placeholder" for="claim_amount_insurance">Claim Amount({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('claim_amount_insurance'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_amount_insurance') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="claim_amount_int"   class="form-control{{ $errors->has('claim_amount_int') ? ' is-invalid' : '' }}" value="{{$insurance_claims->claim_amount_int}}" readonly>
    <label class="form-control-placeholder" for="claim_amount_int">Interest:</label>
    @if ($errors->has('claim_amount_int'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_amount_int') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
    <input type="text" id="document_no"   class="form-control{{ $errors->has('document_no') ? ' is-invalid' : '' }}" value="{{$insurance_claims->document_no}}" readonly>
    <label class="form-control-placeholder" for="document_no">Transport/ Warehousing/ Courier Document No: </label>
    @if ($errors->has('document_no'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('document_no') }}</strong>
    </span>
    @endif
  </div>
</div>
<!-- <div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_amount_withoutint" style="margin-left: 28px;">Without Interest </label>
    <input type="checkbox" id="claim_amount_withoutint" class="form-control" style="width:7%" name="claim_amount_withoutint[]" value="yes" {{ $insurance_claims->claim_amount_withoutint == 'yes' ? 'checked' : ''}}>
    
  </div>
</div> -->
</div>

<div class="row">
 


<div class="col-md-4"> 
  <div class="form-group">
   <input type="date"  id="date_document" class="datechk form-control{{ $errors->has('date_document') ? ' is-invalid' : '' }}"  value="{{$insurance_claims->date_document}}" readonly>
   <label class="form-control-placeholder" for="date_document">Date:
   </label>
   @if ($errors->has('date_document'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_document') }}</strong>
  </span>
  @endif
</div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="demurrage_charges" class="form-control{{ $errors->has('demurrage_charges') ? ' is-invalid' : '' }}"  value="{{ number_format((float)$insurance_claims->demurrage_charges, 2, '.', '') }}" readonly>
   <label class="form-control-placeholder" for="demurrage_charges">Demurrage Charges({{$claimantinformations[0]->currency}}): 
   </label>
   @if ($errors->has('demurrage_charges'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('demurrage_charges') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="freight_charges" class="form-control{{ $errors->has('freight_charges') ? ' is-invalid' : '' }}"  value="{{ number_format((float)$insurance_claims->freight_charges, 2, '.', '') }}" readonly>
   <label class="form-control-placeholder" for="freight_charges">Freight Charges({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('freight_charges'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('freight_charges') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
 <div class="col-md-4">  
  <div class="form-group">
    <input type="text" id="goods_nature"   class="form-control{{ $errors->has('goods_nature') ? ' is-invalid' : '' }}" value="{{$insurance_claims->goods_nature}}" readonly>
    <label class="form-control-placeholder" for="goods_nature">Nature of Goods:</label>
    @if ($errors->has('goods_nature'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('goods_nature') }}</strong>
    </span>
    @endif
  </div>
</div>


<div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="value_of_good" class="form-control{{ $errors->has('value_of_good') ? ' is-invalid' : '' }}"  value="{{ number_format((float)$insurance_claims->value_of_good, 2, '.', '') }}" readonly>
   <label class="form-control-placeholder" for="value_of_good"> Value of Goods({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('value_of_good'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('value_of_good') }}</strong>
  </span>
  @endif
</div>
</div>


<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="loss_nature" class="form-control{{ $errors->has('loss_nature') ? ' is-invalid' : '' }}"  value="{{$insurance_claims->loss_nature}}" readonly>
   <label class="form-control-placeholder" for="loss_nature"> Nature of Loss:
   </label>
   @if ($errors->has('loss_nature'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('loss_nature') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
@php
$count_in=$count_in+1;
@endphp
@endif
@endforeach
<div class="row">

   <div class="col-md-1"><input class="form-control insurance" value="{{$count_in}}"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
         <div class="col-md-3"> 
          <div class="form-group">
           <input type="text" onkeypress="return isNumberKey(event)"   id="policy_no" class="form-control{{ $errors->has('policy_no') ? ' is-invalid' : '' }}" name="policy_no[]"  >
           <label class="form-control-placeholder" for="policy_no">Policy Number:</label>
           @if ($errors->has('policy_no'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('policy_no') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-2"> 
        <div class="form-group">
         <input type="text" id="nature_of_cover" class="form-control{{ $errors->has('nature_of_cover') ? ' is-invalid' : '' }}" name="nature_of_cover[]"  >
         <label class="form-control-placeholder" for="nature_of_cover">Nature of Cover:</label>
         @if ($errors->has('nature_of_cover'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('nature_of_cover') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
       <input type="date"  id="date_insurance" class="datechk form-control{{ $errors->has('date_insurance') ? ' is-invalid' : '' }}" name="date_insurance[]" >
       <label class="form-control-placeholder" for="date_insurance">Date:</label>
       @if ($errors->has('date_insurance'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('date_insurance') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3">  
    <div class="form-group">
      <input type="text" onkeypress="return isNumberKey(event)"   id="policy_value" name="policy_value[]"  class="form-control{{ $errors->has('policy_value') ? ' is-invalid' : '' }}" >
      <label class="form-control-placeholder" for="policy_value">Policy Value({{$claimantinformations[0]->currency}}): </label>
      @if ($errors->has('policy_value'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('policy_value') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>



<div class="row">
 <div class="col-md-3">  
  <div class="form-group">
    <input type="date"  id="policy_maturity_date" name="policy_maturity_date[]"  class="datechk form-control{{ $errors->has('policy_maturity_date') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="policy_maturity_date">Policy Maturity Date: </label>
    @if ($errors->has('policy_maturity_date'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('policy_maturity_date') }}</strong>
    </span>
    @endif
  </div>
</div>


<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="surrender_value" class="form-control{{ $errors->has('surrender_value') ? ' is-invalid' : '' }}" name="surrender_value[]" >
   <label class="form-control-placeholder" for="surrender_value">Surrender Value({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('surrender_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('surrender_value') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="claim_nature" class="form-control{{ $errors->has('claim_nature') ? ' is-invalid' : '' }}" name="claim_nature[]" >
   <label class="form-control-placeholder" for="claim_nature"> Nature of Claim:
   </label>
   @if ($errors->has('claim_nature'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_nature') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="claim_value_insurance" class="form-control{{ $errors->has('claim_value_insurance') ? ' is-invalid' : '' }}" name="claim_value_insurance[]" >
   <label class="form-control-placeholder" for="claim_value_insurance"> Value of Claim({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('claim_value_insurance'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('claim_value_insurance') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="date"  id="date_of_claim" class="datechk form-control{{ $errors->has('date_of_claim') ? ' is-invalid' : '' }}" name="date_of_claim[]" >
     <label class="form-control-placeholder" for="date_of_claim"> Date of Claim:
     </label>
     @if ($errors->has('date_of_claim'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_claim') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4">  
  <div class="form-group">
    <input type="date"  id="date_of_notice_insurance" name="date_of_notice_insurance[]"  class="datechk form-control{{ $errors->has('date_of_notice_insurance') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="date_of_notice_insurance">Date of Notice: </label>
    @if ($errors->has('date_of_notice_insurance'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_notice_insurance') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
    <input type="date"  id="date_of_breach_insurance" name="date_of_breach_insurance[]"  class="datechk form-control{{ $errors->has('date_of_breach_insurance') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="date_of_breach_insurance">Date of Breach: </label>
    @if ($errors->has('date_of_breach_insurance'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_breach_insurance') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row">
 <div class="col-md-4">  
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="claim_amount_insurance" name="claim_amount_insurance[]"  class="form-control{{ $errors->has('claim_amount_insurance') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="claim_amount_insurance">Claim Amount({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('claim_amount_insurance'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_amount_insurance') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">  
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="claim_amount_int" name="claim_amount_int[]"  class="form-control{{ $errors->has('claim_amount_int') ? ' is-invalid' : '' }}">
    <label class="form-control-placeholder" for="claim_amount_int">Interest:</label>
    @if ($errors->has('claim_amount_int'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claim_amount_int') }}</strong>
    </span>
    @endif
  </div>
</div>
<!-- <div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" for="claim_amount_withoutint" style="margin-left: 28px;">Without Interest </label>
    <input type="checkbox" id="claim_amount_withoutint" class="form-control" style="width:7%" name="claim_amount_withoutint[]" value="yes">
    
  </div>
</div> -->
 <div class="col-md-4">  
  <div class="form-group">
    <input type="text" id="document_no" name="document_no[]"  class="form-control{{ $errors->has('document_no') ? ' is-invalid' : '' }}">
    <label class="form-control-placeholder" for="document_no">Transport/ Warehousing/ Courier Document No: </label>
    @if ($errors->has('document_no'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('document_no') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>

<div class="row">
 


<div class="col-md-4"> 
  <div class="form-group">
   <input type="date"  id="date_document" class="datechk form-control{{ $errors->has('date_document') ? ' is-invalid' : '' }}" name="date_document[]" >
   <label class="form-control-placeholder" for="date_document">Date:
   </label>
   @if ($errors->has('date_document'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_document') }}</strong>
  </span>
  @endif
</div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="demurrage_charges" class="form-control{{ $errors->has('demurrage_charges') ? ' is-invalid' : '' }}" name="demurrage_charges[]" >
   <label class="form-control-placeholder" for="demurrage_charges">Demurrage Charges({{$claimantinformations[0]->currency}}): 
   </label>
   @if ($errors->has('demurrage_charges'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('demurrage_charges') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="freight_charges" class="form-control{{ $errors->has('freight_charges') ? ' is-invalid' : '' }}" name="freight_charges[]" >
   <label class="form-control-placeholder" for="freight_charges">Freight Charges({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('freight_charges'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('freight_charges') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
 <div class="col-md-4">  
  <div class="form-group">
    <input type="text" id="goods_nature" name="goods_nature[]"  class="form-control{{ $errors->has('goods_nature') ? ' is-invalid' : '' }}" >
    <label class="form-control-placeholder" for="goods_nature">Nature of Goods:</label>
    @if ($errors->has('goods_nature'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('goods_nature') }}</strong>
    </span>
    @endif
  </div>
</div>


<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="value_of_good" class="form-control{{ $errors->has('value_of_good') ? ' is-invalid' : '' }}" name="value_of_good[]" >
   <label class="form-control-placeholder" for="value_of_good"> Value of Goods({{$claimantinformations[0]->currency}}):
   </label>
   @if ($errors->has('value_of_good'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('value_of_good') }}</strong>
  </span>
  @endif
</div>
</div>


<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="loss_nature" class="form-control{{ $errors->has('loss_nature') ? ' is-invalid' : '' }}" name="loss_nature[]" >
   <label class="form-control-placeholder" for="loss_nature"> Nature of Loss:
   </label>
   @if ($errors->has('loss_nature'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('loss_nature') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-1">

<div class="buttons" id="insurnace_btn2" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div>
</div>
   <div class="col-md-1">
<div  id="insurance_del2" style="display:none;"  class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>
</div>
<div id="insurance2"></div>


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
<!-- <script type="text/javascript">
  $('#claim_amount_withoutint').on('click', function () {
    if ($(this).prop('checked')) {
      document.getElementById("claim_amount_int").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#claim_amount_int').val("");

              } else {
               document.getElementById("claim_amount_int").disabled = false;
               $('#claim_amount_int').val("");
             }
           });
         </script> -->
         <script type="text/javascript">
           var dateClass='.datechk';
$(document).ready(function ()
{
if (document.querySelector(dateClass).type !== 'date')
{
var oCSS = document.createElement('link');
oCSS.type='text/css'; oCSS.rel='stylesheet';
oCSS.href='//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css';
oCSS.onload=function()
{
var oJS = document.createElement('script');
oJS.type='text/javascript';
oJS.src='//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js';
oJS.onload=function()
{
$(dateClass).datepicker();
}
document.body.appendChild(oJS);
}
document.body.appendChild(oCSS);
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