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

     <!--  <div class="row">
       <div class="col-md-12">        
         <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
          <label><u><b>Aggregate Annual Gross Salary or Consultancy Fee:</b></u></label>
        </div>      
      </div>
    </div> -->
    <div class="row">
      <div class="col-md-6"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="claim_reinstatement" style="margin-left: 28px;">Claim for Reinstatement</label>
    <input type="checkbox" class="form-control" id="claim_reinstatement"  name="claim_reinstatement" style="width:5%"  value="yes">
  </div>
</div>
      <div class="col-md-6">  
        <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"  id="aggregate_salary" class="form-control{{ $errors->has('aggregate_salary') ? ' is-invalid' : '' }}" name="aggregate_salary" >
         <label class="form-control-placeholder" for="aggregate_salary">Aggregate Annual Gross Salary or Consultancy Fee({{$claimantinformations[0]->currency}}):</label>
         @if ($errors->has('aggregate_salary'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('aggregate_salary') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6"> 
      <div class="form-group">
       <input  type="text" onkeypress="return isNumberKey(event)" id="claim_for_salary_and_benefits" class="form-control{{ $errors->has('claim_for_salary_and_benefits') ? ' is-invalid' : '' }}" name="claim_for_salary_and_benefits"  >
       <label class="form-control-placeholder" for="claim_for_salary_and_benefits">Claim for Backwages/ Salary/ Benefits/ Reimbursement of expenses({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_salary_and_benefits'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_salary_and_benefits') }}</strong>
      </span>
      @endif
    </div>
  </div>
  
  
  <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="benefit_withinterest" class="form-control{{ $errors->has('benefit_withinterest') ? ' is-invalid' : '' }}" name="benefit_withinterest" >
       <label class="form-control-placeholder" for="benefit_withinterest">With Interest:</label>
       @if ($errors->has('benefit_withinterest'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('benefit_withinterest') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="benefit_withoutinterest" style="margin-left: 18px;">Without Interest </label>
    <input type="checkbox" class="form-control" id="benefit_withoutinterest"  name="benefit_withoutinterest" style="width:9%"  value="yes">
  </div>
</div>

</div>
<div class="row">

    <div class="col-md-12"> 

     <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
      <label><u><b>Claim for Return of Property(Data/ Documents etc)</b></u></label>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="estimated_value_of_data" class="form-control{{ $errors->has('estimated_value_of_data') ? ' is-invalid' : '' }}" name="estimated_value_of_data"  >
   <label class="form-control-placeholder" for="estimated_value_of_data">Value of Property({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('estimated_value_of_data'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('estimated_value_of_data') }}</strong>
  </span>
  @endif
</div>
</div>
  <div class="col-md-6"> 
  <div class="form-group">
   <input type="text" id="nature_of_property" class="form-control{{ $errors->has('nature_of_property') ? ' is-invalid' : '' }}" name="nature_of_property"  >
   <label class="form-control-placeholder" for="nature_of_property">Nature of Property:</label>
   @if ($errors->has('nature_of_property'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('nature_of_property') }}</strong>
  </span>
  @endif
</div>
</div>

</div>

  <div class="row">

    <div class="col-md-3"> 

     <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
      <label><u><b>Claim for ESOP</b></u></label>
    </div>
  </div>
 <div class="col-md-3"> 
</div>
  <div class="col-md-3"> 

   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
    <label><u><b style="
    
    margin-right: 0px;
">Claim for Damages</b></u></label>
  </div>
</div>


</div>

<div class="row">
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="value_of_stock_options" class="form-control{{ $errors->has('value_of_stock_options') ? ' is-invalid' : '' }}" name="value_of_stock_options"  >
     <label class="form-control-placeholder" for="value_of_stock_options">Value of Stock Options({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('value_of_stock_options'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('value_of_stock_options') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="emd_amount" class="form-control{{ $errors->has('emd_amount') ? ' is-invalid' : '' }}" name="emd_amount"  >
   <label class="form-control-placeholder" for="emd_amount">Amount({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('emd_amount'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('emd_amount') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="restraint" style="margin-left: 18px;">Restraint on Use of IPR/ Trade Secrets</label>
    <input type="checkbox" class="form-control" id="restraint"  name="restraint" style="width:10%"  value="yes">
  </div>

</div>

<div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="termination" style="margin-left: 18px;">Termination</label>
    <input type="checkbox" class="form-control" id="termination"  name="termination" style="width:10%"  value="yes">
  </div>


</div>

</div>
<div class="row">
  
  <div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="average_value" class="form-control{{ $errors->has('average_value') ? ' is-invalid' : '' }}" name="average_value"  >
   <label class="form-control-placeholder" for="average_value">Amount/ Average Annual Value of Contract({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('average_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('average_value') }}</strong>
  </span>
  @endif
</div>
</div>
 <div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="average_value_interest" class="form-control{{ $errors->has('average_value_interest') ? ' is-invalid' : '' }}" name="average_value_interest"  >
   <label class="form-control-placeholder" for="average_value_interest">With Interest:</label>
   @if ($errors->has('average_value_interest'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('average_value_interest') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="average_value_withoutinterest" style="margin-left: 18px;">Without interest</label>
    <input type="checkbox" class="form-control" id="average_value_withoutinterest"  name="average_value_withoutinterest" style="width:7%" value="yes">
  </div>

</div>

</div>
<div class="row">
  
  <div class="col-md-4"> 
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
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" >
   @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Total Damages Including Interest (INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Damages Including Interest (USD)<span style="color: red">*</span>:</label>
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
    <input type="text" name="reliefrequestid" value="{{$ReliefRequest->id}}" style="display: none"> 
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

      <!-- <div class="row">
       <div class="col-md-12">        
         <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
          <label><u><b>Aggregate Annual Gross Salary or Consultancy Fee:</b></u></label>
        </div>      
      </div>
    </div> -->
    <div class="row">
     <div class="col-md-6"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="claim_reinstatement" style="margin-left: 38px;">Claim for Reinstatement</label>
    <input type="checkbox" class="form-control" id="claim_reinstatement"  name="claim_reinstatement" style="width:5%"  value="yes" {{ $ReliefRequest->claim_reinstatement == 'yes' ? 'checked' : ''}}>
  </div>
</div>
<div class="col-md-6">  
        <div class="form-group">
         <input type="text" onkeypress="return isNumberKey(event)"  id="aggregate_salary" class="form-control{{ $errors->has('aggregate_salary') ? ' is-invalid' : '' }}" name="aggregate_salary" value="{{ number_format((float)$ReliefRequest->aggregate_salary, 2, '.', '') }}">
         <label class="form-control-placeholder" for="aggregate_salary">Aggregate Annual Gross Salary or Consultancy Fee({{$claimantinformations[0]->currency}}):</label>
         @if ($errors->has('aggregate_salary'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('aggregate_salary') }}</strong>
        </span>
        @endif
      </div>
    </div>
    </div>

      <div class="row">
    <div class="col-md-4"> 
      <div class="form-group">
       <input  type="text" onkeypress="return isNumberKey(event)" id="claim_for_salary_and_benefits" class="form-control{{ $errors->has('claim_for_salary_and_benefits') ? ' is-invalid' : '' }}" name="claim_for_salary_and_benefits"  value="{{ number_format((float)$ReliefRequest->claim_for_salary_and_benefits, 2, '.', '') }}">
       <label class="form-control-placeholder" for="claim_for_salary_and_benefits">Claim for Backwages/ Salary/ Benefits/ Reimbursement of expenses({{$claimantinformations[0]->currency}}):</label>
       @if ($errors->has('claim_for_salary_and_benefits'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claim_for_salary_and_benefits') }}</strong>
      </span>
      @endif
    </div>
  </div>

  <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" onkeypress="return isNumberKey(event)"  id="benefit_withinterest" class="form-control{{ $errors->has('benefit_withinterest') ? ' is-invalid' : '' }}" name="benefit_withinterest"  value="{{$ReliefRequest->benefit_withinterest}}">
       <label class="form-control-placeholder" for="benefit_withinterest">With Interest:</label>
       @if ($errors->has('benefit_withinterest'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('benefit_withinterest') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="benefit_withoutinterest" style="margin-left: 18px;">Without Interest</label>
    <input type="checkbox" class="form-control" id="benefit_withoutinterest"  name="benefit_withoutinterest" style="width:7%" value="yes" {{ $ReliefRequest->benefit_withoutinterest == 'yes' ? 'checked' : ''}}>
  </div>
</div>
</div>

<div class="row">

    <div class="col-md-12"> 

     <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
      <label><u><b>Claim for Return of Property(Data/ Documents etc)</b></u></label>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="estimated_value_of_data" class="form-control{{ $errors->has('estimated_value_of_data') ? ' is-invalid' : '' }}" name="estimated_value_of_data"  value="{{ number_format((float)$ReliefRequest->estimated_value_of_data, 2, '.', '') }}">
   <label class="form-control-placeholder" for="estimated_value_of_data">Value of Property({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('estimated_value_of_data'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('estimated_value_of_data') }}</strong>
  </span>
  @endif
</div>
</div>
  <div class="col-md-6"> 
  <div class="form-group">
   <input type="text" id="nature_of_property" class="form-control{{ $errors->has('nature_of_property') ? ' is-invalid' : '' }}" name="nature_of_property"  value="{{$ReliefRequest->nature_of_property}}">
   <label class="form-control-placeholder" for="nature_of_property">Nature of Property:</label>
   @if ($errors->has('nature_of_property'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('nature_of_property') }}</strong>
  </span>
  @endif
</div>
</div>

</div>
  <div class="row">
    

    <div class="col-md-4"> 

     <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
      <label><u><b>Claim for ESOP</b></u></label>
    </div>
  </div>
  <div class="col-md-4"> 

   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
    <label><u><b style="
    
    margin-right: 0px;
">Claim for Damages</b></u></label>
  </div>
</div>

</div>


<div class="row">
  <div class="col-md-3">  
    <div class="form-group">
     <input type="text" onkeypress="return isNumberKey(event)"  id="value_of_stock_options" class="form-control{{ $errors->has('value_of_stock_options') ? ' is-invalid' : '' }}" name="value_of_stock_options"  value="{{ number_format((float)$ReliefRequest->value_of_stock_options, 2, '.', '') }}">
     <label class="form-control-placeholder" for="value_of_stock_options">Value of Stock Options({{$claimantinformations[0]->currency}}):</label>
     @if ($errors->has('value_of_stock_options'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('value_of_stock_options') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="emd_amount" class="form-control{{ $errors->has('emd_amount') ? ' is-invalid' : '' }}" name="emd_amount"  value="{{ number_format((float)$ReliefRequest->emd_amount, 2, '.', '') }}">
   <label class="form-control-placeholder" for="emd_amount">Amount({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('emd_amount'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('emd_amount') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="restraint" style="margin-left: 18px;">Restraint on use of IPR/ Trade Secrets</label>
    <input type="checkbox" class="form-control" id="restraint"  name="restraint" style="width:10%"  value="yes" 
    {{ $ReliefRequest->restraint == 'yes' ? 'checked' : ''}}>
  </div>

</div>
<div class="col-md-3"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="termination" style="margin-left: 18px;">Termination </label>
    <input type="checkbox" class="form-control" id="termination"  name="termination" style="width:10%"  value="yes" {{ $ReliefRequest->termination == 'yes' ? 'checked' : ''}}>
  </div>


</div>

</div>
<div class="row">
  
  <div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="average_value" class="form-control{{ $errors->has('average_value') ? ' is-invalid' : '' }}" name="average_value"  value="{{ number_format((float)$ReliefRequest->average_value, 2, '.', '') }}">
   <label class="form-control-placeholder" for="average_value">Amount/ Average Annual Value of Contract({{$claimantinformations[0]->currency}}):</label>
   @if ($errors->has('average_value'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('average_value') }}</strong>
  </span>
  @endif
</div>
</div>
 <div class="col-md-4"> 
  <div class="form-group">
   <input type="text" onkeypress="return isNumberKey(event)"  id="average_value_interest" class="form-control{{ $errors->has('average_value_interest') ? ' is-invalid' : '' }}" name="average_value_interest"  value="{{ $ReliefRequest->average_value_interest }}">
   <label class="form-control-placeholder" for="average_value_interest">With Interest:</label>
   @if ($errors->has('average_value_interest'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('average_value_interest') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
     <label class="form-control-placeholder" for="average_value_withoutinterest" style="margin-left: 18px;">Without interest</label>
    <input type="checkbox" class="form-control" id="average_value_withoutinterest"  name="average_value_withoutinterest" style="width:7%" value="yes" {{ $ReliefRequest->average_value_withoutinterest == 'yes' ? 'checked' : ''}}>
  </div>

</div>

</div>
<div class="row">
  
  <div class="col-md-4"> 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="interest_amount" class="form-control{{ $errors->has('interest_amount') ? ' is-invalid' : '' }}" name="interest_amount" value="{{ number_format((float)$ReliefRequest->interest_amount, 2, '.', '') }}">
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
    <input type="text" onkeypress="return isNumberKey(event)"  id="damage_with_interest"  class="form-control{{ $errors->has('damage_with_interest') ? ' is-invalid' : '' }}" name="damage_with_interest" value="{{ number_format((float)$ReliefRequest->damage_with_interest, 2, '.', '') }}">
   @if ($claimantinformations[0]->currency =='INR') 
       <label class="form-control-placeholder" for="damage_with_interest">Total Damages Including Interest (INR)<span style="color: red">*</span>:</label>
       @else
        <label class="form-control-placeholder" for="damage_with_interest">Total Damages Including Interest (USD)<span style="color: red">*</span>:</label>
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

<!-- <div class="col-md-4"> 
  <div class="form-group">
   <input type="text" id="estimated_value_of_data" class="form-control{{ $errors->has('estimated_value_of_data') ? ' is-invalid' : '' }}" name="estimated_value_of_data"  value="{{$ReliefRequest->estimated_value_of_data}}">
   <label class="form-control-placeholder" for="estimated_value_of_data">Estimated Value of Data</label>
   @if ($errors->has('estimated_value_of_data'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('estimated_value_of_data') }}</strong>
  </span>
  @endif
</div>
</div> -->



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
$('#benefit_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("benefit_withinterest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#benefit_withinterest').val("");

            } else {
               document.getElementById("benefit_withinterest").disabled = false;
                $('#benefit_withinterest').val("");
            }
});

</script>
<script type="text/javascript">
$('#average_value_withoutinterest').on('click', function () {
  if ($(this).prop('checked')) {
                document.getElementById("average_value_interest").disabled = true;
                //$('#demand_for_licence_fee_interest').disabled();
                $('#average_value_interest').val("");

            } else {
               document.getElementById("average_value_interest").disabled = false;
                $('#average_value_interest').val("");
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
