 <div class="row register-form" style="margin-top: 30px;pointer-events: none;">
 <div class="col-md-4">

              <div class="form-group">

               <select class="form-control" name="dispute_categories_id" id="disputecategory" required>
                <option value=""></option>
                @foreach ($dispute_categories as $category)
                 <option value="{{$category->id}}" {{$category->id == $claimant->dispute_categories_id ? 'selected':''}} >{{$category->category_name}}</option>
                 
                @endforeach
              </select>
              <label class="form-control-placeholder" for="dispute_categories_id">Main Dispute Category<span style="color: red">*</span></label> 
            </div>
          </div>

 <div class="col-md-4">
            <div class="form-group">
             <select class="form-control" id = "subcategory" name="dispute_subcategories_id" required="true">
              <option value=""></option>
              @foreach ($dispute_subcategories as $category)
               <option value="{{$category->id}}" {{$category->id == $claimant->dispute_subcategories_id ? 'selected':''}}>{{$category->subcategory_name}}</option> 
              
              @endforeach
            </select>
            <label class="form-control-placeholder" for="dispute_subcategories_id">Sub Dispute Category<span style="color: red">*</span></label>
          </div>
        </div> 
        @if ($claimant->others !='')
    <div class="col-md-4" id="others">
          <div class="form-group">
            <input type="text"  id="others" class="form-control{{ $errors->has('others') ? ' is-invalid' : '' }}" name="others" required="true" value="{{$claimant->others }}">
            <label class="form-control-placeholder" for="others" >Others<span style="color: red">*</span></label>
          </div>
        </div> 
        @else
        @endif

         <div class="col-md-4" >
        <div class="form-group">
        <input type="text"   id="claimant_type" class="form-control{{ $errors->has('claimant_type') ? ' is-invalid' : '' }}" 
                  name="claimant_type" required value="{{$claimanttype[0]->claimant_respondant_type_name}}">
                  <label class="form-control-placeholder" for="claimant_type">Claimant Type<span style="color: red">*</span></label>
                  @if ($errors->has('claimant_type'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('claimant_type') }}</strong>
                  </span>
                  @endif      
                </div>
    </div>
    @if ($claimanttype[0]->claimant_respondant_type_Code !='IS' )
        <div class="col-md-4">
          <div class="form-group">
            <input type="text"  id="organization_details" class="form-control{{ $errors->has('organization_details') ? ' is-invalid' : '' }}" name="organization_details" value="{{$claimant->organization_details }}" required="true">
            <label class="form-control-placeholder" for="organization_details" >Authorised Representative's Name<span style="color: red">*</span></label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text"  id="official_designation" class="form-control{{ $errors->has('official_designation') ? ' is-invalid' : '' }}" name="official_designation"  value="{{$claimant->official_designation }}" required="true">
            <label class="form-control-placeholder" for="official_designation" >Authorised Representative's Designation<span style="color: red">*</span></label>
          </div>
        </div> 
        @endif 
     <!-- @if ($claimant->company_individual =='Company') 
    <div class="col-md-4" >
        <div class="form-group">
        <input type="text" readonly  id="company_name" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" 
                  name="company_name" value="{{$claimant->company_name }}">
                  <label class="form-control-placeholder" for="claimant_type">Company's Name<span style="color: red">*</span></label>
                  @if ($errors->has('claimant_type'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('company_name') }}</strong>
                  </span>
                  @endif      </div>
    </div>
    @endif -->
    @if ($claimanttype[0]->claimant_respondant_type_Code !='BA' && $claimanttype[0]->claimant_respondant_type_Code !='GG')
        <div class="col-md-4" id="company_name_id">
          <div class="form-group">
            <input type="text"  id="company_name" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{$claimant->company_name }}">
            <label class="form-control-placeholder" for="company_name" >Company's Name<span style="color: red">*</span></label>
          </div>
        </div>

        @endif
   @if ($claimanttype[0]->claimant_respondant_type_Code =='GG' || $claimanttype[0]->claimant_respondant_type_Code =='PA' || $claimanttype[0]->claimant_respondant_type_Code =='CA') 
     <div class="col-md-4" >
                <div class="form-group">

                  <input type="text" id="organization_name" class="form-control{{ $errors->has('organization_name') ? ' is-invalid' : '' }}" 
                  name="organization_name" required value="{{$claimant->organization_name }}">
                  @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')
         <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Name of the Government<span style="color: red">*</span></label>
          @elseif ($claimanttype[0]->claimant_respondant_type_Code =='PA')
           <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Firm Name<span style="color: red">*</span></label>
            @elseif ($claimanttype[0]->claimant_respondant_type_Code =='CA')
           <label class="form-control-placeholder" for="organization_name" id="org_name_label" >Company Name<span style="color: red">*</span></label>
           @else
           @endif
                  
                </div>
              </div>
               @else
               @endif
               @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')
        <div class="col-md-4" >
          <div class="form-group"  >
            <input type="text"  id="govt_name" class="form-control{{ $errors->has('govt_name') ? ' is-invalid' : '' }}" name="govt_name"  value="{{$claimant->govt_name}}">
             
            <label class="form-control-placeholder" for="govt_name" id="org_name_label" >Name Of the Department<span style="color: red">*</span></label>
             
          </div>
        </div>
        
        <div class="col-md-4" >
          <div class="form-group"  >
            <input type="text"  id="dept_name" class="form-control{{ $errors->has('dept_name') ? ' is-invalid' : '' }}" name="dept_name"  value="{{$claimant->dept_name}}">
           
            <label class="form-control-placeholder" for="dept_name" id="dept_name" >Officer Designation<span style="color: red">*</span></label>
            
          </div>
        </div> 
        @else
        @endif
               <div class="col-md-4">
                <div class="form-group">

                  <input type="text" id="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" 
                  name="age"  value="{{$claimant->age }}" required maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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

                  <input type="text" id="firstname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" 
                  name="firstname" required value="{{$claimant->firstname }}">
                   @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')
      
            <label class="form-control-placeholder" for="firstname">Official Firstname<span style="color: red">*</span></label>
             @elseif ($claimanttype[0]->claimant_respondant_type_Code =='CA')
             <label class="form-control-placeholder" for="firstname">Representative/OL Firstname<span style="color: red">*</span></label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='PA')
             <label class="form-control-placeholder" for="firstname">Partner's Firstname<span style="color: red">*</span></label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='HU')
             <label class="form-control-placeholder" for="firstname">Representative Firstname<span style="color: red">*</span></label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='IS' && $claimant->company_individual =='Company')
              <label class="form-control-placeholder" for="firstname">Representative's Firstname<span style="color: red">*</span></label>
               @elseif ($claimanttype[0]->claimant_respondant_type_Code =='IS')
             <label class="form-control-placeholder" for="firstname">Individual's Firstname<span style="color: red">*</span></label>
             @elseif ($claimanttype[0]->claimant_respondant_type_Code =='TR')
             <label class="form-control-placeholder" for="firstname">proprietor Firstname<span style="color: red">*</span></label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='BA')
             <label class="form-control-placeholder" for="firstname">Bank Name<span style="color: red">*</span></label>
            
            
        @endif
                  @if ($errors->has('firstname'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              @if ($claimanttype[0]->claimant_respondant_type_Code !='BA')
              <div class="col-md-4">
                <div class="form-group">

                  <input type="text" id="middlename" class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}" 
                  name="middlename" required value="{{$claimant->middlename }}">
                  @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')
      
            <label class="form-control-placeholder" for="middlename">Official Middlename</label>
             @elseif ($claimanttype[0]->claimant_respondant_type_Code =='CA')
             <label class="form-control-placeholder" for="middlename">Representative/OL Middlename</label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='PA')
             <label class="form-control-placeholder" for="middlename">Partner's Middlename</label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='HU')
             <label class="form-control-placeholder" for="middlename">Representative Middlename</label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='IS' && $claimant->company_individual =='Company')
              <label class="form-control-placeholder" for="firstname">Representative's Middle Name<span style="color: red">*</span></label>
               @elseif ($claimanttype[0]->claimant_respondant_type_Code =='IS')
             <label class="form-control-placeholder" for="firstname">Individual's Middle Name<span style="color: red">*</span></label>
             @elseif ($claimanttype[0]->claimant_respondant_type_Code =='TR')
             <label class="form-control-placeholder" for="middlename">proprietor Middlename</label>
            
            
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

                  <input type="text" id="lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" 
                  name="lastname" required value="{{$claimant->lastname }}">
                   @if ($claimanttype[0]->claimant_respondant_type_Code =='GG')
      
            <label class="form-control-placeholder" for="lastname">Official Lastname<span style="color: red">*</span></label>
             @elseif ($claimanttype[0]->claimant_respondant_type_Code =='CA')
             <label class="form-control-placeholder" for="lastname">Representative/OL Lastname<span style="color: red">*</span></label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='PA')
             <label class="form-control-placeholder" for="lastname">Partner's Lastname<span style="color: red">*</span></label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='HU')
             <label class="form-control-placeholder" for="lastname">Representative Lastname<span style="color: red">*</span></label>
             @elseif ($claimanttype[0]->claimant_respondant_type_Code =='IS' && $claimant->company_individual =='Company')
              <label class="form-control-placeholder" for="firstname">Representative's Last Name<span style="color: red">*</span></label>
               @elseif ($claimanttype[0]->claimant_respondant_type_Code =='IS')
             <label class="form-control-placeholder" for="firstname">Individual's Last Name<span style="color: red">*</span></label>
             @elseif ($claimanttype[0]->claimant_respondant_type_Code =='TR')
             <label class="form-control-placeholder" for="lastname">proprietor Lastname<span style="color: red">*</span></label>
              @elseif ($claimanttype[0]->claimant_respondant_type_Code =='BA')
             <label class="form-control-placeholder" for="lastname">Bank Branch Name<span style="color: red">*</span></label>
            
            
        @endif
                  @if ($errors->has('lastname'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lastname') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
 @if ($claimanttype[0]->claimant_respondant_type_Code =='BA')
        <div class="col-md-4" >
          <div class="form-group"  >
            <input type="text" id="dept_name" class="form-control{{ $errors->has('dept_name') ? ' is-invalid' : '' }}" name="dept_name"  value="{{$claimant->dept_name}}">
           
            <label class="form-control-placeholder" for="dept_name" id="dept_name" >Branch / Dept. Code<span style="color: red">*</span></label>
            
          </div>
        </div> 
        @else
        @endif
         <div class="col-md-4">
          <div class="form-group">

           <input type="text" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required value="{{$claimant->email }}">
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

           <input type="text" id="aadhar_num" class="form-control{{ $errors->has('aadhar_num') ? ' is-invalid' : '' }}" name="aadhar_num" required value="{{$claimant->aadhar_num }}">
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
         <input type="text" id="daytimetelephone" class="form-control{{ $errors->has('daytimetelephone') ? ' is-invalid' : '' }}" name="daytimetelephone" required  value="{{$claimant->daytimetelephone }}">
         <label class="form-control-placeholder" for="daytimetelephone">Contact<span style="color: red">*</span></label>
         @if ($errors->has('daytimetelephone'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('daytimetelephone') }}</strong>
        </span>
        @endif
      </div>
    </div>
             
      


              <div class="col-md-4">
                <div class="form-group">
                 <input type="text" id="address" 
                 class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" 
                 name="address" required value="{{$claimant->address }}">
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
                <input type="hidden" name="claimnoticeid" id="claimnoticeid" value="{{$claimant->claimnoticeid }}">
                <input type="text" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required value="{{$claimant->city }}">
                <label class="form-control-placeholder" for="state">City<span style="color: red">*</span></label>
                @if ($errors->has('city'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('city') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
               <input type="text" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" 
               value="{{$claimant->state }}" name="state" required>
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
            <input type="text" id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" 
            value="{{$claimant->country }}" name="country" required>
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
             <input type="text" id="zipcode" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" 
             value="{{$claimant->zipcode }}" name="zipcode" required>
             <label class="form-control-placeholder" for="zipcode">Postal Code<span style="color: red">*</span></label>
             @if ($errors->has('zipcode'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('zipcode') }}</strong>
            </span>
            @endif   
          </div>
        </div>


        
        


<div class="col-md-4">
      <div class="form-group">
<input type="text" id="currency" class="form-control{{ $errors->has('currency') ? ' is-invalid' : '' }}" name="currency" required  value="{{$claimant->currency }}">
        <label class="form-control-placeholder" for="currency">Select Currency<span style="color: red">*</span></label> 
      </div>
    </div>
     
  </div>
  @if($claimant->document_id_idproof !='')
  <div class="col-md-4">
      <div class="form-group">
<label class="form-control-placeholder">ID Proof<span style="color: red">*</span><a href="{{route('getclaimdetailsDocuments',$claimant->document_id_idproof) }}"  download> 
                {{$claimant->claimant_IDproof}}
  </a></label> 
  
</div>
</div>
@endif
@if($claimant->document_id !='')
<div class="col-md-4">
      <div class="form-group">
<label class="form-control-placeholder">Authorisation Document<span style="color: red">*</span><a href="{{route('getclaimdetailsDocuments',$claimant->document_id) }}"  download>
                {{$claimant->document_name}}
  </a></label> 

  
  
</div>
</div>
@endif

@if($claimant->amend_id !='')
<div class="col-md-4">
      <div class="form-group">
<label class="form-control-placeholder">Amend Document<span style="color: red">*</span><a href="{{route('getclaimdetailsDocuments',$claimant->amend_id) }}"  download>
                {{$claimant->amend_name}}
  </a></label> 
  
</div>
</div>
@endif


