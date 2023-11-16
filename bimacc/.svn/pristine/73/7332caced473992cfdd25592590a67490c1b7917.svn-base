@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Fees Details</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('claimantregister.getdetails') }}">Back</a>
            </div>
        </div>
    </div>
    <br>         
<div class="container">
    <div class="card card-mb3">
        <div class="card-body">
        <p>
        	<h3> {{ $claimantRegister->name }}</h3>
            <strong>Claim Amount From:</strong> {{ $claimantRegister->claim_amount_from }}  <br>
            <strong>Claim Amount To:</strong> {{ $claimantRegister->claim_amount_to }}<br>
            <strong>Domestic/International:</strong> {{ $claimantRegister->domestic_or_international }}<br>
            <strong>Administrator Fee</strong> {{$claimantRegister->administration_fee}}
        </p>
    </div>
</div>
</div>
@endsection