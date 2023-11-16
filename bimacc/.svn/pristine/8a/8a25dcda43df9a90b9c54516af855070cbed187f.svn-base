
@extends('layouts.admin')
@section('content')
@foreach ($claimnotices as $notice)
<div class="container con" > 
 <div class="row">
   <div class="col-lg-12 margin-tb" style="    text-align: center;
   color: black;
   font-weight: 900;
   font-size: 24px;
   text-decoration: underline;">                    
   <b>{{$notice->claimnoticeno}} </b>
 </div>
</div>
@include('showpagejavascript/showpageheadertab') 

<div class="modal-content modelcontentheightclaim" id="idclaimnoticedetails" style="display: block">
      @include('ClaimNoticeShowScreens/ClaimNoticeHeaderShow')      
</div>
<div class="modal-content modelcontentheightclaim"   style="margin-top: 10px;" id="idclaimantinformation" >
  <div class="modal-body"> 
    <div   class="row register-form" style="margin-top: 10px;" >
      @foreach ($claimantinformations as $claimant)
      @include('ClaimNoticeShowScreens/ClaimantInformationShow')      
      @endforeach
    </div>
  </div>
</div>

<div class="modal-content modelcontentheightclaim" id="idresponantinformation">
  <div class="modal-body"> 
    <div  class="row register-form">             
      @foreach ($respondantdetails as $respondant)              
       @include('ClaimNoticeShowScreens/RespondentInformationShow')
      @endforeach 
  </div>
</div> 
</div>


<div class="modal-content modelcontentheightclaim"  id="idclaiminformation" style="overflow-y: none"  >
  <div class="modal-body"> 
    <div class="row register-form"> 
      @foreach ($claimant_information as $claimantinformation)
      @foreach ($claimandrelief as $details)
      @include('ShowPageClaimDetails/ClaimDetails') 
      @endforeach 
      @endforeach 
    </div>
  </div>
</div>
<div class="modal-content modelcontentheightclaim"  id="idcounterclaiminformation" style="overflow-y: none"  >
  <div class="modal-body"> 
    <div class="row register-form"> 
      
      @include('CounterClaimShowPageClaimDetails/Listcounterclaim') 
      
    </div>
    </div>
  </div>
  


<div class="modal-content modelcontentheightclaim"  id="idoveralclaimstatus" >
  <div class="modal-body"> 
    <div  class="row register-form">
      @foreach ($ClaimNoticeStatus as $ClaimNoticeStatuss)
       @include('ClaimNoticeShowScreens/OverallClaimStatusShow')
     @endforeach
   </div>
 </div>

</div> 
<div class="modal-footer">
  <div class="mx-auto">
     
     @if(!empty($active_status))
    
   @if( $notice->claimnoticestatus =='New Claim Created')
   <button class="btn btn-success btn-space" onclick="Respondentbuttonclick('{{ route('RespodentAccess',$notice->id) }}')" id="respondentbutton">Respondent Access</button>
   @endif 
   @if($notice->claimnoticestatus=='Disputing and Contesting the Claim' || $notice->claimnoticestatus =='Making a Counter Claim') 
  <!--  <a class="btn btn-success btn-space" href="{{ route('Initiatepayment',$notice->id) }}">Initiate Payment for Administration Fee and Arbitration Fee</a> -->
    <button class="btn btn-success btn-space" onclick="feesbuttonclick('{{ route('Initiatepayment',$notice->id) }}')" id="feesbutton">Initiate Payment for Administration Fee and Arbitration Fee</button>
   @endif
   @endif

   <div class="modal-body">  
      <div class="col text-center">
   @if($notice->arbitration_petionno != Null)
   
   <a class="btn btn-info" href="{{ route('ClaimPetition.show',$notice->id) }}">Go to Claim Petition</a> 
    
   @endif
   <a class="btn btn-danger btn-space" href="{{ route('claimantsnoticelist.index') }}"> Back</a> 
  </div>
          </div>
                
           
              
 </div>
</div>

</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("#respondentbutton").click(function() {
       $("#respondentbutton").attr("disabled", true);
    });
});
  function Respondentbuttonclick(url){
     $("#respondentbutton").attr("disabled", true);
     window.location.href=url;
     // document.getElementById('feessubmitform').submit();
  }
   function feesbuttonclick(url){
     $("#feesbutton").attr("disabled", true);
     window.location.href=url;
     // document.getElementById('feessubmitform').submit();
  }
</script>

@include('showpagejavascript/showscript') 
@endforeach
@endsection