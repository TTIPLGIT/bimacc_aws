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
    
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Respondent Details Update</h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">
     <!--  <button onclick="createPDF('dataTable')">Export Table Data To Excel File</button> -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <thead class="theadalign">
        <tr>
          <th style="width: 104.4px;">Sl. No.</th>
          <th >Claim Notice No. & Date</th>
          <th >Respondent Name</th>
  <th >Respondent Address</th>
          <th>Action</th>                       
        </tr>
      </thead>
      <tbody style="text-align:center">
       @foreach ($respondantinformations as $notice)
       <tr>
        <td>{{ $loop->iteration}}</td>                    
        
<td>
  
  
      {{ $notice->claimnoticeno }}
    
 
</td>
<td>{{ $notice->firstname }} {{ $notice->lastname }}</td>
<td>{{ $notice->address }}</td>
        <td> 
       
        
  
     <a class="btn btn-primary"  data-toggle="modal" data-target="#updaterespondentinformation{{$notice->id}}">Update</a>
          
        
      </td>

    </tr>
    
    @endforeach
  </tbody>
</table>
@include('modals/updaterespondentinformation')
</div>
</div>
</div>
</div>
<!-- <style>
  .card-body{
  overflow: scroll;
}

</style>
-->

@endsection

