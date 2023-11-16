<!-- Edit Climant Information Modal respondantinformation -- >
  <!-- Create Climant Information Modal-->

 @foreach ($respondantinformations as $respondantinformation)
  <div class="modal fade" id="editrespondantinformationModal{{$respondantinformation->id}}" tabindex="-1" role="dialog" aria-labelledby="claiminformationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editrespondantinformationModal">Edit Respondent Information</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"> 
          <form  action="{{ route('respondantinformation.update',$respondantinformation->id) }}" method="POST" id="editrespondantinformationModalform{{$respondantinformation->id}}">
            @csrf  
            @method('PUT') 
            <div class="row register-form">

              
                
                   <div class="col-md-6">
        <div class="form-group">
          <input type="text" readonly  class="form-control{{ $errors->has('respondant_type1') ? ' is-invalid' : '' }}" name="respondant_type1" value="{{$respondantinformation->claimant_respondant_type_name }}">
          <label class="form-control-placeholder" for="respondant_type1">Respondant Type<span style="color: red">*</span>:</label>
        </div>
      </div>
       <input type="hidden" readonly id="claimant_type1" class="form-control{{ $errors->has('claimant_type') ? ' is-invalid' : '' }}" required="true" value="{{$claimantinformations[0]->dispute_category_Code}}">
     
@if ($respondantinformation->claimant_respondant_type_Code =='TR')
        <div class="col-md-6" >
        <div class="form-group">
          <input type="text"  id="proprietar_name" class="form-control{{ $errors->has('proprietar_name') ? ' is-invalid' : '' }}" name="proprietar_name" value="{{$respondantinformation->proprietar_name }}">
          <label class="form-control-placeholder" for="proprietar_name">HUF / Proprietary Concern Name:<span style="color: red">*</span></label>
        </div>
      </div>
      @endif

 <div class="col-md-6">    
  <div class="form-group">
        <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"  name="firstname" id="firstname"  value="{{$respondantinformation->firstname }}" >
         @if ($respondantinformation->claimant_respondant_type_Code =='GG')
      
            <label class="form-control-placeholder" for="firstname">Government’s Name<span style="color: red">*</span>:</label>
             @elseif ($respondantinformation->claimant_respondant_type_Code =='CA')
             <label class="form-control-placeholder" for="firstname">Company’s Name<span style="color: red">*</span>:</label>
              @elseif ($respondantinformation->claimant_respondant_type_Code =='PA')
             <label class="form-control-placeholder" for="firstname">Firm’s Name<span style="color: red">*</span>:</label>
              @elseif ($respondantinformation->claimant_respondant_type_Code =='HU')
             <label class="form-control-placeholder" for="firstname">Entity Name<span style="color: red">*</span>:</label>
              @elseif ($respondantinformation->claimant_respondant_type_Code =='IS')
             <label class="form-control-placeholder" for="firstname">Individual Firstname<span style="color: red">*</span>:</label>
             @elseif ($respondantinformation->claimant_respondant_type_Code =='TR')
             <label class="form-control-placeholder" for="firstname">Proprietor’s /Kartha’s First Name <span style="color: red">*</span>:</label>
            
            
        @endif
        @if ($errors->has('firstname'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('firstname') }}</strong>
        </span>
        @endif  
        
    </div>
</div>
@if ($respondantinformation->claimant_respondant_type_Code !='PA' && $respondantinformation->claimant_respondant_type_Code !='HU')
<div class="col-md-6"> 
    <div class="form-group">
        <input type="text" class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}"  name="middlename" id="middlename" value="{{$respondantinformation->middlename }}" >
         @if ($respondantinformation->claimant_respondant_type_Code =='GG')
      
            <label class="form-control-placeholder" for="middlename">Department/Ministry, if any<span style="color: red">*</span>: </label>
             @elseif ($respondantinformation->claimant_respondant_type_Code =='CA')
             <label class="form-control-placeholder" for="middlename">Official’s Designation<span style="color: red">*</span>:</label>
             
              
              @elseif ($respondantinformation->claimant_respondant_type_Code =='IS')
             <label class="form-control-placeholder" for="middlename">Individual Middlename:</label>
             @elseif ($respondantinformation->claimant_respondant_type_Code =='TR')
             <label class="form-control-placeholder" for="middlename">Proprietor’s /Kartha’s Middle Name:</label>
            
            
        @endif
        @if ($errors->has('middlename'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('middlename') }}</strong>
        </span>
        @endif
    </div>
