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

<div class="container-fluid"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
      <a class="btn btn-success float-right" title="create" href="{{ route('disputecategory.create') }}" data-toggle="modal" data-target="#createCategoryModal" ><i class="fas fa-plus" ></i></a>
    </div>
    
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Main Dispute Category</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="theadalign">
          <tr>
             <th style="width: 104.4px;">Sl. No.</th>
            
            <th>Dispute Category Code</th>
            <th>Dispute Category Name</th>
            <th>Action</th>                      
          </tr>
        </thead>
        <tbody>
         @foreach ($dispute_categories as $disputeCategory)
           <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>
          <td>{{$disputeCategory->dispute_category_Code}}</td>                    
          <td>{{ $disputeCategory->category_name }}</td>
          <td>
            <form action="{{ route('disputecategory.destroy',$disputeCategory->id) }}" method="POST">
             
              <a class="btn btn-info" title="show" href="{{ route('disputecategory.show',$disputeCategory->id) }}" data-toggle="modal" data-target="#showCategoryModal{{$disputeCategory->id}}"><i class="fas fa-eye"></i></a>
              <a class="btn btn-primary" title="Edit" href="{{ route('disputecategory.edit',$disputeCategory->id) }}" data-toggle="modal" data-target="#editCategoryModal{{$disputeCategory->id}}"><i class="fas fa-pencil-alt"></i></a>
              
              @csrf
              @method('DELETE')
              
              <button type="submit" onclick="return myFunction();" title="Delete" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
@include('disputecategory/create')
@include('disputecategory/show')
@include('disputecategory/edit')
@endsection
