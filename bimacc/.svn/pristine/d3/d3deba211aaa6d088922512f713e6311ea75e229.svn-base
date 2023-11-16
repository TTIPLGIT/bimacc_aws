@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
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
    <h6 class="m-0 font-weight-bold text-primary">Claim Petition List</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="theadalign">
          <tr>
            <th style="width: 104.4px;">Sl. No.</th>
            <th>Claim Petition No.</th>
           <!--  <th>Claim Category</th>
            <th>Claim Sub Category</th>
            <th>Arbitrator's Name</th>
            <th>Arbitrator's Code</th> -->
            <th>Claim Notice Status</th>
            <th>Amend</th>                      
          </tr>
        </thead>
        <tbody>
         @foreach ($claimnotice as $key => $notice)
         <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>                    
          <!-- <td>{{ $notice->arbitration_petionno}}</td> -->
            <td>
  <a href="{{ route('ClaimPetion.respodentclaimpetitionshow',$notice->id) }}">
  
      {{ $notice->arbitration_petionno }}
    
  </a>
</td>
          <!-- <td>{{ $notice->category_name }}</td>                    
          <td>{{ $notice->subcategory_name }}</td>  
           <td>{{ $notice->arbitrator_name }}</td>  
            <td>{{ $notice->arbitrator_code }}</td>    -->                   
           <td>{{ $notice->claimnoticestatus }}</td> 

        <td>
         
           
    @if($claimantamend1[$loop->iteration-1][0]->details_count =='') 
             <a class="btn btn-primary"  href="{{ route('ClaimPetion.resamendupdate',$notice->id) }}" data-toggle="modal" data-target="#amendrespondantpetionmodal{{$notice->id}}" style="
    color: white;">Amend</a>
    @else
    <a class="btn btn-secondary"  href="{{ route('ClaimPetion.resamendupdate',$notice->id) }}" data-toggle="modal" data-target="#amendrespondantpetionmodal{{$notice->id}}" style="
    color: white;pointer-events: none !important;">Amend</a>
    
   
    @endif
    <!--  @if(!empty($additional_fees[$loop->iteration-1]))
           <a class="btn btn-primary">Pay Additional Fee</a>
           @endif -->
      </tr>
      @endforeach
    </tbody>
  </table>
  @include('modals/amendrespondantpetionmodal')
</div>
</div>
</div>

</div>
@endsection

