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
      <a class="btn btn-success float-right" title="create" href="{{ route('claimant_respondant_type.create') }}" data-toggle="modal" data-target="#createClaimantRespondantTypeModal" data-backdrop="static" data-keyboard="false" ><i class="fas fa-plus" ></i></a>
    </div>          
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Claimant / Respondant Type</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="theadalign">
        <tr>
              <th style="width: 104.4px;">Sl. No.</th>
          
          <th>Code</th>
          <th>Type</th>
          <th>Claimant/Respondant</th>                                           
          <th>Action</th>
        </tr>
      </thead>  
      @if($claimant_respondant_type != null)   
      <tbody>          
       @foreach ($claimant_respondant_type as $claimant_respondant)
       <tr style="text-align: center">

        <td>{{ $loop->iteration}}</td>
        <td>{{ $claimant_respondant->claimant_respondant_type_Code }}</td>
        <td>{{ $claimant_respondant->type }}</td>
        <td>{{ $claimant_respondant->claimant_respondant_type_name}}</td>
        
        <td>
          <form action="{{ route('claimant_respondant_type.destroy',$claimant_respondant->id) }}" method="POST">

            <a class="btn btn-info" data-toggle="modal"  data-target="#showClaimantRespondantModal{{$claimant_respondant->id}}"><i class="fas fa-eye"></i></a>

            <a class="btn btn-primary" id="test1"  data-toggle="modal"  data-target="#editClaimantRespondantModal{{$claimant_respondant->id}}" ><i class="fas fa-pencil-alt"></i></a>

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

@include('claimant_respondant_type/create')
@if($claimant_respondant_type!= null)
@include('claimant_respondant_type/show')
@include('claimant_respondant_type/edit')
@endif

@endsection
