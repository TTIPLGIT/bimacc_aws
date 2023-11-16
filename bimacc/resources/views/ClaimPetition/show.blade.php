
@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif 

@foreach ($claimnotices as $notice)

<div class="container con"> 
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


<div class="container" style="max-width: 100%" > 
  <div class="modal-content" style="margin-top: 10px">
    <div class="modal-body">       
      <div class="row register-form">
        @if($notice->claimnoticestatus != 'Arbitrator Allocated and Waiting for the Acceptance')
        
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
       @if($ClaimNoticeStatusCount != 0)
       @include('ClaimNoticeStage/bimaccawarded')
       @endif
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
              <th>Show</th> 
            </tr>
          </thead>  
          <tbody>
           @foreach ($ClaimNoticeStage as $key => $ClaimNoticeStages) 
           <tr >
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
            <br>Award Reserved Document:
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
            @endif
            @endforeach
          </table> 
          @elseif ($ClaimNoticeStages->claimantnotice_stage_status == "Disposed")
          Award Reserved Document by Arbitator:
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
             <a href="{{ route('getClaimPetionStageDocuments',$AdminAwardedDocuments1->documentid) }}" target="blank" download>
              {{ $loop->iteration}}.{{$AdminAwardedDocuments1->document_name}}
            </a>
          </td>
        </tr>
        <tr>
          
        </tr>
        @endif
        @endforeach
        <td style="border: none;">
            Nature Of Award:
            <br>
             @foreach ($claimnoticenatureofaward as $key => $claimnoticenatureofawards)
            {{$claimnoticenatureofawards->nature_of_award}}
            
            @endforeach
          </td>
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
  <!-- @if($ClaimNoticeStages->claimantnotice_stage_status=="Award Reserved By Arbitrator")
  <form action="{{ route('ClaimPetition.destroy',$ClaimNoticeStages->id) }}" method="POST"> 
    <a class="btn btn-success float-right" title="edit"  data-toggle="modal" data-target="#BIMACCclaimstageTypeModal{{$ClaimNoticeStages->id}}" data-backdrop="static" data-keyboard="false" >Show</i></a>
  </form>
  @else

  @endif -->
</td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div> 
@endif

</div> 
</div>
</div>

@include('showpagejavascript/showscript') 

@endforeach
@endsection