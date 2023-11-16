     <div class="row register-form" style="pointer-events: none;">
      <div class="col-md-12">
         <div class="col-md-12">
       <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
        <!-- <label><b>Please fill in the applicable details  pertaining to the dispute</b></label> -->
      </div>            
      <div class="form-group text-center" style="margin-bottom: 1.4em">
        <label><u><b>Loan Details</b></u></label>
      </div>
    </div>
  

     <!-- @foreach($respodentcounterclaimbanking_relief as $banking_reliefs)
     @if($banking_reliefs->relief_id = $details->id)
     <div class="row">
      <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div>
      <div class="col-md-5" > 
        <div class="form-group">
          <input type="text" id="smortgaged_property" value="{{$banking_reliefs->mortgaged_property}}" readonly class="form-control{{ $errors->has('mortgaged_property') ? ' is-invalid' : '' }}" >
          <label class="form-control-placeholder" for="mortgaged_property">Mortgaged Property/ Pledged Property/ Hypothecated property:</label> 
        </div>
      </div>
    </div>
    @endif
    @endforeach -->
    
      
      
  
    <div class="row"> 
     
      <div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" id="rate_of_interest" for="rate_of_interest" style="margin-left: 18px;">Enforcement of Security Interest</label>
    <input type="checkbox" id="rate_of_interest" class="form-control" style="width:7%" name="rate_of_interest"  value="yes "{{ $details->rate_of_interest == 'yes' ? 'checked' : ''}}  >
    
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" id="amount_of_debt" for="amount_of_debt" style="margin-left: 18px;">Enforcement of Guarantees</label>
    <input type="checkbox" id="amount_of_debt" class="form-control" style="width:7%" name="amount_of_debt"  value="yes"{{ $details->amount_of_debt == 'yes' ? 'checked' : ''}}  >
    
  </div>
</div>

<div class="col-md-4"> 
  <div class="form-group">
    <label class="form-control-placeholder" id="damages_rs" for="damages_rs" style="margin-left: 18px;">Future Interest During Pendency of Arbitration</label>
    <input type="checkbox" id="damages_rs" class="form-control" style="width:7%" name="damages_rs"  value="yes"{{ $details->damages_rs == 'yes' ? 'checked' : ''}}  >
    
  </div>
</div>


</div>

<div class="row">
    
<div class="col-md-6"> 
  <div class="form-group">
    <label class="form-control-placeholder" id="rate_of_penal_interest" for="rate_of_penal_interest" style="margin-left: 26px;">Future Interest from the Date of Award</label>
    <input type="checkbox" id="rate_of_penal_interest" class="form-control" style="width:7%" name="rate_of_penal_interest"  value="yes"{{ $details->rate_of_penal_interest == 'yes' ? 'checked' : ''}} >
    
  </div>
</div>
      
      <div class="col-md-6"> 
      <div class="form-group">
       
       <input type="text" id="damage_with_interest" class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest"  value="{{ number_format((float)$details->damage_with_interest, 2, '.', '') }}" >
       <label class="form-control-placeholder" for="damage_with_interest">Total Outstanding Amount({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('nature_of_goods'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('nature_of_goods') }}</strong>
      </span>
      @endif
    </div>
  </div>

    </div>

</div>
</div>