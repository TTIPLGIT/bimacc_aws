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
      <a onclick="exportTableToExcel('dataTable','Respondant List-{{now()}}')"class="btn btn-success float-right" title="Create"><i class="fa fa-download"></i> Export Excel</a>
    </div>
  </div>
</div> -->

   <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Claim Petition Details</h6>
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
            <thead >
            <tr>
            <th>Sl. No.</th>
            <th>Claim Notice No.</th>
            <th>Claim petition No.</th> 
             
           <th>Stage</th>
            <th>Status</th>
            <th>Claimant Document</th>
            <th>Respondent Document</th>
           
             <th>Arbitrator Name</th>
              <th>Arb. Allocated date</th>
               <th>Disposed Date</th>
  
                      <!--  <th>Respondent Name</th>
                        <th>Respondent Decision</th> --> 

                               
          </tr>
        </thead>

          <tbody>

           
          
           @foreach ($claimstage as $respondantList)
           <tr style="text-align: center">
             
              <td>{{ $loop->iteration}}</td>
               <td>{{ $respondantList->claimnoticeno}}</td>
                <td>{{ $respondantList->arbitration_petionno}}</td>
               
                <!-- <td>
                 <table>
        @foreach ($claim_status as $key => $claimNoticeStageDocuments1)
       @if($claimNoticeStageDocuments1->claimnoticeid == $respondantList->claimnotice_id)
        <tr>
         <td style="border: none;">
          
           {{$claimNoticeStageDocuments1->claimnoticestatus}}
          </a>
        </td>
      </tr>
     @endif
      @endforeach
    </table>
              </td> -->
               <td>{{ $respondantList->claimantnotice_stage}}</td>
                <td>{{ $respondantList->claimantnotice_stage_status}}</td>
              <td>
                 <table>
        @foreach ($stage_document as $key => $claimNoticeStageDocuments1)
       @if($claimNoticeStageDocuments1->id == $respondantList->stageid)
        <tr>
         <td style="border: none;">
          
           {{$claimNoticeStageDocuments1->document_name}}
          </a>
        </td>
      </tr>
     @endif
      @endforeach
    </table>
              </td>
              <td>
                 <table>
        @foreach ($respondent_document as $key => $claimNoticeStageDocuments1)
       @if($claimNoticeStageDocuments1->id == $respondantList->stageid)
        <tr>
         <td style="border: none;">
          
            {{$claimNoticeStageDocuments1->document_name}}
          </a>
        </td>
      </tr>
     @endif
      @endforeach
    </table>
              </td>
              
 <td>{{ $respondantList->firstname}}</td>
  <td>{{ $respondantList->created_at}}</td>
  @if($respondantList->claimantnotice_stage_status =='Disposed')
   <td>{{ $respondantList->disposed_date}}</td>
   @else
   <td>-</td>
   @endif




             
                  
          </tr>
          @endforeach

        </tbody>
        
      </table>
</div>









     
      
    </div>
  </div>
</div>

</div>
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [{ extend: 'excel',
                title: 'Claim Petition Details'}
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
      title: 'Claim Petition Details'}
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
