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
                    <th>Respondant Name</th>
                    <th>Phone No</th>
                    <th>Email Address</th>
                    <th>Respondant Type</th>
                    
                    <th width="230px">Action</th>                   
                </tr>
            </thead>                                
            <tbody>
                @foreach ($respondantinformations as $respondantinformation)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $respondantinformation->name }}</td>
                    <td>{{ $respondantinformation->daytimetelephone }}</td>
                    <td>{{ $respondantinformation->email }}</td>
                    <td>{{ $respondantinformation->respondant_type }}</td>
                    <td></td>
                </tr>  
                @endforeach              
            </tbody>
        </table>
        
    </div>
    {!! $respondantinformations->links() !!} 
</div>   
</div>

@endsection
