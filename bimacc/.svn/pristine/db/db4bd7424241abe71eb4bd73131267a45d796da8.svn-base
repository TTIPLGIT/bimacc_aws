@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container"> 
    <div class="row">
     <div class="col-lg-12 margin-tb">                    
        <div class="pull-right">
            <a class="btn btn-success float-right" title="create" href="{{ route('home') }}"><i class="fas fa-plus" ></i></a>
        </div>          
    </div>
</div>

<div class="row">    
    <!-- DataTables Example -->
    
    <div class="table-responsive">
        <table class="table table-bordered " width="100%" cellspacing="0" >
             <thead class="theadalign">
                <tr>
                    <th>Sl. No.</th>
                    <th>Account Name</th>
                    <th>Account Type</th>
                    <th>Branch Name</th>
                    <th>Account Opened Date</th>
                    <th>Name of the Registered Representative</th>
                    <th>Dispute Category</th>
                    <th>Dispute Sub Category</th>
                    <th width="230px">Action</th>                   
                </tr>
            </thead>                                
            <tbody>
                
                @foreach ($ClaimDetails as $claimDetail)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $claimDetail->account_name }}</td>
                    <td>{{ $claimDetail->type_account }}</td>
                    <td>{{ $claimDetail->name_of_the_branch }}</td>
                    <td>{{ $claimDetail->date_of_account_opened }}</td>
                    <td>{{ $claimDetail->name_of_the_registered_representative }}</td>
                    <td>{{ $claimDetail->dispute_categories_id }}</td>
                    <td>{{ $claimDetail->dispute_subcategories_id }}</td>
                    <td></td>
                </tr>  
                @endforeach              
            </tbody>
        </table>
        
    </div>
    {!! $ClaimDetails->links() !!} 
</div>   
</div>

@endsection
