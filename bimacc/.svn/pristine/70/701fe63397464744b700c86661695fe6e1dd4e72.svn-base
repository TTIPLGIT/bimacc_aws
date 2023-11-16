@extends('layouts.admin')
@section('content')
<style>
  #frname{
    color: red;
  }
</style>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container con" style="height: auto; margin-top: 10px">
  <div class="row">
    @if($claimantinformations == null)
    <nav class="tabs"  style="width: 100%;">
      <div class="selector"></div>
      <a href="#" data-toggle="tab" class="active" rel="idclaimantinformation" id="tabclaimantinformation"  ><i class="fas fa-info"></i>Claimant Information</a>
      <a href="#respondantinformation" data-toggle="tab" class="disabled" rel="idresponantinformation" id="tabrespondantinformation" ><i class="fas fa-info"></i>Respondent Information</a>
      <a href="#" class="disabled" rel="idclaiminformation" id="tabclaiminformation" ><i class="fas fa-info"></i>Claim & Relief</a>
      <a href="#" class="disabled" rel="idreliefrequest" id="tabreliefrequest" style="display: none"><i class="fas fa-retweet"></i>Relief Requested</a>
      <a href="#" class="disabled" rel="idfees" id="tabfees" ><i class="fas fa-receipt"></i>Payment</a>
    </nav>
    @else
    <nav class="tabs" disabled="false" style="width: 100%;">
      <div class="selector"></div>
      <a href="#" class="active" rel="idclaimantinformation" id="tabclaimantinformation" onclick="idclaimantinformation()" ><i class="fas fa-info"></i>Claimant Information</a>
      <a href="#" rel="idresponantinformation" id="tabrespondantinformation" disabled onclick="idresponantinformation()"><i class="fas fa-info"></i>Respondent Information</a>
      <a href="#" rel="idclaiminformation" id="tabclaiminformation" disabled onclick="idclaiminformation()"><i class="fas fa-info"></i>Claim & Relief</a>
      <a href="#" rel="idreliefrequest" id="tabreliefrequest" disabled onclick="idreliefrequest()" style="display: none"><i class="fas fa-retweet"></i>Relief Requested</a>
      <a href="#" rel="idfees" id="tabfees" disabled onclick="idfees()"><i class="fas fa-receipt"></i>Payment</a>
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
             <select class="form-control" id ="subcategory" name="dispute_subcategories_id" required="true" disabled>
              <option value=""> Select Sub Category</option>
              @foreach ($dispute_subcategories as $category)
              <option value=""> </option>
              @endforeach
            </select>
            <label class="form-control-placeholder" for="dispute_subcategories_id">Sub Category<span style="color: red">*</span></label>
          </div>
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" readonly id="claimant_type" class="form-control{{ $errors->has('claimant_type') ? ' is-invalid' : '' }}" name="claimant_type" required="true" value="{{$claimanttype[0]->claimant_respondant_type_name}}">
            <label class="form-control-placeholder" for="claimant_type" >Claimant Type<span style="color: red">*</span></label>
          </div>
        </div> 
        <div class="col-md-4" id="company_name_id">
          <div class="form-group">
            <input type="text"  id="company_name" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name">
            <label class="form-control-placeholder" for="company_name" >Company's Name<span style="color: red">*</span></label>
          </div>
        </div> 
        @if ($claimanttype[0]->claimant_respondant_type_Code =='GG' || $claimanttype[0]->claimant_respondant_type_Code =='PA' || $claimanttype[0]->claimant_respondant_type_Code =='CA')
        <div class="col-md-4" >
          <div class="form-group"  >
            <input type="text"  id="organization_name" class="form-control{{ $errors->has('organization_name') ? ' is-invalid' : '' }}" name="organization_name"  value="{{$claimregister[0]->organization_name}}">
            @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')
            <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Name of the Government<span style="color: red">*</span></label>
            @elseif ($claimanttype[0]->claimant_respondant_type_Code =='PA')
            <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Firm Name<span style="color: red">*</span></label>
            @elseif ($claimanttype[0]->claimant_respondant_type_Code =='CA')
            <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Company Name<span style="color: red">*</span></label>
            
            
            @endif
          </div>
        </div>
        @else
        @endif
        @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')
        <div class="col-md-4" >
          <div class="form-group"  >
            <input type="text"  id="organization_details" class="form-control{{ $errors->has('organization_details') ? ' is-invalid' : '' }}" name="organization_details"  value="{{$claimregister[0]->organization_details}}">
            <label class="form-control-placeholder" for="organization_details" id="org_name_label" >Name Of the Department<span style="color: red">*</span></label>
          </div>
        </div>
        
        <div class="col-md-4" >
          <div class="form-group"  >
            <input type="text"  id="official_designation" class="form-control{{ $errors->has('official_designation') ? ' is-invalid' : '' }}" name="official_designation"  value="{{$claimregister[0]->official_designation}}">
            <label class="form-control-placeholder" for="official_designation" id="official_designation" >Officer Designation<span style="color: red">*</span></label>
          </div>
        </div>
        @else
        @endif
         
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="firstname"  class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" required value="{{$claimregister[0]->firstname}}">
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
            <input type="text" id="middlename"  class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}" name="middlename" required value="{{$claimregister[0]->middlename}}">
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
            <input type="text" id="lastname"  class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" required value="{{$claimregister[0]->lastname}}">
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
        

        <div class="col-md-4">
         <div class="form-group">
           <input type="text" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required="true" value="{{$claimregister[0]->email}}">
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
         <input type="text" id="daytimetelephone" class="form-control{{ $errors->has('daytimetelephone') ? ' is-invalid' : '' }}" name="daytimetelephone"  maxlength="12" required="true" value="{{$claimregister[0]->phone}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
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
       <input type="number" id="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" required="true" maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
       <label class="form-control-placeholder" for="age">Age<span style="color: red">*</span></label>
       @if ($errors->has('age'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('age') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
     <input type="text" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required="true" value="{{$claimregister[0]->address}}">
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
    <input type="text" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required="true" value="{{$claimregister[0]->city}}">
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
   <input type="text" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" required="true" value="{{$claimregister[0]->state}}">
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
   <input type="text" id="zipcode" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" required="true" value="{{$claimregister[0]->zipcode}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
   <label class="form-control-placeholder" for="zipcode">Zip Code<span style="color: red">*</span></label>
   @if ($errors->has('zipcode'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('zipcode') }}</strong>
  </span>
  @endif   
</div>
</div>

<div class="col-md-4">
  <div class="form-group"  > 
    {!! Form::countries('country', 'select2', 'form-control','country','required =false' ) !!}
    {!! $errors->first('country', '<span class="alert-msg" >:message</span>') !!}
    <label class="form-control-placeholder" for="country" id="country">Country<span style="color: red">*</span></label>       
       <!--  {!! Form::countries('country', 'select2', 'form-control','country','required' ) !!}
        {!! $errors->first('country', '<span class="alert-msg">:message</span>') !!}
        <label class="form-control-placeholder" for="country">Country *</label>  -->

      </div>
      
      
      
    </div>
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
      name="fileupload">
      <label class="form-control-placeholder" for="fileupload" id="fileupload_label">Upload Authorisation Document</label>
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
      <label class="form-control-placeholder" for="fileidproof" id="fileidproof_label">Upload ID Proof</label>
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
        <th>Claimant Name & Address</th>
        <th>Claimant Age</th>
        <th>Claimant Contact</th>
        <th>Claimant Email </th>
        <th>Dispute Category</th>
        <th>Sub Category</th>
        <th width="230px">Action</th>                   
      </tr>
    </thead>
    <tbody>
      @foreach ($claimantinformations as $claimantinformation)
      <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $claimantinformation->name }} & {{ $claimantinformation->address}}</td>
        <td>{{ $claimantinformation->age }}</td>
        <td>{{ $claimantinformation->daytimetelephone }}</td>
        <td>{{ $claimantinformation->email }}</td>
        <td>{{ $claimantinformation->category_name }}</td>
        <td>{{ $claimantinformation->subcategory_name }}</td>
        <td>
          <form action="{{ route('claimantinformation.destroy',$claimantinformation->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('claimantinformation.edit',$claimantinformation->id) }}" data-toggle="modal" data-target="#editclaimantinformationModal"><i class="fas fa-pencil-alt"></i></a>
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
            <a class="btn btn-success float-right" title="create" href="{{ route('respondantinformation.create') }}" data-toggle="modal" data-target="#createrespinformModal" >Add Respondent</a>
          </div>
         
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered"  width="100%" cellspacing="0">
         <thead class="theadalign">
          <tr>
            <th>Sl. No.</th>
            <th>Respondent Name & Address</th>
            <th>Individual Respondent's Age</th>
            <th>Respondent Contact</th>
            <th>Respondent Email </th>
            <th>Respondent Type</th>
            <th width="230px">Action</th>                   
          </tr>
        </thead>
        <tbody>
          @foreach ($respondantinformations as $respondantinformation)
          <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $respondantinformation->firstname }} & {{ $respondantinformation->address }}</td>
            <td>{{ $respondantinformation->age }}</td>
            <td>{{ $respondantinformation->daytimetelephone }}</td>
            <td>{{ $respondantinformation->email }}</td>
            <td>{{ $respondantinformation->claimant_respondant_type_name }}</td>
            <td>
              <form action="{{ route('respondantinformation.destroy',$respondantinformation->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('respondantinformation.edit',$respondantinformation->id) }}" data-toggle="modal" data-target="#editrespondantinformationModal"><i class="fas fa-pencil-alt"></i></a>
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
            <a class="btn btn-success float-right" title="create" href="{{ route('claimdetails.create') }}" data-toggle="modal" data-target="#idclaiminformationdetails" >Add Claim and Relief</a>
          </div>
          @endif                    
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
         <thead class="theadalign">
          <tr>
            <th>Sl. No.</th>
            <th>Dispute Category</th>
            <!-- <th>Contract Date</th> category_name -->
            <th>Total Claim Amount</th>
            <th>Reasons for the Claim</th>
            <th width="230px">Edit</th>                   
          </tr>
        </thead>
        <tbody>
          @foreach ($claimandrelief as $claimDetail)
          <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $claimDetail->category_name }}</td>
            <!-- <td>{{ $claimDetail->contractdate }}</td> -->
            <td>{{ $claimDetail->damage_with_interest }}</td>
            <td>{{ $claimDetail->reason_for_claim }}</td>                
            <td>
             <form action="{{ route('claimdetails.destroy',$claimDetail->claimnoticeid) }}" method="POST">
              <a class="btn btn-primary" href="{{ route('claimdetails.edit', $claimDetail->claimnoticeid) }}" data-toggle="modal" data-target="#editClaimantDetailsModal{{$claimDetail->claimnoticeid}}">Edit<i class="fas fa-pencil-alt"></i></a>
              @csrf
              @method('DELETE')
              <!--  <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
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
          <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group"> 
               <label>Dispute Main Category</label>              
               @foreach ($claimnoticedisputecategories as $categories)
               <select name="dispute_categories_id" class="form-control"  readonly>
                <option value="{{$categories->dispute_categories_id}}">{{$categories->category_name}}</option>
              </select>                 


            </div>
            <div class="form-group">
              <label >Sub Category</label>
              <select name="dispute_subcategories_id" class="form-control"  readonly >
                <option value="{{$categories->dispute_subcategories_id}}">{{$categories->subcategory_name}}</option>
              </select>
              @endforeach           

            </div>
          </div>  
          <div class="col-md-6">
           
            <div class="form-group" >
              @foreach($registrationfees as $registrationfee)
              <label>Registration Fees</label>
              <input type="number" id="registration_fees" class="form-control" name="registration_fees"  value="{{$registrationfee->registration_fee}}"  readonly >

              @endforeach

              @if ($errors->has('registration_fees'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('registration_fees') }}</strong>
              </span>
              @endif
            </div>

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
      </div>                   
      <div class="modal-footer">
        <div class="mx-auto">
          @if($claimantinformations != null && $ReliefRequests != null  && $ClaimDetails != null  && $respondantinformations != null )
          <button type="button" class="btn btn-success btn-space" id="fees_submit" onclick="feesbuttton()">Submit and Pay</button> 
          @endif    
          <a class="btn btn-danger btn-space" href="{{ route('claimnotice.index') }}">Cancel</a>
        </div> 
      </div>
    </div>          
  </form>
