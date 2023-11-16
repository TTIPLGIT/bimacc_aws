
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
      <a onclick="exportTableToExcel('dataTable','Invoice-{{now()}}')"class="btn btn-success float-right" title="Create"><i class="fa fa-download"></i> Export Excel</a>
    </div>
  </div>
</div> -->

 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Invoice List</h6>
  </div>
  <div class="card-body">
    
    <div class="table-responsive">
      <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
        <thead class="theadalign">
          <tr>
            <th>Sl. No.</th>
            
            <th>Claim Notice Number</th>
            <th>Invoice Number</th>
            <th>Invoice Amount</th>
            <th>Invoice Type</th>
            <th>Invoice Date</th>
            <th>Username </th>                  
          </tr>
        </thead>

        <tbody>


         @foreach ($invoice as $invoices)
         <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td>
         
          <td>{{ $invoices->claimnoticeno }}</td>
          <td>{{ $invoices->invoiceno }}</td>
          <td>{{ $invoices->invoiceamount }}</td>  
           <td>{{ $invoices->invoice_type }}</td>
           
           <td>{{date('d-m-Y', strtotime($invoices->invoicedate))}}</td>
              <td>{{ $invoices->username }}</td>                   
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
                title: 'Invoice'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
        ]
    } );
} );
</script>






@endsection
