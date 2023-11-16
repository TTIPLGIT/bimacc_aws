

@extends('layouts.admin')
@section('content')

<div class="container con"> 
      <div class="row">
       <div class="col-lg-12 margin-tb">                    
        <div class="pull-right">
         
        </div>          
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cases</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead class="theadalign">
            <tr>
             <th style="width: 104.4px;">Sl. No.</th>
              <th>Claim Petition No.</th>
              <th>Claimnoticestatus</th>
              <th>Dispute Category</th>
              <th>Sub Dispute Category</th>
                                
              
            </tr>
          </thead>
       
          <tbody>
          
           @foreach ($claimnotice as $claimnotices)
           <tr style="text-align: center">
           
            <td>{{ $loop->iteration}}</td>
             <td>{{ $claimnotices->arbitration_petionno }}</td>
            <td>{{ $claimnotices->claimnoticestatus }}</td>
            <td>{{$claimnotices->category_name}}</td>
           
            <td>{{ $claimnotices->subcategory_name }}</td>
                                  
          </tr>
            @endforeach
        </tbody>
        
      </table>
    </div>
  </div>
</div>
  
<!-- /.container-fluid -->  
 
</div>
 
    
 
@endsection
