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
      <h6 class="m-0 font-weight-bold text-primary">Claimant Notice</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead class="theadalign">
            <th>Sl. No.</th>
            <!-- <th>Organization Name</th>
            <th>Claimant Email</th>
            <th>Claimant Contact telephone no</th> -->
            <th>Claim Notice No. & Date</th>            
           <!--  <th>Claim Category</th>
            <th>Claim Sub Category</th>-->
           
            <!-- <th>Status</th> -->
            <th>Status</th> 
            <th>Active/ Inacative</th>
                               
          </tr>
        </thead>                                
        <tbody>
          @foreach ($claimnotice as $register)
          <tr style="text-align: center">
            <td>{{ $loop->iteration}}</td>
            <!-- <td>{{ $register->organization_name }}</td>
            <td>{{ $register->email }}</td>
            <td>{{ $register->phone }}</td> --> 
            <!-- <td>{{ $register->claimnoticeno }} - {{ $register->created_at }}</td> -->
            <td>
  <a href="{{ route('claimantsnoticelist.show',$register->id) }}">
  
    {{ $register->claimnoticeno }} - {{ $register->created_at }}
    
  </a>
</td>


  <td>
    @if($active_status1[$loop->iteration-1][0]->claimnoticestatus =='New Claim') 
 Draft
 @elseif($active_status1[$loop->iteration-1][0]->claimnoticestatus =='New Claim Created')
 Sent
  @elseif($active_status1[$loop->iteration-1][0]->claimnoticestatus =='Respondent Access Provided Waiting for the Acceptance')
Awaiting respondent response
@elseif(($active_status1[$loop->iteration-1][0]->claimnoticestatus =='Disputing and Contesting the Claim') ||($active_status1[$loop->iteration-1][0]->claimnoticestatus =='Making a Counter Claim'))
Initiate Payment
@elseif($active_status1[$loop->iteration-1][0]->claimnoticestatus =='Arbitrator Approved and Pleadings Initiated')
Closed
@else
-
  @endif 
</td>
          
         
            <!-- <td>{{ $register->category_name }}</td>
            <td>{{ $register->subcategory_name }}</td>       
           
            <td>{{ $register->claimnoticestatus }}</td> -->
            @if(empty($active_status[$loop->iteration-1])) 
          
            <td style="color: red;font-weight: bolder;">Inactive</td>
          
          @endif
          @if(!empty($active_status[$loop->iteration-1]))
          
             <td style="color: #62b662;font-weight: bolder;">Active</td>
          
          @endif

            <!-- <td> 
              <form action="{{ route('claimantsnoticelist.destroy',$register->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('claimantsnoticelist.show',$register->id) }}">Show</a>      
              </form></td> -->
            </tr>  
            @endforeach              
          </tbody>
        </table>
        
      </div>
      
    </div>   
  </div>
</div>
@endsection





