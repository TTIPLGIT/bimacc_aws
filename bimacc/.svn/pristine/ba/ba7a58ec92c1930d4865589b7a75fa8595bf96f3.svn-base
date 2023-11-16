@if($ClaimNoticeStagescount = 0)
$ClaimNoticeStages = ClaimNoticeStage::findOrFail($id);
@endif
@foreach ($ClaimNoticeStages as $ClaimNoticeStagess)
<div class="modal fade" id="showClaimNoticeStageModal{{$ClaimNoticeStagess->id}}" tabindex="-1" role="dialog" aria-labelledby="showClaimentRespondantTypelabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="showClaimNoticeStagelabel">Show Claimnotice Stage</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">             
        <div class="row register-form">
          <div class="col-md-6">
            <div class="form-group">
             <strong>Stage Name:</strong>
             {{ $ClaimNoticeStagess->claimantnotice_Stage }}
           </div>
           <div class="form-group">
            <strong>Stage Description:</strong>
            {{ $ClaimNoticeStagess->claimantnotice_stage_description }}  
          </div>
          <div class="form-group">
            <strong>Stage From Date:</strong>
            {{ $ClaimNoticeStagess->stagefromdate }}  
          </div>
           <div class="form-group">
            <strong>Stage To Date:</strong>
            {{ $ClaimNoticeStagess->stagetodate }}  
          </div>
          <div class="form-group">
            <strong>Stage Status:</strong>
            {{ $ClaimNoticeStagess->stagefromdate }}  
          </div>
        </div>
      </div>              
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






