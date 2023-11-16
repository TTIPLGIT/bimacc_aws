
<div class="modal fade" id="usernameamendmodal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="usernameamendmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="usernameamendmodal">Change of Name</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
         <form  action="{{ route('user.nameamendupdate, $user')}}" method="POST" enctype="multipart/form-data">

        @csrf 
        <div class="row register-form">
           <input type="number" name="user_id" style="display: none" value="{{$user->id}}">

          
          <div class="col-md-6">
             <div class="form-group">
                  <input type="text" name="firstname" class="form-control"  value="{{ $claimantinformation[0]->name }}" />
                 
                  <label class="form-control-placeholder" for="firstname">Name<span style="color: red">*</span></label>
                 
                  
                  @if ($errors->has('firstname'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                  </span>
                  @endif  
                </div>
          </div>
          
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

    

<script type="text/javascript">
  window.onload=function() {
    setTimeout(function() {
      document.getElementById('submitButton').disabled = false;
    }, 5000); 
  }
</script>





