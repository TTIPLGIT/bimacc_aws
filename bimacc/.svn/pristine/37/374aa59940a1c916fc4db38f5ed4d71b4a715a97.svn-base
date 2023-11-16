@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<!-- <style>
  .btn btn-primary {
   pointer-events: none !important;
   /*cursor: default !important;*/
}
</style> -->
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="container-fluid"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
     <!--  <a class="btn btn-success float-right" title="Create" href="{{ route('claimnotice.create') }}" ><i class="fas fa-plus" ></i></a> -->
   </div>
 </div>
</div> 

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Claim Notice View</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <thead class="theadalign">
        <tr>
          <th style="width: 104.4px;">Sl. No.</th>
          <th>Claim Ref No</th>
          <th>Date</th>
          <th>Claimant Name</th>
          <th>Respondent Name</th>
          <th>Payment Status</th>
          <th>Claim Petition Status</th>
          <th>Action</th>                      
        </tr>
      </thead>
      <tbody>
       @foreach ($claimnotice as $key => $notice)
       <tr style="text-align: center">
        <td>{{ $loop->iteration}}</td>      
         <td>              
        @if($claimantamend[$loop->iteration-1][0]->details_count =='') 
       
          <a onclick="Respondentbuttonclick()" href="javascript:void(0);">{{ $notice->claimnoticeno }}</a>
        
        @else
         <a href="{{ route('claimantrespondantaccess.show',$notice->id) }}">

            {{ $notice->claimnoticeno }}

          </a>
        
       </td>
        @endif
        <td>{{ $notice->created_at }}</td> 
        <td>{{ $notice->username }}</td>                   
        <td>{{ $notice->firstname }}</td>
        @if(empty($res_fees[$loop->iteration-1])) 

        <td>Pending</td>

        @endif
        @if(!empty($res_fees[$loop->iteration-1]))

        <td>Completed</td>

        @endif
        <td>{{ $notice->claimnoticestatus }}</td> 
        <td>
         <!-- <a class="btn btn-info" href="{{ route('claimantrespondantaccess.show',$notice->id) }}"><i class="fas fa-eye">Show</i></a> -->
         @if($claimantamend[$loop->iteration-1][0]->details_count =='') 
         <a class="btn btn-primary"  href="{{ route('claimantrespondantaccess.amendupdate',$notice->id) }}" data-toggle="modal" data-target="#addrespondantmodal{{$notice->id}}" style="
         color: white;" id="disable">Add Details</a>
         @else
         <a class="btn btn-secondary" href="{{ route('claimantrespondantaccess.amendupdate',$notice->id) }}" data-toggle="modal" data-target="#addrespondantmodal{{$notice->id}}" style="
         color: white;
         pointer-events: none !important;
         " id="disable">Add Details</a>
         @endif

         @if($claimantamend1[$loop->iteration-1][0]->details_count =='') 
         <a class="btn btn-primary"  data-toggle="modal" data-target="#amendrespondantmodal{{$notice->id}}" style="
         color: white;">Amend</a>
         @else
         <a class="btn btn-secondary"  data-toggle="modal" data-target="#amendrespondantmodal{{$notice->id}}" style="
         color: white;pointer-events: none !important;">Amend</a>

         @endif
       </td>    
     </tr>
     @endforeach
   </tbody>
 </table>
 @include('modals/addrespondantmodal')
 @include('modals/amendrespondantmodal')
</div>
</div>
</div>

</div>
<script type="text/javascript">
  function Respondentbuttonclick(url){
    swal("Please Fill Up the Details", "", "error");
      return false;
     // document.getElementById('feessubmitform').submit();
  }
</script>
@endsection

