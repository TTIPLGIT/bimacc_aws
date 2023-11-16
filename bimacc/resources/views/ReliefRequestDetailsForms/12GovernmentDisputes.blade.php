@if($ReliefRequests ==null)

<form  name="reliefrequest_form" id="reliefrequest_form" method="POST" >
  @csrf  
  <div class="row register-form">
    <div class="col-md-12">

      <div class="row">
        <div class="col-md-12"> 
          <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
            <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
          </div>
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Nature of Relief</b></u></label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"> 
          <div class="form-group">
           <input type="text" onkeypress="return isNumberKey(event)"  id="claimforontractprice"   class="form-control{{ $errors->has('claimforontractprice') ? ' is-invalid' : '' }}" name="claimforontractprice" >
           <label class="form-control-placeholder" for="claimforontractprice">Value of Claims/ Contract({{$claimantinformations[0]->currency}}):</label>
           @if ($errors->has('claimforontractprice'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claimforontractprice') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="claimforcontractpriceinerest" class="form-control{{ $errors->has('claimforcontractpriceinerest') ? ' is-invalid' : '' }}" name="claimforcontractpriceinerest" >
          <label class="form-control-placeholder" for="claimforcontractpriceinerest">Interest (%): </label>
          @if ($errors->has('claimforcontractpriceinerest'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claimforcontractpriceinerest') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="col-md-3"> 
        <div class="form-group">
         <label class="form-control-placeholder"  for="claimforcontractpriceinerestwithoutinterest" style="margin-left: 18px;">Without Interest</label>
         <input type="checkbox" class="form-control" id="claimforcontractpriceinerestwithoutinterest"  name="claimforcontractpriceinerestwithoutinterest" style="width:9%" value="yes">


       </div>
     </div>

   </div>
   <div class="row">

    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_refund"  class="form-control{{ $errors->has('claim_for_refund') ? ' is-invalid' : '' }}" name="claim_for_refund" >
        <label class="form-control-placeholder" for="claim_for_refund">Claim for Refund({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('claim_for_refund'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_refund') }}</strong>
        </span> 
        @endif
      </div>
    </div>

       <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="refund_withinterest" class="form-control{{ $errors->has('refund_withinterest') ? ' is-invalid' : '' }}" name="refund_withinterest"  >
          <label class="form-control-placeholder" for="refund_withinterest">Interest (%): </label>
          @if ($errors->has('refund_withinterest'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('refund_withinterest') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="col-md-4"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="refund_withoutinterest" style="margin-left: 18px;">Without Interest</label>
         <input type="checkbox" class="form-control" id="refund_withoutinterest"  name="refund_withoutinterest" style="width:7%"  value="yes">
       </div>
     </div>


</div>
   <div class="row">
       <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_escalation_of_costs"  class="form-control{{ $errors->has('claim_for_escalation_of_costs') ? ' is-invalid' : '' }}" name="claim_for_escalation_of_costs" >
        <label class="form-control-placeholder" for="claim_for_escalation_of_costs">Claim for Escalation of Costs({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('claim_for_escalation_of_costs'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_escalation_of_costs') }}</strong>
        </span> 
        @endif
      </div>
    </div>

    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_damages"  class="form-control{{ $errors->has('claim_for_damages') ? ' is-invalid' : '' }}" name="claim_for_damages" >
        <label class="form-control-placeholder" for="claim_for_damages">Claim for Damages({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('claim_for_damages'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_damages') }}</strong>
        </span> 
        @endif
      </div>
    </div>
   </div>
         <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Estimated Value of Contract</b></u></label>
          </div>

     <div class="row">
      <div class="col-md-3"> 
          <div class="form-group">
           <label class="form-control-placeholder"  for="demand_to_stop_infringement_select" style="margin-left: 18px;">To Terminate Contract:</label>
           <input type="checkbox" class="form-control" id="demand_to_stop_infringement_select"  name="demand_to_stop_infringement_select" style="width:9%"  value="yes">
         </div>
       </div>
       <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)" id="to_terminate_contract"  class="form-control{{ $errors->has('to_terminate_contract') ? ' is-invalid' : '' }}" name="to_terminate_contract" >
        <label class="form-control-placeholder" for="to_terminate_contract">Estimated Value of Materials({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('to_terminate_contract'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('to_terminate_contract') }}</strong>
        </span> 
        @endif
      </div>
    </div>
      <div class="col-md-3"> 
      <div class="form-group">
       <label class="form-control-placeholder" for="demand_for_licence_fee" style="margin-left: 18px;">To Vacate Contractual Site:</label>
       <input type="checkbox" class="form-control" id="demand_for_licence_fee"  name="demand_for_licence_fee" style="width:9%"  value="yes"  >
     </div>
   </div>

    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)" id="to_vacate_contractual_site"  class="form-control{{ $errors->has('to_vacate_contractual_site') ? ' is-invalid' : '' }}" name="to_vacate_contractual_site" >
        <label class="form-control-placeholder" for="to_vacate_contractual_site">Estimated Value of Materials({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('to_vacate_contractual_site'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('to_vacate_contractual_site') }}</strong>
        </span> 
        @endif
      </div>
    </div>
   
   
   </div>
   <!-- <div class="row">
        <div class="col-md-6"> 
      <div class="form-group">
        <input type="text" id="to_claim_for_specific_performance_to_purchase_power"  class="form-control{{ $errors->has('to_claim_for_specific_performance_to_purchase_power') ? ' is-invalid' : '' }}" name="to_claim_for_specific_performance_to_purchase_power" >
        <label class="form-control-placeholder" for="to_claim_for_specific_performance_to_purchase_power">To Claim for specific performance  to purchase power:  </label>
        @if ($errors->has('to_claim_for_specific_performance_to_purchase_power'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('to_claim_for_specific_performance_to_purchase_power') }}</strong>
        </span> 
        @endif
      </div>
    </div>
   </div> -->

   
   <div class="row">
    <div class="col-md-3"> 
    <div class="form-group">
     <label class="form-control-placeholder" for="demand_for_licence_fee_withoutinterest" style="margin-left: 18px;">Specific Performance of Contract:</label>
     <input type="checkbox" class="form-control" id="demand_for_licence_fee_withoutinterest"  name="demand_for_licence_fee_withoutinterest" style="width:9%"  value="yes"  >
   </div>
 </div>
     <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)" id="specific_performance_of_contract"  class="form-control{{ $errors->has('specific_performance_of_contract') ? ' is-invalid' : '' }}" name="specific_performance_of_contract" >
        <label class="form-control-placeholder" for="specific_performance_of_contract">Estimated Value of Materials({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('specific_performance_of_contract'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('specific_performance_of_contract') }}</strong>
        </span> 
        @endif
      </div>
    </div>
   
        
    <div class="col-md-3"> 
        <div class="form-group">
         <label class="form-control-placeholder" id="to_return_materials" for="to_return_materials" style="margin-left: 18px;">To Return Materials</label>
         <input type="checkbox" class="form-control" id="to_return_materials"  name="to_return_materials" style="width:9%" value="yes">
       </div>
     </div>
     <div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="estimated_value_of_material" class="form-control{{ $errors->has('estimated_value_of_material') ? ' is-invalid' : '' }}" name="estimated_value_of_material" >
    <label class="form-control-placeholder" for="estimated_value_of_material">Estimated Value of Materials({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('estimated_value_of_material'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('estimated_value_of_material') }}</strong>
    </span>
    @endif
  </div>
</div>
  
   
   </div>
   <div class="row">
     <div class="col-md-3"> 
        <div class="form-group">
         <label class="form-control-placeholder" id="to_cancel_performance_guarantees" for="to_cancel_performance_guarantees" style="margin-left: 18px;">To Cancel Performance Guarantees</label>
         <input type="checkbox" class="form-control" id="to_cancel_performance_guarantees"  name="to_cancel_performance_guarantees" style="width:9%" value="yes">
       </div>
     </div>
     <div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="amount_guaranteed" class="form-control{{ $errors->has('amount_guaranteed') ? ' is-invalid' : '' }}" name="amount_guaranteed" >
    <label class="form-control-placeholder" for="amount_guaranteed">Amount Guaranteed({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('amount_guaranteed'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('amount_guaranteed') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" >
    <label class="form-control-placeholder" for="interest_amount">Interest Amount({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('interest_amount'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('interest_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
    @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Total Claim Amount (INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Claim Amount (USD)<span style="color: red">*</span>:</label>
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
@else

@foreach($ReliefRequests as $ReliefRequest)
<form  name="reliefrequest_update_form" id="reliefrequest_update_form" method="POST" >
  @csrf  
   <div class="row register-form">
    <div class="col-md-12">

      <div class="row">
        <div class="col-md-12"> 
          <!-- <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
            <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
          </div> -->
          <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Nature of Relief</b></u></label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" onkeypress="return isNumberKey(event)"  name="reliefrequestid" value="{{ $ReliefRequest->id }}" style="display: none">
           <input type="text" id="claimforontractprice"   class="form-control{{ $errors->has('claimforontractprice') ? ' is-invalid' : '' }}" name="claimforontractprice" value="{{ number_format((float)$ReliefRequest->claimforontractprice, 2, '.', '') }}">
           <label class="form-control-placeholder" for="claimforontractprice">Value of Claims/ Contract({{$claimantinformations[0]->currency}}):</label>
           @if ($errors->has('claimforontractprice'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claimforontractprice') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="claimforcontractpriceinerest" class="form-control{{ $errors->has('claimforcontractpriceinerest') ? ' is-invalid' : '' }}" name="claimforcontractpriceinerest"  value="{{$ReliefRequest->claimforcontractpriceinerest}}" >
          <label class="form-control-placeholder" for="claimforcontractpriceinerest">Interest (%):</label>
          @if ($errors->has('claimforcontractpriceinerest'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claimforcontractpriceinerest') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="col-md-4"> 
        <div class="form-group">
         <label class="form-control-placeholder" id="claimforcontractpriceinerestwithoutinterest" for="claimforcontractpriceinerestwithoutinterest" style="margin-left: 18px;">Without Interest</label>
         <input type="checkbox" class="form-control" id="claimforcontractpriceinerestwithoutinterest"  name="claimforcontractpriceinerestwithoutinterest" style="width:7%" value="yes" {{ $ReliefRequest->claimforcontractpriceinerestwithoutinterest == 'yes' ? 'checked' : ''}} >
       </div>
     </div>

   </div>
   <div class="row">

    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_refund"  value="{{ number_format((float)$ReliefRequest->claim_for_refund, 2, '.', '') }}" class="form-control{{ $errors->has('claim_for_refund') ? ' is-invalid' : '' }}" name="claim_for_refund" >
        <label class="form-control-placeholder" for="claim_for_refund">Claim for Refund({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('claim_for_refund'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_refund') }}</strong>
        </span> 
        @endif
      </div>
    </div>

       <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="refund_withinterest" class="form-control{{ $errors->has('refund_withinterest') ? ' is-invalid' : '' }}" name="refund_withinterest"  value="{{$ReliefRequest->refund_withinterest}}">
          <label class="form-control-placeholder" for="refund_withinterest">Interest (%):</label>
          @if ($errors->has('refund_withinterest'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('refund_withinterest') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="col-md-4"> 
        <div class="form-group">
         <label class="form-control-placeholder" for="refund_withoutinterest" style="margin-left: 18px;">Without Interest</label>
         <input type="checkbox" class="form-control" id="refund_withoutinterest" value="yes" name="refund_withoutinterest" style="width:7%"  {{ $ReliefRequest->refund_withoutinterest == 'yes' ? 'checked' : ''}}>
       </div>
     </div>


</div>
   <div class="row">
       <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_escalation_of_costs"  value="{{ number_format((float)$ReliefRequest->claim_for_escalation_of_costs, 2, '.', '') }}" class="form-control{{ $errors->has('claim_for_escalation_of_costs') ? ' is-invalid' : '' }}" name="claim_for_escalation_of_costs" >
        <label class="form-control-placeholder" for="claim_for_escalation_of_costs">Claim for Escalation of Costs({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('claim_for_escalation_of_costs'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_escalation_of_costs') }}</strong>
        </span> 
        @endif
      </div>
    </div>

    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="claim_for_damages"  value="{{ number_format((float)$ReliefRequest->claim_for_damages, 2, '.', '') }}" class="form-control{{ $errors->has('claim_for_damages') ? ' is-invalid' : '' }}" name="claim_for_damages" >
        <label class="form-control-placeholder" for="claim_for_damages">Claim for Damages({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('claim_for_damages'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('claim_for_damages') }}</strong>
        </span> 
        @endif
      </div>
    </div>
   </div>
         <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
            <label><u><b>Estimated Value of Contract</b></u></label>
          </div>

       <div class="row">
      <div class="col-md-3"> 
          <div class="form-group">
           <label class="form-control-placeholder"  for="demand_to_stop_infringement_select" style="margin-left: 18px;">To Terminate Contract:</label>
           <input type="checkbox" class="form-control" id="demand_to_stop_infringement_select"  name="demand_to_stop_infringement_select" style="width:9%"  value="yes" {{ $ReliefRequest->demand_to_stop_infringement_select == 'yes' ? 'checked' : ''}}>
         </div>
       </div>
       <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)" id="to_terminate_contract"  class="form-control{{ $errors->has('to_terminate_contract') ? ' is-invalid' : '' }}" name="to_terminate_contract" value="{{ number_format((float)$ReliefRequest->to_terminate_contract, 2, '.', '') }}">
        <label class="form-control-placeholder" for="to_terminate_contract">Estimated Value of Materials({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('to_terminate_contract'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('to_terminate_contract') }}</strong>
        </span> 
        @endif
      </div>
    </div>
      <div class="col-md-3"> 
      <div class="form-group">
       <label class="form-control-placeholder" for="demand_for_licence_fee" style="margin-left: 18px;">To Vacate Contractual Site:</label>
       <input type="checkbox" class="form-control" id="demand_for_licence_fee"  name="demand_for_licence_fee" style="width:9%"  value="yes" {{ $ReliefRequest->demand_for_licence_fee == 'yes' ? 'checked' : ''}}  >
     </div>
   </div>

    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)" id="to_vacate_contractual_site"  class="form-control{{ $errors->has('to_vacate_contractual_site') ? ' is-invalid' : '' }}" name="to_vacate_contractual_site"  value="{{ number_format((float)$ReliefRequest->to_vacate_contractual_site, 2, '.', '') }}">
        <label class="form-control-placeholder" for="to_vacate_contractual_site">Estimated Value of Materials({{$claimantinformations[0]->currency}}): </label>
        @if ($errors->has('to_vacate_contractual_site'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('to_vacate_contractual_site') }}</strong>
        </span> 
        @endif
      </div>
    </div>
   
   
   </div>
   <!-- <div class="row">
        <div class="col-md-6"> 
      <div class="form-group">
        <input type="text" id="to_claim_for_specific_performance_to_purchase_power"  value="{{$ReliefRequest->to_claim_for_specific_performance_to_purchase_power}}" class="form-control{{ $errors->has('to_claim_for_specific_performance_to_purchase_power') ? ' is-invalid' : '' }}" name="to_claim_for_specific_performance_to_purchase_power" >
        <label class="form-control-placeholder" for="to_claim_for_specific_performance_to_purchase_power">To Claim for specific performance  to purchase power:  </label>
        @if ($errors->has('to_claim_for_specific_performance_to_purchase_power'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('to_claim_for_specific_performance_to_purchase_power') }}</strong>
        </span> 
        @endif
      </div>
    </div>
   </div>
    -->

   <div class="row">
    <div class="col-md-3"> 
    <div class="form-group">
     <label class="form-control-placeholder" for="demand_for_licence_fee_withoutinterest" style="margin-left: 18px;">Specific Performance of Contract:</label>
     <input type="checkbox" class="form-control" id="demand_for_licence_fee_withoutinterest"  name="demand_for_licence_fee_withoutinterest" style="width:9%"  value="yes" {{ $ReliefRequest->demand_for_licence_fee_withoutinterest == 'yes' ? 'checked' : ''}}  >
   </div>
 </div>
     <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)" id="specific_performance_of_contract"  class="form-control{{ $errors->has('specific_performance_of_contract') ? ' is-invalid' : '' }}" name="specific_performance_of_contract" value="{{ number_format((float)$ReliefRequest->specific_performance_of_contract, 2, '.', '') }}">
        <label class="form-control-placeholder" for="specific_performance_of_contract">Estimated Value of Materials({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('specific_performance_of_contract'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('specific_performance_of_contract') }}</strong>
        </span> 
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
        <div class="form-group">
         <label class="form-control-placeholder" id="to_return_materials" for="to_return_materials" style="margin-left: 18px;">To Return Materials</label>
         <input type="checkbox" class="form-control" id="to_return_materials"  name="to_return_materials" style="width:9%"   value="yes" {{ $ReliefRequest->to_return_materials == 'yes' ? 'checked' : ''}}>
       </div>
     </div>
        <div class="col-md-3"> 
          
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)" id="estimated_value_of_material"  value="{{ number_format((float)$ReliefRequest->estimated_value_of_material, 2, '.', '') }}" class="form-control{{ $errors->has('estimated_value_of_material') ? ' is-invalid' : '' }}" name="estimated_value_of_material" >
        <label class="form-control-placeholder" for="estimated_value_of_material">Estimated Value of Materials({{$claimantinformations[0]->currency}}):  </label>
        @if ($errors->has('estimated_value_of_material'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('estimated_value_of_material') }}</strong>
        </span> 
        @endif
      </div>
    </div>
    
  </div>
      <div class="row">
        <div class="col-md-3"> 
        <div class="form-group">
         <label class="form-control-placeholder" id="to_cancel_performance_guarantees" for="to_cancel_performance_guarantees" style="margin-left: 18px;">To Cancel Performance Guarantees</label>
         <input type="checkbox" class="form-control" id="to_cancel_performance_guarantees"  name="to_cancel_performance_guarantees" style="width:9%" value="yes" {{ $ReliefRequest->to_cancel_performance_guarantees == 'yes' ? 'checked' : ''}}>
       </div>
     </div>
    <div class="col-md-3"> 
          

      <div class="form-group">
        <input type="text" id="amount_guaranteed"  value="{{ number_format((float)$ReliefRequest->amount_guaranteed, 2, '.', '') }}" class="form-control{{ $errors->has('amount_guaranteed') ? ' is-invalid' : '' }}" name="amount_guaranteed" >
        <label class="form-control-placeholder" for="amount_guaranteed">Amount Guaranteed({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('amount_guaranteed'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_guaranteed') }}</strong>
        </span> 
        @endif
      </div>
    </div>
        <div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount"  class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" value="{{ number_format((float)$ReliefRequest->interest_amount, 2, '.', '') }}">
    <label class="form-control-placeholder" for="interest_amount">Interest Amount({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('interest_amount'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('interest_amount') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" value="{{ number_format((float)$ReliefRequest->damage_with_interest, 2, '.', '') }}">
     @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Total Claim Amount (INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Claim Amount (USD) <span style="color: red">*</span>:</label>
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
<script type="text/javascript">

$('#claimforcontractpriceinerestwithoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("claimforcontractpriceinerest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#claimforcontractpriceinerest').val("");

            } else {
               document.getElementById("claimforcontractpriceinerest").disabled = false;
                $('#claimforcontractpriceinerest').val("");
            }
});
$('#refund_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("refund_withinterest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#refund_withinterest').val("");

            } else {
               document.getElementById("refund_withinterest").disabled = false;
                $('#refund_withinterest').val("");
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