@foreach ($claimnotice as $notice)
<div class="modal fade" id="amendrespondantpetionmodal{{$notice->id}}" tabindex="-1" role="dialog" aria-labelledby="amendrespondantpetionmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
         @if ($respondantinformations[0]->claimant_respondant_type_Code =='IS' )
        <h5 class="modal-title" id="amendrespondantpetionmodal">Amend Details
-{{$notice->claimnoticeno}}</h5>
        @else
        <h5 class="modal-title" id="amendrespondantpetionmodal">Amend Details
-{{$notice->claimnoticeno}}</h5>
        @endif
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
         <form  action="{{ route('ClaimPetion.resamendupdate') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="row register-form">
          <input type="number" name="claimnoticeid" style="display: none"  value="{{$notice->id}}">
          <input type="text" name="claimnoticeno" style="display: none"  value="{{$notice->claimnoticeno}}">
          <input type="text" name="user_id" style="display: none"  value="{{$notice->respondant_id}}">
          @if ($respondantinformations[0]->claimant_respondant_type_Code =='IS' )
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="poa_holder" class="form-control{{ $errors->has('poa_holder') ? ' is-invalid' : '' }}" name="poa_holder" value="{{$notice->poa_holder}}">
              <label class="form-control-placeholder" for="poa_holder">Change of POA Holder/Authorised Representative: Full Name of Individual <span style="color: red">*</span></label>
              @if ($errors->has('organization_details'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('poa_holder') }}</strong>
              </span>
              @endif
            </div>


          </div>
          @else
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="auth_name" class="form-control{{ $errors->has('auth_name') ? ' is-invalid' : '' }}" name="auth_name" value="{{$notice->auth_name}}" required>
              <label class="form-control-placeholder" for="auth_name">Change of POA Holder/Authorised Representative: Full Name of Individual<span style="color: red">*</span> </label>
              @if ($errors->has('auth_name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('auth_name') }}</strong>
              </span>
              @endif
            </div>


          </div>
          @endif
          <div class="col-md-6">
            <div class="form-group">
              <h7></h7>
              <input type="file" 
              class="form-control{{ $errors->has('fileupload_auth') ? ' is-invalid' : '' }}"
              name="fileupload_auth" required>
              <label class="form-control-placeholder" for="fileupload_auth" 
              >Upload Proof<span style="color: red">*</span></label>
              @if ($errors->has('fileupload_auth'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('fileupload_auth') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="firstname" class="form-control"  value="{{ $notice->firstname }}" />
                  <label class="form-control-placeholder" for="firstname">Change of Entity Name<span style="color: red">*</span></label>
                  @if ($errors->has('firstname'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                  </span>
                  @endif  
                </div>
              </div>
              <!-- <div class="col-md-3">
                <div class="form-group">
                  <input type="text" name="lastname" class="form-control"  value="{{ $notice->lastname }}" />
                  <label class="form-control-placeholder" for="lastname">Lastname</label>
                  @if ($errors->has('lastname'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lastname') }}</strong>
                  </span>
                  @endif  
                </div>
              </div> -->
              <div class="col-md-6">
                <div class="form-group">
                  <h7></h7>
                  <input type="file" 
                  class="form-control{{ $errors->has('fileupload') ? ' is-invalid' : '' }}"
                  name="fileupload" required>
                  <label class="form-control-placeholder" for="fileupload" 
                  >Upload Proof<span style="color: red">*</span></label>
                  @if ($errors->has('fileupload'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fileupload') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="address" value="{{ $notice->address }}">
                  <label class="form-control-placeholder" id="address" for="address">Change of Address<span style="color: red">*</span></label>
                  @if ($errors->has('address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                  </span>
                  @endif  
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h7></h7>
                  <input type="file" 
                  class="form-control{{ $errors->has('fileidproof') ? ' is-invalid' : '' }}"
                  name="fileidproof" required>
                  <label class="form-control-placeholder" for="fileidproof" 
                  >Upload Proof<span style="color: red">*</span></label>
                  @if ($errors->has('fileidproof'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fileidproof') }}</strong>
                  </span>
                  @endif
                </div>
              </div>


        </div>              


<div class="modal-footer">
        <div class="mx-auto">
          <button type="submit" class="btn btn-success btn-space"> Save</button>
          <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
          <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
           Close
         </button>           
       </div> 
</div>
       </form>
     </div>
   </div>
 </div>
</div>
    @endforeach

<script type="text/javascript">
  window.onload=function() {
    setTimeout(function() {
      document.getElementById('submitButton').disabled = false;
    }, 5000); 
  }
</script>





