
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
      <a onclick="exportTableToExcel('dataTable','Claim Petition List-{{now()}}')"class="btn btn-success float-right" title="Create"><i class="fa fa-download"></i> Export Excel</a>
    </div>
  </div>
</div> -->

 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Claim Petition</h6>
  </div>
  <div class="card-body">
    
    <div class="table-responsive">
     <table class="table table-bordered" id="example" width="100%" cellspacing="0">
        <thead class="theadalign">
          <tr>
            <th>Sl. No.</th>
            
            <th>Claim Notice Number</th>
            <th>Claim Petition Number</th>
            <th>Claimant Name</th>
           
            <th>Claim Notice Status</th>
            <th>Category Name</th>
            <th>Sub Category Name</th>
                             
          </tr>
        </thead>

        <tbody>


         @foreach ($rows as $row)
         <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>
         
          <td>{{ $row->claimnoticeno }}</td>
          <td>{{ $row->arbitration_petionno }}</td>
          
          <td>{{ $row->username }}</td>
          <td>{{ $row->claimnoticestatus }}</td>
          <td>{{ $row->category_name }}</td>  
           <td>{{ $row->subcategory_name }}</td>
                             
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
                title: 'Claim Petition'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
        ]
    } );
} );
</script>




@endsection
