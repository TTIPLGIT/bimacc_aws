<div class="row register-form" style="margin-top: 30px;pointer-events: none;">
  <div class="col-md-1"><input class="form-control" placeholder='{{ $loop->iteration}}'  type="text" disabled ></div>
  <div class="col-md-3">
    <div class="form-group">
      <input type="text"  id="respondant_type1" class="form-control{{ $errors->has('respondant_type1') ? ' is-invalid' : '' }}" name="respondant_type1" value="{{$respondant->claimant_respondant_type_name }}">
      <label class="form-control-placeholder" for="respondant_type1">Respondant Type<span style="color: red">*</span></label>
    </div>
  </div>
      <!--  @if ($respondant->claimant_respondant_type_Code =='CA')
        <div class="col-md-4">
        <div class="form-group">
          <input type="text"  id="company_name" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{$respondant->company_name }}">
          <label class="form-control-placeholder" for="company_name">Name of Company:<span style="color: red">*</span></label>
        </div>
      </div>
      @endif -->




      
      @if ($respondant->claimant_respondant_type_Code =='TR')
      <div class="col-md-4" >
        <div class="form-group">
          <input type="text"  id="proprietar_name" class="form-control{{ $errors->has('proprietar_name') ? ' is-invalid' : '' }}" name="proprietar_name" value="{{$respondant->proprietar_name }}">
          <label class="form-control-placeholder" for="proprietar_name">Name of Proprietary Concern:<span style="color: red">*</span></label>
        </div>
      </div>
      @endif
<!-- @if ($respondant->claimant_respondant_type_Code =='GG' || $respondant->claimant_respondant_type_Code =='PA' || $respondant->claimant_respondant_type_Code =='CA') 
 <div class="col-md-4">    
  <div class="form-group"  >
        <input type="text" id="organization_name" class="form-control{{ $errors->has('organization_name') ? ' is-invalid' : '' }}" name="organization_name"  value="{{$respondant->organization_name }}" >
        @if ($respondant->claimant_respondant_type_Code =='GG')
         <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Name of the Government<span style="color: red">*</span></label>
          @elseif ($respondant->claimant_respondant_type_Code =='PA')
          <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Firm Name<span style="color: red">*</span></label>
          @elseif ($respondant->claimant_respondant_type_Code =='CA')
          <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Company Name<span style="color: red">*</span></label>
         
          @endif
          @if ($errors->has('organization_name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('organization_name') }}</strong>
        </span>
        @endif  
       

    </div>
</div>
@else
@endif
@if ($respondant->claimant_respondant_type_Code =='GG')
<div class="col-md-4">     <div class="form-group">
       <input type="text" id="organization_details" name=
       "organization_details" class="form-control{{ $errors->has('organization_details') ? ' is-invalid' : '' }}"  value="{{$respondant->organization_details }}" >
         <label class="form-control-placeholder" for="organization_details" id="department_name_label">Name of The Department<span style="color: red">*</span></label>
        @if ($errors->has('organization_details'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('organization_details') }}</strong>
        </span>
        @endif  
     
   </div>
</div>
<div class="col-md-4">   
  <div class="form-group">
        <input type="text" name="official_designation" id="official_designation" placeholder=" " class="form-control{{ $errors->has('official_designation') ? ' is-invalid' : '' }}"   value="{{$respondant->official_designation }}" >
        <label class="form-control-placeholder" for="official_designation" id="designation_label">Official Designation<span style="color: red">*</span></label>
        @if ($errors->has('official_designation'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('official_designation') }}</strong>
        </span>
        @endif

    </div>

</div>
@else
@endif -->

<div class="col-md-4">    
  <div class="form-group">
    <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"  name="firstname" id="firstname"  value="{{$respondant->firstname }}" >
    @if ($respondant->claimant_respondant_type_Code =='GG')

    <label class="form-control-placeholder" for="firstname">Government’s Name<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='CA')
    <label class="form-control-placeholder" for="firstname">Company’s Name<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='PA')
    <label class="form-control-placeholder" for="firstname">Firm’s Name<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='HU')
    <label class="form-control-placeholder" for="firstname">Entity Name<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='IS')
    <label class="form-control-placeholder" for="firstname">Individual Firstname<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='TR')
    <label class="form-control-placeholder" for="firstname">Proprietor’s /Kartha’s First Name <span style="color: red">*</span>:</label>


    @endif
    @if ($errors->has('firstname'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('firstname') }}</strong>
    </span>
    @endif  

  </div>
</div>
@if ($respondant->claimant_respondant_type_Code !='PA' && $respondant->claimant_respondant_type_Code !='HU')
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}"  name="middlename" id="middlename" value="{{$respondant->middlename }}" >
    @if ($respondant->claimant_respondant_type_Code =='GG')

    <label class="form-control-placeholder" for="middlename">Department/Ministry, if any<span style="color: red">*</span>: </label>
    @elseif ($respondant->claimant_respondant_type_Code =='CA')
    <label class="form-control-placeholder" for="middlename">Official’s Designation<span style="color: red">*</span>:</label>


    @elseif ($respondant->claimant_respondant_type_Code =='IS')
    <label class="form-control-placeholder" for="middlename">Individual Middlename:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='TR')
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
<div class="col-md-4">     
  <div class="form-group">
    <input type="text" name="lastname" id="lastname" placeholder=" " class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"   value="{{$respondant->lastname }}" >
    @if ($respondant->claimant_respondant_type_Code =='GG')

    <label class="form-control-placeholder" for="lastname">Official’s Designation<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='CA')
    <label class="form-control-placeholder" for="lastname">Branch / Dept. / Code/ etc<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='PA')
    <label class="form-control-placeholder" for="lastname">Official’s Designation<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='HU')
    <label class="form-control-placeholder" for="lastname">Official’s Designation<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='IS')
    <label class="form-control-placeholder" for="lastname">Individual Lastname<span style="color: red">*</span>:</label>
    @elseif ($respondant->claimant_respondant_type_Code =='TR')
    <label class="form-control-placeholder" for="lastname">Proprietor’s /Kartha’s Last Name<span style="color: red">*</span>:</label>


    @endif
    @if ($errors->has('lastname'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('lastname') }}</strong>
    </span>
    @endif

  </div>

