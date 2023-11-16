
@foreach ($ClaimNoticeStage as $ClaimNoticeStages)

<!-- create Arbitration modal -->
<div class="modal hide fade" id="editclaimstageTypeModal{{$ClaimNoticeStages->id}}" tabindex="-1" role="dialog" aria-labelledby="createclaimstagelabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
    <div class="modal-content">  
      <div class="modal-header">
        <h5 class="modal-title" id="editclaimstagelabel">Edit Stage for {{$notice->claimnoticeno}}</h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 

       <form id="createForm" action="{{ route('ClaimNoticeStage.update',$ClaimNoticeStages->id) }}" 
        method="POST" enctype="multipart/form-data" >
        @csrf 
        @method('PUT') 
        <div class="row register-form">
         <div class="col-md-6">
          <div class="form-group">
            <label  >Case Status</label>
            <input type="text" id="claimantnotice_Stage1" name="claimantnotice_Stage1" class="form-control"  
            value="{{$ClaimNoticeStages->claimantnotice_Stage}}" required disabled>

            @if ($errors->has('claimantnotice_Stage1'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('claimantnotice_Stage1') }}</strong>
            </span>
            @endif  
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
           <label>Claim Stage Description</label>
           <textarea id="claimantnotice_stage_descriptions" name="claimantnotice_stage_descriptions" class="form-control" required  value="{{$ClaimNoticeStages->claimantnotice_stage_description}}" disabled>{{$ClaimNoticeStages->claimantnotice_Stage}}</textarea>

           @if ($errors->has('claimantnotice_stage_description'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claimantnotice_stage_description') }}</strong>
          </span>
          @endif  
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="stagefromdate">Stage Start Date</label>
          <input type="date" id="stagefromdate" name="stagefromdate" class="form-control" required value="{{$ClaimNoticeStages->stagefromdate}}" disabled>

          @if ($errors->has('stagefromdate'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('stagefromdate') }}</strong>
          </span>
          @endif  
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label  for="stagetodate">Time ends by midnight of</label>
          <input type="date" id="stagetodate" name="stagetodate" class="form-control" required value="{{$ClaimNoticeStages->stagetodate }}" disabled>

          @if ($errors->has('stagetodate'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('stagetodate') }}</strong>
          </span>
          @endif  
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label  for="stageextensionremarks">Stage Extension Reason</label>

          <textarea id="stageextensionremarks" name="stageextensionremarks" class="form-control">
            
          </textarea>
          

          @if ($errors->has('stageextensionremarks'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('stageextensionremarks') }}</strong>
          </span>
          @endif  
        </div>
      </div>

      <div class="col-md-6" style="">
        <div class="form-group">
          <input type="hidden" id="claimnoticeid" name="claimnoticeid" value="{{$notice->id}}">
          <input type="hidden" id="claimantnotice_Stage" name="claimantnotice_Stage" value="{{$ClaimNoticeStages->claimantnotice_Stage}}">
           <input type="hidden" id="claimnoticestageid" name="claimnoticestageid" value="{{$ClaimNoticeStages->id}}">
          <input type="hidden" id="claimnoticeno" name="claimnoticeno" value="{{$notice->claimnoticeno}}">
          <input type="hidden" id="claimantnotice_stage_description" name="claimantnotice_stage_description" value="{{$ClaimNoticeStages->claimantnotice_stage_description}}">
          <input type="hidden" id="arbitration_petionno" name="arbitration_petionno" value="{{$notice->arbitration_petionno}}">
          <input type="hidden" id="alfresco_stage_folderuniqueid" name="alfresco_stage_folderuniqueid" value="{{$ClaimNoticeStages->alfresco_stage_folderuniqueid}}">
        </div>
      </div>
    </div>            
  </div>
  <div class="modal-footer">
    <div class="mx-auto">
      <button type="submit" id="register" class="btn btn-success btn-space" >Send Request</button>
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
@endforeach
<!-- End of create Arbitration modal -->