
<div class="container con"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
    </div>

  </div>
</div>
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
    </div>

  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Administration & Arbitator Fee</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="displays table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="theadalign">
          <tr>
             <th style="width: 104.4px;">Sl. No.</th>   
            <th>Claimant Name</th>             
            <th>Respondent Name</th>
            <th>Claimnoticeid</th>
            <th>Invoice No</th>
            <th>invoice Ammount</th>     
          </tr>
        </thead>
        <tbody>
         @foreach ($adminandarbitratorfee as $key => $regfee)
          <tr style="text-align: center">
          <td>{{ $loop->iteration}}</td> 
          <td>{{ $regfee->name }}</td> 
          <td>{{ $regfee->firstname }}</td> 
          <td>{{ $regfee->claimnoticeno }}</td> 
          <td>{{ $regfee->invoiceno }}</td> 
          <td>{{ $regfee->invoiceamount }}</td> 
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
    $('table.displays').DataTable({
      dom: 'Bfrtip',
      buttons: [{ extend: 'excel',
      title: 'Administration and Arbitator Fee Details'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
            ]
          } 
      );
} );
</script>

