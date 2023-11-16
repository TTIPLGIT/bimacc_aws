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
      <a class="btn btn-success float-right" title="create" href="{{ route('systemfees.create') }}" data-toggle="modal" data-target="#createSystemFeesModal" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus" ></i></a>
    </div>          
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">System Fees</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="theadalign">
        <tr>
          <th>S No</th>
          <th>Claimant Type</th>
          <th>Fees Amount</th>
          <th>Claimant Description</th>                                 
          <th>Action</th>
        </tr>
      </thead>  
      @if($systemFees!= null)
      <tbody>          
       @foreach ($systemFees as $key => $fees)

       <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $fees->claimant_respondant_type->claimant_respondant_type_name }}</td>
        <td>{{ $fees->system_fees}}</td>
        <td>{{ $fees->system_fees_description}}</td>            
        <td>
          <form action="{{ route('systemfees.destroy',$fees->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('systemfees.show',$fees->id) }}" data-toggle="modal"  data-target="#showSystemFeesModal{{$fees->id}}"><i class="fas fa-eye">Show</i></a>
            <a class="btn btn-primary" id="test1" href="{{ route('systemfees.edit',$fees->id) }}" data-toggle="modal"  data-target="#editSystemFeesModal{{$fees->id}}" ><i class="fas fa-pencil-alt"></i></a>
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

@include('systemfees/create')
@if($systemFees!= null)
@include('systemfees/show')
@include('systemfees/edit')
@endif

@endsection
