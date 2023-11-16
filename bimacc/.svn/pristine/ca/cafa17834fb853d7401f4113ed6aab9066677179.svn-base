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
      <div class="float-left">

      </div>
      <div class="float-right">
        <a class="btn btn-success" title="Create" href="{{ route('disputesubcategory.create') }}" data-toggle="modal" data-target="#createSubCategoryModal"><i class="fas fa-plus"></i></a>
      </div>
    </div>
  </div> 
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Dispute Sub Category</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead class="theadalign">
            <tr>
              <th style="width: 104.4px;">Sl. No.</th>
              <th>Dispute Sub Category Code</th>
              <th>Dispute Sub Category Name</th>
              <th>Main Dispute Category</th>
              <th>Action</th>                      
            </tr>
          </thead>

          <tbody>
            @foreach ($dispute_subcategories as $dispute_subcategorie)
             <tr style="text-align: center">
              <td>{{ $loop->iteration}}</td>
              <td>{{$dispute_subcategorie->dispute_subcategory_Code}}</td>                    
              <td>{{ $dispute_subcategorie->subcategory_name }}</td>            
              <td>{{ @$dispute_subcategorie->dispute_categories->category_name }}</td>
              <td>

                <form action="{{ route('disputesubcategory.destroy',$dispute_subcategorie->id) }}" method="POST">

                  <a class="btn btn-info" title="Show" href="{{ route('disputesubcategory.show',$dispute_subcategorie->id) }}" data-toggle="modal" data-target="#showSubCategoryModal{{$dispute_subcategorie->id}}" ><i class="fas fa-eye"></i></a>    
                  <a class="btn btn-primary" title="Edit" href="{{ route('disputesubcategory.edit',$dispute_subcategorie->id) }}" data-toggle="modal" data-target="#editSubCategoryModal{{$dispute_subcategorie->id}}" ><i class="fas fa-pencil-alt"></i></a>   
                  @csrf
                  @method('DELETE')

                  <button type="submit" title="Delete" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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

@include('disputesubcategory/create')
@include('disputesubcategory/show')
@include('disputesubcategory/edit')

@endsection
