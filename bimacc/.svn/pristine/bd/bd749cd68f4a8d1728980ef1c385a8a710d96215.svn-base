
    <form  id="add_newaccount" name="add_newaccount" method="POST" style="    width: 100%;" autocomplete="off">
      @csrf 
       @foreach ($claimnotices as $notice)
       <input type="hidden" id="claimnoticeid"  name="claimnoticeid"  value="{{$notice->id}}" >
      @endforeach 
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
        <div class="row">  
          <div class="col-md-3"> 
            <div class="form-group">
             <input type="text" onkeypress="return isNumberKey(event)"  id="loan_acc" class="form-control{{ $errors->has('loan_acc') ? ' is-invalid' : '' }}" name="loan_acc_bank"  required>
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
          <input type="text" onkeypress="return isNumberKey(event)" id="sanction_ammount" name="sanction_ammount"  class="form-control{{ $errors->has('sanction_ammount') ? ' is-invalid' : '' }}" required>
          
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
            <input type="date" id="date_of_application_bank1" class="datechk form-control{{ $errors->has('date_of_application_bank') ? ' is-invalid' : '' }}" name="date_of_application_bank"  required>
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
           <input type="date" id="date_of_sanction1" class="datechk form-control{{ $errors->has('date_of_sanction') ? ' is-invalid' : '' }}" name="date_of_sanction_bank" required>
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
  <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div>

    <div class="col-md-4"> 
      <div class="form-group">
         
       <select name="security_type[]" id="security_type_counter" class="form-control" onchange="selectsecurity_counter()" required>
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
   <div class="row"></div> 
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
      <input  type="text" onkeypress="return isNumberKey(event)"id="mortgage_value_bank" class="form-control{{ $errors->has('mortgage_value_bank') ? ' is-invalid' : '' }}" name="mortgage_value_bank[]" >
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
    <input type="date" id="mortgage_date1" name="mortgage_date[]"  class="datechk form-control{{ $errors->has('mortgage_date') ? ' is-invalid' : '' }}" >
    
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
    <input type="text" onkeypress="return isNumberKey(event)"  id="hypo_value" class="form-control{{ $errors->has('hypo_value') ? ' is-invalid' : '' }}" name="hypo_value[]" >
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
      <input type="date" id="hypo_date1" name="hypo_date[]"  class="datechk form-control{{ $errors->has('hypo_date') ? ' is-invalid' : '' }}" >
      
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
     <input type="date" id="others_date1" class="datechk form-control{{ $errors->has('others_date') ? ' is-invalid' : '' }}" name="others_date[]"  >
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
 <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="renewal_date1" class="datechk form-control{{ $errors->has('renewal_date') ? ' is-invalid' : '' }}" name="renewal_date[]" >
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
  <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="date" id="revival_date1" class="datechk form-control{{ $errors->has('revival_date') ? ' is-invalid' : '' }}" name="revival_date[]" >
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
        <input type="date" id="legal_notice1" class="datechk form-control{{ $errors->has('legal_notice') ? ' is-invalid' : '' }}" name="legal_notice[]" >
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
   <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled ></div>
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
        <input type="text" id="date_of_dafault1" class=" form-control{{ $errors->has('date_of_dafault') ? ' is-invalid' : '' }}" name="date_of_dafault" >
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
        <input type="text" id="npa_date_bank_counter" class=" form-control{{ $errors->has('npa_date') ? ' is-invalid' : '' }}" name="npa_date_bank" >
        <label class="form-control-placeholder" for="npa_date_bank">NPA Date:</label>
        @if ($errors->has('npa_date'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('npa_date') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" onkeypress="return isNumberKey(event)"  id="amount_as_account" class="form-control{{ $errors->has('amount_as_account') ? ' is-invalid' : '' }}" name="amount_as_account" >
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
        <input type="text" onkeypress="return isNumberKey(event)"  id="interest_bank" class="form-control{{ $errors->has('interest_bank') ? ' is-invalid' : '' }}" name="interest_bank" >
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
        <input type="text" onkeypress="return isNumberKey(event)"  id="penel_interest_bank" class="form-control{{ $errors->has('penel_interest_bank') ? ' is-invalid' : '' }}" name="penel_interest_bank" >
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
        <input type="text" onkeypress="return isNumberKey(event)"  id="other_charges" class="form-control{{ $errors->has('other_charges') ? ' is-invalid' : '' }}" name="other_charges_bank" >
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
    
    <div class="col-md-2"></div>
    
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" id="outstanding_amount" class="form-control{{ $errors->has('outstanding_amount') ? ' is-invalid' : '' }}" name="outstanding_amount" required>
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
        <input type="date" id="amount_as_date1" class="datechk form-control{{ $errors->has('amount_as_date') ? ' is-invalid' : '' }}" name="amount_as_date" >
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

              </thead>
              <tbody id="loan_details_sync_res">
                
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


   <form  id="sample_form1" name="sample_form1" method="POST" style="    width: 100%;" autocomplete="off">
      @csrf 
  <hr><br>
    <div class ="row">
    <div class="col-md-4"> 
      <div class="form-group">
        <input type="text" style="pointer-events: none;" id="total_amount_bank_counter" class="form-control{{ $errors->has('total_amount_bank') ? ' is-invalid' : '' }}" name="total_amount_bank_counter" >
        <label class="form-control-placeholder" for="total_amount_bank">Total Outstanding Amount Due({{$claimantinformations[0]->currency}}):</label>
        @if ($errors->has('total_amount_bank'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('total_amount_bank') }}</stron
            g>
        </span>
        @endif
      </div>
    </div>
  </div>
 </div>
</div>
       <div class="modal-footer">
  <div class="mx-auto">
    <button type="submit" class="btn btn-success btn-space" id="bankclaimsavefunctionality_counter" >Save and Next</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>
</form>
<script type="text/javascript">
  function selectsecurity_counter()
  {

    var mortgage_hide = document.getElementById("mortgage_hide");
    var guarntee_hide = document.getElementById("guarntee_hide");
    var other_hide = document.getElementById("other_hide");
    var hypo_hide = document.getElementById("hypo_hide");
//alert (document.getElementById("security_type_counter").value);
    
    if(document.getElementById("security_type_counter").value=='mortgage')
    {
     mortgage_hide.style.display = "block";
     guarntee_hide.style.display = "none";
     other_hide.style.display = "none";
      hypo_hide.style.display = "none";
     

}
   else if(document.getElementById("security_type_counter").value=="hypothecation")
   {
    mortgage_hide.style.display = "none";
     guarntee_hide.style.display = "none";
     other_hide.style.display = "none";
      hypo_hide.style.display = "block";

  }
   else if(document.getElementById("security_type_counter").value=="guarntee")
   {
    mortgage_hide.style.display = "none";
     guarntee_hide.style.display = "block";
     other_hide.style.display = "none";
      hypo_hide.style.display = "none";

  }
     else if(document.getElementById("security_type_counter").value=="other")
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
});
</script>

<script type="text/javascript">


    
          $("#date_of_application_bank1").focusout(function(){
                 

           // $('#date_of_dafault').datepicker("destroy");
           // $('#npa_date_bank').datepicker("destroy"); 
           
            setTimeout( function(){ 
     var maxDatenp = $("#date_of_application_bank1").val();
    
     
    $('#date_of_dafault1').datepicker({ dateFormat: 'yy-mm-dd',minDate: maxDatenp,changeMonth: true,
changeYear: true});
  
    $('#npa_date_bank_counter').datepicker({ dateFormat: 'yy-mm-dd',minDate: maxDatenp, changeMonth: true,
changeYear: true });
  }  , 1000 );
      
   
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