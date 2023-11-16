<!-- Create Climant Information Modal-->
<style>
  #frname{
    color: red;
  }
</style> 

<div class="modal fade" id="createrespinformModal" tabindex="-1" role="dialog" aria-labelledby="claiminformationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content"> 

      <div class="modal-header">
        <h5 class="modal-title" id="createrespinformModal">Enter Respondent's Details</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> 
      
      <div class="modal-body"> 
        <form  action="{{ route('respondantinformation.store') }}" method="POST" enctype="multipart/ form-data" autocomplete="off" id="respondantinformationform">
          @csrf  

          <div class="row register-form">
           <div class="col-md-6">
            <div class="form-group">
              <select name="respondant_type" id="respondant_type1" class="form-control" onchange="respondant_type_select1()">
                <option value="">Select Respondent Type:</option>
                @foreach ($respondant_type as $respondant)
                <option value="{{$respondant->id}}">{{$respondant->claimant_respondant_type_name}}</option>  
                @endforeach
              </select>
              <label class="form-control-placeholder" for="respondant_type1">Select Respondent Type<span style="color: red">*</span>:</label>
            </div>
          </div>
         @if(!empty($claimantinformations))
            <input type="hidden" readonly id="claimant_type1" class="form-control{{ $errors->has('claimant_type') ? ' is-invalid' : '' }}"  required="true" value="{{$claimantinformations[0]->dispute_category_Code}}">
          
           @endif
         
          <div class="col-md-6"  id="auth_name_id" style='display:none;'/>    
          <div class="form-group"  >
            <input type="text" id="auth_name" class="form-control{{ $errors->has('auth_name') ? ' is-invalid' : '' }}" name="auth_name"   >
            <label class="form-control-placeholder" for="auth_name" id="auth_name_label" >Authorised Representative's Name<span style="color: red">*</span>:</label>
            @if ($errors->has('auth_name'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('auth_name') }}</strong>
            </span>
            @endif  


          </div>
        </div>
        <div class="col-md-6"  id="auth_designation_id" style='display:none;'/>    
        <div class="form-group"  >
          <input type="text" id="auth_designation" class="form-control{{ $errors->has('auth_designation') ? ' is-invalid' : '' }}" name="auth_designation"   >
          <label class="form-control-placeholder" for="auth_designation" id="auth_designation_label" >Authorised Representative's Designation<span style="color: red">*</span>:</label>
          @if ($errors->has('auth_designation'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('auth_designation') }}</strong>
          </span>
          @endif  


        </div>
      </div>
      <div class="col-md-6"  id="company_name_id" style='display:none;'/>    
      <div class="form-group"  >
        <input type="text" id="company_name" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name"   >
        <label class="form-control-placeholder" for="company_name" id="company_name_label" >Company’s Name<span style="color: red">*</span>:</label>
        @if ($errors->has('company_name'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('company_name') }}</strong>
        </span>
        @endif  


      </div>
    </div>
    <div class="col-md-6"  id="proprietar_name_id" style='display:none;'/>    
    <div class="form-group"  >
      <input type="text" id="proprietar_name" class="form-control{{ $errors->has('proprietar_name') ? ' is-invalid' : '' }}" name="proprietar_name"   >
      <label class="form-control-placeholder" for="proprietar_name" id="proprietar_name_label" >HUF / Proprietary Concern Name<span style="color: red">*</span>:</label>
      @if ($errors->has('proprietar_name'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('proprietar_name') }}</strong>
      </span>
      @endif  


    </div>
  </div>


  <div class="col-md-6"  id="organizationname" style='display:none;'/>    
  <div class="form-group"  >
    <input type="text" id="organization_name" class="form-control{{ $errors->has('organization_name') ? ' is-invalid' : '' }}" name="organization_name"   >
    <label class="form-control-placeholder" for="organization_name" id="org_name_label1" >Name of the Government<span style="color: red">*</span>:
    </label>
    @if ($errors->has('organization_name'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('organization_name') }}</strong>
    </span>
    @endif  


  </div>
</div>

<div class="col-md-6"  id="organizationdetails" style='display:none;'/>     <div class="form-group">
 <input type="text" id="organization_details" name=
 "organization_details" class="form-control{{ $errors->has('organization_details') ? ' is-invalid' : '' }}"   >
 <label class="form-control-placeholder" for="organization_details" id="department_name_label">Name of The Department<span style="color: red">*</span>:</label>
 @if ($errors->has('organization_details'))
 <span class="invalid-feedback" role="alert">
  <strong>{{ $errors->first('organization_details') }}</strong>
</span>
@endif  

</div>
</div>

