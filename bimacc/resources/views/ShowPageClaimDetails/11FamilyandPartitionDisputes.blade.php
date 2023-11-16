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
      @if($details->claimdetailsid ==$family_claims->claim_id)
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
@endif
@endforeach
 @php
$count_in2=1; 
@endphp

@foreach ($family_claim_movable as $family_claim_movables)
@if($details->claimdetailsid ==$family_claim_movables->claim_id)
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
  <div class="col-md-4">  
    <div class="form-group">
      <input type="text" id="csnature_of_cause_of_action" name="nature_of_cause_of_action"  class="form-control{{ $errors->has('nature_of_cause_of_action') ? ' is-invalid' : '' }}" value="{{$details->nature_of_cause_of_action}}">

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
      <input type="date" id="csdate_of_cause_of_action" name="date_of_cause_of_action"  class="form-control{{ $errors->has('date_of_cause_of_action') ? ' is-invalid' : '' }}" value="{{$details->date_of_cause_of_action}}">

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
       value="{{ number_format((float)$details->claimamount, 2, '.', '') }}" >
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
     <textarea  class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim" >{{$details->reason_for_claim}}</textarea>
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
     value="{{ number_format((float)$details->average_annnual, 2, '.', '') }}">

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






