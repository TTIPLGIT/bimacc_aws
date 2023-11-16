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
    <!-- <h6 class="m-0 font-weight-bold text-primary">Status on Appointment of Arbitrator</h6> -->
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="theadalign">
          <tr>
            <th style="width: 104.4px;">Sl. No.</th>
            <th>Claim Petition No. & Date</th>           
            <!-- <th>Claim Category</th>
            <th>Claim Sub Category</th>
            
            <th>Arbitrator's Fees</th>
            <th>Administation Fees</th>-->
            <th>Claim Petition Status</th> 
            <th>Change Status</th>                      
          </tr>
        </thead>
        <tbody>
         @foreach ($claimnotice as $key => $notice)
          <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>                    
          <td>  
          <a href="{{ route('ArbitratorAllocatedClaims.destroy',$notice->id) }}">
  
     {{ $notice->arbitration_petionno }} 
    
  </a>      
  </td> 
     
         <td>{{ $notice->claimnoticestatus }}</td>
          <td><form action="{{ route('ArbitratorAllocatedClaims.destroy',$notice->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('ArbitratorAllocatedClaims.show',$notice->id) }}"  >
            Change Status</a>                        
            </form>
          </td>
        </tr>        
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
@endsection
