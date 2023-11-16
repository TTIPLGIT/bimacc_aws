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
      <a onclick="exportTableToExcel('dataTable','Respondant List-{{now()}}')"class="btn btn-success float-right" title="Create"><i class="fa fa-download"></i> Export Excel</a>
    </div>
  </div>
</div> -->

   <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Respondent List</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <thead class="theadalign">
            <tr>
            <th>Sl. No.</th>
            <th>Claim Notice No.</th>
            <th>Claimant Name</th>
            <th>Respondent Type</th>
            <th>Respondent Name</th>
            <th>Respondent Email</th>
            <th>Respondent Contact</th>
            <th>Respondent Address</th>
            <th>Mail Verification Status</th> 
            
                               
          </tr>
        </thead>

          <tbody>

          
           @foreach ($respondantLists as $respondantList)
           <tr style="text-align: center">
             
              <td>{{ $loop->iteration}}</td>
              <td>{{ $respondantList->claimnoticeno}}</td> 
              <td>{{ $respondantList->username }}</td>
              <td>{{ $respondantList->claimant_respondant_type_name }}</td>
              <td>{{ $respondantList->firstname }}</td>
              <td>{{ $respondantList->email }}</td>
              <td>{{ $respondantList->daytimetelephone }}</td>
              <td>{{ $respondantList->address }}</td> 
               @if( $respondantList->mail_verify=='1')
           <td style="color: #62b662;font-weight: bolder;">Verified</td> 
           @else
           <td style="color: red;font-weight: bolder;">Not Verified</td> 
           @endif
             
                  
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
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [{ extend: 'excel',
                title: 'Respondent List'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
        ]
    } );
} );
</script>
 
  
   


@endsection
