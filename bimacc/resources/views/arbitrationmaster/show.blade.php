@if($arbitrationcount = 0)
 $arbitrationmasters = ArbitrationMaster::findOrFail($id);
 @endif
@foreach ($arbitrationmasters as $arbitrationmaster)
<div class="modal fade" id="showArbitrationMasterModal{{$arbitrationmaster->id}}" tabindex="-1" role="dialog" aria-labelledby="showArbitrationMasterlabel" aria-hidden="true">
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
                    <h5 class="modal-title" id="showArbitrationMasterlabel">Arbitrator's Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">             
                       

                <div class="row register-form">
                     <div class="col-md-6">
            <div class="form-group">
                <input type="text" id="arbitrator_code" class="form-control{{ $errors->has('arbitrator_code') ? ' is-invalid' : '' }}" name="arbitrator_code" value="{{$arbitrationmaster->arbitrator_code }}" >
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
                <input type="text" id="firstname" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname"  value="{{$arbitrationmaster->firstname }}">
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
               "lastname" class="form-control" value="{{$arbitrationmaster->lastname }}">
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
             <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  autofocus value="{{$arbitrationmaster->email }}">
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
   <input type="text" name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->address }}">
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
   <input type="text" name="qualification" id="qualification" class="form-control{{ $errors->has('qualification') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->qualification }}">
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
   <input type="text" name="language_prof" id="language_prof" class="form-control{{ $errors->has('language_prof') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->language_prof }}">
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
   <input type="text" name="age" id="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->age }}">
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
   <input type="date" name="dob" id="dob" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->dob }}">
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
   <input type="text" name="experience" id="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->experience }}">
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
   <input type="text" name="no_of_arbitration" id="no_of_arbitration" class="form-control{{ $errors->has('no_of_arbitration') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->no_of_arbitration }}">
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
   <input type="text" name="no_of_arbitration_rep" id="no_of_arbitration_rep" class="form-control{{ $errors->has('no_of_arbitration_rep') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->no_of_arbitration_rep }}">
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
   <input type="text" name="prof_experience" id="prof_experience" class="form-control{{ $errors->has('prof_experience') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->prof_experience }}">
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
   <input type="text" name="present_prof" id="present_prof" class="form-control{{ $errors->has('present_prof') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->present_prof }}">
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
   <input type="text" name="prior_position" id="prior_position" class="form-control{{ $errors->has('prior_position') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->prior_position }}">
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
   <input type="text" name="membership" id="membership" class="form-control{{ $errors->has('membership') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->membership }}">
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
   <input type="text" name="conf_interest" id="conf_interest" class="form-control{{ $errors->has('conf_interest') ? ' is-invalid' : '' }}" value="{{$arbitrationmaster->conf_interest }}">
   <label class="form-control-placeholder" for="conf_interest">Conflict of interest<span style="color: red">*</span></label>
   @if ($errors->has('conf_interest'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('conf_interest') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    @foreach ($experience_details  as $experience_detail )
    @if($arbitrationmaster->id == $experience_detail->arbitrator_id)
   <!--  <div class="col-md-1"><input class="form-control"  type="text" disabled style="
    background-color: azure;" value="{{ $loop->iteration}}"></div> -->
    <div class="col-md-6">
      <div class="form-group">
   <input type="text" id="domain" class="form-control{{ $errors->has('domain') ? ' is-invalid' : '' }}" value="{{$experience_detail->domain }}">
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
   <input type="text" id="year_of_exp" class="form-control{{ $errors->has('year_of_exp') ? ' is-invalid' : '' }}" value="{{$experience_detail->year_of_exp }}">
   <label class="form-control-placeholder" for="year_of_exp">Years of exp<span style="color: red">*</span></label>
   @if ($errors->has('year_of_exp'))
   <span class="invalid-feedback" role="alert">
     <strong>{{ $errors->first('year_of_exp') }}</strong>
   </span>
   @endif

 </div>
      
    </div>
    @endif
    @endforeach
    
                      <!--   <div class="col-md-6">
                            <div class="form-group">
                                 <strong>Arbitrator Code:</strong>
                                {{ $arbitrationmaster->arbitrator_code }}
                            </div>
                            <div class="form-group">
                                 <strong>Arbitrator Name:</strong>
                                {{ $arbitrationmaster->username }}
                                 

                            </div>
                            <div class="form-group">
                              <strong>Arbitrator Email:</strong>
                                {{ $arbitrationmaster->email }} 
                                 @if( $arbitrationmaster->mail_verify=='1') -->
           <!-- <td style="color: #62b662;font-weight: bolder;">Verified</td> -->
           <!--  <span style="color: #62b662;font-weight: bolder;">&#10003;</span> 
           @else
         
           @endif 
                            </div>
                            <div class="form-group">
                              <strong>Arbitrator Contact:</strong>
                                {{ $arbitrationmaster->phone }}
                           </div>
                           <div class="form-group">
                              <strong>Arbitrator Address:</strong>
                                {{ $arbitrationmaster->address }}
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                         <strong>Arbitrator Country:</strong>
                                {{ $arbitrationmaster->country }}
                     </div>
                     <div class="form-group">
                          <strong>Arbitrator State:</strong>
                                {{ $arbitrationmaster->state }}
                    <div class="form-group">
                     <strong>Arbitrator City:</strong>
                                {{ $arbitrationmaster->city }}
                 </div>

                 <div class="form-group">
                     <strong>Created At:</strong>
                    {{ $arbitrationmaster->created_at }}
                 </div>

                

            </div>
</div> -->              
</div>
    <div class="modal-footer">
                <div class="mx-auto">
                     <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">Cancel</span>
                        </button>             
                </div>
    </div> 
            </div>             
     
    </div>
    </div>
    </div>
    </div>
    @endforeach






