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
      @role('centre')                     
      <a class="btn btn-success float-right" title="create" href="{{ route('arbitratorallocationfees.create') }}" data-toggle="modal" data-target="#createArbitratorAllocationFeesModal" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus" ></i></a>
      @endrole
    </div>          
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Administration and Arbitration Fee</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="theadalign">
          <tr>
            <th style="width: 104.4px;">Sl. No.</th>              
            <th>Claim Amount From</th>
            <th>Claim Amount To</th>
            <!-- <th>Claim Value</th> -->
            <th>Arbitration Fee</th>
            <th>Administration Fees</th>
            <th>Total Fees</th>                      
            @role('centre')   
            <th style="width: 200px;">Action</th>
            @endrole
          </tr>
        </thead>
        @if($arbitratorallocationfees != null)
        <tbody>
         @foreach ($arbitratorallocationfees as $arbitratorallocationfee)
         <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>

          <td>{{ $arbitratorallocationfee->claim_amount_form }}</td>
          <td>{{ $arbitratorallocationfee->claim_amount_to }}</td>
          <!-- <td>{{ $arbitratorallocationfee->fees_description }}</td> -->
          <td>{{number_format($arbitratorallocationfee->arbitrator_fees,2) }}</td>
          <td>{{number_format($arbitratorallocationfee->adminstration_fees,2) }}</td>
          <td>{{ number_format($arbitratorallocationfee->total_fees,2) }}</td>
          @role('centre')   
          <td>
            <form action="{{ route('arbitratorallocationfees.destroy',$arbitratorallocationfee->id) }}" method="POST">
              <a class="btn btn-info" href="{{ route('arbitratorallocationfees.show',$arbitratorallocationfee->id) }}" data-toggle="modal"  data-target="#showArbitratorAllocationFeesModal{{$arbitratorallocationfee->id}}"><i class="fas fa-eye">Show</i></a>
              <a class="btn btn-primary" id="test1" href="{{ route('arbitratorallocationfees.edit',$arbitratorallocationfee->id) }}" data-toggle="modal"  data-target="#editArbitratorAllocationFeesModal{{$arbitratorallocationfee->id}}" ><i class="fas fa-pencil-alt"></i></a>
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
            </form>
          </td>  
          @endrole                    
        </tr>
        @endforeach
      </tbody>
      @endif
    </table>
  </div>
</div>
</div>
<!-- /.container-fluid -->  
</div>

@include('arbitratorallocationfees/create')
@if($arbitratorallocationfees != null)
@include('arbitratorallocationfees/show')
@include('arbitratorallocationfees/edit')
@endif

@endsection


