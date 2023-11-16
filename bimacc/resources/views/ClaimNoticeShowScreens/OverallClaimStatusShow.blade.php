 
<div class="col-md-4">
        <div class="form-group">
        	 @if($notice->arbitration_petionno != Null)
         <strong><u>{{$notice->arbitration_petionno}} {{$ClaimNoticeStatuss->claimantnoticestatus}} By on Date  </strong></u><br>
         @else
          <strong><u>{{$notice->claimnoticeno}} {{$ClaimNoticeStatuss->claimantnoticestatus}} By on Date  </strong></u><br>
          @endif
         {{$ClaimNoticeStatuss->creatorname}} on {{$ClaimNoticeStatuss->created_at}}  
       </div>
     </div> 