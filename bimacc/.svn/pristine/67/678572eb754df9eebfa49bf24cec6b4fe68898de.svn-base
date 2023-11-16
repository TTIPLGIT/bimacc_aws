
  
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

<div class="modal-content modelcontentheightclaim" style="overflow-x: none" id="idresponantinformation">
  <div class="modal-body"> 
    <div  class="row register-form">             
      @foreach ($respondantinformations as $respondant) 
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
      @foreach ($claimant_dispute as $claimantinformation)
      @foreach ($respodentcounterclaimandrelief as $details)
      @include('CounterClaimShowPageClaimDetails/ClaimDetails') 
      @endforeach 
      @endforeach 
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
   
   
   <button class="btn btn-success btn-space" onclick="allocationfeesbutton('{{ route('claimnotice_restore',$notice->id) }}')" id="allocationfees">Restore</button>
   
   <a class="btn btn-danger btn-space" href="{{ route('claimnotice.index') }}"> Back</a>

 </div>
</div>
</div>
<script type="text/javascript">
  function allocationfeesbutton(url){
     $("#allocationfees").attr("disabled", true);
     window.location.href=url;
     // document.getElementById('feessubmitform').submit();
  }
</script>

@include('showpagejavascript/showscript') 
@endforeach

@endsection