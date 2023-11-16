
    <div class="col-md-12" style="pointer-events: none;">
      <div class="row">
       <div class="col-md-12">
         <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
         
        </div>            
        <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Details</b></u></label>
        </div>
      </div>
    </div>
   @foreach ($respodentcounterclaimrealestate_claim as $realestate_claims)
 @if($realestate_claims->claim_id == $details->claimdetailsid)
<div class="row">
  <!--  -->
          <div class="col-md-3"> 
            <div class="form-group">
             <input type="text" id="nature_of_contract_real" class="form-control{{ $errors->has('nature_of_contract_real') ? ' is-invalid' : '' }}"  value="{{$realestate_claims->nature_of_contract_real}}" readonly >
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
           <input type="date" id="date_of_cintract_real" class="datechk form-control{{ $errors->has('date_of_cintract_real') ? ' is-invalid' : '' }}"   value="{{$realestate_claims->date_of_cintract_real}}" readonly>
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
         <input type="text" onkeypress="return isNumberKey(event)"   id="annual_value_real" class="form-control{{ $errors->has('annual_value_real') ? ' is-invalid' : '' }}"   value="{{ number_format((float)$realestate_claims->annual_value_real, 2, '.', '') }}" readonly>
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
          <input type="text" id="natue_of_immovable_real"   class="form-control{{ $errors->has('natue_of_immovable_real') ? ' is-invalid' : '' }}" value="{{$realestate_claims->natue_of_immovable_real}}" readonly>
          
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
         <input type="text" id="name_of_possessor_real" class="form-control{{ $errors->has('name_of_possessor_real') ? ' is-invalid' : '' }}"  value="{{$realestate_claims->name_of_possessor_real}}" readonly>
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
       <input type="text" id="name_of_owner_real" class="form-control{{ $errors->has('name_of_owner_real') ? ' is-invalid' : '' }}"  value="{{$realestate_claims->name_of_owner_real}}" readonly>
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
     <input type="text" id="description_real" class="form-control{{ $errors->has('description_real') ? ' is-invalid' : '' }}"  value="{{$realestate_claims->description_real}}" readonly>
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
   <input type="text" id="schedule_real" class="form-control{{ $errors->has('schedule_real') ? ' is-invalid' : '' }}"  value="{{$realestate_claims->schedule_real}}" readonly>
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
   <input type="text" onkeypress="return isNumberKey(event)"   id="market_value_real" class="form-control{{ $errors->has('market_value_real') ? ' is-invalid' : '' }}"  value="{{ number_format((float)$realestate_claims->market_value_real, 2, '.', '') }}" readonly >
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
   <input type="text" onkeypress="return isNumberKey(event)"   id="mortgage_value" class="form-control{{ $errors->has('mortgage_value') ? ' is-invalid' : '' }}"  value="{{ number_format((float)$realestate_claims->mortgage_value, 2, '.', '') }}" readonly>
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
     <input type="date" id="date_of_breach_real" class="datechk form-control{{ $errors->has('date_of_breach_real') ? ' is-invalid' : '' }}"  value="{{$realestate_claims->date_of_breach_real}}" readonly>
     <label class="form-control-placeholder" for="date_of_breach_real">Date of Breach/ Cause of Action:
     </label>
     @if ($errors->has('date_of_breach_real'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('date_of_breach_real') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-5"> 
  <div class="form-group">
   <input type="date" id="date_of_notice_real" class="datechk form-control{{ $errors->has('date_of_notice_real') ? ' is-invalid' : '' }}"  value="{{$realestate_claims->date_of_notice_real}}" readonly>
   <label class="form-control-placeholder" for="date_of_notice_real">Date of Notice:
   </label>
   @if ($errors->has('date_of_notice_real'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('date_of_notice_real') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
@endif
@endforeach
</div>