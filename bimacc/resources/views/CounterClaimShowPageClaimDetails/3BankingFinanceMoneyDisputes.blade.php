<div class="col-md-12" style="pointer-events: none;">
    <div class="row">
     <div class="col-md-12">
       <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
        <!-- <label><b>Please fill in the applicable details  pertaining to the dispute</b></label> -->
      </div>            
      <!-- <div class="form-group text-center" style="margin-bottom: 1.4em">
        <label><u><b>Loan Details</b></u></label>
      </div> -->
    </div>
  </div> 
<div class="row">
@php
$count=0;
@endphp
   @foreach ($bank_account_counter  as $bank_accounts)
 @if($bank_accounts->claim_id == $details->claimdetailsid)
 @php
$count=$count+1;

@endphp
   <div class="col-md-1"><input class="form-control" placeholder='Loan{{ $count}}'  type="text" disabled ></div>
          <div class="col-md-2"> 
            <div class="form-group">
             <input type='number' step='0.01' id="loan_acc" class="form-control{{ $errors->has('loan_acc') ? ' is-invalid' : '' }}" name="loan_acc_bank[]"  value="{{$bank_accounts->loan_acc_bank}}" readonly>
             <label class="form-control-placeholder" for="loan_acc">Loan A/C:</label>
             @if ($errors->has('loan_acc'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('loan_acc') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-3">  
        <div class="form-group">
          <input type="text" id="sanction_ammount" name="sanction_ammount[]"  class="form-control{{ $errors->has('sanction_ammount') ? ' is-invalid' : '' }}" value="{{$bank_accounts->sanction_ammount}}" readonly>
          
          <label class="form-control-placeholder" for="sanction_ammount">Sanction Amount({{$claimantinformations[0]->currency}}):</label>
          @if ($errors->has('sanction_ammount'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sanction_ammount') }}</strong>
          </span>
          @endif
        </div>
      </div>
        <div class="col-md-3"> 
          <div class="form-group">
            <input type="text" id="date_of_application_bank" class="form-control{{ $errors->has('date_of_application_bank') ? ' is-invalid' : '' }}" name="date_of_application_bank[]" value="{{$bank_accounts->date_of_application_bank}}" readonly>
            <label class="form-control-placeholder" for="date_of_application">Date of Application for Financial Facility:</label>
            @if ($errors->has('date_of_application_bank'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_application_bank') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-3"> 
         <div class="form-group">
           <input type="text" id="date_of_sanction" class="form-control{{ $errors->has('date_of_sanction') ? ' is-invalid' : '' }}" name="date_of_sanction_bank[]" value="{{$bank_accounts->date_of_sanction_bank}}" readonly>
           <label class="form-control-placeholder" for="date_of_sanction">Date of Sanction:</label>
           @if ($errors->has('date_of_sanction'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_sanction') }}</strong>
          </span>
          @endif
        </div>
      </div>
      
      

    
@foreach ($security_type as $security )

 @if($security->claim_id == $bank_accounts->bank_id)

    
<!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
     <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" id="security_type" class="form-control{{ $errors->has('security_type') ? ' is-invalid' : '' }}" name="security_type[]"  value="{{$security->security_type}}" readonly>
       <label class="form-control-placeholder" for="security_type">Security Type:</label>
       @if ($errors->has('security_type'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('security_type') }}</strong>
      </span>
      @endif
    </div>
  </div>

@if ($security->security_type =='mortgage')

    
  

    <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" id="mortgage_property" class="form-control{{ $errors->has('mortgage_property') ? ' is-invalid' : '' }}" name="mortgage_property[]"  value="{{$security->mortgage_property}}" readonly>
       <label class="form-control-placeholder" for="mortgage_property">Description of Property:</label>
       @if ($errors->has('mortgage_property'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_property') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
    <div class="form-group">
      <input type="text" id="mortgage_value_bank" class="form-control{{ $errors->has('mortgage_value_bank') ? ' is-invalid' : '' }}" name="mortgage_value_bank[]"  value="{{$security->mortgage_value_bank}}" readonly>
      <label class="form-control-placeholder" for="mortgage_value_bank">Value({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('mortgage_value_bank'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_value_bank') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3"> 
   <div class="form-group">
     <input type="text" id="mortgage_schedule" class="form-control{{ $errors->has('mortgage_schedule') ? ' is-invalid' : '' }}" name="mortgage_schedule[]" value="{{$security->mortgage_schedule}}" readonly>
     <label class="form-control-placeholder" for="mortgage_schedule">Schedule and Boundaries:</label>
     @if ($errors->has('mortgage_schedule'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_schedule') }}</strong>
    </span>
    @endif
  </div>
</div>




  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" id="mortgage_name" class="form-control{{ $errors->has('mortgage_name') ? ' is-invalid' : '' }}" name="mortgage_name[]"  value="{{$security->mortgage_name}}" readonly>
     <label class="form-control-placeholder" for="mortgage_name">Name of the Mortgagaor:</label>
     @if ($errors->has('mortgage_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_name') }}</strong>
    </span>
    @endif
  </div>
</div>
  
<div class="col-md-3">  
  <div class="form-group">
    <input type="text" id="mortgage_date" name="mortgage_date[]"  class="form-control{{ $errors->has('mortgage_date') ? ' is-invalid' : '' }}"  value="{{$security->mortgage_date}}" readonly>
    
    <label class="form-control-placeholder" for="mortgage_date">Date of Mortgage/ LEDTD:</label>
    @if ($errors->has('mortgage_date'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_date') }}</strong>
    </span>
    @endif
  </div>
</div>

@endif
@if ($security->security_type =='hypothecation')




  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" id="hypo_property" class="form-control{{ $errors->has('hypo_property') ? ' is-invalid' : '' }}" name="hypo_property[]"  value="{{$security->hypo_property}}" readonly>
     <label class="form-control-placeholder" for="hypo_property">Description of Property:</label>
     @if ($errors->has('hypo_property'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('hypo_property') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" id="hypo_value" class="form-control{{ $errors->has('hypo_value') ? ' is-invalid' : '' }}" name="hypo_value[]"  value="{{$security->hypo_value}}" readonly>
    <label class="form-control-placeholder" for="hypo_value">Value({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('hypo_value'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('hypo_value') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
 <div class="form-group">
   <input type="text" id="hypo_schedule" class="form-control{{ $errors->has('hypo_schedule') ? ' is-invalid' : '' }}" name="hypo_schedule[]" value="{{$security->hypo_schedule}}" readonly>
   <label class="form-control-placeholder" for="hypo_schedule">Schedule and Boundaries:</label>
   @if ($errors->has('hypo_schedule'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('hypo_schedule') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3"> 
 <div class="form-group">
   <input type="text" id="hypo_name" class="form-control{{ $errors->has('hypo_name') ? ' is-invalid' : '' }}" name="hypo_name[]" value="{{$security->hypo_name}}" readonly>
   <label class="form-control-placeholder" for="hypo_name">Hypothecator Name:</label>
   @if ($errors->has('hypo_name'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('hypo_name') }}</strong>
  </span>
  @endif
</div>
</div>


   <div class="col-md-3">  
    <div class="form-group">
      <input type="text" id="hypo_date" name="hypo_date[]"  class="form-control{{ $errors->has('hypo_date') ? ' is-invalid' : '' }}" value="{{$security->hypo_date}}" readonly>
      
      <label class="form-control-placeholder" for="hypo_date">Date of Hypothecation:</label>
      @if ($errors->has('hypo_date'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_date') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3">  
    <div class="form-group">
      <input type="text" id="hypo_engine" name="hypo_engine[]"  class="form-control{{ $errors->has('hypo_engine') ? ' is-invalid' : '' }}"  value="{{$security->hypo_engine}}" readonly>
      
      <label class="form-control-placeholder" for="hypo_engine">Vehicle Engine Number:</label>
      @if ($errors->has('hypo_engine'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_engine') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3">  
    <div class="form-group">
      <input type="text" id="hypo_chassis" name="hypo_chassis[]"  class="form-control{{ $errors->has('hypo_chassis') ? ' is-invalid' : '' }}" value="{{$security->hypo_chassis}}" readonly>
      
      <label class="form-control-placeholder" for="hypo_chassis">Chassis Number:</label>
      @if ($errors->has('hypo_chassis'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_chassis') }}</strong>
      </span>
      @endif
    </div>
  </div>
 
  

 
  @endif
@if ($security->security_type =='guarntee')
 
  


  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" id="guarntee_name" class="form-control{{ $errors->has('guarntee_name') ? ' is-invalid' : '' }}" name="guarntee_name[]"  value="{{$security->guarntee_name}}" readonly>
     <label class="form-control-placeholder" for="guarntee_name">Guarantor Name:</label>
     @if ($errors->has('guarntee_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntee_name') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3"> 
  <div class="form-group">
    <input type="text" id="guarntor_agreement" class="form-control{{ $errors->has('guarntor_agreement') ? ' is-invalid' : '' }}" name="guarntor_agreement[]" value="{{$security->guarntor_agreement}}" readonly>
    <label class="form-control-placeholder" for="guarntor_agreement">Guarantor Agreement:</label>
    @if ($errors->has('guarntor_agreement'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntor_agreement') }}</strong>
    </span>
    @endif
  </div>
</div>







 @endif
@if ($security->security_type =='other')




  <div class="col-md-3"> 
 <div class="form-group">
   <input type="text" id="others_details" class="form-control{{ $errors->has('others_details') ? ' is-invalid' : '' }}" name="others_details[]" value="{{$security->others_details}}" readonly>
   <label class="form-control-placeholder" for="others_details">Other Details</label>
   @if ($errors->has('others_details'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('others_details') }}</strong>
  </span>
  @endif
</div>
</div>

  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" id="others_date" class="form-control{{ $errors->has('others_date') ? ' is-invalid' : '' }}" name="others_date[]"  value="{{$security->others_date}}" readonly>
     <label class="form-control-placeholder" for="others_date">Date:</label>
     @if ($errors->has('others_date'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('others_date') }}</strong>
    </span>
    @endif
  </div>
</div>









@endif
@endif
@endforeach
@foreach ($renewal_date as $renewal )
 @if($renewal->claim_id == $bank_accounts->bank_id)


  <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="renewal_date" class="form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}" name="renewal_date[]" value="{{$renewal->renewal_date}}" readonly>
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
    @endif
@endforeach
@foreach ($revival_date  as $revival )
 @if($revival->claim_id == $bank_accounts->bank_id)
 <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="revival_date" class="form-control{{ $errors->has('revival_date') ? ' is-invalid' : '' }}"  value="{{$revival->revival_date}}" readonly>
        <label class="form-control-placeholder" for="revival_date">Revival Letter Date:</label>
        @if ($errors->has('revival_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('revival_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
      @endif
@endforeach
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="date_of_dafault" class="form-control{{ $errors->has('date_of_dafault') ? ' is-invalid' : '' }}" name="date_of_dafault[]" value="{{$bank_accounts->date_of_dafault}}" readonly>
        <label class="form-control-placeholder" for="date_of_dafault">Date of Default:</label>
        @if ($errors->has('date_of_dafault'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_dafault') }}</strong>
        </span>
        @endif
      </div>
    </div>
    @foreach ($legal_notice  as $legal )
 @if($legal->claim_id == $bank_accounts->bank_id)
<!--  <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="legal_notice" class="form-control{{ $errors->has('legal_notice') ? ' is-invalid' : '' }}" name="legal_notice[]" value="{{$legal->legal_notice}}" readonly>
        <label class="form-control-placeholder" for="legal_notice">Demand/Legal Notice Date:</label>
        @if ($errors->has('legal_notice'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('legal_notice') }}</strong>
        </span>
        @endif
      </div>
    </div>
 
@endif
@endforeach
 @foreach ($other_document  as $other )
 @if($other->claim_id == $bank_accounts->bank_id)
 <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="other_document" class="form-control{{ $errors->has('other_document') ? ' is-invalid' : '' }}" name="other_document[]" value="{{$other->other_document}}" readonly>
        <label class="form-control-placeholder" for="other_document">Other Document Details:</label>
        @if ($errors->has('other_document'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('other_document') }}</strong>
        </span>
        @endif
      </div>
    </div>
    @endif
@endforeach
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text"  class="form-control{{ $errors->has('npa_date_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->npa_date_bank}}" readonly>
        <label class="form-control-placeholder" for="npa_date_bank">NPA Date:</label>
        @if ($errors->has('npa_date_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('npa_date_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="amount_as_account" class="form-control{{ $errors->has('amount_as_account') ? ' is-invalid' : '' }}" name="amount_as_account[]" value="{{$bank_accounts->amount_as_account}}" readonly>
        <label class="form-control-placeholder" for="amount_as_account">Amount as per Account({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('amount_as_account'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_account') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="number" id="interest_bank" class="form-control{{ $errors->has('interest_bank') ? ' is-invalid' : '' }}" name="interest_bank[]" value="{{$bank_accounts->interest_bank}}" readonly>
        <label class="form-control-placeholder" for="interest_bank"> Rate of Interst (%):</label>
        @if ($errors->has('interest_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('interest_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
  
 
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="penel_interest_bank" class="form-control{{ $errors->has('penel_interest_bank') ? ' is-invalid' : '' }}" name="penel_interest_bank[]" value="{{$bank_accounts->penel_interest_bank}}" readonly>
        <label class="form-control-placeholder" for="penel_interest_bank">Penal Interest:</label>
        @if ($errors->has('penel_interest_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('penel_interest_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="other_charges" class="form-control{{ $errors->has('other_charges') ? ' is-invalid' : '' }}" name="other_charges_bank[]" value="{{$bank_accounts->other_charges_bank}}" readonly>
        <label class="form-control-placeholder" for="other_charges_bank">Other Charges({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('other_charges'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('other_charges') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="number" id="outstanding_amount" class="form-control{{ $errors->has('outstanding_amount') ? ' is-invalid' : '' }}" name="outstanding_amount" value="{{$bank_accounts->outstanding_amount}}" readonly>
        <label class="form-control-placeholder" for="outstanding_amount">Outstanding Amount({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('outstanding_amount'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('outstanding_amount') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" class="form-control{{ $errors->has('amount_as_date') ? ' is-invalid' : '' }}" value="{{$bank_accounts->amount_as_date}}" readonly>
        <label class="form-control-placeholder" for="amount_as_date">Date of outstanding:</label>
        @if ($errors->has('amount_as_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
   
    
  
 

@endif
  @endforeach
  
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="number" id="total_amount_bank" class="form-control{{ $errors->has('total_amount_bank') ? ' is-invalid' : '' }}" name="total_amount_bank" value="{{$details->total_amount_bank}}">
        <label class="form-control-placeholder" for="total_amount_bank">Total Outstanding Amount Due({{$claimantinformations[0]->currency}})
:</label>
        @if ($errors->has('total_amount_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('total_amount_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
 
   </div>
 </div>

