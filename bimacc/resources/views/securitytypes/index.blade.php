@extends('layouts.admin')
@section('content')


<div class="container con"> 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('securitytypes.create') }}" data-toggle="modal" data-target="#createsecurityMasterModal" ><i class="fas fa-plus" ></i></a>
            </div>
        </div>
    </div>
    
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Security Types Details</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead class="theadalign">
            <tr>
              <th style="width: 104.4px;">Sl. No.</th>
                
                <th>Security Type Code</th>
                <th>Security Type Name</th>            
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($security_types as $security_type)
            <tr style="text-align: center">
                <td>{{ $loop->iteration}}</td>
                
                <td>{{ $security_type->security_type_code }}</td>

                <td>{{ $security_type->security_type_name }}</td>
                
                <td>
                    <form action="{{ route('securitytypes.destroy',$security_type->id) }}" method="POST">

                      <a class="btn btn-info" href="{{ route('securitytypes.show',$security_type->id) }}" data-toggle="modal"  data-target="#showSecurityMasterModal{{$security_type->id}}"><i class="fas fa-eye">Show</i></a>

                      <a class="btn btn-primary" id="test1" href="{{ route('securitytypes.edit',$security_type->id) }}" data-toggle="modal"  data-target="#editSecurityMasterModal{{$security_type->id}}" ><i class="fas fa-pencil-alt"></i></a>

                      @csrf

                      @method('DELETE')

                      <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
@include('securitytypes/create')
@if($securitytypes_count != 0)    
@include('securitytypes/show')
@include('securitytypes/edit')
@endif
@endsection




