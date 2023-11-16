  <!-- create Arbitration modal -->
  <div class="modal hide fade" id="createclaimstageTypeModal" tabindex="-1" role="dialog" aria-labelledby="createclaimstagelabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
      <div class="modal-content">  

        <div class="modal-header">

          <h5 class="modal-title" id="createclaimstagelabel">Create Stage for {{$notice->claimnoticeno}}</h5>

          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"> 
         
         <form id="createForm" action="{{ route('ClaimNoticeStage.store') }}" method="POST" >
           @csrf 
           <div class="row register-form">
             <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="claimantnotice_Stage" name="claimantnotice_Stage" class="form-control" required>
                <label class="form-control-placeholder" for="claimantnotice_Stage">Stage Name</label>
                @if ($errors->has('claimantnotice_Stage'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('claimantnotice_Stage') }}</strong>
                </span>
                @endif  
              </div>
            </div>

             <div class="col-md-6">
              <div class="form-group">
                <textarea id="claimantnotice_stage_description" name="claimantnotice_stage_description" class="form-control" required></textarea>
                <label class="form-control-placeholder" for="claimantnotice_stage_description">Claim Stage Description</label>
                @if ($errors->has('claimantnotice_stage_description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('claimantnotice_stage_description') }}</strong>
                </span>
                @endif  
              </div>
            </div>

             <div class="col-md-6">
              <div class="form-group">
                <input type="date" id="stagefromdate" name="stagefromdate" class="form-control" required>
                <label class="form-control-placeholder" for="stagefromdate">Stage Start Date</label>
                @if ($errors->has('stagefromdate'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('stagefromdate') }}</strong>
                </span>
                @endif  
              </div>
            </div>

             <div class="col-md-6">
              <div class="form-group">
                <input type="date" id="stagetodate" name="stagetodate" class="form-control" required>
                <label class="form-control-placeholder" for="stagetodate">Stage To Date</label>
                @if ($errors->has('stagetodate'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('stagetodate') }}</strong>
                </span>
                @endif  
              </div>
            </div>

             <div class="col-md-6" style="">
              <div class="form-group">
                <input type="hidden" id="claimnoticeid" name="claimnoticeid" value="{{$notice->id}}">
              </div>
            </div>
          </div>            


        </div>
        <div class="modal-footer">
          <div class="mx-auto">

            <button type="submit" id="register" class="btn btn-success btn-space" >Save</button>
            <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
            <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">Cancel</span>
            </button>              
          </div>
        </div> 
      </div>             
    </form>

  </div>
</div>

<!-- End of create Arbitration modal -->