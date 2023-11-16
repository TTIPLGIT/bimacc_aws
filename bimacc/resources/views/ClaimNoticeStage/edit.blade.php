
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
        method="POST" enctype="multipart/form-data" id="bimaccform">
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
<!-- 
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
      </div> -->

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
          <input type="date" id="stagetodate" name="stagetodate" class="form-control" required value="{{$ClaimNoticeStages->stagetodate }}">

          @if ($errors->has('stagetodate'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('stagetodate') }}</strong>
          </span>
          @endif  
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label  for="claimantnotice_stage_status">Stage Status</label>
          @if($ClaimNoticeStages->claimantnotice_Stage !="Award Stage")
          
          <select class="form-control" name="claimantnotice_stage_status">
            @if($ClaimNoticeStages->claimantnotice_stage_status=="Initiated")
            <option value="InProgress" selected>InProgress</option> 
            @endif
            @if($ClaimNoticeStages->claimantnotice_stage_status=="InProgress")
            <option value="Completed" selected>Completed</option>
            @endif
            @if($ClaimNoticeStages->claimantnotice_stage_status=="Completed")
            <option value="Disposed" selected>Disposed</option>
            @endif
          </select>
          @else
          <select class="form-control" name="claimantnotice_stage_status">
            <option value="Award Reserved By Arbitrator" selected>Reserved for Award</option>
          </select>
          @endif

         <!--  <label class="form-control-placeholder" for="claimantnotice_stage_status">Stage Status *</label> -->
          @if ($errors->has('claimantnotice_stage_status'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claimantnotice_stage_status') }}</strong>
          </span>
          @endif
        </div>
      </div>

      @if($ClaimNoticeStages->claimantnotice_Stage == "Award Stage")
      <div class="col-md-6">
        <div class="form-group">
          <label  for="awardedstatementdocument">Awarded Statement Document Upload</label><span style="color: red">*</span>
          <input type="file" name="awardedstatementdocument" id="awardedstatementdocument" class="form-control" required>
          @if ($errors->has('awardedstatementdocument'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('awardedstatementdocument') }}</strong>
          </span>
          
          @endif  
        </div>
      </div>
      <!-- <div class="col-md-6">
        <div class="form-group">
          <label  for="arbitrator_sign">Digital Signature Document Upload</label>
          <input type="file" name="arbitrator_sign" id="arbitrator_sign" class="form-control" >
          @if ($errors->has('arbitrator_sign'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('arbitrator_sign') }}</strong>
          </span>
          
          @endif  
        </div>
      </div> -->

       <div class="col-md-6">
        <div class="form-group">
          <label  for="nature_of_award">Nature Of Award</label><span style="color: red">*</span> 
        
        <select class="form-control" name="nature_of_award" id="nature_of_award " required>
          <option value="">Select</option>                
          <option value="Claim Petition Allowed">Claim Petition Allowed</option>
          <option value="Claim Petition Party Allowed">Claim Petition Partly Allowed</option> 
          <option value="Claim Petition Dismissed">Claim Petition Dismissed</option>     
          <option value="Claim Petition Dismissed Counter Claim Allowed">Claim Petition Dismissed Counter Claim Allowed</option>
          <option value="Claim Petition Dismissed Counterclaim Party Allowed">Claim Petition Dismissed Counterclaim Partly Allowed</option>     
          <option value="Claim Petition and Counter Claim Allowed">Claim Petition and Counter Claim Allowed
          </option>     
          <option value="Claim Petition and Counter Claim Party Allowed">Claim Petition and Counter Claim Partly Allowed</option>  
          <option value="Claim Petition Party Allowed,Counter Claim Dismissed">Claim Petition Partly Allowed,Counter Claim Dismissed</option>     
          <option value="Claim petiton and Counter Claim Dismissed">Claim petiton and Counter Claim Dismissed</option>        

        </select>
      </div>
    </div>
      @endif
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
      
        @if($ClaimNoticeStages->claimantnotice_stage_status=="Initiated")
       <button type="submit" id="register" class="btn btn-success btn-space">Mark As Complete</button>
       
       @elseif($ClaimNoticeStages->claimantnotice_stage_status=="InProgress")
       <button type="submit" id="register" class="btn btn-success btn-space">Next Stage</button>
     @else
       <button type="submit" id="register" class="btn btn-success btn-space">Update Stage</button>
       @endif
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
 <!-- <script type="text/javascript">
   function bimaccbuttonclick() {
    var awardedstatementdocument =  $('#awardedstatementdocument').val();
     //alert(disputecategory);
     if (awardedstatementdocument =='') {
       swal("Please upload document", "", "error");
     return false;
     }
 $("#register").attr("disabled", true);
     document.getElementById('bimaccform').submit();
    
   }
 </script> -->