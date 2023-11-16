@foreach ($claimnotice as $notice) 
<div class="modal fade" id="amendclaimantpetionmodal{{$notice->id}}" tabindex="-1" role="dialog" aria-labelledby="amendclaimantpetionmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
         @if ($claimanttype[0]->claimant_respondant_type_Code =='IS' )
        <h5 class="modal-title" id="amendclaimantmodal">Change of POA Holder-{{$notice->claimnoticeno}}</h5>
        @else
        <h5 class="modal-title" id="amendclaimantmodal">Change of Authorised Representative-{{$notice->claimnoticeno}}</h5>
        @endif
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
         <form  action="{{ route('ClaimPetion.amendupdate') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="row register-form">
          <input type="number" name="claimnoticeid" style="display: none"  value="{{$notice->id}}">
          <input type="text" name="claimnoticeno" style="display: none"  value="{{$notice->claimnoticeno}}">
         @if ($claimanttype[0]->claimant_respondant_type_Code =='IS' )
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="poa_holder" class="form-control{{ $errors->has('poa_holder') ? ' is-invalid' : '' }}" name="poa_holder" value="{{$notice->poa_holder}}" required>
              <label class="form-control-placeholder" for="poa_holder">Add/Change POA Holder</label>
              @if ($errors->has('poa_holder'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('poa_holder') }}</strong>
              </span>
              @endif
            </div>


          </div>
          @else
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="organization_details" class="form-control{{ $errors->has('organization_details') ? ' is-invalid' : '' }}" name="organization_details" value="{{$notice->organization_details}}" required>
              <label class="form-control-placeholder" for="organization_details">Change of Authorised Representative</label>
              @if ($errors->has('organization_details'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('organization_details') }}</strong>
              </span>
              @endif
            </div>


          </div>
          @endif
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
    @endforeach

<script type="text/javascript">
  window.onload=function() {
    setTimeout(function() {
      document.getElementById('submitButton').disabled = false;
    }, 5000); 
  }
</script>