</div>

@endif
<div class="col-md-6">     
  <div class="form-group">
        <input type="text" name="lastname" id="lastname" placeholder=" " class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"   value="{{$respondantinformation->lastname }}" >
     @if ($respondantinformation->claimant_respondant_type_Code =='GG')
      
            <label class="form-control-placeholder" for="lastname">Official’s Designation<span style="color: red">*</span>:</label>
             @elseif ($respondantinformation->claimant_respondant_type_Code =='CA')
             <label class="form-control-placeholder" for="lastname">Branch / Dept. / Code/ etc<span style="color: red">*</span>:</label>
              @elseif ($respondantinformation->claimant_respondant_type_Code =='PA')
             <label class="form-control-placeholder" for="lastname">Official’s Designation<span style="color: red">*</span>:</label>
              @elseif ($respondantinformation->claimant_respondant_type_Code =='HU')
             <label class="form-control-placeholder" for="lastname">Official’s Designation<span style="color: red">*</span>:</label>
              @elseif ($respondantinformation->claimant_respondant_type_Code =='IS')
             <label class="form-control-placeholder" for="lastname">Individual Lastname<span style="color: red">*</span>:</label>
             @elseif ($respondantinformation->claimant_respondant_type_Code =='TR')
             <label class="form-control-placeholder" for="lastname">Proprietor’s /Kartha’s Last Name<span style="color: red">*</span>:</label>
            
            
        @endif
        @if ($errors->has('lastname'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('lastname') }}</strong>
        </span>
        @endif

    </div>

</div>
 @if ($respondantinformation->claimant_respondant_type_Code =='IS')
<div class="col-md-6">
              <div class="form-group">

               <input type="text" id="age_new" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" required value="{{$respondantinformation->age }}">
               <label class="form-control-placeholder" for="state">Age<span style="color: red">*</span>:</label>
               @if ($errors->has('age'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('age') }}</strong>
              </span>
              @endif
            </div>
          </div>
          @endif
           <div class="col-md-6">
            <div class="form-group">
             <input type="text" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="daytimetelephone_new" class="form-control{{ $errors->has('daytimetelephone') ? ' is-invalid' : '' }}" name="daytimetelephone" required  value="{{$respondantinformation->daytimetelephone }}" maxlength="13">
              @if ($claimantinformations[0]->dispute_category_Code !='B&F')
   <label class="form-control-placeholder" for="daytimetelephone1">Contact Number<span style="color: red">*</span>:</label>

   @else
   <label class="form-control-placeholder" for="daytimetelephone1">Contact Number<span style="color: red"></span>:</label>
   
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

               <input type="text" id="email_new" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required value="{{$respondantinformation->email }}">
               @if ($claimantinformations[0]->dispute_category_Code !='B&F')
   <label class="form-control-placeholder" for="email1">Email<span style="color: red">*</span>:</label>
   @else
   <label class="form-control-placeholder" for="email1">Email<span style="color: red"></span>:</label>
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
           <input type="text" id="aadhar_num" class="form-control{{ $errors->has('aadhar_num') ? ' is-invalid' : '' }}" name="aadhar_num" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$respondantinformation->aadhar_num }}">
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
                     <input type="text" id="address_new" 
                     class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" 
                     name="address" required value="{{$respondantinformation->address }}">
                     <label class="form-control-placeholder" for="address">Address<span style="color: red">*</span>:</label>
                     @if ($errors->has('address'))
                     <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @endif            
                  </div>
                </div><div class="col-md-6">
                <div class="form-group">

                  <input type="text" id="city_new" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required value="{{$respondantinformation->city }}" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))">
                  <label class="form-control-placeholder" for="state">City<span style="color: red">*</span>:</label>
                  @if ($errors->has('city'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('city') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
               <div class="col-md-6">
                  <div class="form-group">
                   <input type="text" id="state_new" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))"  
                   value="{{$respondantinformation->state }}" name="state" required>
                   <label class="form-control-placeholder" for="state">State<span style="color: red">*</span>:</label>
                   @if ($errors->has('state'))
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('state') }}</strong>
                  </span>
                  @endif   
                </div>
              </div>
              
              <div class="col-md-6" >
