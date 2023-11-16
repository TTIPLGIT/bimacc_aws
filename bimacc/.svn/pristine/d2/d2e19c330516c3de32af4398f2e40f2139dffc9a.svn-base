
@extends('layouts.admin')
@section('content')
@foreach ($claimnotices as $notice)
<div class="container con"> 
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
      @foreach ($claimant_information as $claimant)
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
 <div class="row">
           <div class="col-md-12">
             <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <label><b>Note: Please Go to the Respective Screen for Further Process.</b></label>
            </div>            
            
          </div>
        </div> 
<div class="modal-content" style="text-align: center; margin-top: 2px; border: none !important">
  <div><a class="btn btn-danger btn-space"  href="{{ route('home') }}">Back</a></div>
</div>
@endforeach

@include('showpagejavascript/showscript') 
@endsection