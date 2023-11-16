
@extends('layouts.admin')
@section('content')
@foreach ($claimnotices as $notice)

<div class="container con"> 
  @if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif 
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

<div class="modal-content" style="margin-top: 10px; border:none !important">
  <div class="modal-body">
    <form action="{{ route('arbitratorconfiguration.store',$notice->id) }}" method="POST" style="width: 100%">
      @csrf 
      @if( $notice->claimnoticestatus == 'Payment Completed, Allocate Arbitrator' || $notice->claimnoticestatus=='Arbitrator Rejected' || $notice->claimnoticestatus=='Auto Rejected')   
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <strong>Select Arbitrator : </strong>
            <select  name="arbitrator_id[]" id="arbitrator_id" class="arbitrator_id form-control">
              @foreach($arbitratorlist as $key => $arbitrator)
              <option value="{{$arbitrator->user_id}}">{{$arbitrator->username}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <strong>Remarks : </strong>
            <textarea class="form-control" id="remarks" name="remarks"></textarea>
          </div>
        </div>
     </div>
      <div class="col-md-6" style="    max-width: 100%;">
        <div class="form-group">
          <p>
           Please give us your consent and disclose your interest. For the sake of your reference you may view the notice of arbitration in the said matter however the same will be available for download only after your appointment is confirmed.Kindly respond to this within 5 working days.

         </p>
         <p>
           If we fail to receive communication, this offer stands withdrawn without further notice .

          </p>
          <p>
            You are advised not to share this information, including the contents of the notice of arbitration with anyone else. 
          </p>
        </div>
      </div>

      @endif

      <div class="col-md-6">
        <div class="form-group" style="display: none;">
         <input type="hidden" name="claimnoticeid" id="claimnoticeid" value="{{ $notice->id }}">
         <input type="hidden" name="claiment_id" id="claiment_id" value="{{ $notice->userid }}">
       </div>
     </div>
     <div class="mx-auto" style="text-align: center; border:none !important" >
      @if($notice->claimnoticestatus== 'Respondent Denying and Choose to participate' || $notice->claimnoticestatus== 'Payment Completed, Allocate Arbitrator' || $notice->claimnoticestatus=='Arbitrator Rejected'|| $notice->claimnoticestatus=='Auto Rejected')
      <button class="btn btn-success btn-space" type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" >Allocate Arbitrator</button>
      @endif
      <a class="btn btn-danger btn-space" href="{{ route('arbitratorconfiguration.index') }}"> Back</a>    
    </div>
    </form>
  </div>

</div>

</div> 

@endforeach

<script type="text/javascript">
  $(".arbitrator_id").select2({
    maximumSelectionLength: 50
  });
</script> 

@include('showpagejavascript/showscript')       

@endsection