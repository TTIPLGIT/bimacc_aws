
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
   font-size: 17px;
   text-decoration: underline;">                    
   <b>{{$notice->arbitration_petionno}} </b>
 </div>
</div>
@include('showpagejavascript/showpageheadertab') 

<div class="modal-content modelcontentheightclaimArbitratorConfiguration" id="idclaimnoticedetails" style="display: block">
      @include('ClaimNoticeShowScreens/ClaimNoticeHeaderShow')      
</div>
<div class="modal-content modelcontentheightclaimArbitratorConfiguration"   style="margin-top: 10px;" id="idclaimantinformation" >
  <div class="modal-body"> 
    <div   class="row register-form" style="margin-top: 10px;" >
      @foreach ($claimantinformations as $claimant)
      @include('ClaimNoticeShowScreens/ClaimantInformationShow')      
      @endforeach
    </div>
  </div>
</div>

<div class="modal-content modelcontentheightclaimArbitratorConfiguration" id="idresponantinformation">
  <div class="modal-body"> 
    <div  class="row register-form">             
      @foreach ($respondantdetails as $respondant)              
       @include('ClaimNoticeShowScreens/RespondentInformationShow')
      @endforeach 
  </div>
</div>
</div>


<div class="modal-content modelcontentheightclaimArbitratorConfiguration"  id="idclaiminformation" style="overflow-y: none"  >
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


<div class="modal-content modelcontentheightclaimArbitratorConfiguration"  id="idoveralclaimstatus" >
  <div class="modal-body"> 
    <div  class="row register-form">
      @foreach ($ClaimNoticeStatus as $ClaimNoticeStatuss)
       @include('ClaimNoticeShowScreens/OverallClaimStatusShow')
     @endforeach
   </div>
 </div>

</div> 


@if($notice->claimnoticestatus == 'Arbitrator To Accept the Allocation') 
<div class="modal-dialog" role="document" style="max-width: 53% !important;">
  <div class="modal-content" style="overflow: auto; height: 200px">
    <div class="modal-body"> 
     <div class="row" style="background-color: orange; border-radius: 11px;">
       <div class="col-lg-12 margin-tb" style="    text-align: center;
       color: black;
       font-weight: 900;
       font-size: 17px;
       text-decoration: underline;">                    
       <b>Arbitrator Agreement </b>
     </div>
   </div>
   <div  class="row register-form">
    <form action="{{ route('ArbitratorAllocatedClaims.store',$notice->id) }}" method="POST" style="width: 100%">  
      <div class="modal-footer"></div>
      @csrf 
      @if($notice->claimnoticestatus == 'Arbitrator To Accept the Allocation') 
      <div class="col-md-6" style="max-width: 100%">
       <p>
         Please give us your consent and disclose your interest. For the sake of your reference you may view the notice of arbitration in the said matter however the same will be available for download only after your appointment is confirmed.Kindly respond to this within 5 working days.<br>
          If we fail to receive communication, this offer stands withdrawn without further notice .
       </p><br>
       <p>
         You are advised not to share this information, including the contents of the notice of arbitration with anyone else. 
       </p>
       <p></p>

       <p style="text-align: center;"><span>&#9830;</span><span>&#9830;</span><span>&#9830;</span><span>&#9830;</span><span>&#9830;</span><span>&#9830;</span><span>&#9830;</span><span>&#9830;</span><span>&#9830;</span></p>

     </div>
     <div class="col-md-6" style="max-width: 100%">
       <p>
        <input type="radio" name="isAgreeorDisagree" groupname="isAgreeorDisagree" required value="Agree" checked>  I hereby give my consent and declare that I have examined in detail the notice of arbitration and the Names of the Parties, their Associates/Affiliates/Subsidiaries to the best of my information and belief. I declare that I am not associated with any of the parties in the past or present and that I will not be associated with these entities for a period of two years after the award reaches finality. 
      </p>
      <p>
       I further declare that in the event I am appointed as an arbitrator I shall maintain atmost confidentiality and undertake to adhere strictly to the BIMACC rules which may be revised from time to time without specific notice to me. 
     </p>
     <p style="text-align: center; font-weight: bold">[OR]</p>
   </div>
   <div class="col-md-6" style="max-width: 100%">
     <p>
      <input type="radio" name="isAgreeorDisagree" groupname="isAgreeorDisagree" required value="DisAgree">  
      I regret that I am unable to give my consent, as I am interested/related to  
      <textarea id="reason_disagree" name="reason_disagree" class="form-control" style="width: 50%"></textarea>(specifically name the entity) entity of the <br>
      o The claimant <br>
      o The respondents <br>
      o Claimant, its representatives/associates/affiliates subsidiaries <br>
      o Respondents, its representatives/associates/affiliates subsidiaries <br>
    </p>
    <p style="text-align: center; font-weight: bold">[AND]</p>
    <p>
      <input type="checkbox" name="isundertake" required value="Declare"> I declare that and undertake that this communication and shall be treated as confidential by me. 
    </p>
  </div>
  @endif
  <div class="col-md-6">
    <div class="form-group" style="display: none;">
     <input type="hidden" name="claimnoticeid" id="claimnoticeid" value="{{ $notice->id }}">
     <input type="hidden" name="claiment_id" id="claiment_id" value="{{ $notice->userid }}">
   </div>
 </div>
 <div class="modal-footer" style="padding: 40px;">
  <div class="mx-auto">
    @if($notice->claimnoticestatus == 'Arbitrator To Accept the Allocation')
    <button class="btn btn-success btn-space" type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" >Update and Send To Centre</button>
    @endif
    <!-- <a class="btn btn-danger btn-space" href="{{ route('ArbitratorAllocatedClaims.index') }}"> Back</a> -->
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
@endif

