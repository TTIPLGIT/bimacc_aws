<style type="text/css">
  .dataTables_paginate 
  {
    float: left !important;
  }
</style>
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
      <a onclick="exportTableToExcel('dataTable','ClaimantList-{{now()}}')"class="btn btn-success float-right" title="Create"><i class="fa fa-download"></i> Export Excel</a>
    </div>
  </div>
</div> -->

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Claimant Details</h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-5" id="panel-heading"></div>
      <div class="col-lg-4"></div>
      <div class="col-lg-1"></div>
      <div class="col-lg-2">

       <input type="text" id="myCustomSearchBox" class="form-control" placeholder="Search">
     </div>

   </div>
   <div class="row">
    <div class="col-lg-5"></div>
    <div class="col-lg-4" ></div>
    <div class="col-lg-1" ></div>
    <div class="col-lg-2" id="panel-heading1" style="text-align: right;">


    </div>

  </div>
  <div class="table-responsive"> 
   <h1></h1>

   <h2></h2>

   <div role="region" aria-labelledby="HeadersRow" tabindex="0" class="colheaders">
    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
      <thead class="theadalign">
       <tr>
        <th>Sl. No.</th>
        <th>Claimant Type</th>
        <th>Name</th>
        <th>Branch / Dep Name</th>
        <th>Branch / Dep Code</th>
        <th>Official / Representative's Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Alt. Ph No.</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>country</th>
        <th>Postal Code</th>
        <th>Arb Agreement</th>
        <th>Authorised Reprentative</th>
        <th>Authorised Reprentative Name</th>
        <th>Authorised Reprentative Email</th>  
        
        <th>Amend Document for the Profile Name</th> 
        <th>Amend Document for the Profile Address</th>   
        <th>Email Verified</th>                   
      </tr>
    </thead>

    <tbody>


     @foreach ($claimantslist as $claimants) 
     <tr style="text-align: center">
      <td>{{ $loop->iteration}}</td>
      <td>{{ $claimants->claimant_respondant_type_name }}</td>  
      <td>{{ $claimants->firstname }} {{ $claimants->lastname }}</td>
      <td>{{ $claimants->lastname }}</td>
      <td>{{ $claimants->dept_name }}</td>
      @if( $claimants->claimant_type =='8' || $claimants->claimant_type =='5' || $claimants->claimant_type =='3')
      <td>{{ $claimants->firstname }}</td>
      @else
      <td>-</td>
      @endif
      <td>{{ $claimants->email }}</td>
      <td>{{ $claimants->phone }}</td>  
      <td>{{ $claimants->alt_phone }}</td>   
      <td>{{ $claimants->address }}</td>  
      <td>{{ $claimants->city }}</td>  
      <td>{{ $claimants->state }}</td>
      <td>{{ $claimants->country }}</td>
      <td>{{ $claimants->zipcode }}</td>
      <td><a href='{{route('getclaimdetailsDocuments',$claimants->document_id) }}''  download>
        {{$claimants->document_name}}
      </a></td>
      <!-- <td>{{ $claimants->document_name }}</td>  -->
      <td>{{ $claimants->authorised }}</td>
      <td>{{ $claimants->auth_name }}</td>
      <td>{{ $claimants->auth_email }}</td>
      @if($claimants->name_id!='')
      <td><a href='{{route('getclaimdetailsDocuments',$claimants->name_id) }}''  download>
        {{$claimants->name_doc}}
      </a></td>
      @else
      <td>-</td>
      @endif
      @if($claimants->address_id!='')
      <td><a href='{{route('getclaimdetailsDocuments',$claimants->address_id) }}''  download>
        {{$claimants->address_name}}
      </a></td>
      @else
      <td>-</td>
      @endif


      @if( $claimants->mail_verify=='1')
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
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [{ extend: 'excel',
                title: 'Claimant Details'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
        ]
    } );
} );
</script> -->
<script type="text/javascript">
 $(document).ready(function() {
   dTable=$('#example').DataTable({
          "bLengthChange": false, // this gives option for changing the number of records shown in the UI table
          "lengthMenu": [10], // 4 records will be shown in the table
          "columnDefs": [
          {"className": "dt-center", "targets": "_all"} //columnDefs for align text to center
          ],
          buttons: [{ extend: 'excel',
          title: 'Claimant Details'}
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            
            ],
          "dom":"Bfrtip" //to hide default searchbox but search feature is not disabled hence customised searchbox can be made.
        });
   
   $('#myCustomSearchBox').keyup(function(){  
        dTable.search($(this).val()).draw();   // this  is for customized searchbox with datatable search feature.
      })
   $("#example_wrapper > .dt-buttons").appendTo("div#panel-heading");
   $("#example_wrapper > .dataTables_info").appendTo("div#panel-heading1");
       // $("#example_wrapper > .dataTables_paginate").appendTo("div#panel-heading2"); 
        // $("#NewPaginationContainer").append($("#panel-heading2"));
      } );
    </script>





    @endsection
