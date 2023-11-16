@extends('layouts.admin')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="container con"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
      @role('centre')
      <a class="btn btn-success float-right" title="create" href="{{ route('registrationfees.create') }}" data-toggle="modal" data-target="#createRegistrationFeesModal" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus" ></i></a>
      @endrole
    </div>          
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registration Fees</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="display table table-bordered"  width="100%" cellspacing="0">
        <thead class="theadalign">
          <tr>
            <th  style="width: 104.4px;">Sl. No.</th>
            <th>Currency Type</th>              
            <th>Registration Fees</th>
            <!-- <th>Amount Value Range</th> -->
            <th>Claim From</th>
            <th>Claim To</th>
             @role('centre')    
             
            <th>Action</th>
            @endrole
          </tr>
        </thead>
        @if($registrationfees != null)
        <tbody>

         @foreach ($registrationfees as $registrationfee)
         <tr style="text-align: center">

          <td>{{ $loop->iteration}}</td>
          <td>{{ $registrationfee->currency }}</td>
          <td>{{ $registrationfee->registration_fees }}</td>
           <td>{{ $registrationfee->claim_amount_from}}</td>
          
          <!-- <td>{{ $registrationfee->fees_description }}</td>  -->
         
          
            <td>{{ $registrationfee->claim_amount_to}}</td>
          
          
           @role('centre')          
         
         
          
                             
          <td>
            <form action="{{ route('registrationfees.destroy',$registrationfee->id) }}" method="POST">
              <a class="btn btn-info" href="{{ route('registrationfees.show',$registrationfee->id) }}" data-toggle="modal"  data-target="#showRegistrationFeesModal{{$registrationfee->id}}"><i class="fas fa-eye"></i></a>
              <a class="btn btn-primary" id="test1" href="{{ route('registrationfees.edit',$registrationfee->id) }}" data-toggle="modal"  data-target="#editRegistrationFeesModal{{$registrationfee->id}}" ><i class="fas fa-pencil-alt"></i></a>
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
    <h6 class="m-0 font-weight-bold text-primary">Administration & Arbitration Fee</h6>
  </div>
  <div class="card-body">
 <div class="table-responsive">
          <table class="display  table table-bordered"   width="100%" cellspacing="0">
      <thead class="theadalign">
          <tr>
            <th style="width: 104.4px;">Sl. No.</th>              
         
             <th>Currency Type</th> 
               <th>Claim Amount From</th>
            <th>Claim Amount To</th>
            
            <th>Administration Fee</th>
            <th>Arbitrator Fees Description</th>
            <!-- <th>Total Fees</th>                       -->
            @role('centre')   
            <th>Arbitration Fee</th>
              <th>Arbitration Fee Percentage</th>
            <th style="width: 200px;">Action</th>
            @endrole
          </tr>
        </thead>
        @if($arbitratorallocationfees != null)
        <tbody>
         @foreach ($arbitratorallocationfees as $arbitratorallocationfee)
         <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>

         
          <td>{{ $arbitratorallocationfee->currency }}</td>
          <td>{{ $arbitratorallocationfee->claim_amount_form }}</td>
          <td>{{ $arbitratorallocationfee->claim_amount_to }}</td>
        
          <td>{{number_format($arbitratorallocationfee->adminstration_fees,2) }}</td>
           <td>{{$arbitratorallocationfee->fees_description }}</td>
          
         <!--  <td>{{ number_format($arbitratorallocationfee->total_fees,2) }}</td> -->
          @role('centre')   
            <td>{{number_format($arbitratorallocationfee->arbitrator_fees,2) }}</td>
             <td>{{$arbitratorallocationfee->arbitartion_percentage }}</td>
          <td>
            <form action="{{ route('arbitratorallocationfees.destroy',$arbitratorallocationfee->id) }}" method="POST">
              <a class="btn btn-info" href="{{ route('arbitratorallocationfees.show',$arbitratorallocationfee->id) }}" data-toggle="modal"  data-target="#showArbitratorAllocationFeesModal{{$arbitratorallocationfee->id}}"><i class="fas fa-eye"></i></a>
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
</div>
<!-- /.container-fluid -->  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
@include('registrationfees/create')
@if($registrationfees != null)
@include('registrationfees/show')
@include('registrationfees/edit')
@endif
 @include('arbitratorallocationfees/create')
@if($arbitratorallocationfees != null)
@include('arbitratorallocationfees/show')
@include('arbitratorallocationfees/edit')
@endif
@endsection


