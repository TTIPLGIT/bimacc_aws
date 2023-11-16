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
                    <th>Actual Damage Request</th>
                    <th>Punitive Damage Request</th>
                    <th>Dispute Amount</th>
                    <th>Specific Performance</th>
                    <th>Injuctive Relief</th>
                    <th>Form Fees</th>
                    <th>Witness Production Fees</th>
                    <th>Attorney Fees</th>
                    <th>Othercase Related Fees</th>
                    <th width="230px">Action</th>                   
                </tr>
            </thead>                                
            <tbody>
                @foreach ($ReliefRequests as $ReliefRequest)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $ReliefRequest->actual_damage_request }}</td>
                    <td>{{ $ReliefRequest->punitive_damage_request }}</td>
                    <td>{{ $ReliefRequest->amount_in_dispute }}</td>
                    <td>{{ $ReliefRequest->specific_performance }}</td>
                    <td>{{ $ReliefRequest->injuctive_relief }}</td>
                    <td>{{ $ReliefRequest->form_fees }}</td>
                    <td>{{ $ReliefRequest->witness_production_fees }}</td>
                    <td>{{ $ReliefRequest->attorney_fees }}</td>
                    <td>{{ $ReliefRequest->othercase_related_fees }}</td>
                    <td></td>
                </tr>  
                @endforeach              
            </tbody>
        </table>
        
    </div>
    {!! $ReliefRequests->links() !!} 
</div>   
</div>

@endsection
