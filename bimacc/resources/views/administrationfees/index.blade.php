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
          <a class="btn btn-success float-right" title="create" href="{{ route('administrationfees.create') }}" data-toggle="modal" data-target="#createAdministrationFeesModal" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus" ></i></a>
        </div>          
      </div>
    </div> 
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Administration Fees</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="theadalign">
            <tr>
              <th style="width: 104.4px;">Sl. No.</th>              
              <th>Administration Fees</th>
              <th>Arbitrator Fees</th>
              <th>Total Fees</th>
              <th>Claim Amount From</th>
              <th>Claim Amount To</th>                      
              <th style="width: 200px;">Action</th>
            </tr>
          </thead>
        @if($administrationfees != null)
          <tbody>
          
           @foreach ($administrationfees as $administrationfee)
           <tr style="text-align: center">
            <td>{{ $loop->iteration}}</td>
            <td>{{ $administrationfee->administration_fees }}</td>
            <td>{{ $administrationfee->arbitrator_fees }}</td>
            <td>{{ $administrationfee->total_fees }}</td>
            <td>{{ $administrationfee->claim_amount_from}}</td>
            <td>{{ $administrationfee->claim_amount_to}}</td>
            <td>
              <form action="{{ route('administrationfees.destroy',$administrationfee->id) }}" method="POST">

      <a class="btn btn-info" href="{{ route('administrationfees.show',$administrationfee->id) }}" data-toggle="modal"  data-target="#showAdministrationFeesModal{{$administrationfee->id}}"><i class="fas fa-eye">Show</i></a>

            <a class="btn btn-primary" id="test1" href="{{ route('administrationfees.edit',$administrationfee->id) }}" data-toggle="modal"  data-target="#editAdministrationFeesModal{{$administrationfee->id}}" ><i class="fas fa-pencil-alt"></i></a>

              @csrf

              @method('DELETE')

              <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
            </form>
          </td>                      
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
 
    @include('administrationfees/create')
    @if($administrationfees != null)
    @include('administrationfees/show')
    @include('administrationfees/edit')
  @endif
 
@endsection


