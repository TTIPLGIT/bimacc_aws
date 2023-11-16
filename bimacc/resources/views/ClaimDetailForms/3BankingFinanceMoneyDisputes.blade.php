@if($claimandrelief == null)
    <form  id="add_newaccount" name="add_newaccount" method="POST" style="    width: 100%;" autocomplete="off">
      @csrf 


      <div class="row register-form" > 
        <div class="col-md-12" >
          <div class="row">
           <div class="col-md-12">
             <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
            </div>            
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Loan Details</b></u></label>
            </div>
          </div>
        </div>
<div id="addition1">
        <div class="row">
          <div class="col-md-3">  
            <div class="form-group">
             <input type="text" onkeypress="return isNumberKey(event)"    id="loan_acc" class="form-control{{ $errors->has('loan_acc') ? ' is-invalid' : '' }}" name="loan_acc_bank"  required>
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
          <input type="text" onkeypress="return isNumberKey(event)"    id="sanction_ammount" name="sanction_ammount"  class="form-control{{ $errors->has('sanction_ammount') ? ' is-invalid' : '' }}" required>
          
          <label class="form-control-placeholder" for="sanction_ammount">Sanction Amount({{$claimantinformations[0]->currency}}):</label>
          @if ($errors->has('sanction_ammount'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sanction_ammount') }}</strong>
          </span>
          @endif
        </div>
      </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="date" id="date_of_application_bank" class="datechk form-control{{ $errors->has('date_of_application_bank') ? ' is-invalid' : '' }}" name="date_of_application_bank" required>
            <label class="form-control-placeholder" for="date_of_application">Date of Application for Financial Facility:</label>
            @if ($errors->has('date_of_application_bank'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_application_bank') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2"> 
         <div class="form-group">
           <input type="date" id="date_of_sanction" class="datechk form-control{{ $errors->has('date_of_sanction') ? ' is-invalid' : '' }}" name="date_of_sanction_bank" required>
           <label class="form-control-placeholder" for="date_of_sanction">Date of Sanction:</label>
           @if ($errors->has('date_of_sanction'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_sanction') }}</strong>
          </span>
          @endif
        </div> 
      </div>
      
      

    </div>
    <div class="row">
     <div class="col-md-3"></div>
             <div class="col-md-4">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 20px;">Security Details</b></label>
               
            </div>
          </div>
            <div class="col-md-1">
            <div class="buttons" id="mortgage_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
 <div class="col-md-1">
<div  id="security_del" style="display:none;"  class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>
          </div>
        
      
    <div class="row"> 
 <div class="col-md-3"> 

 </div>
  <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled style="
    background-color: aliceblue;"></div>

    <div class="col-md-4"> 
      <div class="form-group">
         
       <select name="security_type[]" id="security_type" class="form-control" onchange="selectsecurity_create()" required>
     <option value="">Select Security Type</option>    
  <option value="mortgage">Mortgage</option>
  <option value="hypothecation">Hypothecation</option>
  <option value="guarntee">Guarantee Agreement</option>
  <option value="other">Other</option>
</select>
  </div>
  
</div>

 

</div>
<div id="mortgage_hide">
    
  <div class="row">

    <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" id="mortgage_property" class="form-control{{ $errors->has('mortgage_property') ? ' is-invalid' : '' }}" name="mortgage_property[]"  >
       <label class="form-control-placeholder" for="mortgage_property">Description of Property:</label>
       @if ($errors->has('mortgage_property'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_property') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
      <input  type="text" onkeypress="return isNumberKey(event)"    id="mortgage_value_bank" class="form-control{{ $errors->has('mortgage_value_bank') ? ' is-invalid' : '' }}" name="mortgage_value_bank[]" >
      <label class="form-control-placeholder" for="mortgage_value_bank">Value({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('mortgage_value_bank'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_value_bank') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
   <div class="form-group">
     <input type="text" id="mortgage_schedule" class="form-control{{ $errors->has('mortgage_schedule') ? ' is-invalid' : '' }}" name="mortgage_schedule[]" >
     <label class="form-control-placeholder" for="mortgage_schedule">Schedule and Boundaries:</label>
     @if ($errors->has('mortgage_schedule'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_schedule') }}</strong>
    </span>
    @endif
  </div>
</div>


</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" id="mortgage_name" class="form-control{{ $errors->has('mortgage_name') ? ' is-invalid' : '' }}" name="mortgage_name[]"  >
     <label class="form-control-placeholder" for="mortgage_name">Name of the Mortgagaor:</label>
     @if ($errors->has('mortgage_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_name') }}</strong>
    </span>
    @endif
  </div>
</div>
  
<div class="col-md-4">  
  <div class="form-group">
    <input type="date" id="mortgage_date" name="mortgage_date[]"  class="datechk form-control{{ $errors->has('mortgage_date') ? ' is-invalid' : '' }}" >
    
    <label class="form-control-placeholder" for="mortgage_date">Date of Mortgage/ LEDTD:</label>
    @if ($errors->has('mortgage_date'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_date') }}</strong>
    </span>
    @endif
  </div>
</div>








</div>
</div>
<div id="hypo_hide">

<div class="row">

  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" id="hypo_property" class="form-control{{ $errors->has('hypo_property') ? ' is-invalid' : '' }}" name="hypo_property[]"  >
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
    <input type="text" onkeypress="return isNumberKey(event)"    id="hypo_value" class="form-control{{ $errors->has('hypo_value') ? ' is-invalid' : '' }}" name="hypo_value[]" >
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
   <input type="text" id="hypo_schedule" class="form-control{{ $errors->has('hypo_schedule') ? ' is-invalid' : '' }}" name="hypo_schedule[]" >
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
   <input type="text" id="hypo_name" class="form-control{{ $errors->has('hypo_name') ? ' is-invalid' : '' }}" name="hypo_name[]" >
   <label class="form-control-placeholder" for="hypo_name">Hypothecator Name:</label>
   @if ($errors->has('hypo_name'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('hypo_name') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
   <div class="col-md-4">  
    <div class="form-group">
      <input type="date" id="hypo_date" name="hypo_date[]"  class="datechk form-control{{ $errors->has('hypo_date') ? ' is-invalid' : '' }}" >
      
      <label class="form-control-placeholder" for="hypo_date">Date of Hypothecation:</label>
      @if ($errors->has('hypo_date'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_date') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
    <div class="form-group">
      <input type="text" id="hypo_engine" name="hypo_engine[]"  class="form-control{{ $errors->has('hypo_engine') ? ' is-invalid' : '' }}" >
      
      <label class="form-control-placeholder" for="hypo_engine">Vehicle Engine Number:</label>
      @if ($errors->has('hypo_engine'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_engine') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
    <div class="form-group">
      <input type="text" id="hypo_chassis" name="hypo_chassis[]"  class="form-control{{ $errors->has('hypo_chassis') ? ' is-invalid' : '' }}" >
      
      <label class="form-control-placeholder" for="hypo_chassis">Chassis Number:</label>
      @if ($errors->has('hypo_chassis'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_chassis') }}</strong>
      </span>
      @endif
    </div>
  </div>
 
  

  </div>
</div>
 <div id="guarntee_hide">
  
<div class="row">

  <div class="col-md-6"> 
    <div class="form-group">
     <input type="text" id="guarntee_name" class="form-control{{ $errors->has('guarntee_name') ? ' is-invalid' : '' }}" name="guarntee_name[]"  >
     <label class="form-control-placeholder" for="guarntee_name">Guarantor Name:</label>
     @if ($errors->has('guarntee_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntee_name') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6"> 
  <div class="form-group">
    <input type="date" id="guarntor_agreement" class="datechk form-control{{ $errors->has('guarntor_agreement') ? ' is-invalid' : '' }}" name="guarntor_agreement[]" >
    <label class="form-control-placeholder" for="guarntor_agreement">Date of Guarantor Agreement:</label>
    @if ($errors->has('guarntor_agreement'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntor_agreement') }}</strong>
    </span>
    @endif
  </div>
</div>




</div>
</div>
<div id="other_hide">
<div class="row">
 
</div>



<div class="row">
  <div class="col-md-6"> 
 <div class="form-group">
   <input type="text" id="others_details" class="form-control{{ $errors->has('others_details') ? ' is-invalid' : '' }}" name="others_details[]" >
   <label class="form-control-placeholder" for="others_details">Other Details</label>
   @if ($errors->has('others_details'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('others_details') }}</strong>
  </span>
  @endif
</div>
</div>

  <div class="col-md-6"> 
    <div class="form-group">
     <input type="date" id="others_date" class="datechk form-control{{ $errors->has('others_date') ? ' is-invalid' : '' }}" name="others_date[]"  >
     <label class="form-control-placeholder" for="others_date">Date:</label>
     @if ($errors->has('others_date'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('others_date') }}</strong>
    </span>
    @endif
  </div>
</div>




</div>




</div>

<div id="mortgage"></div>
  <div class="row">
    <div class="col-md-3">
    </div> 
    <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled style="
    background-color: antiquewhite;
"></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="renewal_date" class="datechk form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}" name="renewal_date[]" >
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
     
    <div class="buttons" id="renewal_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  
</div>
<div class="buttons" id="renewal_del" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>
<div id="renewal"></div>


<div class="row">
   <div class="col-md-3"> </div>
  <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled style="
   
    background-color: bisque;
"></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="revival_date" class="datechk form-control{{ $errors->has('revival_date') ? ' is-invalid' : '' }}" name="revival_date[]" >
        <label class="form-control-placeholder" for="revival_date">Revival Letter Date:</label>
        @if ($errors->has('revival_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('revival_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
  
    <div class="buttons" id="revival_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
  <div class="buttons" id="revival_del" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span></div>
  
</div>
<div id="revival"></div>
<div class="row">
  <div class="col-md-3"></div>
     <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="legal_notice" class="datechk form-control{{ $errors->has('legal_notice') ? ' is-invalid' : '' }}" name="legal_notice[]" >
        <label class="form-control-placeholder" for="legal_notice">Demand/Legal Notice Date:</label>
        @if ($errors->has('legal_notice'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('legal_notice') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="buttons" id="legal_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
  <div class="buttons" id="legal_del" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>
<div id="legal"></div>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled style="
    background-color: azure;
"></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type='text'  id="other_document" class="form-control{{ $errors->has('other_document') ? ' is-invalid' : '' }}" name="other_document[]" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))">
        <label class="form-control-placeholder" for="other_document">Other Document Details:</label>
        @if ($errors->has('other_document'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('other_document') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="buttons" id="document_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
  <div class="buttons" id="other_del" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>
<div id="document1"></div>
  <div class="row">
  <div class="col-md-4"> 
      <div class="form-group" id="doddate">
        <input type="text" id="date_of_dafault" class=" form-control{{ $errors->has('date_of_dafault') ? ' is-invalid' : '' }}" name="date_of_dafault" >
        <label class="form-control-placeholder" for="date_of_dafault" >Date of Default:</label>
        @if ($errors->has('date_of_dafault'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_dafault') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" id="npa_date_bank" class=" form-control{{ $errors->has('npa_date_bank') ? ' is-invalid' : '' }}" name="npa_date_bank" >
        <label class="form-control-placeholder" for="npa_date_bank">NPA Date:</label>
        @if ($errors->has('npa_date_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('npa_date_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"    id="amount_as_account" class="form-control{{ $errors->has('amount_as_account') ? ' is-invalid' : '' }}" name="amount_as_account" >
        <label class="form-control-placeholder" for="amount_as_account">Amount as per Account({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('amount_as_account'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_account') }}</strong>
        </span>
        @endif
      </div>
    </div>
  
</div>

<div class="row">
  

    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"    id="interest_bank" class="form-control{{ $errors->has('interest_bank') ? ' is-invalid' : '' }}" name="interest_bank" >
        <label class="form-control-placeholder" for="interest_bank"> Rate of Interst (%):</label>
        @if ($errors->has('interest_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('interest_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"    id="penel_interest_bank" class="form-control{{ $errors->has('penel_interest_bank') ? ' is-invalid' : '' }}" name="penel_interest_bank" >
        <label class="form-control-placeholder" for="penel_interest_bank">Penal Interest:</label>
        @if ($errors->has('penel_interest_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('penel_interest_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"    id="other_charges" class="form-control{{ $errors->has('other_charges') ? ' is-invalid' : '' }}" name="other_charges_bank" >
        <label class="form-control-placeholder" for="other_charges_bank">Other Charges({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('other_charges'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('other_charges') }}</strong>
        </span>
        @endif
      </div>
    </div>
   
    
  </div>


  
  
  <div class="row">
     
    <div class="col-md-2">
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"   id="outstanding_amount" class="form-control{{ $errors->has('outstanding_amount') ? ' is-invalid' : '' }}" name="outstanding_amount" required>
        <label class="form-control-placeholder" for="outstanding_amount">Outstanding Amount({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('outstanding_amount'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('outstanding_amount') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="amount_as_date" class="datechk form-control{{ $errors->has('amount_as_date') ? ' is-invalid' : '' }}" name="amount_as_date" >
        <label class="form-control-placeholder" for="amount_as_date">Date of outstanding:</label>
        @if ($errors->has('amount_as_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
    
  </div>
  
  <div id="bankingclaim_details"></div>

  <button type="submit" class="btn btn-success btn-space" id="add_newaccount1" style=" margin-left: 449px;">Save & Add Account</button>
</form>
</div>

 @foreach ($getloan as $claimDetail)

 @foreach ($bank_account  as $bank_accounts )
 @php
 $count5=$loop->iteration;

@endphp
 @if($bank_accounts->bank_id == $claimDetail->id)

 <form  id="loanupdatefunctionality1{{$loop->iteration}}" name="loanupdatefunctionality1{{$loop->iteration}}" method="POST" style="    width: 100%;" autocomplete="off">
  @csrf 
  <div id="bank_show_form">
 <div class="bank_edit1" id="bank_edit_form1{{$loop->iteration}}">
<div class="row">
  <input class="form-control" value="{{$bank_accounts->bank_id}}" name="loan_id_forupdate" style="display: none;"type="text"  >
   <div class="col-md-2"><input class="form-control" placeholder='Loan{{ $loop->iteration}}'  type="text" disabled ></div>
          <div class="col-md-2"> 
            <div class="form-group">
             <input type="text" onkeypress="return isNumberKey(event)"   id="loan_acc" class="form-control{{ $errors->has('loan_acc') ? ' is-invalid' : '' }}"  name="loan_acc_bank" value="{{$bank_accounts->loan_acc_bank}}" >
             <label class="form-control-placeholder"
              for="loan_acc">Loan A/C:</label>
             @if ($errors->has('loan_acc'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('loan_acc') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2">  
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"   id="sanction_ammount"   class="form-control{{ $errors->has('sanction_ammount') ? ' is-invalid' : '' }}" name="sanction_ammount" value="{{$bank_accounts->sanction_ammount}}" >
          
          <label class="form-control-placeholder" for="sanction_ammount">Sanction Amount({{$claimantinformations[0]->currency}}):</label>
          @if ($errors->has('sanction_ammount'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sanction_ammount') }}</strong>
          </span>
          @endif
        </div>
      </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type='date'  name="date_of_application_bank" class="datechk form-control{{ $errors->has('date_of_application_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_application_bank}}">
            <label class="form-control-placeholder" for="date_of_application">Date of Application for Financial Facility:</label>
            @if ($errors->has('date_of_application_bank'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_application_bank') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2"> 
         <div class="form-group">
           <input type='date'  class="datechk form-control{{ $errors->has('date_of_sanction') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_sanction_bank}}" name="date_of_sanction_bank">
           <label class="form-control-placeholder" for="date_of_sanction">Date of Sanction:</label>
           @if ($errors->has('date_of_sanction'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_sanction') }}</strong>
          </span>
          @endif
        </div>
      </div>
      
       @php
$count=1; 
@endphp 

@foreach ($security_type  as $security )

 @if($security->claim_id == $bank_accounts->bank_id)

    

<div class="col-md-1"><input class="form-control security{{$count5}}" value="{{ $count}}"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
     <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" id="security_type_bank" name="security_type_edit[]" class="form-control{{ $errors->has('security_type') ? ' is-invalid' : '' }}"  value="{{$security->security_type}}" >
       <label class="form-control-placeholder" for="security_type">Security Type:</label>
       @if ($errors->has('security_type'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('security_type') }}</strong>
      </span>
      @endif
    </div>
  </div>
    
 
  <!-- <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div> -->

   <!--  <div class="col-md-4"> 
      <div class="form-group">
         
       <select name="security_type[]" id="security_type1" class="form-control" value="{{$security->security_type}}" onchange="selectsecurity_edit1()">
     <option value="">Select Security Type</option>    
  <option value="mortgage">Mortgage</option>
  <option value="hypothecation">Hypothecation</option>
  <option value="guarntee">Guarantee Agreement</option>
  <option value="other">Other</option>
</select>
  </div>
  
</div> -->
 
  
 



    
  

    <div class="col-md-3 mortgage_bank_hide{{$loop->index}}"> 
      <div class="form-group">
       <input type="text" id="mortgage_property" class="form-control{{ $errors->has('mortgage_property') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_property}}" name="mortgage_property_edit[]">
       <label class="form-control-placeholder" for="mortgage_property">Description of Property:</label>
       @if ($errors->has('mortgage_property'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_property') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3 mortgage_bank_hide{{$loop->index}}" > 
    <div class="form-group">
      <input type="text"  onkeypress="return isNumberKey(event)"  id="mortgage_value_bank" name="mortgage_value_bank_edit[]" class="form-control{{ $errors->has('mortgage_value_bank') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_value_bank}}" >
      <label class="form-control-placeholder" for="mortgage_value_bank">Value({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('mortgage_value_bank'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_value_bank') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3 mortgage_bank_hide{{$loop->index}}" > 
   <div class="form-group">
     <input type="text" id="mortgage_schedule" name="mortgage_schedule_edit[]" class="form-control{{ $errors->has('mortgage_schedule') ? ' is-invalid' : '' }}"  value="{{$security->mortgage_schedule}}" >
     <label class="form-control-placeholder" for="mortgage_schedule">Schedule and Boundaries:</label>
     @if ($errors->has('mortgage_schedule'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_schedule') }}</strong>
    </span>
    @endif
  </div>
</div>




  <div class="col-md-3 mortgage_bank_hide{{$loop->index}}">
    <div class="form-group">
     <input type="text" id="mortgage_name" name="mortgage_name_add[]" class="form-control{{ $errors->has('mortgage_name') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_name}}" >
     <label class="form-control-placeholder" for="mortgage_name">Name of the Mortgagaor:</label>
     @if ($errors->has('mortgage_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_name') }}</strong>
    </span>
    @endif
  </div>
</div>
  
<div class="col-md-3 mortgage_bank_hide{{$loop->index}}">  
  <div class="form-group">
    <input type='date' name="mortgage_date_add[]"  class="form-control{{ $errors->has('mortgage_date') ? ' is-invalid' : '' }}"  value="{{$security->mortgage_date}}" >
    
    <label class="form-control-placeholder" for="mortgage_date">Date of Mortgage/ LEDTD:</label>
    @if ($errors->has('mortgage_date'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_date') }}</strong>
    </span>
    @endif
  </div>
</div>






  <div class="col-md-3 hypo_bank_hide{{$loop->index}}" > 
    <div class="form-group">
     <input type="text" id="hypo_property" name="hypo_property_add[]" class="form-control{{ $errors->has('hypo_property') ? ' is-invalid' : '' }}"   value="{{$security->hypo_property}}" >
     <label class="form-control-placeholder" for="hypo_property">Description of Property:</label>
     @if ($errors->has('hypo_property'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('hypo_property') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3 hypo_bank_hide{{$loop->index}}" > 
  <div class="form-group">
    <input type="text" onkeypress="return isNumberKey(event)"  id="hypo_value" name="hypo_value_add[]" class="form-control{{ $errors->has('hypo_value') ? ' is-invalid' : '' }}"   value="{{$security->hypo_value}}" >
    <label class="form-control-placeholder" for="hypo_value">Value({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('hypo_value'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('hypo_value') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3 hypo_bank_hide{{$loop->index}}"> 
 <div class="form-group">
   <input type="text" id="hypo_schedule" name="hypo_schedule_add[]" class="form-control{{ $errors->has('hypo_schedule') ? ' is-invalid' : '' }}" value="{{$security->hypo_schedule}}" >
   <label class="form-control-placeholder" for="hypo_schedule">Schedule and Boundaries:</label>
   @if ($errors->has('hypo_schedule'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('hypo_schedule') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3 hypo_bank_hide{{$loop->index}}" > 
 <div class="form-group">
   <input type="text" id="hypo_name" name="hypo_name_add[]" class="form-control{{ $errors->has('hypo_name') ? ' is-invalid' : '' }}"  value="{{$security->hypo_name}}" >
   <label class="form-control-placeholder" for="hypo_name">Hypothecator Name:</label>
   @if ($errors->has('hypo_name'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('hypo_name') }}</strong>
  </span>
  @endif
</div>
</div>


   <div class="col-md-3 hypo_bank_hide{{$loop->index}}">  
    <div class="form-group">
      <input type='date'   name="hypo_date_add[]" class="form-control{{ $errors->has('hypo_date') ? ' is-invalid' : '' }}" value="{{$security->hypo_date}}" >
      
      <label class="form-control-placeholder" for="hypo_date">Date of Hypothecation:</label>
      @if ($errors->has('hypo_date'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_date') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3 hypo_bank_hide{{$loop->index}}">  
    <div class="form-group">
      <input type="text" id="hypo_engine" name="hypo_engine_add[]"  class="form-control{{ $errors->has('hypo_engine') ? ' is-invalid' : '' }}"  value="{{$security->hypo_engine}}" >
      
      <label class="form-control-placeholder" for="hypo_engine">Vehicle Engine Number:</label>
      @if ($errors->has('hypo_engine'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_engine') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3 hypo_bank_hide{{$loop->index}}">  
    <div class="form-group">
      <input type="text" id="hypo_chassis" name="hypo_chassis_add[]"  class="form-control{{ $errors->has('hypo_chassis') ? ' is-invalid' : '' }}" value="{{$security->hypo_chassis}}" >
      
      <label class="form-control-placeholder" for="hypo_chassis">Chassis Number:</label>
      @if ($errors->has('hypo_chassis'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_chassis') }}</strong>
      </span>
      @endif
    </div>
  </div>
 
  

 
 
 
  


  <div class="col-md-3 guarntee_bank_hide{{$loop->index}}"> 
    <div class="form-group">
     <input type="text" id="guarntee_name" name="guarntee_name_edit[]" class="form-control{{ $errors->has('guarntee_name') ? ' is-invalid' : '' }}"   value="{{$security->guarntee_name}}" >
     <label class="form-control-placeholder" for="guarntee_name">Guarantor Name:</label>
     @if ($errors->has('guarntee_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntee_name') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3 guarntee_bank_hide{{$loop->index}}"> 
  <div class="form-group">
    <input type="text" id="guarntor_agreement" name="guarntor_agreement_edit[]" class="form-control{{ $errors->has('guarntor_agreement') ? ' is-invalid' : '' }}"  value="{{$security->guarntor_agreement}}" >
    <label class="form-control-placeholder" for="guarntor_agreement">Guarantor Agreement:</label>
    @if ($errors->has('guarntor_agreement'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntor_agreement') }}</strong>
    </span>
    @endif
  </div>
</div>












  <div class="col-md-3 other_bank_hide{{$loop->index}}"> 
 <div class="form-group">
   <input type="text" id="others_details" name="others_details_edit[]" class="form-control{{ $errors->has('others_details') ? ' is-invalid' : '' }}"  value="{{$security->others_details}}" >
   <label class="form-control-placeholder" for="others_details">Other Details:</label>
   @if ($errors->has('others_details'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('others_details') }}</strong>
  </span>
  @endif
</div>
</div>

  <div class="col-md-3 other_bank_hide{{$loop->index}}"> 
    <div class="form-group">
     <input type="date"  name="others_date_edit[]" class="datechk form-control{{ $errors->has('others_date') ? ' is-invalid' : '' }}"   value="{{$security->others_date}}" >
     <label class="form-control-placeholder" for="others_date">Date:</label>
     @if ($errors->has('others_date'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('others_date') }}</strong>
    </span>
    @endif
  </div>
</div>









@php
$count=$count+1;
@endphp



@endif
@endforeach
 @php
$count1=1; 
@endphp 
 
@foreach ($renewal_date  as $renewal )
 @if($renewal->claim_id == $bank_accounts->bank_id)

 <div class="col-md-1"><input class="form-control renewal{{$count5}}" value="{{ $count1}}"  type="text" disabled style="background-color: aliceblue;"><label class="form-control-placeholder">Sl. No.</label></div>

  <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <!-- <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="renewal_date" class="form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}"  value="{{$renewal->renewal_date}}" >
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div> -->
    
      
     
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}" name="renewal_date[]" value="{{$renewal->renewal_date}}">
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
    @php
$count1=$count1+1;
@endphp

    @endif
@endforeach
<!-- <div class="col-md-1"> 
<div class="buttons" id="renewal_add_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div> -->
 @php
$count2=1; 
@endphp 
    
   
@foreach ($revival_date  as $revival )
 @if($revival->claim_id == $bank_accounts->bank_id)
<!--  <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
     <!-- div class="row">
     <div class="col-md-3"></div>
     <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div> -->
     <div class="col-md-1"><input class="form-control revival{{$count5}}" value="{{ $count2}}"  type="text" disabled style="background-color: bisque;"><label class="form-control-placeholder">Sl. No.</label></div>
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('revival_date') ? ' is-invalid' : '' }}" name="revival_date[]" value="{{$revival->revival_date}}">
        <label class="form-control-placeholder" for="revival_date">Revival Letter Date:</label>
        @if ($errors->has('revival_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('revival_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
 @php
$count2=$count2+1;
@endphp
    
      @endif
@endforeach
<!-- <div class="col-md-1">
<div class="buttons" id="revival_addedit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div> -->
@php
$count3=1; 
@endphp
    
   
   @foreach ($legal_notice  as $legal )
 @if($legal->claim_id == $bank_accounts->bank_id)
 <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
 <div class="col-md-1"><input class="form-control legal{{$count5}}" value="{{ $count3}}"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
   
    
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('legal_notice') ? ' is-invalid' : '' }}" name="legal_notice[]" value="{{$legal->legal_notice}}">
        <label class="form-control-placeholder" for="legal_notice">Demand/Legal Notice Date:</label>
        @if ($errors->has('legal_notice'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('legal_notice') }}</strong>
        </span>
        @endif
      </div>
    </div>
    @php
$count3=$count3+1;
@endphp
 
@endif
@endforeach
<!-- <div class="buttons" id="legal_add_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div> -->
  @php
$count4=1; 
@endphp
    
 
  
 @foreach ($other_document  as $other )
 @if($other->claim_id == $bank_accounts->bank_id)
 <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
  
<div class="col-md-1"><input class="form-control others{{$count5}}" value="{{ $count4}}"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
   
    <div class="col-md-3" > 
      <div class="form-group">
        <input type='text'  id="other_document" class="form-control{{ $errors->has('other_document') ? ' is-invalid' : '' }}" name="other_document[]"  value="{{$other->other_document}}" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))">
        <label class="form-control-placeholder" for="other_document">Other Document Details:</label>
        @if ($errors->has('other_document'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('other_document') }}</strong>
        </span>
        @endif
      </div>
    </div>

      @php
$count4=$count4+1;
@endphp
 
   
    @endif
@endforeach
 <!-- <div class="buttons" id="document_add_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div> -->
  
 
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('date_of_dafault') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_dafault}}" >
        <label class="form-control-placeholder" for="date_of_dafault">Date of Default:</label>
        @if ($errors->has('date_of_dafault'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_dafault') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
<div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('npa_date_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->npa_date_bank}}" name="npa_date_bank">
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
        <input type="text" onkeypress="return isNumberKey(event)"  id="amount_as_account" class="form-control{{ $errors->has('amount_as_account') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->amount_as_account}}" name="amount_as_account" >
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
        <input type="text" onkeypress="return isNumberKey(event)"  id="interest_bank" class="form-control{{ $errors->has('interest_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->interest_bank}}" name="interest_bank" >
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
        <input type="text" onkeypress="return isNumberKey(event)"  id="penel_interest_bank" class="form-control{{ $errors->has('penel_interest_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->penel_interest_bank}}" name="penel_interest" >
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
        <input type="text" onkeypress="return isNumberKey(event)"  id="other_charges" class="form-control{{ $errors->has('other_charges') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->other_charges_bank}}" name="other_charges_bank" >
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
        <input type="text" onkeypress="return isNumberKey(event)"  id="outstanding_amount" class="form-control{{ $errors->has('outstanding_amount') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->outstanding_amount}}" name="outstanding_amount" required >
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
        <input type="date" class="datechk form-control{{ $errors->has('amount_as_date') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->amount_as_date}}" name="amount_as_date">
        <label class="form-control-placeholder" for="amount_as_date">Date of outstanding:</label>
        @if ($errors->has('amount_as_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
   <!--  <div class="col-md-3"></div>
    <div class="col-md-3"></div> -->
     <div class="row">
    
 
             <div class="col-md-4">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Security Details</b></label>
               
            </div>
          </div>
            <div class="col-md-2">
            <div class="buttons" id="mortgage_add_edit"  onclick="mortgage_add_edit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
<div class="col-md-4">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Renewal Date</b></label>
               
            </div>
          </div>
            <div class="col-md-2">
            <div class="buttons" id="renewal_add_edit" onclick="renewal_add_edit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
 
          </div>
          <div class="row">
    
             <div class="col-md-3">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Revival Date</b></label>
               
            </div>
          </div>
            <div class="col-md-1">
            <div class="buttons" id="revival_addedit" onclick="revival_addedit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
<div class="col-md-3">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Legal Notice</b></label>
               
            </div>
          </div>
            <div class="col-md-1">
            <div class="buttons" id="legal_add_edit" onclick="legal_add_edit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
<div class="col-md-3">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Other Document Details</b></label>
               
            </div>
          </div>
            <div class="col-md-1">
           <div class="buttons" id="document_add_edit" onclick="document_add_edit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
 
          </div>
    
    

    
   </div>
    
 
 <div id="mortgage_edit{{$loop->iteration}}"></div>
   <div id="renewal_edit{{$loop->iteration}}"></div>
   <div id="revival_add_add{{$loop->iteration}}"></div>  
   <div id="legal_edit{{$loop->iteration}}"></div>
    <div id="document1_edit{{$loop->iteration}}"></div>
    <button  class="btn btn-success btn-space" form_id="{{$loop->iteration}}" id="loanupdatefunctionality1{{$loop->iteration}}" onclick="loanupdatefunctionality1('{{$loop->iteration}}',event)" style="margin-left: 451px;">Loan Update</button>
  
 </div>
 </div>

  
 </form>

@endif
  @endforeach
  @foreach ($bank_account  as $bank_accounts )

 @if($bank_accounts->bank_id == $claimDetail->id)
 <form  id="loanupdatefunctionality{{$bank_accounts->claim_id}}" name="loanupdatefunctionality{{$bank_accounts->claim_id}}" method="POST" style="    width: 100%;" autocomplete="off">
  @csrf 
  <div id="bank_showedit_form">
 <div class="bank_showedit1" id="bank_showedit_form1{{$loop->iteration}}">
<div class="row">
  <input class="form-control" value="{{$bank_accounts->claim_id}}" name="claimdetails_id" type="text" style="display: none;" >
   <div class="col-md-2"><input class="form-control" placeholder='Loan{{ $loop->iteration}}'  type="text" disabled ></div>
          <div class="col-md-2"> 
            <div class="form-group">
             <input type='text'  id="loan_acc" class="form-control{{ $errors->has('loan_acc') ? ' is-invalid' : '' }}"   value="{{$bank_accounts->loan_acc_bank}}" >
             <label class="form-control-placeholder" for="loan_acc">Loan A/C:</label>
             @if ($errors->has('loan_acc'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('loan_acc') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2">  
        <div class="form-group">
          <input type="text" id="sanction_ammount"   class="form-control{{ $errors->has('sanction_ammount') ? ' is-invalid' : '' }}" value="{{$bank_accounts->sanction_ammount}}" >
          
          <label class="form-control-placeholder" for="sanction_ammount">Sanction Amount({{$claimantinformations[0]->currency}}):</label>
          @if ($errors->has('sanction_ammount'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sanction_ammount') }}</strong>
          </span>
          @endif
        </div>
      </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type='date' id="date_of_application_bank" class="datechk form-control{{ $errors->has('date_of_application_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_application_bank}}" >
            <label class="form-control-placeholder" for="date_of_application">Date of Application for Financial Facility:</label>
            @if ($errors->has('date_of_application_bank'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_application_bank') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2">
         <div class="form-group">
           <input type='date' id="date_of_sanction" class="datechk form-control{{ $errors->has('date_of_sanction') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_sanction_bank}}">
           <label class="form-control-placeholder" for="date_of_sanction">Date of Sanction:</label>
           @if ($errors->has('date_of_sanction'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_sanction') }}</strong>
          </span>
          @endif
        </div>
      </div>
      
      

    
@foreach ($security_type  as $security )

 @if($security->claim_id == $bank_accounts->bank_id)

    
<!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
     <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" id="security_type" class="form-control{{ $errors->has('security_type') ? ' is-invalid' : '' }}"   value="{{$security->security_type}}" >
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
       <input type="text" id="mortgage_property" class="form-control{{ $errors->has('mortgage_property') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_property}}" >
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
      <input  onkeypress="return isNumberKey(event)"  id="mortgage_value_bank" class="form-control{{ $errors->has('mortgage_value_bank') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_value_bank}}" >
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
     <input type="text" id="mortgage_schedule" class="form-control{{ $errors->has('mortgage_schedule') ? ' is-invalid' : '' }}"  value="{{$security->mortgage_schedule}}" >
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
     <input type="text" id="mortgage_name" class="form-control{{ $errors->has('mortgage_name') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_name}}" >
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
    <input type='text' id="mortgage_date"  class="form-control{{ $errors->has('mortgage_date') ? ' is-invalid' : '' }}"  value="{{$security->mortgage_date}}" >
    
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
     <input type="text" id="hypo_property" class="form-control{{ $errors->has('hypo_property') ? ' is-invalid' : '' }}"   value="{{$security->hypo_property}}" >
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
    <input  onkeypress="return isNumberKey(event)"  id="hypo_value" class="form-control{{ $errors->has('hypo_value') ? ' is-invalid' : '' }}"   value="{{$security->hypo_value}}" >
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
   <input type="text" id="hypo_schedule" class="form-control{{ $errors->has('hypo_schedule') ? ' is-invalid' : '' }}" value="{{$security->hypo_schedule}}" >
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
   <input type="text" id="hypo_name" class="form-control{{ $errors->has('hypo_name') ? ' is-invalid' : '' }}"  value="{{$security->hypo_name}}" >
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
      <input type='date' id="hypo_date"   class="form-control{{ $errors->has('hypo_date') ? ' is-invalid' : '' }}" value="{{$security->hypo_date}}" >
      
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
      <input type="text" id="hypo_engine"   class="form-control{{ $errors->has('hypo_engine') ? ' is-invalid' : '' }}"  value="{{$security->hypo_engine}}" >
      
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
      <input type="text" id="hypo_chassis"   class="form-control{{ $errors->has('hypo_chassis') ? ' is-invalid' : '' }}" value="{{$security->hypo_chassis}}" >
      
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
     <input type="text" id="guarntee_name" class="form-control{{ $errors->has('guarntee_name') ? ' is-invalid' : '' }}"   value="{{$security->guarntee_name}}" >
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
    <input type="text" id="guarntor_agreement" class="form-control{{ $errors->has('guarntor_agreement') ? ' is-invalid' : '' }}"  value="{{$security->guarntor_agreement}}" >
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
   <input type="text" id="others_details" class="form-control{{ $errors->has('others_details') ? ' is-invalid' : '' }}"  value="{{$security->others_details}}" >
   <label class="form-control-placeholder" for="others_details">Other Details:</label>
   @if ($errors->has('others_details'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('others_details') }}</strong>
  </span>
  @endif
</div>
</div>

  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" id="others_date" class="form-control{{ $errors->has('others_date') ? ' is-invalid' : '' }}"   value="{{$security->others_date}}" >
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
@foreach ($renewal_date  as $renewal )

 @if($renewal->claim_id == $bank_accounts->bank_id)


  <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="renewal_date" class="form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}"  value="{{$renewal->renewal_date}}" >
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
      
      <!-- <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="renewal_date" class="form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}" name="renewal_date[]" value="{{$renewal->renewal_date}}">
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div> -->
    

    @endif
@endforeach
<!-- <div class="buttons" id="renewal_add_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div> -->
    
    <div id="renewal_edit"></div>
@foreach ($revival_date  as $revival )
 @if($revival->claim_id == $bank_accounts->bank_id)
<!--  <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="revival_date" class="form-control{{ $errors->has('revival_date') ? ' is-invalid' : '' }}" value="{{$revival->revival_date}}"  >
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
        <input type="date" id="date_of_dafault" class="datechk form-control{{ $errors->has('date_of_dafault') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_dafault}}" >
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
 <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="legal_notice" class="form-control{{ $errors->has('legal_notice') ? ' is-invalid' : '' }}"  value="{{$legal->legal_notice}}" >
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
        <input type="text" id="other_document" class="form-control{{ $errors->has('other_document') ? ' is-invalid' : '' }}"  value="{{$other->other_document}}" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))">
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
        <input type="text" id="npa_date_bank" class="form-control{{ $errors->has('npa_date_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->npa_date_bank}}" >
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
        <input type="text" id="amount_as_account" class="form-control{{ $errors->has('amount_as_account') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->amount_as_account}}" >
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
        <input type="text" id="interest_bank" class="form-control{{ $errors->has('interest_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->interest_bank}}" >
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
        <input type="text" id="penel_interest_bank" class="form-control{{ $errors->has('penel_interest_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->penel_interest_bank}}" >
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
        <input type="text" id="other_charges" class="form-control{{ $errors->has('other_charges') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->other_charges_bank}}" >
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
        <input type="text" id="outstanding_amount" class="form-control{{ $errors->has('outstanding_amount') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->outstanding_amount}}" required >
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
        <input type="text" id="amount_as_date" class="form-control{{ $errors->has('amount_as_date') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->amount_as_date}}" >
        <label class="form-control-placeholder" for="amount_as_date">Date of outstanding:</label>
        @if ($errors->has('amount_as_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
   <!--  <button type="submit" class="btn btn-success btn-space" form_id="{{$bank_accounts->claim_id}}" id="loanupdatefunctionality">Update</button>
    <button type="button" class="btn btn-success btn-space" id="addition_btn" onclick="addition_btn_click()">Add New</button> -->
   </div>
    

  
 </div>
 </div>
 </form>

@endif
  @endforeach
  @endforeach

<button type="button" class="btn btn-success btn-space" id="addition_btn" onclick="addition_btn_click1()">Add New</button>
  <form>
       <div class="row">
        <div class="table-responsive" style="    margin: 8px;">
           
            <table id="loandetailstable" class="table table-bordered">
              <thead class="theadalign"> 
                <th>Sl No</th>
                <th>Loan A/C</th>
                
                <th>Date of Application for Financial Facility</th>
                <th>Date of Sanction</th>
                <th>Sanction Amount({{$claimantinformations[0]->currency}})</th>
                <th>Outstanding Amount({{$claimantinformations[0]->currency}})</th>
                <th>Action</th>
              </thead>
              <tbody id="loan_details_sync">
                
              </tbody>
            </table>

           </div>
         </div>
         <div class="row">
           <div class="col-md-12">
             <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <label><b>Note:Please Scroll To Add Another Loan Accounts (if Any)</b></label>
            </div>            
            
          </div>
        </div>
       </form>
        
  <form  id="sample_form1" name="sample_form1" method="POST" style="    width: 100%;" autocomplete="off">
      @csrf 
  <hr><br>
    <div class ="row">
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" style="pointer-events: none;" id="total_amount_bank" class="form-control{{ $errors->has('total_amount_bank') ? ' is-invalid' : '' }}" name="total_amount_bank" >
        <label class="form-control-placeholder" for="total_amount_bank">Total Outstanding Amount Due({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('total_amount_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('total_amount_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>
 

 
</div>

</div>  
                
<div class="modal-footer" style=" padding-left: 393px;">
  <div class="mx-auto">
    <button type="submit" id="bankclaimsavefunctionality" name="submit_claim" class="btn btn-success btn-space" >Save and Next</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close 
   </button>
 </div> 
</div>
</form>
@else

@foreach ($claimandrelief as $claimDetail)
<form  id="add_newaccount_update" name="add_newaccount_update" method="POST" style="    width: 100%;" autocomplete="off">
  @csrf 
  <input type="text" name="claimdetailsid" style="display: none" value="{{$claimDetail->claimdetailsid}}">
  <div class="row register-form">
    <div class="col-md-12">
      <div class="row">
       <div class="col-md-12">
         <!-- <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
          <label><b>Please fill in the applicable details  pertaining to the dispute</b></label>
        </div>   -->          
        <div class="form-group text-center" style="margin-bottom: 1.4em">
          <label><u><b>Loan Details</b></u></label>
        </div>
      </div>
    </div>

<div id="addition">
 <div class="row">
          <div class="col-md-3"> 
            <div class="form-group">
             <input type="text" onkeypress="return isNumberKey(event)"    id="loan_acc" class="form-control{{ $errors->has('loan_acc') ? ' is-invalid' : '' }}" name="loan_acc_bank"  required>
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
          <input type="text" onkeypress="return isNumberKey(event)"    id="sanction_ammount" name="sanction_ammount"  class="form-control{{ $errors->has('sanction_ammount') ? ' is-invalid' : '' }}" required>
          
          <label class="form-control-placeholder" for="sanction_ammount">Sanction Amount({{$claimantinformations[0]->currency}}):</label>
          @if ($errors->has('sanction_ammount'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sanction_ammount') }}</strong>
          </span>
          @endif
        </div>
      </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="date" id="date_of_application_bank" class="datechk form-control{{ $errors->has('date_of_application_bank') ? ' is-invalid' : '' }}" name="date_of_application_bank" >
            <label class="form-control-placeholder" for="date_of_application">Date of Application for Financial Facility:</label>
            @if ($errors->has('date_of_application_bank'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_application_bank') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2"> 
         <div class="form-group">
           <input type="date" id="date_of_sanction" class="datechk form-control{{ $errors->has('date_of_sanction') ? ' is-invalid' : '' }}" name="date_of_sanction_bank" >
           <label class="form-control-placeholder" for="date_of_sanction">Date of Sanction:</label>
           @if ($errors->has('date_of_sanction'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_sanction') }}</strong>
          </span>
          @endif
        </div>
      </div>
      
      

    </div>
     <div class="row">
     <div class="col-md-3"></div>
             <div class="col-md-4">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 20px;">Security Details</b></label>
               
            </div>
          </div>
            <div class="col-md-1">
            <div class="buttons" id="mortgage_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
 <div class="col-md-1">
<div  id="security_del" style="display:none;" class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
</div>
          </div>
    <div class="row">
 <div class="col-md-3"> 

 </div>
  <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled style="
    background-color: aliceblue;"></div>

    <div class="col-md-4"> 
      <div class="form-group">
         
       <select name="security_type[]" id="security_type1" class="form-control" onchange="selectsecurity_edit1()" required>
     <option value="">Select Security Type</option>    
  <option value="mortgage">Mortgage</option>
  <option value="hypothecation">Hypothecation</option>
  <option value="guarntee">Guarantee Agreement</option>
  <option value="other">Other</option>
</select>
  </div>
  
</div>
 
  <!-- <div class="buttons" id="mortgage_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div> -->

 
</div>
<div id="mortgage_hide1">

  <div class="row">

    <div class="col-md-4"> 
      <div class="form-group">
       <input type="text" id="mortgage_property" class="form-control{{ $errors->has('mortgage_property') ? ' is-invalid' : '' }}" name="mortgage_property[]"  >
       <label class="form-control-placeholder" for="mortgage_property">Description of Property:</label>
       @if ($errors->has('mortgage_property'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_property') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="form-group">
      <input  type="text" onkeypress="return isNumberKey(event)"    id="mortgage_value_bank" class="form-control{{ $errors->has('mortgage_value_bank') ? ' is-invalid' : '' }}" name="mortgage_value_bank[]" >
      <label class="form-control-placeholder" for="mortgage_value_bank">Value({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('mortgage_value_bank'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_value_bank') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4"> 
   <div class="form-group">
     <input type="text" id="mortgage_schedule" class="form-control{{ $errors->has('mortgage_schedule') ? ' is-invalid' : '' }}" name="mortgage_schedule[]" >
     <label class="form-control-placeholder" for="mortgage_schedule">Schedule and Boundaries:</label>
     @if ($errors->has('mortgage_schedule'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_schedule') }}</strong>
    </span>
    @endif
  </div>
</div>


</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" id="mortgage_name" class="form-control{{ $errors->has('mortgage_name') ? ' is-invalid' : '' }}" name="mortgage_name[]"  >
     <label class="form-control-placeholder" for="mortgage_name">Name of the Mortgagaor:</label>
     @if ($errors->has('mortgage_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_name') }}</strong>
    </span>
    @endif
  </div>
</div>
  
<div class="col-md-4">  
  <div class="form-group">
    <input type="date" id="mortgage_date" name="mortgage_date[]"  class="datechk form-control{{ $errors->has('mortgage_date') ? ' is-invalid' : '' }}" >
    
    <label class="form-control-placeholder" for="mortgage_date">Date of Mortgage/ LEDTD:</label>
    @if ($errors->has('mortgage_date'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_date') }}</strong>
    </span>
    @endif
  </div>
</div>








</div>
</div>
<div id="hypo_hide1">

<div class="row">

  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" id="hypo_property" class="form-control{{ $errors->has('hypo_property') ? ' is-invalid' : '' }}" name="hypo_property[]"  >
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
    <input type="text" onkeypress="return isNumberKey(event)"    id="hypo_value" class="form-control{{ $errors->has('hypo_value') ? ' is-invalid' : '' }}" name="hypo_value[]" >
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
   <input type="text" id="hypo_schedule" class="form-control{{ $errors->has('hypo_schedule') ? ' is-invalid' : '' }}" name="hypo_schedule[]" >
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
   <input type="text" id="hypo_name" class="form-control{{ $errors->has('hypo_name') ? ' is-invalid' : '' }}" name="hypo_name[]" >
   <label class="form-control-placeholder" for="hypo_name">Hypothecator Name:</label>
   @if ($errors->has('hypo_name'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('hypo_name') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
<div class="row">
   <div class="col-md-4">  
    <div class="form-group">
      <input type="date" id="hypo_date" name="hypo_date[]"  class="datechk form-control{{ $errors->has('hypo_date') ? ' is-invalid' : '' }}" >
      
      <label class="form-control-placeholder" for="hypo_date">Date of Hypothecation:</label>
      @if ($errors->has('hypo_date'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_date') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
    <div class="form-group">
      <input type="text" id="hypo_engine" name="hypo_engine[]"  class="form-control{{ $errors->has('hypo_engine') ? ' is-invalid' : '' }}" >
      
      <label class="form-control-placeholder" for="hypo_engine">Vehicle Engine Number:</label>
      @if ($errors->has('hypo_engine'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_engine') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">  
    <div class="form-group">
      <input type="text" id="hypo_chassis" name="hypo_chassis[]"  class="form-control{{ $errors->has('hypo_chassis') ? ' is-invalid' : '' }}" >
      
      <label class="form-control-placeholder" for="hypo_chassis">Chassis Number:</label>
      @if ($errors->has('hypo_chassis'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_chassis') }}</strong>
      </span>
      @endif
    </div>
  </div>
 
  

  </div>
</div>
 <div id="guarntee_edit">
  
<div class="row">

  <div class="col-md-6"> 
    <div class="form-group">
     <input type="text" id="guarntee_name" class="form-control{{ $errors->has('guarntee_name') ? ' is-invalid' : '' }}" name="guarntee_name[]"  >
     <label class="form-control-placeholder" for="guarntee_name">Guarantor Name:</label>
     @if ($errors->has('guarntee_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntee_name') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6"> 
  <div class="form-group">
    <input type="date" id="guarntor_agreement" class="datechk form-control{{ $errors->has('guarntor_agreement') ? ' is-invalid' : '' }}" name="guarntor_agreement[]" >
    <label class="form-control-placeholder" for="guarntor_agreement">Date of Guarantor Agreement:</label>
    @if ($errors->has('guarntor_agreement'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntor_agreement') }}</strong>
    </span>
    @endif
  </div>
</div>




</div>
</div>
<div id="other_hide1">
<div class="row">
 
</div>



<div class="row">
  <div class="col-md-6"> 
 <div class="form-group">
   <input type="text" id="others_details" class="form-control{{ $errors->has('others_details') ? ' is-invalid' : '' }}" name="others_details[]" >
   <label class="form-control-placeholder" for="others_details">Other Details:</label>
   @if ($errors->has('others_details'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('others_details') }}</strong>
  </span>
  @endif
</div>
</div>

  <div class="col-md-6"> 
    <div class="form-group">
     <input type="date" id="others_date" class="datechk form-control{{ $errors->has('others_date') ? ' is-invalid' : '' }}" name="others_date[]"  >
     <label class="form-control-placeholder" for="others_date">Date:</label>
     @if ($errors->has('others_date'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('others_date') }}</strong>
    </span>
    @endif
  </div>
</div>




</div>




</div>

<div id="mortgage"></div>
    <div class="row">
       <div class="col-md-3"></div>
      <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled style="
    background-color: antiquewhite;
"></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="renewal_date" class="datechk form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}" name="renewal_date[]" >
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="buttons" id="renewal_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
  <div class="buttons" id="renewal_del" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>

    </div>
    <div id="renewal"></div>
   <div class="row">
     <div class="col-md-3"></div>
     <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled style="
   
    background-color: bisque;
"></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="revival_date" class="datechk form-control{{ $errors->has('revival_date') ? ' is-invalid' : '' }}" name="revival_date[]" >
        <label class="form-control-placeholder" for="revival_date">Revival Letter Date:</label>
        @if ($errors->has('revival_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('revival_date') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="buttons" id="revival_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
  <div class="buttons" id="revival_del" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span></div>
   </div>  
   <div id="revival"></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="legal_notice" class="datechk form-control{{ $errors->has('legal_notice') ? ' is-invalid' : '' }}" name="legal_notice[]" >
        <label class="form-control-placeholder" for="legal_notice">Demand/Legal Notice Date:</label>
        @if ($errors->has('legal_notice'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('legal_notice') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="buttons" id="legal_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
  <div class="buttons" id="legal_del" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
  </div>
  <div id="legal"></div>
  <div class="row">
     <div class="col-md-3"></div>
    <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled style="
    background-color: azure;
"></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type='text'  id="other_document" class="form-control{{ $errors->has('other_document') ? ' is-invalid' : '' }}" name="other_document[]" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))">
        <label class="form-control-placeholder" for="other_document">Other Document Details:</label>
        @if ($errors->has('other_document'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('other_document') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="buttons" id="document_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
  <div class="buttons" id="other_del" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>
  </div>
  <div id="document1"></div>
  <div class="row">
    
  <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" id="date_of_dafault" class="datechk form-control{{ $errors->has('date_of_dafault') ? ' is-invalid' : '' }}" name="date_of_dafault" >
        <label class="form-control-placeholder" for="date_of_dafault">Date of Default:</label>
        @if ($errors->has('date_of_dafault'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_dafault') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4">  
      <div class="form-group">
        <input type="text" id="npa_date_bank" class="datechk form-control{{ $errors->has('npa_date_bank') ? ' is-invalid' : '' }}" name="npa_date_bank" >
        <label class="form-control-placeholder" for="npa_date_bank">NPA Date:</label>
        @if ($errors->has('npa_date_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('npa_date_bank') }}</strong>
        </span>
        @endif
      </div> 
    </div>
  <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"    id="amount_as_account" class="form-control{{ $errors->has('amount_as_account') ? ' is-invalid' : '' }}" name="amount_as_account" >
        <label class="form-control-placeholder" for="amount_as_account">Amount as per Account({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('amount_as_account'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_account') }}</strong>
        </span>
        @endif
      </div>
    </div>
</div>


<div class="row">
  

    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"    id="interest_bank" class="form-control{{ $errors->has('interest_bank') ? ' is-invalid' : '' }}" name="interest_bank" >
        <label class="form-control-placeholder" for="interest_bank"> Rate of Interst (%):</label>
        @if ($errors->has('interest_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('interest_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
   <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"    id="penel_interest_bank" class="form-control{{ $errors->has('penel_interest_bank') ? ' is-invalid' : '' }}" name="penel_interest" >
        <label class="form-control-placeholder" for="penel_interest_bank">Penal Interest:</label>
        @if ($errors->has('penel_interest'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('penel_interest') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"    id="other_charges" class="form-control{{ $errors->has('other_charges') ? ' is-invalid' : '' }}" name="other_charges_bank" >
        <label class="form-control-placeholder" for="other_charges_bank">Other Charges({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('other_charges'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('other_charges') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
  </div>


  </form>
  
  <div class="row">
     
    <div class="col-md-2"> </div>
    
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"   id="outstanding_amount" class="form-control{{ $errors->has('outstanding_amount') ? ' is-invalid' : '' }}" name="outstanding_amount" required >
        <label class="form-control-placeholder" for="outstanding_amount">Outstanding Amount({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('outstanding_amount'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('outstanding_amount') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="amount_as_date" class="datechk form-control{{ $errors->has('amount_as_date') ? ' is-invalid' : '' }}" name="amount_as_date" >
        <label class="form-control-placeholder" for="amount_as_date">Date of outstanding:</label>
        @if ($errors->has('amount_as_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
    
  </div>

  
  <div id="bankingclaim_details"></div>

  <button type="submit" class="btn btn-success btn-space" id="add_newaccount_update1" style=" margin-left: 449px;">Save & Add Account</button>
</div>


  @foreach ($bank_account  as $bank_accounts )
@php
 $count_edit=$loop->iteration;

@endphp
 @if($bank_accounts->claim_id == $claimDetail->claimdetailsid)
 <form  id="loanupdatefunctionality{{$loop->iteration}}" name="loanupdatefunctionality{{$loop->iteration}}" method="POST" style="    width: 100%;" autocomplete="off">
  @csrf 
  <div id="bank_show_form">
 <div class="bank_edit" id="bank_edit_form{{$loop->iteration}}">
<div class="row">
  <input class="form-control" value="{{$bank_accounts->bank_id}}" name="loan_id_forupdate" style="display: none;"type="text"  >
   <div class="col-md-2"><input class="form-control" placeholder='Loan{{ $loop->iteration}}'  type="text" disabled ></div>
          <div class="col-md-2"> 
            <div class="form-group">
             <input type="text" onkeypress="return isNumberKey(event)"   id="loan_acc" class="form-control{{ $errors->has('loan_acc') ? ' is-invalid' : '' }}"  name="loan_acc_bank" value="{{$bank_accounts->loan_acc_bank}}" >
             <label class="form-control-placeholder"
              for="loan_acc">Loan A/C:</label>
             @if ($errors->has('loan_acc'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('loan_acc') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2">  
        <div class="form-group">
          <input type="text" onkeypress="return isNumberKey(event)"  id="sanction_ammount"   class="form-control{{ $errors->has('sanction_ammount') ? ' is-invalid' : '' }}" name="sanction_ammount" value="{{$bank_accounts->sanction_ammount}}" >
          
          <label class="form-control-placeholder" for="sanction_ammount">Sanction Amount({{$claimantinformations[0]->currency}}):</label>
          @if ($errors->has('sanction_ammount'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sanction_ammount') }}</strong>
          </span>
          @endif
        </div>
      </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type='date'  name="date_of_application_bank" class="datechk form-control{{ $errors->has('date_of_application_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_application_bank}}">
            <label class="form-control-placeholder" for="date_of_application">Date of Application for Financial Facility:</label>
            @if ($errors->has('date_of_application_bank'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_application_bank') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2"> 
         <div class="form-group">
           <input type='date'  class="datechk form-control{{ $errors->has('date_of_sanction') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_sanction_bank}}" name="date_of_sanction_bank">
           <label class="form-control-placeholder" for="date_of_sanction">Date of Sanction:</label>
           @if ($errors->has('date_of_sanction'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_sanction') }}</strong>
          </span>
          @endif
        </div>
      </div>
      
  @php
$count_edit1=1; 
@endphp       

@foreach ($security_type  as $security )


 @if($security->claim_id == $bank_accounts->bank_id)

    
<!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
<div class="col-md-1"><input class="form-control security{{$count_edit}}" value="{{ $count_edit1}}"  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div>
     <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" id="security_type_bank" name="security_type_edit[]" class="form-control{{ $errors->has('security_type') ? ' is-invalid' : '' }}"  value="{{$security->security_type}}" >
       <label class="form-control-placeholder" for="security_type">Security Type:</label>
       @if ($errors->has('security_type'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('security_type') }}</strong>
      </span>
      @endif
    </div>
  </div>
    
 
  <!-- <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div> -->

   <!--  <div class="col-md-4"> 
      <div class="form-group">
         
       <select name="security_type[]" id="security_type1" class="form-control" value="{{$security->security_type}}" onchange="selectsecurity_edit1()">
     <option value="">Select Security Type</option>    
  <option value="mortgage">Mortgage</option>
  <option value="hypothecation">Hypothecation</option>
  <option value="guarntee">Guarantee Agreement</option>
  <option value="other">Other</option>
</select>
  </div>
  
</div> -->
 
  
 



    
  

    <div class="col-md-3 mortgage_bank_hide{{$loop->index}}"> 
      <div class="form-group">
       <input type="text" id="mortgage_property" class="form-control{{ $errors->has('mortgage_property') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_property}}" name="mortgage_property_edit[]">
       <label class="form-control-placeholder" for="mortgage_property">Description of Property:</label>
       @if ($errors->has('mortgage_property'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_property') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3 mortgage_bank_hide{{$loop->index}}" > 
    <div class="form-group">
      <input  onkeypress="return isNumberKey(event)"  id="mortgage_value_bank" name="mortgage_value_bank_edit[]" class="form-control{{ $errors->has('mortgage_value_bank') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_value_bank}}" >
      <label class="form-control-placeholder" for="mortgage_value_bank">Value({{$claimantinformations[0]->currency}}):</label>
      @if ($errors->has('mortgage_value_bank'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mortgage_value_bank') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3 mortgage_bank_hide{{$loop->index}}" > 
   <div class="form-group">
     <input type="text" id="mortgage_schedule" name="mortgage_schedule_edit[]" class="form-control{{ $errors->has('mortgage_schedule') ? ' is-invalid' : '' }}"  value="{{$security->mortgage_schedule}}" >
     <label class="form-control-placeholder" for="mortgage_schedule">Schedule and Boundaries:</label>
     @if ($errors->has('mortgage_schedule'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_schedule') }}</strong>
    </span>
    @endif
  </div>
</div>




  <div class="col-md-3 mortgage_bank_hide{{$loop->index}}">
    <div class="form-group">
     <input type="text" id="mortgage_name" name="mortgage_name_add[]" class="form-control{{ $errors->has('mortgage_name') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_name}}" >
     <label class="form-control-placeholder" for="mortgage_name">Name of the Mortgagaor:</label>
     @if ($errors->has('mortgage_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_name') }}</strong>
    </span>
    @endif
  </div>
</div>
  
<div class="col-md-3 mortgage_bank_hide{{$loop->index}}">  
  <div class="form-group">
    <input type='date' name="mortgage_date_add[]"  class="form-control{{ $errors->has('mortgage_date') ? ' is-invalid' : '' }}"  value="{{$security->mortgage_date}}" >
    
    <label class="form-control-placeholder" for="mortgage_date">Date of Mortgage/ LEDTD:</label>
    @if ($errors->has('mortgage_date'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('mortgage_date') }}</strong>
    </span>
    @endif
  </div>
</div>






  <div class="col-md-3 hypo_bank_hide{{$loop->index}}" > 
    <div class="form-group">
     <input type="text" id="hypo_property" name="hypo_property_add[]" class="form-control{{ $errors->has('hypo_property') ? ' is-invalid' : '' }}"   value="{{$security->hypo_property}}" >
     <label class="form-control-placeholder" for="hypo_property">Description of Property:</label>
     @if ($errors->has('hypo_property'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('hypo_property') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3 hypo_bank_hide{{$loop->index}}" > 
  <div class="form-group">
    <input  onkeypress="return isNumberKey(event)"  id="hypo_value" name="hypo_value_add[]" class="form-control{{ $errors->has('hypo_value') ? ' is-invalid' : '' }}"   value="{{$security->hypo_value}}" >
    <label class="form-control-placeholder" for="hypo_value">Value({{$claimantinformations[0]->currency}}):</label>
    @if ($errors->has('hypo_value'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('hypo_value') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3 hypo_bank_hide{{$loop->index}}"> 
 <div class="form-group">
   <input type="text" id="hypo_schedule" name="hypo_schedule_add[]" class="form-control{{ $errors->has('hypo_schedule') ? ' is-invalid' : '' }}" value="{{$security->hypo_schedule}}" >
   <label class="form-control-placeholder" for="hypo_schedule">Schedule and Boundaries:</label>
   @if ($errors->has('hypo_schedule'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('hypo_schedule') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-3 hypo_bank_hide{{$loop->index}}" > 
 <div class="form-group">
   <input type="text" id="hypo_name" name="hypo_name_add[]" class="form-control{{ $errors->has('hypo_name') ? ' is-invalid' : '' }}"  value="{{$security->hypo_name}}" >
   <label class="form-control-placeholder" for="hypo_name">Hypothecator Name:</label>
   @if ($errors->has('hypo_name'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('hypo_name') }}</strong>
  </span>
  @endif
</div>
</div>


   <div class="col-md-3 hypo_bank_hide{{$loop->index}}">  
    <div class="form-group">
      <input type='date'   name="hypo_date_add[]" class="form-control{{ $errors->has('hypo_date') ? ' is-invalid' : '' }}" value="{{$security->hypo_date}}" >
      
      <label class="form-control-placeholder" for="hypo_date">Date of Hypothecation:</label>
      @if ($errors->has('hypo_date'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_date') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3 hypo_bank_hide{{$loop->index}}">  
    <div class="form-group">
      <input type="text" id="hypo_engine" name="hypo_engine_add[]"  class="form-control{{ $errors->has('hypo_engine') ? ' is-invalid' : '' }}"  value="{{$security->hypo_engine}}" >
      
      <label class="form-control-placeholder" for="hypo_engine">Vehicle Engine Number:</label>
      @if ($errors->has('hypo_engine'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_engine') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-3 hypo_bank_hide{{$loop->index}}">  
    <div class="form-group">
      <input type="text" id="hypo_chassis" name="hypo_chassis_add[]"  class="form-control{{ $errors->has('hypo_chassis') ? ' is-invalid' : '' }}" value="{{$security->hypo_chassis}}" >
      
      <label class="form-control-placeholder" for="hypo_chassis">Chassis Number:</label>
      @if ($errors->has('hypo_chassis'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('hypo_chassis') }}</strong>
      </span>
      @endif
    </div>
  </div>
 
  

 
 
 
  


  <div class="col-md-3 guarntee_bank_hide{{$loop->index}}"> 
    <div class="form-group">
     <input type="text" id="guarntee_name" name="guarntee_name_edit[]" class="form-control{{ $errors->has('guarntee_name') ? ' is-invalid' : '' }}"   value="{{$security->guarntee_name}}" >
     <label class="form-control-placeholder" for="guarntee_name">Guarantor Name:</label>
     @if ($errors->has('guarntee_name'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntee_name') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-3 guarntee_bank_hide{{$loop->index}}"> 
  <div class="form-group">
    <input type="text" id="guarntor_agreement" name="guarntor_agreement_edit[]" class="form-control{{ $errors->has('guarntor_agreement') ? ' is-invalid' : '' }}"  value="{{$security->guarntor_agreement}}" >
    <label class="form-control-placeholder" for="guarntor_agreement">Guarantor Agreement:</label>
    @if ($errors->has('guarntor_agreement'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('guarntor_agreement') }}</strong>
    </span>
    @endif
  </div>
</div>












  <div class="col-md-3 other_bank_hide{{$loop->index}}"> 
 <div class="form-group">
   <input type="text" id="others_details" name="others_details_edit[]" class="form-control{{ $errors->has('others_details') ? ' is-invalid' : '' }}"  value="{{$security->others_details}}" >
   <label class="form-control-placeholder" for="others_details">Other Details:</label>
   @if ($errors->has('others_details'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('others_details') }}</strong>
  </span>
  @endif
</div>
</div>

  <div class="col-md-3 other_bank_hide{{$loop->index}}"> 
    <div class="form-group">
     <input type="date"  name="others_date_edit[]" class="datechk form-control{{ $errors->has('others_date') ? ' is-invalid' : '' }}"   value="{{$security->others_date}}" >
     <label class="form-control-placeholder" for="others_date">Date:</label>
     @if ($errors->has('others_date'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('others_date') }}</strong>
    </span>
    @endif
  </div>
</div>










@php
$count_edit1=$count_edit1+1;
@endphp


@endif
@endforeach
 @php
$count_edit2=1; 
@endphp  
 
@foreach ($renewal_date  as $renewal )
 @if($renewal->claim_id == $bank_accounts->bank_id)


  <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <!-- <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="renewal_date" class="form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}"  value="{{$renewal->renewal_date}}" >
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div> -->
    <div class="col-md-1"><input class="form-control renewal{{$count_edit}}" value="{{ $count_edit2}}"  type="text" disabled style="background-color: aliceblue;"><label class="form-control-placeholder">Sl. No.</label></div>
      
     
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}" name="renewal_date[]" value="{{$renewal->renewal_date}}">
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
    @php
$count_edit2=$count_edit2+1;
@endphp

    @endif
@endforeach
 @php
$count_edit3=1; 
@endphp  
<!-- <div class="col-md-1"> 
<div class="buttons" id="renewal_add_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div> -->
    
   
@foreach ($revival_date  as $revival )
 @if($revival->claim_id == $bank_accounts->bank_id)
<!--  <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
     <!-- div class="row">
     <div class="col-md-3"></div>
     <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div> -->
     <div class="col-md-1"><input class="form-control revival{{$count_edit}}" value="{{ $count_edit3}}"  type="text" disabled style="background-color: aliceblue;"><label class="form-control-placeholder">Sl. No.</label></div>
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('revival_date') ? ' is-invalid' : '' }}" name="revival_date[]" value="{{$revival->revival_date}}">
        <label class="form-control-placeholder" for="revival_date">Revival Letter Date:</label>
        @if ($errors->has('revival_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('revival_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
@php
$count_edit3=$count_edit3+1;
@endphp
    
      @endif
@endforeach
<!-- <div class="col-md-1">
<div class="buttons" id="revival_addedit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div> -->
     @php
$count_edit4=1; 
@endphp  
   
   @foreach ($legal_notice  as $legal )
 @if($legal->claim_id == $bank_accounts->bank_id)
 <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
   <div class="col-md-1"><input class="form-control legal{{$count_edit}}" value="{{ $count_edit4}}"  type="text" disabled style="background-color: aliceblue;"><label class="form-control-placeholder">Sl. No.</label></div>
    
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('legal_notice') ? ' is-invalid' : '' }}" name="legal_notice[]" value="{{$legal->legal_notice}}">
        <label class="form-control-placeholder" for="legal_notice">Demand/Legal Notice Date:</label>
        @if ($errors->has('legal_notice'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('legal_notice') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
 @php
$count_edit4=$count_edit4+1;
@endphp
@endif
@endforeach
<!-- <div class="buttons" id="legal_add_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div> -->
  @php
$count_edit5=1; 
@endphp  
  
 @foreach ($other_document  as $other )
 @if($other->claim_id == $bank_accounts->bank_id)
 <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
 <div class="col-md-1"><input class="form-control others{{$count_edit}}" value="{{ $count_edit5}}"  type="text" disabled style="background-color: aliceblue;"><label class="form-control-placeholder">Sl. No.</label></div>
   
    <div class="col-md-3" > 
      <div class="form-group">
        <input type='text'  id="other_document" class="form-control{{ $errors->has('other_document') ? ' is-invalid' : '' }}" name="other_document[]"  value="{{$other->other_document}}" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))">
        <label class="form-control-placeholder" for="other_document">Other Document Details:</label>
        @if ($errors->has('other_document'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('other_document') }}</strong>
        </span>
        @endif
      </div>
    </div>
   @php
$count_edit5=$count_edit5+1;
@endphp
    @endif
@endforeach
 <!-- <div class="buttons" id="document_add_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div> -->
  
 
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('date_of_dafault') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_dafault}}" >
        <label class="form-control-placeholder" for="date_of_dafault">Date of Default:</label>
        @if ($errors->has('date_of_dafault'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('date_of_dafault') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
<div class="col-md-3"> 
      <div class="form-group">
        <input type="date"  class="datechk form-control{{ $errors->has('npa_date_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->npa_date_bank}}" name="npa_date_bank">
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
        <input  onkeypress="return isNumberKey(event)"  id="amount_as_account" class="form-control{{ $errors->has('amount_as_account') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->amount_as_account}}" name="amount_as_account">
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
        <input type="text"  onkeypress="return isNumberKey(event)"  id="interest_bank" class="form-control{{ $errors->has('interest_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->interest_bank}}" name="interest_bank">
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
        <input type="text"  onkeypress="return isNumberKey(event)"  id="penel_interest_bank" class="form-control{{ $errors->has('penel_interest_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->penel_interest_bank}}" name="penel_interest">
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
        <input  onkeypress="return isNumberKey(event)"  id="other_charges" class="form-control{{ $errors->has('other_charges') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->other_charges_bank}}" name="other_charges_bank">
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
        <input  onkeypress="return isNumberKey(event)"  id="outstanding_amount" class="form-control{{ $errors->has('outstanding_amount') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->outstanding_amount}}" name="outstanding_amount" required>
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
        <input type="date" class="datechk form-control{{ $errors->has('amount_as_date') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->amount_as_date}}" name="amount_as_date">
        <label class="form-control-placeholder" for="amount_as_date">Date of outstanding:</label>
        @if ($errors->has('amount_as_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
   <!--  <div class="col-md-3"></div>
    <div class="col-md-3"></div> -->
     <div class="row">
    
             <div class="col-md-4">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Security Details</b></label>
               
            </div>
          </div>
            <div class="col-md-2">
            <div class="buttons" id="mortgage_add_edit" onclick="mortgage_add_edit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
<div class="col-md-4">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Renewal Date</b></label>
               
            </div>
          </div>
            <div class="col-md-2">
            <div class="buttons" id="renewal_add_edit" onclick="renewal_add_edit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
 
          </div>
          <div class="row">
    
             <div class="col-md-3">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Revival Date</b></label>
               
            </div>
          </div>
            <div class="col-md-1">
            <div class="buttons" id="revival_addedit" onclick="revival_addedit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
<div class="col-md-3">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Legal Notice</b></label>
               
            </div>
          </div>
            <div class="col-md-1">
            <div class="buttons" id="legal_add_edit" onclick="legal_add_edit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
<div class="col-md-3">           
            <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><b style="font-size: 15px;">Other Document Details</b></label>
               
            </div>
          </div>
            <div class="col-md-1">
           <div class="buttons" id="document_add_edit" onclick="document_add_edit('{{$loop->iteration}}',event)">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
</div>
 
          </div>
    
    

    
   </div>
    
 
 <div id="mortgage_edit{{$loop->iteration}}" ></div>
   <div id="renewal_edit{{$loop->iteration}}"></div>
   <div id="revival_add_add{{$loop->iteration}}"></div>  
   <div id="legal_edit{{$loop->iteration}}"></div>
    <div id="document1_edit{{$loop->iteration}}"></div>
    <button  class="btn btn-success btn-space" form_id="{{$loop->iteration}}" id="loanupdatefunctionality{{$loop->iteration}}" onclick="loanupdatefunctionality('{{$loop->iteration}}',event)" style="margin-left: 451px;">Loan Update</button>
  
 </div>
 </div>

  
 </form>

@endif
  @endforeach
  @foreach ($bank_account  as $bank_accounts )

 @if($bank_accounts->claim_id == $claimDetail->claimdetailsid)
 <form  id="loanupdatefunctionality{{$bank_accounts->claim_id}}" name="loanupdatefunctionality{{$bank_accounts->claim_id}}" method="POST" style="    width: 100%;" autocomplete="off">
  @csrf 
  <div id="bank_showedit_form">
 <div class="bank_showedit" id="bank_showedit_form{{$loop->iteration}}">
<div class="row">
  <input class="form-control" value="{{$bank_accounts->claim_id}}" name="claimdetails_id" type="text" style="display: none;" >
   <div class="col-md-2"><input class="form-control" placeholder='Loan{{ $loop->iteration}}'  type="text" disabled ></div>
          <div class="col-md-2"> 
            <div class="form-group">
             <input type='text'  id="loan_acc" class="form-control{{ $errors->has('loan_acc') ? ' is-invalid' : '' }}"   value="{{$bank_accounts->loan_acc_bank}}" >
             <label class="form-control-placeholder" for="loan_acc">Loan A/C:</label>
             @if ($errors->has('loan_acc'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('loan_acc') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2">  
        <div class="form-group">
          <input type="text" id="sanction_ammount"   class="form-control{{ $errors->has('sanction_ammount') ? ' is-invalid' : '' }}" value="{{$bank_accounts->sanction_ammount}}" >
          
          <label class="form-control-placeholder" for="sanction_ammount">Sanction Amount({{$claimantinformations[0]->currency}}):</label>
          @if ($errors->has('sanction_ammount'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sanction_ammount') }}</strong>
          </span>
          @endif
        </div>
      </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type='date' id="date_of_application_bank" class="datechk form-control{{ $errors->has('date_of_application_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_application_bank}}" >
            <label class="form-control-placeholder" for="date_of_application">Date of Application for Financial Facility:</label>
            @if ($errors->has('date_of_application_bank'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_application_bank') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-2">
         <div class="form-group">
           <input type='date' id="date_of_sanction" class="datechk form-control{{ $errors->has('date_of_sanction') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_sanction_bank}}">
           <label class="form-control-placeholder" for="date_of_sanction">Date of Sanction:</label>
           @if ($errors->has('date_of_sanction'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_sanction') }}</strong>
          </span>
          @endif
        </div>
      </div>
      
      

    
@foreach ($security_type  as $security )

 @if($security->claim_id == $bank_accounts->bank_id)

    
<!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
     <div class="col-md-3"> 
      <div class="form-group">
       <input type="text" id="security_type" class="form-control{{ $errors->has('security_type') ? ' is-invalid' : '' }}"   value="{{$security->security_type}}" >
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
       <input type="text" id="mortgage_property" class="form-control{{ $errors->has('mortgage_property') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_property}}" >
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
      <input  onkeypress="return isNumberKey(event)"  id="mortgage_value_bank" class="form-control{{ $errors->has('mortgage_value_bank') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_value_bank}}" >
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
     <input type="text" id="mortgage_schedule" class="form-control{{ $errors->has('mortgage_schedule') ? ' is-invalid' : '' }}"  value="{{$security->mortgage_schedule}}" >
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
     <input type="text" id="mortgage_name" class="form-control{{ $errors->has('mortgage_name') ? ' is-invalid' : '' }}"   value="{{$security->mortgage_name}}" >
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
    <input type='text' id="mortgage_date"  class="form-control{{ $errors->has('mortgage_date') ? ' is-invalid' : '' }}"  value="{{$security->mortgage_date}}" >
    
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
     <input type="text" id="hypo_property" class="form-control{{ $errors->has('hypo_property') ? ' is-invalid' : '' }}"   value="{{$security->hypo_property}}" >
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
    <input  onkeypress="return isNumberKey(event)"  id="hypo_value" class="form-control{{ $errors->has('hypo_value') ? ' is-invalid' : '' }}"   value="{{$security->hypo_value}}" >
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
   <input type="text" id="hypo_schedule" class="form-control{{ $errors->has('hypo_schedule') ? ' is-invalid' : '' }}" value="{{$security->hypo_schedule}}" >
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
   <input type="text" id="hypo_name" class="form-control{{ $errors->has('hypo_name') ? ' is-invalid' : '' }}"  value="{{$security->hypo_name}}" >
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
      <input type='date' id="hypo_date"   class="form-control{{ $errors->has('hypo_date') ? ' is-invalid' : '' }}" value="{{$security->hypo_date}}" >
      
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
      <input type="text" id="hypo_engine"   class="form-control{{ $errors->has('hypo_engine') ? ' is-invalid' : '' }}"  value="{{$security->hypo_engine}}" >
      
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
      <input type="text" id="hypo_chassis"   class="form-control{{ $errors->has('hypo_chassis') ? ' is-invalid' : '' }}" value="{{$security->hypo_chassis}}" >
      
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
     <input type="text" id="guarntee_name" class="form-control{{ $errors->has('guarntee_name') ? ' is-invalid' : '' }}"   value="{{$security->guarntee_name}}" >
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
    <input type="text" id="guarntor_agreement" class="form-control{{ $errors->has('guarntor_agreement') ? ' is-invalid' : '' }}"  value="{{$security->guarntor_agreement}}" >
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
   <input type="text" id="others_details" class="form-control{{ $errors->has('others_details') ? ' is-invalid' : '' }}"  value="{{$security->others_details}}" >
   <label class="form-control-placeholder" for="others_details">Other Details:</label>
   @if ($errors->has('others_details'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('others_details') }}</strong>
  </span>
  @endif
</div>
</div>

  <div class="col-md-3"> 
    <div class="form-group">
     <input type="text" id="others_date" class="form-control{{ $errors->has('others_date') ? ' is-invalid' : '' }}"   value="{{$security->others_date}}" >
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
@foreach ($renewal_date  as $renewal )
 @if($renewal->claim_id == $bank_accounts->bank_id)


  <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="renewal_date" class="form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}"  value="{{$renewal->renewal_date}}" >
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
    
      
      <!-- <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="renewal_date" class="form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}" name="renewal_date[]" value="{{$renewal->renewal_date}}">
        <label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label>
        @if ($errors->has('renewal_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('renewal_date') }}</strong>
        </span>
        @endif
      </div>
    </div> -->
    

    @endif
@endforeach
<!-- <div class="buttons" id="renewal_add_edit" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div> -->
    
    <div id="renewal_edit"></div>
@foreach ($revival_date  as $revival )
 @if($revival->claim_id == $bank_accounts->bank_id)
<!--  <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="revival_date" class="form-control{{ $errors->has('revival_date') ? ' is-invalid' : '' }}" value="{{$revival->revival_date}}"  >
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
        <input type="date" id="date_of_dafault" class="datechk form-control{{ $errors->has('date_of_dafault') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->date_of_dafault}}" >
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
 <!-- <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div> -->
    <div class="col-md-3"> 
      <div class="form-group">
        <input type="text" id="legal_notice" class="form-control{{ $errors->has('legal_notice') ? ' is-invalid' : '' }}"  value="{{$legal->legal_notice}}" >
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
        <input type="text" id="other_document" class="form-control{{ $errors->has('other_document') ? ' is-invalid' : '' }}"  value="{{$other->other_document}}" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))">
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
        <input type="text" id="npa_date_bank" class="form-control{{ $errors->has('npa_date_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->npa_date_bank}}" >
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
        <input type="text" id="amount_as_account" class="form-control{{ $errors->has('amount_as_account') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->amount_as_account}}" >
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
        <input type="text" id="interest_bank" class="form-control{{ $errors->has('interest_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->interest_bank}}" >
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
        <input type="text" id="penel_interest_bank" class="form-control{{ $errors->has('penel_interest_bank') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->penel_interest_bank}}" >
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
        <input type="text" id="other_charges" class="form-control{{ $errors->has('other_charges') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->other_charges_bank}}" >
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
        <input type="text" id="outstanding_amount" class="form-control{{ $errors->has('outstanding_amount') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->outstanding_amount}}" required>
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
        <input type="text" id="amount_as_date" class="form-control{{ $errors->has('amount_as_date') ? ' is-invalid' : '' }}"  value="{{$bank_accounts->amount_as_date}}" >
        <label class="form-control-placeholder" for="amount_as_date">Date of outstanding:</label>
        @if ($errors->has('amount_as_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('amount_as_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
   <!--  <button type="submit" class="btn btn-success btn-space" form_id="{{$bank_accounts->claim_id}}" id="loanupdatefunctionality">Update</button>
    <button type="button" class="btn btn-success btn-space" id="addition_btn" onclick="addition_btn_click()">Add New</button> -->
   </div>
    

  
 </div>
 </div>
 </form>

@endif
  @endforeach

<button type="button" class="btn btn-success btn-space" id="addition_btn" onclick="addition_btn_click()">Add New</button>
  <form>
       <div class="row">
        <div class="table-responsive" style="    margin: 8px;">
           
            <table id="loandetailstable" class="table table-bordered">
              <thead class="theadalign">
                <th>Sl No</th>
                <th>Loan A/C</th>
                
                <th>Date of Application for Financial Facility</th>
                <th>Date of Sanction</th>
                <th>Sanction Amount({{$claimantinformations[0]->currency}})</th>
                <th>Outstanding Amount({{$claimantinformations[0]->currency}})</th>
                <th>Action</th>
              </thead>
              <tbody id="loan_details_sync_update">
                  
       
              </tbody>
            </table>

           </div>
         </div>
         <div class="row">
           <div class="col-md-12">
             <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <label><b>Note:Please Scroll To Add Another Loan Accounts (if Any)</b></label>
            </div>            
            
          </div>
        </div>
  <form  id="sample_form2" name="sample_form2" method="POST" style="    width: 100%;" autocomplete="off">
      @csrf 
  <hr><br>
    <div class ="row">
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" style="pointer-events: none;" id="total_amount_bank" class="form-control{{ $errors->has('total_amount_bank') ? ' is-invalid' : '' }}" name="total_amount_bank" value="{{ number_format((float)$claimDetail->total_amount_bank, 2, '.', '') }}">
        <label class="form-control-placeholder" for="total_amount_bank">Total Outstanding Amount Due({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('total_amount_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('total_amount_bank') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>
   

  </div>
</div>                 
<div class="modal-footer">
  <div class="mx-auto">
    <button type="submit" class="btn btn-success btn-space"  id="bankclaimupdatefunctionality">Update</button>
    <button type="reset"  class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>
</form>
@endforeach

@endif
<script type="text/javascript">
  function selectsecurity_create()
  {

    var mortgage_hide = document.getElementById("mortgage_hide");
    var guarntee_hide = document.getElementById("guarntee_hide");
    var other_hide = document.getElementById("other_hide");
    var hypo_hide = document.getElementById("hypo_hide");

   //alert(document.getElementById("security_type"));
    if(document.getElementById("security_type").value=='mortgage')
    {
     mortgage_hide.style.display = "block";
     guarntee_hide.style.display = "none";
     other_hide.style.display = "none";
      hypo_hide.style.display = "none";
     

}
   else if(document.getElementById("security_type").value=="hypothecation")
   {
    mortgage_hide.style.display = "none";
     guarntee_hide.style.display = "none";
     other_hide.style.display = "none";
      hypo_hide.style.display = "block";

  }
   else if(document.getElementById("security_type").value=="guarntee")
   {
    mortgage_hide.style.display = "none";
     guarntee_hide.style.display = "block";
     other_hide.style.display = "none";
      hypo_hide.style.display = "none";

  }
     else if(document.getElementById("security_type").value=="other")
   {
    mortgage_hide.style.display = "none";
     guarntee_hide.style.display = "none";
     other_hide.style.display = "block";
      hypo_hide.style.display = "none";

  }
  else
   {
    mortgage_hide.style.display = "none";
     guarntee_hide.style.display = "none";
     other_hide.style.display = "none";
      hypo_hide.style.display = "none";

  } 

}

$( document ).ready(function() {
    var mortgage_hide = document.getElementById("mortgage_hide");
    var guarntee_hide = document.getElementById("guarntee_hide");
    var other_hide = document.getElementById("other_hide");
    var hypo_hide = document.getElementById("hypo_hide");
    mortgage_hide.style.display = "none";
     guarntee_hide.style.display = "none";
     other_hide.style.display = "none";
      hypo_hide.style.display = "none";
      var bank_edit_div=document.getElementsByClassName('bank_edit1');
      for(var i=0;i<bank_edit_div.length;i++){

        bank_edit_div[i].style.display = "none";
      }
      var bank_edit_div1=document.getElementsByClassName('bank_showedit1');
      for(var i=0;i<bank_edit_div1.length;i++){

        bank_edit_div1[i].style.display = "none";
      }


var html='';

      
          $.ajax({
           type:"GET",
           url:"{{url('/gettotal_outstandingamount')}}",
           success:function(res){ 
            console.log(res['loan_details'].length);
            console.log(res);
            html += '';
            $("#loan_details_sync").empty();
            var sn_count = 1;
             document.getElementById("total_amount_bank").value = res['outstanding_amount'][0]['total_amount'];
            for(var count = 0; count < res['loan_details'].length; count++)
            {
             var sn_count_new = sn_count++;
             html += '<tr>';
             html += '<td>'+sn_count_new +'</td>';
             if (res['loan_details'][count].loan_acc_bank == null) 
             {
              html += '<td></td>';
            }
            else
            {
              html += '<td><a href="#" onclick="bank_showonclick_main('+sn_count_new+')">'+res['loan_details'][count].loan_acc_bank+'</a></td>'; 
              
  
  
      
    
  

            }

            if (res['loan_details'][count].date_of_application_bank == null) 
            {
              html += '<td></td>';
            }
            else
            {
              html += '<td>'+res['loan_details'][count].date_of_application_bank+'</td>';
            }


            html += '<td>'+res['loan_details'][count].date_of_sanction_bank+'</td>';
            html += '<td>'+res['loan_details'][count].sanction_ammount+'</td>';
            html += '<td>'+res['loan_details'][count].outstanding_amount+'</td>';
            // html += '<td><button type="button" class="btn btn-warning btn-space" onclick="bank_showonclick('+sn_count_new+')">Show</button><button type="button" class="btn btn-primary btn-space" onclick="bank_onclick('+sn_count_new+')">Edit</button><button type="button" class="btn btn-danger btn-space" onclick="bank_deleteonclick('+res['loan_details'][count].id+')">Delete</button></td>';
            html += '<td><button type="button" class="btn btn-primary btn-space" onclick="bank_mainonclick('+sn_count_new+')"><i class="fas fa-pencil-alt"></i></button><button type="button" class="btn btn-danger btn-space" onclick="bank_deleteonclick1('+res['loan_details'][count].id+')"><i class="fas fa-trash-alt"></i></button></td>';

             
            html += '</tr>'; 
          }
          $('#loan_details_sync').append(html);
       // $('tbody').html(html);


     }
   });
});


</script>
<script type="text/javascript">
  function selectsecurity_edit1()
  {
    //alert("gnhg");

    var mortgage_hide1 = document.getElementById("mortgage_hide1");
    var guarntee_hide1 = document.getElementById("guarntee_edit");
    var other_hide1 = document.getElementById("other_hide1");
    var hypo_hide1 = document.getElementById("hypo_hide1");

    
    if(document.getElementById("security_type1").value=='mortgage')
    {
     mortgage_hide1.style.display = "block";
     guarntee_hide1.style.display = "none";
     other_hide1.style.display = "none";
      hypo_hide1.style.display = "none";
     

}
   else if(document.getElementById("security_type1").value=="hypothecation")
   {
    mortgage_hide1.style.display = "none";
     guarntee_hide1.style.display = "none";
     other_hide1.style.display = "none";
      hypo_hide1.style.display = "block";

  }
   else if(document.getElementById("security_type1").value=="guarntee")
   {
    mortgage_hide1.style.display = "none";
     guarntee_hide1.style.display = "block";
     other_hide1.style.display = "none";
      hypo_hide1.style.display = "none";

  }
     else if(document.getElementById("security_type1").value=="other")
   {
    mortgage_hide1.style.display = "none";
     guarntee_hide1.style.display = "none";
     other_hide1.style.display = "block";
      hypo_hide1.style.display = "none";

  }
  else
   {
    mortgage_hide1.style.display = "none";
     guarntee_hide1.style.display = "none";
     other_hide1.style.display = "none";
      hypo_hide1.style.display = "none";

  } 

}
$( document ).ready(function() {
    var mortgage_hide = document.getElementById("mortgage_hide1");
    var guarntee_hide = document.getElementById("guarntee_edit");
    var other_hide = document.getElementById("other_hide1");
    var hypo_hide = document.getElementById("hypo_hide1");
    mortgage_hide.style.display = "none";
     guarntee_hide.style.display = "none";
     other_hide.style.display = "none";
      hypo_hide.style.display = "none";
      var bank_edit_div=document.getElementsByClassName('bank_edit');
      for(var i=0;i<bank_edit_div.length;i++){

        bank_edit_div[i].style.display = "none";
      }
      var bank_edit_div=document.getElementsByClassName('bank_showedit');
      for(var i=0;i<bank_edit_div.length;i++){

        bank_edit_div[i].style.display = "none";
      }


var html='';

      
          $.ajax({
           type:"GET",
           url:"{{url('/gettotal_outstandingamount')}}",
           success:function(res){ 
            console.log(res['loan_details'].length);
            console.log(res);
            html += '';
            $("#loan_details_sync_update").empty();
            var sn_count = 1;
             document.getElementById("total_amount_bank").value = res['outstanding_amount'][0]['total_amount'];
            for(var count = 0; count < res['loan_details'].length; count++)
            {
             var sn_count_new = sn_count++;
             html += '<tr>';
             html += '<td>'+sn_count_new +'</td>';
             if (res['loan_details'][count].loan_acc_bank == null) 
             {
              html += '<td></td>';
            }
            else
            {
              html += '<td><a href="#" onclick="bank_showonclick('+sn_count_new+')">'+res['loan_details'][count].loan_acc_bank+'</a></td>'; 
              
  
  
      
    
  

            }

            if (res['loan_details'][count].date_of_application_bank == null) 
            {
              html += '<td></td>';
            }
            else
            {
              html += '<td>'+res['loan_details'][count].date_of_application_bank+'</td>';
            }


            html += '<td>'+res['loan_details'][count].date_of_sanction_bank+'</td>';
            html += '<td>'+res['loan_details'][count].sanction_ammount+'</td>';
            html += '<td>'+res['loan_details'][count].outstanding_amount+'</td>';
            // html += '<td><button type="button" class="btn btn-warning btn-space" onclick="bank_showonclick('+sn_count_new+')">Show</button><button type="button" class="btn btn-primary btn-space" onclick="bank_onclick('+sn_count_new+')">Edit</button><button type="button" class="btn btn-danger btn-space" onclick="bank_deleteonclick('+res['loan_details'][count].id+')">Delete</button></td>';
            html += '<td><button type="button" class="btn btn-primary btn-space" onclick="bank_onclick('+sn_count_new+')"><i class="fas fa-pencil-alt"></i></button><button type="button" class="btn btn-danger btn-space" onclick="bank_deleteonclick('+res['loan_details'][count].id+')"><i class="far fa-trash-alt"></i></button></td>';

             
            html += '</tr>';
          }
          $('#loan_details_sync_update').append(html);
       // $('tbody').html(html);


     }
   });
});
function bank_deleteonclick(id){
// alert (id);
 $.ajax({
    url: '{{ url('/loan/delete_bankloan') }}' + '/' + id,    
    method:'GET',          
    
    success:function(data){
       swal("Loan Details Deleted Successfully", "", "success");
       var html='';
        $.ajax({
         type:"GET",
         url:"{{url('/gettotal_outstandingamount')}}",
         success:function(res){ 
          console.log(res['loan_details'].length);
          console.log(res);

            html += '';
            $("#loan_details_sync_update").empty();
          var sn_count = 1;
          document.getElementById("total_amount_bank").value = res['outstanding_amount'][0]['total_amount'];
          for(var count = 0; count < res['loan_details'].length; count++)
          {
             var sn_count_new = sn_count++;
             html += '<tr>';
             html += '<td>'+sn_count_new +'</td>';
             if (res['loan_details'][count].loan_acc_bank == null) 
             {
              html += '<td></td>';
             }
             else
             {
               html += '<td><a href="#" onclick="bank_showonclick('+sn_count_new+')">'+res['loan_details'][count].loan_acc_bank+'</a></td>';  
             }

             if (res['loan_details'][count].date_of_application_bank == null) 
             {
                html += '<td></td>';
             }
             else
             {
                html += '<td>'+res['loan_details'][count].date_of_application_bank+'</td>';
             }
             
             
             html += '<td>'+res['loan_details'][count].date_of_sanction_bank+'</td>';
             html += '<td>'+res['loan_details'][count].sanction_ammount+'</td>';
             html += '<td>'+res['loan_details'][count].outstanding_amount+'</td>';
             html += '<td><button type="button" class="btn btn-primary btn-space" onclick="bank_onclick('+sn_count_new+')"><i class="fas fa-pencil-alt"></i></button><button type="button" class="btn btn-danger btn-space" onclick="bank_deleteonclick('+res['loan_details'][count].id+')"><i class="far fa-trash-alt"></i></button></td>';
             html += '</tr>';
         }
         $('#loan_details_sync_update').append(html);
       // $('tbody').html(html);


       }
     });
 
    },
    error:function(data){
     // swal('Some Data are Missing Please try again','','error');
     //console.log(data);       
   }
 })
}
function bank_deleteonclick1(id){
 // alert ("jkhkjh");
 $.ajax({
    url: '{{ url('/loan/delete_bankloan') }}' + '/' + id,    
    method:'GET',          
    
    success:function(data){
       swal("Loan Details Deleted Successfully", "", "success");
       var html='';
        $.ajax({
         type:"GET",
         url:"{{url('/gettotal_outstandingamount')}}",
         success:function(res){ 
          console.log(res['loan_details'].length);
          console.log(res);

            html += '';
            $("#loan_details_sync").empty();
          var sn_count = 1;
          document.getElementById("total_amount_bank").value = res['outstanding_amount'][0]['total_amount'];
          for(var count = 0; count < res['loan_details'].length; count++)
          {
             var sn_count_new = sn_count++;
             html += '<tr>';
             html += '<td>'+sn_count_new +'</td>';
             if (res['loan_details'][count].loan_acc_bank == null) 
             {
              html += '<td></td>';
             }
             else
             {
               html += '<td><a href="#" onclick="bank_showonclick_main('+sn_count_new+')">'+res['loan_details'][count].loan_acc_bank+'</a></td>';  
             }

             if (res['loan_details'][count].date_of_application_bank == null) 
             {
                html += '<td></td>';
             }
             else
             {
                html += '<td>'+res['loan_details'][count].date_of_application_bank+'</td>';
             }
             
             
             html += '<td>'+res['loan_details'][count].date_of_sanction_bank+'</td>';
             html += '<td>'+res['loan_details'][count].sanction_ammount+'</td>';
             html += '<td>'+res['loan_details'][count].outstanding_amount+'</td>';
             html += '<td><button type="button" class="btn btn-primary btn-space" onclick="bank_mainonclick('+sn_count_new+')"><i class="fas fa-pencil-alt"></i></button><button type="button" class="btn btn-danger btn-space" onclick="bank_deleteonclick1('+res['loan_details'][count].id+')"><i class="far fa-trash-alt"></i></button></td>';
             html += '</tr>';
         }
         $('#loan_details_sync').append(html);
       // $('tbody').html(html);


       }
     });
 
    },
    error:function(data){
     // swal('Some Data are Missing Please try again','','error');
     //console.log(data);       
   }
 })
}
function bank_onclick(id) {
  
var addition=document.getElementById('addition');
addition.style.display="none";
  var bank_edit_div=document.getElementsByClassName('bank_edit');
      for(var i=0;i<bank_edit_div.length;i++){

        bank_edit_div[i].style.display = "none";
      }
var bank_edit_div2=document.getElementsByClassName('bank_showedit');
      for(var i=0;i<bank_edit_div2.length;i++){

        bank_edit_div2[i].style.display = "none";
      }
  var bank_edit_id=document.getElementById("bank_edit_form"+id);
  bank_edit_id.style.display="block";
  
}
function bank_mainonclick(id) {

var addition=document.getElementById('addition1');
addition.style.display="none";
  var bank_edit_div=document.getElementsByClassName('bank_edit1');
      for(var i=0;i<bank_edit_div.length;i++){

        bank_edit_div[i].style.display = "none";
      }
var bank_edit_div2=document.getElementsByClassName('bank_showedit1');
      for(var i=0;i<bank_edit_div2.length;i++){

        bank_edit_div2[i].style.display = "none";
      }
  var bank_edit_id=document.getElementById("bank_edit_form1"+id);
  bank_edit_id.style.display="block";
  
}
function bank_showonclick_main(id) {
var addition=document.getElementById('addition1');
addition.style.display="none";
  var bank_edit_div1=document.getElementsByClassName('bank_showedit1');
      for(var i=0;i<bank_edit_div1.length;i++){

        bank_edit_div1[i].style.display = "none";
      }
      var bank_edit_div=document.getElementsByClassName('bank_edit1');
      for(var i=0;i<bank_edit_div.length;i++){

        bank_edit_div[i].style.display = "none";
      }

  var bank_editshow_id=document.getElementById("bank_showedit_form1"+id);
  bank_editshow_id.style.display="block";
  
}
function bank_showonclick(id) {
var addition=document.getElementById('addition');
addition.style.display="none";
  var bank_edit_div1=document.getElementsByClassName('bank_showedit');
      for(var i=0;i<bank_edit_div1.length;i++){

        bank_edit_div1[i].style.display = "none";
      }
      var bank_edit_div=document.getElementsByClassName('bank_edit');
      for(var i=0;i<bank_edit_div.length;i++){

        bank_edit_div[i].style.display = "none";
      }

  var bank_editshow_id=document.getElementById("bank_showedit_form"+id);
  bank_editshow_id.style.display="block";
  
}
function addition_btn_click(id) {
  // alert("fhgfhg");
var addition=document.getElementById('addition');
  
  addition.style.display="block";
  var bank_edit_div1=document.getElementsByClassName('bank_showedit');
      for(var i=0;i<bank_edit_div1.length;i++){

        bank_edit_div1[i].style.display = "none";
      }
      var bank_edit_div=document.getElementsByClassName('bank_edit');
      for(var i=0;i<bank_edit_div.length;i++){

        bank_edit_div[i].style.display = "none";
      }

}
function addition_btn_click1(id) {
  // alert("fhgfhg");
var addition=document.getElementById('addition1');
  
  addition.style.display="block";
  var bank_edit_div1=document.getElementsByClassName('bank_showedit1');
      for(var i=0;i<bank_edit_div1.length;i++){

        bank_edit_div1[i].style.display = "none";
      }
      var bank_edit_div=document.getElementsByClassName('bank_edit1');
      for(var i=0;i<bank_edit_div.length;i++){

        bank_edit_div[i].style.display = "none";
      }

}

</script>

<script type="text/javascript">
  $(document).ready(function(){
    // var bank_edit_div=document.getElementById('security_type_bank[]');
    var security_type=<?php echo (json_encode($security_type));?>;
    var security_count=security_type.length;
    // alert(bank_edit_div);
      for(var i=0;i<security_count;i++){
        if(security_type[i]['security_type']=="mortgage"){
          $('.other_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.guarntee_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.hypo_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });

        
        }
        else if(security_type[i]['security_type']=="hypothecation"){
           $('.other_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.guarntee_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.mortgage_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
        
        }
         else if(security_type[i]['security_type']=="guarntee"){
           $('.other_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.hypo_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.mortgage_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
         
        }
         else if(security_type[i]['security_type']=="other"){
           $('.hypo_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.guarntee_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.mortgage_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
        
        }
        else{
          $('.hypo_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.guarntee_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
          $('.mortgage_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });
           $('.other_bank_hide'+i).each(function( index ) {
           $( this ).css('display','none');
        });

        }
      }

});
</script>

<!-- <script type="text/javascript">


      $("#date_of_application_bank").change(function(){

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
       

   
   setTimeout( function(){ 
     var maxDatenp = $("#date_of_application_bank").val();

    
     alert(maxDatenp);
    $('#date_of_dafault').datepicker({ dateFormat: 'yy-mm-dd',minDate: maxDatenp});
  
    $('#npa_date_bank').datepicker({ dateFormat: 'yy-mm-dd',minDate: maxDatenp });
  }  , 1000 );
    
      }
      document.body.appendChild(oJS);
    }
    document.body.appendChild(oCSS);
    
});


</script> -->
<script type="text/javascript">


    
          $("#date_of_application_bank").focusout(function(){
                 

           // $('#date_of_dafault').datepicker("destroy");
           // $('#npa_date_bank').datepicker("destroy");
           
            setTimeout( function(){ 
     var maxDatenp = $("#date_of_application_bank").val();
    
     
    $('#date_of_dafault').datepicker({ dateFormat: 'yy-mm-dd',minDate: maxDatenp, changeMonth: true,
changeYear: true});
  
    $('#npa_date_bank').datepicker({ dateFormat: 'yy-mm-dd',minDate: maxDatenp, changeMonth: true,
changeYear: true });
  }  , 1000 );
      
   
});

</script>
<!-- <script type="text/javascript">


    
          $("#date_of_application_bank").focusout(function(){

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
         $('#date_of_dafault').datepicker("destroy");
           $('#npa_date_bank').datepicker("destroy");
           
            setTimeout( function(){ 
     var maxDatenp = $("#date_of_application_bank").val();
    
     
    $('#date_of_dafault').datepicker({ dateFormat: 'yy-mm-dd',minDate: maxDatenp});
  
    $('#npa_date_bank').datepicker({ dateFormat: 'yy-mm-dd',minDate: maxDatenp });
  }  , 1000 );
      
      }
      document.body.appendChild(oJS);
    }
    document.body.appendChild(oCSS);
                 

          
   
});





  



</script> -->
<!-- <script type="text/javascript">
  $( document ).ready(function() {
     var date_class=$('.dateeditcheck');
     for (var i = 0; i < date_class.length; i++) {
       $('.dateeditcheck')[i].find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });
     }  
});

</script>
 -->

<!-- <script type="text/javascript"> 
 
  document.querySelector('input[name=submit_claim]').addEventListener('click', function(e) {
    e.preventDefault();
    alert("ghhjg");

    window.location.reload();
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