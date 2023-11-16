
@foreach ($ClaimNoticeStage as $ClaimNoticeStages)
<!-- create Arbitration modal -->
<div class="modal hide fade" id="BIMACCclaimstageTypeModal{{$ClaimNoticeStages->id}}" tabindex="-1" role="dialog" aria-labelledby="createclaimstagelabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
    <div class="modal-content">  
      <div class="modal-header">
        <h5 class="modal-title" id="editclaimstagelabel">Edit Stage for {{$notice->claimnoticeno}}</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
       <form id="createForm" action="{{ route('ClaimPetition.update',$ClaimNoticeStages->id) }}" 
        method="POST" enctype="multipart/form-data" >
        @csrf 
        @method('PUT') 
        <div class="row register-form">
         <div class="col-md-6">
          <div class="form-group">
            <label  >Case Status</label>
              <input type="text" id="claimnoticeid" name="claimnoticeid" class="form-control"  
            value="{{$ClaimNoticeStages->claimnoticeid}}"style="display: none;">
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
          <input type="date" id="stagetodate" name="stagetodate" class="form-control" required value="{{$ClaimNoticeStages->stagetodate}}">
          @if ($errors->has('stagetodate'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('stagetodate') }}</strong>
          </span>
          @endif  
        </div>
        <input type="hidden" name="claimantnotice_stage_description"  value="{{$ClaimNoticeStages->claimantnotice_Stage}}" >
      </div>
    
      <div class="col-md-6">
        <div class="form-group">
         <label  for="claimantnotice_stage_status">Stage Status </label><span style="color: red">*</span>
         <select class="form-control" name="claimantnotice_stage_status" id="claimantnotice_stage_change" onchange="stage_decription(this,<?php echo $loop->iteration;?>)" required>
          <option value="">Select Stage Status</option>
           <option value="Send Back To Arbitrator">Send Back To Arbitrator</option>
          <option value="Disposed">Release Final Award</option>
          <option value="Additional Payment Link Released by Centre">Award Pronounced</option>
        </select>
      </div>
    </div>
 <!--  @if($ClaimNoticeStages->claimantnotice_stage_status !="Award Initiated" && $ClaimNoticeStages->claimantnotice_stage_status !="Additional Payment Paid") -->
      <!-- <div class="col-md-6">
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
    </div> -->
     
   <!--  <div class="col-md-6" id="document_field{{ $loop->iteration }}" style="display: none;">
      <div class="form-group">
        <label  for="awardedstatementdocumentbycenter">Awarded Statement Document Upload</label><span style="color: red">*</span>
        <input type="file" name="awardedstatementdocumentbycenter" id="awardedstatementdocumentbycenter" class="form-control">
        @if ($errors->has('awardedstatementdocumentbycenter'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('awardedstatementdocumentbycenter') }}</strong>
        </span>
        @endif  
      </div>
    </div> -->
    <!-- @endif -->

    <div class="col-md-6">
      <div class="form-group">
        <label  for="awardedstatementdocumentbycenter">Notes</label>
        <textarea id="stage_notes" name="stage_notes" class="form-control" required ></textarea>
      </div>
    </div>
     <div class="col-md-6" id="document_field{{ $loop->iteration }}" style="display: none;">
            <div class="form-group">
              <label>Select Email Addresses<span style="color: red">*</span></label>
              <select class="col-xs-12 col-sm-12 col-md-12 form-control mail_id" id="mail_id{{ $loop->iteration }}" name="mail_id[]" multiple >
                <option value="" selected>Select Email Addresses<span style="color: red">*</span></option>
              </select>
            </div>
          </div>
         
   
    <div class="col-md-6 div1" id="multiple_email{{ $loop->iteration }}"> 
            <div class="form-group">
             
            
            
             
          </div>
        </div>
   
     <div class="col-md-6" id="award_document{{ $loop->iteration }}" style="display: none;">
      <div class="form-group">
        <label  for="awardedstatementdocumentbycenter">Disposed Statement Document Upload</label><span style="color: red">*</span>
        <input type="file" name="awardedstatementdocumentbycenter" id="awardedstatementdocumentbycenter" class="form-control">
        @if ($errors->has('awardedstatementdocumentbycenter'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('awardedstatementdocumentbycenter') }}</strong>
        </span>
        @endif  
      </div>
    </div>

   
    <div class="col-md-6">
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

   <!--  <button type="submit" id="register" class="btn btn-success btn-space" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">Relese Final Award/Send Back To Arbitrator</button> -->
 <!--   <a class="btn btn-primary"  data-toggle="modal" data-target="#paymentaward" style="
  color: white;">Amend</a> -->
  
    <button type="submit" id="final_button{{ $loop->iteration }}" style="display: none;" class="btn btn-success btn-space">Release Final Award</button>
    
    <button type="submit" id="payment_link{{ $loop->iteration }}" style="display: none;" class="btn btn-success btn-space">Release Payment Link</button>

     <button type="submit" id="send_arbitrator{{ $loop->iteration }}" style="display: none;" class="btn btn-success btn-space">Send Back To Arbitrator</button>
   
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
<script>

 function stage_decription(e,index)
 {
  
  
  var inputvalue = e.value;
// alert(inputvalue);

  if( inputvalue==="Send Back To Arbitrator"){

    $("#document_field"+index).hide();
    $("#award_document"+index).hide();
    $("#final_button"+index).hide();
    $("#payment_link"+index).hide();
    $("#send_arbitrator"+index).show();
    $("#multiple_email"+index).hide();

    
  }
  else if(inputvalue==="Disposed")
  {
    
   $("#document_field"+index).hide();
    $("#award_document"+index).show();
     $("#final_button"+index).show();
    $("#payment_link"+index).hide();
    $("#send_arbitrator"+index).hide();
    $("#multiple_email"+index).hide();

 }
 else if(inputvalue==="Additional Payment Link Released by Centre")
  {
    // alert("hghg2");
   $("#document_field"+index).show();
    $("#award_document"+index).hide();
     $("#final_button"+index).hide();
    $("#payment_link"+index).show();
    $("#send_arbitrator"+index).hide();
    $("#multiple_email"+index).show();

 }
else 
  {
   $("#document_field"+index).hide();
    $("#award_document"+index).hide();
     $("#final_button"+index).hide();
    $("#payment_link"+index).hide();
    $("#send_arbitrator"+index).hide();
 $("#multiple_email"+index).hide();

 }

}
</script>
<script type="text/javascript">
  $( document ).ready(function()
  {
    var claim_array=<?php echo json_encode($ClaimNoticeStage);?>;
    var claim_notice_id = $('#claimnoticeid').val();

   // alert('{{ url('/videoconferencing/getemail') }}' + '/' + claim_notice_id);
    

    $.ajax({
      url: '{{ url('/videoconferencing/getemail_repay') }}' + '/' + claim_notice_id,  
      // alert()  
      method:'GET',  
      success:function(data){
        console.log(data);        
        for (var i = 1; i <= claim_array.length; i++) {
        $('#mail_id'+i).empty();
             $('#mail_id'+i).append('');
              // $('#mail_id'+i).append('<option value=""></option>');
          for(var count = 0; count < data.length; count++)
          {
            optionText = data[count].email; 
              optionValue = data[count].id; 
    
              $('#mail_id'+i).append(`<option value="${optionValue}"> 
                                         ${optionText} 
                                    </option>`);  
          }
        }
        
      },
      error:function(){


      }
    });


    

  });
</script>
<script type="text/javascript">
  $(".mail_id").change(function() {
  $(".div1").html('');
    $(".mail_id option:selected").each(function () {
   var selected = $(this);
    var selText = selected.text();
    $(".div1").append('<label>Amount For-'+selText+'</label><input type="text" name="amount['+selected.val()+']" class="form-control" required>');
    console.log(selText);
});
  //   var selected = $(this).val(); //array of the selected values in drop box
  // for(var i=0; i < selected.length; i++) {
   
  //       $(".div1").append('<input type="text" name="amount['+selected[i]+']" class="form-control"  placeholder="jhjg">');

   
       
    
  // }
});

</script>