<div class="form-group">

  <!-- {!! Form::countries('country', 'select2', 'form-control','country','required =false','') !!} -->
  {!! Form::countries_edit('country', Input::old('country'), 'form-control') !!}
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
                  <input type="text" id="zipcode_new" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" required  value="{{$respondantinformation->zipcode }}"  maxlength="10" >
                 <label class="form-control-placeholder" for="zipcode">Postal Code<span style="color: red">*</span>:</label>
                 @if ($errors->has('zipcode'))
                 <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('zipcode') }}</strong>
                </span>
                @endif   
              </div>
            </div>
       
    
 
</div> 

<div class="modal-footer">
  <div class="mx-auto">
   <button type="button" class="btn btn-success btn-space" onclick="editrespondantinformationbuttonclick('{{$respondantinformation->id}}')"
   id="editrespondantinformationbutton">Update & Next</button>
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
</div>
    <!-- End Of Climant Information Modal -->
    <script type="text/javascript">
   function editrespondantinformationbuttonclick(id) 

   { 
     
    // var name = $('#name_new').val();
   
    //  if (name =='')
     
    //   {
    
    //   swal("Enter Respondant's Name ", "", "error");
    //   return false;
    // }
    var inputvalue = document.getElementById("claimant_type1").value;
 if( inputvalue !="B&F"){
    var email = $('#email_new').val();
 emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
     if (email =='')
     
      {
      swal("Enter Respondant's Email-ID", "", "error");
      return false;
    }
    if(!emailReg.test(email) || email == '')
   {
     swal("Please Enter a Valid Email Address", "", "error");
     // swal('Please enter a valid email address.');
     return false;
   }
     
    var daytimetelephone = $('#daytimetelephone_new').val();

     if (daytimetelephone =='')
     
      {
      swal("Enter Respondant's Contact Number", "", "error");
      return false;
    }
    if(daytimetelephone.length >=13){
      swal("Enter Valid Mobile Number", "", "error");
      return false;
    }
  }
    var age1 = $('#age_new').val();

     if (age1 =='')
     
      {
      swal("Enter Respondant's Age", "", "error");
      return false;
    }
    var address = $('#address_new').val();

     if (address =='')
     
      {
      swal("Enter Respondant's Address", "", "error");
      return false;
    }
     
    var city = $('#city_new').val();

     if (city =='')
     
      {
      swal("Enter Respondant's City", "", "error");
      return false;
    }
    var state = $('#state_new').val();

     if (state =='')
     
      {
      swal("Enter Respondant's State", "", "error");
      return false;
    }
    var country = $('#country_new').val();

     if (country =='')
     
      {
      swal("Enter Respondant's Country", "", "error");
      return false;
    }
     var zipcode = $('#zipcode_new').val();

     if (zipcode =='')
     
      {
      swal("Enter Respondant's Postal Code", "", "error");
      return false;
    }
// var a = /(^\d{6}$)/; 
//       if (!a.test(zipcode))   
//         {  
//             swal("Enter valid Postal Code", "", "error");
//             return false; 
//         } 
    var respondant_type = $('#respondant_type_new').val();

     if (respondant_type =='')
     
      {
      swal("Select Respondant's Type", "", "error");
      return false;
    }
     
    
    
    
    
   
    $("#editrespondantinformationbutton").attr("disabled", true);
     document.getElementById('editrespondantinformationModalform'+id).submit();
    
   }
 </script>
 <script>

 function respondant_type_select1()
 {
  var inputvalue = document.getElementById("respondant_type1").value;

  if( inputvalue==="7"){

    $("#organizationname").show();
    $("#organizationdetails").hide();
    $("#designation1").hide();

    $("#firstname1").show();
    $("#middlename1").show();
    $("#lastname1").show();
    $("#company_name_id").show();
$("#proprietar_name_id").hide();
    $('#org_name_label1').html("Representative/OL’s Name :<span id='frname'> *</span>");
    
    $('#firstname_label').html("Representative/OL’s First Name: <span id='frname'> *</span>");
    $('#middlename_label').text("Representative/OL’s Middle Name:");
    $('#lastname_label').html("Representative/OL’s Last Name: <span id='frname'> *</span>");

    
  }
  else if( inputvalue==="10")
  {
   $("#organizationname").show();
   $("#organizationdetails").hide();
   $("#designation1").hide();

   $("#firstname1").show();
   $("#middlename1").show();
   $("#lastname1").show();
    $("#company_name_id").hide();
    $("#proprietar_name_id").hide();
   $('#org_name_label1').html("Firm’s Name:<span id='frname'> *</span>");
   $('#firstname_label').html("Partner’s First Name: <span id='frname'> *</span>");
   $('#middlename_label').text("Partner’s Middle Name:");
   $('#lastname_label').html("Partner’s Last Name: <span id='frname'> *</span>");

 }
 else if( inputvalue==="9")
 {
   $("#organizationname").show();
   $("#organizationdetails").hide();
   $("#designation1").hide();

   $("#firstname1").show();
   $("#middlename1").show();
   $("#lastname1").show();
   $("#company_name_id").hide();
   $('#org_name_label1').html("Entity Name:<span id='frname'> *</span>");

   $('#firstname_label').html("Representative’s First Name:<span id='frname'> *</span>");
   $('#middlename_label').text("Representative’s Middle Name:");
   $('#lastname_label').html("Representative’s Last Name:<span id='frname'> *</span>");

 }
 else if( inputvalue==="6")
 {

   $("#organizationname").show();
   $("#organizationdetails").show();
   $("#designation1").show();

   $("#firstname1").show();
   $("#middlename1").show();
   $("#lastname1").show();
   $("#company_name_id").hide();
   $("#proprietar_name_id").hide();
   $('#org_name_label1').html("Government's Name: <span id='frname'> *</span>");
   $('#department_name_label').text("Department Name, if any:");
   $('#firstname_label').html("Official's First Name:<span id='frname'> *</span>");
   $('#middlename_label').text("Official's Middle Name:");
   $('#lastname_label').html("Official's Last Name: <span id='frname'> *</span>");


 }
 else if( inputvalue==="11")
 {
  $("#organizationname").hide();
  $("#organizationdetails").hide();
  $("#designation1").hide();

  $("#firstname1").show();
  $("#middlename1").show();
  $("#lastname1").show();
  $("#company_name_id").hide();
  $("#proprietar_name_id").hide();
  $('#firstname_label').html("Individual’s First Name:<span id='frname'> *</span>");


  $('#middlename_label').text("Individual’s Middle Name:");
  $('#lastname_label').html("Individual’s Last Name:<span id='frname'> *</span>");;
}
else
{
  $("#organizationname").hide();
  $("#organization_details").hide();
  $("#designation1").hide();

  $("#firstname1").show();
  $("#middlename1").show();
  $("#lastname1").show();
  $("#company_name_id").hide();
  $("#proprietar_name_id").show();
  $('#firstname_label').html("Proprietor's  First Name: <span id='frname'> *</span>");
  $('#middlename_label').text("Proprietor's  Middle Name:");
  $('#lastname_label').html("Proprietor's  Last Name: <span id='frname'> *</span>");


}


}
</script>
<script type="text/javascript">
  $(document).ready(function(){
  var array_designation = {!! json_encode($respondantinformation->country) !!}; 
  // alert(array_designation);
// var clean = array_designation.split();
// var string = JSON.stringify(clean);
// var newxcv = string.replace (/["]/g,''); 
//  var ncd = JSON.parse(newxcv);
        $('#country_edit').val(array_designation);
//         $(".js-select5").select2({
//           closeOnSelect : false,
//           placeholder : " Please Select Designation ",
//           allowHtml: true,
//           allowClear: true,
//             tags: true // создает новые опции на лету
           });
</script>
@endforeach  