</div>
@else
<div class="table-responsive">
  <table class="table table-bordered"  width="100%" cellspacing="0">
   <thead class="theadalign">
    <tr>
      <th>Sl. No.</th>
      <th>Dispute Main Category</th>
      <th>Sub Category</th>
      <th>Claim Amount</th>
      <th>Nature Of Claim</th>                      
      <th width="230px">Action</th>                   
    </tr>
  </thead>   

  <tbody>
    @foreach ($ClaimFees as $ClaimFee)
    <tr>
      <td>{{ $loop->iteration}}</td>
      <td>{{ $ClaimFee->dispute_categories_id }}</td>
      <td>{{ $ClaimFee->dispute_subcategories_id }}</td>
      <td>{{ $ClaimFee->claim_amount }}</td>
      <td>{{ $ClaimFee->claim_amount_purpose }}</td>          

      <td>
        <form action="{{ route('claimfees.destroy',$ClaimFee->id) }}" method="POST">
          <a class="btn btn-primary" href="{{ route('claimfees.edit', $ClaimFee->id) }}" data-toggle="modal" data-target="#editClaimFeeModal{{$ClaimFee->id}}"><i class="fas fa-pencil-alt"></i></a>
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
        </form>             
      </td>
    </tr>  
    @endforeach              
  </tbody>
