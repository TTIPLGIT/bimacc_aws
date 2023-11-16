
@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container con">
  <!-- <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
      <a onclick="exportTableToExcel('dataTable','Hearing Conversation Report-{{now()}}')"class="btn btn-success float-right" title="Create"><i class="fa fa-download"></i> Export Excel</a>
    </div>
  </div>
</div> -->

 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hearing Conversation Report</h6>
  </div>
  <div class="card-body">
    
    <div class="table-responsive">
      <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
        <thead class="theadalign">
          <tr>
            <th>Sl. No.</th>
            
            <th>Claim Notice Number</th>
            <th>Role</th>
            <th>Sent Username</th>
            
            <th>Received Users</th>
            <th>Message Content</th>
            <th>Download</th>               
          </tr>
        </thead>

        <tbody>


         @foreach ($rows as $row)
         <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>

         <!--  <td>{{ $row->claim_id }}</td> -->
          <td>{{ $row->claimnoticeno }}</td>
          <td>{{ $row->role_name }}</td>
          
          <td>{{ $row->from_name }}</td>
            
           <td>{{ $row->to_name }}</td>
           <td  style="text-align: left">{{ $row->message_text }}</td>
           <td  style="text-align: left"><a type="button" class="btn btn-primary"  href="{{route('hearingconversationreport',$row->claim_id)}}">Download</a></td>
 
                                 
        </tr>
        @endforeach
 
      </tbody>

    </table>


  </div>
</div>
</div>

</div>






@endsection
