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
         <div class="col-md-12">

          <div class="form-group text-center" style="margin-bottom: 1.4em">
            <label><u><b>Nature of Each Immovable property</b></u></label>
          </div>
        </div>
      </div>  
      <div class="row">
             <div class="col-md-1"><input class="form-control" value="1"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
        <div class="col-md-4">  
          <div class="form-group">
            <input type="text" id="immovable_nature" name="immovable_nature[]"  class="form-control{{ $errors->has('immovable_nature') ? ' is-invalid' : '' }}"  onkeypress="return alpha(event)"/
            >

            <label class="form-control-placeholder" for="immovable_nature">Nature of Immovable Property:</label>
            @if ($errors->has('immovable_nature'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('immovable_nature') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="col-md-3">  
          <div class="form-group">
            <input type="text" id="immovable_possessor" name="immovable_possessor[]"  class="form-control{{ $errors->has('immovable_possessor') ? ' is-invalid' : '' }}"  onkeypress="return alpha(event)"/
            >

            <label class="form-control-placeholder" for="immovable_possessor">Name of the Possessor:</label>
            @if ($errors->has('immovable_possessor'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('immovable_possessor') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-3"> 
          <div class="form-group">
           <input type="text" id="immovable_owner" class="form-control{{ $errors->has('immovable_owner') ? ' is-invalid' : '' }}" name="immovable_owner[]"  onkeypress="return alpha(event)"/>
           <label class="form-control-placeholder" for="immovable_owner">Name of the Property Owner:</label>
           @if ($errors->has('immovable_owner'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('immovable_owner') }}</strong>
          </span>
          @endif
        </div>
      </div>

    </div>
    <div class="row">

      <div class="col-md-4"> 
        <div class="form-group">
         <input type="text" id="immovable_description" class="form-control{{ $errors->has('immovable_description') ? ' is-invalid' : '' }}" name="immovable_description[]"  
         onkeypress="return alpha(event)"/>
         <label class="form-control-placeholder" for="immovable_description">Description of Property:</label>
         @if ($errors->has('immovable_description'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('immovable_description') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" id="immovable_schedule" class="form-control{{ $errors->has('immovable_schedule') ? ' is-invalid' : '' }}" name="immovable_schedule[]" >
       <label class="form-control-placeholder" for="immovable_schedule">Schedule and Boundaries:</label>
       @if ($errors->has('immovable_schedule'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('immovable_schedule') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"   id="immovable_market" class="form-control{{ $errors->has('immovable_market') ? ' is-invalid' : '' }}" name="immovable_market[]" >
     <label class="form-control-placeholder" for="immovable_market">Market Value of Property({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('immovable_market'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('immovable_market') }}</strong>
    </span>
    @endif
  </div>
</div>
   <div class="col-md-1">

<div class="buttons" id="family_btn1" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div>
</div>
   <div class="col-md-1">
<div  id="family_del" style="display:none;"  class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>

</div>
<div id="immovable"></div>

<div class="row">
 <div class="col-md-12">

  <div class="form-group text-center" style="margin-bottom: 1.4em">
    <label><u><b>Nature and Specific Description of Each Movable Property </b></u></label>
  </div>
</div>
</div>
<div class="row">
  
  <div class="col-md-1"><input class="form-control" value="1"  type="text" disabled style="background-color: antiquewhite;"><label class="form-control-placeholder">Sl. No.</label></div>
 <div class="col-md-3" > 
  <div class="form-group">
   <input type="textfield" id="movable_nature" class="form-control{{ $errors->has('movable_nature') ? ' is-invalid' : '' }}" name="movable_nature[]"  onkeypress="return alpha(event)"/>
   <label class="form-control-placeholder" for="movable_nature">Nature of Movable Property:</label>
   @if ($errors->has('movable_nature'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('movable_nature') }}</strong>
  </span>
  @endif
</div>
</div> 
<div class="col-md-2" > 
  <div class="form-group">
   <input type="textfield" id="movable_possessor" class="form-control{{ $errors->has('movable_possessor') ? ' is-invalid' : '' }}" name="movable_possessor[]"  onkeypress="return alpha(event)"/>
   <label class="form-control-placeholder" for="movable_possessor">Name of the Possessor:</label>
   @if ($errors->has('movable_possessor'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('movable_possessor') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-2"> 
  <div class="form-group">
   <input type="text" id="movable_owner" class="form-control{{ $errors->has('movable_owner') ? ' is-invalid' : '' }}" name="movable_owner[]"  onkeypress="return alpha(event)"/>
   <label class="form-control-placeholder" for="movable_owner">Name of the Owner:</label>
   @if ($errors->has('movable_owner'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('movable_owner') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-2"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="movable_value" class="form-control{{ $errors->has('movable_value') ? ' is-invalid' : '' }}" name="movable_value[]" >
   <label class="form-control-placeholder" for="movable_value">Value of Property({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('movable_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('movable_value') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-1">
<div class="buttons" id="family_btn2" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div>
</div>
   <div class="col-md-1">
<div  id="family_del1" style="display:none;"  class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>


</div>
<div id="movable"></div>
<div class="row">
  <div class="col-md-4">  
    <div class="form-group">
      <input type="text" id="nature_of_cause_of_action" name="nature_of_cause_of_action"  class="form-control{{ $errors->has('nature_of_cause_of_action') ? ' is-invalid' : '' }}" >

      <label class="form-control-placeholder" for="nature_of_cause_of_action">Nature of Cause of Action:</label>
      @if ($errors->has('nature_of_cause_of_action'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('nature_of_cause_of_action') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
    <div class="form-group">
      <input type="date" id="date_of_cause_of_action" name="date_of_cause_of_action"  class="datechk form-control{{ $errors->has('date_of_cause_of_action') ? ' is-invalid' : '' }}" >

      <label class="form-control-placeholder" for="date_of_cause_of_action">Date of Cause of Action:</label>
      @if ($errors->has('date_of_cause_of_action'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('date_of_cause_of_action') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">

     <input type="text" onkeypress="return isNumberKey(event)"   id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount"  >
     @if ($claimantinformations[0]->currency =='INR') 
     <label class="form-control-placeholder" for="claimamount">Claim Amount (INR)<span style="color: red">*</span>:</label>
     @else
     <label class="form-control-placeholder" for="claimamount">Claim Amount(USD) <span style="color: red">*</span>:</label>
     @endif


     @if ($errors->has('claimamount'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claimamount') }}</strong>
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
<div class="col-md-4">  
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="average_annnual" name="average_annnual"  class="form-control{{ $errors->has('average_annnual') ? ' is-invalid' : '' }}" >

    <label class="form-control-placeholder" for="average_annnual">Average Annual Maintenance Claim({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('average_annnual'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('average_annnual') }}</strong>
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
<form  id="claimdetails_update_form" name="claimdetails_update_form" class='div_id' method="POST" style="width: 100%;" >
  @csrf  
  <div class="row register-form">
    <input type="text" name="claimdetailsid" style="display: none" value="{{$claimDetail->claimdetailsid}}">
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
     <div class="col-md-12">

      <div class="form-group text-center" style="margin-bottom: 1.4em">
        <label><u><b>Nature of Each Immovable property</b></u></label>
      </div>
    </div>
  </div>
   @php
$count_in=1; 
@endphp
  @foreach ($family_claim as $family_claims)
  @if($claimDetail->claimdetailsid ==$family_claims->claim_id) 
      <div class="row">
        <div class="col-md-1"><input class="form-control" value="{{$count_in}}"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
    <div class="col-md-3">  
      <div class="form-group">
        <input type="text" id="immovable_nature1" value="{{$family_claims->immovable_nature}}"   class="form-control{{ $errors->has('immovable_nature') ? ' is-invalid' : '' }}" readonly>

        <label class="form-control-placeholder" for="immovable_nature">Nature of Immovable property:</label>
      </div>
    </div>

    <div class="col-md-3">  
      <div class="form-group">
        <input type="text" id="immovable_possessor1" value="{{$family_claims->immovable_possessor}}"   class="form-control{{ $errors->has('immovable_possessor') ? ' is-invalid' : '' }}" readonly>

        <label class="form-control-placeholder" for="immovable_possessor">Name of the Possessor</label>
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" id="immovable_owner1" class="form-control{{ $errors->has('immovable_owner') ? ' is-invalid' : '' }}" value="{{$family_claims->immovable_owner}}" readonly>
       <label class="form-control-placeholder" for="immovable_owner">Name of the Property Owner:</label>
    
    </div>
  </div>

</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" id="immovable_description1" class="form-control{{ $errors->has('immovable_description') ? ' is-invalid' : '' }}" value="{{$family_claims->immovable_description}}"  readonly>
     <label class="form-control-placeholder" for="immovable_description">Description of Property:</label>
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
   <input type="text" id="immovable_schedule1" class="form-control{{ $errors->has('immovable_schedule') ? ' is-invalid' : '' }}" value="{{$family_claims->immovable_schedule}}" readonly>
   <label class="form-control-placeholder" for="immovable_schedule">Schedule and Boundaries:</label>

</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="immovable_market1" class="form-control{{ $errors->has('immovable_market') ? ' is-invalid' : '' }}" value="{{ number_format((float)$family_claims->immovable_market, 2, '.', '') }}" readonly >
   <label class="form-control-placeholder" for="immovable_market">Market Value of Property({{$claimantinformations[0]->currency}}):</label>
</div>
</div>
</div>
@php
$count_in=$count_in+1;
@endphp

  @endif
  @endforeach
  
  <div class="row">
    <div class="col-md-1"><input class="form-control family1" value="{{$count_in}}"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
    <div class="col-md-3">  
      <div class="form-group">
        <input type="text" id="immovable_nature" name="immovable_nature[]"  class="form-control{{ $errors->has('immovable_nature') ? ' is-invalid' : '' }}"  onkeypress="return alpha(event)"/
        >

        <label class="form-control-placeholder" for="immovable_nature">Nature of Immovable property:</label>
        @if ($errors->has('immovable_nature'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('immovable_nature') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="col-md-3">  
      <div class="form-group">
        <input type="text" id="immovable_possessor" name="immovable_possessor[]"  class="form-control{{ $errors->has('immovable_possessor') ? ' is-invalid' : '' }}"  onkeypress="return alpha(event)"/
        >

        <label class="form-control-placeholder" for="immovable_possessor">Name of the Possessor:</label>
        @if ($errors->has('immovable_possessor'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('immovable_possessor') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" id="immovable_owner" class="form-control{{ $errors->has('immovable_owner') ? ' is-invalid' : '' }}" name="immovable_owner[]"  onkeypress="return alpha(event)"/
       >
       <label class="form-control-placeholder" for="immovable_owner">Name of the Property Owner:</label>
       @if ($errors->has('immovable_owner'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('immovable_owner') }}</strong>
      </span>
      @endif
    </div>
  </div>

</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" id="immovable_description" class="form-control{{ $errors->has('immovable_description') ? ' is-invalid' : '' }}" name="immovable_description[]"  onkeypress="return alpha(event)"/
     >
     <label class="form-control-placeholder" for="immovable_description">Description of Property:</label>
     @if ($errors->has('immovable_description'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('immovable_description') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="immovable_schedule" class="form-control{{ $errors->has('immovable_schedule') ? ' is-invalid' : '' }}" name="immovable_schedule[]" 
   >
   <label class="form-control-placeholder" for="immovable_schedule">Schedule and Boundaries:</label>
   @if ($errors->has('immovable_schedule'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('immovable_schedule') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="immovable_market" class="form-control{{ $errors->has('immovable_market') ? ' is-invalid' : '' }}" name="immovable_market[]" 
   >
   <label class="form-control-placeholder" for="immovable_market">Market Value of Property({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('immovable_market'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('immovable_market') }}</strong>
  </span>
  @endif
</div>
</div>
 <div class="col-md-1">
<div class="buttons" id="family_btn1_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div>
</div>
   <div class="col-md-1">
<div  id="family_del_edit" style="display:none;"  class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>

</div>
<div id="immovable_edit"></div>

<div class="row">
 <div class="col-md-12">

  <div class="form-group text-center" style="margin-bottom: 1.4em">
    <label><u><b>Nature and Specific Description of Each Movable Property </b></u></label>
  </div>
</div>
</div>
@php
$count_in2=1; 
@endphp
@foreach ($family_claim_movable as $family_claim_movables)
@if($claimDetail->claimdetailsid ==$family_claim_movables->claim_id)
<div class="row">
  
   <div class="col-md-1"><input class="form-control" value="{{$count_in2}}"  type="text" disabled style="background-color: antiquewhite;"><label class="form-control-placeholder">Sl. No.</label></div>
 <div class="col-md-2" > 
  <div class="form-group">
   <input type="textfield" id="movable_nature1" class="form-control{{ $errors->has('movable_nature') ? ' is-invalid' : '' }}"  value="{{$family_claim_movables->movable_nature}}" readonly>
   <label class="form-control-placeholder" for="movable_nature">Nature of Movable property:</label>

</div>
</div> 
<div class="col-md-3" > 
  <div class="form-group">
   <input type="textfield" id="movable_possessor1" class="form-control{{ $errors->has('movable_possessor') ? ' is-invalid' : '' }}" value="{{$family_claim_movables->movable_possessor}}" readonly>
   <label class="form-control-placeholder" for="movable_possessor">Name of the Possessor:</label>
   
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="movable_owner1" class="form-control{{ $errors->has('movable_owner') ? ' is-invalid' : '' }}" value="{{$family_claim_movables->movable_owner}}" readonly>
   <label class="form-control-placeholder" for="movable_owner">Name of the Owner:</label>
   
</div>
</div>
<div class="col-md-2"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="movable_value" class="form-control{{ $errors->has('movable_value') ? ' is-invalid' : '' }}" value="{{ number_format((float)$family_claim_movables->movable_value, 2, '.', '') }}" readonly>
   <label class="form-control-placeholder" for="movable_value">Value of Property({{$claimantinformations[0]->currency}}):</label>
</div>
</div>
</div>
@php
$count_in2=$count_in2+1;
@endphp

@endif
@endforeach

<div class="row">
  
  <div class="col-md-1"><input class="form-control family2" value="{{$count_in2}}"  type="text" disabled style="background-color: antiquewhite;"><label class="form-control-placeholder">Sl. No.</label></div>
 <div class="col-md-2" > 
  <div class="form-group">
   <input type="textfield" id="movable_nature" class="form-control{{ $errors->has('movable_nature') ? ' is-invalid' : '' }}" name="movable_nature[]"  onkeypress="return alpha(event)"/
   >
   <label class="form-control-placeholder" for="movable_nature">Nature of Movable Property:</label>
   @if ($errors->has('movable_nature'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('movable_nature') }}</strong>
  </span>
  @endif
</div>
</div> 
<div class="col-md-2" > 
  <div class="form-group">
   <input type="textfield" id="movable_possessor" class="form-control{{ $errors->has('movable_possessor') ? ' is-invalid' : '' }}" name="movable_possessor[]"  onkeypress="return alpha(event)"/
   >
   <label class="form-control-placeholder" for="movable_possessor">Name of the Possessor:</label>
   @if ($errors->has('movable_possessor'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('movable_possessor') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" id="movable_owner" class="form-control{{ $errors->has('movable_owner') ? ' is-invalid' : '' }}" name="movable_owner[]"  onkeypress="return alpha(event)"/
   >
   <label class="form-control-placeholder" for="movable_owner">Name of the Owner:</label>
   @if ($errors->has('movable_owner'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('movable_owner') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-2"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"   id="movable_value" class="form-control{{ $errors->has('movable_value') ? ' is-invalid' : '' }}" name="movable_value[]" 
   >
   <label class="form-control-placeholder" for="movable_value">Value of Property({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('movable_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('movable_value') }}</strong>
  </span>
  @endif
</div>
</div>

  <div class="col-md-1">
<div class="buttons" id="family_btn2_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i> </span>
  </div>
</div>
   <div class="col-md-1">
<div  id="family_del1_edit" style="display:none;"  class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>


</div>
<div id="movable_edit"></div>
<div class="row">
  <div class="col-md-4">  
    <div class="form-group">
      <input type="text" id="nature_of_cause_of_action" name="nature_of_cause_of_action"  class="form-control{{ $errors->has('nature_of_cause_of_action') ? ' is-invalid' : '' }}"  value="{{$claimDetail->nature_of_cause_of_action}}"
      >

      <label class="form-control-placeholder" for="nature_of_cause_of_action">Nature of Cause of Action:</label>
      @if ($errors->has('nature_of_cause_of_action'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('nature_of_cause_of_action') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
    <div class="form-group">
      <input type="date" id="date_of_cause_of_action" name="date_of_cause_of_action"  class="datechk form-control{{ $errors->has('date_of_cause_of_action') ? ' is-invalid' : '' }}"  value="{{$claimDetail->date_of_cause_of_action}}"
      >

      <label class="form-control-placeholder" for="date_of_cause_of_action">Date of Cause of Action:</label>
      @if ($errors->has('date_of_cause_of_action'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('date_of_cause_of_action') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">

     <input type="text" onkeypress="return isNumberKey(event)"   id="claimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount" 
       value="{{ number_format((float)$claimDetail->claimamount, 2, '.', '') }}" >
     @if ($claimantinformations[0]->currency =='INR') 
     <label class="form-control-placeholder" for="claimamount">Claim Amount (INR)<span style="color: red">*</span>:</label>
     @else
     <label class="form-control-placeholder" for="claimamount">Claim Amount(USD) <span style="color: red">*</span>:</label>
     @endif


     @if ($errors->has('claimamount'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('claimamount') }}</strong>
    </span>
    @endif
  </div>
</div>



</div>
<div class="row">
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
<div class="col-md-4">  
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"   id="average_annnual" name="average_annnual"  class="form-control{{ $errors->has('average_annnual') ? ' is-invalid' : '' }}" 
     value="{{ number_format((float)$claimDetail->average_annnual, 2, '.', '') }}">

    <label class="form-control-placeholder" for="average_annnual">Average Annual Maintenance Claim({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('average_annnual'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('average_annnual') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
</div>
</div>                  
<div class="modal-footer">
  <div class="mx-auto">
    <button type="submit" class="btn btn-success btn-space" >Update</button>
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