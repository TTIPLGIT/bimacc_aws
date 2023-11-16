@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="container con"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
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
            <th>Claim Petion No.</th>           
           <!--  <th>Claim Category</th>
            <th>Claim Sub Category</th>
            <th>Arbitrator's Name</th>
            <th>Arbitator's Code</th>-->
            <th>Claim Petition Status</th> 
            <th>View/ Upload Document</th>                      
          </tr>
        </thead>
        <tbody>
         @foreach ($claimnotice as $key => $notice)
          <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>                    
          
           <td>
  <a href="{{ route('ClaimPetion.show',$notice->id) }}">
  
     {{ $notice->arbitration_petionno }}
    
  </a>
</td>          
          <!-- <td>{{ $notice->category_name }}</td>
          <td>{{ $notice->subcategory_name }}</td>       
          <td>{{ $notice->arbitrator_name }}</td>
                    <td>{{ $notice->arbitrator_code }}</td>
-->
          <td>{{ $notice->claimnoticestatus }}</td> 
          <td >
           <!--  <a class="btn btn-info" href="{{ route('ClaimPetion.show',$notice->id) }}"  >
            View/ Upload Document</a>   -->
            
     @if($claimantamend[$loop->iteration-1][0]->details_count =='') 
            <a class="btn btn-primary" href="{{ route('ClaimPetion.amendupdate',$notice->id) }}" data-toggle="modal" data-target="#amendclaimantpetionmodal{{$notice->id}}" style="
    color: white;">Amend</a>  
    @else
    <a class="btn btn-secondary" href="{{ route('ClaimPetion.amendupdate',$notice->id) }}" data-toggle="modal" data-target="#amendclaimantpetionmodal{{$notice->id}}" style="
    color: white;pointer-events: none !important;">Amend</a>  
  
    @endif
     <!-- @if(!empty($additional_fees[$loop->iteration-1]))
           <a class="btn btn-primary">Pay Additional Fee</a>
           @endif   -->                  
           
          </td>
        </tr>        
        @endforeach
      </tbody>
    </table>
    @include('modals/amendclaimantpetionmodal')
  </div>
</div>
</div>
</div>
@endsection
