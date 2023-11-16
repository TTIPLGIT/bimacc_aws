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
    <!-- <div class="pull-right">
      <a class="btn btn-success float-right" title="Create" href="{{ route('claimnotice.create') }}" >Create New Claim Notice</a>
    </div> -->
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Administration and Arbitration Fee</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <thead class="theadalign">
        <tr>
          <th style="width: 104.4px;">Sl. No.</th>
          <th>Claim Notice No. & Date</th>
  
          <!-- <th>View</th>                       -->
        </tr>
      </thead>
      <tbody style="text-align:center">
       @foreach ($claimnotice as $notice) 
       <tr>
        <td>{{ $loop->iteration}}</td>                    
        <!-- <td>{{ $notice->claimnoticeno }} - {{ $notice->created_at }}</td> -->
        <td>
  <a href="{{ route('payadministationfees.show',$notice->id) }}">
  
      {{ $notice->claimnoticeno }} - {{ $notice->created_at }}
    
  </a>
</td>
         
 <!-- <td>
         <form action="{{ route('claimnotice.destroy',$notice->id) }}" method="POST">
          <a class="btn btn-info" title="show" href="{{ route('payadministationfees.show',$notice->id) }}" >View</a>
          @if( $notice->claimnoticestatus =="New Claim" )
          <a class="btn btn-primary" title="Edit" href="{{ route('claimnotice.edit',$notice->id)}}" >Edit</a> 
          @else
          @endif  
          @csrf
          @method('DELETE')
        </form>
      </td> -->
    </tr>
    @endforeach
  </tbody>
</table>
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

