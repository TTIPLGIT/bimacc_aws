
@foreach ($ClaimNoticeStage as $ClaimNoticeStages)
<!-- create Arbitration modal -->
<div class="modal hide fade" id="editclaimstageTypeModal{{$ClaimNoticeStages->id}}" tabindex="-1" role="dialog" aria-labelledby="createclaimstagelabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
    <div class="modal-content">  
      <div class="modal-header">
        <h5 class="modal-title" id="editclaimstagelabel">Statement of Objection Document Upload for  Petion No - {{$notice->arbitration_petionno}}</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form id="createForm"  method="POST" enctype="multipart/form-data"  >
          @csrf 
          @method('PUT')
          <div class="row register-form">
           <div class="col-md-6">
            <div class="form-group">
              <label  >Stage Name</label>
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
             <textarea id="claimantnotice_stage_description" name="claimantnotice_stage_description" class="form-control" required value="{{$ClaimNoticeStages->claimantnotice_stage_description}}" disabled>{{$ClaimNoticeStages->claimantnotice_stage_description}}</textarea>
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
            <label  for="stagetodate">Stage To Date</label>
            <input type="date" id="stagetodate" name="stagetodate" class="form-control" required value="{{$ClaimNoticeStages->stagetodate}}" disabled>
            @if ($errors->has('stagetodate'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('stagetodate') }}</strong>
            </span>
            @endif  
          </div>
        </div>
      </div>  
    </form>           
  </div>
  <div class="modal-body"> 
    <div class="col-md-12">
      <label for="inputCity">Upload Documents</label>
      <form class="dropzone" id="dropzone">
        @csrf
        <div class="form-group row">
          <div class="col-md-6" style="">
            <div class="form-group">
              <input type="hidden" id="claimnoticeid" name="claimnoticeid" value="{{$notice->id}}">
              <input type="hidden" id="claimnoticestageid" name="claimnoticestageid" value="{{$ClaimNoticeStages->id}}">
               <input type="hidden" id="claimantnotice_stage_status" name="claimantnotice_stage_status" value="{{$ClaimNoticeStages->claimantnotice_stage_status}}">
              <input type="hidden" id="claimnoticeno" name="claimnoticeno" value="{{$notice->claimnoticeno}}">
              <input type="hidden" id="claimantnotice_Stage" name="claimantnotice_Stage" value="{{$ClaimNoticeStages->claimantnotice_Stage}}">
              <input type="hidden" id="arbitration_petionno" name="arbitration_petionno" value="{{$notice->arbitration_petionno}}">
            </div>
          </div>
        </form>
      </div>
      <form id="createForm" action="{{ route('claimantrespondantaccess.update',$ClaimNoticeStages->id) }}" method="POST"  >
       @csrf 
       @method('PUT')
       <div class="col-md-12">
        <div class="form-group">
          <label  for="remarks">Remarks</label>
          <textarea class="form-control" name="remarks" id="remarks" required></textarea>
          @if ($errors->has('remarks'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('remarks') }}</strong>
          </span>
          @endif  
        </div>
      </div>
      <input type="hidden" id="claimnoticeid" name="claimnoticeid" value="{{$notice->id}}">
      <input type="hidden" id="claimnoticestageid" name="claimnoticestageid" value="{{$ClaimNoticeStages->id}}">
       <input type="hidden" id="claimantnotice_Stage" name="claimantnotice_Stage" value="{{$ClaimNoticeStages->claimantnotice_stagenew}}">
      <input type="hidden" id="claimnoticeno" name="claimnoticeno" value="{{$notice->claimnoticeno}}">
      <input type="hidden" id="alfresco_stage_folderuniqueid" name="alfresco_stage_folderuniqueid" value="{{$ClaimNoticeStages->alfresco_stage_folderuniqueid}}">
      <input type="hidden" id="arbitration_petionno" name="arbitration_petionno" value="{{$notice->arbitration_petionno}}">
      <div class="modal-footer">
        <div class="mx-auto">
          <button type="submit" id="register" class="btn btn-success btn-space" >Upload Documents</button>
          <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
          <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">Cancel</span>
          </button>              
        </div>
      </div>
    </form>
  </div>

</div>

</div>           



</div>
</div>


        <!-- End of create Arbitration modal -->
         <script type="text/javascript">
  Dropzone.options.dropzone =
  {
    maxFilesize: 1000,
    renameFile: function(file) {
      var dt = new Date();
      var time = dt.getTime();

      return file.name;
    },

    acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,.xlsx,.pptx,.xls,.doc,.docx",
    addRemoveLinks: true,
    timeout: 5000,
    url: "{{ route('ClaimPetion.respondentupload')}}",
    success: function(file, response) 
    {

      console.log(response);
    },
    error: function(file, response)
    {
              // alert("zsdzxczxczxc");
              return false;
            },
            removedfile: function(file)
            {
              var name = file.upload.filename;
              var petition_no =$('#arbitration_petionno').val();
              $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('ClaimPetion.respondentremove')}}",
                data: {filename: name,petition_no: petition_no},
                success: function (data){
                  console.log("File has been successfully removed!!");
                },
                error: function(e) {
                  console.log(e);
                }                    
              });
              var fileRef;
              return (fileRef = file.previewElement) != null ? 
              fileRef.parentNode.removeChild(file.previewElement) : void 0;
            }
          };
        </script>

        @endforeach


