@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="container con">      
  <!-- DataTables Example -->
  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Claimant Petitions</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="displays table table-bordered" id="dataTables" width="100%" cellspacing="0">
           <thead class="theadalign">
          </tr>
            <th>Sl. No.</th>
            <th>Claim Notice No.</th>
            <th>Claim Petition No.</th>
            <th>Filed Date</th>                      
            <th>Location</th>
            <th>Dispute Category</th>  
            <th>Claim Amount</th> 
            <th>Arbitrator Allocated</th>  
            <th>Case Status</th>                   
          </tr>
        </thead>                                
        <tbody>
          @foreach ($totalclaimpetition as $claimpetition)
          <tr style="text-align: center">
            <td>{{ $loop->iteration}}</td>

            <td>{{ $claimpetition->claimnoticeno }}</td>
            <td>{{ $claimpetition->arbitration_petionno }}</td>
            <td>{{ $claimpetition->created_at }}</td>
            <td>{{ $claimpetition->Location }}</td>
            <td>{{ $claimpetition->category_name }}</td>
            <td>{{ $claimpetition->ClaimAmount }}</td>
            <td>{{ $claimpetition->category_name }}</td>
            <td>{{ $claimpetition->claimnoticestatus }}</td>
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
      title: 'Administration and Arbitator Fee Details'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
            ]
          } 
      );
} );
</script>
@endsection





