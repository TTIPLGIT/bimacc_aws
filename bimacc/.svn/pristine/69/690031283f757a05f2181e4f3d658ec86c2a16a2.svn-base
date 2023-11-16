
@foreach ($arbitrationmasters as $arbitrationmaster) 
<div class="modal fade fade-scale" id="editArbitrationMasterModal{{$arbitrationmaster->id}}" tabindex="-1" role="dialog" aria-labelledby="editArbitrationMasterlabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="modal-header">
        <h5 class="modal-title" id="editArbitrationMasterlabel">Edit Arbitrator</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 

        <form  action="{{ route('arbitrationmaster.update', $arbitrationmaster->id ) }}" method="POST" id = "editForm"> 
 
          @csrf
          @method('PUT') 


          <div class="row register-form">
             <div class="col-md-6">
            <div class="form-group">
                <input type="text" id="arbitrator_code" class="form-control{{ $errors->has('arbitrator_code') ? ' is-invalid' : '' }}" name="arbitrator_code" value="{{$arbitrationmaster->arbitrator_code }}" required readonly>
                <label id="arbitrator_code" class="form-control-placeholder" for="arbitrator_code">Arbitrator Code<span style="color: red">*</span></label>
                @if ($errors->has('arbitrator_code'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('arbitrator_code') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div>
            
           <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="firstname" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname"  value="{{$arbitrationmaster->firstname }}" required>
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
                <input type="text" id="miiddlename" class="form-control {{ $errors->has('miiddlename') ? ' is-invalid' : '' }}" name="miiddlename"  value="{{$arbitrationmaster->miiddlename }}">
                <label id="miiddlename" class="form-control-placeholder" for="miiddlename">Middle Name<span style="color: red">*</span></label>
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
               "lastname" class="form-control" value="{{$arbitrationmaster->lastname }}" required>
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
             <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  autofocus value="{{$arbitrationmaster->email }}" required>
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
   <input type="text" name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->address }}" required>
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
   <input type="text" name="qualification" id="qualification" class="form-control{{ $errors->has('qualification') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->qualification }}" required>
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
   <input type="text" name="language_prof" id="language_prof" class="form-control{{ $errors->has('language_prof') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->language_prof }}" required>
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
   <input type="number" name="age" id="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->age }}" required>
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
   <input type="date" name="dob" id="dob" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->dob }}" required>
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
   <input type="number" name="experience" id="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->experience }}" required> 
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
   <input type="text" name="training" id="training" class="form-control{{ $errors->has('training') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->training }}">
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
   <input type="text" name="no_of_arbitration" id="no_of_arbitration" class="form-control{{ $errors->has('no_of_arbitration') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->no_of_arbitration }}" required>
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
   <input type="number" name="no_of_arbitration_rep" id="no_of_arbitration_rep" class="form-control{{ $errors->has('no_of_arbitration_rep') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->no_of_arbitration_rep }}" required>
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
   <input type="number" name="prof_experience" id="prof_experience" class="form-control{{ $errors->has('prof_experience') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->prof_experience }}" required>
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
   <input type="text" name="present_prof" id="present_prof" class="form-control{{ $errors->has('present_prof') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->present_prof }}" required>
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
   <input type="text" name="prior_position" id="prior_position" class="form-control{{ $errors->has('prior_position') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->prior_position }}" required>
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
   <input type="text" name="membership" id="membership" class="form-control{{ $errors->has('membership') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->membership }}" required>
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
   <input type="text" name="litigation" id="litigation" class="form-control{{ $errors->has('litigation') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->litigation }}">
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
   <input type="text" name="conf_interest" id="conf_interest" class="form-control{{ $errors->has('conf_interest') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->conf_interest }}" required>
   <label class="form-control-placeholder" for="conf_interest">Conflict of interest<span style="color: red">*</span></label>
   @if ($errors->has('conf_interest'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('conf_interest') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
     @php
$count1=1;
@endphp
    @foreach ($experience_details  as $experience_detail )
    @if($arbitrationmaster->id == $experience_detail->arbitrator_id)
    
    <div class="col-md-1"><input class="form-control"  type="text" disabled style="
    background-color: azure;" value="{{ $count1}}"></div>
    <div class="col-md-5"> 
      <div class="form-group">
   <input type="text" id="domain" class="form-control{{ $errors->has('domain') ? ' is-invalid' : '' }}" value="{{$experience_detail->domain }}" name="domain[]">
   <label class="form-control-placeholder" for="domain">Domain Expertise<span style="color: red">*</span></label>
   @if ($errors->has('domain'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('domain') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="col-md-6">
      <div class="form-group">
   <input type="text" id="year_of_exp" class="form-control{{ $errors->has('year_of_exp') ? ' is-invalid' : '' }}" value="{{$experience_detail->year_of_exp }}" name="year_of_exp[]">
   <label class="form-control-placeholder" for="year_of_exp">Years of exp<span style="color: red">*</span></label>
   @if ($errors->has('year_of_exp'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('year_of_exp') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
 @php
$count1=$count1+1;
@endphp
    @endif

    @endforeach
    <div class="col-md-1"><input class="form-control place_{{$arbitrationmaster->id}}" placeholder="{{$count1}}"  type="text" disabled style="
    background-color: azure;
"></div>
    <div class="col-md-5">
      <div class="form-group">
   <input type="text" name="domain[]" id="domain" class="form-control{{ $errors->has('domain') ? ' is-invalid' : '' }}" >
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
   <input type="text" name="year_of_exp[]" id="year_of_exp" class="form-control{{ $errors->has('year_of_exp') ? ' is-invalid' : '' }}" >
   <label class="form-control-placeholder" for="year_of_exp">Years of exp<span style="color: red">*</span></label>
   @if ($errors->has('year_of_exp'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('year_of_exp') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    <div class="buttons"  onclick="yearsofexperience('{{$arbitrationmaster->id}}')">
  <span class="btn btn-icon btn-sm btn-success">
    <i class="far fa-plus-square"></i></span>
  </div>
  <div id="document1{{$arbitrationmaster->id}}"></div>
  <div class="buttons" id="other_del{{$arbitrationmaster->id}}" onclick="yearsofexperience_deleted('{{$arbitrationmaster->id}}',event)" style="display:none;"><span class="btn btn-icon btn-sm btn-danger remove"> <i class="fas fa-window-close"></i></span> </div>

     

 

</div>            


             



  <div class="modal-footer">
    <div class="mx-auto">
      <button type="submit" class="btn btn-success btn-space">Update</button> 
      <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">Cancel</span>
      </button>                      


    </div>
  </div> 
</div>             
</form>

</div>
</div>
</div>
</div>
<script>
  $('.disputecategory1').change(function(){  

    var categoryID = $(this).val();    



    if(categoryID){
      $.ajax({
       type:"GET",
       url:"{{url('/get-dispute-list')}}?dispute_categories_id="+categoryID,
       dataType:"json", 
       data:{categoryID:categoryID},          
       success:function(res){
        if(res){
          $(".disputesubcategory1").empty();
          $(".disputesubcategory1").append('<option></option>');
          $.each(res,function(key,value){                                  
            $(".disputesubcategory1").append('<option value="'+key+'">'+value+'</option>');

          });

        }else{
         $(".disputesubcategory1").empty();
       }

     }
   });
    } 

  });

</script>   

 
@endforeach
<script type="text/javascript">
   function yearsofexperience(id) {
   var class_val = $(".place_"+id).last();
  var x2=class_val.attr('placeholder');
     var max_fields      = 10; 
     var document1      = $("#document1"+id);
     
     
     if(x2 < max_fields){ 
       x2++;
      $(document1).append('<div class="row remove_other"><div class="col-md-1"><input class="form-control place_'+id+'" placeholder='+x2+'  type="text" disabled style="background-color: azure;"></div><div class="col-md-5"><div class="form-group"><input type="text" id="domain" class="form-control" name="domain[]" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))"><label class="form-control-placeholder" for="domain">Domain Expertise:</label></div></div><div class="col-md-5"><div class="form-group"><input type="text" id="year_of_exp" class="form-control" name="year_of_exp[]" onkeypress="return (event.charCode > 64 && event.charCode < 91 || (event.charCode > 96 && event.charCode < 123)|| event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57))"><label class="form-control-placeholder" for="year_of_exp">Years of exp:</label></div></div>'); //add input box
        // $(wrapper2).append('<div><a href="#" class="remove_field">Remove</a></div>'); 
       
      }
     $("#other_del"+id).css('display','block');
      
    }
     function yearsofexperience_deleted(id,e) {
    
         e.preventDefault(); 
        var div=$(".remove_other");
        $('.remove_other:last').remove();
        x2--;
         if($(".remove_other").length==0){
        $("#other_del"+id).css('display','none');
      }
      }
  </script>








