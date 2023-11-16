  @if (count($errors) > 0)
    <script>
        $( document ).ready(function() {
            $('#createArbitrationMasterModal').modal('show');
        });
    </script>
@endif

  <!-- create Arbitration modal -->
  <div class="modal hide fade" id="createArbitrationMasterModal" tabindex="-1" role="dialog" aria-labelledby="createArbitrationMasterlabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
      <div class="modal-content">  

        <div class="modal-header">

          <h5 class="modal-title" id="createArbitrationMasterlabel">Add New Arbitrator</h5>

          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"> 
          @if (count($errors) > 0)
          <div class="alert alert-danger">

            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>

          @endif


          
          <form id="createForm" action="{{ route('arbitrationmaster.store') }}" method="POST" autocomplete="off">
           @csrf 
           <div class="row register-form">
           <!--  <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="arbitrator_code" class="form-control{{ $errors->has('arbitrator_code') ? ' is-invalid' : '' }}" name="arbitrator_code"  >
                <label id="arbitrator_code" class="form-control-placeholder" for="arbitrator_code">Arbitrator Code<span style="color: red">*</span></label>
                @if ($errors->has('arbitrator_code'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('arbitrator_code') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div> -->
             <!-- <div class="col-md-6">
         <div class="form-group">
          <select id='category' class="form-control{{ $errors->has('dispute_categories_id') ? ' is-invalid' : '' }}" name="dispute_categories_id" >
            <option value=""></option>
            @foreach ($disputecategory as $category)
            <option value="{{ $category->id }}"> {{$category->category_name}}</option>
            @endforeach
          </select>
          <label class="form-control-placeholder" for="category">Main Dispute Category <span style="color: red">*</span></label>
          @if ($errors->has('dispute_categories_id'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('dispute_categories_id') }}</strong>
            </span>
          @endif 
        </div>
      </div>
             <div class="col-md-6">
        <div class="form-group">         
          <select id = 'subcategory' class="form-control{{ $errors->has('dispute_subcategories_id') ? ' is-invalid' : '' }}" name="dispute_subcategories_id" >
           
           @foreach ($disputesubcategory as $category)
           <option value=""></option>
           @endforeach
         </select>
          <label class="form-control-placeholder" for="subcategory">Sub Dispute Category <span style="color: red">*</span></label>
          @if ($errors->has('dispute_subcategories_id'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('dispute_subcategories_id') }}</strong>
            </span>
          @endif
       </div>
     </div> -->
           <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="firstname" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname"  required>
                <label id="firstname" class="form-control-placeholder" for="firstname">First Name<span style="color: red">*</span></label>
                @if ($errors->has('firstname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="miiddlename" class="form-control {{ $errors->has('miiddlename') ? ' is-invalid' : '' }}" name="miiddlename"  >
                <label id="miiddlename" class="form-control-placeholder" for="miiddlename">Middle Name</label>
                @if ($errors->has('miiddlename'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('miiddlename') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div>
            
           
        <div class="col-md-6">
              <div class="form-group">
               <input type="text" id="lastname" name=
               "lastname" class="form-control" required>
               <label class="form-control-placeholder" for="lastname">Last Name <span style="color: red">*</span></label>
               @if ($errors->has('lastname'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastname') }}</strong>
              </span>
              @endif  
            </div>
          </div>
         <!--  <div class="col-md-6">
             <div class="form-group">
              <input type="text" id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"  >
              <label class="form-control-placeholder" for="username">Username<span style="color: red">*</span></label>
              @if ($errors->has('username'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
              @endif
            </div>
          </div> -->
           <div class="col-md-6">
           <div class="form-group">
             <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  autofocus required>
             <label class="form-control-placeholder" for="email">Email <span style="color: red">*</span></label>
             @if ($errors->has('email'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
        </div>
          <div class="col-md-6">
      <div class="form-group">
   <input type="text" name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="address">Address <span style="color: red">*</span></label>
   @if ($errors->has('address'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('address') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
     <div class="col-md-6">
      <div class="form-group">
   <input type="text" name="qualification" id="qualification" class="form-control{{ $errors->has('qualification') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="qualification">Educational and professional qualification <span style="color: red">*</span></label>
   @if ($errors->has('qualification'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('qualification') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
     <div class="col-md-6">
      <div class="form-group">
   <input type="text" name="language_prof" id="language_prof" class="form-control{{ $errors->has('language_prof') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="language_prof">Languages & Proficiency<span style="color: red">*</span></label>
   @if ($errors->has('language_prof'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('language_prof') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="number" name="age" id="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="age">Age<span style="color: red">*</span></label>
   @if ($errors->has('age'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('age') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="date" name="dob" id="dob" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="dob">DOB<span style="color: red">*</span></label>
   @if ($errors->has('dob'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('dob') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="number" name="experience" id="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="experience">Years of experience as an Arbitrator<span style="color: red">*</span></label>
   @if ($errors->has('experience'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('experience') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
     <div class="col-md-6">
      <div class="form-group">
   <input type="text" name="training" id="training" class="form-control{{ $errors->has('training') ? ' is-invalid' : '' }}" >
   <label class="form-control-placeholder" for="training">Arbitration Training Details, if any</label>
   @if ($errors->has('training'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('training') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="number" name="no_of_arbitration" id="no_of_arbitration" class="form-control{{ $errors->has('no_of_arbitration') ? ' is-invalid' : '' }}" required >
   <label class="form-control-placeholder" for="no_of_arbitration">Number of Arbitrations as an arbitrator<span style="color: red">*</span></label>
   @if ($errors->has('no_of_arbitration'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('no_of_arbitration') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
     <div class="col-md-6">
      <div class="form-group">
   <input type="number" name="no_of_arbitration_rep" id="no_of_arbitration_rep" class="form-control{{ $errors->has('no_of_arbitration_rep') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="no_of_arbitration_rep">Number of Arbitrations as a party/representative<span style="color: red">*</span></label>
   @if ($errors->has('no_of_arbitration_rep'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('no_of_arbitration_rep') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="number" name="prof_experience" id="prof_experience" class="form-control{{ $errors->has('prof_experience') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="prof_experience">Years of Prof. Exp<span style="color: red">*</span></label>
   @if ($errors->has('prof_experience'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('prof_experience') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="text" name="present_prof" id="present_prof" class="form-control{{ $errors->has('present_prof') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="present_prof">Present Profession and Position<span style="color: red">*</span></label>
   @if ($errors->has('present_prof'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('present_prof') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="text" name="prior_position" id="prior_position" class="form-control{{ $errors->has('prior_position') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="prior_position">Prior Positions<span style="color: red">*</span></label>
   @if ($errors->has('prior_position'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('prior_position') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="text" name="membership" id="membership" class="form-control{{ $errors->has('membership') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="membership">Membership in professional bodies<span style="color: red">*</span></label>
   @if ($errors->has('membership'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('membership') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="text" name="litigation" id="litigation" class="form-control{{ $errors->has('litigation') ? ' is-invalid' : '' }}">
   <label class="form-control-placeholder" for="litigation">Litigation Exp (if applicable)</label>
   @if ($errors->has('litigation'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('litigation') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="text" name="conf_interest" id="conf_interest" class="form-control{{ $errors->has('conf_interest') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="conf_interest">Conflict of interest<span style="color: red">*</span></label>
   @if ($errors->has('conf_interest'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('conf_interest') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
     <div class="col-md-6"></div>
    <div class="col-md-1"><input class="form-control" placeholder="1" type="text" disabled style="
    background-color: azure;
"></div>
    <div class="col-md-5">
      <div class="form-group">
   <input type="text" name="domain[]" id="domain" class="form-control{{ $errors->has('domain') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="domain">Domain Expertise<span style="color: red">*</span></label>
   @if ($errors->has('domain'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('domain') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-5">
      <div class="form-group">
   <input type="number" name="year_of_exp[]" id="year_of_exp" class="form-control{{ $errors->has('year_of_exp') ? ' is-invalid' : '' }}" required>
   <label class="form-control-placeholder" for="year_of_exp">Years of exp<span style="color: red">*</span></label>
   @if ($errors->has('year_of_exp'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('year_of_exp') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="buttons" id="document_add" >
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
  <div id="document1"></div>
  <div class="buttons" id="other_del" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>

     
<!-- <div class="col-md-6">
          <div class="form-group">
            <input type="number" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" />
            <label class="form-control-placeholder" for="phone">Phone <span style="color: red">*</span></label>
            @if ($errors->has('phone'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
          </div>
        </div>

         <div class="col-md-6">
          <div class="form-group">
            <input type="number" id="alt_phone" class="form-control" name="alt_phone"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" />
            <label class="form-control-placeholder" for="alt_phone">Alt phone</label>
          </div>
        </div>
        
        
       
      
    <div class="col-md-6">
 <div class="form-group">
       <input type="text" name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))">
       <label class="form-control-placeholder" for="city">City <span style="color: red">*</span></label>
       @if ($errors->has('city'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('city') }}</strong>
      </span>
      @endif

    </div>

</div>
     <div class="col-md-6">
     <div class="form-group">
        <input type="text" name="state" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123))">
        <label class="form-control-placeholder" for="state">State <span style="color: red">*</span></label>
        @if ($errors->has('state'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('state') }}</strong>
        </span>
        @endif
      </div>

    
 </div>
 <div class="col-md-6">
      <div class="form-group"  > 
      {!! Form::countries('country', 'select2', 'form-control','country','required =false' ) !!}
  {!! $errors->first('country', '<span class="alert-msg" >:message</span>') !!}
   <label class="form-control-placeholder" for="country" id="country">Country<span style="color: red">*</span></label>       
        {!! Form::countries('country', 'select2', 'form-control','country','required' ) !!}
        {!! $errors->first('country', '<span class="alert-msg">:message</span>') !!}
        <label class="form-control-placeholder" for="country">Country <span style="color: red">*</span></label> 

      </div>
      
         
       
    </div>
     
    
   
 <div class="col-md-6">
       <div class="form-group">
     <input type="text" name="zipcode" id="zipcode" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" maxlength="8" >
     <label class="form-control-placeholder" for="zipcode">Postal Code <span style="color: red">*</span></label>
     @if ($errors->has('zipcode'))
     <span class="invalid-feedback" role="alert">
       <strong>{{ $errors->first('zipcode') }}</strong>
     </span>
     @endif

   </div>
     
  </div> -->
 

</div>            


</div>
<div class="modal-footer">
  <div class="mx-auto">

   <!--  <button type="button" id="register" class="btn btn-success btn-space" id="arbitrationbutton" onclick="arbitrationbuttonclick()">Save</button> -->
     <button type="submit" id="register" class="btn btn-success btn-space" id="arbitrationbutton" >Save</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>    
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">Close</span>
      </button>            
  </div>
</div> 
</div>             
</form>

</div>
</div>

<script>
    $('#category').change(function(){
    var categoryID = $(this).val(); 
    //alert(categoryID);
    if(categoryID){
        $.ajax({
           type:"GET",
           url:"{{url('/get-dispute-list')}}?dispute_categories_id="+categoryID,
           success:function(res){                      
            if(res){
                $("#subcategory").empty();
                $("#subcategory").append('<option></option>');
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
<script>
  function arbitrationbuttonclick() {
    // var country =  $('#country').val();
    //  alert(country);

  // var arbitrator_code =  $('#arbitrator_code').val();
  //    if (arbitrator_code =='') 
  //    {
  //      swal("Enter Arbitrator Code ", "", "error");
  //    return false;
  //    }
  //    var category =  $('#category').val();
  //    if (category =='') 
  //    {
  //      swal("Enter Main Dispute Category  ", "", "error");
  //    return false;
  //    }
  //    var subcategory =  $('#subcategory').val();
  //    if (subcategory =='') 
  //    {
  //      swal("Enter Sub Dispute Category  ", "", "error");
  //    return false;
  //    }
  //  var firstname =  $('#firstname').val();
  //    if (firstname =='') 
  //    {
  //      swal("Enter First Name ", "", "error");
  //    return false;
  //    }
  //    var lastname =  $('#lastname').val();
  //    if (lastname =='') 
  //    {
  //      swal("Enter Last Name ", "", "error");
  //    return false;
  //    }
  //     var username =  $('#username').val();
  //    if (username =='') 
  //    {
  //      swal("Enter User Name ", "", "error");
  //    return false;
  //    }
  //    var phone =  $('#phone').val();
  //    if (phone =='') 
  //    {
  //      swal("Enter phone Number ", "", "error");
  //    return false;
  //    }
  //    var email =  $('#email').val();
  //    if (email =='') 
  //    {
  //      swal("Enter Email-ID ", "", "error");
  //    return false;
  //    }
  //    var address =  $('#address').val();
  //    if (address =='') 
  //    {
  //      swal("Enter Address ", "", "error");
  //    return false;
  //    }
      
  //    var city =  $('#city').val();
  //    if (city =='') 
  //    {
  //      swal("Enter City ", "", "error");
  //    return false;
  //    }
  //     var state =  $('#state').val();
  //    if (state =='') 
  //    {
  //      swal("Enter State ", "", "error");
  //    return false;
  //    }
  //    var country =  $('#country').val();
  //    if (country =='') 
  //    {
  //      swal("Enter Country ", "", "error");
  //    return false;
  //    }
  //    var zipcode =  $('#zipcode').val();
  //    if (zipcode =='') 
  //    {
  //      swal("Enter Postal Code ", "", "error");
  //    return false;
  //    }
      $("#arbitrationbutton").attr("disabled", true);
     document.getElementById('createForm').submit();
   }
   </script>
<script type="text/javascript">
   var x29 = 2;

    $('#document_add').on('click', function () {
      // alert(x29);
     var max_fields      = 10; 
     var document1      = $("#document1");
     
     
     if(x29 < max_fields){ 
      $(document1).append('<div class="row remove_other"><div class="col-md-1"><input class="form-control" placeholder='+x29+'  type="text" id="placeholder'+x29+'" disabled style="background-color: antiquewhite;"></div><div class="col-md-5"><div class="form-group"><input type="text" id="domain" class="form-control" name="domain[]" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))"><label class="form-control-placeholder" for="domain">Domain Expertise:</label></div></div><div class="col-md-5"><div class="form-group"><input type="text" id="year_of_exp" class="form-control" name="year_of_exp[]" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))"><label class="form-control-placeholder" for="year_of_exp">Years of exp:</label></div></div>'); //add input box
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





<!-- End of create Arbitration modal -->