</table>

@if($ClaimFees !=null)
@include('modals/editClaimFeesModal') 
@endif
</div> 

@endif

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
          $.each(res,function(key,value){
            $("#subcategory").append('<option value="'+key+'">'+value+'</option>');
          });

        }else{
         $("#subcategory").empty();
       }
     }
   });
    }     
  });
</script>
@if($claimantinformations != null)
<script type="text/javascript">
  var tabs = $('.tabs');
  var selector = $('.tabs').find('a').length;
//var selector = $(".tabs").find(".selector");
var activeItem = tabs.find('.active');
var activeWidth = activeItem.innerWidth();
$(".selector").css({
  "left": activeItem.position.left + "px", 
  "width": activeWidth + "px"
});

$(".tabs").on("click","a",function(e){
  e.preventDefault();
  $('.tabs a').removeClass("active");
  $(this).addClass('active');
  var activeWidth = $(this).innerWidth();
  var itemPos = $(this).position();
  $(".selector").css({
    "left":itemPos.left + "px", 
    "width": activeWidth + "px"
  });
});
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
  var tabs = $('.tabs');
  var selector = $('.tabs').find('a').length;
//var selector = $(".tabs").find(".selector");
var activeItem = tabs.find('.active');
var activeWidth = activeItem.innerWidth();
$(".selector").css({
  "left": activeItem.position.left + "px", 
  "width": activeWidth + "px"
});
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

     var claimant_type1 =  $('#claimant_type1').val();
     if (claimant_type1 =='') 
     {
       swal("Please Select Claimant Type", "", "error");
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
      swal("Enter Your Zipcode", "", "error");
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
<script type="text/javascript">
  var x1 = 2;
  $('#commercial_btn').on('click', function () {
    var max_fields      = 10; 
    var commercial1       = $("#commercial1");
    
   
    if(x1 < max_fields){ 
      $(commercial1).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x1+'  type="text" disabled ></div><div class="col-md-5" > <div class="form-group"><input class="form-control"  type="text" name="contract_price[]"/><label class="form-control-placeholder" for="contract_price">Contract Price:</label></div></div><div class="col-md-5" > <div class="form-group"><input class="form-control"   type="text" name="claim_for_refund_lines[]"/><label class="form-control-placeholder" for="claim_for_refund_lines">Claim for Refund:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span></div> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x1++;
        
      }
    });
  $("#commercial1").on("click",".buttons", function(e)
      { 
           // alert("Sample");
           e.preventDefault(); $(this).parent('div').remove();
           x1--;
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
      $(movable).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x3+'  type="text" disabled ></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" name="movable_nature[]"/><label class="form-control-placeholder" for="movable_nature">Nature of Movable property:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control"   type="text" name="movable_possessor[]"/> <label class="form-control-placeholder" for="movable_possessor">Name of the Possessor:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" name="movable_owner[]"/><label class="form-control-placeholder" for="movable_owner">Name of the Owner:</label></div></div><div class="col-md-2" ><div class="form-group"> <input class="form-control" type="number" name="movable_value[]"/> <label class="form-control-placeholder" for="movable_value">Value of Property:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x3++;
        
      }
      
 
});
  $("#movable").on("click",".buttons", function(e)
      { 
        e.preventDefault(); $(this).parent('div').remove(); x3--;
      });
