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
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container con"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
      <a class="btn btn-success float-right" title="create" href="{{ route('loantype.create') }}" data-toggle="modal" data-target="#createLoanTypeModal" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus" ></i></a>
    </div>          
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Loan Type</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="theadalign">
        <tr>
          <th>Sl. No.</th>
          <th>Loan Type Code</th>
          <th>Loan Type Name</th>                                            
          <th>Action</th>
        </tr>
      </thead>  
      @if($loan_type != null)   
      <tbody>          
       @foreach ($loan_type as $loan)
       <tr>

        <td>{{ $loop->iteration}}</td>
        <td>{{ $loan->loan_type_code }}</td>
        <td>{{ $loan->loan_type_name }}</td>                        
        <td>
          <form action="{{ route('loantype.destroy',$loan->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('loantype.show',$loan->id) }}" data-toggle="modal"  data-target="#showLoanTypeModal{{$loan->id}}"><i class="fas fa-eye">Show</i></a>

            <a class="btn btn-primary"  href="{{ route('loantype.edit',$loan->id) }}" data-toggle="modal"  data-target="#editLoanTypeModal{{$loan->id}}" ><i class="fas fa-pencil-alt"></i></a>

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

@include('loan_type/create')
@if($loan_type!= null)
@include('loan_type/show')
@include('loan_type/edit')
@endif

@endsection


