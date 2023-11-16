@extends('layouts.admin')
@section('content')
<style>
  #frname{
    color: red;
  }

  .tabs a.active {
    color: #fff;
    background: black;
    display: inline-block;

    left: 0px;
    top: 0px;
    z-index: 1;
    border-radius: 50px;
    transition-duration: 0.6s;
    transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    background: #05abe0;
    background: linear-gradient(45deg, #05abe0 0%, #8200f4 100%);
  }
  .tabscroll {
    height: auto !important;
    overflow-y: scroll;
  }
  .razorpay-payment-button
  {
    background-color: #1bcd6b !important;
    padding: 10px;
    border: 1px; 
    color: white;
    border-radius: 10px;
    font-weight: bolder;
  }

</style> 



@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div> 
@endif
<!-- <div  style="height: auto; margin-top: 10px"> -->
  <div class="container con" style="height: auto; margin-top: 10px">

    <div class="row">
      @if($claimantinformations == null)
      <nav class="tabs"  style="width: 100%;">
        <div class="selector"></div>
        <a href="#" data-toggle="tab" class="active" rel="idclaimantinformation" id="tabclaimantinformation"  ><i class="fas fa-info"></i>Claimant Details</a>
        <a href="#respondantinformation" data-toggle="tab" class="disabled" rel="idresponantinformation" id="tabrespondantinformation" ><i class="fas fa-info"></i>Respondent/s Details
        </a>
        <a href="#" class="disabled" rel="idclaiminformation" id="tabclaiminformation" ><i class="fas fa-info"></i>Claim & Relief</a>
        <a href="#" class="disabled" rel="idreliefrequest" id="tabreliefrequest" style="display: none"><i class="fas fa-retweet"></i>Relief Requested</a>
        <a href="#" class="disabled" rel="idfees" id="tabfees" ><i class="fas fa-receipt"></i>Payment</a>
      </nav>
      @else
      <nav class="tabs" disabled="false" style="width: 100%;">
        <div class="selector1"></div>
        <a href="#" class="active" rel="idclaimantinformation" id="tabclaimantinformation" onclick="idclaimantinformation()" ><i class="fas fa-info"></i>Claimant Details</a>
        <a href="#" rel="idresponantinformation" id="tabrespondantinformation" disabled onclick="idresponantinformation()"><i class="fas fa-info"></i>Respondent/s Details</a>
        <a href="#" rel="idclaiminformation" id="tabclaiminformation" disabled onclick="idclaiminformation()"><i class="fas fa-info"></i>Claim & Relief</a>

        <a href="#" rel="idfees" id="tabfees" disabled onclick="idfees()"><i class="fas fa-receipt"></i>Payment</a>

        <a href="#" rel="idreliefrequest" id="tabreliefrequest" disabled onclick="idreliefrequest()" style="display: none"><i class="fas fa-retweet"></i>Relief Requested</a>
      </nav>

      @endif
    </div>
    <div class="tab-slider--container">

      <div id="idclaimantinformation" class="tab-slider--body">
        @if($claimantinformations == null)
        <div style="    text-align: center;
        margin-top: 30px;">
        <h6 style="color:red; display: block;" id="companyid">Power of Attorney/Resolution/Authorisation Letter and ID Proof Mandatory</h6>
        <h6 style="color:red; display: none;" id="individualid"></h6>  
      </div>

      <div class="modal-dialog modal-lg" role="document" style="max-width: 100%">
        <div class="modal-content">
          <div class="modal-body"> 
            <form  action="{{ route('claimantinformation.store') }}" method="POST" name="new_entry" enctype="multipart/form-data" autocomplete="off" id="claimantinformationform">
             {{ csrf_field() }}
             <div class="row register-form">
              @if ($claimanttype[0]->claimant_respondant_type_Code !='BA' && $claimanttype[0]->claimant_respondant_type_Code !='GG')
              <div class="col-md-4">
                <div class="form-group" style="text-align: center;">
                  <input type="radio" name="company_individual" id="company_individual" for="company_individual" onchange="checkRadio()" value="Company" checked> Company
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group" style="text-align: center;">
                  <input type="radio" name="company_individual" id="company_individual1" for="company_individual" onchange="checkRadio()" value="Individual"> Individual
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group" style="text-align: center;">
                </div>
              </div>
              @endif

              <div class="col-md-4">
                <div class="form-group">
                 <select class="form-control" name="dispute_categories_id" id="disputecategory" required="true">
                  <option value="">Select Main Dispute Category</option>
                  @foreach ($dispute_categories as $category)
                  <option value="{{ $category->id }}"> {{$category->category_name}}</option>
                  @endforeach
                </select>
                <label class="form-control-placeholder" for="dispute_categories_id">Main Dispute Category<span style="color: red">*</span></label> 
              </div>
            </div>
            <div class="col-md-4" >
              <div class="form-group">
               <select class="form-control" id ="subcategory" name="dispute_subcategories_id" onchange="subdispute_type_select()" required="true" disabled>
                <option value=""> Select Sub Dispute Category</option>
                @foreach ($dispute_subcategories as $category)
                <option value=""> </option>
                @endforeach
              </select>
              <label class="form-control-placeholder" for="dispute_subcategories_id">Sub Dispute Category<span style="color: red">*</span></label>
            </div>
          </div>
          <div class="col-md-4" id="others">
            <div class="form-group">
              <input type="text"  id="others_id" class="form-control{{ $errors->has('others') ? ' is-invalid' : '' }}" name="others" required="true">
              <label class="form-control-placeholder" for="others" >Others<span style="color: red">*</span></label>
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" readonly id="claimant_type" class="form-control{{ $errors->has('claimant_type') ? ' is-invalid' : '' }}" name="claimant_type" required="true" value="{{$claimanttype[0]->claimant_respondant_type_name}}">
              <label class="form-control-placeholder" for="claimant_type" >Claimant Type<span style="color: red">*</span></label>
            </div>
          </div>

          @if ($claimanttype[0]->claimant_respondant_type_Code !='IS' )
          <div class="col-md-4">
            <div class="form-group">
             <!--  <input type="text" onkeydown="return alphaOnly(event);" id="organization_details" class="form-control{{ $errors->has('organization_details') ? ' is-invalid' : '' }}" name="organization_details" required="true"> -->
             <input type="text"  id="organization_details" class="form-control{{ $errors->has('organization_details') ? ' is-invalid' : '' }}" name="organization_details" required="true">
             <label class="form-control-placeholder" for="organization_details" >Authorised Representative's Name<span style="color: red">*</span></label>
           </div>
         </div>
         <div class="col-md-4">
          <div class="form-group">
            <input type="text"  id="official_designation" class="form-control{{ $errors->has('official_designation') ? ' is-invalid' : '' }}" name="official_designation" required="true">
            <label class="form-control-placeholder" for="official_designation" >Authorised Representative's Designation<span style="color: red">*</span></label>
          </div>
        </div> 
        @endif 
        <div class="col-md-4">
          <div class="form-group">
           <input type="text" id="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" required="true" maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
           <label class="form-control-placeholder" for="age">Age<span style="color: red">*</span></label>
           @if ($errors->has('age'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('age') }}</strong>
          </span>
          @endif
        </div>
      </div>
      @if ($claimanttype[0]->claimant_respondant_type_Code !='BA' && $claimanttype[0]->claimant_respondant_type_Code !='GG')
      <div class="col-md-4" id="company_name_id">
        <div class="form-group">
          <input type="text"  id="company_name" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name">
          <label class="form-control-placeholder" for="company_name" >Company's Name<span style="color: red">*</span></label>
        </div>
      </div>

      @endif
      @if ($claimanttype[0]->claimant_respondant_type_Code =='GG' || $claimanttype[0]->claimant_respondant_type_Code =='PA' || $claimanttype[0]->claimant_respondant_type_Code =='CA')
      <div class="col-md-4" >
        <div class="form-group"  >
          <input type="text"  id="organization_name" class="form-control{{ $errors->has('organization_name') ? ' is-invalid' : '' }}" name="organization_name"  value="{{$claimregister[0]->organization_name}}">
          @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')
          <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Name of the Government<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='PA')
          <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Firm Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='CA')
          <label class="form-control-placeholder" for="organization_name" id="org_name_label" style="display: red">Company Name<span style="color: red">*</span></label>


          @endif
        </div>
      </div>
      @else
      @endif
      @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')
      <div class="col-md-4" >
        <div class="form-group"  >
          <input type="text"  id="govt_name" class="form-control{{ $errors->has('govt_name') ? ' is-invalid' : '' }}" name="govt_name"  value="{{$claimregister[0]->govt_name}}">

          <label class="form-control-placeholder" for="govt_name" id="org_name_label" >Name Of the Department<span style="color: red">*</span></label>

        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <input type="text"  id="dept_name" class="form-control{{ $errors->has('dept_name') ? ' is-invalid' : '' }}" name="dept_name"  value="{{$claimregister[0]->dept_name}}">

          <label class="form-control-placeholder" for="dept_name" id="dept_name" >Officer Designation<span style="color: red">*</span></label>

        </div>
      </div> 
      @else
      @endif

      <div class="col-md-4">
        <div class="form-group">
          <input type="text" readonly id="firstname"  class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" required value="{{$claimregister[0]->firstname}}">
          @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')

          <label class="form-control-placeholder" for="firstname">Official's First Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='CA')
          <label class="form-control-placeholder" for="firstname">Representative/OL's First Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='PA')
          <label class="form-control-placeholder" for="firstname">Partner's First Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='HU')
          <label class="form-control-placeholder" for="firstname">Representative's First Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='IS')
          <label class="form-control-placeholder" for="firstname" id='individual_fname'>Individual's First Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='TR')
          <label class="form-control-placeholder" for="firstname">proprietor's First Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='BA')
          <label class="form-control-placeholder" for="firstname">Bank Name<span style="color: red">*</span></label>


          @endif
        </div>
      </div>
      @if ($claimanttype[0]->claimant_respondant_type_Code !='BA')
      <div class="col-md-4">
        <div class="form-group">
          <input type="text" readonly id="middlename"  class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}" name="middlename" required value="{{$claimregister[0]->middlename}}">
          @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')

          <label class="form-control-placeholder" for="middlename">Official's Middle Name</label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='CA')
          <label class="form-control-placeholder" for="middlename">Representative/OL's Middle Name</label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='PA')
          <label class="form-control-placeholder" for="middlename">Partner's Middle Name</label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='HU')
          <label class="form-control-placeholder" for="middlename">Representative's Middle Name</label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='IS')
          <label class="form-control-placeholder" for="middlename" id='individual_mname'>Individual's Middle Name</label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='TR')
          <label class="form-control-placeholder" for="middlename">proprietor's Middle Name</label>


          @endif
        </div>
      </div>
      @endif

      <div class="col-md-4">
        <div class="form-group">
          <input type="text" readonly id="lastname"  class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" required value="{{$claimregister[0]->lastname}}">
          @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')

          <label class="form-control-placeholder" for="lastname">Official's Last Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='CA')
          <label class="form-control-placeholder" for="lastname">Representative/OL's Last Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='PA')
          <label class="form-control-placeholder" for="lastname">Partner's Last Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='HU')
          <label class="form-control-placeholder" for="lastname">Representative's Last Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='IS')
          <label class="form-control-placeholder" for="lastname" id='individual_lname'>Individual's Last Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='TR')
          <label class="form-control-placeholder" for="lastname">proprietor's Last Name<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='BA')
          <label class="form-control-placeholder" for="lastname">Bank Branch Name<span style="color: red">*</span></label>


          @endif
        </div>
      </div>
      @if ($claimanttype[0]->claimant_respondant_type_Code =='BA')
      <div class="col-md-4" >
        <div class="form-group"  >
          <input type="text" readonly id="dept_name" class="form-control{{ $errors->has('dept_name') ? ' is-invalid' : '' }}" name="dept_name"  value="{{$claimregister[0]->dept_name}}">

          <label class="form-control-placeholder" for="dept_name" id="dept_name" >Branch / Dept. Code<span style="color: red">*</span></label>

        </div>
      </div> 
      @else
      @endif

      <div class="col-md-4">
       <div class="form-group">
         <input type="text" readonly id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required="true" value="{{$claimregister[0]->email}}">
         <label class="form-control-placeholder" for="email" >Email<span style="color: red">*</span></label>
         @if ($errors->has('email'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4">
     <div class="form-group">
       <input type="text" readonly id="aadhar_num" class="form-control{{ $errors->has('aadhar_num') ? ' is-invalid' : '' }}" name="aadhar_num" required="true" value="{{$claimregister[0]->aadhar_num}}">
       <label class="form-control-placeholder" for="aadhar_num" >Aadhar Number</label>
       @if ($errors->has('aadhar_num'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('aadhar_num') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
     <input type="text" readonly id="daytimetelephone" class="form-control{{ $errors->has('daytimetelephone') ? ' is-invalid' : '' }}" name="daytimetelephone"  maxlength="12" required="true" value="{{$claimregister[0]->phone}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
     <label class="form-control-placeholder" for="daytimetelephone">Contact Number<span style="color: red">*</span></label>
     @if ($errors->has('daytimetelephone'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('daytimetelephone') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
   <input type="text" id="address" readonly class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required="true" value="{{$claimregister[0]->address}}">
   <label class="form-control-placeholder" for="address">Address<span style="color: red">*</span></label>
   @if ($errors->has('address'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('address') }}</strong>
  </span>
  @endif            
</div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <input type="text" id="city" readonly class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required="true" value="{{$claimregister[0]->city}}">
    <label class="form-control-placeholder" for="city">City<span style="color: red">*</span></label>
    @if ($errors->has('city'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('city') }}</strong>
    </span>
    @endif
  </div>      
</div>
<div class="col-md-4">
  <div class="form-group">
   <input type="text" id="state" readonly class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" required="true" value="{{$claimregister[0]->state}}">
   <label class="form-control-placeholder" for="state">State<span style="color: red">*</span></label>
   @if ($errors->has('state'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('state') }}</strong>
  </span>
  @endif   
</div>
</div>
<div class="col-md-4">
  <div class="form-group">
   <input type="text" id="country" readonly class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" required="true" value="{{$claimregister[0]->country}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
   <label class="form-control-placeholder" for="country">Country<span style="color: red">*</span></label>
   @if ($errors->has('country'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('country') }}</strong>
  </span>
  @endif   
</div>
</div>

<div class="col-md-4">
  <div class="form-group">
   <!-- <input type="text" id="zipcode" readonly class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" required="true" value="{{$claimregister[0]->zipcode}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> -->
   <input type="text" id="zipcode" readonly class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" required="true" value="{{$claimregister[0]->zipcode}}">
   <label class="form-control-placeholder" for="zipcode">Postal Code<span style="color: red">*</span></label>
   @if ($errors->has('zipcode'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('zipcode') }}</strong>
  </span>
  @endif   
</div>
</div>





<!-- </div> -->
<div class="col-md-4">
  <div class="form-group">
   <select class="form-control" name="currency" id="currency" required>
    <option value="">Select Currency</option>                
    <option value="INR">INR</option>
    <option value="USD">USD</option>                
  </select>
  <label class="form-control-placeholder" for="currency">Select Currency<span style="color: red">*</span></label> 
</div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <h7></h7>
    <input type="file" id="fileupload" onchange="ValidateSize(this)" 
    class="form-control{{ $errors->has('fileupload') ? ' is-invalid' : '' }}"
    name="fileupload" >
    <label class="form-control-placeholder" for="fileupload" id="fileupload_label">Upload Authorisation Document<span style="color: red">*</span></label>
    @if ($errors->has('fileupload'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('fileupload') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <h7></h7>
    <input type="file" id="fileidproof" 
    class="form-control{{ $errors->has('fileidproof') ? ' is-invalid' : '' }}"
    name="fileidproof">
    <label class="form-control-placeholder" for="fileidproof" id="fileidproof_label">Upload ID Proof<span style="color: red">*</span></label>
  </div>
</div>


</div> 
</div>                   
<div class="modal-footer">
  <div class="mx-auto">
    <button type="button" class="btn btn-success btn-space" id="claimantinformationbutton" onclick="Claimantinformationbuttonclick()">Save and Next</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <a class="btn btn-danger btn-space" href="{{ route('claimnotice.index') }}">Cancel</a>
  </div> 
</div>
</div>          
</form>

@else
<div class="col-lg-12">
 <div class="card shadow mb-4">
  <div class="card-body">
    <div class="row">
     <div class="col-lg-12 margin-tb">                    
      <div class="pull-right">

      </div>

    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0">
     <thead class="theadalign">
      <tr>
        <th>Sl. No.</th>
        <th>Name & Address</th>
        @if ($claimanttype[0]->claimant_respondant_type_Code =='BA')
        <th>Authorised Representative's Name</th>
        @endif
        <th>Age</th>
        <th>Contact</th>
        <!-- <th>Email </th> -->
        <th>Main Dispute Category</th>
        <th>Sub Dispute Category</th>
        <th width="230px">Edit</th>                   
      </tr>
    </thead>
    <tbody>
      @foreach ($claimantinformations as $claimantinformation)
      <tr style="text-align: center;">
        <td>{{ $loop->iteration}}</td>
        <td>{{ $claimantinformation->firstname }} & {{ $claimantinformation->address}}</td>
        @if ($claimanttype[0]->claimant_respondant_type_Code =='BA')
        <td>{{ $claimantinformation->organization_details }}</td>
        @endif
        <td>{{ $claimantinformation->age }}</td>
        <td>{{ $claimantinformation->daytimetelephone }}</td>
        <!-- <td>{{ $claimantinformation->email }}</td> -->
        <td>{{ $claimantinformation->category_name }}</td>
        <td>{{ $claimantinformation->subcategory_name }}</td>
        <td>
          <form action="{{ route('claimantinformation.destroy',$claimantinformation->id) }}" method="POST">
            <a class="btn btn-primary" data-toggle="modal" data-target="#editclaimantinformationModal">Edit</a>
          </form>
        </td>
      </tr>  
      @endforeach              
    </tbody>
  </table>



  @include('modals/editClaimInformModal')
</div>
@endif
</div>
</div>
</div>
</div>
<div class="tab-slider--container">
  <div id="idresponantinformation" class="tab-slider--body">
    <div class="col-lg-12">
     <div class="card shadow mb-4 tabscroll">
      <div class="card-body">
        <div class="row">
         <div class="col-lg-12 margin-tb">  

           <div class="pull-right">
            <a class="btn btn-success float-right" title="create"  data-toggle="modal" data-target="#createrespinformModal" >Add Respondent</a>
          </div>

        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered"  width="100%" cellspacing="0">
         <thead class="theadalign">
          <tr>
            <th>Sl. No.</th>
            <th>Name</th>
            <th>Particulars</th>
            
            <th>Respondent Type</th>
            <th>Respondent Contact</th>
            <th>Respondent Email </th>
            <th width="230px">Action</th>                   
          </tr>
        </thead>
        <tbody>
          @foreach ($respondantinformations as $respondantinformation)
          <tr style="text-align: center;">
            <td>{{ $loop->iteration}}</td>
            @if ($respondantinformation->claimant_respondant_type_Code =='GG')

            <td>{{ $respondantinformation->firstname }}</td>
            <td>{{ $respondantinformation->middlename }}</td>
            @endif
            @if ($respondantinformation->claimant_respondant_type_Code =='CA' || $respondantinformation->claimant_respondant_type_Code =='PA')

            <td>{{ $respondantinformation->firstname }}</td>
            <td>{{ $respondantinformation->lastname }}</td>
            @endif
            @if ($respondantinformation->claimant_respondant_type_Code =='HU')

            <td>{{ $respondantinformation->firstname }}</td>
            <td>-</td>
            @endif
            @if ($respondantinformation->claimant_respondant_type_Code =='IS')

            <td>{{ $respondantinformation->firstname }} {{ $respondantinformation->middlename }} {{ $respondantinformation->lastname }}</td>
            <td>-</td>
            @endif
            @if ($respondantinformation->claimant_respondant_type_Code =='TR')
            <td>{{ $respondantinformation->proprietar_name }}</td>
            <td>{{ $respondantinformation->firstname }} {{ $respondantinformation->middlename }} {{ $respondantinformation->lastname }}</td>
            
            @endif
            
            <td>{{ $respondantinformation->claimant_respondant_type_name }}</td>
            <td>{{ $respondantinformation->daytimetelephone }}</td>
            <td>{{ $respondantinformation->email }}</td>
            <td>
              <form action="{{ route('respondantinformation.destroy',$respondantinformation->id) }}" method="POST">
                <a class="btn btn-primary"  data-toggle="modal" data-target="#editrespondantinformationModal{{$respondantinformation->id}}">Edit</a>
                @csrf
                @method('DELETE')
                <!-- <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
              </form>
            </td>
          </tr>  
          @endforeach              
        </tbody>

      </table>
      @if($respondantinformations !=null)
      @include('modals/editrespinformModal')
      @endif
      <div class="tab-content mb30">
        @include('modals/createrespinformModal')
      </div>

      <div>



      </div>

    </div>

  </div>
</div>
</div>
</div>
</div>
<div class="tab-slider--container">
  <div id="idclaiminformation" class="tab-slider--body">
    <div class="col-lg-12">
     <div class="card shadow mb-4 tabscroll">
      <div class="card-body">
        <div class="row">
         <div class="col-lg-12 margin-tb">
          @if($claimandrelief == null && $ReliefRequests == null )
          <div class="pull-right">
            <a class="btn btn-success float-right" title="create" data-toggle="modal" data-target="#idclaiminformationdetails" >Add Claim and Relief</a>
          </div>
          @endif                    
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
         <thead class="theadalign">
          <tr>
            <!-- <th>Sl. No.</th> -->
            <th>Main Dispute Category</th>
            <!-- <th>Contract Date</th> category_name -->
            @if ($claimantinformations != null)
            
            <th>Total Claim Amount({{$claimantinformations[0]->currency}})</th>
            
            @else

            <th>Total Claim Amount</th>
            
            @endif
            <!-- <th>Reasons for the Claim</th> -->
            <th width="230px">Action</th>                   
          </tr>
        </thead>
        <tbody>
          @foreach ($claimandrelief as $claimDetail)
          <tr style="text-align: center;">
            <!-- <td>{{ $loop->iteration}}</td> -->
            <td>{{ $claimDetail->category_name }}</td>
            <!-- <td>{{ $claimDetail->contractdate }}</td> -->
            <td>{{ number_format((float)$claimDetail->damage_with_interest, 2, '.', '') }}</td>
            <!-- <td>{{ $claimDetail->reason_for_claim }}</td>                 -->
            <td>
             <form action="{{ route('claimdetails.destroy',$claimDetail->claimnoticeid) }}" method="POST">
              <a class="btn btn-primary"  data-toggle="modal" data-target="#editClaimantDetailsModal{{$claimDetail->claimnoticeid}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return myFunction();" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>  
        @endforeach              
      </tbody>
    </table>
    @if($claimandrelief != null )
    @include('modals/editClaimantDetailsModal') 
    @endif
    @include('modals/createClaimantDetailsModal') 
  </div>  
  <div>

  </div>    
</div>
</div>
</div>
<div class="tab-slider--container">
  <div id="idreliefrequest" class="tab-slider--body">

  </div>
  <div class="tab-slider--container"> 

   <div id="idfees" class="tab-slider--body">
    @if($ClaimFees ==null)
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body"> 
          <form  action="{{ route('claimfees.store') }}" method="POST" id="feessubmitform">
            @csrf  
         <!--  <form action="{{ route('razorpay.payment.store') }}" method="POST" >
          @csrf --> 


          <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group"> 
               <label>Main Dispute Category</label>              
               @foreach ($claimnoticedisputecategories as $categories)
               <select name="dispute_categories_id" class="form-control"  readonly>
                <option value="{{$categories->dispute_categories_id}}">{{$categories->category_name}}</option>
              </select>                 


            </div>

          </div> 
          <div class="col-md-6">
           <div class="form-group">
            <label >Sub Dispute Category</label>
            <select name="dispute_subcategories_id" class="form-control"  readonly >
              <option value="{{$categories->dispute_subcategories_id}}">{{$categories->subcategory_name}}</option>
            </select>
            @endforeach           

          </div> 
        </div>
        <div class="col-md-6">

          <div class="form-group" >

            @foreach($registrationfees as $registrationfee)
            @if($claimantinformations[0]->currency =='INR')
            @if ($claimantinformations != null)
            
            <label>Registration Fees({{$claimantinformations[0]->currency}})</label>
            
            @else

            <label>Registration Fees<label>

             @endif
             <input type="text" id="registration_fees" class="form-control" name="registration_fees"  value=" {{ number_format((float)$registrationfee->registration_fee, 2, '.', '') }}" readonly >



           </div>

         </div>
         <div class="col-md-6">

          <div class="form-group">

           @if ($claimantinformations != null)

           <label>Platform Fee({{$claimantinformations[0]->currency}})</label>

           @else

           <label>Platform Fee/label>

             @endif

             <input type="text" id="extra_fees" class="form-control" name="extra_fees"  value=" {{ number_format((float)$extra_amt, 2, '.', '') }}" readonly >

             @endif
             @endforeach 
             

             @if ($errors->has('registration_fees'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('registration_fees') }}</strong>
            </span>
            @endif
          </div>

        </div> 
          <div class="col-md-12">
            <div class="form-group"> 
              <textarea  class="form-control{{ $errors->has('claim_amount_purpose') ? ' is-invalid' : '' }}" name="claim_amount_purpose" required id="claim_amount_purpose"></textarea>
              <label class="form-control-placeholder" for="claim_amount_purpose">Nature Of Claim<span style="color: red">*</span></label>
              @if ($errors->has('claim_amount_purpose'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('claim_amount_purpose') }}</strong>
              </span>
              @endif
            </div>

          </div>

           
      </div>  


      @foreach($registrationfees as $registrationfee)
      @if($claimantinformations[0]->currency =='INR')
      @if($claimantinformations != null && $ReliefRequests != null  && $ClaimDetails != null  && $respondantinformations != null )
      <!-- <input type="text" value="{{$total_pay_amt}}"> -->
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; 
      <script src="https://checkout.razorpay.com/v1/checkout.js"
      data-key="rzp_test_1PAtCSSLE3ibfW"
      data-amount="{{ $total_pay_amt }}"
      data-buttontext="Submit & Pay {{ number_format((float)$total_pay_amt_check, 2, '.', '') }}"
      data-name="Online Arbitartion System"
      data-description="EAS"
      data-image="data:image/png;base64,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
      "
      data-prefill.name="name" 
      data-prefill.email="email"
      data-theme.color="#343464">
    </script>
    @endif   
    @endif 
    @endforeach

    <a class="btn btn-danger btn-space" href="{{ route('claimnotice.index') }}">Cancel</a>

  </div>                    


</div>          
</form> 
<div>

</div>

</div>

@else
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered"  width="100%" cellspacing="0">
     <thead class="theadalign">
      <tr>
        <th>Sl. No.</th>
        <th>Main Dispute Category</th>
        <th>Sub Category</th>
        <!-- <th>Claim Amount</th> -->
        <th>Sub Dispute Category</th>                      
        <!-- <th width="230px">Action</th>                    -->
      </tr>
    </thead>   

    <tbody>
      @foreach ($ClaimFees as $ClaimFee)
      <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $ClaimFee->dispute_categories_id }}</td>
        <td>{{ $ClaimFee->dispute_subcategories_id }}</td>
        <!-- <td>{{ $ClaimFee->claim_amount }}</td> -->
        <td>{{ $ClaimFee->claim_amount_purpose }}</td>          

     <!--  <td>
        <form action="{{ route('claimfees.destroy',$ClaimFee->id) }}" method="POST">
          <a class="btn btn-primary" data-toggle="modal" data-target="#editClaimFeeModal{{$ClaimFee->id}}"><i class="fas fa-pencil-alt"></i></a>
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
        </form>             
      </td> -->
    </tr>  
    @endforeach              
  </tbody>
</table>

@if($ClaimFees !=null)
@include('modals/editClaimFeesModal') 
@endif
</div> 
</div>
@endif

</div>  

<div class="text-center">
 <button class="prv btn btn-primary" type="button" >Previous</button>
 <button class="nxt btn btn-primary" type="button">Next</button>

</div>
<script>
  $('#disputecategory').change(function(){  
    var categoryID = $(this).val();     
    if(categoryID){
      $.ajax({
       type:"GET",
       url:"{{url('/get-dispute-list')}}?dispute_categories_id="+categoryID,
       success:function(res){                      
        if(res){
          $("#subcategory").empty();
          $('#subcategory').prop( "disabled", false );  
          $("#subcategory").append('<option value=""> Select Sub Category</option>');
          console.log(res);
          for (var i =0; i < res.length; i++) {

            $("#subcategory").append('<option value="'+res[i].id+'">'+res[i].subcategory_name+'</option>');
          }

          

        }else{
         $("#subcategory").empty();
       }
     }
   });
    }     
  });
  function sortReponse(data)
  {
    var sorted = [];
    $(data).each(function(k, v) {
      for(var key in v) {
        sorted.push({key: key, value: v[key]})
      }
    });

    return sorted.sort(function(a, b){
      if (a.value < b.value) return -1;
      if (a.value > b.value) return 1;
      return 0;
    });
  }
</script>
@if($claimantinformations != null)
<script type="text/javascript">
  var tabs = $('.tabs');
  var selector = $('.tabs').find('a').length;
//var selector = $(".tabs").find(".selector");
var activeItem = tabs.find('.active');
var activeWidth = activeItem.innerWidth();
$(".selector1").css({
  "left": activeItem.position.left + "px", 
  "width": activeWidth + "px"
});

$(".tabs").on("click","a",function(e){
  e.preventDefault();
  $('.tabs a').removeClass("active");
  $(this).addClass('active');
  var activeWidth = $(this).innerWidth();
  var itemPos = $(this).position();
  $(".selector1").css({
    "left":itemPos.left + "px", 
    "width": activeWidth + "px"
  });
});

$('.nxt').on('click', function () {

  moveTab("Next");
});
$('.prv').on('click', function () {

  moveTab("Previous");
});


function moveTab(nextOrPrev) {
   // alert(nextOrPrev);


   var currentTab = "";
   $('.tabs a').each(function () {
    if ($(this).hasClass('active')) {
      currentTab = $(this);
        //alert($(this));
      }
    });



   if (nextOrPrev == "Next") {
       // alert("inside next");

       if (currentTab.next().length) 
       {
          //alert(currentTab.text());
          if(currentTab.text() == "Claimant Details" )
          {
           idresponantinformation();
         }

         if(currentTab.text() == "Respondent/s Details" )
         {
           idclaiminformation();
         }

         if(currentTab.text() == "Claim & Relief" )
         {
           idfees();
         }

          // if(currentTab.text() == "Relief Requested" )
          // {
          //            idclaimantinformation();
          // }

          currentTab.removeClass('active');
          $('.selector1 a').removeClass("active");
          currentTab.next().addClass('active');

        }
        else {} // do nothing for now

      } else {
       // alert("inside previous");

       if (currentTab.prev().length) 
       {

        if(currentTab.text() == "Payment" )
        {
          idclaiminformation();
        }

        if(currentTab.text() == "Claim & Relief" )
        {
         idresponantinformation();
       }

       if(currentTab.text() == "Respondent/s Details" )
       {
         idclaimantinformation();
       }


       currentTab.removeClass('active');
       currentTab.prev().addClass('active');
     }
        else {} //do nothing for now 

      }
  }
</script>
@endif
<script type="text/javascript">
  function checkRadio()
  {
    var companyid = document.getElementById("companyid");
    var individualid = document.getElementById("individualid");
    var company_name = document.getElementById("company_name_id");

    if(document.getElementById("company_individual").checked)
    {
      //alert ("fhgf");
      companyid.style.display = "block";
      individualid.style.display = "none";
      company_name.style.display = "block";
      $('#fileupload_label').html("Upload Authorisation Document <span id='frname'> *</span>");
      $('#fileidproof_label').html("Upload ID Proof <span id='frname'> *</span>");
      $('#individual_fname').html("Representative's First Name <span id='frname'> *</span>");
      $('#individual_mname').html("Representative's Middle Name ");
      $('#individual_lname').html("Representative's Last Name <span id='frname'> *</span>");

    }
    else
    {
    //alert ("fhgf");
    companyid.style.display = "none";
    individualid.style.display = "block";
    company_name.style.display = "none";
    $('#fileupload_label').html("Upload Authorisation Document");
    $('#fileidproof_label').html("Upload ID Proof");
    $('#individual_fname').html("Individual's First Name <span id='frname'> *</span>");
    $('#individual_mname').html("Individual's Middle Name ");
    $('#individual_lname').html("Individual's Last Name <span id='frname'> *</span>");
  }   
}
</script>
<!-- <script type="text/javascript">
  // A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "ready!" );
});
</script> -->
<script type="text/javascript">

  function idclaimantinformation()
  {
    document.getElementById("idclaimantinformation").style.display="block";
    document.getElementById("idresponantinformation").style.display="none";
    document.getElementById("idclaiminformation").style.display="none";
    document.getElementById("idreliefrequest").style.display="none";
    document.getElementById("idfees").style.display="none";
  }
  function idresponantinformation()
  {
    document.getElementById("idclaimantinformation").style.display="none";
    document.getElementById("idresponantinformation").style.display="block";
    document.getElementById("idclaiminformation").style.display="none";
    document.getElementById("idreliefrequest").style.display="none";
    document.getElementById("idfees").style.display="none" ;
  }

  function idclaiminformation()
  {
    document.getElementById("idclaimantinformation").style.display="none";
    document.getElementById("idresponantinformation").style.display="none";
    document.getElementById("idclaiminformation").style.display="block";
    document.getElementById("idreliefrequest").style.display="none";
    document.getElementById("idfees").style.display="none" ;
  }

  function idreliefrequest()
  {
    document.getElementById("idclaimantinformation").style.display="none";
    document.getElementById("idresponantinformation").style.display="none";
    document.getElementById("idclaiminformation").style.display="none";
    document.getElementById("idreliefrequest").style.display="block";
    document.getElementById("idfees").style.display="none" ;
  }

  function idfees()
  {
   document.getElementById("idclaimantinformation").style.display="none";
   document.getElementById("idresponantinformation").style.display="none";
   document.getElementById("idclaiminformation").style.display="none";
   document.getElementById("idreliefrequest").style.display="none";
   document.getElementById("idfees").style.display="block" ;
 }


</script>
<script type="text/javascript">

</script>
<!-- <script>
 var age1=document.getElementById('age').value;
if(age1 === "") {
  return true;
}
age1 = parseInt(age1, 10);
if (isNaN(age1) || age1 < 1 || age1 > 100)
{ 
  alert("The age must be a number between 1 and 100");
  return false;
}
</script> -->
 <!-- <script type="text/javascript">
   function ClaimantInformation()
  {
   //alert("Sample");
   $('#claimantinformationbutton').attr("disabled", true);
    document.getElementById("claimantinformationform").submit();
  }

</script> -->

<!--  <script type="text/javascript">
   function Claimantinformationbuttonclick()
   {
    // $('#claimantinformationbutton]').prop('disabled',true);

  //  var claim_details 

   }
 </script> -->

<!--  <script type="text/javascript">
   $(document).ready(function() {
   $('#dispute_subcategories_id').prop( "disabled", false );  
});
 </script>
-->
<!-- <script type="text/javascript">
  var claimant_type =  $('#claimant_type').val();
     // alert (claimant_type);
     if (claimant_type =='Bank') 
     {
        $('#fileupload_label').html("Upload Authorisation Document <span id='frname'> *</span>");
      $('#fileidproof_label').html("Upload ID Proof <span id='frname'> *</span>");
       return false;
     }
     if (claimant_type =='Government / Government Department') 
     {
        $('#fileupload_label').html("Upload Authorisation Document <span id='frname'> *</span>");
      $('#fileidproof_label').html("Upload ID Proof <span id='frname'> *</span>");
       return false;
     }
      if (claimant_type =='Trust / Society') 
     {
       $('#fileupload_label').html("Upload Authorisation Document <span id='frname'> *</span>");
      $('#fileidproof_label').html("Upload ID Proof <span id='frname'> *</span>");
       return false;
     }
     if (claimant_type =='Partnership / LLP') 
     {
       $('#fileupload_label').html("Upload Authorisation Document <span id='frname'> *</span>");
      $('#fileidproof_label').html("Upload ID Proof <span id='frname'> *</span>");
       return false;
     }
     if (claimant_type =='Limited Liability Company / Official Liquidator') 
     {
       $('#fileupload_label').html("Upload Authorisation Document <span id='frname'> *</span>");
      $('#fileidproof_label').html("Upload ID Proof <span id='frname'> *</span>");
       return false;
     }
   </script> -->

   <script type="text/javascript">
    window.onload = function(){
      var company_individual =  $('#company_individual').prop("checked") ;

      if (company_individual){

        $('#fileupload_label').html("Upload Authorisation Document <span id='frname'> *</span>");
        $('#fileidproof_label').html("Upload ID Proof <span id='frname'> *</span>");
        $('#individual_fname').html("Representative's First Name <span id='frname'> *</span>");
        $('#individual_mname').html("Representative's Middle Name ");
        $('#individual_lname').html("Representative's Last Name <span id='frname'> *</span>");

      }


    };
    window.onload = function(){


      var inputvalue = document.getElementById("subcategory").value;
      if (inputvalue=="")
      {
       $("#others").hide();
     }

   };



   var fileupload_size;
   $('#fileupload').on('change', function() { 
    fileupload_size=this.files[0].size /1024; 
  });
   var fileupload_size2;
   $('#fileidproof').on('change', function() { 
    fileupload_size2=this.files[0].size /1024; 
  });
   function Claimantinformationbuttonclick() {
     // body...

     var inputvalue = document.getElementById("subcategory").value;
     var others =  $('#others_id').val();



     if (inputvalue >= 240 &&  inputvalue <= 255){

      if (others =='') {
       swal("Enter Others", "", "error");
       return false;
     }
   }
   else if (inputvalue == 161){

    if (others =='') {
     swal("Enter Others", "", "error");
     return false;
   }
 }
 else if (inputvalue == 237){

  if (others =='') {
   swal("Enter Others", "", "error");
   return false;
 }
}
else{


}

var disputecategory =  $('#disputecategory').val();
     //alert(disputecategory);
     if (disputecategory =='') {
       swal("Please Select Dispute Category", "", "error");
       return false;
     }

     var disputesubcategory =  $('#subcategory').val();
     if (disputesubcategory =='') 
     {
       swal("Please Select Sub Category", "", "error");
       return false;
     }

     
     var company_name = $('#company_name').val();
     var company_individual =  $('#company_individual').prop("checked") ;
     if (company_name ==''&& company_individual) 
     {

       swal("Enter Company's Name", "", "error");
       return false;
     }

     var name = $('#name').val();

     if (name =='')

     {
      swal("Enter Your Name", "", "error");
      return false;
    }
    var email = $('#email').val();

    if (email =='')

    {
      swal("Enter Your Email ID", "", "error");
      return false;
    }
    var daytimetelephone = $('#daytimetelephone').val();

    if (daytimetelephone =='')

    {
      swal("Enter Your Contact Number", "", "error");
      return false;
    }

    var age = $('#age').val();

    if (age =='')

    {
      swal("Enter Your Age", "", "error");
      return false;
    }
    if (age < 18)

    {
      swal("Claimant's Age should be above 17", "", "error");
      return false;
    }


    if (age > 120)

    {
      swal("Claimant's Age should not be greater than 120", "", "error");
      return false;
    }
    
    var address = $('#address').val();

    if (address =='')

    {
      swal("Enter Your Address", "", "error");
      return false;
    }
    var city = $('#city').val();

    if (city =='')

    {
      swal("Enter Your City", "", "error");
      return false;
    }
    var state = $('#state').val();

    if (state =='')
    {
      swal("Enter Your State", "", "error");
      return false;
    }
    var zipcode = $('#zipcode').val();

    if (zipcode =='')
    {
      swal("Enter Your Postal Code", "", "error");
      return false;
    }
    var country = $('#country').val();

    if (country =='')

    {
      swal("Enter Your Country", "", "error");
      return false;
    }
    var currency =  $('#currency').val();
    if (currency =='') 
    {
     swal("Please Select Currency", "", "error");
     return false;
   }
   
   var fileupload =  $('#fileupload').val();
   var claimant_type =  $('#claimant_type').val();
   if (claimant_type =='Bank' && fileupload =='') 
   {
     swal("Please upload Authorisation Document ", "", "error");
     return false;
   }
   if (claimant_type =='Government / Government Department' && fileupload =='') 
   {
     swal("Please upload Authorisation Document ", "", "error");
     return false;
   }
   if (claimant_type =='Trust / Society' && fileupload =='') 
   {
     swal("Please upload Authorisation Document ", "", "error");
     return false;
   }
   if (claimant_type =='Partnership / LLP' && fileupload =='') 
   {
     swal("Please upload Authorisation Document ", "", "error");
     return false;
   }
   if (claimant_type =='Limited Liability Company / Official Liquidator' && fileupload =='') 
   {
     swal("Please upload Authorisation Document ", "", "error");
     return false;
   }


   var company_name = $('#company_name').val();
   var company_individual =  $('#company_individual').prop("checked") ;
   // alert (company_individual);
   if (fileupload ==''&& company_individual) 
   {

     swal("Please upload Authorisation Document", "", "error");
     return false;
   }
   //alert (fileupload_size); 
   var fileupload1 =  fileupload_size;
   if (fileupload1 >='2048'&& company_individual) 
   {

     swal("File Size Exceed.Please Upload the Maximum File Size of 2MB", "", "error");
     return false;
   }


   var fileidproof =  $('#fileidproof').val();
   if (fileidproof =='') 
   {

     swal("Please upload ID Proof", "", "error");
     return false;
   }
   if (fileidproof ==''&& company_individual) 
   {

     swal("Please upload ID Proof", "", "error");
     return false;
   }
   var fileupload2 =  fileupload_size2;
   if (fileupload2 >='2048'&& company_individual) 
   {

     swal("File Size Exceed.Please Upload the Maximum File Size of 2MB", "", "error");
     return false;
   }



   






   $("#claimantinformationbutton").attr("disabled", true);
   document.getElementById('claimantinformationform').submit();
   
 }

</script>
<script type="text/javascript">

 function subdispute_type_select()
 {

  var inputvalue = document.getElementById("subcategory").value;
  
  if (inputvalue >= 240 &&  inputvalue <= 255){

    $("#others").show();
  }
  else if (inputvalue == 161){

    $("#others").show();
  }
  else if (inputvalue == 237){

    $("#others").show();
  }
  else{
    $("#others").hide();
  }
}
</script>

<script>
  function feesbuttton() {
    var claim_amount_purpose =  $('#claim_amount_purpose').val();
    if (claim_amount_purpose =='') 
    {
     swal("Enter Nature Of Claim ", "", "error");
     return false;
   }
   $("#fees_submit").attr("disabled", true);
   document.getElementById('feessubmitform').submit();
 }
</script>
@if ($claimantinformations != null)
<script type="text/javascript">
  var x1 = 2;
  $('#commercial_btn').on('click', function () {
    var max_fields      = 10; 
    var commercial1       = $("#commercial1");
    

    if(x1 < max_fields){ 
      $(commercial1).append('<div class="row remove_commercial"><div class="col-md-1"><input class="form-control" value='+x1+'  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-5" > <div class="form-group"><input class="form-control"  type="text"  onkeypress="return isNumberKey(event)" name="contract_price[]"/><label class="form-control-placeholder" for="contract_price">Contract Price({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-5" > <div class="form-group"><input class="form-control"   type="text"  onkeypress="return isNumberKey(event)" name="claim_for_refund_lines[]"/><label class="form-control-placeholder" for="claim_for_refund_lines">Claim for Refund({{$claimantinformations[0]->currency}}):</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x1++;
        
      }
      $("#commercial_del").css('display','block');
    });
  $("#commercial_del").on("click", function(e)
  { 
   e.preventDefault(); 
   var div=$(".remove_commercial");
   $('.remove_commercial:last').remove();
   x1--;
   if($(".remove_commercial").length==0){
    $("#commercial_del").css('display','none');
  }
});

</script>

<script type="text/javascript">

  $('#commercial_btn2').on('click', function () {
    var x1_in = $(".contract").last().val();
    var max_fields      = 10; 
    var commercial2       = $("#commercial2");
    

    if(x1_in < max_fields){ 
     x1_in++;
      $(commercial2).append('<div class="row remove_commercial2"><div class="col-md-1"><input class="form-control contract" value='+x1_in+'  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-5" > <div class="form-group"><input class="form-control"  type="text"  onkeypress="return isNumberKey(event)" name="contract_price[]"/><label class="form-control-placeholder" for="contract_price">Contract Price({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-5" > <div class="form-group"><input class="form-control"   type="text"  onkeypress="return isNumberKey(event)" name="claim_for_refund_lines[]"/><label class="form-control-placeholder" for="claim_for_refund_lines">Claim for Refund({{$claimantinformations[0]->currency}}):</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 

        
      }
      $("#commercial_del2").css('display','block');
    });
  $("#commercial_del2").on("click", function(e)
  { 
   e.preventDefault(); 
   var div=$(".remove_commercial2");
   $('.remove_commercial2:last').remove();
   x1_in--;
   if($(".remove_commercial2").length==0){
    $("#commercial_del2").css('display','none');
  }
});

</script>

   <!-- <script type="text/javascript">
     
$('#commercial_btn').on('click', function () {
   var max_fields      = 10; 
  var commercial1       = $("#commercial1");
  
   var x = 0;
    if(x < max_fields){ 
      $(commercial1).append('<div class="row"><div class="col-md-3" > </div><div class="col-md-4" > <div class="form-group"><input class="form-control" placeholder="contract Price" id="cccc" type="text" name="contract_price[]"/></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text" id="cccc" placeholder="Claim for Refund Lines "name="claim_for_refund_lines[]"/></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
     
    }
    $(commercial1).on("click",".remove_field", function(e)
    { 
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
  //    $(wrapper2).on("click",".remove_field", function(e)
  //    { 
  //   e.preventDefault(); $(this).parent('div').remove(); x--;
  // })
  });
</script> -->
<script type="text/javascript">
 var x2 = 2;
 $('#bankrelief_btn').on('click', function () {
   var max_fields      = 10; 
   var mortgaged_prop       = $("#mortgaged");
   
   
   if(x2 < max_fields){ 
      $(mortgaged_prop).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x2+'  type="text" disabled ></div><div class="col-md-5" > <div class="form-group"><input class="form-control"   type="text" name="mortgaged_property[]"/><label class="form-control-placeholder" for="mortgaged_property">Mortgaged Property/ Pledged Property/ Hypothecated property:</label> </div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>');
        x2++; 
        
      }


    });
 $("#mortgaged").on("click",".buttons", function(e)
 { 
  e.preventDefault(); $(this).parent('div').remove(); x2--;
});
</script>
<script type="text/javascript">
  var x3 = 2;
  $('#family_btn2').on('click', function () {
   var max_fields      = 10; 
   var movable       = $("#movable");
   

   if(x3 < max_fields){ 
      $(movable).append('<div class="row remove_family1"><div class="col-md-1"><input class="form-control" value='+x3+'  type="text" disabled style="background-color: antiquewhite;"><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="movable_nature[]"/><label class="form-control-placeholder" for="movable_nature">Nature of Movable property:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="movable_possessor[]"/> <label class="form-control-placeholder" for="movable_possessor">Name of the Possessor:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="movable_owner[]"/><label class="form-control-placeholder" for="movable_owner">Name of the Owner:</label></div></div><div class="col-md-2" ><div class="form-group"> <input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="movable_value[]"/> <label class="form-control-placeholder" for="movable_value">Value of Property({{$claimantinformations[0]->currency}}):</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x3++;
        
      }
      
      $("#family_del1").css('display','block');
    });
  $("#family_del1").on("click", function(e)
  { 
   e.preventDefault(); 
   var div=$(".remove_family1");
   $('.remove_family1:last').remove();
   x3--;
   if($(".remove_family1").length==0){
    $("#family_del1").css('display','none');
  }
});
</script>
<script type="text/javascript">

  $('#family_btn2_edit').on('click', function () {
   var x3_in = $(".family2").last().val();
   var max_fields      = 10; 
   var movable_edit       = $("#movable_edit");
   

   if(x3_in < max_fields){ 
     x3_in++;

      $(movable_edit).append('<div class="row remove_family1_edit"><div class="col-md-1"><input class="form-control family2" value='+x3_in+'  type="text" disabled style="background-color: antiquewhite;"><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="movable_nature[]"/><label class="form-control-placeholder" for="movable_nature">Nature of Movable property:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="movable_possessor[]"/> <label class="form-control-placeholder" for="movable_possessor">Name of the Possessor:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="movable_owner[]"/><label class="form-control-placeholder" for="movable_owner">Name of the Owner:</label></div></div><div class="col-md-2" ><div class="form-group"> <input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="movable_value[]"/> <label class="form-control-placeholder" for="movable_value">Value of Property({{$claimantinformations[0]->currency}}):</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 

      }
      
      $("#family_del1_edit").css('display','block');
    });
  $("#family_del1_edit").on("click", function(e)
  { 
   e.preventDefault(); 
   var div=$(".remove_family1_edit");
   $('.remove_family1_edit:last').remove();
   x3_in--;
   if($(".remove_family1_edit").length==0){
    $("#family_del1_edit").css('display','none');
  }
});
</script>
<script type="text/javascript">
  var x4 = 2;
  $('#family_btn1').on('click', function () {
   var max_fields      = 10; 
   var immovable       = $("#immovable");
   

   if(x4 < max_fields){ 
      $(immovable).append('<div class="row remove_family"><div class="col-md-1"><input class="form-control" value='+x4+'  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="immovable_nature[]"/> <label class="form-control-placeholder" for="immovable_nature">Nature of Immovable Property:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="immovable_possessor[]"/ > <label class="form-control-placeholder" for="immovable_possessor">Name of the Possessor:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="immovable_owner[]"/> <label class="form-control-placeholder" for="immovable_owner">Name of the Property Owner:</label></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="immovable_description[]"/> <label class="form-control-placeholder" for="immovable_description">Description of Property:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="immovable_schedule[]"/><label class="form-control-placeholder" for="immovable_schedule">Schedule and Boundaries:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="immovable_market[]"/><label class="form-control-placeholder" for="immovable_market">Market Value of Property({{$claimantinformations[0]->currency}})</label></div></div>'); //add input box
      
      x4++;
    }
    $("#family_del").css('display','block');
  //    $(wrapper2).on("click",".remove_field", function(e)
  //    { 
  //   e.preventDefault(); $(this).parent('div').remove(); x--;
  // })
});
  $("#family_del").on("click", function(e)
  { 
   e.preventDefault(); 
   var div=$(".remove_family");
   $('.remove_family:last').remove();
   x4--;
   if($(".remove_family").length==0){
    $("#family_del").css('display','none');
  }
});
</script>
<script type="text/javascript">

  $('#family_btn1_edit').on('click', function () {
   var x4_in = $(".family1").last().val();
   var max_fields      = 10; 

   var immovable_edit       = $("#immovable_edit");
   

   if(x4_in < max_fields){ 
    x4_in++;
      $(immovable_edit).append('<div class="row remove_family_edit"><div class="col-md-1"><input class="form-control family1" value='+x4_in+'  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="immovable_nature[]"/> <label class="form-control-placeholder" for="immovable_nature">Nature of Immovable Property:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="immovable_possessor[]"/ > <label class="form-control-placeholder" for="immovable_possessor">Name of the Possessor:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="immovable_owner[]"/> <label class="form-control-placeholder" for="immovable_owner">Name of the Property Owner:</label></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="immovable_description[]"/> <label class="form-control-placeholder" for="immovable_description">Description of Property:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="immovable_schedule[]"/><label class="form-control-placeholder" for="immovable_schedule">Schedule and Boundaries:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="immovable_market[]"/><label class="form-control-placeholder" for="immovable_market">Market Value of Property({{$claimantinformations[0]->currency}})</label></div></div>'); //add input box
      
      
    }
    $("#family_del_edit").css('display','block');
  //    $(wrapper2).on("click",".remove_field", function(e)
  //    { 
  //   e.preventDefault(); $(this).parent('div').remove(); x--;
  // })
});
  $("#family_del_edit").on("click", function(e)
  { 
   e.preventDefault(); 
   var div=$(".remove_family_edit");
   $('.remove_family_edit:last').remove();
   x4_in--;
   if($(".remove_family_edit").length==0){
    $("#family_del_edit").css('display','none');
  }
});
</script>
<script type="text/javascript">
 var x5= 2;
 $('#insurnace_btn1').on('click', function () {
   var max_fields      = 10; 
   var insurance1       = $("#insurance1");
   
   
   if(x5 < max_fields){ 
      $(insurance1).append('<div class="row remove_insurance"><div class="col-md-1"><input class="form-control" value='+x5+'  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-2"> <div class="form-group"><input class="form-control"  type="text"  onkeypress="return isNumberKey(event)" name="policy_no[]"/> <label class="form-control-placeholder" for="policy_no">Policy Number:<span style="color: red">*</span></label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" name="nature_of_cover[]"/><label class="form-control-placeholder" for="nature_of_cover">Nature of Cover:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_insurance[]"/><label class="form-control-placeholder" for="date_insurance">Date:</label></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="policy_value[]"/><label class="form-control-placeholder" for="policy_value">Policy Value({{$claimantinformations[0]->currency}}): </label></div></div><div class="col-md-3" > <div class="form-group"><input class="datechk form-control" type="date"  name="policy_maturity_date[]"/><label class="form-control-placeholder" for="date_of_notice">Policy Maturity Date:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="surrender_value[]"/> <label class="form-control-placeholder" for="surrender_value">Surrender Value({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="claim_nature[]"/><label class="form-control-placeholder" for="claim_nature"> Nature of Claim:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="claim_value_insurance[]"/><label class="form-control-placeholder" for="claim_value_insurance"> Value of Claim({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-4" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_of_claim[]"/><label class="form-control-placeholder" for="date_of_claim">Date of Claim:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_of_notice_insurance[]"/><label class="form-control-placeholder" for="date_of_notice">Date of Notice:</label></div></div><div class="col-md-4" ><div class="form-group"><input class="datechk form-control" type="date" name="date_of_breach_insurance[]"/><label class="form-control-placeholder" for="date_of_breach">Date of Breach:</label> </div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"  name="claim_amount_insurance[]"/><label class="form-control-placeholder" for="claim_amount_insurance">Claim Amount({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"   name="claim_amount_int[]"/><label class="form-control-placeholder" for="claim_amount_int">Interest:</label></div></div><div class="col-md-4"> <div class="form-group"><input class="form-control" type="text" name="document_no[]"/><label class="form-control-placeholder" for="document_no">Transport/ Warehousing/ Courier Document No: </label></div></div><div class="col-md-2" > <div class="form-group"><input class="datechk form-control"   type="date" name="date_document[]"/><label class="form-control-placeholder" for="date_document">Date:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"  name="freight_charges[]"/><label class="form-control-placeholder" for="freight_charges">Freight Charges({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="demurrage_charges[]"/><label class="form-control-placeholder" for="demurrage_charges">Demurrage Charges({{$claimantinformations[0]->currency}}): </label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="goods_nature[]"/>    <label class="form-control-placeholder" for="goods_nature">Nature of Goods:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="value_of_good[]"/><label class="form-control-placeholder" for="value_of_good"> Value of Goods({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="loss_nature[]"/><label class="form-control-placeholder" for="loss_nature"> Nature of Loss:</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x5++;
        
      }
      $('#insurance1').find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' }); 
      $("#insurance_del").css('display','block');
    }); 
$("#insurance_del").on("click", function(e)
{ 
 e.preventDefault(); 
 var div=$(".remove_insurance");
 $('.remove_insurance:last').remove();
 x5--;
 if($(".remove_insurance").length==0){
  $("#insurance_del").css('display','none');
}
});
</script>
<script type="text/javascript">

  $('#insurnace_btn2').on('click', function () {
   var x5_2 = $(".insurance").last().val();
   var max_fields      = 10; 
   var insurance2       = $("#insurance2");
   
   
   if(x5_2 < max_fields){ 
    x5_2++;
      $(insurance2).append('<div class="row remove_insurance"><div class="col-md-1"><input class="form-control insurance" value='+x5_2+'  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-2"> <div class="form-group"><input class="form-control"  type="text"  onkeypress="return isNumberKey(event)" name="policy_no[]"/> <label class="form-control-placeholder" for="policy_no">Policy Number:<span style="color: red">*</span></label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" name="nature_of_cover[]"/><label class="form-control-placeholder" for="nature_of_cover">Nature of Cover:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_insurance[]"/><label class="form-control-placeholder" for="date_insurance">Date:</label></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="policy_value[]"/><label class="form-control-placeholder" for="policy_value">Policy Value({{$claimantinformations[0]->currency}}): </label></div></div><div class="col-md-3" > <div class="form-group"><input class="datechk form-control" type="date"  name="policy_maturity_date[]"/><label class="form-control-placeholder" for="date_of_notice">Policy Maturity Date:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="surrender_value[]"/> <label class="form-control-placeholder" for="surrender_value">Surrender Value({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="claim_nature[]"/><label class="form-control-placeholder" for="claim_nature"> Nature of Claim:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="claim_value_insurance[]"/><label class="form-control-placeholder" for="claim_value_insurance"> Value of Claim({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-4" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_of_claim[]"/><label class="form-control-placeholder" for="date_of_claim">Date of Claim:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_of_notice_insurance[]"/><label class="form-control-placeholder" for="date_of_notice">Date of Notice:</label></div></div><div class="col-md-4" ><div class="form-group"><input class="datechk form-control" type="date" name="date_of_breach_insurance[]"/><label class="form-control-placeholder" for="date_of_breach">Date of Breach:</label> </div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"  name="claim_amount_insurance[]"/><label class="form-control-placeholder" for="claim_amount_insurance">Claim Amount({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"   name="claim_amount_int[]"/><label class="form-control-placeholder" for="claim_amount_int">Interest:</label></div></div><div class="col-md-4"> <div class="form-group"><input class="form-control" type="text" name="document_no[]"/><label class="form-control-placeholder" for="document_no">Transport/ Warehousing/ Courier Document No: </label></div></div><div class="col-md-2" > <div class="form-group"><input class="datechk form-control"   type="date" name="date_document[]"/><label class="form-control-placeholder" for="date_document">Date:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"  name="freight_charges[]"/><label class="form-control-placeholder" for="freight_charges">Freight Charges({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="demurrage_charges[]"/><label class="form-control-placeholder" for="demurrage_charges">Demurrage Charges({{$claimantinformations[0]->currency}}): </label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="goods_nature[]"/>    <label class="form-control-placeholder" for="goods_nature">Nature of Goods:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)" name="value_of_good[]"/><label class="form-control-placeholder" for="value_of_good"> Value of Goods({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="loss_nature[]"/><label class="form-control-placeholder" for="loss_nature"> Nature of Loss:</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        
        
      }
      $('#insurance2').find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' }); 
      $("#insurance_del2").css('display','block');
    }); 
$("#insurance_del2").on("click", function(e)
{ 
 e.preventDefault(); 
 var div=$(".remove_insurance");
 $('.remove_insurance:last').remove();
 x5_2--;
 if($(".remove_insurance").length==0){
  $("#insurance_del2").css('display','none');
}
});
</script>
<script type="text/javascript">
 var x6 = 2;
 $('#real_btn1').on('click', function () {

   var max_fields      = 10; 
   var real1       = $("#real1");

   if(x6 < max_fields){ 

      $(real1).append('<div class="row remove_real"><div class="col-md-1"><input class="form-control" value='+x6+'  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-3"> <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="nature_of_contract_real[]"/> <label class="form-control-placeholder" for="nature_of_contract_real">Nature of Contract:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="datechk form-control"   type="date" name="date_of_cintract_real[]"/><label class="form-control-placeholder" for="date_of_cintract_real">Date of Contract</label></div></div><div class="col-md-5" > <div class="form-group"><input class="form-control" type="text"   name="annual_value_real[]"/> <label class="form-control-placeholder" for="annual_value_real">Annual Value of Contract/ Annual Average Rental Value({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-4"> <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="natue_of_immovable_real[]"/><label class="form-control-placeholder" for="natue_of_immovable_real">Nature of Immovable Property: </label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="name_of_possessor_real[]"/><label class="form-control-placeholder" for="name_of_possessor_real">Name of the Possessor:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))"  name="name_of_owner_real[]"/><label class="form-control-placeholder" for="name_of_owner_real">Name of the Property Owner:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="description_real[]"/> <label class="form-control-placeholder" for="description_real">Description of Property:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="schedule_real"/><label class="form-control-placeholder" for="schedule_real[]">Schedule and Boundaries:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"  name="market_value_real[]"/> <label class="form-control-placeholder" for="market_value_real">Market Value of Property({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"  name="mortgage_value[]"/><label class="form-control-placeholder" for="mortgage_value">Mortgage Value({{$claimantinformations[0]->currency}}):  </label></div></div><div class="col-md-5" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_of_breach_real[]"/><label class="form-control-placeholder" for="date_of_breach_real">Date of Breach:  </label></div></div><div class="col-md-5" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_of_notice_real[]"/><label class="form-control-placeholder" for="date_of_notice_real">Date of Notice:  </label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        
        x6++;
      }
      $("#real_del").css('display','block');
      $('#real1').find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });
      
    });

$("#real_del").on("click", function(e)
{ 
 e.preventDefault(); 
 var div=$(".remove_real");
 $('.remove_real:last').remove();
 x6--;
 if($(".remove_real").length==0){
  $("#real_del").css('display','none');
}
});
</script>
<script type="text/javascript">

  $('#real_btn1_edit').on('click', function () {
    var x6_2 = $(".real_estate").last().val();
    var max_fields      = 10; 
    var real1_edit       = $("#real1_edit");

    if(x6_2 < max_fields){ 
      x6_2++;

      $(real1_edit).append('<div class="row remove_real_edit"><div class="col-md-1"><input class="form-control real_estate" value='+x6_2+'  type="text" disabled ><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-3"> <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="nature_of_contract_real[]"/> <label class="form-control-placeholder" for="nature_of_contract_real">Nature of Contract:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="datechk form-control"   type="date" name="date_of_cintract_real[]"/><label class="form-control-placeholder" for="date_of_cintract_real">Date of Contract</label></div></div><div class="col-md-5" > <div class="form-group"><input class="form-control" type="text"   name="annual_value_real[]"/> <label class="form-control-placeholder" for="annual_value_real">Annual Value of Contract/ Annual Average Rental Value({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-4"> <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="natue_of_immovable_real[]"/><label class="form-control-placeholder" for="natue_of_immovable_real">Nature of Immovable Property: </label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control"   type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="name_of_possessor_real[]"/><label class="form-control-placeholder" for="name_of_possessor_real">Name of the Possessor:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))"  name="name_of_owner_real[]"/><label class="form-control-placeholder" for="name_of_owner_real">Name of the Property Owner:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))" name="description_real[]"/> <label class="form-control-placeholder" for="description_real">Description of Property:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="schedule_real"/><label class="form-control-placeholder" for="schedule_real[]">Schedule and Boundaries:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"  name="market_value_real[]"/> <label class="form-control-placeholder" for="market_value_real">Market Value of Property({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  onkeypress="return isNumberKey(event)"  name="mortgage_value[]"/><label class="form-control-placeholder" for="mortgage_value">Mortgage Value({{$claimantinformations[0]->currency}}):  </label></div></div><div class="col-md-5" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_of_breach_real[]"/><label class="form-control-placeholder" for="date_of_breach_real">Date of Breach:  </label></div></div><div class="col-md-5" > <div class="form-group"><input class="datechk form-control" type="date"  name="date_of_notice_real[]"/><label class="form-control-placeholder" for="date_of_notice_real">Date of Notice:  </label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        
        
      }
      $("#real_del_edit").css('display','block');
      $('#real1_edit').find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });
      
    });

$("#real_del_edit").on("click", function(e)
{ 
 e.preventDefault(); 
 var div=$(".remove_real_edit");
 $('.remove_real_edit:last').remove();
 x6--;
 if($(".remove_real_edit").length==0){
  $("#real_del_edit").css('display','none');
}
});
</script>
<script type="text/javascript">
 var x7 = 2;
 $('#media_btn').on('click', function () {
   var max_fields      = 10; 
   var media       = $("#media");


   if(x7 < max_fields){ 
      $(media).append('<div class="row"><div class="col-md-4"></div><div class="col-md-3"></div><div class="col-md-1"><input class="form-control" placeholder='+x7+'  type="text" disabled ></div><div class="col-md-3"> <div class="form-group"><input class="form-control"   type="file" name="fileupload_media[]"/><label class="form-control-placeholder" for="fileupload_media">Document Details:</div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x7++;
      }
      
      
    });
 $("#media").on("click",".buttons", function(e)
 { 
  e.preventDefault(); $(this).parent('div').remove(); x7--;
});
</script>
  <!-- <script type="text/javascript">
   
    $('#real_btn2').on('click', function () {
     var max_fields      = 10; 
     var real2     = $("#real2");
     
     var x = 0;
     if(x < max_fields){ 
      $(real2).append('<div class="row"><div class="col-md-4"> <div class="form-group"><input class="form-control" placeholder="Nature of Immovable Property "  type="text" name="natue_of_immovable_real[]"/></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" placeholder="Name of the Possessor"  type="text" name="name_of_possessor_real[]"/></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text" placeholder="Name of the Property Owner" name="name_of_owner_real[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Description of Property" name="description_real[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Schedule and boundaries " name="schedule_real"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Market Value of Property" name="market_value_real[]"/></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control" type="text" placeholder="Mortgage Value  " name="mortgage_value[]"/></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); 
      
      //add input box  // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
      
    }
    $(real2).on("click",".buttons", function(e)
    { 
      e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    
  });
</script> -->
<script type="text/javascript">
 var x8 = 2;
 $('#bankclaim_btn1').on('click', function () {
   var max_fields      = 10; 
   var bankclaim1       = $("#bankclaim1");
   
   
   if(x8 < max_fields){ 
      $(bankclaim1).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x8+'  type="text" disabled ></div><div class="col-md-2"> <div class="form-group"><input class="form-control"   type="text" name="description_mort_bank[]"/><label class="form-control-placeholder" for="description_mort_bank">Description of Property:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control"  type="text" name="value_mort_bank[]"/><label class="form-control-placeholder" for="value_mort_bank">Value:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" name="schedule_mort_bank[]"/><label class="form-control-placeholder" for="schedule_mort_bank">Schedule and Boundaries:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date"  name="date_mort_bank[]"/> <label class="form-control-placeholder" for="date_mort_bank">Date of Mortgage/ LEDTD:</label></div></div><div class="col-md-3"> <div class="form-group"><input class="form-control"   type="text" name="mortgage_mortgagor[]"/><label class="form-control-placeholder" for="mortgage_mortgagor">Name of the Mortgagaor:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control"   type="text" name="mortgage_company[]"/><label class="form-control-placeholder" for="mortgage_company">Company/ Individual:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"name="mortgage_property[]"/> <label class="form-control-placeholder" for="mortgage_property">Name & Description of Property:</label> </div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date"  name="mortgage_schedule[]"/><label class="form-control-placeholder" for="mortgage_schedule">Schedule and Boundaries Date of Mortgage:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x8++;
        
      }

      
    });
 $("#bankclaim1").on("click",".buttons", function(e)
 { 
  e.preventDefault(); $(this).parent('div').remove(); x8--;
});
</script>
<script type="text/javascript">
 var x9 = 2;
 $('#bankclaim_btn2').on('click', function () {
   var max_fields      = 10; 
   var bankclaim2       = $("#bankclaim2");


   if(x9 < max_fields){ 
      $(bankclaim2).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x9+'  type="text" disabled ></div><div class="col-md-3"> <div class="form-group"><input class="form-control"   type="text" name="description_hypo_bank[]"/> <label class="form-control-placeholder" for="description_hypo_bank">Description of Property:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control"   type="text" name="value_hypo_bank[]"/><label class="form-control-placeholder" for="value_hypo_bank">Value:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text" name="location_hypo[]"/><label class="form-control-placeholder" for="location_hypo">Location:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"name="vehicle_hypo_bank[]"/>  <label class="form-control-placeholder" for="vehicle_hypo_bank">Vehicle Engine Number:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text" name="chassis_hypo_bank[]"/> <label class="form-control-placeholder" for="chassis_hypo_bank">Chassis Number:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date" name="date_hypo_bank[]"/><label class="form-control-placeholder" for="date_hypo_bank">Date of Hypothecation:</label> </div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x9++;
      }

      
    });
 $("#bankclaim2").on("click",".buttons", function(e)
 { 
  e.preventDefault(); $(this).parent('div').remove(); x9--;
});
</script>
<script type="text/javascript">
 var x10 = 2;
 $('#bankclaim_btn3').on('click', function () {
   var max_fields      = 10; 
   var bankclaim3       = $("#bankclaim3");


   if(x10 < max_fields){ 
      $(bankclaim3).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x10+'  type="text" disabled ></div><div class="col-md-2"> <div class="form-group"><input class="form-control"   type="text" name="pledge_nature[]"/> <label class="form-control-placeholder" for="pledge_nature">Pledge Nature:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control"   type="date" name="pledge_date[]"/><label class="form-control-placeholder" for="date_mort_bank">Pledge Date:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date" name="pledge_date_maturity[]"/><label class="form-control-placeholder" for="pledge_date_maturity">Date of Maturity:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="pledge_value[]"/> <label class="form-control-placeholder" for="pledge_value">Pledge Value:</label> </div></div><div class="col-md-3"> <div class="form-group"><input class="form-control"  type="text" name="pledgor_name[]"/> <label class="form-control-placeholder" for="pledgor_name">Name of the Pledgor:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" placeholder="Company/Individual"  type="date" name="pledgor_dob[]"/><label class="form-control-placeholder" for="pledgor_dob">Date of Birth:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" name="pledgor_father[]"/>  <label class="form-control-placeholder" for="pledgor_father">Father/ Spouse Name:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="pledgor_address[]"/> <label class="form-control-placeholder" for="pledgor_address">Address:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="pledgor_nature[]"/> <label class="form-control-placeholder" for="pledgor_nature">Nature:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date"  name="pledgor_date[]"/><label class="form-control-placeholder" for="pledgor_date">Date:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date"  name="pledgor_date_maturity[]"/><label class="form-control-placeholder" for="pledgor_dob">Date of Maturity:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control" type="text"  name="pledgor_value[]"/><label class="form-control-placeholder" for="pledgor_value">Value:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x10++;
      }

      
    });
 $("#bankclaim3").on("click",".buttons", function(e)
 { 
  e.preventDefault(); $(this).parent('div').remove(); x10--;
});
</script>

<script type="text/javascript">
 var x11 = 2;
 $('#bankclaim_btn4').on('click', function () {
   var max_fields      = 10; 
   var bankclaim4       = $("#bankclaim4");


   if(x11 < max_fields){ 
      $(bankclaim4).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x11+'  type="text" disabled ></div><div class="col-md-2"> <div class="form-group"><input class="form-control"  type="text" name="personnel_guar_name[]"/> <label class="form-control-placeholder" for="personnel_guar_name">Name of the Guarantor:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control"   type="date" name="personnel_dob[]"/><label class="form-control-placeholder" for="personnel_dob">Date of Birth:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="personnel_father[]"/> <label class="form-control-placeholder" for="personnel_father">Father/ Spouse Name:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="personnel_adddress[]"/><label class="form-control-placeholder" for="personnel_adddress">Address:</label> </div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x11++;
      }

      
    });
 $("#bankclaim4").on("click",".buttons", function(e)
 { 
  e.preventDefault(); $(this).parent('div').remove(); x11--;
});
</script>
<script type="text/javascript">
 var x12 = 2;
 $('#bankclaim_btn5').on('click', function () {
   var max_fields      = 10; 
   var bankclaim5       = $("#bankclaim5");


   if(x12 < max_fields){ 
      $(bankclaim5).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x12+'  type="text" disabled ></div><div class="col-md-2"> <div class="form-group"><input class="form-control"   type="text" name="company_guar_name[]"/><label class="form-control-placeholder" for="company_guar_name">Name of the Company:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control"   type="text" name="compnay_cid[]"/><label class="form-control-placeholder" for="compnay_cid">CID Number:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date"  name="company_date[]"/> <label class="form-control-placeholder" for="company_date">Date of Board of Resolution:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="company_address[]"/> <label class="form-control-placeholder" for="company_address">Registered Address:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x12++;
      }

      
    });
 $("#bankclaim5").on("click",".buttons", function(e)
 { 
  e.preventDefault(); $(this).parent('div').remove(); x12--;
});
</script>

<script type="text/javascript">
 var x13= 2;
 $('#bankclaim_btn6').on('click', function () {
   var max_fields      = 10; 
   var bankclaim6       = $("#bankclaim6");


   if(x13 < max_fields){ 
      $(bankclaim6).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x13+'  type="text" disabled ></div><div class="col-md-2"> <div class="form-group"><input class="form-control" placeholder="Name of the Mortgagaor"  type="text" name="mortgage_mortgagor[]"/></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control" placeholder="Company/Individual"  type="text" name="mortgage_company[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Name & Description of Property" name="mortgage_property[]"/> </div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date" placeholder="Schedule and Boundaries Date of Mortgage" name="mortgage_schedule[]"/> <label class="form-control-placeholder" for="company_date">Schedule and Boundaries Date of Mortgage</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x13++;
      }
      
      
    });
 $("#bankclaim6").on("click",".buttons", function(e)
 { 
  e.preventDefault(); $(this).parent('div').remove();
  x13--;
});
</script>
<script type="text/javascript">
 var x14 = 2;
 $('#bankclaim_btn7').on('click', function () {
   var max_fields      = 10; 
   var bankclaim7       = $("#bankclaim7");


   if(x14 < max_fields){ 
      $(bankclaim7).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x14+'  type="text" disabled ></div><div class="col-md-3"> <div class="form-group"><input class="form-control"   type="text" name="hypo_name[]"/><label class="form-control-placeholder" for="hypo_name">Name of the Hypothecator:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control"   type="date" name="hypo_dob[]"/><label class="form-control-placeholder" for="hypo_dob">Date of Birth:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="hypo_father[]"/><label class="form-control-placeholder" for="hypo_father">Father/ Spouse Name:</label> </div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="hypo_address[]"/><label class="form-control-placeholder" for="hypo_address">Address:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  value" name="hypo_description[]"/><label class="form-control-placeholder" for="hypo_description">Description of Property:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="value_hypo_bank[]"/> <label class="form-control-placeholder" for="value_hypo_bank">Value:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control" type="text" name="hypo_location[]"/><label class="form-control-placeholder" for="hypo_location">Location:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text" name="hypo_vehicle[]"/><label class="form-control-placeholder" for="hypo_vehicle">Vehicle Engine Number:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="hypo_chassis[]"/><label class="form-control-placeholder" for="hypo_chassis">Chassis Number:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" "  type="date" name="hypo_date_hypo[]"/><label class="form-control-placeholder" for="hypo_date_hypo">Date of Hypothecation:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x14++;
      }

      
    });
 $("#bankclaim7").on("click",".buttons", function(e)
 { 
  e.preventDefault(); $(this).parent('div').remove();
  x14--;
});
</script>
  <!-- <script type="text/javascript">
   
    $('#bankclaim_btn8').on('click', function () {
     var max_fields      = 10; 
     var bankclaim8       = $("#bankclaim8");
     
     var x = 0;
     if(x < max_fields){ 
      $(bankclaim8).append('<div class="row"><div class="col-md-3"> <div class="form-group"><input class="form-control" placeholder="Name of the Pledgor"  type="text" name="pledgor_name[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" placeholder="Company/Individual"  type="date" name="pledgor_dob[]"/><label class="form-control-placeholder" for="pledgor_dob">Date of Birth</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Father/Spouse Name" name="pledgor_father[]"/> </div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Address" name="pledgor_address[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Nature" name="pledgor_nature[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date" placeholder="Location" name="Date[]"/><label class="form-control-placeholder" for="pledgor_dob">Date</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date" placeholder="Date of Maturity" name="pledgor_date_maturity[]"/><label class="form-control-placeholder" for="pledgor_dob">Date of Maturity</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control" type="text" placeholder="Value" name="pledgor_value[]"/></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        
      }
      $(bankclaim8).on("click",".buttons", function(e)
      { 
        e.preventDefault(); $(this).parent('div').remove();
        x--;
      })
      
    });
  </script> -->
  <script type="text/javascript">
   var x15 = 2;
   $('#bankclaim_btn9').on('click', function () {
     var max_fields      = 10; 
     var bankclaim9       = $("#bankclaim9");
     
     
     if(x15 < max_fields){ 
      $(bankclaim9).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x15+'  type="text" disabled ></div><div class="col-md-2"> <div class="form-group"><input class="form-control"   type="date" name="pro_date[]"/> <label class="form-control-placeholder" for="pro_date">Pro Note Date:</label></div></div><div class="col-md-4"> <div class="form-group"><input class="form-control"   type="date" name="revival_letter[]"/><label class="form-control-placeholder" for="revival_letter">Revival/ Renewal Letter Date:</label></div></div><div class="col-md-4"> <div class="form-group"><input class="form-control"  type="text" name="document_other[]"/><label class="form-control-placeholder" for="document_other">Document Details:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x15++;
      }

      
    });
   $("#bankclaim9").on("click",".buttons", function(e)
   { 
    e.preventDefault(); $(this).parent('div').remove();
    x15--;
  });
</script>

<script type="text/javascript">
 var x16 = 2;
 $('#mortgage_add').on('click', function () {
   var max_fields = 10; 
   var mortgage       = $("#mortgage");
   var mortgage_hide_id='mortgage_hide'+x16;
   var guarntee_hide_id='guarntee_hide'+x16;
   var other_hide_id='other_hide'+x16;
   var hypo_hide_id='hypo_hide'+x16;

   if(x16 < max_fields){ 
      $(mortgage).append('<div class="row remove_security"><div class="col-md-1"><input class="form-control" value='+x16+'  type="text" disabled style="background-color: aliceblue;"><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-3"> <div class="form-group"><select name="security_type[]" id="security_type_add'+x16+'" class="form-control" onchange="selectsecurity('+x16+')"><option value="">Select Security Type</option><option value="mortgage">Mortgage</option><option value="hypothecation">Hypothecation</option><option value="guarntee">Guarntee Agreement</option><option value="other">Other</option></select></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'> <div class="form-group"><input type="text" id="mortgage_property" class="form-control" name="mortgage_property[]"  ><label class="form-control-placeholder" for="mortgage_property">Description of Property:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="text"  onkeypress="return isNumberKey(event)"   id="mortgage_value_bank" class="form-control" name="mortgage_value_bank[]" ><label class="form-control-placeholder" for="mortgage_value_bank">Value({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="text" id="mortgage_schedule" class="form-control" name="mortgage_schedule[]" ><label class="form-control-placeholder" for="mortgage_schedule">Schedule and Boundaries:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="text" id="mortgage_name" class="form-control" name="mortgage_name[]"  ><label class="form-control-placeholder" for="mortgage_name">Name of the Mortgagaor:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="date"  name="mortgage_date[]"  class="datechk form-control" ><label class="form-control-placeholder" for="mortgage_date">Date of Mortgage/ LEDTD:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'> <div class="form-group"><input type="text" id="hypo_property" class="form-control" name="hypo_property[]"  ><label class="form-control-placeholder" for="hypo_property">Description of Property:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'> <div class="form-group"><input type="text"  onkeypress="return isNumberKey(event)"  id="hypo_value" class="form-control" name="hypo_value[]" ><label class="form-control-placeholder" for="hypo_value">Value({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'><div class="form-group"><input type="text" id="hypo_schedule" class="form-control" name="hypo_schedule[]" ><label class="form-control-placeholder" for="hypo_schedule">Schedule and Boundaries:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'> <div class="form-group"><input type="text" id="hypo_name" class="form-control" name="hypo_name[]" ><label class="form-control-placeholder" for="hypo_name">Hypothecator Name:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'>  <div class="form-group"><input type="date"  name="hypo_date[]"  class="datechk form-control" ><label class="form-control-placeholder" for="hypo_date">Date of Hypothecation:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'>  <div class="form-group"><input type="text" id="hypo_engine" name="hypo_engine[]"  class="form-control" ><label class="form-control-placeholder" for="hypo_engine">Vehicle Engine Number:</label></div></div><div class="col-md-2" style="display: none;" class_attr='+hypo_hide_id+'>  <div class="form-group"><input type="text" id="hypo_chassis" name="hypo_chassis[]"  class="form-control" ><label class="form-control-placeholder" for="hypo_chassis">Chassis Number:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+guarntee_hide_id+'> <div class="form-group"><input type="text" id="guarntee_name" class="form-control" name="guarntee_name[]"  ><label class="form-control-placeholder" for="guarntee_name">Guarantor Name:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+guarntee_hide_id+'> <div class="form-group"><input type="date"  class="datechk form-control" name="guarntor_agreement[]" ><label class="form-control-placeholder" for="guarntor_agreement">Date of Guarantor Agreement:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+other_hide_id+'> <div class="form-group"><input type="text" id="others_details" class="form-control" name="others_details[]" ><label class="form-control-placeholder" for="others_details">Other Details:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+other_hide_id+'> <div class="form-group"><input type="date"  class="datechk form-control" name="others_date[]"  ><label class="form-control-placeholder" for="others_date">Date:</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x16++;
      }
      $("#security_del").css('display','block');
      $('#mortgage').find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });
      
    }); 
$("#security_del").on("click", function(e)
{ 
 e.preventDefault(); 
 var div=$(".remove_security");
 $('.remove_security:last').remove();
 x16--;
 if($(".remove_security").length==0){
  $("#security_del").css('display','none');
}
});
</script>
<script type="text/javascript">
   // var x60 = 2;

   function mortgage_add_edit(id,e){
    var output = 0;
    $(".security"+id).each(
      function(){
        if(this.value > output){
          output = this.value;
        }
      }
      );
    
    var x60 = $(".security"+id).last().val();
    var sno =output ;

    var max_fields = 10; 
    var mortgage_edit = $("#mortgage_edit"+id);
    var mortgage_hide_id='mortgage_hide'+x60;
    var guarntee_hide_id='guarntee_hide'+x60;
    var other_hide_id='other_hide'+x60;
    var hypo_hide_id='hypo_hide'+x60;


    if(x60 < max_fields){ 
     sno++;

      $(mortgage_edit).append('<div class="row"><div class="col-md-1"><input class="form-control security'+id+'" value='+sno+'  type="text" disabled style="background-color: aliceblue;"><label class="form-control-placeholder">Sl. No.</label></div><div class="col-md-3"> <div class="form-group"><select name="security_type_edit[]" id="security_type_add'+x60+'" class="form-control" onchange="selectsecurity('+x60+')"><option value="">Select Security Type</option><option value="mortgage">Mortgage</option><option value="hypothecation">Hypothecation</option><option value="guarntee">Guarntee Agreement</option><option value="other">Other</option></select></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'> <div class="form-group"><input type="text" id="mortgage_property" class="form-control" name="mortgage_property_edit[]"  ><label class="form-control-placeholder" for="mortgage_property">Description of Property:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="text"  onkeypress="return isNumberKey(event)"   id="mortgage_value_bank" class="form-control" name="mortgage_value_bank_edit[]" ><label class="form-control-placeholder" for="mortgage_value_bank">Value({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="text" id="mortgage_schedule" class="form-control" name="mortgage_schedule_edit[]" ><label class="form-control-placeholder" for="mortgage_schedule">Schedule and Boundaries:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="text" id="mortgage_name" class="form-control" name="mortgage_name_add[]"  ><label class="form-control-placeholder" for="mortgage_name">Name of the Mortgagaor:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="date"  name="mortgage_date_add[]"  class="datechk form-control" ><label class="form-control-placeholder" for="mortgage_date">Date of Mortgage/ LEDTD:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'> <div class="form-group"><input type="text" id="hypo_property" class="form-control" name="hypo_property_add[]"  ><label class="form-control-placeholder" for="hypo_property">Description of Property:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'> <div class="form-group"><input type="text"  onkeypress="return isNumberKey(event)"  id="hypo_value" class="form-control" name="hypo_value_add[]" ><label class="form-control-placeholder" for="hypo_value">Value({{$claimantinformations[0]->currency}}):</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'><div class="form-group"><input type="text" id="hypo_schedule" class="form-control" name="hypo_schedule_add[]" ><label class="form-control-placeholder" for="hypo_schedule">Schedule and Boundaries:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'> <div class="form-group"><input type="text" id="hypo_name" class="form-control" name="hypo_name_add[]" ><label class="form-control-placeholder" for="hypo_name">Hypothecator Name:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'>  <div class="form-group"><input type="date"  name="hypo_date_add[]"  class="datechk form-control" ><label class="form-control-placeholder" for="hypo_date">Date of Hypothecation:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'>  <div class="form-group"><input type="text" id="hypo_engine" name="hypo_engine_add[]"  class="form-control" ><label class="form-control-placeholder" for="hypo_engine">Vehicle Engine Number:</label></div></div><div class="col-md-2" style="display: none;" class_attr='+hypo_hide_id+'>  <div class="form-group"><input type="text" id="hypo_chassis" name="hypo_chassis_add[]"  class="form-control" ><label class="form-control-placeholder" for="hypo_chassis">Chassis Number:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+guarntee_hide_id+'> <div class="form-group"><input type="text" id="guarntee_name" class="form-control" name="guarntee_name_edit[]"  ><label class="form-control-placeholder" for="guarntee_name">Guarantor Name:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+guarntee_hide_id+'> <div class="form-group"><input type="date"  class="datechk form-control" name="guarntor_agreement_edit[]" ><label class="form-control-placeholder" for="guarntor_agreement">Date of Guarantor Agreement:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+other_hide_id+'> <div class="form-group"><input type="text" id="others_details" class="form-control" name="others_details_edit[]" ><label class="form-control-placeholder" for="others_details">Other Details:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+other_hide_id+'> <div class="form-group"><input type="date"  class="datechk form-control" name="others_date_edit[]"  ><label class="form-control-placeholder" for="others_date">Date:</label></div></div><div id ="buttons_close_edit" class="buttons" onclick="mortgage_add_remove(this,event)"><span class="btn btn-icon btn-sm btn-danger remove"  > <i class="fas fa-window-close"></i></span></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x60++;
      }

      $('#mortgage_edit'+id).find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });
    }
    function mortgage_add_remove(eve,e)
    {
      e.preventDefault(); 
      $(eve).parent('div').remove();
      x60--;
    }

  </script>
  
  
  <script type="text/javascript">
    var x26 = 2;

    $('#renewal_add').on('click', function () {
     var max_fields      = 10; 
     var renewal       = $("#renewal");
     
     
     if(x26 < max_fields){ 

      $(renewal).append('<div class="row remove_renewal"><div class="col-md-3"></div><div class="col-md-1"><input class="form-control" placeholder='+x26+'  type="text" id="placeholder'+x26+'" disabled style="background-color: antiquewhite;"></div><div class="col-md-4"><div class="form-group"><input type="date" class="datechk form-control" name="renewal_date[]" ><label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x26++;
        
      }
      $("#renewal_del").css('display','block');
      $('#renewal').find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });


    }); 
    $("#renewal_del").on("click", function(e)
    { 
     e.preventDefault(); 
     var div=$(".remove_renewal");
     $('.remove_renewal:last').remove();
     x26--;
     if($(".remove_renewal").length==0){
      $("#renewal_del").css('display','none');
    }
  });
</script>
<script type="text/javascript">

 function renewal_add_edit(id,e){
  var output = 0;
  $(".renewal"+id).each(
    function(){
      if(this.value > output){
        output = this.value;
      }
    }
    );
  var x50 = $(".renewal"+id).last().val();
  var sno = output;
  var max_fields      = 10; 
  var renewal_edit       = $("#renewal_edit"+id);


  if(x50 < max_fields){ 
    sno++;

      $(renewal_edit).append('<div class="row"><div class="col-md-1"><input class="form-control renewal'+id+'"  value="'+sno+'" type="text" disabled style="background-color: aliceblue;"></div><div class="col-md-3"><div class="form-group"><input type="date"  class="datechk form-control" name="renewal_date[]" ><label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label></div></div><div class="buttons" onclick="renewal_add_remove(this,event)"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x50++;
      }

      $('#renewal_edit'+id).find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });
    }
    
    function renewal_add_remove(eve,e)
    {
      e.preventDefault(); 
      $(eve).parent('div').remove();
      x50--;
    }
    
  </script>
  <script type="text/javascript">
   var x27 = 2;
   $('#revival_add').on('click', function () {
     var max_fields      = 10; 
     var revival       = $("#revival");
     
     
     if(x27 < max_fields){ 
      $(revival).append('<div class="row remove_revival"><div class="col-md-3"></div><div class="col-md-1"><input class="form-control" placeholder='+x27+'  type="text" disabled style="background-color: bisque;"></div><div class="col-md-4"><div class="form-group"><input type="date"  class="datechk form-control" name="revival_date[]"><label class="form-control-placeholder" for="revival_date">Revival Letter Date:</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x27++;
      }
      $("#revival_del").css('display','block');
      $('#revival').find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });

    });
   $("#revival_del").on("click", function(e)
   { 
     e.preventDefault(); 
     var div=$(".remove_revival");
     $('.remove_revival:last').remove();
     x27--;
     if($(".remove_revival").length==0){
      $("#revival_del").css('display','none');
    }
  });
</script>
<script type="text/javascript">


  function revival_addedit(id,e){
   var output = 0;
   $(".revival"+id).each(
    function(){
      if(this.value > output){
        output = this.value;
      }
    }
    );
   var x61 = $(".revival"+id).last().val();
   var sno = output;
   var max_fields = 10; 
   var revival_add_add = $("#revival_add_add"+id);


   if(x61 < max_fields){ 
     sno++;
      $(revival_add_add).append('<div class="row"><div class="col-md-1"><input class="form-control revival'+id+'" value="'+sno+'"  type="text" disabled style="background-color: bisque;"></div><div class="col-md-3"><div class="form-group"><input type="date"  class="datechk form-control" name="revival_date[]"><label class="form-control-placeholder" for="revival_date">Revival Letter Date:</label></div></div><div class="buttons" onclick="revival_add_remove(this,event)"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x61++;
      }
      $('#revival_add_add'+id).find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });
    }
    function revival_add_remove(eve,e)
    {
      e.preventDefault(); 
      $(eve).parent('div').remove();
      x61--;
    }
  </script>
  <script type="text/javascript">
   var x28 = 2;
   $('#legal_add').on('click', function () {
     var max_fields      = 10; 
     var legal       = $("#legal");
     
     
     if(x28 < max_fields){ 
      $(legal).append('<div class="row remove_legal"><div class="col-md-3"></div><div class="col-md-1"><input class="form-control" placeholder='+x28+'  type="text" disabled ></div><div class="col-md-4"><div class="form-group"><input type="date"  class="datechk form-control" name="legal_notice[]" ><label class="form-control-placeholder" for="legal_notice">Demand/Legal Notice Date:</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x28++;
      }
      $("#legal_del").css('display','block');
      $('#legal').find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });

      
    });
   $("#legal_del").on("click", function(e)
   { 
     e.preventDefault(); 
     var div=$(".remove_legal");
     $('.remove_legal:last').remove();
     x28--;
     if($(".remove_legal").length==0){
      $("#legal_del").css('display','none');
    }
  });
</script>
<script type="text/javascript">

 function legal_add_edit(id,e){
   var output = 0;
   $(".legal"+id).each(
    function(){
      if(this.value > output){
        output = this.value;
      }
    }
    );
   var x54 = $(".legal"+id).last().val();
   var sno = output;
   var max_fields      = 10; 
   var legal_edit       = $("#legal_edit"+id);



   if(x54 < max_fields){ 
     sno++;
      $(legal_edit).append('<div class="row"><div class="col-md-1"><input class="form-control legal'+id+'" value="'+sno+'"  type="text" disabled></div><div class="col-md-3"><div class="form-group"><input type="date"  class="datechk form-control" name="legal_notice[]" ><label class="form-control-placeholder" for="legal_notice">Demand/Legal Notice Date:</label></div></div><div class="buttons" onclick="legal_add_remove(this,event)"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> '); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x54++;
      }
      $('#legal_edit'+id).find(".datechk").datepicker({ dateFormat: 'yy-mm-dd' });
    }
    function legal_add_remove(eve,e)
    {
      e.preventDefault(); 
      $(eve).parent('div').remove();
      x54--;
    }
  </script>
  <script type="text/javascript">
   var x29 = 2;
   $('#document_add').on('click', function () {
     var max_fields      = 10; 
     var document1      = $("#document1");
     
     
     if(x29 < max_fields){ 
      $(document1).append('<div class="row remove_other"><div class="col-md-3"></div><div class="col-md-1"><input class="form-control" placeholder='+x29+'  type="text" disabled style="background-color: azure;"></div><div class="col-md-4"><div class="form-group"><input type="text" id="other_document" class="form-control" name="other_document[]" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))"><label class="form-control-placeholder" for="other_document">Other Document Details:</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x29++;
      }
      $("#other_del").css('display','block');
      
    });
   $("#other_del").on("click", function(e)
   { 
     e.preventDefault(); 
     var div=$(".remove_other");
     $('.remove_other:last').remove();
     x29--;
     if($(".remove_other").length==0){
      $("#other_del").css('display','none');
    }
  });
</script>
<script type="text/javascript">

  function document_add_edit(id,e){
    var output = 0;
    $(".others"+id).each(
      function(){
        if(this.value > output){
          output = this.value;
        }
      }
      );
    var x55 = $(".others"+id).last().val();
    var sno = output;
    var max_fields      = 10; 
    var document1_edit      = $("#document1_edit"+id);


    if(x55 < max_fields){ 
      sno++;
      $(document1_edit).append('<div class="row"><div class="col-md-1"><input class="form-control others'+id+'" value="'+sno+'"  type="text" disabled style="background-color: azure;"></div><div class="col-md-3"><div class="form-group"><input type="text" id="other_document" class="form-control" name="other_document[]" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))"><label class="form-control-placeholder" for="other_document">Other Document Details:</label></div></div><div class="buttons" onclick="document_add_remove(this,event)"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x55++;
      }
    }
    function document_add_remove(eve,e)
    {
      e.preventDefault(); 
      $(eve).parent('div').remove();
      x55--;
    }
    

  </script>
  @endif
  <script type="text/javascript">
    function selectsecurity(id)
    {
    // var mortgage_hide = document.getElementById("mortgage_hide");
    // var guarntee_hide = document.getElementById("guarntee_hide");
    // var other_hide = document.getElementById("other_hide");
    // var hypo_hide = document.getElementById("hypo_hide");
    // var mortgage_hide="mortgage_hide"+id;
    var mortgage_hide="[class_attr="+"mortgage_hide"+id+"]";
    var guarntee_hide="[class_attr="+"guarntee_hide"+id+"]";
    var other_hide="[class_attr="+"other_hide"+id+"]";
    var hypo_hide="[class_attr="+"hypo_hide"+id+"]";


    if(document.getElementById("security_type_add"+id).value=='mortgage')
    {
      $(mortgage_hide).css("display", "block");
      $(guarntee_hide).css("display", "none");
      $(other_hide).css("display", "none");
      $(hypo_hide).css("display", "none");
    }
    else if(document.getElementById("security_type_add"+id).value=="hypothecation")
    {
      $(mortgage_hide).css("display", "none");
      $(guarntee_hide).css("display", "none");
      $(other_hide).css("display", "none");
      $(hypo_hide).css("display", "block");
    }
    else if(document.getElementById("security_type_add"+id).value=="guarntee")
    {
      $(mortgage_hide).css("display", "none");
      $(guarntee_hide).css("display", "block");
      $(other_hide).css("display", "none");
      $(hypo_hide).css("display", "none");
    }
    else if(document.getElementById("security_type_add"+id).value=="other")
    {
      $(mortgage_hide).css("display", "none");
      $(guarntee_hide).css("display", "none");
      $(other_hide).css("display", "block");
      $(hypo_hide).css("display", "none");
    }
    else
    {
     $(mortgage_hide).css("display", "none");
     $(guarntee_hide).css("display", "none");
     $(other_hide).css("display", "none");
     $(hypo_hide).css("display", "none");
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
});


</script>
<script type="text/javascript">
  function selectsecurity_edit()
  {

    var mortgage_hide1 = document.getElementById("mortgage_hide1");
    var guarntee_hide1 = document.getElementById("guarntee_hide1");
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
    mortgage_hide1.style1.display = "none";
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
  var guarntee_hide = document.getElementById("guarntee_hide1");
  var other_hide = document.getElementById("other_hide1");
  var hypo_hide = document.getElementById("hypo_hide1");
  mortgage_hide.style.display = "none";
  guarntee_hide.style.display = "none";
  other_hide.style.display = "none";
  hypo_hide.style.display = "none";
});

</script>
<!-- <script type="text/javascript">
  function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8);
};
</script> -->
<script type="text/javascript">
  $('#organization_details').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
     event.preventDefault();
     return false;
   }
 });
  $('#official_designation').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
     event.preventDefault();
     return false;
   }
 });
</script>
<!-- <script type="text/javascript">
  var items = $('#subcategory option').get();
items.sort(function(a,b){
  var keyA = $(a).text();
  var keyB = $(b).text();

  if (keyA < keyB) return -1;
  if (keyA > keyB) return 1;
  return 0;
});
var select = $('#subcategory');
$.each(items, function(i, option){
select.append(option);
})
</script> -->


@endsection
<script type="text/javascript">
  function date_field(){

    var dateClass='.datechk';

    if (document.querySelector(dateClass).type !== 'date')
    {
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
          $(dateClass).datepicker();
        }
        document.body.appendChild(oJS);
      }
      document.body.appendChild(oCSS);
    }
  }
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