</script>
<script type="text/javascript">
  var x4 = 2;
  $('#family_btn1').on('click', function () {
   var max_fields      = 10; 
   var immovable       = $("#immovable");
   
  
   if(x4 < max_fields){ 
      $(immovable).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x4+'  type="text" disabled ></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" name="immovable_nature[]"/> <label class="form-control-placeholder" for="immovable_nature">Nature of Immovable Property:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" p  type="text" name="immovable_possessor[]"/> <label class="form-control-placeholder" for="immovable_possessor">Name of the Possessor:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="immovable_owner[]"/> <label class="form-control-placeholder" for="immovable_owner">Name of the Property Owner:</label></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text"name="immovable_description[]"/> <label class="form-control-placeholder" for="immovable_description">Description of Property:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="immovable_schedule[]"/><label class="form-control-placeholder" for="immovable_schedule">Schedule and Boundaries:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="number"  name="immovable_market[]"/><label class="form-control-placeholder" for="immovable_market">Market Value of Property</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
      
      x4++;
    }
   
  //    $(wrapper2).on("click",".remove_field", function(e)
  //    { 
  //   e.preventDefault(); $(this).parent('div').remove(); x--;
  // })
});
   $("#immovable").on("click",".buttons", function(e)
    { 
      e.preventDefault(); $(this).parent('div').remove(); x4--;
    });