</div>
@if ($respondant->claimant_respondant_type_Code =='IS')
<div class="col-md-4">
  <div class="form-group">

   <input type="text" id="age_new" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" required value="{{$respondant->age }}">
   <label class="form-control-placeholder" for="state">Age<span style="color: red">*</span>:</label>
   @if ($errors->has('age'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('age') }}</strong>
  </span>
  @endif
</div>
</div>
@endif

<div class="col-md-4">
  <div class="form-group">

   <input type="text" id="email_new" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required value="{{$respondant->email }}">
   <label class="form-control-placeholder" for="state">Email<span style="color: red">*</span></label>
   @if ($errors->has('email'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('email') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-4">
  <div class="form-group">

   <input type="text" id="aadhar_num" class="form-control{{ $errors->has('aadhar_num') ? ' is-invalid' : '' }}" name="aadhar_num" required value="{{$respondant->aadhar_num }}">
   <label class="form-control-placeholder" for="state">Aadhar Number<span style="color: red">*</span></label>
   @if ($errors->has('aadhar_num'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('aadhar_num') }}</strong>
  </span>
  @endif
</div>
</div>



<div class="col-md-4">
  <div class="form-group">
   <input type="text" id="daytimetelephone_new" class="form-control{{ $errors->has('daytimetelephone') ? ' is-invalid' : '' }}" name="daytimetelephone" required  value="{{$respondant->daytimetelephone }}">
   <label class="form-control-placeholder" for="daytimetelephone">Contact Number<span style="color: red">*</span>:</label>
   @if ($errors->has('daytimetelephone'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('daytimetelephone') }}</strong>
  </span>
  @endif
</div>
</div>





<div class="col-md-4">
  <div class="form-group">
   <input type="text" id="address_new" 
   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" 
   name="address" required value="{{$respondant->address }}">
   <label class="form-control-placeholder" for="address">Address<span style="color: red">*</span>:</label>
   @if ($errors->has('address'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('address') }}</strong>
  </span>
  @endif            
</div>
</div><div class="col-md-4">
  <div class="form-group">

    <input type="text" id="city_new" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required value="{{$respondant->city }}">
    <label class="form-control-placeholder" for="state">City<span style="color: red">*</span>:</label>
    @if ($errors->has('city'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('city') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
   <input type="text" id="state_new" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" 
   value="{{$respondant->state }}" name="state" required>
   <label class="form-control-placeholder" for="state">State<span style="color: red">*</span>:</label>
   @if ($errors->has('state'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('state') }}</strong>
  </span>
  @endif   
</div>
</div>
<div class="col-md-4">
  <div class="form-group">

    <input type="text" id="country_new" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" 
    value="{{$respondant->country }}" name="country" required>
    <label class="form-control-placeholder" for="country">Country<span style="color: red">*</span>:</label>
    @if ($errors->has('country'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('country') }}</strong>
    </span>
    @endif
  </div>
</div>







<div class="col-md-4">
  <div class="form-group">
    <input type="text" id="zipcode_new" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" required  value="{{$respondant->zipcode }}">
    <label class="form-control-placeholder" for="zipcode">Postal Code<span style="color: red">*</span>:</label>
    @if ($errors->has('zipcode'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('zipcode') }}</strong>
    </span>
    @endif   
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <input type="text" id="auth_name" class="form-control{{ $errors->has('auth_name') ? ' is-invalid' : '' }}" name="auth_name" required  value="{{$respondant->auth_name }}">
    <label class="form-control-placeholder" for="auth_name">Name of Authorised Representative<span style="color: red">*</span>:</label>
    @if ($errors->has('auth_name'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('auth_name') }}</strong>
    </span>
    @endif   
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <input type="text" id="auth_age" class="form-control{{ $errors->has('auth_age') ? ' is-invalid' : '' }}" name="auth_age" required  value="{{$respondant->auth_age }}">
    <label class="form-control-placeholder" for="auth_age">Age of Authorised Representative<span style="color: red">*</span>:</label>
    @if ($errors->has('auth_age'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('auth_age') }}</strong>
    </span>
    @endif   
  </div>
</div>
</div>

 @foreach ($respondent_details as $key => $respondent_details)

  @if($respondent_details->created_id == $respondant->user_id)
<div class='col-md-4'>
      <div class='form-group'><label class='form-control-placeholder'>Details Document<span style='color: red'>*</span><a href='{{route('getclaimdetailsDocuments',$respondent_details->id) }}''  download>
                {{$respondent_details->document_name}}
  </a></label></div>
</div>

  @endif

 @endforeach

 @foreach ($respondent_amend as $key => $respondent_amend)

  @if($respondent_amend->created_id == $respondant->user_id)
<div class='col-md-4'>
      <div class='form-group'><label class='form-control-placeholder'>Amend  Document<span style='color: red'>*</span><a href='{{route('getclaimdetailsDocuments',$respondent_details->id) }}''  download>
                {{$respondent_amend->document_name}}
  </a></label></div>
</div>

  @endif

 @endforeach


