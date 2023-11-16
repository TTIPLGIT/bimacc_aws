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
      <a class="btn btn-success float-right" title="create" href="{{ route('country.create') }}" data-toggle="modal" data-target="#createCountryModal" ><i class="fas fa-plus" ></i></a>
    </div>
    
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Countries</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="theadalign">
          <tr>
             <th style="width: 104.4px;">Sl. No.</th>
            
            
            <th>Country Name</th>
            <th>Action</th>                      
          </tr>
        </thead>
        <tbody>
         @foreach ($Countries as $country)
           <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>
                             
          <td>{{ $country->country_name }}</td>
          <td>
            <form action="{{ route('country.destroy',$country->id) }}" method="POST">
             
              <a class="btn btn-info" title="show" href="{{ route('country.show',$country->id) }}" data-toggle="modal" data-target="#showCountryModal{{$country->id}}"><i class="fas fa-eye">Show</i></a>
              <a class="btn btn-primary" title="Edit" href="{{ route('country.edit',$country->id) }}" data-toggle="modal" data-target="#editCountryModal{{$country->id}}"><i class="fas fa-pencil-alt"></i></a>
              
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
@include('country/create')
@include('country/show')
@include('country/edit')
@endsection