</script>
<script type="text/javascript">
 var x5= 2;
  $('#insurnace_btn1').on('click', function () {
   var max_fields      = 10; 
   var insurance1       = $("#insurance1");
   
   
   if(x5 < max_fields){ 
      $(insurance1).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x5+'  type="text" disabled ></div><div class="col-md-2"> <div class="form-group"><input class="form-control"  type="text" name="policy_no[]"/> <label class="form-control-placeholder" for="policy_no">Policy Number:<span style="color: red">*</span></label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="text" name="nature_of_cover[]"/><label class="form-control-placeholder" for="nature_of_cover">Nature of Cover:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date"  name="date_insurance[]"/><label class="form-control-placeholder" for="date_insurance">Date:</label></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text"  name="policy_value[]"/><label class="form-control-placeholder" for="policy_value">Policy Value: </label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date"  name="policy_maturity_date[]"/><label class="form-control-placeholder" for="date_of_notice">Policy Maturity Date:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="surrender_value[]"/> <label class="form-control-placeholder" for="surrender_value">Surrender Value:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="claim_nature[]"/><label class="form-control-placeholder" for="claim_nature"> Nature of Claim:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" name="claim_value_insurance[]"/><label class="form-control-placeholder" for="claim_value_insurance"> Value of Claim:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="date"  name="date_of_claim[]"/><label class="form-control-placeholder" for="date_of_claim">Date of Claim:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="date"  name="date_of_notice_insurance[]"/><label class="form-control-placeholder" for="date_of_notice">Date of Notice:</label></div></div><div class="col-md-4" ><div class="form-group"><input class="form-control" type="date" name="date_of_breach_insurance[]"/><label class="form-control-placeholder" for="date_of_breach">Date of Breach:</label> </div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="claim_amount_insurance[]"/><label class="form-control-placeholder" for="claim_amount_insurance">Claim Amount:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="claim_amount_int[]"/><label class="form-control-placeholder" for="claim_amount_int">Interest:</label></div></div><div class="col-md-4"> <div class="form-group"><input class="form-control" type="text" name="document_no[]"/><label class="form-control-placeholder" for="document_no">Transport/ Warehousing/ Courier Document No: </label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control"   type="date" name="date_document[]"/><label class="form-control-placeholder" for="date_document">Date:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="freight_charges[]"/><label class="form-control-placeholder" for="freight_charges">Freight Charges:</label></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text"  name="demurrage_charges[]"/><label class="form-control-placeholder" for="demurrage_charges">Demurrage Charges: </label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="goods_nature[]"/>    <label class="form-control-placeholder" for="goods_nature">Nature of Goods:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="value_of_good[]"/><label class="form-control-placeholder" for="value_of_good"> Value of Goods:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="loss_nature[]"/><label class="form-control-placeholder" for="loss_nature"> Nature of Loss:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x5++;
        
      }
      
      
    });
 $("#insurance1").on("click",".buttons", function(e)
      { 
        e.preventDefault(); $(this).parent('div').remove(); x5--;
      });
  </script>
  <!-- <script type="text/javascript">
   
    $('#insurance_btn2').on('click', function () {
     var max_fields      = 10; 
     var insurance2       = $("#insurance2");
     
     var x = 0;
     if(x < max_fields){ 
      $(insurance2).append('<div class="row"><div class="col-md-3"> <div class="form-group"><input class="form-control" placeholder="Transport/Warehousing/Courier Document No____ Date"  type="text" name="document_no[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" placeholder="Date"  type="date" name="date_document[]"/><label class="form-control-placeholder" for="date_document">Date</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Freight Charges" name="freight_charges[]"/></div></div><div class="col-md-3" ><div class="form-group"> <input class="form-control" type="text" placeholder="Demurrage Charges" name="demurrage_charges[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Nature of Goods" name="goods_nature[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Value of Goods" name="value_of_good[]"/></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" placeholder="Nature of Loss" name="loss_nature[]"/></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        
      }
      $(insurance2).on("click",".buttons", function(e)
      { 
        e.preventDefault(); $(this).parent('div').remove(); x--;
      })
      
    });
  </script> -->
  <script type="text/javascript">
     var x6 = 2;
    $('#real_btn1').on('click', function () {
       
     var max_fields      = 10; 
     var real1       = $("#real1");
  
     if(x6 < max_fields){ 

      $(real1).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x6+'  type="text" disabled ></div><div class="col-md-3"> <div class="form-group"><input class="form-control"   type="text" name="nature_of_contract_real[]"/> <label class="form-control-placeholder" for="nature_of_contract_real">Nature of Contract:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control"   type="date" name="date_of_cintract_real[]"/><label class="form-control-placeholder" for="date_of_cintract_real">Date of Contract</label></div></div><div class="col-md-5" > <div class="form-group"><input class="form-control" type="text"  name="annual_value_real[]"/> <label class="form-control-placeholder" for="annual_value_real">Annual Value of Contract/ Annual Average Rental Value:</label></div></div><div class="col-md-4"> <div class="form-group"><input class="form-control"   type="text" name="natue_of_immovable_real[]"/><label class="form-control-placeholder" for="natue_of_immovable_real">Nature of Immovable Property: </label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control"   type="text" name="name_of_possessor_real[]"/><label class="form-control-placeholder" for="name_of_possessor_real">Name of the Possessor:</label></div></div><div class="col-md-4" > <div class="form-group"><input class="form-control" type="text"  name="name_of_owner_real[]"/><label class="form-control-placeholder" for="name_of_owner_real">Name of the Property Owner:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="description_real[]"/> <label class="form-control-placeholder" for="description_real">Description of Property:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="schedule_real"/><label class="form-control-placeholder" for="schedule_real[]">Schedule and Boundaries:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="market_value_real[]"/> <label class="form-control-placeholder" for="market_value_real">Market Value of Property:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"  name="mortgage_value[]"/><label class="form-control-placeholder" for="mortgage_value">Mortgage Value:  </label></div></div><div class="col-md-5" > <div class="form-group"><input class="form-control" type="date"  name="date_of_breach_real[]"/><label class="form-control-placeholder" for="date_of_breach_real">Date of Breach:  </label></div></div><div class="col-md-5" > <div class="form-group"><input class="form-control" type="date"  name="date_of_notice_real[]"/><label class="form-control-placeholder" for="date_of_notice_real">Date of Notice:  </label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        
        x6++;
      }

      
      
    });
    $("#real1").on("click",".buttons", function(e)
      { 
        e.preventDefault(); $(this).parent('div').remove(); x6--;
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
      $(bankclaim1).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x8+'  type="text" disabled ></div><div class="col-md-2"> <div class="form-group"><input class="form-control"   type="text" name="description_mort_bank[]"/><label class="form-control-placeholder" for="description_mort_bank">Description of Property:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control"  type="text" name="value_mort_bank[]"/><label class="form-control-placeholder" for="value_mort_bank">Value:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text" name="schedule_mort_bank[]"/><label class="form-control-placeholder" for="schedule_mort_bank">Scheduele and Boundaries:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date"  name="date_mort_bank[]"/> <label class="form-control-placeholder" for="date_mort_bank">Date of Mortgage/ LEDTD:</label></div></div><div class="col-md-3"> <div class="form-group"><input class="form-control"   type="text" name="mortgage_mortgagor[]"/><label class="form-control-placeholder" for="mortgage_mortgagor">Name of the Mortgagaor:</label></div></div><div class="col-md-2" > <div class="form-group"><input class="form-control"   type="text" name="mortgage_company[]"/><label class="form-control-placeholder" for="mortgage_company">Company/ Individual:</label></div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="text"name="mortgage_property[]"/> <label class="form-control-placeholder" for="mortgage_property">Name & Description of Property:</label> </div></div><div class="col-md-3" > <div class="form-group"><input class="form-control" type="date"  name="mortgage_schedule[]"/><label class="form-control-placeholder" for="mortgage_schedule">Schedule and Boundaries Date of Mortgage:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
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
    $('#bankingclaim_btn1').on('click', function () {
     var max_fields      = 10; 
     var bankingclaim_details       = $("#bankingclaim_details");
     var mortgage_hide_id='mortgage_hide'+x16;
     var guarntee_hide_id='guarntee_hide'+x16;
     var other_hide_id='other_hide'+x16;
     var hypo_hide_id='hypo_hide'+x16;

     if(x16 < max_fields){ 
      $(bankingclaim_details).append('<div class="row"><div class="col-md-1"><input class="form-control" placeholder='+x16+'  type="text" disabled ></div><div class="col-md-2"> <div class="form-group"><input class="form-control"   type="text" name="loan_acc_bank[]"/> <label class="form-control-placeholder" for="loan_acc_bank">Loan A/C:</label></div></div> <div class="col-md-3">  <div class="form-group"><input type="text" id="sanction_ammount" name="sanction_ammount[]"  class="form-control" ><label class="form-control-placeholder" for="sanction_ammount">Sanction Amount:</label></div></div><div class="col-md-3"> <div class="form-group"><input class="form-control"  type="date" name="date_of_application_bank[]"/><label class="form-control-placeholder" for="date_of_application">Date of Application for Financial Facility:</label></div></div><div class="col-md-3"> <div class="form-group"><input class="form-control"  type="date" name="date_of_sanction_bank[]"/><label class="form-control-placeholder" for="date_of_sanction">Date of Sanction:</label></div></div><div class="col-md-4"> <div class="form-group"><select name="security_type[]" id="security_type_add" class="form-control" onchange="selectsecurity('+x16+')"><option value="">Select Security Type</option>    <option value="mortgage">Mortgage</option><option value="hypothecation">Hypothecation</option><option value="guarntee">Guarntee Agreement</option><option value="other">Other</option></select></div></div><div class="col-md-4" style="display: none;" class_attr='+mortgage_hide_id+'> <div class="form-group"><input type="text" id="mortgage_property" class="form-control" name="mortgage_property[]"  ><label class="form-control-placeholder" for="mortgage_property">Description of Property:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="text" id="mortgage_value_bank" class="form-control" name="mortgage_value_bank[]" ><label class="form-control-placeholder" for="mortgage_value_bank">Value:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="text" id="mortgage_schedule" class="form-control" name="mortgage_schedule[]" ><label class="form-control-placeholder" for="mortgage_schedule">Scheduele and Boundaries:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="text" id="mortgage_name" class="form-control" name="mortgage_name[]"  ><label class="form-control-placeholder" for="mortgage_name">Name of the Mortgagaor:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+mortgage_hide_id+'><div class="form-group"><input type="date" id="mortgage_date" name="mortgage_date[]"  class="form-control" ><label class="form-control-placeholder" for="mortgage_date">Date of Mortgage/ LEDTD:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'> <div class="form-group"><input type="text" id="hypo_property" class="form-control" name="hypo_property[]"  ><label class="form-control-placeholder" for="hypo_property">Description of Property:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'> <div class="form-group"><input type="text" id="hypo_value" class="form-control" name="hypo_value[]" ><label class="form-control-placeholder" for="hypo_value">Value:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'><div class="form-group"><input type="text" id="hypo_schedule" class="form-control" name="hypo_schedule[]" ><label class="form-control-placeholder" for="hypo_schedule">Scheduele and Boundaries:</label></div></div><div class="col-md-3" style="display: none;" class_attr='+hypo_hide_id+'> <div class="form-group"><input type="text" id="hypo_name" class="form-control" name="hypo_name[]" ><label class="form-control-placeholder" for="hypo_name">Hypothecator Name:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+hypo_hide_id+'>  <div class="form-group"><input type="date" id="hypo_date" name="hypo_date[]"  class="form-control" ><label class="form-control-placeholder" for="hypo_date">Date of Hypothecation:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+hypo_hide_id+'>  <div class="form-group"><input type="text" id="hypo_engine" name="hypo_engine[]"  class="form-control" ><label class="form-control-placeholder" for="hypo_engine">Vehicle Engine Number:</label></div></div><div class="col-md-4" style="display: none;" class_attr='+hypo_hide_id+'>  <div class="form-group"><input type="text" id="hypo_chassis" name="hypo_chassis[]"  class="form-control" ><label class="form-control-placeholder" for="hypo_chassis">Chassis Number:</label></div></div><div class="col-md-6" style="display: none;" class_attr='+guarntee_hide_id+'> <div class="form-group"><input type="text" id="guarntee_name" class="form-control" name="guarntee_name[]"  ><label class="form-control-placeholder" for="guarntee_name">Guarantor Name:</label></div></div><div class="col-md-6" style="display: none;" class_attr='+guarntee_hide_id+'> <div class="form-group"><input type="date" id="guarntor_agreement" class="form-control" name="guarntor_agreement[]" ><label class="form-control-placeholder" for="guarntor_agreement">Date of Guarantor Agreement:</label></div></div><div class="col-md-6" style="display: none;" class_attr='+other_hide_id+'> <div class="form-group"><input type="text" id="others_details" class="form-control" name="others_details[]" ><label class="form-control-placeholder" for="others_details">Other Details</label></div></div><div class="col-md-6" style="display: none;" class_attr='+other_hide_id+'> <div class="form-group"><input type="date" id="others_date" class="form-control" name="others_date[]"  ><label class="form-control-placeholder" for="others_date">Date:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="date" id="renewal_date" class="form-control" name="renewal_date[]" ><label class="form-control-placeholder" for="renewal_date">Renewal Letter Date:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="date" id="revival_date" class="form-control" name="npa_date_bank[]" ><label class="form-control-placeholder" for="revival_date">Revival Letter Date:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="date" id="date_of_dafault" class="form-control" name="date_of_dafault[]" ><label class="form-control-placeholder" for="date_of_dafault">Date of Default:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="date" id="legal_notice" class="form-control" name="legal_notice[]" ><label class="form-control-placeholder" for="legal_notice">Legal Notice Date:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="textt" id="other_document" class="form-control" name="other_document[]" ><label class="form-control-placeholder" for="other_document">Other Document Details:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="date" id="npa_date" class="form-control" name="npa_date[]" ><label class="form-control-placeholder" for="npa_date">NPA Date:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="text" id="amount_as_account" class="form-control" name="amount_as_account[]" ><label class="form-control-placeholder" for="amount_as_account">Amount as per Account:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="number" id="interest_bank" class="form-control" name="interest_bank[]" ><label class="form-control-placeholder" for="interest_bank">Rate of Interest:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="text" id="penel_interest" class="form-control" name="penel_interest[]" ><label class="form-control-placeholder" for="penel_interest">Penal Interest:</label></div></div><div class="col-md-4"> <div class="form-group"><input type="text" id="other_charges_bank" class="form-control" name="other_charges_bank[]" ><label class="form-control-placeholder" for="other_charges_bank">Other Charges:</label></div></div><div class="col-md-3"> <div class="form-group"><input type="number" id="amount_as_date" class="form-control" name="amount_as_date[]" ><label class="form-control-placeholder" for="amount_as_date">Total Amount as on Date:</label></div></div><div class="buttons"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
        x16++;
      }
     
      
    });
     $("#bankingclaim_details").on("click",".buttons", function(e)
      { 
        e.preventDefault(); $(this).parent('div').remove();
        x16--;
      });
  </script>
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

   //alert (document.getElementById("security_type_add").value);
    if(document.getElementById("security_type_add").value=='mortgage')
    {
      $(mortgage_hide).css("display", "block");
      $(guarntee_hide).css("display", "none");
      $(other_hide).css("display", "none");
      $(hypo_hide).css("display", "none");
}
   else if(document.getElementById("security_type_add").value=="hypothecation")
   {
    $(mortgage_hide).css("display", "none");
      $(guarntee_hide).css("display", "none");
      $(other_hide).css("display", "none");
      $(hypo_hide).css("display", "block");
  }
   else if(document.getElementById("security_type_add").value=="guarntee")
   {
    $(mortgage_hide).css("display", "none");
      $(guarntee_hide).css("display", "block");
      $(other_hide).css("display", "none");
      $(hypo_hide).css("display", "none");
  }
     else if(document.getElementById("security_type_add").value=="other")
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

  @endsection