@if($notice->claimnoticestatus != 'Arbitrator To Accept the Allocation' || $notice->claimnoticestatus == 'Arbitrator Allocated and Waiting for the Respondent Payment')
<div class="container" style="max-width: 100%" > 
  <div class="modal-content" style="margin-top: 10px">
    <div class="modal-body">       
      <div class="row register-form">
      
        <div class="container" style="max-width: 100%" > 
          <div class="row">
           <div class="col-lg-12 margin-tb" style="    text-align: center;
           color: black;
           font-weight: 900;
           font-size: 17px;
           text-decoration: underline;">                    
           <b>{{$notice->arbitration_petionno}} </b>
         </div>
       </div>

       <div class="table-responsive" style="    margin-bottom: 30px;">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="theadalign">
            <tr>
              <th>Stage</th>
                <th>Stage Name</th>
              <th>Stage Description</th>
            
              <th>Stage Start Date</th>
              <th>Stage End Date</th>
              <th>Stage Status</th>
              <th>Claimant Documents</th>
              <th>Respondent Documents</th>
              <th>Change Status</th>
            </tr>
          </thead>  
          <tbody>
           @foreach ($ClaimNoticeStage as $key => $ClaimNoticeStages)
           <tr>
            <td>{{ $loop->iteration}}</td> 
                 <td>{{ $ClaimNoticeStages->claimantnotice_Stage}}</td>
              <td>{{ $ClaimNoticeStages->claimantnotice_stage_description }}</td>     
              
            <td>{{ date("d-m-Y", strtotime($ClaimNoticeStages->stagefromdate)) }}</td>  
            <td>{{ date("d-m-Y", strtotime($ClaimNoticeStages->stagetodate))  }}</td>      
            <td style="    font-size: 16px;
            font-weight: 900;
            color: black;"> 
            {{$ClaimNoticeStages->claimantnotice_stage_status}}<br>

            @if($ClaimNoticeStages->claimantnotice_stage_status == "Award Reserved By Arbitrator")
            <br>Award Uploaded:
            <table>
              @foreach ($AwardedDcouments as $key => $AwardedDcouments1)
              @if($AwardedDcouments1->id == $ClaimNoticeStages->id)
              <tr>
               <td style="border: none;">
                 <a href="{{ route('getClaimPetionStageDocuments',$AwardedDcouments1->documentid) }}" target="blank" download>
                  {{ $loop->iteration}}.{{$AwardedDcouments1->document_name}}
                </a>
              </td>
            </tr>
             <tr>
          <td style="border: none;">
            Nature Of Award:
            <br>
            @foreach ($claimnoticenatureofaward as $key => $claimnoticenatureofawards)
            {{$claimnoticenatureofawards->nature_of_award}}
            
            @endforeach
          </td>
        </tr>
            @endif
            @endforeach
          </table> 
          @elseif ($ClaimNoticeStages->claimantnotice_stage_status == "Disposed")
          Arbitrator Award Uploaded:
          <table>
            @foreach ($AwardedDcouments as $key => $AwardedDcouments1)
            @if($AwardedDcouments1->id == $ClaimNoticeStages->id)
            <tr>
             <td style="border: none;">
               <a href="{{ route('getClaimPetionStageDocuments',$AwardedDcouments1->documentid) }}" target="blank" download>
                {{ $loop->iteration}}.{{$AwardedDcouments1->document_name}}
              </a>
            </td>
          </tr>
           <tr>
          <td style="border: none;">
            Nature Of Award:
            <br>
            @foreach ($claimnoticenatureofaward as $key => $claimnoticenatureofawards)
            {{$claimnoticenatureofawards->nature_of_award}}
            
            @endforeach
          </td>
        </tr>

          @endif
          @endforeach
        </table> 
        <br>
        Award:
         <table>
            @foreach ($AdminAwardedDocuments as $key => $AdminAwardedDocuments1)
            @if($AdminAwardedDocuments1->id == $ClaimNoticeStages->id)
            <tr>
             <td style="border: none;">
               <a href="{{ route('getClaimPetionStageDocuments',$AdminAwardedDocuments1->documentid) }}" target="_blank" download>
                {{ $loop->iteration}}.{{$AdminAwardedDocuments1->document_name}}
              </a>
            </td>
          </tr>
          
          @endif
          @endforeach
        </table> 

        @endif
      </td> 
        <td> 
          <table>
            @foreach ($ClaimantclaimNoticeStageDocuments as $key => $claimNoticeStageDocuments1)
            @if($claimNoticeStageDocuments1->id == $ClaimNoticeStages->id)
            <tr>
             <td style="border: none;">
               <span title="{{$claimNoticeStageDocuments1->remarks}}" >
               <a href="{{ route('getClaimPetionStageDocuments',$claimNoticeStageDocuments1->documentid) }}" target="blank" download>
                {{ $loop->iteration}}.{{$claimNoticeStageDocuments1->document_name}}
              </a></span>
            </td>
          </tr>
          @endif
          @endforeach
        </table> 
      </td>
      <td>
        <table>
          @foreach ($RespondentclaimNoticeStageDocuments as $key => $resclaimNoticeStageDocuments1)
          @if($resclaimNoticeStageDocuments1->id == $ClaimNoticeStages->id)
          <tr>
           <td style="border: none;">
             <span title="{{$resclaimNoticeStageDocuments1->remarks}}" >
             <a href="{{ route('getClaimPetionStageDocuments',$resclaimNoticeStageDocuments1->documentid) }}" target="blank" download>
              {{ $loop->iteration}}.{{$resclaimNoticeStageDocuments1->document_name}}
            </a></span>
            
          </td>
        </tr>
        @endif
        @endforeach
      </table> 
    </td>
    <td>
      
      @if($ClaimNoticeStages->claimantnotice_stage_status=="Award Reserved By Arbitrator" || $ClaimNoticeStages->claimantnotice_stage_status=="Disposed" || $ClaimNoticeStages->claimantnotice_stage_status=="Additional Payment Link Released by Centre" ||
      $ClaimNoticeStages->claimantnotice_stage_status=="Additional Payment Paid")

      @else
      @if($ClaimNoticeStages->claimantnotice_stage_status !="Completed")
      <form action="{{ route('ArbitratorAllocatedClaims.destroy',$ClaimNoticeStages->id) }}" method="POST"> 
        <a class="btn btn-success float-right" title="Update the Stage"   data-toggle="modal" data-target="#editclaimstageTypeModal{{$ClaimNoticeStages->id}}" data-backdrop="static" data-keyboard="false" >Change Status</a>
      </form>
      @endif
      @endif
    </td>
  </tr>
    @if($ClaimNoticeStatusCount != 0) 
        @include('ClaimNoticeStage/edit')
        @endif
        @include('ClaimNoticeStage/create')
  @endforeach
</tbody>
</table>
</div>
</div> 
</div>
</div>
</div> 
@endif


@include('showpagejavascript/showscript') 
           
@endforeach
@endsection