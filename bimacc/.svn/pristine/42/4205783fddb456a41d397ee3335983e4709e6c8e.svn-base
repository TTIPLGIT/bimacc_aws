@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="container con">      
  <!-- DataTables Example -->
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
    </div>

  </div>
</div>
  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Claimant Notice</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="display table table-bordered" id="dataTables" width="100%" cellspacing="0">
           <thead class="theadalign">
          <tr>
            <th>Sl. No.</th>
            <th>Claim Notice No.</th>
            <th>Claimant Type</th>
            <th>Filed Date</th>                      
            <th>Location</th>
            <th>Dispute Category</th> 
            <th>No. Of Respondent</th>  
            <th>Claim Amount</th> 
            <th>Claim Notice Status</th>  
            <th>Respondent Action</th>                   
          </tr>
        </thead>                                
        <tbody>
          @foreach ($totalclaimnotice as $claimnotice)
          <tr style="text-align: center">
            <td>{{ $loop->iteration}}</td>

            <td>{{ $claimnotice->claimnoticeno }}</td>
            <td>{{ $claimnotice->claimant_type }}</td>
            <td>{{ $claimnotice->created_at }}</td>
            <td>{{ $claimnotice->Location }}</td>
            <td>{{ $claimnotice->category_name }}</td>
            <td>{{ $claimnotice->category_name }}</td>
            <td>{{ $claimnotice->ClaimAmount }}</td>
            <td>{{ $claimnotice->claimnoticestatus }}</td>
            <td>{{ $claimnotice->RespondentAction }}</td>
          </tr>
            @endforeach              
          </tbody>
        </table>
        
      </div>
      
    </div>   
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTables').DataTable({

      dom: 'Bfrtip',
      buttons: [{ extend: 'excel',
      title: 'Claimant Notice report'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
            ]
          } 
      );
} );
</script>
@endsection