<div class="col-md-6"  id="firstname1" style='display:none;'/>    
<div class="form-group">
  <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"  name="firstname" id="firstname"   / >
  <label class="form-control-placeholder" for="firstname" id="firstname_label">First Name<span style="color: red">*</span>:</label>
  @if ($errors->has('firstname'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('firstname') }}</strong>
  </span>
  @endif  

</div>
</div>
<div class="col-md-6"  id="middlename1" style='display:none;'/> 
<div class="form-group">
  <input type="text" class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}"  name="middlename" id="middlename"  / >
  <label class="form-control-placeholder" for="middlename" id="middlename_label">Middle Mame:</label>
  @if ($errors->has('middlename'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('middlename') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-6"  id="lastname1" style='display:none;'/>     
<div class="form-group">
  <input type="text" name="lastname" id="lastname"  class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"     / >
  <label class="form-control-placeholder" for="lastname" id="lastname_label">Last Name<span style="color: red">*</span>:</label>
  @if ($errors->has('lastname'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('lastname') }}</strong>
  </span>
  @endif

</div>

</div>
<div class="col-md-6" id="designation1" style='display:none;'/>   
<div class="form-group">
  <input type="text" name="official_designation" id="official_designation"  class="form-control{{ $errors->has('official_designation') ? ' is-invalid' : '' }}"     / >
  <label class="form-control-placeholder" for="official_designation" id="designation_label">Official's Designation<span style="color: red">*</span>:</label>
  @if ($errors->has('official_designation'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('official_designation') }}</strong>
  </span>
  @endif

</div>

</div>


<div class="col-md-6" id="age_field" style='display:none;'/>
<div class="form-group">
 <input type="text" id="agenew" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age"  maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
 <label class="form-control-placeholder" for="age">Age<span style="color: red">*</span>:</label>
 @if ($errors->has('age'))
 <span class="invalid-feedback" role="alert">
  <strong>{{ $errors->first('age') }}</strong>
</span>
@endif
</div>
</div>
<div class="col-md-6">
 <div class="form-group"> 
   <input type="text" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="daytimetelephone1" class="form-control{{ $errors->has('daytimetelephone') ? ' is-invalid' : '' }}" name="daytimetelephone" >
    @if(!empty($claimantinformations))
   @if ($claimantinformations[0]->dispute_category_Code !='B&F')

   <label class="form-control-placeholder" for="daytimetelephone1">Contact Number<span style="color: red">*</span>:</label>

   @else
   <label class="form-control-placeholder" for="daytimetelephone1">Contact Number<span style="color: red"></span>:</label>
   
   @endif
   @endif
   @if ($errors->has('daytimetelephone'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('daytimetelephone') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
   <input type="text" id="email1" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" >
    @if(!empty($claimantinformations))
   @if ($claimantinformations[0]->dispute_category_Code !='B&F')
   <label class="form-control-placeholder" for="email1">Email<span style="color: red">*</span>:</label>

   @else
   <label class="form-control-placeholder" for="email1">Email<span style="color: red"></span>:</label>
   @endif
    @endif
   @if ($errors->has('email'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('email') }}</strong>
  </span>
  @endif
</div>
</div> 
 <div class="col-md-6">
         <div class="form-group">
           <input type="text" id="aadhar_num1" class="form-control{{ $errors->has('aadhar_num') ? ' is-invalid' : '' }}" name="aadhar_num" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
           <label class="form-control-placeholder" for="aadhar_num" >Aadhar Number</label>
           @if ($errors->has('aadhar_num'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('aadhar_num') }}</strong>
          </span>
          @endif
        </div>
      </div>



<div class="col-md-6">
  <div class="form-group">
   <input type="text" id="address1" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" >
   <label class="form-control-placeholder" for="address1">Address<span style="color: red">*</span>:</label>
   @if ($errors->has('address'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('address') }}</strong>
  </span>
  @endif            
</div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <input type="text" id="city1" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" >
    <label class="form-control-placeholder" for="city1">City<span style="color: red">*</span>:</label>
    @if ($errors->has('city'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('city') }}</strong>
    </span>
    @endif
  </div>   
</div>
<div class="col-md-6">
  <div class="form-group">
   <input type="text" id="state1" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" >
   <label class="form-control-placeholder" for="state1">State<span style="color: red">*</span>:</label>
   @if ($errors->has('state'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('state') }}</strong>
  </span>
  @endif   
</div>
</div>
<!-- <div class="col-md-6">
  <div class="form-group">
    <input type="text" id="countrynew" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" >
    <label class="form-control-placeholder" for="country1">Country<span style="color: red">*</span>:</label>
    @if ($errors->has('country'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('country') }}</strong>
    </span>
    @endif
  </div>
</div> -->
<div class="col-md-6" >

<div class="form-group">
  <!-- {!! Form::countries('country', 'select2', 'form-control','country','required =false','') !!} -->
  {!! Form::countries('country', Input::old('country'), 'form-control') !!}
  <!-- {!! $errors->first('country', '<span class="alert-msg" >:message</span>') !!}  -->
  <!-- <input type="text" name="country" id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"  / value="{{old('country')}}" style="display: none;"> -->
  <label class="form-control-placeholder{{ $errors->has('country') ? ' is-invalid' : '' }}" for="country" id="countrynew" name="country" value="{{old('country')}}">Country<span style="color: red">*</span></label> 
 @if ($errors->has('country'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('country') }}</strong>
  </span>
  @endif
</div>
</div>

<div class="col-md-6">
  <div class="form-group">
   <input type="text" id="zipcodenew" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" maxlength="10" >
   <label class="form-control-placeholder" for="zipcode">Postal Code<span style="color: red">*</span>:</label>
   @if ($errors->has('zipcode'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('zipcode') }}</strong>
  </span>
  @endif   
</div>
</div>



</div> 
</div>                   
<div class="modal-footer">
  <div class="mx-auto">
    <button type="button" class="btn btn-success btn-space" onclick="respondantinformationbuttonclick()" id="respondantinformationbutton">Save & Next</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>
</div>          
</form>
</div>
</div>
</div> 
<!-- End Of Climant Information Modal -->
<script type="text/javascript">
 function respondantinformationbuttonclick() 

 { 
   var respondant_type1 = $('#respondant_type1').val();

   if (respondant_type1 =='')

   {
    swal("Select Respondent's Type", "", "error");
    return false;
  }
    // var organization_name = $('#organization_name').val();


    //  if (organization_name =='')

    //   {
    //   swal("Enter Government Name", "", "error");
    //   return false;
    // }


    // var firstname = $('#firstname').val();

    //  if (firstname =='')

    //   {
    //   swal("Enter  Firstname", "", "error");
    //   return false;
    // }
    
     var inputvalue = document.getElementById("claimant_type1").value;

  if( inputvalue !="B&F"){
var daytimetelephone1 = $('#daytimetelephone1').val();

   if (daytimetelephone1 =='')

   {
    swal("Enter Respondent's Contact Number", "", "error");
    return false;
  }
  if(daytimetelephone1.length >=13){
    swal("Enter Valid Mobile Number", "", "error");
    return false;
  }

    var email1 = $('#email1').val();
    emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email1 =='')

    {
      swal("Enter Respondent's Email-ID", "", "error");
      return false;
    }
    if(!emailReg.test(email1) || email1 == '')
    {
     swal("Please Enter a Valid Email Address", "", "error");
     // swal('Please enter a valid email address.');
     return false;
   }
   
}
    // var age = $('#agenew').val();
    // if (age =='')

    // {
    //   swal("Enter Respondent's Age", "", "error");
    //   return false;
    // }
//     var aadhar_num = $('#aadhar_num1').val();
// // alert(aadhar_num);
//      if (aadhar_num =='')

//       {
//       swal("Enter  Aadhar Number", "", "error");
//       return false;
//     }

    var address1 = $('#address1').val();

    if (address1 =='')

    {
      swal("Enter Respondent's Address", "", "error");
      return false;
    }
    var city1 = $('#city1').val();

    if (city1 =='')

    {
      swal("Enter Respondent's City", "", "error");
      return false;
    }
    var state1 = $('#state1').val();

    if (state1 =='')

    {
      swal("Enter Respondent's State", "", "error");
      return false;
    }
    var country1 = $('#country').val();
// alert (country1);
    if (country1 =='')

    {
      swal("Enter Respondent's Country", "", "error");
      return false;
    }
    var zipcode = $('#zipcodenew').val();

    if (zipcode =='')

    {
      swal("Enter Respondent's Postal Code", "", "error");
      return false;
    }
    // var a = /(^\d{6}$)/; 
    // if (!a.test(zipcode))   
    // {  
    //   swal("Enter valid Postal Code", "", "error");
    //   return false; 
    // } 

    

    
    

    var numberofcount =0; 
    $.ajax({
     type:"GET",
     url:"{{url('/getexistingmail')}}?email="+email1,
     success:function(res){ 
      //alert(res.length);

      if (res.length == 0){

        

        $("#respondantinformationbutton").attr("disabled", true);
        document.getElementById('respondantinformationform').submit();
      }

      else
      {
        swal("Email ID already exists in Claimant or Arbitrator", "", "error");
        document.getElementById("email1").value ="";
        return false; 
      }                  
       


    }
  });   
  }
</script>
<script>

 function respondant_type_select1()
 {
  var inputvalue = document.getElementById("respondant_type1").value;


  if( inputvalue==="7"){

    $("#organizationname").hide();
    $("#organizationdetails").hide();
    $("#designation1").hide();
    $("#age_field").hide();
    $("#auth_name_id").hide();
    $("#auth_designation_id").hide();
    $("#firstname1").show();
    $("#middlename1").show();
    $("#lastname1").show();
    $("#company_name_id").hide();
    $("#proprietar_name_id2").hide();
    $('#proprietar_name_label2').html("Branch / Dept. / Code/ etc.<span id='frname'> *</span> :");
    
    $('#firstname_label').html("Company’s Name <span id='frname'> *</span>:");
    $('#middlename_label').html("Official’s Designation <span id='frname'> *</span>:");
    $('#lastname_label').html("Branch / Dept. / Code/ etc.<span id='frname'> *</span>: ");

    
  }
  else if( inputvalue==="10")
  {
   $("#organizationname").hide();
   $("#organizationdetails").hide();
   $("#designation1").hide();
   $("#auth_name_id").hide();
   $("#age_field").hide();
   $("#auth_designation_id").hide();
   $("#firstname1").show();
   $("#middlename1").hide();
   $("#lastname1").show();
   $("#company_name_id").hide();
   $("#proprietar_name_id").hide();
   $('#firstname_label').html("Firm’s Name<span id='frname'> *</span>:");
   // $('#firstname_label').html("Partner’s First Name<span id='frname'> *</span>: ");
   // $('#middlename_label').text("Partner’s Middle Name:");
   $('#lastname_label').html("Official’s Designation<span id='frname'> *</span>: ");

 }
 else if( inputvalue==="9")
 {
   $("#organizationname").hide();
   $("#organizationdetails").hide();
   $("#designation1").hide();
   $("#auth_name_id").hide();
   $("#auth_designation_id").hide();
   $("#firstname1").show();
   $("#age_field").hide();
   $("#middlename1").hide();
   $("#lastname1").show();
   $("#company_name_id").hide();
   // $('#org_name_label1').html("Entity Name<span id='frname'> *</span>:");

   $('#firstname_label').html("Entity Name<span id='frname'> *</span>:");
   // $('#middlename_label').text("Representative’s Middle Name:");
   $('#lastname_label').html("Official’s Designation<span id='frname'> *</span>: ");

 }
 else if( inputvalue==="6")
 {

   $("#organizationname").hide();
   $("#organizationdetails").hide();
   $("#designation1").hide();
   $("#auth_name_id").hide();
   $("#auth_designation_id").hide();
   $("#firstname1").show();
   $("#middlename1").show();
   $("#age_field").hide();
   $("#lastname1").show();
   $("#company_name_id").hide();
   $("#proprietar_name_id").hide();
   // $('#org_name_label1').html("Government’s Name<span id='frname'> *</span>: ");
   // $('#department_name_label').text("Department/Ministry, if any:");
   $('#firstname_label').html("Government’s Name<span id='frname'> *</span>:");
   $('#middlename_label').html("Department/Ministry, if any<span id='frname'> *</span>:");
   $('#lastname_label').html("Official’s Designation <span id='frname'> *</span>:");


 }
 else if( inputvalue==="11")
 {
  $("#organizationname").hide();
  $("#organizationdetails").hide();
  $("#designation1").hide();
  $("#auth_name_id").hide();
  $("#auth_designation_id").hide();
  $("#firstname1").show();
  $("#age_field").show();
  $("#middlename1").show();
  $("#lastname1").show();
  $("#company_name_id").hide();
  $("#proprietar_name_id").hide();
  $('#firstname_label').html("Individual’s First Name<span id='frname'> *</span>:");


  $('#middlename_label').text("Individual’s Middle Name:");
  $('#lastname_label').html("Individual’s Last Name<span id='frname'> *</span>:");;
}
else
{
  $("#organizationname").hide();
  $("#organization_details").hide();
  $("#age_field").hide();
  $("#designation1").hide();
  $("#auth_name_id").hide();
  $("#auth_designation_id").hide();
  $("#firstname1").show();
  $("#middlename1").show();
  $("#lastname1").show();
  $("#company_name_id").hide();
  $("#proprietar_name_id").show();
  // $('#designation_label').html("HUF / Proprietary Concern Name<span id='frname'> *</span>: ");
  $('#firstname_label').html("Proprietor’s /Kartha’s First Name<span id='frname'> *</span>: ");
  $('#middlename_label').html("Proprietor’s /Kartha’s Middle Name:");
  $('#lastname_label').html("Proprietor’s  /Kartha’s Last Name<span id='frname'> *</span>: ");


}


}
</script>
<script type="text/javascript">
  $('#city1').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
  $('#state1').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
  $('#countrynew').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
   $('#firstname1').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
    $('#lastname1').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
    $('#middlename1').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
</script>